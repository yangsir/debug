<?php exit;?>
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location: member.php?mod=logging&action=login'); exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['mycenter'] && $_G['gp_view'] == 'true'}-->

<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="home.php?mod=space&uid=$space[uid]&do=profile&mycenter=1"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title"><!--{if $_G['uid'] == $space['uid']}-->{lang myprofile}<!--{else}-->$space[username]{lang otherprofile}<!--{/if}--></div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!-- userinfo start -->
<div class="userinfo">
	<div class="user_cover cl">
		<div class="user_avatar">
			<div class="avatar_m z"><span><img src="<!--{avatar($space[uid], middle, true)}-->" /></span></div>
			<div class="user_info"><h2 class="name">$space[username]</h2>({$space[group][grouptitle]})</div>
		</div>
	</div>
	<div class="user_box cl">
		<ul>
			<li class="line"><em>UID: </em>$space[uid]</li>
			<!--{loop $profiles $key $value}-->
			<!--{if $key == 'gender' || $key == 'birthday'}-->
			<li><em>$value[title]: </em>$value[value]</li>
			<!--{/if}-->
			<!--{/loop}-->
			<li><em>{lang threads_num}: </em>$space[threads]</li>
			<li><em>{lang replay_num}: </em>$space[posts]</li>
			<li><em>{lang credits}: </em>$space[credits]</li>
			<!--{loop $_G[setting][extcredits] $key $value}-->
			<!--{if $value[title]}-->
			<li><em>$value[title]: </em>{$space["extcredits$key"]} $value[unit]</li>
			<!--{/if}-->
			<!--{/loop}-->
			<li class="line"><em>{lang personal_signature}: </em><!--{if $space[group][maxsigsize] && $space[sightml]}-->{echo strip_tags($space[sightml])}<!--{else}-->$language[signature_not]<!--{/if}--></li>
			<li class="line"><em>{lang regdate}: </em>$space[regdate]</li>
			<li class="line"><em>{lang last_visit}: </em>$space[lastvisit]</li>
			<!--{if $_G[uid] == $space[uid] || $_G[group][allowviewip]}-->
			<li class="line"><em>{lang register_ip}: </em>$space[regip] - $space[regip_loc]</li>
			<li class="line"><em>{lang last_visit_ip}: </em>$space[lastip] - $space[lastip_loc]</li>
			<!--{/if}-->
			<!--{if $space[lastactivity]}--><li class="line"><em>{lang last_activity_time}: </em>$space[lastactivity]</li><!--{/if}-->
			<!--{if $space[lastpost]}--><li class="line"><em>{lang last_post_time}: </em>$space[lastpost]</li><!--{/if}-->
			<!--{if $space[lastsendmail]}--><li class="line"><em>{lang last_send_email}: </em>$space[lastsendmail]</li><!--{/if}-->
		</ul>
	</div>
	<!--{if $space['uid'] == $_G['uid']}-->
	<div class="btn_exit"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout_mobile}</a></div>
	<!--{/if}-->
</div>
<!-- userinfo end -->

<!--{elseif $_G['uid'] != $space['uid']}-->

<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="forum.php"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">$space[username]{lang otherprofile}</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!-- userinfo start -->
<div class="userinfo">
	<div class="user_cover cl">
		<div class="user_avatar">
			<div class="avatar_m z"><span><img src="<!--{avatar($space[uid], middle, true)}-->" /></span></div>
			<div class="user_info"><h2 class="name">$space[username]</h2>({$space[group][grouptitle]})</div>
			<div class="user_sign"><!--{if $space[group][maxsigsize] && $space[sightml]}-->{echo strip_tags($space[sightml])}<!--{else}-->$language[signature_not]<!--{/if}--></div>
		</div>
	</div>
	<div class="user_list his cl">
		<ul>
			<li class="line"><a href="home.php?mod=space&uid={$space[uid]}&do=thread&view=me">$language[his_thread]</a></li>
			<li class="line"><a href="home.php?mod=spacecp&ac=pm&uid={$space[uid]}">$language[his_sendpm]</a></li>
			<li><a href="home.php?mod=space&uid={$space[uid]}&do=profile&view=true">$language[view_profile]</a></li>
		</ul>
	</div>
</div>
<!-- userinfo end -->

<!-- main threadlist start -->
<div class="threadlist">
	<ul class="pagelist">
	<!--{if $list = C::t('forum_thread')->fetch_all_by_authorid_displayorder($space['uid'], 0, '>=', null, '', 0, 10)}-->
		<!--{loop $list $thread}-->
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
					<span class="dateline">{echo dgmdate($thread['dateline']);}</span>
					<span class="num">{$thread[replies]} / <!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
				</p>
			</a>
		</li>
		<!--{/loop}-->
	<!--{else}-->
		<li>{lang no_related_posts}</li>
	<!--{/if}-->
	</ul>
</div>
<!-- main threadlist end -->

<div class="morebox">
	<!--{if $space['threads'] > 10}--><a href="home.php?mod=space&uid={$space[uid]}&do=thread&view=me&order=dateline" class="morelink">$language[view_more]</a><!--{/if}-->
</div>


<!--{else}-->

<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="forum.php"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">{lang user_info}</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!-- userinfo start -->
<div class="userinfo">
	<div class="user_cover cl">
		<div class="user_avatar">
			<div class="avatar_m z"><span><img src="<!--{avatar($_G[uid], middle, true)}-->" /></span></div>
			<div class="user_info"><h2 class="name">$_G[username]</h2>({$space[group][grouptitle]})</div>
			<div class="user_sign"><!--{if $space[group][maxsigsize] && $space[sightml]}-->{echo strip_tags($space[sightml])}<!--{else}-->$language[signature_not]<!--{/if}--></div>
		</div>
	</div>
	<div class="user_list cl">
		<ul>
			<li class="line"><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread">$language[my_favorite]</a></li>
			<li class="line"><a href="home.php?mod=space&uid={$_G[uid]}&do=thread&view=me">$language[my_thread]</a></li>
			<!--{eval loaducenter(); $ucnewpm = uc_pm_checknew($_G['uid'], 1);}-->
			<li class="line"><a href="home.php?mod=space&do=pm">$language[my_pm]<!--{if $ucnewpm['newpm']}--><i class="new"></i><!--{/if}--></a></li>
			<li><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&view=true">$language[my_profile]</a></li>
		</ul>
	</div>
</div>
<!-- userinfo end -->

<!-- main threadlist start -->
<div class="threadlist">
	<ul class="pagelist">
	<!--{if $list = C::t('forum_thread')->fetch_all_by_authorid_displayorder($_G['uid'], 0, '>=', null, '', 0, 10)}-->
		<!--{loop $list $thread}-->
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
					<span class="dateline">{echo dgmdate($thread['dateline']);}</span>
					<span class="num">{$thread[replies]} / <!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
				</p>
			</a>
		</li>
		<!--{/loop}-->
	<!--{else}-->
		<li>{lang no_related_posts}</li>
	<!--{/if}-->
	</ul>
</div>
<!-- main threadlist end -->

<div class="morebox">
	<!--{if $space['threads'] > 10}--><a href="home.php?mod=space&uid={$space[uid]}&do=thread&view=me&order=dateline" class="morelink">$language[view_more]</a><!--{/if}-->
</div>

<!--{/if}-->
<!--{template common/footer}-->
