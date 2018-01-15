<?php
/**
 * Created by PhpStorm.
 * User: lzh
 * Date: 2017/10/19
 * Time: 15:35
 */

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
        //验证规则
        protected $rule = [
                'nickname|昵称' => 'require|min:5|token',
                'email|邮箱' => 'require|email',
                'birthday|生日' => 'dateFormat:Y-m-d',
        ];
}