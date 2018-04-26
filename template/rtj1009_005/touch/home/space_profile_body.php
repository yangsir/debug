<?PHP exit('Access Denied');?>
<div class="ren_g_c u_profile">
	<div class="ren_pbm ren_mbm cl">
        <div class="ren_gxxs_xx">
        	<ul class="ren_gxxsz_xx cl">
                <li>
                	<em class="ren_gxxx_lb">当前等级</em>
                    <div class="ren_lb_mbn"><span>{$space[group][grouptitle]}</span></div>
                </li>
                <li>
                	<em class="ren_gxxx_lb">个性签名</em>
                    <div class="ren_lb_mbn"><span><!--{if $space[sightml]}-->$space[sightml]<!--{else}-->TA未填写个性签名，太没个性了！<!--{/if}--></span></div>
                </li>
            </ul>
        </div>
    </div>
	<div class="ren_pbm ren_mbm cl">
        <div class="ren_gxxs_xx">
        	<ul class="ren_gxxsz_xx cl">
                <!--{if $space[buyercredit]}-->
                <li><em class="ren_gxxx_lb">{lang eccredit_sellerinfo}</em><div class="ren_lb_mbn"><span>$space[buyercredit]</span></div></li>
                <!--{/if}-->
                <!--{if $space[sellercredit]}-->
                <li><em class="ren_gxxx_lb">{lang eccredit_buyerinfo}</em><div class="ren_lb_mbn"><span>$space[sellercredit]</span></div></li>
                <!--{/if}-->
                <li><em class="ren_gxxx_lb">{lang credits}</em><div class="ren_lb_mbn"><span>$space[credits]</span></div></li>
                <!--{loop $_G[setting][extcredits] $key $value}-->
                <!--{if $value[title]}-->
                <li><em class="ren_gxxx_lb">$value[title]</em><div class="ren_lb_mbn"><span>{$space["extcredits$key"]} $value[unit]</span></div></li>
                <!--{/if}-->
                <!--{/loop}-->
            </ul>
        </div>
    </div>
	<div class="ren_pbm ren_mbm cl">
        <div class="ren_gxxs_xx">
        	<ul class="ren_gxxsz_xx cl">
            <!--{if $space[realname]}-->
                <li>
                    <em class="ren_gxxx_lb">真实姓名</em>
                    <div class="ren_lb_mbn"><span>$space[realname]</span></div>
                </li>
                <!--{/if}-->
                <!--{if $space[gender]}-->
                <li>
                    <em class="ren_gxxx_lb">性别</em>
                    <div class="ren_lb_mbn"><span>
                    	{if $space[gender] == "0"}保密{/if}
                    	{if $space[gender] == "1"}{lang male}{/if}
                        {if $space[gender] == "2"}{lang female}{/if}
                    </span></div>
                </li>
                <!--{/if}-->
                <!--{if $space[affectivestatus]}-->
                <li>
                    <em class="ren_gxxx_lb">情感状态</em>
                    <div class="ren_lb_mbn"><span>$space[affectivestatus]</span></div>
                </li>
                <!--{/if}-->
                <!--{if $space[lookingfor]}-->
                <li>
                    <em class="ren_gxxx_lb">交友目的</em>
                    <div class="ren_lb_mbn"><span>$space[lookingfor]</span></div>
                </li>
                <!--{/if}-->
                <!--{if $space[mobile]}-->
                <li>
                    <em class="ren_gxxx_lb">手机</em>
                    <div class="ren_lb_mbn"><span>$space[mobile]</span></div>
                </li>
                <!--{/if}-->
                <!--{if $space[qq]}-->
                <li>
                    <em class="ren_gxxx_lb">QQ</em>
                    <div class="ren_lb_mbn"><span>$space[qq]</span></div>
                </li>
                <!--{/if}-->
                <!--{if $space[education]}-->
                <li>
                    <em class="ren_gxxx_lb">学历</em>
                    <div class="ren_lb_mbn"><span>$space[education]</span></div>
                </li>
                <!--{/if}-->
                <!--{if $space[interest]}-->
                <li>
                    <em class="ren_gxxx_lb">兴趣爱好</em>
                    <div class="ren_lb_mbn"><span>$space[interest]</span></div>
                </li>
                <!--{/if}-->
            </ul>
            <!--{if CURMODULE == 'space'}-->
                <!--{hook/space_profile_baseinfo_top}-->
            <!--{elseif CURMODULE == 'follow'}-->
                <!--{hook/follow_profile_baseinfo_top}-->
            <!--{/if}-->
        </div>
	</div>
  </div>


</div>