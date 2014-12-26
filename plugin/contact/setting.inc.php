<?php
/**
 * [JishiGou] (C)2005 - 2099 Cenwor Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename admincp.inc.php $
 *
 * @Author http://www.jishigou.net $
 *
 * @Date 2013-11-11 1955937025 1227 $
 */


if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}

$type = jget('type');

switch ($type){
	case 'addUser':
		addUser();
		break;
	case 'power':
		power();
		break;
	default:
		$channels = main();
		break;
}

function main(){
	$sql = "SELECT * FROM ".DB::table('channel')." WHERE channel_typeid > 0";
	return DB::fetch_all($sql);
}

//对应频道下可查看联系方式的用户列表
function power(){
	$ch_id = jget('ch_id');
	$gets = array(
			'mod' => 'plugin',
			'code' => 'manage',
			'identifier' => 'contact',
			'pmod' => 'setting',
			'type' => 'power',
			'ch_id' => $ch_id
	);
	$per_page_num = 10;
	$page_url = 'admin.php?'.url_implode($gets);
	$count = DB::result_first("SELECT count(*) FROM ".DB::table('order_contact_power')." WHERE ch_id = ".$ch_id);
	$page_arr = page($count,$per_page_num,$page_url,array('return'=>'array'));
	
	$sql = "SELECT p.*,c.ch_name FROM ".DB::table('order_contact_power')." p LEFT JOIN ".DB::table('channel')." c ON p.ch_id = c.ch_id WHERE p.ch_id = ".$ch_id." ORDER BY p.ch_id DESC {$page_arr['limit']}";
	$powers = DB::fetch_all($sql);
	include template('contact:power');exit;
}

//为频道增加可查看联系方式的用户
function addUser(){
	$ch_id = jget('ch_id');
	$username = jget('username');
	$uval = jget('uval');
	$unit = jget('unit');
	$show_end_time = 0;
	switch ($unit){
		case 'hour':
			$show_end_time = strtotime('+'.$uval.' hour');
			break;
		case 'day':
			$show_end_time = strtotime('+'.$uval.' day');
			break;
		case 'month':
			$show_end_time = strtotime('+'.$uval.' month');
			break;
		case 'year':
			$show_end_time = strtotime('+'.$uval.' year');
			break;
	}
	$uid = 1;
	$sql = "INSERT INTO ".DB::table('order_contact_power')." SET ch_id = ".$ch_id.", uid=".$uid.", username='".$username."', show_start_time=".time().", show_end_time=".$show_end_time;
	
	$res = DB::query($sql);
	var_dump($res);exit;
}

//将用户从可查看列表中删除
function delUser(){
	
}

if($ids = jimplode($this->Post['delete'])){
	$query = DB::query("SELECT `imageid` FROM ".DB::table('topic_shop')." WHERE id IN ($ids)");
	while($value = DB::fetch($query)) {
		if($value['imageid'] > 0){
			DB::query("DELETE FROM ".DB::table('topic_image')." WHERE id = '".$value['imageid']."'");		}
	}
	DB::query("DELETE FROM ".DB::table('topic_shop')." WHERE id IN ($ids)");
	$this->Messager("商品删除成功", 'admin.php?mod=plugin&code=manage&identifier=shop&pmod=admincp');
}
$action = 'admin.php?mod=plugin&code=manage&identifier=shop&pmod=admincp';
$count = DB::result_first("SELECT count(*) FROM ".DB::table('topic_shop'));
$gets = array(
	'mod' => 'plugin',
	'code' => 'manage',
	'identifier' => 'shop',
	'pmod' => 'admincp',
);
$page_url = 'admin.php?'.url_implode($gets);
$per_page_num = 50;
$shops = array();
if($count > 0){
	$page_arr = page($count,$per_page_num,$page_url,array('return'=>'array'));
	$query = DB::query("SELECT * FROM ".DB::table('topic_shop')." ORDER BY id DESC {$page_arr['limit']}");
	while($value = DB::fetch($query)) {
		$value['dateline'] = date('Y-m-d H:i:s',$value['dateline']);
		$shops[] = $value;
	}
}
?>