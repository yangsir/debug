<?php exit;?>
<div class="articlelist">
	<h2 class="article_title"><!--{if $keyword}-->{lang search_result_keyword}<!--{else}-->{lang search_result}<!--{/if}--></h2>
	<!--{if empty($articlelist)}-->
		<ul><li><a href="javascript:;">{lang search_nomatch}</a></li></ul>
	<!--{else}-->
	<ul class="pagelist">
		<!--{if $articlelist}-->
		<!-- more pagelist start -->
		<!--{loop $articlelist $article}-->
		<li>
			<a href="{echo fetch_article_url($article);}">
				<!--{if $article[pic]}--><img src="$article[pic]" /><!--{/if}-->
				<div class="title">$article[title]</div>
				<div class="info">$article[summary]</div>
			</a>
		</li>
		<!--{/loop}-->
		<!-- more pagelist end -->
		<!--{else}-->
		<li>$language[not_article]</li>
		<!--{/if}-->
	</ul>
	<!--{/if}-->
</div>
<div class="morebox">
	<!--{eval $totalpage = ceil($index['num'] / $_G['tpp']);}-->
	<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="search.php?mod=portal&searchid=$searchid&orderby=$orderby&ascdesc=$ascdesc&searchsubmit=yes" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}--><!--{if $list['multi']}-->{$list['multi']}<!--{/if}--><!--{/if}--><!--{/if}-->
</div>