<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

class adv_mobile_ads {

	var $version = '1.0';
	var $name = 'mobile_adv_name';
	var $description = 'mobile_adv_desc';
	var $copyright = '<a href="http://www.9idl.com/" target="_blank"> - Design In June - </a>';
	var $targets = array('portal', 'home', 'member', 'forum', 'userapp', 'plugin', 'custom');
	var $imagesizes = array('120x60', '250x60', '100x100');

	function getsetting() {
		global $_G;
		$settings = array(
			'fids' => array(
				'title' => 'mobile_adv_fids',
				'type' => 'mselect',
				'value' => array(),
			),
			'category' => array(
				'title' => 'mobile_adv_category',
				'type' => 'mselect',
				'value' => array(),
			),
			'position' => array(
				'title' => 'mobile_adv_position',
				'type' => 'mradio',
				'value' => array(
					array(1, 'mobile_adv_position_header_banner'),
					array(2, 'mobile_adv_position_footer_banner'),
					array(3, 'mobile_adv_position_forumlist_top'),
					array(4, 'mobile_adv_position_thread_top'),
					array(5, 'mobile_adv_position_thread_bottom'),
					array(6, 'mobile_adv_position_articlelist_top'),
					array(7, 'mobile_adv_position_article_top'),
					array(8, 'mobile_adv_position_article_bottom'),
				),
				'default' => 1,
			),
			'default' => array(
				'title' => 'mobile_adv_default',
				'type' => 'mradio',
				'value' => array(
					array('', 'mobile_adv_default_none'),
					array('index', 'mobile_adv_default_index'),
					array('photo', 'mobile_adv_default_photo'),
					array('forum', 'mobile_adv_default_forum'),
				),
			),
		);
		loadcache(array('forums', 'portalcategory'));
		$settings['fids']['value'][] = array(0, '&nbsp;');
		$settings['fids']['value'][] = array(-1, 'mobile_adv_index');
		if (empty($_G['cache']['forums'])) $_G['cache']['forums'] = array();
		foreach($_G['cache']['forums'] as $fid => $forum) {
			$settings['fids']['value'][] = array($fid, ($forum['type'] == 'forum' ? str_repeat('&nbsp;', 4) : ($forum['type'] == 'sub' ? str_repeat('&nbsp;', 8) : '')).$forum['name']);
		}
		$this->getcategory(0);
		$settings['category']['value'] = $this->categoryvalue;

		return $settings;
	}

	function getcategory($upid) {
		global $_G;
		foreach($_G['cache']['portalcategory'] as $category) {
			if ($category['upid'] == $upid) {
				$this->categoryvalue[] = array($category['catid'], str_repeat('&nbsp;', $category['level'] * 4).$category['catname']);
				$this->getcategory($category['catid']);
			}
		}
	}

	function setsetting(&$advnew, &$parameters) {
		global $_G;
		if (is_array($advnew['targets'])) {
			$advnew['targets'] = implode("\t", $advnew['targets']);
		}
		if (is_array($parameters['extra']['fids']) && in_array(0, $parameters['extra']['fids'])) {
			$parameters['extra']['fids'] = array();
		}
		if (is_array($parameters['extra']['groups']) && in_array(0, $parameters['extra']['groups'])) {
			$parameters['extra']['groups'] = array();
		}
	}

	function evalcode() {
		return array(
			'check' => '
			if ($params[2] != $parameter[\'position\']
			|| $_G[\'basescript\'] == \'forum\' && $parameter[\'default\'] && !(CURMODULE == \'index\' && $_G[\'mod\'] == $parameter[\'default\'])
			|| $_G[\'basescript\'] == \'forum\' && $parameter[\'fids\'] && !(in_array($_G[\'fid\'], $parameter[\'fids\']) || CURMODULE == \'index\' && in_array(-1, $parameter[\'fids\']))
			|| $_G[\'basescript\'] == \'portal\' && $parameter[\'category\'] && !(!empty($_G[\'catid\']) && in_array($_G[\'catid\'], $parameter[\'category\']) || empty($_G[\'catid\']) && in_array(-1, $parameter[\'category\']))
			) {
				$checked = false;
			}',
			'create' => '
				$advcount = count($adids);
				if ($advcount > 1) {
	        		$adcode = \'\';
	        		for($i = 0; $i < $advcount; $i++) {
						$adcode .= \'<li\'.($i == 0 ? \' class="show"\' : \'\').\'>\'.(isset($codes[$adids[$i]]) ? $codes[$adids[$i]] : \'&nbsp;\').\'</li>\';
					}
	        		$adcode = \'<ul class="mobile_adv_ads">\'.$adcode.\'</ul>\';
	        	} else {
					$adcode = $codes[$adids[array_rand($adids)]];
				}
				$adcode = $adcode;
				$adcode = $codes[array_shift($adids)];
			',
		);
	}

}
