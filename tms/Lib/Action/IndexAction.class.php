<?php

class IndexAction extends Action 
{

	public function index()
	{
		$uid = session("uid");
		if (empty($uid))
			$this->redirect("Index/login");
		else
			$this->redirect("Main/index");
	}
	
    public function login() 
    {
    	if (IS_POST)
    	{
    		$userName			=		$this->_post('userName');
    		$userPassword		=		$this->_post('userPassword');
    		empty($userName) && $this->error("错误：用户名不能为空");
    		empty($userPassword) && $this->error("错误：密码不能为空");
    		
    		if ( $result = D("User")->login($userName,$userPassword) )
    		{
    			empty($result["active_status"]) && $this->error("账户被锁定，不能登录");
    			
    			//设置session
    			session('userName',$result['userName']);
    			session("uid",$result["uid"]);
    			session('auth',$result["auth"]);
    		
    			$this->success('登陆成功',U('Index/index'));
    		}
    		else
    		{
    			$this->error('登录失败',U('Index/login'));
    		}
    	}
    	else
    	{
    		$this->display();
    	}
    }
    
    public function logout()//安全退出
    {
    	//判断session是否存在
    	if (!session('?uid'))
    	{
    		$this->error('非法登录',U('Index/login'));
    	}
    
    	//删除session
    	session('userName',null);
    	session('auth',null);
    	session('uid',null);
    
    	//再次判断session是否存在
    	if ( (session('?auth')) || (session('?uid')) )
    		$this->error('退出失败');
    	else
    		$this->success('退出成功',U('Index/login'));////////////////////////////////////////////////////////
    }
}

?>