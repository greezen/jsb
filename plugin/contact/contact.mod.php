<?php
/**
 * 微博订单联系方式插件
 * @Date 2014-12-22
 * @author 韵力
 */


if(!defined('IN_JISHIGOU')) {
    exit('invalid request');
}
$code=jget('code');
switch($code){
	case 'show':
		show();break;
	default:
		main();break;
}
function show(){
	$tid = jpost('tid','int');
	$contact_info = null;
	if ($tid>0) {
		$sql = "SELECT * FROM ".DB::table('order_contact')." WHERE `tid`=".$tid;
		$contact_info = DB::fetch_first($sql);
	}
	include template("contact:show");exit;
}