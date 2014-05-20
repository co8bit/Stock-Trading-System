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
	 * @param string $userPassword 用户密码
	 * @return 数据库返回的结果集，数组大小应为1。外面调用形如$re[0][]
	 */
	public function login($userPassword)
	{
		$condition['userName'] = $this->userName;
		$condition['userPassword'] = $userPassword;
		$tmp = $this->where($condition)->select();
		if (!empty($tmp))
			return $tmp[0];
		else
			return false;
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
	
	
	
	/**
	 * 新用户注册
	* @param	$data;用户相关信息
	* @return	int；注册是否成功
	* 				如果数据非法或者查询错误则返回false;
	* 				如果是自增主键 则返回主键值，否则返回1
	*/
	public function sign($originData)
	{
	}
	
}
?>