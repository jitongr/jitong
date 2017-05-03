<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
<?php while ($value = $DB->fetch_array($query)) { ?>
	<h2><?php //topflg($value['top']); ?><a href="/jitong/?cp=<?php echo $value['id']; ?>"><?php echo $value['text']; ?> <?php echo $value['info']; ?></a></h2>
	<p class="date"><?=date('Y-m-d H:i:s',$value['edittime'])?> [<?php echo getcptype($value['sort']); ?>]
 <?php echo $value['birth'].'-'.$value['die']; ?><?php echo $value['age']; ?>
	</p> <? if($value['img']){ ?> <img src="<?=$value['img']?>"> <br><? }?>
	<?php echo $value['content'] ?>
	<p class="count">
	关联(<?=$value['f3']?>)
	浏览(<?=$value['words']?> )<a href="jt.php?id=<?=$value['id']?>">预览</a>
 <a href="jt.php?cp=<?=$value['id']?>">编辑</a>
	</p>
	<div style="clear:both;"></div>
<?php }?>

<div id="pagenavi">
	<?php echo $page_url;?>
</div>

</div><!-- end #contentleft-->
<?php
 include View::getView('side');
?>