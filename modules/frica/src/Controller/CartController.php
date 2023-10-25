<?php

namespace Drupal\frica\Controller;

use Drupal\Core\Controller\ControllerBase;
//use Drupal\Frica\Model\ContactModel;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for the contact form routes.
 */
class CartController extends ControllerBase
{
  public function cart()
  {
    return [
      '#theme' => 'cart',
      '#data' => [],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}
