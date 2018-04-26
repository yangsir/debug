<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!-- header start -->
<header class="header rtj1009_header">
    <div class="ren_nav cl">
		<div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
        <a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
		<div class="ren_top_dqwz z">
			<span>{lang register}</span>
		</div>
    </div>
</header>
<!-- header end -->
<!-- registerbox start -->
<div class="rtj1009_m_login">
	<div class="ren_mn ren_zc_mn cl">
		<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod={$_G[setting][regname]}&mobile=2">
		<input type="hidden" name="regsubmit" value="yes" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<!--{eval $dreferer = str_replace('&amp;', '&', dreferer());}-->
		<input type="hidden" name="referer" value="$dreferer" />
		<input type="hidden" name="activationauth" value="{if $_GET[action] == 'activation'}$activationauth{/if}" />
		<input type="hidden" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" />
		<ul class="ren_denglu">
			<li class="ren_rfm"><input type="text" tabindex="1" class="ren_px ren_zc_text" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['username']}" placeholder="{lang registerinputtip}" fwin="login"></li>
			<li class="ren_rfm"><input type="password" tabindex="2" class="ren_px ren_zc_text" size="30" value="" name="{$_G['setting']['reginput']['password']}" placeholder="{lang login_password}" fwin="login"></li>
			<li class="ren_rfm"><input type="password" tabindex="3" class="ren_px ren_zc_text" size="30" value="" name="{$_G['setting']['reginput']['password2']}" placeholder="{lang registerpassword2}" fwin="login"></li>
			<li class="bl_none ren_rfm"><input type="email" tabindex="4" class="ren_px ren_zc_text" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['email']}" placeholder="{lang registeremail}" fwin="login"></li>
		</ul>
		<!--{if $secqaacheck || $seccodecheck}-->
			<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
	</div>
    
    <div class="ren_rfm ren_m_dl">
        <span class="ren_zc_xy">
            <!--{if $bbrules}-->
                <input type="checkbox" class="pc" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" /> <label for="agreebbrule">已阅读并同意 <a class="ren_fgps ren_kj_fg" href="#ren_zcxy">{lang rulemessage}</a></label>
            <!--{/if}-->
        </span>
    </div>
    
	<div class="ren_rfm ren_m_dl"><button tabindex="7" value="true" name="regsubmit" type="submit" class="ren_zc_pn"><span>{lang quickregister}</span></button></div>
	</form>
    <script src="template/rtj1009_005/js/ren_ps.js" charset="{CHARSET}"></script>
    <div id="ren_zcxy" class="ren_zcxy cl" style="display: none;">
    	<div class="ren_m_mkbt"><span>{lang rulemessage}</span></div>
        <div class="ren_xy_xx">$bbrulestxt</div>
        <div class="ren_pskts" href="#ren_zcxy"><span>同意并注册</span></div>
    </div>
</div>


<script type="text/javascript">
	(function() {
		$('.ren_fgps').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
</script>

<script type="text/javascript">
	(function() {
		$('.ren_pskts').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
</script>

<!-- registerbox end -->
<!--{eval updatesession();}-->
<!--{template common/footer}-->
