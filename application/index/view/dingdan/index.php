
<div class="order-wrap">
    <div class="order-list">
        <p class="left-order">订单编号 :</p>
        <p class="right-order">{$data['code']}</p>
    </div>
    <div class="order-list">
        <p class="left-order">预约门店 :</p>
        <p class="right-order">{$shop_name->shop_name}</p>
    </div>
    <div class="order-list">
        <p class="left-order">预约时间 :</p>
        <p class="right-order">{$data['preset_time']}</p>
    </div>
    <div class="order-list">
        <p class="left-order">预约人数 :</p>
        <p class="right-order">{$data['reservation']}人</p>
    </div>
    <div class="order-list">
        <p class="left-order">姓　　名 :</p>
        <p class="right-order">{$data['name']}</p>
    </div>
</div>
<div class="qr-code">
    <img src="__IMGURL__{$qr_code->qr_code}">
</div>
<a href="javascript:;" class="pay-btn">
    <h2>长按二维码付押金</h2>
</a>
<a href="https://huahui.qingyy.net/tangshitp/public/index/" style="margin:0 auto;width: 100%;
    text-align: center;"><button style="background-color:#fff;border:0.01rem solid #eee;padding: .05rem .55rem;color: #000;">返回首页</button></a>
