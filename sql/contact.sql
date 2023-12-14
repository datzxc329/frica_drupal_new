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

 Date: 01/11/2023 14:31:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `idContact` int NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idContact`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (1, 'vưegqwf', 'phamtiendat80@gmail.com', '8755452809', 'etwat');
INSERT INTO `contact` VALUES (2, 'dat', 'phamtiendat1900@gmail.com', '0855352809', 'hkyfh');
INSERT INTO `contact` VALUES (3, 'tắt', 'phamtiendat1900@gmail.com', '0855352809', 'tăt');
INSERT INTO `contact` VALUES (4, 'tắt', 'phamtiendat1900@gmail.com', '0855352809', 'tewtqa');

SET FOREIGN_KEY_CHECKS = 1;
