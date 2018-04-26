<?PHP exit('Access Denied');?>
<!--{eval $friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');}-->
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['mycenter']}-->


<!--{if $diymode}-->
	<!--{if $_G[setting][homepagestyle]}-->
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
        <!-- userinfo end -->
		<div id="ren_ct" class="rtj1009_lai_ct cl">
            <div class="rtj1009_sz_mn">
                <div class="bm">
					<div class="ren_bm_c">
	<!--{else}-->
    
		<!--{template home/space_menu}-->
		<div id="ct" class="rtj1009_ct cl">
			<div class="ren_g_mn">
				<div class="ren_ly_bm">
					<div class="ren_ly_c">
	<!--{/if}-->
<!--{else}-->
	<!-- header start -->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
		<a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
        <div class="ren_top_grkj z">
			<span class="ren_bk_name ren_vm">相册</span>
		</div>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->
	<div id="ct" class="rtj1009_ct2 cl">
			<div class="rtj1009_zcd">
                <ul class="ren_tbn">
                    <li><a $actives[me] href="home.php?mod=space&do=album&view=me">我的相册</a></li>
                    <li><a $actives[we] href="home.php?mod=space&do=album&view=we">好友相册</a></li>
                    <li><a $actives[all] href="home.php?mod=space&do=album&view=all">{lang view_all}</a></li>
                </ul>
			</div>
			<div class="rtj1009_sz_mn">
<!--{/if}-->

		<div class="ren_sz_z">
            <!--{if $picmode}-->
                <!--{if $pricount}-->
                <p class="mbw">{lang hide_pic}</p>
                <!--{/if}-->
                <!--{if $count}-->
                <ul class="cl">
                    <!--{loop $list $key $value}-->
                    <li class="d">
                        <div class="c">
                            <a href="home.php?mod=space&uid=$value[uid]&do=album&picid=$value[picid]"><!--{if $value[pic]}--><img src="$value[pic]" alt="" /><!--{/if}--></a>
                        </div>
                        <p class="ptm"><a href="home.php?mod=space&uid=$value[uid]&do=album&id=$value[albumid]" class="xi2">$value[albumname]</a></p>
                        <span><a href="home.php?mod=space&uid=$value[uid]">$value[username]</a></span>
                    </li>
                    <!--{/loop}-->
                </ul>
                <!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
                <!--{else}-->
                <div class="ren_ss_wu">
                    <span></span>
                    <a href="javascript:;">暂无内容</a>
                </div>
                <!--{/if}-->
  
            <!--{else}-->
  
                <!--{if $searchkey}-->
                <p class="mbw">{lang follow_search_album} <span style="color: red; font-weight: 700;">$searchkey</span> {lang doing_record_list}</p>
                <!--{/if}-->
  
                <!--{if $pricount}-->
                <p class="mbw">{lang hide_album}</p>
                <!--{/if}-->
  
                <!--{if $count}-->
                <ul class="cl">
                    <!--{loop $list $key $value}-->
                    <!--{eval $pwdkey = 'view_pwd_album_'.$value['albumid'];}-->
                    <li>
                        <div class="c">
                            <a href="home.php?mod=space&uid=$value[uid]&do=album&id=$value[albumid]" {if $_G['adminid'] != 1 && $value[uid]!=$_G[uid] && $value[friend]=='4' && $value[password] && empty($_G[cookie][$pwdkey])} onclick="showWindow('list_album_$value[albumid]', this.href, 'get', 0);"{/if}>
                            	<!--{if $value[pic]}--><img src="$value[pic]"/><!--{/if}-->
                                <p><!--{if $value[albumname]}-->$value[albumname]<!--{else}-->{lang default_album}<!--{/if}--></p>
                                <!--{if $value[picnum]}--><span> $value[picnum] </span><!--{/if}-->
                            </a>
                        </div>
                    </li>
                    <!--{/loop}-->
                </ul>
                <!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
                <!--{else}-->
                    <!--{if $space[self] && $_GET['view']=='me'}-->
                        <ul class="ml mla cl">
                            <li>
                                <div class="c">
                                    <a href="home.php?mod=space&uid=$value[uid]&do=album&id=-1">
                                    	<img src="{IMGDIR}/nophoto.gif" alt="{lang default_album}" />
                                    	<p><!--{if $value[albumname]}-->$value[albumname]<!--{else}-->{lang default_album}<!--{/if}--></p>
                                		<!--{if $value[picnum]}--><span> $value[picnum] </span><!--{/if}-->
                                    </a>
                                </div>
                            </li>
                        </ul>
                    <!--{else}-->
                        <div class="ren_ss_wu">
                            <span></span>
                            <a href="javascript:;">暂无内容</a>
                        </div>
                    <!--{/if}-->
                <!--{/if}-->
  
            <!--{/if}-->
            </div>

		<!--{if $diymode}-->
				</div>
			<!--{if $_G[setting][homepagestyle]}-->
			</div>
			<!--{/if}-->
		<!--{/if}-->
		</div>
	</div>
<script type="text/javascript">
function fuidgoto(fuid) {
	var parameter = fuid != '' ? '&fuid='+fuid : '';
	window.location.href = 'home.php?mod=space&do=album&view=we'+parameter;
}
</script>

<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
