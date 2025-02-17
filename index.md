---
layout: default
hideform: true
variant: white

title: Uitvoerend leiderschap in digitale transformatie
subtitle: "Als je écht wil beginnen met digitale transformatie of interne digitalisering vast loopt"
description: "We verzorgen het uitvoerend leiderschap voor digitale projecten en transformatieprogramma's, vanuit inhoudelijke expertise op het gebied van service design, software ontwikkeling en organisatieverandering."
keywords: "kwartiermaker, digitalisering, oude ICT, digitale transformatie, probleemgedreven innovatie, software design thinking, human centered design, service design, lean startup, lean ux, agile development, xp, scrum, labs, apps, projecten, advies, consultancy, overheid, overheden, publieke sector, mens centraal, common ground, open source, creative commons, creative thinking, open collaboration"
image: /assets/img/foto/Tiltshift-Aanpak-Innovatie-Interventie-Vastgelopen-digitaliserings-project.jpg
caption:
---

## Digitalisering weer op de rails

{{ page.description }}

Wil je werk maken van digitale transformatie, maar blijf je hangen in strategische plannen en experimenten? Tiltshift maakt het écht! We lopen mee met de uitvoerenden en maken samen met hen stapsgewijs de benodigde verandering in proces en techniek. Zo zorgen we snel voor concrete resultaten én maken we innovatie pragmatisch.

## Tiltshifters

Tiltshifters zijn mensen die verandering niet alleen begrijpen, maar die het ook dóen. Die voorop durven lopen en duidelijkheid scheppen, zelfs als het schuurt. Een Tiltshifter is specialist op zijn of haar vakgebied en heeft een sterke eigen mening. Die zetten ze in om jouw doelen te bereiken - tenminste, als ze in dat doel geloven.

{% include people-table.html %}

> "Als je mensen niet over het hoofd wil zien, moet je ze betrekken in alle fases van het project."

{% include projects-homepage.html title="Uitgelichte projecten" intro="" projects=site.projects %}

Bel ons op <a href="tel:+31207220207">020-722 02 07</a> als:

- **Je écht wil beginnen met digitale transformatie**. We maken een concreet plan van aanpak, leiden de opstart (kwartiermaken) en de uitvoering.

- **Interne digitalisering vastloopt**. We brengen de problemen in kaart, scheiden het kaf van het koren en zorgen voor nieuwe energie en beweging.

We werken samen met jouw ontwikkelteam en nemen indien nodig eigen experts mee voor extra capaciteit.


## Relaties

We werken veel voor gemeenten, provincies, woningcorporaties, (ouderen)zorg en universiteiten. Maar we staan net zo goed klaar voor andere organisaties.

Een greep uit onze opdrachtgevers:

{% include logos-relaties.html %}

## Nieuws

{% for post in site.posts limit:2 %}
  {% capture i18n_date %}
  {% assign m = post.date | date: "%-m" | minus: 1 %}
  {% assign months = 'januari,februari,maart,april,mei,juni,juli,augustus,september,oktober,november,december' | split: "," %}
  {% assign month = months[m] %}
  {% assign year = post.date | date: "%Y" %}
  {% assign datum = month | append: " " | append: year %}
  {% endcapture %}

  [{{ post.title }}]({{ post.url }}) - {{ datum }}<br>{{ post.teaser }}<br><br>
{% endfor %}

<a href="/posts/" class="link-centered">alle nieuwsberichten</a>
