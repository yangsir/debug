<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1"><i class="icon icon-back"></i></a>
        </div>
		<div class="display header-title vm" href="#subname_list">
			<!--{if $_GET['type'] == 'forum'}-->{lang favforum}<!--{else}-->{lang favthread}<!--{/if}-->
			<span class="arrow"></span>
		</div>
	</div>
</header>
<div id="subname_list" class="subname_lists" display="true" style="display:none;">
	<ul>
		<li>
		<!--{if $_GET['type'] == 'forum'}-->
			<a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread">{lang favthread}</a>
		<!--{else}-->
			<a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=forum">{lang favforum}</a>
		<!--{/if}-->
		</li>
	</ul>
</div>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!-- main collectlist start -->
<!--{if $_GET['type'] == 'forum'}-->
<div class="coll_lists">
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
<div class="threadlist">
	<ul class="pagelist">
		<!--{if $list}-->
			<!-- more pagelist start -->
			<!--{loop $list $value}-->
			<li>
				<!--{eval $thread = C::t('forum_thread')->fetch_by_tid_displayorder($value['id'], 0);}-->
	            <a href="forum.php?mod=viewthread&tid=$thread[tid]">
		            <div class="title">
						<!--{if $thread['digest'] > 0}-->
							<i class="icon icon-digest"></i>
						<!--{elseif $thread[heatlevel]}-->
							<i class="icon icon-hot"></i>
						<!--{elseif $thread[folder] == 'lock'}-->
							<i class="icon icon-lock"></i>
						<!--{elseif $thread['special'] == 1}-->
							<i class="icon icon-poll"></i>
						<!--{elseif $thread['special'] == 3}-->
							<i class="icon icon-reward"></i>
						<!--{elseif $thread['special'] == 4}-->
							<i class="icon icon-activity"></i>
						<!--{elseif $thread['special'] == 5}-->
							<i class="icon icon-debate"></i>
						<!--{elseif $thread['attachment'] == 2 && $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
							<i class="icon icon-image"></i>
						<!--{elseif $thread['attachment'] == 1}-->
							<i class="icon icon-common"></i>
						<!--{else}-->
							<i class="icon icon-floder"></i>
						<!--{/if}-->
						{$thread[subject]}
					</div>
					<p class="info">
						<span class="author">{$thread[author]} - {echo dgmdate($thread['dateline'], 'Y-m-d');}</span>
						<span class="num">{$thread[replies]} / <!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
					</p>
				</a>
			</li>
			<!--{/loop}-->
			<!-- more pagelist end -->
		<!--{else}-->
		<li>{lang no_favorite_yet}</li>
		<!--{/if}-->
	</ul>
</div>
<!--{/if}-->
<!-- main collectlist end -->
<div class="morebox">
	<!--{eval $totalpage = ceil($count / $perpage);}-->
	<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}-->$multi<!--{/if}--><!--{/if}-->
</div>
<!--{template common/footer}-->
