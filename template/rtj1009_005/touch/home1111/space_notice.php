<?PHP exit('Access Denied');?>
<!--{eval $_G['home_tpl_titles'] = array('{lang remind}');}-->
<!--{template common/header}-->

<style id="diy_style" type="text/css"></style>
<div class="wp">
	<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<div id="ct" class="rtj1009_ct2 cl">
	<div class="rtj1009_sz_mn">
		<div class="ren_sz_bm">
            <div class="ren_sz_bt"><h3>{lang remind}</div>
                <div class="ren_sz_z">
                <div class=" cl">
                    <ul class="z ren_g_cd">
                        <!--{if $_G['notice_structure'][$view] && ($view == 'mypost' || $view == 'interactive')}-->
                            <!--{loop $_G['notice_structure'][$view] $subtype}-->
                                <li$readtag[$subtype]><a href="home.php?mod=space&do=notice&view=$view&type=$subtype"><!--{eval echo lang('template', 'notice_'.$view.'_'.$subtype)}--><!--{if $_G['member']['newprompt_num'][$subtype]}-->($_G['member']['newprompt_num'][$subtype])<!--{/if}--></a></li>
                            <!--{/loop}-->
                        <!--{else}-->
                            <li class="a"><a href="home.php?mod=space&do=notice&view=$view"><!--{eval echo lang('template', 'notice_'.$view)}--></a></li>
                        <!--{/if}-->
                    </ul>
                    <ul class="ren_g_lc y">
                        <li class="ren_xxx_y"><a href="home.php?mod=spacecp&ac=privacy&op=filter" target="_blank" class="xi2">{lang filter_settings}</a></li>
                    </ul>
                </div>

		<!--{if $view=='userapp'}-->

			<script type="text/javascript">
				function manyou_add_userapp(hash, url) {
					if(isUndefined(url)) {
						$(hash).innerHTML = "<tr><td colspan=\"2\">{lang successfully_ignored_information}</td></tr>";
					} else {
						$(hash).innerHTML = "<tr><td colspan=\"2\">{lang is_guide_you_in}</td></tr>";
					}
					var x = new Ajax();
					x.get('home.php?mod=misc&ac=ajax&op=deluserapp&hash='+hash, function(s){
						if(!isUndefined(url)) {
							location.href = url;
						}
					});
				}
			</script>

			<div class="ct_vw cl">
				<div class="ct_vw_sd">
					<ul class="mtw">
						<!--{if $list}--><li><a href="home.php?mod=space&do=notice&view=userapp">{lang all_applications_news}</a></li><!--{/if}-->
						<!--{loop $apparr $type $val}-->
						<li class="mtn">
							<a href="home.php?mod=userapp&id=$val[0][appid]&uid=$space[uid]" title="$val[0][typename]"><img src="http://appicon.manyou.com/icons/$val[0][appid]" alt="$val[0][typename]" class="vm" /></a>
							<a href="home.php?mod=space&do=notice&view=userapp&type=$val[0][appid]"> <!--{eval echo count($val);}--> {lang unit} $val[0][typename] <!--{if $val[0][type]}-->{lang request}<!--{else}-->{lang invite}<!--{/if}--></a>
						</li>
						<!--{/loop}-->
					</ul>
				</div>
				<div class="ct_vw_mn">
					<!--{if $list}-->
						<!--{loop $list $key $invite}-->
							<h4 class="mtw mbm">
								<a href="home.php?mod=space&do=notice&view=userapp&op=del&appid=$invite[0][appid]" class="y xg1">{lang ignore_invitations_application}</a>
								<a href="home.php?mod=userapp&id=$invite[0][appid]&uid=$space[uid]" title="$apparr[$invite[0][appid]]"><img src="http://appicon.manyou.com/icons/$invite[0][appid]" alt="$apparr[$invite[0][appid]]" class="vm" /></a>
								{lang notice_you_have} <!--{eval echo count($invite);}--> {lang unit} $invite[0][typename] <!--{if $invite[0][type]}-->{lang request}<!--{else}-->{lang invite}<!--{/if}-->
							</h4>
							<div class="xld xlda">
							<!--{loop $invite $value}-->
								<dl class="bbda cl">
									<dd class="m avt mbn">
										<a href="home.php?mod=space&uid=$value[fromuid]"><!--{avatar($value[fromuid],small)}--></a>
									</dd>
									<dt id="$value[hash]">
										<div class="xw0 xi3">$value[myml]</div>
									</dt>
								</dl>
							<!--{/loop}-->
							</div>
						<!--{/loop}-->
						<!--{if $multi}--><div class="pgs cl">$multi</div><!--{/if}-->
					<!--{else}-->
						<div class="emp">{lang no_request_applications_invite}</div>
					<!--{/if}-->
				</div>
			</div>

		<!--{else}-->
			<!--{if empty($list)}-->
			<div class="emp mtw ptw hm xs2">
				<!--{if $new == 1}-->
					{lang no_new_notice}<a href="home.php?mod=space&do=notice&isread=1">{lang view_old_notice}</a>
				<!--{else}-->
					{lang no_notice}
				<!--{/if}-->
			</div>
			<!--{/if}-->

			<script type="text/javascript">

				function deleteQueryNotice(uid, type) {
					var dlObj = $(type + '_' + uid);
					if(dlObj != null) {
						var id = dlObj.getAttribute('notice');
						var x = new Ajax();
						x.get('home.php?mod=misc&ac=ajax&op=delnotice&inajax=1&id='+id, function(s){
							dlObj.parentNode.removeChild(dlObj);
						});
					}
				}

				function errorhandle_pokeignore(msg, values) {
					deleteQueryNotice(values['uid'], 'pokeQuery');
				}
			</script>

			<!--{if $list}-->
				<div class="xld xlda">
					<div class="nts">
						<!--{loop $list $key $value}-->
							<dl class="cl {if $key==1}bw0{/if}" $value[rowid] notice="$value[id]">
								<dd class="m avt mbn">
									<!--{if $value[authorid]}-->
									<a href="home.php?mod=space&uid=$value[authorid]"><!--{avatar($value[authorid],small)}--></a>
									<!--{else}-->
									<img src="{IMGDIR}/systempm.png" alt="systempm" />
									<!--{/if}-->
								</dd>
								<dt>
									<a class="d b" href="home.php?mod=spacecp&ac=common&op=ignore&authorid=$value[authorid]&type=$value[type]&handlekey=addfriendhk_{$value[authorid]}" id="a_note_$value[id]" onclick="showWindow(this.id, this.href, 'get', 0);" title="{lang shield}">{lang shield}</a>
									<span class="xg1 xw0"><!--{date($value[dateline], 'u')}--></span>
								</dt>
								<dd class="ntc_body" style="$value[style]">
									$value[note]
								</dd>

								<!--{if $value[from_num]}-->
								<dd class="xg1 xw0">{lang ignore_same_notice_message}</dd>
								<!--{/if}-->

							</dl>
						<!--{/loop}-->
					</div>
				</div>

				<!--{if $view!='userapp' && $space[notifications]}-->
				<div class="mtm mbm"><a href="home.php?mod=space&do=notice&ignore=all">{lang ignore_same_notice_message} <em>&rsaquo;</em></a></div>
				<!--{/if}-->

				<!--{if $multi}--><div class="pgs cl">$multi</div><!--{/if}-->
			<!--{/if}-->

		<!--{/if}-->
        </div>
		</div>
	</div>
	<div class="rtj1009_zcd">
		<!--{subtemplate home/space_prompt_nav}-->

		<div class="drag">
			<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
		</div>

	</div>
</div>

<div class="wp mtn">
	<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>

<!--{template common/footer}-->