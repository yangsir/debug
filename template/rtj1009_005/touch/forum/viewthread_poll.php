<?PHP exit('Access Denied');?>
<div id="postmessage_$post[pid]" class="postmessage">$post[message]</div>

<div class="ren_poll">
<script type="text/javascript">
<!--{if $optiontype=='checkbox'}-->
	var max_obj = $maxchoices;
	var p = 0;
<!--{/if}-->
</script>

<form id="poll" name="poll" method="post" autocomplete="off" action="forum.php?mod=misc&action=votepoll&fid=$_G[fid]&tid=$_G[tid]&pollsubmit=yes{if $_GET[from]}&from=$_GET[from]{/if}&quickforward=yes" onsubmit="if($('post_$post[pid]')) {ajaxpost('poll', 'post_$post[pid]', 'post_$post[pid]');return false}">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<div class="ren_pinf">
		<!--{if $multiple}--><span>{lang poll_multiple}{lang thread_poll}</span><!--{if $maxchoices}-->£º( {lang poll_more_than} )<!--{/if}--><!--{else}--><span>{lang poll_single}{lang thread_poll}</span><!--{/if}--><!--{if $visiblepoll && $_G['group']['allowvote']}--> , {lang poll_after_result}<!--{/if}--> , {lang poll_voterscount}
	</div>

	<!--{hook/viewthread_poll_top}-->

	<!--{if $_G[forum_thread][remaintime]}-->
	<p class="ren_ptmr">
		{lang poll_count_down}£º<span>
		<!--{if $_G[forum_thread][remaintime][0]}-->$_G[forum_thread][remaintime][0] {lang days}<!--{/if}-->
		<!--{if $_G[forum_thread][remaintime][1]}-->$_G[forum_thread][remaintime][1] {lang poll_hour}<!--{/if}-->
		$_G[forum_thread][remaintime][2] {lang poll_minute}
	</p>
	<!--{elseif $expiration && $expirations < TIMESTAMP}-->
	<p class="ren_ptmr"><span>{lang poll_end}</span></p>
	<!--{/if}-->

	<div class="ren_po_pcht">

		<ul class="cl">
			<!--{if $isimagepoll}-->
				<!--{eval $i = 0;}-->
					<!--{loop $polloptions $key $option}-->
					<!--{eval $i++;}-->
					<!--{eval $imginfo=$option['imginfo'];}-->
					
					<li id="polloption_$option[polloptionid]">
						<div class="ren_pollli cl">
							<!--{if $imginfo}-->
							<a href="javascript:;" title="$imginfo[filename]" >
								<img src="$imginfo[small]" alt="$imginfo[filename]" title="$imginfo[filename]" />
							</a>
							<!--{else}-->
							<a href="javascript:;" title=""><img src="{IMGDIR}/nophoto.gif"/></a>
							<!--{/if}-->
							<p class="ren_po_gx">
								<!--{if $_G['group']['allowvote']}-->
									<label><input class="pr" type="$optiontype" id="option_$key" name="pollanswers[]" value="$option[polloptionid]" {if $_G['forum_thread']['is_archived']}disabled="disabled"{/if} {if $optiontype=='checkbox'}onclick="poll_checkbox(this)"{else}onclick="$('pollsubmit').disabled = false"{/if} /></label>
								<!--{/if}-->
								$option[polloption]
							</p>
							<!--{if !$visiblepoll}-->
							<div class="ren_img_jc">
								<span class="jdt" style="width: $option[width]; background-color:#$option[color]">&nbsp;</span>
								<p class="imgfc">
									<span class="z">$option[votes]{lang debate_poll}</span>
									<span class="y">{$option[percent]}% </span>
								</p>
							</div>
							<!--{/if}-->
						</div>
					</li>
					<!--{/loop}-->
			
			<!--{else}-->
				<!--{loop $polloptions $key $option}-->
					<li class="ren_ptl">
						<!--{if $_G['group']['allowvote']}-->
							<div class="ren_po_pslt"><input class="ren_po_pr" type="$optiontype" id="option_$key" name="pollanswers[]" value="$option[polloptionid]" {if $_G['forum_thread']['is_archived']}disabled="disabled"{/if} {if $optiontype=='checkbox'}onclick="poll_checkbox(this)"{else}onclick="$('pollsubmit').disabled = false"{/if} /></div>
						<!--{/if}-->
						<div class="ren_pvt">
							<label for="option_$key">$key. &nbsp;$option[polloption]</label>
						</div>
						<div class="pvts"></div>
					</li>
	
					<!--{if !$visiblepoll}-->
						<li class="ren_po_jd">
                            <div class="ren_po_pbg">
                                <div class="ren_po_pbr" style="width: $option[width]; background-color:#$option[color]"></div>
                            </div>
							<div class="ren_po_bfb">$option[percent]% <em style="color:#$option[color]">($option[votes])</em></div>
						</li>
					<!--{/if}-->
				<!--{/loop}-->
			
			<!--{/if}-->
		</ul>
		     <div class="ren_po_tpan">
                <!--{if $_G['group']['allowvote'] && !$_G['forum_thread']['is_archived']}-->
                    <input type="submit" name="pollsubmit" id="pollsubmit" value="{lang submit}" />
                    <!--{if $overt}-->
                        <span class="xg2">{lang poll_msg_overt}</span>
                    <!--{/if}-->
                <!--{elseif !$allwvoteusergroup}-->
                    <!--{if !$_G['uid']}-->
                    <span class="xi1">{lang poll_msg_allwvote_user}</span>
                    <!--{else}-->
                    <span class="xi1">{lang poll_msg_allwvoteusergroup}</span>
                    <!--{/if}-->
                <!--{elseif !$allowvotepolled}-->
                    <span class="xi1">{lang poll_msg_allowvotepolled}</span>
                <!--{elseif !$allowvotethread}-->
                    <span class="xi1">{lang poll_msg_allowvotethread}</span>
                <!--{/if}-->
            </div>
	</div>
</form>

</div>
