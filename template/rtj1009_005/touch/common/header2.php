<?PHP exit('Access Denied');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="{if $_G['setting']['mobile'][mobilecachetime] > 0}{$_G['setting']['mobile'][mobilecachetime]}{else}no-cache{/if}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)} {/if},$_G['setting']['bbname']" />
<title><!--{if !empty($navtitle)}-->$navtitle - <!--{/if}--><!--{if empty($nobbname)}--> $_G['setting']['bbname'] - <!--{/if}--> {lang waptitle}</title>
<script src="/template/rtj1009_005/js/jquery-1.8.3.min.js?{VERHASH}"></script>

<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]';</script>
<link rel="stylesheet" href="/template/rtj1009_005/css/elecnation_style.css" type="text/css" media="all">
<script src="/template/rtj1009_005/js/common.js?{VERHASH}" charset="{CHARSET}"></script>
<link href="/template/rtj1009_005/css/extend_common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/template/rtj1009_005/js/modernizr.custom.js"></script>
<script type="text/javascript" src="/template/rtj1009_005/js/ren.nav.js"></script>
<script type="text/javascript" src="/template/rtj1009_005/js/ren.m.tab.js"></script>
<!--{csstemplate}-->
</head>
<div id="ren_cnav" class="ren_cnav horizontal">
    <!--{template common/toubu}-->
</div>
<div class="container ">
    <div class="ren_cnav_second">
        <div id="ren_cnav2" class="ren_cnav">
            <script type="text/javascript">
                document.write(document.getElementById('ren_cnav').innerHTML);
                var topbar;
                $(function() {
                    topbar = $('#ren_cnav').SuiNav({});
                    var navbar = $('#ren_cnav2').SuiNav({});
                    $('.MenuToggle').click(function() {
                        console.log("toggle");
                        topbar.toggle();
                    });
                    $('.MenuOpen').click(function() {
                        console.log("open");
                        topbar.show();
                    });
                });
            </script>
        </div>
    </div>
</div>
<body class="bg">
<!--{hook/global_header_mobile}-->