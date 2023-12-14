<?php

namespace Drupal\frica\Controller;

use Drupal\Core\Controller\ControllerBase;
//use Drupal\Frica\Model\ContactModel;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for the contact form routes.
 */
class AdminController extends ControllerBase
{
  public function product_management()
  {
    //$computerModel = new ProductModel();
    return [
      '#theme' => 'signup',
      '#data' => [
        //'computers' => $computerModel->showProductsByCategory(1),
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
//  public function user_management()
//  {
//    //$computerModel = new ProductModel();
//    return [
//      '#theme' => 'signup',
//      '#data' => [
//        //'computers' => $computerModel->showProductsByCategory(1),
//      ],
//      '#attached' => [
//        'library' => [
//        ],
//      ],
//      '#cache' => array(
//        'max-age' => 0
//      )
//    ];
//  }
}
