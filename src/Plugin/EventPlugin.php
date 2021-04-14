<?php


namespace Drupal\evsy_event\Plugin;


use Drupal\Component\Plugin\ConfigurableInterface;
use Drupal\Component\Plugin\ConfigurablePluginInterface;
use Drupal\Component\Plugin\DerivativeInspectionInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;
use Symfony\Component\EventDispatcher\Event;
use function explode;
use function strpos;

abstract class EventPlugin extends Event implements PluginInspectionInterface, DerivativeInspectionInterface {


    const DERIVATIVE_SEPARATOR = ':';

    /** @var string    */ 
    protected $pluginId;

/** @var array    */ 
    protected $pluginDefinition;


    protected $configuration;


    public function __construct(array $configuration, $plugin_id, $plugin_definition) {
        $this->configuration = $configuration;
        $this->pluginId = $plugin_id;
        $this->pluginDefinition = $plugin_definition;


    }

    public function getPluginId() {
        return $this->pluginId;
    }

    public function getBaseId() {
        $plugin_id = $this->getPluginId();
        if (strpos($plugin_id, static::DERIVATIVE_SEPARATOR)) {
            [$plugin_id] = explode(static::DERIVATIVE_SEPARATOR, $plugin_id, 2);
        }
        return $plugin_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getDerivativeId() {
        $plugin_id = $this->getPluginId();
        $derivative_id = NULL;
        if (strpos($plugin_id, static::DERIVATIVE_SEPARATOR)) {
            [, $derivative_id] = explode(static::DERIVATIVE_SEPARATOR, $plugin_id, 2);
        }
        return $derivative_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getPluginDefinition() {
        return $this->pluginDefinition;
    }


    public function isConfigurable() {
        return $this instanceof ConfigurableInterface ;
    }

}
