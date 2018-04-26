<?PHP exit('Access Denied');?>
<div class="ren_fb_hd cl">
	<div class="ren_fb_hdxxs">
		<ul>
        	<li class="ren_hdxx_li ren_hdxx_he">
                <div class="ren_hdxx_lx">如有时间范围请勾选此项
                    <div class="ren_hd_sjgx y">
                    	<label for="activitytime"><input type="checkbox" id="activitytime" name="activitytime" class="pc" onclick="if(this.checked) {$('#certainstarttime').hide();$('#uncertainstarttime').show();} else {$('#certainstarttime').show();$('#uncertainstarttime').hide();}" value="1" {if $activity['starttimeto']}checked{/if} tabindex="1" />{lang activity_starttime_endtime}</label>
                    </div>
                </div>
                <div class="ren_hdxx_sjfw">
                    <div id="certainstarttime" class="ren_hdxx_sj" {if $activity['starttimeto']}style="display: none"{/if}>
                    	<div class="ren_hdsj_mr ren_hdsj_yi">
                            <div class="ren_hdsj_bt">活动时间<span class="rq"> *</span></div>
                            <div class="ren_hdsj_nr">
                                <input type="text" name="starttimefrom[0]" id="starttimefrom_0" class="ren_hdxx_sjxx" placeholder="时间格式为：2017-08-10 10:00" autocomplete="off" value="$activity[starttimefrom]" tabindex="1" />
                            </div>
                        </div>
                    </div>
                    
                    <div id="uncertainstarttime" class="ren_hdxx_sj" {if !$activity['starttimeto']}style="display: none"{/if}>
                    	<div class="ren_hdsj_mr ren_hdsj_e">
                            <div class="ren_hdsj_bt">开始时间<span class="rq"> *</span></div>
                            <div class="ren_hdsj_nr">
                                <input type="text" name="starttimefrom[1]" id="starttimefrom_1" class="ren_hdxx_sjxx" placeholder="时间格式为：2017-08-10 10:00" autocomplete="off" value="$activity[starttimefrom]" tabindex="1" />
                            </div>
                        </div>
                    	<div class="ren_hdsj_mr2 ren_hdsj_e">
                            <div class="ren_hdsj_bt">结束时间<span class="rq"> *</span></div>
                            <div class="ren_hdsj_nr">
                                <input type="text" autocomplete="off" id="starttimeto" name="starttimeto" class="ren_hdxx_sjxx" placeholder="时间格式为：2017-08-10 10:00" value="{if $activity['starttimeto']}$activity[starttimeto]{/if}" tabindex="1" />
                            </div>
                        </div>
                    </div>
                   
                </div>
            </li>
            
            <li class="ren_hdxx_li ren_hdxx_de">
                <div class="ren_hdxx_lx">{lang activity_space}<span class="rq"> *</span></div>
                <div class="ren_hdxx_lxnr">
                    <input type="text" name="activityplace" id="activityplace" class="px oinf" value="$activity[place]" tabindex="1" />
                </div>
            </li>
            
            <!--{if $_GET[action] == 'newthread'}-->
            <li class="ren_hdxx_li ren_hdxx_de">
                <div class="ren_hdxx_lx">{lang activity_city}</div>
                <div class="ren_hdxx_lxnr">
                   <input name="activitycity" id="activitycity" class="px" type="text" tabindex="1" />
                </div>
            </li>
            <!--{/if}-->
            
            
            <li class="ren_hdxx_li ren_hdxx_de">
                <div class="ren_hdxx_lx">{lang activiy_sort}<span class="rq"> *</span></div>
                <div class="ren_hdxx_lxnr">
                <!--{if $activitytypelist}-->
					<select id="activityclass" name="activityclass" value="$activity[class]" >
					<!--{loop $activitytypelist $type}-->
						<option value="$type">$type</option>
					<!--{/loop}-->
					</select>
				<!--{/if}-->
                </div>
            </li>
            
            
            <li class="ren_hdxx_li ren_hdxx_de">
                <div class="ren_hdxx_lx">{lang activity_need_member}<span class="rq"> *</span></div>
                <div class="ren_hdxx_lxnr">
					<input type="text" name="activitynumber" id="activitynumber" class="px z" value="$activity[number]" tabindex="1" />
                </div>
            </li>
            
            <li class="ren_hdxx_li ren_hdxx_de">
                <div class="ren_hdxx_lx">人员性别<span class="rq"> *</span></div>
                <div class="ren_hdxx_lxnr">
					<select name="gender" id="gender" width="38" class="ps">
						<option value="0" {if !$activity['gender']}selected="selected"{/if}>{lang unlimited}</option>
						<option value="1" {if $activity['gender'] == 1}selected="selected"{/if}>{lang male}</option>
						<option value="2" {if $activity['gender'] == 2}selected="selected"{/if}>{lang female}</option>
					</select>
                </div>
            </li>
            
			<!--{if $_G['setting']['activityfield']}-->
            <li class="ren_hdxx_li ren_hdxx_he">
                <div class="ren_hdxx_lx">{lang optional_data}<span class="rq"> *</span></div>
                <div class="ren_hdxx_lxnr">
                    <ul class="ren_fl_dx cl">
                    <!--{loop $_G['setting']['activityfield'] $key $val}-->
                    	<li>
                        	<label for="userfield_$key"><input type="checkbox" name="userfield[]" id="userfield_$key" class="pc" value="$key"{if $activity['ufield']['userfield'] && in_array($key, $activity['ufield']['userfield'])} checked="checked"{/if} />$val</label>
                        </li>
                    <!--{/loop}-->
                    </ul>
                </div>
            </li>
            <!--{/if}-->

		</ul>
	</div>
	<div class="ren_fb_hdxxx">
		<ul>
			<!--{if $_G['setting']['activitycredit']}-->
            <li class="ren_hdxx_li ren_hdxx_de">
                <div class="ren_hdxx_lx">{lang consumption_credit}</div>
                <div class="ren_hdxx_lxnr">
					<input type="text" name="activitycredit" id="activitycredit" class="px" value="$activity[credit]" />{$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]}
                </div>
            </li>
            <!--{/if}-->
            
            <li class="ren_hdxx_li ren_hdxx_de">
                <div class="ren_hdxx_lx">{lang activity_payment}</div>
                <div class="ren_hdxx_lxnr">
					<input type="text" name="cost" id="cost" class="px" onkeyup="checkvalue(this.value, 'costmessage')" value="$activity[cost]" tabindex="1" />{lang payment_unit}
                </div>
            </li>
            
            
            <li class="ren_hdxx_li ren_hdxx_de">
                <div class="ren_hdxx_lx">{lang post_closing}</div>
                <div class="ren_hdxx_lxnr">
					<input type="text" name="activityexpiration" id="activityexpiration" class="px" placeholder="时间格式为：2017-08-10 10:00" autocomplete="off" value="$activity[expiration]" tabindex="1" />
                </div>
            </li>
            
			<!--{if $allowpostimg}-->
            <li class="ren_hdxx_li ren_hdxx_me">
                <div class="ren_hdxx_lx">{lang post_topic_image}</div>
                <div class="ren_hdxx_lxnr">
                      <div id="activityaid" class="ren_flpost_img cl">
                          <a href="javascript:;" class="ren_bl_fjy">
                              <input type="file" name="activityaid_upload" id="activityaid_upload"/>
                              <em>选择图片</em>
                          </a>
                      </div>
                      <input type="hidden" name="activityaid" id="activityaid" {if $activityattach[attachment]}value="$activityattach[aid]" {/if}/>
					  <input type="hidden" name="activityaid_url" id="activityaid_url" />
                      <div id="activityattach_image" class="ren_flpost_pic">
                      </div>
					  <script type="text/javascript">
                          $(document).on('change', '#activityaid_upload', function() {
                                  popup.open('<img src="' + IMGDIR + '/imageloading.gif">');
                      
                                  uploadsuccess = function(data) {
                                      if(data == '') {
                                          popup.open('{lang uploadpicfailed}', 'alert');
                                      }
                                      var dataarr = data.split('|');
                                      if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
                                          popup.close();
                                              $('#activityaid').val(dataarr[3]);
                                              $('#activityaid_url').val(dataarr[5]);
                                              $('.ren_flpost_pic').html('<a href="{$_G[setting][attachurl]}forum/'+dataarr[5]+'" target="_blank"><img src="{$_G[setting][attachurl]}forum/'+dataarr[5]+'" /></a>');
                                      } else {
                                          var sizelimit = '';
                                          if(dataarr[7] == 'ban') {
                                              sizelimit = '{lang uploadpicatttypeban}';
                                          } else if(dataarr[7] == 'perday') {
                                              sizelimit = '{lang donotcross}'+Math.ceil(dataarr[8]/1024)+'K)';
                                          } else if(dataarr[7] > 0) {
                                              sizelimit = '{lang donotcross}'+Math.ceil(dataarr[7]/1024)+'K)';
                                          }
                                          popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
                                      }
                                  };
                      
                                  if(typeof FileReader != 'undefined' && this.files[0]) {//note 支持html5上传新特性
                                      
                                      $.buildfileupload({
                                          uploadurl:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
                                          files:this.files,
                                          uploadformdata:{uid:"$_G[uid]", hash:"<!--{eval echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
                                          uploadinputname:'Filedata',
                                          maxfilesize:"$swfconfig[max]",
                                          success:uploadsuccess,
                                          error:function() {
                                              popup.open('{lang uploadpicfailed}', 'alert');
                                          return false;
                                          }
                                      });
                      
                                  } else {
                      
                                      $.ajaxfileupload({
                                          url:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
                                          data:{uid:"$_G[uid]", hash:"<!--{eval echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
                                          dataType:'text',
                                          fileElementId:'filedata',
                                          success:uploadsuccess,
                                          error: function() {
                                              popup.open('{lang uploadpicfailed}', 'alert');
                                          }
                                      });
                      
                                  }
                          });
                      </script>
                </div>
            </li>
            <!--{/if}-->
			<!--{hook/post_activity_extra}-->
            <li class="ren_hdxx_he"><div class="ren_tie_ksf">内容</div></li>
		</ul>
	</div>
</div>
<script type="text/javascript" reload="1">
simulateSelect('gender');
function activityaid_upload(aid, url) {
	$('activityaid_url').value = url;
	updateactivityattach(aid, url, '{$_G['setting']['attachurl']}forum');
}
</script>