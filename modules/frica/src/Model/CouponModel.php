<?php
namespace Drupal\frica\Model;

use Drupal\Core\Database\Database;
use Exception;

class CouponModel {
  public function getCouponCode($couponCode) {
    try {
      // Kết nối đến cơ sở dữ liệu.
      $database = Database::getConnection();

      // Truy vấn cơ sở dữ liệu để kiểm tra tính hợp lệ của mã giảm giá.
      $query = $database->select('coupon', 'c');
      $query->fields('c', ['idCoupon', 'coupon_code', 'expiration_date', 'status']);
      $query->condition('c.coupon_code', $couponCode);
      $query->condition('c.status', 1); // Đảm bảo mã giảm giá đang hoạt động.

      // Thực hiện truy vấn.
      $result = $query->execute();

      if ($row = $result->fetchAssoc()) {
        // Kiểm tra thời hạn của mã giảm giá.
        $expirationDate = strtotime($row['expiration_date']);
        $currentTime = \Drupal::time()->getCurrentTime();
        if ($expirationDate >= $currentTime) {
          // Mã giảm giá hợp lệ.
          return $row;
        }
      }
      // Mã giảm giá không tồn tại hoặc đã hết hạn.
      return null;
    } catch (Exception $e) {
      // Xử lý ngoại lệ nếu có.
      \Drupal::logger('frica')->error('Lỗi khi kiểm tra mã giảm giá: @error', ['@error' => $e->getMessage()]);
      return null;
    }
  }
}
