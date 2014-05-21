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
      	 <a href="<?php echo U('Main/index');?>">主页</a>&nbsp;&nbsp;&nbsp;股票列表<small>当前账户：<?php echo (session('userName')); ?></small>
      	 <span style="float:right;">
      	 	<button class="btn btn-primary" onclick="window.location='<?php echo U("Index/logout");?>';">退出</button>
      	 </span>
  	</h1>
   
   <table class="table table-hover table-striped">
        <thead>
         <tr>
         	<th>序号</th>
         	<th>股票名称</th>
         	<th>股票编号</th>
         	<th>操作</th>
         </tr>
       </thead>
       <tbody>
        	<?php if($stockList == NULL ): ?><b>没有股票</b>
			<?php else: ?>
	         	<?php if(is_array($stockList)): $i = 0; $__LIST__ = $stockList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				 		<td class="span1"><?php echo ($i); ?></td>
				 		<td class="span4"><?php echo ($vo["stockName"]); ?></td>
				 		<td class="span4"><?php echo ($vo["sid"]); ?></td>
				 		<td class="span3"><a href="<?php echo U('Main/deleteStock');?>?sid=<?php echo ($vo["sid"]); ?>" class="btn btn-primary">删除</a></td>
				 	</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
       </tbody>
   </table>
		            
		            
  <form class="form-inline" method="post" action="<?php echo U('Main/stockBaseManage');?>" >
    <input type="text" class="input-large" placeholder="股票名称" name="stockName">
    <button class="btn btn-primary" type="submit">添加股票</button>
  </form>

</div>

    <!-- Bootstrap -->    <script src="__PUBLIC__/tms/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>