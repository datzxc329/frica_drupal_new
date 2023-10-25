<?php

namespace Drupal\frica\Controller;

use Drupal\Core\Controller\ControllerBase;
//use Drupal\Frica\Model\ContactModel;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for the contact form routes.
 */
class AccountsController extends ControllerBase
{
  public function login()
  {
    $form = \Drupal::formBuilder()->getForm('Drupal\frica\Form\LoginForm');
    return [
      '#theme' => 'login',
      '#data' => [
        'form' => $form,
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
  public function signup()
  {
    $form = \Drupal::formBuilder()->getForm('Drupal\frica\Form\SignupForm');
    return [
      '#theme' => 'signup',
      '#data' => [
        'form' => $form,
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
  public function successlogin(): array
  {
    return [
      '#theme' => 'successlogin',
      '#data' => [],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function successsignup(): array
  {
    return [
      '#theme' => 'successsignup',
      '#data' => [],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
  public function forgotpwd()
  {

  }
}


