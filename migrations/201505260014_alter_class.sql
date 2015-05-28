RENAME TABLE  `create_class` TO  `class_list` ;


ALTER TABLE `class_list` CHANGE `class_name` `class_name` INT NOT NULL, CHANGE `health_educator` `health_educator` INT NOT NULL, CHANGE `room` `room` INT NOT NULL, CHANGE `diet` `diet` INT NOT NULL, CHANGE `class_time` `class_time` INT NOT NULL, CHANGE `color` `color` INT NOT NULL;


ALTER TABLE `class_list`
  DROP `class_dates`;


  ALTER TABLE  `class_list` CHANGE  `room`  `location_id` INT( 11 ) NOT NULL;

  ALTER TABLE  `class_list` CHANGE  `class_name`  `class_name` VARCHAR( 255 ) NOT NULL;

  