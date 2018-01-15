<?php

namespace app\index\controller;

use app\index\model\Blog as Blogs;
use think\Controller;
use think\Request;

class Blog extends Controller
{
        /**
         * 显示资源列表
         *
         * @return \think\Response
         */
        public function index ()
        {
                $list = Blogs::all();
                return json($list);
        }

        /**
         * 保存新建的资源
         *
         * @param  \think\Request $request
         * @return \think\Response
         */
        public function save (Request $request)
        {
                $data = $request->param();
                $result = Blogs::create($data);
                return json($result);
        }

        /**
         * 显示指定的资源
         *
         * @param  int $id
         * @return \think\Response
         */
        public function read ($id)
        {
                $data = Blogs::get($id);
                return json($data);
        }

        /**
         * 保存更新的资源
         *
         * @param  \think\Request $request
         * @param  int $id
         * @return \think\Response
         */
        public function update (Request $request, $id)
        {
                $data = $request->param();
                $result = Blogs::update($data, ['id' => $id]);
                return json($result);
        }

        /**
         * 删除指定资源
         *
         * @param  int $id
         * @return \think\Response
         */
        public function delete ($id)
        {
                $result = Blogs::destroy($id);
                return json($result);
        }
}
