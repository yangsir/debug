<?PHP exit('Access Denied');?>
<!--{template common/header}-->

<script type="text/javascript" src="{$_G['setting']['jspath']}forum_viewthread.js?{VERHASH}"></script>
<script type="text/javascript">zoomstatus = parseInt($_G['setting']['zoomstatus']), imagemaxwidth = '{$_G['setting']['imagemaxwidth']}', aimgcount = new Array();</script>

<!-- header-->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
    	<a href="portal.php?mod=list&catid=$article[catid]" class="z ren_fhjt"><span></span></a>
        <div class="ren_top_grkj z">
            <span class="ren_bk_name ren_vm">详情</span>
        </div>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->

<div class="ren_footer">
	<ul class="ren_view_foo">
        <a href="#ren_fengxiang" class="ren_viewdi_fx ren_fengxiang"><em></em><span>分享</span></a>
        <a href="#message" id="replyid" class="ren_viewdi_hf"><em></em><span>评论</span></a>
        <!--{if !empty($_G['setting']['recommendthread']['addtext'])}-->
        <a id="recommend_add" class="favbtn ren_viewdi_dz" href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}" {if $_G['uid']}onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate({$_G['group']['allowrecommend']})');return false;"{else} onclick="showWindow('login', this.href)"{/if} onmouseover="this.title = $('recommendv_add').innerHTML + ' {lang activity_member_unit}$_G[setting][recommendthread][addtext]'" title="{lang maketoponce}" ><em></em><span>点赞</span></a>
        <!--{/if}-->
    </ul>
</div>

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

<div class="rtj1009_m_view rtj1009_m_main m_pb43">
	<div class="ren_view">
        <div class="ren_view_wztop">
            <h3 class="ph">$article[title] <!--{if $article['status'] == 1}-->({lang moderate_need})<!--{elseif $article['status'] == 2}-->({lang ignored})<!--{/if}--></h3>
            <div class="ren_twsj_xx">
            	<span class="ren_twsj_fl z">$cat[catname] </span>
                <span class="ren_twsj_sj z">$article[dateline]</span>
            </div>
        </div>


        <!--{if $article[summary] && empty($cat[notshowarticlesummay])}--><div class="ren_wz_zy"><div class="ren_zyxx"><span>{lang article_description}</span>$article[summary]</div><!--{hook/view_article_summary}--></div><!--{/if}-->


        <div class="ren_wz_nr">
            <div class="message">
                <!--{if $content[title]}-->
                <div class="vm_pagetitle xw1">$content[title]</div>
                <!--{/if}-->
                $content[content]
            </div>
            <!--{hook/view_article_content}-->
            <!--{if $multi}--><div class="ptw pbw cl">$multi</div><!--{/if}-->


            <script type="text/javascript" src="{$_G[setting][jspath]}home.js?{VERHASH}"></script>
            <div id="click_div" class="ren_click">
                <!--{template home/space_click}-->
            </div>

            <!--{if !empty($contents)}-->
            <div id="inner_nav" class="ptn xs1">
                <h3>{lang article_inner_navigation}</h3>
                <ul class="xl xl2 cl">
                    <!--{loop $contents $key $value}-->
                    <!--{eval $curpage = $key+1;}-->
                    <!--{eval $inner_view_url = helper_page::mpurl($viewurl, '&page=', $curpage);}-->
                    <li>&bull; <a href="$inner_view_url"{if $key === $start} class="xi1"{/if}>{lang article_inner_page_pre} {$curpage} {lang article_inner_page} $value[title]</a></li>
                    <!--{/loop}-->
                </ul>
            </div>
            <!--{/if}-->


        </div>
        <!--{if !empty($aimgs[$content[pid]])}-->
            <script type="text/javascript" reload="1">aimgcount[{$content[pid]}] = [<!--{echo implode(',', $aimgs[$content[pid]]);}-->];attachimgshow($content[pid]);</script>
        <!--{/if}-->

        <!--{if !empty($_G['setting']['pluginhooks']['view_share_method'])}-->
            <div class="tshare cl">
                <strong>{lang viewthread_share_to}:</strong>
                <!--{hook/view_share_method}-->
            </div>
        <!--{/if}-->

        
        <!--{if $article['preaid'] || $article['nextaid']}-->
        <div class="ren_wz_sxyp">
            <!--{if $article['prearticle']}--><a href="{$article['prearticle']['url']}">{lang pre_article}{$article['prearticle']['title']}</a>
            <!--{/if}-->
            <!--{if $article['nextarticle']}--><a href="{$article['nextarticle']['url']}">{lang next_article}{$article['nextarticle']['title']}</a><!--{/if}-->
        </div>
			<!--{/if}-->

        

		<!--{if $article['allowcomment']==1}-->
			<!--{eval $data = &$article}-->
			<!--{subtemplate portal/portal_comment}-->
		<!--{/if}-->

		<!--{if $article['related']}-->
		<div id="related_article" class="ren_mtie_xx cl">
			<div class="ren_m_mkbt">
				<span>{lang view_related}</span>
			</div>
            <ul class="ren_wz_xg cl" id="raid_div">
            <!--{loop $article['related'] $raid $rvalue}-->
                <input type="hidden" value="$raid" />
                <li class="ren_mtie"><span></span><a href="{$rvalue[uri]}" class="z ren_twbt">{$rvalue[title]}</a></li>
            <!--{/loop}-->
            </ul>
		</div>
		<!--{/if}-->

	</div>
</div>

<!--{if $_G['relatedlinks']}-->
	<script type="text/javascript">
		var relatedlink = [];
		<!--{loop $_G['relatedlinks'] $key $link}-->
		relatedlink[$key] = {'sname':'$link[name]', 'surl':'$link[url]'};
		<!--{/loop}-->
		relatedlinks('article_content');
	</script>
<!--{/if}-->

<input type="hidden" id="portalview" value="1">


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
