<?php
class StockInfoModel extends Model {

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
}
?>