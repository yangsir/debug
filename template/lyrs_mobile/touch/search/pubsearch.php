<?php exit;?>
<!--{if !empty($srchtype)}--><input type="hidden" name="srchtype" value="$srchtype" /><!--{/if}-->
<div class="search">
	<table width="100%" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td>
					<input value="$keyword" autocomplete="off" class="input" name="srchtxt" id="scform_srchtxt" value="" placeholder="{if CURMODULE == 'forum'}$language[search_forum]{elseif CURMODULE == 'portal'}$language[search_portal]{/if}">
				</td>
				<td width="66" align="right" class="scbar_btn_td">
					<div><input type="hidden" name="searchsubmit" value="yes"><input type="submit" value="{lang search}" class="button2" id="scform_submit"></div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
