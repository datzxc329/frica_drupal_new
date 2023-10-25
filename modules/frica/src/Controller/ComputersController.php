<?php
namespace Drupal\frica\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\DependencyInjection\ContainerInterface;
class ComputersController extends ControllerBase
{
  public function computers()
  {
    $computerModel = new ProductModel();
    return [
      '#theme' => 'computers',
      '#data' => [
        'computers' => $computerModel->showComputers(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}
