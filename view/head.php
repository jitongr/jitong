<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>祭童园--祭文</title>
<link href="view/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<style>
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