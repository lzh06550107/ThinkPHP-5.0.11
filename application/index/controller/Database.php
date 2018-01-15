<?php
/**
 * Created by PhpStorm.
 * User: lzh
 * Date: 2017/10/19
 * Time: 10:21
 */

namespace app\index\controller;

use think\Db;

class Database extends \think\Controller
{
        public function index ()
        {

        }

        public function create ()
        {
                $result = Db::execute('insert into think_data (id, name, status) values (5, "thinkphp", 1)');
                dump($result);
        }

        public function update ()
        {
                $result = Db::execute('update think_data set name = "framework" where id = 5 ');
                dump($result);
        }

        public function read ()
        {
                $result = Db::query('select * from think_data where id = 5 ');
                dump($result);
        }

        public function delete ()
        {
                $result = Db::execute('delete from think_data where id = 5');
                dump($result);
        }

        public function switchDatabase ()
        {
                $result = Db::connect([// 数据库类型
                        'type' => 'mysql', // 服务器地址
                        'hostname' => '127.0.0.1', // 数据库名
                        'database' => 'demo', // 数据库用户名
                        'username' => 'root', // 数据库密码
                        'password' => 'root', // 数据库连接端口
                        'hostport' => '', // 数据库连接参数
                        'params' => [], // 数据库编码默认采用utf8
                        'charset' => 'utf8', // 数据库表前缀
                        'prefix' => 'think_',])->query('select * from think_data');
                dump($result);
        }
}