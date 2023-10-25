<?php

namespace Drupal\frica\Model;
use Drupal\Core\Database\Database;
use Exception;

class ContactModel{
  function insert($data)
  {
      $conn = Database::getConnection();
      return $conn->insert('contact')
        ->fields($data)->execute();
  }
}
