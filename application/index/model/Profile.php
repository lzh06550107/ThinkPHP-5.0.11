<?php
/**
 * Created by PhpStorm.
 * User: lzh
 * Date: 2017/10/19
 * Time: 16:53
 */

namespace app\index\model;

use think\Model;

class Profile extends Model
{
        protected $type = [
                'birthday' => 'timestamp:Y-m-d',
        ];

        public function user() {
                // 档案belongs to 关联用户
                return $this->belongsTo('User');
        }
}