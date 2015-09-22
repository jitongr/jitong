<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

<div id="m">
<form action="./index.php?action=savelog" method="post">
标题：<br /><input type="text" name="title" value="<?php echo $title; ?>" /><br />
分类：<br />
	      <select name="sort" id="sort">
			<?php
			$sorts[] = array('sid'=>-1, 'sortname'=>'选择分类...');
				$sorts[] = array('sid'=>-2, 'sortname'=>'祭童');
					$sorts[] = array('sid'=>-3, 'sortname'=>'苦难');
						$sorts[] = array('sid'=>-4, 'sortname'=>'童贞');
							$sorts[] = array('sid'=>-5, 'sortname'=>'打');
								$sorts[] = array('sid'=>-6, 'sortname'=>'十字架');
			foreach($sorts as $val):
			$flg = $val['sid'] == $sortid ? 'selected' : '';
			?>
			<option value="<?php echo $val['sid']; ?>" <?php echo $flg; ?>><?php echo $val['sortname']; ?></option>
			<?php endforeach; ?>
	      </select>
<br />
内容：<br /><textarea name="content" class="texts"><?php echo $content; ?></textarea><br />
摘要：<br /><textarea name="excerpt" class="excerpt"><?php echo $excerpt; ?></textarea><br />
标签：<br /><input type="text" name="tag" value="<?php echo $tagStr; ?>" /><br />
<input type="hidden" name="gid" value=<?php echo $logid; ?> />
<input type="hidden" name="author" value=<?php echo $author; ?> />
<input name="date" type="hidden" value="<?php print !empty($date) ? gmdate('Y-m-d H:i:s', $date) : ''; ?>" />
<input type="submit" value="发布日志" />
</form>
</div>
