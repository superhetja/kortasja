<?php

namespace Drupal\sh_map_view\form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

//maybe implement update field ?!?

/**
 * Configuration form definition for Map Viewer
 */

class MapViewConfigForm extends ConfigFormBase {

  protected function getEditableConfigNames()
  {
    return ['sh_map_view.map_view'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'map_view_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('sh_map_view.map_view');

    $form['map_view_api '] = [
      '#type' => 'textfield',
      '#title' => 'View Map Api',
      'description' => 'API Key for view map'
    ];

    $form['location '] = [
      '#type' => 'textfield',
      '#title' => 'Location',
      'description' => 'Location name for default map settings.'
    ];
    return parent::buildForm($form, $form_state);
  }
}
