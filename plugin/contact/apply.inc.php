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
	case 'checkout':
		
		break;
	default:
		$checkList = main();
		break;
}

function main(){
	$return = array();
	$per_page_num = 20;
	$page_url = 'index.php?mod=settings&code=plugin&id=contact:apply';
	$sql = 'SELECT COUNT(*) num FROM '.DB::table('channel_buy_record').' WHERE `uid`= '.MEMBER_ID.' AND `state`=1 ORDER BY `state`,`cr_id` DESC ';
	$sql2 = 'SELECT r.*,c.`picture`,f.`give` FROM '.DB::table('channel_buy_record').' r LEFT JOIN '.DB::table('channel').' c ON r.`ch_id`=c.`ch_id` LEFT JOIN '.DB::table('channel_fee').' f ON r.`ch_id`=f.`ch_id` WHERE r.`uid`= '.MEMBER_ID.' AND r.`state`IN(0,2) GROUP BY r.`cr_id` ORDER BY r.`state`,r.`cr_id` DESC ';
	$sql3 = 'SELECT r.*,c.`picture`,f.`give` FROM '.DB::table('channel_buy_history').' r LEFT JOIN '.DB::table('channel').' c ON r.`ch_id`=c.`ch_id` LEFT JOIN '.DB::table('channel_fee').' f ON r.`ch_id`=f.`ch_id` WHERE r.`uid`= '.MEMBER_ID.' AND r.`state`IN(0) GROUP BY r.`cr_id` ORDER BY r.`state`,r.`cr_id` DESC ';
	$count = DB::result_first($sql);
	$return['page'] = page($count,$per_page_num,$page_url,array('return'=>'array'));
	
	$return['rows'] = DB::fetch_all($sql2.$return['page']['limit']);
	$return['checking'] = DB::fetch_all($sql3);
	$return['Uinfo'] = DB::fetch_first('SELECT * FROM '.DB::table('channel_buy_contact').' WHERE `uid`='.MEMBER_ID);
	
	return $return;
}


?>