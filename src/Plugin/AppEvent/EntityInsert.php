<?php

namespace Drupal\evsy_event\Plugin\AppEvent;

use Drupal\evsy_event\Plugin\EntityEventBase;

/**
 * Class EntityInsert
 *
 * @AppEvent(
 *   id = "entity_insert",
 *   label = "Entity Insert",
 *   source = "entity",
 *   event = "insert",
 *   keys = {
 *      "entity_type",
 *      "bundle",
 *      "entity_id"
 *   }
 * )
 */
class EntityInsert extends EntityEventBase {


}
