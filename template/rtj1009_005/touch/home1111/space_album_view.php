<?PHP exit('Access Denied');?>
<!--{eval $_G['home_tpl_titles'] = array($album['albumname'], '{lang album}');}-->
<!--{eval $friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');}-->
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['mycenter']}-->

<!--{if $_G[setting][homepagestyle]}-->
    <!-- header start -->
    <header class="header rtj1009_header">
        <div class="ren_nav cl">
            <a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
            <div class="ren_top_grkj z">
                <span class="ren_bk_name ren_vm">ПаІб</span>
            </div>
            <div class="ren_nav_right">
                <button class="MenuOpen btn ren_btn">
                    <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
                </button>
            </div>
        </div>
    </header>
    <!-- header end -->
    <!-- userinfo start -->
    <!--{template home/space_menu}-->
    <!-- userinfo end -->
	<div id="ren_ct" class="rtj1009_lai_ct cl">
        <div class="ren_lai_mn">
            <div class="bm ren_ly_bm">
<!--{else}-->
	<!--{template common/header}-->
	<!--{template home/space_menu}-->
	<div id="ct" class="rtj1009_ct cl">
        <div class="ren_g_mn">
<!--{/if}-->
		<!--{if $list}-->
			<!--{if $album[depict]}--><p class="tbmu">$album[depict]</p><!--{/if}-->
			<ul>
			<!--{loop $list $key $value}-->
				<li>
				<a href="home.php?mod=space&uid=$value[uid]&do=$do&picid=$value[picid]"><!--{if $value[pic]}--><img src="$value[pic]" alt="" /><!--{/if}--></a><!--{if $value[status] == 1}--><b>({lang moderate_need})</b><!--{/if}-->
				</li>
			<!--{/loop}-->
			</ul>
			<!--{if $pricount}--><p>{lang hide_pic}</p><!--{/if}-->
			<!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
		<!--{else}-->
			<!--{if !$pricount}--><p class="emp">{lang no_pics}</p><!--{/if}-->
			<!--{if $pricount}--><p>{lang hide_pic}</p><!--{/if}-->
		<!--{/if}-->
		

        <!--{if $_G[setting][homepagestyle]}-->
        </div>
        <!--{/if}-->
</div>



<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->