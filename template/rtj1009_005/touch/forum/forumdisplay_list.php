<?PHP exit('Access Denied');?>
<!--{if empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']}-->
    <ul class="z ren_list cl">
    <!--{if $_G['forum_threadcount']}-->
        <!--{loop $_G['forum_threadlist'] $key $thread}-->
            <!--{if !$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0}-->
                {eval continue;}
            <!--{/if}-->
            <!--{if $thread['displayorder'] > 0 && !$displayorder_thread}-->
                {eval $displayorder_thread = 1;}
            <!--{/if}-->
            <!--{if $thread['moved']}-->
                <!--{eval $thread[tid]=$thread[closed];}-->
            <!--{/if}-->
            
            
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
                            <a id="followmod" class="ren_zz_gz" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$thread[authorid]" id="followmod_$thread[authorid]" onclick="showWindow('followmod', this.href, 'get', 0);">+ 关注</a>
                      	<!--{/if}-->
                    </div>
                </div>
                <div class="ren_tw_yiimg">
                    <!--{if $threadlistimg}-->
                    <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" $thread[highlight] class="ren_threadimg y">
                        <!--{if $ren_pic <=2}-->
                        <!--{loop $threadlistimg $values}-->
                        <!--{eval $renlistimgkey = getforumimg($values[aid], 0, 200, 140); }-->
                            <span class="ren_thread_imge ren_thread_img"><img src="$renlistimgkey" alt="$thread[subject]"/></span>
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
                            <a id="followmod" class="ren_zz_gz" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$thread[authorid]" id="followmod_$thread[authorid]" onclick="showWindow('followmod', this.href, 'get', 0);">+ 关注</a>
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
    
    <!--{else}-->
    <li class="ren_wtie_ts">{lang forum_nothreads}</li>
    <!--{/if}-->
	</ul>
    
<!--{else}--> 
    <div id="ren_pbl_list" class="z ren_pbl_list cl">
        <ul id="waterfall" class="waterfall cl">
    <!--{if $_G['forum_threadcount']}-->
    <!--{loop $_G['forum_threadlist'] $key $thread}-->
              <!--{if $_G['hiddenexists'] && $thread['hidden']}-->
                  <!--{eval continue;}-->
              <!--{/if}-->
              <!--{if !$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
                  <!--{if $thread['related_group'] == 0 && $thread['closed'] > 1}-->
                      <!--{eval $thread[tid]=$thread[closed];}-->
                  <!--{/if}-->
              <!--{/if}-->
              <!--{eval $waterfallwidth = $_G[setting][forumpicstyle][thumbwidth] + 100; }-->
              <li>
                  <div class="ren_pbl_wk cl">
                      <div class="ren_pbl_img cl">
                          <a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" title="$thread[subject]" class="z">
                              <!--{if $thread['cover']}-->
                                  <img src="$thread[coverpath]"/>
                              <!--{else}-->
                                  <span class="nopic"></span>
                              <!--{/if}-->
                          </a>
                      </div>
                      
                      <h3 class="ren_pbl_bt">
                          <a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight]{if $thread['isgroup'] == 1 || $thread['forumstick']}{else} onclick="atarget(this)"{/if} title="$thread[subject]">$thread[subject]</a>
                      </h3>
                      <div class="ren_tielb_zz cl">
                          <a class="ren_zz_tx z" href="home.php?mod=space&uid=$thread[authorid]"><!--{avatar($thread[authorid],small)}--></a>
                          <!--{if $thread['authorid'] && $thread['author']}-->
                          <a class="ren_zz_mc z" href="home.php?mod=space&uid=$thread[authorid]">$thread[author]</a><!--{if !empty($verify[$thread['authorid']])}--> $verify[$thread[authorid]]<!--{/if}-->
                          <!--{else}-->
                              $_G[setting][anonymoustext]
                          <!--{/if}-->
                          <div class="ren_zz_ck y">
                              <!--{if $thread[views]}-->$thread[views]<!--{else}-->0<!--{/if}-->
                          </div>
                      </div>
                  </div>
                  <div class="ren_pbl_no"></div>
              </li>
              <!--{/loop}-->
        <!--{else}-->
        <li class="ren_wtie_ts">{lang forum_nothreads}</li>
        <!--{/if}-->
        </ul>
    </div>
    
    
    <div id="tmppic" style="display: none;"></div>
	<script type="text/javascript" src="template\rtj1009_005\js\redef.js?{VERHASH}"></script>
	<script type="text/javascript" reload="1">
          var wf = {};

          _attachEvent(window, "load", function () {
              if(jq("waterfall")) {
                  wf = waterfall();
              }
          });

    </script>
 <!--{/if}-->  