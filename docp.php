<?php
/**
 * jitongr
*/
require_once 'init.php';

$gip=getIp();
$uid=UID;
$ltime=time();
$rtime=date('Y-m-d H:i:s');
$DB=MySql::getInstance();

//if(ISLOGIN!==true){
	
//	echo "请先登录或授权！";
//	exit();
//}

$cpid=intval($_GET['cp']);

$tabf="jt";
$vfrom="jcru";

if($cpid==0){
	echo "错误";
	exit();
}

if(isset($_GET['ecdid'])){
	
	$id=intval($_GET['ecdid']);
	$sq1="SELECT * FROM  ".$tabf."_concept WHERE id='$id'";
	$pDa=$DB->once_fetch_array($sq1);
	$pDa['content']=addslashes($pDa['content']);
	unset($pDa['imgc']);
	$DB->query("INSERT INTO jt_vasslog (cpid,rid,method,edate,uid,content,ip,seid) VALUES (
				$id,0,'editcp','$rtime','$uid','".serialize($pDa)."','$gip','".session_id()."')");
	$_POST['edittime']=$ltime;
	$Item=array();
	foreach($_POST as $key=>$data){
		$Item[]="$key='".addslashes($data)."'";
	}
	$upStr=implode(',',$Item);
	$DB->query("UPDATE ".$tabf."_concept SET $upStr WHERE id=$id");
	if(isset($_GET['s'])){
		emDirect('ask.php?s='.$_GET['s']);
	}else{
		$msf="修改成功！".$id;
		echo $msf;
	}
	exit();
}elseif(isset($_GET['aid'])){
	// print_r($_POST);
	$id=intval($_GET['aid']);
	$sq1="SELECT * FROM  conceptnet_frame WHERE id='$id'";
	$pDa=$DB->once_fetch_array($sq1);
	if($pDa['best_frame_id']!=($_POST['best_frame_id'])){
		$sqqq2="SELECT * FROM conceptnet_relation WHERE id='".$_POST['best_frame_id']."'";
		$pDad=$DB->once_fetch_array($sqqq2);
		$_POST['relation_id']=$pDad['relation_id'];
	}
	
	$DB->query("INSERT INTO jt_vasslog (cpid,rid,method,edate,uid,content,ip,seid) VALUES (
				0,$id,'editass','$rtime','$uid','".serialize($pDa)."','$gip','".session_id()."')");
	$_POST['edittime']=$ltime;
	$Item=array();
	foreach($_POST as $key=>$data){
		$Item[]="$key='".addslashes($data)."'";
	}
	$upStr=implode(',',$Item);
	$DB->query("UPDATE ".$tabf."_assertion SET $upStr WHERE id=$id");
	$msf="修改成功！".$id;
	
	echo $msf;
}elseif(isset($_POST['iid'])){
	$x=intval($_POST['x']);
	$y=intval($_POST['y']);
	if($_POST['iid']==3){
		$DB->query("UPDATE ".$tabf."_concept SET ctop=$y,cleft=$x WHERE id=$cpid");
	}else if(!empty($_POST['iid'])){
		$fx=substr($_POST['iid'],-1,1);
		$rid=substr($_POST['iid'],0,-1);
		$DB->query("UPDATE ".$tabf."_assertion SET itop{$fx}=$y,ileft{$fx}=$x WHERE id=$rid");
	}else if(!empty($_POST['id'])){
		$fx=substr($_POST['id'],-1,1);
		$rid=substr($_POST['id'],0,-1);
		$DB->query("UPDATE ".$tabf."_assertion SET atop{$fx}=$y,aleft{$fx}=$x WHERE id=$rid");
	}
	print_r($_POST);
}elseif(isset($_GET['editid'])){
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
		// print_r($value);
		include View::getView('cpredit');
	}
}
function mMsg($msg,$url){
	echo "<script language=\"JavaScript\">alert(\"$msg\");history.back();</script>";
	exit();
}

?>