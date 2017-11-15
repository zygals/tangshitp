<link rel="stylesheet" href="__PUBLIC__home/css/weui.min.css">
<div class="reserve-wrap">
    <img src="__PUBLIC__home/img/order-pic.jpg" alt="">
    <div class="reserve-info">
        <div class="reserve-list">
            <p class="reserve-left">店　　铺 : </p>
            <select class="reserve-right" id="changeShop">
                <?php if(!$list_->isEmpty()){?>
                    <?php foreach($list_ as $row){?>
                    <option value="{$row->id}">{$row->name}</option>
                    <?php }?>
                <?php }?>
            </select>
        </div>
            <div id="shop">
                <div class="reserve-list">
                    <p class="reserve-left">地　　址 : </p>
                    <p class="reserve-right">{$list_[0]->address}</p>
                </div>
                <div class="reserve-list">
                    <p class="reserve-left">电　　话 : </p>
                    <p class="reserve-right">{$list_[0]->phone}</p>
                </div>
                <div class="reserve-list">
                    <p class="reserve-left">营业时间 : </p>
                    <p class="reserve-right">{$list_[0]->start_time}--{$list_[0]->end_time}</p>
                </div>
            </div>
    </div>
    <div class="reserve-order">
        <h3 class="reserve-order-title">填写订单信息</h3>
        <div class="reserve-order-list-wrap">
            <div class="reserve-order-list">
                <input type="hidden" value="" id="shop_id">
                <p class="reserve-order-left">姓　　名 :</p>
                <input type="text" class="reserve-order-right" name="name" value="" />
            </div>
            <div class="reserve-order-list">
                <p class="reserve-order-left">电　　话 :</p>
                <input type="text" class="reserve-order-right" name="mobile" value="" />
            </div>
            <div class="reserve-order-list">
                <p class="reserve-order-left">预约人数 :</p>
                <input type="number" class="reserve-order-right" name="renshu" value="" />
            </div>
            <div class="reserve-order-list">
                <p class="reserve-order-left">预约时间 :</p>
                <div class="reserve-order-right">
<!--                    <input type="text" value="2017" > 年-->
                    <select>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select> 月
                    <select>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select> 日
                    <select>
                        <option value="9-12">9-12</option>
                        <option value="12-14">12-14</option>
                        <option value="16-18">16-18</option>
                        <option value="20-22">20-22</option>
                    </select> 时
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{:url('dingdan/index')}" class="submit-reserve">提交申请</a>
<script>
    $(function () {
    $('#changeShop').change(function(){
        $.ajax({
            url:'{:url("ajax")}',
            type:'post',
            data : {'shop_id':$(this).val()},
            success:function(data){
                    a = '<div class="reserve-list"><p class="reserve-left">地　　址 : </p><p class="reserve-right">'+data.address+'</p> </div> <div class="reserve-list"> <p class="reserve-left">电　　话 : </p> <p class="reserve-right">'+data.phone+'</p> </div> <div class="reserve-list"> <p class="reserve-left">营业时间 : </p> <p class="reserve-right">'+data.start_time+'--'+data.end_time+'</p> </div>';
                    $('#shop').html(a);
            }
        });
    })
        var sid = $('#changeShop option:selected').attr('value');
        $('#shop_id').val(sid);
    });
</script>
