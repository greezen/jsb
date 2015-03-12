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
	case 'isOrder':
		isOrder();break;
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

//检查频道是否为订单模型
function isOrder(){
	$msg = array('state'=>false);
	$chid = jpost('chid','int');
	if ($chid>0) {
		$sql = 'SELECT COUNT(*) FROM '.DB::table('channel').' WHERE `ch_id`='.$chid.' AND `channel_typeid`=3 AND `parent_id`>0';
		if (DB::result_first($sql)) {
			$msg['state'] = true;
		}
	}
	echo json_encode($msg);exit;
}

function main(){
	echo '....';exit;
}