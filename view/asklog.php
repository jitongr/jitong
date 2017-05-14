<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
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
<div id="m">
<?php while ($value = $DB->fetch_array($query)) { ?>
<div class="title"><?=$value['mthd']?>(<?=$value['oid']?> )<font color=red><?=$value['good']?></font> <a href="/jitong/?cp=<?php echo $value['cid']; ?>"><?=$value['content']?> </a>for:<?=$value['rep']?></div>

<div class="info2">
 <?php echo $value['ctime'].' uid'.$value['uid']; ?> viewid<?=$value['viewid']?> ip<?=$value['ip']?>
</div>
<?php } ?>
<div id="page"><?php echo $page_url;?></div>
</div>
