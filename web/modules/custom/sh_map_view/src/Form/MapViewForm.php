<?php

namespace Drupal\sh_map_view\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\cache\None;

/**
 * Class MapViewForm
 * @package Drupal\sh_map_view\Form
 */
class MapViewForm extends ConfigFormBaseprotected {

  protected function getEditableConfigNames()
  {
    return ['sh_map_view.custom_salutation'];
  }
  public function getFormId()
  {
    return 'sh_map_view_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('sh_map_view.map_view');

    $form['location '] = [
      '#type' => 'textfield',
      '#title' => 'Location',
      'description' => 'Location on map view'
    ];

    return parent::buildForm($form, $form_state);
  }


}
