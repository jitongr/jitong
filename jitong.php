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
			 $action='jitong';
include "view/header.php";
?><script type="text/javascript" src="/scan/artDialog/artDialog.js?skin=green"></script>
<script type="text/javascript" src="/scan/artDialog/jquery.artDialog.js"></script>
<script src="/scan/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/content/js/jquery-1.8.2.min.js"></script>
<script src="/content/js/jquery-ui.js"></script> 
<script type="text/javascript"> 
function ed(id){
 art.dialog.open("dd", { 
 follow: document.getElementById('thea'),width: 100, height: 100,
 title:"<?=$value['text']; ?>--" +id});	
	}
</script>

<div id="content">

	<div id="crucify"></div>
<img alt="十字架上的孩子们" src="view/cruboys.jpg" width="819" height="584" align="left" usemap="#boys" />
<map name="boys">
     <area class="text" id="name" shape="rect" coords="182,158,252,312" 
       href="jitong.php?age=11#crucify" target="_self" title="11岁男孩吉童"/>
          <area class="text" id="j5h" shape="rect" coords="114,124,177,188" 
       onclick="ed('j5h')" target="_self" title="11岁男孩吉童的头"/>
            <area class="text" id="name" shape="rect" coords="0,87,39,122" 
       href="jitong.php?age=11&p=righthand#crucify" target="_self" title="11岁男孩吉童的右手"/>
            <area class="text" id="name" shape="rect" coords="339,95,380,123" 
       href="jitong.php?age=11&p=lefthand#crucify" target="_self" title="11岁男孩吉童的左手"/>
            <area class="text" id="name" shape="rect" coords="191,328,240,478" 
       href="jitong.php?age=11&p=legs#crucify" target="_self" title="11岁男孩吉童的双腿"/>
            <area class="text" id="name" shape="rect" coords="189,484,230,530" 
       href="jitong.php?age=11&p=feet#crucify" target="_self" title="11岁男孩吉童的双脚"/>  
     <area class="text" id="name" shape="rect" coords="363,245,432,341" 
       href="jitong.php?age=5#crucify" target="_self" title="5岁幼童桐柯"/>
       <area class="text" id="name" shape="rect" coords="357,167,412,231" 
       href="jitong.php?age=5&p=head#crucify" target="_self" title="5岁幼童桐柯的头"/>
       <area class="text" id="name" shape="rect" coords="253,205,290,234" 
       href="jitong.php?age=5&p=righthand#crucify" target="_self" title="5岁幼童桐柯的右手"/>
       <area class="text" id="name" shape="rect" coords="508,202,544,228" 
       href="jitong.php?age=5&p=lefthand#crucify" target="_self" title="5岁幼童桐柯的左手"/>
       <area class="text" id="name" shape="rect" coords="372,376,433,456" 
       href="jitong.php?age=5&p=legs#crucify" target="_self" title="5岁幼童桐柯的双腿"/>
       <area class="text" id="name" shape="rect" coords="388,469,428,501" 
       href="jitong.php?age=5&p=feet#crucify" target="_self" title="5岁幼童桐柯的双脚"/>
     <area class="text" id="name" shape="rect" coords="546,158,657,303" 
       href="jitong.php?age=17#crucify" target="_self" title="17岁男孩玉林"/>
       <area class="text" id="name" shape="rect" coords="579,71,637,155" 
       href="jitong.php?age=17&p=head#crucify" target="_self" title="17岁男孩玉林的头"/>
       <area class="text" id="name" shape="rect" coords="381,3,423,47" 
       href="jitong.php?age=17&p=righthand#crucify" target="_self" title="17岁男孩玉林的右手"/>
       <area class="text" id="name" shape="rect" coords="768,23,811,63" 
       href="jitong.php?age=17&p=lefthand#crucify" target="_self" title="17岁男孩玉林的左手"/>
       <area class="text" id="name" shape="rect" coords="567,325,640,498" 
       href="jitong.php?age=17&p=legs#crucify" target="_self" title="17岁男孩玉林的双腿"/>
       <area class="text" id="name" shape="rect" coords="594,509,626,557" 
       href="jitong.php?age=17&p=feet#crucify" target="_self" title="17岁男孩玉林的双脚"/>
</map>

<DIV style="MARGIN: 10px auto; BACKGROUND:url(yun.jpg); HEIGHT: 584px;;" >
 <div id='thea' style="position:absolute;top:300px;left:20px;width:160px;">11岁男孩吉童十字架上的幼童 孩子 祭童 苦难 童贞 吊打 钉十字架
献祭 墨西哥 古印加

鞭打 捆绑 吊起来打 三天三夜  小奴隶 活埋 幼童尸骨
祭童 继童 吉童 妓童 祭女 妓女 
赤身裸体 钉十字架 
撒旦 
祭童园
将受苦受难的孩童的照片、受刑图，尸体图片摆到祭坛上，祭祀
为每个孩童建立坟墓，十字架，苦像。记事
占卜 抽签 点灯  分苦  观想  打坐  鼓励 帮助 念咒   
吃喝拉撒 上学 考试 工作 成家 老死 
科研  长生不老 机器人  自我复制 生命 宇宙 
性爱机器人 幼童机器人
通神  天眼  童身  成道  算命  风水
</div>
  <div id='theb' style="position:absolute;top:360px;left:280px;width:80px;">5岁幼童桐柯
   通灵 犹太难童 大屠杀 像自由一样美丽 灵修 灵性 成道 解脱 自由意志 直接与上帝建立联系 天使 灵性导师 亚伯拉罕的子民 </div>
   <div id='thec' style="position:absolute;top:380px;left:450px;width:120px;">幼童受难<br>赞美 – 怜悯 –发愿救助 破迷 鼓励  反抗 赞美 快乐 受刑 痛苦 
刻苦 勤奋 好学 -》痛苦  快乐
三祭童图 四祭童图 童图 刑图
</div>
   <div id='thed' style="position:absolute;top:280px;left:680px;width:140px;">17岁男孩救赎 |耶稣 圣人 修女 使命 圣痕  接受 赞美  
|孩童无辜受苦受难 被活埋 陪葬 命苦 可怜 痛心  接受 反抗 程度接受 赞美 鼓励 帮助 
|被做祭童 献祭   可怜 主动 接受 赞美献身(愿意) -反抗-：命苦 愚昧（被迫被骗）
|被奴役被压榨的反抗残忍受害而死  赞美
|为信仰 为正义和平而献身  赞美 
|小过错而遭受极刑   惋惜 痛心 可怜 
|罪犯受刑   果报 惋惜罪人 因果不虚
|勤奋刻苦学习 成材 成大事业 赞美
|辛勤劳作  创造生活 赞美
|好逸恶劳  唾弃
|虐恋 灵修 观想 
</div>   
 <div style="clear:both"></div>
<?
include "view/footer.php";
?>