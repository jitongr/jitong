<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');}
echo '<?xml version="1.0" encoding="UTF-8"?>';
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title; ?>[<?php echo $blogname; ?>]</title>
<style type="text/css" id="internalStyle">
body{background-color:#FFFFFF; font-size:14px; margin: 0; padding:0;font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: none;}
a:link,a:visited,a:hover,a:active {text-decoration: none;color:#333;}
#top{background-color:#32598B; padding:10px 8px;}#footer{background-color:#EFEFEF; color:#666666; padding:5px;text-align:center;font-weight:bold;}
#page{text-align:center;font-size:26px; color: #CCCCCC}#page #m{padding:10px;}
#blogname{font-weight:bold; color:#FFFFFF; font-size:14px;}
#navi{background:#EFEFEF; padding:3px 0px; text-align:left;}#active{font-weight:bold; font-size:16px;}
.title{font-weight:bold; margin:10px 0px 5px 0px;}.title a:link, a:active,a:visited,a:hover{color:#333360; text-decoration:none}
.info{font-size:12px;color:#999999;}.info2{font-size:12px; border-bottom:#CCCCCC dotted 1px; text-align:right; color:#666666; margin:5px 0px; padding:5px;}
.posttitle{font-size:16px; color:#333; font-weight:bold;}.postinfo{font-size:12px; color: #999999;}
.postcont{border-bottom:1px solid #DDDDDD; padding:12px 0px; margin-bottom:10px;}
.t{font-size:16px; font-weight:bold;}.c{padding:10px;}.l{border-bottom:1px solid #DDDDDD; padding:10px 0px;}.twcont{color:#333; padding-top:12px;}
.twinfo{text-align:right; color:#999999; border-bottom:1px solid #DDDDDD; padding:8px 0px; font-size:12px;}
.comcont{color:#333; padding:6px 0px;}.reply{color:#FF3300; font-size:12px;}
.cominfo{text-align:right; color:#999999; border-bottom:1px solid #DDDDDD; padding:8px 0px;font-size:12px;}
.texts{width:92%; height:200px;}.excerpt{width:92%; height:100px;}
</style>
</head>
<body>
<div id="top">
<div id="blogname"><?php echo $blogname; ?></div>
</div>
<div id="navi">
<a href="/" >返回</a> 
<a href="./" <?php if($action=='')echo 'id="active"'; ?>>首祭</a> 
<a href="ask.php" <?php if($action=='ask')echo 'id="active"'; ?>>启示</a>
<a href="./?action=list" >文文</a>
<a href="./?action=li" <?php if($action=='li')echo 'id="active"'; ?>>祭文</a>
<a href="jt.php" <?php if($action=='jt')echo 'id="active"'; ?>>刑受</a> 
<a href="jitong.php" <?php if($action=='jitong')echo 'id="active"'; ?>>祭童</a>
<a href="jitongr.php" <?php if($action=='jitongr')echo 'id="active"'; ?>>祭儿</a>
<a href="cruciedboy.php" <?php if($action=='cruciedboy')echo 'id="active"'; ?>>我祭</a>
<a href="tongtu.php" <?php if($action=='tongtu')echo 'id="active"'; ?>>童图</a>
<a href="xing.php" <?php if($action=='xing')echo 'id="active"'; ?>>行图</a>
<a href="tona.php" <?php if($action=='tona')echo 'id="active"'; ?>>童难</a>
<a href="jx.php"  >祭献</a>
<?php if(ISLOGIN === true): ?>
<a href="/" ><?php if(UID) echo $userData['username']; else echo "慕道"; ?></a>！<a href="./?action=logout">退出</a>
<?php else:?>
<a href="<?php echo BLOG_URL; ?>?action=login" <?php if($action=='login')echo 'id="active"'; ?>>登录</a>
<a href="<?php echo BLOG_URL; ?>?action=reg" <?php if($action=='reg')echo 'id="active"'; ?>>注册</a>
<?php endif;?>



</div>