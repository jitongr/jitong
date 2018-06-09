<?php
/**
 * 全局项加载
 * @copyright jitong
 */

error_reporting(7);
ob_start();
session_start();
header('Content-Type: text/html; charset=UTF-8');

define('EMLOG_ROOT', dirname(__FILE__));
date_default_timezone_set('PRC'); 

require_once EMLOG_ROOT.'/config.php';
require_once EMLOG_ROOT.'/lib/function.base.php';

//print_r($_SERVER);
$ltime=date('Y-m-d H:i:s');
$DB = MySql::getInstance();
if(!isset($_SESSION['views']))  
{
	$_SESSION['views']=1;
}
else 
$_SESSION['views']++;
$seid=session_id();
if($_SESSION['views']==1||$savlog==1){
	 $DB->query("INSERT INTO jt_accelog (method,tou,lastu,expler,vdate,aip,times,seid) VALUES (
		'".$_SERVER[REQUEST_METHOD]."','".addslashes($_SERVER[REQUEST_URI])."','".
addslashes($_SERVER[HTTP_REFERER])."','".addslashes($_SERVER[HTTP_USER_AGENT])."','$ltime','".
$_SERVER['REMOTE_ADDR']."','".$_SESSION['views']."','$seid')");
}
require_once EMLOG_ROOT.'/lib/function.login.php';

doStripslashes();

//$CACHE = Cache::getInstance();

$userData = array();
//define('ISAUTH',	issinaAuth());
define('ISLOGIN',	isLogin());
//用户组: admin管理员, writer联合撰写人, visitor访客
define('ROLE', ISLOGIN === true ? $userData['role'] : 'visitor');
//用户ID
define('UID', ISLOGIN === true ? $userData['uid'] : 0);
//博客固定地址
//define('BLOG_URL', Option::get('blogurl'));
define('BLOG_URL', "/jitong/");
//模板库地址
define('TPLS_URL', BLOG_URL.'content/templates/');
//模板库路径
define('TPLS_PATH', EMLOG_ROOT.'/views/');
//解决前台多域名ajax跨域
//define('DYNAMIC_BLOGURL', getBlogUrl());
//前台模板URL
//define('TEMPLATE_URL', 	TPLS_URL.Option::get('nonce_templet').'/');
$blogname="祭献自己给天主的小童";
