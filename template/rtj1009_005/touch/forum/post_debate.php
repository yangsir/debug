<?PHP exit('Access Denied');?>
<div class="ren_fb_hd cl">
	<div class="ren_fb_hdxxs">
		<ul>
        	<li class="ren_hdxx_li ren_hdxx_he">
            	<div class="ren_hdxx_lx">{lang debate_square_point}<span class="rq"> *</span></div>
                <div class="ren_hdxx_lxnr">
                	<textarea name="affirmpoint" id="affirmpoint" class="pt" tabindex="1">$debate[affirmpoint]</textarea>
                </div>
            </li>
        	<li class="ren_hdxx_li ren_hdxx_he">
            	<div class="ren_hdxx_lx">{lang debate_opponent_point}<span class="rq"> *</span></div>
                <div class="ren_hdxx_lxnr">
                	<textarea name="negapoint" id="negapoint" class="pt" tabindex="1">$debate[negapoint]</textarea>
                </div>
            </li>
		</ul>
	</div>
	<div class="ren_fb_hdxxx">
		<ul>
        	<li class="ren_hdxx_li ren_hdxx_de">
            	<div class="ren_hdxx_lx">{lang endtime}</div>
                <div class="ren_hdxx_lxnr">
                	<input type="text" name="endtime" id="endtime" class="px" placeholder="时间格式为：2017-08-10 10:00" autocomplete="off" value="$debate[endtime]" tabindex="1" />
                </div>
            </li>
            
        	<li class="ren_hdxx_li ren_hdxx_de">
            	<div class="ren_hdxx_lx">指定{lang debate_umpire}</div>
                <div class="ren_hdxx_lxnr">
                	<input type="text" name="umpire" id="umpire" class="px" placeholder="输入裁判用户名" value="$debate[umpire]" tabindex="1" />
                </div>
            </li>
            <li class="ren_hdxx_he"><div class="ren_tie_ksf">内容</div></li>
			<!--{hook/post_debate_extra}-->
		</ul>
	</div>
</div>

<script type="text/javascript" reload="1">
function checkuserexists(username, objname) {
	if(!username) {
		$(objname).innerHTML = '';
		return;
	}
	var x = new Ajax();
	username = BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(username) : username;
	x.get('forum.php?mod=ajax&inajax=1&action=checkuserexists&username=' + username, function(s){
		var obj = $(objname);
		obj.innerHTML = s;
	});
}

EXTRAFUNC['validator']['special'] = 'validateextra';
function validateextra() {
	if($('postform').affirmpoint.value == '') {
		showDialog('{lang post_debate_message_1}', 'alert', '', function () { $('postform').affirmpoint.focus() });
		return false;
	}
	if($('postform').negapoint.value == '') {
		showDialog('{lang post_debate_message_2}', 'alert', '', function () { $('postform').negapoint.focus() });
		return false;
	}
	return true;
}
</script>