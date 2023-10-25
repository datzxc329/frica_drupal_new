<?php

namespace Drupal\employee\Model;

use Drupal\Core\Database\Database;

class EmployeeModels
{

    function getListEmployee(): array
    {
        $database = \Drupal::database();
        $query = $database->query("SELECT * FROM employee", [
        ]);
        return $query->fetchAll();
    }

  function getDetailEmployee($id)
  {
    $database = \Drupal::database();
    $query = $database->query("SELECT * FROM employee where id = :id", [
      ':id' => $id
    ]);
    return $query->fetch();
  }

    function update($data)
    {
        $conn = Database::getConnection();
        return $conn->update('employee')
            ->fields($data)->condition('id' , $data['id'])->execute();
    }
    function insert($data)
    {
        $conn = Database::getConnection();
        return $conn->insert('employee')
            ->fields($data)->execute();
    }
}
