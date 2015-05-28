UPDATE `admin` SET password = md5('Admin@123') , email = 'admin@vendus.com' WHERE `admin`.`id` = 1;

INSERT INTO `redcap`.`admin` (`id`, `username`, `password`, `participant_id`, `first_name`, `last_name`, `phone`, `address`, `city`, `state`, `zip`, `lipids_study`, `glucose_results`, `random_questionnaire`, `rec_status`, `created_at`, `last_login`, `created_by_session_id`, `modified_by_session_id`, `modified_time`, `user_type`, `email`) VALUES (NULL, 'ram', MD5('Admin123'), '0', 'Jennifer', 'Robinson', '1234567890', '1190 Willow Ave	', 'San Jose', 'CA', '123456', '', '', '', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '1', 'ram@vendus.com');
INSERT INTO `redcap`.`admin` (`id`, `username`, `password`, `participant_id`, `first_name`, `last_name`, `phone`, `address`, `city`, `state`, `zip`, `lipids_study`, `glucose_results`, `random_questionnaire`, `rec_status`, `created_at`, `last_login`, `created_by_session_id`, `modified_by_session_id`, `modified_time`, `user_type`, `email`) VALUES (NULL, 'swathi', MD5('Admin123'), '0', 'Jennifer', 'Robinson', '1234567890', '1190 Willow Ave	', 'San Jose', 'CA', '123456', '', '', '', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '1', 'swathi@vendus.com');

UPDATE  `dbversion` SET last_update_string ='201503311011' where id=1;


SELECT email, password, user_type FROM admin WHERE id = 1;