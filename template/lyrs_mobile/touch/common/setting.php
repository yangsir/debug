<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

loadcache('lyrs_mobile_setting');
$setting = dunserialize($_G['cache']['lyrs_mobile_setting']);
$newversion = !in_array($_G['setting']['version'], array('X2.5', 'X3')) ? true : false;
$setting['style'] = $newversion ? $_G['setting']['styleid2'] : $setting['style'];
require_once DISCUZ_ROOT.'./template/lyrs_mobile/touch/common/language.'.currentlang().'.php';

if (!in_array('lyrs_mobile', $_G['setting']['plugins']['available'])) {
	cpmsg($language['plugins_unavailable'], '', 'error');
}

if (!submitcheck('settingsubmit')) {

	$navselect = array();
	$navselect[] = array(0, $lang['plugins_empty']);
	foreach(C::t('common_nav')->fetch_all_by_navtype_parentid() as $value) {
		if (!empty($value['type'])) {
			$navselect[] = array($value['id'], $value['name']);
		}
	}

	$styleselect = array();
	foreach (C::t('common_style')->fetch_all_data() as $value) {
		$styleselect[] = array($value['styleid'], $value['name']);
	}

	$creditselect = array();
	$creditselect[] = array(0, $lang['plugins_empty']);
	foreach ($_G['setting']['extcredits'] as $key => $value) {
		$creditselect[] = array($key, 'extcredits'.$key.' ('.$value['title'].')');
	}

	loadcache('forums');
	$forumselect = array();
	$forumselect[] = array(0, $lang['plugins_empty']);
	foreach($_G['cache']['forums'] as $value) {
		$forumselect[] = array($value['fid'], ($value['type'] == 'group' ? str_repeat('-', 2) : ($value['type'] == 'forum' ? str_repeat('&nbsp;', 4) : ($value['type'] == 'sub' ? str_repeat('&nbsp;', 10) : ''))).$value['name'], ($value['type'] == 'group' ? true : ''));
	}

	showformheader('plugins&operation=config&identifier=lyrs_mobile&pmod=setting', 'enctype');
	showtableheader();
	showtitle($language['title']);

	showsetting($language['allowed'], 'settingnew[allowed]', $setting['allowed'], 'radio', '', 1, $language['allowed_comment'], '', '', true);
	if ($_G['setting']['mobile']['allowmobile']) {
		showtablerow('', 'class="td27" colspan="2"', $language['adv_setting']);
		showtablerow('class="noborder"', array('class="vtop rowform"', 'class="vtop tips2" s="1"'), array($language['adv_setting_text'], $language['adv_setting_comment']));
		showsetting($language['addelay'], 'settingnew[addelay]', $setting['addelay'], 'text', '', 0, $language['addelay_comment'], '', '', true);
		showsetting($language['swdelay'], 'settingnew[swdelay]', $setting['swdelay'], 'text', '', 0, $language['swdelay_comment'], '', '', true);
		showsetting($language['onekeycolor'], 'settingnew[onekeycolor]', $setting['onekeycolor'], 'color', '', 0, $language['rgbcolor_comment'], '', '', true);

		showsetting($language['threadnav'], array('settingnew[threadnav]', array($language['threadnav_checkbox_last_thread'], $language['threadnav_checkbox_next_thread'])), $setting['threadnav'], 'binmcheckbox', '', 0, $language['threadnav_comment'], '', '', true);
		showsetting($language['video'], array('settingnew[video]', array($language['video_checkbox_youku'], $language['video_checkbox_tudou'], $language['video_checkbox_ifeng'], $language['video_checkbox_qq'], $language['video_checkbox_56'], $language['video_checkbox_yinyuetai'], $language['video_checkbox_vimeo'], $language['video_checkbox_youtube'])), $setting['video'], 'binmcheckbox', '', 0, $language['video_comment'], '', '', true);
		showsetting($language['audio'], array('settingnew[audio]', array($language['audio_checkbox_xiami'], $language['audio_checkbox_9ku'], $language['audio_checkbox_qq'], $language['audio_checkbox_5sing'], $language['audio_checkbox_vdisk'])), $setting['audio'], 'binmcheckbox', '', 0, $language['audio_comment'], '', '', true);
		showsetting($language['mediatoken'], 'settingnew[mediatoken]', $setting['mediatoken'], 'text', '', 0, $language['mediatoken_comment'], '', '', true);
		showsetting($language['allowmedia'], 'settingnew[allowmedia]', $setting['allowmedia'], 'radio', '', 0, $language['allowmedia_comment'], '', '', true);
		showsetting($language['mobilefix'], 'settingnew[mobilefix]', $setting['mobilefix'], 'radio', '', 0, $language['mobilefix_comment'], '', '', true);
		showsetting($language['removesimpletype'], 'settingnew[removesimpletype]', $setting['removesimpletype'], 'radio', '', 0, $language['removesimpletype_comment'], '', '', true);
		showsetting($language['mobiletip'], 'settingnew[mobiletip]', $setting['mobiletip'], 'radio', '', 0, $language['mobiletip_comment'], '', '', true);
		showsetting($language['ajaxpage'], 'settingnew[ajaxpage]', $setting['ajaxpage'], 'radio', '', 0, $language['ajaxpage_comment'], '', '', true);
		showsetting($language['allowlazyload'], 'settingnew[allowlazyload]', $setting['allowlazyload'], 'radio', '', 0, $language['allowlazyload_comment'], '', '', true);
		showsetting($language['allowextimg'], 'settingnew[allowextimg]', $setting['allowextimg'], 'radio', '', 0, $language['allowextimg_comment'], '', '', true);
		showsetting($language['fixedhead'], 'settingnew[fixedhead]', $setting['fixedhead'], 'radio', '', 0, $language['fixedhead_comment'], '', '', true);
		showsetting($language['bdshare'], 'settingnew[bdshare]', $setting['bdshare'], 'radio', '', 0, $language['bdshare_comment'], '', '', true);
		showsetting($language['style'], array('settingnew[style]', $styleselect), $setting['style'], 'select', '', 0, $language['style_comment'], '', '', true);
		showsetting($language['default'], array('settingnew[default]', array(
			array(0, $lang['plugins_empty']),
			array(1, $language['default_select_homepage']),
			array(2, $language['default_select_photo']),
			array(3, $language['default_select_forum'])
		)), $setting['default'], 'select', '', 0, $language['default_comment'], '', '', true);
		showsetting($language['menunav'], array('settingnew[quicknav]', $navselect), $setting['quicknav'], 'select', '', 0, $language['menunav_comment'], '', '', true);
		showsetting($language['thumbsize'], 'settingnew[thumbsize]', $setting['thumbsize'], 'text', '', 0, $language['thumbsize_comment'], '', '', true);
		showsetting($language['photonum'], 'settingnew[photonum]', $setting['photonum'], 'text', '', 0, $language['photonum_comment'], '', '', true);
		showsetting($language['photo_select'], array('settingnew[photo][]', $forumselect), $setting['photo'], 'mselect', '', 0, $language['photo_select_comment'], '', '', true);
		showsetting($language['showsearchnav'], 'settingnew[showsearchnav]', $setting['showsearchnav'], 'radio', '', 0, $language['showsearchnav_comment'], '', '', true);
		showsetting($language['searchportalhotkey'], 'settingnew[searchportalhotkey]', $setting['searchportalhotkey'], 'textarea', '', 0, $language['searchportalhotkey_comment'], '', '', true);
		showsetting($language['searchforumhotkey'], 'settingnew[searchforumhotkey]', $setting['searchforumhotkey'], 'textarea', '', 0, $language['searchforumhotkey_comment'], '', '', true);
		showsetting($language['showtag'], 'settingnew[showtag]', $setting['showtag'], 'radio', '', 0, $language['showtag_comment'], '', '', true);
		showsetting($language['searchtaghotkey'], 'settingnew[searchtaghotkey]', $setting['searchtaghotkey'], 'textarea', '', 0, $language['searchtaghotkey_comment'], '', '', true);
		showsetting($language['footercopyright'], 'settingnew[footercopyright]', $setting['footercopyright'], 'textarea', '', 0, $language['footercopyright_comment'], '', '', true);
		showsetting($language['customcss'], 'settingnew[customcss]', $setting['customcss'], 'textarea', '', 0, $language['customcss_comment'], '', '', true);
		showsetting($language['clearall_cache'], 'settingnew[clearall]', 0, 'radio', '', 0, $language['clearall_cache_comment'], '', '', true);
	}
	showtablefooter();

	showtableheader('', 'notop');
	showsubmit('settingsubmit', 'submit');
	showtablefooter();
	showformfooter();

	echo <<<EOT
<style type="text/css">
	.sub, .sub .td27, .sub .rowform { padding-left: 5px !important; }
	.sub .rowform .txt, .sub .rowform textarea{ width: 250px; }
	.sub select{ width: 256px; }
</style>
EOT;
	exit;

} else {

	if ($_POST['settingnew']['clearall']) {
		runquery('TRUNCATE '.DB::table('common_plugin_lyrs_media_cache'));
		$clearall_cache = $language['clearall_cache_succeed'];
	}

	if ($newversion) {
		$_POST['settingnew']['style'] = $_POST['settingnew']['style'] ? $_POST['settingnew']['style'] : $_G['setting']['styleid2'];
		C::t('common_setting')->update('styleid2', $_POST['settingnew']['style']);
	} else {
		$_POST['settingnew']['style'] = $_POST['settingnew']['style'];
	}

	require_once DISCUZ_ROOT.'./template/lyrs_mobile/touch/forum/viewthread_discuzcode.php';
	$_POST['settingnew']['block'] = lyrs_mobile_discuzcode::block();
	$_POST['settingnew']['addelay'] = $_POST['settingnew']['addelay'] ? intval(trim($_POST['settingnew']['addelay'])) : 5;
	$_POST['settingnew']['swdelay'] = $_POST['settingnew']['swdelay'] ? intval(trim($_POST['settingnew']['swdelay'])) : 5;
	$_POST['settingnew']['photonum'] = $_POST['settingnew']['photonum'] ? intval(trim($_POST['settingnew']['photonum'])) : 10;

	$_POST['settingnew']['feed'] = trim(strip_tags($_POST['settingnew']['feed']));
	$_POST['settingnew']['rewardcredit'] = $_POST['settingnew']['rewardcredit'] ? intval(trim($_POST['settingnew']['rewardcredit'])) : '';
	$_POST['settingnew']['addcreditnum'] = $_POST['settingnew']['addcreditnum'] ? intval(trim($_POST['settingnew']['addcreditnum'])) : '';

	$_POST['settingnew']['threadnav'] = bindec(intval($_POST['settingnew']['threadnav'][2]).intval($_POST['settingnew']['threadnav'][1]));
	$_POST['settingnew']['audio'] = bindec(intval($_POST['settingnew']['audio'][5]).intval($_POST['settingnew']['audio'][4]).intval($_POST['settingnew']['audio'][3]).intval($_POST['settingnew']['audio'][2]).intval($_POST['settingnew']['audio'][1]));
	$_POST['settingnew']['video'] = bindec(intval($_POST['settingnew']['video'][8]).intval($_POST['settingnew']['video'][7]).intval($_POST['settingnew']['video'][6]).intval($_POST['settingnew']['video'][5]).intval($_POST['settingnew']['video'][4]).intval($_POST['settingnew']['video'][3]).intval($_POST['settingnew']['video'][2]).intval($_POST['settingnew']['video'][1]));
	$_POST['settingnew']['feed'] = cutstr($_POST['settingnew']['feed'], 140, '');

	$settingnew = array();
	$settingnew['mobile'] = array_merge($_G['setting']['mobile'], array('allowmobile' => intval(trim($_POST['settingnew']['allowmobile']))));

	if (!$_G['setting']['mobile']['allowmobile']) {
		$_POST['settingnew'] = $setting;
	}

	$settingnew['lyrs_mobile'] = array(
		'block' => $_POST['settingnew']['block'],
		'allowed' => intval(trim($_POST['settingnew']['allowed'])),
		'addelay' => $_POST['settingnew']['addelay'],
		'swdelay' => $_POST['settingnew']['swdelay'],
		'onekeycolor' => $_POST['settingnew']['onekeycolor'],
		'threadnav' => $_POST['settingnew']['threadnav'],
		'audio' => $_POST['settingnew']['audio'],
		'video' => $_POST['settingnew']['video'],
		'mediatoken' => $_POST['settingnew']['mediatoken'],
		'allowmedia' => $_POST['settingnew']['allowmedia'],
		'mobilefix' => intval(trim($_POST['settingnew']['mobilefix'])),
		'removesimpletype' => intval(trim($_POST['settingnew']['removesimpletype'])),
		'mobiletip' => intval(trim($_POST['settingnew']['mobiletip'])),
		'ajaxpage' => intval(trim($_POST['settingnew']['ajaxpage'])),
		'allowlazyload' => intval(trim($_POST['settingnew']['allowlazyload'])),
		'allowextimg' => intval(trim($_POST['settingnew']['allowextimg'])),
		'fixedhead' => intval(trim($_POST['settingnew']['fixedhead'])),
		'bdshare' => intval(trim($_POST['settingnew']['bdshare'])),
		'style' => intval(trim($_POST['settingnew']['style'])),
		'default' => intval(trim($_POST['settingnew']['default'])),
		'quicknav' => intval(trim($_POST['settingnew']['quicknav'])),
		'thumbsize' => intval(trim($_POST['settingnew']['thumbsize'])),
		'photonum' => $_POST['settingnew']['photonum'],
		'photo' => $_POST['settingnew']['photo'],
		'showsearchnav' => intval(trim($_POST['settingnew']['showsearchnav'])),
		'searchportalhotkey' => trim(strip_tags($_POST['settingnew']['searchportalhotkey'])),
		'searchforumhotkey' => trim(strip_tags($_POST['settingnew']['searchforumhotkey'])),
		'showtag' => intval(trim($_POST['settingnew']['showtag'])),
		'searchtaghotkey' => trim(strip_tags($_POST['settingnew']['searchtaghotkey'])),
		'footercopyright' => $_POST['settingnew']['footercopyright'],
		'customcss' => trim(strip_tags($_POST['settingnew']['customcss']))
	);

	if (!$_POST['settingnew']['allowed']) {
		$settingnew = array('lyrs_mobile' => '');
	}

	savecache('lyrs_mobile_setting', daddslashes(serialize($settingnew['lyrs_mobile'])));
	cpmsg(sprintf($language['setting_update_succeed'], $clearall_cache), 'action=plugins&operation=config&identifier=lyrs_mobile&pmod=setting', 'succeed');
}
