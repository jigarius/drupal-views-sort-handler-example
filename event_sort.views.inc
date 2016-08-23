<?php

/**
 * @file
 * Views code for event_sort.
 */

/**
 * Implements hook_views_data_alter().
 */
function event_sort_views_data_alter(&$data) {
  // Bind the custom sort plugin to the concerned field.
  // Here, we are binding it to "field_event_date" for demo purposes.
  $data['node__field_date']['field_date_value']['sort']['id'] = 'event';
}
