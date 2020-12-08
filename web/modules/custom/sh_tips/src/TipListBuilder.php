<?php

namespace Drupal\sh_tips;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * EntityListBuilderInterface implementation responsible for the Tips entities.
 */
class TipListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Tip ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\sh_tips\Entity\Tip */
    $row['id'] = $entity->id();
    $row['name'] = $entity->toLink();
    return $row + parent::buildRow($entity);
  }

}
