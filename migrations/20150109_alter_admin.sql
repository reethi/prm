ALTER TABLE `admin` CHANGE `participant_id` `participant_id` BIGINT( 16 ) NOT NULL;

TRUNCATE TABLE admin;

INSERT INTO `admin` (`id`, `username`, `password`, `participant_id`, `first_name`, `last_name`, `phone`, `address`, `city`, `state`, `zip`, `lipids_study`, `glucose_results`, `random_questionnaire`, `rec_status`, `created_at`, `last_login`, `created_by_session_id`, `modified_by_session_id`, `modified_time`, `user_type`, `email`) VALUES(1, 'jennifer', '0e7517141fb53f21ee439b355b5a1d0a', 0, 'Jennifer', 'Robinson', '(123) 456-7890', '1190 Willow Ave', 'San Jose', 'CA', 546378, '', '', '', '1', '0000-00-00 00:00:00', '2015-01-09 04:22:44', NULL, NULL, '2015-01-02 05:01:39', '1', 'jennifer@gmail.com');

UPDATE  `dbversion` SET last_update_string ='20150109' where id=1;
