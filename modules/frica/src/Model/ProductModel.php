<?php

namespace Drupal\frica\Model;
use Drupal\Core\Database\Database;
use Exception;

class ProductModel{

  function showProductsInHome(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price, category.name as category_name
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE flag = 1", [
    ]);
    return $query->fetchAll();
  }
  function getProductDetailById($idSP){
    $database = \Drupal::database();
    $query = $database->query("SELECT * FROM product WHERE idSP = :idSP", [
      ':idSP' => $idSP,
    ]);
    return $query->fetchAssoc();
  }
  function showProductsByCategory(int $categoryId): array {
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price, category.name as category_name
                              FROM product
                              INNER JOIN category ON product.idLSP = category.idLSP
                              WHERE product.idLSP = :category_id", [
      ':category_id' => $categoryId,
    ]);
    return $query->fetchAll();
  }

  function insert($data)
  {
    $conn = Database::getConnection();
    return $conn->insert('product')
      ->fields($data)->execute();
  }
//  function delete($idSP)
//  {
//    $conn = Database::getConnection();
//    return $conn->delete('product')
//      ->condition('idSP', $idSP)->execute();
//  }
//  function update($idSP, $data)
//  {
//    $conn = Database::getConnection();
//    return $conn->update('product')
//      ->condition('idSP', $idSP)->execute();
//  }
//  public function updateCartItemQuantity($cartId, $newQuantity) {
//    // Perform an SQL update query to update the quantity in the cart table.
//    $query = db_update('my_module_cart')
//      ->fields(['quantity' => $newQuantity])
//      ->condition('cart_id', $cartId)
//      ->execute();
//  }
}
