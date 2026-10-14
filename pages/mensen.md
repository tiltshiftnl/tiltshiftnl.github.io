---
label: "Mensen"
layout: default
permalink: /mensen/
hideform: true

title: "Voor de mensen die het moeten doen."
seo_title: "Mensen – Tiltshift"
description: "Slimme doeners die zich inzetten voor de publieke zaak. We werken voor, naast en samen met de mensen in de uitvoer aan techniek die voor hen werkt. Met hart voor de mens, en oog voor techniek."
image: /assets/img/foto/Tiltshift-Aanpak-Innovatie-Interventie-Vastgelopen-digitaliserings-project.jpg
---

{% capture inhoud %}
De publieke sector loopt vast in trage IT-trajecten, dure leveranciers en beleid dat ver afstaat van de praktijk.
Wij vinden dat dit anders kan én moet.

> "Wij leveren geen vrijblijvende rapporten, maar zetten samen concrete stappen."
>
> <small>Maarten Geraets, partner</small>

Tiltshift is geen traditioneel adviesbureau en geen softwareleverancier.
Wij zijn kwartiermakers en begeleiders van publieke digitalisering en opensourcewerken.
{{ page.description }}
{% endcapture %}
{% capture beeld %}{% include valprop.html image="/assets/img/foto/Schulddossier-Design-Thinking-Schulddienstverlening.jpg" alt="Groep aan een lange tafel tijdens een ontwerpsessie" %}{% endcapture %}
{% include sectie.html label="Over Tiltshift" kop="Kwartiermakers van publieke digitale transformatie" inhoud=inhoud link="/begeleiding/" linktekst="Lees meer over onze begeleiding" beeld=beeld %}

{% capture inhoud %}
Verandering is pas verandering als je het kan voelen.
Daarom werken we niet vanaf de zijlijn, maar midden in de organisatie.
Niet op afstand, maar tussen en met de mensen die het moeten doen.

> "Als je mensen niet over het hoofd wil zien, moet je ze betrekken in alle fases van het project."
{% endcapture %}
{% capture beeld %}{% include valprop.html image="/assets/img/foto/Straatnotes-meekijken-met-gebruiker-software-design-thinking.jpg" alt="Twee straatcoaches kijken samen op een telefoon" %}{% endcapture %}
{% include sectie.html label="Werkwijze" kop="Voelbaar anders" inhoud=inhoud link="/contact/" linktekst="Maak een afspraak voor een intake- en adviesgesprek" beeld=beeld %}

{% capture mensen %}{% include mensen-rijen.html %}{% endcapture %}
{% include sectie.html breed=true label="Mensen" kop="Wie we zijn" beeld=mensen %}
