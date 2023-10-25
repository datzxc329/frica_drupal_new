<?php

namespace Drupal\frica\Controller;

use Drupal\Core\Controller\ControllerBase;

//use Drupal\Frica\Model\ContactModel;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for the contact form routes.
 */
class ManClothesController extends ControllerBase
{
  public function man_clothes()
  {
    return [
      '#theme' => 'man_clothes',
      '#data' => [],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function man_clothes_list()
  {
    //controller khi bấm vào nút buy now của man_clothes
    $manclothesModel = new ProductModel();
    return [
      '#theme' => 'man_clothes_list',
      '#data' => [
        'man_clothes' => $manclothesModel->showManClothes()
      ],
      '#attached' => [
      ],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}

