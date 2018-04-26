<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!-- header start -->
<link href="template/rtj1009_005/css/extend_module.css" rel="stylesheet" type="text/css" />

<header class="header rtj1009_header">
    <div class="ren_nav cl">
		<div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
        <a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
		<div class="ren_top_dqwz z">
			<span class="ren_bk_name">Ñ¡Ôñ·¢Ìû°æ¿é</span>
		</div>
    </div>
</header>
<!-- header end -->
<div id="ren_tie_list" class="ren_tie_list rtj1009_m_main m_pb12 cl">
	<div class="ren_post_ks cl">
        <ul class="cl">
			<!--{loop $_G['cache']['forums'] $forum}-->
				<!--{if $forum[type]=='group' && $forum[status]}-->
                        <!--{loop $_G['cache']['forums'] $forums}-->
                            <!--{if $forum[fid]==$forums[fup] && $forum[status]}-->
                                <li><a href="forum.php?mod=post&action=newthread&fid=$forums[fid]">$forums[name]</a></li>
                            <!--{/if}-->
                        <!--{/loop}-->
				<!--{/if}-->
			<!--{/loop}-->
        </ul>
	</div>
</div>



<!--{template common/footer}-->