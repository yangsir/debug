<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="portal.php?mod=list&catid=$article[catid]"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">{lang view_content}</div>
		<div class="header-right">
            <span id="replyid"><i class="icon icon-reply"></i></span>
        </div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{hook/view_article_top}-->
<div class="articlepage">
	<h2>
		<!--{if $_G['group']['allowmanagearticle'] || ($_G['group']['allowpostarticle'] && $article['uid'] == $_G['uid'] && (empty($_G['group']['allowpostarticlemod']) || $_G['group']['allowpostarticlemod'] && $article['status'] == 1)) || $categoryperm[$value['catid']]['allowmanage']}-->
			<!--{if $article[status]>0 && ($_G['group']['allowmanagearticle'] || $categoryperm[$value['catid']]['allowmanage'])}-->
				<a href="portal.php?mod=portalcp&ac=article&op=verify&aid=$article[aid]" class="delbtn blue">[{lang moderate}]</a>
			<!--{else}-->
				<a href="portal.php?mod=portalcp&ac=article&op=delete&aid=$article[aid]" class="delbtn blue">[{lang delete}]</a>
			<!--{/if}-->
		<!--{/if}-->
		$article[title] <!--{if $article['status'] == 1}-->({lang moderate_need})<!--{elseif $article['status'] == 2}-->({lang ignored})<!--{/if}-->
	</h2>
	<div class="dateline grey">
		$article[dateline]
		<span><a href="home.php?mod=space&uid=$article[uid]" class="blue">$article[username]</a></span>
		<em><i class="icon icon-view"></i><!--{if $article[viewnum] > 0}-->$article[viewnum]<!--{else}-->0<!--{/if}--></em>
		<em><!--{if $article[commentnum] > 0}--><a href="$common_url" class="grey"><i class="icon icon-reply"></i>$article[commentnum]</a><!--{else}--><i class="icon icon-reply"></i>$article[commentnum]<!--{/if}--></em>
	</div>
	<!--{ad/lyrs_mobile:mobile_ads/a_cn/7}-->
	<!--{if $article[summary]}-->
	<div class="summary"><span class="icon">$language[summary]</span>$article[summary]</div>
	<!--{/if}-->
	<div class="content">
		<div class="article_content">
		$content[content]
		<!--{if $multi}--><div class="ptw pbw cl">$multi</div><!--{/if}-->
		<!--{if $article['nextarticle']}-->
		<div class="more-article">
			<a href="{$article['nextarticle']['url']}">{lang next_article}{$article['nextarticle']['title']}</a>
		</div>
		<!--{/if}-->
		<!--{hook/view_article_content}-->
		</div>
	</div>
	<!--{ad/lyrs_mobile:mobile_ads/a_cn/8}-->
	<!--{if $setting['bdshare']}-->
	<div class="bdsharebuttonbox">
		<p>$language[page_share]</p>
		<a href="javascript:;" class="bds_qzone" data-cmd="qzone"></a>
		<a href="javascript:;" class="bds_tsina" data-cmd="tsina"></a>
		<a href="javascript:;" class="bds_tqq" data-cmd="tqq"></a>
		<a href="javascript:;" class="weixin" style="background: url(template/lyrs_mobile/touch/image/weixin_f.png);"></a>
		<a href="javascript:;" class="weixin" style="background: url(template/lyrs_mobile/touch/image/weixin.png);"></a>
    </div>
	<div class="weixin_share_help"><img src="template/lyrs_mobile/touch/image/weixin_tip.png" class="weixin_share_img" /></div>
	<style>
	.bdsharebuttonbox { padding: 10px; border-bottom: 1px solid #d9d8d8; }
	.bdsharebuttonbox p { font-size: 16px; font-weight: bold; margin-bottom: 4px; }
	.bdsharebuttonbox a { margin-right: 20px !important; }
	.weixin_share_help { width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0px; z-index: 1000; display: none; }
	.weixin_share_img { width: 300px; float: right; margin-right: 6px; }
	.weixin { display: none; }
	</style>
	<script type="text/javascript">
	var ua = navigator.userAgent.toLowerCase();
	if (ua.match(/MicroMessenger/i) == 'micromessenger'){
		$('.weixin').show();
		$('.weixin').click(function(){
			$('.weixin_share_help').show()
		});
		$('.weixin_share_help').click(function() {
			$(this).hide()
		});
	}
	</script>
	<script type="text/javascript">
	window._bd_share_config = {'common': { 'bdSnsKey': {}, 'bdText': '', 'bdMini': '2', 'bdMiniList': false, 'bdPic': '', 'bdStyle': '1', 'bdSize': '32'}, 'share': {}};
	with(document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~ ( - new Date() / 36e5)];
	</script>
	<!--{/if}-->
	<!--{if $article['allowcomment']==1}-->
		<!--{eval $data = &$article}-->
		<!--{subtemplate portal/portal_comment}-->
	<!--{/if}-->
</div>
<!--{template common/footer}-->