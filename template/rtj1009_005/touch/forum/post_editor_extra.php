<?PHP exit('Access Denied');?>
<div class="post_from ren_post_list cl">
    <ul class="cl">
    <!--{if $sortid}-->
		<input type="hidden" name="sortid" value="$sortid" />
	<!--{/if}-->
        <!--{if $isfirstpost && !empty($_G['forum'][threadtypes][types])}-->
        <li class="ren_bl_li post_lei">
            <select id="typeid" name="typeid" class="sort_sel">
                <option value="0" selected="selected">{lang select_thread_catgory}</option>
                <!--{loop $_G['forum'][threadtypes][types] $typeid $name}-->
                <!--{if empty($_G['forum']['threadtypes']['moderators'][$typeid]) || $_G['forum']['ismoderator']}-->
                <option value="$typeid"{if $thread['typeid'] == $typeid || $_GET['typeid'] == $typeid} selected="selected"{/if}><!--{echo strip_tags($name);}--></option>
                <!--{/if}-->
                <!--{/loop}-->
            </select>
        </li>
        <!--{/if}-->
        <li class="ren_bl_li">
        <!--{if $_GET['action'] != 'reply'}-->
        <input type="text" tabindex="1" class="px" id="needsubject" size="30" autocomplete="off" value="$postinfo[subject]" name="subject" placeholder="{lang thread_subject}" fwin="login">
        <!--{else}-->
            回复：$thread['subject']
            <!--{if $quotemessage}-->$quotemessage<!--{/if}-->
        <!--{/if}-->
        </li>
        <!--{if $_GET[action] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']}-->
        <li class="ren_bl_bjli">
        	<label>
            	<input type="checkbox" name="delete" id="delete" class="pc" value="1" title="{lang post_delpost}{if $thread[special] == 3}{lang reward_price_back}{/if}">删除本帖
            </label>
        </li>
        <!--{/if}-->
        <!--{if $showthreadsorts}-->
            <div class="ren_fb_flxx cl">
                <!--{template forum/post_sortoption}-->
            </div>
        <!--{elseif $adveditor}-->
            <!--{if $special == 1}--><!--{template forum/post_poll}-->
            <!--{elseif $special == 2 && ($_GET[action] != 'edit' || ($_GET[action] == 'edit' && ($thread['authorid'] == $_G['uid'] && $_G['group']['allowposttrade'] || $_G['group']['allowedittrade'])))}--><p class="xg1">{lang post_message1}</p><!--{template forum/post_trade}-->
            <!--{elseif $special == 3}--><!--{template forum/post_reward}-->
            <!--{elseif $special == 4}--><!--{template forum/post_activity}-->
            <!--{elseif $special == 5}--><!--{template forum/post_debate}-->
            <!--{elseif $specialextra}--><div class="specialpost s_clear">$threadplughtml</div>
            <!--{/if}-->
        <!--{/if}-->
        <li class="ren_bl_no">
        <textarea class="pt" id="needmessage" tabindex="3" autocomplete="off" id="{$editorid}_textarea" name="$editor[textarea]" cols="80" rows="2"  placeholder="说点什么吧....." fwin="reply">$postinfo[message]</textarea>
        </li>
    </ul>
        <script type="text/javascript" src="template/rtj1009_005/js/smohan.face.js"></script>
		<ul id="imglist" class="ren_post_imglist cl">
			<li class="ren_bl_fj">
				<a href="javascript:;" class="ren_bl_fjy">
					<input type="file" name="Filedata" id="filedata"/>
				</a>
			</li>
		</ul>
		<!--{if $_GET[action] != 'edit' && ($secqaacheck || $seccodecheck)}-->
		<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
		<!--{hook/post_bottom_mobile}-->
	</div>



