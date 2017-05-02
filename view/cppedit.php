<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<style type="text/css" id="internalStyle">
body{background-color:#FFFFFF; font-size:14px; margin: 0; padding:0;}
</style>
<body>
<span title="<?php echo $pDa['id']; ?>">
☆<?php echo $pDa['text'];//print_r($pDa); ?>&nbsp;</span>
<span title="（前向<?php echo $pDa['f1']; ?>后向<?php echo $pDa['f2']; ?>）旧<?php echo $pDa['num_assertions']; ?>">关联数<?php echo $pDa['f3']; ?> </span>查看<?php echo $pDa['words']; ?>次
  <form id="fttz" method='post' action='docp.php?cp=<?=$cpidd?>&ecdid=<?=$pDa['id']?>'>
  <table style=" font-size:14px;">
 <? if(ROLE=='admin'):?>    
  <tr><td>名称<input style="width:60px;" value="<?php echo $pDa['text']; ?>"  name="text" /></td><td> </td>
  </tr>
  <? endif;?> 
   <tr>
    <td>图片ID<input style="width:60px;" value="<?php if($pDa['imgid'])echo $pDa['imgid']; ?>"  name="imgid" /></td>
    <td>图片尺寸<input style="width:60px;" value="<?php if($pDa['imgsize'])echo $pDa['imgsize']; ?>"  name="imgsize" /></td>
    </tr>
    <tr><td>图片位置上<input style="width:30px;" id="top0" value="<?php echo $pDa['ctop']; ?>"  name="ctop" /></td>
    <td>左<input style="width:30px;" id="left0" value="<?php echo $pDa['cleft']; ?>"  name="cleft" /><span title="可通过位置编辑调整">？</span></td>
  </tr><tr>
    <td>链接<input style="width:80px;" value="<?php echo $pDa['url']; ?>"  name="url" /></td>
     <td>关联文章ID<input style="width:40px;" value="<?php echo $pDa['blogid']; ?>"  name="blogid" /></td>
     </tr>
     <tr><td>分类<select name="sort" >
	 <?php 
	foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" <? if($k==$pDa['sort']) echo 'selected="selected"';?> ><?=$v?></option>	
<?php } ?></select></td>
     <td>显示C <select name="visible" >
<?php if(ROLE=='admin'){ $subs[2]='推荐';$subs[-2]='删除';}$subs[-1]='仅自己见';
	$subs[0]='登录可见';$subs[1]='正常';
foreach ($subs as $k=>$v) {	
?><option value="<?=$k?>" <? if($k==$pDa['visible']) echo 'selected="selected"';?> ><?=$v?></option>	
<?php } ?>	
	  </select></td>
      </tr>
      <tr>
    <td colspan="2"><textarea name="info"  style="width:300px;height:80px;"/><?php echo $pDa['info']; ?></textarea></td>
      
  </tr>
  <tr><td><input  type='submit' value='提交'/></td></tr>
  </table>
    </form>
</body>