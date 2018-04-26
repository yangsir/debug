<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{eval $list = array();}-->
<!--{eval $wheresql = category_get_wheresql($cat);}-->
<!--{eval $list = category_get_list($cat, $wheresql, $page);}-->


<!-- header-->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
    	<a href="/{if $cat[upid]}portal.php?mod=list&catid=$cat[upid]{else}forum.php{/if}" class="z ren_fhjt"><span></span></a>
        <div class="ren_top_grkj z">
            <span class="ren_bk_name ren_vm">$cat[catname]</span>
        </div>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->

<div class="rtj1009_wz_list pbt45">

<div class="rtj1009_wz_nav cl">
    <ul class="cl">
        <!--{loop $cat[others] $value}-->
        <li {if $_GET['catid'] == $value[catid]} class="a"{/if}><a href="/{$portalcategory[$value['catid']]['caturl']}">$value[catname]</a></li>
        
        <!--{/loop}-->
    </ul>
</div>



<!--{if $list['list']}-->
	<div class="ren_yixz_xx cl">
        <ul>
        <!--{loop $list['list'] $value}-->
            <!--{eval $highlight = article_title_style($value);}-->
            <!--{eval $article_url = fetch_article_url($value);}-->
            <li class="ren_yixzxxk zbxxk1">
                <!--{if $value[pic]}--><a href="/$article_url" class="z ren_tieimg"><img src="/$value[pic]" alt="$value[title]" class="tn" /></a><!--{/if}-->
                <a href="/$article_url" class="ren_tiexx cl">
                    <div class="ren_twbt">
                        <span>
                            $value[title]<!--{if $value[status] == 1}-->({lang moderate_need})<!--{/if}-->
                        </span>
                    </div>
                    <div class="ren_twxxx">
                    	<span class="z ren_tie_ztfl">$value[dateline]</span>
                    </div>
                </a>
            </li>
        <!--{/loop}-->
        </ul>
		<!--{if $list['multi']}--><div class="pgs cl">{$list['multi']}</div><!--{/if}-->
	</div>
<!--{else}-->
	<div class="ren_ss_wu">
    	<span></span>
        <a href="javascript:;">ÔÝÎÞÄÚÈÝ</a>
    </div>
<!--{/if}-->
 
 
<script type="text/javascript" src="/template/rtj1009_005/js/index.js"></script>
</div>
<!--{template common/footer}-->