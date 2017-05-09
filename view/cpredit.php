<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

 <img src="/m/images/fav.gif" title="<?php echo $value['concept1_id'].'与'.$value['concept2_id']; ?>">
<?=$value['relation_id'].".".$value['best_frame_id']?>
<img src="/m/images/moderator.gif"><?=date('Y-m-d H:i:s',$value['edittime'])?>
  <img src="/m/images/info.gif" title="a1 <?=$value['atop1']?>,<?=$value['aleft1']?> a2 <?=$value['atop2']?>,<?=$value['aleft2']?> i1 <?=$value['itop1']?>,<?=$value['ileft1']?> i2 <?=$value['itop2']?>,<?=$value['ileft2']?>" />
  <form method='post' action='docp.php?cp=<?=$cpid?>&aid=<?=$rid?>' >
 <table>
 
 <tr> <td  >
      <select  name="best_frame_id" >
           <?
       if(ROLE!='admin') $dadda="where n2>0";
      $sql2p="select * from conceptnet_frame $dadda order by relation_id asc,n1 desc";
	  $res=$DB->query($sql2p);
         while($arr=$DB->fetch_array($res))
                {
            ?>
   <option value="<?=$arr['id']?>" <? if($value['best_frame_id']>0 && $arr['id']==$value['best_frame_id'] || $value['best_frame_id']==0 && $arr['relation_id']==$value['relation_id']) echo "selected";?>>
         【<?=$arr['relation_id']?>】<?=$arr['text']?>(<?=$arr['n2']?>)
        </option>
        <?  }	?>
        </select></td>
 </tr>
   <tr>
  <td>图片尺寸<input style="width:60px;" value="<?php  echo $value['imgsize'.$fx]; ?>"  name="imgsize<?=$fx?>" /></td></tr>
   <tr>
    <td>位置 上<input style="width:50px;"  value="<?php echo $value[$m.'top'.$fx]; ?>"  name="<?php echo $m.'top'.$fx; ?>" />左<input style="width:50px;"  value="<?php echo $value[$m.'left'.$fx]; ?>"  name="<?php echo $m.'left'.$fx; ?>" /> </td>
    </tr>
 
  
  <tr><td  ><input  type='submit' value='提交'/></td></tr>
  </table>
    </form>