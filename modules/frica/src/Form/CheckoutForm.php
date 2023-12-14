<?php


namespace Drupal\frica\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\frica\Model\OrderDetailsModel;
use Drupal\frica\Model\OrdersModel;
use Symfony\Component\HttpFoundation\Request;
use Exception;


class CheckoutForm extends FormBase
{
  public function getFormId(): string
  {
    return 'idOrders';
  }
  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['checkout_firstname'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_lastname'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_company_name'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_country_region'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_street_address'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_town_city'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_zipcode'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_phone'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_email'] = [
      '#type' => 'textfield',
      '#attributes' => ['class' => ['w-full text-sm border border-[#E9E4E4] rounded focus:ring-0 focus:border-primary mt-2']],
      '#required' => TRUE,
    ];
    $form['checkout_button'] = [
      '#type' => 'submit',
      '#value' => $this->t('place order'),
      '#attributes' => ['class' => ['default_btn w-full']],
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

    $firstname = trim($formField['checkout_firstname']);
    if (empty($firstname)) {
      $form_state->setErrorByName('checkout_firstname', $this->t('Họ không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z\s'-]+$/", $firstname)) {
      $form_state->setErrorByName('checkout_firstname', $this->t('Họ không được chứa chữ số hoặc ký hiệu đặc biệt.'));
    }

    $lastname = trim($formField['checkout_lastname']);
    if (empty($lastname)) {
      $form_state->setErrorByName('checkout_lastname', $this->t('Tên không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z\s'-]+$/", $lastname)) {
      $form_state->setErrorByName('checkout_lastname', $this->t('Tên không được chứa chữ số hoặc ký hiệu đặc biệt.'));
    }

    $company_name = trim($formField['checkout_company_name']);
    if (empty($company_name)) {
      $form_state->setErrorByName('checkout_company_name', $this->t('Tên công ty không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z\s'-]+$/", $company_name)) {
      $form_state->setErrorByName('checkout_company_name', $this->t('Tên công ty không được chứa chữ số hoặc ký hiệu đặc biệt.'));
    }

    $country_region = trim($formField['checkout_country_region']);
    if (empty($country_region)) {
      $form_state->setErrorByName('checkout_country_region', $this->t('Tên quốc gia/vùng miền không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z\s'-]+$/", $country_region)) {
      $form_state->setErrorByName('checkout_country_region', $this->t('Tên quốc gia/vùng miền không được chứa chữ số hoặc ký hiệu đặc biệt.'));
    }

    $street_address = trim($formField['checkout_street_address']);
    if (empty($street_address)) {
      $form_state->setErrorByName('checkout_street_address', $this->t('Địa chỉ không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z0-9,\s'-]+$/", $street_address)) {
      $form_state->setErrorByName('checkout_street_address', $this->t('Địa chỉ không hợp lệ.'));
    }

    $town_city = trim($formField['checkout_town_city']);
    if (empty($town_city)) {
      $form_state->setErrorByName('checkout_town_city', $this->t('Tên thành phố không được để trống.'));
    } elseif (!preg_match("/^[A-Za-z,\s'-]+$/", $town_city)) {
      $form_state->setErrorByName('checkout_town_city', $this->t('Tên thành phố không hợp lệ.'));
    }

    $zipcode = trim($formField['checkout_zipcode']);
    if (empty($zipcode)) {
      $form_state->setErrorByName('checkout_zipcode', $this->t('Zipcode không được để trống.'));
    } elseif (!preg_match("/^\d{1,6}$/", $zipcode)) {
      $form_state->setErrorByName('checkout_zipcode', $this->t('Zipcode không hợp lệ.'));
    }

    $phone = $formField['checkout_phone'];
    if (empty($phone)) {
      $form_state->setErrorByName('checkout_phone', $this->t('Số điện thoại không được để trống.'));
    } elseif (!preg_match("/^\d{10,11}$/", $phone)) {
      $form_state->setErrorByName('checkout_phone', $this->t('Số điện thoại không hợp lệ'));
    }

    $email = trim($formField['checkout_email']);
    if (empty($email)) {
      $form_state->setErrorByName('checkout_email', $this->t('Email không được để trống.'));
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $form_state->setErrorByName('checkout_email', $this->t('Email không hợp lệ.'));
    }
  }
  public function submitForm(array &$form, FormStateInterface $form_state): void
  {
    // Kết quả khi nhấn nút send
    $checkout1 = new OrdersModel();
    $formField = $form_state->getValues();
    $formData['checkout_firstname'] = $formField['checkout_firstname'];
    $formData['checkout_lastname'] = $formField['checkout_lastname'];
    $formData['checkout_company_name'] = $formField['checkout_company_name'];
    $formData['checkout_country_region'] = $formField['checkout_country_region'];
    $formData['checkout_street_address'] = $formField['checkout_street_address'];
    $formData['checkout_town_city'] = $formField['checkout_town_city'];
    $formData['checkout_zipcode'] = $formField['checkout_zipcode'];
    $formData['checkout_phone'] = $formField['checkout_phone'];
    $formData['checkout_email'] = $formField['checkout_email'];
    $formData['date'] = date("Y-m-d H:i:s");
    $session = $this->getRequest()->getSession();
    $subtotal = $session->get('subtotal') ?? 0;
    $formData['total_price'] = $subtotal;

    $result = $checkout1->insert($formData);

    if ($result !== false) {
      $idOrders = $result;
      $cartItems = $session->get('cart') ?? [];
      foreach ($cartItems as $productId => $cartItem) {
        $quantity_order = $cartItem['quantity'];
        $price_order = $cartItem['promotional_price'];
        if (!empty($quantity_order) && !empty($price_order)) {
          $checkout2 = new OrderDetailsModel();
          $formData2 = [];
          $formData2['idOrders'] = $idOrders;
          $formData2['idSP'] = $productId;
          $formData2['quantity'] = $quantity_order;
          $formData2['price'] = $price_order;
          $formData2['subtotal'] = $quantity_order * $price_order;
          $checkout2->insert($formData2);
        }
      }
      // Clear the cart in the session
      $session->remove('cart');
      $session->remove('subtotal');
    }

    $form_state->setRedirect('frica.order_success');
  }

}
