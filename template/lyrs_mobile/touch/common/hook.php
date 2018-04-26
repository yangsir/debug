<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_lyrs_mobile {

	function discuzcode($param) {
		global $_G;
		if ($param['caller'] == 'discuzcode') {
			require_once DISCUZ_ROOT.'./template/lyrs_mobile/touch/forum/viewthread_discuzcode.php';
			if (strpos(strtolower($_G['discuzcodemessage']), '[/media]') !== false) {
				if ($param['param'][9] != 1 && $param['param'][5] < 0 && isset($_G['cache']['bbcodes'][-$param['param'][5]])) {
					$_G['discuzcodemessage'] = preg_replace("/\[media=([\w,]+)\]\s*([^\[\<\r\n]+?)\s*\[\/media\]/ies", $param['param'][11] ? "lyrs_mobile_discuzcode::parsemedia('\\2')" : "bbcodeurl('\\2', '<a href=\"{url}\" target=\"_blank\">{url}</a>')", $_G['discuzcodemessage']);
				}
			}
			if (strpos(strtolower($_G['discuzcodemessage']), '[/audio]') !== false) {
				$_G['discuzcodemessage'] = preg_replace("/\[audio(=1)*\]\s*([^\[\<\r\n]+?)\s*\[\/audio\]/ies", $param['param'][11] ? "lyrs_mobile_discuzcode::parseaudio('\\2')" : "bbcodeurl('\\2', '<a href=\"{url}\" target=\"_blank\">{url}</a>')", $_G['discuzcodemessage']);
			}
		}
	}

}

class mobileplugin_lyrs_mobile {

	function common() {
		global $_G;

		loadcache('lyrs_mobile_setting');
		$lyrs_mobile = dunserialize($_G['cache']['lyrs_mobile_setting']);

		if ($lyrs_mobile && $lyrs_mobile['style'] && $_G['setting']['version'] == 'X3') {
			loadcache('style_'.$lyrs_mobile['style']);
			$_G['style'] = $_G['cache']['style_'.$lyrs_mobile['style']];

			if ($_GET['mobile'] == 'yes') {
				$_G['mobiletpl']['yes'] = 'touch';
			}
		}

		if ($lyrs_mobile['mobilefix'] || $lyrs_mobile['remove_simpletype']) {
			$nowurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			if (strexists($nowurl, 'mobile=yes')) {
				dheader('Location: '.str_replace('mobile=yes', 'mobile=2', $nowurl));
				exit;
			}
		}
	}

	function discuzcode($param) {
		global $_G;
		if ($param['caller'] == 'discuzcode') {
			loadcache('lyrs_mobile_setting');
			$setting = dunserialize($_G['cache']['lyrs_mobile_setting']);
			require_once DISCUZ_ROOT.'./template/lyrs_mobile/touch/forum/viewthread_discuzcode.php';
			if (strpos(strtolower($_G['discuzcodemessage']), '[/media]') !== false) {
				if ($param['param'][9] != 1 && $param['param'][5] < 0 && isset($_G['cache']['bbcodes'][-$param['param'][5]])) {
					$_G['discuzcodemessage'] = preg_replace("/\[media=([\w,]+)\]\s*([^\[\<\r\n]+?)\s*\[\/media\]/ies", $param['param'][11] ? "lyrs_mobile_discuzcode::parsemedia('\\2')" : "bbcodeurl('\\2', '<a href=\"{url}\" target=\"_blank\">{url}</a>')", $_G['discuzcodemessage']);
				}
			}
			if (strpos(strtolower($_G['discuzcodemessage']), '[/audio]') !== false) {
				$_G['discuzcodemessage'] = preg_replace("/\[audio(=1)*\]\s*([^\[\<\r\n]+?)\s*\[\/audio\]/ies", $param['param'][11] ? "lyrs_mobile_discuzcode::parseaudio('\\2')" : "bbcodeurl('\\2', '<a href=\"{url}\" target=\"_blank\">{url}</a>')", $_G['discuzcodemessage']);
			}
			if ($setting['allowextimg']) {
				if (strexists($_G['discuzcodemessage'], '[/extimg]')) {
					$_G['discuzcodemessage'] = preg_replace("/\[extimg\]\s*([^\[\<\r\n]+?)\s*\[\/extimg\]/is", "", $_G['discuzcodemessage']);
				}
				if (strexists($_G['discuzcodemessage'], '[/img]')) {
					$_G['discuzcodemessage'] = preg_replace(array(
						"/\[img\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/is",
						"/\[img=(\d{1,4})[x|\,](\d{1,4})\]\s*([^\[\<\r\n]+?)\s*\[\/img\]/is"
					), $param['param'][6] ? array(
						"[extimg]\\1[/extimg]",
						"[extimg]\\3[/extimg]"
					) : ($param['param'][5] ? array(
						"bbcodeurl('\\1', '<a href=\"{url}\" target=\"_blank\">{url}</a>')",
						"bbcodeurl('\\3', '<a href=\"{url}\" target=\"_blank\">{url}</a>')",
					) : array("bbcodeurl('\\1', '{url}')", "bbcodeurl('\\3', '{url}')")), $_G['discuzcodemessage']);
				}
			}
		}
	}

}

class mobileplugin_lyrs_mobile_home extends mobileplugin_lyrs_mobile {

	function spacecp_favorite_message($param) {
		global $_G;

		$type = $_G['gp_type'];
		if ($_G['basescript'] == 'home' && $_G['mod'] == 'spacecp' && $_GET['ac'] == 'favorite' && $_GET['op'] == 'delete' && $param['param']['0'] == 'do_success' && in_array($type, array('fid', 'tid')) && dstrpos($_G['gp_referer'], array('forum.php?mod=forumdisplay', 'forum.php?mod=viewthread'))) {
			require_once DISCUZ_ROOT.'./template/lyrs_mobile/touch/common/language.'.currentlang().'.php';
			showmessage($language['favorite_delete_success'], 'forum.php?mod='.($type == 'fid' ? 'forumdisplay' : 'viewthread').'&tid='.intval($_G['gp_id']).'&mobile=2', '', array('showdialog' => 1, 'showmsg' => true, 'closetime' => true, 'locationtime' => 3));
		}
	}

}

class mobileplugin_lyrs_mobile_forum extends mobileplugin_lyrs_mobile {

	function viewthread_lastpost_mobile_output() {
		global $_G;

		loadcache('lyrs_mobile_setting');
		$setting = dunserialize($_G['cache']['lyrs_mobile_setting']);
		require_once DISCUZ_ROOT.'./template/lyrs_mobile/touch/common/language.'.currentlang().'.php';

		$last_thread = DB::fetch_first('SELECT tid, subject FROM '.DB::table('forum_thread').' WHERE '.DB::field('fid', $_G['fid']).' AND lastpost<'.$_G['thread']['lastpost'].' AND displayorder>=0 AND closed=0 ORDER BY '.DB::order('lastpost', 'DESC').DB::limit(1));
		if ($last_thread && $setting['threadnav'] & 1) {
			$last = '<div class="more-article"><a href="forum.php?mod=viewthread&amp;tid='.$last_thread['tid'].'">'.$language['last_thread'].$last_thread['subject'].'</a></div>';
		}

		$next_thread = DB::fetch_first('SELECT tid, subject FROM '.DB::table('forum_thread').' WHERE '.DB::field('fid', $_G['fid']).' AND lastpost>'.$_G['thread']['lastpost'].' AND displayorder>=0 AND closed=0 ORDER BY '.DB::order('lastpost', 'ASC').DB::limit(1));
		if ($next_thread && $setting['threadnav'] & 2) {
			$next = '<div class="more-article"><a href="forum.php?mod=viewthread&amp;tid='.$next_thread['tid'].'">'.$language['next_thread'].$next_thread['subject'].'</a></div>';
		}

		return $last.$next;
	}

}
