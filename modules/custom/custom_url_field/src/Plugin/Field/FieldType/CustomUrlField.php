<?php

namespace Drupal\custom_url_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\StringItem;

/**
 * Plugin implementation of the 'custom_url' field type.
 *
 * @FieldType(
 *   id = "custom_url",
 *   label = @Translation("Client URL"),
 *   description = @Translation("Client URL field type."),
 *   category = @Translation("General"),
 *   default_widget = "custom_url_widget",
 *   default_formatter = "custom_url_formatter"
 * )
 */
class CustomUrlField extends StringItem implements FieldItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = parent::propertyDefinitions($field_definition);
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('URL'))
      ->setRequired(TRUE);
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'varchar',
          'length' => 255,
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }
}
