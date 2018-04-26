<?PHP exit('Access Denied');?>
<!--{eval $_G['home_tpl_titles'] = array('{lang pm}');}-->
<!--{template common/header}-->
<!--{if in_array($filter, array('privatepm')) || in_array($_GET[subop], array('view'))}-->

	<!--{if in_array($filter, array('privatepm'))}-->

	<!-- header start -->
	<header class="header rtj1009_header">
        <div class="ren_nav cl">
            <a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
            <div class="ren_top_grkj z">
                <span class="ren_bk_name ren_vm">消息</span>
            </div>
            <div class="ren_nav_right">
                <button class="MenuOpen btn ren_btn">
                    <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
                </button>
            </div>
        </div>
    </header>
	<!-- header end -->
	<!-- main pmlist start -->
	<div class="rtj1009_m_main ren_xx_box cl">
		<ul>
			<!--{loop $list $key $value}-->
			<li>
			<div class="ren_xx_img"><img src="<!--{if $value[pmtype] == 2}-->{STATICURL}image/common/grouppm.png<!--{else}--><!--{avatar($value[touid] ? $value[touid] : ($value[lastauthorid] ? $value[lastauthorid] : $value[authorid]), small, true)}--><!--{/if}-->" /></div>
				<a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}">
					<div class="cl">
						<!--{if $value[touid]}-->
							<!--{if $value[msgfromid] == $_G[uid]}-->
								<span class="name">{$value[tousername]}</span>
							<!--{else}-->
								<span class="name">{$value[tousername]}</span>
							<!--{/if}-->
						<!--{elseif $value['pmtype'] == 2}-->
							<span class="name">{lang chatpm_author}:$value['firstauthor']</span>
						<!--{/if}-->
						<span class="time"><!--{date($value[dateline], 'u')}--></span>
					</div>
					<div class="cl grey">
						<span><!--{if $value['pmtype'] == 2}-->[{lang chatpm}]<!--{if $value[subject]}-->$value[subject]<br><!--{/if}--><!--{/if}--><!--{if $value['pmtype'] == 2 && $value['lastauthor']}--><div style="padding:0 0 0 20px;">......<br>$value['lastauthor'] : $value[message]</div><!--{else}-->$value[message]<!--{/if}--></span>
					</div>
					<!--{if $value[new]}--><span class="num">$value[pmnum]</span><!--{/if}-->
				</a>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
	<!-- main pmlist end -->

	<!--{elseif in_array($_GET[subop], array('view'))}-->

	<!-- header start -->
	<header class="header rtj1009_header">
        <div class="ren_nav cl">
            <a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
            <div class="ren_top_grkj z">
                <span class="ren_bk_name ren_vm">消息</span>
            </div>
            <div class="ren_nav_right">
                <button class="MenuOpen btn ren_btn">
                    <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
                </button>
            </div>
        </div>
    </header>
	<!-- header end -->
	<!-- main viewmsg_box start -->
	<div class="ren_xx_wp rtj1009_m_main">
		<div class="ren_msg_box b_m">
			<!--{if !$list}-->
				<li class="ren_wtie_ts">{lang no_corresponding_pm}</li>
			<!--{else}-->
				<!--{loop $list $key $value}-->
					<!--{subtemplate home/space_pm_node}-->
				<!--{/loop}-->
				$multi
			<!--{/if}-->
		</div>
        <div class="ren_xx_hui">
            <form id="pmform" class="pmform" name="pmform" method="post" action="home.php?mod=spacecp&ac=pm&op=send&pmid=$pmid&daterange=$daterange&pmsubmit=yes&mobile=2" >
                <input type="hidden" name="formhash" value="{FORMHASH}" />
                <!--{if !$touid}-->
                <input type="hidden" name="plid" value="$plid" />
                <!--{else}-->
                <input type="hidden" name="touid" value="$touid" />
                <!--{/if}-->
                <script type="text/javascript" src="template/rtj1009_005/js/pm.face.js"></script>
                <div class="ren_reply">
                    <div class="ren_xx_kuang z">
                    	<input type="text" value="" class="ren__xx_px" autocomplete="off" id="replymessage" name="message" placeholder="我想说...">
                    </div>
                    <a href="javascript:void(0)" class="face" title="表情"></a>
                    <div class="ren_xx_rn z"><input type="button" name="pmsubmit" id="pmsubmit" class="formdialog button3" value="发送" /></div>
                </div>
                <div id="Smohan_FaceBox"></div>
            </form>
        </div>
	</div>
	<!-- main viewmsg_box end -->

	<!--{/if}-->

<!--{else}-->
	<div class="bm_c">
		{lang user_mobile_pm_error}
	</div>
<!--{/if}-->

<script type="text/javascript">

$(function (){

	$("a.face").smohanfacebox({

		Event : "click",	//触发事件	

		divid : "Smohan_FaceBox", //外层DIV ID

		textid : "replymessage" //文本框 ID

	});

});



$('#Smohan_Showface').click(function(){

	$('#Zones').fadeIn(360);

	$('#Zones').html($('#Smohan_text').val());

	$('#Zones').replaceface($('#Zones').html());

});

</script>

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
