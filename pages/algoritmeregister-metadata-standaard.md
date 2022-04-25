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
## {{ page.subtitle }}

Deze link is verplaatst. Een moment geduld, u wordt doorgeleid naar [{{ page.forward }}]({{ page.forward }}).

<p id="count"></p>

<script>
    var count = 5;
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