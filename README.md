# tiltshiftnl.github.io
Tiltshift website

Je kunt de TiltShift website op twee manieren lokaal draaien. Via Docker en via Jekkyl.

## Docker

```
docker run -it --rm -v "$PWD":/usr/src/app -p
"4000:4000" starefossen/github-pages
```

# Installeren op Ubuntu

## Jekyll
Op de volgende plekken kan je informatie vinden over hoe Jekkyl te installeren op je systeem.

- [https://jekyllrb.com/docs/installation/](https://jekyllrb.com/docs/installation/)
- [https://jekyllrb.com/docs/installation/macos/](https://jekyllrb.com/docs/installation/macos/)


## Install Jekkyl on Ubuntu:
https://jekyllrb.com/docs/installation/ubuntu/

## Installeer benodigde packages
bundle install

## Jekyll development
Om Jekyll met livereload te draaien run je het volgende command:
```bundle exec jekyll serve --livereload```

