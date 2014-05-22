<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>超级管理员操作界面</title>
<script type="text/javascript">

</script>
</head>
<body>
this is root stockAuthChange, after login;
<form name="stock_auth_change" method="post" action="<?php echo U('Root/updataStockFunction?sid=1');?>">
  <table width="200">
    <?php if(is_array($stock_auth_users)): $i = 0; $__LIST__ = $stock_auth_users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$stock_auth_users_id): $mod = ($i % 2 );++$i;?><tr>
        <td><label>
            
            <input name="StockAuthCheckboxGroup[]" type="checkbox" id="StockAuthCheckboxGroup.<?php echo ($key); ?>"  value="<?php echo ($stock_auth_users_id["uid"]); ?>"  <?php echo ($stock_auth_users_id["hasauth"]); ?>>
            <?php echo ($key); ?>."---".<?php echo ($stock_auth_users_id["uid"]); ?>."---".<?php echo ($stock_auth_users_id["userName"]); ?></label>
        </td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>

  </table>
   <input name="stock_select" type="hidden" value="<?php echo ($stock_select); ?>">  <!--重要，可以将当前action中的变量通过form传给下一个action-->
   <button  type="submit" name="update_stock_auth" id="update_stock_auth_id" ">更新股票股票权限</button>
</form>
</body>
<?php echo ($var); ?>
</html>