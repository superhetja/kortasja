<?php
namespace Drupal\sh_map_view\Plugin\Field\Fieldtype;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Creates a map field for forms
 * @FieldType(
 *   id = "map_view",
 *   label = @Translation("Map view"),
 *   description = @Translation("This field enables map view of selected town for form handling"),
 *   default_widget = "map_view",
 *   default_formatter = "map_view_default"
 * )
 */
class MapViewItem extends FieldItemBase {

  /**
   * @inheritDoc
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
  {
    $properties['address'] = DataDefinition::create('string')->setLabel(t('Nearest Address'));
    $properties['location'] = DataDefinition::create('string')->setLabel(t('Coordinates from map'));
    return $properties;
  }

  /**
   * { @inheritDoc }
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition)
  {
    return array(
      'columns' => array(
        'address' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
        'location' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
      ),
    );
  }
}
