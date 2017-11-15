<?php

namespace app\back\controller;
use think\Request;
use app\back\model\Base;
use app\back\model\Order;


class OrderController extends BaseController{

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request){
        $data = $request->param();
        $list_ = Order::getList($data);
        $page_str = $list_->render();
        $page_str = Base::getPageStr( $data , $page_str );
        $url = $request->url();
        return $this->fetch( 'index' , ['list_' => $list_ ,  'url' => $url ,  'page_str' => $page_str] );
    }

    /**
     * soft-delete 指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete(Request $request) {
        $data = $request->param();
        if ($this->deleteStatusById($data['id'], new Order())) {
            $this->success('删除成功', $data['url'], '', 1);
        } else {
            $this->error('删除失败', $data['url'], '', 3);
        }
    }

    /**
     * 审核订单
     * @param Request $request
     */
    public function update(Request $request){
        $data = $request->param();
        if ($this->CheckStatusById($data['id'], new Order())) {
            $this->success('审核成功', $data['url'], '', 1);
        } else {
            $this->error('审核失败', $data['url'], '', 3);
        }
    }


}