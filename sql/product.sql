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

 Date: 01/11/2023 14:32:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `idSP` int NOT NULL AUTO_INCREMENT,
  `idLSP` int NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `quantity` int NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `promotional_price` decimal(10, 2) NULL DEFAULT NULL,
  `flag` int(1) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  PRIMARY KEY (`idSP`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 1, 'Laptop HP', 1020.00, 4, 'vjvjfv', 'hp1.png', 920.00, 1);
INSERT INTO `product` VALUES (2, 1, 'Laptop Dell', 1200.00, 0, '53464', 'dell1.png', 1100.00, 0);
INSERT INTO `product` VALUES (4, 3, 'Áo khoác nữ', 24.00, 4, 'gưgg32g', 'woman1.png', 22.00, 0);
INSERT INTO `product` VALUES (5, 1, 'Laptop HP vechai', 800.00, 13, 'wqfw', 'hp1.png', 750.00, 0);
INSERT INTO `product` VALUES (6, 2, 'Áo khoác nam', 40.00, 23, 'agfagw', 'man1.png', 37.00, 0);
INSERT INTO `product` VALUES (7, 4, 'Samsung', 1000.00, 9, 'ưgawtgf', 'mobile1.png', 980.00, 1);
INSERT INTO `product` VALUES (8, 5, 'Camera X', 400.00, 21, 'gheghe', 'camera1.png', 400.00, 0);
INSERT INTO `product` VALUES (9, 6, 'Watch gfeta', 1020.00, 34, 'ehdygey', 'watch1.png', 1010.00, 1);
INSERT INTO `product` VALUES (10, 4, 'Samsung atwtwt', 1400.00, 72, 'deyseyesyesy', 'mobile1.png', 1400.00, 0);
INSERT INTO `product` VALUES (11, 5, 'Camera Y', 500.00, 54, 'gaegeyety', 'camera1.png', 500.00, 1);
INSERT INTO `product` VALUES (12, 6, 'Watch Z', 270.00, 17, 'jrdjtgruij', 'watch1.png', 260.00, 0);
INSERT INTO `product` VALUES (13, 7, 'Kitchen X', 56.00, 24, 'drdrurdud', 'kitchen1.png', 55.00, 0);
INSERT INTO `product` VALUES (14, 7, 'Kitchen Y', 120.00, 23, 'gygawye', 'kitchen2.png', 110.00, 0);
INSERT INTO `product` VALUES (15, 7, 'Kitchen Z', 143.00, 31, 'seyhsysy', 'kitchen3.png', 141.50, 0);
INSERT INTO `product` VALUES (16, 8, 'Sport X', 68.00, 12, 'julhjluoku', 'sport1.png', 67.00, 0);
INSERT INTO `product` VALUES (17, 8, 'Sport Y', 71.00, 14, 'dtsetysy', 'sport2.png', 70.00, 0);
INSERT INTO `product` VALUES (18, 8, 'Sport Z', 93.50, 15, 'mygkygi', 'sport3.png', 91.50, 0);
INSERT INTO `product` VALUES (19, 3, 'Áo khoác gheyhgetg', 57.00, 11, 'rkititurd', 'woman1.png', 57.25, 0);
INSERT INTO `product` VALUES (20, 1, 'Laptop A', 1200.00, 11, 'dhyhsey', 'dell1.png', 1180.00, 0);
INSERT INTO `product` VALUES (21, 1, 'Laptop B', 1300.00, 12, 'jtdjuu', 'dell1.png', 1260.00, 0);
INSERT INTO `product` VALUES (22, 1, 'Laptop C', 1250.00, 13, 'shre4q24', 'dell1.png', 1230.00, 0);
INSERT INTO `product` VALUES (23, 1, 'Laptop D', 1350.00, 14, 'reu5reu5', 'dell1.png', 1330.00, 0);
INSERT INTO `product` VALUES (24, 2, 'Áo nâng ', 14.50, 21, 'sgzasgty', 'man1.png', 14.10, 0);
INSERT INTO `product` VALUES (25, 9, 'Son môi ', 254.00, 45, 'uyufyug', 'kitchen1.png', 252.00, 0);

SET FOREIGN_KEY_CHECKS = 1;
