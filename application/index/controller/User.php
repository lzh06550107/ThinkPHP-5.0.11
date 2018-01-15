<?php
/**
 * Created by PhpStorm.
 * User: lzh
 * Date: 2017/10/19
 * Time: 12:09
 */

namespace app\index\controller;

use app\index\model\Profile;
use app\index\model\User as UserModel;

class User
{
        //  新增用户数据
        public function add () {
                $user = new UserModel;
                $user->name = 'thinkphp';
                $user->password = '123456';
                $user->nickname = '流年';
               if ($user->save()) {
                       // 写入关联数据
                       $profile = new Profile();
                       $profile->truename = '刘晨';
                       $profile->birthday = '1977-03-05';
                       $profile->address = '中国上海';
                       $profile->email = 'thinkphp@qq.com';
                       $user->profile()->save($profile);
                       return '用户新增成功';
               } else {
                       return $user->getError();
               }

        }

        public function add1() {
                $user['nickname'] = '看云';
                $user['email'] = 'kancloud@qq.com';
                $user['birthday'] = strtotime('2015-04-02');
                if($result = UserModel::create($user)) {
                        return '用户[ '. $result->nickname. ':'. $result->id. ' ]新增成功';
                }else {
                        return '新增出错';
                }
        }

        public function add2() {
                $user = new UserModel();
                $user->nickname = '流年';
                $user->email = 'thinkphp@qq.com';
                $user->birthday = '1977-03-05';
                if($user->save()) {
                        return '用户[ '. $user->nickname. ':'. $user->id. ' ] 新增成功';
                }else {
                        return $user->getError();
                }
        }

        //  批量新增
        public function addList() {
                $user = new UserModel;
                // 二维数组的初始化？？
                $list = [
                        ['nickname' => '张三', 'email' => 'zhangsan@qq.com', 'birthday' => strtotime('1988-01-15')],
                        ['nickname' => '李四', 'email' => 'lisi@qq.com', 'birthday' => strtotime('1990-09-19')],
                ];
                if ($user->saveAll($list)) {
                        return '用户批量新增成功';
                }else {
                        return $user->getError();
                }
        }

        // 查询数据
        public function read ($id = '') {
                $user = UserModel::get($id);
               echo $user->name. '<br/>';
               echo $user->nickname. '<br/>';
               echo $user->profile->truename. '<br/>';
               echo $user->profile->email.'<br/>';
        }

        public function read1() {
                $user = UserModel::getByEmail('thinkphp@qq.com');
                echo $user->nickname.'<br/>';
                echo $user->email.'<br/>';
                echo date('Y/m/d', $user->birthday). '<br/>';
        }

        public function read2() {
                $user = UserModel::get(['nickname'=>'流年']);
                echo $user->nickname.'<br/>';
                echo $user->email.'<br/>';
                echo date('Y/m/d', $user->birthday). '<br/>';
        }

        public function read3() {
                $user = UserModel::where('nickname','流年')->find();
                echo $user->nickname. '<br/>';
                echo $user->email.'<br/>';
                echo date('Y/m/d', $user->birthday).'<br/>';
        }

        public function read4($id = '') {
                $user = UserModel::get($id);
                echo $user->nickname. '<br/>';
                echo $user->email.'<br/>';
                echo $user->birthday.'<br/>';
        }

        public function all() {
                $list = UserModel::all();
                foreach ($list as $user) {
                        echo $user->nickname.'<br/>';
                        echo $user->email.'<br/>';
                        echo date('Y/m/d', $user->birthday).'<br/>';
                        echo '------------------------------<br/>';
                }
        }

        // 更新数据
        public function update($id) {
                $user = UserModel::get($id);
                $user->nickname= '刘晨';
                $user->email = 'liu21st@gmail.com';
                if(false !== $user->save()) {
                        return '更新用户成功';
                } else {
                        return $user->getError();
                }
        }

        public function update1($id) {
                $user['id'] = (int)$id;
                $user['nickname'] = '刘晨';
                $user['email'] = 'liu21st@gmail.com';
                $result = UserModel::update($user);
                return '更新用户成功';
        }

        // 删除用户数据
        public function delete($id) {
                $user = UserModel::get($id);
                if($user) {
                        $user->delete();
                        return '删除用户成功';
                } else {
                        return '删除的用户不存在';
                }
        }

        // 创建用户数据页面
        public function create() {
                return view();
        }
}