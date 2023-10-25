<?php

namespace Drupal\frica\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\frica\Model\ContactModel;
use Exception;

class ContactForm extends FormBase
{
  public function getFormId(): string
  {
    return 'idLH';
  }
  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['contact_name'] = [
      '#type' => 'textfield',
      '#attributes' => array('class' => array('mail_text')),
      '#placeholder' => $this->t('Name'),
      '#required' => TRUE,
    ];
    $form['contact_email'] = [
      '#type' => 'textfield',
      '#attributes' => array('class' => array('mail_text')),
      '#placeholder' => $this->t('Email'),
      '#required' => TRUE,
    ];
    $form['contact_phone'] = [
      '#type' => 'textfield',
      '#attributes' => array('class' => array('mail_text')),
      '#placeholder' => $this->t('Phone number'),
      '#required' => TRUE,
    ];
    $form['contact_message'] = [
      '#type' => 'textarea',
      '#attributes' => array('class' => array('massage-bt')),
      '#placeholder' => $this->t('Massage'),
      '#required' => TRUE,
    ];
    //code dưới đây làm khi chỉ có {{ data.form }} ở contact.html.twig do dòng code này render toàn bộ form
    $form['contact_submit'] = [
      '#attributes' => array('class' => array('send_bt')),
      '#type' => 'submit',
      '#value' => $this->t('Send'),
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void
  {
      //Điều kiện của form
  }
  public function submitForm(array &$form, FormStateInterface $form_state): void{
    // Kết quả khi nhấn nút send
    $contactModel = new ContactModel();
    $formField = $form_state->getValues();
    $formData['contact_name'] = $formField['contact_name'];
    $formData['contact_email'] = $formField['contact_email'];
    $formData['contact_phone'] = $formField['contact_phone'];
    $formData['contact_message'] = $formField['contact_message'];
    $contactModel->insert($formData);
    $this->t('Contact data has been saved successfully.');
    // Set the redirect to the "thanks" page.
    $form_state->setRedirect('frica.thanks');
  }
}
