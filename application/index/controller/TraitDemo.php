<?php
/**
 * Created by PhpStorm.
 * User: lzh
 * Date: 2017/11/1
 * Time: 16:15
 */

namespace app\index\controller;


use think\Controller;


class TraitDemo extends Controller
{
        use \traits\controller\Jump;

        public function index() {

        }

        public function format1() {
                $data = ['name' => 'thinkphp', 'url'=>'thinkphp.cn'];
                return ['data'=>$data, 'code'=>1, 'message'=> '操作完成'];
        }

        public function format2() {
                $data = ['name' => 'thinkphp', 'url'=>'thinkphp.cn'];
                return json(['data'=>$data, 'code'=>1, 'message'=>'操作完成']);
        }

        public function format3() {
                $data = ['name' => 'thinkphp', 'url'=>'thinkphp.cn'];
                return xml(['data'=>$data, 'code'=>1, 'message'=>'操作完成']);
        }

        protected $beforeActionList = [
                'first',
                'second' => ['except'=>'hello'],
                'three' => ['only'=>'hello,data']
        ];

        protected function first() {
                echo 'first<br/>';
        }

        protected function second() {
                echo 'second<br/>';
        }

        protected function three() {
                echo 'three<br/>';
        }

        public function hello() {
                return 'hello';
        }

        public function data() {
                return 'data';
        }

        public function _empty($name) {
                return $this->showCity($name);
        }

        protected function showCity($name) {
                return '当前城市:'. $name;
        }

}