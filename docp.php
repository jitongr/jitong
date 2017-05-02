<?php
/**
 * jitongr
*/

require_once '../init.php';


define('TEMPLATE_PATH', EMLOG_ROOT.'/m/views/');

$gip=getIp();   
$uid=UID;
$ltime=time();
$rtime= date('Y-m-d H:i:s');
$DB = MySql::getInstance();
if(isset($_POST['badr']) )
{
$hhtitle="bad";
$rid =intval($_POST['badr']);
$DB->query("INSERT INTO vasslog (cpid,rid,method,edate,uid,content,ip,seid) VALUES (
				0,'$rid','badr','$rtime','$uid','','$gip','".session_id()."')");
$DB->query("UPDATE conceptnet_assertion SET edittime='$ltime',bad=bad+1 WHERE id=".$rid);
exit;
}
else if(isset($_POST['goodr']) )
{
$hhtitle="good";
$rid =intval($_POST['goodr']);
$DB->query("INSERT INTO vasslog (cpid,rid,method,edate,uid,content,ip,seid) VALUES (
				0,'$rid','goodr','$rtime','$uid','','$gip','".session_id()."')");
$DB->query("UPDATE conceptnet_assertion SET edittime='$ltime',good=good+1 WHERE id=".$rid);
exit;
}
if (ISLOGIN !== true){
//empty($_SESSION['oauth2']["user_id"])||empty($_SESSION['u_name']))){
echo "请先登录或授权！";
exit;
}

$cpidd=intval($_GET['cp']);
			if($cpidd<0){
				$tabf="cruboy";
				$vfrom="jcru";
				$sn='-';
				$cpid=-$cpidd;
			}elseif($cpidd>0){
				$tabf="conceptnet";
				$vfrom="jind";
				$sn='';
				$cpid=$cpidd;
			}
			else{
				echo "错误";exit;
				}
			
if(isset($_GET['ecdid'])){

	$id=intval($_GET['ecdid']);
	$_POST['imgid']=intval($_POST['imgid']);
	$_POST['imgsize']=intval($_POST['imgsize']);
$sq1="SELECT * FROM  ".$tabf."_concept WHERE id='$id'";
	$pDa=$DB->once_fetch_array($sq1);

	if($pDa['imgid']!=($_POST['imgid'])){
	 if($pDa['imgid']!=0) 
	 $DB->query("UPDATE emlog_attachment SET cnum=cnum-1 WHERE aid={$pDa['imgid']}");
	  if($_POST['imgid']!=0) 
	 $DB->query("UPDATE emlog_attachment SET cnum=cnum+1 WHERE aid={$_POST['imgid']}"); 
	}	  
$DB->query("INSERT INTO vasslog (cpid,rid,method,edate,uid,content,ip,seid) VALUES (
				$id,0,'editcp','$rtime','$uid','".serialize($pDa)."','$gip','".session_id()."')");
	$_POST['edittime']=$ltime;
	  $Item = array();
		foreach ($_POST as $key => $data) {
			$Item[] = "$key='".addslashes($data)."'";
		}
		$upStr = implode(',', $Item);
		$DB->query("UPDATE ".$tabf."_concept SET $upStr WHERE id=$id");
	   $msf="修改成功！".$id;
		 
	echo $msf;
	exit;
}
elseif(isset($_GET['aid'])){
//print_r($_POST);
		$id=intval($_GET['aid']);
$sq1="SELECT * FROM  ".$tabf."_assertion WHERE id='$id'";
	$pDa=$DB->once_fetch_array($sq1);

	if($pDa['img1']!=($_POST['img1'])){
	 if($pDa['img1']!=0) 
	 $DB->query("UPDATE emlog_attachment SET cnum=cnum-1 WHERE aid={$pDa['img1']}");
	  if($_POST['img1']!=0) 
	 $DB->query("UPDATE emlog_attachment SET cnum=cnum+1 WHERE aid={$_POST['img1']}"); 
	}
	if($pDa['img2']!=($_POST['img2'])){
	 if($pDa['img2']!=0) 
	 $DB->query("UPDATE emlog_attachment SET cnum=cnum-1 WHERE aid={$pDa['img2']}");
	  if($_POST['img2']!=0) 
	 $DB->query("UPDATE emlog_attachment SET cnum=cnum+1 WHERE aid={$_POST['img2']}"); 
	}
	
$DB->query("INSERT INTO vasslog (cpid,rid,method,edate,uid,content,ip,seid) VALUES (
				0,$id,'editass','$rtime','$uid','".serialize($pDa)."','$gip','".session_id()."')");
	$_POST['edittime']=$ltime;
	  $Item = array();
		foreach ($_POST as $key => $data) {
			$Item[] = "$key='".addslashes($data)."'";
		}
		$upStr = implode(',', $Item);
		$DB->query("UPDATE ".$tabf."_assertion SET $upStr WHERE id=$id");
	   $msf="修改成功！".$id;
		 
	echo $msf;
}
elseif(isset($_POST['iid'])){
   $x=intval($_POST['x']);
   $y=intval($_POST['y']);
	if($_POST['iid']==3){
		$DB->query("UPDATE ".$tabf."_concept SET ctop=$y,cleft=$x WHERE id=$cpid");
	}
	else if(!empty($_POST['iid'])){
		$fx=substr($_POST['iid'],-1,1);
		$rid=substr($_POST['iid'],0,-1);
		$DB->query("UPDATE ".$tabf."_assertion SET itop{$fx}=$y,ileft{$fx}=$x WHERE id=$rid");
	}
	else if(!empty($_POST['id'])){
		$fx=substr($_POST['id'],-1,1);
		$rid=substr($_POST['id'],0,-1);
		$DB->query("UPDATE ".$tabf."_assertion SET atop{$fx}=$y,aleft{$fx}=$x WHERE id=$rid");
		}
	print_r($_POST);
	}
elseif(isset($_GET['editid'])){
	$m=$_GET['m'];
     $fx=substr($_GET['editid'],-1,1);
	 $rid=substr($_GET['editid'],0,-1);
	if($fx==3){
	$sq1="SELECT * FROM  ".$tabf."_concept WHERE id='$cpid'";
	$pDa=$DB->once_fetch_array($sq1);
	include View::getView('cppedit');
	}else{
	$sq1="SELECT * FROM  ".$tabf."_assertion WHERE id='$rid'";
	$value=$DB->once_fetch_array($sq1);
	//print_r($value);
	include View::getView('cpredit');
	}
}

function mMsg($msg, $url) {
	echo "<script language=\"JavaScript\">alert(\"$msg\");history.back();</script>";
	exit;
}

?>