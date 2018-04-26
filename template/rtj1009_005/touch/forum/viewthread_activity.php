<?PHP exit('Access Denied');?>
<div class="ren_hthie_xx">
	<div class="spvimg">
		<!--{if $activity['thumb']}--><a href="javascript:;"><img src="$activity['thumb']" onclick="zoom(this, '$activity[attachurl]')" width="{if $activity[width] > 300}300{else}$activity[width]{/if}" /></a><!--{else}--><img src="{IMGDIR}/nophoto.gif" width="300" height="300" /><!--{/if}-->
	</div>
	<table summary="{lang threathype_option}" cellpatding="0" cellspacing="0" class="cgtl ren_view_flxxnr">
    	<tbody>
		<tr>
			<th>{lang activity_type}：</th>
			<td>$activity[class]</td>
        </tr>
		<tr>
			<th>{lang activity_starttime}：</th>
			<td>
				<!--{if $activity['starttimeto']}-->
					{lang activity_start_between}
				<!--{else}-->
					$activity[starttimefrom]
				<!--{/if}-->
			</td>
        </tr>
		<tr>
			<th>集合地点：</th>
			<td>$activity[place]</td>
        </tr>
		<tr>
			<th>性别要求：</th>
			<td>
				<!--{if $activity['gender'] == 1}-->
					{lang male}
				<!--{elseif $activity['gender'] == 2}-->
					{lang female}
				<!--{else}-->
					 {lang unlimited}
				<!--{/if}-->
			</td>
        </tr>
		<tr>
			<!--{if $activity['cost']}-->
				<th>{lang activity_payment}：</th>
				<td>$activity[cost] {lang payment_unit}</td>
			<!--{/if}-->
			<!--{hook/viewthread_activity_extra1}-->
		</tr>
		<!--{if !$_G['forum_thread']['is_archived']}-->
		<tr class="nums mtw">
			<th>报名人数：</th>
			<td>
				<em>$allapplynum</em> {lang activity_member_unit}
			</td>
		</tr>
		<tr>
			<!--{if $activity['number']}-->
			<th>{lang activity_about_member}：</th>
			<td>
				$aboutmembers {lang activity_member_unit}
			</td>
			<!--{/if}-->
		</tr>
		<tr>
			<!--{if $activity['expiration']}-->
				<th>{lang post_closing}：</th>
				<td>$activity[expiration]</td>
			<!--{/if}-->
			<!--{hook/viewthread_activity_extra2}-->
		</tr>
		<!--{/if}-->
        </tbody>
	</table>
</div>



<!--{if $_G['uid'] && !$activityclose && (!$applied || $isverified == 2)}-->
	<div id="activityjoin" class="ren_hd_bmxx">
    	<div class="act_pd5">
            <div class="subforumshow ren_bm_bt" href="#ren_m_hdbm">
                <h3 class="ren_pdbt">{lang activity_join}</h3>
            </div>
            <div id="ren_m_hdbm" class="ren_m_hdbm" style="display:none;">
            <!--{if $_G['forum']['status'] == 3 && helper_access::check_module('group') && $isgroupuser != 'isgroupuser'}-->
                <p>{lang activity_no_member}</p>
                <p><a href="forum.php?mod=group&action=join&fid=$_G[fid]" class="xi2">{lang activity_join_group}</a></p>
            <!--{else}-->
                <form name="activity" id="activity" method="post" autocomplete="off" action="forum.php?mod=misc&action=activityapplies&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if $_GET['from']}&from=$_GET['from']{/if}&mobile=2" >
			<input type="hidden" name="formhash" value="{FORMHASH}" />

			<!--{if $_G['setting']['activitycredit'] && $activity['credit'] && !$applied}--><span class="ren_hd_p">{lang activity_need_credit} $activity[credit] {$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]}</span><!--{/if}-->
                <!--{if !empty($activity['ufield']['userfield'])}-->
                    <!--{loop $activity['ufield']['userfield'] $fieldid}-->
                    <!--{if $settings[$fieldid][available]}-->
                    	<li>
                        	<div class="act_sue">$settings[$fieldid][title]</div>
                        	<div class="act_mn">$htmls[$fieldid]</div>
                        </li>
                    <!--{/if}-->
                    <!--{/loop}-->
                <!--{/if}-->
                <!--{if !empty($activity['ufield']['extfield'])}-->
                    <!--{loop $activity['ufield']['extfield'] $extname}-->
                    	<li>
                            <div class="act_sue">$extname</div>
                            <div class="act_mn"><input type="text" name="$extname" maxlength="200" class="txt" value="{if !empty($ufielddata)}$ufielddata[extfield][$extname]{/if}" /></div>
                        </li>
                    <!--{/loop}-->
                <!--{/if}-->
            			<li class="ren_act_si">
                        	<div class="act_si">{lang leaveword}</div>
                        	<div class="act_ml"><textarea name="message" maxlength="200" cols="28" rows="1" class="txt">$applyinfo[message]</textarea></div>
                        </li>
			<div class="act_fai cl">
				<!--{if $_G['setting']['activitycredit'] && $activity['credit'] && checklowerlimit(array('extcredits'.$_G['setting']['activitycredit'] => '-'.$activity['credit']), $_G['uid'], 1, 0, 1) !== true}-->
					<p class="xi1">{$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]} {lang not_enough}$activity['credit']</p>
				<!--{else}-->
					<input type="hidden" name="activitysubmit" value="true">
					<em class="xi1" id="return_activityapplies"></em>
					<button type="submit"><span>确定报名</span></button>
				<!--{/if}-->
			</div>
		</form>
        
                <script type="text/javascript">
                    function succeedhantre_activityapplies(locationhref, message) {
                        showDialog(message, 'notice', '', 'location.href="' + locationhref + '"');
                    }
                </script>
            <!--{/if}-->
            </div>
    	</div>
	</div>
<!--{elseif $_G['uid'] && !$activityclose && $applied}-->

<div id="activityjoincancel" class="ren_hd_bmxx">
	<div class="act_pd5">
        <div class="subforumshow ren_bm_bt" href="#ren_qxbm">
            <h3 class="ren_pdbt">{lang activity_join_cancel}</h3>
        </div>
        <div id="ren_qxbm" class="ren_qxbm" style="display:none;">
            <form name="activity" method="post" autocomplete="off" action="forum.php?mod=misc&action=activityapplies&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if $_GET['from']}&from=$_GET['from']{/if}">
            <input type="hidden" name="formhash" value="{FORMHASH}" />
                <li class="ren_act_si">
                    <div class="act_si">{lang leaveword}</div>
                    <div class="act_ml"><input type="text" name="message" maxlength="200" class="px" value="" /></div>
                </li>
                <div class="act_fai">
                <button type="submit" name="activitycancel"  value="true"><span>确定取消</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--{/if}-->

<!--{if $applylist}-->
<div class="ren_hd_bmlb cl">
	<div class="form_ai cl">
        <div class="ren_bmlb_bt">通过报名 $applynumbers {lang activity_member_unit}</div>
            <ul class="cl">
        <!--{loop $applylist $apply}-->
                <li>
                    <a href="home.php?mod=space&uid=$apply[uid]&do=profile&mobile=2" class="ratl vm"><!--{echo avatar($apply[uid], 'small')}--></a>
                    <p>$apply[username]</p>
                </li>
        <!--{/loop}-->
            </ul>
    </div>
</div>
<!--{/if}-->

<!--{if $applylistverified}-->
	<div class="ren_hd_bmlb cl">
		<div class="form_ai cl">
            <div class="ren_bmlb_bt">暂未通过报名 $applynumbers {lang activity_member_unit}</div>
				<ul class="cl">
			<!--{loop $applylistverified $apply}-->
					<li>
                        <a href="home.php?mod=space&uid=$apply[uid]&do=profile&mobile=2" class="ratl vm"><!--{echo avatar($apply[uid], 'small')}--></a>
                        <p>$apply[username]</p>
					</li>
			<!--{/loop}-->
				</ul>
		</div>
	</div>
<!--{/if}-->


<div id="postmessage_$post[pid]" class="postmessage">$post[message]</div>


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
