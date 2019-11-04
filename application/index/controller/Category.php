<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/10/14
 * Time: 16:37
 */

namespace app\index\controller;


use think\Controller;
use think\Db;

class Category extends Base
{
    public function index(){
        $cid=$this->request->get('cid');

        $catenav=Db::table('nav')->where('id',$cid)->find();
        $tpl=$catenav['ntpl'];
//        var_dump($tpl);
        switch($tpl){
            case 'aboutus':

                break;
            case 'list':
            $cate2=Db::table('category')->select();
            $cate=[['cname'=>'精选','cid'=>-1]];
            $cate=array_merge($cate,$cate2);
            $goods=Db::table('goods')->select();
            $count=count($cate);
            for($i=0;$i<$count;$i++){
                if($i==0){
                    $cate[0]['goods']=$goods;
                }else{
                $cate[$i]['goods']= array_filter($goods,function($v) use($cate,$i){
                    return $v['cid']==$cate[$i]['cid'];
                });
                }
            }
            $this->assign('cate',$cate);
                break;
            case 'nres':
            $new=Db::table('nres')->select();
            $this->assign('new',$new);

                break;
            case 'online':

                break;
            case 'service':

                break;
        }
        $this->assign('cid',$cid);
        $this->assign('catenav',$catenav);
        $gid=$this->request->get('gid');
        if($gid){
            $goodss=Db::table('goods')->where('gid',$gid)->select();
            $this->assign('goodss',$goodss);
            $banner=$goodss[0]['banner'];
            $arr= explode(',',$banner);
            $this->assign('arr',$arr);
            return $this->fetch('xiangqing');
        }else{
            return $this->fetch($tpl);
        }

    }
    public function detail(){
//        $gid=$this->request->get('gid');
//        $goodss=Db::table('goods')->where('gid',$gid)->select();
//        $this->assign('goodss',$goodss);
        return $this->fetch('xiangqing');
    }
}