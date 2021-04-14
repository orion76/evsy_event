<?php

namespace Drupal\evsy_event\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines an interface for App event plugins.
 */
interface AppEventInterface extends PluginInspectionInterface {

    const EVENT_NAME_PREFIX = 'evsy';

    public function getKeys();

    public function getLabel();

    public function setData($data);

    public function getData();

    public function getSource();

    public function getSubscribeEventName();

    public function getConfigForm($config, $form, FormStateInterface $form_state, $ajax);

    public function getConfigDefault();
}
