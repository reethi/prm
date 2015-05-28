CREATE TABLE IF NOT EXISTS `class_assignment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `particiant_id` int(11) NOT NULL,
  `class_assigned` int(11) NOT NULL,
  `date_assigned` datetime NOT NULL,
  `health_educator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



INSERT INTO `class_assignment` (`id`, `particiant_id`, `class_assigned`, `date_assigned`, `health_educator`) VALUES
(1, 2, 1, '2015-05-12 13:00:00', 1),
(2, 3, 3, '2015-05-13 00:00:00', 1);


CREATE TABLE IF NOT EXISTS `class_names` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


INSERT INTO `class_names` (`id`, `class_name`) VALUES
(1, 'Cohort 1A'),
(2, 'Cohort 1B'),
(3, 'Cohort 2A'),
(4, 'Cohort 2B');


CREATE TABLE IF NOT EXISTS `diet_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diet_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



INSERT INTO `diet_list` (`id`, `diet_name`) VALUES
(1, 'Low Fat'),
(2, 'High Fat');


UPDATE  `dbversion` SET last_update_string ='20150514082_update_admin' where id=1;
