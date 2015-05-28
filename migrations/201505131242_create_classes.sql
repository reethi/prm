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
);
insert into `class_names` (class_name) values('Cohort 1A');
insert into `class_names` (class_name) values('Cohort 2A');
insert into `class_names` (class_name) values('Cohort 2B');
insert into `class_names` (class_name) values('Cohort 1B');
UPDATE  `dbversion` SET last_update_string ='201505131242_create_classes' where id=1;
