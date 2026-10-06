---
layout: default
permalink: /good-public-tech/

title: Manifest voor<br>Good Public Tech
subtitle: Overheid en technologie is een krachtige combinatie, zowel positief als negatief

description: 
keywords:

image: /assets/img/foto/IMG_1919.jpg
caption: 'Fixxx discovery "Overlast Rembrandtplein", Gemeente&nbsp;Amsterdam'
---
Wij werken aan Good Public Tech. Dan is het natuurlijk wel handig om te vertellen wat we daarmee bedoelen.

Good Public Tech:

<ul>
{% assign collection = site.waarden | sort: 'order' %}
{% for item in collection %}
<!--<h1><a href="{{ item.url }}">{{ item.title }}</a></h1>-->
  <li>
    {{ item.description }}<br>
  {% if item.type %}
    <span class="label">{{ item.type | downcase }}</span>
  {% endif %}
  {% for label in item.labels %}
    <span class="label">{{ label }}</span>
  {% endfor %}
  </li>
{% endfor %}
</ul>

<!--
<p>Wij geloven dat we met ontwerp van goede software de wereld een beetje beter kunnen maken. Maar we zijn natuurlijk niet naief.</p>

<p>Door de enorme opkomst van software in alle onderdelen van ons leven, is IT intussen een van de grootste vervuilers van onze aarde.</p>

<p>Good Public Tech is daarom niet alleen goede technologie. Het is ook zo min mogelijk vervuilende technologie. Dat betekent dus geen onzin maken. En je rommel opruimen. En compenseren voor alles waar je niet omheen komt.</p>

<p>Daarom zijn wij trotse klant van LeafCloud en is al onze ICT CO2-negatief __LINK__. En daarom planten wij bomen __LINK__ voor alle energie die we gebruiken in ons dagelijkse werk.</p>

ONZE ZEVEN WAARDEN
-->
