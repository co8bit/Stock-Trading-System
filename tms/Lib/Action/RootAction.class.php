<?php
/*这个是root管理员登陆后显示的第一个页面*/
class RootAction extends BaseAction 
{
	
    protected function _initialize() 
    {
    	parent::_initialize();
    	
    }

    public function rootUserIndex(){
    	
    	$User = D('User');
    
    	$list = $User->selectPtUser();
    	//$list = $User->selectPtUser();
    	$this->assign('list',$list);
    	//dump(getdate());
    	$StockInfo=D('StockInfo');
    	$stock_list=$StockInfo->selectStock();
    	$this->assign('stock_list',$stock_list);
    	$this->display();
    	
    }
    public function deletePuTongUser(){
    	
    	$User = D('User');
     	if($this->_post('PtUserRadioGroup')!=NULL){
     		$delete_result=$User->deleteUser($this->_post('PtUserRadioGroup'));

     		if($delete_result==false){
     		      $this->error('删除普通管理员失败，数据库错误',U('Root/rootUserIndex'));		
     		}
     		else{
     		      $this->success('删除普通管理员成功',U('Root/rootUserIndex'));		
     		}
    	}
    	else{
    		$this->error('删除普通管理员失败，未选择操作对象',U('Root/rootUserIndex'));
    	} 

    	
    }
    public function addPuTongUser(){
    	$new_user_name=$this->_post('new_pt_user_name');
    	$new_user_password=$this->_post('new_pt_user_password');
    	$new_user_password_confirm=$this->_post('new_pt_user_passwordconfirm');
    	$User = D('User');
    	$rs=$User->getUserInfo($new_user_name);
    	if($rs!=NULL){
    		$this->error('用户已经存在，不需要添加',U('Root/rootUserIndex'));
    	}
    	else{
    		$new_user_unit=array(
    				"uid"=>null,
    				"userName"=>$new_user_name,
    				"userPassword"=>$new_user_password,
    				"auth"=>"pt",
    				"active_status"=>"1",
    		);
    		$add_result=$User->addUser($new_user_unit);
    		//dump($add_result);
    		if($add_result<=0){
    			$this->error('添加失败，数据库错误',U('Root/rootUserIndex'));
    		}
    		else{
    			$this->success('新业务管理员添加成功',U('Root/rootUserIndex'));
    		}
    		
    	}
/*     	dump($new_user_name);
    	dump($new_user_password);
    	dump($new_user_password_confirm);  */
    	//$this->success('gggg',U('Root/rootUserIndex'));
    	
    }
    public function lockPuTongUser(){

    	$User = D('User');
    	if($this->_post('PtUserRadioGroup')!=NULL){
    		
    	    $now_status=$User->getUserInfoById($this->_post('PtUserRadioGroup'));
    	    
    	    $lockornot=$now_status['active_status'];
    	   // dump($lockornot);
    	    if($lockornot=="1"){
    	    	$change_result=$User->where("uid=".$this->_post('PtUserRadioGroup'))->setField('active_status','0');
    	    	dump($change_result);

    	    		$this->success('普通管理员解锁成功',U('Root/rootUserIndex'));

    	    }
    	    else{
    	    	dump($change_result);
    	    	$change_result=$User->where("uid=".$this->_post('PtUserRadioGroup'))->setField('active_status','1');

    	    		$this->success('普通管理员锁定成功',U('Root/rootUserIndex'));

    	    }

    	}
    	else{
    		$this->error('锁定/解锁普通管理员失败，未选择操作对象',U('Root/rootUserIndex'));
    	}    	
    }
    public function resetpasswordPuTongUser(){

    	$User = D('User');
    	if($this->_post('PtUserRadioGroup')!=NULL){
    	    	$change_result=$User->where("uid=".$this->_post('PtUserRadioGroup'))->setField('userPassword','123456');
    	    		
    	    	$this->success('密码已经重置为123456',U('Root/rootUserIndex'));
    

    	}
    	else{
    		$this->error('重置密码普通管理员失败，未选择操作对象',U('Root/rootUserIndex'));
    	}    	
    }
    public function deleteStock(){

    	$StockInfo=D('StockInfo');
    	if($this->_post('StockRadioGroup')!=NULL){
    		$delete_result=$StockInfo->deleteStock($this->_post('StockRadioGroup'));
    		//$UserAuth=D('UserAuth');
    		//$delete_user_auth_result=$UserAuth->deleteUserAuthByUid($this->_post('StockRadioGroup'));
    		
    		if($delete_result==false){
    			$this->error('删除股票失败，数据库错误',U('Root/rootUserIndex'));
    		}
    		else{
    			$this->success('删除股票成功',U('Root/rootUserIndex'));
    		}
    	}
    	else{
    		$this->error('删除股票管理员失败，未选择操作对象',U('Root/rootUserIndex'));
    	}
    	
    	 
    	
    }
    public function addStock(){
    	$new_stock_name=$this->_post('new_stock_name');
    	$StockInfo=D('StockInfo');
    	$rs=$StockInfo->getStockInfo($new_stock_name);
    	if($rs!=NULL){
    		$this->error('股票已经存在，不需要添加',U('Root/rootUserIndex'));
    	}
    	else{
    		$new_stock_unit=array(
    				"uid"=>null,
    				"stockName"=>$new_stock_name,
    
    		);
    		$add_result=$StockInfo->addStock2($new_stock_unit);
    		//dump($add_result);
    		if($add_result<=0){
    			$this->error('添加失败，数据库错误',U('Root/rootUserIndex'));
    		}
    		else{
    			$this->success('新股票添加成功',U('Root/rootUserIndex'));
    		}
    	}
    }
    public function stockAuthChange($sid){
    	
    	$StockInfo=D('StockInfo');
    	if($sid==-1){
    		if($this->_post('StockRadioGroup')!=NULL){
    			$User = D('User');
    			$stock_auth_users = $User->selectPtUser();
    			$UserAuth=D('UserAuth');
    			$select_user_auth_result=$UserAuth->selectUserAuthBySid($this->_post('StockRadioGroup'));
    		
    			$pt_user_number=count($stock_auth_users,COUNT_NORMAL);
    			$hit_stock_user_number=count($select_user_auth_result,COUNT_NORMAL);
    			for($i=0;$i<$pt_user_number;$i++){
    				$has_auth=false;
    				for($j=0;$j<$hit_stock_user_number;$j++){
    					if($stock_auth_users[$i]['uid']==$select_user_auth_result[$j]['uid']){
    						$has_auth=true;
    					}
    				}
    				$temp_array=&$stock_auth_users[$i];
    				 
    				if($has_auth){
    					//array_push($temp_array, "hasauth", "true");
    					$temp_array['hasauth']="checked";
    				}
    				else{
    					//array_push($temp_array, "hasauth", "false");
    					$temp_array['hasauth']="";
    				}
    			}
    			dump($stock_auth_users) ;
    			dump($select_user_auth_result);
    			$stock_select_actionpara=$this->_post('StockRadioGroup');
    			$this->assign('stock_select',$stock_select_actionpara);
    			//dump($pt_user_number);
    		
    			$this->assign('stock_auth_users',$stock_auth_users);//传递给下一个action使用
    			$this->display();
    		}
    		else{
    			$this->error('股票权限修改失败，没有选中股票',U('Root/rootUserIndex'));
    		}  		
    	}
    	else{//不是从form调用，是其他的action调用

    		$User = D('User');
    		$stock_auth_users = $User->selectPtUser();
    		$UserAuth=D('UserAuth');
    		$select_user_auth_result=$UserAuth->selectUserAuthBySid($sid);
    		
    		$pt_user_number=count($stock_auth_users,COUNT_NORMAL);
    		$hit_stock_user_number=count($select_user_auth_result,COUNT_NORMAL);
    		for($i=0;$i<$pt_user_number;$i++){
    			$has_auth=false;
    			for($j=0;$j<$hit_stock_user_number;$j++){
    				if($stock_auth_users[$i]['uid']==$select_user_auth_result[$j]['uid']){
    					$has_auth=true;
    				}
    			}
    			$temp_array=&$stock_auth_users[$i];
    				
    			if($has_auth){
    				//array_push($temp_array, "hasauth", "true");
    				$temp_array['hasauth']="checked";
    			}
    			else{
    				//array_push($temp_array, "hasauth", "false");
    				$temp_array['hasauth']="";
    			}
    		}
    		dump($stock_auth_users) ;
    		dump($select_user_auth_result);
    		$stock_select_actionpara=$this->_post('StockRadioGroup');
    		$this->assign('stock_select',$stock_select_actionpara);//传递给下一个action使用
    		//$this->assign('stock_auth_status',$stock_auth_users);//传递给下一个action使用
    		//dump($pt_user_number);	
    		$this->assign('stock_auth_users',$stock_auth_users);
    		$this->display();
    		
    	}

    	
    }
    public function updataStockFunction(){
		$stock_selection=$this->_post('stock_select');
    	//dump($stock_selection);
    	$array =$this->_post('StockAuthCheckboxGroup');
    	//dump($array);
//---------------------------------------------------------------------
    	$User = D('User');
    	$stock_auth_users = $User->selectPtUser();
    	$UserAuth=D('UserAuth');
    	$select_user_auth_result=$UserAuth->selectUserAuthBySid($stock_selection);
    	
    	$pt_user_number=count($stock_auth_users,COUNT_NORMAL);
    	$hit_stock_user_number=count($select_user_auth_result,COUNT_NORMAL);
    	for($i=0;$i<$pt_user_number;$i++){
    		$has_auth=false;
    		for($j=0;$j<$hit_stock_user_number;$j++){
    			if($stock_auth_users[$i]['uid']==$select_user_auth_result[$j]['uid']){
    				$has_auth=true;
    			}
    		}
    		$temp_array=&$stock_auth_users[$i];
    	
    		if($has_auth){
    			//array_push($temp_array, "hasauth", "true");
    			$temp_array['hasauth']="checked";
    		}
    		else{
    			//array_push($temp_array, "hasauth", "false");
    			$temp_array['hasauth']="";
    		}
    	}
    	//dump($stock_auth_users) ;
    	//dump($select_user_auth_result);
    	$arraysize=count($array);
    	//dump($arraysize);
    	for($i=0;$i<$pt_user_number;$i++){
    		$temp_array=&$stock_auth_users[$i];
    		$user_id=$temp_array['uid'];
    		$user_id_checked=$temp_array['hasauth'];
    		//dump($user_id);
    		//dump($user_id_checked);
    		//dump($temp_array);
    		if($user_id_checked=="checked"){//原来是有权限的，看看现在是否有权限
    			$disable_auth=true;
    			for($j=0;$j<$arraysize;$j++){
    				if($array[$j]==$user_id) {//发现它还有权限
    					$disable_auth=false;
    				}
    			}
    			if($disable_auth==true){//真的被撤销权限了
    				dump($user_id."被撤销了");
    				//更新数据库
    				$UserAuth=D('UserAuth');
    				$delete_user_auth_result=$UserAuth->deleteUserAuthByUid($user_id);
    			}
    			else{
    				dump($user_id."保存原来");
    			}
    		}
    		else{//原来是没有权限的，看看现在是否没有权限
    			$enable_auth=false;
    			for($j=0;$j<$arraysize;$j++){
    				if($array[$j]==$user_id) {//发现它还有权限
    					$enable_auth=true;
    				}
    			}
    			if($enable_auth==ture){//真的有权限了
    				dump($user_id."有权限了");
    				//更新数据库

    				$new_auth_record=array(
    						'uid'=>$user_id,
    				  		'sid'=>$stock_selection,		
    				);
    				$add_user_auth_result=$UserAuth->addAuthRecord($new_auth_record);
    			}
    			else{
    				dump($user_id."保存原来");
    			}
    		}

    	} 

    	$this->success('股票权限修改成功，现在反悔',U('Root/stockAuthChange?sid='.$stock_selection));
    }

}

?>