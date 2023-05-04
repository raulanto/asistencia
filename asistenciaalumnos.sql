/*
 Navicat Premium Data Transfer

 Source Server         : inmueble
 Source Server Type    : MySQL
 Source Server Version : 100902
 Source Host           : localhost:3306
 Source Schema         : asistenciaalumnos

 Target Server Type    : MySQL
 Target Server Version : 100902
 File Encoding         : 65001

 Date: 03/05/2023 22:12:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asistencia
-- ----------------------------
DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechahora` date NOT NULL DEFAULT '2023-03-20',
  `observacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fk_listagrupo` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_listagrupo`(`fk_listagrupo`) USING BTREE,
  CONSTRAINT `fk_listagrupo` FOREIGN KEY (`fk_listagrupo`) REFERENCES `listagrupo` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asistencia
-- ----------------------------
INSERT INTO `asistencia` VALUES (1, '9MUAB', '2023-05-01', 'virtual', 4);
INSERT INTO `asistencia` VALUES (2, 'L12F9', '2023-05-02', 'virtual', 4);
INSERT INTO `asistencia` VALUES (3, '540O8', '2023-05-03', 'virtual', 4);
INSERT INTO `asistencia` VALUES (4, 'X1CLI', '2023-05-04', 'virtual', 4);
INSERT INTO `asistencia` VALUES (5, 'N9X40', '2023-05-05', 'virtual', 4);
INSERT INTO `asistencia` VALUES (6, '9MUAB', '2023-05-01', 'virtual', 6);

-- ----------------------------
-- Table structure for carrera
-- ----------------------------
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carrera
-- ----------------------------
INSERT INTO `carrera` VALUES (1, 'ingenieria en sistema', 'p13682');
INSERT INTO `carrera` VALUES (2, 'ingenieria en industrial', 'g19424');
INSERT INTO `carrera` VALUES (3, 'ingenieria en sofware', 'f14513');
INSERT INTO `carrera` VALUES (4, 'ingenieria en quimica', 'f14142');
INSERT INTO `carrera` VALUES (5, 'ingenieria en aeroespcacial', 'r45256');

-- ----------------------------
-- Table structure for codigo
-- ----------------------------
DROP TABLE IF EXISTS `codigo`;
CREATE TABLE `codigo`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechahora` date NOT NULL,
  `fk_grupo` int NULL DEFAULT NULL,
  `fk_periodo` int NULL DEFAULT NULL,
  `fk_maestro` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_grupo`(`fk_grupo`) USING BTREE,
  INDEX `fk_periodo`(`fk_periodo`) USING BTREE,
  INDEX `fk_maestro`(`fk_maestro`) USING BTREE,
  CONSTRAINT `codigo_ibfk_1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupo` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `codigo_ibfk_2` FOREIGN KEY (`fk_periodo`) REFERENCES `periodo` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `codigo_ibfk_3` FOREIGN KEY (`fk_maestro`) REFERENCES `maestro` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of codigo
-- ----------------------------
INSERT INTO `codigo` VALUES (1, '9MUAB', '2023-05-01', 1, 5, 6);
INSERT INTO `codigo` VALUES (2, 'L12F9', '2023-05-02', 1, 5, 6);
INSERT INTO `codigo` VALUES (3, '540O8', '2023-05-03', 1, 5, 6);
INSERT INTO `codigo` VALUES (4, 'X1CLI', '2023-05-04', 1, 5, 6);
INSERT INTO `codigo` VALUES (5, 'N9X40', '2023-05-05', 1, 5, 6);

-- ----------------------------
-- Table structure for estudiante
-- ----------------------------
DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `matricula` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ape_paterno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ape_materno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fk_usuario` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_usuario`(`fk_usuario`) USING BTREE,
  CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 98 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estudiante
-- ----------------------------
INSERT INTO `estudiante` VALUES (1, '20300679', 'raul', 'benitez', 'correa', 1);
INSERT INTO `estudiante` VALUES (2, '20300412', 'esnel', 'ulin', 'garcia', 2);
INSERT INTO `estudiante` VALUES (3, '20300641', 'pablo', 'velazquez', 'olan', 3);
INSERT INTO `estudiante` VALUES (4, '20300723', 'remedio', 'torres', 'cordova', 4);
INSERT INTO `estudiante` VALUES (5, '20300653', 'gabriel', 'hernandez', 'diaz', 5);
INSERT INTO `estudiante` VALUES (10, '20300675', 'Juan', 'Juanita', 'Luna', 11);
INSERT INTO `estudiante` VALUES (11, '20300676', 'Carlos', 'Rosa', 'Flores', 12);
INSERT INTO `estudiante` VALUES (12, '20300677', 'Julio', 'Dina', 'Paceros', 13);
INSERT INTO `estudiante` VALUES (13, '20300678', 'Pedro', 'Mari', 'Peseros', 14);
INSERT INTO `estudiante` VALUES (14, '20300679', 'Ciro', 'Tina', 'Ponce', 15);
INSERT INTO `estudiante` VALUES (15, '20300680', 'Jesús', 'Iris', 'Pampas', 16);
INSERT INTO `estudiante` VALUES (16, '20300681', 'Pablo', 'Liz', 'Díaz', 17);
INSERT INTO `estudiante` VALUES (17, '20300682', 'Hermelinda', 'Pasta', 'Flores', 18);
INSERT INTO `estudiante` VALUES (18, '20300683', 'Wilson', 'Santona', 'Flores', 19);
INSERT INTO `estudiante` VALUES (19, '20300684', 'Noé', 'Julia', 'Pacheco', 20);
INSERT INTO `estudiante` VALUES (20, '20300685', 'Príncipe', 'María', 'Olarte', 21);
INSERT INTO `estudiante` VALUES (21, '20300686', 'Mario', 'María', 'Rojas', 22);
INSERT INTO `estudiante` VALUES (22, '20300687', 'Santos', 'Luisa', 'Olarte', 23);
INSERT INTO `estudiante` VALUES (23, '20300688', 'Santos', 'Diana', 'Alarcón', 24);
INSERT INTO `estudiante` VALUES (24, '20300689', 'Jerson', 'Diana', 'Ana', 25);
INSERT INTO `estudiante` VALUES (25, '20300690', 'Alejandro', 'Alejandra', 'Boa', 26);
INSERT INTO `estudiante` VALUES (26, '20300691', 'José', 'Tina', 'Flores', 27);
INSERT INTO `estudiante` VALUES (27, '20300692', 'Pablo', 'Reyna', 'Carrasco', 28);
INSERT INTO `estudiante` VALUES (28, '20300693', 'Wilmer', 'Doris', 'Carrasco', 29);
INSERT INTO `estudiante` VALUES (29, '20300694', 'Valdano', 'Lourdes', 'Aroca', 30);
INSERT INTO `estudiante` VALUES (30, '20300695', 'Jesús', 'Lourdes', 'Borda', 31);
INSERT INTO `estudiante` VALUES (31, '20300696', 'Paulino', 'Daysi', 'Pahua', 32);
INSERT INTO `estudiante` VALUES (32, '20300697', 'Ollanta', 'Nadina', 'Heredia', 33);
INSERT INTO `estudiante` VALUES (33, '20300698', 'Pablo', 'Érika', 'Alarcón', 34);
INSERT INTO `estudiante` VALUES (34, '20300699', 'Monises', 'Noemí', 'Huachara', 35);
INSERT INTO `estudiante` VALUES (35, '20300700', 'John', 'Gilda', 'Chipa', 36);
INSERT INTO `estudiante` VALUES (36, '20300701', 'Yesón', 'Jeruza', 'Pacha', 37);
INSERT INTO `estudiante` VALUES (37, '20300702', 'Zevallos', 'Liz', 'Quispe', 38);
INSERT INTO `estudiante` VALUES (38, '20300703', 'Geovanny', 'Evangelina', 'Flores', 39);
INSERT INTO `estudiante` VALUES (39, '20300704', 'Tauro', 'Reyna', 'Pérez', 40);
INSERT INTO `estudiante` VALUES (40, '20300705', 'Rony', 'Jeruza', 'Borda', 41);
INSERT INTO `estudiante` VALUES (41, '20300706', 'Santos', 'Gilda', 'Borda', 42);
INSERT INTO `estudiante` VALUES (42, '20300707', 'Dalton', 'Gilda', 'Flores', 43);
INSERT INTO `estudiante` VALUES (43, '20300708', 'Juan', 'Karina', 'Serrano', 44);
INSERT INTO `estudiante` VALUES (44, '20300709', 'Luis', 'Eliana', 'Meléndez', 45);
INSERT INTO `estudiante` VALUES (45, '20300710', 'Ciro', 'Cerilla', 'Pérez', 46);
INSERT INTO `estudiante` VALUES (46, '20300711', 'Pinto', 'Jacinta', 'Bravo', 47);
INSERT INTO `estudiante` VALUES (47, '20300712', 'Ronald', 'Elva', 'Nina', 48);
INSERT INTO `estudiante` VALUES (48, '20300713', 'Wilder', 'Nilda', 'Olarte', 49);
INSERT INTO `estudiante` VALUES (49, '20300714', 'Cristian', 'Gilva', 'Peña', 50);
INSERT INTO `estudiante` VALUES (50, '20300715', 'Ley', 'Bravo', 'Gilberta', 51);
INSERT INTO `estudiante` VALUES (51, '20300716', 'Joffre', 'Eli', 'Zamora', 52);
INSERT INTO `estudiante` VALUES (52, '20300717', 'Jorge', 'Juliana', 'Peña', 53);
INSERT INTO `estudiante` VALUES (53, '20300718', 'Jorge', 'Juliana', 'Peña', 54);

-- ----------------------------
-- Table structure for grupo
-- ----------------------------
DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `clave` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fk_materia` int NULL DEFAULT NULL,
  `fk_maestro` int NULL DEFAULT NULL,
  `fk_periodo` int NULL DEFAULT NULL,
  `fk_carrera` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_materia`(`fk_materia`) USING BTREE,
  INDEX `fk_maestro`(`fk_maestro`) USING BTREE,
  INDEX `fk_periodo`(`fk_periodo`) USING BTREE,
  INDEX `fk_carrera`(`fk_carrera`) USING BTREE,
  CONSTRAINT `fk_carrera` FOREIGN KEY (`fk_carrera`) REFERENCES `carrera` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_maestro` FOREIGN KEY (`fk_maestro`) REFERENCES `maestro` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_materia` FOREIGN KEY (`fk_materia`) REFERENCES `materia` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_periodo` FOREIGN KEY (`fk_periodo`) REFERENCES `periodo` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of grupo
-- ----------------------------
INSERT INTO `grupo` VALUES (1, 'rf123', 1, 6, 5, 1);
INSERT INTO `grupo` VALUES (2, 'gs351', 2, 6, 5, 1);
INSERT INTO `grupo` VALUES (3, 'va411', 3, 6, 5, 1);
INSERT INTO `grupo` VALUES (4, 'gn251', 4, 6, 5, 1);
INSERT INTO `grupo` VALUES (5, 'mb526', 5, 6, 5, 1);

-- ----------------------------
-- Table structure for listagrupo
-- ----------------------------
DROP TABLE IF EXISTS `listagrupo`;
CREATE TABLE `listagrupo`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `fk_grupo` int NULL DEFAULT NULL,
  `fk_estudiante` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_grupo`(`fk_grupo`) USING BTREE,
  INDEX `fk_estudiante`(`fk_estudiante`) USING BTREE,
  CONSTRAINT `fk_estudiante` FOREIGN KEY (`fk_estudiante`) REFERENCES `estudiante` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_grupo` FOREIGN KEY (`fk_grupo`) REFERENCES `grupo` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 183 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of listagrupo
-- ----------------------------
INSERT INTO `listagrupo` VALUES (1, 1, 1);
INSERT INTO `listagrupo` VALUES (2, 1, 2);
INSERT INTO `listagrupo` VALUES (3, 1, 3);
INSERT INTO `listagrupo` VALUES (4, 1, 5);
INSERT INTO `listagrupo` VALUES (5, 1, 4);
INSERT INTO `listagrupo` VALUES (6, 1, 11);
INSERT INTO `listagrupo` VALUES (7, 1, 12);
INSERT INTO `listagrupo` VALUES (8, 1, 13);
INSERT INTO `listagrupo` VALUES (9, 1, 14);
INSERT INTO `listagrupo` VALUES (10, 1, 15);
INSERT INTO `listagrupo` VALUES (11, 1, 16);
INSERT INTO `listagrupo` VALUES (12, 1, 17);
INSERT INTO `listagrupo` VALUES (13, 1, 18);
INSERT INTO `listagrupo` VALUES (14, 1, 19);
INSERT INTO `listagrupo` VALUES (15, 1, 20);
INSERT INTO `listagrupo` VALUES (16, 1, 21);
INSERT INTO `listagrupo` VALUES (17, 1, 22);
INSERT INTO `listagrupo` VALUES (18, 1, 23);
INSERT INTO `listagrupo` VALUES (19, 1, 24);
INSERT INTO `listagrupo` VALUES (20, 1, 25);
INSERT INTO `listagrupo` VALUES (21, 1, 26);
INSERT INTO `listagrupo` VALUES (22, 1, 27);
INSERT INTO `listagrupo` VALUES (23, 1, 28);
INSERT INTO `listagrupo` VALUES (24, 1, 29);
INSERT INTO `listagrupo` VALUES (25, 1, 30);
INSERT INTO `listagrupo` VALUES (26, 1, 31);
INSERT INTO `listagrupo` VALUES (27, 2, 11);
INSERT INTO `listagrupo` VALUES (28, 2, 12);
INSERT INTO `listagrupo` VALUES (29, 2, 13);
INSERT INTO `listagrupo` VALUES (30, 2, 14);
INSERT INTO `listagrupo` VALUES (31, 2, 15);
INSERT INTO `listagrupo` VALUES (32, 2, 16);
INSERT INTO `listagrupo` VALUES (33, 2, 17);
INSERT INTO `listagrupo` VALUES (34, 2, 18);
INSERT INTO `listagrupo` VALUES (35, 2, 19);
INSERT INTO `listagrupo` VALUES (36, 2, 20);
INSERT INTO `listagrupo` VALUES (37, 2, 21);
INSERT INTO `listagrupo` VALUES (38, 2, 22);
INSERT INTO `listagrupo` VALUES (39, 2, 23);
INSERT INTO `listagrupo` VALUES (40, 2, 24);
INSERT INTO `listagrupo` VALUES (41, 2, 25);
INSERT INTO `listagrupo` VALUES (42, 2, 26);
INSERT INTO `listagrupo` VALUES (43, 2, 27);
INSERT INTO `listagrupo` VALUES (44, 2, 28);
INSERT INTO `listagrupo` VALUES (45, 2, 29);
INSERT INTO `listagrupo` VALUES (46, 2, 30);
INSERT INTO `listagrupo` VALUES (47, 2, 31);
INSERT INTO `listagrupo` VALUES (48, 3, 13);
INSERT INTO `listagrupo` VALUES (49, 3, 14);
INSERT INTO `listagrupo` VALUES (50, 3, 15);
INSERT INTO `listagrupo` VALUES (51, 3, 16);
INSERT INTO `listagrupo` VALUES (52, 3, 17);
INSERT INTO `listagrupo` VALUES (53, 3, 18);
INSERT INTO `listagrupo` VALUES (54, 3, 19);
INSERT INTO `listagrupo` VALUES (55, 3, 20);
INSERT INTO `listagrupo` VALUES (56, 3, 21);
INSERT INTO `listagrupo` VALUES (57, 3, 22);
INSERT INTO `listagrupo` VALUES (58, 3, 23);
INSERT INTO `listagrupo` VALUES (59, 3, 24);
INSERT INTO `listagrupo` VALUES (60, 3, 25);
INSERT INTO `listagrupo` VALUES (61, 3, 26);
INSERT INTO `listagrupo` VALUES (62, 3, 27);
INSERT INTO `listagrupo` VALUES (63, 3, 28);
INSERT INTO `listagrupo` VALUES (64, 3, 29);
INSERT INTO `listagrupo` VALUES (65, 3, 30);
INSERT INTO `listagrupo` VALUES (66, 3, 31);
INSERT INTO `listagrupo` VALUES (67, 3, 32);
INSERT INTO `listagrupo` VALUES (68, 3, 33);
INSERT INTO `listagrupo` VALUES (69, 3, 34);
INSERT INTO `listagrupo` VALUES (70, 3, 35);
INSERT INTO `listagrupo` VALUES (71, 3, 36);
INSERT INTO `listagrupo` VALUES (72, 3, 37);
INSERT INTO `listagrupo` VALUES (73, 3, 38);
INSERT INTO `listagrupo` VALUES (74, 3, 39);
INSERT INTO `listagrupo` VALUES (75, 3, 40);
INSERT INTO `listagrupo` VALUES (76, 3, 41);
INSERT INTO `listagrupo` VALUES (77, 3, 42);
INSERT INTO `listagrupo` VALUES (78, 3, 43);
INSERT INTO `listagrupo` VALUES (79, 3, 44);
INSERT INTO `listagrupo` VALUES (80, 3, 45);
INSERT INTO `listagrupo` VALUES (81, 3, 46);
INSERT INTO `listagrupo` VALUES (82, 3, 47);
INSERT INTO `listagrupo` VALUES (83, 3, 48);
INSERT INTO `listagrupo` VALUES (84, 3, 49);
INSERT INTO `listagrupo` VALUES (85, 3, 50);
INSERT INTO `listagrupo` VALUES (86, 3, 51);
INSERT INTO `listagrupo` VALUES (87, 3, 52);
INSERT INTO `listagrupo` VALUES (88, 3, 53);
INSERT INTO `listagrupo` VALUES (94, 4, 13);
INSERT INTO `listagrupo` VALUES (95, 4, 14);
INSERT INTO `listagrupo` VALUES (96, 4, 15);
INSERT INTO `listagrupo` VALUES (97, 4, 16);
INSERT INTO `listagrupo` VALUES (98, 4, 17);
INSERT INTO `listagrupo` VALUES (99, 4, 18);
INSERT INTO `listagrupo` VALUES (100, 4, 19);
INSERT INTO `listagrupo` VALUES (101, 4, 20);
INSERT INTO `listagrupo` VALUES (102, 4, 21);
INSERT INTO `listagrupo` VALUES (103, 4, 22);
INSERT INTO `listagrupo` VALUES (104, 4, 23);
INSERT INTO `listagrupo` VALUES (105, 4, 24);
INSERT INTO `listagrupo` VALUES (106, 4, 25);
INSERT INTO `listagrupo` VALUES (107, 4, 26);
INSERT INTO `listagrupo` VALUES (108, 4, 27);
INSERT INTO `listagrupo` VALUES (109, 4, 28);
INSERT INTO `listagrupo` VALUES (110, 4, 29);
INSERT INTO `listagrupo` VALUES (111, 4, 30);
INSERT INTO `listagrupo` VALUES (112, 4, 31);
INSERT INTO `listagrupo` VALUES (113, 4, 32);
INSERT INTO `listagrupo` VALUES (114, 4, 33);
INSERT INTO `listagrupo` VALUES (115, 4, 34);
INSERT INTO `listagrupo` VALUES (116, 4, 35);
INSERT INTO `listagrupo` VALUES (117, 4, 36);
INSERT INTO `listagrupo` VALUES (118, 4, 37);
INSERT INTO `listagrupo` VALUES (119, 4, 38);
INSERT INTO `listagrupo` VALUES (120, 4, 39);
INSERT INTO `listagrupo` VALUES (121, 4, 40);
INSERT INTO `listagrupo` VALUES (122, 4, 41);
INSERT INTO `listagrupo` VALUES (123, 4, 42);
INSERT INTO `listagrupo` VALUES (124, 4, 43);
INSERT INTO `listagrupo` VALUES (125, 4, 44);
INSERT INTO `listagrupo` VALUES (126, 4, 45);
INSERT INTO `listagrupo` VALUES (127, 4, 46);
INSERT INTO `listagrupo` VALUES (128, 4, 47);
INSERT INTO `listagrupo` VALUES (129, 4, 48);
INSERT INTO `listagrupo` VALUES (130, 4, 49);
INSERT INTO `listagrupo` VALUES (131, 4, 50);
INSERT INTO `listagrupo` VALUES (132, 4, 51);
INSERT INTO `listagrupo` VALUES (133, 4, 52);
INSERT INTO `listagrupo` VALUES (134, 4, 53);
INSERT INTO `listagrupo` VALUES (138, 5, 13);
INSERT INTO `listagrupo` VALUES (139, 5, 14);
INSERT INTO `listagrupo` VALUES (140, 5, 15);
INSERT INTO `listagrupo` VALUES (141, 5, 16);
INSERT INTO `listagrupo` VALUES (142, 5, 17);
INSERT INTO `listagrupo` VALUES (143, 5, 18);
INSERT INTO `listagrupo` VALUES (144, 5, 19);
INSERT INTO `listagrupo` VALUES (145, 5, 20);
INSERT INTO `listagrupo` VALUES (146, 5, 21);
INSERT INTO `listagrupo` VALUES (147, 5, 22);
INSERT INTO `listagrupo` VALUES (148, 5, 23);
INSERT INTO `listagrupo` VALUES (149, 5, 24);
INSERT INTO `listagrupo` VALUES (150, 5, 25);
INSERT INTO `listagrupo` VALUES (151, 5, 26);
INSERT INTO `listagrupo` VALUES (152, 5, 27);
INSERT INTO `listagrupo` VALUES (153, 5, 28);
INSERT INTO `listagrupo` VALUES (154, 5, 29);
INSERT INTO `listagrupo` VALUES (155, 5, 30);
INSERT INTO `listagrupo` VALUES (156, 5, 31);
INSERT INTO `listagrupo` VALUES (157, 5, 32);
INSERT INTO `listagrupo` VALUES (158, 5, 33);
INSERT INTO `listagrupo` VALUES (159, 5, 34);
INSERT INTO `listagrupo` VALUES (160, 5, 35);
INSERT INTO `listagrupo` VALUES (161, 5, 36);
INSERT INTO `listagrupo` VALUES (162, 5, 37);
INSERT INTO `listagrupo` VALUES (163, 5, 38);
INSERT INTO `listagrupo` VALUES (164, 5, 39);
INSERT INTO `listagrupo` VALUES (165, 5, 40);
INSERT INTO `listagrupo` VALUES (166, 5, 41);
INSERT INTO `listagrupo` VALUES (167, 5, 42);
INSERT INTO `listagrupo` VALUES (168, 5, 43);
INSERT INTO `listagrupo` VALUES (169, 5, 44);
INSERT INTO `listagrupo` VALUES (170, 5, 45);
INSERT INTO `listagrupo` VALUES (171, 5, 46);
INSERT INTO `listagrupo` VALUES (172, 5, 47);
INSERT INTO `listagrupo` VALUES (173, 5, 48);
INSERT INTO `listagrupo` VALUES (174, 5, 49);
INSERT INTO `listagrupo` VALUES (175, 5, 50);
INSERT INTO `listagrupo` VALUES (176, 5, 51);
INSERT INTO `listagrupo` VALUES (177, 5, 52);
INSERT INTO `listagrupo` VALUES (178, 5, 53);

-- ----------------------------
-- Table structure for maestro
-- ----------------------------
DROP TABLE IF EXISTS `maestro`;
CREATE TABLE `maestro`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `clave` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fk_usuario` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_usuario`(`fk_usuario`) USING BTREE,
  CONSTRAINT `maestro_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`ID`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of maestro
-- ----------------------------
INSERT INTO `maestro` VALUES (1, 'z141', 'jose manuel gomez zea', 1);
INSERT INTO `maestro` VALUES (2, 'j452', 'janet cabrera morales', 2);
INSERT INTO `maestro` VALUES (3, 'a252', 'amada jackeline salomo', 3);
INSERT INTO `maestro` VALUES (4, 't513', 'teresa de jesus javi', 4);
INSERT INTO `maestro` VALUES (5, 'g415', 'gabriel rene bautista rodriguez', 5);
INSERT INTO `maestro` VALUES (6, 'JASJ', 'Raul Antonio de la cruz hernandez', 6);

-- ----------------------------
-- Table structure for materia
-- ----------------------------
DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 180 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materia
-- ----------------------------
INSERT INTO `materia` VALUES (1, 'ingenieria de software', 'g67c56');
INSERT INTO `materia` VALUES (2, 'lenguajes de interfaz', 'c65m43');
INSERT INTO `materia` VALUES (3, 'bases de datos', 'd12n60');
INSERT INTO `materia` VALUES (4, 'infraestructura de telecomunicaciones', 'h59g20');
INSERT INTO `materia` VALUES (5, 'redes de computadora', 'f14e36');
INSERT INTO `materia` VALUES (130, 'Gestión de Proyectos de TI', 'P97BD');
INSERT INTO `materia` VALUES (131, 'Sistemas Operativos', 'S85XR');
INSERT INTO `materia` VALUES (132, 'Programación en Sistemas Distribuidos', '826AL');
INSERT INTO `materia` VALUES (133, 'Gestión de Proyectos de TI', '3KQO5');
INSERT INTO `materia` VALUES (134, 'Ingeniería de Software', 'WVGT6');
INSERT INTO `materia` VALUES (135, 'Gestión de Proyectos de TI', 'KT52V');
INSERT INTO `materia` VALUES (136, 'Ingeniería de Software', 'MGV84');
INSERT INTO `materia` VALUES (137, 'Ingeniería de Requerimientos', 'HSL35');
INSERT INTO `materia` VALUES (138, 'Sistemas Operativos', 'CUGRL');
INSERT INTO `materia` VALUES (139, 'Estructuras de Datos', 'AH1RK');
INSERT INTO `materia` VALUES (140, 'Programación Web', 'B3JCO');
INSERT INTO `materia` VALUES (141, 'Robótica y Automatización', 'BKY9H');
INSERT INTO `materia` VALUES (142, 'Computación en la Nube', 'VBQ9U');
INSERT INTO `materia` VALUES (143, 'Simulación y Modelado de Sistemas', '6PKIC');
INSERT INTO `materia` VALUES (144, 'Programación Web', '9XKTU');
INSERT INTO `materia` VALUES (145, 'Inteligencia Artificial', 'BUH90');
INSERT INTO `materia` VALUES (146, 'Análisis y Diseño de Sistemas', 'T8KDZ');
INSERT INTO `materia` VALUES (147, 'Programación en Sistemas Distribuidos', 'EQ8BF');
INSERT INTO `materia` VALUES (148, 'Robótica y Automatización', 'WF72V');
INSERT INTO `materia` VALUES (149, 'Simulación y Modelado de Sistemas', 'D7JPW');
INSERT INTO `materia` VALUES (150, 'Arquitectura de Computadoras', '2I3ZT');
INSERT INTO `materia` VALUES (151, 'Simulación y Modelado de Sistemas', 'QW9KE');
INSERT INTO `materia` VALUES (152, 'Redes de Computadoras', '6UD52');
INSERT INTO `materia` VALUES (153, 'Inteligencia Artificial', 'QNTGZ');
INSERT INTO `materia` VALUES (154, 'Análisis y Diseño de Sistemas', 'SI7EA');
INSERT INTO `materia` VALUES (155, 'Base de Datos', 'JUQCE');
INSERT INTO `materia` VALUES (156, 'Sistemas Operativos', 'R3KED');
INSERT INTO `materia` VALUES (157, 'Análisis y Diseño de Algoritmos', '24R75');
INSERT INTO `materia` VALUES (158, 'Programación Web', 'MYPXG');
INSERT INTO `materia` VALUES (159, 'Estructuras de Datos', 'ZV1X4');
INSERT INTO `materia` VALUES (160, 'Programación Web', 'DF1MR');
INSERT INTO `materia` VALUES (161, 'Ingeniería de Requerimientos', 'WUVOS');
INSERT INTO `materia` VALUES (162, 'Ingeniería de Requerimientos', '2QL73');
INSERT INTO `materia` VALUES (163, 'Ingeniería de Requerimientos', '1DFMG');
INSERT INTO `materia` VALUES (164, 'Simulación y Modelado de Sistemas', 'RVJBK');
INSERT INTO `materia` VALUES (165, 'Programación en Sistemas Distribuidos', 'QGJAF');
INSERT INTO `materia` VALUES (166, 'Programación Orientada a Objetos', '1ZKNT');
INSERT INTO `materia` VALUES (167, 'Arquitectura de Computadoras', 'OJA5L');
INSERT INTO `materia` VALUES (168, 'Gestión de Proyectos de TI', 'UBHQ7');
INSERT INTO `materia` VALUES (169, 'Desarrollo de Aplicaciones Móviles', 'O642A');
INSERT INTO `materia` VALUES (170, 'Computación en la Nube', 'P7YSG');
INSERT INTO `materia` VALUES (171, 'Robótica y Automatización', 'KNXTM');
INSERT INTO `materia` VALUES (172, 'Desarrollo de Aplicaciones Móviles', 'EISAO');
INSERT INTO `materia` VALUES (173, 'Análisis y Diseño de Sistemas', 'ZLEST');
INSERT INTO `materia` VALUES (174, 'Análisis y Diseño de Algoritmos', 'NM41F');
INSERT INTO `materia` VALUES (175, 'Robótica y Automatización', '8LT63');
INSERT INTO `materia` VALUES (176, 'Simulación y Modelado de Sistemas', '538Z1');
INSERT INTO `materia` VALUES (177, 'Sistemas Operativos', '9RTU5');
INSERT INTO `materia` VALUES (178, 'Computación en la Nube', 'AT1FD');
INSERT INTO `materia` VALUES (179, 'Gestión de Proyectos de TI', '91W0F');

-- ----------------------------
-- Table structure for periodo
-- ----------------------------
DROP TABLE IF EXISTS `periodo`;
CREATE TABLE `periodo`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estatus` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of periodo
-- ----------------------------
INSERT INTO `periodo` VALUES (1, 'ene-juni-2021', 'd145', 127);
INSERT INTO `periodo` VALUES (2, 'agost-dici-2021', 'g145', 123);
INSERT INTO `periodo` VALUES (3, 'ene-juni-2022', 'h785', 127);
INSERT INTO `periodo` VALUES (4, 'agost-dici-2022', 'e154', 127);
INSERT INTO `periodo` VALUES (5, 'ene-juni-2023', 'p053', 127);

-- ----------------------------
-- Table structure for permiso
-- ----------------------------
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permiso
-- ----------------------------
INSERT INTO `permiso` VALUES (1, 'admnistrador');
INSERT INTO `permiso` VALUES (2, 'checador');
INSERT INTO `permiso` VALUES (3, 'director');
INSERT INTO `permiso` VALUES (4, 'operador');
INSERT INTO `permiso` VALUES (5, 'webmaster');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fk_permiso` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_permiso`(`fk_permiso`) USING BTREE,
  CONSTRAINT `fk_permiso` FOREIGN KEY (`fk_permiso`) REFERENCES `permiso` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'maestro', 1);
INSERT INTO `rol` VALUES (2, 'estudiante', 2);
INSERT INTO `rol` VALUES (3, 'root', 3);
INSERT INTO `rol` VALUES (4, 'superadmin', 4);
INSERT INTO `rol` VALUES (5, 'asistente', 5);

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` blob NOT NULL,
  `token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fk_rol` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `fk_rol`(`fk_rol`) USING BTREE,
  CONSTRAINT `fk_rol` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'superadmin', 0xE5521B3A54AF946A47766E8DB5364258, '66267', 2);
INSERT INTO `usuario` VALUES (2, 'webmaster', 0xE5521B3A54AF946A47766E8DB5364258, '84783', 2);
INSERT INTO `usuario` VALUES (3, 'checador', 0xE5521B3A54AF946A47766E8DB5364258, '72724', 2);
INSERT INTO `usuario` VALUES (4, 'admin', 0xE5521B3A54AF946A47766E8DB5364258, '68316', 2);
INSERT INTO `usuario` VALUES (5, 'gabriel', 0xE5521B3A54AF946A47766E8DB5364258, '63783', 2);
INSERT INTO `usuario` VALUES (6, 'raulito01234', 0xE5521B3A54AF946A47766E8DB5364258, '23423', 1);
INSERT INTO `usuario` VALUES (11, 'Juan', 0xE5521B3A54AF946A47766E8DB5364258, '66267', 2);
INSERT INTO `usuario` VALUES (12, 'Carlos', 0xE5521B3A54AF946A47766E8DB5364258, '66267', 2);
INSERT INTO `usuario` VALUES (13, 'Julio', 0xE5521B3A54AF946A47766E8DB5364258, '66268', 2);
INSERT INTO `usuario` VALUES (14, 'Pedro', 0xE5521B3A54AF946A47766E8DB5364258, '66269', 2);
INSERT INTO `usuario` VALUES (15, 'Ciro', 0xE5521B3A54AF946A47766E8DB5364258, '66270', 2);
INSERT INTO `usuario` VALUES (16, 'Jesús', 0xE5521B3A54AF946A47766E8DB5364258, '66271', 2);
INSERT INTO `usuario` VALUES (17, 'Pablo', 0xE5521B3A54AF946A47766E8DB5364258, '66272', 2);
INSERT INTO `usuario` VALUES (18, 'Hermelinda', 0xE5521B3A54AF946A47766E8DB5364258, '66273', 2);
INSERT INTO `usuario` VALUES (19, 'Wilson', 0xE5521B3A54AF946A47766E8DB5364258, '66274', 2);
INSERT INTO `usuario` VALUES (20, 'Noé', 0xE5521B3A54AF946A47766E8DB5364258, '66275', 2);
INSERT INTO `usuario` VALUES (21, 'Príncipe', 0xE5521B3A54AF946A47766E8DB5364258, '66276', 2);
INSERT INTO `usuario` VALUES (22, 'Mario', 0xE5521B3A54AF946A47766E8DB5364258, '66277', 2);
INSERT INTO `usuario` VALUES (23, 'Santos', 0xE5521B3A54AF946A47766E8DB5364258, '66278', 2);
INSERT INTO `usuario` VALUES (24, 'Santos', 0xE5521B3A54AF946A47766E8DB5364258, '66279', 2);
INSERT INTO `usuario` VALUES (25, 'Jerson', 0xE5521B3A54AF946A47766E8DB5364258, '66280', 2);
INSERT INTO `usuario` VALUES (26, 'Alejandro', 0xE5521B3A54AF946A47766E8DB5364258, '66281', 2);
INSERT INTO `usuario` VALUES (27, 'José', 0xE5521B3A54AF946A47766E8DB5364258, '66282', 2);
INSERT INTO `usuario` VALUES (28, 'Pablo', 0xE5521B3A54AF946A47766E8DB5364258, '66283', 2);
INSERT INTO `usuario` VALUES (29, 'Wilmer', 0xE5521B3A54AF946A47766E8DB5364258, '66284', 2);
INSERT INTO `usuario` VALUES (30, 'Valdano', 0xE5521B3A54AF946A47766E8DB5364258, '66285', 2);
INSERT INTO `usuario` VALUES (31, 'Jesús', 0xE5521B3A54AF946A47766E8DB5364258, '66286', 2);
INSERT INTO `usuario` VALUES (32, 'Paulino', 0xE5521B3A54AF946A47766E8DB5364258, '66287', 2);
INSERT INTO `usuario` VALUES (33, 'Ollanta', 0xE5521B3A54AF946A47766E8DB5364258, '66288', 2);
INSERT INTO `usuario` VALUES (34, 'Pablo', 0xE5521B3A54AF946A47766E8DB5364258, '66289', 2);
INSERT INTO `usuario` VALUES (35, 'Monises', 0xE5521B3A54AF946A47766E8DB5364258, '66290', 2);
INSERT INTO `usuario` VALUES (36, 'John', 0xE5521B3A54AF946A47766E8DB5364258, '66291', 2);
INSERT INTO `usuario` VALUES (37, 'Yesón', 0xE5521B3A54AF946A47766E8DB5364258, '66292', 2);
INSERT INTO `usuario` VALUES (38, 'Zevallos', 0xE5521B3A54AF946A47766E8DB5364258, '66293', 2);
INSERT INTO `usuario` VALUES (39, 'Geovanny', 0xE5521B3A54AF946A47766E8DB5364258, '66294', 2);
INSERT INTO `usuario` VALUES (40, 'Tauro', 0xE5521B3A54AF946A47766E8DB5364258, '66295', 2);
INSERT INTO `usuario` VALUES (41, 'Rony', 0xE5521B3A54AF946A47766E8DB5364258, '66296', 2);
INSERT INTO `usuario` VALUES (42, 'Santos', 0xE5521B3A54AF946A47766E8DB5364258, '66297', 2);
INSERT INTO `usuario` VALUES (43, 'Dalton', 0xE5521B3A54AF946A47766E8DB5364258, '66298', 2);
INSERT INTO `usuario` VALUES (44, 'Juan', 0xE5521B3A54AF946A47766E8DB5364258, '66299', 2);
INSERT INTO `usuario` VALUES (45, 'Luis', 0xE5521B3A54AF946A47766E8DB5364258, '66300', 2);
INSERT INTO `usuario` VALUES (46, 'Ciro', 0xE5521B3A54AF946A47766E8DB5364258, '66301', 2);
INSERT INTO `usuario` VALUES (47, 'Pinto', 0xE5521B3A54AF946A47766E8DB5364258, '66302', 2);
INSERT INTO `usuario` VALUES (48, 'Ronald', 0xE5521B3A54AF946A47766E8DB5364258, '66303', 2);
INSERT INTO `usuario` VALUES (49, 'Wilder', 0xE5521B3A54AF946A47766E8DB5364258, '66304', 2);
INSERT INTO `usuario` VALUES (50, 'Cristian', 0xE5521B3A54AF946A47766E8DB5364258, '66305', 2);
INSERT INTO `usuario` VALUES (51, 'Ley', 0xE5521B3A54AF946A47766E8DB5364258, '66306', 2);
INSERT INTO `usuario` VALUES (52, 'Joffre', 0xE5521B3A54AF946A47766E8DB5364258, '66307', 2);
INSERT INTO `usuario` VALUES (53, 'Jorge22', 0xE5521B3A54AF946A47766E8DB5364258, '66308', 2);
INSERT INTO `usuario` VALUES (54, 'Jorge', 0xE5521B3A54AF946A47766E8DB5364258, '66309', 2);

-- ----------------------------
-- View structure for vista1
-- ----------------------------
DROP VIEW IF EXISTS `vista1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vista1` AS SELECT
	asistencia.ID, 
	asistencia.codigo, 
	asistencia.fechahora, 
	asistencia.observacion, 
	listagrupo.fk_estudiante,
	CONCAT( estudiante.nombre, ' ', estudiante.ape_paterno, ' ', estudiante.ape_materno ) AS nombre
FROM
	asistencia
	INNER JOIN
	listagrupo
	ON 
		asistencia.fk_listagrupo = listagrupo.ID
	INNER JOIN
	estudiante
	ON 
		listagrupo.fk_estudiante = estudiante.ID
WHERE
	listagrupo.fk_estudiante = 13 AND
	listagrupo.fk_grupo = 5 ;

-- ----------------------------
-- View structure for vista2
-- ----------------------------
DROP VIEW IF EXISTS `vista2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vista2` AS SELECT
	estudiante.ID,
	CONCAT( estudiante.nombre, ' ', estudiante.ape_paterno, ' ', ape_materno ) AS nombre,
	COUNT( listagrupo.fk_estudiante ) AS Asistencias 
FROM
	asistencia
	INNER JOIN listagrupo ON asistencia.fk_listagrupo = listagrupo.ID
	INNER JOIN estudiante ON listagrupo.fk_estudiante = estudiante.ID
	INNER JOIN grupo ON listagrupo.fk_grupo = grupo.ID
	INNER JOIN materia ON grupo.fk_materia = materia.ID 
WHERE
	grupo.ID = '1' 
GROUP BY
	estudiante.ID ;

-- ----------------------------
-- Procedure structure for alumnos
-- ----------------------------
DROP PROCEDURE IF EXISTS `alumnos`;
delimiter ;;
CREATE PROCEDURE `alumnos`(in letra char)
begin
	select * from estudiante where nombre like concat("%",letra,"%");
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
