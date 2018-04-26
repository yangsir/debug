<?php exit;?>
<!--{template common/header}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
            <a href="home.php?mod=space&do=pm"><i class="icon icon-back"></i></a>
        </div>
		<div class="header-title">{lang send_pm}</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!--{if $op != ''}-->
<div class="bm_c">{lang user_mobile_pm_error}</div>
<!--{else}-->

<form id="pmform_{$pmid}" name="pmform_{$pmid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=send&touid=$touid&pmid=$pmid&mobile=2" >
	<input type="hidden" name="referer" value="{echo dreferer();}" />
	<input type="hidden" name="pmsubmit" value="true" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<!-- main post_msg_box start -->
	<div class="wp">
		<div class="post_msg_from">
			<ul>
				<!--{if !$touid}-->
				<li class="bl_line"><input type="text" value="" tabindex="1" class="px" size="30" autocomplete="off" id="username" name="username" placeholder="{$language['please_input']}{lang addressee}"></li>
				<!--{else}-->
				<!--{eval $username = C::t('common_member')->fetch($touid);}-->
				<li class="bl_line">{echo sprintf($language['sendpm_to_user'], '<em class="blue">'.$username['username'].'</em>');}</li>
				<!--{/if}-->
				<li class="bl_none area">
					<textarea class="pt" tabindex="2" autocomplete="off" value="" id="sendmessage" name="message" cols="80" rows="7"  placeholder="{$language['please_input']}{lang thread_content}"></textarea>
				</li>
				<li>
					<button id="pmsubmit_btn" class="btn_pn btn_pn_grey" disable="true"><span>{lang sendpm}</span></button>
					<input type="hidden" name="pmsubmit_btn" value="yes" />
				</li>
			</ul>
		</div>
	</div>
	<!-- main postbox start -->
</form>
<script type="text/javascript">
	(function() {
		$('#sendmessage').on('keyup input', function() {
			var obj = $(this);
			if(obj.val()) {
				$('.btn_pn').removeClass('btn_pn_grey').addClass('btn_pn_blue');
				$('.btn_pn').attr('disable', 'false');
			} else {
				$('.btn_pn').removeClass('btn_pn_blue').addClass('btn_pn_grey');
				$('.btn_pn').attr('disable', 'true');
			}
		});
		var form = $('#pmform_{$pmid}');
		$('#pmsubmit_btn').on('click', function() {
			var obj = $(this);
			if(obj.attr('disable') == 'true') {
				return false;
			}
			$.ajax({
				type:'POST',
				url:form.attr('action') + '&handlekey='+form.attr('id')+'&inajax=1',
				data:form.serialize(),
				dataType:'xml'
			})
			.success(function(s) {
				popup.open(s.lastChild.firstChild.nodeValue);
			})
			.error(function() {
				popup.open('{lang networkerror}', 'alert');
			});
			return false;
			});
	 })();
</script>
<!--{/if}-->
<!--{template common/footer}-->
