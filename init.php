<?php
/**
 * 全局项加载
 * @copyright jitong
 */

// error_reporting(7);
ob_start();
session_start();
header('Content-Type: text/html; charset=UTF-8');

define('EMLOG_ROOT',dirname(__FILE__));
date_default_timezone_set('PRC');

require_once EMLOG_ROOT.'/config.php';
require_once EMLOG_ROOT.'/lib/function.base.php';
require_once EMLOG_ROOT.'/lib/mysql.php';
require_once EMLOG_ROOT.'/lib/view.php';
// print_r($_SERVER);
$ltime=date('Y-m-d H:i:s');
$DB=MySql::getInstance();
if(!isset($_SESSION['views'])){
	$_SESSION['views']=1;
}else
	$_SESSION['views']++;

require_once EMLOG_ROOT.'/lib/function.login.php';

doStripslashes();

$userData=array();

define('ISLOGIN',isLogin());
// 用户组: admin管理员, writer联合撰写人, visitor访客
define('ROLE',ISLOGIN===true?$userData['role']:'visitor');
// 用户ID
define('UID',ISLOGIN===true?$userData['uid']:0);
// define('BLOG_URL', Option::get('blogurl'));
define('BLOG_URL',"/");
// 模板库地址
define('TPLS_URL',BLOG_URL.'content/templates/');
// 模板库路径
define('TPLS_PATH',EMLOG_ROOT.'/views/');

$blogname="祭献自己给主的小童";
