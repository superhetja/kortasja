<?php

namespace Drupal\sh_map_view\form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configuration form definition for Map Viewer
 */

class MapViewConfigForm extends ConfigFormBase {

  protected function getEditableConfigNames()
  {
    return ['sh_map_view.custom_config'];
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
    $config = $this->config('sh_map_view.custom_config');

    $form['map_view_access_token'] = [
      '#type' => 'textfield',
      '#title' => 'Access Token',
      '#description' => 'Leaflet access token can be found at https://account.mapbox.com/access-tokens/',
      //remove default value before completion
      '#default_value' => $config->get('map_view_access_token'),
    ];
    $form['map_view_id'] = [
      '#type' => 'select',
      '#title' => 'Map View',
      '#options' => [
        'mapbox/streets-v11' => 'Street',
        'mapbox/satellite-v9' => 'Satellite',
      ],
      '#default_value' => $config->get('map_view_id'),
    ];

    $form['location'] = [
      '#type' => 'select',
      '#title' => 'Location',
      '#options' => [
        //if locations are needed they are added here.
        '64.783375, -18.542312' => 'Ísland',
        '63.934640, -21.000215' => 'Árborg',
        '63.998569, -22.571489' => 'Reykjanesbær',
        '64.121938, -21.866863' => 'Reykjavík',
        '64.035977, -21.976606' => 'Hafnafjörður',
        '64.166843, -21.695939' => 'Mosfellsbær',
      ],
      '#default_value' => $config->get('location'),
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->config('sh_map_view.custom_config')
      ->set('map_view_access_token', $form_state->getValue('map_view_access_token'))
      ->set('map_view_id', $form_state->getValue('map_view_id'))
      ->set('location', $form_state->getValue('location'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
