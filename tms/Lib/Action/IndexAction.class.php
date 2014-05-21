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
    		D("User")->init($this->_post('userName'));
    		if ( $result = D("User")->login($this->_post('userPassword')) )
    		{
    			empty($result["status"]) && $this->error("账户被锁定，不能登录");
    			
    			//设置session
    			session('userName',$result['userName']);
    			session("uid",$result["uid"]);
    			session('auth',$result["auth"]);
    		
    			$this->success('登陆成功',U('Index/index'));
    		}
    		else
    		{
    			$this->error('登录失败');
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