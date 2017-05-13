<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
 <script type="text/javascript" src="/scan/artDialog/artDialog.js?skin=green"></script>
<script type="text/javascript" src="/scan/artDialog/jquery.artDialog.js"></script>
<script src="/scan/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/content/js/jquery-1.8.2.min.js"></script>

<div id="m">
   	<li>
	<h3><span>思维</span></h3>
	<ul id="logserch">
	<form name="keycp" method="get" >
	    <select name="fre"  >
	    <?
		 if(!isset($_GET['all']))  $dadda="where n2>0";
      $sql2p="select * from conceptnet_frame $dadda order by relation_id asc,n2 desc";
	  $res=$DB->query($sql2p);
         while($arr=$DB->fetch_array($res))
                {
            ?>
   <option value="<?=$arr['id']?>" <? if($arr['id']==$freid) echo "selected";?>>
         【<?=$arr['relation_id']?>】<?=$arr['text']?>(<?=$arr['n2']?>)
        </option>
        <?  }	?>
	</select> 
	<input type="submit" id="logserch_logserch" value="查看" />
	</form>
	</ul>
	</li>
    
<div class="comcont">

<?php 
	if(0){?>
    <a href="/m/?action=aishow&cp=<?=$cpidd?>">刷新</a>
    <a href="/m/?cp=<?=$cpidd?>">导图 </a>
    <a href="/m/ainet.php?cp=<?=$cpidd?>">导图编辑</a>
    <?php } ?>
</div>   
===========================<br>
	<?php 
	if(ISLOGIN === true)
while ($value = $DB->fetch_array($res2)) {
?>
<div class="comcont" >
&nbsp;
<?php  
$a1="<a href='/m/?action=aishow&cp=".$value['concept1_id']."'>".$value['cp1']."</a>";
$a2="<a href='/m/?action=aishow&cp=".$value['concept2_id']."'>".$value['cp2']."</a>";
$ss=str_replace("{1}",'{'.$a1.'}',$cpr[$value['best_frame_id']]);
			   $ss=str_replace("{2}",'{'.$a2.'}',$ss);
		echo $ss; ?> 
  <span title="<?php echo $value['aid'].':'.$value['relation_id'].'.'.$value['best_frame_id']; ?>">(<?=$cpr[$value['relation_id']]?>)</span>
&nbsp;&nbsp;
<span onclick="mark(this,<?=$value['aid']?>,'goodr')">
<img src="/m/images/thread_rate.gif"><?php echo $value['good']; ?></span>
    <span onclick="mark(this,<?=$value['aid']?>,'badr')">
    <img src="/m/images/disagree.gif"><?php echo $value['bad']; ?></span>
<span onclick="ed(this,<?=$value['concept1_id']?>,<?=$value['aid']?>,'<?=$value['cp1'].'--'.$value['cp2']?>')"><img src='/m/images/edt.gif'></span>
<?php }else {
	while ($value = $DB->fetch_array($res2)) {
?>
<div class="comcont" >
<?php  
$a1="<span onclick='dotu(".$value['concept1_id'].")'>".$value['cp1']."</span>";
$a2="<span onclick='dotu(".$value['concept2_id'].")'>".$value['cp2']."</span>";
$ss=str_replace("{1}",'{'.$a1.'}',$cpr[$value['best_frame_id']]);
			   $ss=str_replace("{2}",'{'.$a2.'}',$ss);
		echo $ss; ?>
        <span title="<?php echo $value['aid'].':'.$value['relation_id'].'.'.$value['best_frame_id']; ?>">(<?=$cpr[$value['relation_id']]?>)</span>
&nbsp;&nbsp;
<span onclick="mark(this,<?=$value['aid']?>,'goodr')">
<img src="/m/images/thread_rate.gif"><?php echo $value['good']; ?></span>
    <span onclick="mark(this,<?=$value['aid']?>,'badr')">
    <img src="/m/images/disagree.gif"><?php echo $value['bad']; ?></span>

</div>
<?php }}?>
</div>
==========================<br>

</div>
<SCRIPT type=text/javascript>
 function dotu(id){
	  var temp = document.createElement("form");         
   temp.action = '/m/index.php?action=aishow';         
   temp.method = "post";         
   temp.style.display = "none"; 
   var opt = document.createElement("input");         
      opt.name = 'cp';         
        opt.value = id;         
       temp.appendChild(opt);  
	   opt = document.createElement("input"); 
	      opt.name = 'valid';         
        opt.value = <?php echo $valid;?>;         
       temp.appendChild(opt); 
   document.body.appendChild(temp);         
   temp.submit();         
   return temp;
 }

	function mark(t,id,opt){
    var ord = {}; ord[opt] =id;
	$.ajax({
				url:'/m/docp.php',
				type:'POST',
				data:ord,
				success: function(data){ 
				if(opt=="goodr")
					 t.innerText="已赞";	else	
					 t.innerText="已踩";				
				}
		});	
	}
	function ed(t,cp1,id,nm){
art.dialog.open("docp.php?m=a&cp="+cp1+"&editid="+id+"1", { 
follow: t,width: 300, height: 260,title:nm+id} );	
	}
</script>