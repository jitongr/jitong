<?php
/**
 * mobile 版本
 *
 * @copyright (c) jitongr All Rights Reserved
 */

require_once 'init.php';

define ('TEMPLATE_PATH', EMLOG_ROOT . '/view/');

$isgzipenable = 'n'; //手机浏览关闭gzip压缩
$index_lognum = 10;

$logid = isset ($_GET['post']) ? intval ($_GET['post']) : '';
$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
$cpid = isset ($_GET['cp']) ? intval ($_GET['cp']) : '';
$akey = isset($_GET['aikey']) ? addslashes($_GET['aikey']) : '';
// 首页

if ($action == 'bloglist') {
	$Log_Model = new Log_Model();
	$page = isset($_GET['page']) ? abs(intval ($_GET['page'])) : 1;
	$sqlSegment = "ORDER BY top DESC ,date DESC";
	$lognum = $Log_Model->getLogNum();
	$pageurl = '?action=bloglist&page=';
	$logs = $Log_Model->getLogsForHome ($sqlSegment, $page, $index_lognum);
	$page_url = pagination($lognum, $index_lognum, $page, $pageurl);
    $_SESSION['onm']=1;
	include View::getView('header');
	include View::getView('log');
	include View::getView('footer');
	View::output();
}

if ($action == 'list') {
	$Log_Model = new Log_Model();
	$page = isset($_GET['page']) ? abs(intval ($_GET['page'])) : 1;
	$sqlSegment = "ORDER BY top DESC ,date DESC";
	$lognum = $Log_Model->getLogNum();
	$pageurl = '?page=';
	$logs = $Log_Model->getLogsForHome ($sqlSegment, $page, $index_lognum);
	$page_url = pagination($lognum, $index_lognum, $page, $pageurl);
   echo json_encode($logs);
    exit;
}
if (isset($_GET['aikey']) ) {
	$atitle="查询'".$akey."'的结果：";
		$ltime = time();
	$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
				'keyword','$vsid','0','$uid','$usersina_id','$ltime','$akey','$gip')");
	if(empty ($akey))
	$sql = "SELECT * FROM conceptnet_concept  order by Rand()  LIMIT 20";
	else
	$sql = "SELECT * FROM conceptnet_concept WHERE text LIKE '%$akey%'order by f3 desc LIMIT 1000";
			$res = $DB->query($sql);
		
			while ($row = $DB->fetch_array($res)) {
			
		// $sql2 = "SELECT * FROM conceptnet_assertion WHERE concept1_id='$row[id]' or concept2_id='$row[id]' LIMIT 2";
		$sql2 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,conceptnet_concept.text FROM conceptnet_assertion a LEFT JOIN
		conceptnet_concept ON a.concept2_id=conceptnet_concept.id
		WHERE concept1_id='$row[id]'";
			$aDa = $DB->once_fetch_array($sql2);
		
		$row[tx1]=$aDa[text];
	 $row[re1]=$aDa[relation_id];
	 $row[fi1]=$aDa[best_frame_id];
		 $sql3 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,conceptnet_concept.text FROM conceptnet_assertion a LEFT JOIN
		conceptnet_concept ON a.concept1_id=conceptnet_concept.id
		WHERE concept2_id='$row[id]'";
			$aDa3 = $DB->once_fetch_array($sql3);
		
		$row[tx2]=$aDa3[text];
	 $row[re2]=$aDa3[relation_id];
	 $row[fi2]=$aDa3[best_frame_id];
	$concepts[]=$row;
		}
		$hhtitle=$akey;
    include View::getView('header');
	include View::getView('ailist');
	include View::getView('footer');
	View::output();
}
else
if(empty ($action) && empty ($logid) && empty ($cpid))
{
	$atitle="祭童园：";
		$ltime = time();
	
	
	$sql = "SELECT * FROM cruboy_concept order by Rand()  LIMIT 10";

			$res = $DB->query($sql);
		
			while ($row = $DB->fetch_array($res)) {
			$o.=$row[id].$row[text].' ';
		// $sql2 = "SELECT * FROM cruboy_assertion WHERE concept1_id='$row[id]' or concept2_id='$row[id]' LIMIT 2";
		$sql2 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,cruboy_concept.text FROM cruboy_assertion a LEFT JOIN
		cruboy_concept ON a.concept2_id=cruboy_concept.id
		WHERE concept1_id='$row[id]'";
			$aDa = $DB->once_fetch_array($sql2);
		
		$row[tx1]=$aDa[text];
	 $row[re1]=$aDa[relation_id];
	 $row[fi1]=$aDa[best_frame_id];
		 $sql3 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,cruboy_concept.text FROM cruboy_assertion a LEFT JOIN
		cruboy_concept ON a.concept1_id=cruboy_concept.id
		WHERE concept2_id='$row[id]'";
			$aDa3 = $DB->once_fetch_array($sql3);
		
		$row[tx2]=$aDa3[text];
	 $row[re2]=$aDa3[relation_id];
	 $row[fi2]=$aDa3[best_frame_id];
	$concepts[]=$row;
		}
		$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
				'jt','$vsid','0','$uid','$usersina_id','$ltime','$o','$gip')");
    include View::getView('header');
	include View::getView('cruboy');
	include View::getView('footer');
	View::output();
}

if (!empty ($cpid) ) 
{$usersina_id= intval($_SESSION['oauth2']["user_id"]);
	$DB = MySql::getInstance();
$concepts=array();
$logs1=array();
$atitle="";
$gip=getIp();   
$uid=UID;
		$vsid=intval($_SESSION['views']);
	$ltime = time();
if (ISLOGIN !== true&&(
empty($_SESSION['oauth2']["user_id"])||empty($_SESSION['u_name']))){
$vfr="unlog";
	$sqadd="order by Rand() limit 3000";
}else {
	$vfr="mview";
   $sqadd="order by a.relation_id,a.best_frame_id LIMIT 4000";
}
	$DB->query("UPDATE conceptnet_concept SET words=words+1 WHERE id='$cpid'");
	$sq1 = "SELECT * FROM conceptnet_concept WHERE id='$cpid'";
	$pDa = $DB->once_fetch_array($sq1);
	
	$hhtitle=$pDa[text];
	$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
				'$vfr','$vsid','$cpid','$uid','$usersina_id','$ltime','$pDa[text]','$gip')");
	$sq2 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,conceptnet_concept.* FROM conceptnet_assertion a LEFT JOIN
		conceptnet_concept ON a.concept2_id=conceptnet_concept.id
		WHERE concept1_id='$cpid' $sqadd";
	$res2 = $DB->query($sq2);
	while ($row = $DB->fetch_array($res2)) {
			if($row[best_frame_id]>0){		
			$sqqq1="SELECT text FROM conceptnet_frame WHERE id='$row[best_frame_id]'";
			$qDq = $DB->once_fetch_array($sqqq1);
			$ss=str_replace("1",$pDa[text],$qDq[text]);
			$ss=str_replace("2",$row[text],$ss);
			$row[frame]=$ss;
			}
			$sqqq2="SELECT name FROM conceptnet_relation WHERE id='$row[relation_id]'";
			 $qDq2 = $DB->once_fetch_array($sqqq2);
			 $row[rela]=$qDq2[name];
			 
			$concepts[]=$row;
			}
	$concepts2=array();
	$sq3 = "SELECT a.concept1_id,a.concept2_id,
		a.relation_id,a.best_frame_id,conceptnet_concept.* FROM conceptnet_assertion a LEFT JOIN
		conceptnet_concept ON a.concept1_id=conceptnet_concept.id
		WHERE concept2_id='$cpid' $sqadd";
		$res3 = $DB->query($sq3);
	while ($row2 = $DB->fetch_array($res3)) {
		if($row2[best_frame_id]>0){		
			$sqqqq1="SELECT text FROM conceptnet_frame WHERE id='$row2[best_frame_id]'";
			$qDqq = $DB->once_fetch_array($sqqqq1);
			
			$sss=str_replace("2",$pDa[text],$qDqq[text]);
			$sss=str_replace("1",$row2[text],$sss);
			$row2[frame]=$sss;
			}
			$sqqqq2="SELECT name FROM conceptnet_relation WHERE id='$row2[relation_id]'";
			 $qDqq2 = $DB->once_fetch_array($sqqqq2);
			 $row2[rela]=$qDqq2[name];
		$concepts2[]=$row2;
		}
	include View::getView('header');
	include View::getView('aishow');
	include View::getView('footer');
	View::output();
}
// 日志
if (!empty ($logid)) {
	$Log_Model = new Log_Model();
	$Comment_Model = new Comment_Model();

	$logData = $Log_Model->getOneLogForHome($logid);
	if ($logData === false) {
		mMsg ('不存在该条目', './');
	}
	extract($logData);
	if (!empty($password)) {
		$postpwd = isset($_POST['logpwd']) ? addslashes(trim ($_POST['logpwd'])) : '';
		$cookiepwd = isset($_COOKIE ['em_logpwd_' . $logid]) ? addslashes(trim($_COOKIE ['em_logpwd_' . $logid])) : '';
		authPassword ($postpwd, $cookiepwd, $password, $logid);
	}

//	$user_cache = $CACHE->readCache('user');
	$commentPage = isset($_GET['comment-page']) ? intval($_GET['comment-page']) : 1;

	$comments = $Comment_Model->getComments(2, $logid, 'n', $commentPage);
	extract($comments);
	$Log_Model->updateViewCount($logid);
	include View::getView('header');
	include View::getView('single');
	include View::getView('footer');
	View::output();
}
if (ISLOGIN === true && $action == 'write') {
	$logid = isset($_GET['id']) ? intval($_GET['id']) : '';
	$Sort_Model = new Sort_Model();
	$sorts = $Sort_Model->getSorts();
	if ($logid) {
		$Log_Model = new Log_Model();
		$Tag_Model = new Tag_Model();

		$blogData = $Log_Model->getOneLogForAdmin($logid);
		extract($blogData);
		$tags = array();
		foreach ($Tag_Model->getTag($logid) as $val) {
			$tags[] = $val['tagname'];
		}
		$tagStr = implode(',', $tags);
	}else {
		$title = '';
		$sortid = -1;
		$content = '';
		$excerpt = '';
		$tagStr = '';
		$logid = -1;
		$author = UID;
		$date = '';
	}
	include View::getView('header');
	include View::getView('write');
	include View::getView('footer');
	View::output();
}
if (ISLOGIN === true && $action == 'savelog') {
	$Log_Model = new Log_Model();
	$Tag_Model = new Tag_Model();

	$title = isset($_POST['title']) ? addslashes(trim($_POST['title'])) : '';
	$sort = isset($_POST['sort']) ? intval($_POST['sort']) : '';
	$content = isset($_POST['content']) ? addslashes(trim($_POST['content'])) : '';
	$excerpt = isset($_POST['excerpt']) ? addslashes(trim($_POST['excerpt'])) : '';
	$tagstring = isset($_POST['tag']) ? addslashes(trim($_POST['tag'])) : '';
	$blogid = isset($_POST['gid']) ? intval(trim($_POST['gid'])) : -1;
	$date = isset($_POST['date']) ? addslashes($_POST['date']) : '';
	$author = isset($_POST['author']) ? intval(trim($_POST['author'])) : UID;
	$postTime = $Log_Model->postDate(0, $date);	

	$logData = array('title' => $title,
		'content' => $content,
		'excerpt' => $excerpt,
		'author' => $author,
		'sortid' => $sort,
		'date' => $postTime,
		'allow_remark' => 'y',
		'allow_tb' => 'y',
		'hide' => 'n',
		'type' => 'page',
		'password' => ''
		);

	if ($blogid > 0) {
		$Log_Model->updateLog($logData, $blogid);
		$Tag_Model->updateTag($tagstring, $blogid);
	}else {
		$blogid = $Log_Model->addlog($logData);
		$Tag_Model->addTag($tagstring, $blogid);
	}
	//$CACHE->updateCache();
	emDirect("./");
}
if (ISLOGIN === true && $action == 'dellog') {
	$Log_Model = new Log_Model();
	$id = isset($_GET['gid']) ? intval($_GET['gid']) : -1;
	$Log_Model->deleteLog($id);
	$CACHE->updateCache();
	emDirect("./");
}
// 评论
if (ISLOGIN === true && $action == 'addcom') {
	$Comment_Model = new Comment_Model();

	$content = isset($_POST['comment']) ? addslashes(trim($_POST['comment'])) : '';
    $mail = isset($_POST['commail']) ? addslashes(trim($_POST['commail'])) : '';
    $url = isset($_POST['comurl']) ? addslashes(trim($_POST['comurl'])) : '';
    $imgcode = isset($_POST['imgcode']) ? strtoupper(trim($_POST['imgcode'])) : '';
    $blogId = isset($_GET['gid']) ? intval($_GET['gid']) : - 1;
    $pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;

      //  $CACHE = Cache::getInstance();
     //   $user_cache = $CACHE->readCache('user');
	//	$name = addslashes($user_cache[UID]['name_orig']);

	if($Comment_Model->isLogCanComment($blogId) === false){
        mMsg('评论失败：该日志已关闭评论','./?post=' . $blogId);
    } elseif ($Comment_Model->isCommentExist($blogId, $name, $content) === true){
        mMsg('评论失败：已存在相同内容评论','./?post=' . $blogId);

    } elseif ($mail != '' && !checkMail($mail)) {
        mMsg('评论失败：邮件地址不符合规范', './?post=' . $blogId);
    } elseif (ISLOGIN == false && $Comment_Model->isNameAndMailValid($name, $mail) === false){
        mMsg('评论失败：禁止使用管理员昵称或邮箱评论','./?post=' . $blogId);
    } elseif (strlen($content) == '' || strlen($content) > 2000) {
        mMsg('评论失败：内容不符合规范','./?post=' . $blogId);

    } else {
		$DB = MySql::getInstance();
        $ipaddr = getIp();
		$utctimestamp = time();

		if($pid != 0) {
			$comment = $Comment_Model->getOneComment($pid);
			$content = '@' . addslashes($comment['poster']) . '：' . $content;
		}

	
		$hide = ROLE == 'visitor' ? $ischkcomment : 'n';

		$sql = 'INSERT INTO '.DB_PREFIX."comment (date,poster,gid,comment,mail,url,hide,ip,pid)
				VALUES ('$utctimestamp','$name','$blogId','$content','$mail','$url','$hide','$ipaddr','$pid')";
		$ret = $DB->query($sql);
		$cid = $DB->insert_id();
	//	$CACHE = Cache::getInstance();

		if ($hide == 'n') {
			$DB->query('UPDATE '.DB_PREFIX."blog SET comnum = comnum + 1 WHERE gid='$blogId'");
			$CACHE->updateCache(array('sta', 'comment'));
            doAction('comment_saved', $cid);
            emDirect('./?post=' . $blogId);
		} else {
		    $CACHE->updateCache('sta');
		    doAction('comment_saved', $cid);
		    mMsg('评论发表成功，请等待管理员审核', './?post=' . $blogId);
		}
    }
}
if ($action == 'com') {
	if (ISLOGIN === true) {
		$hide = '';
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

		$Comment_Model = new Comment_Model();

		$comment = $Comment_Model->getComments(1, null, $hide, $page);
		$cmnum = $Comment_Model->getCommentNum(null, $hide);
		$pageurl = pagination($cmnum, 20, $page, "./?action=com&page=");
	}else {
		$comment = $CACHE->readCache('comment');
		$pageurl = '';
	}
	include View::getView('header');
	include View::getView('comment');
	include View::getView('footer');
	View::output();
}
if (ISLOGIN === true && $action == 'delcom') {
	$Comment_Model = new Comment_Model();
	$id = isset($_GET['id']) ? intval($_GET['id']) : '';
	$Comment_Model->delComment($id);
	$CACHE->updateCache(array('sta','comment'));
	emDirect("./?action=com");
}
if (ISLOGIN === true && $action == 'showcom') {
	$Comment_Model = new Comment_Model();
	$id = isset($_GET['id']) ? intval($_GET['id']) : '';
	$Comment_Model->showComment($id);
	$CACHE->updateCache(array('sta','comment'));
	emDirect("./?action=com");
}
if (ISLOGIN === true && $action == 'hidecom') {
	$Comment_Model = new Comment_Model();
	$id = isset($_GET['id']) ? intval($_GET['id']) : '';
	$Comment_Model->hideComment($id);
	$CACHE->updateCache(array('sta','comment'));
	emDirect("./?action=com");
}
if (ISLOGIN === true && $action == 'reply') {
	$Comment_Model = new Comment_Model();
	$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
	$commentArray = $Comment_Model->getOneComment($cid);
	if(!$commentArray) {
		mMsg('参数错误', './');
	}
	extract($commentArray);
		include View::getView('header');
	include View::getView('reply');
	include View::getView('footer');
	View::output();
}
// 碎语
if ($action == 'tw') {
    $Twitter_Model = new Twitter_Model();
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $user_cache = $CACHE->readCache('user');
    $tws = $Twitter_Model->getTwitters($page);
    $twnum = $Twitter_Model->getTwitterNum();
    $pageurl =  pagination($twnum, 20, $page, './?action=tw&page=');

	include View::getView('header');
	include View::getView('twitter');
	include View::getView('footer');
	View::output();
}
if (ISLOGIN === true && $action == 't') {
    $Twitter_Model = new Twitter_Model();

    $t = isset($_POST['t']) ? addslashes(trim($_POST['t'])) : '';
    if (!$t){
        emDirect("./?action=tw");
    }
    $tdata = array('content' => $Twitter_Model->formatTwitter($t),
            'author' => UID,
            'date' => time(),
    );
    $Twitter_Model->addTwitter($tdata);
    $CACHE->updateCache(array('sta','newtw'));
    doAction('post_twitter', $t);
    emDirect("./?action=tw");
}
if (ISLOGIN === true && $action == 'delt') {
    $Twitter_Model = new Twitter_Model();
    $id = isset($_GET['id']) ? intval($_GET['id']) : '';
	$Twitter_Model->delTwitter($id);
	$CACHE->updateCache(array('sta','newtw'));
	emDirect("./?action=tw");
}
if ($action == 'login' ||$action == 'reg' ) {

	include View::getView('header');
	include View::getView('login');
	include View::getView('footer');
	View::output();
}
if ($action == 'auth') {
	session_start();
	$username = addslashes(trim($_POST['user']));
	$password = addslashes(trim($_POST['pw']));
	//$img_code = (Option::get('login_code') == 'y' && isset ($_POST['imgcode'])) ? addslashes (trim (strtoupper ($_POST['imgcode']))) : '';
	$ispersis = true;
	if (checkUser($username, $password, $img_code) === true) {
		setAuthCookie($username, $ispersis);
		if($_SESSION['onm']==1)
		emDirect('?tem=' . time());
		else
		emDirect('.');
	}else {
		emDirect("?action=login");
	}
}
if ($action== 'new') {
		$login = isset($_POST['user']) ? addslashes(trim($_POST['user'])) : '';
		$password = isset($_POST['pw']) ? addslashes(trim($_POST['pw'])) : '';
		$password2 = isset($_POST['pw2']) ? addslashes(trim($_POST['pw2'])) : '';
		$password3 = isset($_POST['pw3']) ? addslashes(trim($_POST['pw3'])) : '';
		if (strlen($login) < 3) {
			mMsg('用户名过短！', './?action=reg');
		}
		if (strlen($password) < 3) {
			mMsg('密码过短！', './');
		}
		if ($password != $password2) {
			mMsg('两次密码不一致！', './?action=reg');
		}
		if ($password3 != 'yulin') 
			mMsg('注册码不正确！', './?action=reg');

		$User_Model = new User_Model();
		if ($User_Model->isUserExist($login)) {
			mMsg('用户名已存在！', './?action=reg');
		}


		$PHPASS = new PasswordHash(8, true);
		$password = $PHPASS->HashPassword($password);

		$User_Model->addUser($login, $password, $role);
		$CACHE->updateCache(array('sta','user'));
		mMsg('注册成功！', './?action=login');
}

if ($action == 'logout') {
	setcookie(AUTH_COOKIE_NAME, ' ', time () - 31536000, '/');
	emDirect('?tem=' . time());
}
function mMsg($msg, $url) {
	include View::getView('header');
	include View::getView('msg');
	include View::getView('footer');
	View::output();
}
function authPassword($postPwd, $cookiePwd, $logPwd, $logid) {
	$pwd = $cookiePwd ? $cookiePwd : $postPwd;
	if ($pwd !== addslashes($logPwd)) {
		include View::getView('header');
		include View::getView('logauth');
		include View::getView('footer');
		if ($cookiePwd) {
			setcookie('em_logpwd_' . $logid, ' ', time() - 31536000);
		}
		View::output();
	}else {
		setcookie('em_logpwd_' . $logid, $logPwd);
	}
}
