-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rcsurvey
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `rec_status` enum('1','0') DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime DEFAULT NULL,
  `created_by_session_id` int(11) DEFAULT NULL,
  `modified_by_session_id` int(11) DEFAULT NULL,
  `modified_time` datetime DEFAULT NULL,
  `user_type` enum('1','0') DEFAULT '0',
  `email` varchar(30) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','0e7517141fb53f21ee439b355b5a1d0a','1','0000-00-00 00:00:00','2014-12-05 22:58:00',NULL,NULL,NULL,'1','admin@gmail.com'),(2,'developeradmin','0e7517141fb53f21ee439b355b5a1d0a','1','0000-00-00 00:00:00','2014-11-12 08:44:37',NULL,NULL,NULL,'0','0'),(3,'Sarah','a0439836ffa816e55c4adb853878fbd0','1','2014-11-13 08:59:53','2014-12-04 14:14:52',NULL,NULL,NULL,'1','sarah.mummah@gmail.com'),(4,'Mathur','a0439836ffa816e55c4adb853878fbd0','1','2014-11-13 08:59:53','2014-11-13 14:40:28',NULL,NULL,NULL,'1','mmathur@stanford.edu'),(5,'Haley','a0439836ffa816e55c4adb853878fbd0','1','2014-11-13 08:59:54','2014-11-13 14:39:57',NULL,NULL,NULL,'1','haleys2@stanford.edu');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
CREATE TABLE `admin_sessions` (
  `id` int(11) NOT NULL DEFAULT '0',
  `admin_id` int(11) DEFAULT NULL,
  `login_usertype` smallint(2) DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_sessions`
--

LOCK TABLES `admin_sessions` WRITE;
/*!40000 ALTER TABLE `admin_sessions` DISABLE KEYS */;
INSERT INTO `admin_sessions` VALUES (1,1,NULL,'127.0.0.1','2014-11-07 05:19:42','2014-11-07 10:59:05'),(2,1,NULL,'127.0.0.1','2014-11-07 05:30:24','2014-11-07 11:00:38'),(3,1,NULL,'127.0.0.1','2014-11-07 05:36:34','2014-11-07 11:06:39'),(4,1,NULL,'127.0.0.1','2014-11-07 05:40:56','2014-11-07 11:13:51'),(5,1,1,'127.0.0.1','2014-11-07 05:45:17','2014-11-07 11:15:34'),(6,1,1,'127.0.0.1','2014-11-07 06:00:35','2014-11-07 11:30:51'),(7,2,0,'127.0.0.1','2014-11-07 06:01:10',NULL),(8,1,1,'127.0.0.1','2014-11-10 03:23:00',NULL),(9,2,0,'127.0.0.1','2014-11-11 04:28:26',NULL),(10,2,0,'127.0.0.1','2014-11-11 12:22:41',NULL),(11,2,0,'127.0.0.1','2014-11-12 03:14:37',NULL),(12,1,1,'127.0.0.1','2014-11-13 07:07:03','2014-11-13 14:32:25'),(13,3,1,'127.0.0.1','2014-11-13 09:02:52',NULL),(14,4,1,'127.0.0.1','2014-11-13 09:03:31',NULL),(15,3,1,'127.0.0.1','2014-11-13 09:06:19',NULL),(16,3,1,'127.0.0.1','2014-11-13 09:06:45',NULL),(17,5,1,'127.0.0.1','2014-11-13 09:09:57','2014-11-13 14:40:02'),(18,4,1,'127.0.0.1','2014-11-13 09:10:28','2014-11-13 15:04:37'),(19,3,1,'127.0.0.1','2014-11-13 09:35:46',NULL),(20,3,1,'127.0.0.1','2014-11-14 03:51:12',NULL),(21,3,1,'127.0.0.1','2014-11-17 07:05:40',NULL),(22,3,1,'127.0.0.1','2014-11-22 09:19:43',NULL),(23,3,1,'127.0.0.1','2014-12-04 08:44:52',NULL),(0,1,1,'127.0.0.1','2014-12-05 14:42:03',NULL),(0,1,1,'127.0.0.1','2014-12-05 15:03:29',NULL),(0,1,1,'127.0.0.1','2014-12-05 16:30:58',NULL),(0,1,1,'127.0.0.1','2014-12-05 17:28:00',NULL);
/*!40000 ALTER TABLE `admin_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-05 23:04:00
