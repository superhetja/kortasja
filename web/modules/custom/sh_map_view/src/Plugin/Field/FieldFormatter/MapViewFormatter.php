<?php
namespace Drupal\sh_map_view\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'map_view' formatter.
 * @FieldFormatter(
 *   id = "map_view",
 *   label = @Translation("Map view formatter"),
 *   field_types = {
 *    "map_view"
 *   }
 * )
 */
class MapViewFormatter extends FormatterBase {

  /**
   * { @inheritDoc }
   */
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = array();
    foreach ($items as $delta => $item) {
      // Render output using snippets_default theme.
      $source = array(
        '#theme' => 'snippets_default',
        '#address' => $item->address,
        '#location' => $item->location,
      );

      $elements[$delta] = array('#markup' => \Drupal::service('renderer')->render($source));
    }

    return $elements;
  }
}
