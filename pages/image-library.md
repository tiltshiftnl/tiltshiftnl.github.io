---
label: "Image library"
contactblok: false
layout: default
permalink: /image-library/
hideform: true
noindex: true
sitemap:
  exclude: "yes"

title: "Image library"
description: "Alle afbeeldingen van tiltshift.nl, met een korte beschrijving."
---
Alle afbeeldingen die de site gebruikt, per map. De beschrijvingen staan in `_data/afbeeldingen.yml` en zijn met de hand aan te passen. Zie ook het [design system](/design-system/).

{% assign mappen = site.data.afbeeldingen | group_by: "map" %}
<nav class="ds-inhoud container-sm">
    {% for map in mappen %}<a href="#{{ map.name }}">{{ map.name | capitalize }} ({{ map.items.size }})</a>{% endfor %}
</nav>

{% for map in mappen %}
<h2 id="{{ map.name }}">{{ map.name | capitalize }}</h2>
<ul class="beeldbank container-md">
    {% for afb in map.items %}
    <li class="beeldbank__item">
        <a class="beeldbank__beeld" href="{{ afb.pad }}"><img src="{{ afb.pad }}" alt="{{ afb.beschrijving | escape }}" loading="lazy"></a>
        <div class="beeldbank__tekst">
            <p class="beeldbank__beschrijving">{{ afb.beschrijving | escape }}</p>
            <p class="beeldbank__meta"><span class="beeldbank__soort">{{ afb.soort }}</span> <code>{{ afb.pad | split: "/" | last }}</code></p>
        </div>
    </li>
    {% endfor %}
</ul>
{% endfor %}
