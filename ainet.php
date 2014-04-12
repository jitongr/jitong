<?php
/**
 * mynet forzyl@gmail.com
 * @copyright (zhangyulin
*/

require_once '../init.php';

define('TEMPLATE_PATH', EMLOG_ROOT.'/m/views/');//前台模板路径
define('CURPAGE_HOME',  'home');
define('CURPAGE_LOG',   'echo_log');
define('CURPAGE_TW',    'twitter');

$blogtitle = Option::get('twnavi') . ' - ' . Option::get('blogname');
$description = Option::get('bloginfo');

$DB = MySql::getInstance();
$usersina_id=0;
$concepts=array();
$logs1=array();
$atitle="";
$gip=getIp();   
$uid=UID;
//概念详细页
if(isset ($_GET['cp']))
{
	$cpid = intval ($_GET['cp']) ;
	$DB->query("UPDATE conceptnet_concept SET words=words+1 WHERE id='$cpid'");
	$sq1 = "SELECT * FROM conceptnet_concept WHERE id='$cpid'";
	$pDa = $DB->once_fetch_array($sq1);
	
	$hhtitle=$pDa[text];
	$ltime = time();
	$DB->query("INSERT INTO oplog (opid,concept,gid,sina_uid,date,text,loginip) VALUES (
				'2','$cpid','$uid','$usersina_id','$ltime','$pDa[text]','$gip')");
	$sq2 = "SELECT a.id as aid,a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,a.good,a.bad,conceptnet_concept.* FROM conceptnet_assertion as a LEFT JOIN
		conceptnet_concept ON a.concept2_id=conceptnet_concept.id
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
	$sq3 = "SELECT a.id as aid,a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,a.good,a.bad,conceptnet_concept.* FROM conceptnet_assertion as a LEFT JOIN
		conceptnet_concept ON a.concept1_id=conceptnet_concept.id
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
		$ltime = time();
	$DB->query("INSERT INTO oplog (opid,gid,sina_uid,date,text,loginip) VALUES (
				'1','$uid','$usersina_id','$ltime','$akey','$gip')");
	$sql = "SELECT * FROM conceptnet_concept WHERE text LIKE '%$akey%'order by f3 desc LIMIT 1000";
			$res = $DB->query($sql);
		
			while ($row = $DB->fetch_array($res)) {
			
		// $sql2 = "SELECT * FROM conceptnet_assertion WHERE concept1_id='$row[id]' or concept2_id='$row[id]' LIMIT 2";
		$sql2 = "SELECT conceptnet_assertion.concept1_id,conceptnet_assertion.concept2_id,
		conceptnet_assertion.relation_id,conceptnet_assertion.best_frame_id,conceptnet_concept.text FROM conceptnet_assertion LEFT JOIN
		conceptnet_concept ON conceptnet_assertion.concept2_id=conceptnet_concept.id
		WHERE concept1_id='$row[id]'";
			$aDa = $DB->once_fetch_array($sql2);
		
		$row[tx1]=$aDa[text];
	 $row[re1]=$aDa[relation_id];
	 $row[fi1]=$aDa[best_frame_id];
		 $sql3 = "SELECT conceptnet_assertion.concept1_id,conceptnet_assertion.concept2_id,
		conceptnet_assertion.relation_id,conceptnet_assertion.best_frame_id,conceptnet_concept.text FROM conceptnet_assertion LEFT JOIN
		conceptnet_concept ON conceptnet_assertion.concept1_id=conceptnet_concept.id
		WHERE concept2_id='$row[id]'";
			$aDa3 = $DB->once_fetch_array($sql3);
		
		$row[tx2]=$aDa3[text];
	 $row[re2]=$aDa3[relation_id];
	 $row[fi2]=$aDa3[best_frame_id];
	$concepts[]=$row;
		}
	$hhtitle=$akey;
    include View::getView('header');
	include View::getView('mynet');
	include View::getView('footer');
	View::output();
}

if(isset ($_GET['fre']))
{ $a=0;
	$freid = intval ($_GET['fre']) ;
	$sql2 = "SELECT conceptnet_assertion.concept1_id,conceptnet_assertion.concept2_id,
		conceptnet_assertion.score,conceptnet_assertion.best_frame_id,conceptnet_concept.text FROM conceptnet_assertion LEFT JOIN
		conceptnet_concept ON conceptnet_assertion.concept2_id=conceptnet_concept.id
		WHERE best_frame_id='$freid' order by conceptnet_assertion.score desc";
	$res2 = $DB->query($sql2);
	while ($row = $DB->fetch_array($res2)) {
		$sqqq2="SELECT text FROM conceptnet_concept WHERE id='$row[concept1_id]'";
			 $qDq2 = $DB->once_fetch_array($sqqq2);
			 $row[text1]=$qDq2[text];
		echo $a.$row[text1]."-->".$row[text].$row[score]."<br>";
		$a++;
	}
	exit;
	
}
    
	$res3 = $DB->query("select * from emlog_blog where top='y' order by date desc");
	while ($row = $DB->fetch_array($res3)) {
		$logs1[]=$row;
	}
$hhtitle="首页";
    include View::getView('header');
	include View::getView('mynet');
	include View::getView('footer');
    View::output();

