/*
 Navicat Premium Dump SQL

 Source Server         : INMA
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : trips

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 07/03/2025 20:12:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for brasil
-- ----------------------------
DROP TABLE IF EXISTS `brasil`;
CREATE TABLE `brasil`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `gasto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `monto` int NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brasil
-- ----------------------------
INSERT INTO `brasil` VALUES (1, 'xxxx', 100);
INSERT INTO `brasil` VALUES (2, 'montp', 100);
INSERT INTO `brasil` VALUES (3, 'montp', 100);
INSERT INTO `brasil` VALUES (4, 'museo', 150);
INSERT INTO `brasil` VALUES (5, ' bollos', 5);
INSERT INTO `brasil` VALUES (6, 'bicicleta', 250);
INSERT INTO `brasil` VALUES (7, 'paseo a caballo', 30);

SET FOREIGN_KEY_CHECKS = 1;
