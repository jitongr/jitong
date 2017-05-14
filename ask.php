<?php
require_once 'init.php';

define ('TEMPLATE_PATH', EMLOG_ROOT . '/view/');
$DB = MySql::getInstance();
$concepts=array();
$atitle="";
$gip=getIp();   
$uid=UID;
$seid=session_id();
$vsid=intval($_SESSION['views']);
 $action='ask';
function unicode_decode($name) {
     
    // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
    $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
    preg_match_all($pattern, $name, $matches);
    if (!empty($matches)) {
        $name = '';
        for ($j = 0; $j < count($matches[0]); $j++) {
            $str = $matches[0][$j];
            if (strpos($str, '\\u') === 0) {
                $code = base_convert(substr($str, 2, 2), 16, 10);
                $code2 = base_convert(substr($str, 4), 16, 10);
                $c = chr($code) . chr($code2);
                $c = iconv('UCS-2', 'UTF-8', $c);
                $name.= $c;
            } else {
                $name.= $str;
            }
        }
    }
    return $name;
}
if(isset($_GET['imgck'])){
	header("Content-type: image/png");
$im = imagecreatetruecolor(512, 512)
or die("Cannot Initialize new GD image stream");
$white = imagecolorallocate($im, 255, 255, 255);
for ($y=0; $y<512; $y++) {
for ($x=0; $x<512; $x++) {
if (rand(0,1) === 1) {
imagesetpixel($im, $x, $y, $white);
}
}
}
imagepng($im);
imagedestroy($im);
exit;
}
if(isset($_GET['imgck2'])){
	header("Content-type: image/png");
$im = imagecreatetruecolor(512, 512)
or die("Cannot Initialize new GD image stream");
$white = imagecolorallocate($im, 255, 255, 255);
for ($y=0; $y<512; $y++) {
for ($x=0; $x<512; $x++) {
if (mt_rand(0,1) === 1) {
imagesetpixel($im, $x, $y, $white);
}
}
}
imagepng($im);
imagedestroy($im);
exit;
}
if(isset($_GET['u'])){
    for ($i = 0; $i < 41000; $i++) {
       // $str.= "\\u" . dechex(rand(19968, 40895));
	   if($i%1000==0)echo "<br>".$i;
		echo unicode_decode("\\u".dechex($i));
    }
}
if(isset($_GET['uu'])){
    for ($i = 41000; $i < 65000; $i++) {
       // $str.= "\\u" . dechex(rand(19968, 40895));
	   if($i%1000==0)echo "<br>".$i;
		echo unicode_decode("\\u".dechex($i));
    }
}
if(isset($_GET['c'])){	
	   $str = "";
    for ($i = 0; $i < 100; $i++) {
        $str.= "\\u" . dechex(rand(19968, 40895));
    }
   echo unicode_decode($str);
}

	$sql = "SELECT sort,count(1) as a FROM  jt_concept group by sort ";

	include View::getView('header');
    $res = $DB->query($sql);
	while ($row = $DB->fetch_array($res)) {
		 $p[$row['sort']]=$row['a'];
			}  
 if(isset($_GET['s'])){
$s=intval($_GET['s']);
	$sql = "SELECT * FROM jt_concept ";
if($s>-1)
 $sql .=' where sort='.$s;
 $sql .=" order by rand() limit 1";
	$val=$DB->once_fetch_array($sql);
 }
	include View::getView('ask');
	include View::getView('footer');
	View::output();