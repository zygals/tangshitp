<?php if(!$reguser){?>
<div class="wrapper">
    <div class="header">
        <?php if ($ad) { ?>
            <img src="__IMGURL__{$ad->img}" alt="{$ad->name}">
        <?php } else { ?>
            <b class="no_cont">没有添加内容</b>
        <?php } ?>
    </div>
    <div class="nav">
        <a class="nav-wrap" href="{:url('yuyue/index')}">
            <img src="__PUBLIC__home/img/canteen.png" alt="堂食预约">
            <h2>堂食预约</h2>
        </a>

        <a class="nav-wrap" href="{:url('yuyue/index')}">
            <img src="__PUBLIC__home/img/canteen.png" alt="堂食预约">
            <h2>堂食预约</h2>
        </a>

    </div>
    <div class="content">
        <?php foreach ($articles as $k=>$art) { if($art->id<3)continue;?>
        <h4 class="cont-title">{$art->title}</h4>
            <div class="cont-list-wrap">
                    <a href="{:url('read_article')}?art_id={$art->id}" class="cont-list">
                        <img src="__IMGURL__{$art->img}" alt="">
                    </a>

            </div>
        <?php } ?>
    </div>
</div>
<?php }?>

<?php if($reguser){?>
    <script>
       window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_base&state={$redirect}#wechat_redirect";
    </script>
<?php }?>
