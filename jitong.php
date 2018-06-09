<?php
 $action='jitong'; $savlog=1;
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
			
include "view/header.php";
?>
<div id="content">

	<div id="crucify"></div>
<img alt="十字架上的孩子们" src="view/cruboys.jpg" width="819" height="584" align="left" usemap="#boys" />
<map name="boys">
     <area class="text"  shape="rect" coords="182,158,252,312" 
       href="?age=11#crucify" target="_self" title="11岁男孩吉童"/>
          <area class="text" shape="rect" coords="114,124,177,188" 
       href="?age=11&p=head#crucify" target="_self" title="11岁男孩吉童的头"/>
            <area class="text"  shape="rect" coords="0,87,39,122" 
       href="?age=11&p=righthand#crucify" target="_self" title="11岁男孩吉童的右手"/>
            <area class="text"  shape="rect" coords="339,95,380,123" 
       href="?age=11&p=lefthand#crucify" target="_self" title="11岁男孩吉童的左手"/>
            <area class="text"  shape="rect" coords="191,328,240,478" 
       href="?age=11&p=legs#crucify" target="_self" title="11岁男孩吉童的双腿"/>
            <area class="text"  shape="rect" coords="189,484,230,530" 
       href="?age=11&p=feet#crucify" target="_self" title="11岁男孩吉童的双脚"/>  
     <area class="text"  shape="rect" coords="363,245,432,341" 
       href="?age=5#crucify" target="_self" title="5岁幼童桐柯"/>
       <area class="text"  shape="rect" coords="357,167,412,231" 
       href="?age=5&p=head#crucify" target="_self" title="5岁幼童桐柯的头"/>
       <area class="text"  shape="rect" coords="253,205,290,234" 
       href="?age=5&p=righthand#crucify" target="_self" title="5岁幼童桐柯的右手"/>
       <area class="text"  shape="rect" coords="508,202,544,228" 
       href="?age=5&p=lefthand#crucify" target="_self" title="5岁幼童桐柯的左手"/>
       <area class="text"  shape="rect" coords="372,376,433,456" 
       href="?age=5&p=legs#crucify" target="_self" title="5岁幼童桐柯的双腿"/>
       <area class="text"  shape="rect" coords="388,469,428,501" 
       href="?age=5&p=feet#crucify" target="_self" title="5岁幼童桐柯的双脚"/>
     <area class="text"  shape="rect" coords="546,158,657,303" 
       href="?age=17#crucify" target="_self" title="17岁男孩玉林"/>
       <area class="text"  shape="rect" coords="579,71,637,155" 
       href="?age=17&p=head#crucify" target="_self" title="17岁男孩玉林的头"/>
       <area class="text"  shape="rect" coords="381,3,423,47" 
       href="?age=17&p=righthand#crucify" target="_self" title="17岁男孩玉林的右手"/>
       <area class="text"  shape="rect" coords="768,23,811,63" 
       href="?age=17&p=lefthand#crucify" target="_self" title="17岁男孩玉林的左手"/>
       <area class="text"  shape="rect" coords="567,325,640,498" 
       href="?age=17&p=legs#crucify" target="_self" title="17岁男孩玉林的双腿"/>
       <area class="text"  shape="rect" coords="594,509,626,557" 
       href="?age=17&p=feet#crucify" target="_self" title="17岁男孩玉林的双脚"/>
</map>

<DIV style="MARGIN: 10px auto; BACKGROUND:url(yun.jpg); HEIGHT: 584px;;" >
 <div id='thea' style="position:absolute;top:230px;left:20px;width:160px;">
观想:<br>11岁男孩吉童<br>十字架上的幼童<br>孩子 祭童 苦难 童贞 吊打 受刑 
献祭 墨西哥 古印加 鞭打 捆绑 吊起来打 三天三夜 小奴隶 活埋 幼童尸骨
赤身裸体 钉十字架 <br>
祭童园:
将受苦受难的孩童的照片.受刑图.尸体图片摆到祭坛上.祭祀;
为每个孩童建立坟墓.十字架.苦像.记事
<br>离外道:占卜 抽签 算命  风水 点灯 念咒 观想 打坐 通神 天眼 灵修 通灵 解脱 成道 撒旦 灵性导师 <br>
人生苦:吃喝拉撒 上学 考试 工作 成家 失恋 家事 老死 痛苦 
科研 长生不老 机器人 自我复制 
性爱机器人 幼童机器人 像自由一样美丽  自由意志  天使 
 
</div>
  <div id='theb' style="position:absolute;top:360px;left:280px;width:80px;">5岁幼童桐柯<br>
  祭童 吉童 继童 寄童 技童 记童 机童 计童 己童 季童 级童 激童 积童 迹童 忌童 冀童 饥童 疾童 肌童 霁童 悸童 济童 集童 急童  基童  姬童 击童 剂童 纪童 籍童 际童 鸡童 乩童 妓童 祭女 妓女 
   </div>
   <div id='thec' style="position:absolute;top:330px;left:450px;width:120px;">近道<br> 生命 宇宙 幼童受难 怜悯 –发愿救助 破迷 鼓励 帮助 反抗 赞美 快乐  
刻苦 勤奋 好学 快乐 直接与上帝建立联系 犹太难童 大屠杀 亚伯拉罕的子民 <br>
【天主】接受救赎 认罪 信天主 爱耶稣 祈祷 学圣人 圣女 殉道圣童 圣痕 接受.赞美.感谢天主 祭献自己给天主  托付自己.全家.子女给天主
</div>
   <div id='thed' style="position:absolute;top:280px;left:680px;width:140px;">
 17岁男孩<br>
|孩童无辜受苦受难 被活埋 陪葬 命苦 可怜 痛心 接受 反抗 程度接受 赞美 鼓励 帮助 
|被奴役被压榨的反抗残忍受害而死  赞美
|被做祭童 献祭 可怜 主动 接受 赞美献身(愿意) -反抗-：命苦 愚昧（被迫被骗）
|殉道 为正义和平而献身 赞美 
|小过错而遭受极刑  惋惜 痛心 可怜 
|罪犯受刑   惩罚 惋惜罪人
|勤奋刻苦学习 成材 成大事业 赞美
|辛勤劳作  创造生活 赞美
|好逸恶劳  唾弃
|虐恋.灵修.外道 惋惜  
</div>   
 <div style="clear:both"></div>
<?
include "view/footer.php";
?>