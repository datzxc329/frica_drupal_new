<?php

namespace Drupal\frica\Controller;

use Drupal\Core\Controller\ControllerBase;

//use Drupal\Frica\Model\ContactModel;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
        'home_computers' => $model->showComputers(),
        'home_mobiles' => $model->showMobiles(),
        'home_watches' => $model->showWatches(),
        'home_cameras' => $model->showCameras(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}
