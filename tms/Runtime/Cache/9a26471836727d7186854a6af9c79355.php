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

<body class="metro">

    <div class="container">
		            <table class="table hovered">
		                <thead>
			                <tr>
			                	<th>序号</th>
			                	<th>类型</th>
			                	<th>价格</th>
			                	<th>数量</th>
			                	<th>创建时间</th>
			                </tr>
		                </thead>
						
		                <tbody>
		                	<?php if($instructList == NULL ): ?><b>没有买卖指令</b>
   							<?php else: ?>
			                	<?php if(is_array($instructList)): $i = 0; $__LIST__ = $instructList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							    		<td style="width: 50px;"><?php echo ($i); ?></td>
							    		<td class="span4"><?php echo ($vo["ty"]); ?></td>
							    		<td class="span4"><?php echo ($vo["price"]); ?></td>
							    		<td class="span4"><?php echo ($vo["num"]); ?></td>
							    		<td class="span4"><?php echo ($vo["createTime"]); ?></td>
							    	</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
		                </tbody>
		            </table>
    </div>
	<!-- Bootstrap -->    <script src="__PUBLIC__/tms/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>