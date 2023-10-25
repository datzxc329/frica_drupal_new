<?php
namespace Drupal\frica\Model;
use Drupal\Core\Database\Connection;
use Drupal\Core\Database\Database;
use PDOException;

class UserModel
{
  function checkLogin($data) {
    $database = \Drupal::database();
    $query = $database->query("SELECT COUNT(*) FROM user WHERE username = :username AND password = :password", [
      ':username' => $data['login_username'],
      ':password' => $data['login_password'],
    ]);
    $count = $query->fetchField();
    if ($count != 0) {
      return true;
    } else {
      return false;
    }
  }
  function saveSignup($data)
  {
    $database = \Drupal::database();
    $query1 = $database->query("SELECT COUNT(*) FROM user WHERE username = :username", [
      ':username' => $data['signup_username'],
    ]);
    $count = $query1->fetchField();
    if ($count == 0) {
      // Hash the password
      $hashedPassword = password_hash($data['signup_password'], PASSWORD_BCRYPT);
      // Chuẩn bị truy vấn SQL
      $query2 = $database->query("INSERT INTO user (username, password, name, phone, email, address) VALUES (:username, :password, :name, :phone, :email, :address)", [
        ':username' => $data['signup_username'],
        ':password' => $hashedPassword,
        ':name' => $data['signup_name'],
        ':phone' => $data['signup_phone'],
        ':email' => $data['signup_email'],
        ':address' => $data['signup_address'],
      ]);
      return true;
    } else {
      return false; // Provide a meaningful error message
    }
  }
}




