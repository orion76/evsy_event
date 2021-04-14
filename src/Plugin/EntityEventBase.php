<?php

namespace Drupal\evsy_event\Plugin;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\ContentEntityType;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use function array_filter;
use function is_array;
use function str_replace;


abstract class EntityEventBase extends AppEventBase implements AppEventInterface {

    use StringTranslationTrait;

    /** @var ContentEntityInterface */
    protected $data;

    public function getKeyValue($key_name) {
        $value = NULL;
        switch ($key_name) {
            case 'entity_type':
                $value = $this->data->getEntityTypeId();
                break;
            case 'bundle':
                $value = $this->data->bundle();
                break;
            case 'entity_id':
                $value = $this->data->id();
                break;
        }
        return $value;
    }

    public function getConfigDefault() {
        return [
            'entity_type' => '',
            'bundle' => '',
        ];
    }

    public function getConfigForm($config, $form, FormStateInterface $form_state, $ajax) {
        $elements = [];

        if (empty($config) && !is_array($config)) {
            $config = [];
        }

        $config += $this->getConfigDefault();

        $elements['entity_type'] = [
            '#type' => 'select',
            '#title' => $this->t('Entity type'),
            '#default_value' => $config['entity_type'],
            '#options' => $this->getEntityTypeOptions(),
            '#ajax' => $ajax,
        ];
        if (!empty($config['entity_type'])) {
            $elements['bundle'] = [
                '#type' => 'select',
                '#title' => $this->t('Bundle'),
                '#default_value' => $config['bundle'],
                '#options' => $this->getBundleOptions($config['entity_type']),
            ];
        }
        return $elements;
    }

    private function getEntityTypeOptions() {
        $entity_types = array_filter(\Drupal::entityTypeManager()->getDefinitions(),
            function ($entity_type) {
                return $entity_type instanceof ContentEntityType;
            });
        $options = [];
        foreach ($entity_types as $entity_type) {
            /** @var $entity_type EntityTypeInterface */
            $options[$entity_type->id()] = $entity_type->getLabel();
        }
        return $options;
    }

    private function getBundleOptions($entity_type_id) {
        return array_map(function ($bundle) {
            return $bundle['label'];
        }, \Drupal::service('entity_type.bundle.info')->getBundleInfo($entity_type_id));
    }


}
