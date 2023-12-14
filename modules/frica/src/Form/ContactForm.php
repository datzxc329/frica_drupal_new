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
    return 'idContact';
  }
  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['contact_name'] = [
      '#type' => 'textfield',
      '#attributes' => array('class' => array('mail_text')),
      '#placeholder' => $this->t('Name'),
    ];
    $form['contact_email'] = [
      '#type' => 'textfield',
      '#attributes' => array('class' => array('mail_text')),
      '#placeholder' => $this->t('Email'),
    ];
    $form['contact_phone'] = [
      '#type' => 'textfield',
      '#attributes' => array('class' => array('mail_text')),
      '#placeholder' => $this->t('Phone number'),
    ];
    $form['contact_message'] = [
      '#type' => 'textarea',
      '#attributes' => array('class' => array('massage-bt')),
      '#placeholder' => $this->t('Massage'),
    ];
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
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    $formField = $form_state->getValues();

    $name = trim($formField['contact_name']);
    if (empty($name)) {
      $form_state->setErrorByName('contact_name', $this->t('Tên không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z\s'-]+$/", $name)) {
      $form_state->setErrorByName('contact_name', $this->t('Tên không được chứa chữ số hoặc ký hiệu đặc biệt.'));
    }

    $phone = $formField['contact_phone'];
    if (empty($phone)) {
      $form_state->setErrorByName('contact_phone', $this->t('Số điện thoại không được để trống.'));
    } elseif (!preg_match("/^\d{10,11}$/", $phone)) {
      $form_state->setErrorByName('contact_phone', $this->t('Số điện thoại không hợp lệ'));
    }

    $email = trim($formField['contact_email']);
    if (empty($email)) {
      $form_state->setErrorByName('contact_email', $this->t('Email không được để trống.'));
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $form_state->setErrorByName('contact_email', $this->t('Email không hợp lệ.'));
    }

    $message = trim($formField['contact_message']);
    if (empty($message)) {
      $form_state->setErrorByName('contact_message', $this->t('Message không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z0-9\s'-]+$/", $message)) {
      $form_state->setErrorByName('contact_message', $this->t('Message không được chứa ký hiệu đặc biệt.'));
    }
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

    // Set the redirect to the "thanks" page.
    $form_state->setRedirect('frica.thanks');
  }
}
