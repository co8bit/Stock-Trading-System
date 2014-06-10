<?php
/*这个是管理员登陆后显示的第一个页面*/
class MainAction extends BaseAction 
{

    protected function _initialize() 
    {
    	parent::_initialize();
    }
    
    public function index()
    {
    	$stockArray = D("UserAuth")->where(array("uid"=>$this->uid))->join(' a6_stock_info ON  a6_user_auth.sid = a6_stock_info.sid')->select();
    
    	$is_root_user = $this->checkAuth($this->uid,array("action"=>"isRoot"));
//     	dump($is_root_user);
    	if($is_root_user){
    		$this->redirect("Root/rootUserIndex");
    	}
    	else
    	{
    		$stockList = D("UserAuth")->where(array("uid"=>$this->uid))->join(' a6_stock_info ON  a6_user_auth.sid = a6_stock_info.sid')->select();
    		$this->assign("stockList",$stockList);
    		$this->display();
    	}

    }


    public function manage()
    {
    	$sid		=		$this->_get("sid");
    	empty($sid) && $this->error("非法操作",U("Main/index"));
    	
    	$this->assign("sid",$sid);
    	$this->assign("stockInfo",D("StockInfo")->getStockInfo($sid));
    	
    	
    	
    	//为了判断是不是有指令
    	$buyInstructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid,"ty"=>1))->order('price desc,createTime desc,num desc')->select();
    	$sellInstructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid,"ty"=>0))->order('price asc,createTime desc,num desc')->select();
    	$this->assign("buyInstructList",$buyInstructList);
    	$this->assign("sellInstructList",$sellInstructList);
    	$this->display();
    }
    
    public function ajaxStockInfo()
    {
    	$sid		=		$this->_get("sid");
    	empty($sid) && $this->error("非法操作",U("Main/index"));
    	 
    	$re = D("StockInfo")->getStockInfo($sid);
    	echo $re["status"] . "," . $re["price"] . "," . $re["num"];
    }
    
    public function ajaxBuyInstructList()
    {
    	$sid		=		$this->_get("sid");
    	empty($sid) && $this->error("非法操作",U("Main/index"));
    	
    	$buyInstructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid,"ty"=>1))->order('price desc,createTime desc,num desc')->select();
    	$outputData 	=		null;
    	for ($i = 0; $i < count($buyInstructList); $i++)
    	{
    		$outputData[$i][0] = "$i";
    		$outputData[$i][1] = $buyInstructList[$i]["price"];
    		$outputData[$i][2] = $buyInstructList[$i]["num"];
    		$outputData[$i][3] = $buyInstructList[$i]["createTime"];
    	}

    	$data["data"]		=		null;
    	$data["data"]		=		$outputData;
    	$this->ajaxReturn($data);
    }
    
    public function ajaxSellInstructList()
    {
    	$sid		=		$this->_get("sid");
    	empty($sid) && $this->error("非法操作",U("Main/index"));
    	 
    	$sellInstructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid,"ty"=>0))->order('price asc,createTime desc,num desc')->select();
    	$outputData 	=		null;
    	for ($i = 0; $i < count($sellInstructList); $i++)
    	{
    	$outputData[$i][0] = "$i";
    	$outputData[$i][1] = $sellInstructList[$i]["price"];
    	$outputData[$i][2] = $sellInstructList[$i]["num"];
    	$outputData[$i][3] = $sellInstructList[$i]["createTime"];
    	}
    
    	$data["data"]		=		null;
    	$data["data"]		=		$outputData;
    	$this->ajaxReturn($data);
    }
    
//     public function indexIframe()
//     {
//     	$stockList = D("UserAuth")->where(array("uid"=>$this->uid))->join(' a6_stock_info ON  a6_user_auth.sid = a6_stock_info.sid')->select();
//     	$this->assign("stockList",$stockList);
//     	$this->display();
//     }
    
//     public function manageIframe()
//     {
//     	$sid		=		$this->_get("sid");
//     	empty($sid) && $this->error("非法操作",U("Main/index"));
    	
//     	$buyInstructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid,"ty"=>1))->order('price desc,createTime desc,num desc')->select();
//     	$sellInstructList = D("a4_instruct")->Table("a4_instruct")->where(array("a4_instruct.sid"=>$sid,"ty"=>0))->order('price asc,createTime desc,num desc')->select();
//     	$this->assign("sid",$sid);
//     	$this->assign("stockInfo",D("StockInfo")->getStockInfo($sid));
//     	$this->assign("buyInstructList",$buyInstructList);
//     	$this->assign("sellInstructList",$sellInstructList);
//     	$this->display();
//     }
    
    
    /**
     * 暂停某个股票
     */
    public function pause()
    {
    	$sid		=		$this->_get("sid");
    	empty($sid) && $this->error("非法操作",U("Main/index"));
    	
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
    	empty($sid) && $this->error("非法操作",U("Main/index"));
    	
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
    	empty($sid) && $this->error("非法操作",U("Main/index"));
    	empty($incLimit) && $this->error("错误：涨跌幅为空");
    	
    	if ( (D("StockInfo")->where(array("sid"=>$sid))->setField("incLimit", $incLimit) === false) )
    		$this->error("涨跌幅设置失败，请重试");
    	else
    		$this->success("涨跌幅设置成功");
//     	$this->display("Index/login");
    }
    
    /**
     * 股票基础信息管理页面
     */
    public function stockBaseManage()
    {
    	if (IS_POST)
    	{
    		$stockName		=		$this->_post("stockName");
    		empty($stockName) && $this->error("错误：股票名称为空");
    		
    		if (D("StockInfo")->addStock(session("uid"),$stockName))
    			$this->success("添加股票成功");
    		else
    			$this->error("添加股票失败，请重试");
    	}
    	else
    	{
    		$stockList		=		D("StockInfo")->select();
    		$this->assign("stockList",$stockList);
    		$this->display();
    	}
    }
    
    /*
     * 删除某个股票的操作
     */
    public function deleteStock()
    {
    	$sid		=		$this->_get("sid");
    	empty($sid) && $this->error("非法操作",U("Main/index"));
    	
    	if (D("StockInfo")->where(array("sid"=>$sid))->delete())
    		$this->success("删除成功");
    	else
    		$this->error("删除失败，请重试");
    }
    
}

?>