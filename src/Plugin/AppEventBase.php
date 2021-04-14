<?php

namespace Drupal\evsy_event\Plugin;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use function str_replace;

/**
 * Base class for App event plugins.
 */
abstract class AppEventBase extends EventPlugin implements AppEventInterface {

    use StringTranslationTrait;

    protected $data;

    abstract function getKeyValue($key_name);


    public function getKeys() {
        return $this->pluginDefinition['keys'];
    }

    public function getLabel() {
        return $this->pluginDefinition['label'];
    }

    public function setData($data) {
        $this->data = $data;
    }


    public function getData() {
        return $this->data;
    }

    public function getSource() {
        return $this->pluginDefinition['source'];
    }


    public function getSubscribeEventName() {
        $parts = [
            self::EVENT_NAME_PREFIX,
            $this->pluginDefinition['source'],
            $this->pluginDefinition['event'],
        ];
        return implode(':', $parts);
    }

    public function getConfigForm($config, $form, FormStateInterface $form_state, $ajax) {
        return [];

    }

    abstract public function getConfigDefault();

}
