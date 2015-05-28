DROP TABLE IF EXISTS `my_participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_participants` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `participant_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(150) DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(150) DEFAULT NULL,
  `rec_status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_participants`
--

LOCK TABLES `my_participants` WRITE;
/*!40000 ALTER TABLE `my_participants` DISABLE KEYS */;
INSERT INTO `my_participants` VALUES (1,NULL,NULL,'2015-05-13 11:37:44','2015-05-13 18:11:11','2015-05-13 12:41:37','2015-05-13 18:11:43',NULL),(2,NULL,NULL,'2015-05-11 12:18:44','2015-05-13 18:11:11','2015-05-13 12:41:37','2015-05-13 18:11:43',NULL),(25,NULL,NULL,'2015-05-11 12:18:44','2015-05-13 18:11:11','2015-05-13 12:41:37','2015-05-13 18:11:43',NULL);
/*!40000 ALTER TABLE `my_participants` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `upload_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_files` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `doc_url` varchar(150) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `doc_title` varchar(150) NOT NULL,
  `push_users_date` date NOT NULL,
  `class` varchar(150) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `video_url` varchar(150) DEFAULT NULL,
  `video_type` longblob,
  `video_title` varchar(150) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(150) DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(150) DEFAULT NULL,
  `rec_status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

