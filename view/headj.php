<?php
if(!defined('EMLOG_ROOT')){
	exit('error!');
}
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $blogname; ?></title>
<style type="text/css" id="internalStyle">
body {
	background: url(bg.gif) 8px 3px repeat;
	font-size: 14px;
	margin: 0;
	padding: 0;
	font-family: Helvetica, Arial, sans-serif;
	-webkit-text-size-adjust: none;
}
a:link,a:visited,a:hover,a:active {
	text-decoration: none;
	color: #333;
}
#top {
	background-color: rgb(64, 64, 64);
	padding: 10px 8px;
}
#footer {
	background-color: #EFEFEF;
	color: #666666;
	padding: 5px;
	text-align: center;
	font-weight: bold;
}

#page {
	text-align: center;
	font-size: 26px;
	color: #CCCCCC
}

#page a:link,a:active,a:visited,a:hover {
	padding: 0px 6px;
}

#m {
	padding: 10px;
}

#blogname {
	font-weight: bold;
	color: #FFFFFF;
	font-size: 14px;
}

#navi {
	background: #EFEFEF;
	padding: 3px 0px;
	text-align: right;
}

#active {
	font-weight: bold;
	font-size: 16px;
}

.title {
	font-weight: bold;
	margin: 10px 0px 5px 0px;
}

.title a:link,a:active,a:visited,a:hover {
	color: #333360;
	text-decoration: none
}
.c {
	padding: 10px;
}
.l {
	border-bottom: 1px solid #DDDDDD;
	padding: 10px 0px;
}
</style>
</head>
<body onkeydown="down(event.keyCode)">
	<div id="top">
		<div id="blogname">
			<a href='<? echo BLOG_URL;?>' style='color: #FFF'><?php if($action=='cruciedboy') echo '祭献自己钉十字架的男孩';else echo '祭献自己给主的三祭童'; ?></a>
		</div>
	</div>
	<div id="navi"></div>