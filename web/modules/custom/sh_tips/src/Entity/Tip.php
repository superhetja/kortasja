<?php
namespace Drupal\sh_tips\Entity;

use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Tip entity.
 *
 * @ContentEntityType(
 *   id = "tip",
 *   label = @Translation("Tip"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\sh_tips\TipListBuilder",
 *     "form" = {
 *       "default" = "Drupal\sh_tips\Form\TipForm",
 *       "add" = "Drupal\sh_tips\Form\ProductForm",
 *       "edit" = "Drupal\sh_tips\Form\ProductForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *    "route_provider" = {
 *      "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *    }
 *   },
 *   base_table = "tip",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/tip/{tip}",
 *     "add-form" = "/admin/structure/tip/add",
 *     "edit-form" = "/admin/structure/tip/{tip}/edit",
 *     "delete-form" = "/admin/structure/tip/{tip}/delete",
 *     "collection" = "/admin/structure/tip",
 *   },
 * )
 */

class Tip extends ContentEntityBase implements TipInterface {
  use EntityChangedTrait;

  /**
   * { @inheritdoc }
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * { @inheritdoc }
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * { @inheritdoc }
   */
  public function getLocation()
  {
    return $this->get('location')->value;
  }

  /**
   * { @inheritdoc }
   */
  public function setLocation($location)
  {
    $this->set('location', $location);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() { return $this->get('created')->value;
  }
  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp)
  { $this->set('created', $timestamp);
    return $this;
  }

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Product.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['location'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Location'))
      ->setLabel(t('The location of the tip.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));
    return $fields;
  }
}
