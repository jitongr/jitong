<?php
/**
 * 生成文本缓存类
 *
 * @copyright (c) Emlog All Rights Reserved
 * $Id: cache.php 2004 2011-08-14 09:54:58Z emloog $
 */

class Cache {

	private $db;
	private static $instance = null;

	private $options_cache;
	private $user_cache;
	private $sta_cache;
	private $comment_cache;
    private $tags_cache;
    private $sort_cache;
    private $link_cache;
    private $newlog_cache;
    private $newtw_cache;
	private $record_cache;
    private $logtags_cache;
    private $logsort_cache;
    private $logalias_cache;
    private $logatts_cache;

	/**
	 * 构造函数
	 */
	private function __construct() {
		$this->db = MySql::getInstance();
	}

	/**
	 * 静态方法，返回数据库连接实例
	 *
	 * @return Cache
	 */
	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new Cache();
		}
		return self::$instance;
	}


	/**
	 * 读取缓存文件
	 */
	function readCache($cacheName) {
		if ($this->{$cacheName.'_cache'} != null) {
			//echo 'M';
			return $this->{$cacheName.'_cache'};
		} else {
			//echo 'RD';
			$cachefile = '../up/cache/' . $cacheName;

			if ($fp = fopen($cachefile, 'r')) {
				$data = fread($fp, filesize($cachefile));
				fclose($fp);
				$this->{$cacheName.'_cache'} = unserialize($data);
				return $this->{$cacheName.'_cache'};
			}
		}
	}
}
