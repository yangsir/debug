<?PHP exit('Access Denied');?>
<!--{template common/header}-->

<header class="header rtj1009_header">
	<div class="ren_nav cl">
    	<a href="search.php?mod=forum" class="z ren_nav_ss"></a>
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
<!-- header end -->

<div class="rtj1009_m_portal m_pb49">
	<div class="rtj1009_p_nav">
    	<div class="ren_p_nav">
        	<a href="/forum.php?mod=forumdisplay&fid=106&mobile=2">��ʳ</a>
            <a href="/forum.php?mod=forumdisplay&fid=101&mobile=2">װ��</a>
            <a href="/forum.php?mod=forumdisplay&fid=102&mobile=2">����</a>
            <a href="/portal.php?mod=list&catid=22&mobile=2">����</a>
            <a href="/forum.php?forumlist=1&mobile=2">��̳</a>
        </div>
    </div>

<!-- �������DIYģ����õ�ַ -->

<!--{block/4412}-->
<!--{block/4413}-->
<!--{block/4414}-->
<!--{block/4415}-->
<!--{block/4421}-->
<!--{block/4420}-->
<!--{block/4419}-->
							<!--{block/4416}-->
							<!--{block/4417}-->
							<!--{block/4418}-->
<!-- ���� -->








<script type="text/javascript" src="template/rtj1009_005/js/index.js"></script>
</div>
<!--{template common/footer}-->











