<?php
/**
 * Created by PhpStorm.
 * User: lzh
 * Date: 2017/10/19
 * Time: 22:36
 */

namespace app\index\model;


use think\Model;

class Blog extends Model
{
        protected $autoWriteTimestamp = true;
        protected $insert = ['status' => 1,];

        protected $field = [
                'id' => 'int',
                'create_time' => 'int',
                'update_time' => 'int',
                'name','title','content',
        ];
}