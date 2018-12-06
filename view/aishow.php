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

<?php echo $pDa['text']; ?>&nbsp;<?php echo $pDa['info']; ?>
<img src="/view/jss/fav.gif" title="<?php echo $value['id'] ?>">
<?php echo $pDa['words']; ?> [<?php echo getcptype($pDa['sort']); ?>]
 <? if($pDa['age']){ ?> <img src="/view/jss/hug.gif" ><? }?><?php echo $pDa['birth'].'-'.$pDa['die']; ?><?php echo $pDa['age']; ?>
<img src="/view/jss/os2.gif" title="关联数"><?php echo $pDa['f3']; ?>
  <a href="jt.php?id=<?=$pDa['id']?>">预览</a>
 <a href="jt.php?cp=<?=$pDa['id']?>">编辑</a><br>
 <?php if(ISLOGIN&&($pDa['sort']==0||$pDa['text']==""||$pDa['img']=="")): ?>
<form method='post' action='docp.php?cp=<?=$pDa['id']?>&ecdid=<?=$pDa['id']?>'>
<? if($pDa['text']==""){ ?>cp<input style="width:200px;" value=""  name="text" />
<input style="width:150px;" value=""  name="info" /><? }?>
<? if($pDa['sort']==0){ ?> <select name="sort" > <?php foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" ><?=$v?></option>	<?php } ?></select><? }?>
<? if($pDa['img']==""){ ?>img<input style="width:300px;" value="/jty/"  name="img" /><? }?>
<input type="hidden" name="id" value="<?=$pDa['id']?>"><input  type='submit' value='提交'/></form>
<?php endif;?>
 <? if($pDa['img']){ ?> <img src="<?=$pDa['img']?>"> <br><? }?>
<?php echo $pDa['content']; ?>
</div>   
=======================================<br>
	<?php 
foreach($concepts as $value):
?>
<div class="comcont">
&nbsp;&nbsp;<?php echo $value['aid']; ?>

<a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a>&nbsp;<?php echo $value['infos']; ?>


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
<?php echo $value['text']; ?></a>&nbsp;<?php echo $value['infos']; ?>

<?php echo " -".$value['best_frame_id'].' '.$value['rela'].":".$value['frame']; ?>
</div>
<?php endforeach; ?>
<br>
<script type="text/javascript" src="/content/js/jquery-1.8.2.min.js"></script>
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
		 if(!isset($_GET['all']))  $dadda="where n2>0";
	    //  $sql2p="select * from conceptnet_frame $dadda order by relation_id asc,n2 desc";
	 // $res=$DB->query($sql2p);
         foreach($cpr as $k=>$v)
		 { if($k<33)continue;
            ?>
   <option value="<?=$k?>" <? if($d==83) echo "selected";?>><?=$v?></option>
        <?  }	?>
	</select> 
	</select> 分类<select name="sort" >
	 <?php 
 
foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" <? if($k==$pDa['sort']) echo 'selected="selected"';?> ><?=$v?></option>	
<?php } ?></select>
	<? if(ROLE=='admin'):?><br>名称：<textarea name="addname" rows="4" /></textarea><? else:?>
    名称：<input name="addname"  type="text" value="" style="width:120px;"/>
    <? endif;?>
   
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
		});" title="添加"><img src="/view/jss/tijiao.gif"></a>
	</form>
</div>
