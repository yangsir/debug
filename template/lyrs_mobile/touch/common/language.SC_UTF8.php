<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$language = array (
	'test_account' => '测试账号禁止更改',
	'plugins_unavailable' => '<strong class="highlight">温馨提示：本插件未被启用</strong>',
	'nav' => '设置',
	'nav_template' => '模板设置',
	'nav_mobile' => '手机设置',
	'title' => '参数设置',
	'allowed' => '开启手机插件',
	'allowed_comment' => '只有开启手机插件功能，本插件设置方可有效<br />系统默认详细设置请进入：<a href="?action=setting&operation=mobile">全局 - 手机版访问设置 - 手机版全局设置</a>',
	'adv_setting' => '广告投放及设置:',
	'adv_setting_text' => '广告投放及设置请进入：<a href="?action=adv&operation=ad&type=lyrs_mobile:mobile_ads">运营 - 站点广告 - 广告位</a>',
	'adv_setting_comment' => '可以进行手机页面广告投放',
	'addelay' => '广告轮播间隔时间(秒)',
	'addelay_comment' => '设置广告轮播间隔时间(秒)，默认为：5 秒',
	'swdelay' => '图片幻灯片轮播间隔时间(秒)',
	'swdelay_comment' => '设置图片幻灯片轮播间隔时间(秒)，默认为：5 秒',
	'bodycolor' => '页面背景色设置',
	'headcolor' => '顶部导航颜色设置',
	'onekeycolor' => '全局一键配色设置',
	'rgbcolor_comment' => '输入 16 进制颜色 #RRGGBB',
	'threadnav' => '主题页导航设置',
	'threadnav_checkbox_last_thread' => '上一主题',
	'threadnav_checkbox_next_thread' => '下一主题',
	'threadnav_comment' => '显示或隐藏上一主题和下一主题导航',
	'video' => '开启手机视频播放(HMTL5)',
	'video_checkbox_youku' => '优酷网',
	'video_checkbox_tudou' => '土豆网',
	'video_checkbox_ifeng' => '凤凰视频',
	'video_checkbox_qq' => '腾讯视频',
	'video_checkbox_56' => '56网',
	'video_checkbox_yinyuetai' => '音悦台',
	'video_checkbox_vimeo' => 'Vimeo',
	'video_checkbox_youtube' => 'YouTube',
	'video_comment' => '选择需要开启手机视频播放支持的网站<br />本视频播放支持 HMTL5 的任何智能设备(含安卓、苹果系统)',
	'audio' => '开启手机音乐播放(HMTL5)',
	'audio_checkbox_xiami' => '虾米音乐网',
	'audio_checkbox_9ku' => '九酷音乐网',
	'audio_checkbox_qq' => 'QQ音乐',
	'audio_checkbox_5sing' => '5SING中国原创音乐',
	'audio_checkbox_vdisk' => '威盘(VDISK)网',
	'audio_comment' => '选择需要开启手机音乐播放支持的网站<br />本音乐播放支持 HMTL5 的任何智能设备(含安卓、苹果系统)',
	'mediatoken' => '手机视频音乐效验',
	'mediatoken_comment' => '填写任意字符，防止其他网站盗链',
	'allowmedia' => '开启视频音乐网页版识别',
	'allowmedia_comment' => '是否开启视频音乐网页版识别，前提要开启手机视频音乐播放的网站',
	'mobilefix' => '开启自动跳转至触屏版',
	'mobilefix_comment' => '如你的网站没有自动跳转至触屏版请开启，如自动跳转请忽略此设置',
	'removesimpletype' => '移除手机标准版',
	'removesimpletype_comment' => '是否移除手机标准版',
	'mobiletip' => '关闭手机访问提示信息',
	'mobiletip_comment' => '是否关闭手机访问提示信息：用掌上论坛访问本站,拥有更好阅读体验',
	'ajaxpage' => '开启无刷新翻页(AJAX)',
	'ajaxpage_comment' => '是否开启无刷新翻页(AJAX)',
	'allowlazyload' => '开启帖子图片延迟',
	'allowlazyload_comment' => '如开启帖子图片延迟，可减轻服务器资源和用户流量',
	'allowextimg' => '开启帖子图片外链 [img]',
	'allowextimg_comment' => '是否开启帖子图片外链 [img]，权限跟随 Discuz! 系统',
	'bdshare' => '开启帖子文章分享',
	'bdshare_comment' => '是否开启帖子文章分享功能',
	'fixedhead' => '开启顶部导航固定',
	'fixedhead_comment' => '是否顶部导航固定',
	'style' => '默认模板',
	'style_select' => '-- 选择模板 --',
	'style_comment' => '选择本插件配备的模板，此设置同步X3.1系统设置',
	'default' => '默认首页',
	'default_select_homepage' => '首页',
	'default_select_portal' => '门户',
	'default_select_photo' => '图库',
	'default_select_forum' => '论坛',
	'default_comment' => '设置默认首页，空为 Discuz! 系统默认设置',
	'menunav' => '自定义导航菜单',
	'menunav_comment' => '选择需要设置为自定义导航菜单的主导航',
	'thumbsize' => '帖子图片最大尺寸(PX)',
	'thumbsize_comment' => '设置帖子图片最大宽高度，建议值为 600，值为 “0” 将采用原图',
	'photonum' => '图库每页显示条数',
	'photonum_comment' => '图库列表中每页显示条数',
	'photo_select' => '图库数据来源的板块',
	'photo_select_comment' => '图库数据来源的板块，必须选择否则图库无数据显示<br />按住 CTRL 多选',
	'showsearchnav' => '显示搜索页导航',
	'showsearchnav_comment' => '显示或隐藏搜索页导航，例如只用其中一个搜索（门户或论坛）',
	'searchportalhotkey' => '搜索页文章热门关键词',
	'searchportalhotkey_comment' => '每行一个',
	'searchforumhotkey' => '搜索页帖子热门关键词',
	'searchforumhotkey_comment' => '每行一个，跟系统原有的分开',
	'showtag' => '显示标签在帖子页',
	'showtag_comment' => '显示或隐藏标签在帖子页',
	'searchtaghotkey' => '标签页热门关键词',
	'searchtaghotkey_comment' => '每行一个，关键词必须能在标签页搜到，否则将不显示',
	'customcss' => '自定义CSS样式',
	'customcss_comment' => '可输入自定义CSS样式代码',
	'footercopyright' => '底部版权信息',
	'footercopyright_comment' => '可自定义底部版权信息',
	'clearall_cache' => '是否清空视频音乐缓存数据',
	'clearall_cache_comment' => '此选项将会清空视频和音乐的缓存数据，清空完后将会从新获取数据进行缓存',
	'clearall_cache_succeed' => '<span class="infotitle2" style="display: block; margin-top: 5px;">当前视频音乐缓存数据清空成功</span>',
	'setting_update_succeed' => '当前设置更新成功%s',
	'homepage' => '首页',
	'portal' => '门户',
	'photo' => '图库',
	'forum' => '论坛',
	'guide' => '导读',
	'search' => '搜索',
	'myspace' => '我的',
	'view_profile' => '详细<br />资料',
	'the_thread' => '的主题',
	'my_favorite' => '我的<br />收藏',
	'my_thread' => '我的<br />主题',
	'my_pm' => '我的<br />消息',
	'my_profile' => '我的<br />资料',
	'his_thread' => '他的<br />主题',
	'his_sendpm' => '给他<br />消息',
	'last_thread' => '上一篇 : ',
	'next_thread' => '下一篇 : ',
	'recommend' => '赞',
	'shares' => '分享',
	'lastpost' => '新帖',
	'newthread' => '发帖',
	'select_newthread' => '选择发帖',
	'post_newreply_success' => '发表回复成功',
	'please_input' => '请输入',
	'signature_not' => '这家伙很懒，没有填写签名',
	'sendpm_to_user' => '给 %s 发消息',
	'favorite_cancel_success' => '取消收藏成功 ',
	'favorite_delete_success' => '删除收藏成功 ',
	'forum_list' => '论坛列表',
	'types' => '分类',
	'summary' => '摘要',
	'not_article' => '本分类尚无文章',
	'thread_list' => '主题列表',
	'post_info' => '帖子详情',
	'post_all' => '查看全部',
	'post_author' => '只看楼主',
	'post_ascview' => '正序浏览',
	'post_descview' => '倒序浏览',
	'loading' => '正在载入中...',
	'more_words' => '查看更多...',
	'view_more' => '点击查看更多...',
	'no' => '第',
	'page' => '页',
	'qq_login' => 'QQ帐号登录',
	'back_to_top' => '返回顶部',
	'page_share' => '分享至:',
	'search_forum' => '搜索帖子',
	'search_portal' => '搜索文章',
	'search_tab_forum' => '帖子',
	'search_tab_portal' => '文章',
	'tag' => '标签',
	'search_tag' => '搜索标签',
	'search_nomatch' => '对不起，没有找到匹配的标签结果。',
	'search_result' => '结果: <em>找到相关标签 $count 个</em>',
	'search_result_keyword' => '结果: <em>找到 “<span class="emfont">%s</span>” 相关内容 %d 个</em>',
);
