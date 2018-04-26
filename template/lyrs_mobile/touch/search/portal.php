<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="javascript:;" onclick="history.go(-1);"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">$language[search_portal]</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{if !$keyword && $setting['showsearchnav']}-->
<div class="search_tab cl">
	<a href="search.php?mod=forum">$language[search_tab_forum]</a>
	<a href="search.php?mod=portal" class="on">$language[search_tab_portal]</a>
</div>
<!--{/if}-->
<form class="searchform" method="post" autocomplete="off" action="search.php?mod=portal" onsubmit="if($('scform_srchtxt')) searchFocus($('scform_srchtxt'));">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<!--{subtemplate search/pubsearch}-->
	<!--{if $setting['searchportalhotkey'] && !$searchid}-->
	<div class="search_hotkey bouncescale_in">
		<ul>
		<!--{eval $i = 0;}-->
		<!--{eval $setting['searchportalhotkey'] = explode("\n", trim($setting['searchportalhotkey']));}-->
		<!--{loop $setting['searchportalhotkey'] $val}-->
			<!--{eval $i ++;}-->
			<!--{if $val = trim($val)}-->
			<!--{eval $valenc = rawurlencode($val);}-->
			<li><a href="search.php?mod=portal&srchtxt=$valenc&formhash={FORMHASH}&searchsubmit=true&source=hotsearch">$val</a></li>
			<!--{if $i % 3 == 0}--></ul><ul><!--{/if}-->
			<!--{/if}-->
		<!--{/loop}-->
		</ul>
	</div>
	<!--{/if}-->
</form>
<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
<!--{subtemplate search/portal_list}-->
<!--{/if}-->
<!--{hook/portal_bottom}-->
<!--{template common/footer}-->