Stock-Trading-System
====================

zju Software engineering 2014 spring A


<h2>每个小组自己建个文件夹存放自己小组的东西。</h2>

<p>1.用thinkPHP框架的小组照着tms.php改写一下，定义一下自己的入口文件，只用修改名称和路径，然后把这个php文件存成名称.php就好了。
<p>2.不用thinkPHP框架的小组也新建一个文件夹村自己的东西，不要弄乱了。

<?php
define('APP_NAME','tms');     //名称
define('APP_PATH','./tms/');  //路径

define('APP_DEBUG',true); 

define('ENGINE_NAME','SAE');
require './ThinkPHP/ThinkPHP.php';

访问规则是：域名/入口文件名称.php/模块名/操作名/……



如果组员会用分支的话建议每个小组自己在自己的分支里工作，不会的话就直接存到主分支吧
