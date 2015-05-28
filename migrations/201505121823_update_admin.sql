alter table admin add nickname varchar(150);
alter table admin add class varchar(150);
alter table admin add date_of_birth date;
alter table admin add gender enum('f','m');
alter table admin add work_phone int(15);
alter table admin add home_phone int(15);
alter table admin add cell_phone int(15);

update admin set nickname='admin',class='Cohort 2A',date_of_birth='1985-04-24',gender='m',work_phone=9089990337,home_phone=9098789656,cell_phone=9085637342 where id=1;

update admin set nickname='dusty',class='Cohort 2A',date_of_birth='1985-12-01',gender='m',work_phone=9089908967,home_phone=9866789656,cell_phone=9089567342 where id=2;

update admin set nickname='sarah',class='Cohort 2B',date_of_birth='1980-04-23',gender='m',work_phone=9083440337,home_phone=9035689656,cell_phone=9085632344 where id=3;

update admin set nickname='mathur',class='Cohort 1A',date_of_birth='1983-03-22',gender='m',work_phone=8907345672,home_phone=9078672343,cell_phone=9089832344 where id=4;

update admin set nickname='haley',class='Cohort 1B',date_of_birth='1982-02-02',gender='m',work_phone=9055908943,home_phone=9078908908,cell_phone=9089098098 where id=5;

update admin set nickname='jennie',class='Cohort 1B',date_of_birth='1986-12-02',gender='m',work_phone=9089092312,home_phone=9078986754,cell_phone=9067578349 where id=6;

update admin set nickname='jennie',class='Cohort 1A',date_of_birth=1986-12-02,gender='m',work_phone=9089092312,home_phone=9078986754,cell_phone=9067578349 where id=7;

update admin set nickname='jennie',class='Cohort 1A',date_of_birth=1986-12-02,gender='m',work_phone=9089092312,home_phone=9078986754,cell_phone=9067578349 where id=8;

update admin set user_type='0' where id=1;
update admin set user_type='0' where id=3;
update admin set user_type='0' where id=4;
update admin set user_type='0' where id=5;
update admin set user_type='0' where id=2;

UPDATE  `dbversion` SET last_update_string ='201505121823_update_admin' where id=1;
