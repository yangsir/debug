<?php exit;?>
<!--{template common/header}-->
<!--{eval $threadsorts = null;}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="{if $_GET[fromguid] == 'hot'}forum.php?mod=guide&view=hot&page=$_GET[page]{else}forum.php?mod=forumdisplay&fid=$_G[fid]{if !$setting['ajaxpage']}&{eval echo rawurldecode($_GET[extra]);}{/if}{/if}"><i class="icon icon-back"></i></a>
        </div>
		<div class="display header-title vm" href="#subname_list">
			<!--{if $_GET['authorid']}-->
				$language[post_author]
			<!--{elseif $_GET['ordertype']}-->
				<!--{if $ordertype == 1}-->$language[post_descview]<!--{else}-->$language[post_ascview]<!--{/if}-->
			<!--{elseif $_GET['page']}-->
				$language[post_all]
			<!--{else}-->
				$language[post_info]
			<!--{/if}-->
			<span class="arrow"></span>
		</div>
		<div class="header-right">
            <span id="replyid"><i class="icon icon-reply"></i></span>
        </div>
	</div>
</header>
<div id="subname_list" class="subname_lists" display="true" style="display:none;">
	<ul>
		<li><a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page" rel="nofollow">$language[post_all]</a></li>
		<li><a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page&authorid=$_G[forum_thread][authorid]" rel="nofollow">$language[post_author]</a></li>
		<li><a href="forum.php?mod=viewthread&tid=$_G[tid]&ordertype={if $ordertype != 1}1{else}2{/if}" rel="nofollow"><!--{if $ordertype != 1}-->$language[post_descview]<!--{else}-->$language[post_ascview]<!--{/if}--></a></li>
		<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if !$setting['ajaxpage']}{if $_GET[extra]}&{eval echo rawurldecode($_GET[extra]);}{/if}{/if}" rel="nofollow">$language[thread_list]</a></li>
	</ul>
</div>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{hook/viewthread_top_mobile}-->
<!-- main postlist start -->
<div class="postlist pagelist">
	<h2>
		<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
			<i class="icon icon-pin"></i>
		<!--{elseif $thread['digest'] > 0}-->
			<i class="icon icon-digest"></i>
		<!--{elseif $_G['forum_thread'][heatlevel]}-->
			<i class="icon icon-hot"></i>
		<!--{elseif $_G['forum_thread']['closed'] == 1}-->
			<i class="icon icon-lock"></i>
		<!--{elseif $_G['forum_thread']['special'] == 1}-->
			<i class="icon icon-poll"></i>
		<!--{elseif $_G['forum_thread']['special'] == 3}-->
			<i class="icon icon-reward"></i>
		<!--{elseif $_G['forum_thread']['special'] == 4}-->
			<i class="icon icon-activity"></i>
		<!--{elseif $_G['forum_thread']['special'] == 5}-->
			<i class="icon icon-debate"></i>
		<!--{elseif $_G['forum_thread']['attachment'] == 2 && $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
			<i class="icon icon-image"></i>
		<!--{elseif $_G['forum_thread']['attachment'] == 1}-->
			<i class="icon icon-common"></i>
		<!--{/if}-->
    	<!--{if $_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}-->
			[{$_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}]
        <!--{/if}-->
        <!--{if $threadsorts && $_G['forum_thread']['sortid']}-->
            [{$_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']]}]
		<!--{/if}-->
		$_G[forum_thread][subject]
        <!--{if $_G['forum_thread'][displayorder] == -2}--> <span>({lang moderating})</span>
        <!--{elseif $_G['forum_thread'][displayorder] == -3}--> <span>({lang have_ignored})</span>
        <!--{elseif $_G['forum_thread'][displayorder] == -4}--> <span>({lang draft})</span>
        <!--{/if}-->
	</h2>
	<!-- more pagelist start -->
	<!--{loop $postlist $post}-->
	<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
	<!--{hook/viewthread_posttop_mobile $postcount}-->
	<div id="pid{$post[pid]}" class="plc cl">
		<!--{if !$post[first]}-->
		<span class="avatar"><img src="<!--{avatar($post[authorid], small, true)}-->" /></span>
		<!--{/if}-->
		<div class="display pi"{if $post[first]} style="margin: 0; padding-top: 5px;"{/if}>
			<ul class="authi"{if $post[first]} style="padding: 0 10px 5px; border-bottom: 1px solid #d9d8d8;"{/if}>
				<li class="grey">
					<em>
						<!--{if isset($post[isstick])}-->
							<i class="icon-settop"></i> {lang from} {$post[number]}{$postnostick}
						<!--{elseif $post[number] == -1}-->
							{lang recommend_post}
						<!--{else}-->
							<!--{if !empty($postno[$post[number]])}-->$postno[$post[number]]<!--{else}-->{$post[number]}{$postno[0]}<!--{/if}-->
						<!--{/if}-->
					</em>
					<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
						<a href="home.php?mod=space&uid=$post[authorid]" class="author blue">$post[author]</a>
					<!--{else}-->
						<!--{if !$post['authorid']}-->
						<a href="javascript:;">{lang guest} <span class="grey" style="margin-left: -10px;">- $post[useip]</span></a>
						<!--{elseif $post['authorid'] && $post['username'] && $post['anonymous']}-->
						<!--{if $_G['forum']['ismoderator']}--><a href="home.php?mod=space&uid=$post[authorid]" target="_blank">{lang anonymous}</a><!--{else}-->{lang anonymous}<!--{/if}-->
						<!--{else}-->
						$post[author] <em>{lang member_deleted}</em>
						<!--{/if}-->
					<!--{/if}-->
				</li>
				<li class="grey rela">
					<!--{if $_G['forum']['ismoderator']}-->
					<!-- manage start -->
					<!--{if $post[first]}-->
						<em><a href="#moption_$post[pid]" class="popup blue"><i class="icon-manage"></i>{lang manage}</a></em>
						<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
							<!--{if !$_G['forum_thread']['sortid'] && !$_G['forum_thread']['special']}-->
							<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
							<!--{/if}-->
							<input type="button" value="{lang delete}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&operation=delete&optgroup=3&from={$_G[tid]}">
							<input type="button" value="{lang close}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&from={$_G[tid]}&optgroup=4">
							<input type="button" value="{lang admin_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
							<input type="button" value="{lang topicadmin_warn_add}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
						</div>
					<!--{else}-->
						<em><a href="#moption_$post[pid]" class="popup blue"><i class="icon-manage"></i>{lang manage}</a></em>
						<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
							<input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
							<!--{if $_G['group']['allowdelpost']}--><input type="button" value="{lang modmenu_deletepost}" class="dialog button" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
							<!--{if $_G['group']['allowbanpost']}--><input type="button" value="{lang modmenu_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
							<!--{if $_G['group']['allowwarnpost']}--><input type="button" value="{lang modmenu_warn}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
						</div>
					<!--{/if}-->
					<!-- manage end -->
					<!--{else}-->
						<!--{if $_G['uid'] == $post['authorid']}--><em><a href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page" class="blue"><i class="icon-manage"></i>{lang edit}</a></em><!--{/if}-->
					<!--{/if}-->
					<!--{if $post[first]}-->
					<!--{eval $favorite = C::t('home_favorite')->fetch_by_id_idtype($_G['tid'], 'tid', $_G['uid']);}-->
					<em><a href="{echo $favorite ? 'home.php?mod=spacecp&ac=favorite&op=delete&favid='.$favorite['favid'] : 'home.php?mod=spacecp&ac=favorite&type=thread&id='.$_G['tid'];}" class="favbtn blue" {if $_G[forum][ismoderator]}style="margin-right: 5px;"{/if}><i class="icon-fav{echo $favorite ? ' on' : '';}"></i>{lang favorite}</a></em>
					<!--{/if}-->
					<!--{if !$post[first]}-->
					<em><a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" class="replybtn blue" {if $_G[forum][ismoderator]}style="margin-right: 5px;"{/if}><i class="icon-reply"></i>{lang reply}</a></em>
					$post[dateline]
					<!--{else}-->
					<span><i class="icon icon-comment"></i>{$_G['forum_thread'][replies]}</span>
					<span><i class="icon icon-view"></i><!--{if $_G['forum_thread']['isgroup'] != 1}-->$_G['forum_thread'][views]<!--{else}-->{$groupnames[$_G['forum_thread'][tid]][views]}<!--{/if}--></span>
					<!--{/if}-->
				</li>
            </ul>
			<!--{if $post[first]}--><!--{ad/lyrs_mobile:mobile_ads/a_cn/4}--><!--{/if}-->
			<div class="message{if $post[first]} wm mtn{/if}">
                	<!--{if $post['warned']}-->
                        <span class="grey quote">{lang warn_get}</span>
                    <!--{/if}-->
                    <!--{if !$post['first'] && !empty($post[subject])}-->
                        <h2><strong>$post[subject]</strong></h2>
                    <!--{/if}-->
                    <!--{if $_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])}-->
                        <div class="grey quote">{lang message_banned}</div>
                    <!--{elseif $_G['adminid'] != 1 && $post['status'] & 1}-->
                        <div class="grey quote">{lang message_single_banned}</div>
                    <!--{elseif $needhiddenreply}-->
                        <div class="grey quote">{lang message_ishidden_hiddenreplies}</div>
                    <!--{elseif $post['first'] && $_G['forum_threadpay']}-->
						<!--{template forum/viewthread_pay}-->
					<!--{else}-->

                    	<!--{if $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))}-->
                            <div class="grey quote">{lang admin_message_banned}</div>
                        <!--{elseif $post['status'] & 1}-->
                            <div class="grey quote">{lang admin_message_single_banned}</div>
                        <!--{/if}-->
                        <!--{if $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0}-->
                            {lang pay_threads}: <strong>$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]} </strong> <a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" >{lang pay_view}</a>
                        <!--{/if}-->

                        <!--{if $post['first'] && $threadsort && $threadsortshow}-->
                        	<!--{if $threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay']}-->
                                <!--{if $threadsortshow['optionlist'] == 'expire'}-->
                                    {lang has_expired}
                                <!--{else}-->
                                    <div class="box_ex2 viewsort">
                                        <h4>$_G[forum][threadsorts][types][$_G[forum_thread][sortid]]</h4>
                                    <!--{loop $threadsortshow['optionlist'] $option}-->
                                        <!--{if $option['type'] != 'info'}-->
                                            $option[title]: <span class="grey"><!--{if $option['value']}-->$option[value] $option[unit]<!--{else}-->--<!--{/if}--></span><br />
                                        <!--{/if}-->
                                    <!--{/loop}-->
                                    </div>
                                <!--{/if}-->
                            <!--{/if}-->
                        <!--{/if}-->
                        <!--{eval $post['message'] = $setting['allowextimg'] ? preg_replace('/\[extimg\]\s*([^\[\<\r\n]+?)\s*\[\/extimg\]/is', '<p class="extimg"><a href="\\1"><img src="\\1" /></a></p>', $post['message']) : $post['message'];}-->
                        <!--{if $post['first']}-->
                            <!--{if !$_G[forum_thread][special]}-->
                                $post[message]
                            <!--{elseif $_G[forum_thread][special] == 1}-->
                                <!--{template forum/viewthread_poll}-->
                            <!--{elseif $_G[forum_thread][special] == 2}-->
                                <!--{template forum/viewthread_trade}-->
                            <!--{elseif $_G[forum_thread][special] == 3}-->
                                <!--{template forum/viewthread_reward}-->
                            <!--{elseif $_G[forum_thread][special] == 4}-->
                                <!--{template forum/viewthread_activity}-->
                            <!--{elseif $_G[forum_thread][special] == 5}-->
                                <!--{template forum/viewthread_debate}-->
                            <!--{elseif $threadplughtml}-->
                                $threadplughtml
                                $post[message]
                            <!--{else}-->
                            	$post[message]
                            <!--{/if}-->
                        <!--{else}-->
                            $post[message]
                        <!--{/if}-->

					<!--{/if}-->
			</div>
			<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
			<div{if $post[first]} class="wm"{/if}>
			<!--{if $post['attachment']}-->
               <div class="grey quote">
               {lang attachment}: <em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em>
               </div>
            <!--{elseif $post['imagelist'] || $post['attachlist']}-->
				<!--{if $post['imagelist']}-->
				<!--{if count($post['imagelist']) == 1}-->
				<ul class="img_one hm">{echo showattach($post, 1)}</ul>
				<!--{else}-->
				<ul class="img_list cl vm">{echo showattach($post, 1)}</ul>
				<!--{/if}-->
				<!--{/if}-->
                <!--{if $post['attachlist']}-->
				<ul>{echo showattach($post)}</ul>
				<!--{/if}-->
			<!--{/if}-->
			</div>
			<!--{/if}-->
		</div>
		<!--{if $post[first]}-->
		<!--{if ($post[tags] || $relatedkeywords) && $_GET['from'] != 'preview' && $setting['showtag']}-->
		<div class="post_tag">
			<strong>$language[tag]:</strong>
			<!--{if $post[tags]}-->
				<!--{eval $tagi = 0;}-->
				<!--{loop $post[tags] $var}-->
					<!--{if $tagi}-->, <!--{/if}--><a href="misc.php?mod=tag&id=$var[0]&type=thread" class="blue">$var[1]</a>
					<!--{eval $tagi++;}-->
				<!--{/loop}-->
			<!--{/if}-->
		</div>
		<!--{/if}-->
		<!--{hook/viewthread_lastpost_mobile}-->
		<div class="dateline grey">
			$post[dateline]
			<em class="y"><a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" class="replybtn blue"><i class="icon-reply"></i>{lang reply}</a></em>
			<!--{if ($_G['group']['allowrecommend'] || !$_G['uid']) && $_G['setting']['recommendthread']['status']}-->
			<!--{if !empty($_G['setting']['recommendthread']['addtext'])}-->
			<em class="y" style="margin-right: 5px;"><a id="recommend_add" href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}" class="raddbtn blue dialog"><i class="icon-agree"></i>$language[recommend]<!--{if $_G['forum_thread']['recommend_add']}--> <i class="grey">($_G[forum_thread][recommend_add])</i><!--{/if}--></a></em>
			<!--{/if}-->
			<!--{/if}-->
		</div>
		<!--{/if}-->
	</div>
	<!--{if $post[first]}-->
	<!--{ad/lyrs_mobile:mobile_ads/a_cn/5}-->
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
	<!--{/if}-->
	<!--{hook/viewthread_postbottom_mobile $postcount}-->
	<!--{eval $postcount++;}-->
	<!--{/loop}-->
	<!-- more pagelist end -->
	<div id="post_new"></div>
</div>
<!-- main postlist end -->
<div class="morebox">
	<!--{eval $totalpage = ceil(($_G['forum_thread']['replies'] + 1) / $_G['ppp']);}-->
	<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="forum.php?mod=viewthread&tid=$_G[tid]{if $_GET['ordertype']}&ordertype=$_GET[ordertype]{/if}" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}-->$multipage<!--{/if}--><!--{/if}-->
</div>
<!--{subtemplate forum/forumdisplay_fastpost}-->
<!--{hook/viewthread_bottom_mobile}-->
<a href="javascript:;" title="{lang scrolltop}" class="scrolltop bottom"></a>
<!--{template common/footer}-->
