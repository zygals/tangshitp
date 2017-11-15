<?php
namespace app\index\controller;


use app\back\model\Order;
use think\Request;
use app\back\model\Shop;
use app\back\model\Setting;

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

    /**
     * 用户提交订单
     */
    public function create(Request $request){
        $data = $request->param();
        $data['preset_time'] = $data['month'].'月'.$data['day'].'日'.$data['hour1'].'时--'.$data['hour2'].'时';
        unset($data['month']);
        unset($data['day']);
        unset($data['hour1']);
        unset($data['hour2']);
        $data['code'] = time().rand(1000,9999);
        $data['openid'] = session('user_openid');
        $order = new Order;
        $res = $order->save($data);
        //获取用户订的店铺名
        $shop = new Shop;
        $shop_name = $shop->where('id',$data['shop_id'])->field('name shop_name')->find();
        //获取二维码
        $setting = new Setting();
        $qr_code = $setting->find();
        if($res){
            return $this->fetch('index',['data'=>$data,'shop_name'=>$shop_name,'qr_code'=>$qr_code]);
        }else{
            return $this->error('申请预约失败');
        }
    }


}
