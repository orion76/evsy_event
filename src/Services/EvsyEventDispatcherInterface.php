<?php

namespace Drupal\evsy_event\Services;

interface EvsyEventDispatcherInterface {

    public function dispatch($plugin_id, $data);
}
