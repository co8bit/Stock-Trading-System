<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>股票交易管理系统</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="__PUBLIC__/tms/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/tms/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/tms/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/tms/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/tms/media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/tms/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="__PUBLIC__/tms/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="__PUBLIC__/tms/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link rel="stylesheet" type="text/css" href="__PUBLIC__/tms/media/css/select2_metro.css" />

	<link rel="stylesheet" href="__PUBLIC__/tms/media/css/DT_bootstrap.css" />

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="__PUBLIC__/tms/media/image/favicon.ico" />
	
	
	
	
	
	
	
	
	
	
	
	<script src="__PUBLIC__/tms/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="__PUBLIC__/tms/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="__PUBLIC__/tms/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

	<script src="__PUBLIC__/tms/media/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="__PUBLIC__/tms/media/js/excanvas.min.js"></script>

	<script src="__PUBLIC__/tms/media/js/respond.min.js"></script>

	<![endif]-->

	<script src="__PUBLIC__/tms/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="__PUBLIC__/tms/media/js/jquery.blockui.min.js" type="text/javascript"></script>

	<script src="__PUBLIC__/tms/media/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="__PUBLIC__/tms/media/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="__PUBLIC__/tms/media/js/select2.min.js"></script>

	<script type="text/javascript" src="__PUBLIC__/tms/media/js/jquery.dataTables.js"></script>

	<script type="text/javascript" src="__PUBLIC__/tms/media/js/DT_bootstrap.js"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="__PUBLIC__/tms/media/js/app.js"></script>

	<script src="__PUBLIC__/tms/media/js/table-managed.js"></script>

	<script>

		jQuery(document).ready(function() {

		   App.init();

		   TableManaged.init();

		});

	</script>

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

<script>
$(document).ready( function () {
	var buyTable = $('#table_buy').DataTable({
		"ajax":'<?php echo U("Main/ajaxBuyInstructList");?>?sid=<?php echo ($sid); ?>',
		"language": {
			"sProcessing":   "处理中...",
		    "sLengthMenu":   "显示 _MENU_ 项结果",
		    "sZeroRecords":  "没有匹配结果",
		    "sInfo":         "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
		    "sInfoEmpty":    "显示第 0 至 0 项结果，共 0 项",
		    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
		    "sInfoPostFix":  "",
		    "sSearch":       "搜索:",
		    "sUrl":          "",
		    "sEmptyTable":     "表中数据为空",
		    "sLoadingRecords": "载入中...",
		    "sInfoThousands":  ",",
		    "oPaginate": {
		        "sFirst":    "首页",
		        "sPrevious": "上页",
		        "sNext":     "下页",
		        "sLast":     "末页"
		    },
		    "oAria": {
		        "sSortAscending":  ": 以升序排列此列",
		        "sSortDescending": ": 以降序排列此列"
		    }
		}
	});
    var sellTable = $('#table_sell').DataTable( {
        "ajax":'<?php echo U("Main/ajaxSellInstructList");?>?sid=<?php echo ($sid); ?>',
      	"language": {
  			"sProcessing":   "处理中...",
  		    "sLengthMenu":   "显示 _MENU_ 项结果",
  		    "sZeroRecords":  "没有匹配结果",
  		    "sInfo":         "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
  		    "sInfoEmpty":    "显示第 0 至 0 项结果，共 0 项",
  		    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
  		    "sInfoPostFix":  "",
  		    "sSearch":       "搜索:",
  		    "sUrl":          "",
  		    "sEmptyTable":     "表中数据为空",
  		    "sLoadingRecords": "载入中...",
  		    "sInfoThousands":  ",",
  		    "oPaginate": {
  		        "sFirst":    "首页",
  		        "sPrevious": "上页",
  		        "sNext":     "下页",
  		        "sLast":     "末页"
  		    },
  		    "oAria": {
  		        "sSortAscending":  ": 以升序排列此列",
  		        "sSortDescending": ": 以降序排列此列"
  		    }
  		}
    } );
    
    setInterval( function ()
    {
	    buyTable.ajax.reload();
	    sellTable.ajax.reload();
	    
	    $.get("<?php echo U('Main/ajaxStockInfo');?>?sid=<?php echo ($sid); ?>",function(data,status){
			data = data.split(",");//0:status 1:price 2:num
			if (data[0] == "0")
				$("#newStatus").html("暂停");
			else
				$("#newStatus").html("正常");
			$("#newPrice").html(data[1]);
			$("#newNum").html(data[2]);
		  });
	}, 1000 );
    
} );
</script>
</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed page-sidebar-fixed page-sidebar-closed">

	<!-- BEGIN HEADER -->

	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="index.html">

				<p> 股票交易管理系统</p>

				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="__PUBLIC__/tms/media/image/menu-toggler.png" alt="" />

				</a>

				<!-- END RESPONSIVE MENU TOGGLER -->

				<!-- BEGIN TOP NAVIGATION MENU -->

				<ul class="nav pull-right">

					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li><a href="<?php echo U('Index/logout');?>"><i class="icon-key"></i>退出</a></li>


					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU -->

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>

	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->

	<div class="page-container row-fluid">

		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li class="">

					<a href="index.html">

					<i class="icon-th"></i>

					<span class="title">股票列表</span>

					</a>

				</li>

				<li class="active">

					<a href="">

					<i class="icon-th"></i>

					<span class="title">股票管理</span>

					</a>

				</li>

			</ul>

		</div>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">

						<h2 class="page-title">股票管理——<?php echo ($stockInfo["stockName"]); ?></h2>

					</div>

				</div>

				<div class="row-fluid">  

					<div class="span4">

						<h3>最新成交价格：<span id="newPrice"><?php echo ($stockInfo["price"]); ?></span></h3>

					</div>  

					<div class="span4">

						<h3>最新成交数量：<span  id="newNum"><?php echo ($stockInfo["num"]); ?></span></h3>

					</div>

					<div class="span4">

						<h3>
							股票状态：
							<span  id="newStatus">
								<?php if($stockInfo["status"] == 1): ?>正常
					    		<?php else: ?>
					    			暂停<?php endif; ?>
				    		</span>
						</h3>

					</div>

				</div>  

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT Part 1-->

				<div class="row-fluid">

					<div class="span12">

						<!-- TABLE 1-->

						<div class="portlet box light-grey">

							<div class="portlet-title">

								<div class="caption">卖出列表<i class="icon-globe"></i></div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>


									<a href="javascript:;" class="remove"></a>

								</div>

							</div>

							<div class="portlet-body">

								<div class="clearfix">
									<div class="btn-group"></div>
								</div>
								<?php if($sellInstructList == NULL ): ?><b>没有卖指令</b>
			   					<?php else: ?>
									<table class="table table-striped table-bordered table-hover" id="table_sell">
						                <thead>
							                <tr>
							                	<th>序号</th>
							                	<th>价格</th>
							                	<th>总数量</th>
							                	<th>剩余数量</th>
							                	<th>创建时间</th>
							                </tr>
						                </thead>
						                <tbody>
							                	<?php if(is_array($sellInstructList)): $i = 0; $__LIST__ = $sellInstructList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											    		<td class="span1"><?php echo ($i); ?></td>
											    		<td class="span4"><?php echo ($vo["price"]); ?></td>
											    		<td class="span4"><?php echo ($vo["total"]); ?></td>
											    		<td class="span4"><?php echo ($vo["remain"]); ?></td>
											    		<td class="span4"><?php echo ($vo["createTime"]); ?></td>
											    	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						                </tbody>
						            </table><?php endif; ?>
							</div>

						</div>

					</div>

				</div>
				<!-- END PART 1-->

				<!-- BEGIN PAGE CONTENT Part 2-->

				<div class="row-fluid">

					<div class="span12">

						<!-- TABLE 1-->

						<div class="portlet box light-grey">

							<div class="portlet-title">

								<div class="caption">买入列表<i class="icon-globe"></i></div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>


									<a href="javascript:;" class="remove"></a>
								</div>
							</div>

							<div class="portlet-body">

								<div class="clearfix">

									<div class="btn-group"></div>

								</div>

								<?php if($buyInstructList == NULL ): ?><b>没有买指令</b>
			   					<?php else: ?>
									<table class="table table-striped table-bordered table-hover" id="table_buy">
						                <thead>
							                <tr>
							                	<th>序号</th>
							                	<th>价格</th>
							                	<th>总数量</th>
							                	<th>剩余数量</th>
							                	<th>创建时间</th>
							                </tr>
						                </thead>
						                <tbody>
							                	<?php if(is_array($buyInstructList)): $i = 0; $__LIST__ = $buyInstructList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											    		<td class="span1"><?php echo ($i); ?></td>
											    		<td class="span4"><?php echo ($vo["price"]); ?></td>
											    		<td class="span4"><?php echo ($vo["total"]); ?></td>
											    		<td class="span4"><?php echo ($vo["remain"]); ?></td>
											    		<td class="span4"><?php echo ($vo["createTime"]); ?></td>
											    	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						                </tbody>
						            </table><?php endif; ?>
							</div>

						</div>

					</div>

				</div>
				<!-- END PART 2-->

				<form class="form-inline" method="post" action="<?php echo U('Main/setStockLimit');?>" >
		    		 	<h3>
		    		 		<input type="hidden" name="sid" value="<?php echo ($sid); ?>">
			    		 	涨跌幅：<input type="text" class="input-large"  value="<?php echo ($stockInfo["incLimit"]); ?>" name="incLimit">
			    		 	<button class="btn btn-large btn-primary" type="submit">提交</button>
			    		 	<?php if($stockInfo["status"] == 1): ?><a class="btn btn-large  btn-primary" href="<?php echo U('Main/pause');?>?sid=<?php echo ($sid); ?>">暂停</a>
				    		<?php else: ?>
				    			<a class="btn btn-large btn-primary" href="<?php echo U('Main/restart');?>?sid=<?php echo ($sid); ?>">重启</a><?php endif; ?>
		    		 	</h3>
		    		 </form>
		    		 
			<!-- END PAGE CONTAINER-->

		</div>

		<!-- END PAGE -->

	</div>


	<div class="footer">

		<div class="footer-inner">

			2014 &copy; A6

		</div>

		<div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

		</div>

	</div>

	<!-- END FOOTER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

</div>
</body>
<!-- END BODY -->

</html>