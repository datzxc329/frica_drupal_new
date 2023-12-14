<?php

namespace Drupal\frica\Model;
use Drupal\Core\Database\Database;
use Exception;

class OrdersModel{
  function insert($data)
  {
    $conn = Database::getConnection();
    return $conn->insert('orders')
      ->fields($data)->execute();
  }
}
