<?php
// Kopieer naar config.php (staat in .gitignore) en vul de Mailgun-gegevens in.
return [
    // Mailgun: sleutel uit Mailgun > Account > API keys. EU-account: https://api.eu.mailgun.net
    'mailgun_api'     => 'https://api.eu.mailgun.net',
    'mailgun_domein'  => 'mg.tiltshift.nl',
    'mailgun_sleutel' => 'key-...',
    'afzender'        => 'Tiltshift website <website@mg.tiltshift.nl>',

    // Alleen naar adressen op deze domeinen wordt gemaild.
    'toegestane_domeinen' => ['tiltshift.nl'],
    // Ontvanger als het formulier geen (toegestane) 'aan' meestuurt.
    'standaard_ontvanger' => 'joris.boeren@tiltshift.nl',

    // Sites die naar de API mogen posten (CORS).
    'toegestane_herkomst' => ['https://tiltshift.nl', 'https://www.tiltshift.nl', 'http://localhost:4000'],

    // Remmen tegen spam: per IP per uur, en voor alle bezoekers samen per dag.
    'max_per_uur' => 5,
    'max_per_dag' => 50,
];
