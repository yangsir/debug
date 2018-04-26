<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="forum.php?mod=forum"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">$language[select_newthread]</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<div class="forumlist">
	<ul>
		<!--{loop $_G['cache']['forums'] $forum}-->
		<!--{if $forum['type'] != 'group' && $forum['status'] > 0 && !$forum['viewperm'] && !$forum['havepassword']}-->
		<li><a href="forum.php?mod=post&action=newthread&fid=$forum[fid]">$forum[name]</li>
		<!--{/if}-->
		<!--{/loop}-->
	</ul>
</div>
<!--{template common/footer}-->