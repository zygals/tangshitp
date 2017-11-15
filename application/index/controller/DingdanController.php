<?php
namespace app\index\controller;


use app\back\model\Order;
use think\Request;

class DingdanController extends BaseController {


    public function index(Request $request) {

        return $this->fetch('');
    }

    public function finish() {
        return $this->fetch('');
    }

    public function check_order() {
        return $this->fetch('');
    }

    /*
     *  用户删除订单
     *  * */
    public function del_myorder(Request $request) {
        $order_id = $request->post('order_id');
        $order = Order::getById($order_id, new Order(),'id',['status'=>['in','1,2']]);
        if (!$order) {
            return json(['code' => __LINE__, 'msg' => '订单不存在']);
        }
        $order->status=3;//del by user
        if($order->save()){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>__LINE__,'msg'=>'删除失败']);
        }
    }


}
