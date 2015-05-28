UPDATE users SET user_type = 2 WHERE user_type = 3;

CREATE TABLE IF NOT EXISTS `participant_attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `participant_id` int(11) NOT NULL,
  `participant_weight` float NOT NULL,
  `participant_class` int(11) NOT NULL,
  `participant_date` datetime NOT NULL,
  `participant_attend` tinyint(4) NOT NULL COMMENT '1 - Yes, 2 -No',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

UPDATE  `dbversion` SET last_update_string ='201505270909' where id=1;