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
    ];
    $form['login_password'] = [
      '#type' => 'password',
      '#placeholder' => $this->t('Nhập mật khẩu'),
      '#attributes' => ['class' => ['form-text']],
    ];
    $form['login_submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Đăng nhập'),
      '#attributes' => array('class' => array('send_bt')),
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void
  {
    $formField = $form_state->getValues();
    $username = trim($formField['login_username']);
    if (empty($username)) {
      $form_state->setErrorByName('login_username', $this->t('Tên đăng nhập không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z\s'-]+$/", $username)) {
      $form_state->setErrorByName('login_username', $this->t('Tên đăng nhập không được chứa các ký hiệu đặc biệt như !, @, #,...'));
    }

    $password = $formField['login_password'];
    if (empty($password)) {
      $form_state->setErrorByName('login_password', $this->t('Mật khẩu không được để trống.'));
    }
    elseif (!preg_match("/^(?=.*[A-Z])(?=.*[!@#\$%^&*])(?=.{8,})/", $password)) {
      $form_state->setErrorByName('login_password', $this->t('Mật khẩu phải ít nhất 8 ký tự, bao gồm ít nhất 1 chữ cái in hoa và 1 ký tự đặc biệt.'));
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
      $form_state->setRebuild(); // Stay on the same form.
      \Drupal::messenger()->addError(t('Sai tên đăng nhập hoặc mật khẩu!'));
    }
  }
}
