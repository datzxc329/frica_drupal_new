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

 Date: 01/11/2023 14:31:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `idLSP` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idLSP`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'computers');
INSERT INTO `category` VALUES (2, 'man_clothes');
INSERT INTO `category` VALUES (3, 'woman_clothes');
INSERT INTO `category` VALUES (4, 'mobiles');
INSERT INTO `category` VALUES (5, 'cameras');
INSERT INTO `category` VALUES (6, 'watches');
INSERT INTO `category` VALUES (7, 'kitchens');
INSERT INTO `category` VALUES (8, 'sports');
INSERT INTO `category` VALUES (9, 'beauties');

SET FOREIGN_KEY_CHECKS = 1;
