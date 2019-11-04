<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/10/11
 * Time: 16:05
 */

namespace app\admin\controller;


class Upload
{
    public function index()
    {
        $file = request()->file('file');
        if ($file) {
            $info = $file->validate(['size' => 200 * 1024, 'ext' => 'png,jpg,jpeg,gif,webp'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {
                // 成功上传后 获取上传信息
                // 输出 jpg
//                echo $info->getExtension();
//                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $src=UPLOAD_PATH . $info->getSaveName();
                return json([
                    "code" => 0
                    , "msg" => ""
                    , "data" => [
                        "src" => $src
                    ]
                ]);

//                // 输出 42a79759f284b767dfcb2a0197904287.jpg
//                echo $info->getFilename();
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

    }

    public function test(){
       $test= $_SERVER['PATH_INFO'];
       var_dump($test);
    }
}