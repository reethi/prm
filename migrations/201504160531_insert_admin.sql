INSERT INTO `admin` (`id`, `password`, `first_name`, `last_name`, `phone`, `address`, `city`, `state`, `zip`, `rec_status`, `created_at`, `last_login`, `created_by_session_id`, `modified_by_session_id`, `modified_time`, `user_type`, `email`) VALUES (NULL, MD5('Admin123'), 'Dustin', 'Yoder', '1234567890', 'Willow Ave', 'San Jose', 'CA', '12345', '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '0', 'dustin@vendus.com');

UPDATE  `dbversion` SET last_update_string ='201504160531' where id=1;	

