<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

loadcache('lyrs_mobile_setting');
$setting = dunserialize($_G['cache']['lyrs_mobile_setting']);

if ($_GET['type'] == 'xiami') {
	if (isset($_GET['callback']) && isset($_GET['aid']) && isset($_GET['key'])) {
		if ($_GET['key'] == md5($_GET['aid'] . $setting['mediatoken'])) {
			$api = dfsockopen('http://www.xiami.com/song/fdown?id='.intval($_GET['aid']));
			if (!empty($api) && $json = json_decode($api)) {
				echo !empty($_GET['callback']) ? $_GET['callback'].'('.json_encode(array('src' => $json->data->url)).')' : '';
				exit();
			}
		}
	}
} elseif ($_GET['type'] == 'vdisk') {
	if (isset($_GET['aid']) && isset($_GET['key'])) {
		if ($_GET['key'] == md5($_GET['aid'] . $setting['mediatoken'])) {
			$api = dfsockopen('http://www.vdisk.cn/down/index/'.intval($_GET['aid']));
			if (!empty($api) && preg_match('/<meta name="httpfileurl" content="(.+?)">/i', $api, $match)) {
				if (isset($match[1])) {
					if (isset($_GET['callback'])) {
						echo !empty($_GET['callback']) ? $_GET['callback'].'('.json_encode(array('src' => $match[1])).')' : '';
						exit();
					} else {
						header('Content-Type: application/force-download');
						header('Location: '.$match[1]);
						exit();
					}
				}
			}
		}
	}
}
