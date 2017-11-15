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
        return $this->fetch('',['list_'=>$list_]);
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
