<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="home.php?mod=space&uid={if $space['uid'] != $_G['uid']}$space['uid']{else}{$_G[uid]}&do=profile&mycenter=1{/if}"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title"><!--{if $space['uid'] != $_G['uid']}-->{$space['username']}$language[the_thread]<!--{else}-->{lang mythread}<!--{/if}--></div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!-- main threadlist start -->
<div class="threadlist">
	<ul class="pagelist">
	<!--{if $list}-->
		<!-- more pagelist start -->
		<!--{loop $list $thread}-->
		<li>
            <a href="{if $viewtype == 'reply' || $viewtype == 'postcomment'}forum.php?mod=redirect&goto=findpost&ptid=$thread[tid]&pid=$thread[pid]{else}forum.php?mod=viewthread&tid=$thread[tid]{/if}">
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
					<span class="dateline">$thread[dateline]</span>
					<span class="num">{$thread[replies]} / <!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
				</p>
			</a>
		</li>
		<!--{/loop}-->
		<!-- more pagelist end -->
	<!--{else}-->
		<li>{lang no_related_posts}</li>
	<!--{/if}-->
	</ul>
</div>
<div class="morebox">
	<!--{eval space_merge($space, 'count'); $totalpage = ceil($space['threads'] / $perpage);}-->
	<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="home.php?mod=space&uid={$space[uid]}&do=thread&view=me&order=dateline" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}-->$multi<!--{/if}--><!--{/if}-->
</div>
<!-- main threadlist end -->
<!--{if $setting['ajaxpage']}--><a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a><!--{/if}-->
<!--{template common/footer}-->
