<?php exit;?>
	<div>{lang thread_reward}<strong> <span class="xi1 xs3">$rewardprice</span> </strong>{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]} {if $_G['forum_thread']['price'] > 0}<span class="xi1">{lang unresolved}</span>{elseif $_G['forum_thread']['price'] < 0}<span class="xg1">{lang resolved}</span>{/if}</div>
	<div id="postmessage_$post[pid]" class="postmessage">$post[message]</div>


<!--{if $post['attachment']}-->
	<div class="warning">{lang attachment}: <em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em></div>
<!--{elseif $post['imagelist'] || $post['attachlist']}-->
    <!--{if $post['imagelist']}-->
         <ul class="img_list cl vm">{echo showattach($post, 1)}</ul>
    <!--{/if}-->
    <!--{if $post['attachlist']}-->
         {echo showattach($post)}
    <!--{/if}-->
<!--{/if}-->
<!--{eval $post['attachment'] = $post['imagelist'] = $post['attachlist'] = '';}-->

<!--{if $bestpost}-->
	<div class="rwdbst">
		<h3 class="psth">{lang reward_bestanswer}</h3>
		<div class="pstl">
			<div class="mtn">$bestpost[message] - <a href="forum.php?mod=redirect&goto=findpost&ptid=$bestpost[tid]&pid=$bestpost[pid]">{lang view_full_content}</a></div>
		</div>
	</div>
<!--{/if}-->