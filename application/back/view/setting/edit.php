{extend name='layout:base' /}
{block name="title"}网站设置{/block}

{block name="content"}
<style>
    .control-label {
        padding-right: 10px;
    }
</style>

<!--弹出添加用户窗口-->
<form class="form-horizontal" action="{:url($act)}" method="post" enctype="multipart/form-data">


    <div class="row">
        <div class="col-xs-8">
            <div class="text-center">
                <h4 class="modal-title" id="gridSystemModalLabel">平台设置</h4>
            </div>
            <div class="">
                <div class="container-fluid">

                    <div class="form-group ">
                        <label for="sName" class="col-xs-5 control-label">订单列表页上面图：</label>
                        <div class="col-xs-7 ">
                            <img src="__IMGURL__{$list->img|default=''}" alt="订单列表页上面图" width="188"/>
                            <input type="file" title='' class="form-control  duiqi" id="sOrd" name="img" placeholder=""><span style="color:red">尺寸要求（750*350），大小不超过<?php echo floor(config('upload_size')/1024/1024);?>M。</span>

                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="sName" class="col-xs-5 control-label">收款二维码：</label>
                        <div class="col-xs-7 ">
                            <img src="__IMGURL__{$list->qr_code|default=''}" alt="订单列表页上面图" width="188"/>
                            <input type="file" title='' class="form-control  duiqi" id="sOrd" name="qr_code" placeholder=""><span style="color:red">尺寸要求（750*350），大小不超过<?php echo floor(config('upload_size')/1024/1024);?>M。</span>

                        </div>
                    </div>

                    <div class="text-center">
                        <button type="reset" class="btn btn-xs btn-white" data-dismiss="modal">取消</button>
                        <button type="submit" cla="btn btn-xs btn-green">修  改</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>

<script>

</script>

{/block}
