<div class="finish-wrap">
    <div class="finish-banner">
        <?php if($setting){?>
            <img src="__IMGURL__{$setting->img}" alt="">
        <?php }else{?>

            <img src="__PUBLIC__home/img/achieve-pic.jpg" alt="">
        <?php }?>

    </div>
    <?php if(!$orders->isEmpty()){?>
        <?php foreach($orders as $order){?>
    <div class="finish-cont">

        <div class="success">
            <?php if($order->status=='已审核'){?>
            <img src="__PUBLIC__home/img/achieve.png" alt="">
            <h2>预约成功</h2>
            <?php }else{?>
                <img src="__PUBLIC__home/img/daishenhe.png" alt="">
                <h2>待审核</h2>
            <?php }?>
        </div>

        <div class="order-info">
            <p class="info-title">订单编号 : </p>
            <p class="info-num">{$order->code}</p>
        </div>
        <div class="order-list-wrapper">
            <div class="order-list">
                <p class="left-order">预约门店 :</p>
                <p class="right-order">{$order->shop_name}</p>
            </div>
            <div class="order-list">
                <p class="left-order">预约时间 :</p>
                <p class="right-order">{$order->preset_time}</p>
            </div>
            <div class="order-list">
                <p class="left-order">预约人数 :</p>
                <p class="right-order">{$order->reservation}人</p>
            </div>
            <div class="order-list">
                <p class="left-order">姓　　名 :</p>
                <p class="right-order">{$order->name}</p>
            </div>
            <div class="order-list">
                <p class="left-order">电　　话 :</p>
                <p class="right-order">{$order->mobile}</p>
            </div>
        </div>
        <div class="btn-del">
            <button data_order_id="{$order->id}" onclick="delMyOrder(this)">删除</button>
        </div>
    </div>
            <?php }?>
    <?php }else{?>
        <b class="no_cont">暂无数据</b>
        <!--  <button onclick="js_delSession()">删除session</button>-->
    <?php }?>
</div>
<?php if(!$orders->isEmpty()){?>
<script>
    function  delMyOrder(obj) {
        if(!confirm('确认删除此订单吗？')){
            return;
        }
        var order_id=$(obj).attr('data_order_id');
        $.ajax({
           method:'post',
            url:'{:url("dingdan/del_myorder")}',
            data:{
               order_id:order_id
            },
            success:function (res) {
               alert(res.msg)
                if(res.code==0){
                    location.reload();
                }
            }
        })

    }


</script>
<?php }?>