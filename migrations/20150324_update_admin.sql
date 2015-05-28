UPDATE `admin` SET password = md5('3E4D$@1%'), email='admin@vendus.com' WHERE `admin`.`id` = 1;
UPDATE  `dbversion` SET last_update_string ='201412171502' where id=1;	