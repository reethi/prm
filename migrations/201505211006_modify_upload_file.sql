drop table upload_files;
CREATE TABLE upload_files (
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
);
