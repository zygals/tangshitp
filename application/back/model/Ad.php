<?php

namespace app\back\model;

use think\Model;

class Ad extends Base {

    public static function getList() {
        $list_ = self::find();
        return $list_;
    }


}
