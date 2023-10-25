<?php

namespace Drupal\frica\Model;
use Drupal\Core\Database\Database;
use Exception;

class ProductModel{
  function showManClothes(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 2", [
    ]);
    return $query->fetchAll();
  }
  function showComputers(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                    FROM product
                                    INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 1", [
    ]);
    return $query->fetchAll();
  }
  function showWomanClothes(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 3", [
    ]);
    return $query->fetchAll();
  }
  function showMobiles(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 4", [
    ]);
    return $query->fetchAll();
  }

  function showCameras(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 5", [
    ]);
    return $query->fetchAll();
  }

  function showWatches(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 6", [
    ]);
    return $query->fetchAll();
  }

  function showKitchens(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 7", [
    ]);
    return $query->fetchAll();
  }
  function showSports(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 8", [
    ]);
    return $query->fetchAll();
  }
  function showBeauties(): array{
    $database = \Drupal::database();
    $query = $database->query("SELECT product.idSP, product.name, product.img, product.price, product.promotional_price
                                      FROM product
                                      INNER JOIN category ON product.idLSP = category.idLSP WHERE product.idLSP = 9", [
    ]);
    return $query->fetchAll();
  }
  function getProductDetailById(){

  }
}
