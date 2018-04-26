<?php exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang pm}');}-->
<!--{template common/header}-->
<!--{if in_array($filter, array('privatepm')) || in_array($_GET[subop], array('view'))}-->
<!--{if in_array($filter, array('privatepm'))}-->
<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
			<a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1"><i class="icon icon-back"></i></a>
		</div>
		<div class="header-title">{lang pm_center}</div>
		<div class="header-right">
			<a href="home.php?mod=spacecp&ac=pm"><i class="icon icon-post"></i></a>
		</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->
<!--{ad/lyrs_mobile:mobile_ads/a_cn/1}-->
<!-- main pmlist start -->
<div class="pmbox">
	<ul>
		<!--{loop $list $key $value}-->
		<li>
		<div class="avatar_img"><img style="height:32px;width:32px;" src="<!--{if $value[pmtype] == 2}-->{STATICURL}image/common/grouppm.png<!--{else}--><!--{avatar($value[touid] ? $value[touid] : ($value[lastauthorid] ? $value[lastauthorid] : $value[authorid]), small, true)}--><!--{/if}-->" /></div>
			<a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}">
				<div class="cl">
					<!--{if $value[new]}--><span class="num">$value[pmnum]</span><!--{/if}-->
					<!--{if $value[touid]}-->
						<!--{if $value[msgfromid] == $_G[uid]}-->
							<span class="name">{lang me}{lang you_to} {$value[tousername]}{lang say}:</span>
						<!--{else}-->
							<span class="name">{$value[tousername]} {lang you_to}{lang me}{lang say}:</span>
						<!--{/if}-->
					<!--{elseif $value['pmtype'] == 2}-->
						<span class="name">{lang chatpm_author}:$value['firstauthor']</span>
					<!--{/if}-->
				</div>
				<div class="cl grey">
					<span class="time"><!--{date($value[dateline], 'u')}--></span>
					<span><!--{if $value['pmtype'] == 2}-->[{lang chatpm}]<!--{if $value[subject]}-->$value[subject]<br><!--{/if}--><!--{/if}--><!--{if $value['pmtype'] == 2 && $value['lastauthor']}--><div style="padding:0 0 0 20px;">......<br>$value['lastauthor'] : $value[message]</div><!--{else}-->$value[message]<!--{/if}--></span>
				</div>
			</a>
		</li>
		<!--{/loop}-->
	</ul>
</div>
<!-- main pmlist end -->

<!--{elseif in_array($_GET[subop], array('view'))}-->

<!-- header start -->
<header class="header">
	<div class="nav">
		<div class="header-left">
			<a href="home.php?mod=space&do=pm"><i class="icon icon-back"></i></a>
		</div>
		<div class="header-title">{lang viewmypm}</div>
	</div>
</header>
<div class="header-bg"></div>
<!-- header end -->

<!-- main viewmsg_box start -->
<div class="wp">
	<div class="msgbox b_m">
		<!--{if !$list}-->
			{lang no_corresponding_pm}
		<!--{else}-->
		<div class="pagelist">
			<!-- more pagelist start -->
			<!--{eval $list = $setting['ajaxpage'] ? array_reverse($list) : $list;}-->
			<!--{loop $list $key $value}-->
				<!--{subtemplate home/space_pm_node}-->
			<!--{/loop}-->
			<!-- more pagelist end -->
		</div>
		<!--{/if}-->
	</div>
	<div class="morebox">
		<!--{eval $totalpage = ceil($count / $perpage);}-->
		<!--{if $page > 1}--><!--{if $setting['ajaxpage']}--><a href="home.php?mod=space&do=pm&subop=view&touid=$touid" class="morelink" data-order="desc" data-num="{$totalpage}-{echo $page - 2;}">$language[view_more]</a><!--{else}-->$multi<!--{/if}--><!--{/if}-->
	</div>
	<!--{if $list}-->
	<form id="pmform" class="pmform" name="pmform" method="post" action="home.php?mod=spacecp&ac=pm&op=send&pmid=$pmid&daterange=$daterange&pmsubmit=yes&mobile=2" >
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<!--{if !$touid}-->
		<input type="hidden" name="plid" value="$plid" />
		<!--{else}-->
		<input type="hidden" name="touid" value="$touid" />
		<!--{/if}-->
		<div class="b_m">
			<table width="100%" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td>
							<input type="text" value="" class="input" autocomplete="off" id="replymessage" name="message" />
						</td>
						<td width="66" align="right">
							<input type="button" name="pmsubmit" id="pmsubmit" class="formdialog button2" value="{lang reply}" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
	<!--{/if}-->
</div>
<!-- main viewmsg_box end -->

<!--{/if}-->

<!--{else}-->
	<div class="bm_c">
		{lang user_mobile_pm_error}
	</div>
<!--{/if}-->

<!--{template common/footer}-->
