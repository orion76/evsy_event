<?php

namespace Drupal\evsy_event\Plugin;

use Drupal\Component\Plugin\PluginManagerInterface;

/**
 * Defines an interface for App event plugins.
 */
interface AppEventManagerInterface extends PluginManagerInterface {


    public function getPluginMultiple($ids);
}
