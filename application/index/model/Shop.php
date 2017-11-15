<?php
namespace app\index\model;

use think\Model;

class Shop extends Base{
    public function getStatusAttr($value) {
        $status = [0 => 'deleted', 1 => '正常'];
        return $status[$value];
    }
    /**
     * 获取店铺的ID名称和图片
     */
    public static function getShop(){
        $row = self::where('status','1')->order('create_time asc')->select();
        return $row;
    }

}