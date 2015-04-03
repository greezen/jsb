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
	$page_url = 'index.php?mod=settings&code=plugin&id=contact:user';
	$sql = 'SELECT COUNT(*) num FROM '.DB::table('channel_buy_history').' WHERE `uid`= '.MEMBER_ID.' AND `state`=1 ORDER BY `state`,`cr_id` DESC ';
	$sql2 = 'SELECT r.*,c.`picture` FROM '.DB::table('channel_buy_history').' r LEFT JOIN '.DB::table('channel').' c ON r.`ch_id`=c.`ch_id` WHERE r.`uid`= '.MEMBER_ID.' AND c.`parent_id`>0 AND r.`state`=1 GROUP BY c.`ch_id` ORDER BY r.`state`,r.`cr_id` DESC ';
	$count = DB::result_first($sql);
	$return['page'] = page($count,$per_page_num,$page_url,array('return'=>'array'));
	
	$return['rows'] = DB::fetch_all($sql2.$return['page']['limit']);
	//var_dump($sql2.$return['page']['limit'],$return);exit;
	return $return;
}

?>