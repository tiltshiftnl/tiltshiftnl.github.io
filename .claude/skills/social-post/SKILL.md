---
name: social-post
description: Maak de wekelijkse social post van Tiltshift, voor LinkedIn (commercieel) of Mastodon (community), als post in _posts/ (soort: social). Gebruik bij "social post", "post voor deze week", "LinkedIn-post", "Mastodon-post" of /social-post.
---

# Wekelijkse social post

Elke week één post die het merk ("Aan de slag.") en de workshops en begeleiding van Tiltshift laat zien. De post komt op Mastodon (mastodon.nl/@tiltshift) en LinkedIn (linkedin.com/company/tiltshiftnl). Claude schrijft het concept; de gebruiker plaatst het zelf en commit zelf.

## Welk kanaal

Een post is voor één kanaal:
- **LinkedIn: commercieel.** Workshops (zoals de Meekijkdag) en begeleiding. Het doen promoten, met een link waar je het bij Tiltshift koopt (zie hieronder). Alleen `linkedin:` en `linkedin_url:`.
- **Mastodon: community.** Meetups (zoals Werken aan Publieke Code), de open source community, werk van anderen. Informeren en uitnodigen, niet verkopen. Alleen `mastodon:` en `mastodon_url:`.

Kan een onderwerp allebei zijn, vraag het dan.

## Waar een commerciële post (LinkedIn) over gaat

Een post promoot het **doen** van iets dat Tiltshift organiseert: een Meekijkdag doen, testen met gebruikers, werken met de Standaard voor Publieke Code. Niet Tiltshift zelf. Zo promoten we de juiste manier van werken. De link onderaan is de plek waar je het bij Tiltshift kunt kopen of boeken (de workshoppagina, de aanmeldpagina van een meetup).

Opbouw:
1. **Herkenning.** De situatie waarin de lezer zit, uit de `herkenning:` van de workshoppagina. Hier mag de post openen met "Herken je dit?".
2. **Doe dan eens …** Wat je dan doet, in de je-vorm: de lezer en het team doen het, niet "Tiltshift zorgt voor". Bijvoorbeeld: "Doe dan eens een Meekijkdag. In één dag je product of prototype testen met echte gebruikers. En met je hele team vanuit een andere ruimte live meekijken."
3. **Wat het oplevert.** Uit `meenemen:` van de workshoppagina.
4. **Voor wie**, in één zin, en dat Tiltshift het voor je organiseert.
5. "Aan de slag." en de link.

Wat Tiltshift regelt (testpersonen, facilitator, gebruikerstester) hoort op de workshoppagina, niet in de post.

## Werkwijze

1. **Kijk wat er al was.** Lees de laatste acht posts met `soort: social` in `_posts/` (front matter `onderwerp`, `title`). Kies geen onderwerp dat in de laatste vier weken al aan bod kwam.
2. **Kies een onderwerp.** Wissel af:
   - één workshop uit `_sessies/` (link: `/workshops/<naam>/`)
   - begeleiding (`/begeleiding/`): kwartiermaken, in-house teams, open source hergebruik, community building
   - een resultaat uit `_projecten/` (alleen bestanden zonder `_` ervoor)
   - een materiaal uit `_materialen/`
   - het merk en de houding: "Aan de slag."
   - een bijeenkomst uit `_data/agenda.yml` die in de komende twee weken valt, zoals de maandelijkse meetup over de Standaard voor Publieke Code (Tiltshift organiseert die samen met ICATT). Een komende bijeenkomst gaat voor op de andere onderwerpen. De link is dan de aanmeldpagina van de bijeenkomst.
   Heeft de gebruiker een onderwerp of aanleiding genoemd, dan gaat dat voor. Nieuwe bijeenkomst genoemd? Zet hem ook in `_data/agenda.yml`, zodat hij op /meetups/ komt.
3. **Lees de bronpagina** en haal er alleen uit wat er echt staat. Verzin geen klanten, cijfers, data of resultaten.
4. **Kies een beeld** uit `_data/afbeeldingen.yml` (het beeld van de bronpagina heeft de voorkeur) en schrijf een korte alt-tekst: wat er te zien is, in één zin. Maak daarna het **social-beeld**: de foto met het transparante logo en "Aan de slag." links ervan, onderin, 1200 × 675. Gebruik het sjabloon `.claude/skills/social-post/beeld.html` (het commando staat bovenin dat bestand) en sla het op als `assets/img/social/<datum>-<slug>.jpg` (eerst PNG, dan omzetten naar JPG; zie het sjabloon). Bekijk het resultaat: staat het logo niet op een gezicht of op iets belangrijks? Zet het pad in `social_beeld:`. Op de pagina van de post blijft `image:` (de gewone foto) staan; het social-beeld is om te plaatsen.
5. **Schrijf het bestand** `_posts/JJJJ-MM-DD-<korte-slug>.md`, met als datum de dag waarop de post de deur uit gaat (vraag het als het niet duidelijk is). Let op: Jekyll bouwt geen posts met een datum in de toekomst. Een post voor later verschijnt pas op de site na een build op of na die datum; lokaal zie je hem met `jekyll serve --future`. Gebruik de opbouw hieronder.
6. **Laat de tekst zien** in het antwoord, verwijs naar de eigen pagina van de post, per kanaal, klaar om te kopiëren. Noem bij Mastodon het aantal tekens.
7. **Na het plaatsen** zet de gebruiker (of Claude, als die erom vraagt) `status: geplaatst` en vult `mastodon_url` en `linkedin_url` in.

## Bestand

```markdown
---
layout: social
soort: social
hideBanner: true
status: concept # concept of geplaatst
title: "<titel, zoals boven een blogpost: zeg waar het over gaat>"
teaser: "<eerste alinea van de tekst>"
description: "<idem>"
onderwerp: <workshops | workshop-naam | begeleiding | project-naam | materiaal-naam | merk>
link: https://www.tiltshift.nl/<pad>/
image: /assets/img/<pad>.jpg
social_beeld: /assets/img/social/<datum>-<slug>.jpg
alt: "<alt-tekst>"
mastodon_url:
linkedin_url:

mastodon: |
  <tekst, twee spaties ingesprongen, witregels tussen alinea's>

linkedin: |
  <tekst>
---
```

Zet alleen het kanaal van deze post in het bestand: `linkedin:` en `linkedin_url:` voor een commerciële post, `mastodon:` en `mastodon_url:` voor een community post. De teksten staan in de front matter (blok met `|`), zodat ze letterlijk blijven zoals ze zijn geschreven: geen Markdown-opmaak, want die werkt niet op Mastodon en LinkedIn.

Het zijn gewone posts: ze staan op /posts/ en hebben een eigen pagina. De layout `social` (`_layouts/social.html`) toont daar het beeld en de tekst (LinkedIn, of anders Mastodon); de link wordt een link en de hashtags vallen weg. Lokaal (`jekyll serve`) staat onder de post een blok om te plaatsen: status, beeld met alt-tekst, de tekst per kanaal met tekenteller en kopieerknoppen. Op tiltshift.nl (production) staat dat blok er niet. Een concept staat dus ook publiek op de site zodra `master` gepusht is.

## Per kanaal

**Mastodon**
- Hooguit 500 tekens, alles meegeteld. Een link telt als 23 tekens.
- Kort: twee of drie korte alinea's.
- Drie of vier hashtags aan het eind, in CamelCase (voor schermlezers): `#PubliekeDigitalisering #OpenSource #PubliekeCode #DesignThinking #GovTech`.
- Het beeld altijd met alt-tekst plaatsen.

**LinkedIn**
- 600 tot 1200 tekens. De eerste twee regels zijn zichtbaar zonder "meer weergeven": zeg daar meteen waar het over gaat.
- Korte alinea's met witregels.
- Drie tot vijf hashtags aan het eind, kleine letters: `#publiekedigitalisering #opensource #publiekecode #softwaredesign #overheid`.

**Beide**
- Eén onderwerp per post.
- Sluit af met de regel "Aan de slag." en daaronder de link naar de pagina op tiltshift.nl. Zo komt het merk elke week terug.
- Geen @-vermeldingen van mensen of organisaties, tenzij de gebruiker erom vraagt.
- Nooit verwijzen naar LinkedIn als plek om te volgen ("volg ons op LinkedIn"). Ook niet op Mastodon.

## Stem

Schrijf als een timmerman: "ik kan dit, dus ik kan je helpen". Rust en zelfvertrouwen, zonder verkooppraat.
- Zeg wat we doen, hoe lang het duurt en voor wie. Geen bijvoeglijke naamwoorden om onszelf te verkopen.
- Korte zinnen, gewone woorden. Geen beeldspraak, grapjes, drieslagen, "geen X, maar Y", "Je kent het:", vragen als haakje, uitroeptekens of emoji.
- Leg de lezer zijn probleem niet uit en maak het niet dramatisch ("vastgelopen"). Zeg dat het te doen is.
- "We", niet "wij". "De mensen die het doen", niet "die het moeten doen". "Uitvoering", niet "uitvoer". Niet amicaal tegen een anonieme lezer.
- De lezer is meestal een directeur of manager in de publieke sector die wil dat een team geholpen wordt. Val het team niet af; het team leest mee.

## Positionering

- Tiltshift organiseert en begeleidt workshops en projecten in publieke digitalisering: software design thinking, opensourcewerken en publieke code.
- Tiltshift bouwt en levert zelf geen software. Wel: begeleiden, en regelen wat nodig is (leveranciers, levering als dienst of intern, interne perikelen) tot het in de organisatie werkt.
- Een workshop is één dag en levert helderheid over de volgende stap op; daarna gaat het team zelf verder. Begeleiding is het eigenlijke werk.

## Niet doen

- Niet zelf plaatsen, committen of pushen.
- Niets beweren wat niet op de site of in de repo staat.
