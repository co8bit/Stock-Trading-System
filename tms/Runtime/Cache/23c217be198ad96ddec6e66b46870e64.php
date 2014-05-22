<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>超级管理员操作界面</title>
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
</head>
<body>
this is root user index, after login;
<form name="pt_user_add" method="post" >
  用户名：
  <input name="new_pt_user_name" id="new_pt_user_name_id" type="text"  onBlur="usercheck('check')">
  <strong  id="check" ></strong>
  <br/>

  密码：
  <input name="new_pt_user_password" id="new_pt_user_password_id" type="password"  onBlur="pwdcheck('pwd')">
  <strong  id="pwd"></strong>
  <br/>
  确认密码:
  <input name="new_pt_user_passwordconfirm" id="new_pt_user_passwordconfirm_id" type="password"   onBlur="pwdrecheck('repwd')">
  <strong  id="repwd"></strong>
  <br/>
  <input name="pt_user_add_btn" type="submit" value="添加新管理员" onclick="pt_user_add_button()" >
  <br/>
  <div>-------------------------------------------------------</div>
</form>
<form name="pt_user_manage" method="post" >
  <table width="200">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><label>
            <input type="radio" name="PtUserRadioGroup" value="<?php echo ($vo["uid"]); ?>" id="PtUserRadioGroup.<?php echo ($key); ?>">
            <?php echo ($key); ?>."---".<?php echo ($vo["userName"]); ?>."---".<?php echo ($vo["auth"]); ?>."---".<?php echo ($vo["active_status"]); ?></label></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  <button  type="submit" name="delete_user" onclick="pt_user_manage_choose(this.name)">删除</button>
  <button  type="submit" name="refresh_user" onclick="pt_user_manage_choose(this.name)">刷新</button>
  <button  type="submit" name="lock_user" onclick="pt_user_manage_choose(this.name)">锁定/解锁</button>
  <button  type="submit" name="resetpassword_user" onclick="pt_user_manage_choose(this.name)">密码重置</button>
</form>
<div>-------------------------------------------------股票信息列表--------------------------------------------------------</div>
<form name="stock_manage" method="post" >
  <table width="200">
    <?php if(is_array($stock_list)): $i = 0; $__LIST__ = $stock_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$stock_list_id): $mod = ($i % 2 );++$i;?><tr>
        <td><label>
            <input type="radio" name="StockRadioGroup" value="<?php echo ($stock_list_id["sid"]); ?>" id="StockRadioGroup.<?php echo ($key); ?>">
            <?php echo ($key); ?>."---".<?php echo ($stock_list_id["sid"]); ?>."---".<?php echo ($stock_list_id["stockName"]); ?></label></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  <button  type="submit" name="delete_stock" onclick="stock_manage_choose(this.name)">删除股票</button>
  <button  type="submit" name="change_auth_stock" onclick="stock_manage_choose(this.name)">修改股票权限</button>

</form>
<form name="stock_add" method="post" >
  股票名：
  <input name="new_stock_name" id="new_stock_name_id" type="text"  onBlur="stockcheck('stockexist_id')">
  <strong  id="stockexist_id" ></strong>
  <br/>

  <input name="new_stock_add_btn" type="submit" value="添加新股票" onclick="stock_add_button()" >
  <br/>

</form>
</body>
</html>