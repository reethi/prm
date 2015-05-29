CREATE TABLE push_participants (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `file_type` varchar(150) NOT NULL,
  `push_users_date` date NOT NULL,
  `class_id` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rec_status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
);
