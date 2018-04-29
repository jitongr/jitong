<?php
/**
 * mynet forzyl@gmail.com
 * @copyright (zhangyulin
*/

require_once '../init.php';


$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
$gip=getIp();   
$uid=UID;
$usersina_id=0;
	$DB = MySql::getInstance();

if ($action == 'delok') {
	 $sql = "SELECT * FROM conceptnet_concept WHERE visible=0 limit 10000";
	 //limit 0,10000
		$res = $DB->query($sql);
		while ($row = $DB->fetch_array($res)) {
		
		$sql2 = "DELETE FROM conceptnet_assertion WHERE concept1_id=".$row['id'];
		$sql3 = "DELETE FROM conceptnet_assertion WHERE concept2_id=".$row['id'];
		$res2 = $res2+ $DB->query($sql2);
		$res3 = $res3 + $DB->query($sql3);
		
		}
		echo $sql.' ';
		echo  $row['text'].$res2."-".$res3;
}
if ($action == 'updnum') {
	 $sql = "SELECT * FROM jt_concept";
	 //limit 0,10000
		$res = $DB->query($sql);
		while ($row = $DB->fetch_array($res)) {
		
		$sql2 = "SELECT count(*) FROM jt_assertion WHERE concept1_id=".$row['id'];
		$res2 = $DB->once_fetch_array($sql2);
		$comNum1 = $res2['count(*)'];
		$sql3 = "SELECT count(*) FROM jt_assertion WHERE concept2_id=".$row['id'];
		$res3 = $DB->once_fetch_array($sql3);
		$comNum2 = $res3['count(*)'];
		$comNum=$comNum1+$comNum2;//f1=".$comNum1.",f2=".$comNum2.",
		$DB->query("UPDATE conceptnet_concept SET f3=".$comNum.
		" WHERE id=".$row['id']);
		
		}
		echo ' ok';
		
}
// 按frame统计.
if ($action == 'frame') {
		$a=0;
    $sql = "SELECT * FROM conceptnet_frame order by relation_id";
		$res = $DB->query($sql);
		while ($row = $DB->fetch_array($res)) {
			$wd=$row['text']; 
			$a++;
			$dd=$row['id'];
		$sql2 = "SELECT count(*) FROM conceptnet_assertion WHERE best_frame_id=".$dd;
		$res2 = $DB->once_fetch_array($sql2);
		$comNum = $res2['count(*)'];
		$sql3 = "SELECT count(*) FROM conceptnet_assertion WHERE score>2 AND best_frame_id=".$dd;
		$res3 = $DB->once_fetch_array($sql3);
		$comNum3 = $res3['count(*)'];
		echo $a." ".$row['relation_id'].":".$dd." ".$wd.":".$comNum."--".$comNum3."<br>";
		
		}
}
// .按relation统计
if ($action == 'relation') {
	set_time_limit(0);
    $sql = "SELECT * FROM conceptnet_relation order by id";
		$res = $DB->query($sql);
		while ($row = $DB->fetch_array($res)) {
			$wd=$row['name']; 
			$dd=$row['id'];
		$sql2 = "SELECT count(*) FROM conceptnet_assertion WHERE relation_id=".$dd;
		$res2 = $DB->once_fetch_array($sql2);
		$comNum = $res2['count(*)'];
		$sql3 = "SELECT count(*) FROM conceptnet_assertion WHERE score>2 AND relation_id=".$dd;
		$res3 = $DB->once_fetch_array($sql3);
		$comNum3 = $resl3['count(*)'];
		echo $dd." ".$wd.":".$comNum."--".$comNum3."<br>";
		}
}

// concept.
if ($action == '') {
$ltime = time();
if(isset($_GET['del']) )
{
$hhtitle="删除概念";
$eid =intval($_GET['del']);
$DB->query("INSERT INTO oplog (opid,concept,gid,sina_uid,date,loginip) VALUES (
				'4','$eid','$uid','$usersina_id','$ltime','$gip')");
$DB->query("UPDATE conceptnet_concept SET edittime=$ltime,visible=0 WHERE id=".$eid);
}

else if(isset($_GET['res']) )
{
$hhtitle="恢复概念";
$eid =intval($_GET['res']);
$DB->query("INSERT INTO oplog (opid,concept,gid,sina_uid,date,loginip) VALUES (
				'5','$eid','$uid','$usersina_id','$ltime','$gip')");
$DB->query("UPDATE conceptnet_concept SET edittime=$ltime,visible=1 WHERE id=".$eid);
}

else if(isset($_GET['badr']) )
{
$hhtitle="bad";
$rid =intval($_GET['badr']);
$DB->query("INSERT INTO oplog (opid,relation,gid,sina_uid,date,loginip) VALUES (
				'7','$rid','$uid','$usersina_id','$ltime','$gip')");
$DB->query("UPDATE conceptnet_assertion SET edittime=$ltime,bad=bad+1 WHERE id=".$rid);
}
else if(isset($_GET['goodr']) )
{
$hhtitle="good";
$rid =intval($_GET['goodr']);
$DB->query("INSERT INTO oplog (opid,relation,gid,sina_uid,date,loginip) VALUES (
				'6','$rid','$uid','$usersina_id','$ltime','$gip')");
$DB->query("UPDATE conceptnet_assertion SET edittime=$ltime,good=good+1 WHERE id=".$rid);
}
else
$hhtitle="错误";
mMsg($hhtitle.'操作成功！', $turl."?cp=".$eid);
}

function mMsg($msg, $url) {
	echo $msg."<a href='".$url."'>返回</a>";
	exit;
}
