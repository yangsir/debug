<?PHP exit('Access Denied');?>
<!--{if empty($_G['uploadjs'])}-->
	<script type="text/javascript" src="{$_G[setting][jspath]}upload.js?{VERHASH}"></script>
	{eval $_G['uploadjs'] = 1;}
<!--{/if}-->