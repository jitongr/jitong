<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script charset="utf-8" src="/admin/editor/kindeditor.js"></script>
<style type="text/css" id="internalStyle">
body{background-color:#FFFFFF; font-size:14px; margin: 0; padding:0;}
</style>
<body>
<span title="<?php echo $pDa['id']; ?>">
☆<?php echo $pDa['text'];//print_r($pDa); ?>&nbsp;</span>
<span title="">关联数<?php echo $pDa['f3']; ?> </span>查看<?php echo $pDa['words']; ?>次
 <?=date('Y-m-d H:i:s',$pDa['edittime'])?>
  <form id="fttz" method='post' action='docp.php?cp=<?=$cpid?>&ecdid=<?=$pDa['id']?>'>
  <table style=" font-size:14px;">
 <? if(ROLE=='admin'):?>    
  <tr><td>名称<input style="width:100px;" value="<?php echo $pDa['text']; ?>"  name="text" /></td><td>me<input style="width:60px;" value="<?php echo $pDa['me']; ?>" name="me" />
  标题<input style="width:100px;" value="<?php echo $pDa['info']; ?>" name="info" /></td>
  </tr>
  <? endif;?> 
   <tr>
    <td>分类<select name="sort" >
	 <?php 
	foreach (getcptype() as $k=>$v) {	
?><option value="<?=$k?>" <? if($k==$pDa['sort']) echo 'selected="selected"';?> ><?=$v?></option>	
<?php } ?></select></td>
    <td>图片<input style="width:400px;" value="<?php echo $pDa['img']==""?"/jty/":$pDa['img']; ?>"  name="img" /></td>
    </tr>
    <tr><td>图片尺寸<input style="width:60px;" value="<?php echo $pDa['imgsize']; ?>"  name="imgsize" /></td>
    <td>图片位置上<input style="width:36px;" id="top0" value="<?php echo $pDa['ctop']; ?>"  name="ctop" />左<input style="width:36px;" id="left0" value="<?php echo $pDa['cleft']; ?>"  name="cleft" />生<input style="width:80px;" value="<?=$pDa['birth']?>"  name="birth" />死<input style="width:80px;" value="<?=$pDa['die']?>"  name="die" />
    年龄<input style="width:50px;" value="<?=$pDa['age']?>"  name="age" /></td>
  </tr>

      <tr>
    <td colspan="2"><textarea id="content" name="content" style="width:560px; height:460px; border:#CCCCCC solid 1px;"><?php echo $pDa['content']; ?></textarea>
          <script>loadEditor('content');</script></td>
      
  </tr>
  <tr><td><input  type='submit' value='提交'/></td></tr>
  </table>
    </form>
</body>