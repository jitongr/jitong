<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once '../init.php';
echo "building...";
$imgid=isset($_GET['img'])?intval($_GET['img']):'';
echo $imgid;
if(isset($_GET['scanff'])){
	set_time_limit(0);
	$bpath=($_GET['bpath']);
	$dir=EMLOG_ROOT;
	if(empty($bpath)){
		echo 'bpath ?';
		$bpath="/t u/e es";
	}
	$id=1;
	echo '<b>'.$dir.$bpath.":</b><br>";
	if(is_dir($dir.$bpath)){
		if($dh=opendir($dir.$bpath)){
			while(($file=readdir($dh))!==false){
				if($file!="."&&$file!=".."){
					$ni++;
					$path=$dir.$bpath."/".$file;
					$path2=addslashes(substr($path,2));
					$fz=filesize($path);
					if($fz===false)
						echo 'err';
					$size=@getimagesize($path);
					$ext=pathinfo($file,PATHINFO_EXTENSION);
					$mtime=date('Y-m-d H:i:s',filemtime($path));
					// $ctime=date('Y-m-d H:i:s',filectime($path));
					$file2=mb_convert_encoding($file,"utf8","gbk");
					echo $file2;
					if((is_dir($path))){
						echo ' is sub.';
					}else{
						$nn="";
						// echo $ext;
						if(preg_match("/[\x7f-\xff]/",$file2)){
							$nn=str_replace("图片","",$file2);
							 $nn=str_replace("截图","",$nn);
							 $nn=str_replace(" ","",$nn);
							if(preg_match("/[\x7f-\xff]/",$nn)){
								$msg=preg_replace("/[\x7f-\xff]/","",$nn);
								$sql2="SELECT max(id)+1 as a  FROM jt_concept   ";
								$row2=$DB->once_fetch_array($sql2);
								$nfme="z".$row2['a'].$msg;
								//$nfme="z".$id.$msg;
							}else
								$nfme=$nn;
							echo "*";
							echo $nfme;
							
							$nmm=$bpath."/".$nfme;
							rename($path,$dir.$nmm);
						}else{
							$nnt=str_replace(" ","",$file,$n1);
							if($n1>1){
								$nn=$file;
							} 
							if($n1>0){
								echo "#";echo $nnt;
							rename($path,$dir.$bpath."/".$nnt);
							 
							}							
							$nmm=$bpath."/".$nnt;
						}
						$ltime=time();
						$nmm=addslashes($nmm);
						$sql2d="SELECT id  FROM jt_concept where img like '$nmm'";
						$row2d=$DB->once_fetch_array($sql2d);
						if($row2d['id']){
						//	$ddde="update jt_concept set filesize='$fz',otime='$mtime',
//	ow='{$size[0]}',oh='{$size[1]}' where id=".$row2d['id'];
							echo "【u】";
							echo $id.' ';
							$id++;
						//	$DB->query($ddde);
						}else{
							$ddde="INSERT INTO jt_concept (text,img,edittime,filesize,otime,content,ow,oh) VALUES ('".addslashes(substr($nn,0,-4))."','$nmm',$ltime,'$fz','$mtime','".addslashes($nn)."','{$size[0]}','{$size[1]}' )";
						//	 echo $ddde;
							 
							$DB->query($ddde);
							echo $id.' ';
						$id++;
						}
						// echo crtallimgs($mtime,0,$file,$fz,'..'.$bpath.'/'.$file);
					}
					echo '<br>';
				}
			}
		}else
			echo 'no opendir';
	}else
		echo 'not dir';
}

if(isset($_GET['read'])){
	$handle=@fopen("lib/names_girls_double.txt","r");
	
	while(!feof($handle)){
		$buffer=fgets($handle,96);
		echo $buffer;
		$sql2d="SELECT id  FROM jt_childname where name like '$buffer'";
		$row2d=$DB->once_fetch_array($sql2d);
		if($row2d['id']){
			$ddde="update jt_childname set girl=1,sm=2  where id=".$row2d['id'];
			echo "【u】";
			$DB->query($ddde);
		}else{
			$ddde="INSERT INTO jt_childname (sm,girl,name) VALUES (1,1,'$buffer' )";
			$DB->query($ddde);
		}
	}
}