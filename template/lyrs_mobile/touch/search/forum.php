<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="javascript:;" onclick="history.go(-1);"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">$language[search_forum]</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{if !$keyword && $setting['showsearchnav']}-->
<div class="search_tab cl">
	<a href="search.php?mod=forum" class="on">$language[search_tab_forum]</a>
	<a href="search.php?mod=portal">$language[search_tab_portal]</a>
</div>
<!--{/if}-->
<form id="searchform" class="searchform" method="post" autocomplete="off" action="search.php?mod=forum&mobile=2">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<!--{subtemplate search/pubsearch}-->
	<!--{if $setting['searchforumhotkey'] && !$searchid}-->
	<div class="search_hotkey bouncescale_in">
		<ul>
		<!--{eval $i = 0;}-->
		<!--{eval $setting['searchforumhotkey'] = explode("\n", trim($setting['searchforumhotkey']));}-->
		<!--{loop $setting['searchforumhotkey'] $val}-->
			<!--{eval $i ++;}-->
			<!--{if $val = trim($val)}-->
			<!--{eval $valenc = rawurlencode($val);}-->
			<li>
				<!--{if !empty($searchparams[url])}-->
					<a href="$searchparams[url]?q=$valenc&source=hotsearch{$srchotquery}">$val</a>
				<!--{else}-->
					<a href="search.php?mod=forum&srchtxt=$valenc&formhash={FORMHASH}&searchsubmit=true&source=hotsearch">$val</a>
				<!--{/if}-->
			</li>
			<!--{if $i % 3 == 0}--></ul><ul><!--{/if}-->
			<!--{/if}-->
		<!--{/loop}-->
		</ul>
	</div>
	<!--{/if}-->
	<!--{eval $policymsgs = $p = '';}-->
	<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
	<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
	<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
	<!--{/loop}-->
	<!--{if $policymsgs}--><p>{lang search_credit_msg}</p><!--{/if}-->
</form>
<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
	<!--{subtemplate search/thread_list}-->
<!--{/if}-->
<!--{if $setting['ajaxpage']}--><a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a><!--{/if}-->
<!--{template common/footer}-->
