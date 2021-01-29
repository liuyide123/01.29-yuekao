<?php

namespace app\dang\controller;

use think\Controller;
use think\Request;

class Cartdetails extends Controller
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
        //默认购买量为1
        $number = 1;
        //验证成功 查询数据
        $data = model("Goods")->where("id",$id)->find();

        //默认用户为1
        $uid = 1;
        //查询购物车有无此用户的商品
        $sel = model("Cart")->where("goods_id",$id)->where("uid",$uid)->find();
        if ($sel){
            //如果有则修改
            $ins = model("Cart")
                ->where("goods_id",$id)
                ->where("uid",$uid)
                ->update(['number' => $number+$sel["number"]]);
        }else{
            //如果没有则添加
            $dat["goods_id"] =$id;
            $dat["number"] =$number;
            $ins = model("Cart")->save($dat);
        }
        if ($ins){
            //渲染加入购物车成功提醒页面
            return view("index",["sel"=>$data]);
        } else {
            $this->error("系统繁忙强稍后");
        }


    }
    /**
     *
     *
     */
    public function collect($id){
        //验证数据
        if (!is_numeric($id) || $id<=0){
            $this->error("数据参数不正确");
        }
        //验证成功 查询数据
        $data = model("Goods")->where("id",$id)->find();
        if ($data["number"]<10){
            return "商品不多了，如果喜欢记得及时购买!";
        }
    }
}
