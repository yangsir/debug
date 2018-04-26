<?php exit;?>
<ul class="pagelist">
	<!--{if $list['threadcount']}-->
	<!-- more pagelist start -->
	<!--{loop $list['threadlist'] $key $thread}-->
	<li>
		<a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">
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
				<span class="dateline">{$thread[author]} - $thread[dateline]</span>
				<span class="num">{$thread[replies]} / <!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
			</p>
		</a>
	</li>
	<!--{/loop}-->
	<!-- more pagelist end -->
	<!--{else}-->
	<li>{lang guide_nothreads}</li>
	<!--{/if}-->
</ul>
