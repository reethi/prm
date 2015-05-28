ALTER TABLE `admin`
  DROP `username`,
  DROP `participant_id`,
  DROP `lipids_study`,
  DROP `glucose_results`,
  DROP `random_questionnaire`;


TRUNCATE TABLE admin_sessions;

ALTER TABLE  `admin_sessions` ADD PRIMARY KEY (  `id` ) ;

ALTER TABLE  `admin_sessions` CHANGE  `id`  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT;