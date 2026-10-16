# Formulier-API

Kleine PHP-endpoint die formulieren van tiltshift.nl via Mailgun doorstuurt per e-mail.
Mailt alleen naar adressen op domeinen uit `toegestane_domeinen` in `config.php`.
Remmen tegen spam: honeypot, maximaal 5 berichten per IP per uur en 50 per dag in totaal.

## Vooraf

- **DNS:** A-record `api.tiltshift.nl` naar het IP van de VPS.
- **Mailgun:** verzenddomein (bijvoorbeeld `mg.tiltshift.nl`) toegevoegd en geverifieerd,
  en een *domain sending key* aangemaakt (Sending > Domain settings > Sending API keys).
  Geen account-brede API-sleutel gebruiken.
- **PHP** met de extensies `curl` en `mbstring` (Debian/Ubuntu: `apt install php-curl php-mbstring`),
  en `display_errors = Off`.

## Installeren op de VPS

```sh
git clone https://github.com/tiltshiftnl/tiltshiftnl.github.io.git /var/www/tiltshift
cd /var/www/tiltshift/api
cp config.example.php config.php   # sleutel, domein, afzender en standaardontvanger invullen
mkdir -p data && chown www-data: data && chmod 700 data
chown www-data: config.php && chmod 600 config.php
```

Vhost, bijvoorbeeld `/etc/apache2/sites-available/api.tiltshift.nl.conf`.
Laat hem naar de map `api` wijzen, **niet** naar de root van de repo (anders is `.git` op te vragen).

```apache
<VirtualHost *:80>
    ServerName api.tiltshift.nl
    DocumentRoot /var/www/tiltshift/api
    <Directory /var/www/tiltshift/api>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

```sh
a2ensite api.tiltshift.nl && systemctl reload apache2
certbot --apache -d api.tiltshift.nl
```

## Testen

Dit stuurt een echte mail naar de standaardontvanger:

```sh
curl -i -X POST https://api.tiltshift.nl/formulier.php \
  -H 'Content-Type: application/json' -H 'Origin: https://tiltshift.nl' \
  -d '{"contact":"test@example.com","info":"test","pagina":"Test"}'
```

Verwacht: `200` met `{"ok":true}`. Controleer ook dat `https://api.tiltshift.nl/config.php`
een 403 geeft. Bij fouten: `tail /var/log/apache2/error.log`.

## Aanzetten op de website

Pas als de test werkt: in `_data/terugbellen.yml` zetten
`endpoint: "https://api.tiltshift.nl/formulier.php"`, committen en pushen naar GitHub Pages.

## Bijwerken

```sh
cd /var/www/tiltshift && git pull
```

`config.php` en `data/` staan in `.gitignore` en blijven bij een pull staan.
