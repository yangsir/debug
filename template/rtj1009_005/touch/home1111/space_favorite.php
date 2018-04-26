<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!-- header start -->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
    	<div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
		<a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1" class="z ren_fhjt"><span></span></a>
		<!--{if $_GET['type'] == 'forum'}-->
		<div class="ren_top_dqwz z">
			<span class="display ren_bk_name ren_vm" href="#subname_list">{lang favforum}</span>
			<div id="subname_list" class="subname_list" display="true">
				<ul>
				<li><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread">{lang favthread}</a></li>
				</ul>
	        </div>
		</span>
		<!--{else}-->
		<div class="ren_top_dqwz z">
			<span class="display ren_bk_name ren_vm" href="#subname_list">{lang favthread}</span>
			<div id="subname_list" class="subname_list" display="true">
				<ul>
				<li><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=forum">{lang favforum}</a></li>
				</ul>
	        </div>
		</span>
		<!--{/if}-->
    </div>
</header>

<!-- main collectlist start -->
<!--{if $_GET['type'] == 'forum'}-->
<div class="coll_list b_radius">
	<ul>
		<!--{if $list}-->
			<!--{loop $list $k $value}-->
			<li><a href="$value[url]">$value[title]</a></li>
			<!--{/loop}-->
		<!--{else}-->
		<li>{lang no_favorite_yet}</li>
		<!--{/if}-->

	</ul>
</div>
<!--{else}-->
<div class="ren_tie_list rtj1009_m_main cl">
    <ul class="z ren_sc_list cl">
		<!--{if $list}-->
			<!--{loop $list $k $value}-->
			<li>
            	<a href="$value[url]">$value[title]</a>
            </li>
			<!--{/loop}-->
		<!--{else}-->
		<li>{lang no_favorite_yet}</li>
		<!--{/if}-->
	</ul>
</div>
<!--{/if}-->
<!-- main collectlist end -->
$multi
<!--{eval $nofooter = true;}-->


<!--{template common/footer}-->
