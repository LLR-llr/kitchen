<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/10/26
 * Time: 13:02
 */

namespace app\admin\validate;


use think\Validate;

class News extends Validate
{
    protected $rule=[
        'wname'=> 'require',
        'wwriter'=>'require',
        'wcontent'=>'require',
    ];
    protected $scene=[

    ];
}
