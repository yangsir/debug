<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="misc.php?mod=tag"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">{lang tag}</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{if $tagname && (empty($showtype) || $showtype == 'thread')}-->
<!--{eval $count = $count ? $count : count($query);}-->
<div class="threadlist">
	<h2 class="thread_title"><!--{if $tagname}--><!--{echo sprintf($language['search_result_keyword'], $tagname, $count);}--><!--{else}-->$language[search_result]<!--{/if}--></h2>
	<!--{if empty($threadlist)}-->
	<ul><li><a href="javascript:;">$language[search_nomatch]</a></li></ul>
	<!--{else}-->
	<ul class="pagelist">
		<!-- more pagelist start -->
		<!--{loop $threadlist $thread}-->
		<li>
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
					<span class="author">{$thread[author]} - {echo current(explode(' ', $thread['dateline']));}</span>
					<span class="num">{$thread[replies]} / <!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
				</p>
			</a>
		</li>
		<!--{/loop}-->
		<!-- more pagelist end -->
	</ul>
	<!--{/if}-->
</div>
<div class="morebox">
	<!--{eval $totalpage = ceil($count / $tpp);}-->
	<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="misc.php?mod=tag&id=$tag[tagid]&type=thread" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}-->$multipage<!--{/if}--><!--{/if}-->
</div>
<!--{else}-->
<div class="threadlist">
	<h2 class="thread_title"><!--{echo sprintf($language['search_result_keyword'], $searchtagname, $count);}--></h2>
	<ul><li><a href="javascript:;">$language[search_nomatch]</a></li></ul>
</div>
<!--{/if}-->
<!--{template common/footer}-->