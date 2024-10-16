/*
 Navicat Premium Data Transfer

 Source Server         : My Local
 Source Server Type    : MySQL
 Source Server Version : 100421 (10.4.21-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : ams_laboran

 Target Server Type    : MySQL
 Target Server Version : 100421 (10.4.21-MariaDB)
 File Encoding         : 65001

 Date: 16/10/2024 20:14:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_delete` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` (`id`, `name`, `description`, `is_active`, `is_delete`) VALUES (1, 'Mikrokontroler', 'Mikrokontroler dan sensor', 1, 0);
INSERT INTO `categories` (`id`, `name`, `description`, `is_active`, `is_delete`) VALUES (2, 'Tes123', 'Tes123', 0, 1);
COMMIT;

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of courses
-- ----------------------------
BEGIN;
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (1, 'SINF3031', 'Kecerdasan Artifisal', 'Teori', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (2, 'SINF3033', 'Praktikum Kecerdasan Artifiaial', 'Praktikum', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (3, 'SINF2019', 'Basis Data II', 'Teori', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (4, 'SINF6047', 'Praktikum Penelusuran Informasi', 'Praktikum', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (5, 'SINF6049', 'Keamanan Siber', 'Teori', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (6, 'SINF1001', 'Pemrograman', 'Teori', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (7, 'SMPAP002', 'Proposal Penelitian', 'Proposal Penelitian', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (8, 'SINF6083', 'Praktikum Arsitektur Perangkat Lunak', 'Praktikum', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (9, 'SMPAPA001', 'Tugas Akhir', 'Tugas Akhir', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (10, 'SINF4043', 'Seminar', 'Seminar', 1, 0);
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `is_active`, `is_delete`) VALUES (11, 'SINF6075', 'Praktikum Protokol Jaringan Maju', 'Praktikum', 1, 0);
COMMIT;

-- ----------------------------
-- Table structure for equipment
-- ----------------------------
DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `categories_id` (`categories_id`),
  CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of equipment
-- ----------------------------
BEGIN;
INSERT INTO `equipment` (`id`, `code`, `name`, `description`, `qty`, `categories_id`, `is_active`, `is_delete`, `created_at`) VALUES (1, 'MIKROTIK/INF/2024/05', 'Mikrotik', 'Mikrotik adalah alat bla bla', 20, 1, 1, 1, '2024-10-05 14:04:00');
INSERT INTO `equipment` (`id`, `code`, `name`, `description`, `qty`, `categories_id`, `is_active`, `is_delete`, `created_at`) VALUES (2, 'MIKROTIK2/INF/2024/05', 'Mikrotik 2', 'Alat Jaringan', 9, 1, 1, 0, '2024-10-05 15:04:15');
INSERT INTO `equipment` (`id`, `code`, `name`, `description`, `qty`, `categories_id`, `is_active`, `is_delete`, `created_at`) VALUES (7, 'TES/INF/2024/15', 'Tes', 'Tes', 170, 1, 1, 0, '2024-10-15 01:12:05');
COMMIT;

-- ----------------------------
-- Table structure for equipment_stock_history
-- ----------------------------
DROP TABLE IF EXISTS `equipment_stock_history`;
CREATE TABLE `equipment_stock_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` bigint(20) DEFAULT NULL,
  `to` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `equipment_id` (`equipment_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `equipment_stock_history_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`),
  CONSTRAINT `equipment_stock_history_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of equipment_stock_history
-- ----------------------------
BEGIN;
INSERT INTO `equipment_stock_history` (`id`, `equipment_id`, `user_id`, `from`, `to`, `created_at`) VALUES (1, 1, 1, 20, 20, '2024-10-15 00:48:51');
INSERT INTO `equipment_stock_history` (`id`, `equipment_id`, `user_id`, `from`, `to`, `created_at`) VALUES (2, 2, 1, 9, 9, '2024-10-15 00:49:04');
INSERT INTO `equipment_stock_history` (`id`, `equipment_id`, `user_id`, `from`, `to`, `created_at`) VALUES (3, 7, 1, 100, 100, '2024-10-15 01:12:05');
INSERT INTO `equipment_stock_history` (`id`, `equipment_id`, `user_id`, `from`, `to`, `created_at`) VALUES (4, 7, 1, 100, 120, '2024-10-15 01:32:14');
INSERT INTO `equipment_stock_history` (`id`, `equipment_id`, `user_id`, `from`, `to`, `created_at`) VALUES (5, 7, 1, 120, 170, '2024-10-15 01:32:42');
COMMIT;

-- ----------------------------
-- Table structure for informations
-- ----------------------------
DROP TABLE IF EXISTS `informations`;
CREATE TABLE `informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colored_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `playstore_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appstore_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of informations
-- ----------------------------
BEGIN;
INSERT INTO `informations` (`id`, `content_image`, `favicon_logo`, `base_logo`, `colored_logo`, `footer_logo`, `name`, `desc`, `title`, `sub_title`, `address`, `address_link`, `email`, `whatsapp`, `facebook_link`, `instagram_link`, `linkedin_link`, `playstore_link`, `appstore_link`, `created_at`, `updated_at`) VALUES (1, 'assets/img/content/Content-20240828023406.png', 'assets/img/logo/Image-20241006022324.png', 'assets/img/logo/Image-20240828023438.png', 'assets/img/logo/Image-20240828023445.png', 'assets/img/logo/Image-20240828023452.png', 'INFORMATIKA', 'Aplikasi Peminjaman pada Laboran Informatika', 'SIPEMLAB', 'Aplikasi Peminjaman pada Laboran Informatika', 'Kopelma Darussalam, Banda Aceh, Aceh', 'https://maps.google.com/maps?q=apartemen%20green%20lake%20view%20depok&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near', 'maulyanda@usk.ac.id', '+628 11 1361 613', 'https://www.facebook.com/maulyanda', 'https://www.instagram.com/maulyanda', 'https://www.linkedin.com/in/maulyanda', '#', '#', '2023-12-28 13:51:50', '2024-03-13 04:21:41');
COMMIT;

-- ----------------------------
-- Table structure for loans
-- ----------------------------
DROP TABLE IF EXISTS `loans`;
CREATE TABLE `loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoice` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('submission','approved','loaned','returned','late','rejected','cancel') NOT NULL,
  `amount` int(11) NOT NULL,
  `need_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `objective` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `need_id` (`need_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`need_id`) REFERENCES `needs` (`id`),
  CONSTRAINT `loans_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of loans
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for loans_history
-- ----------------------------
DROP TABLE IF EXISTS `loans_history`;
CREATE TABLE `loans_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('submission','approved','loaned','returned','late','rejected','cancel') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `loans_id` (`loans_id`),
  CONSTRAINT `loans_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `loans_history_ibfk_2` FOREIGN KEY (`loans_id`) REFERENCES `loans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of loans_history
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for loans_item
-- ----------------------------
DROP TABLE IF EXISTS `loans_item`;
CREATE TABLE `loans_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loans_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipment_id` (`equipment_id`),
  KEY `loans_id` (`loans_id`),
  CONSTRAINT `loans_item_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`),
  CONSTRAINT `loans_item_ibfk_2` FOREIGN KEY (`loans_id`) REFERENCES `loans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of loans_item
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for needs
-- ----------------------------
DROP TABLE IF EXISTS `needs`;
CREATE TABLE `needs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of needs
-- ----------------------------
BEGIN;
INSERT INTO `needs` (`id`, `name`, `description`, `is_active`, `is_delete`) VALUES (1, 'Praktikum', 'Peminjaman alat untuk praktikum', 1, 0);
INSERT INTO `needs` (`id`, `name`, `description`, `is_active`, `is_delete`) VALUES (2, 'Penelitian', 'Peminjaman alat untuk riset', 1, 0);
INSERT INTO `needs` (`id`, `name`, `description`, `is_active`, `is_delete`) VALUES (3, 'Pembelajaran', 'Peminjaman alat untuk pembelajaran', 1, 0);
INSERT INTO `needs` (`id`, `name`, `description`, `is_active`, `is_delete`) VALUES (5, 'Tugas', 'Peminjaman alat untuk tugas', 1, 0);
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `idpermissions` int(11) NOT NULL AUTO_INCREMENT,
  `idpermissions_group` int(11) NOT NULL,
  `code_class` varchar(100) CHARACTER SET latin1 NOT NULL,
  `code_method` varchar(100) CHARACTER SET latin1 NOT NULL,
  `code_url` varchar(100) CHARACTER SET latin1 NOT NULL,
  `display_name` varchar(100) NOT NULL DEFAULT '-',
  `display_icon` varchar(100) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `type` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idpermissions`),
  KEY `idpermissions_group` (`idpermissions_group`),
  CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`idpermissions_group`) REFERENCES `permissions_group` (`idpermissions_group`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (2, 3, 'equipment', 'list', 'list', 'LIST', '', 1, '2023-06-13 14:59:41', '2024-10-05 14:54:44', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (3, 1, 'informations', 'index', ' ', 'INFORMATIONS', '', 1, '2024-06-18 11:02:11', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (4, 5, 'rolespermissions', 'permissions', 'permissions', 'PERMISSIONS', '', 1, '2023-05-28 11:00:38', '2023-05-28 11:23:30', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (5, 5, 'rolespermissions', 'permissions_group', 'permissions_group', 'PERMISSIONS GROUP', '', 1, '2023-05-28 11:09:26', '2023-05-28 11:10:37', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (6, 5, 'rolespermissions', 'roles', 'roles', 'ROLES', '', 1, '2023-05-28 13:36:08', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (7, 3, 'equipment', 'category', 'category', 'CATEGORY', '', 1, '2024-10-05 15:36:47', '2024-10-05 15:37:10', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (8, 6, 'home', 'index', ' ', 'DASHBOARD', '', 1, '2024-10-05 15:56:49', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (9, 7, 'loans', 'index', ' ', 'LOANS', '', 1, '2024-10-05 15:59:49', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (10, 4, 'user', 'list', 'list', 'LIST', '', 1, '2024-10-05 16:02:34', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (11, 8, 'courses', 'list', 'list', 'LIST', '', 1, '2024-10-05 18:45:32', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (12, 9, 'needs', 'list', 'list', 'LIST', '', 1, '2024-10-05 18:58:50', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (13, 10, 'incoming', 'list', 'list', 'LIST', '', 1, '2024-10-06 00:50:14', '2024-10-06 01:00:04', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (14, 11, 'waiting', 'list', 'list', 'LIST', '', 1, '2024-10-06 00:50:37', '2024-10-06 01:00:36', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (15, 12, 'process', 'list', 'list', 'LIST', '', 1, '2024-10-06 00:51:04', '2024-10-06 01:00:18', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (16, 13, 'complete', 'list', 'list', 'LIST', '', 1, '2024-10-06 01:01:01', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (17, 14, 'late', 'list', 'list', 'LIST', '', 1, '2024-10-06 12:42:29', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (18, 14, 'late', 'view', 'view', 'VIEW', '', 1, '2024-10-06 12:45:08', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (19, 13, 'complete', 'view', 'view', 'VIEW', '', 1, '2024-10-06 12:47:50', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (20, 15, 'reject', 'list', 'list', 'LIST', '', 1, '2024-10-06 12:54:20', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (21, 15, 'reject', 'view', 'view', 'VIEW', '', 1, '2024-10-06 12:54:40', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (22, 10, 'incoming', 'view', 'view', 'VIEW', '', 1, '2024-10-06 14:27:19', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (23, 11, 'waiting', 'view', 'view', 'VIEW', '', 1, '2024-10-06 14:27:38', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (24, 12, 'process', 'view', 'view', 'VIEW', '', 1, '2024-10-06 14:28:02', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (25, 16, 'cancel', 'list', 'list', 'LIST', '', 1, '2024-10-15 00:18:37', '0000-00-00 00:00:00', 'TRUE');
INSERT INTO `permissions` (`idpermissions`, `idpermissions_group`, `code_class`, `code_method`, `code_url`, `display_name`, `display_icon`, `status`, `created_date`, `updated_date`, `type`) VALUES (26, 16, 'cancel', 'view', 'view', 'VIEW', '', 1, '2024-10-15 00:18:58', '0000-00-00 00:00:00', 'TRUE');
COMMIT;

-- ----------------------------
-- Table structure for permissions_group
-- ----------------------------
DROP TABLE IF EXISTS `permissions_group`;
CREATE TABLE `permissions_group` (
  `idpermissions_group` int(11) NOT NULL AUTO_INCREMENT,
  `permissions_groupname` varchar(100) NOT NULL,
  `display_icon` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `group` tinyint(1) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`idpermissions_group`),
  KEY `permissions_groupname` (`permissions_groupname`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permissions_group
-- ----------------------------
BEGIN;
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (1, 'INFORMATIONS', 'fa fa-info-circle', 1, 2, '2024-06-18 11:00:45');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (3, 'EQUIPMENT', 'fa fa-list-alt', 1, 2, '2023-06-12 12:52:45');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (4, 'USERS', 'fa fa-user', 1, 2, '2023-05-28 14:34:35');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (5, 'ROLES & PERMISSIONS', 'fa fa-key', 1, 2, '2023-05-28 10:20:59');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (6, 'DASHBOARD', 'fa fa-th-large', 1, 1, '2024-10-05 15:55:55');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (7, 'LOANS', 'fa fa-address-card', 1, 1, '2024-10-05 15:59:13');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (8, 'COURSES', 'fa fa-book', 1, 2, '2024-10-05 18:45:02');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (9, 'NEEDS', 'fa fa-comments', 1, 2, '2024-10-05 18:58:28');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (10, 'INCOMING', 'fa fa-archive', 1, 3, '2024-10-06 00:46:59');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (11, 'WAITING', 'fa fa-spinner', 1, 3, '2024-10-06 00:48:31');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (12, 'PROCESS', 'fa fa-inbox', 1, 3, '2024-10-06 00:49:17');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (13, 'COMPLETE', 'fa fa-check', 1, 3, '2024-10-06 00:53:38');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (14, 'LATE', 'fa fa-hourglass', 1, 3, '2024-10-06 00:55:15');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (15, 'REJECT', 'fa fa-times', 1, 3, '2024-10-06 12:53:50');
INSERT INTO `permissions_group` (`idpermissions_group`, `permissions_groupname`, `display_icon`, `status`, `group`, `created_date`) VALUES (16, 'CANCEL', 'fa fa-trash', 1, 3, '2024-10-15 00:18:02');
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idroles` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `roles_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idroles`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`idroles`, `roles_name`, `status`, `created_date`, `updated_date`) VALUES (1, 'Superadmin', 1, '2023-05-28 09:08:35', '2023-05-28 11:31:08');
INSERT INTO `roles` (`idroles`, `roles_name`, `status`, `created_date`, `updated_date`) VALUES (2, 'Laboran', 1, '2023-05-28 09:08:51', '2024-10-05 16:00:17');
INSERT INTO `roles` (`idroles`, `roles_name`, `status`, `created_date`, `updated_date`) VALUES (3, 'Dosen', 1, '2023-05-28 11:31:15', '2024-09-30 23:19:15');
INSERT INTO `roles` (`idroles`, `roles_name`, `status`, `created_date`, `updated_date`) VALUES (4, 'Mahasiswa', 1, '2024-06-13 12:25:16', '2024-09-30 23:19:19');
COMMIT;

-- ----------------------------
-- Table structure for roles_permissions
-- ----------------------------
DROP TABLE IF EXISTS `roles_permissions`;
CREATE TABLE `roles_permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idroles` int(11) unsigned NOT NULL,
  `idpermissions` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idpermissions` (`idpermissions`),
  KEY `idroles` (`idroles`),
  CONSTRAINT `roles_permissions_ibfk_1` FOREIGN KEY (`idpermissions`) REFERENCES `permissions` (`idpermissions`),
  CONSTRAINT `roles_permissions_ibfk_2` FOREIGN KEY (`idroles`) REFERENCES `roles` (`idroles`)
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles_permissions
-- ----------------------------
BEGIN;
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (224, 1, 3, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (225, 1, 7, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (226, 1, 2, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (227, 1, 10, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (228, 1, 4, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (229, 1, 5, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (230, 1, 6, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (231, 1, 8, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (232, 1, 9, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (233, 1, 11, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (234, 1, 12, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (235, 1, 13, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (236, 1, 22, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (237, 1, 14, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (238, 1, 23, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (239, 1, 15, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (240, 1, 24, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (241, 1, 16, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (242, 1, 19, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (243, 1, 17, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (244, 1, 18, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (245, 1, 20, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (246, 1, 21, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (247, 1, 25, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (248, 1, 26, 1, '2024-10-15 00:19:24', '2024-10-15 00:19:24');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (263, 3, 8, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (264, 3, 9, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (265, 3, 22, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (266, 3, 23, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (267, 3, 24, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (268, 3, 19, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (269, 3, 18, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (270, 3, 21, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (271, 3, 26, 1, '2024-10-15 00:20:13', '2024-10-15 00:20:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (272, 4, 8, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (273, 4, 9, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (274, 4, 22, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (275, 4, 23, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (276, 4, 24, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (277, 4, 19, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (278, 4, 18, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (279, 4, 21, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (280, 4, 26, 1, '2024-10-15 00:20:21', '2024-10-15 00:20:21');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (281, 2, 7, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (282, 2, 2, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (283, 2, 10, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (284, 2, 8, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (285, 2, 9, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (286, 2, 11, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (287, 2, 12, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (288, 2, 13, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (289, 2, 22, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (290, 2, 14, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (291, 2, 23, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (292, 2, 15, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (293, 2, 24, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (294, 2, 16, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (295, 2, 19, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (296, 2, 17, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (297, 2, 18, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (298, 2, 20, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (299, 2, 21, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (300, 2, 25, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
INSERT INTO `roles_permissions` (`id`, `idroles`, `idpermissions`, `status`, `created_date`, `updated_date`) VALUES (301, 2, 26, 1, '2024-10-15 00:21:13', '2024-10-15 00:21:13');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_oauth_uid` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `identity_card` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `users_level` int(5) unsigned NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `status` enum('pending','approved','rejected') DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  KEY `users_level` (`users_level`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`users_level`) REFERENCES `roles` (`idroles`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`users_level`) REFERENCES `roles` (`idroles`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`user_id`, `login_oauth_uid`, `first_name`, `last_name`, `username`, `email`, `password`, `identity_card`, `profile_picture`, `created_at`, `updated_at`, `users_level`, `is_active`, `status`) VALUES (1, NULL, 'Maulyanda', 'Maulyanda', '199708242024061001', 'maulyanda@usk.ac.id', '62678c10637dcf79703312e7280b9c7c', NULL, NULL, '2022-02-06 10:03:13', '2022-02-06 10:35:53', 1, 1, 'approved');
INSERT INTO `users` (`user_id`, `login_oauth_uid`, `first_name`, `last_name`, `username`, `email`, `password`, `identity_card`, `profile_picture`, `created_at`, `updated_at`, `users_level`, `is_active`, `status`) VALUES (8, NULL, 'Dwipa', 'Junika', '199406022024061002', 'dwipajunikaputra@usk.ac.id', 'd5d4f825ce3503a5592c8e874775d419', 'DATA20241008010655.png', NULL, '2024-10-08 13:06:55', '2024-10-08 13:06:55', 3, 1, 'approved');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
