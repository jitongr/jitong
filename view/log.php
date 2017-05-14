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
<? foreach(getcptype() as $k=>$v){ ?>
	 <a href="?action=li&s=<?=$k?>"><?=$v.$p[$k]?></a> 
	<? } ?>
<div id="m">
<?php while ($value = $DB->fetch_array($query)) { ?>
<div class="title"><a href="/jitong/?cp=<?php echo $value['id']; ?>"><?php echo $value['id'].' '.$value['text']; ?> <?php echo $value['info']; ?></a>[<?php echo getcptype($value['sort']); ?>] <?php echo strlen($value['content']); ?></div>
<? if($value['img']){ ?><img src="<?=$value['img']?>" style="max-width:600px"><? }?>
<div class="info2">
<?php if(ISLOGIN&&($value['sort']==0||$value['text']==""||$value['img']=="")): ?>
<form method='post'>
<? if($value['text']==""){ ?>cp<input style="width:200px;" value=""  name="text" />
<input style="width:150px;" value=""  name="info" /><? }?>
<? if($value['sort']==0){ ?> <select name="sort" > <?php foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" ><?=$v?></option>	<?php } ?></select><? }?>
<? if($value['img']==""){ ?>img<input style="width:400px;" value="/jty/"  name="img" /><? }?>
<input type="hidden" name="id" value="<?=$value['id']?>"><input  type='submit' value='提交'/></form>
<?php endif;?>
<?=date('Y-m-d H:i:s',$value['edittime'])?> <?php echo $value['birth'].'-'.$value['die']; ?><?php echo $value['age']; ?>
关联:<?php echo $value['f3']; ?> 阅读:<?php echo $value['words']; ?> 
<a href="jt.php?id=<?=$value['id']?>">预览</a>
<?php if(ISLOGIN ): ?>
<a href="jt.php?cp=<?=$value['id']?>">编页</a>
<span onclick="ed(<?=$value['id']?>)" id="th<?=$value['id']?>"><b>编辑</b></span>
<?php endif;?>
</div>
<?php } ?>
<div id="page"><?php echo $page_url;?></div>
</div>
