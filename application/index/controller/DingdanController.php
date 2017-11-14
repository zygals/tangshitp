<?php
namespace app\index\controller;


use think\Request;

class DingdanController extends BaseController {


    public function index(Request $request) {

        return $this->fetch('');
    }

  public function finish(){
      return $this->fetch('');
  }
  public function check_order(){
      return $this->fetch('');
  }


    

}
