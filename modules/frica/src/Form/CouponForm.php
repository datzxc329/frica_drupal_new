<?php
namespace Drupal\frica\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\frica\Model\CouponModel;
use Drupal\frica\Model\OrderDetailsModel;
use Drupal\frica\Model\OrdersModel;
use Symfony\Component\HttpFoundation\Request;
use Exception;
class CouponForm extends FormBase
{
  public function getFormId(): string
  {
    return 'idOrders';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['cart_coupon'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full border1 border-[#E9E4E4] text-xs focus:outline-none  focus:border-primary overflow-hidden']],
    ];
    $form['cart_apply'] = [
      '#type' => 'submit',
      '#value' => $this->t('apply'),
      '#attributes' => ['class' => ['bg-primary1 border1 border-primary1 text-white1 rounded-br-lg text-xs uppercase px-41 sm:px-8 lg:px-4 hover:bg-white hover:text-primary hover:border-primary transition-all']],
    ];
    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state): void
  {

  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {
    // Lấy giá trị mã giảm giá từ biểu mẫu.
    $formField = $form_state->getValues();
    $couponCode = $formField['cart_coupon'];
    // Tạo một đối tượng CouponModel để kiểm tra mã giảm giá.
    $couponModel = new CouponModel();
    // Kiểm tra tính hợp lệ của mã giảm giá.
    $couponData = $couponModel->getCouponCode($couponCode);
    if ($couponData) {
      // Mã giảm giá hợp lệ.
      \Drupal::messenger()->addMessage($this->t('Mã giảm giá hợp lệ.'));

      // Lưu giá trị giảm giá vào session.
      $session = \Drupal::service('session');
      $session->set('coupon_discount', $couponData['discount_amount']);
    } else {
      // Mã giảm giá không hợp lệ. Hiển thị thông báo lỗi.
      \Drupal::messenger()->addError($this->t('Mã giảm giá không hợp lệ hoặc đã hết hạn.'));
    }
  }
}
//
