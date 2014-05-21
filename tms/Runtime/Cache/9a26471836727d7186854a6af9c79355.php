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
    				<p>
		        	<p>
		        	
			        	<table>
			        		<tr>
			        			<td class="span5"><h2>最新成交价格：<?php echo ($stockInfo["price"]); ?></h2></td>
			        			<td class="span5"><h2>最新成交数量：<?php echo ($stockInfo["num"]); ?></h2></td>
			        			<td class="span3"><h2>状态：
			        				<?php if($stockInfo["status"] == 1): ?>正常
						    		<?php else: ?>
						    			暂停<?php endif; ?>
						    		</h2>
								</td>
			        		</tr>
			        	</table>
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
							    		<?php if($vo["ty"] == 0): ?><td class="span4">卖指令</td>
							    		<?php else: ?>
							    			<td class="span4">买指令</td><?php endif; ?>
							    		<td class="span4"><?php echo ($vo["price"]); ?></td>
							    		<td class="span4"><?php echo ($vo["num"]); ?></td>
							    		<td class="span4"><?php echo ($vo["createTime"]); ?></td>
							    	</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
		                </tbody>
		            </table>
		            <form class="form-inline" method="post" action="<?php echo U('Main/setStockLimit');?>" >
		    		 	<h3>涨幅：<input type="text" class="input-large"  value="<?php echo ($stockInfo["incLimit"]); ?>" name="incLimit">
		    		 	跌幅：<input type="text" class="input-large"  value="<?php echo ($stockInfo["decLimit"]); ?>" name="decLimit">
		    		 	<button class="btn btn-large btn-primary" type="submit">提交</button>
		    		 	<?php if($stockInfo["status"] == 1): ?><a class="btn btn-large  btn-primary" href="<?php echo U('Main/pause');?>?sid=<?php echo ($sid); ?>">暂停</a>
			    		<?php else: ?>
			    			<a class="btn btn-large btn-primary" href="<?php echo U('Main/restart');?>?sid=<?php echo ($sid); ?>">重启</a><?php endif; ?>
		    		 	</h3>
		    		 </form>
    </div>
	<!-- Bootstrap -->    <script src="__PUBLIC__/tms/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>