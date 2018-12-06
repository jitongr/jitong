<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script type="text/javascript" src="/asset/base/artDialog/artDialog.js?skin=green"></script>
<script type="text/javascript" src="/asset/base/artDialog/jquery.artDialog.js"></script>
<script src="/asset/base/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/note/js/jquery.min.js"></script>
<script src="/note/js/jquery-ui.min.js"></script> 
<script type="text/javascript"> 
function ed(id){
 var w=300;var h=250;
		//{w=600;h=650}
 art.dialog.open("docp.php?m=a&cp="+id+"&editid="+id+"3", { 
 follow: document.getElementById('th'+id),width: w, height: h,
 title:"<?=$value['text']; ?>--" +id});	
	}
function dch(id){
	var $form=$("#d"+id+"");
	$.ajax({
				url:'?action=liok',
				type:'POST',
				data:$('#d'+id).serialize(),
				success: function(data){
					<? {?>
                     if($("select[name=sort]",$form).val()!=<?=$s==-1?0:$s?>){
	                 $("#k"+id).hide();
	                  }
					<? }?>
					}
	});
}
</script>

<? foreach($p as $k=>$v){ ?>
	 <a href="?action=li&s=<?=$k?>"><?=getcptype($k)?><?=$v?></a> 
	<? } ?>
	<a href="?action=li&s=-2"> 经历</a> 
<div id="m">
<?php while ($value = $DB->fetch_array($query)) { ?><div id="k<?=$value['id']?>">
<div class="title"><a href="?cp=<?php echo $value['id']; ?>"><?php echo $value['id'].' '.$value['text']; ?> <?php echo $value['info']; ?></a>[<?php echo getcptype($value['sort']); ?>] <?php echo strlen($value['content']); ?></div>
<? if($value['img']){ ?><img src="<?=$value['img']?>" style="max-width:600px"><? }?>
<div class="info2">
<?php if(ISLOGIN //&&($value['sort']==0||$value['text']==""||$value['img']=="")
): ?>
<form id="d<?=$value['id']?>">
<? if($value['text']==""){ ?>cp<input style="width:200px;" value=""  name="text" />
<input style="width:50px;" value=""  name="info" /><? }?>
<select name="sort" > <?php foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" <? if($k==$value['sort']) echo 'selected="selected"';?>><?=$v.$p[$k]?></option>	<?php } ?></select>
<? if($value['img']==""){ ?>img<input style="width:400px;" value="/jty/"  name="img" /><? }?>
<input type="hidden" name="id" value="<?=$value['id']?>"><a onClick="dch(<?=$value['id']?>)" ><img src="/m/images/tijiao.gif"></a></form>
<?php endif;?>
<?=date('Y-m-d H:i:s',$value['edittime'])?> <?php echo $value['birth'].'-'.$value['die']; ?><?php echo $value['age']; ?>
关联:<?php echo $value['f3']; ?> 阅读:<?php echo $value['words']; ?> 
<a href="jt.php?id=<?=$value['id']?>">预览</a>
<?php if(ISLOGIN ): ?>
<a href="jt.php?cp=<?=$value['id']?>">编页</a>
<span onclick="ed(<?=$value['id']?>)" id="th<?=$value['id']?>"><b>编辑</b></span>
<?php endif;?>
</div></div>
<?php } ?>
<div id="page"><?php echo $page_url;?></div>
</div>
