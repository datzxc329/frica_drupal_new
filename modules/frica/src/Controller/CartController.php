<?php

namespace Drupal\frica\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Returns responses for the contact form routes.
 */
class CartController extends ControllerBase
{
  public function shopping_cart(Request $request, $idSP) {
    $session = $request->getSession();

    //Dòng này reset lại cart và ở dưới là subtotal
//    $session->set('cart', []);
//    $session->set('subtotal', 0);
    if (!$session->has('cart')) {
      $session->set('cart', []);
    }

    $subtotal = $session->get('subtotal');
    $cartItems = $session->get('cart');

    if (!empty($idSP) && is_numeric($idSP)) {
      $productModel = new ProductModel();
      $productInfo = $productModel->getProductDetailById($idSP);

      if ($productInfo) {
        if (isset($cartItems[$idSP])) {
          $cartItems[$idSP]['quantity'] += 1;
        } else {
          $productInfo['quantity'] = 1;
          $cartItems[$idSP] = $productInfo;
        }
        $subtotal = 0;
        //Tổng tiền toàn bộ các sản phẩm
        foreach ($cartItems as $item) {
          $subtotal += $item['quantity']*$item['promotional_price'];
        }
        $session->set('subtotal', $subtotal);
        $session->set('cart', $cartItems);
      }
    }
    $form = \Drupal::formBuilder()->getForm('Drupal\frica\Form\CouponForm');
    return [
      '#theme' => 'shopping_cart', // Replace with your cart template.
      '#data' => [
        'form' => $form,
        'cartItems' => $cartItems,
        'subtotal' => $subtotal,
      ],
      '#attached' => [],
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }
  public function checkout(Request $request)
  {
    $session = $request->getSession();
    //Dòng này reset lại subtotal của checkout
//    $session->set('cart', []);
//    $session->set('subtotal', 0);
    $subtotal = $session->get('subtotal') ?? 0;
//    print_r($subtotal);
//    die(" ok");
    $cartItems = $session->get('cart') ?? 0;
//    print_r($cartItems);
//    die(" ok");
    $form = \Drupal::formBuilder()->getForm('Drupal\frica\Form\CheckoutForm');
    return [
      '#theme' => 'checkout',
      '#data' => [
        'form' => $form,
        'subtotal' => $subtotal,
        'cartItems' => $cartItems,
      ],
      '#attached' => [
        'library' => [

        ],
      ],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function order_success(): array
  {
    return [
      '#theme' => 'order_success',
      '#data' => [],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}
