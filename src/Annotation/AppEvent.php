<?php

namespace Drupal\evsy_event\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a App event item annotation object.
 *
 * @see \Drupal\evsy_event\Plugin\AppEventManager
 * @see plugin_api
 *
 * @Annotation
 */
class AppEvent extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
