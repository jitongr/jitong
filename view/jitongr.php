<?php 
/*
* 首页
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<style type="text/css" >
.crucify {
  background: url("./view/cruboys.jpg") no-repeat;
  width: 819px;
  height: 584px;
  margin: 0 auto;
  position: relative;
  cursor: pointer;
}
.j11,
.j5,
.j17 {
  position: absolute;
  display: block;
  z-index: 2;
}
.j11 {
  width: 384px;
  height: 449px;
  left: 0px;
  top: 86px;
}
.j11:hover {
  background: url("./jt/<?php echo $mname[0];?>.png") no-repeat;
}
.j5 {
  width: 303px;
  height: 337px;
  left: 250px;
  top: 167px;
}
.j5:hover {
  background: url("./jt/<?php echo $mname[1];?>.png") no-repeat;
}
.j17 {
  width: 432px;
  height: 555px;
  left: 388px;
  top: 8px;
}
.j17:hover {
  background: url("./jt/<?php echo $mname[2];?>.png") no-repeat;
}
</style>
<div id="content">
<div id="crucify" class="crucify">
<a  class="j17" href="?age=17#crucify" title='殉道男孩'></a>
<a  class="j11" href="?age=11#crucify" title='殉道圣童'></a>	
<a  class="j5" href="?age=5#crucify" title='殉道幼童'></a>	
</div>
