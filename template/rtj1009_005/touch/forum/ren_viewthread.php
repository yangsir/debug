<?PHP exit('Access Denied');?>
<div class="ren_view_ny cl" id="pid$post[pid]">
    <div class="ren_lchf_xx cl">
        <a href="home.php?mod=space&uid=$post[authorid]&do=profile" class="ren_avatar z"><img src="<!--{if !$post['authorid'] || $post['anonymous']}--><!--{avatar(0, small, true)}--><!--{else}--><!--{avatar($post[authorid], small, true)}--><!--{/if}-->"/></a>
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
                        {lang pay_threads}£º<strong>$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]} </strong> <a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" >{lang pay_view}</a>
                    <!--{/if}-->
                        $post[message]

                <!--{/if}-->
        </div>
        <!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
        <!--{if $post['attachment']}-->
           <div class="grey quote">
           {lang attachment}£º<em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em>
           </div>
        <!--{elseif $post['imagelist'] || $post['attachlist']}-->
           <!--{if $post['imagelist']}-->
            <!--{if count($post['imagelist']) == 1}-->
            <ul class="img_one">{echo showattach($post, 1)}</ul>
            <!--{else}-->
            <ul class="img_list cl vm">{echo showattach($post, 1)}</ul>
            <!--{/if}-->
            <!--{/if}-->
            <!--{if $post['attachlist']}-->
            <ul>{echo showattach($post)}</ul>
            <!--{/if}-->
        <!--{/if}-->
        <!--{/if}-->

   </div>
    <div class="ren_lc_sjhf">
        <div class="ren_lc_sj cl">
            <!--{if $_G['forum']['ismoderator']}-->
            <!-- manage start -->
            <em><a href="#moption_$post[pid]" class="popup blue ren_lc_gl">{lang manage}</a></em>
            <div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
                <input type="button" value="{lang edit}" class="redirect button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
                <!--{if $_G['group']['allowdelpost']}--><input type="button" value="{lang modmenu_deletepost}" class="dialog button" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
                <!--{if $_G['group']['allowbanpost']}--><input type="button" value="{lang modmenu_banpost}" class="dialog button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
                <!--{if $_G['group']['allowwarnpost']}--><input type="button" value="{lang modmenu_warn}" class="dialog button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
            </div>
            <!-- manage end -->
            <!--{/if}-->
            <span>$post[dateline]</span>
            <div id="replybtn_$post[pid]" class="view_renreply fnd">
                <a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" class="favbtn">»Ø¸´</a>
                <a href="misc.php?mod=report&rtype=post&rid=$post[pid]&tid=$_G[tid]&fid=$_G[fid]" class="dialog ren_lc_jb"></a>
            </div>
        </div>
    </div>
</div>