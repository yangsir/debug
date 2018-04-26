<?PHP exit('Access Denied');?>
<ul class="ren_tbn">
    <li $opactives['pm']><a href="home.php?mod=space&do=pm">我的消息<!--{if $newpmcount}--><strong class="xi1">$newpmcount</strong><!--{/if}--></a><span>></span></li>
    <!--{loop $_G['notice_structure'] $key $type}-->
    <li $opactives[$key]></em><a href="home.php?mod=space&do=notice&view=$key"><!--{eval echo lang('template', 'notice_'.$key)}--><!--{if $_G['member']['category_num'][$key]}--><strong class="xi1">$_G['member']['category_num'][$key]</strong><!--{/if}--></a><span>></span></li>
    <!--{/loop}-->
    <!--{if $_G['setting']['my_app_status']}-->
    <li$actives[userapp]><a href="home.php?mod=space&do=notice&view=userapp">{lang applications_news}{if $mynotice}($mynotice){/if}</a><span>></span></li>
    <!--{/if}-->
</ul>