<?php
/**
 * 日志、页面管理
 *
 * @copyright (c) Emlog All Rights Reserved
 * $Id: log_model.php 2018 2011-08-29 16:02:06Z emloog $
 */

class Log_Model {

	private $db;

	function __construct() {
		$this->db = MySql::getInstance();
	}

	/**
	 * 添加日志、页面
	 *
	 * @param array $logData
	 * @return int
	 */
	function addlog($logData) {
		$kItem = array();
		$dItem = array();
		foreach ($logData as $key => $data) {
			$kItem[] = $key;
			$dItem[] = $data;
		}
		$field = implode(',', $kItem);
		$values = "'" . implode("','", $dItem) . "'";
		$this->db->query("INSERT INTO " . DB_PREFIX . "blog ($field) VALUES ($values)");
		$logid = $this->db->insert_id();
		return $logid;
	}

	/**
	 * 更新日志内容
	 *
	 * @param array $logData
	 * @param int $blogId
	 */
	function updateLog($logData, $blogId) {
	/*	$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE gid=$blogId ";
		$res = $this->db->query($sql);
		$row = $this->db->fetch_array($res);
			$kItem = array();
		$dItem = array();
		foreach ($row as $key => $data) {
			$kItem[] = $key;
			$dItem[] = addslashes($data);
		}
		$gip=getIp();   
	$ltime = time();
		$field = implode(',', $kItem);
		$values = "'" . implode("','", $dItem) . "'";
		$this->db->query("INSERT INTO " . DB_PREFIX . 
		"blog_history ($field ,moddate,moduid,modip) 
		VALUES ($values ,'".$ltime."','".UID."','$gip')");
		*/
		
		$author = ROLE == 'admin' ? '' : 'and author=' . UID;
		$Item = array();
		foreach ($logData as $key => $data) {
			$Item[] = "$key='$data'";
		}
		$upStr = implode(',', $Item);
		$this->db->query("UPDATE " . DB_PREFIX . "blog SET $upStr WHERE gid=$blogId $author");
	}

	function updateLog2($logData, $blogId) {
		$author = ROLE == 'admin' ? '' : 'and author=' . UID;
		$Item = array();
		foreach ($logData as $key => $data) {
			$Item[] = "$key='$data'";
		}
		$upStr = implode(',', $Item);
		$this->db->query("UPDATE " . DB_PREFIX . "blog SET $upStr WHERE gid=$blogId $author");
	}
	/**
	 * 获取指定条件的日志条数
	 *
	 * @param int $spot 0:前台 1:后台
	 * @param string $hide
	 * @param string $condition
	 * @param string $type
	 * @return int
	 */
	function getLogNum($condition = '') {
		$res = $this->db->query("SELECT gid FROM " . DB_PREFIX . "blog WHERE hide='s' $condition");
		$LogNum = $this->db->num_rows($res);
		return $LogNum;
	}

	/**
	 * 后台获取单条日志
	 */
	function getOneLogForAdmin($blogId) {
	//	$timezone = Option::get('timezone');
		$author = ROLE == 'admin' ? '' : 'AND author=' . UID;
		$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE gid=$blogId $author";
		$res = $this->db->query($sql);
		if ($this->db->affected_rows() < 1) {
			emMsg('权限不足！', './');
		}
		$row = $this->db->fetch_array($res);
		if ($row) {
			$row['date'] = $row['date'] + $timezone * 3600;
			$row['title'] = htmlspecialchars($row['title']);
			$row['content'] = htmlspecialchars($row['content']);
			$row['excerpt'] = htmlspecialchars($row['excerpt']);
			$row['password'] = htmlspecialchars($row['password']);
			$logData = $row;
			return $logData;
		}else {
			return false;
		}
	}

	/**
	 * 前台获取单条日志
	 */
	function getOneLogForHome($blogId) {
		//$timezone = Option::get('timezone');
		$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE gid=$blogId ";
		//if(ROLE != 'admin' )
		// $sql.="and type='blog'";		
		$res = $this->db->query($sql);
		$row = $this->db->fetch_array($res);
		if ($row) {
			$logData = array(
			    'log_title' => htmlspecialchars($row['title']),
				'timestamp' => $row['date'],
				'date' => $row['date'] + $timezone * 3600,
				'logid' => intval($row['gid']),
				'sortid' => intval($row['sortid']),
				'type' => $row['type'],
				'author' => $row['author'],
				'tbscode' => substr(md5(gmdate('YndG')), 0, 6),
				'log_content' => rmBreak($row['content']),
				'views' => intval($row['views']),
				'comnum' => intval($row['comnum']),
				'tbcount' => intval($row['tbcount']),
				'top' => $row['top'],
				'attnum' => intval($row['attnum']),
				'allow_remark' => $row['allow_remark'],
				'allow_tb' => $row['allow_tb'],
				'password' => $row['password']
				);
			return $logData;
		}else {
			return false;
		}
	}

	/**
	 * 后台获取日志列表
	 *
	 * @param string $condition
	 * @param string $hide_state
	 * @param int $page
	 * @param string $type
	 * @return array
	 */
	function getLogsForAdmin($condition = '', $hide_state = '', $page = 1, $type = '') {
		//$timezone = Option::get('timezone');
	//	$perpage_num = Option::get('admin_perpage_num');
	if($type!='')
$ttpp="type='$type'";
		$start_limit = !empty($page) ? ($page - 1) * $perpage_num : 0;
		$author = ROLE == 'admin' ? '' : 'and author=' . UID;
		$hide_state = $hide_state ? "and hide='$hide_state'" : '';
		$limit = "LIMIT $start_limit, " . $perpage_num;
		$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE $ttpp $author $hide_state $condition $limit";
		$res = $this->db->query($sql);
		$logs = array();
		while ($row = $this->db->fetch_array($res)) {
			$row['date'] = gmdate("Y-m-d H:i", $row['date'] + $timezone * 3600);
			$row['title'] = !empty($row['title']) ? htmlspecialchars($row['title']) : 'No Title';
			$row['gid'] = $row['gid'];
			$row['comnum'] = $row['comnum'];
			$row['istop'] = $row['top'] == 'y' ? "<font color=\"red\">[置顶]</font>" : '';
			$row['attnum'] = $row['attnum'] > 0 ? "<font color=\"green\">[附件:" . $row['attnum'] . "]</font>" : '';
			$logs[] = $row;
		}
		return $logs;
	}

	/**
	 * 前台获取日志列表
	 *
	 * @param string $condition
	 * @param int $page
	 * @param int $perPageNum
	 * @return array
	 */
	function getLogsForHome($condition = '', $page = 1, $perPageNum) {

		$start_limit = !empty($page) ? ($page - 1) * $perPageNum : 0;
		$limit = $perPageNum ? "LIMIT $start_limit, $perPageNum" : '';
		$sql = "SELECT b.*,s.sortname  FROM " . DB_PREFIX . "blog b 
		left join " . DB_PREFIX . "sort s on s.sid=b.sortid WHERE b.hide='s' $condition $limit";

		$res = $this->db->query($sql);
		$logs = array();
		while ($row = $this->db->fetch_array($res)) {
			$row2['date'] = date("Y-m-d H:i:s",$row['date']);
			$row2['title'] = ($row['title']);
			$row2['logid'] = $row['gid'];
	        $row2['pic'] = '';
            $row2['author'] = '';
			$row2['content'] = strip_tags(subString($row['content'],0,200));
			$row2['brand'] = $row['sortname'];
			$logs[]=$row2;
		}
		return $logs;
	}
function getLogsForHome2($condition = '', $page = 1, $perPageNum,$type='') {

		$start_limit = !empty($page) ? ($page - 1) * $perPageNum : 0;
		$limit = $perPageNum ? "LIMIT $start_limit, $perPageNum" : '';
		if(!empty($type)){
			$hstate =" and type='$type'";
		}
		$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE hide='s' $hstate $condition $limit";
		
		$res = $this->db->query($sql);
		$logs = array();
		while ($row = $this->db->fetch_array($res)) {

			$row['log_title'] = htmlspecialchars(trim($row['title']));
			//$row['log_url'] = Url::log($row['gid']);
			$row['logid'] = $row['gid'];
		    $cookiePassword = isset($_COOKIE['em_logpwd_' . $row['gid']]) ? addslashes(trim($_COOKIE['em_logpwd_' . $row['gid']])) : '';
            if (!empty($row['password']) && $cookiePassword != $row['password']) {
                $row['excerpt'] = '<p>[该日志已设置加密，请点击标题输入密码访问]</p>';
            }else {
                if (!empty($row['excerpt'])) {
                    $row['excerpt'] .= '<p class="readmore"><a href="' . Url::log($row['logid']) . '">阅读全文&gt;&gt;</a></p>';
                }
            }
			$row['log_description'] = empty($row['excerpt']) ? breakLog($row['content'], $row['gid']) : $row['excerpt'];

			$logs[] = $row;
		}
		return $logs;
	}
	/**
	 * 删除日志
	 *
	 * @param int $blogId
	 */
	function deleteLog($blogId) {
		emMsg('功能禁用！', './');exit;
		$author = ROLE == 'admin' ? '' : 'and author=' . UID;
		$this->db->query("DELETE FROM " . DB_PREFIX . "blog where gid=$blogId $author");
		if ($this->db->affected_rows() < 1) {
			emMsg('权限不足！', './');
		}
		// 评论
		$this->db->query("DELETE FROM " . DB_PREFIX . "comment where gid=$blogId");
		// 引用
		$this->db->query("DELETE FROM " . DB_PREFIX . "trackback where gid=$blogId");
		// 标签
		$this->db->query("UPDATE " . DB_PREFIX . "tag SET gid= REPLACE(gid,',$blogId,',',') WHERE gid LIKE '%" . $blogId . "%' ");
		$this->db->query("DELETE FROM " . DB_PREFIX . "tag WHERE gid=',' ");
		// 附件
		$query = $this->db->query("select filepath from " . DB_PREFIX . "attachment where blogid=$blogId ");
		while ($attach = $this->db->fetch_array($query)) {
			if (file_exists($attach['filepath'])) {
				$fpath = str_replace('thum-', '', $attach['filepath']);
				if ($fpath != $attach['filepath']) {
					@unlink($fpath);
				}
				@unlink($attach['filepath']);
			}
		}
		$this->db->query("DELETE FROM " . DB_PREFIX . "attachment where blogid=$blogId");
	}

	/**
	 * 隐藏/显示日志
	 *
	 * @param int $blogId
	 * @param string $hideState
	 */
	function hideSwitch($blogId, $hideState) {
		$this->db->query("UPDATE " . DB_PREFIX . "blog SET hide='$hideState' WHERE gid=$blogId");
		$this->db->query("UPDATE " . DB_PREFIX . "comment SET hide='$hideState' WHERE gid=$blogId");
		$Comment_Model = new Comment_Model();
		$Comment_Model->updateCommentNum($blogId);
	}
	function chtype($blogId, $types) {
		$this->db->query("UPDATE " . DB_PREFIX . "blog SET `type`='$types' WHERE gid=$blogId");
	}

	/**
	 * 获取日志发布时间
	 *
	 * @param int $timezone
	 * @param string $postDate
	 * @param string $oldDate
	 * @return date
	 */
	function postDate($timezone = 8, $postDate = null, $oldDate = null) {
		//$timezone = Option::get('timezone');
		$localtime = time();
		$logDate = $oldDate ? $oldDate : $localtime;
		$unixPostDate = '';
		if ($postDate) {
			$unixPostDate = emStrtotime($postDate);
			if ($unixPostDate === false) {
				$unixPostDate = $logDate;
			}
		} else {
			return $localtime;
		}
		return $unixPostDate;
	}

	/**
	 * 增加阅读次数
	 *
	 * @param int $blogId
	 */
	function updateViewCount($blogId) {
		$this->db->query("UPDATE " . DB_PREFIX . "blog SET views=views+1 WHERE gid=$blogId");
	}

	/**
	 * 判断是否重复发文
	 */
	function isRepeatPost($title, $time) {
		$sql = "SELECT gid FROM " . DB_PREFIX . "blog WHERE title='$title' and date='$time' LIMIT 1";
		$res = $this->db->query($sql);
		$row = $this->db->fetch_array($res);
		return isset($row['gid']) ? (int)$row['gid'] : false;
	}

	/**
	 * 获取相邻日志
	 *
	 * @param int $date unix时间戳
	 * @return array
	 */
	function neighborLog($date) {
		$neighborlog = array();
		$neighborlog['nextLog'] = $this->db->once_fetch_array("SELECT title,gid FROM " . DB_PREFIX . "blog WHERE date < $date and hide = 'n' and type='blog' ORDER BY date DESC LIMIT 1");
		$neighborlog['prevLog'] = $this->db->once_fetch_array("SELECT title,gid FROM " . DB_PREFIX . "blog WHERE date > $date and hide = 'n' and type='blog' ORDER BY date LIMIT 1");
		if ($neighborlog['nextLog']) {
			$neighborlog['nextLog']['title'] = htmlspecialchars($neighborlog['nextLog']['title']);
		}
		if ($neighborlog['prevLog']) {
			$neighborlog['prevLog']['title'] = htmlspecialchars($neighborlog['prevLog']['title']);
		}
		return $neighborlog;
	}

	/**
	 * 随机获取指定数量日志
	 *
	 * @param int $num
	 * @return array
	 */
	function getRandLog($num) {
		$sql = "SELECT gid,title FROM " . DB_PREFIX . "blog WHERE hide='n' and type='blog' ORDER BY rand() LIMIT 0, $num";
		$res = $this->db->query($sql);
		$logs = array();
		while ($row = $this->db->fetch_array($res)) {
			$row['gid'] = intval($row['gid']);
			$row['title'] = htmlspecialchars($row['title']);
			$logs[] = $row;
		}
		return $logs;
	}

	/**
	 * 处理日志别名，防止别名重复
	 *
	 * @param string $alias
	 * @param array $logalias_cache
	 * @param int $logid
	 */
    function checkAlias($alias, $logalias_cache, $logid) {
    	static $i=2;
    	$key = array_search($alias, $logalias_cache);
        if (false !== $key && $key != $logid) {
        	if($i == 2) {
        		$alias .= '-'.$i;
        	}else{
        		$alias = preg_replace("|(.*)-([\d]+)|", "$1-{$i}", $alias);
        	}
    		$i++;
    		return $this->checkAlias($alias, $logalias_cache, $logid);
   		}
   		return $alias;
    }

	/**
	 * 加密日志访问验证
	 *
	 * @param string $pwd
	 * @param string $pwd2
	 */
	function authPassword($postPwd, $cookiePwd, $logPwd, $logid) {
		$url = BLOG_URL;
		$pwd = $cookiePwd ? $cookiePwd : $postPwd;
		if ($pwd !== addslashes($logPwd)) {
			echo <<<EOT
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>emlog message</title>
<style type="text/css">
<!--
body{background-color:#F7F7F7;font-family: Arial;font-size: 12px;line-height:150%;}
.main{background-color:#FFFFFF;margin-top:20px;font-size: 12px;color: #666666;width:580px;margin:10px 200px;padding:10px;list-style:none;border:#DFDFDF 1px solid;}
-->
</style>
</head>
<body>
<div class="main">
<form action="" method="post">
请输入该日志的访问密码<br>
<input type="password" name="logpwd" /><input type="submit" value="进入.." />
<br /><br /><a href="$url">&laquo;返回首页</a>
</form>
</div>
</body>
</html>
EOT;
			if ($cookiePwd) {
				setcookie('em_logpwd_' . $logid, ' ', time() - 31536000);
			}
			exit;
		}else {
			setcookie('em_logpwd_' . $logid, $logPwd);
		}
	}
}
