<?php exit;?>
<!--{template common/header}-->
<!--{if $_GET['op'] == 'edit'}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="javascript:;" onclick="history.go(-1);"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">{lang edit}</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<form id="editcommentform_{$cid}" name="editcommentform_{$cid}" method="post" autocomplete="off" action="portal.php?mod=portalcp&ac=comment&op=edit&cid=$cid{if $_GET[modarticlecommentkey]}&modarticlecommentkey=$_GET[modarticlecommentkey]{/if}">
	<input type="hidden" name="referer" value="{echo dreferer()}" />
	<input type="hidden" name="editsubmit" value="true" />
	<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<div class="post_from">
		<ul class="cl">
			<li class="bl_line grey">
				<label for="message">{lang comment_edit_content}: </label>
			</li>
			<li class="bl_line">
			<textarea id="message_{$cid}" name="message" cols="70" onkeydown="ctrlEnter(event, 'editsubmit_btn');" rows="2" class="pt">$comment[message]</textarea>
			</li>
			<li class="bm_c">
				<button type="submit" name="editsubmit_btn" id="editsubmit_btn" value="true" class="button3"><strong>{lang submit}</strong></button>
			</li>
		</ul>
	</div>
</form>
<script type="text/javascript">
	(function() {
		$('#message_{$cid}').on('scroll', function() {
			var obj = $(this);
			if (obj.scrollTop() > 0) {
				obj.attr('rows', parseInt(obj.attr('rows'))+2);
			}
		}).scrollTop($(document).height());
	})();
</script>
<!--{elseif $_GET['op'] == 'delete'}-->
<div class="tip">
	<form id="deletecommentform_{$cid}" name="deletecommentform_{$cid}" method="post" autocomplete="off" action="portal.php?mod=portalcp&ac=comment&op=delete&cid=$cid">
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="deletesubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<dt>{lang comment_delete_confirm}</dt>
		<dd>
			<button type="submit" name="deletesubmitbtn" value="true" class="button2"><strong>{lang confirms}</strong></button>
		</dd>
	</form>
</div>
<!--{/if}-->
<!--{template common/footer}-->