<?PHP exit('Access Denied');?>
<!--{eval $threadsort = $threadsorts = null;}-->
<!--{template common/header}-->
<link href="template/rtj1009_005/css/extend_module.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="template/rtj1009_005/js/jQuery.rTabs.js"></script>

		<style type="text/css">
			.tab { position: relative; overflow: hidden; }
			.tab-con { position: relative; }
			.tab-con-item { display: table-cell; float: left; width: 100%; overflow: hidden; }
		</style>

<!-- header start -->
<header class="header rtj1009_header">
    <div class="ren_nav cl">
		<div class="ren_nav_right">
            <a href="#ren_nav_gd" class="ren_view_navgd"><em></em></a>
        </div>
        <div id="ren_nav_gd" class="ren_nav_gd" style="display: none;">
            <div class="ren_gd_list cl">
                <a href="#ren_fengxiang" class="ren_viewdi_fx ren_fengxiang"><em></em><span>分享</span></a>
                <a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]" class="favbtn ren_gd_sc"><em></em><span>收藏</span></a>
                <a href="#fastpostform" class="ren_gd_hf"><em></em><span>回复</span></a>
                <a href="misc.php?mod=report&rtype=post&rid=$post[pid]&tid=$_G[tid]&fid=$_G[fid]" class="dialog ren_gd_jb"><em></em><span>举报</a></li>
            </div>
        </div>
        <script type="text/javascript">
			(function() {
				$('.ren_view_navgd').on('click', function() {
					var obj = $(this);
					var subobj = $(obj.attr('href'));
					if(subobj.css('display') == 'none') {
						subobj.css('display', 'block');
					} else {
						subobj.css('display', 'none');
					}
				});
			 })();
		</script>
        <a href="forum.php?mod=forumdisplay&fid=$_G[fid]" class="z ren_fhjt"><span></span></a>
		<div class="ren_top_dqwz z">
			<!--{if $subexists && $_G['page'] == 1}-->
			<span class="display ren_bk_name ren_vm" href="#subname_list">
				<!--{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}-->
			</span>
			<div id="subname_list" class="subname_list" display="true" style="display:none;">
				<ul>
				<!--{loop $sublist $sub}-->
				<li>
					<a href="forum.php?mod=forumdisplay&fid={$sub[fid]}">{$sub['name']}</a>
				</li>
				<!--{/loop}-->
				</ul>
			</div>
			<!--{else}-->
			<span class="ren_bk_name">
				<!--{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}-->
			</span>
			<!--{/if}-->
		</div>
    </div>
</header>
<!-- header end -->

<div class="ren_footer">
	<ul class="ren_view_foo">
        <a href="#ren_fengxiang" class="ren_viewdi_fx ren_fengxiang"><em></em><span>分享</span></a>
        <a id="replyid" class="ren_viewdi_hf"><em></em><span>回复</span></a>
        <!--{if !empty($_G['setting']['recommendthread']['addtext'])}-->
        <a id="recommend_add" class="favbtn ren_viewdi_dz" href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}" {if $_G['uid']}onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate({$_G['group']['allowrecommend']})');return false;"{else} onclick="showWindow('login', this.href)"{/if} onmouseover="this.title = $('recommendv_add').innerHTML + ' {lang activity_member_unit}$_G[setting][recommendthread][addtext]'" title="{lang maketoponce}" ><em></em><span>点赞</span></a>
        <!--{/if}-->
    </ul>
</div>

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

<!--{hook/viewthread_top_mobile}-->
<!-- main postlist start -->
<div class="postlist rtj1009_m_main m_pb43">
	<div class="ren_view_xxtop">
        <h3>
          $_G[forum_thread][subject]
          <!--{if $_G['forum_thread'][displayorder] == -2}--> <span>({lang moderating})</span>
          <!--{elseif $_G['forum_thread'][displayorder] == -3}--> <span>({lang have_ignored})</span>
          <!--{elseif $_G['forum_thread'][displayorder] == -4}--> <span>({lang draft})</span>
          <!--{/if}-->
        </h3>
        <div class="ren_twsj_xx">
            <a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]" class="favbtn blue ren_twsj_sc" <!--{if $_G[forum][ismoderator]}--><!--{/if}-->>{lang favorite}</a>
            <!--{if ($_G['group']['allowrecommend'] || !$_G['uid']) && $_G['setting']['recommendthread']['status']}-->
            <!--{if !empty($_G['setting']['recommendthread']['addtext'])}-->
            <a id="recommend_add" class="favbtn ren_view_d" href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}" {if $_G['uid']}onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate({$_G['group']['allowrecommend']})');return false;"{else} onclick="showWindow('login', this.href)"{/if} onmouseover="this.title = $('recommendv_add').innerHTML + ' {lang activity_member_unit}$_G[setting][recommendthread][addtext]'" title="{lang maketoponce}">$_G[forum_thread][recommend_add]</a>
            <!--{/if}-->
            <!--{else}-->
        	<span class="ren_twsj_fl z">
            <!--{if $_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}-->
                #{$_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}#
            <!--{elseif $threadsorts && $_G['forum_thread']['sortid']}-->
                #{$_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']]}#
            <!--{else}-->
			<!--{if !IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']}-->
				<a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page&authorid=$_G[forum_thread][authorid]" rel="nofollow" class="ren_zkzz">{lang viewonlyauthorid}</a>
			<!--{elseif !$_G['forum_thread']['archiveid']}-->
				<a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page" rel="nofollow" class="ren_zkzz">{lang thread_show_all}</a>
			<!--{/if}-->
            <!--{/if}-->
            <!--{/if}-->
            </span>
            <span class="ren_twsj_ck z">{$thread[views]}</span>
            <span id="replyid" class="ren_twsj_hf z">{$thread[replies]}</span>
        </div>
    </div>


	<!--{eval $postcount = 0;}-->
	<!--{loop $postlist $post}-->
	<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
	<!--{hook/viewthread_posttop_mobile $postcount}-->
    <!--{if $post[first]}-->
       <div class="ren_view_ny cl" id="pid$post[pid]">
            <div class="ren_lc_xx cl">
                <a href="home.php?mod=space&uid=$post[authorid]&do=profile" class="avatar z"><img src="<!--{if !$post['authorid'] || $post['anonymous']}--><!--{avatar(0, small, true)}--><!--{else}--><!--{avatar($post[authorid], small, true)}--><!--{/if}-->"/></a>
                <div class="ren_lc_zz cl">
                    <div class="ren_lc_zzxx cl">
                        <!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
                            <a href="home.php?mod=space&uid=$post[authorid]&do=profile" class="ren_zz_mz z">$post[author]</a>
        
                        <!--{else}-->
                            <!--{if !$post['authorid']}-->
                            <a href="javascript:;">{lang guest} <em>$post[useip]{if $post[port]}:$post[port]{/if}</em></a>
                            <!--{elseif $post['authorid'] && $post['username'] && $post['anonymous']}-->
                            <!--{if $_G['forum']['ismoderator']}--><a href="home.php?mod=space&uid=$post[authorid]&do=profile" target="_blank">{lang anonymous}</a><!--{else}-->{lang anonymous}<!--{/if}-->
                            <!--{else}-->
                            $post[author] <em>{lang member_deleted}</em>
                            <!--{/if}-->
                        <!--{/if}-->
                        <span>
                            <!--{if isset($post[isstick])}-->
                                <img src ="{IMGDIR}/settop.png" title="{lang replystick}" class="vm" /> {lang from} {$post[number]}{$postnostick}
                            <!--{elseif $post[number] == -1}-->
                                {lang recommend_post}
                            <!--{else}-->
                                <!--{if !empty($postno[$post[number]])}-->$postno[$post[number]]<!--{else}-->{$post[number]}{$postno[0]}<!--{/if}-->
                            <!--{/if}-->
                        </span>
                    </div>
                    <div class="ren_lc_sj cl">
                        <!--{if $_G['forum']['ismoderator']}-->
                        <!-- manage start -->
                        <!--{if $post[first]}-->
                            <em class="y"><a href="#moption_$post[pid]" class="popup blue ren_lc_gl">{lang manage}</a></em>
                            <div id="moption_$post[pid]" popup="true" class="ren_manage" style="display:none;">
                                <!--{if !$_G['forum_thread']['special']}-->
                                <input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
                                <!--{/if}-->
                                <input type="button" value="{lang delete}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&operation=delete&optgroup=3&from={$_G[tid]}">
                                <input type="button" value="{lang close}" class="dialog button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&from={$_G[tid]}&optgroup=4">
                                <input type="button" value="{lang admin_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
                                <input type="button" value="{lang topicadmin_warn_add}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
                            </div>
                        <!--{else}-->
                            <em><a href="#moption_$post[pid]" class="popup blue ren_lc_gl">{lang manage}</a></em>
                            <div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
                                <input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
                                <!--{if $_G['group']['allowdelpost']}--><input type="button" value="{lang modmenu_deletepost}" class="dialog button" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
                                <!--{if $_G['group']['allowbanpost']}--><input type="button" value="{lang modmenu_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
                                <!--{if $_G['group']['allowwarnpost']}--><input type="button" value="{lang modmenu_warn}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
                            </div>
                        <!--{/if}-->
                        <!-- manage end -->
                        <!--{/if}-->
					<!--{if $_G['uid']}-->
						<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))}-->
						<a class="y ren_lc_gl" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">{lang edit}</a>
						<!--{/if}-->
					<!--{/if}-->
						<span class="ren_lc_sjsj">$post[dateline]</span>
                    </div>
                </div>
            </div>
           
           <div class="display pi" href="#replybtn_$post[pid]">
                <div class="message">
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
                                {lang pay_threads}：<strong>$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]} </strong> <a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" >{lang pay_view}</a>
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
                                                $option[title]：<!--{if $option['value']}-->$option[value] $option[unit]<!--{else}--><span class="grey">--</span><!--{/if}--><br />
                                            <!--{/if}-->
                                        <!--{/loop}-->
                                        </div>
                                    <!--{/if}-->
                                <!--{/if}-->
                            <!--{/if}-->
                            <!--{if $post['first']}-->
                                <!--{if $threadsortshow['typetemplate']}-->
                                    $threadsortshow[typetemplate]
											<script type="text/javascript">
												jQuery(function() {
													$("#tab2").rTabs({
														bind : 'click',
														animation : 'left'
													});
													$("#tab4").rTabs({
														bind : 'click',
														animation : 'fadein'
													});
												})
											</script>
                                <!--{elseif $threadsortshow['optionlist']}-->
                                    <div class="typeoption ren_view_flxx">
                                        <!--{if $threadsortshow['optionlist'] == 'expire'}-->
                                            {lang has_expired}
                                        <!--{else}-->
                                            <table summary="{lang threadtype_option}" cellpadding="0" cellspacing="0" class="cgtl ren_view_flxxnr">
                                                <caption>基本信息</caption>
                                                <tbody>
                                                    <!--{loop $threadsortshow['optionlist'] $option}-->
                                                        <!--{if $option['type'] != 'info'}-->
                                                            <tr>
                                                                <th>$option[title]：</th>
                                                                <td><!--{if $option['value'] !== ''}-->$option[value] $option[unit]<!--{else}-->-<!--{/if}--></td>
                                                            </tr>
                                                        <!--{/if}-->
                                                    <!--{/loop}-->
                                                </tbody>
                                            </table>
                                        <!--{/if}-->
                                    </div>
                                <!--{/if}-->
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

    <!--{if $modmenu['post']}-->
        <div id="mdly" class="fwinmask" style="display:none;z-index:350;">
            <table cellspacing="0" cellpadding="0" class="fwin">
                <tr>
                    <td class="t_l"></td>
                    <td class="t_c"></td>
                    <td class="t_r"></td>
                </tr>
                <tr>
                    <td class="m_l">&nbsp;&nbsp;</td>
                    <td class="m_c">
                        <div class="f_c">
                            <div class="c">
                                <h3>{lang admin_select}&nbsp;<strong id="mdct" class="xi1"></strong>&nbsp;{lang piece}: </h3>
                                <!--{if $_G['forum']['ismoderator']}-->
                                    <!--{if $_G['group']['allowwarnpost']}--><a href="javascript:;" onclick="modaction('warn')">{lang modmenu_warn}</a><span class="pipe">|</span><!--{/if}-->
                                    <!--{if $_G['group']['allowbanpost']}--><a href="javascript:;" onclick="modaction('banpost')">{lang modmenu_banpost}</a><span class="pipe">|</span><!--{/if}-->
                                    <!--{if $_G['group']['allowdelpost'] && !$rushreply}--><a href="javascript:;" onclick="modaction('delpost')">{lang modmenu_deletepost}</a><span class="pipe">|</span><!--{/if}-->
                                <!--{/if}-->
                                <!--{if $_G['forum']['ismoderator'] && $_G['group']['allowstickreply'] || $_G['forum_thread']['authorid'] == $_G['uid']}--><a href="javascript:;" onclick="modaction('stickreply')">{lang modmenu_stickpost}</a><span class="pipe">|</span><!--{/if}-->
                                <!--{if $_G['forum_thread']['pushedaid'] && $allowpostarticle}--><a href="javascript:;" onclick="modaction('pushplus', '', 'aid=$_G[forum_thread][pushedaid]', 'portal.php?mod=portalcp&ac=article&op=pushplus')">{lang modmenu_pushplus}</a><span class="pipe">|</span><!--{/if}-->
                            </div>
                        </div>
                    </td>
                    <td class="m_r"></td>
                </tr>
                <tr>
                    <td class="b_l"></td>
                    <td class="b_c"></td>
                    <td class="b_r"></td>
                </tr>
            </table>
        </div><!--{/if}-->
                
                <!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
                <!--{if $post['attachment']}-->
                   <div class="grey quote">
                   {lang attachment}：<em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em>
                   </div>
                <!--{elseif $post['imagelist'] || $post['attachlist']}-->
                   <!--{if $post['imagelist']}-->
                    <!--{if count($post['imagelist']) == 1}-->
                    <ul class="img_one">{echo showattach($post, 1)}</ul>
                    <!--{else}-->
                    <ul class="ren_img_list cl vm">{echo showattach($post, 1)}</ul>
                    <!--{/if}-->
                    <!--{/if}-->
                    <!--{if $post['attachlist']}-->
                    <ul>{echo showattach($post)}</ul>
                    <!--{/if}-->
                <!--{/if}-->
                <!--{/if}-->

           </div>
       </div>
       <div class="ren_lc_ks cl">
       		<span class="ren_lc_ksz z">全部回复<em>{$thread[replies]}</em></span>
            <span class="ren_lc_ksy y">
            <!--{if !IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']}-->
				<a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page&authorid=$_G[forum_thread][authorid]" rel="nofollow" class="ren_lc_zkzz">{lang viewonlyauthorid}</a>
			<!--{elseif !$_G['forum_thread']['archiveid']}-->
				<a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page" rel="nofollow" class="ren_lc_zkzz">{lang thread_show_all}</a>
			<!--{/if}-->
            </span>
       </div>
	<!--{else}-->
    <!--{template forum/ren_viewthread}-->
    <!--{/if}-->
   <!--{hook/viewthread_postbottom_mobile $postcount}-->
   <!--{eval $postcount++;}-->
   <!--{/loop}-->
   
<!--{if $_G[forum_thread][allreplies] == 0 }-->
    <div class="ren_ss_wu">
        <span></span>
        <a href="javascript:;">暂无回复，精采从你开始</a>
    </div>
<!--{/if}-->

<!--{subtemplate forum/forumdisplay_fastpost}-->
$multipage
</div>
<!-- main postlist end -->

<!--{hook/viewthread_bottom_mobile}-->


<div id="ren_fengxiang" class="ren_fengxiang" style="display: none;">
    <div id="ren_tiefx_xx" class="ren_tiefx_xx slide_fx fengxian">
        <div class="bdsharebuttonbox">
            <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin">微信朋友圈</a>
            <a title="分享到QQ好友" href="#" class="popup_sqq" data-cmd="sqq">QQ好友</a>
			<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone">QQ空间</a>
            <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina">新浪微博</a>
        </div>
    </div>
    <div class="ren_tiefx_xxmask ren_aiai" href="#ren_fengxiang"></div>
	<div class="ren_tiefx_qx" href="#ren_fengxiang">取消</div>
</div>

<script type="text/javascript">
	(function() {
		$('.ren_fengxiang').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
</script>

<script type="text/javascript">
	(function() {
		$('.ren_tiefx_xxmask').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
</script>


<script type="text/javascript">
	(function() {
		$('.ren_tiefx_qx').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
</script>

<script type="text/javascript">
	$('.favbtn').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=favbtn&inajax=1',
			data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
			dataType:'xml',
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
			evalscript(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			window.location.href = obj.attr('href');
			popup.close();
		});
		return false;
	});
</script>


<!--{eval $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''}-->
<!--{if strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : 'http://www.discuz.net/mobile.php?platform=ios';}-->
<!--{elseif strpos($useragent, 'android') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : 'http://www.discuz.net/mobile.php?platform=android';}-->
<!--{elseif strpos($useragent, 'windows phone') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : 'http://www.discuz.net/mobile.php?platform=windowsphone';}-->
<!--{/if}-->

<div id="mask" style="display:none;"></div>
<!--{if !$nofooter}-->

<!--{/if}-->
</body>
</html>
<!--{eval updatesession();}-->
<!--{if defined('IN_MOBILE')}-->
	<!--{eval output();}-->
<!--{else}-->
	<!--{eval output_preview();}-->
<!--{/if}-->
