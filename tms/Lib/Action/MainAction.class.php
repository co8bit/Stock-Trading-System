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
    	$buyInstructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid,"ty"=>1))->order('price desc,createTime desc,num desc')->select();
    	$sellInstructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid,"ty"=>0))->order('price asc,createTime desc,num desc')->select();
//     	dump($instructList);
    	$this->assign("sid",$sid);
    	$this->assign("stockInfo",D("StockInfo")->getStockInfo($sid));
    	$this->assign("buyInstructList",$buyInstructList);
    	$this->assign("sellInstructList",$sellInstructList);
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
    	$sid				=		$this->_post("sid");
    	$incLimit		=		$this->_post("incLimit");
    	$decLimit		=		$this->_post("decLimit");
    	empty($incLimit) && $this->error("错误：涨幅为空");
    	empty($decLimit) && $this->error("错误：跌幅为空");
    	
    	if ( (D("StockInfo")->where(array("sid"=>$sid))->setField("incLimit", $incLimit) === false) || (D("StockInfo")->where(array("sid"=>$sid))->setField("decLimit", $decLimit) === false) )
    		$this->error("涨跌幅设置失败，请重试");
    	else
    		$this->success("涨跌幅设置成功");
//     	$this->display("Index/login");
    }
}

?>