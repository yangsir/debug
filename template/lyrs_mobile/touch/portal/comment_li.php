<?php exit;?>
<li id="comment_{$comment[cid]}_li" class="cl">
	<div class="infoline grey">
		<span class="y"><!--{date($comment[dateline])}--></span>
	<!--{if !empty($comment['uid'])}-->
		<a href="home.php?mod=space&uid=$comment[uid]" class="blue">$comment[username]</a>
	<!--{else}-->
		{lang guest}
	<!--{/if}-->
	</div>
	<!--{if $comment[status] == 1}--><b>({lang moderate_need})</b><!--{/if}-->
	<div class="message"><!--{if $_G[adminid] == 1 || $comment[uid] == $_G[uid] || $comment[status] != 1}-->$comment[message]<!--{else}--> {lang moderate_not_validate}<!--{/if}--></div>
	<div class="mtn mbn cl">
		<span class="y">
			<!--{if ($_G['group']['allowmanagearticle'] || $_G['uid'] == $comment['uid']) && $_G['groupid'] != 7 && !$article['idtype']}-->
			<a href="portal.php?mod=portalcp&ac=comment&op=edit&cid=$comment[cid]" class="blue" style="margin-right: 10px;">{lang edit}</a>
			<a href="portal.php?mod=portalcp&ac=comment&op=delete&cid=$comment[cid]" class="delbtn blue">{lang delete}</a>
			<!--{/if}-->
		</span>
	</div>
</li>