<?php

namespace Drupal\evsy_event\Plugin\AppEvent;

use Drupal\evsy_event\Plugin\EntityEventBase;

/**
 * Class EntityDelete
 *
 * @AppEvent(
 *     id = "entity_create",
 *     label = "Entity create",
 *     source = "entity",
 *     event = "create",
 *     keys = {
 *      "entity_type",
 *      "bundle",
 *      "entity_id"
 *   }
 * )
 */
class EntityCreate extends EntityEventBase {


}
