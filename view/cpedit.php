<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
if($pDa['img']!=''&&$pDa['imgsize']==-1)
$backimg=$pDa['img'];
else{
	$backimg="/jt/bgo.jpg";
	}
$mtop=70;
$fts=array("方正兰亭超细黑简体", "方正舒体", "方正姚体", "仿宋", "汉仪家书简", "汉仪楷体简", "汉仪太极体简", "汉仪娃娃篆简", "汉仪丫丫体简","汉仪丫丫体简", "仿宋", "汉仪家书简", "汉仪楷体简", "汉仪太极体简", "汉仪娃娃篆简", "汉仪丫丫体简", "黑体", "华文彩云", "华文仿宋", "华文行楷", "华文细黑", "华文新魏", "华文中宋", "经典综艺体简", "楷体", "隶书", "宋体", "微软雅黑", "新宋体", "幼圆", "华康娃娃体W5", "华康娃娃体W5", "华康娃娃体W5", "华康娃娃体W5(P)", "華康少女文字W6", "華康娃娃體(P)", "華康娃娃體", );
//if($pDa['ctop']<50)$pDa['ctop']=50;
?>
<script type="text/javascript" src="/view/artDialog/artDialog.js?skin=green"></script>
<script type="text/javascript" src="/view/artDialog/jquery.artDialog.js"></script>
<script src="/view/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/view/jss/jquery.min.js"></script>
<script src="/view/jss/jquery-ui.min.js"></script> 
<script type="text/javascript"> 
var editt=<? if($pDa['ctop']>0||$pDa['cleft']>0)echo '1';else echo '-1';?>;
var theid=0;
var theiid=0;
function ch(){
	editt=-editt;
	//alert(editt);
	if(editt==1){
	document.getElementById('thech').innerText='【位置调整】';
	 $( ".ui-widget-content" ).draggable('enable'); 
	}else{
	document.getElementById('thech').innerText='【编辑内容】';
	 $( ".ui-widget-content" ).draggable('disable'); 
	}}
function ax(id){
	if(editt==1){
		if(theid!=id||theiid!=0)
		{ savecd();	//alert(theid+"dd");
		}
		theiid=0;
		theid=id;
	
	}else{var w=300;var h=250;
		if(id%10==3){w=600;h=650}
 art.dialog.open("docp.php?m=a&cp=<?=$cpid?>&editid="+id, { 
 follow: document.getElementById('th'+id),width: w, height: h,
 title:"<?=$pDa['text']; ?>--"+document.getElementById('th'+id).innerText+' '+id});	
	}
}
function axx(id){
	if(editt==1){
		if(theiid!=id||theid!=0)
		{ savecd();//alert(theid+"sv");
		}theid=0;
		theiid=id;	//alert(theid+"bb");
		//alert(theid);
	}else{ var w=300;var h=250;
		if(id%10==3){w=600;h=650}
 art.dialog.open("docp.php?m=i&cp=<?=$cpid?>&editid="+id, { 
 follow: document.getElementById('th'+id),width: w, height: h,
 title:"<?=$pDa['text']; ?>--"+document.getElementById('th'+id).innerText+' '+id});	
	}
}
function cnvs_getCoordinates(e)
{ //x=e.clientX;
  //y=e.clientY;
  if(theid!=0){
	y= $('#ftt'+theid).offset().top;
	x= $('#ftt'+theid).offset().left;
document.getElementById('thetop').innerText=(y);
document.getElementById('theleft').innerText=(x);
  }
if(theiid!=0){
	y= $('#ftti'+theiid).offset().top;
	x= $('#ftti'+theiid).offset().left;
document.getElementById('thetop').innerText=(y);
document.getElementById('theleft').innerText=(x);
  }
}
function savecd(){
	$.ajax({url:'docp.php?cp=<?=$cpid?>',type:'POST',
				data:{x:document.getElementById('theleft').innerText,
				y:document.getElementById('thetop').innerText,
				id:theid,iid:theiid},
				success: function(data){ //alert(data);
				}});
}
</script>
<div id="m"  style="height:<?=$maxtop?>px;width:1000px;background: url('<?=$backimg?>');overflow-x :auto;"
onmousemove="cnvs_getCoordinates(event)"  >
<?php if($pDa['img'] !='' && $pDa['imgsize'] !=-1 ){ ?>
<div class="ui-widget-content" 
style="cursor:pointer;position:absolute;top:<?=$pDa['ctop']?>px;left:<?=$pDa['cleft']?>px;" id='ftti3'>
<img style="border:0px;<? if($pDa['imgsize']>0)echo "width:".$pDa['imgsize']."px;"?>" src="<?=$pDa['img']?>" title="<?=$pDa['text']?>" onClick="axx(3)"></div>
<?php } ?>
<div class="ui-widget-content" >
<a onClick="ax(<?=$pDa['id']?>3)">☆</a><span id='th<?=$pDa['id']?>3'><?php echo $pDa['text']; ?>&nbsp;<?php echo $pDa['info']; ?></span>
 <? if($pDa['age']){ ?> <img src="/m/images/hug.gif" ><? }?><?php echo $pDa['birth'].'-'.$pDa['die']; ?><?php echo $pDa['age']; ?>
<img src="/view/jss/os2.gif" title="关联数"><?php echo $pDa['f3']; ?>
 [<?php echo getcptype($pDa['sort']); ?>]
 <img src="/view/jss/fav.gif" title="查看次数"><?php echo $pDa['words']; ?> 

 <a href="/?cp=<?=$pDa['id']?>">列表</a>
 <a href="jt.php?id=<?=$pDa['id']?>">预览</a>

<span onclick='ch()' id='thech' style='cursor:pointer;' title='点击切换'>s</span>
<span  id='theleft'></span>&nbsp;<span id='thetop'></span>
</div>
<br><br><div style="width:500px"><?php echo $pDa['content']; ?></div>
<?php 
foreach($concepts as $k=>$value){
?>
<?php if($value['imgsz']>0&&$value['img']){  ?>
<div class="ui-widget-content" style="cursor:pointer;position:absolute;top:<?=
$value['itop']?>px;left:<?=$value['ileft']?>px;" id='ftti<?=$value['aid'].$value['fx']?>'>
<img onClick="axx(<?=$value['aid'].$value['fx']?>)" style="border:0px;<? if($value['imgsz']>0)echo "width:".$value['imgsz']."px;"?>" src="<?=$value['img']?>" title='<?=$value['text'].' '.$value['info']?>'></div>
<?php }
} ?>
<?php 
foreach($concepts as $value){
$value['atop']=$value['atop']==0?$mtop+=20:$value['atop'];

?>
<div class="ui-widget-content" style="cursor:pointer;position:absolute;top:<?=$value['atop']
?>px;left:<?=$value['aleft']?>px;" id='ftt<?=$value['aid'].$value['fx']?>'>
<a onClick="ax(<?=$value['aid'].$value['fx']?>)">○</a><span id='th<?=$value['aid'].$value['fx']?>'><a href="?cp=<?php
 echo $value['id']; ?>" title="<?=$value['frame']?><?php echo $value['infos']; 
?>"><?php echo $value['text']; ?> <?=$value['info']?></a>
</span></div>
<?php } ?>
</div>
=======坐标=====<a onClick="$('.zuobiao').show();">显示</a>=====<a onClick="$('.zuobiao').hide();">隐藏</a>====
<? for($t=100;$t<$maxtop;$t+=100){?>
<div class="zuobiao" style="position:absolute;top:<?=$t?>px;left:5px;"><?=$t?></div>

<? if($t%500==0){?>
<? for($tt=100;$tt<1100;$tt+=100){?>
<div class="zuobiao" style="position:absolute;top:<?=$t+50?>px;left:<?=$tt?>px;"><?=$tt?></div>
<?  }}?>
<?  }?>
<div style="text-align:left;">
提示：点击或移动‘○’进行编辑内容或调整位置，点击文字会跳转。<a onClick="ax(<?=$pDa['id']?>3)">编辑概念</a>
	<form id="addcp<?php echo $valid;?>" >
    添加
    <input id="sch" type="radio" value="0" name="dirs" checked />
    <label for="sch" >前向(1="<?php echo $pDa['text']; ?>")</label> 
	<input id="sch1" type="radio" value="1" name="dirs" />
	<label for="sch1" >反向(2="<?php echo $pDa['text']; ?>")</label> 
	的关联概念：<br>
	关系：
    <select dir="ltr" name="addrel" id="darom" >
           <?
	foreach($cpr as $k=>$v)
		 { if($k<33)continue;
            ?>
   <option value="<?=$k?>" <? if($d==83) echo "selected";?>><?=$v?></option>
        <?  }	?>
	</select> 分类<select name="sort" >
	 <?php 
	
foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" <? if($k==$pDa['sort']) echo 'selected="selected"';?> ><?=$v?></option>	
<?php } ?></select>
	<? if(ROLE=='admin'):?><br>名称：<textarea name="addname" style="height:90px;width:350px" class="texts"/></textarea><? else:?>
    名称：<input name="addname"  type="text" value="" style="width:120px;" />
    <? endif;?>
    <input type="hidden" name="cp0s" value="<?php echo $pDa['text']; ?>" />
    <input type="hidden" name="cid" value="<?php echo $cpid; ?>" />
        <input type="hidden" name="valid" value="<?php echo $valid;?>" /><br>
	<div style="width:500px;text-align:center;"><a onClick=" $.ajax({
				url:'/doadd.php?action=addcp',
				type:'POST',
				data:$('#addcp<?php echo $valid;?>').serialize(),
				success: function(data){
                     alert(data);
					}
		});" title="添加"><img src="/view/jss/tijiao.gif"></a></div>
	</form>
</div>
<script> 
	 $(function() {    $( ".ui-widget-content" ).draggable();  
	 ch(); });</script>