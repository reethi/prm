/* Primary Key and Auto increment are assigned to id field in Admin table */



INSERT INTO `redcap`.`admin` (`id`, `username`, `password`, `full_name`, `phone`, `address`, `address2`, `street`, `city`, `state`, `rec_status`, `created_at`, `last_login`, `created_by_session_id`, `modified_by_session_id`, `modified_time`, `user_type`, `email`) VALUES (NULL, 'jennifer', MD5('Admin@123'), 'Jennifer Robinson', '1234567890', '', '', '', '', '', '1', '2014-12-19 10:00:00', NULL, NULL, NULL, NULL, '1', 'jennifer@gmail.com');

UPDATE  `dbversion` SET last_update_string ='2014121901909' where id=1;
