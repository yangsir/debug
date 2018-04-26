<?PHP exit('Access Denied');?>
<!--{template common/header}-->

<!--{if !$_GET['infloat']}-->

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
			<span>{lang login}</span>
		</div>
    </div>
</header>
<!-- header end -->

<!--{/if}-->

{eval $loginhash = 'L'.random(4);}

<!-- userinfo start -->
<div class="rtj1009_m_login <!--{if $_GET[infloat]}-->login_pop<!--{/if}-->">
	<!--{if $_GET[infloat]}-->
		<div class="ren_log_tit">{lang login}</div>
	<!--{/if}-->
		<form id="loginform" method="post" action="member.php?mod=logging&action=login&loginsubmit=yes&loginhash=$loginhash&mobile=2" onsubmit="{if $_G['setting']['pwdsafety']}pwmd5('password3_$loginhash');{/if}" >
		<input type="hidden" name="formhash" id="formhash" value='{FORMHASH}' />
		<input type="hidden" name="referer" id="referer" value="<!--{if dreferer()}-->{echo dreferer()}<!--{else}-->forum.php?mobile=2<!--{/if}-->" />
		<input type="hidden" name="fastloginfield" value="username">
		<input type="hidden" name="cookietime" value="2592000">
		<!--{if $auth}-->
			<input type="hidden" name="auth" value="$auth" />
		<!--{/if}-->
	<div class="ren_mn">
		<ul class="ren_denglu">
			<li class="ren_rfm"><input type="text" value="" tabindex="1" class="ren_px input_text zhanghaoicon xg1" size="30" autocomplete="off" value="" name="username" placeholder="{lang inputyourname}" fwin="login"></li>
			<li class="ren_rfm"><input type="password" tabindex="2" class="ren_px input_text mimaicon xg1" size="30" value="" name="password" placeholder="{lang login_password}" fwin="login"></li>
			<li class="ren_rfm">
            	<div class="login_select">
				
				<select id="questionid_{$loginhash}" name="questionid" class="ren_label_tiwen">
					<option value="0" selected="selected">{lang security_question}</option>
					<option value="1">{lang security_question_1}</option>
					<option value="2">{lang security_question_2}</option>
					<option value="3">{lang security_question_3}</option>
					<option value="4">{lang security_question_4}</option>
					<option value="5">{lang security_question_5}</option>
					<option value="6">{lang security_question_6}</option>
					<option value="7">{lang security_question_7}</option>
				</select>
			</li>
			<li class="bl_none answerli ren_rfm" style="display:none;"><input type="text" name="answer" id="answer_{$loginhash}" class="ren_px input_text_tiwen xg1" size="30" placeholder="{lang security_a}"></li>
		</ul>
		<!--{if $seccodecheck}-->
		<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
	</div>
	<div class="ren_rfm ren_m_dl">
        <button class="ren_pn" type="submit" name="loginsubmit" value="true" tabindex="1"><strong>{lang login}</strong></button>
        <!--{if $this->setting['sitemessage'][login] && empty($_GET['infloat'])}--><a href="javascript:;" id="custominfo_login_$loginhash" class="y">&nbsp;<img src="{IMGDIR}/info_small.gif" alt="{lang faq}" class="vm" /></a><!--{/if}-->
        <a href="member.php?mod={$_G[setting][regname]}" class="ren_ljzc y"><span>注册</span></a>
    </div>
	</form>
    <div class="ren_qtzhdl cl">
	<!--{if $_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']}-->
		<div class="ren_qtzh cl"><span>使用其它账号登录</span></div>
		<div class="ren_qqlogin cl"><a class="ren_qq" href="$_G[connect][login_url]&statfrom=login_simple"></a></div>
	<!--{/if}-->
    </div>
	<!--{hook/logging_bottom_mobile}-->
</div>
<!-- userinfo end -->

<!--{if $_G['setting']['pwdsafety']}-->
	<script type="text/javascript" src="{$_G['setting']['jspath']}md5.js?{VERHASH}" reload="1"></script>
<!--{/if}-->
<!--{eval updatesession();}-->

<script type="text/javascript">
	(function() {
		$(document).on('change', '.ren_label_tiwen', function() {
			var obj = $(this);
			$('.span_question').text(obj.find('option:selected').text());
			if(obj.val() == 0) {
				$('.answerli').css('display', 'none');
				$('.questionli').addClass('bl_none');
			} else {
				$('.answerli').css('display', 'block');
				$('.questionli').removeClass('bl_none');
			}
		});
	 })();
</script>

<!--{template common/footer}-->
