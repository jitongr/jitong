<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
//   style="font-size:16; width:300px; height:20px;" style="width:60px; height:22px; text-align:center; font-size:12;"
?>

<div id="m">
    <li>
	<h3><span>首祭</span></h3>
    <h3><span><a href="?cp=<?=$_SESSION['jtimgid']?>"><img src="<?=$_SESSION['jtimg']?>" border="0" style="max-height:300px;max-width:300px;"></span></a></h3>
    <ul id="logsch">
    <form name="keycp" method="get" >
    <input id="searchValue" name="aikey" type="text" value="<?php echo $akey; ?>"   />       
    <input type="submit" id="logserch_logserch" value="问祭"   />
        </form>
        </ul>
	</li>
<?php echo $atitle;?>    

	<?php 
foreach($concepts as $value):
?>

<div class="comcont">
&nbsp;&nbsp;
<? if($value['img']){ ?><img src="/m/images/image_s.gif"><? }?>
<a href="?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?>&nbsp;<?php echo $value['info'];?></a>


<a href="jt.php?id=<?=$value['id']?>" title="<?php echo $value['f3']; ?>">#<?=$value['id']?></a>

<span title="<?=$value['re1'].".".$value['fi1']?>"><?=$value['tx1']?></span> |
<span title="<?=$value['re2'].".".$value['fi2']?>"><?=$value['tx2']?></span>
</div>


<?php endforeach; ?>
</div>
<div id="page"><?php echo $pageurl;?></div>
</div>
