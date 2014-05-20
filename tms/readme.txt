1.数据库具体样子在sql/a6_tms.sql文件中

2.最基本的登录判断已经在BaseAction里做了，只需要继承BaseAction这个类，初始化函数如下就好：
	class MainAction extends BaseAction 
	{
	
	    protected function _initialize() 
	    {
	    	parent::_initialize();
	    }
	}
    
3.	对于某个股票判断权限用$this->checkAuth();具体使用方法见函数说明
    判断某个用户是不是root用户，用$this->checkAuth();具体使用方法见函数说明