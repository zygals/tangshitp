<?php

namespace app\back\controller;


use app\back\model\Ad;
use app\back\model\Base;
use think\Request;


class AdController extends BaseController {
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index() {
        $list_ = Ad::getList();
        if(!$list_){
            return $this->fetch('index', ['title'=>'添加广告图','act'=>'save']);
        }else{
            return $this->fetch('edit', ['title'=>'管理广告图','act'=>'update','list_'=>$list_]);
        }
    }
    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request) {
        $data = $request->param();
        $file = $request->file('img');
        if (empty($file)) {
            $this->error('请上传图片或检查图片大小！');
        }
        $size = $file->getSize();
        if ($size > config('upload_size')) {
            $this->error('图片大小超过限定！');
        }
        $path_name = 'ad';
        $arr = $this->dealImg($file, $path_name);
        $data['img'] = $arr['save_url_path'];
        //url_to
        $Ad = new Ad();
        $Ad->save($data);
        $this->success('添加成功', 'index', '', 1);
    }
    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request) {
        //dump($request->param());exit;
        $data = $request->param();
        $file = $request->file('img');
        $row_ = $this->findById(1, new Ad());
        if (!empty($file)) {
            $path_name = 'ad';
            $size = $file->getSize();
            if ($size > config('upload_size')) {
                $this->error('图片大小超过限定！');
            }
            $this->deleteImg($row_->img);
            $arr = $this->dealImg($file, $path_name);
            $data['img'] = $arr['save_url_path'];
        }
        if ($this->saveById(1, new Ad(), $data)) {
            $this->success('编辑成功', 'index', '', 1);
        } else {
            $this->error('没有修改', 'index', 1);
        }
    }


    /**
     * soft-delete 指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete(Request $request) {
        $data = $request->param();
        if ($this->deleteStatusById($data['id'], new Ad())) {
            $this->success('删除成功', $data['url'], '', 1);
        } else {
            $this->error('删除失败', $data['url'], '', 3);
        }
    }


}
