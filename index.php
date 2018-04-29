<?php
/**
 *
 * @copyright (c) jitongr All Rights Reserved
 */
require_once 'init.php';

define('TEMPLATE_PATH',EMLOG_ROOT.'/view/');

$seid=session_id();

$action=isset($_GET['action'])?addslashes($_GET['action']):'';
$cpid=intval($_GET['cp']);

$s=intval($_GET['s']);
if(isset($_GET['jitongw']))
	$tjts=101;
if(isset($_GET['afflicted']))
	$tjts=103;
if(isset($_GET['virgin']))
	$tjts=99;
if(isset($_GET['beat']))
	$tjts=105;
if(isset($_GET['crux']))
	$tjts=106;

if($action=='list'||$tjts){
	$sql="SELECT sort,count(1) as a FROM  jt_concept group by sort ";
	$res=$DB->query($sql);
	while($row=$DB->fetch_array($res)){
		$p[$row['sort']]=$row['a'];
	}
	if($tjts){
		$sqladd="and sort=$tjts ";
	}
	if($s){
		$sqladd="and sort=$s ";
		$tjts=$s;
	} // else
	  // $sqladd="and sort>98 ";
	$sql2="SELECT count(1) as a  FROM jt_concept where 1 $sqladd ";
	$row2=$DB->once_fetch_array($sql2);
	
	$index_lognum=20;
	$page=isset($_GET['page'])?abs(intval($_GET['page'])):1;
	$start=($page-1)*$index_lognum;
	
	$sql22="SELECT * FROM jt_concept where 1 $sqladd  order by edittime desc limit   $start,$index_lognum";
	$query=$DB->query($sql22);
	$page_url=pagination($row2['a'],$index_lognum,$page,"?action=list&s={$tjts}&page=");
	
	$_SESSION['onm']=1;
	include View::getView('head');
	include View::getView('log_list');
	include View::getView('foot');
	View::output();
}else if($action=='li'||$action=='liok'){
	//print_r($_POST);
	if(isset($_POST['id'])){
		if($_POST['img'])
			$sq.=",img='".addslashes($_POST['img'])."'";
		if($_POST['text'])
			$sq.=",text='".addslashes($_POST['text'])."'";
		if($_POST['info'])
			$sq.=",info='".addslashes($_POST['info'])."'";
		if($_POST['sort'])
			$sq.=",`sort`= ".intval($_POST['sort']);
		if($sq)
			$DB->query("update jt_concept set  ".substr($sq,1)." where id=".intval($_POST['id']));
	}
	if($action=='liok'){
	echo 'ok';
	exit;
	}
	$sql="SELECT sort,count(1) as a FROM  jt_concept group by sort ";
	$res=$DB->query($sql);
	while($row=$DB->fetch_array($res)){
		$p[$row['sort']]=$row['a'];
	}
 
	if($s){
		if($s==-1)
			$sqladd="and sort=0 ";
		else
		  $sqladd="and sort=$s ";
		$tjts=$s;
	} // else
	  // $sqladd="and sort>98 ";
	$sql2="SELECT count(1) as a  FROM jt_concept where 1 $sqladd ";
	$row2=$DB->once_fetch_array($sql2);
	
	$index_lognum=200;
	$page=isset($_GET['page'])?abs(intval($_GET['page'])):1;
	$start=($page-1)*$index_lognum;
	
	$sql22="SELECT * FROM jt_concept where 1 $sqladd   limit   $start,$index_lognum";
	$query=$DB->query($sql22);
	$page_url=pagination($row2['a'],$index_lognum,$page,"?action=li&s={$tjts}&page=");
	$_SESSION['onm']=1;
	include View::getView('header');
	include View::getView('log');
	include View::getView('footer');
	View::output();
}

if(empty($action)&&empty($logid)&&empty($cpid)){
	$atitle="祭献自己给天主：";
	$ltime=date('Y-m-d H:i:s');
	$gip=getIp();
	$uid=UID;
	$CACHE=Cache::getInstance();
	$cpr=$CACHE->readCache('cpr');
	$o="";
	if(empty($_SESSION['jtimg'])){
		$w=date('W');
		$y=date('Y');
		$sql2="SELECT * FROM weekcache where year=$y and week=$w and name='jtimg'";
		$row2=$DB->once_fetch_array($sql2);
		if($row2['id']){
			$_SESSION['jtimg']=$row2['content'];
			$_SESSION['jtimgid']=$row2['oid'];
		}else{
			$rowe=$DB->once_fetch_array("SELECT * FROM jt_concept  where filesize>0 and filesize<70000 order by Rand() LIMIT 1");
			$DB->query("INSERT INTO weekcache (year,week,name,oid,ctime,content) VALUES (
				'$y','$w','jtimg','".$rowe['id']."','$ltime','".$rowe['img']."')");
			$_SESSION['jtimg']=$rowe['img'];
			$_SESSION['jtimgid']=$rowe['id'];
		}
	}
	if(isset($_GET['aikey'])){
		$akey=addslashes(trim($_GET['aikey']));
		if(empty($akey)){
			$method='jtse';
			$sql="SELECT * FROM jt_concept  order by Rand()  LIMIT 10";
		}else{
			$method='jtsearch';
			$sql="SELECT * FROM jt_concept WHERE text LIKE '%$akey%' or info LIKE '%$akey%' order by f3 desc LIMIT 1000";
		}
	}else{
		if(empty($_SESSION['thejts'])){
			$method='jthome';
			$sql="SELECT * FROM jt_concept order by Rand()  LIMIT 10";
			$res=$DB->query($sql);
			$t='';
			while($row=$DB->fetch_array($res)){
				$t.=$row['id'].',';
				$_SESSION['thejts']=$t.'0';
			}
			// echo $_SESSION['thejts'];
		}
		$sql="SELECT * FROM jt_concept where id in(".$_SESSION['thejts'].")";
	}
	$res=$DB->query($sql);
	while($row=$DB->fetch_array($res)){
		$o.=$row['id'].$row[text].' ';
		// $sql2 = "SELECT * FROM cruboy_assertion WHERE concept1_id='$row[id]' or concept2_id='$row[id]' LIMIT 2";
		$sql2="SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,c.text FROM jt_assertion a LEFT JOIN
		jt_concept c ON a.concept2_id=c.id
		WHERE concept1_id='".$row['id']."' order by Rand() limit 1";
		$aDa=$DB->once_fetch_array($sql2);
		
		$row['re1']=$aDa['relation_id'];
		$row['fi1']=$aDa['best_frame_id'];
		$ss=str_replace("{1}",'~',$cpr[$aDa['best_frame_id']]);
		$row['tx1']=str_replace("2",$aDa['text'],$ss);
		$sql3="SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,c.text FROM jt_assertion a LEFT JOIN
		jt_concept c ON a.concept1_id=c.id
		WHERE concept2_id='".$row['id']."' order by Rand() limit 1";
		$aDa3=$DB->once_fetch_array($sql3);
		
		$row['re2']=$aDa3['relation_id'];
		$row['fi2']=$aDa3['best_frame_id'];
		$ss=str_replace("1",$aDa3['text'],$cpr[$aDa3['best_frame_id']]);
		$row['tx2']=str_replace("{2}",'~',$ss);
		$concepts[]=$row;
	}
	if($akey)
		$o=$akey;
	if($method)
		$DB->query("INSERT INTO viewlogjt (method,viewid,concept,uid,seid,vtime,text,loginip) VALUES (
				'$method','$vsid','0','$uid','$seid','$ltime','$o','$gip')");
	
	include View::getView('header');
	include View::getView('cruboy');
	include View::getView('footer');
	View::output();
}
// ////内容页
if(!empty($cpid)){
	$DB=MySql::getInstance();
	$concepts=array();
	$logs1=array();
	$atitle="";
	$gip=getIp();
	$uid=UID;
	$vsid=intval($_SESSION['views']);
	$CACHE=Cache::getInstance();
	$cpr=$CACHE->readCache('cpr');
	$ltime=date('Y-m-d H:i:s');
	if(ISLOGIN!==true&&empty($_SESSION['u_name'])){
		$vfr="jtunlog";
		$sqadd="order by Rand() limit 300";
	}else{
		$vfr="jtview";
		$sqadd="order by a.relation_id,a.best_frame_id LIMIT 4000";
	}
	$DB->query("UPDATE jt_concept SET words=words+1 WHERE id='$cpid'");
	$sq1="SELECT * FROM jt_concept WHERE id='$cpid'";
	$pDa=$DB->once_fetch_array($sq1);
	
	$hhtitle=$pDa[text];
	$DB->query("INSERT INTO viewlogjt (method,viewid,concept,uid,seid,vtime,text,loginip) VALUES (
				'$vfr','$vsid','$cpid','$uid','$seid','$ltime','$pDa[text]','$gip')");
	
	$sq2="SELECT a.concept1_id,a.concept2_id,a.id as aid,
		a.relation_id,a.best_frame_id,jt_concept.* FROM jt_assertion a LEFT JOIN
		jt_concept ON a.concept2_id=jt_concept.id
		WHERE concept1_id='$cpid' $sqadd";
	$res2=$DB->query($sq2);
	while($row=$DB->fetch_array($res2)){
		if($row['best_frame_id']>0){
			$ss=str_replace("1",$pDa['text'],$cpr[$row['best_frame_id']]);
			$ss=str_replace("2",$row['text'],$ss);
			$row['frame']=$ss;
		}else
			$row['frame']=$cpr[$row['relation_id']];
		$concepts[]=$row;
	}
	$concepts2=array();
	$sq3="SELECT a.concept1_id,a.concept2_id,a.id as aid,
		a.relation_id,a.best_frame_id,jt_concept.* FROM jt_assertion a LEFT JOIN
		jt_concept ON a.concept1_id=jt_concept.id
		WHERE concept2_id='$cpid' $sqadd";
	$res3=$DB->query($sq3);
	while($row2=$DB->fetch_array($res3)){
		if($row2['best_frame_id']>0){
			$ss=str_replace("1",$row2['text'],$cpr[$row2['best_frame_id']]);
			$ss=str_replace("2",$pDa['text'],$ss);
			$row2['frame']='!'.$ss;
		}else{
			$row2['frame']='!'.$cpr[$row2['relation_id']];
		}
		$concepts2[]=$row2;
	}
	include View::getView('header');
	include View::getView('aishow');
	include View::getView('footer');
	View::output();
}

if($action=='login'||$action=='reg'){
	
	include View::getView('header');
	include View::getView('login');
	include View::getView('footer');
	View::output();
}
if($action=='auth'){
	session_start();
	$username=addslashes(trim($_POST['user']));
	$password=addslashes(trim($_POST['pw']));
	// $img_code = (Option::get('login_code') == 'y' && isset ($_POST['imgcode'])) ? addslashes (trim (strtoupper ($_POST['imgcode']))) : '';
	$ispersis=true;
	if(checkUser($username,$password,$img_code)===true){
		setAuthCookie($username,$ispersis);
		if($_SESSION['onm']==1)
			emDirect('?tem='.time());
		else
			emDirect('.');
	}else{
		emDirect("?action=login");
	}
}
if($action=='new'){
	$login=isset($_POST['user'])?addslashes(trim($_POST['user'])):'';
	$password=isset($_POST['pw'])?addslashes(trim($_POST['pw'])):'';
	$password2=isset($_POST['pw2'])?addslashes(trim($_POST['pw2'])):'';
	$password3=isset($_POST['pw3'])?addslashes(trim($_POST['pw3'])):'';
	if(strlen($login)<3){
		mMsg('用户名过短！','./?action=reg');
	}
	if(strlen($password)<3){
		mMsg('密码过短！','./');
	}
	if($password!=$password2){
		mMsg('两次密码不一致！','./?action=reg');
	}
	if($password3!='jitong')
		mMsg('注册码不正确！','./?action=reg');
	
	$User_Model=new User_Model();
	if($User_Model->isUserExist($login)){
		mMsg('用户名已存在！','./?action=reg');
	}
	
	$PHPASS=new PasswordHash(8,true);
	$password=$PHPASS->HashPassword($password);
	
	$User_Model->addUser($login,$password,$role);
	$CACHE->updateCache(array(
			'sta',
			'user'
	));
	mMsg('注册成功！','./?action=login');
}

if($action=='logout'){
	setcookie(AUTH_COOKIE_NAME,' ',time()-31536000,'/');
	emDirect('?tem='.time());
}
function mMsg($msg,$url){
	include View::getView('header');
	include View::getView('msg');
	include View::getView('footer');
	View::output();
}
function authPassword($postPwd,$cookiePwd,$logPwd,$logid){
	$pwd=$cookiePwd?$cookiePwd:$postPwd;
	if($pwd!==addslashes($logPwd)){
		include View::getView('header');
		include View::getView('logauth');
		include View::getView('footer');
		if($cookiePwd){
			setcookie('em_logpwd_'.$logid,' ',time()-31536000);
		}
		View::output();
	}else{
		setcookie('em_logpwd_'.$logid,$logPwd);
	}
}
