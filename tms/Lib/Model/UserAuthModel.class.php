<?php
class UserAuthModel extends Model {
	
	public function init()
	{
		
	}
	public function addAuthRecord($new_auth_unit){
     return $this->add($new_auth_unit);
	}
	public function deleteUserAuthByUid($uid){
		$condition="uid=".$uid;
		$result = $this->where($condition)->delete();
		return $result;
	}
	public function selectUserAuthByUid($uid){
		$condition['uid'] = $uid;
		return $this->where($condition)->select();
	}
	public function selectUserAuthBySid($sid){
		$condition['sid'] = $sid;
		return $this->where($condition)->select();
	}
	public function deleteUserAuthBySid($Sid){
		$condition="sid=".$sid;
		$result = $this->where($condition)->delete();
		return $result;
	}
/* 	public function selectStock(){
		return $this->select();
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
	
	} */
}
?>