---
label: "Begeleiding"
layout: default
permalink: /begeleiding/

title: Dat kan wel wat Tiltshift gebruiken.
description: "We helpen organisaties met hun digitale transformatie. We brengen energie en inhoudelijke kennis, zorgen voor draagvlak in je organisatie én helpen waar nodig de besluitvorming een handje. Dat doen we voor, naast en samen met de mensen in de uitvoering. Zodat de transformatie wél en op tijd lukt."
keywords: methodes, design thinking, lean startup, service design, government digital services, agile, xp, creative commons

hideBanner: true
image: /assets/img/foto/Tiltshift-Aanpak-Innovatie-Interventie-Vastgelopen-digitaliserings-project.jpg
caption: 

# Korte versie voor op andere pagina's (home, /workshops/), via _includes/begeleiding-sectie.html
teaser:
  kop: "We lopen mee tot het werkt."
  tekst: "We begeleiden organisaties in hun digitale transformatie, van kwartiermaken tot de adoptie van andere software en nieuwe manieren van werken, zoals human centered design, agile development, opensourcewerken en community building."

---
{{ page.description }}

> "Als het makkelijk was, dan kon je het zelf wel."
>
> <small>Pierre Groenen, timmerman (en vader van Johan)</small>

{% comment %}De diensten uit _begeleiding/ als blokken: de eerste groot, de volgende twee klein ernaast.
Diensten met eigen_sectie: true (zoals community building) staan daaronder als eigen sectie met foto-paneel.{% endcomment %}
{% assign alle_diensten = site.begeleiding | sort: "order" %}
{% assign diensten = alle_diensten | where_exp: "d", "d.eigen_sectie != true" %}
{% capture blokken %}<div class="blokken container-md">
    {% for d in diensten limit: 3 %}
    {% include blok.html titel=d.title tekst=d.uitkomst afbeelding=d.image url=d.url linktekst="Bekijk" %}
    {% endfor %}
</div>{% endcapture %}
{% include sectie.html breed=true label="Begeleiding" kop="Waar we bij helpen" beeld=blokken %}
{% if diensten.size > 3 %}
<div class="blokken-meer container-md">
    {% for d in diensten offset: 3 %}
    {% include blok.html titel=d.title tekst=d.uitkomst afbeelding=d.image url=d.url linktekst="Bekijk" %}
    {% endfor %}
</div>
{% endif %}

{% assign apart = alle_diensten | where_exp: "d", "d.eigen_sectie == true" %}
{% for d in apart %}
{% capture beeld %}{% include valprop.html image=d.image alt=d.title %}{% endcapture %}
{% capture linktekst %}Meer over {{ d.title | downcase }}{% endcapture %}
{% include sectie.html label=d.title kop=d.kop tekst=d.uitkomst link=d.url linktekst=linktekst beeld=beeld %}
{% endfor %}

<!--
{% include valprop.html title="Design sprints" description="Snel toetsen of een idee in de praktijk werkt. We komen één week langs om het concreet te maken, uit te werken, werkend te krijgen en te testen met gebruikers." image="/assets/img/foto/Schulddossier-Design-Thinking-Schulddienstverlening.jpg" %}
-->

{% include resultaten-sectie.html slugs="van-verouderde-it-naar-innovatieve-digitale-woningcorporatie,digitaal-indelen-straatmarkten,de-stadspas-die-geen-stadspas-werd" %}

{% include cta.html header="Wat we voor jouw organisatie kunnen betekenen?" persoon="maarten" %}

