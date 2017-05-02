<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
if(isset($_GET['show']))
{
$lik='/jitong/jt.php?id=';
}
else
{
$lik='?cp=';
}
?>

<div id="m">

    <li>
	<h3><a href='?action=xingshou'><span>cruboy </span></a><span><a href='?action=xingshou&show'>shows</a></span></h3>
	<ul id="logserch">

	</ul>
	</li>
<div class="comcont">list
	<?php 
while ($value = $DB->fetch_array($res)) {
?>
&nbsp;&nbsp;
<a href="<?=$lik?><?php echo $value['id']; ?>"
 style="font-size:<? if($value['f3']>20)echo '24';elseif($value['f3']>10)echo '22';elseif($value['f3']>5)echo '20';elseif($value['f3']>1)echo '18';else echo "16";?>px" title="<?php echo $value['id'].':'.$value['f3']; ?>">
<? if($value['img']){ ?><img src="/m/images/image_s.gif"><? }?><?php echo $value['text']; ?></a>
<?php } ?>
</div>
<div id="page"><?php echo $pageurl;?></div>
</div>
