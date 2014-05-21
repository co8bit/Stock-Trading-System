<?php
class UserModel extends Model {

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