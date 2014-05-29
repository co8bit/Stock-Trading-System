<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票交易系统</title>
<!-- Bootstrap -->   <link href="__PUBLIC__/tms/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

   <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

<body>

<div class="container">
	<h1>
      	 <a href="<?php echo U('Main/index');?>">主页</a>&nbsp;&nbsp;&nbsp;<small>当前账户：<?php echo (session('userName')); ?></small>
      	 <span style="float:right;">
      	 	<button class="btn btn-primary" onclick="window.location='<?php echo U("Index/logout");?>';">退出</button>
      	 </span>
  	</h1>
		            
  <form  method="post" action="<?php echo U('User/editPwd');?>" >
  	<input type="hidden"  value="<?php echo ($toUid); ?>" name="toUid">
  	<p>
    用户名称：<span type="text" class="input-large uneditable-input" name="toUserName"><?php echo ($toUserName); ?></span>
    <p>
    输入密码：<input type="password" class="input-large"  name="userPassword">
    <p>
    确认密码：<input type="password" class="input-large"  name="userPassword2">
    <p>
    <button class="btn btn-primary" type="submit">修改</button>
  </form>

</div>

<!-- Bootstrap -->    <script src="__PUBLIC__/tms/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>