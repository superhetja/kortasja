<?php
namespace Drupal\sh_map_view\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'map_view' widget
 * @FieldWidget(
 *   id = "map_view",
 *   label = @Translation("Some translation"),
 *   field_types = {
 *    "map_view"
 *   }
 * )
 */
class MapViewWidget extends WidgetBase {

  /**
   * {@inheritDoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
  {
    $element['address'] = array(
      '#title' => $this->t('Address'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->address) ? $items[$delta]->address : NULL,
    );
    $element['location'] = array(
      '#title' => $this->t('Location'),
      '#type' => 'textarea',
      '#default_value' => isset($items[$delta]->location) ? $items[$delta]->location : NULL,
    );
    return $element;
  }
}
