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

 Date: 01/11/2023 14:31:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `idCTDH` int NOT NULL AUTO_INCREMENT,
  `idOrders` int NOT NULL,
  `idSP` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `subtotal` decimal(10, 2) NOT NULL,
  PRIMARY KEY (`idCTDH`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (1, 1, 9, 1, 1010.00, 1010.00);
INSERT INTO `order_details` VALUES (2, 1, 7, 1, 980.00, 980.00);
INSERT INTO `order_details` VALUES (3, 2, 11, 1, 500.00, 500.00);
INSERT INTO `order_details` VALUES (4, 2, 1, 1, 920.00, 920.00);

SET FOREIGN_KEY_CHECKS = 1;
