<?php
require_once 'init.php';
$DB=MySql::getInstance();
	        $cage=intval($_GET['age']);
			$cage+=47;
			$cap=($_GET['p']);
			if($cap=="head")
				$cage+=1;
			if($cap=="lefthand")
				$cage+=2;
			if($cap=="righthand")
				$cage+=3;
			if($cap=="legs")
				$cage+=4;
			if($cap=="feet")
				$cage+=5;
			$_SESSION['onm']=0;
			$res3="select * from emlog_blog where gid=$cage ";
			$valuz=$DB->once_fetch_array($res3);
			 $action='jitong';
include "view/header.php";
?>

<div id="content">

	<div id="crucify"></div>
<img alt="十字架上的孩子们" src="view/cruboys.jpg" width="819" height="584" align="left" usemap="#boys" />
<map name="boys">
     <area class="text" id="name" shape="rect" coords="182,158,252,312" 
       href="jitong.php?age=11#crucify" target="_self" title="11岁男孩-吉童"/>
          <area class="text" id="name" shape="rect" coords="114,124,177,188" 
       href="jitong.php?age=11&p=head#crucify" target="_self" title="11岁男孩-吉童的头"/>
            <area class="text" id="name" shape="rect" coords="0,87,39,122" 
       href="jitong.php?age=11&p=righthand#crucify" target="_self" title="11岁男孩-吉童的右手"/>
            <area class="text" id="name" shape="rect" coords="339,95,380,123" 
       href="jitong.php?age=11&p=lefthand#crucify" target="_self" title="11岁男孩-吉童的左手"/>
            <area class="text" id="name" shape="rect" coords="191,328,240,478" 
       href="jitong.php?age=11&p=legs#crucify" target="_self" title="11岁男孩-吉童的双腿"/>
            <area class="text" id="name" shape="rect" coords="189,484,230,530" 
       href="jitong.php?age=11&p=feet#crucify" target="_self" title="11岁男孩-吉童的双脚"/>  
     <area class="text" id="name" shape="rect" coords="363,245,432,341" 
       href="jitong.php?age=5#crucify" target="_self" title="5岁幼童-桐柯"/>
       <area class="text" id="name" shape="rect" coords="357,167,412,231" 
       href="jitong.php?age=5&p=head#crucify" target="_self" title="5岁幼童-桐柯的头"/>
       <area class="text" id="name" shape="rect" coords="253,205,290,234" 
       href="jitong.php?age=5&p=righthand#crucify" target="_self" title="5岁幼童-桐柯的右手"/>
       <area class="text" id="name" shape="rect" coords="508,202,544,228" 
       href="jitong.php?age=5&p=lefthand#crucify" target="_self" title="5岁幼童-桐柯的左手"/>
       <area class="text" id="name" shape="rect" coords="372,376,433,456" 
       href="jitong.php?age=5&p=legs#crucify" target="_self" title="5岁幼童-桐柯的双腿"/>
       <area class="text" id="name" shape="rect" coords="388,469,428,501" 
       href="jitong.php?age=5&p=feet#crucify" target="_self" title="5岁幼童-桐柯的双脚"/>
     <area class="text" id="name" shape="rect" coords="546,158,657,303" 
       href="jitong.php?age=17#crucify" target="_self" title="17岁的男孩-钰林"/>
       <area class="text" id="name" shape="rect" coords="579,71,637,155" 
       href="jitong.php?age=17&p=head#crucify" target="_self" title="17岁的男孩-钰林的头"/>
       <area class="text" id="name" shape="rect" coords="381,3,423,47" 
       href="jitong.php?age=17&p=righthand#crucify" target="_self" title="17岁的男孩-钰林的右手"/>
       <area class="text" id="name" shape="rect" coords="768,23,811,63" 
       href="jitong.php?age=17&p=lefthand#crucify" target="_self" title="17岁的男孩-钰林的左手"/>
       <area class="text" id="name" shape="rect" coords="567,325,640,498" 
       href="jitong.php?age=17&p=legs#crucify" target="_self" title="17岁的男孩-钰林的双腿"/>
       <area class="text" id="name" shape="rect" coords="594,509,626,557" 
       href="jitong.php?age=17&p=feet#crucify" target="_self" title="17岁的男孩-钰林的双脚"/>
</map>

<DIV style="MARGIN: 10px auto; BACKGROUND:url(yun.jpg); HEIGHT: 584px;;" >
<br><br><h2><a href="?post=<?php echo $valuz['gid']; ?>"><?php echo $valuz['title']; ?></a></h2>
<?php echo $valuz['content']; ?></DIV>
<?
include "view/footer.php";
?>