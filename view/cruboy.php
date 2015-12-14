<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
//   style="font-size:16; width:300px; height:20px;" style="width:60px; height:22px; text-align:center; font-size:12;"
?>

<div id="m">
    <li>
	<h3><span>jitong </span></h3>
    <h3><span><img src="/jitong/boy.jpg" border="0"></span></h3>
    <ul id="logsch">
    <form name="keycp" method="get" action="<?php echo BLOG_URL; ?>">
    <input id="searchValue" name="aikey" type="text" value="<?php echo $akey; ?>"   />       
    <input type="submit" id="logserch_logserch" value="全搜索"   />
        </form>
        </ul>
	</li>
<?php echo $atitle;?>    

	<?php 
foreach($concepts as $value):
?>

<div class="comcont">
&nbsp;&nbsp;
<?php if($value['visible'] == true ): ?>
<a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a>&nbsp;

<?php else:?>

<SPAN style="TEXT-DECORATION: line-through"><a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a></SPAN>&nbsp;

<?php endif;?>

：<?php echo $value['f3']; ?>
：c:<?php echo $value['num_assertions']; ?>
<?php echo "-->".$value['re1'].".".$value['fi1'].$value['tx1']; ?>||
<?php echo "<--".$value['re2'].".".$value['fi2'].$value['tx2']; ?>
</div>


<?php endforeach; ?>
</div>
<div id="page"><?php echo $pageurl;?></div>
</div>
