<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="forum.php"><i class="icon icon-back"></i></a>
        </div>
		<div class="display header-title vm" href="#subname_list">
			{echo $lang['guide_'.$view];}
			<span class="arrow"></span>
		</div>
		<div class="header-right">
            <a href="forum.php?mod=misc&action=nav"><i class="icon icon-post"></i></a>
        </div>
	</div>
</header>
<div id="subname_list" class="subname_lists" display="true" style="display:none;">
	<ul>
		<li><a href="forum.php?mod=guide&view=hot" rel="nofollow">{lang guide_hot}</a></li>
		<li><a href="forum.php?mod=guide&view=digest" rel="nofollow">{lang guide_digest}</a></li>
		<li><a href="forum.php?mod=guide&view=new" rel="nofollow">{lang guide_new}</a></li>
		<li><a href="forum.php?mod=guide&view=newthread" rel="nofollow">{lang guide_newthread}</a></li>
		<li><a href="forum.php?mod=guide&view=sofa" rel="nofollow">{lang guide_sofa}</a></li>
		<li><a href="forum.php?mod=guide&view=my" rel="nofollow">{lang guide_my}</a></li>
	</ul>
</div>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!-- main threadlist start -->
<div class="threadlist">
	<!--{loop $data $key $list}-->
		<!--{subtemplate forum/guide_list_row}-->
	<!--{/loop}-->
</div>
<!-- main threadlist end -->

<div class="morebox">
	<!--{eval $totalpage = ceil($data[$view]['threadcount'] / $perpage);}-->
	<!--{if $setting['ajaxpage'] && empty($data['my']['multi'])}--><!--{if $totalpage > $_G['page']}--><a href="forum.php?mod=guide&view={$view}" class="morelink" data-num="{$totalpage}-{$_G['page']}">$language[view_more]</a><!--{/if}--><!--{else}-->$multipage<!--{/if}-->
</div>

<div class="pullrefresh" style="display:none;"></div>
<!--{template common/footer}-->
