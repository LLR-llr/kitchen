<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/10/14
 * Time: 11:21
 */

namespace app\admin\controller;


use think\Controller;
use think\Session;
class Base extends Controller
{
    public function  _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        if(!Session::has('user')){
            $this->error('请登录','/thinkphp/public/admin/login/index');
            exit();
        }
    }
}