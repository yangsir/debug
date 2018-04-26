<?php exit;?>
<!--{if $value[msgfromid] != $_G['uid']}-->
<div class="friend_msg cl">
	<div class="avat z"><img src="<!--{avatar($value[msgfromid], small, true)}-->" /></div>
	<div class="dialog_green z">
		<div class="dialog_con">
			<div class="dialog_txt">$value[message]</div>
		</div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{else}-->
<div class="self_msg cl">
	<div class="avat y"><img src="<!--{avatar($value[msgfromid], small, true)}-->" /></div>
	<div class="dialog_gray y">			
		<div class="dialog_con">
			<div class="dialog_txt">$value[message]</div>
		</div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{/if}-->
