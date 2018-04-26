<?php exit;?>
{eval 
ob_end_clean();
ob_start();
@header("Expires: -1");
@header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
@header("Pragma: no-cache");
@header("Content-type: text/xml; charset=".CHARSET);
require DISCUZ_ROOT.'./template/lyrs_mobile/touch/common/language.'.currentlang().'.php';
loadcache('lyrs_mobile_setting');
$setting = dunserialize($_G['cache']['lyrs_mobile_setting']);
echo '<?xml version="1.0" encoding="'.CHARSET.'"?>'."\r\n";
}
<root><![CDATA[