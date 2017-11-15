<?php

namespace app\back\model;

use think\Model;

class Setting extends Base {


    public static function findSets() {

        $row_= self::where('id',1)->find();
        return $row_;

    }

    public static function getMinBenefit(){
        $minBenefit = self::find();
        return $minBenefit['withdraw_limit'];
    }

    public static function  getSet(){
        $list = self::where('')->order('create_time asc')->find();
        return $list;
    }


}
