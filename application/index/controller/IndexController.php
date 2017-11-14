<?php
namespace app\index\controller;


use think\Request;

class IndexController extends BaseController {


    public function index(Request $request) {

        return $this->fetch('');
    }
    public function read_article(){

        return $this->fetch('');
    }

    /*
     *定义菜单
     * */
    public function defineMenus() {
        $at = (new AccessToken())->getToken();
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$at";
        $data_menu2=[
            'button'=>[
                [
                    'name'=>'关于我们',
                    'type'=>'click',
                    'key'=>'about_tangshi'

                ],
                [
                    'name'=>'预约订餐',
                    'type'=>'view',
                    'url'=>'https://huahui.qingyy.net/tangshitp/public/index/'

                ],
            ]
        ];
//        dump(json_encode($data_menu2,JSON_UNESCAPED_UNICODE));exit;


        dump($this->https_post($url, json_encode($data_menu2,JSON_UNESCAPED_UNICODE)));
    }



}
