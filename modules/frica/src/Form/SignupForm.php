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
    ];
    $form['signup_password'] = [
      '#type' => 'password',
      '#placeholder' => $this->t('Nhập mật khẩu'),
      '#attributes' => ['class' => ['form-text']],
    ];
    $form['signup_name'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập họ và tên đầy đủ'),
      '#attributes' => ['class' => ['form-text']],
    ];
    $form['signup_phone'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập số điện thoại'),
      '#attributes' => ['class' => ['form-text']],
    ];
    $form['signup_email'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập email'),
      '#attributes' => ['class' => ['form-text']],
    ];
    $form['signup_address'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập địa chỉ'),
      '#attributes' => ['class' => ['form-text']],
    ];
    $form['signup_submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Đăng ký'),
      '#attributes' => array('class' => array('send_bt')),
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */

  public function validateForm(array &$form, FormStateInterface $form_state): void {
    $formField = $form_state->getValues();
    $username = trim($formField['signup_username']);
    if (empty($username)) {
      $form_state->setErrorByName('signup_username', $this->t('Tên tài khoản không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z\s'-]+$/", $username)) {
      $form_state->setErrorByName('signup_username', $this->t('Tên tài khoản không được chứa các ký hiệu đặc biệt như !, @, #,...'));
    }

    $password = $formField['signup_password'];
    if (empty($password)) {
      $form_state->setErrorByName('signup_password', $this->t('Mật khẩu không được để trống.'));
    }
    elseif (!preg_match("/^(?=.*[A-Z])(?=.*[!@#\$%^&*])(?=.{8,})/", $password)) {
      $form_state->setErrorByName('signup_password', $this->t('Mật khẩu phải ít nhất 8 ký tự, bao gồm ít nhất 1 chữ cái in hoa và 1 ký tự đặc biệt.'));
    }

    $name = trim($formField['signup_name']);
    if (empty($name)) {
      $form_state->setErrorByName('signup_name', $this->t('Tên không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z\s'-]+$/", $name)) {
      $form_state->setErrorByName('signup_name', $this->t('Tên không được chứa chữ số hoặc ký hiệu đặc biệt.'));
    }

    $phone = $formField['signup_phone'];
    if (empty($phone)) {
      $form_state->setErrorByName('signup_phone', $this->t('Số điện thoại không được để trống.'));
    } elseif (!preg_match("/^\d{10,11}$/", $phone)) {
      $form_state->setErrorByName('signup_phone', $this->t('Số điện thoại không hợp lệ'));
    }

    $email = trim($formField['signup_email']);
    if (empty($email)) {
      $form_state->setErrorByName('signup_email', $this->t('Email không được để trống.'));
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $form_state->setErrorByName('signup_email', $this->t('Email không hợp lệ.'));
    }

    $address = trim($formField['signup_address']);
    if (empty($address)) {
      $form_state->setErrorByName('signup_address', $this->t('Địa chỉ không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z0-9,\s'-]+$/", $address)) {
      $form_state->setErrorByName('signup_address', $this->t('Địa chỉ không hợp lệ.'));
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
    $formData['signup_phone'] = (int) $formField['signup_phone'];
    $formData['signup_email'] = $formField['signup_email'];
    $formData['signup_address'] = $formField['signup_address'];
    $signup->saveSignup($formData);

    $form_state->setRedirect('frica.successsignup');
  }
}
