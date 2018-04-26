<?PHP exit('Access Denied');?>
<div class="ren_tie_list rtj1009_ss_main cl">

	<!--{if empty($threadlist)}-->
	<div class="ren_ss_wu">
    	<span></span>
        <a href="javascript:;">{lang search_nomatch}</a>
    </div>
	<!--{else}-->
    	<div class="ren_ss_tit"><!--{if $keyword}-->{lang search_result_keyword} <!--{if $modfid}--><a href="forum.php?mod=modcp&action=thread&fid=$modfid&keywords=$modkeyword&submit=true&do=search&page=$page" target="_blank">{lang goto_memcp}</a><!--{/if}--><!--{else}-->{lang search_result}<!--{/if}--></div>
			<ul class="z ren_list cl">
				<!--{loop $threadlist $thread}-->
                
                            <!--{eval include_once libfile('function/post');
              	include_once libfile('function/attachment');
              	$thread['post'] = C::t('forum_post')->fetch_all_by_tid_position($thread['posttableid'],$thread['tid'],1);
              	$thread['post'] = array_shift($thread['post']);
              	$ren_pic = C::t('forum_attachment_n')->count_image_by_id('tid:'.$thread['post']['tid'], 'pid', $thread['post']['pid']);
            }-->
            
            <!--{if $ren_pic <=2}--><!--{eval  $threadlistimg =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 1 );}--><!--{/if}-->
            <!--{if $ren_pic >=3}--><!--{eval  $threadlistimg =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 3 );}--><!--{/if}-->
            <!--{if $ren_pic <=2}-->
				<li>
                <div class="ren_twsj">
                    <a class="ren_twus_img z cl" href="home.php?mod=space&uid=$thread[authorid]&do=profile">
                        <!--{avatar($thread[authorid],small)}-->
                    </a>				
                    <!--{if $thread['authorid'] && $thread['author']}-->
                    <a class="ren_twus_name z cl" href="home.php?mod=space&uid=$thread[authorid]&do=profile">$thread[author]</a><!--{if !empty($verify[$thread['authorid']])}--> $verify[$thread[authorid]]<!--{/if}-->
                    <!--{else}-->
                        $_G[setting][anonymoustext]
                    <!--{/if}-->
                    <div class="y">
                        <!--{if helper_access::check_module('follow')}-->
                            <a class="ren_zz_gz" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$thread[authorid]" id="followmod_$thread[authorid]" title="{lang follow}" class="xi2" onclick="showWindow('followmod', this.href, 'get', 0);">关注</a>
                        <!--{/if}-->
                    </div>
                </div>
                <div class="ren_tw_yiimg">
                    <!--{if $threadlistimg}-->
                    <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight] class="ren_threadimg y">
                        <!--{if $ren_pic <=2}-->
                        <!--{loop $threadlistimg $values}-->
                        <!--{eval $renlistimgkey = getforumimg($values[aid], 0, 200, 140); }-->
                            <span class="ren_thread_imge ren_thread_img"><img src="$renlistimgkey"/></span>
                        <!--{/loop}-->
                        <!--{/if}-->
                    </a>
                    <!--{/if}-->
                    <div class="ren_tw_yi">
                        <!--{hook/forumdisplay_thread_mobile $key}-->
                        <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
                            <span class="ren_zhiding">置顶</span>
                        <!--{elseif $thread['digest'] > 0}-->
                            <span class="ren_jinghua">精华</span>
    
                        <!--{/if}-->
                        <!--{if !$_G[forum_thread][special]}-->
                            {if $thread['special'] == 1}<span class="ren_jinghua">{lang thread_poll}</span>{/if}
                            {if $thread['special'] == 2}<span class="ren_jinghua">{lang thread_trade}</span>{/if}
                            {if $thread['special'] == 3}<span class="ren_jinghua">{lang thread_reward}</span>{/if}
                            {if $thread['special'] == 4}<span class="ren_jinghua">{lang thread_activity}</span>{/if}
                            {if $thread['special'] == 5}<span class="ren_jinghua">{lang thread_debate}</span>{/if}
                        <!--{/if}-->
    
                        <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight]>{$thread[subject]}</a>
                     </div>
                 </div>
               
                <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight] class="ren_twsj_xx" >
                	<span class="ren_twsj_sj z">{$thread[dateline]}</span>
                    <span class="ren_twsj_ck z">{$thread[views]}</span>
                    <span class="ren_twsj_hf z">{$thread[replies]}</span>
                </a>
            </li>
                        <!--{else}-->
            <li>
                <div class="ren_twsj">
                    <a class="ren_twus_img z cl" href="home.php?mod=space&uid=$thread[authorid]&do=profile">
                        <!--{avatar($thread[authorid],small)}-->
                    </a>				
                    <!--{if $thread['authorid'] && $thread['author']}-->
                    <a class="ren_twus_name z cl" href="home.php?mod=space&uid=$thread[authorid]&do=profile">$thread[author]</a><!--{if !empty($verify[$thread['authorid']])}--> $verify[$thread[authorid]]<!--{/if}-->
                    <!--{else}-->
                        $_G[setting][anonymoustext]
                    <!--{/if}-->
                    <div class="y">
                        <!--{if helper_access::check_module('follow')}-->
                            <a class="ren_zz_gz" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$thread[authorid]" id="followmod_$thread[authorid]" title="{lang follow}" class="xi2" onclick="showWindow('followmod', this.href, 'get', 0);">关注</a>
                        <!--{/if}-->
                    </div>
                </div>
                <div class="ren_twbt">
                    <!--{hook/forumdisplay_thread_mobile $key}-->
                    <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
                        <span class="ren_zhiding">置顶</span>
                    <!--{elseif $thread['digest'] > 0}-->
                        <span class="ren_jinghua">精华</span>

                    <!--{/if}-->
                    <!--{if !$_G[forum_thread][special]}-->
                        {if $thread['special'] == 1}<span class="ren_jinghua">{lang thread_poll}</span>{/if}
                        {if $thread['special'] == 2}<span class="ren_jinghua">{lang thread_trade}</span>{/if}
                        {if $thread['special'] == 3}<span class="ren_jinghua">{lang thread_reward}</span>{/if}
                        {if $thread['special'] == 4}<span class="ren_jinghua">{lang thread_activity}</span>{/if}
                        {if $thread['special'] == 5}<span class="ren_jinghua">{lang thread_debate}</span>{/if}
                    <!--{/if}-->

                    <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight]>{$thread[subject]}</a>
                 </div>
                <!--{if $threadlistimg}-->
                <div class="ren_threadimg">
                    <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight]>
                        <!--{if $ren_pic >=3}-->
                        <!--{loop $threadlistimg $values}-->
                        <!--{eval $renlistimgkey = getforumimg($values[aid], 0, 200, 140); }-->
                            <span class="ren_thread_imgsan ren_thread_img"><img src="$renlistimgkey"/></span>
                        <!--{/loop}-->
                        <!--{/if}-->
                    </a>
                </div>
                <!--{/if}-->
               
                <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight] class="ren_twsj_xx" >
                	<span class="ren_twsj_sj z">{$thread[dateline]}</span>
                    <span class="ren_twsj_ck z">{$thread[views]}</span>
                    <span class="ren_twsj_hf z">{$thread[replies]}</span>
                </a>
            </li>
            <!--{/if}-->
				<!--{/loop}-->
			</ul>
	<!--{/if}-->
	$multipage
</div>
