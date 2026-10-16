---
label: "Contact"
contactblok: false
layout: default
permalink: /contact/

title: "We denken graag mee."
quote:
description: "Vertel waar je tegenaan loopt. Dan kijken we samen hoe we kunnen helpen. Bel +31 (0)20 722 02 07 of mail info@tiltshift.nl."
keywords: 'innovatie, interventie, contact opnemen, contactgegevens, utrecht, tiltshift, good public tech'

hideBanner: true
image: /assets/img/foto/Leiderschap-bij-starten-of-vastgelopen-digitalisering.jpg
caption: ''
---
Vertel waar je tegenaan loopt. Dan kijken we samen hoe we kunnen helpen. Een kennismaking is vrijblijvend.

{% assign algemeen = site.data.adresboek.functies | where: "sleutel", "algemeen" | first %}
{% assign administratie = site.data.adresboek.functies | where: "sleutel", "administratie" | first %}
{% assign johan = site.data.mensen[algemeen.belegd_bij] %}
{% assign joris = site.data.mensen[administratie.belegd_bij] %}
{% assign maarten = site.data.mensen.maarten %}

### Algemene vragen, intake en advies

<a href="{{ johan.link }}">{{ johan.full_name }}</a><br />
<a href="mailto:{{ algemeen.mail }}">{{ algemeen.mail }}</a><br />
<a href="tel:{{ algemeen.tel }}">{{ algemeen.tel_display }}</a>

### Offertes, facturen en administratie

<a href="{{ joris.link }}">{{ joris.full_name }}</a><br />
<a href="mailto:{{ administratie.mail }}">{{ administratie.mail }}</a><br />
<a href="tel:{{ administratie.tel }}">{{ administratie.tel_display }}</a>

### Geplande en lopende projecten

<a href="{{ maarten.link }}">{{ maarten.full_name }}</a><br />
<a href="mailto:{{ maarten.mail }}">{{ maarten.mail }}</a><br />
<a href="tel:{{ maarten.tel }}">{{ maarten.tel_display }}</a>

### Postadres

Tiltshift B.V.<br>
Strawinskylaan 11<br>
2102 CM Heemstede

### Bedrijfsgegevens

KvK 68994222<br>
BTW-ID NL857680237B01<br>
IBAN NL67 SNSB 8846 5901 39
