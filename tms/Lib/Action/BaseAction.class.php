<?php

class BaseAction extends Action 
{

	protected $uid = null;
	
	/**
	 * 初始化函数。已经判断用户是否登录（只判断了用户是否具有普通权限）
	 */
    protected function _initialize()
    {
        header("Content-Type:text/html; charset=utf-8");
        $tmpUid		=		session("uid");
        empty($tmpUid) && $this->error("非法操作，请登录",U("Index/login"));
        
        $this->uid = $tmpUid;
    }
    
    
    /**
     * 检查用户权限
     * @param		int $uid;用户uid
     * 						array或string $action;
     * 							为string的时候传入"isRoot"判断是否是root权限
     * 							为arry时，传入$action["action"]="look",$action["sid"]=sid（股票id）;判断该用户是否有权限管理该股票
     * @return		bool 是否具有该权限
     */
    protected function checkAuth($uid,$action = array())
    {
    	if (session("auth") == "root")
    		return true;
    	
    	if (is_array($action))
    	{
    		if ($action["action"] == "look")
    		{
    			$re = D("UserAuth")->where(array("uid"=>$uid,"sid"=>$action["sid"]))->find();
    			if (empty($re))
    				return false;
    			else
    				return true;
    		}
    	}
    	elseif ($action == "isRoot")
    	{
    		if (session("auth") == "root")
    			return true;
    		else
    			return false;
    	}
    } 
}

?>