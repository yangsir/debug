<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="{if $_G['forum']['type'] == 'sub'}forum.php?mod=forumdisplay&fid=$_G['forum']['fup']{else}forum.php?mod=forum{/if}"><i class="icon icon-back"></i></a>
        </div>
		<div class="display header-title vm" href="#subname_list">
			<!--{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}-->
			<!--{if $subexists && $_G['page'] == 1}--><span class="arrow"></span><!--{/if}-->
		</div>
		<div class="header-right">
            <a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" title="{lang send_threads}"><i class="icon icon-post"></i></a>
        </div>
	</div>
</header>
<!--{if $subexists && $_G['page'] == 1}-->
<div id="subname_list" class="subname_lists" display="true" style="display:none;">
	<ul>
	<!--{loop $sublist $sub}-->
	<li>
		<a href="forum.php?mod=forumdisplay&fid={$sub[fid]}">{$sub['name']}</a>
	</li>
	<!--{/loop}-->
	</ul>
</div>
<!--{/if}-->
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{hook/forumdisplay_top_mobile}-->
<!-- main threadlist start -->
<!--{if !$subforumonly}-->
<div class="managebox">
	<div class="title">
		<span class="act typebtn">
			<i class="icon-type"></i><em>{lang types}</em>
		</span>
		<span class="act line">
			<!--{eval $favorite = C::t('home_favorite')->fetch_by_id_idtype($_G['fid'], 'fid', $_G['uid']);}-->
			<a href="{echo $favorite ? 'home.php?mod=spacecp&ac=favorite&op=delete&favid='.$favorite['favid'] : 'home.php?mod=spacecp&ac=favorite&type=forum&id='.$_G['fid'];}" class="favbtn"><i class="icon-fav{echo $favorite ? ' on' : '';}"></i><em>{lang favorite}</em></a>
		</span>
	</div>
	<div class="type_list cl hide">
		<ul>
			<li {if !$_GET['filter'] && !$_GET['typeid'] && !$_GET['sortid']}class="on"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_G['forum']['threadsorts']['defaultshow']}&filter=sortall&sortall=1{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang forum_viewall}</a></li>
		</ul>
		<ul>
			<li {if $_GET['filter'] == 'lastpost'}class="on"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost">{$language[lastpost]}</a></li>
			<li {if $_GET['filter'] == 'digest'}class="on"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1">{lang digest_posts}</a></li>
			<!--{if $_G['forum']['threadtypes']}-->
		</ul>
		<ul>
			<!--{eval $i = 0;}-->
			<!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
			<!--{eval $i ++;}-->
			<!--{if $_GET['typeid'] == $id}-->
			<li class="on"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['sortid']}&filter=sortid&sortid=$_GET['sortid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name<!--{if $showthreadclasscount[typeid][$id]}--><span class="num">$showthreadclasscount[typeid][$id]</span><!--{/if}--></a></li>
			<!--{else}-->
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name<!--{if $showthreadclasscount[typeid][$id]}--><span class="num">$showthreadclasscount[typeid][$id]</span><!--{/if}--></a></li>
			<!--{/if}-->
			<!--{if $i % 2 == 0}--></ul><ul><!--{/if}-->
			<!--{/loop}-->
			<!--{/if}-->
		</ul>
	</div>
</div>
<!--{ad/lyrs_mobile:mobile_ads/a_cn/3}-->
<div class="threadlist">
	<ul class="pagelist">
	<!--{if $_G['forum_threadcount']}-->
		<!-- more pagelist start -->
		<!--{if empty($_G['forum']['picstyle'])}-->
		<!--{loop $_G['forum_threadlist'] $key $thread}-->
		<!--{if !$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0}-->
			{eval continue;}
		<!--{/if}-->
    	<!--{if $thread['displayorder'] > 0 && !$displayorder_thread}-->
    		{eval $displayorder_thread = 1;}
        <!--{/if}-->
		<!--{if $thread['moved']}-->
			<!--{eval $thread[tid] = $thread[closed];}-->
		<!--{/if}-->
		<li>
			<!--{hook/forumdisplay_thread_mobile $key}-->
            <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight]>
	            <div class="title">
					<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
						<i class="icon icon-pin"></i>
					<!--{elseif $thread['digest'] > 0}-->
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
					<span class="author">{$thread[author]} - {$thread[dateline]}</span>
					<span class="num">{$thread[replies]} / <!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
				</p>
			</a>
		</li>
        <!--{/loop}-->
        <!--{else}-->
		<!--{loop $_G['forum_threadlist'] $key $thread}-->
		<!--{if $_G['hiddenexists'] && $thread['hidden']}-->
			<!--{eval continue;}-->
		<!--{/if}-->
		<!--{if !$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
			<!--{if $thread['related_group'] == 0 && $thread['closed'] > 1}-->
				<!--{eval $thread[tid]=$thread[closed];}-->
			<!--{/if}-->
		<!--{/if}-->
		<li>
			<!--{hook/forumdisplay_thread_mobile $key}-->
            <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight]>
				<!--{if $thread['cover']}-->
					<img src="$thread[coverpath]" alt="$thread[subject]" width="{$_G[setting][forumpicstyle][thumbwidth]}" />
				<!--{/if}-->
	            <div class="title{if $thread['cover']} phototitle{/if}">
					<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
						<i class="icon icon-pin"></i>
					<!--{elseif $thread['digest'] > 0}-->
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
					<span class="author">$thread[author]</span>
					<span class="num">{$thread[replies]} / <!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
				</p>
			</a>
		</li>
        <!--{/loop}-->
        <!--{/if}-->
        <!-- more pagelist end -->
    <!--{else}-->
		<li>{lang forum_nothreads}</li>
	<!--{/if}-->
	</ul>
</div>

<div class="morebox">
	<!--{eval $totalpage = ceil($_G['forum_threadcount'] / $_G['tpp']);}-->
	<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="forum.php?mod=forumdisplay&fid=$_G[fid]" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}-->$multipage<!--{/if}--><!--{/if}-->
</div>

<!--{/if}-->
<!-- main threadlist end -->

<!--{hook/forumdisplay_bottom_mobile}-->
<!--{if $setting['ajaxpage']}--><a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a><!--{/if}-->
<!--{template common/footer}-->
