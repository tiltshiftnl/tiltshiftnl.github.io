<?php

$products = [
    "Innovatie",
    "Design",
    "Design Thinking",
    "Agile Development",
    "Software",
    "Software Ontwikkeling",
    "Software Design",
    "Innovatiepartner",
    "De Innovatiepartner",
    "Realisatiepartner",
    "Labs",
    "Advies",
    "Open Source",
    "Datagedreven Werken",
    "Design Sprints",
    
];
$targets = [
    "uw Gemeente",
    "Gemeenten",
    "Provincies",
    "uw Provincie",
    "de Overheid",
    "Overheden",
    "de Publieke Sector",
    "de Zorg",
    "de Thuiszorg",
    "Common Ground"
];

$template = <<<EOT
---
layout: default
variant: red

title: __title__
description: Wij maken software voor de publieke sector. Dat doen we samen met de mensen die onze software gebruiken. Onze aanpak is gebaseerd op een combinatie van bestaande technieken als Design Thinking, Service Design, Lean Startup en Agile. [Lees meer over ons.](/)
quote: Veranderen begint met iets anders doen

keywords: __keywords__
labels: [__keywords__]

image: /assets/img/foto/ZC-choose.jpg
caption: 'Design Sprint "Meten klanttevredenheid in de zorg", De Zorgcirkel'
---
{{ page.description }}
EOT;

foreach ($products as $p) {
    foreach ($targets as $t) {
        $title = "{$p} voor {$t}";
        $keywords = str_replace(" ", ",", strtolower("{$p} {$t}"));
        $filename = str_replace(" ", "-", strtolower($title)) . ".md";
        echo "$title\n";
        $content = str_replace(["__title__", "__keywords__"], [$title, $keywords], $template);
        file_put_contents($filename, $content);
    }
}