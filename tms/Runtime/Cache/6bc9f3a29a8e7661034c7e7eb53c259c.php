<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>超级管理员操作界面</title>
</head>
<body>
this is root user index, after login;
<form name="pu_user_manage" method="post" action="">
  <table width="200">
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><label> <input type="radio" name="PtUserRadioGroup" value="<?php echo ($vo["userName"]); ?>" id="PtUserRadioGroup.<?php echo ($key); ?>"><?php echo ($key); ?>."---".<?php echo ($vo["userName"]); ?></label>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  <button  type="submit" action="<?php echo U('Main/rootUserIndex');?>">更新</button>
</form>
</body>
</html>