<?php
namespace app\index\controller;

use app\common\model\Ad;
use app\common\model\Article;
use app\common\model\Cate;
use app\common\model\Dfile;
use app\common\model\Friend;
use app\common\model\SeoSet;
use think\Request;

class IndexController extends BaseController {


    public function index(Request $request) {
        return $this->fetch('');
    }

}
