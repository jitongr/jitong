<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

<div id="m">
<?php while ($value = $DB->fetch_array($query)) { ?>
<div class="title"><a href="/jitong/?cp=<?php echo $value['id']; ?>"><?php echo $value['id'].' '.$value['text']; ?> <?php echo $value['info']; ?></a><?php echo strlen($value['content']); ?></div>
<? if($value['img']){ ?><img src="<?=$value['img']?>" style="max-width:600px"><? }?>
<div class="info2"><form method='post'><input style="width:400px;" value="<?php echo $value['img']==""?"/jty/":$value['img']; ?>"  name="img" /><input  type='submit' value='提交'/></form><?=date('Y-m-d H:i:s',$value['edittime'])?> [<?php echo getcptype($value['sort']); ?>] <?php echo $value['birth'].'-'.$value['die']; ?><?php echo $value['age']; ?>
关联:<?php echo $value['f3']; ?> 阅读:<?php echo $value['words']; ?> 
<?php if(ROLE == 'admin' || $value['author'] == UID): ?>
<a href="jt.php?cp=<?=$value['id']?>">编辑</a>
<?php endif;?>
</div>
<?php } ?>
<div id="page"><?php echo $page_url;?></div>
</div>
