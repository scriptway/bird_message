#用户表
create table `lyb2_user`
(
    `uid`        int         not null primary key auto_increment,
    `username`   varchar(50) not null,
    `password`   varchar(50) not null,
    `reg_time`   int,
    `login_time` int
) engine = innodb
  default charset utf8;

#留言表
create table `lyb2_message`
(
    `mid`        int not null primary key auto_increment,
    `uid`        int not null,
    `title`      varchar(100),
    `message`    varchar(200),
    `write_time` int,
    foreign key (uid) references `lyb2_user` (uid)
) engine = innodb
  default charset utf8