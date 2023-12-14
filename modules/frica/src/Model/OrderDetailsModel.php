<?php

namespace Drupal\frica\Model;
use Drupal\Core\Database\Database;
use Exception;

class OrderDetailsModel{
  function insert($data)
  {
    $conn = Database::getConnection();
    return $conn->insert('order_details')
      ->fields($data)->execute();
  }
}

