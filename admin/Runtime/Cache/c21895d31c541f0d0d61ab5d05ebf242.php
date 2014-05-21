<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<FORM method="post" action="__URL__/update">
    UID:   <INPUT type="text" name="uid" value="<?php echo ($vo["uid"]); ?>"><br/>
    权限：<INPUT type="text" name="auth" value="<?php echo ($vo["auth"]); ?>"><br/>
    <INPUT type="submit" value="提交">
</FORM>