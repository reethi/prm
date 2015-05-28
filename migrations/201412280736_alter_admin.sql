ALTER TABLE `admin`  ADD `participant_id` INT NOT NULL AFTER `password`;

ALTER TABLE `admin` CHANGE `phone` `phone` VARCHAR( 255 ) NOT NULL;

UPDATE  `dbversion` SET last_update_string ='201412280736' where id=1;	