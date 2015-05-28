<?php


$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html';

if (ENVIRONMENT == 'production') {
	$config['smtp_host'] = 'smtp.sureify.com';
} elseif (ENVIRONMENT == 'testing' || ENVIRONMENT == 'staging') {
	$config['protocol'] = 'sendmail';
	$config['smtp_host'] = 'smtp.sureify.com';
} elseif (ENVIRONMENT == 'development') {
	$config['protocol'] = 'smtp';
	$config['smtp_host'] = 'ssl://smtp.googlemail.com';
	$config['smtp_port'] = '465';
	$config['smtp_user'] = 'ramakrishna.sureify@gmail.com';
	$config['smtp_pass'] = 'iNdIa1@#';
}
