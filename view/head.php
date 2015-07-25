<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $blogtitle; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $description; ?>" />

<link href="<?php echo TEMPLATE_URL; ?>main.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="banner">
<img src="<?php echo BLOG_URL; ?>content/templates/jitong.jpg" height="180" width="960"  usemap="#hjitong" />
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
	<li class="<?php echo $curpage == CURPAGE_HOME ? 'current' : 'common';?>"><a href="<?php echo BLOG_URL; ?>">首页</a></li>
	<li class="common"><a href="<?php echo BLOG_URL; ?>jt">节点图</a></li>
    <li class="common"><a href="<?php echo BLOG_URL; ?>?page=1">文章</a></li>
    <li class="common"><a href="<?php echo BLOG_URL; ?>m">手机版</a></li>
<?php if(ISLOGIN === true ): ?>
 <li class="common"><a href="<?php echo BLOG_URL; ?>m/ainet.php">图编辑</a></li>

<?php endif; if(ROLE == 'admin' ){?>
<li class="common"><a href="<?php echo BLOG_URL; ?>scan/sour.php">磁盘扫描</a></li>
 【<li class="common"><a href="<?php echo BLOG_URL; ?>?cp=jty">祭童图</a></li>
<li class="common"><a href="<?php echo BLOG_URL; ?>?page=1&jt">祭童文</a></li>
<li class="common"><a href="<?php echo BLOG_URL; ?>content">容图</a></li>
<li class="common"><a href="<?php echo BLOG_URL; ?>f">浮图</a></li>
<li class="common"><a href="<?php echo BLOG_URL; ?>jitong">祭童园</a></li>
<li class="common"><a href="<?php echo BLOG_URL; ?>jitongr">小耶稣</a></li>】


	<?php } if(ROLE == 'admin' || ROLE == 'writer'): ?>
     <li class="common"><a href="<?php echo BLOG_URL; ?>jt/rensheng.php">钰林图</a></li>
	<li class="common"><a href="<?php echo BLOG_URL; ?>admin/">管理中心</a></li>
    <?php endif;
	if(ISLOGIN === true ): ?>
    <?php echo UNM;  ?>，您好！
	<li class="common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
	<?php else: ?>
	<li class="common"><a href="<?php echo BLOG_URL; ?>admin/">登录</a></li>
	<?php endif; ?>
   	</ul>
  </div><!-- end #nav-->