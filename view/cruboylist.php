<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

<div id="m">

<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=7" >钉十字架</a>
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=1" >酷刑</a> 
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=2" >幼童</a> 
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=3" >孩子</a> 
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=47" >脱光衣服</a>
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=5" >吊起来</a> 
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=4" >鞭打</a> 
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=30" >活埋</a> 
||
<a href="/?cp=-7" >钉十字架</a>
<a href="/?cp=-1" >酷刑</a> 
<a href="/?cp=-2" >幼童</a> 
<a href="/?cp=-3" >孩子</a> 
<a href="/?cp=-47" >脱光衣服</a>
<a href="/?cp=-5" >吊起来</a> 
<a href="/?cp=-4" >鞭打</a> 
<a href="/?cp=-97" >祭童儿</a> ++

    <li>
	<h3><span>cruboy </span></h3>
	<ul id="logserch">
<a href="<?php echo BLOG_URL; ?>?cp=48" <?php if($cpid==48)echo 'id="active"'; ?>>志愿者</a>
<a href="<?php echo BLOG_URL; ?>?cp=72" <?php if($cpid==72)echo 'id="active"'; ?>>home</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=468" <?php if($cpid==468)echo 'id="active"'; ?>>爱心</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=405" <?php if($cpid==405)echo 'id="active"'; ?>>善良</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=136" <?php if($cpid==136)echo 'id="active"'; ?>>知识</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=182" <?php if($cpid==182)echo 'id="active"'; ?>>爱</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=27310"<?php if($cpid==27310)echo 'id="active"'; ?> >儿童</a> </li>
<a href="<?php echo BLOG_URL; ?>?cp=798" <?php if($cpid==798)echo 'id="active"'; ?>>孩子</a> </li>
<a href="<?php echo BLOG_URL; ?>?cp=54" <?php if($cpid==54)echo 'id="active"'; ?>>学习</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=653" <?php if($cpid==653)echo 'id="active"'; ?>>上学</a> </li>
<a href="<?php echo BLOG_URL; ?>?cp=2821" >十字架</a> 
<a href="<?php echo BLOG_URL; ?>?cp=16608" >幼童</a> 
<a href="<?php echo BLOG_URL; ?>?cp=23206" >脱光衣服</a>
<a href="<?php echo BLOG_URL; ?>?cp=57676" >鞭打</a> 
<a href="<?php echo BLOG_URL; ?>?cp=27602">吊起来打</a>
	</ul>
	</li>
<div class="comcont">list
	<?php 
while ($value = $DB->fetch_array($res)) {
?>
&nbsp;&nbsp;
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=<?php echo $value['id']; ?>"
 style="font-size:<? if($value['f3']>20)echo '24';elseif($value['f3']>10)echo '22';elseif($value['f3']>5)echo '20';elseif($value['f3']>1)echo '18';else echo "16";?>px" title="<?php echo $value['f3']; ?>">
<?php echo $value['text']; ?></a>
<?php } ?>
</div>
<div id="page"><?php echo $pageurl;?></div>
</div>
