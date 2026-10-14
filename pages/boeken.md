---
layout: default
contactblok_kop: "Of bel direct."
contactblok_tekst: "Liever meteen even overleggen? Bel of mail ons gerust."
label: "Boeken"
permalink: /boeken/
sitemap:
  exclude: "yes"

title: "Boek een workshop."
seo_title: "Boeken – Tiltshift"
description: "Laat je e-mail of telefoonnummer achter, dan nemen we contact op voor een korte intake."
---
{% comment %}
Links de foto van de gekozen workshop (dezelfde als op de workshoppagina), rechts het formulier.
De foto wisselt mee met de keuzelijst; bij "Weet ik nog niet" staat er een algemene foto.
{% endcomment %}
{% assign workshops = site.sessies | sort: "order" %}
{% capture beeld %}
{% for w in workshops %}<div class="boeken-workshop" data-workshop="{{ w.url | split: '/' | last }}"{% unless forloop.first %} hidden{% endunless %}>{% include valprop.html image=w.image alt=w.title %}</div>{% endfor %}
<div class="boeken-workshop" data-workshop="" hidden>{% include valprop.html image="/assets/img/foto/Tiltshift-Aanpak-Innovatie-Interventie-Vastgelopen-digitaliserings-project.jpg" alt="Twee mensen voor een wand met schetsen" %}</div>
{% endcapture %}
{% capture formulier %}{% include terugbel-formulier.html kies=true onderwerp="een workshop" %}{% endcapture %}
{% include sectie.html tekst="Laat je e-mail of telefoonnummer achter, dan nemen we contact op voor een korte intake. Samen kijken we of de workshop past bij jouw vraag. Daarna krijg je een vrijblijvende offerte." html=formulier beeld=beeld beeld_links=true %}

<script>
(function () {
    var keuze = document.querySelector('.terugbellen select[name="workshop"]');
    if (!keuze) return;
    var titel = document.querySelector('main > h1');
    var standaard = titel ? titel.textContent : '';
    function toon() {
        document.querySelectorAll('.boeken-workshop').forEach(function (b) {
            b.hidden = b.dataset.workshop !== keuze.value;
        });
        // Hoofdtitel volgt de gekozen workshop
        if (titel) titel.textContent = keuze.value ? 'Boek een ' + keuze.options[keuze.selectedIndex].text + '.' : standaard;
    }
    keuze.addEventListener('change', toon);
    toon();
})();
</script>
