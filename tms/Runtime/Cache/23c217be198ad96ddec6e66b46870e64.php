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

	<link rel="stylesheet" type="text/css" href="__PUBLIC__/tms/media/css/chosen.css" />

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="__PUBLIC__/tms/media/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed page-sidebar-fixed page-sidebar-closed">
<!-- 好萌 这里实现了左侧边栏自动隐藏 -->
	<!-- BEGIN HEADER -->



	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="index.html">

				<!-- <img src="__PUBLIC__/tms/media/image/logo.png" alt="logo" /> -->
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

			<!-- BEGIN SIDEBAR MENU -->

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li>

					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->



					<!-- END RESPONSIVE QUICK SEARCH FORM -->

				</li>

				<!-- <li class="start "> -->
				<li class="active">
					<a href="<?php echo U('Root/rootUserIndex');?>">

					<i class="icon-th"></i>

					<span class="title">添加新管理员</span>

					</a>

				</li>
				<li class="">
					<a href="<?php echo U('Root/putongUserManageIndex');?>">

					<i class="icon-th"></i>

					<span class="title">管理业务管理员</span>

					</a>

				</li>
				<li class="">
					<a href="<?php echo U('Root/putongUserAuthIndex');?>">

					<i class="icon-th"></i>

					<span class="title">设置业务管理员权限</span>

					</a>

				</li>


				<!-- <li class="active ">

					<a href="javascript:;">

					<i class="icon-table"></i>

					<span class="title">Form Stuff</span>

					<span class="selected"></span>

					<span class="arrow open"></span>

					</a>

					<ul class="sub-menu">





						<li class="active">

							<a href="form_wizard.html">

							添加新管理员</a>

						</li>





					</ul>

				</li>
 -->

			</ul>

			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<div id="portlet-config" class="modal hide">

				<div class="modal-header">

					<button data-dismiss="modal" class="close" type="button"></button>

					<h3>portlet Settings</h3>

				</div>

				<div class="modal-body">

					<p>Here will be a configuration form</p>

				</div>

			</div>

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN STYLE CUSTOMIZER -->

						<!-- <div class="color-panel hidden-phone">

							<div class="color-mode-icons icon-color"></div>

							<div class="color-mode-icons icon-color-close"></div>

							<div class="color-mode">

								<p>THEME COLOR</p>

								<ul class="inline">

									<li class="color-black current color-default" data-style="default"></li>

									<li class="color-blue" data-style="blue"></li>

									<li class="color-brown" data-style="brown"></li>

									<li class="color-purple" data-style="purple"></li>

									<li class="color-grey" data-style="grey"></li>

									<li class="color-white color-light" data-style="light"></li>

								</ul>

								<label>

									<span>Layout</span>

									<select class="layout-option m-wrap small">

										<option value="fluid" selected>Fluid</option>

										<option value="boxed">Boxed</option>

									</select>

								</label>

								<label>

									<span>Header</span>

									<select class="header-option m-wrap small">

										<option value="fixed" selected>Fixed</option>

										<option value="default">Default</option>

									</select>

								</label>

								<label>

									<span>Sidebar</span>

									<select class="sidebar-option m-wrap small">

										<option value="fixed">Fixed</option>

										<option value="default" selected>Default</option>

									</select>

								</label>

								<label>

									<span>Footer</span>

									<select class="footer-option m-wrap small">

										<option value="fixed">Fixed</option>

										<option value="default" selected>Default</option>

									</select>

								</label>

							</div>

						</div>
 -->
						<!-- END BEGIN STYLE CUSTOMIZER -->

						

						<!-- <ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.html">Home</a>

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="#">Form Stuff</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="#">Form Wizard</a></li>

						</ul> -->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">
                <div class="span12">

					<div class="portlet box light-grey">

							<div class="portlet-title">

								<div class="caption">添加新管理员<i class="icon-globe"></i></div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>


									<a href="javascript:;" class="remove"></a>

								</div>

							</div>

							<div class="portlet-body">
							<form name="pt_user_add" method="post" >

								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
                                       
											<th style="text-align:center;"><label class="control-label">账号<span class="required">*</span></label></th>
                                             
											<th>
   
                                            <input name="new_pt_user_name" class="span6 m-wrap" id="new_pt_user_name_id" type="text"  onBlur="usercheck('check')">  <strong  id="check" ></strong>
                                            </th>
                                           
                                         
										</tr>
                                        
                                       
											<th style="text-align:center;"><label class="control-label">密码<span class="required">*</span></label></th>
                                             
											<th>
   
                                            <input name="new_pt_user_password" class="span6 m-wrap" id="new_pt_user_password_id" type="password"  onBlur="pwdcheck('pwd')"><strong  id="pwd"></strong>
                                            </th>
                                           
                                         
										</tr>

										</tr>
                                        
                                       
											<th style="text-align:center;"><label class="control-label">确认密码<span class="required">*</span></label></th>
                                             
											<th>
   
                                           <input name="new_pt_user_passwordconfirm" class="span6 m-wrap" id="new_pt_user_passwordconfirm_id" type="password"   onBlur="pwdrecheck('repwd')"><strong  id="repwd"></strong>
                                            </th>
                                            
                                         
										</tr>                                        
									</thead>
									
								</table>


				
               <input name="pt_user_add_btn" class="btn blue dropdown-toggle" type="submit"  value="添加新管理员" onclick="pt_user_add_button()" >
			
									

						</form>
                        </div>

						</div>
                        </div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER-->

		</div>

		<!-- END PAGE -->

	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">

			2014 &copy; a6

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

	<script type="text/javascript" src="__PUBLIC__/tms/media/js/jquery.validate.min.js"></script>

	<script type="text/javascript" src="__PUBLIC__/tms/media/js/additional-methods.min.js"></script>

	<script type="text/javascript" src="__PUBLIC__/tms/media/js/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="__PUBLIC__/tms/media/js/chosen.jquery.min.js"></script>

	<script type="text/javascript" src="__PUBLIC__/tms/media/js/select2.min.js"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="__PUBLIC__/tms/media/js/app.js"></script>

	<script src="__PUBLIC__/tms/media/js/form-wizard.js"></script>

	<!-- END PAGE LEVEL SCRIPTS -->

	<script>

		jQuery(document).ready(function() {

		   // initiate layout and plugins

		   App.init();

		   FormWizard.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>
<script type="text/javascript">
function pt_user_manage_choose(button_name){
	if(button_name=="delete_user"){
		document.pt_user_manage.action="<?php echo U('Root/deletePuTongUser');?>";
		
	}
	else if(button_name=="lock_user"){
	   document.pt_user_manage.action="<?php echo U('Root/lockPuTongUser');?>";
	}
	
	else if(button_name=="resetpassword_user"){
	  document.pt_user_manage.action="<?php echo U('Root/resetpasswordPuTongUser');?>";
	}
	else{
		document.pt_user_manage.action="<?php echo U('Root/rootUserIndex');?>";
	}
}
function stock_manage_choose(button_name){
	if(button_name=='delete_stock'){
			  document.stock_manage.action="<?php echo U('Root/deleteStock');?>";
	}
	else{
			  document.stock_manage.action="<?php echo U('Root/stockAuthChange?sid=-1');?>";
	}
}

<!--下面是ajax注册验证------------------------------------------------------------------------------------>
function stockcheck(obj){
	
	var new_stockname=document.getElementById("new_stock_name_id").value;

	if(new_stockname==""){
		 document.getElementById(obj).innerHTML=" <font color=red>股票名称不能为空！</font>"; 
		 return false;
	}
	else{
		 document.getElementById(obj).innerHTML=""; 
		 return true;
	}
}
function usercheck(obj){
   var new_username=document.getElementById("new_pt_user_name_id").value;
   if(new_username==""){
         document.getElementById(obj).innerHTML=" <font color=red>用户名不能为空！</font>";   

         return false;
   }
   else{
		 document.getElementById('check').innerHTML="";	   
         return true;
   }

}
function pwdcheck(obj){
	var new_userpassword=document.getElementById("new_pt_user_password_id").value;
	if(new_userpassword==""){
		document.getElementById(obj).innerHTML=" <font color=red>用密码名不能为空！</font>"; 
		return false;
	}
	else if(new_userpassword.length<6){
		document.getElementById(obj).innerHTML=" <font color=red>密码长度不能小于6位！</font>"; 
		return false;		
	}
	else{
		document.getElementById(obj).innerHTML=""; 
		return true;
	}
		
}
function pwdrecheck(obj){
	var new_userpassword=document.getElementById("new_pt_user_password_id").value;
	var new_userpasswordconfirm=document.getElementById("new_pt_user_passwordconfirm_id").value;
	if(new_userpasswordconfirm==""){ 
		document.getElementById(obj).innerHTML=" <font color=red>请再输入一次密码！</font>";
		return false;	
	}
	else if(new_userpassword!=new_userpasswordconfirm){
		document.getElementById(obj).innerHTML=" <font color=red>两次输入的密码不一致！</font>"; 
		return false;	
	}
	else{
		document.getElementById(obj).innerHTML=""; 
		return true;		
	}
}

function pt_user_add_button(){

		if(usercheck('check')==true&&pwdcheck('pwd')==true&&pwdrecheck('repwd')==true){
			document.pt_user_add.action="<?php echo U('Root/addPuTongUser');?>";
		}
}
function stock_add_button(){
		if(stockcheck('stockexist_id')==true){
			document.stock_add.action="<?php echo U('Root/addStock');?>";
		}
}
</script>
<!-- END BODY -->

</html>