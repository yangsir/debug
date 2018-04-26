<?PHP exit('Access Denied');?>
<!--{hook/global_footer_mobile}-->
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
<!--{if $_G['basescript'] == 'portal' && CURMODULE == 'index' || $_G['basescript'] == 'forum' && CURMODULE== 'index' ||  $_G['basescript'] == 'forum' && CURMODULE == 'guide'}-->
<div class="ren_footer">
	<div class="ren_foo">
        <a href="portal.php?mod=index" class="ren_fa_yi{if $_GET['mod'] == 'index'} a{/if}">首页</a>
        <a href="forum.php?forumlist=1" class="ren_fa_e{if $_GET['forumlist'] == '1'} a{/if}">论坛</a>
        <a href="forum.php?mod=misc&amp;action=nav" class="ren_fa_wu">发帖</a>
        <a href="forum.php?mod=guide&mobile=2" class="ren_fa_san{if $_GET['mod'] == 'guide'} a{/if}">发现</a>
        <a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1" class="ren_fa_si{if $_GET['mod'] == 'space'} a{/if}">我的</a>
    </div>
</div>
<!--{else}-->
<div class="footer">
	<div class="ren_foo_yi">
		<!--{if !$_G[uid] && !$_G['connectguest']}-->
		<!--{if $_G['setting']['domain']['app']['mobile']}-->
			{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
		<!--{else}-->
			{eval $nav = "forum.php";}
		<!--{/if}-->
        <a href="$nav">首页</a>
        </a>
		<a href="forum.php?forumlist=1">论坛</a>
        <a href="member.php?mod=logging&action=login" title="{lang login}">{lang login}</a>
        <a href="<!--{if $_G['setting']['regstatus']}-->member.php?mod={$_G[setting][regname]}<!--{else}-->javascript:;" style="color:#D7D7D7;<!--{/if}-->" title="{$_G['setting']['reglinkname']}">{lang register}</a>
		<!--{else}-->
        <!--{if $_G['setting']['domain']['app']['mobile']}-->
			{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
		<!--{else}-->
			{eval $nav = "forum.php";}
		<!--{/if}-->
        <a href="$nav">首页</a>
        </a>
		<a href="forum.php?forumlist=1">论坛</a>
		<a href="search.php?mod=forum">搜索</a>
        <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}" title="{lang logout}" class="dialog">{lang logout}</a>
		<!--{/if}-->
	</div>
    <div class="ren_foo_e">
		<a href="{$_G['setting']['mobile']['simpletypeurl'][0]}">{lang no_simplemobiletype}</a>
		<a href="javascript:;" style="color: #FF4444;">{lang mobile2version}</a>
		<a href="{$_G['setting']['mobile']['nomobileurl']}">{lang nomobiletype}</a>
		<!--{if $clienturl}--><a href="$clienturl">{lang clientversion}</a><!--{/if}-->
    </div>
	<p class="ren_foo_san">&copy; Comsenz Inc.</p>
</div>
<!--{/if}-->
<!--{/if}-->
</body>
</html>
<!--{eval updatesession();}-->
<!--{if defined('IN_MOBILE')}-->
	<!--{eval output();}-->
<!--{else}-->
	<!--{eval output_preview();}-->
<!--{/if}-->
