<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

<div id="m">
   	<li>
	<h3><span>jitong net</span></h3>
	<ul id="logserch">
	<form name="keycp" method="get" action="<?php echo BLOG_URL; ?>index.php">
	<input name="aikey"  type="text" value="" style="width:120px;"/>
	<input type="submit" id="logserch_logserch" value="搜索" />
	</form>
	</ul>
	</li>
    
<div class="comcont">
&nbsp;&nbsp;

<?php echo $pDa['text']; ?>&nbsp;

（前向<?php echo $pDa['f1']; ?>
后向<?php echo $pDa['f2']; ?>）
 查看<?php echo $pDa['words']; ?>

</div>   
=======================================<br>
	<?php 
foreach($concepts as $value):
?>
<div class="comcont">
&nbsp;&nbsp;<?php echo $value['aid']; ?>

<a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a>&nbsp;


<?php echo " +".$value['best_frame_id'].' '.$value['rela'].":".$value['frame']; ?>
</div>
<?php endforeach; ?>

===============反向关系================

	<?php 
foreach($concepts2 as $value):
?>
<div class="comcont">
&nbsp;&nbsp;<?php echo $value['aid']; ?>

<a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a>&nbsp;

<?php echo " -".$value['best_frame_id'].' '.$value['rela'].":".$value['frame']; ?>
</div>
<?php endforeach; ?>
<br>
	<form id="addcp<?php echo $valid;?>" >
    添加
    <input id="sch" type="radio" value="0" name="dirs" checked />
    <label for="sch" >前向(1="<?php echo $pDa['text']; ?>")</label> 
	<input id="sch1" type="radio" value="1" name="dirs" />
	<label for="sch1" >反向(2="<?php echo $pDa['text']; ?>")</label> 
	的关联概念：<br>
	关系：
    <select dir="ltr" name="addrel" id="darom" >
	    <?
	      $sql2p="select * from conceptnet_frame $dadda order by relation_id asc,n2 desc";
	  $res=$DB->query($sql2p);
         while($arr=$DB->fetch_array($res))
                {
            ?>
   <option value="<?=$arr['id']?>" <? if($arr['id']==83) echo "selected";?>>
         【<?=$arr['relation_id']?>】<?=$arr['text']?>(<?=$arr['n2']?>)
        </option>
        <?  }	?>
	</select> 
	</select> 分类<select name="sort" >
	 <?php 
	$sub[0]='默认';$sub[1]='概念';if(ROLE=='admin'){ $sub[2]='分类';}$sub[3]='记事';$sub[4]='人';$sub[5]='地方';$sub[6]='时间';
foreach ($sub as $k=>$v) {	
?><option value="<?=$k?>" <? if($k==$pDa['sort']) echo 'selected="selected"';?> ><?=$v?></option>	
<?php } ?></select>
	<? if(ROLE=='admin'):?><br>名称：<textarea name="addname" rows="4" /></textarea><? else:?>
    名称：<input name="addname"  type="text" value="" style="width:120px;"/>
    <? endif;?>
     <input type="hidden" name="cruboy" value="<?php echo $pDa['cruboy']; ?>" />
    <input type="hidden" name="cp0s" value="<?php echo $pDa['text']; ?>" />
    <input type="hidden" name="cid" value="<?php echo $pDa['id']; ?>" />
        <input type="hidden" name="valid" value="<?php echo $valid;?>" />
	<a onClick=" $.ajax({
				url:'doadd.php?action=addcp',
				type:'POST',
				data:$('#addcp<?php echo $valid;?>').serialize(),
				success: function(data){
                     alert(data);
					}
		});" title="添加"><img src="/m/images/tijiao.gif"></a>
	</form>
</div>
