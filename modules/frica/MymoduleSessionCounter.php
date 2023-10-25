<?php

namespace Drupal\frica;

use Symfony\Component\HttpFoundation\Request;

class MymoduleSessionCounter {
  public function increment(Request $request) {
    $session = $request->getSession();
    $value = $session->get('count', 0);
    $session->set('count', $value + 1);
    return $value;
  }
}
