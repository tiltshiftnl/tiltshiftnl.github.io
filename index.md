---
layout: default
hideform: true
variant: white

title: "Aan de slag met Tiltshift. Concrete stappen in de transitie naar open source."
# "Voor wie écht wil beginnen met digitale transformatie of waar interne digitalisering vast loopt"
description: "Tiltshift is kwartiermaker en begeleider van publieke digitale transformatie. Wil je stappen maken richting digitale autonomie en opensourcewerken, dan zijn wij de juiste partner."
keywords: "kwartiermaker, digitalisering, oude ICT, digitale transformatie, probleemgedreven innovatie, software design thinking, human centered design, service design, lean startup, lean ux, agile development, xp, scrum, labs, apps, projecten, advies, consultancy, overheid, overheden, publieke sector, mens centraal, common ground, open source, creative commons, creative thinking, open collaboration"
image: /assets/img/foto/Tiltshift-Aanpak-Innovatie-Interventie-Vastgelopen-digitaliserings-project.jpg
caption:
---
{{ page.description }}

## Aan de slag

Wil je werk maken van digitale autonomie, maar blijf je hangen in discussies en verkenningen?
Maak het écht met Tiltshift!

Wij werken in de uitvoer, met de mensen die het moeten doen.
We brengen in kaart wat nodig is, organiseren en begeleiden pilots en implementaties, en blijven als adoptiepartner betrokken om te zorgen voor succesvol gebruik.

Bel <a href="tel:+31207220207">020-722 02 07</a> of mail <a href="mailto:info@tiltshift.nl">info@tiltshift.nl</a> voor een intake- en adviesgesprek.

## Voelbaar anders

Verandering is pas verandering als je het kan voelen.
Daarom werken we niet vanaf de zijlijn, maar midden in de organisatie.
Niet op afstand, maar tussen en met de mensen die het moeten doen.

> "Als je mensen niet over het hoofd wil zien, moet je ze betrekken in alle fases van het project."

{% include people-table.html %}

## Opdrachtgevers

We werken voor publieke, maatschappelijke, en andere organisaties die midden in de samenleving staan: voor gemeenten, provincies, woningcorporaties, (ouderen)zorg en universiteiten. Voor ministeries, uitvoeringsorganisaties en publieke samenwerkingen.

Een greep uit onze opdrachtgevers:

{% include logos-relaties.html %}

{% include projects-homepage.html title="Uitgelichte projecten" intro="We werken voor organisaties die midden in de samenleving staan. Als digitalisering vastloopt of maar niet van de grond komt." projects=site.projects %}

<!--
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
-->
