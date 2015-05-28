DROP TABLE IF EXISTS `health_educator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `health_educator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `health_educator_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
);

insert into `health_educator` (health_educator_name) values('Susan Dysi');
insert into `health_educator` (health_educator_name) values('Dysi');
insert into `health_educator` (health_educator_name) values('Susan');
insert into `health_educator` (health_educator_name) values('Susan D');

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
);

insert into `location` (location_name) values('Dine');
insert into `location` (location_name) values('Dive');
insert into `location` (location_name) values('Disc');

DROP TABLE IF EXISTS `diet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diet_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
);

insert into `diet` (diet_name) values('High Carb');
insert into `diet` (diet_name) values('Low Carb');
insert into `diet` (diet_name) values('Medium Carb');

DROP TABLE IF EXISTS `class_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_time_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
);

insert into `class_time` (class_time_name) values('6-7.30pm');
insert into `class_time` (class_time_name) values('5-6.30pm');
insert into `class_time` (class_time_name) values('4-5.30pm');

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(255) NOT NULL,
  `rec_status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
);

insert into `color` (color_name) values('Red');
insert into `color` (color_name) values('Purple');
insert into `color` (color_name) values('Green');