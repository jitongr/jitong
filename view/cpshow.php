<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
if($pDa['img']!=''&&$pDa['imgsize']==-1)
$backimg=$pDa['img'];
else{
	$backimg="/jt/bgo.jpg";
	}
$mtop=60;
//$fts=array("方正兰亭超细黑简体", "方正舒体", "方正姚体", "仿宋", "汉仪家书简", "汉仪楷体简", "汉仪
//太极体简", "汉仪娃娃篆简", "汉仪丫丫体简","汉仪丫丫体简", "仿宋", "汉仪家书简", "汉仪楷体简", "汉仪
//太极体简", "汉仪娃娃篆简", "汉仪丫丫体简", "黑体", "华文彩云", "华文仿宋", "华文行楷", "华文细黑", 
//"华文新魏", "华文中宋", "经典综艺体简", "楷体", "隶书", "宋体", "微软雅黑", "新宋体", "幼圆", "华康娃娃体W5", 
//"华康娃娃体W5", "华康娃娃体W5", "华康娃娃体W5(P)", "華康少女文字W6", "華康娃娃體(P)", "華康娃娃體", );
//style="font-family:=$fts[rand(0,36)];"
?>
<script type="text/javascript" src="/view/jss/jquery.min.js"></script>
<script src="/view/jss/jquery-ui.min.js"></script> 
<style>
.ui-widget-content{cursor:pointer;position:absolute;}
</style>
<div id="m"  style="height:<?=$maxtop?>px;width:1000px;background: url('<?=$backimg?>');overflow-x :auto; ">
<?php if($pDa['img'] !='' &&$pDa['imgsize'] !=-1 ){ ?>
<div class="ui-widget-content" 
style="top:<?=$pDa['ctop']?>px;left:<?=$pDa['cleft']?>px;">
<img style="border:0px;<? if($pDa['imgsize']>0)echo "width:".$pDa['imgsize']."px;"?>" src="<?=$pDa['img']?>" title="<?=$pDa['text']?>"></div>
<?php } ?>
<div class="ui-widget-content" >
☆<span ><?php echo $pDa['text']; ?>&nbsp;<?php echo $pDa['info']; ?></span>
 <? if($pDa['age']){ ?> <img src="/view/jss/hug.gif" ><? }?><?php echo $pDa['birth'].'-'.$pDa['die']; ?><?php echo $pDa['age']; ?>
<img src="/view/jss/os2.gif" title="关联数"><?php echo $pDa['f3']; ?>
 [<?php echo getcptype($pDa['sort']); ?>]
 <img src="/view/jss/fav.gif" title="查看次数"><?php echo $pDa['words']; ?> 

 <a href="/?cp=<?=$pDa['id']?>">列表</a>
 <?php //if(ISLOGIN === true):?>
 <a href="jt.php?cp=<?=$pDa['id']?>">编辑</a><? //endif;?>
</div> 
<br><br><div style="width:500px"><?php echo $pDa['content']; ?></div>
<?php 
foreach($concepts as $k=>$value){
?>
<?php if($value['imgsz']>0&&$value['img']){ ?>
 <div class="ui-widget-content" style="top:<?=$value['itop']
 ?>px;left:<?=$value['ileft']?>px;" >
<img style="border:0px;<? if($value['imgsz']>0)echo "width:".$value['imgsz']."px;"?>" src="<?=$value['img']?>" title='<?=$value['text'].' '.$value['info']?>'></div>
<?php }
} ?>
<?php 
foreach($concepts as $k=>$value){
$value['atop']=$value['atop']==0?$mtop+=20:$value['atop'];
$value['aleft']=$value['aleft']==0?rand(1,920):$value['aleft'];

?>
<div class="ui-widget-content" style="top:<?=
$value['atop']?>px;left:<?=$value['aleft']?>px;" >○<a href="?id=<?php echo $value['id']; ?>" title="<?=$value['frame']?><?php echo $value['infos']; ?>" ><?=$value['text']?> <?=$value['info']?></a>

</div>
<?php } ?>
</div>
<script>

	 $(function() {    $( ".ui-widget-content" ).draggable();  });  </script>