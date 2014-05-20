最基本的登录判断已经在BaseAction里做了，只需要继承BaseAction这个类，初始化函数如下就好：
class MainAction extends BaseAction 
{

    protected function _initialize() 
    {
    	parent::_initialize();
    }
    
    
}