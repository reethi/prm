DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
  `user_type` enum('2','1','0') DEFAULT NULL,
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
  `health_educator_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Dustin Yoder','0e7517141fb53f21ee439b355b5a1d0a',0,'Dustin Yoder','123456789','','','','','CA 95125','1','0000-00-00 00:00:00','2015-05-19 18:59:03',NULL,NULL,NULL,'0','dustin@sureify.com','dusty','2','1985-12-01','m','408.241.5829','408.889.1849','408.749.1858','Choose Type','11111_diet.pdf',NULL),(6,'jennifer','21232f297a57a5a743894a0e4a801fc3',0,'Jennifer Robinson   ','408.454.3589','453 Glen Avenue','','','San Jose','CA 95125','1','2014-12-18 17:30:00','2015-05-19 16:07:45',NULL,NULL,NULL,'1','jennifer@gmail.com','jennie','Cohort 1B','1986-12-02','m','408.454.3589','408.454.3589','408.454.3589',NULL,NULL,NULL),(7,'jennifer','0e7517141fb53f21ee439b355b5a1d0a',0,'Jennifer Robinson','1234567890','453 Glen Avenue','','','San Jose','CA 95125','1','2014-12-18 23:00:00','2015-05-22 12:33:54',NULL,NULL,NULL,'1','jennifer@gmail.com','jennie','Cohort 1A','0000-00-00','m','408.454.3589','408.454.3589','408.454.3589',NULL,NULL,NULL),(8,'jennifer','0e7517141fb53f21ee439b355b5a1d0a',0,'Jennifer Robinson','1234567890','453 Glen Avenue','','','San Jose','CA 95125','1','2014-12-19 04:30:00',NULL,NULL,NULL,NULL,'1','jennifer@gmail.com','jennie','Cohort 1A','0000-00-00','m','408.454.3589','408.454.3589','408.454.3589',NULL,NULL,NULL),(9,'Chase McDonald','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','cmd21@yahoo.com','','4','1985-03-20','f','408.272.4537','408.483.7342','408.353.4235',NULL,NULL,NULL),(10,'John Thomas','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','johnthomas21@gmail.com','','2','1965-04-26','f','650.482.2739','650.323.5532','650.272.8763',NULL,NULL,NULL),(11,'Sue Sanders','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','sanders@suesanders.net','','6','1983-10-10','f','408.734.9823','408.534.3938','408.748.2394',NULL,NULL,NULL),(12,'Tom Stewart','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','ts@stewartelectric.com','','4','1981-04-30','f','408.872.2983','408.628.2389','408.892.8239',NULL,NULL,NULL),(13,'Joe Caligori','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','caligori@aol.com','','2','1975-04-24','f','650.323.2823','650.725.8239','415.823.8235',NULL,NULL,NULL),(14,'Swathi Gangisetty','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','swathig@hotmail.com','','6','1990-07-29','f','408.834.9238','408.592.9842','408.783.2834',NULL,NULL,NULL),(15,'Peter Millar','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','pmiller54@gmail.com','','4','1961-04-17','f','408.293.9471','408.683.3749','408.847.7234',NULL,NULL,NULL),(16,'Steve Gordon','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','sgordon43@gmail.com','','2','1992-04-07','f','650.321.2218','650.543.3670','650.432.4934',NULL,NULL,NULL),(17,'Jill Swenson','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','jswenson@yahoo.com','','2','1959-02-01','f','650.213.7942','650.729.2495','650.659.9283',NULL,NULL,NULL),(18,'Mario Villa','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','mariov4723@gmail.com','','4','1953-11-07','f','415.692.9382','415.683.8431','415.827.2935',NULL,NULL,NULL),(19,'Tony Francis','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','tfrancis@francisconstruction.c','','2','1990-04-20','f','415.932.7482','650.729.3850','415.837.9482',NULL,NULL,NULL),(20,'Ming Le','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','ming43234@aol.com','','2','1973-12-18','f','408.963.8274','408.717.8191','408.653.7432',NULL,NULL,NULL),(21,'Ernie Dobson','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','edobson57@hotmail.com','','5','1997-04-25','f','408.643.2335','408.721.5493','408.737.8274',NULL,NULL,NULL),(22,'Frank Hernandez','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','fhernandez@gmail.com','','2','1983-03-27','f','408.247.8921','408.726.323','408.728.8129',NULL,NULL,NULL),(23,'Sarah Jepsen','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','sannjepsen@gmail.com','','2','1949-04-24','f','408.712.8934','408.654.1389','408.889.7721',NULL,NULL,NULL),(24,'Ryan Jones','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','rjones@jonesco.com','','5','1953-08-27','f','415.928.8204','415.872.3434','415.924.4321',NULL,NULL,NULL),(25,'Matthias Froehans','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','mattfroe321@yahoo.com','','2','1983-10-18','f','650.823.9583','650.928.2425','650.832.9283',NULL,NULL,NULL),(26,'Celeste Harkins','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','charkins1973@aol.com','','7','1981-04-28','f','415.762.9182','415.821.2859','415.493.9171',NULL,NULL,NULL),(27,'Mark Hopkins','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','hopkins@hopkins.net','','4','1975-04-21','f','408.238.3825','408.834.4843','408.239.2935',NULL,NULL,NULL),(28,'Chris Zambrano','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','czambrano@adobe.com','','2','1990-07-09','f','408.635.3295','408.725.5538','408.283.9352',NULL,NULL,NULL),(29,'Molly Hesse','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','mollyhesse21@aol.com','','2','1961-04-18','f','408.827.8891','408.853.8329','408.562.8329',NULL,NULL,NULL),(30,'Jacob Graham','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','jacob@grahamworks.com','','4','1948-01-07','f','408.683.9328','408.713.8135','408.834.8234',NULL,NULL,NULL),(31,'Vijay Janda','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','vijay@solivar.com','','6','1959-02-01','f','650.832.4324','650.827.3824','650.886.9284',NULL,NULL,NULL),(32,'Catherine Edwards','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','catherinetedwards@gmail.com','','2','1957-11-07','f','650.871.3810','650.827.3823','650.876.8436',NULL,NULL,NULL),(33,'Dat Nguyen','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','dat@realscout.com','','4','1974-04-15','f','415.723.5543','415.827.3923','415.982.9236',NULL,NULL,NULL),(34,'William Boxberger','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','boxman43@gmail.com','','7','1943-12-19','f','415.718.9183','415.813.1830','415.828.9463',NULL,NULL,NULL),(35,'Su Chang','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','suchang45@yahoo.com','','2','1956-04-28','f','408.827.9284','408.565.9813','408.861.0098',NULL,NULL,NULL),(36,'Jim Smithson','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','jsmithson32@yahoo.com','','4','1974-03-24','f','408.723.9238','408.923.3455','408.827.3927',NULL,NULL,NULL),(37,'Avery Gonzalez','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','agonzo932@gmail.com','','7','1959-04-01','f','408.829.2938','408.823.9283','408.823.2923',NULL,NULL,NULL),(38,'Lauren Monza','',0,'','','453 Glen Avenue','','','San Jose','CA 95125','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'0','laurenm1@cisco.com','','2','1967-04-19','f','408.823.1936','408.827.9238','408.827.3813',NULL,NULL,NULL),(39,'Susan Dysi','',0,'','','','','','','','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'2','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'Dysi','',0,'','','','','','','','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'2','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'Susan','',0,'','','','','','','','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'2','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,'Susan D','',0,'','','','','','','','1','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,'2','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
DROP TABLE IF EXISTS `class_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_names`
--

LOCK TABLES `class_names` WRITE;
/*!40000 ALTER TABLE `class_names` DISABLE KEYS */;
INSERT INTO `class_names` VALUES (1,'Cohort 1A','2015-05-15 06:34:47','','0000-00-00 00:00:00','','1'),(2,'Cohort 2A','2015-05-15 06:34:47','','0000-00-00 00:00:00','','1'),(3,'Cohort 2B','2015-05-15 06:34:47','','0000-00-00 00:00:00','','1'),(4,'Cohort 1B','2015-05-15 06:34:48','','0000-00-00 00:00:00','','1'),(5,'cohort 3B','2015-05-22 06:13:27','','0000-00-00 00:00:00','','1'),(6,'cohort 4A','2015-05-22 06:13:40','','0000-00-00 00:00:00','','1'),(7,'cohort 5A','2015-05-22 06:13:50','','0000-00-00 00:00:00','','1');
/*!40000 ALTER TABLE `class_names` ENABLE KEYS */;
UNLOCK TABLES;