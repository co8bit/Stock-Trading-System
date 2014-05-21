<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
 <head>
   <title>Select Data</title>
 </head>
 <body>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["sid"]); ?>--<?php echo ($vo["stockName"]); ?>  <a href="http://localhost:5191/admin.php/Form/delete/sid/<?php echo ($vo["sid"]); ?>">删除</a><br/><?php endforeach; endif; else: echo "" ;endif; ?>
     <p><a href="http://localhost:5191/admin.php/Form/add">添加</a></p>
    <p><a href="http://localhost:5191/admin.php/Form/edit">权限管理</a></p>
 </body>
 
</html>