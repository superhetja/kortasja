<?php

namespace Drupal\sh_tips\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form for creating/editing Product entities.
 */
class TipForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the a Tip.'));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the a Tip.'));
    }
    $form_state->setRedirect('entity.tip.canonical', ['tip' => $entity->id()]);
  }

}
