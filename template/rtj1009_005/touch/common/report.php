<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="tip ren_jb_tip">
<span class="ren_lc_jbbt cl">{lang report}</span>
<form id="form_$_GET[handlekey]" method="post" autocomplete="off" action="misc.php?mod=report&modsubmit=yes&mobile=2" >
    <dt id="report_reasons" class="ren_lc_jbxx">
			<label><input type="radio" name="message" value="广告垃圾" /> 广告垃圾</label>
			<label><input type="radio" name="message" value="违规内容" /> 违规内容</label>
			<label><input type="radio" name="message" value="恶意灌水" /> 恶意灌水</label>
			<label><input type="radio" name="message" value="重复发帖" /> 重复发帖</label>
	</dt>
    
    <dd>
      <input type="submit" name="modsubmit" id="report_submit" value="{lang confirms}" class="formdialog button2">
      <a href="javascript:;" onclick="popup.close();">取消</a>
    </dd>
	<input type="hidden" name="referer" value="{echo dreferer()}" />
	<input type="hidden" name="reportsubmit" value="true" />
	<input type="hidden" name="rtype" value="$_GET[rtype]" />
	<input type="hidden" name="rid" value="$_GET[rid]" />
	<!--{if $_GET['fid']}-->
	<input type="hidden" name="fid" value="$_GET[fid]" />
	<!--{/if}-->
	<!--{if $_GET['uid']}-->
	<input type="hidden" name="uid" value="$_GET[uid]" />
	<!--{/if}-->
	<input type="hidden" name="url" value="$_GET[url]" />
	<input type="hidden" name="inajax" value="$_G[inajax]" />
	<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
	<input type="hidden" name="formhash" value="{FORMHASH}" />
</form>
</div>
<!--{template common/footer}-->