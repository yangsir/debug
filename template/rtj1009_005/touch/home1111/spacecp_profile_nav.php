<?PHP exit('Access Denied');?>
<ul class="ren_g_cd cl">
	<!--{if $operation != 'verify'}-->
		<!--{loop $profilegroup $key $value}-->
			<!--{if $value[available]}-->
			<li $opactives[$key]><a href="home.php?mod=spacecp&ac=profile&op=$key">$value[title]</a></li>
			<!--{/if}-->
		<!--{/loop}-->
		<!--{if $_G['setting']['allowspacedomain'] && $_G['setting']['domain']['root']['home'] && checkperm('domainlength')}-->
		<li $opactives[domain]><a href="home.php?mod=spacecp&ac=domain">{lang space_domain}</a></li>
		<!--{/if}-->
	<!--{else}-->
		<!--{if $_G[setting][verify]}-->
			<!--{loop $_G['setting']['verify'] $vid $verify}-->
				<!--{if $verify['available'] && (empty($verify['groupid']) || in_array($_G['groupid'], $verify['groupid']))}-->
					<!--{if $vid != 7}-->
					<li $opactives['verify'.$vid]><a href="home.php?mod=spacecp&ac=profile&op=verify&vid=$vid">$verify['title']</a></li>
					<!--{elseif $_G['setting']['my_app_status'] && $vid == 7}-->
					<li $opactives[videophoto]><a href="home.php?mod=spacecp&ac=videophoto">{lang video_certification}</a></li>
					<!--{/if}-->
				<!--{/if}-->
			<!--{/loop}-->
		<!--{/if}-->
	<!--{/if}-->
	<!--{if $op != 'verify' && !empty($_G['setting']['plugins']['spacecp_profile'])}-->
		<!--{loop $_G['setting']['plugins']['spacecp_profile'] $id $module}-->
			<!--{if !$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])}--><li{if $_GET[id] == $id} class="a"{/if}><a href="home.php?mod=spacecp&ac=plugin&op=profile&id=$id">$module[name]</a></li><!--{/if}-->
		<!--{/loop}-->
	<!--{/if}-->
</ul>