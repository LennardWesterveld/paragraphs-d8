<?php

/**
 * @file
 * Contains Drupal\paragraphs\Form\ParagraphsTypeDeleteForm.
 */

namespace Drupal\paragraphs\Form;

use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Builds the form to delete a ParagraphsType.
 */
class ParagraphsTypeDeleteForm extends EntityConfirmFormBase
{

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete %name?', array('%name' => $this->entity->label()));
  }

  /**
  * {@inheritdoc}
  */
  public function getCancelUrl() {
    return new Url('paragraphs.type_list');
  }

  /**
  * {@inheritdoc}
  */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
  * {@inheritdoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->entity->delete();
    drupal_set_message($this->t('Paragraphs type %label has been deleted.', array('%label' => $this->entity->label())));
    $form_state->setRedirectUrl($this->getCancelUrl());
  }
}
