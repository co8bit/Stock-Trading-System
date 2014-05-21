<?php

class FormModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('sid','require','there must have a sid'),
        //array('stockName','require','there must have a stockName')
        );
    // 定义自动完成
    protected $_auto    =   array(
        array('create_time','time',1,'function'),
        );
}