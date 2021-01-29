<?php

namespace app\dang\controller;

use think\Controller;
use think\Request;

class Details extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($id)
    {
        //验证数据
        if (!is_numeric($id) || $id<=0){
            $this->error("数据参数不正确");
        }
        //验证成功 查询数据
        $data = model("Goods")->where("id",$id)->find()->toArray();
        //相关服务 同分类下的10件热销
        $hot = model("goods")->where("type_id",$data["type_id"])->select()->toArray();
        //渲染详情页面
        return view("index",["sel"=>$data,"hot"=>$hot]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
