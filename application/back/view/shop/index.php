{extend name='layout:base' /}
{block name="title"}商户列表{/block}
{block name="content"}
<style>
    .pagination li.disabled > a, .pagination li.disabled > span {
        color: inherit;
    }

    .pagination li > a, .pagination li > span {
        color: inherit
    }
</style>
<script>

</script>
<div role="tabpanel" class="tab-pane" id="user" style="display:block;">
    <div class="check-div form-inline row">
        <div class="col-xs-2">
            <a href="{:url('create')}">
                <button class="btn btn-yellow btn-xs" data-toggle="modal" data-target="#addUser" id="create">添加商户
                </button>
            </a>
        </div>
        <div class="col-xs-10">

        </div>
    </div>
    <div class="data-div">
        <div class="row tableHeader">
            <div class="col-xs-1 ">
                编 号
            </div>
            <div class="col-xs-1 ">
                店铺名称
            </div>
            <div class="col-xs-1 ">
                联系电话
            </div>
            <div class="col-xs-1">
                地址
            </div>
            <div class="col-xs-2">
                营业时间
            </div>
            <div class="col-xs-1">
                可容纳人数
            </div>
            <div class="col-xs-1">
                店铺展示图
            </div>
            <div class="col-xs-">
                操 作
            </div>
        </div>
        <div class="tablebody">
            <?php if (count($list_) > 0) { ?>
                <?php foreach ($list_ as $key => $row_) { ?>
                    <div class="row cont_nowrap">
                        <div class="col-xs-1 ">
                            {$row_->id}
                        </div>
                        <div class="col-xs-1 " title="{$row_->name}">
                            {$row_->name}
                        </div>
                        <div class="col-xs-1 " title="{$row_->phone}">
                            {$row_->phone}
                        </div>
                        <div class="col-xs-1 ">
                            {$row_->address}
                        </div>
                        <div class="col-xs-2 ">
                            {$row_->start_time}--{$row_->end_time}
                        </div>
                        <div class="col-xs-1 ">
                            {$row_->galleryful}
                        </div>
                        <div class="col-xs-1">
                            <a href="__IMGURL__{$row_->img}" target="_blank">
                                <img src="__IMGURL__{$row_->img}" height="55" alt="没有">
                            </a>
                        </div>
                        <div class="col-xs-">
                            <a href="{:url('edit')}?id={$row_->id}">
                                <button class="btn btn-success btn-xs edit_" title="修改商户">改</button>
                            </a>
                                <button class="btn btn-danger btn-xs del_cate" data-toggle="modal"
                                        data-target="#deleteSource" data-id="<?= $row_['id'] ?>" onclick="del_(this)"> 删
                                </button>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="row">
                    <div class="col-xs-12 ">
                        <h3 class="" align="center" style="color:red;font-size:18px">结果不存在</h3>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>

    <!--页码块-->
    <footer class="footer">
        {$page_str}
    </footer>


    <!--弹出删除用户警告窗口-->
    <div class="modal fade" id="deleteSource" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">提示</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        确定删除店铺数据吗？
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{:url('delete')}" method="post">
                        <input type="hidden" name="id" value="" id="del_id">
                        <input type="hidden" name="url" value="{$url}">
                        <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">取 消</button>
                        <button type="submit" class="btn  btn-xs btn-danger">确 定</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<script>

    function del_(obj) {
        var id = $(obj).attr('data-id');
        $('#del_id').val(id);
    }

</script>

{/block}