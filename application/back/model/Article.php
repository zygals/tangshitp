<?php

namespace app\back\model;

use think\Model;
use app\back\model\GoodAttr;

class Article extends Base {

    public function getStAttr($value) {
        $status = [0 => 'deleted', 1 => '正常', 2 => '不显示'];
        return $status[$value];
    }
    public static function getListBySchoolId($school_id){
        $row_ = self::where(['school_id'=>$school_id,'st'=>1])->find();
        if($row_){
            return true;
        }
        return false;
    }
    public static function getListByCateId($cate_article_id){
        $row_ = self::where(['cate_article_id'=>$cate_article_id,'st'=>1])->find();
        if($row_){
            return true;
        }
        return false;
    }
    public static function getList($data=[],$where=['ts_article.st' => ['<>', 0]]) {
        $order = "create_time desc";
        if (!empty($data['title'])) {
            $where['ts_article.title'] = ['like','%'.$data['title'].'%'];
        }
        if (!empty($data['paixu'])) {
            $order = 'ts_article.'.$data['paixu'] . ' asc';
        }
        if (!empty($data['paixu']) && !empty($data['sort_type'])) {
            $order ='ts_article.'.$data['paixu'] . ' desc';
        }
        $list_ = self::where($where)->order($order)->paginate(10);
        foreach($list_ as $k=>$value){
             if(mb_strlen($value->cont,"UTF8")>40){
                 $list_[$k]->cont = mb_substr($value->cont, 0, 100, 'utf-8').'...';
             }

         }
        return $list_;
    }
    //wx
    public static function getNew(){
       $list_ = self::where(['index_show'=>1,'st'=>1])->field('id,title,cont,create_time')->limit(5)->order('sort asc')->select();
        foreach($list_ as $k=>$value){
            if(mb_strlen($value->cont,"UTF8")>40){
                $list_[$k]->cont = mb_substr($value->cont, 0, 100, 'utf-8').'...';
            }

        }
       return $list_;
    }
    public static function read($id){
       return  self::getById($id,new self());
    }

}
