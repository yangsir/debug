<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="$url"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">{lang comment_view}</div>
		<div class="header-right">
            <span id="replyid"><i class="icon icon-reply"></i></span>
        </div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<div class="comment">
	<h2>{lang comment} : <a href="$url">$csubject[title]</a></h2>
	<div class="title">
		<span class="y">{lang comment} ($csubject[commentnum])</span>
		<h3>{lang latest_comment}</h3>
	</div>
	<ul class="pagelist bm_c">
		<!-- more pagelist start -->
		<!--{loop $commentlist $comment}-->
		<!--{template portal/comment_li}-->
		<!--{/loop}-->
		<!-- more pagelist end -->
		<!--{if !empty($pricount)}-->
			<p class="mtn mbn y">{lang hide_portal_comment}</p>
		<!--{/if}-->
	</ul>
	<div class="morebox">
		<!--{eval $totalpage = ceil($csubject['commentnum'] / $perpage);}-->
		<!--{if $totalpage > $page}--><!--{if $setting['ajaxpage']}--><a href="portal.php?mod=comment&id=$id&idtype=aid" class="morelink" data-num="{$totalpage}-{$page}">$language[view_more]</a><!--{else}-->$multi<!--{/if}--><!--{/if}-->
	</div>
	<!--{if $csubject['allowcomment'] == 1}-->
		<form id="cform" name="cform" action="portal.php?mod=portalcp&ac=comment" method="post" autocomplete="off">
		<!--{if checkperm('seccode') && ($secqaacheck || $seccodecheck)}-->
			<!--{block sectpl}--><sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div><!--{/block}-->
			<div class="mtm"><!--{subtemplate common/seccheck}--></div>
		<!--{/if}-->

		<!--{if $idtype == 'topicid' }-->
			<input type="hidden" name="topicid" value="$id">
		<!--{else}-->
			<input type="hidden" name="aid" value="$id">
		<!--{/if}-->
		<input type="hidden" name="formhash" value="{FORMHASH}">
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
<!--{template common/footer}-->