<?PHP exit('Access Denied');?>
<!--{if $allowuploadtoday}-->
	{lang attachment_limit} <!--{if $_G['group']['maxattachnum']}-->{lang attachment_unit}<!--{/if}--><!--{if $_G['group']['maxsizeperday']}--><!--{if $_G['group']['maxattachnum']}--> {lang attachment_or} <!--{/if}-->{lang attachment_sizelimit}<!--{/if}-->
<!--{else}-->
	<span class="xi1 xw1">{lang attachment_outoflimit}</span>
<!--{/if}-->