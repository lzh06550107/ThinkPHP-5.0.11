<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function hello($name = 'thinkphp')
    {
        $this->assign('name', $name);
        return $this->fetch();
    }

    public function test()
    {
        $data = Db::name('data')->find();
        $this->assign('result', $data);
        return $this->fetch();
    }

    public function hello2($name = 'world', $city = '')
    {
        return 'Hello,' . $name . '! You come from ' . $city . '.';
    }

    public function hello3(Request $request, $name = 'World')
    {
        // 获取当前域名
        echo 'domain: ' . $request->domain() . '<br/>';
        // 获取当前入口文件
        echo 'file: ' . $request->baseFile() . '<br/>';
        // 获取当前URL地址 不含域名
        echo 'url: ' . $request->url() . '<br/>';
        // 获取包含域名的完整URL地址
        echo 'url with domain: ' . $request->url(true) . '<br/>';
        // 获取当前URL地址 不含QUERY_STRING
        echo 'url without query: ' . $request->baseUrl() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root:' . $request->root() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root with domain: ' . $request->root(true) . '<br/>';
        // 获取URL地址中的PATH_INFO信息
        echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
        // 获取URL地址中的PATH_INFO信息 不含后缀
        echo 'pathinfo: ' . $request->path() . '<br/>';
        // 获取URL地址中的后缀信息
        echo 'ext: ' . $request->ext() . '<br/>';
        return 'Hello,' . $name . '！';
    }

    public function hello4(Request $request, $name='World') {
        echo '模块：'.$request->module();
        echo '<br/>控制器：'.$request->controller();
        echo '<br/>操作：'.$request->action();
        echo '<br/>参数值：'.$name;
    }

    public function hello5(Request $request, $name='World') {
        echo '路由信息：';
        dump($request->routeInfo());
        echo '调度信息：';
        dump($request->dispatch());
        return 'Hello,'.$name.'!';
    }

    public function hello6() {
        $data = ['name' => 'thinkphp', 'status' => '1'];
        return json($data,201,['Cache-control'=>'no-cache,must-revalidate']);
    }

    public function hello7( $name='') {
        if('thinkphp' == $name) {
            $this->success('欢迎使用ThinkPHP5.0','hello8');
        }else {
            $this->error('错误的name','guest');
        }
    }

    public function hello8() {
        return 'Hello,ThinkPHP!';
    }

    public function guest() {
        return 'Hello,Guest!';
    }

    public function hello9($name='') {
        if('thinkphp' == $name) {
            $this ->redirect('http://thinkphp.cn');
        }else {
            $this->success('欢迎使用ThinkPHP','hello8');
        }

    }

    public function test1() {
        $requet = \request();
        dump($requet->param());
    }
}
