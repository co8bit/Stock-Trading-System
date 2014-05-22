<?php
class UserModel extends Model {

	private $userName = "";
	
	public function init($userName)//传入userName
	{
		$this->userName = $userName;
	}
	
	// 自动验证设置
	protected $_validate = array(
			array('userName', 'require', '用户名不能为空！'),
			array('userName','','用户名已经存在！',0,'unique',Model::MODEL_BOTH), //验证name字段是否唯一
			array('userPassword', 'require', '密码不能为空！', 0),
			array('userPassword2', 'require', '请输入第二遍密码', 0),
			array('userPassword','userPassword2','两次输入的密码不一样',0,'confirm',Model::MODEL_BOTH), // 验证确认密码是否和密码一致
	);
	
	
	
	/**
	 * 判断用户名和密码是否能登录
	 * @param 	string $userName;用户名
	 * 					string $userPassword 用户密码
	 * @return 数据库返回的结果集，数组大小应为1。外面调用形如$re[0][]
	 */
	public function login($userName,$userPassword)
	{
		$condition['userName'] = $userName;
		$condition['userPassword'] = $userPassword;
		$tmp = $this->where($condition)->select();
		if (!empty($tmp))
			return $tmp[0];
		else
			return false;
	}
	
	
	public function selectPtUser(){
		$condition['auth'] = 'pt';
		return $this->where($condition)->select();
	}
	
	
	/**
	 * 删除普通管理员账户
	 * @param string $uid 普通管理员id
	 * @return 数据库返回的结果集，数组大小应为1。外面调用形如$re[0][]
	 */
	public function deleteUser($uid){

		$condition="uid=".$uid;
		$result = $this->where($condition)->delete();
		return $result;
	}
	
	
	/**
	 * 添加普通管理员账户
	 * @param  $new_user_array 新普通管理员信息数组
	 * @return 数据库返回的结果集,添加的记录位置
	 */
	public function addUser($new_user_array){
     return $this->add($new_user_array);
						
}

	
	/**
	 * 得到指定用户的用户信息
	 * @param	string $name;用户名
	* @return	array;
	* 				查询成功返回用户所有字段的数组
	* 				没查到返回null
	* 				查询错误返回false
	*/
	public function getUserInfo($name)
	{
		$tmp = $this->where("userName=\"".$name."\"")->select();
		if ( ($tmp === false) || ($tmp === null) )
			return $tmp;
		else
			return $tmp[0];
	}
	public function getUserInfoById($id)
	{
		$tmp = $this->where("uid=\"".$id."\"")->select();
		if ( ($tmp === false) || ($tmp === null) )
			return $tmp;
		else
			return $tmp[0];
	}
	
	
}
?>