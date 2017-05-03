<?php
/**
 *
 * @copyright (c) jitongr All Rights Reserved
 */

require_once 'init.php';

define ('TEMPLATE_PATH', EMLOG_ROOT . '/view/');

$isgzipenable = 'n'; //手机浏览关闭gzip压缩
$index_lognum = 10;
$seid=session_id();
$logid = isset ($_GET['post']) ? intval ($_GET['post']) : '';
$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
$cpid = intval ($_GET['cp'])  ;
$akey = isset($_GET['aikey']) ? addslashes($_GET['aikey']) : '';

$tjts=intval ($_GET['tjts']);
if(isset($_GET['jitongw']))$tjts=101;if(isset($_GET['afflicted']))$tjts=103;
if(isset($_GET['virgin']))$tjts=99;if(isset($_GET['beat']))$tjts=105;
if(isset($_GET['crux']))$tjts=106;

if ($action == 'list'||$tjts) {
	 if($tjts) { 
	 $sqladd="and sort=$tjts ";	       
      }else
	  $sqladd="and sort>98 ";	  
	 $sql2="SELECT count(1) as a  FROM jt_concept where 1 $sqladd ";
	$row2=$DB->once_fetch_array($sql2);

	$index_lognum=20;
	$page = isset($_GET['page']) ? abs(intval ($_GET['page'])) : 1;
	$start=($page-1)*$index_lognum;
 	

$sql22="SELECT * FROM jt_concept where 1 $sqladd   limit   $start,$index_lognum";
$query=$DB->query($sql22);
 $page_url = pagination($row2['a'], $index_lognum, $page, "?tjts={$tjts}&page=");
	

    $_SESSION['onm']=1;
	include View::getView('head');
	include View::getView('log_list');
	include View::getView('foot');
	View::output();
}else
if ($action == 'li') {
	 if($tjts) { 
	 $sqladd="and sort=$tjts ";	       
      }//else
	 // $sqladd="and sort>98 ";	  
	 $sql2="SELECT count(1) as a  FROM jt_concept where 1 $sqladd ";
	$row2=$DB->once_fetch_array($sql2);

	$index_lognum=20;
	$page = isset($_GET['page']) ? abs(intval ($_GET['page'])) : 1;
	$start=($page-1)*$index_lognum;
 	

$sql22="SELECT * FROM jt_concept where 1 $sqladd   limit   $start,$index_lognum";
$query=$DB->query($sql22);
 $page_url = pagination($row2['a'], $index_lognum, $page, "?action=li&tjts={$tjts}&page=");
    $_SESSION['onm']=1;
	include View::getView('header');
	include View::getView('log');
	include View::getView('footer');
	View::output();
}else
if($action == 'xingshou')
{
	
	$sql = "SELECT * FROM jt_concept ";
	$res = $DB->query($sql);
	include View::getView('header');
	include View::getView('cruboylist');
	include View::getView('footer');
	View::output();
}
////搜索
if (isset($_GET['aikey']) ) {
	$atitle="搜索'".$akey."'的结果：";
		$ltime = date('Y-m-d H:i:s');
		$gip=getIp();   
$uid=UID;
	$CACHE = Cache::getInstance();
	$cpr = $CACHE->readCache('cpr');
	if(empty ($akey))
	$sql = "SELECT * FROM jt_concept  order by Rand()  LIMIT 10";
	else
	$sql = "SELECT * FROM jt_concept WHERE text LIKE '%$akey%' or info LIKE '%$akey%' order by f3 desc LIMIT 1000";
			$res = $DB->query($sql);
		
			while ($row = $DB->fetch_array($res)) {
			$o.=$row['id'].$row[text].' ';
		 
		$sql2 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,jt_concept.text FROM jt_assertion a LEFT JOIN
		jt_concept ON a.concept2_id=jt_concept.id
		WHERE concept1_id='$row[id]'";
			$aDa = $DB->once_fetch_array($sql2);
		
		$row[tx1]=$aDa[text];
	 $row[re1]=$aDa[relation_id];
	 $row[fi1]=$aDa[best_frame_id];
		 $sql3 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,jt_concept.text FROM jt_assertion a LEFT JOIN
		jt_concept ON a.concept1_id=jt_concept.id
		WHERE concept2_id='$row[id]'";
			$aDa3 = $DB->once_fetch_array($sql3);
		
		$row[tx2]=$aDa3[text];
	 $row[re2]=$aDa3[relation_id];
	 $row[fi2]=$aDa3[best_frame_id];
	$concepts[]=$row;
		}
		if(($akey))
		$DB->query("INSERT INTO viewlogjt (method,viewid,concept,uid,seid,vtime,text,loginip) VALUES (
				'jtsearch','$vsid','0','$uid','$seid','$ltime','$akey','$gip')");
		else
	$DB->query("INSERT INTO viewlogjt (method,viewid,concept,uid,seid,vtime,text,loginip) VALUES (
				'jtse','$vsid','0','$uid','$seid','$ltime','$o','$gip')");	
		$hhtitle=$akey;
    include View::getView('header');
	include View::getView('ailist');
	include View::getView('footer');
	View::output();
}
else
//////首页
if(empty ($action) && empty ($logid) && empty ($cpid))
{
	$atitle="祭童园：";
		$ltime = date('Y-m-d H:i:s');
	$gip=getIp();   
$uid=UID;
$CACHE = Cache::getInstance();
	$cpr = $CACHE->readCache('cpr');
	if(empty($_SESSION['thejts'])){
	$sql = "SELECT * FROM jt_concept order by Rand()  LIMIT 10";
	$res = $DB->query($sql);
$t='';
while ($row = $DB->fetch_array($res)) {
$t.=$row['id'].',';
$_SESSION['thejts']=$t.'0';
}
echo $_SESSION['thejts'];
	} 
	$sql = "SELECT * FROM jt_concept where id in(".$_SESSION['thejts'].")";
	$res = $DB->query($sql);
			while ($row = $DB->fetch_array($res)) {
			$o.=$row['id'].$row[text].' ';
		// $sql2 = "SELECT * FROM cruboy_assertion WHERE concept1_id='$row[id]' or concept2_id='$row[id]' LIMIT 2";
		$sql2 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,c.text FROM jt_assertion a LEFT JOIN
		jt_concept c ON a.concept2_id=c.id
		WHERE concept1_id='$row[id]' order by Rand() limit 1";
			$aDa = $DB->once_fetch_array($sql2);
		
		$row[tx1]=$aDa[text];
	 $row[re1]=$aDa[relation_id];
	 $row[fi1]=$aDa[best_frame_id];
		 $sql3 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,c.text FROM jt_assertion a LEFT JOIN
		jt_concept c ON a.concept1_id=c.id
		WHERE concept2_id='$row[id]' order by Rand() limit 1";
			$aDa3 = $DB->once_fetch_array($sql3);
		
		$row[tx2]=$aDa3[text];
	 $row[re2]=$aDa3[relation_id];
	 $row[fi2]=$aDa3[best_frame_id];
	$concepts[]=$row;
		}
	if($t)	$DB->query("INSERT INTO viewlogjt (method,viewid,concept,uid,seid,vtime,text,loginip) VALUES (
				'jthome','$vsid','0','$uid','$seid','$ltime','$o','$gip')");
    include View::getView('header');
	include View::getView('cruboy');
	include View::getView('footer');
	View::output();
}
//////内容页
if (!empty ($cpid) ) {
$DB = MySql::getInstance();
$concepts=array();
$logs1=array();
$atitle="";
$gip=getIp();   
$uid=UID;
	$vsid=intval($_SESSION['views']);
	$CACHE = Cache::getInstance();
	$cpr = $CACHE->readCache('cpr');
	$ltime = date('Y-m-d H:i:s');
   if (ISLOGIN !== true && empty($_SESSION['u_name'])){
  $vfr="jtunlog";
	$sqadd="order by Rand() limit 300";
  }else {
	$vfr="jtview";
   $sqadd="order by a.relation_id,a.best_frame_id LIMIT 4000";
  }
	$DB->query("UPDATE jt_concept SET words=words+1 WHERE id='$cpid'");
	$sq1 = "SELECT * FROM jt_concept WHERE id='$cpid'";
	$pDa = $DB->once_fetch_array($sq1);
	
	$hhtitle=$pDa[text];
	$DB->query("INSERT INTO viewlogjt (method,viewid,concept,uid,seid,vtime,text,loginip) VALUES (
				'$vfr','$vsid','$cpid','$uid','$seid','$ltime','$pDa[text]','$gip')");
				
	$sq2 = "SELECT a.concept1_id,a.concept2_id,a.infos,a.id as aid,
		a.relation_id,a.best_frame_id,jt_concept.* FROM jt_assertion a LEFT JOIN
		jt_concept ON a.concept2_id=jt_concept.id
		WHERE concept1_id='$cpid' $sqadd";
	$res2 = $DB->query($sq2);
	while ($row = $DB->fetch_array($res2)) {
			if($row['best_frame_id']>0){		
			$sqqq1="SELECT text FROM conceptnet_frame WHERE id='$row[best_frame_id]'";
			$qDq = $DB->once_fetch_array($sqqq1);
			$ss=str_replace("1",$pDa['text'],$qDq['text']);
			$ss=str_replace("2",$row['text'],$ss);
			$row['frame']=$ss;
			}
			$sqqq2="SELECT name FROM conceptnet_relation WHERE id='$row[relation_id]'";
			 $qDq2 = $DB->once_fetch_array($sqqq2);
			 $row['rela']=$qDq2['name'];
			 
			$concepts[]=$row;
			}
	$concepts2=array();
	$sq3 = "SELECT a.concept1_id,a.concept2_id,a.infos,a.id as aid,
		a.relation_id,a.best_frame_id,jt_concept.* FROM jt_assertion a LEFT JOIN
		jt_concept ON a.concept1_id=jt_concept.id
		WHERE concept2_id='$cpid' $sqadd";
		$res3 = $DB->query($sq3);
	while ($row2 = $DB->fetch_array($res3)) {
		if($row2[best_frame_id]>0){		
			$sqqqq1="SELECT text FROM conceptnet_frame WHERE id='$row2[best_frame_id]'";
			$qDqq = $DB->once_fetch_array($sqqqq1);
			
			$sss=str_replace("2",$pDa[text],$qDqq[text]);
			$sss=str_replace("1",$row2[text],$sss);
			$row2[frame]=$sss;
			}
			$sqqqq2="SELECT name FROM conceptnet_relation WHERE id='$row2[relation_id]'";
			 $qDqq2 = $DB->once_fetch_array($sqqqq2);
			 $row2[rela]=$qDqq2[name];
		$concepts2[]=$row2;
		}
	include View::getView('header');
	include View::getView('aishow');
	include View::getView('footer');
	View::output();
}

if ($action == 'login' ||$action == 'reg' ) {

	include View::getView('header');
	include View::getView('login');
	include View::getView('footer');
	View::output();
}
if ($action == 'auth') {
	session_start();
	$username = addslashes(trim($_POST['user']));
	$password = addslashes(trim($_POST['pw']));
	//$img_code = (Option::get('login_code') == 'y' && isset ($_POST['imgcode'])) ? addslashes (trim (strtoupper ($_POST['imgcode']))) : '';
	$ispersis = true;
	if (checkUser($username, $password, $img_code) === true) {
		setAuthCookie($username, $ispersis);
		if($_SESSION['onm']==1)
		emDirect('?tem=' . time());
		else
		emDirect('.');
	}else {
		emDirect("?action=login");
	}
}
if ($action== 'new') {
		$login = isset($_POST['user']) ? addslashes(trim($_POST['user'])) : '';
		$password = isset($_POST['pw']) ? addslashes(trim($_POST['pw'])) : '';
		$password2 = isset($_POST['pw2']) ? addslashes(trim($_POST['pw2'])) : '';
		$password3 = isset($_POST['pw3']) ? addslashes(trim($_POST['pw3'])) : '';
		if (strlen($login) < 3) {
			mMsg('用户名过短！', './?action=reg');
		}
		if (strlen($password) < 3) {
			mMsg('密码过短！', './');
		}
		if ($password != $password2) {
			mMsg('两次密码不一致！', './?action=reg');
		}
		if ($password3 != 'jitong') 
			mMsg('注册码不正确！', './?action=reg');

		$User_Model = new User_Model();
		if ($User_Model->isUserExist($login)) {
			mMsg('用户名已存在！', './?action=reg');
		}


		$PHPASS = new PasswordHash(8, true);
		$password = $PHPASS->HashPassword($password);

		$User_Model->addUser($login, $password, $role);
		$CACHE->updateCache(array('sta','user'));
		mMsg('注册成功！', './?action=login');
}

if ($action == 'logout') {
	setcookie(AUTH_COOKIE_NAME, ' ', time () - 31536000, '/');
	emDirect('?tem=' . time());
}
function mMsg($msg, $url) {
	include View::getView('header');
	include View::getView('msg');
	include View::getView('footer');
	View::output();
}
function authPassword($postPwd, $cookiePwd, $logPwd, $logid) {
	$pwd = $cookiePwd ? $cookiePwd : $postPwd;
	if ($pwd !== addslashes($logPwd)) {
		include View::getView('header');
		include View::getView('logauth');
		include View::getView('footer');
		if ($cookiePwd) {
			setcookie('em_logpwd_' . $logid, ' ', time() - 31536000);
		}
		View::output();
	}else {
		setcookie('em_logpwd_' . $logid, $logPwd);
	}
}
