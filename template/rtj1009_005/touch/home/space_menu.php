<?PHP exit('Access Denied');?>
<!--{if $space[uid]}-->
<div id="rtj1009_mn_u" class="rtj1009_menu">
    <div class="rtj1009_menu_nv">
        <!--{eval space_merge($space, 'field_home'); $space[domainurl] = space_domain($space);getuserdiydata($space);$personalnv = isset($_G['blockposition']['nv']) ? $_G['blockposition']['nv'] : '';}-->
          <div class="ren_menu_mn">
              <ul>
                  <div class="ren_mt">
                      <span>{$space[username]}</span>
                  </div>
                  <!--{if CURMODULE == 'follow'}-->
         			<!--{elseif !$space[self]}-->
                  <!--{if helper_access::check_module('follow')}-->
                  <li class="ren_addflw z">
                      <!--{if !ckfollow($space['uid'])}-->
                          <a id="followmod" onClick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$space[uid]"><span>��ע</span></a>
                      <!--{else}-->
                          <a id="followmod" onClick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&ac=follow&op=del&fuid=$space[uid]">ȡ����ע</a>
                      <!--{/if}-->
                  </li>
                  <!--{/if}-->
                  <li class="ren_pm2 z">
                      <a href="home.php?mod=space&do=pm&subop=view&touid=$space[uid]">{lang send_pm}</a>
                  </li>
                  
          <!--{/if}-->
              </ul>
              <!--{if helper_access::check_module('follow')}-->
              <script type="text/javascript">
              function succeedhandle_followmod(url, msg, values) {
                  var fObj = $('followmod');
                  if(values['type'] == 'add') {
                      fObj.innerHTML = '��ע';
                      fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
                  } else if(values['type'] == 'del') {
                      fObj.innerHTML = 'ȡ����ע';
                      fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid='+values['fuid'];
                  }
              }
              </script>
              <!--{/if}-->
          </div>
        <!--{eval $konguid = $space[uid];}-->
        <!--{eval $guangbo = DB::fetch_first("SELECT * FROM ".DB::table('common_member_count')." WHERE uid=$konguid");}-->
        <div class="z rtj1009_icn cl">
            <div class="ren_icn rtj_avt"><a href="home.php?mod=space&uid=$space[uid]&do=profile"><!--{avatar($space[uid],big)}--></a></div>
            <!--{if helper_access::check_module('follow')}-->
            <ul class="ren_gb">
                <li>
                    <p>$guangbo['following']</p><span>��ע</span>
                </li>
                <li>
                    <p>$guangbo['follower']</p><span>��˿</span>
                </li>
            </ul>
            <!--{/if}-->
        </div>
        <div class="rtj1009_nv_top cl">
            <ul class="rtj1009_nv_tb cl">
                    <!--{if $_G['setting']['allowviewuserthread'] !== false && (empty($personalnv['banitems']['topic']))}-->
                    <li{if $do=='thread'} class="a"{/if}><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&from=space"><!--{if !empty($personalnv['items']['topic'])}-->$personalnv['items']['topic']<!--{else}-->����<!--{/if}--></a></li>
                    <!--{/if}-->
                    <!--{if empty($personalnv['banitems']['album']) && helper_access::check_module('album')}-->
                    <li{if $do=='album'} class="a"{/if}><a href="home.php?mod=space&uid=$space[uid]&do=album&view=me&from=space"><!--{if !empty($personalnv['items']['album'])}-->$personalnv['items']['album']<!--{else}-->{lang album}<!--{/if}--></a></li>
                    <!--{/if}-->
                    <!--{if empty($personalnv['banitems']['profile'])}-->
                    <li{if $do=='profile'} class="a"{/if}><a href="home.php?mod=space&uid=$space[uid]&do=profile"><!--{if !empty($personalnv['items']['profile'])}-->����<!--{else}-->����<!--{/if}--></a></li>
                    <!--{/if}-->
            </ul>
        </div>
    </div>
</div>
<!--{/if}-->