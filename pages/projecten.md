---
layout: default
permalink: /projecten/

subject: Tiltshift projecten
title: Tiltshift projecten
subtitle: Probleemgedreven innovatie begint bij de mensen. Focus op hun probleem en laat de techniek volgen. Zo ontstaat een oplossing.

description: "In ieder Tiltshift project gaan we op zoek naar het probleem achter de software-wens, op basis van software design thinking. Een aantal stappen staan daarbij vast: discovery, ideation, development, delivery."
keywords: ""

image: "assets/img/foto/IMG_8562.jpg"
caption: 'Fixxx Ideation "Schulddossier", Gemeente&nbsp;Amsterdam'
---
Om succesvol software te ontwikkelen is het belangrijk om goed te bedenken welk probleem je eigenlijk aan het oplossen bent en voor wie.

{{ page.description }}

Hoe dat er in de praktijk uit ziet hebben we in onderstaande cases beschreven.

{% assign collection = site.projecten | sort: 'order' %}
{% for item in collection %}
<h1><a href="{{ item.url }}">{{ item.title }}</a></h1>
<p>
  {{ item.description }}<br>
  {% if item.type %}
  <span class="label">{{ item.type | downcase }}</span>
  {% endif %}
  {% for label in item.labels %}
  <span class="label">{{ label }}</span>
  {% endfor %}
</p>
{% endfor %}