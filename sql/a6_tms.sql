/*创建用户及对应数据库，用户对对应的数据库享有所有权限*/
CREATE USER 'sts'@'localhost' IDENTIFIED BY "sts";
GRANT USAGE ON * . * TO 'sts'@'localhost' IDENTIFIED BY "sts" WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
CREATE DATABASE IF NOT EXISTS `sts` ;
GRANT ALL PRIVILEGES ON `sts` . * TO 'sts'@'localhost';

/*使用数据库*/
use sts;

/*创建表*/
create table a6_user(
	uid bigint NOT NULL AUTO_INCREMENT,
	userName varchar(100) NOT NULL,
	userPassword varchar(100) NOT NULL,
	auth varchar(100) NOT NULL,

	primary key(uid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert a6_user values(null,"tms","tms","root");
insert a6_user values(null,"tmsg","tmsg","pt");


create table a6_stock_info(
	sid bigint NOT NULL AUTO_INCREMENT,
	stockName varchar(100) NOT NULL,
	primary key(sid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert a6_stock_info values(null,"新浪科技");
insert a6_stock_info values(null,"国家电网");


create table a6_user_auth(
	uid bigint NOT NULL,
	sid bigint NOT NULL,
	foreign key(uid) references a6_user(uid) on delete cascade on update cascade,
	foreign key(sid) references a6_stock_info(sid) on delete cascade on update cascade,
	primary key(uid,sid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert a6_user_auth values(2,1);
