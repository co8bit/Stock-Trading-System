<?php

class UserAction extends BaseAction 
{

    protected function _initialize() 
    {
    	parent::_initialize();
    }
    
    /**
     * 修改密码页面
     * 支持默认修改本账户和修改其他账户密码。
     * 如果修改其他账户密码需要有root权限且用get传uid过来
     */
    public function editPwd()
    {
    	if (IS_POST)
    	{
    		$toUid		=		$this->_post("toUid");
    		$pwd		=		$this->_post("userPassword");
    		$pwd2		=		$this->_post("userPassword2");
    		empty($toUid)  &&  $this->error("非法操作",U("Main/index"));
    		empty($pwd)  &&  $this->error("错误：密码为空");
    		empty($pwd2)  &&  $this->error("错误：确认密码为空");
    		if ($pwd != $pwd2)
    			$this->error("错误：两边密码不一致");
    		if ( ($toUid != session("uid")) && (!$this->checkAuth(session("uid"),"isRoot")) )
    			$this->error("非法操作",U("Main/index"));
    		
    		if (D("User")->where(array("uid"=>$toUid))->setField("userPassword", $pwd))
    			$this->success("修改密码成功",U("Main/index"));
    		else
    			$this->error("修改密码失败，请重试");
    	}
    	else
    	{
    		$toUid		=		$this->_get("uid");
    		if ( (!empty($toUid)) && (!$this->checkAuth(session("uid"),"isRoot")) )
    			$this->error("非法操作",U("Main/index"));
    		
    		if (empty($toUid))
    		{
    			$toUid		=		session("uid");
    			$toUserName		=		session("userName");
    		}
    		else
    		{
    			$re = D("User")->where(array("uid"=>$toUid))->find();
    			$toUserName		=		$re["userName"];
    		}
    		$this->assign("toUid",$toUid);
    		$this->assign("toUserName",$toUserName);
    		$this->display();
    	}
    }
    
}

?>