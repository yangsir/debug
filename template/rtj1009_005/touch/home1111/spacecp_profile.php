<?PHP exit('Access Denied');?>
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['mycenter']}-->


<!-- header start -->
<header class="header rtj1009_header">
	<div class="ren_nav cl">
		<a href="javascript:history.back();" class="z ren_fhjt"><span></span></a>
        <div class="ren_top_grkj z">
			<span class="ren_bk_name ren_vm"><!--{if $operation == 'password'}-->密码安全<!--{else}-->资料设置<!--{/if}--></span>
		</div>
        <div class="ren_nav_right">
            <button class="MenuOpen btn ren_btn">
                <span data-target="#ren_nav_ymenu" data-toggle="modal"><span class="ren_nav_icon"><span></span></span></span>
            </button>
        </div>
    </div>
</header>
<!-- header end -->
<div class="ren_zl_xg">
<!--{if $operation == 'password'}-->
    <script type="text/javascript" src="{$_G[setting][jspath]}register.js?{VERHASH}"></script>
    <div class="ren_mm_top cl">
        <span class="ren_mm_xgts cl">
            <!--{if !$_G['member']['freeze']}-->
                <!--{if !$_G['setting']['connect']['allow'] || !$conisregister}-->{lang old_password_comment}<!--{elseif $wechatuser}-->{lang wechat_config_newpassword_comment}<!--{else}-->{lang connect_config_newpassword_comment}<!--{/if}-->
            <!--{elseif $_G['member']['freeze'] == 1}-->
                <strong class="xi1">{lang freeze_pw_tips}</strong>
            <!--{elseif $_G['member']['freeze'] == 2}-->
                <strong class="xi1">{lang freeze_email_tips}</strong>
            <!--{/if}-->
        </span>
    </div>
    <form action="home.php?mod=spacecp&ac=profile" method="post" autocomplete="off">
        <input type="hidden" value="{FORMHASH}" name="formhash" />
        <ul class="ren_mm_k">
            <!--{if !$_G['setting']['connect']['allow'] || !$conisregister}-->
                <li>
                    <em class="ren_mm_e">{lang old_password}</em>
                    <div class="ren_mm_s"><input type="password" name="oldpassword" id="oldpassword" class="px" /></div>
                </li>
            <!--{/if}-->
            <li>
                <em class="ren_mm_e">{lang new_password}</em>
                <div class="ren_mm_s">
                    <input type="password" name="newpassword" id="newpassword" class="px" />
                </div>
            </li>
            <li>
                <em class="ren_mm_e">{lang new_password_confirm}</em>
                <div class="ren_mm_s">
                    <input type="password" name="newpassword2" id="newpassword2"class="px" />
                </div>
            </li>
            <li id="contact"{if $_GET[from] == 'contact'} style="background-color: {$_G['style']['specialbg']};"{/if}>
                <em class="ren_mm_e">{lang email}</em>
                <div class="ren_mm_s">
                    <input type="text" name="emailnew" id="emailnew" value="$space[email]" class="px" />
                </div>
            </li>
            <li class="ren_mm_yx">
                <p class="ren_mm_ysyz z">
                <!--{if empty($space['newemail'])}-->
                    {lang email_been_active}
                <!--{else}-->
                    $space[email] 等待验证中....
                <!--{/if}-->
				</p>
                <a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password&amp;resend=1" class="ren_mm_cxfs y">重新发送</a>
            </li>
            <!--{if $_G['member']['freeze'] == 2}-->
            <li>
                <em class="ren_mm_e">{lang freeze_reason}</em>
                 <div class="ren_mm_s">
                    <textarea rows="3" cols="80" name="freezereson" class="pt">$space[freezereson]</textarea>
                </div>
            </li>
            <!--{/if}-->

            <li class="ren_mm_wd">
                <em class="ren_mm_e">{lang security_question}</em>
                <div class="ren_mm_s">
                    <select name="questionidnew" id="questionidnew">
                        <option value="" selected>{lang memcp_profile_security_keep}</option>
                        <option value="0">{lang security_question_0}</option>
                        <option value="1">{lang security_question_1}</option>
                        <option value="2">{lang security_question_2}</option>
                        <option value="3">{lang security_question_3}</option>
                        <option value="4">{lang security_question_4}</option>
                        <option value="5">{lang security_question_5}</option>
                        <option value="6">{lang security_question_6}</option>
                        <option value="7">{lang security_question_7}</option>
                    </select>
                </div>
            </li>

            <li>
                <em class="ren_mm_e">{lang security_answer}</em>
                <div class="ren_mm_s">
                    <input type="text" name="answernew" id="answernew" class="px" />
                </div>
            </li>
            <!--{if $secqaacheck || $seccodecheck}-->
            </ul>
                <!--{eval $sectpl = '<table cellspacing="0" cellpadding="0" class="tfm"><li><em><sec></em><div><sec><p class="d"><sec></p></div></li></table>';}-->
                <!--{subtemplate common/seccheck}-->
            <ul class="form_bc ren_mm_bc cl">
            <!--{/if}-->
                <div class="form_fai"><button type="submit" name="pwdsubmit" value="true" class="pn pnc" />{lang save}</button></div>
        </ul>
        <input type="hidden" name="passwordsubmit" value="true" />
    </form>
    <script type="text/javascript">
        var strongpw = new Array();
        <!--{if $_G['setting']['strongpw']}-->
            <!--{loop $_G['setting']['strongpw'] $key $val}-->
            strongpw[$key] = $val;
            <!--{/loop}-->
        <!--{/if}-->
        var pwlength = <!--{if $_G['setting']['pwlength']}-->$_G['setting']['pwlength']<!--{else}-->0<!--{/if}-->;
        checkPwdComplexity($('newpassword'), $('newpassword2'), true);
    </script>
<!--{else}-->
    <iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
    <form action="{if $operation != 'plugin'}home.php?mod=spacecp&ac=profile&op=$operation{else}home.php?mod=spacecp&ac=plugin&op=profile&id=$_GET[id]{/if}" method="post" enctype="multipart/form-data" autocomplete="off"{if $operation != 'plugin'} target="frame_profile"{/if} onsubmit="clearErrorInfo();">
        <input type="hidden" value="{FORMHASH}" name="formhash" />
        <!--{if $_GET[vid]}-->
        <input type="hidden" value="$_GET[vid]" name="vid" />
        <!--{/if}-->
        <ul class="">
            <li>
                <div class="form_sue">{lang username}</div>
                <div class="form_name">$_G[member][username]</div>
            </li>
        <!--{if $value[available]}-->
            <li id="tr_realname">
                <div id="th_realname" class="form_sue">真实姓名</div>
                <div id="td_realname" class="form_mn">
                	<input name="realname" id="realname" class="px" value="$space[realname]" tabindex="1" type="text">
                </div>
            </li>
            <li id="tr_gender">
				<div id="th_gender" class="form_sue">性别</div>
                <div id="td_gender" class="form_mn">
                    <select name="gender" id="gender" class="ps" tabindex="1" value="$space[gender]">
                        <option value="0"{if $space[gender] == "0"} selected="selected"{/if}>保密</option>
                        <option value="1"{if $space[gender] == "1"} selected="selected"{/if}>{lang male}</option>
                        <option value="2"{if $space[gender] == "2"} selected="selected"{/if}>{lang female}</option>
                    </select>
                </div>
            </li>
            <li id="tr_affectivestatus">
                <div id="th_affectivestatus" class="form_sue">情感状态</div>
                <div id="td_affectivestatus" class="form_mn">
                	<input name="affectivestatus" id="affectivestatus" class="px" value="$space[affectivestatus]" tabindex="1" type="text">
                </div>
           	</li>
           	<li id="tr_lookingfor">
                <div id="th_lookingfor" class="form_sue">交友目的</div>
                <div id="td_lookingfor" class="form_mn">
                	<input name="lookingfor" id="lookingfor" class="px" value="$space[lookingfor]" tabindex="1" type="text">
                </div>
           	</li>
           	<li id="tr_mobile">
                <div id="th_mobile" class="form_sue">手机</div>
                <div id="td_mobile" class="form_mn">
                	<input name="mobile" id="mobile" class="px" value="$space[mobile]" tabindex="1" type="text">
                </div>
           	</li>
            <li id="tr_qq">
                <div id="th_qq" class="form_sue">QQ</div>
                <div id="td_qq" class="form_mn">
                	<input name="qq" id="qq" class="px" value="$space[qq]" tabindex="1" type="text">
                </div>
            </li>
            <li id="tr_education">
                <div id="th_education" class="form_sue">学历</div>
                <div id="td_education" class="form_mn">
                    <select name="education" id="education" class="ps" tabindex="1" value="$space[education]">
                        <option value="博士"{if $space[education] == "博士"} selected="selected"{/if}>博士</option>
                        <option value="硕士"{if $space[education] == "硕士"} selected="selected"{/if}>硕士</option>
                        <option value="本科"{if $space[education] == "本科"} selected="selected"{/if}>本科</option>
                        <option value="专科"{if $space[education] == "专科"} selected="selected"{/if}>专科</option>
                        <option value="中学"{if $space[education] == "中学"} selected="selected"{/if}>中学</option>
                        <option value="小学"{if $space[education] == "小学"} selected="selected"{/if}>小学</option>
                        <option value="其它"{if $space[education] == "其它"} selected="selected"{/if}>其它</option>
                    </select>
                </div>
            </li>
            <li id="tr_interest">
                <div id="th_interest" class="form_si">兴趣爱好</div>
                <div id="td_interest" class="form_ml">
                	<textarea name="interest" id="interest" class="pt" rows="3" cols="40" tabindex="1">$space[interest]</textarea>
                </div>
            </li>
            <li id="th_sightml">
                <div id="th_sightml" class="form_si">个人签名</div>
                <div id="td_sightml" class="form_ml">
                    <textarea rows="3" cols="80" name="sightml" id="sightmlmessage" class="pt" onkeydown="ctrlEnter(event, 'profilesubmitbtn');">$space[sightml]</textarea>
                </div>
            </li>
        <!--{/if}-->
        <!--{if $allowcstatus && in_array('customstatus', $allowitems)}-->
        <li>
            <div id="th_customstatus" class="form_sue">{lang permission_basic_status}</div>
            <div id="td_customstatus" class="form_mn">
                <input type="text" value="$space[customstatus]" name="customstatus" id="customstatus" class="px" />
                <div class="rq mtn" id="showerror_customstatus"></div>
            </div>
        </li>
        <!--{/if}-->
        <!--{if $_G['group']['maxsigsize'] && in_array('sightml', $allowitems)}-->
        <li>
            <div id="th_sightml" class="form_sue">{lang personal_signature}</div>
            <div id="td_sightml" class="form_mn">
                <div class="tedt">
                    <div class="bar">
                        <span class="y"><a href="javascript:;" onclick="$('signhtmlpreview').innerHTML = bbcode2html($('sightmlmessage').value)">{lang preview}</a></span>
                        <!--{if $_G['group']['allowsigbbcode']}-->
                            <!--{if $_G['group']['allowsigimgcode']}-->
                                <!--{eval $seditor = array('sightml', array('bold', 'color', 'img', 'link', 'smilies'));}-->
                            <!--{else}-->
                                <!--{eval $seditor = array('sightml', array('bold', 'color', 'link', 'smilies'));}-->
                            <!--{/if}-->
                        <!--{/if}-->
                    </div>
                    <div class="area">
                        <textarea rows="3" cols="80" name="sightml" id="sightmlmessage" class="pt" onkeydown="ctrlEnter(event, 'profilesubmitbtn');">$space[sightml]</textarea>
                    </div>
                </div>
                <div id="signhtmlpreview"></div>
                <div id="showerror_sightml" class="rq mtn"></div>
                <script type="text/javascript" src="{$_G[setting][jspath]}bbcode.js?{VERHASH}"></script>
                <script type="text/javascript">var forumallowhtml = 0,allowhtml = 0,allowsmilies = 0,allowbbcode = parseInt('{$_G[group][allowsigbbcode]}'),allowimgcode = parseInt('{$_G[group][allowsigimgcode]}');var DISCUZCODE = [];DISCUZCODE['num'] = '-1';DISCUZCODE['html'] = [];</script>
            </div>
            <div>&nbsp;</div>
        </li>
        <!--{/if}-->
        <!--{if in_array('timeoffset', $allowitems)}-->
        <li>
            <div id="th_timeoffset" class="form_sue">{lang time_zone}</div>
            <div id="td_timeoffset" class="form_mn">
                <!--{eval $timeoffset = array({lang timezone});}-->
                <select name="timeoffset">
                    <!--{loop $timeoffset $key $desc}-->
                    <option value="$key"{if $key==$space[timeoffset]} selected="selected"{/if}>$desc</option>
                    <!--{/loop}-->
                </select>
                <p class="mtn" class="form_sue">{lang current_time} : <!--{date($_G[timestamp])}--></p>
                <p class="d">{lang time_zone_message}</p>
            </div>
        </li>
        <!--{/if}-->

        <!--{if $operation == 'contact'}-->
        <li>
            <div id="th_sightml" class="form_sue">Email</div>
            <div id="td_sightml" class="form_mn">$space[email]&nbsp;(<a href="home.php?mod=spacecp&ac=profile&op=password&from=contact#contact">{lang modify}</a>)</div>
        </li>
        <!--{/if}-->

        <!--{if $operation == 'plugin'}-->
            <!--{eval include(template($_GET['id']));}-->
        <!--{/if}-->
        <!--{if $showbtn}-->
        <div class="form_bc cl">
            <div colspan="2" class="form_fai">
                <input type="hidden" name="profilesubmit" value="true" />
                <button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true" class="pn pnc" />{lang save}</button>
                <span id="submit_result" class="rq"></span>
            </div>
        </div>
        <!--{/if}-->
        </ul>
    </form>
    <script type="text/javascript">
        function show_error(fieldid, extrainfo) {
            var elem = $('th_'+fieldid);
            if(elem) {
                elem.className = "rq";
                fieldname = elem.innerHTML;
                extrainfo = (typeof extrainfo == "string") ? extrainfo : "";
                $('showerror_'+fieldid).innerHTML = "{lang check_date_item} " + extrainfo;
                $(fieldid).focus();
            }
        }
        function show_success(message) {
            message = message == '' ? '{lang update_date_success}' : message;
            popup.open(message, 'alert');
			setTimeout(function() {
			location.reload();
			}, 3000);
        }
        function clearErrorInfo() {
            var spanObj = $('profilelist').getElementsByTagName("div");
            for(var i in spanObj) {
                if(typeof spanObj[i].id != "undefined" && spanObj[i].id.indexOf("_")) {
                    var ids = explode('_', spanObj[i].id);
                    if(ids[0] == "showerror") {
                        spanObj[i].innerHTML = '';
                        $('th_'+ids[1]).className = '';
                    }
                }
            }
        }
    </script>
<!--{/if}-->


</div>


<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
