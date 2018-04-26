<?php exit;?>
<!--{template common/header}-->
<div class="tip">
<!--{if $op == 'delete'}-->
	<form method="post" autocomplete="off" action="portal.php?mod=portalcp&ac=article&op=delete&aid=$_GET[aid]">
		<dt>
			<!--{if $_G['group']['allowpostarticlemod'] && $article['status'] == 1}-->
			{lang article_delete_sure}
			<input type="hidden" name="optype" value="0" class="pc" />
			<!--{else}-->
			<label class="lb"><input type="radio" name="optype" value="0" class="pc" />{lang article_delete_direct}</label>
			<label class="lb"><input type="radio" name="optype" value="1" class="pc" checked="checked" />{lang article_delete_recyclebin}</label>
			<!--{/if}-->
		</dt>
		<dd>
			<button type="submit" name="btnsubmit" value="true" class="button2"><strong>{lang confirms}</strong></button>
		</dd>
		<input type="hidden" name="aid" value="$_GET[aid]" />
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="deletesubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
	</form>
<!--{elseif $op == 'verify'}-->
	<form method="post" autocomplete="off" id="aritcle_verify_$aid" action="portal.php?mod=portalcp&ac=article&op=verify&aid=$aid">
		<dt>
			<label for="status_0" class="lb"><input type="radio" class="pr" name="status" value="0" id="status_0"{if $article[status]=='1'} checked="checked"{/if} />{lang passed}</label>
			<label for="status_x" class="lb"><input type="radio" class="pr" name="status" value="-1" id="status_x" />{lang delete}</label>
			<label for="status_2" class="lb"><input type="radio" class="pr" name="status" value="2" id="status_2"{if $article[status]=='2'} checked="checked"{/if} />{lang ignore}</label>
		</dt>
		<dd>
			<button type="submit" name="btnsubmit" value="true" class="button2"><strong>{lang confirms}</strong></button>
		</dd>
		<input type="hidden" name="aid" value="$aid" />
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="handlekey" value="$_GET['handlekey']" />
		<input type="hidden" name="verifysubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
	</form>
<!--{/if}-->
</div>
<!--{template common/footer}-->