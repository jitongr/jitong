<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

<div id="m">

<a href="<?php echo BLOG_URL; ?>?cp=2821" >十字架</a> 
<a href="<?php echo BLOG_URL; ?>?cp=16608" >幼童</a> 
<a href="<?php echo BLOG_URL; ?>?cp=23206" >脱光衣服</a>
<a href="<?php echo BLOG_URL; ?>?cp=57676" >鞭打</a> 
<a href="<?php echo BLOG_URL; ?>?cp=27602">吊起来打</a>
||||
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
<a href="<?php echo BLOG_URL; ?>?cp=48" <?php if($cpid==48)echo 'id="active"'; ?>>志愿者</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=72" <?php if($cpid==72)echo 'id="active"'; ?>>home</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=468" <?php if($cpid==468)echo 'id="active"'; ?>>爱心</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=405" <?php if($cpid==405)echo 'id="active"'; ?>>善良</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=136" <?php if($cpid==136)echo 'id="active"'; ?>>知识</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=182" <?php if($cpid==182)echo 'id="active"'; ?>>爱</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=27310"<?php if($cpid==27310)echo 'id="active"'; ?> >儿童</a> </li>
<a href="<?php echo BLOG_URL; ?>?cp=798" <?php if($cpid==798)echo 'id="active"'; ?>>孩子</a> </li>
<a href="<?php echo BLOG_URL; ?>?cp=54" <?php if($cpid==54)echo 'id="active"'; ?>>学习</a></li>
<a href="<?php echo BLOG_URL; ?>?cp=653" <?php if($cpid==653)echo 'id="active"'; ?>>上学</a> </li>
    <li>
	<h3><span>cruboy </span></h3>
	<ul id="logserch">
	<form name="keycp" method="get" action="<?php echo BLOG_URL; ?>cruboy.php">
	<input name="keyword"  type="text" value="<?php echo $akey; ?>" style="width:120px;"/>
	<input type="submit" id="logserch_logserch" value="搜索" />
	</form>
	</ul>
	</li><form name="keycp" method="get" action="/toddler.php">
            <span><img src="/jitong/boy.jpg" border="0"></span><br><br>
            <input id="searchValue" name="k" type="text" value="<?php echo $akey; ?>" 
                style="font-size:16; width:300px; height:20px;" />       
            <input type="submit" id="logserch_logserch" value="输 入" 
               style="width:60px; height:22px; text-align:center; font-size:12;" />
        </form>
<?php echo $atitle;?>    

	<?php 
foreach($concepts as $value):
?>

<div class="comcont">
&nbsp;&nbsp;
<?php if($value['visible'] == true ): ?>
<a href="<?php echo BLOG_URL; ?>cruboy.php?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a>&nbsp;

<?php else:?>

<SPAN style="TEXT-DECORATION: line-through"><a href="<?php echo BLOG_URL; ?>cruboy.php?cp=<?php echo $value['id']; ?>">
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
