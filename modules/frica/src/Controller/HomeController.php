<?php
namespace Drupal\frica\Controller;
use Drupal\Core\Controller\ControllerBase;
//use Drupal\Frica\Model\ContactModel;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\HttpFoundation\Request;
/**
 * Returns responses for the contact form routes.
 */
class HomeController extends ControllerBase
{
  public function home()
  {
    $model = new ProductModel();
    return [
      '#theme' => 'home',
      '#data' => [
        'home_computers' => $model->showProductsByCategory(1),
        'home_products' => $model->showProductsInHome(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}
