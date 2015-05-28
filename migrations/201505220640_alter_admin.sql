ALTER TABLE  `users` ADD  `diet` INT NOT NULL AFTER  `health_educator_name`;
ALTER TABLE  `users` CHANGE  `class`  `class` INT NULL DEFAULT NULL;

UPDATE  `dbversion` SET last_update_string ='201505220640' where id=1;
