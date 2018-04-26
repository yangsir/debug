<?PHP exit('Access Denied');?>
<div id="comment_{$comment[cid]}_li" class="ren_view_ny ren_wz_ny cl">
	<div class="ren_lchf_xx cl">
        
        <a href="home.php?mod=space&uid=$comment[uid]&do=profile" class="ren_avatar z"><img src="<!--{avatar($comment[uid], small, true)}-->"/></a>
        
	<!--{if !empty($comment['uid'])}-->
		<a href="home.php?mod=space&uid=$comment[uid]" class="ren_zz_mz z" c="1">$comment[username]</a>
	<!--{else}-->
		{lang guest}
	<!--{/if}-->
		<span class="ren_lc_sj y"><!--{date($comment[dateline])}--></span>
	<!--{if $comment[status] == 1}--><b>({lang moderate_need})</b><!--{/if}-->
	</div>
	<div class="message"><!--{if $_G[adminid] == 1 || $comment[uid] == $_G[uid] || $comment[status] != 1}-->$comment[message]<!--{else}--> {lang moderate_not_validate}<!--{/if}--></div>
</div>