---
layout: default
variant: white
permalink: /algoritmeregister-metadata-standaard/

title: Algoritmeregister
subtitle: Metadata Standaard

forward: "https://www.algoritmeregister.org"

description: ""
keywords: ""

image: "assets/img/foto/IMG_8562.jpg"
caption: 'Fixxx Ideation "Schulddossier", Gemeente&nbsp;Amsterdam'
---
Tiltshift stond aan de wieg van het Algoritmeregister voor de Nederlandse Overheid en heeft dit project succesvol overgedragen naar het Ministerie van Binnenlandse Zaken en Koninkrijksrelaties. Het Algoritmeregister is een initiatief van de Nederlandse overheid om transparantie te bieden over algoritmes die door de overheid worden gebruikt.

Deze link is verplaatst. Een moment geduld, u wordt over <span id="count"></span> seconden doorgeleid naar [{{ page.forward }}]({{ page.forward }}).

<script>
    var count = 30;
    setTimeout(function () {
        window.location.replace("{{ page.forward }}");
    }, 1000 * count);
    document.getElementById("count").innerHTML = count;
    setInterval(function () {
        if (count > 1)
            document.getElementById("count").innerHTML = --count;
        else
            document.getElementById("count").innerHTML = "🚀";
    }, 1000);
</script>