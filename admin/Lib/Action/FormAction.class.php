<?php
class FormAction extends Action{
    public function insert(){
        $Form = D('stock_info');
        if($Form->create()){
            $result = $Form->add();
            if($result){
                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Form->getError());
        }
    }
    public function delete($sid){
        $del = M('stock_info');
        $result=$del->delete($sid);
        if($result)
            $this->success('删除成功');
        else
            $this->error('删除失败');
   }
    /*
    public function read($id=6){
        $Form = M('Form');

        $data = $Form->find($id);
        if($data){
            $this->data = $data;
        }else{
            $this->error('数据错误');
        }
        $this->display();
    }*/
    public function edit($id=0){
    $user   =   M('user');
    $this->vo   =   $user->find($uid);
    $this->display();
    }
    public function update(){
        $user   =   D('user');
        if($user->create()) {
            $result =   $user->save();
            if($result) {
                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($user->getError());
        }
    }

}