<?PHP exit('Access Denied');?>
                        
                        	</div>
	<style type="text/css">
.foot{ width:1000px; font:12px/1.5 Tahoma,Helvetica,SimSun,sans-serif,Hei clear:both; padding-top:8px; position:relative; margin:5px auto; clear:both;}
.foot p{ text-align:center; color:#555; height:22px; line-height:22px;}
.foot p a{ color:#555;}
.foot p.foot_link a{ padding:0 10px;}
.foot p a.red{ color:red;}
.foot .foot_pr{position:absolute; bottom:0px; right:0px;}
.foot .foot_pr a{ padding-left:10px;}
.foot .foot_top{ position:absolute; right:0; top:0px;}
#ft{ padding:0; padding-top:8px;}
#footer .police {
    position: absolute;
    top: 20px;
    right: 10px;
}
		    	<!--{if $_G['basescript'] == 'forum' }-->
#footer {
    position: relative;
    font-size: 12px;
    text-align: center;
    border-top: 1px solid #85ADD6;
    line-height: 1.6;
    font-family: Arial;
    color: #999;
    padding: 10px 0px 0px;
}
#ft{ border-top: 0px;}
	<!--{/if}-->
</style>

<!--{if empty($topic) || ($topic[usefooter])}-->
	<!--{eval $focusid = getfocus_rand($_G[basescript]);}-->
	<!--{if $focusid !== null}-->
		<!--{eval $focus = $_G['cache']['focus']['data'][$focusid];}-->
		<!--{eval $focusnum = count($_G['setting']['focus'][$_G[basescript]]);}-->
		<div class="focus" id="sitefocus">
			<div class="bm">
				<div class="bm_h cl">
					<a href="javascript:;" onclick="setcookie('nofocus_$_G[basescript]', 1, $_G['cache']['focus']['cookie']*3600);$('sitefocus').style.display='none'" class="y" title="{lang close}">{lang close}</a>
					<h2>
						<!--{if $_G['cache']['focus']['title']}-->{$_G['cache']['focus']['title']}<!--{else}-->{lang focus_hottopics}<!--{/if}-->
						<span id="focus_ctrl" class="fctrl"><img src="{IMGDIR}/pic_nv_prev.gif" alt="{lang footer_previous}" title="{lang footer_previous}" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/$focusnum</em> <img src="{IMGDIR}/pic_nv_next.gif" alt="{lang footer_next}" title="{lang footer_next}" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
					</h2>
				</div>
				<div class="bm_c" id="focus_con">
				</div>
			</div>
		</div>
		<!--{eval $focusi = 0;}-->
		<!--{loop $_G['setting']['focus'][$_G[basescript]] $id}-->
				<div class="bm_c" style="display: none" id="focus_$focusi">
					<dl class="xld cl bbda">
						<dt><a href="{$_G['cache']['focus']['data'][$id]['url']}" class="xi2" target="_blank">$_G['cache']['focus']['data'][$id]['subject']</a></dt>
						<!--{if $_G['cache']['focus']['data'][$id][image]}-->
						<dd class="m"><a href="{$_G['cache']['focus']['data'][$id]['url']}" target="_blank"><img src="{$_G['cache']['focus']['data'][$id]['image']}" alt="$_G['cache']['focus']['data'][$id]['subject']" /></a></dd>
						<!--{/if}-->
						<dd>$_G['cache']['focus']['data'][$id]['summary']</dd>
					</dl>
					<p class="ptn cl"><a href="{$_G['cache']['focus']['data'][$id]['url']}" class="xi2 y" target="_blank">{lang focus_show} &raquo;</a></p>
				</div>
		<!--{eval $focusi ++;}-->
		<!--{/loop}-->
		<script type="text/javascript">
			var focusnum = $focusnum;
			if(focusnum < 2) {
				$('focus_ctrl').style.display = 'none';
			}
			if(!$('focuscur').innerHTML) {
				var randomnum = parseInt(Math.round(Math.random() * focusnum));
				$('focuscur').innerHTML = Math.max(1, randomnum);
			}
			showfocus();
			var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
		</script>
	<!--{/if}-->
	<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1}-->
		<div class="focus patch" id="patch_notice"></div>
	<!--{/if}-->

	<!--{ad/footerbanner/wp a_f/1}--><!--{ad/footerbanner/wp a_f/2}--><!--{ad/footerbanner/wp a_f/3}-->
	<!--{ad/float/a_fl/1}--><!--{ad/float/a_fr/2}-->
	<!--{ad/couplebanner/a_fl a_cb/1}--><!--{ad/couplebanner/a_fr a_cb/2}-->
	<!--{ad/cornerbanner/a_cn}-->

	<!--{hook/global_footer}-->

    <div id="ft" class="foot">
    <div id="footer">
                <p>
            <span>
 <!--{loop $_G['setting']['footernavs'] $nav}--><!--{if $nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
						!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile' || $nav['id'] == 'darkroom'))}-->
$nav[code]&nbsp;|&nbsp; <!--{/if}--><!--{/loop}-->  <a href="home.php?mod=spacecp&ac=credit&op=rule"><em style="color:#FC6D02">�������ֹ���</em></a>
            </span><br>
            <span><a href="/thread-48859-1-1.html">��������</a>&nbsp;<a href="/thread-48860-1-1.html">��������</a>&nbsp;&nbsp;��Ϣ��ҵ������/���֤��ţ�<!--{if $_G['setting']['icp']}--> $_G['setting']['icp']&nbsp;<!--{if $_G['setting']['statcode']}-->$_G['setting']['statcode']<!--{/if}--><!--{hook/global_footerlink}-->&nbsp;<!--{/if}--><!--{if $_G['setting']['site_qq']}--><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=822385710&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:822385710:51" alt="���������ҷ���Ϣ" title="���������ҷ���Ϣ"/></a><!--{/if}--></span><br>
            <span>��������:��վ�������������ɷ������������漰���������뱾վ�޹أ���վ������������վ�����κη������μ��������Σ���������ַ������İ�Ȩ���������Ա��ϵɾ����</span>
<br /><p>&nbsp;</p><br />                             
        </p>
    </div>
</div>
        <div class="foot_pr"></div>
        <div class="foot_top"><a href="javascript:scroll(0,0)"></a></div>
    </div>
    <!--{/if}-->

<!--{if !$_G['setting']['bbclosed']}-->
	<!--{if $_G[uid] && !isset($_G['cookie']['checkpm'])}-->
	<script type="text/javascript" src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=$_G[timestamp]"></script>
	<!--{/if}-->

	<!--{if $_G[uid] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])}-->
	<script type="text/javascript" src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=$_G[timestamp]"></script>
	<!--{/if}-->

	<!--{if !isset($_G['cookie']['sendmail'])}-->
	<script type="text/javascript" src="home.php?mod=misc&ac=sendmail&rand=$_G[timestamp]"></script>
	<!--{/if}-->

	<!--{if $_G[uid] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])}-->
	<script type="text/javascript" src="misc.php?mod=patch&action=checkpatch&rand=$_G[timestamp]"></script>
	<!--{/if}-->

<!--{/if}-->

<!--{if $_GET['diy'] == 'yes'}-->
	<!--{if check_diy_perm($topic) && (empty($do) || $do != 'index')}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}common_diy.js?{VERHASH}"></script>
		<script type="text/javascript" src="{$_G[setting][jspath]}portal_diy{if !check_diy_perm($topic, 'layout')}_data{/if}.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $space['self'] && CURMODULE == 'space' && $do == 'index'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}common_diy.js?{VERHASH}"></script>
		<script type="text/javascript" src="{$_G[setting][jspath]}space_diy.js?{VERHASH}"></script>
	<!--{/if}-->
<!--{/if}-->
<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1}-->
	<script type="text/javascript">patchNotice();</script>
<!--{/if}-->
<!--{if $_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])}-->
	<div class="focus plugin" id="plugin_notice"></div>
	<script type="text/javascript">pluginNotice();</script>
<!--{/if}-->
<!--{if !$_G['setting']['bbclosed'] && $_G['setting']['disableipnotice'] != 1 && $_G['uid'] && !empty($_G['cookie']['lip'])}-->
	<div class="focus plugin" id="ip_notice"></div>
	<script type="text/javascript">ipNotice();</script>
<!--{/if}-->
<!--{if $_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G[uid]]) || $_G['cookie']['promptstate_'.$_G[uid]] != $_G['member']['newprompt']) && $_GET['do'] != 'notice'}-->
	<script type="text/javascript">noticeTitle();</script>
<!--{/if}-->

<!--{if ($_G[member][newpm] || $_G[member][newprompt]) && empty($_G['cookie']['ignore_notice'])}-->
	<script type="text/javascript" src="{$_G[setting][jspath]}html5notification.js?{VERHASH}"></script>
	<script type="text/javascript">
	var h5n = new Html5notification();
	if(h5n.issupport()) {
		<!--{if $_G[member][newpm] && $_GET[do] != 'pm'}-->
		h5n.shownotification('pm', '$_G[siteurl]home.php?mod=space&do=pm', '<!--{avatar($_G[uid],small,true)}-->', '{lang newpm_subject}', '{lang newpm_notice_info}');
		<!--{/if}-->
		<!--{if $_G[member][newprompt] && $_GET[do] != 'notice'}-->
				<!--{loop $_G['member']['category_num'] $key $val}-->
					<!--{eval $noticetitle = lang('template', 'notice_'.$key);}-->
					h5n.shownotification('notice_$key', '$_G[siteurl]home.php?mod=space&do=notice&view=$key', '<!--{avatar($_G[uid],small,true)}-->', '$noticetitle ($val)', '{lang newnotice_notice_info}');
				<!--{/loop}-->
		<!--{/if}-->
	}
	</script>
<!--{/if}-->
<div id="bbs_scrollbar">
    <ul class="fr bbs_scrollbar_con">
        <li>
            <a class="go" style="display:none" href="javascript:;"></a>
            <a class="do"  href="javascript:;"></a>
	<style type="text/css">
#bbs_scrollbar .bbs_scrollbar_con li .do {
    background: url("$_G['style']['styleimgdir']/godown.png") no-repeat scroll 0px 0px transparent !important;
    cursor: pointer;
}
#bbs_scrollbar .bbs_scrollbar_con li .do:hover {
    background-position: -62px 0px !important;
}</style>
	  <script>
       (function($){ if ($('#sitefocus').length > 0) {
            $('div.bbs_scrollbar_con').css('bottom', 222);
            $('#sitefocus').find('.focus_colse').click(function () {
                setTimeout(function () {
                    $('div.bbs_scrollbar_con').css('bottom', 10);
                }, 500);
            })
        }
        $('.do').click(function () {
            var t = $('#ft,#forum,.ft').offset().top;
            $('html,body').animate({scrollTop:t}, 500);
        });
        $('.go').click(function(){
            $('html,body').animate({scrollTop: 0},500);
        });
        $(window).bind('scroll resize', function () {
            var w = $(window);
            if (w.scrollTop() >= w.height()) {
                $('a.go').css('display', 'block');
                $('a.do').hide();
            }
            else {
                $('a.do').css('display', 'block');
                $('a.go').hide();
            }
        })
	})(jQuery)
</script>
  </li>
        <li class="dropmenu ">
            <a class="goservice suspend"  href="javascript:void(0);" class="now"></a>
            <div class="lianxi dropdown">
               <!--{if $_G['setting']['site_qq']}--> <h2><a class="goservice" href="http://wpa.qq.com/msgrd?v=1&uin=$_G['setting']['site_qq']&site=qq&menu=yes" target="_blank">&nbsp;</a></h2><!--{/if}-->
                <p>QQ:123456789<br>������ 8:30-22:30����</p>
            </div>
        </li>
        <li class="dropmenu ">
            <a class="weixin suspend" href="javascript:void(0);" class="now"></a>
            <div class="weixinimg dropdown"></div>
        </li>
        <li class="dropmenu ">
            <a class="kehuduanbg suspend" onmouseover="javascript:void(0);" class="now"></a>
            <div class="kehuduan dropdown"></div>
        </li>
    </ul>
</div>

<!--{eval userappprompt();}-->
<!--{if isset($_G['makehtml'])}-->
	<script type="text/javascript" src="{$_G[setting][jspath]}html2dynamic.js?{VERHASH}"></script>
	<script type="text/javascript">
		var html_lostmodify = {TIMESTAMP};
		htmlGetUserStatus();
		<!--{if isset($_G['htmlcheckupdate'])}-->
		htmlCheckUpdate();
		<!--{/if}-->
	</script>
<!--{/if}-->
<!--{eval output();}-->
<!--<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?7a43d872bbcf975e97d7803a0fcda085";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
    -->         
</body>
</html>
