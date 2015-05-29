-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2015 at 05:09 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newredcap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sessions`
--

CREATE TABLE IF NOT EXISTS `admin_sessions` (
  `id` int(11) NOT NULL DEFAULT '0',
  `admin_id` int(11) DEFAULT NULL,
  `login_usertype` smallint(2) DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sessions`
--

INSERT INTO `admin_sessions` (`id`, `admin_id`, `login_usertype`, `ip_address`, `login_time`, `logout_time`) VALUES
(1, 1, NULL, '127.0.0.1', '2014-11-07 05:19:42', '2014-11-07 10:59:05'),
(2, 1, NULL, '127.0.0.1', '2014-11-07 05:30:24', '2014-11-07 11:00:38'),
(3, 1, NULL, '127.0.0.1', '2014-11-07 05:36:34', '2014-11-07 11:06:39'),
(4, 1, NULL, '127.0.0.1', '2014-11-07 05:40:56', '2014-11-07 11:13:51'),
(5, 1, 1, '127.0.0.1', '2014-11-07 05:45:17', '2014-11-07 11:15:34'),
(6, 1, 1, '127.0.0.1', '2014-11-07 06:00:35', '2014-11-07 11:30:51'),
(7, 2, 0, '127.0.0.1', '2014-11-07 06:01:10', NULL),
(8, 1, 1, '127.0.0.1', '2014-11-10 03:23:00', NULL),
(9, 2, 0, '127.0.0.1', '2014-11-11 04:28:26', NULL),
(10, 2, 0, '127.0.0.1', '2014-11-11 12:22:41', NULL),
(11, 2, 0, '127.0.0.1', '2014-11-12 03:14:37', NULL),
(12, 1, 1, '127.0.0.1', '2014-11-13 07:07:03', '2014-11-13 14:32:25'),
(13, 3, 1, '127.0.0.1', '2014-11-13 09:02:52', NULL),
(14, 4, 1, '127.0.0.1', '2014-11-13 09:03:31', NULL),
(15, 3, 1, '127.0.0.1', '2014-11-13 09:06:19', NULL),
(16, 3, 1, '127.0.0.1', '2014-11-13 09:06:45', NULL),
(17, 5, 1, '127.0.0.1', '2014-11-13 09:09:57', '2014-11-13 14:40:02'),
(18, 4, 1, '127.0.0.1', '2014-11-13 09:10:28', '2014-11-13 15:04:37'),
(19, 3, 1, '127.0.0.1', '2014-11-13 09:35:46', NULL),
(20, 3, 1, '127.0.0.1', '2014-11-14 03:51:12', NULL),
(21, 3, 1, '127.0.0.1', '2014-11-17 07:05:40', NULL),
(22, 3, 1, '127.0.0.1', '2014-11-22 09:19:43', NULL),
(23, 3, 1, '127.0.0.1', '2014-12-04 08:44:52', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 14:42:03', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 15:03:29', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 16:30:58', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 17:28:00', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-11 22:33:38', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-12 19:54:40', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-12 19:57:10', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-12 20:07:57', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-12 20:13:09', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-13 08:40:06', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 08:44:41', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 08:48:22', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 08:50:33', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:10:14', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:12:46', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:12:56', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:13:15', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:14:31', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:14:48', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:14:56', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 19:36:36', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 19:52:44', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 21:25:13', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 06:21:09', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 07:26:36', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 07:27:26', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 07:28:49', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 10:33:19', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 10:37:15', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 18:59:14', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 19:06:22', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:27:08', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:33:56', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:35:11', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:38:50', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:41:41', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:42:12', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:43:08', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:44:16', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:44:48', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:49:27', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:55:12', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 21:44:50', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 22:23:00', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 22:24:00', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-15 19:08:40', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-15 21:48:01', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-16 10:35:47', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-16 10:42:45', NULL),
(1, 1, NULL, '127.0.0.1', '2014-11-07 05:19:42', '2014-11-07 10:59:05'),
(2, 1, NULL, '127.0.0.1', '2014-11-07 05:30:24', '2014-11-07 11:00:38'),
(3, 1, NULL, '127.0.0.1', '2014-11-07 05:36:34', '2014-11-07 11:06:39'),
(4, 1, NULL, '127.0.0.1', '2014-11-07 05:40:56', '2014-11-07 11:13:51'),
(5, 1, 1, '127.0.0.1', '2014-11-07 05:45:17', '2014-11-07 11:15:34'),
(6, 1, 1, '127.0.0.1', '2014-11-07 06:00:35', '2014-11-07 11:30:51'),
(7, 2, 0, '127.0.0.1', '2014-11-07 06:01:10', NULL),
(8, 1, 1, '127.0.0.1', '2014-11-10 03:23:00', NULL),
(9, 2, 0, '127.0.0.1', '2014-11-11 04:28:26', NULL),
(10, 2, 0, '127.0.0.1', '2014-11-11 12:22:41', NULL),
(11, 2, 0, '127.0.0.1', '2014-11-12 03:14:37', NULL),
(12, 1, 1, '127.0.0.1', '2014-11-13 07:07:03', '2014-11-13 14:32:25'),
(13, 3, 1, '127.0.0.1', '2014-11-13 09:02:52', NULL),
(14, 4, 1, '127.0.0.1', '2014-11-13 09:03:31', NULL),
(15, 3, 1, '127.0.0.1', '2014-11-13 09:06:19', NULL),
(16, 3, 1, '127.0.0.1', '2014-11-13 09:06:45', NULL),
(17, 5, 1, '127.0.0.1', '2014-11-13 09:09:57', '2014-11-13 14:40:02'),
(18, 4, 1, '127.0.0.1', '2014-11-13 09:10:28', '2014-11-13 15:04:37'),
(19, 3, 1, '127.0.0.1', '2014-11-13 09:35:46', NULL),
(20, 3, 1, '127.0.0.1', '2014-11-14 03:51:12', NULL),
(21, 3, 1, '127.0.0.1', '2014-11-17 07:05:40', NULL),
(22, 3, 1, '127.0.0.1', '2014-11-22 09:19:43', NULL),
(23, 3, 1, '127.0.0.1', '2014-12-04 08:44:52', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 14:42:03', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 15:03:29', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 16:30:58', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 17:28:00', NULL),
(1, 1, NULL, '127.0.0.1', '2014-11-07 05:19:42', '2014-11-07 10:59:05'),
(2, 1, NULL, '127.0.0.1', '2014-11-07 05:30:24', '2014-11-07 11:00:38'),
(3, 1, NULL, '127.0.0.1', '2014-11-07 05:36:34', '2014-11-07 11:06:39'),
(4, 1, NULL, '127.0.0.1', '2014-11-07 05:40:56', '2014-11-07 11:13:51'),
(5, 1, 1, '127.0.0.1', '2014-11-07 05:45:17', '2014-11-07 11:15:34'),
(6, 1, 1, '127.0.0.1', '2014-11-07 06:00:35', '2014-11-07 11:30:51'),
(7, 2, 0, '127.0.0.1', '2014-11-07 06:01:10', NULL),
(8, 1, 1, '127.0.0.1', '2014-11-10 03:23:00', NULL),
(9, 2, 0, '127.0.0.1', '2014-11-11 04:28:26', NULL),
(10, 2, 0, '127.0.0.1', '2014-11-11 12:22:41', NULL),
(11, 2, 0, '127.0.0.1', '2014-11-12 03:14:37', NULL),
(12, 1, 1, '127.0.0.1', '2014-11-13 07:07:03', '2014-11-13 14:32:25'),
(13, 3, 1, '127.0.0.1', '2014-11-13 09:02:52', NULL),
(14, 4, 1, '127.0.0.1', '2014-11-13 09:03:31', NULL),
(15, 3, 1, '127.0.0.1', '2014-11-13 09:06:19', NULL),
(16, 3, 1, '127.0.0.1', '2014-11-13 09:06:45', NULL),
(17, 5, 1, '127.0.0.1', '2014-11-13 09:09:57', '2014-11-13 14:40:02'),
(18, 4, 1, '127.0.0.1', '2014-11-13 09:10:28', '2014-11-13 15:04:37'),
(19, 3, 1, '127.0.0.1', '2014-11-13 09:35:46', NULL),
(20, 3, 1, '127.0.0.1', '2014-11-14 03:51:12', NULL),
(21, 3, 1, '127.0.0.1', '2014-11-17 07:05:40', NULL),
(22, 3, 1, '127.0.0.1', '2014-11-22 09:19:43', NULL),
(23, 3, 1, '127.0.0.1', '2014-12-04 08:44:52', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 14:42:03', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 15:03:29', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 16:30:58', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-05 17:28:00', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-11 22:33:38', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-12 19:54:40', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-12 19:57:10', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-12 20:07:57', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-12 20:13:09', NULL),
(0, 1, 1, '127.0.0.1', '2014-12-13 08:40:06', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 08:44:41', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 08:48:22', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 08:50:33', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:10:14', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:12:46', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:12:56', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:13:15', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:14:31', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:14:48', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 09:14:56', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 19:36:36', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 19:52:44', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-13 21:25:13', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 06:21:09', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 07:26:36', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 07:27:26', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 07:28:49', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 10:33:19', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 10:37:15', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 18:59:14', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 19:06:22', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:27:08', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:33:56', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:35:11', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:38:50', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:41:41', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:42:12', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:43:08', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:44:16', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:44:48', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:49:27', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 20:55:12', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 21:44:50', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 22:23:00', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-14 22:24:00', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-15 19:08:40', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-15 21:48:01', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-16 10:35:47', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-16 10:42:45', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-17 06:27:10', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-17 06:31:08', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-17 13:58:05', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-17 16:06:06', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-17 16:10:09', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-17 16:39:21', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-17 18:41:32', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-17 18:52:09', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 03:23:00', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 03:26:29', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 03:54:07', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 04:39:33', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 08:49:03', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 09:00:54', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 10:32:11', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 10:47:53', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 12:20:29', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 12:27:41', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 13:38:08', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 13:41:46', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 13:51:22', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 13:54:25', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 15:18:05', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 16:06:24', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-18 16:49:28', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 04:52:08', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 06:37:47', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 06:41:12', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 06:44:31', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 07:26:33', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 07:26:58', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 07:31:49', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 09:43:09', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 10:46:03', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 10:50:43', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 10:51:46', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 11:10:02', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 11:53:57', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 11:56:46', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 11:57:58', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 12:05:08', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 12:06:36', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 12:19:03', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 12:24:21', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 12:59:44', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 13:11:51', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 14:22:34', NULL),
(0, 6, 1, '127.0.0.1', '2014-12-19 14:23:54', NULL),
(0, 2, 0, '127.0.0.1', '2014-12-19 14:25:21', NULL),
(0, 6, 1, '', '2015-05-05 06:05:33', NULL),
(0, 6, 1, '', '2015-05-05 06:38:48', NULL),
(0, 6, 1, '', '2015-05-05 07:01:38', NULL),
(0, 6, 1, '', '2015-05-05 07:54:08', NULL),
(0, 6, 1, '', '2015-05-05 09:13:15', NULL),
(0, 6, 1, '', '2015-05-05 09:15:53', NULL),
(0, 6, 1, '', '2015-05-05 11:10:02', NULL),
(0, 6, 1, '', '2015-05-05 12:42:01', NULL),
(0, 6, 1, '', '2015-05-06 03:48:34', NULL),
(0, 6, 1, '', '2015-05-06 06:32:30', NULL),
(0, 6, 1, '', '2015-05-06 06:33:57', NULL),
(0, 6, 1, '', '2015-05-06 08:43:31', NULL),
(0, 6, 1, '', '2015-05-06 09:44:47', NULL),
(0, 6, 1, '', '2015-05-06 09:50:54', NULL),
(0, 6, 1, '', '2015-05-06 10:59:20', NULL),
(0, 6, 1, '', '2015-05-08 04:21:19', NULL),
(0, 6, 1, '', '2015-05-08 04:26:48', NULL),
(0, 6, 1, '', '2015-05-08 04:28:10', NULL),
(0, 6, 1, '', '2015-05-08 04:30:27', NULL),
(0, 6, 1, '', '2015-05-08 04:34:39', NULL),
(0, 6, 1, '', '2015-05-08 05:30:33', NULL),
(0, 6, 1, '', '2015-05-08 06:56:50', NULL),
(0, 6, 1, '', '2015-05-08 07:14:59', NULL),
(0, 6, 1, '', '2015-05-08 09:54:33', NULL),
(0, 6, 1, '', '2015-05-08 10:10:33', NULL),
(0, 6, 1, '', '2015-05-08 10:19:22', NULL),
(0, 6, 1, '', '2015-05-08 10:58:55', NULL),
(0, 6, 1, '', '2015-05-08 12:49:18', NULL),
(0, 6, 1, '', '2015-05-11 09:06:35', NULL),
(0, 6, 1, '', '2015-05-11 10:05:17', NULL),
(0, 6, 1, '', '2015-05-11 10:15:02', NULL),
(0, 2, 0, '', '2015-05-11 11:01:43', NULL),
(0, 6, 1, '', '2015-05-11 11:04:05', NULL),
(0, 6, 1, '', '2015-05-12 04:20:28', NULL),
(0, 6, 1, '', '2015-05-12 07:10:27', NULL),
(0, 6, 1, '', '2015-05-12 11:05:46', NULL),
(0, 6, 1, '', '2015-05-12 11:12:06', NULL),
(0, 6, 1, '', '2015-05-12 11:38:14', NULL),
(0, 6, 1, '', '2015-05-13 03:57:47', NULL),
(0, 6, 1, '', '2015-05-13 06:31:09', NULL),
(0, 6, 1, '', '2015-05-13 10:00:15', NULL),
(0, 6, 1, '', '2015-05-13 10:13:48', NULL),
(0, 6, 1, '', '2015-05-13 12:53:59', NULL),
(0, 6, 1, '', '2015-05-14 04:04:28', NULL),
(0, 6, 1, '', '2015-05-14 04:33:20', NULL),
(0, 6, 1, '', '2015-05-15 04:34:21', NULL),
(0, 6, 1, '', '2015-05-15 13:19:01', NULL),
(0, 6, 1, '', '2015-05-15 13:45:13', NULL),
(0, 6, 1, '', '2015-05-18 04:43:42', NULL),
(0, 6, 1, '', '2015-05-18 05:01:40', NULL),
(0, 6, 1, '', '2015-05-18 06:21:27', NULL),
(0, 6, 1, '', '2015-05-18 12:53:45', NULL),
(0, 6, 1, '', '2015-05-18 13:10:13', NULL),
(0, 6, 1, '', '2015-05-19 03:57:17', NULL),
(0, 2, 0, '', '2015-05-19 04:02:48', NULL),
(0, 6, 1, '', '2015-05-19 05:20:21', NULL),
(0, 6, 1, '', '2015-05-19 05:29:38', NULL),
(0, 6, 1, '', '2015-05-19 06:04:30', NULL),
(0, 6, 1, '', '2015-05-19 06:08:21', NULL),
(0, 6, 1, '', '2015-05-19 07:07:28', NULL),
(0, 6, 1, '', '2015-05-19 07:08:40', NULL),
(0, 2, 0, '', '2015-05-19 10:35:11', NULL),
(0, 6, 1, '', '2015-05-19 10:37:45', NULL),
(0, 7, 1, '', '2015-05-19 10:42:54', NULL),
(0, 2, 0, '', '2015-05-19 11:00:53', NULL),
(0, 7, 1, '', '2015-05-19 11:07:07', NULL),
(0, 7, 1, '', '2015-05-19 11:11:29', NULL),
(0, 7, 1, '', '2015-05-19 11:26:59', NULL),
(0, 2, 0, '', '2015-05-19 11:33:59', NULL),
(0, 7, 1, '', '2015-05-19 11:38:03', NULL),
(0, 7, 1, '', '2015-05-19 11:47:44', NULL),
(0, 2, 0, '', '2015-05-19 13:29:03', NULL),
(0, 7, 1, '', '2015-05-20 04:04:02', NULL),
(0, 7, 1, '', '2015-05-20 04:34:51', NULL),
(0, 7, 1, '', '2015-05-20 08:45:29', NULL),
(0, 7, 1, '', '2015-05-21 05:00:42', NULL),
(0, 7, 1, '', '2015-05-21 10:18:53', NULL),
(0, 7, 1, '', '2015-05-22 05:02:27', NULL),
(0, 7, 1, '', '2015-05-22 05:42:53', NULL),
(0, 7, 1, '', '2015-05-22 05:46:24', NULL),
(0, 7, 1, '', '2015-05-22 05:54:16', NULL),
(0, 7, 1, '', '2015-05-22 06:00:28', NULL),
(0, 7, 1, '', '2015-05-22 06:38:59', NULL),
(0, 7, 1, '', '2015-05-22 07:03:55', NULL),
(0, 43, NULL, '', '2015-05-25 12:53:00', NULL),
(0, 43, 0, '', '2015-05-25 12:53:44', NULL),
(0, 43, 1, '', '2015-05-25 12:54:04', NULL),
(0, 43, 1, '', '2015-05-25 19:29:03', NULL),
(0, 43, 2, '', '2015-05-26 10:34:17', NULL),
(0, 43, 2, '', '2015-05-26 10:34:26', NULL),
(0, 43, 2, '', '2015-05-26 10:35:19', NULL),
(0, 43, 2, '', '2015-05-26 10:35:56', NULL),
(0, 43, 2, '', '2015-05-26 11:00:46', NULL),
(0, 43, 2, '', '2015-05-26 11:01:08', NULL),
(0, 43, 2, '', '2015-05-26 11:01:14', NULL),
(0, 43, 2, '', '2015-05-26 11:26:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE IF NOT EXISTS `checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `title`, `url`, `start_date`, `end_date`) VALUES
(1, 'dkjdshkj', 'http://www.google.com', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `class_assignment`
--

CREATE TABLE IF NOT EXISTS `class_assignment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `particiant_id` int(11) NOT NULL,
  `class_assigned` int(11) NOT NULL,
  `date_assigned` datetime NOT NULL,
  `health_educator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `class_assignment`
--

INSERT INTO `class_assignment` (`id`, `particiant_id`, `class_assigned`, `date_assigned`, `health_educator`) VALUES
(1, 2, 1, '2015-05-12 13:00:00', 43),
(2, 3, 3, '2015-05-13 00:00:00', 43);

-- --------------------------------------------------------

--
-- Table structure for table `class_dates`
--

CREATE TABLE IF NOT EXISTS `class_dates` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `dates` varchar(150) NOT NULL,
  `class_id` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(15) NOT NULL,
  `rec_status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `class_dates`
--

INSERT INTO `class_dates` (`id`, `dates`, `class_id`, `created_date`, `created_by`, `rec_status`) VALUES
(1, '2015-05-22', '4', '2015-05-26 19:25:52', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE IF NOT EXISTS `class_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `health_educator` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `diet` int(11) NOT NULL,
  `class_time` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `class_list`
--

INSERT INTO `class_list` (`id`, `class_name`, `health_educator`, `location_id`, `diet`, `class_time`, `color`, `created_date`, `created_by`, `modified_date`, `rec_status`) VALUES
(1, 'Cohort 1A', 43, 1, 1, 1, 1, '2015-05-25 18:43:59', '', '0000-00-00 00:00:00', '1'),
(2, 'Cohort 2A', 43, 2, 2, 2, 2, '2015-05-25 19:07:35', '', '0000-00-00 00:00:00', '1'),
(3, 'kjdakjd', 2, 3, 3, 1, 1, '2015-05-26 19:21:52', '', '0000-00-00 00:00:00', '1'),
(4, 'uiuqweyiuq', 2, 2, 2, 3, 3, '2015-05-26 19:25:52', '', '0000-00-00 00:00:00', '1'),
(5, 'Naveen', 43, 1, 1, 1, 1, '2015-05-28 18:22:15', '', '0000-00-00 00:00:00', '1'),
(6, 'Test Class', 40, 2, 2, 2, 2, '2015-05-28 18:29:49', '', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `class_names`
--

CREATE TABLE IF NOT EXISTS `class_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `class_names`
--

INSERT INTO `class_names` (`id`, `class_name`, `created_date`, `created_by`, `modified_date`, `modified_by`, `rec_status`) VALUES
(1, 'Cohort 1A', '2015-05-15 06:34:47', '', '0000-00-00 00:00:00', '', '1'),
(2, 'Cohort 2A', '2015-05-15 06:34:47', '', '0000-00-00 00:00:00', '', '1'),
(3, 'Cohort 2B', '2015-05-15 06:34:47', '', '0000-00-00 00:00:00', '', '1'),
(4, 'Cohort 1B', '2015-05-15 06:34:48', '', '0000-00-00 00:00:00', '', '1'),
(5, 'cohort 3B', '2015-05-22 06:13:27', '', '0000-00-00 00:00:00', '', '1'),
(6, 'cohort 4A', '2015-05-22 06:13:40', '', '0000-00-00 00:00:00', '', '1'),
(7, 'cohort 5A', '2015-05-22 06:13:50', '', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `class_time`
--

CREATE TABLE IF NOT EXISTS `class_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_time_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `class_time`
--

INSERT INTO `class_time` (`id`, `class_time_name`, `created_date`, `created_by`, `modified_date`, `modified_by`, `rec_status`) VALUES
(1, '6-7.30pm', '2015-05-15 06:24:43', '', '0000-00-00 00:00:00', '', '1'),
(2, '5-6.30pm', '2015-05-15 06:24:43', '', '0000-00-00 00:00:00', '', '1'),
(3, '4-5.30pm', '2015-05-15 06:24:44', '', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`, `created_date`, `created_by`, `modified_date`, `modified_by`, `rec_status`) VALUES
(1, 'Red', '2015-05-15 06:25:52', '', '0000-00-00 00:00:00', '', '1'),
(2, 'Purple', '2015-05-15 06:25:52', '', '0000-00-00 00:00:00', '', '1'),
(3, 'Green', '2015-05-15 06:25:53', '', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dbversion`
--

CREATE TABLE IF NOT EXISTS `dbversion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `db_version` int(11) NOT NULL,
  `last_update_string` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dbversion`
--

INSERT INTO `dbversion` (`id`, `db_version`, `last_update_string`) VALUES
(1, 1, '20150514082_update_admin'),
(2, 1, '201412052310');

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE IF NOT EXISTS `diet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diet_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`id`, `diet_name`, `created_date`, `created_by`, `modified_date`, `modified_by`, `rec_status`) VALUES
(1, 'High Carb', '2015-05-15 06:24:35', '', '0000-00-00 00:00:00', '', '1'),
(2, 'Low Carb', '2015-05-15 06:24:35', '', '0000-00-00 00:00:00', '', '1'),
(3, 'Medium Carb', '2015-05-15 06:24:35', '', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `diet_list`
--

CREATE TABLE IF NOT EXISTS `diet_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diet_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `diet_list`
--

INSERT INTO `diet_list` (`id`, `diet_name`) VALUES
(1, 'Low Fat'),
(2, 'High Fat');

-- --------------------------------------------------------

--
-- Table structure for table `email_log`
--

CREATE TABLE IF NOT EXISTS `email_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_to` varchar(255) NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `email_subject` text NOT NULL,
  `email_message` text NOT NULL,
  `email_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `health_educator`
--

CREATE TABLE IF NOT EXISTS `health_educator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `health_educator_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `health_educator`
--

INSERT INTO `health_educator` (`id`, `health_educator_name`, `created_date`, `created_by`, `modified_date`, `modified_by`, `rec_status`) VALUES
(1, 'Susan Dysi', '2015-05-15 06:22:16', '', '0000-00-00 00:00:00', '', '1'),
(2, 'Dysi', '2015-05-15 06:22:16', '', '0000-00-00 00:00:00', '', '1'),
(3, 'Susan', '2015-05-15 06:22:16', '', '0000-00-00 00:00:00', '', '1'),
(4, 'Susan D', '2015-05-15 06:22:17', '', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`, `created_date`, `created_by`, `modified_date`, `modified_by`, `rec_status`) VALUES
(1, 'Dine', '2015-05-15 06:22:29', '', '0000-00-00 00:00:00', '', '1'),
(2, 'Dive', '2015-05-15 06:22:29', '', '0000-00-00 00:00:00', '', '1'),
(3, 'Disc', '2015-05-15 06:22:30', '', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `participant_attendance`
--

CREATE TABLE IF NOT EXISTS `participant_attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `participant_id` int(11) NOT NULL,
  `participant_weight` float NOT NULL,
  `participant_class` int(11) NOT NULL,
  `participant_date` datetime NOT NULL,
  `participant_attend` tinyint(4) NOT NULL COMMENT '1 - Yes, 2 -No',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `participant_attendance`
--

INSERT INTO `participant_attendance` (`id`, `participant_id`, `participant_weight`, `participant_class`, `participant_date`, `participant_attend`) VALUES
(1, 2, 65, 1, '2015-05-28 00:00:00', 2),
(2, 6, 64, 1, '2015-05-28 00:00:00', 2),
(3, 7, 657, 1, '2015-05-28 00:00:00', 1),
(4, 2, 54, 2, '2015-05-28 00:00:00', 1),
(5, 2, 54, 2, '2015-05-28 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participant_weight`
--

CREATE TABLE IF NOT EXISTS `participant_weight` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `participant_id` varchar(255) NOT NULL,
  `class_date` datetime NOT NULL,
  `weight` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `participant_weight`
--

INSERT INTO `participant_weight` (`id`, `participant_id`, `class_date`, `weight`) VALUES
(1, 'ksldjklsdj', '2015-05-20 00:00:00', 92347900),
(2, 'sfjkl', '2015-05-27 00:00:00', 92347900);

-- --------------------------------------------------------

--
-- Table structure for table `upload_docs`
--

CREATE TABLE IF NOT EXISTS `upload_docs` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `doc_url` varchar(150) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `doc_title` varchar(150) NOT NULL,
  `push_users_date` date NOT NULL,
  `class` varchar(150) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(150) DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(150) DEFAULT NULL,
  `rec_status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `upload_docs`
--

INSERT INTO `upload_docs` (`id`, `doc_url`, `file_name`, `doc_title`, `push_users_date`, `class`, `user_id`, `created_date`, `created_by`, `modified_date`, `modified_by`, `rec_status`) VALUES
(1, 'echorank.io', '11111_lipids.pdf', 'Bootstrap 3.0 ToolTips', '0000-00-00', 'Yes', 6, '2015-05-20 09:16:40', NULL, '0000-00-00 00:00:00', NULL, '1'),
(2, 'smdnsd', '11111_glu.pdf', 'nsmdsdm', '0000-00-00', 'Yes', 6, '2015-05-20 07:34:08', NULL, '0000-00-00 00:00:00', NULL, '1'),
(3, 'm,m', '11111_ins.pdf', 'm', '0000-00-00', 'Cohort', 7, '2015-05-20 07:37:00', NULL, '0000-00-00 00:00:00', NULL, '1'),
(4, 'echorank.io', '11111_lipids.pdf', 'Bootstrap 3.0 ToolTips', '0000-00-00', 'Cohort', 7, '2015-05-20 09:16:40', NULL, '0000-00-00 00:00:00', NULL, '1'),
(5, 'smdnsd', '11111_glu.pdf', 'nsmdsdm', '0000-00-00', 'Cohort', 7, '2015-05-20 07:34:08', NULL, '0000-00-00 00:00:00', NULL, '1'),
(6, 'sdsd', '11111_diet.pdf', 'sdsd', '0000-00-00', 'Cohort', 7, '2015-05-20 08:45:48', NULL, '0000-00-00 00:00:00', NULL, '1'),
(7, 'nm', '11111_dxa.pdf', 'nmn', '0000-00-00', 'Cohort', 7, '2015-05-20 10:48:51', NULL, '0000-00-00 00:00:00', NULL, '1'),
(8, '', '', 'sd', '0000-00-00', '', NULL, '2015-05-20 09:54:43', NULL, '0000-00-00 00:00:00', NULL, '1'),
(9, '', '', 'sdsddfdf', '0000-00-00', '', NULL, '2015-05-20 09:54:46', NULL, '0000-00-00 00:00:00', NULL, '1'),
(10, '', '', 'sdsdddfdfdfdf', '0000-00-00', '', NULL, '2015-05-20 09:54:49', NULL, '0000-00-00 00:00:00', NULL, '1'),
(11, '', '', 'sd', '0000-00-00', '', NULL, '2015-05-20 09:54:52', NULL, '0000-00-00 00:00:00', NULL, '1'),
(12, '', '', 'erere', '0000-00-00', '', NULL, '2015-05-20 09:54:58', NULL, '0000-00-00 00:00:00', NULL, '1'),
(13, '', '', 'ssfhjdhfj', '0000-00-00', '', NULL, '2015-05-20 09:55:03', NULL, '0000-00-00 00:00:00', NULL, '1'),
(14, '', '', 'erieruier', '0000-00-00', '', NULL, '2015-05-20 09:55:08', NULL, '0000-00-00 00:00:00', NULL, '1'),
(15, '', '', 'erie', '0000-00-00', '', NULL, '2015-05-20 09:55:11', NULL, '0000-00-00 00:00:00', NULL, '1'),
(16, '', '', 'eriesgdhsgd', '0000-00-00', '', NULL, '2015-05-20 09:55:14', NULL, '0000-00-00 00:00:00', NULL, '1'),
(17, '', '', 'weuweywe', '0000-00-00', '', NULL, '2015-05-20 09:55:18', NULL, '0000-00-00 00:00:00', NULL, '1'),
(18, '', '', 'mkij', '0000-00-00', '', NULL, '2015-05-20 09:55:25', NULL, '0000-00-00 00:00:00', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE IF NOT EXISTS `upload_files` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `file_url` varchar(150) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `class` varchar(150) NOT NULL,
  `push_users_date` date NOT NULL,
  `file_title` varchar(150) NOT NULL,
  `file_type` longblob NOT NULL,
  `rating` int(50) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rec_status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload_videos`
--

CREATE TABLE IF NOT EXISTS `upload_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `video_type` longblob NOT NULL,
  `title` varchar(30) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `upload_videos`
--

INSERT INTO `upload_videos` (`id`, `url`, `video_type`, `title`, `user_id`) VALUES
(1, 'nsdmsd', 0x312e6d7034, 'sndmnsd', 2),
(2, 'sndmsd', 0x322e6d7034, 'nmsdsd', 2),
(3, 'nxmxc', 0x312e6d7034, 'Sdnsmdsd', 7),
(4, 'sndmsd', 0x322e6d7034, 'nmsdsd', 7),
(5, 'nsdmnsdm', 0x312028636f7079292e6d7034, 'sndmnsd', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `address2` text NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `rec_status` enum('1','0') DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime DEFAULT NULL,
  `created_by_session_id` int(11) DEFAULT NULL,
  `modified_by_session_id` int(11) DEFAULT NULL,
  `modified_time` datetime DEFAULT NULL,
  `user_type` tinyint(11) DEFAULT NULL COMMENT '1 - admin, 2 -Participants',
  `email` varchar(30) DEFAULT '0',
  `nickname` varchar(150) DEFAULT NULL,
  `class` varchar(150) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('f','m') DEFAULT NULL,
  `work_phone` varchar(255) DEFAULT NULL,
  `home_phone` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `video_type` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `health_educator_name` int(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `participant_id`, `full_name`, `phone`, `address`, `address2`, `street`, `city`, `state`, `rec_status`, `created_at`, `last_login`, `created_by_session_id`, `modified_by_session_id`, `modified_time`, `user_type`, `email`, `nickname`, `class`, `date_of_birth`, `gender`, `work_phone`, `home_phone`, `cell_phone`, `video_type`, `file_name`, `health_educator_name`, `profile_pic`) VALUES
(2, 'Dustin Yoder', '0e7517141fb53f21ee439b355b5a1d0a', 24143252, 'Dustin Yoder', '123456789', '', '', '', '', 'CA 95125', '1', '0000-00-00 00:00:00', '2015-05-19 18:59:03', NULL, NULL, NULL, 2, 'dustin@sureify.com', 'dusty', '2', '1985-12-01', 'm', '408.241.5829', '408.889.1849', '408.749.1858', 'Choose Type', '11111_diet.pdf', 43, 'dustin_profile_image.png'),
(6, 'jennifer', '21232f297a57a5a743894a0e4a801fc3', 0, 'Jennifer Robinson   ', '408.454.3589', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '2014-12-18 12:00:00', '2015-05-19 16:07:45', NULL, NULL, NULL, 2, 'jennifer@gmail.com', 'jennie', 'Cohort 1B', '1986-12-02', 'm', '408.454.3589', '408.454.3589', '408.454.3589', NULL, NULL, 43, NULL),
(7, 'jennifer', '0e7517141fb53f21ee439b355b5a1d0a', 0, 'Jennifer Robinson', '1234567890', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '2014-12-18 17:30:00', '2015-05-22 12:33:54', NULL, NULL, NULL, 2, 'jennifer@gmail.com', 'jennie', 'Cohort 1A', '0000-00-00', 'm', '408.454.3589', '408.454.3589', '408.454.3589', NULL, NULL, 43, NULL),
(8, 'jennifer', '0e7517141fb53f21ee439b355b5a1d0a', 0, 'Jennifer Robinson', '1234567890', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '2014-12-18 23:00:00', NULL, NULL, NULL, NULL, 2, 'jennifer@gmail.com', 'jennie', 'Cohort 1A', '0000-00-00', 'm', '408.454.3589', '408.454.3589', '408.454.3589', NULL, NULL, 43, NULL),
(9, 'Chase McDonald', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'cmd21@yahoo.com', '', '4', '1985-03-20', 'f', '408.272.4537', '408.483.7342', '408.353.4235', NULL, NULL, 43, NULL),
(10, 'John Thomas', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'johnthomas21@gmail.com', '', '2', '1965-04-26', 'f', '650.482.2739', '650.323.5532', '650.272.8763', NULL, NULL, 43, NULL),
(11, 'Sue Sanders', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'sanders@suesanders.net', '', '6', '1983-10-10', 'f', '408.734.9823', '408.534.3938', '408.748.2394', NULL, NULL, 43, NULL),
(12, 'Tom Stewart', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'ts@stewartelectric.com', '', '4', '1981-04-30', 'f', '408.872.2983', '408.628.2389', '408.892.8239', NULL, NULL, 43, NULL),
(13, 'Joe Caligori', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'caligori@aol.com', '', '2', '1975-04-24', 'f', '650.323.2823', '650.725.8239', '415.823.8235', NULL, NULL, 43, NULL),
(14, 'Swathi Gangisetty', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'swathig@hotmail.com', '', '6', '1990-07-29', 'f', '408.834.9238', '408.592.9842', '408.783.2834', NULL, NULL, 43, NULL),
(15, 'Peter Millar', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'pmiller54@gmail.com', '', '4', '1961-04-17', 'f', '408.293.9471', '408.683.3749', '408.847.7234', NULL, NULL, 43, NULL),
(16, 'Steve Gordon', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'sgordon43@gmail.com', '', '2', '1992-04-07', 'f', '650.321.2218', '650.543.3670', '650.432.4934', NULL, NULL, 43, NULL),
(17, 'Jill Swenson', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'jswenson@yahoo.com', '', '2', '1959-02-01', 'f', '650.213.7942', '650.729.2495', '650.659.9283', NULL, NULL, 43, NULL),
(18, 'Mario Villa', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'mariov4723@gmail.com', '', '4', '1953-11-07', 'f', '415.692.9382', '415.683.8431', '415.827.2935', NULL, NULL, 43, NULL),
(19, 'Tony Francis', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'tfrancis@francisconstruction.c', '', '2', '1990-04-20', 'f', '415.932.7482', '650.729.3850', '415.837.9482', NULL, NULL, 43, NULL),
(20, 'Ming Le', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'ming43234@aol.com', '', '2', '1973-12-18', 'f', '408.963.8274', '408.717.8191', '408.653.7432', NULL, NULL, 43, NULL),
(21, 'Ernie Dobson', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'edobson57@hotmail.com', '', '5', '1997-04-25', 'f', '408.643.2335', '408.721.5493', '408.737.8274', NULL, NULL, 43, NULL),
(22, 'Frank Hernandez', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'fhernandez@gmail.com', '', '2', '1983-03-27', 'f', '408.247.8921', '408.726.323', '408.728.8129', NULL, NULL, 43, NULL),
(23, 'Sarah Jepsen', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'sannjepsen@gmail.com', '', '2', '1949-04-24', 'f', '408.712.8934', '408.654.1389', '408.889.7721', NULL, NULL, 43, NULL),
(24, 'Ryan Jones', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'rjones@jonesco.com', '', '5', '1953-08-27', 'f', '415.928.8204', '415.872.3434', '415.924.4321', NULL, NULL, 43, NULL),
(25, 'Matthias Froehans', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'mattfroe321@yahoo.com', '', '2', '1983-10-18', 'f', '650.823.9583', '650.928.2425', '650.832.9283', NULL, NULL, 43, NULL),
(26, 'Celeste Harkins', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'charkins1973@aol.com', '', '7', '1981-04-28', 'f', '415.762.9182', '415.821.2859', '415.493.9171', NULL, NULL, 43, NULL),
(27, 'Mark Hopkins', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'hopkins@hopkins.net', '', '4', '1975-04-21', 'f', '408.238.3825', '408.834.4843', '408.239.2935', NULL, NULL, 43, NULL),
(28, 'Chris Zambrano', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'czambrano@adobe.com', '', '2', '1990-07-09', 'f', '408.635.3295', '408.725.5538', '408.283.9352', NULL, NULL, 43, NULL),
(29, 'Molly Hesse', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'mollyhesse21@aol.com', '', '2', '1961-04-18', 'f', '408.827.8891', '408.853.8329', '408.562.8329', NULL, NULL, 43, NULL),
(30, 'Jacob Graham', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'jacob@grahamworks.com', '', '4', '1948-01-07', 'f', '408.683.9328', '408.713.8135', '408.834.8234', NULL, NULL, 43, NULL),
(31, 'Vijay Janda', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'vijay@solivar.com', '', '6', '1959-02-01', 'f', '650.832.4324', '650.827.3824', '650.886.9284', NULL, NULL, 43, NULL),
(32, 'Catherine Edwards', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'catherinetedwards@gmail.com', '', '2', '1957-11-07', 'f', '650.871.3810', '650.827.3823', '650.876.8436', NULL, NULL, 43, NULL),
(33, 'Dat Nguyen', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'dat@realscout.com', '', '4', '1974-04-15', 'f', '415.723.5543', '415.827.3923', '415.982.9236', NULL, NULL, 43, NULL),
(34, 'William Boxberger', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'boxman43@gmail.com', '', '7', '1943-12-19', 'f', '415.718.9183', '415.813.1830', '415.828.9463', NULL, NULL, 43, NULL),
(35, 'Su Chang', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'suchang45@yahoo.com', '', '2', '1956-04-28', 'f', '408.827.9284', '408.565.9813', '408.861.0098', NULL, NULL, 43, NULL),
(36, 'Jim Smithson', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'jsmithson32@yahoo.com', '', '4', '1974-03-24', 'f', '408.723.9238', '408.923.3455', '408.827.3927', NULL, NULL, 43, NULL),
(37, 'Avery Gonzalez', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'agonzo932@gmail.com', '', '7', '1959-04-01', 'f', '408.829.2938', '408.823.9283', '408.823.2923', NULL, NULL, 43, NULL),
(38, 'Lauren Monza', '', 0, '', '', '453 Glen Avenue', '', '', 'San Jose', 'CA 95125', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 'laurenm1@cisco.com', '', '2', '1967-04-19', 'f', '408.823.1936', '408.827.9238', '408.827.3813', NULL, NULL, 43, NULL),
(39, 'Susan Dysi', '', 0, '', '', '', '', '', '', '', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Dysi', '', 0, '', '', '', '', '', '', '', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Susan', '', 0, '', '', '', '', '', '', '', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Susan D', '', 0, '', '', '', '', '', '', '', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Jennifer Robinson', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 0, 'Jennifer Robinson    ', '(524) 456-7890', 'San Jose', '', '', '', '', '1', '0000-00-00 00:00:00', '2015-05-26 16:56:07', NULL, NULL, NULL, 1, 'admin@gmail.com', NULL, NULL, NULL, 'f', '(542) 456-7890', NULL, NULL, NULL, NULL, NULL, 'cash.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
