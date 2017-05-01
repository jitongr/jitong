<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

<div id="m">
    <li>
	<h3><span>jitong net</span></h3>
	<ul id="logserch">
	<form name="keycp" method="get" action="<?php echo BLOG_URL; ?>index.php">
	<input name="aikey"  type="text" value="<?php echo $akey; ?>" style="width:120px;"/>
	<input type="submit" id="logserch_logserch" value="搜索" />
	</form>
	</ul>
<?php echo $atitle;?>    

	<?php 
foreach($concepts as $value):
?>

<div class="comcont">
&nbsp;&nbsp;

<a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a>&nbsp;<?php echo $value['info']; ?>


(<?php echo $value['f3']; ?>)

<?php echo $value['fi1'].$value['tx1']; ?>||
<?php echo $value['fi2'].$value['tx2']; ?>
</div>


<?php endforeach; ?>
</div>
<div id="page"><?php echo $pageurl;?></div>
</div>
