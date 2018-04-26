<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!-- header start -->
<link href="template/rtj1009_005/css/extend_module.css" rel="stylesheet" type="text/css" />

<header class="header rtj1009_header">
    <div class="ren_nav cl">
		<div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
        <a href="forum.php?forumlist=1" class="z ren_fhjt"><span></span></a>
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


<!--{hook/forumdisplay_top_mobile}-->
<!-- main threadlist start -->
<!--{if !$subforumonly}-->
<div id="ren_tie_list" class="ren_tie_list rtj1009_m_main m_pb12 cl">
	<div class="ren_bk_top cl">
        <div id="ren_bk_topz" class="z ren_bk_topz cl">
            <div class="head_bktp z cl">
                <a href="forum.php?mod=forumdisplay&fid=$_G[fid]">
                   <img src="<!--{if $_G['forum'][icon]}-->data/attachment/common/$_G['forum'][icon]<!--{else}-->{$_G['style']['styleimgdir']}/rtj_zwtp100.jpg<!--{/if}-->" alt="{$_G['forum'][name]}">
                </a>           							 							
            </div>
            <div class="ren_bk_xx z cl">
                <h1 class="ren_bk_biaoti z"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]">$_G['forum'][name]</a></h1>
                <p class="ren_bk_num z">帖子数：<span class="tieshu">$_G[forum][posts]</span></p>
            </div>
            <p class="ren_bk_js z">
                <!--{if $_G[forum][description]}-->{$_G[forum][description]}<!--{else}-->暂无简介, 请在后台版块管理中添加!<!--{/if}-->
            </p>
        </div>
        <div class="ren_bk_ft y"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" title="{lang send_threads}">发帖</a></div>
    </div>
    
    <div class="z rtj1009_th cl">
        <!--{if ($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || count($_G['forum']['threadsorts']['types']) > 0}-->
        <div class="ren_m_lx cl">
            <ul id="ren_m_typesm" class="ren_lx_nv cl">
                <!--{if $_G['forum']['threadtypes']}-->
                <li id="ren_ttp_all" {if !$_GET['typeid'] && !$_GET['sortid']}class="a"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_G['forum']['threadsorts']['defaultshow']}&filter=sortall&sortall=1{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">全部</a></li>
                    <!--{loop $_G['forum']['threadtypes']['types'] $id $name}-->
                        <!--{if $_GET['typeid'] == $id}-->
                        <li class="a"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['sortid']}&filter=sortid&sortid=$_GET['sortid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name</a></li>
                        <!--{else}-->
                        <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name</a></li>
                        <!--{/if}-->
                    <!--{/loop}-->
                <!--{/if}-->
    
                <!--{if $_G['forum']['threadsorts']}-->
                    <!--{if $_G['forum']['threadtypes']}--><!--{/if}-->
                    <!--{loop $_G['forum']['threadsorts']['types'] $id $name}-->
                        <!--{if $_GET['sortid'] == $id}-->
                        <li class="a"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['typeid']}&filter=typeid&typeid=$_GET['typeid']{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name</a></li>
                        <!--{else}-->
                        <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$id$forumdisplayadd[sortid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">$name</a></li>
                        <!--{/if}-->
                    <!--{/loop}-->
                <!--{/if}-->
            </ul>
        </div>
        <!--{else}-->
        <div class="ren_tf cl">
        
        	<!--{if ($_GET['typeid'] || $_GET['sortid']) && !($_GET['filter'] && $_G['gp_specialtype'])}-->
        	<a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_G['forum']['threadsorts']['defaultshow']}&filter=sortall&sortall=1{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="a">全部</a>
            <!--{else}-->
            <a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_G['forum']['threadsorts']['defaultshow']}&filter=sortall&sortall=1{/if}{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="{if !$filter} a{/if}">全部</a>
            <!--{/if}-->
            <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=author&orderby=dateline$forumdisplayadd[author]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="ren_lbzxhf{if $_GET['filter'] == 'author'} a{/if}">最新</a>
            <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="ren_lbzkjh{if $_GET['filter'] == 'digest'} a{/if}">精华</a>
            
        </div>
        <!--{/if}-->
    </div>
<!--{if empty($_G['forum']['sortmode'])}-->
    <!--{subtemplate forum/forumdisplay_list}-->
<!--{else}-->
    <!--{subtemplate forum/forumdisplay_sort}-->
<!--{/if}--> 

$multipage
</div>



<!--{/if}-->
<!-- main threadlist end -->
<!--{hook/forumdisplay_bottom_mobile}-->
<div class="pullrefresh" style="display:none;"></div>


<div class="ren_scrolltop">
    <a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" id="replyid" class="ren_di_huifu"></a>
</div>

<!--{template common/footer}-->