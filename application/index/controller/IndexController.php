<?php
namespace app\index\controller;


use app\back\model\Ad;
use app\back\model\Article;
use think\Request;

class IndexController extends BaseController {

/*
 * 取用户openid第一步：
 * */
    public function index() {
        $redirect_uri = urlencode(config('site_root') . 'index/index/reguser');
        $appid = config('appid');
        $reguser=true;
        $redirect='index2';
        return $this->fetch('', compact('redirect_uri', 'appid','reguser','redirect'));
    }
/*
 * 首页
 * */
   public function index2(){
       $ad = Ad::getList();
       $articles = Article::getList(['paixu' => 'sort']);
       $reguser=false;
       return $this->fetch('index', compact('ad', 'articles','reguser'));
   }
    /*
     * 文章详情
     *
     * * */
    public function read_article(Request $request) {
        $art_id = $request->get('art_id');
        $article = Article::read($art_id);

        return $this->fetch('', compact('article'));
    }
    /*
     * 取用户openid第二步：
     * */
    public function reguser(Request $request) {
        $code = $request->get('code');
        $redirec=$request->get('state');
        $appid = config('appid');
        $appsecret = config('appsecret');
        $ret = $this->https_request("https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code");
        $openid = $ret['openid'];
        session('user_openid',$openid);

        $f = fopen('user.txt', 'a');
        fwrite($f, $openid."\n");
        fclose($f);
        $this->redirect($redirec);
    }

    /*
     *定义菜单
     * */
    public function defineMenus() {
        $at = (new AccessToken())->getToken();
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$at";
        $data_menu2 = [
            'button' => [
                [
                    'name' => '关于我们',
                    'type' => 'click',
                    'key' => 'about_tangshi'

                ],
                [
                    'name' => '预约订餐',
                    'type' => 'view',
                    'url' => 'https://huahui.qingyy.net/tangshitp/public/index/'

                ],
            ]
        ];
//        dump(json_encode($data_menu2,JSON_UNESCAPED_UNICODE));exit;


        dump($this->https_post($url, json_encode($data_menu2, JSON_UNESCAPED_UNICODE)));
    }


}
