<?php

class MainAction extends BaseAction 
{

    protected function _initialize() 
    {
    	parent::_initialize();
    }
    
    public function index()
    {
    	$this->display();
    }
    
    public function manage()
    {
    	$this->assign("sid",$this->_get("sid"));
    	$this->display();
    }
    
    public function indexIframe()
    {
    	$stockList = D("UserAuth")->where(array("uid"=>$this->uid))->join(' a6_stock_info ON  a6_user_auth.sid = a6_stock_info.sid')->select();
    	$this->assign("stockList",$stockList);
    	$this->display();
    }
    
    public function manageIframe()
    {
    	$sid		=		$this->_get("sid");
    	$instructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid))->order('createTime desc')->join(' a6_stock_info ON  a4_instruct.sid = a6_stock_info.sid')->select();
    	$this->assign("instructList",$instructList);
    	$this->assign("sotckName",$instructList[0]["sotckName"]);
    	$this->display();
    }
}

?>