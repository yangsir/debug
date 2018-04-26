<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$language = array (
	'test_account' => '測試賬號禁止更改',
	'plugins_unavailable' => '<strong class="highlight">溫馨提示：本插件未被啟用</strong>',
	'nav' => '設置',
	'nav_template' => '模板設置',
	'nav_mobile' => '手機設置',
	'title' => '參數設置',
	'allowed' => '開啟手機插件',
	'allowed_comment' => '只有開啟手機插件功能，本插件設置方可有效<br />系統默認詳細設置請進入：<a href="?action=setting&operation=mobile">全局 - 手機版訪問設置 - 手機版全局設置</a>',
	'adv_setting' => '廣告投放及設置:',
	'adv_setting_text' => '廣告投放及設置請進入：<a href="?action=adv&operation=ad&type=lyrs_mobile:mobile_ads">運營 - 站點廣告 - 廣告位</a>',
	'adv_setting_comment' => '可以進行手機頁面廣告投放',
	'addelay' => '廣告輪播間隔時間(秒)',
	'addelay_comment' => '設置廣告輪播間隔時間(秒)，默認為：5 秒',
	'swdelay' => '圖片幻燈片輪播間隔時間(秒)',
	'swdelay_comment' => '設置圖片幻燈片輪播間隔時間(秒)，默認為：5 秒',
	'bodycolor' => '頁面背景色設置',
	'headcolor' => '頂部導航顏色設置',
	'onekeycolor' => '全局一鍵配色設置',
	'rgbcolor_comment' => '輸入 16 進制顏色 #RRGGBB',
	'threadnav' => '主題頁導航設置',
	'threadnav_checkbox_last_thread' => '上一主題',
	'threadnav_checkbox_next_thread' => '下一主題',
	'threadnav_comment' => '顯示或隱藏上一主題和下一主題導航',
	'video' => '開啟手機視頻播放(HMTL5)',
	'video_checkbox_youku' => '優酷網',
	'video_checkbox_tudou' => '土豆網',
	'video_checkbox_ifeng' => '鳳凰視頻',
	'video_checkbox_qq' => '騰訊視頻',
	'video_checkbox_56' => '56網',
	'video_checkbox_yinyuetai' => '音悅台',
	'video_checkbox_vimeo' => 'Vimeo',
	'video_checkbox_youtube' => 'YouTube',
	'video_comment' => '選擇需要開啟手機視頻播放支持的網站<br />本視頻播放支持 HMTL5 的任何智能設備(含安卓、蘋果系統)',
	'audio' => '開啟手機音樂播放(HMTL5)',
	'audio_checkbox_xiami' => '蝦米音樂網',
	'audio_checkbox_9ku' => '九酷音樂網',
	'audio_checkbox_qq' => 'QQ音樂',
	'audio_checkbox_5sing' => '5SING中國原創音樂',
	'audio_checkbox_vdisk' => '威盤(VDISK)網',
	'audio_comment' => '選擇需要開啟手機音樂播放支持的網站<br />本音樂播放支持 HMTL5 的任何智能設備(含安卓、蘋果系統)',
	'mediatoken' => '手機視頻音樂效驗',
	'mediatoken_comment' => '填寫任意字符，防止其他網站盜鏈',
	'allowmedia' => '開啟視頻音樂網頁版識別',
	'allowmedia_comment' => '是否開啟視頻音樂網頁版識別，前提要開啟手機視頻音樂播放的網站',
	'mobilefix' => '開啟自動跳轉至觸屏版',
	'mobilefix_comment' => '如你的網站沒有自動跳轉至觸屏版請開啟，如自動跳轉請忽略此設置',
	'removesimpletype' => '移除手機標準版',
	'removesimpletype_comment' => '是否移除手機標準版',
	'mobiletip' => '關閉手機訪問提示信息',
	'mobiletip_comment' => '是否關閉手機訪問提示信息：用掌上論壇訪問本站,擁有更好閱讀體驗',
	'ajaxpage' => '開啟無刷新翻頁(AJAX)',
	'ajaxpage_comment' => '是否開啟無刷新翻頁(AJAX)',
	'allowlazyload' => '開啟帖子圖片延遲',
	'allowlazyload_comment' => '如開啟帖子圖片延遲，可減輕服務器資源和用戶流量',
	'allowextimg' => '開啟帖子圖片外鏈 [img]',
	'allowextimg_comment' => '是否開啟帖子圖片外鏈 [img]，權限跟隨 Discuz! 系統',
	'bdshare' => '開啟帖子文章分享',
	'bdshare_comment' => '是否開啟帖子文章分享功能',
	'fixedhead' => '開啟頂部導航固定',
	'fixedhead_comment' => '是否頂部導航固定',
	'style' => '默認模板',
	'style_select' => '-- 選擇模板 --',
	'style_comment' => '選擇本插件配備的模板，此設置同步X3.1系統設置',
	'default' => '默認首頁',
	'default_select_homepage' => '首頁',
	'default_select_portal' => '門戶',
	'default_select_photo' => '圖庫',
	'default_select_forum' => '論壇',
	'default_comment' => '設置默認首頁，空為 Discuz! 系統默認設置',
	'menunav' => '自定義導航菜單',
	'menunav_comment' => '選擇需要設置為自定義導航菜單的主導航',
	'thumbsize' => '帖子圖片最大尺寸(PX)',
	'thumbsize_comment' => '設置帖子圖片最大寬高度，建議值為 600，值為 「0」 將採用原圖',
	'photonum' => '圖庫每頁顯示條數',
	'photonum_comment' => '圖庫列表中每頁顯示條數',
	'photo_select' => '圖庫數據來源的板塊',
	'photo_select_comment' => '圖庫數據來源的板塊，必須選擇否則圖庫無數據顯示<br />按住 CTRL 多選',
	'showsearchnav' => '顯示搜索頁導航',
	'showsearchnav_comment' => '顯示或隱藏搜索頁導航，例如只用其中一個搜索（門戶或論壇）',
	'searchportalhotkey' => '搜索頁文章熱門關鍵詞',
	'searchportalhotkey_comment' => '每行一個',
	'searchforumhotkey' => '搜索頁帖子熱門關鍵詞',
	'searchforumhotkey_comment' => '每行一個，跟系統原有的分開',
	'showtag' => '顯示標籤在帖子頁',
	'showtag_comment' => '顯示或隱藏標籤在帖子頁',
	'searchtaghotkey' => '標籤頁熱門關鍵詞',
	'searchtaghotkey_comment' => '每行一個，關鍵詞必須能在標籤頁搜到，否則將不顯示',
	'customcss' => '自定義CSS樣式',
	'customcss_comment' => '可輸入自定義CSS樣式代碼',
	'footercopyright' => '底部版權信息',
	'footercopyright_comment' => '可自定義底部版權信息',
	'clearall_cache' => '是否清空視頻音樂緩存數據',
	'clearall_cache_comment' => '此選項將會清空視頻和音樂的緩存數據，清空完後將會從新獲取數據進行緩存',
	'clearall_cache_succeed' => '<span class="infotitle2" style="display: block; margin-top: 5px;">當前視頻音樂緩存數據清空成功</span>',
	'setting_update_succeed' => '當前設置更新成功%s',
	'homepage' => '首頁',
	'portal' => '門戶',
	'photo' => '圖庫',
	'forum' => '論壇',
	'guide' => '導讀',
	'search' => '搜索',
	'myspace' => '我的',
	'view_profile' => '詳細<br />資料',
	'the_thread' => '的主題',
	'my_favorite' => '我的<br />收藏',
	'my_thread' => '我的<br />主題',
	'my_pm' => '我的<br />消息',
	'my_profile' => '我的<br />資料',
	'his_thread' => '他的<br />主題',
	'his_sendpm' => '給他<br />消息',
	'last_thread' => '上一篇 : ',
	'next_thread' => '下一篇 : ',
	'recommend' => '贊',
	'shares' => '分享',
	'lastpost' => '新帖',
	'newthread' => '發帖',
	'select_newthread' => '選擇發帖',
	'post_newreply_success' => '發表回復成功',
	'please_input' => '請輸入',
	'signature_not' => '這傢伙很懶，沒有填寫簽名',
	'sendpm_to_user' => '給 %s 發消息',
	'favorite_cancel_success' => '取消收藏成功 ',
	'favorite_delete_success' => '刪除收藏成功 ',
	'forum_list' => '論壇列表',
	'types' => '分類',
	'summary' => '摘要',
	'not_article' => '本分類尚無文章',
	'thread_list' => '主題列表',
	'post_info' => '帖子詳情',
	'post_all' => '查看全部',
	'post_author' => '只看樓主',
	'post_ascview' => '正序瀏覽',
	'post_descview' => '倒序瀏覽',
	'loading' => '正在載入中...',
	'more_words' => '查看更多...',
	'view_more' => '點擊查看更多...',
	'no' => '第',
	'page' => '頁',
	'qq_login' => 'QQ帳號登錄',
	'back_to_top' => '返回頂部',
	'page_share' => '分享至:',
	'search_forum' => '搜索帖子',
	'search_portal' => '搜索文章',
	'search_tab_forum' => '帖子',
	'search_tab_portal' => '文章',
	'tag' => '標籤',
	'search_tag' => '搜索標籤',
	'search_nomatch' => '對不起，沒有找到匹配的標籤結果。',
	'search_result' => '結果: <em>找到相關標籤 $count 個</em>',
	'search_result_keyword' => '結果: <em>找到 「<span class="emfont">%s</span>」 相關內容 %d 個</em>',
);
