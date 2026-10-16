<?php
/*
 * Formulier-API: ontvangt een formulier van tiltshift.nl en stuurt het via Mailgun door per e-mail.
 *
 * POST, als JSON (Content-Type: application/json) of als gewoon formulier (x-www-form-urlencoded).
 * Velden:
 *   aan       ontvanger (optioneel); alleen adressen op een domein uit 'toegestane_domeinen'.
 *             Leeg of niet toegestaan = 'standaard_ontvanger'.
 *   contact   e-mail of telefoon van de afzender (of: email / telefoon)
 *   website   honeypot: gevuld = spam, we doen alsof het gelukt is en sturen niets
 *   ...       alle andere velden komen als regels in de mail
 *
 * Antwoord: JSON { "ok": true } met 200, of { "ok": false, "fout": "..." } met 4xx/5xx.
 */

$config = require __DIR__ . '/config.php';

function antwoord($status, $data)
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

// CORS: alleen de eigen sites mogen posten.
$herkomst = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($herkomst !== '') {
    if (!in_array($herkomst, $config['toegestane_herkomst'], true)) antwoord(403, ['ok' => false, 'fout' => 'herkomst']);
    header('Access-Control-Allow-Origin: ' . $herkomst);
    header('Vary: Origin');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') antwoord(405, ['ok' => false, 'fout' => 'alleen POST']);

// Serverinrichting controleren, zodat een fout iets zegt in plaats van een lege 500.
$map = __DIR__ . '/data';
if (!is_dir($map)) @mkdir($map, 0700, true);
foreach (['mb_substr' => 'PHP-extensie mbstring ontbreekt', 'curl_init' => 'PHP-extensie curl ontbreekt'] as $functie => $fout) {
    if (!function_exists($functie)) { error_log('formulier.php: ' . $fout); antwoord(500, ['ok' => false, 'fout' => $fout]); }
}
if (!is_writable($map)) { error_log('formulier.php: map data/ niet beschrijfbaar'); antwoord(500, ['ok' => false, 'fout' => 'map data/ niet beschrijfbaar']); }

// Gegevens inlezen.
$ruw = file_get_contents('php://input', false, null, 0, 20000);
if (stripos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
    $d = json_decode($ruw, true);
} else {
    $d = $_POST;
}
if (!is_array($d)) antwoord(400, ['ok' => false, 'fout' => 'ongeldige gegevens']);
$d = array_map(function ($v) { return is_scalar($v) ? trim(mb_substr((string)$v, 0, 5000)) : ''; }, $d);

if (($d['website'] ?? '') !== '') antwoord(200, ['ok' => true]); // honeypot

$contact = $d['contact'] ?? ($d['email'] ?? ($d['telefoon'] ?? ''));
if ($contact === '') antwoord(422, ['ok' => false, 'fout' => 'contact ontbreekt']);

// Simpele rem: maximaal N berichten per IP per uur.
$ipbestand = $map . '/ip-' . hash('sha256', $_SERVER['REMOTE_ADDR'] ?? '') . '.json';
$nu = time();
$tijden = is_file($ipbestand) ? (json_decode(file_get_contents($ipbestand), true) ?: []) : [];
$tijden = array_values(array_filter($tijden, function ($t) use ($nu) { return $t > $nu - 3600; }));
if (count($tijden) >= $config['max_per_uur']) antwoord(429, ['ok' => false, 'fout' => 'te veel berichten']);
$tijden[] = $nu;
file_put_contents($ipbestand, json_encode($tijden), LOCK_EX);

// Daglimiet voor alle bezoekers samen, tegen bots met veel IP-adressen.
$dagbestand = $map . '/dag-' . date('Y-m-d') . '.txt';
$fh = fopen($dagbestand, 'c+');
flock($fh, LOCK_EX);
$aantal = (int)stream_get_contents($fh);
if ($aantal >= ($config['max_per_dag'] ?? 50)) {
    flock($fh, LOCK_UN); fclose($fh);
    error_log('formulier.php: daglimiet bereikt');
    antwoord(429, ['ok' => false, 'fout' => 'daglimiet bereikt']);
}
ftruncate($fh, 0); rewind($fh); fwrite($fh, (string)($aantal + 1));
flock($fh, LOCK_UN); fclose($fh);

// Opruimen: IP-bestanden ouder dan een uur en tellers van vorige dagen.
foreach (glob($map . '/{ip-*.json,dag-*.txt}', GLOB_BRACE) as $oud) {
    if ($oud !== $dagbestand && filemtime($oud) < $nu - 3600) @unlink($oud);
}

// Ontvanger: alleen naar toegestane domeinen.
function toegestaan($adres, $domeinen)
{
    if (!filter_var($adres, FILTER_VALIDATE_EMAIL)) return false;
    $domein = strtolower(substr(strrchr($adres, '@'), 1));
    return in_array($domein, array_map('strtolower', $domeinen), true);
}
$aan = $d['aan'] ?? '';
if (!toegestaan($aan, $config['toegestane_domeinen'])) $aan = $config['standaard_ontvanger'];
if (!toegestaan($aan, $config['toegestane_domeinen'])) antwoord(500, ['ok' => false, 'fout' => 'geen geldige ontvanger']);

// Mail opstellen.
$onderwerp = $d['onderwerp'] ?? ($d['workshop'] ?? ($d['pagina'] ?? ''));
$onderwerp = 'Bel mij terug' . ($onderwerp !== '' ? ': ' . $onderwerp : '');
$regels = [];
foreach ($d as $k => $v) {
    if (in_array($k, ['aan', 'website', 'onderwerp'], true) || $v === '') continue;
    $regels[] = ucfirst($k) . ': ' . $v;
}
$tekst = implode("\n\n", $regels) . "\n";

$velden = [
    'from'    => $config['afzender'],
    'to'      => $aan,
    'subject' => mb_substr(preg_replace('/[\r\n]+/', ' ', $onderwerp), 0, 200),
    'text'    => $tekst,
];
if (filter_var($contact, FILTER_VALIDATE_EMAIL)) $velden['h:Reply-To'] = $contact;

$ch = curl_init($config['mailgun_api'] . '/v3/' . $config['mailgun_domein'] . '/messages');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $velden,
    CURLOPT_USERPWD        => 'api:' . $config['mailgun_sleutel'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 15,
]);
$uit = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($code < 200 || $code >= 300) {
    error_log('formulier.php: Mailgun ' . $code . ' ' . $uit);
    antwoord(502, ['ok' => false, 'fout' => 'versturen mislukt']);
}
antwoord(200, ['ok' => true]);
