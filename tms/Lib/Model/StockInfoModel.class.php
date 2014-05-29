<?php
class StockInfoModel extends Model {
	
	public function selectStock(){
		return $this->select();
	}
	public function deleteStock($sid){
		$condition="sid=".$sid;
		$result = $this->where($condition)->delete();
		return $result;
	}
	
	
	
	/**
	 * 得到股票信息
	 * @param		int $sid;股票sid
	 * 	@return		array or bool; 数据表中的一行 or false
	 * 						
	 */
	public function getStockInfo($sid)
	{
		$re = $this->where(array("sid"=>$sid))->find();
		if (empty($re))
			return false;
		else
			return $re;
	}
	public function getStockInfoByName($name)
	{
		$tmp = $this->where("stockName=\"".$name."\"")->select();
		if ( ($tmp === false) || ($tmp === null) )
			return $tmp;
		else
			return $tmp[0];
	}
	
	/**
	 * 设置股票暂停状态
	 * @param		int $sid;股票 
	 * @return		bool;是否设置成功
	 */
	public function setPause($sid)
	{
		$re = $this->where(array("sid"=>$sid))->setField("status",0);
		if ($re === false)
			return false;
		else
			return true;			
	}
	
	/**
	 * 设置股票状态为重启
	 * @param		int $sid;股票
	 * @return		bool;是否设置成功
	 */
	public function setRestart($sid)
	{
		$re = $this->where(array("sid"=>$sid))->setField("status",1);
		if ($re === false)
			return false;
		else
			return true;
	}
	
	/**
	 * 添加股票
	 * @param 		int uid;该操作的操作用户
	 * 						string $stockName;
	 * @return		bool;添加是否成功
	 * by	co8bit
	 */
	public function addStock($uid,$stockName)
	{
		$sid		=		$this->add(array("stockName"=>$stockName));
		empty($sid) && $this->error("添加错误，请重试");
		return D("UserAuth")->add(array("uid"=>$uid,"sid"=>$sid));
	}
	
	
	/**
	 * by官万先
	 * @param unknown $new_stock_array
	 * @return Ambigous <mixed, boolean, string, false, number>
	 */
	public function addStock2($new_stock_array){
		return $this->add($new_stock_array);
	
	}
}
?>