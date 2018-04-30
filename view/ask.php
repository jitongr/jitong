<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
 
?>
 <script type="text/javascript" src="/asset/base/artDialog/artDialog.js?skin=green"></script>
<script type="text/javascript" src="/asset/base/artDialog/jquery.artDialog.js"></script>
<script src="/asset/base/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/m/js/jquery.min.js"></script>
<script src="/m/js/jquery-ui.js"></script> 
<script type="text/javascript"> 
function ed(id){
 var w=300;var h=250;
		//{w=600;h=650}
 art.dialog.open("docp.php?m=a&cp="+id+"&editid="+id+"3", { 
 follow: document.getElementById('th'+id),width: w, height: h,
 title:"<?=$value['text']; ?>--" +id});	
	}
</script>
<div id="m">
<a href="?s=-1">全图问</a> 
<? foreach(getcptype() as $k=>$v){ ?>
	 <a href="?s=<?=$k?>"><?=$v.$p[$k]?></a> 
	<? } ?>
<a href="?a=cz1">测字1</a> 
<a href="?a=cz2">测字2</a> 
<a href="?a=cz3">测字3</a>
  
<a href="?imgck">随机图</a>  
<a href="?imgck2">随机图2</a>  
<a href="?u">utf8</a> 
<a href="?uu">utf8.2</a> 
<a href="?list">历史记录</a> 
<div class="comcont"> 
 <span style="font-size:40px;"><?=$thezi?></span><?=$rgood?>
 <form   method="post"  >
	<input name="rep"  type="text" value="<?php echo $akey; ?>" style="width:120px;"/><input type="submit" name="redo" value="求问" />
</form>
</div>
<? if(isset($value['id'])){ ?>
 <div class="title"><a href="/jitong/?cp=<?php echo $value['id']; ?>"><?php echo $value['id'].' '.$value['text']; ?> <?php echo $value['info']; ?></a>[<?php echo getcptype($value['sort']); ?>] <?php echo strlen($value['content']); ?><?php echo $value['birth'].'-'.$value['die']; ?><?php echo $value['age']; ?>  <font color=red><?php echo $_SESSION['askedgd']; ?></font> </div>
<? if($value['img']){ ?><img src="<?=$value['img']?>" style="max-width:1200px"><? }?>
<div class="info2">
<?php if(ISLOGIN //&&($value['sort']==0||$value['text']==""||$value['img']=="")
): ?>
<form method='post' action='docp.php?cp=<?=$value['id']?>&ecdid=<?=$value['id']?>&s=<?=$s?>'>
<? if($value['text']==""){ ?>cp<input style="width:200px;" value=""  name="text" />
<input style="width:150px;" value=""  name="info" /><? }?>
<select name="sort" > <?php foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" <? if($k==$value['sort']) echo 'selected="selected"';?>><?=$v.$p[$k]?></option>	<?php } ?></select>
<? if($value['img']==""){ ?>img<input style="width:400px;" value=""  name="img" /><? }?>
<input type="hidden" name="id" value="<?=$value['id']?>"><input  type='submit' value='提交'/></form>
<?php endif;?>
<?=date('Y-m-d H:i:s',$value['edittime'])?> 
关联:<?php echo $value['f3']; ?> 阅读:<?php echo $value['words']; ?> 
<a href="jt.php?id=<?=$value['id']?>">预览</a>
<?php if(ISLOGIN ): ?>
<a href="jt.php?cp=<?=$value['id']?>">编页</a>
<span onclick="ed(<?=$value['id']?>)" id="th<?=$value['id']?>"><b>编辑</b></span>
<?php endif;?>
</div>
<? } ?>

</div>
