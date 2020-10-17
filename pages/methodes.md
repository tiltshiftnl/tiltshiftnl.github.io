---
layout: default
variant: blue
permalink: /methodes/

title: Methodes
quote: Als je mensen niet over het hoofd wil zien, moet je ze betrekken in alle fases van het project.
description: "Al onze projecten richten we in op basis van software design thinking methodiek. Dat wil zeggen dat we grofweg dezelfde fases doorlopen: discovery, ideation, development, implementatie, delivery. Dat doen we in human centered, en in co-creatie met de verschillende stakeholders."
keywords: creative commons, methodes, design thinking, lean startup, service design, government digital services, agile, xp

image: /assets/img/foto/IMG_9253_scaled.jpg
caption: 'Explore "Digitalisering Interne Dienstverlening", Gemeente&nbsp;Amsterdam'
---
{{ page.description }}

Afhankelijk van de scope van het probleem, het doel van het project, en een aantal andere criteria, hebben we daarvoor verschillende concrete methodes.

{% assign collection = site.methodes | sort: 'order' %}
{% for item in collection %}
<h1><a href="{{ item.url }}">{{ item.title }}</a></h1>
<p>
  {{ item.description }}<br>
  {% if item.type %}<span class="label">{{ item.type | downcase }}</span>{% endif %}
  {% for label in item.labels %}<span class="label">{{ label }}</span>{% endfor %}
</p>
{% endfor %}