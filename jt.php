<?php
/**
 * jitong cruboy.com
 * @copyright cruboy
*/

require_once 'init.php';

define ('TEMPLATE_PATH', EMLOG_ROOT . '/view/');

if (ISLOGIN !== true){

$msg='请登录。';
emDirect("/jitong/?action=login");
exit;
}

$DB = MySql::getInstance();
$concepts=array();
$atitle="";
$gip=getIp();   
$uid=UID;
$seid=session_id();
$vsid=intval($_SESSION['views']);
// 首页

	$cpid=isset($_GET['cp'])?intval($_GET['cp']):intval($_GET['id']);
    $tabf='jt';
	$CACHE = Cache::getInstance();
	$cpr = $CACHE->readCache('cpr');	
if (!empty($cpid) )
{
	$ltime = date('Y-m-d H:i:s');
    $aineth=1;
	//$DB->query("UPDATE  ".$tabf."_concept SET words=words+1 WHERE id='$cpid'");

	$sq1 = "SELECT * FROM  ".$tabf."_concept WHERE id='$cpid'";
	$pDa = $DB->once_fetch_array($sq1);

	$hhtitle=$pDa['text'];
		//$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
			//	'$vfrom','$vsid','$cpidd','$uid','$usersina_id','$ltime','$pDa[text]','$gip')");
	
	$sq2 = "SELECT a.concept1_id,a.concept2_id,a.id as aid,
		a.relation_id,a.best_frame_id,a.atop1 as atop,a.aleft1 as aleft,a.itop1 as itop,a.ileft1 as ileft,a.imgs1 as imgs,a.imgsize1 as imgsz,a.infos,
		 ".$tabf."_concept.* FROM  ".$tabf."_assertion a LEFT JOIN
		 ".$tabf."_concept ON a.concept2_id= ".$tabf."_concept.id
		WHERE concept1_id='$cpid' order by a.relation_id,a.best_frame_id LIMIT 1000";
	$res2 = $DB->query($sq2);
	while ($row = $DB->fetch_array($res2)) {
			if($row['best_frame_id']>0){		
			$ss=str_replace("1",$pDa['text'],$cpr[$row['best_frame_id']]);
			$ss=str_replace("2",$row['text'],$ss);
			$row['frame']=$ss;
			}else{
			 $row['frame']=$cpr[$row['relation_id']];
			}
		    $row['fx']='1';
			if($row['atop']>$maxtop)
					$maxtop=$row[atop];	
			$concepts[]=$row;
			}

	$sq3 = "SELECT a.concept1_id,a.concept2_id,a.id as aid,
		a.relation_id,a.best_frame_id,a.atop2 as atop,a.aleft2 as aleft,a.itop2 as itop,a.ileft2 as ileft,a.imgs2 as imgs,a.imgsize2 as imgsz,a.infos,
		 ".$tabf."_concept.* FROM  ".$tabf."_assertion a LEFT JOIN
		 ".$tabf."_concept ON a.concept1_id= ".$tabf."_concept.id
		WHERE concept2_id='$cpid' order by a.relation_id,a.best_frame_id LIMIT 1000";
		$res3 = $DB->query($sq3);
	while ($row2 = $DB->fetch_array($res3)) {
			if($row2['best_frame_id']>0){		
			$ss=str_replace("1",$row2['text'],$cpr[$row2['best_frame_id']]);
			$ss=str_replace("2",$pDa['text'],$ss);
			$row2['frame']='!'.$ss;
			}else{
			 $row2['frame']='!'.$cpr[$row2['relation_id']];
			}
			$row2['fx']='2';
			if($row2['atop']>$maxtop)
			$maxtop=$row2['atop'];
		$concepts[]=$row2;
		}
		$mm=count($concepts,0)*20+60;
		//	echo $maxtop.' '.$mm;
			if($maxtop<$mm)
			$maxtop=$mm;
			if($maxtop<760)
			$maxtop=760;
	include './view/header.php';
if(isset($_GET['cp']))
	include View::getView('cpedit');
	else
	include View::getView('cpshow');
	include View::getView('footer');
	View::output();
}
elseif(isset ($_GET['fre']))
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

	
}
elseif(isset ($_GET['list']))
{
   $action='list';
	$sql = "SELECT uid,count(1) as a FROM  ".$tabf."_concept WHERE uid>0 group by uid order by a desc";
			$res = $DB->query($sql);
		
			global $CACHE;
	$user_cache = $CACHE->readCache('user');
	
  include './view/header.php';
 echo ' <table width="400" border="1">
  <tr>
    <th scope="col">会员</th>
    <th scope="col">图数量</th>
    <th scope="col">&nbsp;</th>
  </tr>';
	while ($row = $DB->fetch_array($res)) {
			//print_r($row);
			echo '<tr>
    <td>'.$user_cache[$row['uid']]['name'].'</td>
    <td>'.$row['a'].'</td>
    <td><a href="?u='.$row['uid'].'">查看</a></td>
  </tr>';
			}  
echo '</table>';


	include View::getView('footer');
	View::output();
}
else
{
	$akey = addslashes($_GET['k']);
	
	$ltime = date('Y-m-d H:i:s');
	
	if(isset($_GET['u'])){
		$uid=intval($_GET['u']);
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$sql = "SELECT * FROM ".$tabf."_concept where uid={$uid} order by edittime desc limit 1000";
	$atitle=$author.'添加的图';$action='list';
	$kword='maimy';
	}elseif(empty ($akey)){
	$sql = "SELECT * FROM ".$tabf."_concept where uid=0 order by Rand()  LIMIT 30";
	$atitle='点击编辑图：';
	$aineth=1;
	$kword='maihome';
	}else{
	$sql = "SELECT * FROM  ".$tabf."_concept WHERE text LIKE '%$akey%' order by f3 desc LIMIT 1000";
	$atitle="查询'".$akey."'进行编辑：";$aineth=1;
	$kword='maisearch';
	}
	$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,seid,vtime,text,loginip) VALUES (
				'$kword','$vsid','0','$uid','$seid','$ltime','$akey','$gip')");	
			$res = $DB->query($sql);
		
			while ($row = $DB->fetch_array($res)) {
			if(isset($_GET['jt']))$row[id]=-$row[id];
		// $sql2 = "SELECT * FROM  ".$tabf."_assertion WHERE concept1_id='$row[id]' or concept2_id='$row[id]' LIMIT 2";
		$sql2 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id, ".$tabf."_concept.text FROM  ".$tabf."_assertion a LEFT JOIN
		 ".$tabf."_concept ON a.concept2_id= ".$tabf."_concept.id
		WHERE concept1_id='$row[id]'";
			$aDa = $DB->once_fetch_array($sql2);
		
		$row[tx1]=$aDa[text];
	 $row[re1]=$aDa[relation_id];
	 $row[fi1]=$aDa[best_frame_id];
		 $sql3 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id, ".$tabf."_concept.text FROM  ".$tabf."_assertion a LEFT JOIN
		 ".$tabf."_concept ON a.concept1_id= ".$tabf."_concept.id
		WHERE concept2_id='$row[id]'";
			$aDa3 = $DB->once_fetch_array($sql3);
		
		$row[tx2]=$aDa3[text];
	 $row[re2]=$aDa3[relation_id];
	 $row[fi2]=$aDa3[best_frame_id];
	$concepts[]=$row;
		}
		$hhtitle=$akey;
		$atitle.="（共".count($concepts,0)."个）";
  include './view/header.php';
	include View::getView('mynet');
	include View::getView('footer');
	View::output();
}




