
<link rel="stylesheet" href="__PUBLIC__css/calendar.min.css">

<div class="reserve-wrap">
    <img src="__PUBLIC__home/img/order-pic.jpg" alt="">
    <div class="reserve-info">
        <?php if(!$list_->isEmpty()){?>
        <div class="reserve-list">
            <p class="reserve-left">店　　铺 : </p>
            <select class="reserve-right" id="changeShop">
                    <?php foreach($list_ as $row){?>
                    <option value="{$row->id}">{$row->name}</option>
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
        <?php }?>

    </div>
    <div class="reserve-order">
        <h3 class="reserve-order-title">填写订单信息</h3>
        <form action="{:url($act)}" method="post" id="formSbt">
        <div class="reserve-order-list-wrap">
            <div class="reserve-order-list">
                <input type="hidden" value="{$list_[0]->id}" name="shop_id" id="shop_id">
                <p class="reserve-order-left">姓　　名 :</p>
                <input type="text" class="reserve-order-right" name="name" value="" id="name"/>
            </div>
            <div class="reserve-order-list">
                <p class="reserve-order-left">电　　话 :</p>
                <input type="text" class="reserve-order-right" name="mobile" value="" id="mobile" />
            </div>
            <div class="reserve-order-list">
                <p class="reserve-order-left">预约人数 :</p>
                <input type="number" class="reserve-order-right" name="reservation" value="" id="reservation"/>
            </div>
            <div class="reserve-order-list">
                <p class="reserve-order-left">预约时间 :</p>
                <input type="text" class="calendars" hours hours-past name="preset_time" placeholder="选择日期时间" style="border: 0;outline: none; font-size:0.16rem; width:80%; ">
            </div>
        </div>
            <input type="submit" value="提交申请" class="submit-reserve">
        </form>
    </div>
</div>

<script>
    $(function () {
        $('#changeShop').change(function () {
            $.ajax({
                url: '{:url("ajax")}',
                type: 'post',
                data: {'shop_id': $(this).val()},
                success: function (data) {
                    var a = '<div class="reserve-list"><p class="reserve-left">地　　址 : </p><p class="reserve-right">' + data.address + '</p> </div> <div class="reserve-list"> <p class="reserve-left">电　　话 : </p> <p class="reserve-right">' + data.phone + '</p> </div> <div class="reserve-list"> <p class="reserve-left">营业时间 : </p> <p class="reserve-right">' + data.start_time + '--' + data.end_time + '</p> </div>';
                    $('#shop').html(a);
                    var sid = $('#changeShop option:selected').attr('value');
                    $('#shop_id').val(sid);
                }
            })
        })
             $('#formSbt').submit(function(e) {
                 check(e);
             })
            function check(e) {
            var phoneReg = /^1[3|4|5|7|8][0-9]\d{8}$/;
            var preg = phoneReg.test($('#mobile').val());
            if ($('#mobile').val() == '') {
                alert('请输入电话号!');
                e.preventDefault();
            } else if (!preg) {
                alert('手机号格式不正确!');
                e.preventDefault();
            } else if ($('#name').val() == '') {
                alert('请输入预约人姓名');
                e.preventDefault();
            } else if ($('#reservation').val() == '') {
                alert('请输入预约人数!');
                e.preventDefault();
            }else{
                return true;
            }
        }
    })


</script>
<script src="__PUBLIC__js/calendar.min.js"></script>
