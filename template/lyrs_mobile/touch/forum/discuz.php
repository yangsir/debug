<?php exit;?>
<!--{template common/header}-->
<!--{eval $homepage = $_G['mod'] == 'index' || !in_array($setting['default'], array(1, 2, 3, 4)) || (!in_array($_G['mod'], array('index', 'photo', 'forum')) && $_GET['forumlist'] != 1) ? true : false;}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
			<!--{if $homepage}-->
            <span><i class="icon icon-home"></i></span>
			<!--{else}-->
            <a href="forum.php"><i class="icon icon-back"></i></a>
			<!--{/if}-->
        </div>
		<div class="header-title">
			<!--{if $_G['mod'] == 'index'}-->
			$_G['setting']['bbname']
			<!--{elseif $_G['mod'] == 'photo'}-->
			$language['photo']
			<!--{elseif $gid || $_G['mod'] == 'forum' || $_GET['forumlist'] == 1}-->
			$language['forum']
			<!--{else}-->
			$_G['setting']['bbname']
			<!--{/if}-->
		</div>
		<!--{if $homepage}-->
		<div class="header-right">
            <a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->"><i class="icon icon-user"></i></a>
        </div>
		<!--{/if}-->
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{if empty($gid) && $_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1 && empty($setting['default']) && !in_array($_G['mod'], array('index', 'photo', 'forum'))}-->
<!--{eval dheader('location: forum.php?mod=guide&view=hot'); exit;}-->
<!--{/if}-->
<!--{if empty($gid) && ($setting['default'] == 1 && $_GET['forumlist'] != 1 && empty($_G['mod'])) || $_G['mod'] == 'index'}-->
<!--{if $block = $setting['block']['index']}-->
	<!--{eval block_get($block);}-->
	<!--{loop $block $val}-->
		<!--{echo block_display($val);}-->
	<!--{/loop}-->
<!--{/if}-->
<!--{elseif ($setting['default'] == 3 && $_GET['forumlist'] != 1 && empty($_G['mod'])) || $_G['mod'] == 'photo'}-->
<!--{eval require_once DISCUZ_ROOT.'./template/lyrs_mobile/touch/forum/viewthread_discuzcode.php';}-->
<!--{if $imagelist = lyrs_mobile_discuzcode::fetch_photo($setting['photo'], $_G['page'], $setting['photonum'])}-->
<div class="photolist">
	<ul class="pagelist">
		<!-- more pagelist start -->
		<!--{loop $imagelist['threadlist'] $thread}-->
		<li>
			<a href="forum.php?mod=viewthread&tid=$thread[tid]">
				<div class="image" style="background-image:url({if $image = C::t('forum_attachment_n')->fetch_max_image('tid:'.$thread['tid'], 'tid', $thread['tid'])}{echo getforumimg($image[aid], 0, 600, 300, 'fixnone')}{/if});">
				</div>
				<div class="title">$thread[subject]</div>
			</a>
		</li>
		<!--{/loop}-->
		<!-- more pagelist end -->
	</ul>
</div>
<div class="morebox">
	<!--{eval $totalpage = ceil($imagelist['count'] / $setting['photonum']);}-->
	<!--{eval $multipage = multi($imagelist['count'], $setting['photonum'], $_G['page'], 'forum.php?mod=photo');}-->
	<!--{if $totalpage > $_G['page']}--><!--{if $setting['ajaxpage']}--><a href="forum.php?mod=photo" class="morelink" data-num="{$totalpage}-{$_G['page']}">$language[view_more]</a><!--{else}-->$multipage<!--{/if}--><!--{/if}-->
</div>
<!--{if $setting['ajaxpage']}--><a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a><!--{/if}-->
<!--{/if}-->
<!--{elseif $setting['default'] == 4 || empty($_G['mod']) || $_G['mod'] == 'forum' || $gid}-->
<!--{hook/index_top_mobile}-->
<!-- main forumlist start -->
<div class="wp" id="wp">
	<!--{loop $catlist $key $cat}-->
	<div class="bmw fl">
		<div class="subforumshow bm_h cl" href="#sub_forum_$cat[fid]">
			<span class="o"><i class="arrow<!--{if !$_G[setting][mobile][mobileforumview]}--> yes<!--{else}--> no<!--{/if}-->"></i></span>
		<h2><a href="javascript:;">$cat[name]</a></h2>
		</div>
		<div id="sub_forum_$cat[fid]" class="sub_forum">
			<ul>
				<!--{loop $cat[forums] $forumid}-->
				<!--{eval $forum=$forumlist[$forumid];}-->
				<li><a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="arrow"><div class="forum"><!--{if $forum[icon]}--><img src="{echo preg_replace('/.*<img src="(.+?)".*/i', '$1', $forum['icon']);}" /><!--{else}--><i class="icon{if $forum[folder]} new{/if}"></i><!--{/if}--></div><div class="text"><div class="title">{$forum[name]}<!--{if $forum[todayposts] > 0}--><span class="num">($forum[todayposts])</span><!--{/if}--></div><div class="desc"><span class="subclass">{$forum[description]}</span></div></div></a></li>
				<!--{/loop}-->
			</ul>
		</div>
	</div>
	<!--{/loop}-->
</div>
<!-- main forumlist end -->
<!--{hook/index_middle_mobile}-->
<!--{/if}-->
<!--{template common/footer}-->
