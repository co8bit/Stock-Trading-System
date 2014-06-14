<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
	
	// 数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'sts', // 数据库名
	'DB_USER'   => 'sts', // 用户名
	'DB_PWD'    => 'sts', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'a6_', // 数据库表前缀
	
	'SESSION_AUTO_START'    => true,    // 是否自动开启Session
	
	'TMPL_PARSE_STRING'=> array('__PUBLIC__' => '/tms/Public'),//定义__PUBLIC__在哪里
);
?>