<?php

namespace app\dang\controller;

use think\Controller;
use think\Request;

class Cart extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //默认用户为1
        $uid = 1;
        $sel = model("Cart")->with("goods")->where("uid",$uid)->select();
        return view("index",["sel"=>$sel]);
    }
}
