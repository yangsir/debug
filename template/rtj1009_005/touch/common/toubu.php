<?PHP exit('Access Denied');?>

<div class="ren_cnav_wrapper ren_cnav_border ren_cnav_line">
    <div class="ren_nav_user cl">
        <!--{if !$_G[uid] && !$_G['connectguest']}-->
        <div class="ren_userinfo cl">
            <a class="ren_us_avatar_m" href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->"><img src="<!--{avatar($_G[uid], small, true)}-->" /></a>
            <h3 class="ren_us_name">Hi 游客</h3>
            <a class="ren_us_dl" href="member.php?mod=logging&action=login" title="{lang login}">{lang login}</a>
            <a class="ren_us_zc" href="<!--{if $_G['setting']['regstatus']}-->member.php?mod={$_G[setting][regname]}<!--{else}-->javascript:;" style="color:#D7D7D7;<!--{/if}-->" title="{$_G['setting']['reglinkname']}">{lang register}</a>
        </div>
        <!--{else}-->
        <div class="ren_userinfo cl">
            <a class="ren_us_avatar_m" href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->"><img src="<!--{avatar($_G[uid], small, true)}-->" /></a>
            <h3 class="ren_us_name">$_G[username]</h3>
            <a class="ren_us_tc" href="member.php?mod=logging&action=logout&formhash={FORMHASH}" title="{lang logout}" class="dialog">{lang logout}</a>
        </div>
        <!--{/if}-->
    </div>
    
    <div class="ren_nav_list cl">
        <div class="ren_nav_fx cl">发现</div>
        <ul class="cl">
            <li class="ren_top_tj"><a href="portal.php?mod=index" class="icon_fx">首页</a></li>
            <li class="ren_top_hd"><a href="/news" class="icon_fx">新闻</a></li>
            <li class="ren_top_yj"><a href="search.php?mod=forum" class="icon_fx">搜索</a></li>
            <li class="ren_top_lt"><a href="forum.php?forumlist=1" class="icon_fx">论坛</a></li>
        </ul>
    </div>
    
    <div class="ren_nav_list cl">
        <div class="ren_nav_wd cl">我的</div>
        <ul class="cl">
            <li class="ren_top_xlkongjian"><a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1">我的空间</a></li>
            <li class="tit_msg ren_top_xlxiaoxi"><a href="home.php?mod=space&do=pm">{lang mypm}<!--{if $_G[member][newpm] || $_G[member][newprompt]}--><span class="ren_ynew"></span><!--{/if}--></a></li>
            <li class="ren_mypost"><a href="home.php?mod=space&uid={$_G[uid]}&do=thread&view=me">我的帖子</a></li>
            <li class="ren_top_xlzhsz"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile">{lang myprofile}</a></li>
        </ul>
    </div>
</div>