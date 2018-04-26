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
			<span class="ren_bk_name ren_vm">个人空间</span>
		</div>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->
<!-- userinfo start -->
    <!--{template home/space_menu}-->
	<div id="ren_ct" class="rtj1009_lai_ct cl">
		<div class="ren_lai_mn">
			<!--{subtemplate home/space_profile_body}-->
		</div>
	</div>
<!-- userinfo end -->

<!--{else}-->

<!-- header start -->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
		<a href="portal.php?mod=index&mobile=2" class="z ren_fhjt"><span></span></a>
        <div class="ren_top_grkj z">
			<span class="ren_bk_name ren_vm">个人空间</span>
		</div>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->
<!-- userinfo start -->
<div class="rtj1009_myall cl">
    <div class="ren_kj_listtop cl">
    	<a class="ren_kj_rk" href="home.php?mod=spacecp">
        	<em><!--{avatar($space[uid],big)}--></em>
            <div class="ren_kj_jj">
            	<span>{$space[username]}</span>
                <em><!--{if $space[sightml]}-->$space[sightml]<!--{else}-->还没有个性签名，快去添加吧！<!--{/if}--></em>
            </div>
        </a>
    </div>
    
    <div class="ren_kj_list3 cl">
		<a class="ren_kj_zl" href="home.php?mod=space&uid={$_G[uid]}&do=profile"><em></em><span>我的资料</span></a>
	</div>
	<div class="ren_kj_list cl">
			<a class="ren_kj_tie" href="home.php?mod=space&uid={$_G[uid]}&do=thread&view=me"><em></em><span>我的帖子</span></a>
			<a class="ren_kj_xx" href="home.php?mod=space&do=pm"><em></em><span>我的消息</span></a>
            <a class="ren_kj_xc" href="home.php?mod=space&do=album"><em></em><span>我的相册</a></li>
			<a class="ren_kj_sc" href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread"><em></em><span>我的收藏</span></a>
	</div>
    <div class="ren_kj_list2 cl">
        <a class="ren_kj_mm" href="home.php?mod=spacecp&ac=profile&op=password"><em></em><span>密码修改</span></a>
        <a class="ren_kj_sz" href="home.php?mod=spacecp"><em></em><span>修改资料</span></a>
        <a class="ren_kj_tc" href="member.php?mod=logging&action=logout&formhash={FORMHASH}"><em></em><span>退出登录</span></a>
	</div>
</div>
<!-- userinfo end -->
<script type="text/javascript">
	(function() {
		<!--{if !$_G[setting][mobile][mobileforumview]}-->
			$('.sub_forum').css('display', 'block');
		<!--{else}-->
			$('.sub_forum').css('display', 'none');
		<!--{/if}-->
		$('.subforumshow').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
				obj.find('img').attr('src', '{STATICURL}image/mobile/images/collapsed_yes.png');
			} else {
				subobj.css('display', 'none');
				obj.find('img').attr('src', '{STATICURL}image/mobile/images/collapsed_no.png');
			}
		});
	 })();
</script>


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

<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
