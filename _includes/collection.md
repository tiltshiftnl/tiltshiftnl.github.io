{% assign collection = include.collection | sort: 'order' %}
{% for item in collection %}
## {{ item.title }}
{{ item.description }}<br>
[Verder lezen]({{ item.url }})<br>
{% if item.type %}<span class="label">{{ item.type | downcase }}</span> {% endif %}
{% for label in item.labels %}<span class="label">{{ label }}</span> {% endfor %}
{% endfor %}
