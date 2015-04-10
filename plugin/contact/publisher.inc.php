<?php
/**
 * 用户购买频道相关信息
 * @Author 韵力
 * @Date 2015-03-03
 */

if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}

$type = jget('type');
$that = $this;
switch ($type){
	case 'set':
		setContact($that);
		break;
	default:
		$checkList = main();
		break;
}

function main(){
	$return = array();
	
	$return['Uinfo'] = jstripslashes(DB::fetch_first('SELECT * FROM '.DB::table('publisher_contact').' WHERE `uid`='.MEMBER_ID));
	
	return $return;
}

function setContact($that){
	if (!MEMBER_ID) {
		$that->Messager('请先登录再设置','index.php?mod=login');
	}
	$exist = DB::result_first('SELECT COUNT(*) FROM '.DB::table('publisher_contact').' WHERE `uid`='.MEMBER_ID);
	
	$info = jaddslashes(jpost('Info'));
	$info['uid'] = MEMBER_ID;
	if ($exist) {
		$res = DB::update('publisher_contact', $info, 'uid='.MEMBER_ID);
	}else {
		$res = DB::insert('publisher_contact', $info, true);
	}
	if ($res) {
		$that->Messager('设置成功','');
	}else{
		$that->Messager('设置失败','');
	}
}


?>