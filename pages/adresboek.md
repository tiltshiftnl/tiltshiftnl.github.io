---
label: "Adresboek"
contactblok: false
layout: default
permalink: /adresboek/
hideform: true
noindex: true
sitemap:
  exclude: "yes"

title: "Adresboek"
seo_title: "Adresboek – Tiltshift"
description: "Vaste lijnen, mensen en hun contactgegevens zoals ze op de site staan."
---
Wie is waar bereikbaar, zoals het op de site staat. Vaste lijnen horen bij een functie; die functie is belegd bij een persoon en kan schuiven. De lijnen en mobiele nummers staan in `_data/adresboek.yml`, de overige gegevens komen van de mensenpagina's in `_mensen/`. De vCards worden uit diezelfde gegevens gemaakt (`pages/vcard/`).

## Aandachtspunten

{% for p in site.mensen %}{% unless p.email %}- **{{ p.title }}** heeft geen e-mailadres op de mensenpagina.
{% endunless %}{% endfor %}

## Vaste lijnen

<ul class="nummers container-sm">
    {% for f in site.data.adresboek.functies %}
    {% assign p = site.data.mensen[f.belegd_bij] %}
    <li class="nummers__item">
        <a href="{{ p.link | append: '/' }}" title="Naar de pagina van {{ p.full_name }}"><img class="nummers__portret" src="{{ p.portret }}" alt="{{ p.full_name }}"></a>
        <div>
            <p class="nummers__persoon"><strong>{{ f.naam }}</strong>, belegd bij {{ p.full_name }}</p>
            <p class="nummers__nummer"><a href="tel:{{ f.tel }}">{{ f.tel_display }}</a></p>
            <p class="nummers__persoon"><a href="mailto:{{ f.mail }}">{{ f.mail }}</a></p>
            <ul class="nummers__gebruik">{% for g in f.gebruikt_op %}<li>{{ g }}</li>{% endfor %}</ul>
        </div>
    </li>
    {% endfor %}
</ul>

## Mensen

{% assign mensen = site.mensen | sort: "order" %}
<ul class="nummers container-sm">
    {% for p in mensen %}
    {% comment %}Koppeling met _data/mensen.yml en het adresboek via het e-mailadres{% endcomment %}
    {% assign sleutel = nil %}
    {% for m in site.data.mensen %}{% if m[1].mail == p.email %}{% assign sleutel = m[0] %}{% endif %}{% endfor %}
    {% assign mobiel = nil %}{% assign lijnen = "" | split: "" %}
    {% if sleutel %}
        {% assign mobiel = site.data.adresboek.mobiel | where: "persoon", sleutel | first %}
        {% assign lijnen = site.data.adresboek.functies | where: "belegd_bij", sleutel %}
    {% endif %}
    <li class="nummers__item">
        <a href="{{ p.url }}" title="Naar de pagina van {{ p.title }}"><img class="nummers__portret" src="{{ p.personImage | default: p.image }}" alt="{{ p.title }}"></a>
        <div>
            <p class="nummers__persoon"><strong>{{ p.title }}</strong>{% if p.role %}, {{ p.role | downcase }}{% endif %}</p>
            <dl class="nummers__lijst">
                {% if mobiel %}<dt>Mobiel</dt><dd><a href="tel:{{ mobiel.tel }}">{{ mobiel.tel_display }}</a></dd>{% endif %}
                {% for l in lijnen %}<dt>{{ l.naam }}</dt><dd><a href="tel:{{ l.tel }}">{{ l.tel_display }}</a></dd>{% endfor %}
                {% if p.email %}<dt>E-mail</dt><dd><a href="mailto:{{ p.email }}">{{ p.email }}</a></dd>{% endif %}
                {% if p.linkedInUrl %}<dt>LinkedIn</dt><dd><a href="{{ p.linkedInUrl }}">{{ p.linkedInUrl | remove: "https://www." | remove: "https://" }}</a></dd>{% endif %}
                {% assign vcard_url = p.url | split: "/" | last | prepend: "/vcard/" | append: ".vcf" %}{% assign vcard = site.pages | where: "url", vcard_url | first %}{% if vcard %}<dt>vCard</dt><dd><a href="{{ vcard_url }}" download>{{ vcard_url }}</a></dd>{% endif %}
                <dt>Pagina</dt><dd><a href="{{ p.url }}">{{ p.url }}</a></dd>
                {% if p.labels %}<dt>Thema's</dt><dd>{{ p.labels | join: ", " }}</dd>{% endif %}
            </dl>
        </div>
    </li>
    {% endfor %}
</ul>
