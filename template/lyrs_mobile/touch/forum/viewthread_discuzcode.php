<?php

if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class lyrs_mobile_discuzcode {

	function block() {
		$result = array();
		if ($topic = C::t('portal_topic')->fetch_by_name('lyrs_mobile_index')) {
			$primaltplname = $topic['primaltplname'];
			if (strpos($primaltplname, ':') !== false) {
				list($tpldirectory, $primaltplname) = explode(':', $primaltplname);
				$data = C::t('common_diy_data')->fetch($primaltplname.'_'.$topic['topicid'], $tpldirectory);
				$data = dunserialize($data['diycontent']);
				foreach ($data['layoutdata']['diypage'] as $key => $value) {
					foreach ($value as $key => $value) {
						foreach ($value as $key => $value) {
							$flag = '';
							list($flag) = explode('`', $key);
							if ($flag == 'block') {
								$battr = $value['attr'];
								$bid = intval(str_replace('portal_block_', '', $battr['name']));
								if (!empty($bid)) {
									$index[] = $bid;
								}
							}
						}
					}
				}
				$result['index'] = $index ? $index : array();
			}
		}
		return $result;
	}

	function fetch_photo($fids, $page, $perpage = false) {
		$fids = dintval($fids, true);
		$perpage = intval($perpage) ? intval($perpage) : 10;
		$page = max(1, intval($page));
		$start = ($page - 1) * $perpage;
		$parameter = array('forum_thread');
		$wherearr = array('attachment=2', 'displayorder>=0');
		if (!empty($fids)) {
			$parameter[] = $fids;
			$wherearr[] = is_array($fids) && $fids ? 'fid IN(%n)' : 'fid=%d';
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		$count = DB::result_first('SELECT COUNT(*) FROM %t '.$wheresql, $parameter);
		$threadlist = DB::fetch_all('SELECT * FROM %t '.$wheresql.' ORDER BY '.DB::order('dateline', 'DESC').DB::limit($start, $perpage), $parameter);
		if ($count && $threadlist) {
			return array('count' => $count, 'threadlist' => $threadlist);
		}
	}

	function update_cache($key, $value) {
		$value = daddslashes(serialize(dhtmlspecialchars($value)));
		if (!DB::result_first('SELECT COUNT(*) FROM '.DB::table('common_plugin_lyrs_media_cache').' WHERE '.DB::field('key', $key))) {
			return DB::query('INSERT INTO '.DB::table('common_plugin_lyrs_media_cache').' SET '.DB::field('key', $key).', '.DB::field('value', $value).', '.DB::field('dateline', TIMESTAMP));
		}
		return DB::query('UPDATE '.DB::table('common_plugin_lyrs_media_cache').' SET '.DB::field('value', $value).', '.DB::field('dateline', TIMESTAMP).' WHERE '.DB::field('key', $key));
	}

	function parsemedia($url) {
		global $_G;

		loadcache('lyrs_mobile_setting');
		$lowerurl = strtolower($url);
		$md5url = md5($lowerurl);
		$randomid = 'video_'.random(3);
		$charset = strtolower(CHARSET);
		$params = explode(',', $params);
		$setting = dunserialize($_G['cache']['lyrs_mobile_setting']);
		$query = DB::fetch_first('SELECT * FROM '.DB::table('common_plugin_lyrs_media_cache').' WHERE '.DB::field('key', $md5url));
		$ismobile = defined('IN_MOBILE') ? true : false;

		if (dstrpos($lowerurl, array('v.youku.com/v_show/', 'player.youku.com/player.php/')) && $setting['video'] & 1) {
			$regexp = strexists($lowerurl, 'v.youku.com/v_show/') ? '/http:\/\/v.youku.com\/v_show\/id_([a-zA-Z0-9]+)/i' : '/http:\/\/player.youku.com\/player.php\/(?:.+\/)?sid\/([^\/]+)\/v.swf/i';
			if (preg_match($regexp, $url, $match)) {
				$flv = 'http://youkuvideos.cdn.duapp.com/loader.swf?VideoIDS='.$match[1].'&isShowRelatedVideo=false&winType=interior';
				$iframe = 'http://player.youku.com/embed/'.$match[1];
				if (!$query) {
					$api = dfsockopen('http://v.youku.com/player/getPlayList/VideoIDS/'.$match[1]);
					if (!empty($api) && $json = json_decode($api, true)) {
						$data = array(
							'title' => $charset != 'utf-8' ? diconv($json['data'][0]['title'], 'utf-8') : $json['data'][0]['title'],
							'image' => $json['data'][0]['logo'],
							'url' => 'http://v.youku.com/v_show/id_'.$json['data'][0]['vidEncoded'].'.html',
							'vid' => $json['data'][0]['vidEncoded']
						);
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<p id="'.$randomid.'" class="lyrs_media"></p><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=(AC_FL_RunContent(\'width\', \'480\', \'height\', \'400\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', \'http://player.youku.com/player.php/sid/'.$data['vid'].'/v.swf\', \'quality\', \'high\', \'bgcolor\', \'#ffffff\', \'wmode\', \'transparent\', \'allowfullscreen\', \'true\'));</script>';
					}
					if ($ismobile) {
						return '<p class="video-media" data-type="iframe" data-form="youku" data-item="'.$data['vid'].'-'.md5($data['vid'].$setting['mediatoken']).'" data-media="http://player.youku.com/embed/'.$match[1].'"><span title="'.$data['title'].'" class="video-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		} elseif (dstrpos($lowerurl, array('tudou.com/albumplay/', 'tudou.com/listplay/', 'tudou.com/programs/', 'tudou.com/a/', 'tudou.com/l/', 'tudou.com/v/')) && $setting['video'] & 2) {
			if (dstrpos($lowerurl, array('tudou.com/albumplay/', 'tudou.com/listplay/', 'tudou.com/programs/'))) {
				$regexp = '/http:\/\/(www.)?tudou.com\/((albumplay\/(?:.+)|listplay|programs)\/(.+))/i';
			} elseif (dstrpos($lowerurl, array('tudou.com/a/', 'tudou.com/l/'))) {
				$regexp = '/http:\/\/(www.)?tudou.com\/(a|l)\/(.+)iid=(\d+)\/v.swf/i';
			} elseif (strexists($lowerurl, 'tudou.com/v/')) {
				$regexp = '/http:\/\/(www.)?tudou.com\/v\/([^\/]+)\//i';
			}
			if (preg_match($regexp, $url, $match)) {
				if (!$query) {
					if (dstrpos($lowerurl, array('tudou.com/albumplay/', 'tudou.com/listplay/', 'tudou.com/programs/'))) {
						$api = 'http://www.tudou.com/'.$match[2];
					} elseif (dstrpos($lowerurl, array('tudou.com/a/', 'tudou.com/l/'))) {
						$json = json_decode(dfsockopen('http://api.tudou.com/v3/gw?method=item.info.get&appKey=8a09ac1cb1458af3&format=json&itemCodes='.$match[4], false, $context), true);
						if (!empty($json)) {
							$api = 'http://www.tudou.com/programs/view/'.$json['multiResult']['results'][0]['itemCode'];
						}
					} elseif (strexists($lowerurl, 'tudou.com/v/')) {
						$api = 'http://www.tudou.com/programs/view/'.$match[2];
					}
					$api = dfsockopen($api);
					if (dstrpos($lowerurl, array('tudou.com/programs/', 'tudou.com/l/', 'tudou.com/v/'))) {
						if (!empty($api) && preg_match('/icode:\s?\'(.+?)\'(.+?)pic:\s?\'(.+?)\'(.+?)kw:\s?\'(.+?)\'/is', $api, $match)) {
							if ($charset != 'utf-8') {
								$title = diconv($match[5], 'utf-8');
							}
							$data = array(
								'title' => $title ? $title : $match[5],
								'image' => $match[3],
								'url' => 'http://www.tudou.com/programs/view/'.$match[1].'/',
								'vid' => $match[1]
							);
							lyrs_mobile_discuzcode::update_cache($md5url, $data);
						}
					} else {
						if (!empty($api) && preg_match('/icode:\s?\'(.+?)\'(?:.+?)kw:\s?\'(.+?)\'(?:.+?)pic:\s?\'(.+?)\'/is', $api, $match)) {
							if ($charset != 'utf-8') {
								$title = diconv($match[2], 'utf-8');
							}
							$data = array(
								'title' => $title ? $title : $match[2],
								'image' => $match[3],
								'url' => 'http://www.tudou.com/programs/view/'.$match[1].'/',
								'vid' => $match[1]
							);
							lyrs_mobile_discuzcode::update_cache($md5url, $data);
						}
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<p id="'.$randomid.'" class="lyrs_media"></p><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=(AC_FL_RunContent(\'width\', \'480\', \'height\', \'400\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', \'http://www.tudou.com/v/'.$data['vid'].'/v.swf\', \'quality\', \'high\', \'bgcolor\', \'#ffffff\', \'wmode\', \'transparent\', \'allowfullscreen\', \'true\'));</script>';
					}
					if ($ismobile) {
						return '<p class="video-media" data-type="iframe" data-media="http://www.tudou.com/programs/view/html5embed.action?code='.$data['vid'].'"><span title="'.$data['title'].'" class="video-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		} elseif (strexists($lowerurl, 'v.ifeng.com/') && $setting['video'] & 4) {
			if (preg_match("/http:\/\/v.ifeng.com\/(.+)(\/|#|guid=)([a-zA-Z0-9\-]{36})/i", $url, $match)) {
				if (!$query) {
					$vid = $match[3];
					$api = dfsockopen('http://v.ifeng.com/video_info_new/'.substr($match[3], -2, 1).'/'.substr($match[3], -2).'/'.$match[3].'.xml');
					if (!empty($api) && preg_match("/Name=\"(.+?)\"(.+)BigPosterUrl=\"(.+?)\"(?:.+)VideoPlayUrl=\"(.+?)\" PlayerUrl=\"(.+?)\"/i", $api, $match)) {
						if ($charset != 'utf-8') {
							$title = diconv($match[1], 'utf-8');
						}
						$data = array(
							'title' => $title ? $title : $match[1],
							'image' => $match[3],
							'url' => $match[5],
							'src' => $match[4],
							'vid' => $vid
						);
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<p id="'.$randomid.'" class="lyrs_media"></p><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=(AC_FL_RunContent(\'width\', \'480\', \'height\', \'400\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', \'http://v.ifeng.com/include/exterior.swf?guid='.$data['vid'].'&AutoPlay=false\', \'quality\', \'high\', \'bgcolor\', \'#ffffff\', \'wmode\', \'transparent\', \'allowfullscreen\', \'true\'));</script>';
					}
					if ($ismobile) {
						return '<p class="video-media" data-type="video" data-media="'.$data['src'].'"><span title="'.$data['title'].'" class="video-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		} elseif (dstrpos($lowerurl, array('v.qq.com/', 'static.video.qq.com/', 'y.qq.com/y/static/mv/mv_play.html')) && $setting['video'] & 8) {
			if (preg_match("/http:\/\/(?:v|y|static.video).qq.com\/(?:.+)(?:\/|vid=)([a-z0-9]{11})/i", $url, $match)) {
				if (!$query) {
					$api = dfsockopen('http://c.v.qq.com/videoinfo?otype=xml&vid='.$match[1].'&fields=recommend%7Cedit%7Cdesc%7Cnick%7Cplaycount');
					if (!empty($api) && preg_match("/<pic>(.+?)<\/pic>(.+)<title_video>(.+?)<\/title_video>(.+)<vid>(.+?)<\/vid>/i", $api, $match)) {
						$match[3] = html_entity_decode($match[3], ENT_QUOTES|ENT_XML1, 'UTF-8');
						if ($charset != 'utf-8') {
							$title = diconv($match[3], 'utf-8');
						}
						$data = array(
							'title' => $title ? $title : $match[3],
							'image' => 'http://vpic.video.qq.com/123/'.$match[5].'_ori_3.jpg',
							'url' => 'http://v.qq.com/page/'.substr($match[5], 0, 1).'/'.substr($match[5], -2, 1).'/'.substr($match[5], -1).'/'.$match[5].'.html',
							'vid' => $match[5]
						);
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<p id="'.$randomid.'" class="lyrs_media"></p><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=(AC_FL_RunContent(\'width\', \'480\', \'height\', \'400\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', \'http://static.video.qq.com/TPout.swf?vid='.$data['vid'].'&auto=0\', \'quality\', \'high\', \'bgcolor\', \'#ffffff\', \'wmode\', \'transparent\', \'allowfullscreen\', \'true\'));</script>';
					}
					if ($ismobile) {
						return '<p class="video-media" data-type="iframe" data-media="http://v.qq.com/iframe/player.html?vid='.$data['vid'].'&tiny=0&auto=0"><span title="'.$data['title'].'" class="video-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		} elseif (strexists($lowerurl, '56.com/') && $setting['video'] & 16) {
			if (preg_match("/http:\/\/(www|player).56.com\/(.+)?(v_|vid-)(.+?)(.html|.swf)/i", $url, $match)) {
				$iframe = 'http://www.56.com/iframe/'.$match[4];
				if (!$query) {
					$api = dfsockopen('http://vxml.56.com/json/'.$match[4].'/');
					if (!empty($api) && $json = json_decode($api, true)) {
						if ($charset != 'utf-8') {
							$title = diconv($json['info']['Subject'], 'utf-8');
						}
						$data = array(
							'title' => $title ? $title : $json['info']['Subject'],
							'image' => str_replace('.jpg', '_b.jpg', $json['info']['img']),
							'url' => 'http://www.56.com/u'.($json['info']['vid']%88+11).'/v_'.$json['info']['textid'].'.html',
							'vid' => $json['info']['vid']
						);
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<p id="'.$randomid.'" class="lyrs_media"></p><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=(AC_FL_RunContent(\'width\', \'480\', \'height\', \'400\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', \'http://player.56.com/v_'.$data['vid'].'.swf\', \'quality\', \'high\', \'bgcolor\', \'#ffffff\', \'wmode\', \'transparent\', \'allowfullscreen\', \'true\'));</script>';
					}
					if ($ismobile) {
						return '<p class="video-media" data-type="video" data-media="http://vxml.56.com/html5/'.$data['vid'].'/"><span title="'.$data['title'].'" class="video-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		} elseif (dstrpos($lowerurl, array('v.yinyuetai.com/', 'player.yinyuetai.com/')) && $setting['video'] & 32) {
			if (preg_match("/http:\/\/(v|player).yinyuetai.com\/(.+)\/(\d+)/i", $url, $match)) {
				if (!$query) {
					$vid = $match[3];
					$api = dfsockopen('http://v.yinyuetai.com/video/'.$match[3]);
					if (!empty($api) && preg_match("/<meta property=\"og:title\"(.+?)content=\"(.+?)\"(.+)property=\"og:image\" content=\"(.+?)\"(.+)property=\"og:url\" content=\"http:\/\/v.yinyuetai.com\/video\/(\d+)\"/is", $api, $match)) {
						$wap = dfsockopen('http://v.yinyuetai.com/wap/video/'.$match[6]);
						if (!empty($wap) && preg_match("/http:\/\/dd.yinyuetai.com\/(.+?)\"/i", $wap, $mp4)) {
							$mp4 = $mp4[1];
						}
						if ($charset != 'utf-8') {
							$title = diconv($match[2], 'utf-8');
						}
						$data = array(
							'title' => $title ? $title : $match[2],
							'image' => $match[4],
							'url' => 'http://v.yinyuetai.com/video/'.$match[6],
							'src' => 'http://dd.yinyuetai.com/'.$mp4,
							'vid' => $vid
						);
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<p id="'.$randomid.'" class="lyrs_media"></p><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=(AC_FL_RunContent(\'width\', \'480\', \'height\', \'400\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', \'http://player.yinyuetai.com/video/player/'.$data['vid'].'/v_0.swf\', \'quality\', \'high\', \'bgcolor\', \'#ffffff\', \'wmode\', \'transparent\', \'allowfullscreen\', \'true\'));</script>';
					}
					if ($ismobile) {
						return '<p class="video-media" data-type="video" data-media="'.$data['src'].'"><span title="'.$data['title'].'" class="video-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		} elseif (strexists($lowerurl, 'vimeo.com/') && $setting['video'] & 64) {
			if (preg_match("/https?:\/\/(?:player.)?vimeo.com\/(?:video\/|channels\/[a-z]+\/)?(\d+)/i", $url, $match)) {
				if (!$query) {
					if ($match[1]) {
						$vid = $match[1];
						$api = dfsockopen('https://vimeo.com/'.$match[1]);
						if (!empty($api) && preg_match('/<meta property="og:title" content="(.+?)"(?:.+?)<meta property="og:image" content="(.+?)"/is', $api, $match)) {
							if ($charset != 'utf-8') {
								$title = diconv($match[1], 'utf-8');
							}
							$data = array(
								'title' => $title ? $title : $match[1],
								'image' => current(explode('_', $match[2])).'_295.jpg',
								'url' => 'http://vimeo.com/'.$vid,
								'vid' => $vid
							);
							lyrs_mobile_discuzcode::update_cache($md5url, $data);
						}
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '</iframe>';
					}
					if ($ismobile) {
						return '<p class="video-media" data-type="iframe" data-media="http://player.vimeo.com/video/'.$data['vid'].'?autoplay=1"><span title="'.$data['title'].'" class="video-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		} elseif (dstrpos($lowerurl, array('youtube.com/', 'youtu.be/')) && $setting['video'] & 128) {
			if (preg_match("/https?:\/\/(?:www.youtube.com|youtu.be)\/(?:watch\?(?:.+)?v=|embed\/)?([a-zA-Z0-9-]+)/i", $url, $match)) {
				if (!$query) {
					if ($match[1]) {
						$vid = $match[1];
						$api = dfsockopen('http://www.youtube.com/watch?v='.$match[1]);
						if (!empty($api) && preg_match('/<meta property="og:title" content="(.+?)"/is', $api, $match)) {
							if ($charset != 'utf-8') {
								$title = diconv($match[1], 'utf-8');
							}
							$data = array(
								'title' => $title ? $title : $match[1],
								'image' => 'https://i1.ytimg.com/vi/'.$vid.'/mqdefault.jpg',
								'url' => 'http://www.youtube.com/watch?v='.$vid,
								'vid' => $vid
							);
							lyrs_mobile_discuzcode::update_cache($md5url, $data);
						}
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '</iframe>';
					}
					if ($ismobile) {
						return '<p class="video-media" data-type="iframe" data-media="http://www.youtube.com/embed/'.$data['vid'].'?autoplay=1"><span title="'.$data['title'].'" class="video-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		}

		return '[media=x,500,375]'.$url.'[/media]';
	}

	function parseaudio($url) {
		global $_G;

		loadcache('lyrs_mobile_setting');
		$lowerurl = strtolower($url);
		$md5url = md5($lowerurl);
		$randomid = 'audio_'.random(3);
		$charset = strtolower(CHARSET);
		$ext = strtolower(substr(strrchr($url, '.'), 1, 5));
		$setting = dunserialize($_G['cache']['lyrs_mobile_setting']);
		$query = DB::fetch_first('SELECT * FROM '.DB::table('common_plugin_lyrs_media_cache').' WHERE '.DB::field('key', $md5url));
		$ismobile = defined('IN_MOBILE') ? true : false;

		if (strexists($lowerurl, 'xiami.com/') && $setting['audio'] & 1) {
			if (preg_match('/http:\/\/www.xiami.com\/(song\/|widget\/0_)(\d+)/i', $url, $match)) {
				$width = '440';
				$height = '220';
				$flv = 'http://www.xiami.com/res/app/img/swf/weibo.swf?dataUrl=http://www.xiami.com/app/player/song/id/'.$match[2].'/type/7/uid/0';
				if (!$query) {
					$api = dfsockopen('http://www.xiami.com/widget/xml-single/uid/0/sid/'.$match[2]);
					if (!empty($api) && preg_match("/<song_name><\!\[CDATA\[(.+?)\]\]><\/song_name>(?:.+)<song_id>(.+?)<\/song_id>(?:.+)<album_cover><\!\[CDATA\[(.+?)\]\]><\/album_cover>(?:.+)<artist_name><\!\[CDATA\[(.+?)\]\]><\/artist_name>(?:.+)<location><\!\[CDATA\[(.+?)\]\]><\/location>/is", $api, $match)) {
						if ($charset != 'utf-8') {
							$title = diconv($match[1], 'utf-8');
							$author = diconv($match[4], 'utf-8');
						}
						$data = array(
							'title' => $title ? $title : $match[1],
							'author' => $author ? $author : $match[4],
							'image' => str_replace('_3.jpg', '_2.jpg', $match[3]),
							'url' => 'http://www.xiami.com/song/'.$match[2],
							'aid' => $match[2]
						);
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<p id="'.$randomid.'"></p><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=(AC_FL_RunContent(\'width\', \'257\', \'height\', \'33\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', \'http://www.xiami.com/widget/0_'.$data['aid'].'/singlePlayer.swf\', \'quality\', \'high\', \'bgcolor\', \'#ffffff\', \'wmode\', \'transparent\', \'allowfullscreen\', \'true\'));</script>';
					}
					if ($ismobile) {
						$data['image'] = $data['image'] ? $data['image'] : 'template/lyrs_mobile/touch/image/none_audio.jpg';
						return '<p class="video-media" data-type="audio" data-form="xiami" data-item="'.$data['aid'].'-'.md5($data['aid'].$setting['mediatoken']).'" data-media="'.$data['url'].'"><span title="'.$data['title'].' - '.$data['author'].'" class="audio-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].' - '.$data['author'].'</p>';
					}
				}
			}
		} elseif (dstrpos($lowerurl, array('www.9ku.com/play/', 'www.9ku.com/share/')) && $setting['audio'] & 2) {
			$regexp = strexists($lowerurl, 'www.9ku.com/play/') ? '/http:\/\/(www.)?9ku.com\/play\/(\d+)/i' : '/http:\/\/www.9ku.com\/share\/(.+)_(\d+)\/singleplayer.swf/i';
			if (preg_match($regexp, $url, $match)) {
				if (!$query) {
					$aid = $match[2];
					$api = dfsockopen('http://www.9ku.com/play/'.$match[2].'.htm');
					if (!empty($api) && preg_match('/\$song_data\[0\]=\'(.+?)\'/is', $api, $json)) {
						if (!empty($json[1])) {
							$match = explode('|', $json[1]);
							if ($charset == 'utf-8') {
								$title = diconv($match[1], 'gbk');
								$author = diconv($match[3], 'gbk');
							}
							$data = array(
								'title' => $title ? $title : $match[1],
								'author' => $author ? $author : $match[3],
								'image' => 'http://img.jiuku.com'.$match[7],
								'url' => 'http://www.9ku.com/play/'.$match[0].'.htm',
								'src' => 'http://mp3.jiuku.com'.$match[4],
								'aid' => $match[0]
							);
						}
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<div class="mtm mbm"><p>'.$data['title'].'</p><p id="'.$randomid.'"></p></div><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=AC_FL_RunContent(\'FlashVars\', \'src='.urlencode($data['src']).'&skins=skin.swf&name='.$_G['setting']['bbname'].'&link='.$_G['siteurl'].'&link_target=_blank\', \'width\', \'480\', \'height\', \'50\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', SITEURL+\'template/lyrs_mobile/touch/image/player.swf\', \'quality\', \'high\', \'bgcolor\', \'#FFFFFF\', \'menu\', \'false\', \'wmode\', \'transparent\', \'allowNetworking\', \'internal\');</script>';
					}
					if ($ismobile) {
						$data['image'] = $data['image'] ? $data['image'] : 'template/lyrs_mobile/touch/image/none_audio.jpg';
						return '<p class="video-media" data-type="audio" data-item="'.$data['aid'].'" data-media="'.$data['src'].'"><span title="'.$data['title'].' - '.$data['author'].'" class="audio-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].' - '.$data['author'].'</p>';
					}
				}
			}
		} elseif (dstrpos($lowerurl, array('y.qq.com/#type=song&')) && $setting['audio'] & 4) {
			if (preg_match('/http:\/\/y.qq.com\/\#type=song&(?:amp;)?(id|mid)=(.+)/i', $url, $match)) {
				if (!$query) {
					$api = dfsockopen('http://s.plcloud.music.qq.com/fcgi-bin/fcg_yqq_song_detail_info.fcg?song'.$match[1].'='.$match[2]);
					if (!empty($api) && preg_match('/var g_SongData =(?:.+?)id: (\d+)(?:.+?)songmid: \'(.+?)\'(?:.+?)songname: \'(.+?)\'(?:.+?)singer:\'(.+?)\'(?:.+?)albummid:\'(.+?)\'/is', $api, $match)) {
						$match[3] = html_entity_decode($match[3], ENT_QUOTES|ENT_HTML5, 'UTF-8');
						$match[4] = html_entity_decode($match[4], ENT_QUOTES|ENT_XHTML, 'UTF-8');
						if ($charset == 'utf-8') {
							$title = diconv($match[3], 'gbk');
							$author = diconv($match[4], 'gbk');
						}
						$data = array(
							'title' => $title ? $title : $match[3],
							'author' => $author ? $author : $match[4],
							'image' => 'http://imgcache.qq.com/music/photo/mid_album_150/'.substr($match[5], -2, 1).'/'.substr($match[5], -1).'/'.$match[5].'.jpg',
							'url' => 'http://y.qq.com/#type=song&id='.$match[2],
							'aid' => $match[1]
						);
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<div class="mtm mbm"><p>'.$data['title'].'</p><p id="'.$randomid.'"></p></div><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=AC_FL_RunContent(\'FlashVars\', \'src='.urlencode('http://tsmusic24.tc.qq.com/'.$data['aid'].'.m4a').'&skins=skin.swf&name='.$_G['setting']['bbname'].'&link='.$_G['siteurl'].'&link_target=_blank\', \'width\', \'480\', \'height\', \'50\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', SITEURL+\'template/lyrs_mobile/touch/image/player.swf\', \'quality\', \'high\', \'bgcolor\', \'#FFFFFF\', \'menu\', \'false\', \'wmode\', \'transparent\', \'allowNetworking\', \'internal\');</script>';
					}
					if ($ismobile) {
						$data['image'] = $data['image'] ? $data['image'] : 'template/lyrs_mobile/touch/image/none_audio.jpg';
						return '<p class="video-media" data-type="audio" data-item="'.$data['aid'].'" data-media="http://tsmusic24.tc.qq.com/'.$data['aid'].'.m4a"><span title="'.$data['title'].' - '.$data['author'].'" class="audio-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].' - '.$data['author'].'</p>';
					}
				}
			}
		} elseif (dstrpos($lowerurl, array('5sing.com/', 'l.5sing.com/player/')) && $setting['audio'] & 8) {
			$regexp = strexists($lowerurl, 'l.5sing.com/player/') ? '/http:\/\/l.5sing.com\/player\/true\/(yc|fc)\/(\d+).swf/i' : '/http:\/\/(yc|fc).5sing.com\/(\d+)/i';
			if (preg_match($regexp, $url, $match)) {
				if (!$query) {
					$type = $match[1];
					$aid = $match[2];
					$api = dfsockopen('http://m.5sing.com/detail/'.$match[1].'-'.$match[2].'-1.html');
					if (!empty($api) && preg_match("/<h3 class=\"m_title\">(.+?)<\/h3>(?:.+?).5sing.com\/force\/(.+?)_72_72.jpg\"(?:.+?)&nbsp;(.+?)<\/span><\/td>(?:.+?).5sing.com\/(.+?).mp3\"/is", $api, $match)) {
						$match[1] = substr($match[1], 9);
						$match[3] = substr($match[3], 7);
						if ($charset != 'utf-8') {
							$title = diconv($match[1], 'utf-8');
							$author = diconv($match[3], 'utf-8');
						}
						$data = array(
							'title' => $title ? $title : $match[1],
							'author' => $author ? $author : $match[3],
							'image' => 'http://img7.5sing.com/force/'.$match[2].'_180_180.jpg',
							'url' => 'http://'.$type.'.5sing.com/'.$aid.'.html',
							'swf' => 'http://l.5sing.com/player/false/'.$type.'/'.$aid.'.swf',
							'src' => 'http://linkflash.5sing.com/mp3/'.$match[4].'.mp3',
							'aid' => $match[4]
						);
						lyrs_mobile_discuzcode::update_cache($md5url, $data);
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url'])) {
					if (!$ismobile && $setting['allowmedia']) {
						return '<div class="mtm mbm"><p>'.$data['title'].' - '.$data['author'].'</p><p id="'.$randomid.'"></p></div><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=(AC_FL_RunContent(\'width\', \'250\', \'height\', \'34\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', \''.$data['swf'].'\', \'quality\', \'high\', \'bgcolor\', \'#ffffff\', \'wmode\', \'transparent\', \'allowfullscreen\', \'true\'));</script>';
					}
					if ($ismobile) {
						$data['image'] = $data['image'] ? $data['image'] : 'template/lyrs_mobile/touch/image/none_audio.jpg';
						return '<p class="video-media" data-type="audio" data-form="5sing" data-item="'.$data['aid'].'" data-media="'.$data['src'].'"><span title="'.$data['title'].' - '.$data['author'].'" class="audio-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].' - '.$data['author'].'</p>';
					}
				}
			}
		} elseif (strexists($lowerurl, 'www.vdisk.cn/down/index/') && $setting['audio'] & 16) {
			if (preg_match('/http:\/\/www.vdisk.cn\/down\/index\/(\d+)/i', $url, $match)) {
				if (!$query) {
					$aid = $match[1];
					$api = dfsockopen('http://www.vdisk.cn/down/index/'.$match[1]);
					if (!empty($api) && preg_match('/<meta name="httpfileurl" content="(.+?)">(?:.+?)<meta name="filename" content="(.+?)">/is', $api, $match)) {
						if ($match[1]) {
							$fileext = fileext($match[2]);
							$match[2] = substr($match[2], 0, strrpos($match[2], '.'));
							if ($charset != 'utf-8') {
								$title = diconv($match[2], 'utf-8');
							}
							$data = array(
								'title' => $title ? $title : $match[2],
								'url' => 'http://www.vdisk.cn/down/index/'.$aid,
								'ext' => $fileext,
								'aid' => $aid
							);
							lyrs_mobile_discuzcode::update_cache($md5url, $data);
						}
					}
					if (!$data) {
						lyrs_mobile_discuzcode::update_cache($md5url, '');
					}
				}
				$data = $data ? $data : dunserialize($query['value']);
				if (!empty($data['url']) && $data['ext'] == 'mp3') {
					if (!$ismobile && $setting['allowmedia']) {
						return '<div class="mtm mbm"><p>'.$data['title'].'</p><p id="'.$randomid.'"></p></div><script type="text/javascript" reload="1">$(\''.$randomid.'\').innerHTML=AC_FL_RunContent(\'FlashVars\', \'src='.urlencode($_G['siteurl'].'plugin.php?id=lyrs_mobile:proxy&type=vdisk&aid='.$data['aid'].'&key='.md5($data['aid'] . $setting['mediatoken']).'&ext=.'.$data['ext']).'&skins=skin.swf&name='.$_G['setting']['bbname'].'&link='.$_G['siteurl'].'&link_target=_blank\', \'width\', \'480\', \'height\', \'50\', \'allowNetworking\', \'internal\', \'allowScriptAccess\', \'never\', \'src\', SITEURL+\'template/lyrs_mobile/touch/image/player.swf\', \'quality\', \'high\', \'bgcolor\', \'#FFFFFF\', \'menu\', \'false\', \'wmode\', \'transparent\', \'allowNetworking\', \'internal\');</script>';
					}
					if ($ismobile) {
						$data['image'] = $data['image'] ? $data['image'] : 'template/lyrs_mobile/touch/image/none_audio.jpg';
						return '<p class="video-media" data-type="audio" data-form="vdisk" data-item="'.$data['aid'].'-'.md5($data['aid'] . $setting['mediatoken']).'" data-media="'.$data['url'].'"><span title="'.$data['title'].'" class="audio-thumb" style="background-image: url('.$data['image'].');"><span class="vmask"><em></em></span></span></p><p class="media-title">'.$data['title'].'</p>';
					}
				}
			}
		}

		return '[audio]'.$url.'[/audio]';
	}

}
