ALTER TABLE admin CHANGE `full_name` first_name varchar(255) NOT NULL;
ALTER TABLE admin ADD COLUMN last_name VARCHAR(255) NOT NULL AFTER first_name;
ALTER TABLE admin DROP COLUMN address2;
ALTER TABLE admin DROP COLUMN street;
ALTER TABLE admin ADD COLUMN zip INT NOT NULL AFTER state;

UPDATE  `dbversion` SET last_update_string ='201412310803' where id=1;