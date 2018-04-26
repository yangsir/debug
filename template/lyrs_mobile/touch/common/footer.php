<?php exit;?>

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

<div class="footer">

	<div>

		<!--{if !$_G[uid] && !$_G['connectguest']}-->

		<a href="forum.php">{lang mobilehome}</a> | <a href="member.php?mod=logging&action=login" title="{lang login}">{lang login}</a> | <a href="<!--{if $_G['setting']['regstatus']}-->member.php?mod={$_G[setting][regname]}<!--{else}-->javascript:;" style="color:#D7D7D7;<!--{/if}-->" title="{$_G['setting']['reglinkname']}">{lang register}</a>

		<!--{else}-->

		<a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1">{$_G['member']['username']}</a> , <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}" title="{lang logout}" class="dialog">{lang logout}</a>

		<!--{/if}-->

	</div>

    <div>

		<!--{if !$setting['removesimpletype']}--><a href="{$_G['setting']['mobile']['simpletypeurl'][0]}">{lang no_simplemobiletype}</a> |  <!--{/if}-->

		<a href="javascript:;" style="color:#D7D7D7;">{lang mobile2version}</a> | 

		<a href="{$_G['setting']['mobile']['nomobileurl']}">{lang nomobiletype}</a> | 

		<!--{if $clienturl}--><a href="$clienturl">{lang clientversion}</a><!--{/if}-->

    </div>

	<p><!--{echo $setting['footercopyright'] ? $setting['footercopyright'] : '&copy; Comsenz Inc.';}--></p>

</div>

<!--{/if}-->

<!--{ad/lyrs_mobile:mobile_ads/a_cn/2}-->

<div class="quick_mask"></div>

<div class="quick_nav">

	<!--{eval loaducenter(); $ucnewpm = uc_pm_checknew($_G['uid'], 1);}-->

	<div class="quick_btn"><!--{if $ucnewpm['newpm']}--><em></em><!--{/if}--></div>

	<div class="quick_con hide">

		<ul class="quick_list">

		<!--{if $setting['quicknav']}-->

		<!--{eval $i = 0; $quick_id = array('home', 'one', 'two', 'three', 'four', 'five', 'six');}-->

		<!--{loop C::t('common_nav')->fetch_all_subnav($setting['quicknav']) $nav}-->

			<!--{if $nav['available']}-->

			<!--{if $nav['title'] == 'member'}-->

			<li class="qnav_$quick_id[$i]"><span data-href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}">$nav[name]</span><!--{if $ucnewpm['newpm']}--><em></em><!--{/if}--></li>

			<!--{elseif $nav['title'] == 'publish'}-->

			<li class="qnav_$quick_id[$i]"><span data-href="{if $_G[forum][fid]}forum.php?mod=post&action=newthread&fid=$_G[forum][fid]{else}forum.php?mod=misc&action=nav{/if}">$nav[name]</span></li>

			<!--{else}-->

			<li class="qnav_$quick_id[$i]"><span data-href="$nav[url]">$nav[name]</span></li>

			<!--{/if}-->

			<!--{eval $i++;}-->

			<!--{/if}-->

		<!--{/loop}-->

		<!--{else}-->

			<li class="qnav_home"><span data-href="forum.php?mod=index">$language[homepage]</span></li>

			<li class="qnav_one"><span data-href="search.php?mod=forum">$language[search]</span></li>

          	<li class="qnav_two"><span data-href="forum.php?mod=photo">$language[photo]</span></li>

			<li class="qnav_three"><span data-href="forum.php?mod=guide&view=newthread">$language[lastpost]</span></li>

			<li class="qnav_four"><span data-href="{if $_G[forum][fid]}forum.php?mod=post&action=newthread&fid=$_G[forum][fid]{else}forum.php?mod=misc&action=nav{/if}">$language[newthread]</span></li>

			<li class="qnav_five"><span data-href="forum.php?mod=forum">$language[forum]</span></li>

			<li class="qnav_six"><span data-href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}">$language[myspace]</span></li>

		<!--{/if}-->

		</ul>

	</div>

</div>

<script src="template/lyrs_mobile/touch/javascript/lazyload.js" type="text/javascript"></script>

<script type="text/javascript">$(document).ready(function() { $('img.lazy').lazyload({placeholder: 'template/lyrs_mobile/touch/image/loading.gif', effect: 'fadeIn', threshold: 200, failurelimit: 3}); });</script>

</body>

</html>

<!--{eval updatesession();}-->

<!--{if defined('IN_MOBILE')}-->

	<!--{eval output();}-->

<!--{else}-->

	<!--{eval output_preview();}-->

<!--{/if}-->

