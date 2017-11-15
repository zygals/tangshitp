{extend name='layout:base' /}
{block name="title"}{$title}{/block}
{block name="content"}
<style>
    .control-label{
        padding-right:10px;
    }
</style>
	<!--弹出添加用户窗口-->
<form id="addForm" class="form-horizontal" action="{:url($act)}" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="{$row_->id}">
    <input type="hidden" name="referer" value="{$referer}">
		<div class="row" >
			<div class="col-xs-8">
				<div class="text-center">
					<h4 class="modal-title" id="gridSystemModalLabel">{$title}</h4>
				</div>
                <div class="">
                    <div class="container-fluid" id="fields_div">
                        <div class="form-group">
                            <label for="sKnot" class="col-xs-3 control-label"><span style="color:red;">*&nbsp;&nbsp;</span>商户名称：</label>
                            <div class="col-xs-8">
                                <input type="text" class="form-control input-sm duiqi" name='name' value="{$row_->name}" id="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sKnot" class="col-xs-3 control-label"><span style="color:red;">*&nbsp;&nbsp;</span>商户地址：</label>
                            <div class="col-xs-8">
                                <input type="text" class="form-control input-sm duiqi" name='address' value="{$row_->address}" id="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sKnot" class="col-xs-3 control-label"><span style="color:red;">*&nbsp;&nbsp;</span>联系电话：</label>
                            <div class="col-xs-8">
                                <input type="text" class="form-control input-sm duiqi" name='phone' value="{$row_->phone}" id="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sKnot" class="col-xs-3 control-label"><span style="color:red;">*&nbsp;&nbsp;</span>开业时间：</label>
                            <div class="col-xs-8">
                                <input type="text" class="form-control input-sm duiqi" name='start_time' value="{$row_->start_time}" id="" placeholder="如9:20:00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sKnot" class="col-xs-3 control-label"><span style="color:red;">*&nbsp;&nbsp;</span>歇业时间：</label>
                            <div class="col-xs-8">
                                <input type="text" class="form-control input-sm duiqi" name='end_time' value="{$row_->end_time}" id="" placeholder="如22:20:00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sKnot" class="col-xs-3 control-label"><span style="color:red;">*&nbsp;&nbsp;</span>可容纳人数：</label>
                            <div class="col-xs-8">
                                <input type="text" class="form-control input-sm duiqi" name='galleryful' value="{$row_->galleryful}" id="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sKnot" class="col-xs-3 control-label"><span style="color:red;">*&nbsp;&nbsp;</span>店铺展示图：</label>
                            <div class="col-xs-8 ">
                                <img src="__IMGURL__{$row_->img}" alt="没有上传图片" width="88"/>
                                <input type="file" title='' class="form-control  duiqi" id="sOrd" name="img" placeholder=""><span style="color:red">尺寸要求（270*270），大小不超过<?php echo floor(config('upload_size')/1024/1024);?>M。</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="javascript:history.back()">
                            <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">返回</button>
                        </a>
                        <button type="submit" class="btn btn-xs btn-green">修 改</button>
                    </div>
                </div>
</form>

<script>
    $('#more_addr').click(function () {
       // alert()
        var str = $('.address_wrap').last().clone();
        $('#fields_div').append(str);
    });
    $('#minus_addr').click(function () {
        if( $('.address_wrap').length==1){
            return;
        }
        $('.address_wrap').last().remove();
    });

      $(function () {

        $('form').bootstrapValidator({
            fields: {
                name: {
                    validators:
                        {
                            notEmpty: {
                                message: '名称不能为空'
                            }
                        }

                },
                phone: {
                    validators:
                        {
                            notEmpty: {
                                message: '不能为空'
                            }
                        }

                },
                address: {
                    validators: {
                        notEmpty: {
                            message: '不能为空'
                        }


                    }
                },
                start_time: {
                    validators: {
                        notEmpty: {
                            message: '不能为空'
                        }


                    }
                },
                end_time: {
                    validators: {
                        notEmpty: {
                            message: '不能为空'
                        }


                    }
                },
                galleryful: {
                    validators: {
                        notEmpty: {
                            message: '不能为空'
                        }
                    }
                },
            }
        });

    });

</script>

{/block}
