<?php
/**
 * jitong cruboy.com
 * @copyright cruboy
*/

require_once 'init.php';

define ('TEMPLATE_PATH', EMLOG_ROOT . '/view/');

if (isset($_GET['cp'])&&ISLOGIN !== true){

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
		a.relation_id,a.best_frame_id,a.atop1 as atop,a.aleft1 as aleft,a.itop1 as itop,a.ileft1 as ileft,a.imgsize1 as imgsz,
		 c.* FROM  ".$tabf."_assertion a LEFT JOIN
		 ".$tabf."_concept c ON a.concept2_id= c.id
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
		a.relation_id,a.best_frame_id,a.atop2 as atop,a.aleft2 as aleft,a.itop2 as itop,a.ileft2 as ileft,a.imgsize2 as imgsz,
		 c.* FROM  ".$tabf."_assertion a LEFT JOIN
		 ".$tabf."_concept c ON a.concept1_id= c.id
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
{ 
	 
  $cpr[0]="{1}--{2}";
	$ltime = date('Y-m-d H:i:s');

	//$DB->query("UPDATE  ".$tabf."_concept SET words=words+1 WHERE id='$cpid'");

		//$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
			//	'$vfrom','$vsid','$cpidd','$uid','$usersina_id','$ltime','$pDa[text]','$gip')");
	
// print_r($cpr);
	$freid = intval ($_GET['fre']);
	if($freid)$sqlad=" and a.best_frame_id='$freid' ";
	$sql2 = "SELECT a.id as aid,a.concept1_id,a.concept2_id,
		 a.relation_id,a.best_frame_id,c.text as cp1,d.text as cp2 FROM 
		jt_assertion a LEFT JOIN jt_concept c ON a.concept1_id=c.id 
		 LEFT JOIN jt_concept d ON a.concept2_id=d.id
		WHERE 1 {$sqlad} order by c.id";
	$res2 = $DB->query($sql2);
   include View::getView('header');
   include View::getView('ass');
	include View::getView('footer');
	
}
else
{
   $action='list';
	$sql = "SELECT sort,count(1) as a FROM  jt_concept group by sort ";

	include View::getView('header');
    $res = $DB->query($sql);
	while ($row = $DB->fetch_array($res)) {
		 $p[$row['sort']]=$row['a'];
			}  
if(isset($_GET['edit']))$ad='&edit';
if(isset($_GET['show']))$ad='&show';
foreach(getcptype() as $k=>$v){
	echo '<a href="?s='.$k.$ad.'">'.$v.$p[$k].'</a> &nbsp;';
	}
$s=isset($_GET['s'])?intval($_GET['s']):7;

	$sql = "SELECT * FROM jt_concept ";
if(!isset($_GET['all']))
 $sql .=' where sort='.$s;
	$res = $DB->query($sql);
	
	include View::getView('cruboylist');
	include View::getView('footer');
	View::output();
}




