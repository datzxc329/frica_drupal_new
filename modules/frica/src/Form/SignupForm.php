<?php


namespace Drupal\frica\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\frica\Model\UserModel;
use Exception;


class SignupForm extends FormBase
{
  public function getFormId(): string
  {
    return 'idUser';
  }
  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['signup_username'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập tên người dùng'),
      '#attributes' => ['class' => ['form-text']],
      '#required' => TRUE,
    ];
    $form['signup_password'] = [
      '#type' => 'password',
      '#placeholder' => $this->t('Nhập mật khẩu'),
      '#attributes' => ['class' => ['form-text']],
      '#required' => TRUE,
    ];
    $form['signup_name'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập họ và tên đầy đủ'),
      '#attributes' => ['class' => ['form-text']],
      '#required' => TRUE,
    ];
    $form['signup_phone'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập số điện thoại'),
      '#attributes' => ['class' => ['form-text']],
      '#required' => TRUE,
    ];
    $form['signup_email'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập email'),
      '#attributes' => ['class' => ['form-text']],
      '#required' => TRUE,
    ];
    $form['signup_address'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập địa chỉ'),
      '#attributes' => ['class' => ['form-text']],
      '#required' => TRUE,
    ];
    $form['signup_submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Đăng ký'),
      '#attributes' => ['class' => ['btn', 'btn-primary']],
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void
  {
    //Điều kiện của form
    $formField = $form_state->getValues();
    $username = trim($formField['signup_username']);
    $password = trim($formField['signup_password']);
    $name = trim($formField['signup_name']);
    $phone = $formField['signup_phone'];
    $email = trim($formField['signup_email']);
    //$address = trim($formField['signup_address']);

    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
      $form_state->setErrorByName('login_username', $this->t('Tên đăng nhập không được chứa các ký hiệu đặc biệt như !, @, #,...'));
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).*$/", $password)) {
      $form_state->setErrorByName('login_password', $this->t('Mật khẩu phải có ít nhất 1 chữ cái in hoa và 1 ký hiệu đặc biệt như !, @, #,...'));
    }

    if (!preg_match("/^[A-Za-z\s'-]+$/", $name)) {
      $form_state->setErrorByName('login_password', $this->t('Tên không hợp lệ.'));
    }

    if (!preg_match("/^\d{10,11}$/", $phone)) {
      $form_state->setErrorByName('login_password', $this->t('Số điện thoại không hợp lệ.'));
    }

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
      $form_state->setErrorByName('login_password', $this->t('Email không hợp lệ.'));
    }

  }
  public function submitForm(array &$form, FormStateInterface $form_state): void
  {
    // Kết quả khi nhấn nút send
    $signup = new UserModel();
    $formField = $form_state->getValues();
    $formData['signup_username'] = $formField['signup_username'];
    $formData['signup_password'] = $formField['signup_password'];
    $formData['signup_name'] = $formField['signup_name'];
    $formData['signup_phone'] = $formField['signup_phone'];
    $formData['signup_email'] = $formField['signup_email'];
    $formData['signup_address'] = $formField['signup_address'];
    $signup->saveSignup($formData);
    $this->t('Signup data has been saved successfully.');
    $form_state->setRedirect('frica.successsignup');
  }
}
