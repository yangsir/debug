<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
		<!--{if $_G['setting']['domain']['app']['mobile']}-->
			{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
		<!--{else}-->
			{eval $nav = "forum.php";}
		<!--{/if}-->
		<a class="ren_logo" title="$_G[setting][bbname]" href="$nav"><img src="template/rtj1009_005/image/logo.png" /></a>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>

<div class="ren_tip">
<!--{if $_GET['op'] == 'delete'}-->
	<form id="favoriteform_{$favid}" name="favoriteform_{$favid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=favorite&op=delete&favid=$favid&type=$_GET[type]&mobile=2">
		<input type="hidden" name="referer" value="{eval echo dreferer();}" />
		<input type="hidden" name="deletesubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
	<dt>{lang delete_favorite_message}</dt>
	<dd><input type="submit" name="deletesubmitbtn" value="{lang determine}" class="formdialog button2"></dd>
	</form>
<!--{else}-->
	<form method="post" autocomplete="off" id="favoriteform_{$id}" name="favoriteform_{$id}" action="home.php?mod=spacecp&ac=favorite&type=$type&id=$id&spaceuid=$spaceuid&mobile=2" >
		<input type="hidden" name="favoritesubmit" value="true" />
		<input type="hidden" name="referer" value="{eval echo dreferer();}" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
	<dt>
    <p><!--{if $_GET[type] == 'forum'}-->{lang favorite_forum_confirm}<!--{elseif $_GET[type] == 'thread'}--> ’≤ÿ∏√Ã˚£∫<!--{/if}--><span>{$title}</span></p>
	<p>{lang favorite_description}£∫</p>
	<textarea id="general_{$id}" name="description" rows="1" class="txt" ><!--{if $description}-->$description<!--{else}-->{lang favorite_description_default}<!--{/if}--></textarea>
	</dt>
	<dd class="ren_rfm cl"><input type="submit" name="favoritesubmit_btn" id="favoritesubmit_btn"  value="{lang determine}" class="formdialog ren_pn"><a class="ren_ljzc" href="javascript:;" onclick="popup.close();">{lang cancel}</a></dd>
	</form>
<!--{/if}-->
</div>


<!--{template common/footer}-->
