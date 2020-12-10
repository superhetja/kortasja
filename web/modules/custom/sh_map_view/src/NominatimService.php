<?php
namespace Drupal\sh_map_view;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

class NominatimService {
  use StringTranslationTrait;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryOverrideInterface
   */
  protected $configFactory;

  /**
   * NominatimService constructor.
   *
   * @param ConfigFactoryInterface $config_factory
   */
  public function __constructor(ConfigFactoryInterface $config_factory ) {
    $this->configFactory = $config_factory;
  }

  public function triggerAjax() {

  }




}
