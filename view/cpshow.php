<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
if($pDa['imgsize'] !=-1)
$backimg="/jt/imgs/bgo.jpg";
else{
	$sq1 = "SELECT * FROM  emlog_attachment WHERE aid=".$pDa['imgid'];
	$pa = $DB->once_fetch_array($sq1);
	$backimg=$pa['filepath'];
	}
$mtop=60;
//$fts=array("方正兰亭超细黑简体", "方正舒体", "方正姚体", "仿宋", "汉仪家书简", "汉仪楷体简", "汉仪
//太极体简", "汉仪娃娃篆简", "汉仪丫丫体简","汉仪丫丫体简", "仿宋", "汉仪家书简", "汉仪楷体简", "汉仪
//太极体简", "汉仪娃娃篆简", "汉仪丫丫体简", "黑体", "华文彩云", "华文仿宋", "华文行楷", "华文细黑", 
//"华文新魏", "华文中宋", "经典综艺体简", "楷体", "隶书", "宋体", "微软雅黑", "新宋体", "幼圆", "华康娃娃体W5", 
//"华康娃娃体W5", "华康娃娃体W5", "华康娃娃体W5(P)", "華康少女文字W6", "華康娃娃體(P)", "華康娃娃體", );
//style="font-family:=$fts[rand(0,36)];"
?>
<script type="text/javascript" src="/content/js/jquery-1.8.2.min.js"></script>
<script src="/content/js/jquery-ui.js"></script> 
<style>
.ui-widget-content{cursor:pointer;position:absolute;}
</style>
<div id="m"  style="height:<?=$maxtop?>px;width:1000px;background: url('<?=$backimg?>');overflow-x :auto; ">
<?php if($pDa['imgid'] >0 &&$pDa['imgsize'] !=-1 ){
$sq1ab = "SELECT * FROM  emlog_attachment WHERE aid=".$pDa['imgid'];
	$paab = $DB->once_fetch_array($sq1ab);
 ?>
<div class="ui-widget-content" 
style="top:<?=$pDa['ctop']?>px;left:<?=$pDa['cleft']?>px;">
<img style="border:0px;" src="<?=$paab['filepath']?>" title="<?=$pDa['text']?>"></div>
<?php } ?>
<div class="ui-widget-content" >
☆<span ><?php echo $pDa['text']; ?></span>&nbsp;
<span title="<?php echo "+".$pDa['f1']."-".$pDa['f2']."~".$pDa['num_assertions']; 
?>">相关数</span><?php echo $pDa['f3']; ?>
 查看<?php echo $pDa['words']; ?> 
 <?php if($pDa['url'] !='' ){ ?>
<a href="<?=$pDa['url']?>">□</a>
<?php }
if($pDa['blogid'] >0 ){?>
<a href="/<?php echo $pDa['blogid']; ?>.html">■</a>
<?php } ?>
 <?php if(ISLOGIN === true):?>
 <a href="/m/?action=aishow&cp=<?=$cpidd?>">列表</a>
 <a href="/m/ainet.php?cp=<?=$pDa['id']?>">编辑</a><? endif;?>
</div> 
<br><?php echo $pDa['info']; ?>
<?php 
foreach($concepts as $k=>$value){
?>
<?php if($value['img'] >0 ){
$sq1a = "SELECT * FROM  emlog_attachment WHERE aid=".$value['img'];
	$paa = $DB->once_fetch_array($sq1a);
 ?>
 <div class="ui-widget-content" style="top:<?=
$value['itop']?>px;left:<?=$value['ileft']?>px;" >
<img style="border:0px;<? if($value['imgsz']>0)echo "width:".$value['imgsz']."px;"?>" src="<?=$paa['filepath']?>" title='<?=$value['text'].' '.$value['infos']?>'></div>
<?php }
} ?>
<?php 
if(ISLOGIN === true)
foreach($concepts as $k=>$value){
$value['atop']=$value['atop']==0?$mtop+=20:$value['atop'];
$value['aleft']=$value['aleft']==0?rand(1,920):$value['aleft'];
if($value['seq']<8)$value['seq']=14;
?>
<div class="ui-widget-content" style="top:<?=
$value['atop']?>px;left:<?=$value['aleft']?>px;font-size:<?=$value['seq']?>px;" >○<a href="?cp=<?php 
echo $value['id']; ?>" title="<?=$value['frame']?><?php echo '+'.$value['f1'].'-'.$value['f2'].'~'.$value['num_assertions'].' '.$value['infos']; 
?>" ><?=$value['text']?></a>
<?php if($value['url'] !='' ){ ?>
<a href="<?=$value['url']?>">□</a>
<?php }
if($value['blogid'] >0 ){?>
<a href="/<?php echo $value['blogid']; ?>.html">■</a>
<?php } ?></div>
<?php } else 
foreach($concepts as $k=>$value){
$value['atop']=$value['atop']==0?$mtop+=20:$value['atop'];
$value['aleft']=$value['aleft']==0?rand(1,920):$value['aleft'];
if($value['seq']<8)$value['seq']=14;
?>
<div class="ui-widget-content" style="top:<?=
$value['atop']?>px;left:<?=$value['aleft']?>px;font-size:<?=$value['seq']?>px;" >○<span onclick="dotovv(<?php 
echo $value['id']; ?>)" title="<?=$value['frame']?><?php echo '+'.$value['f1'].'-'.$value['f2'].'~'.$value['num_assertions'].' '.$value['infos']; 
?>" ><?=$value['text']?></span>
<?php if($value['url'] !='' ){ ?>
<a href="<?=$value['url']?>">□</a>
<?php }
if($value['blogid'] >0 ){?>
<a href="/<?php echo $value['blogid']; ?>.html">■</a>
<?php } ?></div>
<?php } ?>
</div>
<script>
  function dotovv(id){
	  var temp = document.createElement("form");         
   temp.action = '/m/index.php';         
   temp.method = "post";         
   temp.style.display = "none"; 
   var opt = document.createElement("input");         
      opt.name = 'cp';         
        opt.value = id;         
       temp.appendChild(opt);  
	   opt = document.createElement("input"); 
	      opt.name = 'valid';         
        opt.value = <?php echo $valid;?>;         
       temp.appendChild(opt); 
   document.body.appendChild(temp);         
   temp.submit();         
   return temp;
 }

	 $(function() {    $( ".ui-widget-content" ).draggable();  });  </script>