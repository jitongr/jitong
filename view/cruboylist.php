<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
if(isset($_GET['show']))
{
$lik='/jitong/jt.php?id=';
}
else
{
$lik='?cp=';
}
if(isset($_GET['edit'])){$lik='#" onclick="ed('; $kk=')';
?>
<script type="text/javascript" src="/scan/artDialog/artDialog.js?skin=green"></script>
<script type="text/javascript" src="/scan/artDialog/jquery.artDialog.js"></script>
<script src="/scan/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/content/js/jquery-1.8.2.min.js"></script>
<script src="/content/js/jquery-ui.js"></script> 
<script type="text/javascript"> 
function ed(id){
 var w=300;var h=250;
		{w=600;h=650}
 art.dialog.open("docp.php?m=a&cp="+id+"&editid="+id+"3", { 
 follow: document.getElementById('th'+id),width: w, height: h,
 title:"<?=$value['text']; ?>--" +id});	
	}
</script>
<? } ?>
<div id="m">

    <li>
	<h3><a href='jt.php?s=<?=$s?>'><span>cruboy </span></a>
	<a href='jt.php?s=<?=$s?>&show'><span>shows</span></a>
	<a href='jt.php?s=<?=$s?>&edit'>edit</a>
    <a href='jt.php?fre'><span>关联</span></a>
	</h3> 
	<ul id="logserch">

	</ul>
	</li>
<div class="comcont">list
	<?php 
while ($value = $DB->fetch_array($res)) {
?>
&nbsp;&nbsp;
<a href="<?=$lik?><?php echo $value['id'].$kk; ?>"
 style="font-size:<? if($value['f3']>20)echo '24';elseif($value['f3']>10)echo '22';elseif($value['f3']>5)echo '20';elseif($value['f3']>1)echo '18';else echo "16";?>px" title="<?php echo $value['id'].':'.$value['f3']; ?>">
<? if($value['img']){ ?><img src="/m/images/image_s.gif"><? }?><?php echo $value['text']; ?></a>
<?php } ?>
</div>
<div id="page"><?php echo $pageurl;?></div>
</div>
