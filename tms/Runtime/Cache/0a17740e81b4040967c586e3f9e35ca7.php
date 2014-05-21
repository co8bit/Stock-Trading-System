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
    		<h1>
	           	 <?php echo ($stockName); ?><small>当前账户：<?php echo (session('userName')); ?></small>
	           	 <span style="float:right;"><button class="btn btn-primary" onclick="window.location='<?php echo U("Index/logout");?>';">退出</button></span>
        	</h1>
        	<iframe name="theIframe"  id="theIframe" src="<?php echo U('Main/manageIframe');?>?sid=<?php echo ($sid); ?>" width="100%"  height="700" frameborder="0"  scrolling="auto"></iframe>
        	<?php if($stockInfo["status"] == 1): ?><a class="btn btn-large  btn-primary" href="<?php echo U('Main/pause');?>?sid=<?php echo ($sid); ?>">暂停</a>
    		<?php else: ?>
    			<a class="btn btn-large btn-primary" href="<?php echo U('Main/restart');?>?sid=<?php echo ($sid); ?>">重启</a><?php endif; ?>
    </div>
	<!-- Bootstrap -->    <script src="__PUBLIC__/tms/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>