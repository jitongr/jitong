<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>祭童园--祭文</title>

</head>
<body>
<style>
body {background: #FFFFFF; color: #323232; text-align:center; font:18px; margin: 0px auto 0px; padding: 0px;}
#wrap {background: #FFFFFF; width: 960px; text-align:left; margin: 0px auto 0px; padding: 0px;}
img{ border:none;}

a:link, a:active, a:visited {color:#886353; text-decoration:none;}
a:hover {color:#886353; text-decoration:underline;}

#header h1 {color: #1F1F1F; font-size: 30px; font-weight: normal; letter-spacing: 0px; margin: 10px 0px 3px 0px; padding: 20px 0px 0px 0px; font-family: Georgia, "Times New Roman", Times, serif; line-height:normal;}
#header h1 a:link {color: #1F1F1F; text-decoration: none;}
#header h1 a:active {color: #1F1F1F; text-decoration: none;}
#header h1 a:visited {color: #1F1F1F; text-decoration: none;}
#header h1 a:hover {color: #1F1F1F; text-decoration: none;}
#header h3 {color: #525252; font-style: italic; font-size: 15px; font-weight: normal; margin: 0px 0px 0px 40px; padding: 10px 0px 10px 0px;}

#nav {text-align:left; margin: 10px 0px 0px 0px;border: 1px solid #eee;}
#nav ul {margin: 5px 0px 0px 0px; padding: 0px;}
#nav li {display: inline; padding:0 2px 0 2px;}

#nav .bar {margin: 0px; padding: 0px;height: 30px;}
#nav .bar .item {height: 30px;line-height: 30px;display: block;float: left;padding: 0 18px; position: relative}
#nav a:link {color:#1F1F1F; text-decoration:none;}
#nav a:active {color:#1F1F1F; text-decoration:none;}
#nav a:visited {color:#1F1F1F; text-decoration:none;}
#nav a:hover {color:#1F1F1F; text-decoration:underline;}
#nav .current {background-color: #EFEFEF;}
#nav .item:hover .sub-nav, 
#nav .li-hover .sub-nav { display: block;}
#nav .sub-nav {
	display: none;
	position: absolute;
	background-color: #fff;
	margin: 0px; 
	padding: 0px;
	list-style: none;
	border: 1px solid #eee;
	top: 30px;
	left: 0px;
}
#nav .sub-nav li {
	min-width: 120px;
	white-space: nowrap;
}
#nav .sub-nav a {
	display: block;
	padding: 0 18px;
}
* html #nav .sub-nav a {
	display:inline;
	zoom:1;
	width: 120px;
}

#nav .sub-nav a:hover {
	background-color: #EEE;
}

#banner {height:134px;}

#pagenavi{text-align:center; font-size:14px}
#pagenavi a{ padding:0px 3px;}
#pagenavi a:hover{text-decoration:overline }
#pagenavi span{font-size:16px; color:#999999;}

.title{font-weight:bold; margin:10px 0px 5px 0px;}.title a:link, a:active,a:visited,a:hover{color:#333360; text-decoration:none}
.info{font-size:12px;color:#999999;}.info2{font-size:12px; border-bottom:#CCCCCC dotted 1px; text-align:right; color:#666666; margin:5px 0px; padding:5px;}
.posttitle{font-size:16px; color:#333; font-weight:bold;}.postinfo{font-size:12px; color: #999999;}
.postcont{border-bottom:1px solid #DDDDDD; padding:12px 0px; margin-bottom:10px;}
.t{font-size:16px; font-weight:bold;}.c{padding:10px;}.l{border-bottom:1px solid #DDDDDD; padding:10px 0px;}.twcont{color:#333; padding-top:12px;}
.twinfo{text-align:right; color:#999999; border-bottom:1px solid #DDDDDD; padding:8px 0px; font-size:12px;}
.comcont{color:#333; padding:6px 0px;}.reply{color:#FF3300; font-size:12px;}
.cominfo{text-align:right; color:#999999; border-bottom:1px solid #DDDDDD; padding:8px 0px;font-size:12px;}
.texts{width:92%; height:200px;}.excerpt{width:92%; height:100px;}
#page{text-align:center;font-size:26px; color: #CCCCCC}#page #m{padding:10px;}
#top{background-color:#32598B; padding:10px 8px;}#footer{background-color:#EFEFEF; color:#666666; padding:5px;text-align:center;font-weight:bold;}
</style>
  <div id="banner">
<img src="view/jitong.jpg" height="180" width="960"  usemap="#hjitong" />
<map name="hjitong">
     <area class="text" id="name" shape="rect" coords="376,59,396,114" 
       href="<?php echo BLOG_URL; ?>jitongw" target="_self" title="祭童"/>
        <area class="text" id="name" shape="rect" coords="426,98,448,155" 
       href="<?php echo BLOG_URL; ?>afflicted" target="_self" title="苦难"/>
       <area class="text" id="name" shape="rect" coords="554,74,579,128" 
       href="<?php echo BLOG_URL; ?>virgin" target="_self" title="童贞"/>
       <area class="text" id="name" shape="rect" coords="686,95,706,148" 
       href="<?php echo BLOG_URL; ?>beat" target="_self" title="吊打"/>
       <area class="text" id="name" shape="rect" coords="837,59,863,177" 
       href="<?php echo BLOG_URL; ?>crux" target="_self" title="钉十字架"/>

 </map>
</div>

<? if(!isset($cpidd)):?><div id="wrap"><? endif;?>
  <div id="nav">
    <ul>
	<li class="<?php echo $action=='' ? 'current' : 'common';?>"><a href="/jitong">首页</a></li>

<li class="common"><a href="/jitong?cp=jty">祭童图</a></li>
<li class="common"><a href="/jitong?page=1&jt">祭童文</a></li>

    <?php 
	if(ISLOGIN === true ): ?>
   
	<li class="common"><?php echo $userData['username']; ?>祭<a href="<?php echo BLOG_URL; ?>admin/?action=logout">出</a></li>
	<?php else: ?>
	<li class="common"><a href="<?php echo BLOG_URL; ?>admin/">登录</a></li>
	<?php endif; ?>
   	</ul>
  </div><!-- end #nav-->