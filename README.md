# event_sort

This is an example implementation of a custom views sort handler for Drupal 8.

It's meant to sort events in a way that shows users the most interesting events first:

* Future events come before past events
* Events closest to today come before events far in the past or future

![Correctly sorted view](https://evolvingweb.ca/sites/default/files/inline-images/views-sort-blog-post_1.png)

## Usage

Note that this is a sample of a custom module. The [hook_views_data_alter()](event_sort.views.inc#L11) assumes the field name is _field_date_, but if that's not the case in your project, you can write a custom hook_views_data_alter() that applies it to a different field or property.
