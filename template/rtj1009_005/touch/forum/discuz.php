<?PHP exit('Access Denied');?>
<!--{if $_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1}-->
	<!--{eval dheader('Location:portal.php?mod=index');exit;}-->
<!--{/if}-->
<!--{template common/header}-->

<script type="text/javascript">
	function getvisitclienthref() {
		var visitclienthref = '';
		if(ios) {
			visitclienthref = 'https://itunes.apple.com/cn/app/zhang-shang-lun-tan/id489399408?mt=8';
		} else if(andriod) {
			visitclienthref = 'http://www.discuz.net/mobile.php?platform=android';
		}
		return visitclienthref;
	}
</script>

<!--{if $_GET['visitclient']}-->

<header class="header">
    <div class="nav">
		<span>{lang warmtip}</span>
    </div>
</header>
<div class="cl">
	<div class="clew_con">
		<h2 class="tit">{lang zsltmobileclient}</h2>
		<p>{lang visitbbsanytime}<input class="redirect button" id="visitclientid" type="button" value="{lang clicktodownload}" href="" /></p>
		<h2 class="tit">{lang iphoneandriodmobile}</h2>
		<p>{lang visitwapmobile}<input class="redirect button" type="button" value="{lang clicktovisitwapmobile}" href="$_GET[visitclient]" /></p>
	</div>
</div>
<script type="text/javascript">
	var visitclienthref = getvisitclienthref();
	if(visitclienthref) {
		$('#visitclientid').attr('href', visitclienthref);
	} else {
		window.location.href = '$_GET[visitclient]';
	}
</script>

<!--{else}-->

<!-- header start -->
<!--{if $showvisitclient}-->

<div class="visitclienttip vm" style="display:block;">
	<a href="javascript:;" id="visitclientid" class="btn_download">{lang downloadnow}</a>	
	<p>
		{lang downloadzslttoshareview}
	</p>
</div>
<script type="text/javascript">
	var visitclienthref = getvisitclienthref();
	if(visitclienthref) {
		$('#visitclientid').attr('href', visitclienthref);
		$('.visitclienttip').css('display', 'block');
	}
</script>

<!--{/if}-->

<header class="header rtj1009_header">
	<div class="ren_nav cl">
		<!--{if $_G['setting']['domain']['app']['mobile']}-->
			{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
		<!--{else}-->
			{eval $nav = "forum.php";}
		<!--{/if}-->
		<a class="ren_logo" title="$_G[setting][bbname]" href="$nav"><img src="template/rtj1009_005/image/logo.png" /></a>
        <a href="{if $_G['forum']['type'] == 'sub'}forum.php?mod=forumdisplay&fid=$_G['forum']['fup']{else}forum.php?mod=forum{/if}" class="z ren_fhjt"><span></span></a>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->
<!--{hook/index_top_mobile}-->
<!-- main forumlist start -->
<div class="rtj1009_m_forum m_pb49" id="wp">

		<div class="rtj1009_m_tab">
			<section>
				<div class="tabs ren_tab">
					<nav>
						<ul>
						<li><a href="#ren_tabxx_2" class="ren_tab_bt">全部版块</a></li>
							<li><a href="#ren_tabxx_1" class="ren_tab_bt">论坛推荐</a></li>
						</ul>
					</nav>
					<div class="ren_xxk_xx cl">
							<section id="ren_tabxx_1">
                        
                                                <!--{if empty($gid) && !empty($forum_favlist)}-->
                        <!--{eval $forumscount = count($forum_favlist);}-->
                        <!--{eval $forumcolumns = $forumscount > 3 ? ($forumscount == 4 ? 4 : 5) : 1;}-->
              
                        <!--{eval $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';}-->
                            <div class="ren_m_bm ren_m_bk">
                                <div class="subforumshow ren_m_bm_h cl" href="#sub_forum_$cat[fid]">
                                    <h3 class="ren_pdbt"><a href="javascript:;">我关注的</a></h3>
                                </div>
                                <div id="sub_forum_$cat[fid]" class="sub_forum">
                                    <ul>
                                    <!--{eval $favorderid = 0;}-->
                                    <!--{loop $forum_favlist $key $favorite}-->
                                        <li>
                                        <!--{if $favforumlist[$favorite[id]]}-->
                                        <!--{eval $forum=$favforumlist[$favorite[id]];}-->
                                        <!--{eval $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];}-->
                                        <!--{if $forum[icon]}-->
                                            $forum[icon]
                                        <!--{else}-->
                                            <a href="$forumurl"><img src="{$_G['style']['styleimgdir']}/rtj_zwtp100.jpg" alt="$forum[name]" /></a>
                                        <!--{/if}-->
                                        <a href="$forumurl" class="ren_bkbt"><span>{$forum[name]}</span></a>
                                        <!--{/if}-->
                                        </li>
                                    <!--{/loop}-->
                                    </ul>
								</div>
                             </div>
						<!--{/if}-->
                        
                        	<!--{loop $catlist $key $cat}-->
                                <div class="ren_m_bm ren_m_bk">
                                    <div class="subforumshow ren_m_bm_h cl" href="#sub_forum_$cat[fid]">
                                    	<h3 class="ren_pdbt"><a href="javascript:;">$cat[name]</a></h3>
                                    </div>
                                    <div id="sub_forum_$cat[fid]" class="sub_forum">
                                        <ul>
                                            <!--{loop $cat[forums] $forumid}-->
                                            <!--{eval $forum=$forumlist[$forumid];}-->
                                            <li>
                                            	<!--{if $forum[icon]}-->
                                                    $forum[icon]
                                                <!--{else}-->
                                                    <a href="forum.php?mod=forumdisplay&fid={$forum['fid']}">
                                                        <img src="{$_G['style']['styleimgdir']}/rtj_zwtp100.jpg" alt="$forum[name]" />
                                                    </a>
                                                <!--{/if}-->
                                                <a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="ren_bkbt"><span>{$forum[name]}</span></a>
                                    		</li>
                                            <!--{/loop}-->
                                        </ul>
                                    </div>
                                </div>
                            <!--{/loop}-->
                            
                            
                        </section>
						<section id="ren_tabxx_2">
							<!-- 这下面放DIY模块调用地址 -->
							<!--{block/4416}-->
							<!--{block/4417}-->
							<!--{block/4418}-->
                            <!-- 结束 -->
                        </section>
						
					</div><!-- /content -->
				</div><!-- /tabs -->
			</section>
		</div><!-- /container -->



        
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
	
    
            
            
            
</div>
<!-- main forumlist end -->
<!--{hook/index_middle_mobile}-->
<script type="text/javascript" src="template/rtj1009_005/js/index.js"></script>
<script type="text/javascript">
$(function (){

    $(".menus a").click(function(){
    	var menusId = $(this).parent().index();
    	if (menusId == 1) {
    		clickTongji('16');
    		$('body,html').animate({scrollTop:1},10);
			$('body,html').animate({scrollTop:0},10);
    	}
        $(".module").hide().eq(menusId).show();
        $(this).parent().addClass('active').siblings().removeClass('active');
    });

    if (location.hash) {
        $(".module").hide().eq(1).show();
        $('.menus li').eq(1).addClass('active').siblings().removeClass('active');
    }

    $(".local-list li,.cate-list li").on('touchstart',(function(){
        $(this).addClass('active');
    }));
    $(".local-list li,.cate-list li").on('touchmove touchend touchcancel',(function(){
        $(this).removeClass('active');
    }));

});

</script>
		

<script type="text/javascript">
	(function() {
		<!--{if !$_G[setting][mobile][mobileforumview]}-->
			$('.sub_forum').css('display', 'block');
		<!--{else}-->
			$('.sub_forum').css('display', 'none');
		<!--{/if}-->
		$('.subforumshow').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
				obj.find('img').attr('src', '{STATICURL}image/mobile/images/collapsed_yes.png');
			} else {
				subobj.css('display', 'none');
				obj.find('img').attr('src', '{STATICURL}image/mobile/images/collapsed_no.png');
			}
		});
	 })();
</script>

<!--{/if}-->
<!--{template common/footer}-->
