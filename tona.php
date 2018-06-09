<?php
require_once 'init.php';
$action='tona';
include "view/header.php";
echo "Now gent is :<br>";
$gip=getIp();
$uid=UID;

$energy=10;
for($i=4;$i<85;$i++){
	
	// rnd=rand();
	// sprintf(b,"%ld",rnd);
	// $text .=b;
	// $text .=": ";
	// $text .=" \r\n";
	$text="When I was ";
	
	// Who lead me"
	if($i<5)
		$text=$text." little";
	else
		$text=$text.$i;
	$text=$text." , under ";
	
	switch(rand(0,27)%13){
		case 1:
			$text=$text."self";
			$energy+=3;
			break;
		case 2:
			$text=$text."strong murders";
			$energy-=2;
			break;
		case 3:
			$text=$text."my parents";
			break;
		case 4:
			$text=$text."my brothers";
			break;
		case 5:
			$text=$text."my followers";
			break;
		case 6:
			$text=$text."my children";
			break;
		case 7:
			$text=$text."my preexistence";
			break;
		case 8:
			$text=$text."evil";
			$energy-=3;
			break;
		case 9:
			$text=$text."angel";
			$energy+=2;
			break;
		case 10:
			$text=$text."god";
			$energy-=2;
			break;
		case 11:
			$text=$text."my guarder";
			$energy+=1;
			break;
		case 12:
			$text=$text."revenant";
			break;
		case 0:
			$text=$text."the child's karma";
	}
	
	// Which Child?""
	$text=$text."'s arrange, I and a ";
	$ttr=rand(0,100)%40;
	switch($ttr){
		case 1:
			$text=$text."little boy";
			break;
		case 2:
			$text=$text."little girl";
			break;
		case 3:
			$text=$text."boy age 6";
			break;
		case 4:
			$text=$text."girl age 6";
			break;
		case 5:
			$text=$text."boy age 7";
			break;
		case 6:
			$text=$text."girl age 7";
			break;
		case 7:
			$text=$text."boy age 8";
			break;
		case 8:
			$text=$text."girl age 8";
			break;
		case 9:
			$text=$text."boy age 9";
			break;
		case 10:
			$text=$text."girl age 9";
			break;
		case 11:
			$text=$text."boy age 10";
			break;
		case 12:
			$text=$text."girl age 10";
			break;
		case 13:
			$text=$text."boy age 11";
			break;
		case 14:
			$text=$text."girl age 11";
			break;
		case 15:
			$text=$text."boy age 12";
			break;
		case 16:
			$text=$text."girl age 12";
			break;
		case 17:
			$text=$text."boy age 13";
			break;
		case 18:
			$text=$text."girl age 13";
			break;
		case 19:
			$text=$text."younth age 16";
			$he=16;
			break;
		case 20:
			$text=$text."girl age 16";
			$he=16;
			break;
		case 21:
			$text=$text."younth age 18";
			$he=18;
			break;
		case 22:
			$text=$text."girl age 18";
			$he=18;
			break;
		case 23:
			$text=$text."younth age 21";
			$he=21;
			break;
		case 24:
			$text=$text."girl age 21";
			$he=21;
			break;
		case 25:
			$text=$text."younth age 23";
			$he=23;
			break;
		case 26:
			$text=$text."girl age 23";
			$he=23;
			break;
		case 27:
			$text=$text."younth age 26";
			$he=26;
			break;
		case 28:
			$text=$text."lady age 26";
			$he=26;
			break;
		case 29:
			$text=$text."man age 34";
			$he=34;
			break;
		case 30:
			$text=$text."lady age 34";
			$he=34;
			break;
		case 31:
			$text=$text."man age 40";
			$he=40;
			break;
		case 32:
			$text=$text."lady age 40";
			$he=40;
			break;
		case 33:
			$text=$text."man age 50";
			$he=50;
			break;
		case 34:
			$text=$text."lady age 50";
			$he=50;
			break;
		case 35:
			$text=$text."n old man age 60";
			$he=60;
			break;
		case 36:
			$text=$text."n old lady age 60";
			$he=60;
			break;
		case 37:
			$text=$text."n old man age 70";
			$he=70;
			break;
		case 38:
			$text=$text."n old lady age 70";
			$he=70;
			break;
		case 39:
			$text=$text."dying man age 80";
			$he=80;
			break;
		case 0:
			$text=$text."dying lady age 80";
			$he=80;
	}
	if($ttr<19)
		$he=$ttr/2+4;
	if($i<$he)
		$energy+=1;
	if($i<$he+5)
		$energy+=1;
	if($i<$he+10)
		$energy+=2;
	if($i>$he+10)
		$energy-=2;
	
	$text=$text." was punished, we was ";
	switch(rand(0,10)%5){
		case 1:
			$text=$text."nude ";
			$energy+=1;
			break;
		case 2:
			$text=$text."nack trunk ";
			break;
		case 3:
			$text=$text."dress in poor ";
			break;
		case 4:
			$text=$text."mark in label ";
			break;
		case 0:
			$text=$text."nacked ";
	}
	switch(rand(0,30)%14){
		case 1:
			$text=$text."hands hang";
			break;
		case 2:
			$text=$text."tie hands back";
			break;
		case 3:
			$text=$text."spread limb";
			break;
		case 4:
			$text=$text."lay on dirty";
			$energy+=1;
			break;
		case 5:
			$text=$text."tie limb firmly";
			break;
		case 6:
			$text=$text."fasted spread to tree";
			break;
		case 7:
			$text=$text."tie spread on ground";
			break;
		case 8:
			$text=$text."genuflect";
			$energy+=2;
			break;
		case 9:
			$text=$text."foot hang";
			$energy-=1;
			break;
		case 10:
			$text=$text."bind body together";
			break;
		case 11:
			$text=$text."hang hand 3 days";
			$energy-=2;
			break;
		case 12:
			$text=$text."torture";
			break;
		case 13:
			$text=$text."pillory 3 days";
			break;
		case 14:
			$text=$text."tie to cross";
			$energy-=1;
			
			break;
		case 0:
			$text=$text."drowm";
			$energy-=3;
	}
	$text=$text." and ";
	// what part pain
	switch(rand(0,60)%15){
		case 1:
			$text=$text."beat body";
			break;
		case 2:
			$text=$text."beat back";
			$energy-=1;
			break;
		case 3:
			$text=$text."destroy face";
			$energy-=1;
			break;
		case 4:
			$text=$text."destroy hand";
			$energy-=1;
			break;
		case 5:
			$text=$text."beat arse";
			break;
		case 6:
			$text=$text."broil body";
			$energy-=1;
			break;
		case 7:
			$text=$text."torture";
			$energy-=1;
			break;
		case 8:
			$text=$text."destroy foot";
			$energy-=1;
			break;
		case 9:
			$text=$text."crucified on cross";
			$energy-=3;
			break;
		case 10:
			$text=$text."whip public";
			$energy-=1;
			break;
		case 11:
			$text=$text."lash to die";
			$energy-=2;
			break;
		case 12:
			$text=$text."lash";
			$energy-=1;
			break;
		case 13:
			$text=$text."hang public";
			$energy-=2;
			break;
		case 14:
			$text=$text."lash body two side";
			$energy-=1;
			break;
		case 0:
			$text=$text."bury alive";
			$energy-=2;
	}
	
	$text=$text." at ";
	
	// W$here suffer
	
	switch(rand(0,20)%17){
		case 1:
			$text=$text."forest";
			break;
		case 2:
			$text=$text."home";
			break;
		case 3:
			$text=$text."execution ground";
			break;
		case 4:
			$text=$text."street";
			break;
		case 5:
			$text=$text."adytum";
			break;
		case 6:
			$text=$text."bathroom";
			break;
		case 7:
			$text=$text."stone hill";
			break;
		case 8:
			$text=$text."school playground";
			$energy-=1;
			break;
		case 9:
			$text=$text."mortuary";
			break;
		case 10:
			$text=$text."kindergarten";
			$energy-=2;
			break;
		case 11:
			$text=$text."riverain";
			break;
		case 12:
			$text=$text."seashore";
			break;
		case 13:
			$text=$text."island";
			break;
		case 14:
			$text=$text."graveyard";
			$energy+=1;
			break;
		case 15:
			$text=$text."church yard";
			$energy+=1;
			break;
		case 16:
			$text=$text."temple yard";
			$energy+=2;
			break;
		case 0:
			$text=$text."fire place";
	}
	
	$text=$text." surround by ";
	// Who surround me"
	switch(rand(0,29)%14){
		case 1:
			$text=$text."many children singers";
			$energy+=1;
			break;
		case 2:
			$text=$text."our loved child";
			break;
		case 3:
			$text=$text."a angry revenger";
			break;
		case 4:
			$text=$text."many little lives";
			break;
		case 5:
			$text=$text."revelry laugher";
			$energy-=1;
			break;
		case 6:
			$text=$text."child he has baited";
			break;
		case 7:
			$text=$text."strong murder";
			$energy-=2;
			break;
		case 8:
			$text=$text."evil";
			$energy-=2;
			break;
		case 9:
			$text=$text."our parents";
			break;
		case 10:
			$text=$text."angels";
			$energy+=2;
			break;
		case 11:
			$text=$text."preexistence revenant";
			break;
		case 12:
			$text=$text."friends";
			break;
		case 13:
			$text=$text."revenant";
			break;
		case 0:
			$text=$text."suffer same";
	}
	$text=$text." and I ";
	
	// What part pain"
	switch(rand(0,30)%10){
		case 1:
			$text=$text."die quickly";
			$energy-=15;
			break;
		case 2:
			$text=$text."was hurt";
			$energy-=1;
			break;
		case 3:
			$text=$text."was rescue";
			$energy+=1;
			break;
		case 4:
			$text=$text."was badly hurt";
			break;
		case 5:
			$text=$text."become weaker";
			break;
		case 6:
			$text=$text."suffer a long time to die";
			$energy-=12;
			break;
		case 7:
			$text=$text."suffer a long time but stand up";
			break;
		case 8:
			$text=$text."stand up";
			break;
		case 9:
			$text=$text."become stanch love in god";
			$energy+=3;
			break;
		case 0:
			$text=$text."become godliness";
			$energy+=5;
	}
	
	$text=$text." and he ";
	switch(rand(0,30)%10){
		case 1:
			$text=$text."die quickly to love god";
			$energy-=1;
			break;
		case 2:
			$text=$text."was hurt";
			break;
		case 3:
			$text=$text."was rescue";
			break;
		case 4:
			$text=$text."was badly hurt";
			break;
		case 5:
			$text=$text."become weaker";
			break;
		case 6:
			$text=$text."suffer a long time to die";
			$energy-=1;
			break;
		case 7:
			$text=$text."suffer a long time but stand up";
			break;
		case 8:
			$text=$text."stand up";
			break;
		case 9:
			$text=$text."become stanch";
			$energy+=1;
			break;
		case 0:
			$text=$text."become godliness";
			$energy+=3;
	}
	
	echo $text.'.<br>';
	$rtime=date('Y-m-d H:i:s');
	$DB->query("INSERT INTO jt_tonalog (age,viewid,edate,uid,content,ip,seid) VALUES (
				$i,'".$_SESSION['views']."','$rtime','$uid','".addslashes($text)."','$gip','".session_id()."')");
	if($energy<0)
		break;
}


include "view/footer.php";