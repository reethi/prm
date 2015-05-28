DROP TABLE admin;

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `participant_id` bigint(16) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `lipids_study` varchar(255) NOT NULL,
  `glucose_results` varchar(255) NOT NULL,
  `random_questionnaire` varchar(255) NOT NULL,
  `rec_status` enum('1','0') DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime DEFAULT NULL,
  `created_by_session_id` int(11) DEFAULT NULL,
  `modified_by_session_id` int(11) DEFAULT NULL,
  `modified_time` datetime DEFAULT NULL,
  `user_type` enum('1','0') DEFAULT '0',
  `email` varchar(30) DEFAULT '0',
  PRIMARY KEY (`id`)
);

INSERT INTO `admin` (`id`, `username`, `password`, `participant_id`, `first_name`, `last_name`, `phone`, `address`, `city`, `state`, `zip`, `lipids_study`, `glucose_results`, `random_questionnaire`, `rec_status`, `created_at`, `last_login`, `created_by_session_id`, `modified_by_session_id`, `modified_time`, `user_type`, `email`) VALUES(1, 'jennifer', '0e7517141fb53f21ee439b355b5a1d0a', 0, 'Jennifer', 'Robinson', '(123) 456-7890', '1190 Willow Ave', 'San Jose', 'CA', 12345, '', '', '', '1', '0000-00-00 00:00:00', '2015-01-11 14:57:17', NULL, NULL, '2015-01-11 04:50:37', '1', 'jennifer@gmail.com');

UPDATE  `dbversion` SET last_update_string ='201501111920' where id=1;