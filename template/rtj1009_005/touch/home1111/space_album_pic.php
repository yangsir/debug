<?PHP exit('Access Denied');?>
<!--{eval $_G['home_tpl_titles'] = array(getstr($pic['title'], 60, 0, 0, 0, -1), $album['albumname'], '{lang album}');}-->
<!--{eval $friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');}-->
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['mycenter']}-->

<!--{if $_G[setting][homepagestyle]}-->
    <!-- header start -->
    <header class="header rtj1009_header">
        <div class="ren_nav cl">
            <a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
            <div class="ren_top_grkj z">
                <span class="ren_bk_name ren_vm">{$space[username]}µÄÏà²á</span>
            </div>
            <div class="ren_nav_right">
                <button class="MenuOpen btn ren_btn">
                    <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
                </button>
            </div>
        </div>
    </header>
    <!-- header end -->
    <!-- userinfo start -->
    <!--{template home/space_menu}-->
    <!-- userinfo end -->
	<div id="ren_ct" class="rtj1009_lai_ct cl">
            <div class="ren_lai_mn z">
                <div class="bm ren_ly_bm">
			<div class="ren_bm_c ren_ly_c">
<!--{else}-->

	<!--{template home/space_menu}-->
	<div id="ct" class="rtj1009_ct cl">
		<div class="ren_g_mn">
            <div class="ren_ly_bm">
                <div class="ren_ly_c">
<!--{/if}-->
                    <div class="vw pic">
                        <div id="photo_pic" class="c{if $pic[magicframe]} magicframe magicframe$pic[magicframe]{/if}">
                            <!--{if $pic[magicframe]}-->
                            <div class="pic_lb1">
                                <table cellpadding="0" cellspacing="0" class="">
                                    <tr>
                                        <td class="frame_jiao frame_top_left"></td>
                                        <td class="frame_x frame_top_middle"></td>
                                        <td class="frame_jiao frame_top_right"></td>
                                    </tr>
                                    <tr>
                                        <td class="frame_y frame_middle_left"></td>
                                        <td class="frame_middle_middle">
                                            <!--{/if}--><a href="home.php?mod=space&uid=$pic[uid]&do=$do&picid=$nextid&goto=down#pic_block"><img src="$pic[pic]" id="pic" alt="" /></a>
                                            <script type="text/javascript">
                                                function createElem(e){
                                                    var obj = document.createElement(e);
                                                    obj.style.position = 'absolute';
                                                    obj.style.zIndex = '1';
                                                    obj.style.cursor = 'pointer';
                                                    obj.onmouseout = function(){ this.style.background = 'none';}
                                                    return obj;
                                                }
                                                function viewPhoto(){
                                                    var pager = createElem('div');
                                                    var pre = createElem('div');
                                                    var next = createElem('div');
                                                    var cont = $('photo_pic');
                                                    var tar = $('pic');
                                                    var space = 0;
                                                    var w = tar.width/2;
                                                    if(!!window.ActiveXObject && !window.XMLHttpRequest){
                                                        space = -(cont.offsetWidth - tar.width)/2;
                                                    }
                                                    var objpos = fetchOffset(tar);

                                                    pager.style.position = 'absolute';
                                                    pager.style.top = '0';
                                                    pager.style.left = objpos['left'] + 'px';
                                                    pager.style.top = objpos['top'] + 'px';
                                                    pager.style.width = tar.width + 'px';
                                                    pager.style.height = tar.height + 'px';
                                                    pre.style.left = 0;
                                                    next.style.right = 0;
                                                    pre.style.width = next.style.width = w + 'px';
                                                    pre.style.height = next.style.height = tar.height + 'px';
                                                    pre.innerHTML = next.innerHTML = '<img src="{IMGDIR}/emp.gif" width="' + w + '" height="' + tar.height + '" />';

                                                    pre.onmouseover = function(){ this.style.background = 'url({IMGDIR}/pic-prev.png) no-repeat 0 100px'; }
                                                    pre.onclick = function(){ window.location = 'home.php?mod=space&uid=$pic[uid]&do=$do&picid=$upid&goto=up#pic_block'; }

                                                    next.onmouseover = function(){ this.style.background = 'url({IMGDIR}/pic-next.png) no-repeat 100% 100px'; }
                                                    next.onclick = function(){ window.location = 'home.php?mod=space&uid=$pic[uid]&do=$do&picid=$nextid&goto=down#pic_block'; }

                                                    //cont.style.position = 'relative';
                                                    cont.appendChild(pager);
                                                    pager.appendChild(pre);
                                                    pager.appendChild(next);
                                                }
                                                $('pic').onload = function(){
                                                    viewPhoto();
                                                }
                                            </script>
                                            <!--{if $pic[magicframe]}-->
                                        </td>
                                        <td class="frame_y frame_middle_right"></td>
                                    </tr>
                                    <tr>
                                        <td class="frame_jiao frame_bottom_left"></td>
                                        <td class="frame_x frame_bottom_middle"></td>
                                        <td class="frame_jiao frame_bottom_right"></td>
                                    </tr>
                                </table>
                            </div>
                            <!--{/if}-->
                        </div>
                    </div>
                </div>


				<script type="text/javascript">
                    function succeedhandle_qcpic_{$picid}(url, msg, values) {
                        if(values['cid']) {
                            comment_add(values['cid']);
                        } else {
                            $('return_qcpic_{$picid}').innerHTML = msg;
                        }
                        <!--{if $sechash}-->
                            <!--{if $secqaacheck}-->
                            updatesecqaa('$sechash');
                            <!--{/if}-->
                            <!--{if $seccodecheck}-->
                            updateseccode('$sechash');
                            <!--{/if}-->
                        <!--{/if}-->
                    }
                </script>

						<script type="text/javascript">
							var interval = 5000;
							var timerId = -1;
							var derId = -1;
							var replay = false;
							var num = 0;
							var endPlay = false;
							function forward() {
								window.location.href = 'home.php?mod=space&uid=$pic[uid]&do=$do&picid=$nextid&goto=down&play=1#pic_block';
							}
							function derivativeNum() {
								num++;
								$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
							}
							function playNextPic(stat) {
								if(stat || replay) {
									derId = window.setInterval('derivativeNum();', 1000);
									$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
									$('playid').onclick = function (){replay = false;playNextPic(false);};
									$('playid').innerHTML = '{lang stop_playing}';
									timerId = window.setInterval('forward();', interval);
								} else {
									replay = true;
									num = 0;
									if(endPlay) {
										$('playid').innerHTML = '{lang restart}';
									} else {
										$('playid').innerHTML = '{lang start_playing}';
									}
									$('playid').onclick = function (){playNextPic(true);};
									$('displayNum').innerHTML = '';
									window.clearInterval(timerId);
									window.clearInterval(derId);
								}
							}
							<!--{if $_GET['play']}-->
							<!--{if $sequence && $album['picnum']}-->
							if($sequence == $album[picnum]) {
								endPlay = true;
								playNextPic(false);
							} else {
								playNextPic(true);
							}
							<!--{else}-->
							playNextPic(true);
							<!--{/if}-->
							<!--{/if}-->

							function update_title() {
								$('title_form').style.display='';
							}

							var elems = selector('dd[class~=magicflicker]');
							for(var i=0; i<elems.length; i++){
								magicColor(elems[i]);
							}
						</script>

						<!--end bm-->
			
				</div>
			</div>
			<!--{if $_G[setting][homepagestyle]}-->
		<!--{/if}-->
	</div>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
