<?php
namespace app\index\controller;

use think\Controller;

class Index extends Base
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public function index()
    {
        $this->assign('cid',0);
        return $this->fetch();
    }

}
