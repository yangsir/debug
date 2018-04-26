<?php exit;?>
<div class="comment">
	<!--{if $data[commentnum]}-->
	<div class="title">
		<h3>{lang latest_comment}</h3>
	</div>
	<!--{/if}-->
	<ul class="bm_c">
		<!--{eval $num = 1;}-->
		<!--{loop $commentlist $comment}-->
		<!--{template portal/comment_li}-->
		<!--{eval if ($num && $num >= 6) break; $num++;}-->
		<!--{/loop}-->
		<!--{if !empty($pricount)}-->
			<p class="mtn mbn y">{lang hide_portal_comment}</p>
		<!--{/if}-->
	</ul>
	<!--{if $data[commentnum]}--><p><a href="$common_url" class="morelink">{lang view_all_comments}(<em id="_commentnum">$data[commentnum]</em>)</a></p><!--{/if}-->
	<!--{if !$data[htmlmade]}-->
	<form id="cform" name="cform" action="$form_url" method="post" autocomplete="off">
		<!--{if !empty($topicid) }-->
			<input type="hidden" name="referer" value="$topicurl#comment" />
			<input type="hidden" name="topicid" value="$topicid">
		<!--{else}-->
			<input type="hidden" name="portal_referer" value="$viewurl#comment">
			<input type="hidden" name="referer" value="$viewurl#comment" />
			<input type="hidden" name="id" value="$data[id]" />
			<input type="hidden" name="idtype" value="$data[idtype]" />
			<input type="hidden" name="aid" value="$aid">
		<!--{/if}-->
		<input type="hidden" name="formhash" value="{FORMHASH}">
		<input type="hidden" name="replysubmit" value="true">
		<input type="hidden" name="commentsubmit" value="true" />
		<ul class="fastpost cl">
			<li><input type="text" value="{lang send_reply_fast_tip}" class="input grey" color="gray" name="message" id="fastpostmessage"></li>
			<li id="fastpostsubmitline" style="display: none;"><button type="submit" name="commentsubmit" value="true" class="button3"><strong>{lang post_comment}</strong></button></li>
		</ul>
	</form>
	<!--{/if}-->
</div>

<script type="text/javascript">
	(function() {
		<!--{if !$_G[uid]}-->
		$('#fastpostmessage').on('focus', function() {
			popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');
			this.blur();
		});
		<!--{else}-->
		$('#fastpostmessage').on('focus', function() {
			var obj = $(this);
			if(obj.attr('color') == 'gray') {
				obj.attr('value', '');
				obj.removeClass('grey');
				obj.attr('color', 'black');
				$('#fastpostsubmitline').css('display', 'block');
			}
		})
		.on('blur', function() {
			var obj = $(this);
			if(obj.attr('value') == '') {
				obj.addClass('grey');
				obj.attr('value', '{lang send_reply_fast_tip}');
				obj.attr('color', 'gray');
			}
		});
		<!--{/if}-->
		$('#replyid').on('click', function() {
			$(document).scrollTop($(document).height());
			$('#fastpostmessage')[0].focus();
		});
	})();
</script>
