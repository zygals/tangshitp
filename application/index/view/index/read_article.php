<?php if($article){?>
<div class="article-wrap">
    <h3 class="article-title">{$article->title}</h3>
    <div class="article-cont">
        {$article->cont}
    </div>
</div>
<?php }else{?>
    <b class="no_cont">没有添加内容</b>
<?php }?>