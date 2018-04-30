<?php
require_once 'init.php';

define('TEMPLATE_PATH',EMLOG_ROOT.'/view/');
$DB=MySql::getInstance();

$atitle="";
$gip=getIp();
$uid=UID;
$seid=session_id();
$vsid=intval($_SESSION['views']);
$ltime=date('Y-m-d H:i:s');
$action='ask';
function unicode_decode($name){
	
	// 转换编码，将Unicode编码转换成可以浏览的utf-8编码
	$pattern='/([\w]+)|(\\\u([\w]{4}))/i';
	preg_match_all($pattern,$name,$matches);
	if(!empty($matches)){
		$name='';
		for($j=0;$j<count($matches[0]);$j++){
			$str=$matches[0][$j];
			if(strpos($str,'\\u')===0){
				$code=base_convert(substr($str,2,2),16,10);
				$code2=base_convert(substr($str,4),16,10);
				$c=chr($code).chr($code2);
				$c=iconv('UCS-2','UTF-8',$c);
				$name.=$c;
			}else{
				$name.=$str;
			}
		}
	}
	return $name;
}
if(isset($_GET['imgck'])){
	header("Content-type: image/png");
	$im=imagecreatetruecolor(512,512) or die("Cannot Initialize new GD image stream");
	$white=imagecolorallocate($im,255,255,255);
	for($y=0;$y<512;$y++){
		for($x=0;$x<512;$x++){
			if(rand(0,1)===1){
				imagesetpixel($im,$x,$y,$white);
			}
		}
	}
	imagepng($im);
	imagedestroy($im);
	exit();
}
if(isset($_GET['imgck2'])){
	header("Content-type: image/png");
	$im=imagecreatetruecolor(512,512) or die("Cannot Initialize new GD image stream");
	$white=imagecolorallocate($im,255,255,255);
	for($y=0;$y<512;$y++){
		for($x=0;$x<512;$x++){
			if(mt_rand(0,1)===1){
				imagesetpixel($im,$x,$y,$white);
			}
		}
	}
	imagepng($im);
	imagedestroy($im);
	exit();
}
if(isset($_GET['u'])){
	for($i=0;$i<41000;$i++){
		// $str.= "\\u" . dechex(rand(19968, 40895));
		if($i%1000==0)
			echo "<br>".$i;
		echo unicode_decode("\\u".dechex($i));
	}
	exit();
}
if(isset($_GET['uu'])){
	for($i=41000;$i<65000;$i++){
		// $str.= "\\u" . dechex(rand(19968, 40895));
		if($i%1000==0)
			echo "<br>".$i;
		echo unicode_decode("\\u".dechex($i));
	}
	exit();
}

$sql="SELECT sort,count(1) as a FROM  jt_concept group by sort ";

include View::getView('header');
$res=$DB->query($sql);
while($row=$DB->fetch_array($res)){
	$p[$row['sort']]=$row['a'];
}
$CACHE=Cache::getInstance();
$sorts=$CACHE->readCache('sort');
//print_r($sorts);
if(isset($_GET['a'])){
	$a=$_GET['a'];
	if(empty($_SESSION['cezied'])||isset($_POST['redo'])){
		if($a=='cz1'){
			
			$thezi=getzi().getzi();
		}
		if($a=='cz2'){
			$thezi=getzis().getzis().getzi();
		}
		if($a=='cz3'){
			$str="";
			for($i=0;$i<2;$i++){
				$str.="\\u".dechex(rand(19968,40895));
			}
			$thezi=unicode_decode($str);
		}
		
		$rgood=rand(0,1000)/4.0;
		$da=addslashes($_POST['rep']);
		$DB->query("INSERT INTO jt_asklog (mthd,oid,cid,good,viewid,content,uid,seid,ctime,ip,rep) VALUES (
	'$a',0,0,'$rgood','$vsid','$thezi','$uid','$seid','$ltime', '$gip','$da')");
		$_SESSION['cezied']=$thezi;
		$_SESSION['cezigd']=$rgood;
	}else{
		$thezi=$_SESSION['cezied'];
		$rgood=$_SESSION['cezigd'];
	}
}
$s=intval($_GET['s']);
if(isset($_GET['s'])){
	
	$sql="SELECT * FROM jt_concept ";
	if(empty($_SESSION['asked'])||isset($_POST['redo'])){
		
	
		if($s>-1)
			$sql.=' where sort='.$s;
		if($s!=199){
            if($s<0)$sql.=' where ';else $sql.=' and ';
			$sql.=' sort!=199';
		}
		$sql.=" order by rand() limit 1";
		$value=$DB->once_fetch_array($sql);
		$rec=$value['id'].' '.$value['text'];
		$cid=$value['id'];
		$good=rand(0,1000)/4.0;
		$da=addslashes($_POST['rep']);
		$DB->query("INSERT INTO jt_asklog (mthd,oid,cid,good,viewid,content,uid,seid,ctime,ip,rep) VALUES (
	'ask','$s','$cid','$good','$vsid','$rec','$uid','$seid','$ltime', '$gip','$da')");
		$_SESSION['asked']=$cid;
		$_SESSION['askedgd']=$good;
	}else{
		$sql.="where id=".$_SESSION['asked'];
		$value=$DB->once_fetch_array($sql);
	}
}
if(isset($_GET['list'])){
	
	if($s){
		$sqladd="and s =$s ";
	}
	$sql2="SELECT count(1) as a  FROM jt_asklog where 1 $sqladd ";
	$row2=$DB->once_fetch_array($sql2);
	
	$index_lognum=20;
	$page=isset($_GET['page'])?abs(intval($_GET['page'])):1;
	$start=($page-1)*$index_lognum;
	
	$sql22="SELECT * FROM jt_asklog where 1 $sqladd  order by id desc limit   $start,$index_lognum";
	$query=$DB->query($sql22);
	$page_url=pagination($row2['a'],$index_lognum,$page,"?list&s={$s}&page=");
	
	include View::getView('asklog');
}else
	include View::getView('ask');
include View::getView('footer');
View::output();