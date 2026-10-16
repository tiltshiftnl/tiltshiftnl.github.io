# Formulier-API

Kleine PHP-endpoint die formulieren van tiltshift.nl via Mailgun doorstuurt per e-mail.
Mailt alleen naar adressen op domeinen uit `toegestane_domeinen` in `config.php`.
Remmen tegen spam: honeypot, maximaal 5 berichten per IP per uur en 50 per dag in totaal.

```
api/
  public/    DocumentRoot: alleen index.php en .htaccess
  private/   formulier.php, config.php (niet in git), data/ (niet in git)
```

Alles in `public/` heeft een URL, alles in `private/` niet. Elk verzoek gaat naar `public/index.php`,
dat `private/formulier.php` laadt.

## Vooraf

- **DNS:** A-record `post.apitecture.io` naar het IP van de VPS.
- **Mailgun:** verzenddomein (bijvoorbeeld `mg.tiltshift.nl`) toegevoegd en geverifieerd,
  en een *domain sending key* aangemaakt (Sending > Domain settings > Sending API keys).
  Geen account-brede API-sleutel gebruiken.
- **PHP** met de extensies `curl` en `mbstring` (Debian/Ubuntu: `apt install php-curl php-mbstring`),
  en `display_errors = Off`.

## Installeren op de VPS

```sh
git clone https://github.com/tiltshiftnl/tiltshiftnl.github.io.git /var/www/post.apitecture.io
cd /var/www/post.apitecture.io/api/private
cp config.example.php config.php   # sleutel, domein, afzender en standaardontvanger invullen
chown www-data: config.php && chmod 600 config.php
```

**Maak de map `data/` zelf aan, met `www-data` als eigenaar.** Daarin houdt het script de spamlimieten bij.
Zonder deze map, of zonder schrijfrechten voor Apache, geeft elk verzoek een 500.

```sh
mkdir -p data
chown www-data:www-data data
chmod 700 data
```

Vhost: laat `DocumentRoot` naar `api/public` wijzen, **niet** naar `api` of de root van de repo.
Zet het `<Directory>`-blok in zowel de `*:80`- als de `*:443`-vhost (die van certbot).

```apache
DocumentRoot /var/www/post.apitecture.io/api/public
<Directory /var/www/post.apitecture.io/api/public>
    Options -Indexes
    AllowOverride All
    Require all granted
</Directory>
```

```sh
apache2ctl configtest && systemctl reload apache2
certbot --apache -d post.apitecture.io   # alleen de eerste keer
```

## Testen

Dit stuurt een echte mail naar de standaardontvanger:

```sh
curl -i -X POST https://post.apitecture.io/ \
  -H 'Content-Type: application/json' -H 'Origin: https://tiltshift.nl' \
  -d '{"contact":"test@example.com","info":"test","pagina":"Test"}'
```

Verwacht: `200` met `{"ok":true}`. Een GET geeft `405`.

Bij fouten:

- `500` met `"map data/ niet beschrijfbaar"`: zie hierboven, `private/data/` aanmaken met eigenaar `www-data`.
- `500` met `"PHP-extensie ... ontbreekt"`: `apt install php-curl php-mbstring && systemctl reload apache2`.
- `502`: Mailgun weigert. De reden staat in `tail /var/log/apache2/error.log` (verkeerde sleutel, regio of domein).
- Mappenlijst zichtbaar: in de vhost ontbreekt `AllowOverride All` (zie hierboven).

## Aanzetten op de website

Pas als de test werkt: in `_data/terugbellen.yml` staat `endpoint: "https://post.apitecture.io/"`.
Committen en pushen naar de branch waar GitHub Pages van bouwt.

## Bijwerken

```sh
cd /var/www/post.apitecture.io && git pull
```

`private/config.php` en `private/data/` staan in `.gitignore` en blijven bij een pull staan.
