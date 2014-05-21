<?php if (!defined('THINK_PATH')) exit();?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票交易系统</title>
<!-- Bootstrap -->   <link href="__PUBLIC__/tms/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

   <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
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
</head>

</head>

<body>

    <div class="container">
			<?php if($stockList == NULL ): ?><b>可管理股票为空</b>
   			<?php else: ?>
		            <table class="table hovered">
		                <thead>
			                <tr>
			                	<th>股票编号</th>
			                	<th>股票名称</th>
			                	<th>最新成交价格</th>
			                	<th>最新成交数量</th>
			                	<th>股票状态</th>
			                	<th>操作</th>
			                </tr>
		                </thead>
						
		                <tbody>
		                	<?php if(is_array($stockList)): $i = 0; $__LIST__ = $stockList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						    		<td class="span2"><?php echo ($vo["sid"]); ?></td>
						    		<td class="span3"><?php echo ($vo["stockName"]); ?></td>
						    		<td class="span3"><?php echo ($vo["price"]); ?></td>
						    		<td class="span3"><?php echo ($vo["num"]); ?></td>
						    		<?php if($vo["status"] == 1): ?><td class="span2">正常</td>
						    		<?php else: ?>
						    			<td class="span2">暂停</td><?php endif; ?>
									<td style="width: 70px;">
										<div onclick="window.parent.location='<?php echo U("Main/manage");?>?sid=<?php echo ($vo["sid"]); ?>';" class="btn btn-primary">管理</div>
									</td>
						    	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		                </tbody>
		            </table><?php endif; ?>
    </div>
	<!-- Bootstrap -->    <script src="__PUBLIC__/tms/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>