<?PHP exit('Access Denied');?>
<!--{if $debate[umpire]}-->
	<!--{if $debate['umpirepoint']}-->
	<div>
		<p>
			<!--{if $debate[winner]}-->
			<!--{if $debate[winner] == 1}-->
			<label><strong>{lang debate_square}</strong>{lang debate_winner}</label>
			<!--{elseif $debate[winner] == 2}-->
			<label><strong>{lang debate_opponent}</strong>{lang debate_winner}</label>
			<!--{else}-->
			<label><strong>{lang debate_draw}</strong></label>
			<!--{/if}-->
			<!--{/if}-->
			<em>{lang debate_comment_dateline}: $debate[endtime]</em>
		</p>
		<!--{if $debate[umpirepoint]}--><p><strong>{lang debate_umpirepoint}</strong>: $debate[umpirepoint]</p><!--{/if}-->
		<!--{if $debate[bestdebater]}--><p><strong>{lang debate_bestdebater}</strong>: $debate[bestdebater]</p><!--{/if}-->
	</div>
	<!--{/if}-->
<!--{/if}-->

<div id="postmessage_$post[pid]" class="postmessage">$post[message]</div>



<div class="mbn">
    <div class="mbn pbn bbn">
        <strong>{lang debate_square_point} ($debate[affirmvotes]) ({lang debater}:$debate[affirmdebaters]) </strong>
        <p class="xg2">$debate[affirmpoint]</p>
        <p><!--{if !$_G['forum_thread']['is_archived']}-->
			<a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=1" id="affirmbutton" >{lang debate_support}</a><!--{/if}--></p>
    </div>
    <div class="mbn">
        <strong>{lang debate_opponent_point} ($debate[negavotes]) ({lang debater}:$debate[negadebaters])</strong>
        <p class="xg2">$debate[negapoint]</p>
        <p><a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=2" id="negabutton" >{lang debate_support}</a></p>
    </div>
</div>

<div>
<!--{if $debate[endtime]}-->
	<p>{lang endtime}: $debate[endtime] <!--{if $debate[umpire]}-->{lang debate_umpire}: $debate[umpire]<!--{/if}--></p>
<!--{/if}-->

<!--{if $debate[umpire] && $_G['username'] && $debate[umpire] == $_G['member']['username']}-->
	<p class="mtn">
	<!--{if $debate[remaintime] && !$debate[umpirepoint]}-->
	 <a href="forum.php?mod=misc&action=debateumpire&tid=$_G[tid]&pid=$post[pid]{if $_GET[from]}&from=$_GET[from]{/if}" >{lang debate_umpire_end}</a>
	<!--{elseif TIMESTAMP - $debate['dbendtime'] < 3600}-->
	 <a href="forum.php?mod=misc&action=debateumpire&tid=$_G[tid]&pid=$post[pid]{if $_GET[from]}&from=$_GET[from]{/if}" >{lang debate_umpirepoint_edit}</a>
	<!--{/if}-->
	</p>
<!--{/if}-->
</div>