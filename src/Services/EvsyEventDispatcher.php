<?php


namespace Drupal\evsy_event\Services;


use Drupal\evsy_event\Plugin\AppEventManagerInterface;
use Drupal\evsy_event\Plugin\EventPlugin;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


class EvsyEventDispatcher implements EvsyEventDispatcherInterface {


    /** @var AppEventManagerInterface */
    private $pluginManager;

    /** @var EventDispatcherInterface */
    private $dispatcher;

    //'event_dispatcher'
    public function __construct(AppEventManagerInterface $pluginManager, EventDispatcherInterface $dispatcher) {
        $this->pluginManager = $pluginManager;
        $this->dispatcher = $dispatcher;

    }

    public function dispatch($plugin_id, $data) {

        /** @var $event EventPlugin */
        
        $event = $this->pluginManager->createInstance($plugin_id);
        if (is_null($event)) {
            return;
        }

        $event->setData($data);

        $this->dispatcher->dispatch($event->getSubscribeEventName(), $event);

    }

}
