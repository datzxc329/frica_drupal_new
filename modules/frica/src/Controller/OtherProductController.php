<?php
namespace Drupal\frica\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\frica\Model\ProductModel;
use Symfony\Component\DependencyInjection\ContainerInterface;
class OtherProductController extends ControllerBase
{
  public function mobiles()
  {
    $mobiles = new ProductModel();
    return [
      '#theme' => 'mobiles',
      '#data' => [
        'mobiles' => $mobiles->showMobiles(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function cameras()
  {
    $cameras = new ProductModel();
    return [
      '#theme' => 'cameras',
      '#data' => [
        'cameras' => $cameras->showCameras(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function watches()
  {
    $watches = new ProductModel();
    return [
      '#theme' => 'watches',
      '#data' => [
        'watches' => $watches->showWatches(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function kitchens()
  {
    $kitchens = new ProductModel();
    return [
      '#theme' => 'kitchens',
      '#data' => [
        'kitchens' => $kitchens->showKitchens(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function sports()
  {
    $sports = new ProductModel();
    return [
      '#theme' => 'sports',
      '#data' => [
        'sports' => $sports->showSports(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function beauties()
  {
    $beauties = new ProductModel();
    return [
      '#theme' => 'beauties',
      '#data' => [
        'beauties' => $beauties->showBeauties(),
      ],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}
