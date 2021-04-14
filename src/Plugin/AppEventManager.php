<?php

namespace Drupal\evsy_event\Plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the App event plugin manager.
 */
class AppEventManager extends DefaultPluginManager implements AppEventManagerInterface {


    /**
     * Constructs a new AppEventManager object.
     *
     * @param \Traversable $namespaces
     *   An object that implements \Traversable which contains the root paths
     *   keyed by the corresponding namespace to look for plugin implementations.
     * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
     *   Cache backend instance to use.
     * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
     *   The module handler to invoke the alter hook with.
     */
    public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
        parent::__construct('Plugin/AppEvent', $namespaces, $module_handler, 'Drupal\evsy_event\Plugin\AppEventInterface', 'Drupal\evsy_event\Annotation\AppEvent');

        $this->alterInfo('evsy_event_app_event_info');
        $this->setCacheBackend($cache_backend, 'evsy_event_app_event_plugins');
    }

    public function getPluginMultiple($ids) {

        $plugins = [];
        foreach ($ids as $plugin_id) {
            $plugins[$plugin_id] = $this->createInstance($plugin_id);
        }
        return $plugins;
    }
}
