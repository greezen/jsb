<?php
/**
 *
 * 数据表 talk_category 相关操作类
 *
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @copyright Copyright (C) 2005 - 2099 Cenwor Inc.
 * @license http://www.cenwor.com
 * @link http://www.jishigou.net
 * @author 狐狸<foxis@qq.com>
 * @version $Id: talk_category.class.php 3678 2013-05-24 09:48:20Z wuliyong $
 */

if(!defined('IN_JISHIGOU')) {
	exit('invalid request');
}

class table_talk_category extends table {
	
	
	var $table = 'talk_category';
	
	function table_talk_category() {
		$this->init($this->table);
	}
		
}

?>