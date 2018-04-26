<?PHP exit('Access Denied');?>
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['mycenter']}-->

<!-- header start -->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
		<a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
        <div class="ren_top_grkj z">
			<span class="ren_bk_name ren_vm">¸öÈË¿Õ¼ä</span>
		</div>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->

			<script type="text/javascript">
				function updateavatar() {
					window.location.href = document.location.href.replace('&reload=1', '') + '&reload=1';
				}
				<!--{if !$reload}-->
				saveUserdata('avatar_redirect', document.referrer);
				<!--{/if}-->
			</script>
            <div class="ren_zl_xg">
			<form method="post" autocomplete="off" action="home.php?mod=spacecp&ac=avatar&ref">
				<table cellspacing="0" cellpadding="0" class="tfm">
					<caption>
						<h2 class="xs2">{lang current_my_space}</h2>
					</caption>
					<tr>
						<td>
							<!--{avatar($space[uid],big)}-->
						</td>
					</tr>
				</table>

				<table cellspacing="0" cellpadding="0" class="tfm">
					<caption>
						<h2 class="xs2">{lang setting_my_new_avatar}</h2>
					</caption>
					<tr>
						<td>

						</td>
					</tr>
				</table>
				<input type="hidden" name="formhash" value="{FORMHASH}" />
			</form>
            </div>
		</div>
	</div>
	<script type="text/javascript">
		var redirecturl = loadUserdata('avatar_redirect');
		if(redirecturl) {
			$('retpre').innerHTML = '<a href="' + redirecturl + '">{lang previous_page}</a>';
		}
	</script>
</div>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
