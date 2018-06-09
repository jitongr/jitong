<?php 
$action='cruciedboy' ;
 $savlog=1;
require_once 'init.php';

include './view/headj.php';
?>
<style type="text/css" >
.crucify {
  background: url("./view/cruciedboy.jpg") ;
  width: 613px;
  height: 545px;
  margin: 0 auto;
  position: relative;
  cursor: pointer;
}
.j5,
.j17 {
  position: absolute;
  display: block;
  z-index: 2;
}

.j17 {
  width: 432px;
  height: 555px;
  left: 188px;
  top: 8px;
}
.j17:hover {
  background: url("./jt/j17v.png") no-repeat;
}
.j5 {
  width: 300px;
  height: 600px;
  left: 50px;
  top: 60px;
  color:#0f0;
  font-size:30px;
}
</style>
<div id="content">
<div id="crucify" class="crucify">
<a  class="j17" href="?age=17#crucify" title='殉道男孩'></a>
<div class="j5">用我真心奉献此生，<br>效仿基督追求成圣；<br>天地主宰请祢悦纳，<br>希望之路洒满甘霖！<br>
把我灵魂交主手中，<br>要与耶稣日渐相近；<br>大能君王请祢悦纳，<br>救恩之杯圣宠满盈！<br>
<font color='red'>让我洁净成为祭品，<br>勇与救主一同见证；<br>仁慈天父请祢悦纳！<br>恩宠之泉普泽众灵！</font></div>
</div>
<?	include './view/footer.php';?>