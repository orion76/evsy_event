<?php

namespace Drupal\evsy_event\Plugin\AppEvent;

use Drupal\evsy_event\Plugin\EntityEventBase;   

/**
 * Class EntityUpdate
 *
 * @AppEvent(
 *     id = "entity_update",
 *     label = "Entity Update",
 *     source = "entity",
 *     event = "update",
 *     keys = {
 *      "entity_type",
 *      "bundle",
 *      "entity_id"
 *   }
 * )
 */
class EntityUpdate extends EntityEventBase {


}
