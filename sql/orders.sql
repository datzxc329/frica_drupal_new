/*
 Navicat Premium Data Transfer

 Source Server         : drupal 10
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : drupal10

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 01/11/2023 14:32:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `idOrders` int NOT NULL AUTO_INCREMENT,
  `checkout_firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `checkout_lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `checkout_company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `checkout_country_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `checkout_street_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `checkout_town_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `checkout_zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `checkout_phone` int NOT NULL,
  `checkout_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `total_price` decimal(10, 2) NOT NULL,
  PRIMARY KEY (`idOrders`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 'Dat', 'Pham', '3', '4', '5', '6', '123456', 855352809, 'phamtiendat1900@gmail.com', '2023-11-01 14:27:00', 1990.00);
INSERT INTO `orders` VALUES (2, 'Dat', 'Pham', 'yỳkofr', 'tgi', 'hahde', 'ahdeh', '123456', 855352809, 'phamtiendat1900@gmail.com', '2023-11-01 14:28:08', 1420.00);

SET FOREIGN_KEY_CHECKS = 1;
