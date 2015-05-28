drop table upload_videos;

CREATE TABLE `upload_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `video_type` longblob NOT NULL,
  `title` varchar(30) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

drop table upload_docs;

CREATE TABLE `upload_docs` (
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
);

alter table admin add file_name varchar(255);
alter table admin add video_type varchar(255);

UPDATE  `dbversion` SET last_update_string ='201505141851' where id=1;
