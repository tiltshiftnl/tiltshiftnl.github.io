{% assign collection = include.collection | sort: 'order' %}
{% for item in collection %}
# [{{ item.title }}]({{ item.url }})
<p>
  {{ item.description }}<br>
  {% if item.type %}
  <span class="label">{{ item.type | downcase }}</span>
  {% endif %}
  {% for label in item.labels %}
  <span class="label">{{ label }}</span>
  {% endfor %}
</p>
{% endfor %}