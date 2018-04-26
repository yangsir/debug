<?php exit;?>
<!--{template common/header}-->
<!--{eval $list = array();}-->
<!--{eval $wheresql = category_get_wheresql($cat);}-->
<!--{eval $list = category_get_list($cat, $wheresql, $page);}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
			<a href="{if $cat[upid]}portal.php?mod=list&catid=$cat[upid]{else}forum.php{/if}"><i class="icon icon-back"></i></a>
        </div>
		<div class="display header-title vm" href="#subname_list">
			<!--{eval echo strip_tags($cat['catname']) ? strip_tags($cat['catname']) : $cat['catname'];}-->
			<!--{if $cat[subs]}--><span class="arrow"></span><!--{/if}-->
		</div>
	</div>
</header>
<!--{if $cat['subs']}-->
<div id="subname_list" class="subname_lists" display="true" style="display:none;">
	<ul>
		<!--{loop $cat['subs'] $sub}-->
		<!--{if $sub['closed'] != 1}-->
		<li><a href="{$portalcategory[$sub['catid']]['caturl']}">{$sub['catname']}</a></li>
		<!--{/if}-->
		<!--{/loop}-->
	</ul>
</div>
<!--{/if}-->
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<div class="managebox">
	<div class="title">
		<span class="act typebtn">
			<i class="icon-type"></i><em>$language[types]</em>
		</span>
	</div>
	<div class="type_list cl hide">
		<ul>
			<!--{if $_G['cache']['portalcategory']}-->
			<!--{eval $i = 0;}-->
			<!--{loop $_G['cache']['portalcategory'] $value}-->
			<!--{if $value['upid'] == 0 && $value['closed'] != 1}-->
			<!--{eval $i ++;}-->
			<li><a href="{$portalcategory[$value['catid']]['caturl']}">$value[catname]</a></li>
			<!--{if $i % 2 == 0}--></ul><ul><!--{/if}-->
			<!--{/if}-->
			<!--{/loop}-->
			<!--{/if}-->
		</ul>
	</div>
</div>
<!--{ad/lyrs_mobile:mobile_ads/a_cn/6}-->
<div class="articlelist">
	<ul class="pagelist">
		<!--{if $list['list']}-->
		<!-- more pagelist start -->
		<!--{loop $list['list'] $value}-->
		<!--{eval $highlight = article_title_style($value);}-->
		<!--{eval $article_url = fetch_article_url($value);}-->
		<li>
			<a href="$article_url" $highlight>
				<!--{if $value[pic]}--><img src="$value[pic]" /><!--{/if}-->
				<div class="title">$value[title] <!--{if $value[status] == 1}-->({lang moderate_need})<!--{/if}--></div>
				<div class="info">$value[summary]</div>
			</a>
		</li>
		<!--{/loop}-->
		<!-- more pagelist end -->
		<!--{else}-->
		<li>$language[not_article]</li>
		<!--{/if}-->
	</ul>
</div>
<div class="morebox">
	<!--{eval $totalpage = ceil($list['count'] / $cat['perpage']);}-->
	<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="portal.php?mod=list&catid=$cat[catid]" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}--><!--{if $list['multi']}-->{$list['multi']}<!--{/if}--><!--{/if}--><!--{/if}-->
</div>
<!--{template common/footer}-->