ALTER TABLE `admin` DROP `participant_id`,DROP `diet`,DROP `class_name`,DROP `he`;

UPDATE  `dbversion` SET last_update_string ='201412180634' where id=1;	