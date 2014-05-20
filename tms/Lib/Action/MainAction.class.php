<?php

class MainAction extends BaseAction 
{

    protected function _initialize() 
    {
    	parent::_initialize();
    }
    
    public function index()
    {
    	$stockArray = D("UserAuth")->where(array("uid"=>$this->uid))->join(' a6_stock_info ON  a6_user_auth.sid = a6_stock_info.sid')->select();
    	dump($stockArray);
    	$re = $this->checkAuth($this->uid,array("action"=>"look","sid"=>"1"));
    	$this->display("Index/login");
    }
    
}

?>