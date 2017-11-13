<?php

namespace app\back\model;
use think\Model;

class AdminLog extends model{
	public static function getLogs(){
        $admin_id=session('admin_tangs')->id;
        $list_ = self::where(['admin_id'=>$admin_id])->alias('al')->order('create_time desc')->join('admin','al.admin_id=admin.id')->field('admin.name admin_name,times,al.*')->paginate();
        return $list_;
    }
    public function addLog($admin_id,$ip){
        $data = [
            'admin_id'=>$admin_id,
            'ip'=>$ip,
        ];
        return $this->save($data);
    }
}
