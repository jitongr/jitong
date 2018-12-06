<?php
require_once 'init.php';

$acid=intval($_POST['cid']);
if($acidd>0&&ISLOGIN!==true){
	echo "非法访问！请先登录！";
	exit();
}
$action=isset($_GET['action'])?addslashes($_GET['action']):'';
$gip=getIp();
$uid=UID;

$DB=MySql::getInstance();

if($action=='addcp'){
	
	$tabf="jt";
	
	if($acid==0)
		mMsg('错误','-1');
	
	$ltime=time();
	
	$ar=intval($_POST['addrel']);
	if($ar==0)
		mMsg('关系号不能为空','-1');
	if($ar<-100||$ar>100)
		mMsg('关系号超出范围','-1');
	if(intval($_POST['dirs'])==1)
		$ar=-$ar;
	$arrr=$ar;
	
	if(strlen($_POST['addname'])>0&&strlen($_POST['addname'])<200)
		$addname=addslashes(trim($_POST['addname']));
	else
		mMsg('概念错误','-1');
	$cp0s=addslashes(trim($_POST['cp0s']));
	$sq1="SELECT * FROM ".$tabf."_concept WHERE text LIKE '$addname'";
	$pDa=$DB->once_fetch_array($sq1);
	$hid=$pDa[id];
	if($hid>0){
		if($hid==$acid)
			mMsg("重复".$hid,'-1');
		$cpaddid=-$hid;
	}else{
		$DB->query("INSERT INTO ".$tabf."_concept (text,edittime) VALUES ('$addname',$ltime )");
		$hid=$DB->insert_id();
		$cpaddid=$hid;
		// mMsg('ok add'.$hid, '-1');
	}
	if($ar>0){
		$DB->query("UPDATE ".$tabf."_concept SET f3=f3+1 WHERE id='$acid'");
		$DB->query("UPDATE ".$tabf."_concept SET f3=f3+1 WHERE id='$hid'");
		$sq2="WHERE concept1_id='$acid' AND concept2_id='$hid' ";
		$sq3="INSERT INTO ".$tabf."_assertion (concept1_id,concept2_id,edittime,relation_id";
	}else{
		$DB->query("UPDATE ".$tabf."_concept SET f3=f3+1 WHERE id='$acid'");
		$DB->query("UPDATE ".$tabf."_concept SET f3=f3+1 WHERE id='$hid'");
		$ar=-$ar;
		$sq2="WHERE concept2_id='$acid' AND concept1_id='$hid' ";
		$sq3="INSERT INTO ".$tabf."_assertion (concept2_id,concept1_id,edittime,relation_id";
	}
	$pDr=$DB->once_fetch_array("SELECT * FROM ".$tabf."_assertion ".$sq2);
	$rid=$pDr[id];
	
	if($ar<32){
		$sq3=$sq3.") VALUES ('$acid','$hid',$ltime,'$ar')";
		$sq4="relation_id='$ar' ";
	}else{
		$sqqq1="SELECT relation_id FROM conceptnet_frame WHERE id='$ar'";
		$qDq=$DB->once_fetch_array($sqqq1);
		$sq3=$sq3.",best_frame_id) VALUES ('$acid','$hid',$ltime,'$qDq[relation_id]','$ar')";
		$sq4="relation_id='$qDq[relation_id]',best_frame_id='$ar' ";
	}
	
	if($rid>0){
		//
		$DB->query("UPDATE ".$tabf."_assertion SET edittime=$ltime,".$sq4.$sq2);
		// mMsg("关系已改".$rid, '-1');
		$pp="关系已改";
	}else{
		$DB->query($sq3);
		$rid=$DB->insert_id();
	}
	
	// $sst=date('Y-m-d H:i:s', $ltime);
	// $vsid=intval($_SESSION['views']);
	// $DB->query("INSERT INTO jt_vaddlog (viewid,cp0,cp0id,rid,cpadd,cpaddid,relation,
	// uid,date,dates,loginip) VALUES (
	// '$vsid','$cp0s','$acidd','$arrr','$addname','$cpaddid','$rid',
	// '$uid','','$ltime','$sst','$gip')");
	
	mMsg('添加成功！'.$pp.$hid,$turl."?cp=".$acid);
}
function mMsg($msg,$url){
	if(isset($_POST[valid]))
		echo $msg;
	else
		echo "<script language=\"JavaScript\">alert(\"$msg\");history.back();</script>";
	exit();
}

?>