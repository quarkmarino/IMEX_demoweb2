drop table if exists `admin_user`;

create table `admin_user`
(
  `username` varchar(64) not null,
  `password` varchar(40) not null,
  `salt` varchar(10) not null,
  `name`     varchar(64) not null,
  primary key(username)
);

insert into `admin_user`(`username`,`password`,`salt`,`name`) values
('admin','cf373489fa2425711ba9526f204251bf1b30da3d','uqLt5vcZ2V','Администратор'),   -- password
('developer','20239caa272a13eb425afb4b5f4d6faaab198765','mbnjdHReOf','Разработчик'); -- password

drop table if exists `admin_auth_assignment`;
drop table if exists `admin_auth_item_child`;
drop table if exists `admin_auth_item`;

create table `admin_auth_item`
(
   name                 varchar(64) not null,
   type                 integer not null,
   description          text,
   bizrule              text,
   data                 text,
   primary key (name)
);

insert into `admin_auth_item` (`name`,`type`,`description`,`bizrule`,`data`) values
('developer','2','Разработчик', NULL,'N;'),
('authenticated','2','Пользователь', NULL,'N;'),
('admin','2','Администратор', NULL,'N;');

create table `admin_auth_item_child`
(
   parent               varchar(64) not null,
   child                varchar(64) not null,
   primary key (parent,child),
   foreign key (parent) references `admin_auth_item` (name) on delete cascade on update cascade,
   foreign key (child) references `admin_auth_item` (name) on delete cascade on update cascade
);

insert into `admin_auth_item_child` (`parent`,`child`) values
('developer','admin');


create table `admin_auth_assignment`
(
   itemname             varchar(64) not null,
   userid               varchar(64) not null,
   bizrule              text,
   data                 text,
   primary key (itemname,userid),
   foreign key (itemname) references `admin_auth_item` (name) on delete cascade on update cascade
);


insert into `admin_auth_assignment` (`itemname`, `userid`, `bizrule`, `data`) values
('admin', 'admin', NULL, 'N;'),
('developer', 'developer', NULL, 'N;');