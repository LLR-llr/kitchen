<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/10/9
 * Time: 9:42
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Session;

class Login extends Controller
{

    public function  index(){
        return view();
    }
    public function check(){
        if(!$this->request->isPost()){
            return json([
                'code'=>404,
                'msg'=>'请求方式错误'
            ]);
        }
        $data=input('post.');
        if(!captcha_check($data['code'])){
            return json([
               'code'=>404,
               'msg'=>'验证失败'
            ]);
        }
        $username=$data['username'];
        $password=$data['password'];
        $result=Db::name('manager')->where(['username'=>$username,'password'=>$password])->find();
        if($result>0){
            Session::set('user',$result);
            return json([
                'code'=>200,
                'msg'=>'登录成功'
            ]);
        }else{
            return json([
                'code'=>404,
                'msg'=>'登录失败'
            ]);
        }
    }
}