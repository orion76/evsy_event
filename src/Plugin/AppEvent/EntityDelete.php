<?php

namespace Drupal\evsy_event\Plugin\AppEvent;

use Drupal\evsy_event\Plugin\EntityEventBase;

/**
 * Class EntityDelete
 *
 * @AppEvent(
 *     id = "entity_delete",
 *     label = "Entity Delete",
 *     source = "entity",
 *     event = "delete",
 *     keys = {
 *      "entity_type",
 *      "bundle",
 *      "entity_id"
 *   }
 * )
 */
class EntityDelete extends EntityEventBase {


}
