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
	case 'search':
		$checkList = search();
		break;
	default:
		$checkList = main();
		break;
}

function main(){
	$return = array();
	$per_page_num = 20;
	$page_url = 'admin.php?mod=plugin&code=manage&identifier=contact&pmod=member';
	$sql = 'SELECT COUNT(*) num FROM '.DB::table('channel_buy_record').' ORDER BY `state`,`cr_id` DESC ';
	$sql2 = 'SELECT * FROM '.DB::table('channel_buy_record').' ORDER BY `state`,`cr_id` DESC ';
	$count = DB::result_first($sql);
	$return['page'] = page($count,$per_page_num,$page_url,array('return'=>'array'));
	
	$return['rows'] = DB::fetch_all($sql2.$return['page']['limit']);
	$return['channels'] = DB::fetch_all('SELECT * FROM '.DB::table('channel').' WHERE `channel_typeid`=3');
	return $return;
}

function search(){
	$return = array();
	$nickname = jpost('nickname');
	$return['ch_id'] = $ch_id = jget('ch_id','int');
	$sort = jget('sort');
	$uid = DB::result_first('SELECT `uid` FROM '.DB::table('members').' WHERE `nickname`=\''.$nickname.'\'');
	
	$condition = array(
		'ch_id'=>$ch_id,
		'uid'=>$uid
	);
	$condition = array_filter($condition);
	
	$per_page_num = 20;
	$page_url = 'admin.php?mod=plugin&code=manage&identifier=contact&pmod=member';
	$sql = 'SELECT COUNT(*) num FROM '.DB::table('channel_buy_record');
	$sql2 = 'SELECT r.*,(r.`end_time`-r.`start_time`) syt,m.`nickname` FROM '.DB::table('channel_buy_record').' r LEFT JOIN '.DB::table('members').' m ON r.`uid` = m.`uid`';
	
	if (!empty($condition)) {
		$sql .= ' WHERE ';
		$sql2 .= ' WHERE ';
		$i = 0;
		foreach ($condition as $ck=>$cv){
			
			if ($i>0) {
				$sql .= ' AND '.$ck.' = '.$cv;
				$sql2 .= ' AND r.'.$ck.' = '.$cv;
			}else{
				$sql .= ' '.$ck.' = '.$cv;
				$sql2 .= ' r.'.$ck.' = '.$cv;
			}
			$i++;
		}
	}
	
	if ($sort) {
		if ($sort=='uid') {
			$sql2 .= ' ORDER BY r.'.$sort.' DESC';
		}else {
			$sql2 .= ' ORDER BY '.$sort.' DESC';
		}
	}else{
		$sql2 .= ' ORDER BY r.`state`,r.`cr_id` DESC';
	}

	$count = DB::result_first($sql);
	$return['page'] = page($count,$per_page_num,$page_url,array('return'=>'array'));
	
	$return['rows'] = DB::fetch_all($sql2.$return['page']['limit']);
	$return['channels'] = DB::fetch_all('SELECT * FROM '.DB::table('channel').' WHERE `channel_typeid`=3');
	return $return;
}


?>