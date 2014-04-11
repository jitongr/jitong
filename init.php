<?php
/**
 * 全局项加载
 * @copyright (c) Emlog All Rights Reserved
 * $Id: init.php 1907 2011-04-09 11:11:06Z emloog $
 */

error_reporting(7);
ob_start();
session_start();
header('Content-Type: text/html; charset=UTF-8');

define('EMLOG_ROOT', dirname(__FILE__));

if (!isset($_SERVER["HTTP_APPNAME"])) {//非SAE平台下运行，加载普通核心
    define("IS_SAE",FALSE);
}else{
    define("IS_SAE",TRUE);
	//sae Storage domain
	define('S_DOMAIN','emlog');
}

if(IS_SAE){
	require_once EMLOG_ROOT.'/sae.config.php';
	require_once EMLOG_ROOT.'/include/lib/function.sae.base.php';

	$DB = MySql::getInstance();
	$sql="show tables like '%".DB_PREFIX."options%'";//判断表是否存在！
	if($DB->num_rows($DB->query($sql)) != 1)
	{
		header("location: ./sae.install.php");exit;
	}
}else{
	require_once EMLOG_ROOT.'/config.php';
	require_once EMLOG_ROOT.'/include/lib/function.base.php';
}

//print_r($_SERVER);
$ltime = time();
$DB = MySql::getInstance();
if(!isset($_SESSION['views']))  
{
	$_SESSION['views']=1;
}
   else 
		$_SESSION['views']++;
if($_SESSION['views']%5==1){
	$DB->query("INSERT INTO accelog (method,tou,lastu,expler,date,aip,times) VALUES (
		'".$_SERVER[REQUEST_METHOD]."','".addslashes($_SERVER[REQUEST_URI])."','".
addslashes($_SERVER[HTTP_REFERER])."','".addslashes($_SERVER[HTTP_USER_AGENT])."','$ltime','".
$_SERVER['REMOTE_ADDR']."','".$_SESSION['views']."')");
}

require_once EMLOG_ROOT.'/include/lib/function.login.php';

doStripslashes();

$CACHE = Cache::getInstance();

$userData = array();
//define('ISAUTH',	issinaAuth());
define('ISLOGIN',	isLogin());
//用户组: admin管理员, writer联合撰写人, visitor访客
define('ROLE', ISLOGIN === true ? $userData['role'] : 'visitor');
//用户ID
define('UID', ISLOGIN === true ? $userData['uid'] : 0);
//博客固定地址
//define('BLOG_URL', Option::get('blogurl'));
define('BLOG_URL', "/jitongr/");
//模板库地址
define('TPLS_URL', BLOG_URL.'content/templates/');
//模板库路径
define('TPLS_PATH', EMLOG_ROOT.'/content/templates/');
//解决前台多域名ajax跨域
define('DYNAMIC_BLOGURL', getBlogUrl());
//前台模板URL
define('TEMPLATE_URL', 	TPLS_URL.Option::get('nonce_templet').'/');
/*
$active_plugins = Option::get('active_plugins');
$emHooks = array();
if ($active_plugins && is_array($active_plugins)) {
	foreach($active_plugins as $plugin) {
		if(true === checkPlugin($plugin)) {
			include_once(EMLOG_ROOT . '/content/plugins/' . $plugin);
		}
	}
}
*/