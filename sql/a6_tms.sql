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
	active_status int NOT NULL,

	primary key(uid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert a6_user values(null,"tms","tms","root",1);
insert a6_user values(null,"tmsg","tmsg","pt",1);
insert a6_user values(null,"tmss","tmss","pt",0);


create table a6_stock_info(
	sid varchar(10) NOT NULL,
	stockName varchar(100) NOT NULL,
	status int NOT NULL,/*股票状态*/
	price double NOT NULL,/*最新成交价格*/
	num int NOT NULL,/*最新成交数量*/
	incLimit double NOT NULL,/*涨幅限制*/
	primary key(sid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert a6_stock_info values("ST00001","新浪科技",1,12,2,0.05);
insert a6_stock_info values("ST00002","国家电网",1,23,65,0.05);
insert a6_stock_info values("ST00003","新浪",1,23,65,0.05);
insert a6_stock_info values("ST00004","百度",1,23,65,0.05);
insert a6_stock_info values("ST00005","搜狐",1,23,65,0.05);
insert a6_stock_info values("ST00006","亚马逊",1,23,65,0.05);
insert a6_stock_info values("ST00007","宝钢",1,23,65,0.05);
insert a6_stock_info values("ST00008","中石油",1,23,65,0.05);
insert a6_stock_info values("ST00009","中国电信",1,23,65,0.05);
insert a6_stock_info values("ST00010","中国移动",1,23,65,0.05);
insert a6_stock_info values("ST00011","中国联通",1,23,65,0.05);

create table a6_user_auth(
	uid bigint NOT NULL,
	sid varchar(10) NOT NULL,
	foreign key(uid) references a6_user(uid) on delete cascade on update cascade,
	foreign key(sid) references a6_stock_info(sid) on delete cascade on update cascade,
	primary key(uid,sid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert a6_user_auth values(1,"ST00001");
insert a6_user_auth values(1,"ST00002");
insert a6_user_auth values(1,"ST00003");
insert a6_user_auth values(1,"ST00004");
insert a6_user_auth values(1,"ST00005");
insert a6_user_auth values(1,"ST00006");
insert a6_user_auth values(1,"ST00007");
insert a6_user_auth values(1,"ST00008");
insert a6_user_auth values(1,"ST00009");
insert a6_user_auth values(1,"ST00010");
insert a6_user_auth values(1,"ST00011");
insert a6_user_auth values(2,"ST00001");
insert a6_user_auth values(2,"ST00002");
insert a6_user_auth values(2,"ST00003");
insert a6_user_auth values(2,"ST00004");
insert a6_user_auth values(2,"ST00005");
insert a6_user_auth values(2,"ST00006");
insert a6_user_auth values(2,"ST00007");
insert a6_user_auth values(2,"ST00008");
insert a6_user_auth values(2,"ST00009");
insert a6_user_auth values(2,"ST00010");
insert a6_user_auth values(2,"ST00011");


/*
 * 测试用
 */
create table a4_instruct(
	id bigint NOT NULL AUTO_INCREMENT,
	sid varchar(10) NOT NULL,
	ty int NOT NULL,
	price double NOT NULL,
	num int NOT NULL,
	createTime datetime NOT NULL,
	primary key(id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert a4_instruct values(null,"ST00001",1,12.3,45,"2014-05-29 20:30:23");
insert a4_instruct values(null,"ST00001",0,3,90,"2014-05-29 22:32:23");
insert a4_instruct values(null,"ST00001",1,15.3,415,"2014-05-29 20:30:23");
insert a4_instruct values(null,"ST00001",0,36,930,"2014-05-29 12:32:23");
insert a4_instruct values(null,"ST00001",1,123.3,445,"2014-05-11 20:30:23");
insert a4_instruct values(null,"ST00001",0,32,940,"2014-05-29 09:32:23");
insert a4_instruct values(null,"ST00001",1,112.3,435,"2014-05-08 20:30:23");
insert a4_instruct values(null,"ST00001",0,33,902,"2014-05-29 07:32:23");
insert a4_instruct values(null,"ST00001",1,122.3,435,"2014-05-06 20:30:23");
insert a4_instruct values(null,"ST00001",0,33,960,"2014-05-29 13:32:23");
insert a4_instruct values(null,"ST00001",1,142.3,445,"2014-05-14 20:30:23");
insert a4_instruct values(null,"ST00001",0,35,940,"2014-05-29 15:32:23");
insert a4_instruct values(null,"ST00002",1,12.5,23,"2014-05-29 20:40:23");