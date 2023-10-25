<?php


namespace Drupal\frica\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\frica\Model\UserModel;
use Exception;


class LoginForm extends FormBase
{
  public function getFormId(): string
  {
    return 'idUser';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['login_username'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('Nhập tên đăng nhập'),
      '#attributes' => ['class' => ['form-text']],
      '#required' => TRUE,
    ];
    $form['login_password'] = [
      '#type' => 'password',
      '#placeholder' => $this->t('Nhập mật khẩu'),
      '#attributes' => ['class' => ['form-text']],
      '#required' => TRUE,
    ];
    $form['login_submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Đăng nhập'),
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
    $username = trim($formField['login_username']);
    $password = trim($formField['login_password']);

    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
      $form_state->setErrorByName('login_username', $this->t('Tên đăng nhập không được chứa các ký hiệu đặc biệt như !, @, #,...'));
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).*$/", $password)) {
      $form_state->setErrorByName('login_password', $this->t('Mật khẩu phải có ít nhất 1 chữ cái in hoa và 1 ký hiệu đặc biệt như !, @, #,...'));
    }

  }
  public function submitForm(array &$form, FormStateInterface $form_state): void
  {
    // Kết quả khi nhấn nút send
    $login = new UserModel();
    $formField = $form_state->getValues();
    $formData['login_username'] = $formField['login_username'];
    $formData['login_password'] = $formField['login_password'];
    if($login->checkLogin($formData)){
      $form_state->setRedirect('frica.successlogin');
    } else{
      \Drupal::messenger()->addMessage(t('Sai tên đăng nhập hoặc mật khẩu!'));
      $form_state->setRedirect('frica.login');
    }
  }
}
