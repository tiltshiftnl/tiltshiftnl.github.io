---
layout: default

title: "Governance Game"
subtitle: "Spelenderwijs afspraken maken over gedeelde open source software."

description: "Een kaartspel van de Foundation for Public Code om met een groep door te spelen wie er bij gedeelde software betrokken is, wie wat beheert en wat er gebeurt als het tegenzit."
keywords: governance, open source, codebase, Foundation for Public Code, Governance Game, workshop, samenwerken
labels: [open source, governance, samenwerken, workshop]
order: 30
hideBanner: true
image: /assets/img/foto/Woonstad-Herinrichting-ICT-afdeling.jpg

back: ..

stappen:
  - titel: "Scenario kiezen"
    kort: "Spelregels uitleggen en een scenario kiezen"
  - titel: "Betrokkenen neerleggen"
    kort: "Alle partijen op tafel, zoals het nu is"
  - titel: "Wie beheert wat"
    kort: "Code, releases en afspraken verdelen"
  - titel: "Tegenvaller"
    kort: "Wat gebeurt er als het misgaat?"
  - titel: "Nog een tegenvaller"
    kort: "En nog een keer"
  - titel: "Terugkijken"
    kort: "Wat viel op, wat ontbreekt er?"
---
{% capture beeld %}{% include valprop.html image=page.image alt="Overleg aan een grote tafel" %}{% endcapture %}
{% capture inhoud %}
Gemaakt door de [Foundation for Public Code](https://about.publiccode.net/activities/supporting-codebase-governance/game/), vrij te gebruiken onder CC0.

- [Kaarten downloaden en printen](https://github.com/publiccodenet/governance-game) (GitHub)
- [Online versie](https://about.publiccode.net/activities/supporting-codebase-governance/game/run-governance-game-workshop.html), in Excalidraw, Google Slides of Miro
{% endcapture %}
{% include sectie.html label="Materiaal" kop="Spelenderwijs afspraken maken" tekst=page.description inhoud=inhoud beeld=beeld %}

{% capture stappen %}Speel in groepjes van 2 tot 4 mensen. De begeleider grijpt in als een groep afdwaalt en zorgt dat iedereen meedoet.

{% include stappen-kort.html items=page.stappen %}{% endcapture %}
{% include sectie.html label="Spelverloop" kop="Hoe het werkt" inhoud=stappen %}

{% capture beeld %}{% assign ws = site.sessies | where_exp: "s", "s.path contains 'governance.md'" | first %}{% include sessie-kaart.html sessie=ws %}{% endcapture %}
{% include sectie.html label="Met Tiltshift" kop="Samen spelen, met jullie eigen situatie" tekst="Wij begeleiden dit spel als workshop: we spelen het door met jullie eigen software en maken er afspraken van die je kunt gebruiken." link="/boeken/?workshop=governance" linktekst="Boek de workshop" knop=true beeld=beeld %}
