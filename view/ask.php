<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
 
?>
 
<div id="m">
<a href="?s=-1">全图卜问</a> 
<? foreach(getcptype() as $k=>$v){ ?>
	 <a href="?s=<?=$k?>"><?=$v.$p[$k]?></a> 
	<? } ?>
<a href="?a=cz1">测字1</a> 
<a href="?a=cz2">测字2</a> 
<a href="?a=cz3">测字3</a>
<a href="?a=cztu">测字图</a>  
<a href="?imgck">随机图</a>  
<a href="?imgck2">随机图2</a>  
<a href="?u">utf8</a> 
<a href="?uu">utf8.2</a> 
<div class="comcont"> 
 <span style="font-size:40px;"><?=$thezi?></span>
</div>
<? if(isset($value)){ ?>
 <div class="title"><a href="/jitong/?cp=<?php echo $value['id']; ?>"><?php echo $value['id'].' '.$value['text']; ?> <?php echo $value['info']; ?></a>[<?php echo getcptype($value['sort']); ?>] <?php echo strlen($value['content']); ?><?php echo $value['birth'].'-'.$value['die']; ?><?php echo $value['age']; ?></div>
<? if($value['img']){ ?><img src="<?=$value['img']?>" style="max-width:1200px"><? }?>
<div class="info2">
<?php if(ISLOGIN&&($value['sort']==0||$value['text']==""||$value['img']=="")): ?>
<form method='post' action='docp.php?cp=<?=$value['id']?>&ecdid=<?=$value['id']?>'>
<? if($value['text']==""){ ?>cp<input style="width:200px;" value=""  name="text" />
<input style="width:150px;" value=""  name="info" /><? }?>
<? if($value['sort']==0){ ?> <select name="sort" > <?php foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" ><?=$v?></option>	<?php } ?></select><? }?>
<? if($value['img']==""){ ?>img<input style="width:400px;" value="/jty/"  name="img" /><? }?>
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
