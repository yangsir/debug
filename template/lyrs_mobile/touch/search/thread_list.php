<?php exit;?>
<div class="threadlist">
	<h2 class="thread_title"><!--{if $keyword}-->{lang search_result_keyword} <!--{if $modfid}--><a href="forum.php?mod=modcp&action=thread&fid=$modfid&keywords=$modkeyword&submit=true&do=search&page=$page" target="_blank">{lang goto_memcp}</a><!--{/if}--><!--{else}-->{lang search_result}<!--{/if}--></h2>
	<!--{if empty($threadlist)}-->
	<ul><li><a href="javascript:;">{lang search_nomatch}</a></li></ul>
	<!--{else}-->
	<ul class="pagelist">
		<!-- more pagelist start -->
		<!--{loop $threadlist $thread}-->
		<li>
            <a href="forum.php?mod=viewthread&tid=$thread[realtid]&highlight=$index[keywords]" target="_blank" $thread[highlight]>
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
	<!--{eval $totalpage = ceil($index['num'] / $_G['tpp']);}-->
	<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="search.php?mod=forum&searchid=$searchid&orderby=$orderby&ascdesc=$ascdesc&searchsubmit=yes" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}-->$multipage<!--{/if}--><!--{/if}-->
</div>
