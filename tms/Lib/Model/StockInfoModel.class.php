<?php
class StockInfoModel extends Model {
	
	public function init()
	{
		
	}
	public function selectStock(){
		return $this->select();
	}
	public function deleteStock($sid){
		$condition="sid=".$sid;
		$result = $this->where($condition)->delete();
		return $result;
	}
	public function getStockInfo($name)
	{
		$tmp = $this->where("stockName=\"".$name."\"")->select();
		if ( ($tmp === false) || ($tmp === null) )
			return $tmp;
		else
			return $tmp[0];
	}
	public function addStock($new_stock_array){
		return $this->add($new_stock_array);
	
	}
}
?>