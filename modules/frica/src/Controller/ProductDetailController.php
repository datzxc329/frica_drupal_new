<?php


namespace Drupal\frica\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Connection;

class ProductDetailController extends ControllerBase {

  public function product_detail($idSP) {
    $detail = new ProductModel();
    return [
      '#theme' => 'product_detail',
      '#data' => [
        'product_detail' => $detail->getProductDetailById()
      ],
      '#attached' => [
      ],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}

