<?php
/**
 * mynet forzyl@gmail.com
 * @copyright (zhangyulin
*/

require_once 'init.php';

define('TEMPLATE_PATH', EMLOG_ROOT.'/view/');
//TPLS_PATH.Option::get('nonce_templet').'/');//前台模板路径

$blogtitle = 'VolunteerNet-' . Option::get('blogname');

$DB = MySql::getInstance();
$usersina_id= intval($_SESSION['oauth2']["user_id"]);
$concepts=array();
$logs1=array();
$atitle="";
$gip=getIp();   
$uid=UID;
		$vsid=intval($_SESSION['views']);
//详细页
if(isset ($_GET['cp']))
{
	$cpid = intval ($_GET['cp']) ;
	$ltime = date('Y-m-d H:i:s');
/*	$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
				'old','$vsid','$cpid','$uid','$usersina_id','$ltime','','$gip')");
	header('Location: /index.php');
exit;
}

if(isset ($_GET['id']))
{
	$cpid = intval ($_GET['id']) ;
	$ltime = time();
if (ISLOGIN !== true&&(
empty($_SESSION['oauth2']["user_id"])||empty($_SESSION['u_name']))){
		$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
				'unlogin','$vsid','$cpid','$uid','$usersina_id','$ltime','','$gip')");
echo "请登录或授权后查看！";
exit;
}
*/	
	$DB->query("UPDATE cruboy_concept SET words=words+1 WHERE id='$cpid'");

	$sq1 = "SELECT * FROM cruboy_concept WHERE id='$cpid'";
	$pDa = $DB->once_fetch_array($sq1);
	
	$hhtitle=$pDa[text];
	$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,vtime,text,loginip) VALUES (
				'jtcruview','$vsid','$cpid','$uid','$usersina_id','$ltime','$pDa[text]','$gip')");
	
	$sq2 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,cruboy_concept.* FROM cruboy_assertion a LEFT JOIN
		cruboy_concept ON a.concept2_id=cruboy_concept.id
		WHERE concept1_id='$cpid' order by a.relation_id,a.best_frame_id LIMIT 4000";
	$res2 = $DB->query($sq2);
	while ($row = $DB->fetch_array($res2)) {
			if($row[best_frame_id]>0){		
			$sqqq1="SELECT text FROM conceptnet_frame WHERE id='$row[best_frame_id]'";
			$qDq = $DB->once_fetch_array($sqqq1);
			$ss=str_replace("1",$pDa[text],$qDq[text]);
			$ss=str_replace("2",$row[text],$ss);
			$row[frame]=$ss;
			}
			$sqqq2="SELECT name FROM conceptnet_relation WHERE id='$row[relation_id]'";
			 $qDq2 = $DB->once_fetch_array($sqqq2);
			 $row[rela]=$qDq2[name];
			 
			$concepts[]=$row;
			}
	$concepts2=array();
	$sq3 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,cruboy_concept.* FROM cruboy_assertion a LEFT JOIN
		cruboy_concept ON a.concept1_id=cruboy_concept.id
		WHERE concept2_id='$cpid' order by a.relation_id,a.best_frame_id LIMIT 4000";
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
	include View::getView('cpshow');
	include View::getView('footer');
	View::output();
}
if(isset($_GET['keyword']))
{
	$akey = addslashes($_GET['keyword']);
	$atitle="查询‘".$akey."’的结果：";
		$ltime = date('Y-m-d H:i:s');
	$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,vtime,text,loginip) VALUES (
				'jtcrusearch','$vsid','0','$uid','$usersina_id','$ltime','$akey','$gip')");
	if(empty ($akey))
	$sql = "SELECT * FROM cruboy_concept order by Rand()  LIMIT 10";
	else
	$sql = "SELECT * FROM cruboy_concept WHERE text LIKE '%$akey%'order by f3 desc LIMIT 1000";
			$res = $DB->query($sql);
		
			while ($row = $DB->fetch_array($res)) {
			
		// $sql2 = "SELECT * FROM cruboy_assertion WHERE concept1_id='$row[id]' or concept2_id='$row[id]' LIMIT 2";
		$sql2 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,cruboy_concept.text FROM cruboy_assertion a LEFT JOIN
		cruboy_concept ON a.concept2_id=cruboy_concept.id
		WHERE concept1_id='$row[id]'";
			$aDa = $DB->once_fetch_array($sql2);
		
		$row[tx1]=$aDa[text];
	 $row[re1]=$aDa[relation_id];
	 $row[fi1]=$aDa[best_frame_id];
		 $sql3 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,cruboy_concept.text FROM cruboy_assertion a LEFT JOIN
		cruboy_concept ON a.concept1_id=cruboy_concept.id
		WHERE concept2_id='$row[id]'";
			$aDa3 = $DB->once_fetch_array($sql3);
		
		$row[tx2]=$aDa3[text];
	 $row[re2]=$aDa3[relation_id];
	 $row[fi2]=$aDa3[best_frame_id];
	$concepts[]=$row;
		}
		$hhtitle=$akey;
    include View::getView('header');
	include View::getView('cruboy');
	include View::getView('footer');
	View::output();
}
if(isset($_GET['list'])||isset($_GET['show']))
{
	
	$sql = "SELECT * FROM cruboy_concept";
	$res = $DB->query($sql);
	include View::getView('header');
	include View::getView('cruboylist');
	include View::getView('footer');
	View::output();
}
$hhtitle=$akey;
    include View::getView('header');
	include View::getView('cruboy');
	include View::getView('footer');


