<?PHP exit('Access Denied');?>
<!--{if $value[msgfromid] != $_G['uid']}-->
<div class="ren_msg cl">
	<a class="ren_msg_avatz z" href="home.php?mod=space&uid=$value[authorid]&do=profile&mobile=2"><img src="<!--{avatar($value[msgfromid], small, true)}-->" /></a>
	<div class="ren_dialog_z z">
		<div class="ren_dialog_c">
			<div class="ren_dialog_t">$value[message]</div>
		</div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{else}-->
<div class="self_msg cl">
	<a class="ren_msg_avaty y" href="home.php?mod=space&uid=$value[authorid]&do=profile&mobile=2"><img src="<!--{avatar($value[msgfromid], small, true)}-->" /></a>
	<div class="ren_dialog_y y">			
		<div class="ren_dialog_c">
			<div class="ren_dialog_t">$value[message]</div>
		</div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{/if}-->
