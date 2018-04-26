<?PHP exit('Access Denied');?>
<div class="ren_rwd cl">
	<div class="{if $_G['forum_thread']['price'] > 0}ren_rusld{elseif $_G['forum_thread']['price'] < 0}ren_rsld{/if} z">
    	<span class="ren_yuanbao"></span>
        <div class="ren_rwd_jb">
			ÐüÉÍ <cite>$rewardprice</cite> {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}
        </div>
	</div>

    <!--{if $_G['forum_thread']['price'] > 0 && !$_G['forum_thread']['is_archived']}-->
        <div class="ren_rwd_an">
        	<a href="#fastpostmessage" class="ren_rwd_anniu">{lang reward_answer}</a>
        </div>
    <!--{/if}-->
</div>
<!--{if $bestpost}-->
	<div class="ren_rwdbst">
    	<div class="ren_rwd_daan cl">
        	<h3 class="ren_psth cl">{lang reward_bestanswer}</h3>
			<div class="ren_psta cl">$bestpost[avatar]
            	<span class="ren_zd_mz"><a href="home.php?mod=space&uid=$bestpost[authorid]">$bestpost[author]</a></span>
            </div>
        </div>
		<div class="ren_pstl">
			<div class="psti">
				<div class="mtn">$bestpost[message]</div>
			</div>
		</div>
	</div>
<!--{/if}-->

<div class="ren_rwdn cl">
    <table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_$post[pid]">$post[message]</td></tr></table>
</div>

<!--{if $post['attachment']}-->
	<div class="locked">{lang attachment}: <em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{elseif $_G['connectguest']}-->{lang attach_nopermission_connect_fill_profile}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em></div>
<!--{elseif $post['imagelist'] || $post['attachlist']}-->
	<div class="pattl">
		<!--{if $post['imagelist']}-->
			 <!--{echo showattach($post, 1)}-->
		<!--{/if}-->
		<!--{if $post['attachlist']}-->
			 <!--{echo showattach($post)}-->
		<!--{/if}-->
	</div>
<!--{/if}-->
<!--{eval $post['attachment'] = $post['imagelist'] = $post['attachlist'] = '';}-->

