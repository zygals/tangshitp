<?php
namespace app\index\controller;


use think\Request;
use app\index\model\Shop;
class YuyueController extends BaseController {

    /**
     * 预约页展示
     * @param Request $request
     * @return mixed
     */
    public function index() {
        $list_ = Shop::getShop();
        $start_time = $list_[0]['start_time'];
        $end_time = $list_[0]['end_time'];
        $a = explode(':',$start_time);
        $b = explode(':',$end_time);
        $c = $a[0];//前台起始预约时间
        $d = $b[0];//前台结束预约时间
        return $this->fetch('',['list_'=>$list_,'act'=>'dingdan/create','c'=>$c,'d'=>$d,'e'=>$c,'f'=>$d]);
    }

    /**
     * ajax
     */
    public function ajax(Request $request){
        $data = $request->param();
        $shop_id = $data['shop_id'];
        $shop = new Shop;
        $res = $shop->where('id',$shop_id)->find();
        return $res;
    }



    

}
