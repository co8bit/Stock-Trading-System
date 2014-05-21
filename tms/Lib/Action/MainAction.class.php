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
    	$sid		=		$this->_get("sid");
    	$this->assign("sid",$sid);
    	$this->assign("stockInfo",D("StockInfo")->getStockInfo($sid));
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
    	$instructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid))->order('createTime desc')->select();
//     	dump($instructList);
    	$this->assign("sid",$sid);
    	$this->assign("stockInfo",D("StockInfo")->getStockInfo($sid));
    	$this->assign("instructList",$instructList);
    	$this->assign("sotckName",$instructList[0]["sotckName"]);
    	$this->display();
    }
    
    
    /**
     * 暂停某个股票
     */
    public function pause()
    {
    	$sid		=		$this->_get("sid");
    	if (D("StockInfo")->setPause($sid))
    		$this->success("暂停成功");
    	else
    		$this->error("暂停失败，请重试");
    }
    
    /**
     * 重启某个股票
     */
    public function restart()
    {
    	$sid		=		$this->_get("sid");
    	if (D("StockInfo")->setRestart($sid))
    		$this->success("重启成功");
    	else
    		$this->error("重启失败，请重试");
    }
    
    /**
     * 设置股票涨跌幅页面
     */
    public function setStockLimit()
    {
    	$incLimit		=		$this->_post("incLimit");
    	$decLimit		=		$this->_post("decLimit");
    	
    }
}

?>