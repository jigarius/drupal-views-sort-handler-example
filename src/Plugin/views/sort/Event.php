<?php

namespace Drupal\event_sort\Plugin\views\sort;

use Drupal\Core\Cache\CacheableDependencyInterface;
use Drupal\views\Plugin\views\sort\SortPluginBase;

/**
 * Handle sorting of events.
 *
 * Show future events first sorted in chronological order and
 * then show past events sorted in reverse-chronological order.
 *
 * @ViewsSort("event")
 */
class Event extends SortPluginBase implements CacheableDependencyInterface {

  /**
   * {@inheritdoc}
   */
  public function query() {

    $this->ensureMyTable();

    // Generate an alias for the date field.
    $field_alias = $this->tableAlias . '.' . $this->realField;

    // Is this event in the past?
    $this->query->addOrderBy(NULL,
      "UTC_TIMESTAMP() > STR_TO_DATE($field_alias, '%Y-%m-%dT%H:%i:%s')",
      $this->options['order'],
      $this->tableAlias . '_date_passed'
    );

    // How far in the past/future is this event?
    $this->query->addOrderBy(NULL,
      "ABS(TIMESTAMPDIFF(SECOND, STR_TO_DATE($field_alias, '%Y-%m-%dT%H:%i:%s'), UTC_TIMESTAMP()))",
      $this->options['order'],
      $this->tableAlias . '_date_diff'
    );

  }

}
