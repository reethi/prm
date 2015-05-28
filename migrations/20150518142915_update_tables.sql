CREATE TABLE upload_files (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `doc_url` varchar(150) NOT NULL,
  `doc_name` varchar(150) NOT NULL,
  `doc_title` varchar(150) NOT NULL,
  `push_users_date` date NOT NULL,
  `class` varchar(150) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `video_type` longblob NOT NULL,
  `video_title` varchar(30) NOT NULL,
  `rating` int(50) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rec_status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
);

alter table admin add health_educator_name varchar(255);

alter table admin modify column user_type enum('2','1','0');

update admin set user_type="2" where id="38";

rename TABLE admin TO users;

UPDATE  `dbversion` SET last_update_string ='20150518142915' where id=1;