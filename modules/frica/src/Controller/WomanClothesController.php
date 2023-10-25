<?php

namespace Drupal\frica\Controller;

use Drupal\Core\Controller\ControllerBase;

//use Drupal\Frica\Model\ContactModel;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for the contact form routes.
 */
class WomanClothesController extends ControllerBase
{
  public function woman_clothes()
  {
    return [
      '#theme' => 'woman_clothes',
      '#data' => [],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function woman_clothes_list()
  {
    //controller khi bấm vào nút buy now của man_clothes
    $womanclothesModel = new ProductModel();
    return [
      '#theme' => 'woman_clothes_list',
      '#data' => [
        'woman_clothes' => $womanclothesModel->showWomanClothes()
      ],
      '#attached' => [
      ],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}

