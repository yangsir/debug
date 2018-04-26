<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!-- header start -->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
		<!--{if $_G['setting']['domain']['app']['mobile']}-->
			{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
		<!--{else}-->
			{eval $nav = "forum.php";}
		<!--{/if}-->
        <a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
		<div class="ren_top_grkj z">
			<span class="ren_bk_name ren_vm">·ÖÀà</span>
		</div>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->
<!-- main threadlist start -->
<div class="ren_tie_list rtj1009_m_main m_pb49 cl">

		<!--{subtemplate forum/guide_list_row}-->

</div>
<!-- main threadlist end -->

$multipage

<div class="pullrefresh" style="display:none;"></div>
<!--{template common/footer}-->
