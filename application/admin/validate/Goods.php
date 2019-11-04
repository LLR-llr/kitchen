<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/10/11
 * Time: 11:54
 */

namespace app\admin\validate;


use think\Validate;

class Goods extends Validate
{
    protected $rule=[
        'name'=> 'require',
        'thumb'=>'require',
        'mprice'=>'number',
        'sale'=>'number',
        'stock'=>'number',
        'gid'=>'number',
        'cid'=>'number',
        'banner'=>'require',
        'detail'=>'require',
    ];
    protected $scene=[

    ];
}