<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
if(isset($_GET['list']))
{$lk='/jitong/';
$lik='cruboy.php?cp=';
}
else
{$lk='/m/';
$lik='/m/?cp=-';
}
?>

<div id="m">

    <li>
	<h3><a href='cruboy.php?list'><span>cruboy </span></a><span><a href='cruboy.php?show'>shows</a></span></h3>
	<ul id="logserch">
<a href="<?=$lk?>?cp=72" <?php if($cpid==72)echo 'id="active"'; ?>>home</a></li>
<a href="<?=$lk?>?cp=468" <?php if($cpid==468)echo 'id="active"'; ?>>爱心</a></li>
<a href="<?=$lk?>?cp=405" <?php if($cpid==405)echo 'id="active"'; ?>>善良</a></li>
<a href="<?=$lk?>?cp=136" <?php if($cpid==136)echo 'id="active"'; ?>>知识</a></li>
<a href="<?=$lk?>?cp=182" <?php if($cpid==182)echo 'id="active"'; ?>>爱</a></li>
<a href="<?=$lk?>?cp=27310"<?php if($cpid==27310)echo 'id="active"'; ?> >儿童</a> </li>
<a href="<?=$lk?>?cp=798" <?php if($cpid==798)echo 'id="active"'; ?>>孩子</a> </li>
<a href="<?=$lk?>?cp=54" <?php if($cpid==54)echo 'id="active"'; ?>>学习</a></li>
<a href="<?=$lk?>?cp=653" <?php if($cpid==653)echo 'id="active"'; ?>>上学</a> </li>
<a href="<?=$lk?>?cp=2821" >十字架</a> 
<a href="<?=$lk?>?cp=16608" >幼童</a> 
<a href="<?=$lk?>?cp=23206" >脱光衣服</a>
<a href="<?=$lk?>?cp=57676" >鞭打</a> 
<a href="<?=$lk?>?cp=27602">吊起来打</a>
	</ul>
	</li>
<div class="comcont">list
	<?php 
while ($value = $DB->fetch_array($res)) {
?>
&nbsp;&nbsp;
<a href="<?=$lik?><?php echo $value['id']; ?>"
 style="font-size:<? if($value['f3']>20)echo '24';elseif($value['f3']>10)echo '22';elseif($value['f3']>5)echo '20';elseif($value['f3']>1)echo '18';else echo "16";?>px" title="<?php echo $value['f3']; ?>">
<?php echo $value['text']; ?></a>
<?php } ?>
</div>
<div id="page"><?php echo $pageurl;?></div>
</div>
