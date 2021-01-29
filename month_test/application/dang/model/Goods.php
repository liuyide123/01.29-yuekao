<?php

namespace app\dang\model;

use think\Model;

class Goods extends Model
{
    //链接数据表
    protected $table="goods";
    // 设置返回数据集的对象名
    protected $resultSetType = 'collection';
}
