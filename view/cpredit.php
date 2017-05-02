<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

 <img src="/m/images/fav.gif" title="<?php echo $value['concept1_id'].'与'.$value['concept2_id']; ?>"><?=$value['score']?>
<?=$value['relation_id'].".".$value['best_frame_id']?><img src="/m/images/thread_rate.gif"><?php echo $value['good']; ?><img src="/m/images/disagree.gif"><?php echo $value['bad']; ?>
<img src="/m/images/moderator.gif"><span title="<?=$value['creator']?>@<?=date('Y-m-d H:i:s',$value['edittime'])?>"><?=getUser($value['uid'])?>
  <img src="/m/images/info.gif" title="a1 <?=$value['atop1']?>,<?=$value['aleft1']?> a2 <?=$value['atop2']?>,<?=$value['aleft2']?> i1 <?=$value['itop1']?>,<?=$value['ileft1']?> i2 <?=$value['itop2']?>,<?=$value['ileft2']?>" />
  <form method='post' action='docp.php?cp=<?=$cpidd?>&aid=<?=$rid?>' >
 <table>
 
 <tr> <td colspan="2"><input type="hidden" value="<?php echo $value['relation_id']; ?>"  name="relation_id" />
      <select  name="best_frame_id" >
           <?
       if(ROLE!='admin') $dadda="where n1>0";
      $sql2p="select * from conceptnet_frame $dadda order by relation_id asc,n1 desc";
	  $res=$DB->query($sql2p);
         while($arr=$DB->fetch_array($res))
                {
            ?>
   <option value="<?=$arr['id']?>" <? if($value['best_frame_id']>0 && $arr['id']==$value['best_frame_id'] || $value['best_frame_id']==0 && $arr['relation_id']==$value['relation_id']) echo "selected";?>>
         【<?=$arr['relation_id']?>】<?=$arr['text']?>(<?=$arr['n1']?>)
        </option>
        <?  }	?>
        </select></td>
 </tr>
 <tr> <td>图片ID<input style="width:50px;"  value="<?php echo $value['img'.$fx]; ?>"  name="<?php echo 'img'.$fx; ?>" /><a href="/admin/attachment.php" target='_blank'>查看</a></td>
     <td>图片尺寸<input style="width:60px;" value="<?php  echo $value['imgsize'.$fx]; ?>"  name="imgsize<?=$fx?>" /></td>
 </tr>
   <tr>
  <td>位置 上<input style="width:50px;"  value="<?php echo $value[$m.'top'.$fx]; ?>"  name="<?php echo $m.'top'.$fx; ?>" /></td>
    <td>左<input style="width:50px;"  value="<?php echo $value[$m.'left'.$fx]; ?>"  name="<?php echo $m.'left'.$fx; ?>" /><span title="可通过位置编辑调整">？</span></td>
    </tr>
  <tr><td>关联文章ID<input style="width:40px;" value="<?php echo $value['abid']; ?>"  name="abid" /></td><td> <?
       if(ROLE=='admin') {?> 字体大小<input style="width:30px;" value="<?php echo $value['seq']; ?>"  name="seq" /> <? }?></td>
    
    </tr>
    <td colspan="2"><textarea name="infos"  style="width:300px;height:80px;"/><?php echo $pDa['infos']; ?></textarea></td>
  <tr><td colspan="2"><input  type='submit' value='提交'/></td></tr>
  </table>
    </form>