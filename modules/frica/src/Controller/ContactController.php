<?php
namespace Drupal\frica\Controller;
use Drupal\Core\Controller\ControllerBase;
class ContactController extends ControllerBase
{
  public function contact()
  {
    $form = \Drupal::formBuilder()->getForm('Drupal\frica\Form\ContactForm');
    return [
      '#theme' => 'contact',
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
  public function thanks(): array
  {
    return [
      '#theme' => 'thanks',
      '#data' => [],
      '#attached' => [],
      '#cache' => array(
        'max-age' => 0
      )
    ];
  }
}


