ALTER TABLE `admin`  ADD `full_name` VARCHAR(255) NOT NULL AFTER `password`,  ADD `phone` INT NOT NULL AFTER `full_name`,  ADD `address` TEXT NOT NULL AFTER `phone`,  ADD `address2` TEXT NOT NULL AFTER `address`,  ADD `street` VARCHAR(255) NOT NULL AFTER `address2`,  ADD `city` VARCHAR(255) NOT NULL AFTER `street`,  ADD `state` VARCHAR(255) NOT NULL AFTER `city`;

ALTER TABLE `admin`  ADD `participant_id` INT NOT NULL AFTER `state`,  ADD `diet` VARCHAR(255) NOT NULL AFTER `participant_id`,  ADD `class_name` VARCHAR(255) NOT NULL AFTER `diet`,  ADD `he` VARCHAR(255) NOT NULL AFTER `class_name`;


UPDATE `admin` SET `full_name` = 'Jane Doe', `phone` = '123456789', `address` = '123', `street` = 'Street name', `city` = 'City', `state` = 'State', `participant_id` = '2143252', `diet` = 'Low fat', `class_name` = 'Monday''s @ 2PM', `he` = 'email link here' WHERE `admin`.`id` = 2;

UPDATE  `dbversion` SET last_update_string ='201412171502' where id=1;	