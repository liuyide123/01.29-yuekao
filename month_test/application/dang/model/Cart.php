<?php

namespace app\dang\model;

use think\Model;

class Cart extends Model
{
    //链接数据表
    protected $table="cart";
    // 设置返回数据集的对象名
    protected $resultSetType = 'collection';
    //购物车与商品的关联模型
    public function goods(){
        return $this->belongsTo("Goods","goods_id","id")->bind([
            "name",
            "img",
            "price",
        ]);
    }
}
