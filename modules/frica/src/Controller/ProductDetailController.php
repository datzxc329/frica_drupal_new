<?php
namespace Drupal\frica\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\frica\Model\ProductModel;
class ProductDetailController extends ControllerBase {
  public function product_detail($idSP) {
    $product_detail = new ProductModel();
    return [
      '#theme' => 'product_detail',
      '#data' => [
        'product_detail' => $product_detail->getProductDetailById($idSP)
      ],
      '#attached' => [
      ],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}
