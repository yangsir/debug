<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="forum.php"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">{lang tag}</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{if $type != 'countitem'}-->
<form method="post" action="misc.php?mod=tag" class="pns">
	<div class="search">
		<table width="100%" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td>
						<input type="text" name="name" class="input" size="30" placeholder="$language[search_tag]" />
					</td>
					<td width="66" align="right" class="scbar_btn_td">
						<div><input type="submit" value="{lang search}" class="button2" id="scform_submit"></div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!--{if $tagarray}-->
	<div class="search_hotkey bouncescale_in">
		<ul>
		<!--{eval $i = 0;}-->
		<!--{if $setting['searchtaghotkey']}-->
		<!--{eval $setting['searchtaghotkey'] = explode("\n", trim($setting['searchtaghotkey']));}-->
		<!--{loop $setting['searchtaghotkey'] $tag}-->
			<!--{eval $i ++;}-->
			<!--{if $tag = trim($tag)}-->
			<!--{eval $tag = C::t('common_tag')->get_bytagname($tag);}-->
			<!--{if $tag[tagid]}-->
			<li><a href="misc.php?mod=tag&id=$tag[tagid]&type=thread">$tag[tagname]</a></li>
			<!--{if $i % 3 == 0}--></ul><ul><!--{/if}-->
			<!--{/if}-->
			<!--{/if}-->
		<!--{/loop}-->
		<!--{else}-->
		<!--{loop $tagarray $tag}-->
			<!--{eval $i ++;}-->
			<li><a href="misc.php?mod=tag&id=$tag[tagid]&type=thread">$tag[tagname]</a></li>
			<!--{if $i % 3 == 0}--></ul><ul><!--{/if}-->
		<!--{/loop}-->
		<!--{/if}-->
		</ul>
	</div>
	<!--{else}-->
		<p class="emp">{lang no_tag}</p>
	<!--{/if}-->
</form>
<!--{else}-->
$num
<!--{/if}-->
<!--{template common/footer}-->