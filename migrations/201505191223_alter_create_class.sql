CREATE TABLE class_dates (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `dates` varchar(150) NOT NULL,
  `class_id` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(15) NOT NULL,
  `rec_status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
);
rename table classes to create_class;
alter table create_class drop modified_by;
alter table create_class drop classs_dates;
update users set user_type="0" where user_type='2';
  insert into users (username,user_type) values('Susan Dysi','2');
insert into users (username,user_type) values('Dysi','2');
 insert into users (username,user_type) values('Susan','2');
 insert into users (username,user_type) values('Susan D','2');


