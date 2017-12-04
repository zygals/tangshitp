<?php
namespace app\index\controller;


use app\back\model\Ad;
use app\back\model\Article;
use app\back\model\Order;
use app\back\model\Setting;
use think\Request;

class IndexController extends BaseController {

    /*
     * 首页
     * */
    public function index2() {
        $ad = Ad::getList();
        $articles = Article::getList(['paixu' => 'sort']);
        $reguser = false;
        return $this->fetch('index', compact('ad', 'articles', 'reguser'));
    }

    /*
   * 查看我的订单列表第一步
   *
   * * */
    public function my_orders1() {
        if(!empty(session('user_openid'))){
           $this->redirect('my_orders2');
        }
        $redirect_uri = urlencode(config('site_root') . 'index/index/reguser');
        $appid = config('appid');
        $reguser = true;
        $redirect = 'my_orders2';
        return $this->fetch('index', compact('redirect_uri', 'appid', 'reguser', 'redirect'));

    }

    /*
   * 查看我的订单列表第二步
   *
   * * */
    public function my_orders2(Request $request) {
        $orders = Order::myOrders(session('user_openid'));
        $setting = Setting::findSets();
        return $this->fetch('my_orders2', compact('orders', 'setting'));
    }

    /*
     * 文章详情
     *
     * * */
    public function read_article(Request $request) {
        echo session('name');
        $art_id = $request->get('art_id');
        $article = Article::read($art_id);

        return $this->fetch('', compact('article'));
    }

    /*
     * 取用户openid第一步：
     * */
    public function index() {
        $redirect_uri = urlencode(config('site_root') . 'index/index/reguser');
        $appid = config('appid');
        $reguser = true;
        $redirect = 'index2';
        return $this->fetch('', compact('redirect_uri', 'appid', 'reguser', 'redirect'));
    }

    /*
     * 取用户openid第二步：
     * */
    public function reguser(Request $request) {
        $code = $request->get('code');
        $redirec = $request->get('state');
        $appid = config('appid');
        $appsecret = config('appsecret');
        $ret = $this->https_request("https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code");
        $openid = $ret['openid'];
        session('user_openid', $openid);
//        $f = fopen('user.txt', 'a');
//        fwrite($f, $openid . "\n");
//        fclose($f);
        $this->redirect($redirec);
    }

    /*
     *定义菜单
     * */
    public function defineMenus() {
        $at = (new AccessToken())->getToken();
//        $url = "https://huahui.qingyy.net/tangshitp/public/index/index/";
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$at";
        $data_menu2 = [
            'button' => [
                [
                    'name' => '关于我们',
                    'type' => 'view',
                    'url' => 'https://huahui.qingyy.net/tangshitp/public/index/index/read_article?art_id=1'

                ],
                [

                    'name' => '怀石文化',
                    'type' => 'view',
                    'url' => 'https://huahui.qingyy.net/tangshitp/public/index/index/read_article?art_id=2'
],

                [
                    'name' => '预约',
                    'sub_button'=>[
                        [
                            'name' => '线上预约',
                            'type' => 'view',
                            'url' => 'https://huahui.qingyy.net/tangshitp/public/index/'
                        ],
                        [
                            'name' => '查看预约',
                            'type' => 'view',
                            'url' => 'https://huahui.qingyy.net/tangshitp/public/index/index/my_orders1'
                        ],
                    ],


                ],
            ]
        ];

        dump($this->https_post($url, json_encode($data_menu2, JSON_UNESCAPED_UNICODE)));
    }

    /*
     * 页面卸载时删除
     * */
    public function delSession() {
        session('user_openid', null);
    }

}
