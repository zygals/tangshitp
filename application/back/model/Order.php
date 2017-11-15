<?php

namespace app\back\model;

use think\Model;

class Order extends Base{

    public function getStatusAttr($value) {
        $status = [0 => 'deleted', 1 => '未审核',2=>'已审核',3=>'用户删除'];
        return $status[$value];
    }
    public static $arrStatus = [1 => '未审核' , 2 => '已审核'];

    public static function getList($data=[],$where=['ts_order.status' => ['<>',0]]){
        $order = "create_time desc";
        $field = 'ts_order.*,ts_shop.name shop_name';
        $time_from = isset( $data['time_from'] ) ? $data['time_from'] : '';
        $time_to = isset( $data['time_to'] ) ? $data['time_from'] : '';
        if ( !empty( $time_from ) ) {
            $where['ts_order.create_time'] = ['gt' , strtotime( $time_from )];
        }
        if ( !empty( $time_to ) ) {
            $where['ts_order.create_time'] = ['lt' , strtotime( $time_to )];
        }
        if ( !empty( $time_to ) && !empty( $time_from ) ) {
            $where['ts_order.create_time'] = [['gt' , strtotime( $time_from )] , ['lt' , strtotime( $time_to )]];
        }
        if ( !empty( $data['code'] ) ) {
            $where['ts_order.code'] = ['like','%'.$data['code'].'%'];
        }
        if ( !empty( $data['status'] ) ) {
            $where['ts_order.status'] = $data['status'];
        }
        if ( !empty( $data['paixu'] ) ) {
            $order = $data['paixu'] . ' asc';
        }
        if ( !empty( $data['paixu'] ) && !empty( $data['sort_type'] ) ) {
            $order = $data['paixu'] . ' desc';
        }
        $list_ = self::where($where)->join('ts_shop','ts_shop.id=ts_order.shop_id')->field($field)->order($order)->paginate(10);
        return $list_;
    }
    /*
     * 前台的订单列表
     * zyg
     * * */
    public static function myOrders($openid){
        $where=['ts_order.status'=>['in','1,2'],'ts_order.openid'=>$openid];
        $field = 'ts_order.*,ts_shop.name shop_name';
        $order = "create_time desc";
        $list_ = self::where($where)->join('ts_shop','ts_shop.id=ts_order.shop_id','left')->field($field)->order($order)->select();
        return $list_;
    }
}