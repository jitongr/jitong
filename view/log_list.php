<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
<?php foreach($logs as $value): ?>
	<h2><?php //topflg($value['top']); ?><a href="/jitong/?post=<?php echo $value['gid']; ?>"><?php echo $value['log_title']; ?></a></h2>
	<p class="date">作者：<?=$value['author']?> 发布于：<?php echo $value['addtime']; ?>修改：<?php echo $value['edittime']; ?> 
	<?=$jtsort[$value['sortid']]; ?> 
	<?php // editflg($value['logid'],$value['author']); ?>
	</p>
	<?php echo $value['log_description']; ?>
	<p class="att"><?php //blog_att($value['logid']); ?></p>
	<p class="tag"><?php //blog_tag($value['logid']); ?></p>
	<p class="count">
	评论(<?php echo $value['comnum']; ?>)
	引用(<?php echo $value['tbcount']; ?>)
	<a href="/jitong/?post=<?php echo $value['gid']; ?>">浏览(<?php echo $value['views']; ?>)</a>
	</p>
	<div style="clear:both;"></div>
<?php endforeach; ?>

<div id="pagenavi">
	<?php echo $page_url;?>
</div>

</div><!-- end #contentleft-->
<?php
 include View::getView('side');
?>