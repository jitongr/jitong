<?php
/**
 * 前端控制
 * @copyright (c) Emlog All Rights Reserved
 * $Id: option.php 2035 2011-09-17 03:25:14Z emloog $
 */

class Option {
	//版本编号
    const EMLOG_VERSION = '4.1.0';
	//图片附件缩略图最大宽
	const IMG_MAX_W = 420;
	//图片附件缩略图最大高
	const IMG_MAX_H = 460;
	//头像缩略图最大宽
	const ICON_MAX_W = 140;
	//头像缩略图最大高
	const ICON_MAX_H = 220;
    //上传图片是否生成缩略图 1:是 0:否
    const IS_THUMBNAIL = 1;
    //附件大小上限 （单位：字节，默认20M）
    const UPLOADFILE_MAXSIZE = 20971520;
    //附件上传路径
    const UPLOADFILE_PATH = '../content/uploadfile/';
    //允许上传的附件类型
    const ATTACHMENT_TYPE = 'rar,zip,gif,jpg,jpeg,png,bmp';

    static function get($option){
$o[comment_order]='newer';
    	
   $o[comment_paging]='y';
   $o[timezone]=0;
   $o[admin_perpage_num]='20';
   $o[]='y'; 	
		return $o[$option];
		}


}
