<?php
/*这个是普通管理员登陆后显示的第一个页面*/
class PuTongAction extends BaseAction 
{

    protected function _initialize() 
    {
    	parent::_initialize();
    }
    
    public function ptUserIndex(){
    	$this->display();
    }
}

?>