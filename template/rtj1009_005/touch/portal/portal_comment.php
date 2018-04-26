<?PHP exit('Access Denied');?>
<div class="ren_wz_pl cl">
	<div class="ren_lc_ks cl">
    	<span class="ren_lc_ksy y">
		
		<!--{if $data[commentnum]}-->$data[commentnum]条评论<!--{/if}-->
        </span>
		<span class="ren_lc_ksz z">{lang latest_comment}</span>
	</div>
	<div id="comment_ul" class="ren_wz_pl">
    <!--{if $data[commentnum]}-->
		<!--{loop $commentlist $comment}-->
		<!--{template portal/comment_li}-->
		<!--{if !empty($aimgs[$comment[cid]])}-->
			<script type="text/javascript" reload="1">aimgcount[{$comment[cid]}] = [<!--{echo implode(',', $aimgs[$comment[cid]]);}-->];attachimgshow($comment[cid]);</script>
		<!--{/if}-->
		<!--{/loop}-->
        <!--{else}-->
        <div class="ren_ss_wu">
            <span></span>
            <a href="javascript:;">暂无评论</a>
        </div>
    <!--{/if}-->
		<!--{if !empty($pricount)}-->
			<p class="mtn mbn y">{lang hide_portal_comment}</p>
		<!--{/if}-->
		<!--{if !$data[htmlmade]}-->
			<form id="cform" name="cform" action="$form_url" method="post" autocomplete="off">
				<div class="ren_post_pi cl">
					<div class="ren_post_nr">
						<textarea name="message" rows="3" placeholder="我也说一句" value="我也说一句" class="grey ren_post_nrk" id="message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');"></textarea>
					</div>
                    <div class="ren_post_tj">
                        <div id="fastpostsubmitline" class="post_fast">
                            <button type="submit" name="commentsubmit_btn" id="commentsubmit_btn" value="true" class="ren_post_tjan"><strong>{lang comment}</strong></button>
                        </div>
                    </div>
				</div>

				<!--{if $secqaacheck || $seccodecheck}-->
					<!--{block sectpl}--><sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div><!--{/block}-->
					<div class="mtm"><!--{subtemplate common/seccheck}--></div>
				<!--{/if}-->
				<!--{if !empty($topicid) }-->
					<input type="hidden" name="referer" value="$topicurl#comment" />
					<input type="hidden" name="topicid" value="$topicid">
				<!--{else}-->
					<input type="hidden" name="portal_referer" value="$viewurl#comment">
					<input type="hidden" name="referer" value="$viewurl#comment" />
					<input type="hidden" name="id" value="$data[id]" />
					<input type="hidden" name="idtype" value="$data[idtype]" />
					<input type="hidden" name="aid" value="$aid">
				<!--{/if}-->
				<input type="hidden" name="formhash" value="{FORMHASH}">
				<input type="hidden" name="replysubmit" value="true">
				<input type="hidden" name="commentsubmit" value="true" />
                
			</form>
		<!--{/if}-->
	</div>
</div>