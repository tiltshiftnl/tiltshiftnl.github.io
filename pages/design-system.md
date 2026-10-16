---
label: "Design system"
layout: default
permalink: /design-system/
hideform: true
noindex: true
sitemap:
  exclude: "yes"

title: "Design system"
description: "De bouwstenen van tiltshift.nl: van kleuren en letters tot complete pagina's."
---
Alle bouwstenen van deze site, opgebouwd volgens atomic design: atomen, moleculen, organismen, templates en pagina's. Wat hier staat, is de echte component, met de aanroep die je in een pagina gebruikt.

<nav class="ds-inhoud container-sm">
    <a href="#atomen">Atomen</a>
    <a href="#moleculen">Moleculen</a>
    <a href="#organismen">Organismen</a>
    <a href="#templates">Templates</a>
    <a href="#paginas">Pagina's</a>
</nav>

## Atomen {#atomen}

De kleinste onderdelen: kleur, letter, link en label.

### Kleuren

<div class="ds-kleuren container-sm">
    <div class="ds-kleur"><span style="background:#E64544"></span><strong>Rood</strong><code>$red</code><code>#E64544</code></div>
    <div class="ds-kleur"><span style="background:#1D1621"></span><strong>Zwart</strong><code>$black</code><code>#1D1621</code></div>
    <div class="ds-kleur"><span style="background:#1E59A6"></span><strong>Blauw</strong><code>$primair-blauw</code><code>#1E59A6</code></div>
    <div class="ds-kleur"><span style="background:#6089BE"></span><strong>Lichtblauw</strong><code>$secundair-blauw</code><code>#6089BE</code></div>
    <div class="ds-kleur"><span style="background:#9DB1F0"></span><strong>Lila</strong><code>$lila</code><code>#9DB1F0</code></div>
    <div class="ds-kleur"><span style="background:#EFEFEF"></span><strong>Grijs</strong><code>$grey</code><code>#EFEFEF</code></div>
    <div class="ds-kleur"><span style="background:#F9F9F6"></span><strong>Gebroken wit</strong><code>$off-white</code><code>#F9F9F6</code></div>
    <div class="ds-kleur"><span style="background:#FFFFFF"></span><strong>Wit</strong><code>$white</code><code>#FFFFFF</code></div>
</div>

Rood en zwart dragen de site. Blauw komt terug in het logo, de footer en de titels van het contactblok.

### Letters

<div class="ds-voorbeeld container-sm">
    <p class="ds-letter ds-letter--kop">Helvetica Neue Bold</p>
    <p class="ds-meta">Koppen, navigatie, knoppen en labels</p>
    <p class="ds-letter">Atkinson Hyperlegible</p>
    <p class="ds-meta">Lopende tekst. Goed leesbaar, ook voor mensen met een visuele beperking.</p>
</div>

### Koppen

<div class="ds-voorbeeld container-sm">
    <h1>Kop 1</h1>
    <h2>Kop 2</h2>
    <h3>Kop 3</h3>
    <p>Lopende tekst. Een alinea staat in de tekstkolom van 720 pixels breed, met ruime regelafstand.</p>
</div>

Elke pagina heeft één h1: de paginatitel uit de front matter. Daaronder werk je met h2 en h3.

### Links en knoppen

<div class="ds-voorbeeld container-sm">
    <p><a href="#links">Gewone link in de tekst</a></p>
    <p><a href="#links" class="button" style="display: block; width: 100%; text-align: right">Doorverwijzing onder een sectie</a></p>
    <p><a href="#links" class="sectie__link">Alle workshops <span aria-hidden="true">→</span></a></p>
    <p><a href="#links" class="valprop__button">Knop in een foto-paneel</a></p>
</div>

<pre class="ds-code container-sm"><code>&lt;a href="/begeleiding/" class="button" style="display: block; width: 100%; text-align: right"&gt;Meer over begeleiding&lt;/a&gt;</code></pre>

### Label

<div class="ds-voorbeeld container-sm">
    <p class="sectie__label">Begeleiding</p>
</div>

Een klein rood label boven een grote kop, om een sectie aan te duiden. Hetzelfde label staat boven elke paginatitel: "Tiltshift" op de home, de naam uit het menu op de hoofdpagina's ("Sessies", "Begeleiding"), en een vaste naam per soort pagina ("Sessie", "Resultaat", "Post", "Materiaal", "Opdrachtgever"). Overschrijven kan met `label:` in de front matter.

## Moleculen {#moleculen}

Een paar atomen samen, met één taak.

### Quote

> "Als het makkelijk was, dan kon je het zelf wel."
>
> <small>Pierre Groenen, timmerman (en vader van Johan)</small>

<pre class="ds-code container-sm"><code>&gt; "Als het makkelijk was, dan kon je het zelf wel."
&gt;
&gt; &lt;small&gt;Pierre Groenen, timmerman (en vader van Johan)&lt;/small&gt;</code></pre>

### Beeld

<div class="article-image">
    <img src="/assets/img/foto/Tiltshift-Aanpak-Innovatie-Interventie-Vastgelopen-digitaliserings-project.jpg" alt="">
</div>

Een foto die breder is dan de tekstkolom (1024 pixels). Alle beschikbare foto's, met beschrijving, staan in de [image library](/image-library/). Foto's zijn zwart-wit met hoog contrast en korrel.

<pre class="ds-code container-sm"><code>&lt;div class="article-image"&gt;
    &lt;img src="/assets/img/foto/..." alt=""&gt;
&lt;/div&gt;</code></pre>

### Resultaatblok

<div class="container-md">
    <div class="grid grid--three">
        {% assign voorbeeld = site.projecten | where: "url", "/projecten/digitaal-indelen-straatmarkten/" | first %}
        {% include image-link-block.html image=voorbeeld.image title=voorbeeld.title excerpt=voorbeeld.excerpt url=voorbeeld.url %}
    </div>
</div>

Een resultaat: de foto van het project (`image`, niet `featured_image`) in grijstinten met extra contrast, de titel wit over een donker verloop en de korte omschrijving eronder. Bij hover zoomt de foto iets in.

<pre class="ds-code container-sm"><code>{% raw %}{% include image-link-block.html image=project.image title=project.title excerpt=project.excerpt url=project.url %}{% endraw %}</code></pre>

## Organismen {#organismen}

Zelfstandige blokken die je los op een pagina zet.

### Foto-paneel (valprop)

{% include valprop.html title="Kwartiermakers van publieke digitalisering" description="We begeleiden je in je organisatie, met de mensen die het werk doen. Tot jullie het zelf kunnen." image="/assets/img/foto/Tiltshift-Aanpak-Innovatie-Interventie-Vastgelopen-digitaliserings-project.jpg" url="/begeleiding/" button="Meer over begeleiding" %}

Het kenmerkende blok van de site: foto, gekanteld rood vlak, witte tekst en een zwarte knop. Zonder `url` en `button` linkt de knop naar /contact/.

<pre class="ds-code container-sm"><code>{% raw %}{% include valprop.html title="..." description="..." image="/assets/img/foto/…" url="/begeleiding/" button="Meer over begeleiding" %}{% endraw %}</code></pre>

### Workshopkaart

{% assign voorbeeldsessie = site.sessies | sort: "order" | first %}
<div class="sessie-kaarten container-sm">
    {% include sessie-kaart.html sessie=voorbeeldsessie %}
</div>

Een foto-paneel gevuld met de gegevens van een workshop: titel, uitkomst, duur en prijs. Staat er "Vraag om offerte", dan blijft de prijs weg.

<pre class="ds-code container-sm"><code>{% raw %}{% include sessie-kaart.html sessie=sessie %}{% endraw %}</code></pre>

### Waardepropositie

Naar het landingspagina-template van Strategyzer: pijn en winst naast elkaar. Links "Herken je dit?" (de pijn van de klant), rechts "Wat het oplevert" (de winst). Het product zelf staat in de sectie erna, "Wat we gaan doen". De bullets maken het verschil zichtbaar: een rood vierkantje bij de problemen, het onderbroken blauwe frame uit het logo bij wat het oplevert. Het vierkantje staat recht, het frame in dezelfde hoek als in het logo. Het frame staat los in `assets/img/frame-blauw.svg`, en dikker voor kleine maten in `frame-blauw-bullet.svg`. Op een workshoppagina staat dit direct na de opdrachtgevers; de lijsten komen uit `herkenning:` en `meenemen:`, de tekst uit `aanpak_intro:`.

{% assign ds_ws = site.sessies | where_exp: "s", "s.path contains 'crazy-8s'" | first %}
{% include propositie.html pijn=ds_ws.herkenning winst=ds_ws.meenemen %}

<pre class="ds-code container-sm"><code>{% raw %}{% include propositie.html pijn=page.herkenning winst=page.meenemen %}{% endraw %}</code></pre>

### Herken je dit?

Drie herkenbare situaties op een lichtgrijs, schuin gesneden vlak: een gekanteld rood blokje, een grote zwarte uitspraak en een korte toelichting. Bewust niet zwart, want een zwarte band leest als de footer. Op een workshoppagina komen de items uit `herkenning:` in de front matter.

{% assign ds_herkenning = site.sessies | where_exp: "s", "s.path contains 'crazy-8s'" | first %}
{% include herkenning.html items=ds_herkenning.herkenning %}

<pre class="ds-code container-sm"><code>{% raw %}{% include herkenning.html items=page.herkenning %}{% endraw %}</code></pre>

### Stappen

{% assign voorbeeldstappen = site.pages | where: "url", "/workshops/" | first %}
{% include stappen.html items=voorbeeldstappen.stappen %}

Genummerde stappen. De stappen staan in de front matter van de pagina. Met `start=0` begint de telling bij 0.

<pre class="ds-code container-sm"><code>{% raw %}{% include stappen.html items=page.stappen %}{% endraw %}</code></pre>

### Stappen, kort

Genummerde stappen met alleen een titel en één korte regel (`kort:` per stap). Op een workshoppagina staan ze als "Wat we gaan doen" in een sectie met een foto (`aanpak_beeld:`).

{% assign ds_ws2 = site.sessies | sort: "order" | first %}
<div class="container-sm">{% include stappen-kort.html items=ds_ws2.stappen start=0 %}</div>

<pre class="ds-code container-sm"><code>{% raw %}{% capture stappen %}{% include stappen-kort.html items=page.stappen start=0 %}{% endcapture %}
{% include sectie.html label="Aanpak" kop="Wat we gaan doen" inhoud=stappen beeld=beeld %}{% endraw %}</code></pre>

### Praktisch

{% include praktisch.html duur="Eén dag, plus een korte intake vooraf" deelnemers="In overleg" locatie="Bij jou op kantoor of wij regelen de locatie" investering="Vraag om offerte" %}

<pre class="ds-code container-sm"><code>{% raw %}{% include praktisch.html duur=page.duur deelnemers=page.deelnemers locatie=page.locatie investering=page.investering %}{% endraw %}</code></pre>

### Contactblok

In dezelfde beeldtaal als de mensenrijen: portret met het gekantelde rode vlak, een rood label en een grote kop, de naam als zwarte strook half over de foto, en het telefoonnummer groot. Het portret en de naam horen bij wie het nummer opneemt (zie het [adresboek](/adresboek/)). Het e-mailadres is altijd het persoonlijke adres van die persoon, nooit info@ of administratie@: die staan alleen op [/contact/](/contact/) en in de footer. Zonder `header` is de kop "Even bellen?".

{% include cta.html header="Wat kunnen we voor jouw organisatie betekenen?" persoon="johan" %}

De foto is het portret uit `_data/mensen.yml` (veld `portret`). Het veld `img` is het kleine plaatje voor de e-mailhandtekening; dat gebruikt het contactblok alleen als er geen portret is. Er staat altijd een foto in het contactblok: zonder portret en zonder `img` valt het terug op een standaardfoto.

<pre class="ds-code container-sm"><code>{% raw %}{% include cta.html header="..." description="..." persoon="johan" %}{% endraw %}</code></pre>

### Sectie

Een losstaand blok op een pagina: label, kop, tekst en link, met een beeld ernaast. Met `knop=true` wordt de link een zwarte knop, voor de belangrijkste actie. Secties wisselen vanzelf af: de eerste heeft de tekst links en het beeld rechts, de volgende andersom. Je geeft dat niet zelf aan.

- **Vanaf 1280 pixels**: twee kolommen. De tekst staat op de inhoudskolom, het beeld loopt door tot de schermrand en het rode vlak steekt uit naar de schermrand. Tekst en beeld lijnen boven uit, met veel ruimte boven de sectie.
- **Tussen 768 en 1280 pixels**: onder elkaar, het beeld schermbreed in 3:2.
- Het beeld is meestal een foto-paneel. Zonder `title` toont de valprop alleen de foto met het rode vlak, zodat de tekst niet dubbel staat: `{% raw %}{% include valprop.html image="..." alt="..." %}{% endraw %}`.
- **Mobiel**: onder elkaar, het beeld schermvullend.

{% capture ds_beeld %}{% include valprop.html title="Beeld rechts" description="Oneven sectie: tekst links, beeld rechts." image="/assets/img/foto/Straatnotes-Veilig-Notities-maken-op-straat-jeugdoverlast.jpg" url="#organismen" button="Knop" %}{% endcapture %}
{% include sectie.html label="Label" kop="Oneven sectie" tekst="Tekst links, beeld rechts. Het beeld loopt door tot de rechter schermrand." link="#organismen" linktekst="Link" beeld=ds_beeld %}

{% capture ds_beeld %}{% include valprop.html title="Beeld links" description="Even sectie: beeld links, tekst rechts." image="/assets/img/foto/Careyn-Joris-Boeren-leiderschap-traject-nieuwe-website.jpg" url="#organismen" button="Knop" %}{% endcapture %}
{% include sectie.html label="Label" kop="Even sectie" tekst="Beeld links, tekst rechts. Het rode vlak staat in spiegelbeeld en steekt uit naar de linker schermrand." beeld=ds_beeld %}

<pre class="ds-code container-sm"><code>{% raw %}{% capture beeld %}{% include valprop.html ... %}{% endcapture %}
{% include sectie.html label="Begeleiding" kop="..." tekst="..." link="/begeleiding/" linktekst="Meer over begeleiding" beeld=beeld %}{% endraw %}</code></pre>

**Tekstsectie.** Zonder beeld maar met `inhoud` (markdown, via `capture`) staan label en kop links en de inhoud rechts. De kop blijft altijd links en schuift mee tijdens het scrollen. In `inhoud` werken alinea's, lijsten en quotes gewoon. `inhoud` werkt ook in een sectie met beeld, in plaats van `tekst`.

{% capture ds_inhoud %}
Gedoe komt er toch. Dus niet alles tot in de puntjes plannen, maar vooral beginnen.

> "Als het makkelijk was, dan kon je het zelf wel."
{% endcapture %}
{% include sectie.html label="Label" kop="Tekstsectie" inhoud=ds_inhoud %}

<pre class="ds-code container-sm"><code>{% raw %}{% capture inhoud %}
Alinea's, lijsten en quotes in markdown.
{% endcapture %}
{% include sectie.html label="Onze aanpak" kop="Durven doen" inhoud=inhoud %}{% endraw %}</code></pre>

Met `breed=true` staat het beeld niet naast de tekst maar eronder, over de volle breedte. Het tekstblok verspringt dan links en rechts. Zo staan opdrachtgevers en resultaten op de home.

<pre class="ds-code container-sm"><code>{% raw %}{% capture opdrachtgevers %}{% include klanten-uitgelicht.html %}{% include logos-relaties.html %}{% endcapture %}
{% include sectie.html breed=true label="Opdrachtgevers" kop="Voor wie we werken" tekst="..." beeld=opdrachtgevers %}{% endraw %}</code></pre>

### Blokken

Eén groot blok met twee kleine blokken ernaast, boven elkaar. Bijvoorbeeld een uitgelichte workshop met twee andere workshops. Het grote blok heeft het gekantelde rode vlak, de kleine blokken niet. Met `blokken--gespiegeld` staat het grote blok rechts. Op mobiel staan de blokken onder elkaar.

{% capture ds_c8_url %}{% include workshop-url.html naam="crazy-8s" %}{% endcapture %}{% assign ds_c8_url = ds_c8_url | strip %}
<div class="blokken container-md">
    {% include blok.html titel="Crazy 8's-workshop" tekst="Je team schetst ideeën en werkt de beste samen uit. Aan het eind ligt er een concept waar iedereen achter staat." afbeelding="/assets/img/materialen/Workshop-Crazy-Eight-Ideation-Warroom.jpg" url=ds_c8_url linktekst="Bekijk workshop" %}
    {% include blok.html titel="Empathy map-workshop" tekst="Interviews samenvatten in wat gebruikers denken, voelen, zien en doen." afbeelding="/assets/img/posts/Empathy-Map-Gebruiken-Resultaten-Interviews-Verwerken.jpg" url="#blokken" linktekst="Bekijk workshop" %}
    {% include blok.html titel="Design sprint" tekst="Van probleem naar getoetst prototype." afbeelding="/assets/img/foto/Schulddossier-Design-Thinking-Schulddienstverlening.jpg" url="#blokken" linktekst="Bekijk workshop" %}
</div>

<div class="blokken blokken--gespiegeld container-md">
    {% include blok.html titel="Groot blok rechts" tekst="Dezelfde blokken, gespiegeld." afbeelding="/assets/img/foto/Stadspas-Zwolle-Sessie.jpg" url="#blokken" linktekst="Link" %}
    {% include blok.html titel="Klein blok" afbeelding="/assets/img/foto/Digitaal-Indelen-Markt-Amsterdam-Marktmeesters.jpg" url="#blokken" linktekst="Link" %}
    {% include blok.html titel="Klein blok" afbeelding="/assets/img/foto/Woonstad-Herinrichting-ICT-afdeling.jpg" url="#blokken" linktekst="Link" %}
</div>

<pre class="ds-code container-sm"><code>{% raw %}&lt;div class="blokken container-md"&gt;
    {% include blok.html titel="..." tekst="..." afbeelding="/assets/img/..." url="..." linktekst="Bekijk workshop" %}
    {% include blok.html ... %}
    {% include blok.html ... %}
&lt;/div&gt;{% endraw %}</code></pre>

### Boekbalk

Een balk die onderin beeld vast blijft staan op de workshoppagina's: links de naam, duur en prijs van de workshop, rechts de knop "Boek deze workshop" naar `/boeken/?workshop=…`. Op mobiel alleen de naam en de knop. Omdat hij vast staat, is hij hier niet als voorbeeld getoond.

<pre class="ds-code container-sm"><code>{% raw %}{% include boek-balk.html titel=page.title tekst="Eén dag · Vraag om offerte" link="/boeken/?workshop=crazy-8s" %}{% endraw %}</code></pre>

### Reeks

Workshops die bij elkaar horen langs de looptijd van een opdracht, zoals de drie publieke-codeworkshops. Ze staan als blokken in leesvolgorde: stap 1 en 2 klein links, stap 3 groot rechts (`blokken--groot-laatst`), met een rood stapnummer en het moment boven de titel. Op een workshoppagina van de reeks staat bij de huidige stap "Je bent hier". Een workshop hoort bij een reeks met `reeks:`, `reeks_stap:` en `reeks_moment:` in de front matter. Op /workshops/ krijgt een reeks een eigen sectie. Label, kop en tekst van de reeks staan in `_data/reeksen.yml`.

{% include reeks.html reeks="publieke-code" %}

<pre class="ds-code container-sm"><code>{% raw %}{% include reeks.html reeks=page.reeks huidig=page.url %}{% endraw %}</code></pre>

### Checklist

Een lijst met lege vinkvakjes, voor wat er geregeld moet worden. Op een workshoppagina uit `checklist:` in de front matter, als tekstsectie "Wat je bij de start regelt".

<div class="container-sm"><ul class="checklist"><li>Maak een LICENSE aan in de repository (EUPL 1.2).</li><li>Maak een publiccode.yml aan.</li></ul></div>

### Terugbelformulier

Twee velden: "E-mail of telefoon" (verplicht) en "Extra info" (optioneel). Zonder API opent het een vooraf ingevulde e-mail aan het adres bij `mail` in `_data/terugbellen.yml` (johan.groenen@). Staat er een adres bij `endpoint` in `_data/terugbellen.yml`, dan stuurt het een POST met JSON naar de eigen mini-API (`contact`, `info`, `pagina`, `url`). Mislukt dat, dan valt het terug op e-mail. Een verborgen veld `website` vangt spambots af. Het formulier staat in het contactblok met `formulier=true`. Op de pagina [/boeken/](/boeken/) staat het met een keuzelijst van workshops (`kies=true`); met `?workshop=crazy-8s` in de URL is de juiste workshop al gekozen. Met `?workshop=weet-ik-nog-niet` staat "Weet ik nog niet" gekozen; zo linkt de knop "Neem contact op" op [/workshops/](/workshops/). De workshoppagina's linken daarheen met hun knop "Boek deze workshop". Naam, telefoon en e-mail staan dan onder de foto.

{% include cta.html header="Zullen we je terugbellen?" persoon="johan" formulier=true onderwerp="Design system" %}

<pre class="ds-code container-sm"><code>{% raw %}{% include cta.html header="..." description="..." formulier=true onderwerp=page.title %}{% endraw %}</code></pre>

### Workshop-etalage

{% include sessies-etalage.html %}

Een sectie met de uitgelichte workshops (`featured: true`) als beeld, met daaronder een link naar alle workshops. Kop en tekst komen standaard uit `title:` en `intro:` van [/workshops/](/workshops/) (`pages/workshops.md`); pas ze per plek aan met `label`, `title` en `intro`.

<pre class="ds-code container-sm"><code>{% raw %}{% include sessies-etalage.html intro="..." %}{% endraw %}</code></pre>

### Begeleiding-sectie

{% include begeleiding-sectie.html %}

Een sectie die naar [/begeleiding/](/begeleiding/) verwijst. Kop en tekst komen uit `teaser:` in `pages/begeleiding.md`, zodat ze op home en /workshops/ gelijk blijven. Met `vraag` zet je een vraag voor de kop. Met `kop_voor` sluit de kop aan op wat erboven staat: met `kop_voor="Of"` wordt het "Of we lopen mee tot het werkt.", zoals op /workshops/ onder de workshops. Met `tekst_voor` zet je iets voor de tekst. Met `beeld` geef je een eigen beeld mee in plaats van de foto met link.

<pre class="ds-code container-sm"><code>{% raw %}{% include begeleiding-sectie.html kop_voor="Of" tekst_voor="Meer nodig dan een workshop?" %}{% endraw %}</code></pre>

### Resultaten

{% include projects-homepage.html title="Resultaten" slugs="van-verouderde-it-naar-innovatieve-digitale-woningcorporatie,digitaal-indelen-straatmarkten,de-stadspas-die-geen-stadspas-werd" %}

Drie resultaten naast elkaar. Met `slugs` kies je welke, zonder `slugs` toont het blok de resultaten met `featured: true`.

<pre class="ds-code container-sm"><code>{% raw %}{% include projects-homepage.html title="Resultaten van begeleiding" slugs="slug-1,slug-2,slug-3" %}{% endraw %}</code></pre>

### Resultaten-sectie

{% include resultaten-sectie.html %}

De resultaten als brede sectie met een link naar alle resultaten, zoals op home, /begeleiding/ en de pagina's van mensen. Kop en tekst komen uit `teaser:` in `pages/projecten.md`, zodat ze overal gelijk blijven. Met `slugs` kies je de resultaten, met `kop` en `tekst` wijk je af (op een persoonspagina: "… in actie" met de voornaam, zonder tekst).

<pre class="ds-code container-sm"><code>{% raw %}{% include resultaten-sectie.html slugs="slug-1,slug-2,slug-3" %}{% endraw %}</code></pre>

### Opdrachtgevers

{% include klanten-uitgelicht.html %}

{% include logos-relaties.html %}

<pre class="ds-code container-sm"><code>{% raw %}{% include klanten-uitgelicht.html %}
{% include logos-relaties.html %}{% endraw %}</code></pre>

### Mensen

Per persoon een groot portret met het gekantelde rode vlak, de naam groot ernaast en half over de foto, op witte stroken. Daaronder rol, eigen quote en een link naar de mensenpagina. De rijen wisselen om en om van links naar rechts. Op mobiel staat de naam over de onderkant van de foto. De gegevens komen van de mensenpagina's in `_mensen/`: `firstname`, `lastname`, `role`, `quote` en `personImage`.

{% include mensen-rijen.html %}

<pre class="ds-code container-sm"><code>{% raw %}{% include mensen-rijen.html %}
{% include mensen-rijen.html zonder=page.url %}{% endraw %}</code></pre>

Met `zonder` laat je één persoon weg, zoals op een mensenpagina, waar onderaan de collega's staan. Eén rij los, als opening van een mensenpagina: de naam wordt dan de h1 en in plaats van de link staan de contactgegevens (telefoon, e-mail, LinkedIn en vCard).

<ul class="mensen-rijen">
{% assign ds_persoon = site.mensen | where: "url", "/mensen/rutger-dik/" | first %}{% include mensen-rij.html persoon=ds_persoon hoofd=true %}
</ul>

<pre class="ds-code container-sm"><code>{% raw %}&lt;ul class="mensen-rijen"&gt;
    {% include mensen-rij.html persoon=page hoofd=true %}
&lt;/ul&gt;{% endraw %}</code></pre>

### Navigatie en footer

De navigatie boven en de footer onder deze pagina. Ze zitten in elke template en zet je niet zelf op een pagina. Vanaf 1280 pixels staat het logo onder de zwarte balk, links naast de inhoudskolom, en groeit het mee met de vrije ruimte daar (tot 180 pixels). De LinkedIn- en Mastodon-knoppen staan altijd naast de menu-items, en op mobiel in het uitklapmenu onder de menu-items (`_includes/social-links.html`).

## Templates {#templates}

Het skelet van een pagina. Er zijn er twee, en ze delen dezelfde basis.

- **`default`**: navigatie, de paginatitel als h1, de inhoud in de tekstkolom van 720 pixels, een contactblok onderaan en de footer. Het contactblok vervalt als de pagina er zelf al een heeft, of met `contactblok: false` in de front matter. Met `contactpersoon: joris` kies je wie erin staat. Met `intro:` komt er een korte inleiding onder de paginatitel. Beelden en rasters mogen breder (1024 pixels). Gebruikt door bijna alle pagina's.
- **`person`**: een mensenpagina. Bovenaan de persoon als rij met contactgegevens, dan de eigen tekst en de projecten als tekstsecties, en onderaan de collega's als rijen en het contactblok.
- **`sessie`**: de `default`-template met een vaste volgorde van workshop-onderdelen, naar het Strategyzer-template: waardepropositie met boekknop als sectie met foto-paneel, opdrachtgevers, pijn/product/winst, dan de details: herkenning, stappen, wat je meeneemt, voor wie, praktisch, andere sessies en het contactblok. De inhoud komt uit de front matter van het sessiebestand.

## Pagina's {#paginas}

De templates gevuld met echte inhoud.

- [Home](/): een inleiding onder de titel en vier secties. Workshop-etalage, begeleiding met foto-paneel, en resultaten en opdrachtgevers als brede secties
- [Workshops](/workshops/): de workshops als blokken, begeleiding als sectie, stappen en contactblok
- [Crazy 8's-workshop]({% include workshop-url.html naam="crazy-8s" %}): de `sessie`-template
- [Begeleiding](/begeleiding/): quote, secties met foto-paneel, resultaten als brede sectie, de aanpak als tekstsecties en secties met foto, en het contactblok
- [Mensen](/mensen/): twee secties met foto-paneel en quote, en de mensen als rijen in een brede sectie
