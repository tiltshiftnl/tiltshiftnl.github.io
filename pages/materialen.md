---
layout: default
variant: blue
permalink: /materialen/

subject: Materialen
backlink: /
title: "Materialen"
subtitle: Ontwerp innovatie

description: "Materialen ter ondersteuning de verschillende Tiltshift diensten. Alle materialen zijn vrij te gebruiken onder Creative Commons licentie CC BY-SA Tiltshift (www.tiltshift.nl)."
keywords: ""

image: "assets/img/foto/IMG_8562.jpg"
caption: 'Fixxx Ideation "Schulddossier", Gemeente&nbsp;Amsterdam'
---
{{ page.description }}

{% assign collection = site.materialen | sort: 'order' %}
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