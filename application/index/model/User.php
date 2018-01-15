<?php
/**
 * Created by PhpStorm.
 * User: lzh
 * Date: 2017/10/19
 * Time: 11:15
 */

namespace app\index\model;

use think\Model;

class User extends Model
{

        // birthday读取器
        protected function getBirthdayAttr($birthday) {
                return date('Y-m-d', $birthday);
        }

        // birthday修改器
        protected function setBirthdayAttr($value) {
                return strtotime($value);
        }

        // 开启自动写入时间戳
        protected $autoWriteTimestamp = true;

        // 定义自动完成的属性
        protected $insert = ['status' => 1];

        // 定义关联方法
        public function profile(){
                // 用户has one档案关联
                return $this->hasOne('Profile');
        }
}