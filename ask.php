<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
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
if(isset($_GET['u'])){
    for ($i = 0; $i < 41000; $i++) {
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
 $k= chr(rand(161,215)).chr(rand(161,249));
 echo iconv('GBK', 'UTF-8', $k);
?></html>