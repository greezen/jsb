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
$that = $this;
switch ($type){
	case 'addUser':
		addUser();
		break;
	case 'delUser':
		delUser();
		break;
	case 'editUser':
		editUser();
		break;
	case 'power':
		power();
		break;
	case 'fee'://费率设置
		fee($that);
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
	$uid = jget('uid');
	$filter = '';
	$gets = array(
			'mod' => 'plugin',
			'code' => 'manage',
			'identifier' => 'contact',
			'pmod' => 'setting',
			'type' => 'power',
			'ch_id' => $ch_id
	);
	$units = array(
			'hour'=>'小时',
			'day'=>'天',
			'month'=>'月',
			'year'=>'年',
	);
	
	//查询
	if($uid > 0){
		$filter = ' AND `uid`='.$uid;
	}
	$per_page_num = 10;
	$page_url = 'admin.php?'.url_implode($gets);
	$count = DB::result_first("SELECT count(*) FROM ".DB::table('order_contact_power')." WHERE ch_id = ".$ch_id.$filter);
	$page_arr = page($count,$per_page_num,$page_url,array('return'=>'array'));
	
	$sql = "SELECT p.*,c.ch_name FROM ".DB::table('order_contact_power')." p LEFT JOIN ".DB::table('channel')." c ON p.ch_id = c.ch_id WHERE p.ch_id = ".$ch_id.$filter." ORDER BY p.ch_id DESC {$page_arr['limit']}";
	$powers = DB::fetch_all($sql);
	$users = DB::fetch_all('SELECT `uid`,`nickname` FROM '.DB::table('members'));
	include template('contact:power');exit;
}

//为频道增加可查看联系方式的用户
function addUser(){
	$ch_id = jget('ch_id');
	$uid = jget('uid');
	$username = DB::result_first('SELECT `nickname` FROM '.DB::table('members').' WHERE `uid` = '.$uid);
	$uval = trim(jget('uval'));
	$unit = trim(jget('unit'));
	$exit = DB::result_first('SELECT COUNT(`uid`) FROM '.DB::table('order_contact_power').' WHERE `uid` = '.$uid.' AND `ch_id` = '.$ch_id);
	//数据验证
	if($exit > 0){
		$msg = '用户已经在授权列表中,请直接编辑授权时间';
	}elseif ($uid <= 0) {
		$msg = '用户名不能为空';
	}elseif (empty($username)){
		$msg = '用户不存在';
	}elseif (empty($uval)){
		$msg = '授权时间不能为空';
	}elseif (empty($unit)){
		$msg = '时间单位不能为空';
	}
	if (!empty($msg)) {
		echo $msg;exit;
	}
	
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
	
	$sql = "INSERT INTO ".DB::table('order_contact_power')." SET ch_id = ".$ch_id.", uid=".$uid.", username='".$username."', show_start_time=".time().", show_end_time=".$show_end_time;
	
	$res = DB::query($sql);
	if ($res) {
		echo 'ok';
	}else {
		echo '授权失败';
	}
	exit;
}

//将用户从可查看列表中删除
function delUser(){
	$ch_id = jget('ch_id');
	$uid = jget('uid');
	
	//数据验证
	if($uid <= 0) {
		$msg = '用户ID不能为空';
	}elseif (empty($ch_id)){
		$msg = '频道ID不能为空';
	}
	
	if (!empty($msg)) {
		echo $msg;exit;
	}
	
	$res = DB::query('DELETE FROM '.DB::table('order_contact_power').' WHERE `uid`='.$uid.' AND `ch_id`='.$ch_id);
	if ($res) {
		echo 'ok';
	}else {
		'删除用户失败';
	}
	exit;
}

//编辑授权用户的到期时间
function editUser(){
	$show = jget('show');
	$ch_id = jget('ch_id');
	$uid = jget('uid');
	$uval = trim(jget('uval'));
	$unit = trim(jget('unit'));
	$thePower = DB::fetch_first('SELECT * FROM '.DB::table('order_contact_power').' WHERE `uid`='.$uid.' AND `ch_id`='.$ch_id);
	
	if ($show == 1) {//显示编辑模板
		$units = array(
			'hour'=>'小时',
			'day'=>'天',
			'month'=>'月',
			'year'=>'年',
		);
		
		include template('contact:editPower');exit;
	}else {//执行编辑操作
		//数据验证
		if($uid <= 0) {
			$msg = '用户ID不能为空';
		}elseif (empty($ch_id)){
			$msg = '频道ID不能为空';
		}
		
		$show_end_time = 0;
		
		if (!empty($msg)) {
			echo $msg;exit;
		}
		
		if ($thePower['show_end_time']>=time()) {
			switch ($unit){
				case 'hour':
					$show_end_time = strtotime('+'.$uval.' hour',$thePower['show_end_time']);
					break;
				case 'day':
					$show_end_time = strtotime('+'.$uval.' day',$thePower['show_end_time']);
					break;
				case 'month':
					$show_end_time = strtotime('+'.$uval.' month',$thePower['show_end_time']);
					break;
				case 'year':
					$show_end_time = strtotime('+'.$uval.' year',$thePower['show_end_time']);
					break;
			}
			$sql = 'UPDATE '.DB::table('order_contact_power').' SET `show_end_time`='.$show_end_time.' WHERE `uid`='.$uid.' AND `ch_id`='.$ch_id;
		}else {
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
			$sql = 'UPDATE '.DB::table('order_contact_power').' SET `show_start_time`='.time().', `show_end_time`='.$show_end_time.' WHERE `uid`='.$uid.' AND `ch_id`='.$ch_id;
		}
		$res = DB::query($sql);
		if ($res) {
			echo 'ok';
		}else {
			'更新成功';
		}
		exit;
	}
	
}

//设置频道费率
function fee($that){
	$ch_id = jget('ch_id');
	$fees = jpost('Fee');
	$dels = jpost('Del');
	$feeList = DB::fetch_all('SELECT * FROM '.DB::table('channel_fee'.' WHERE `ch_id`='.$ch_id.' AND `is_check`>=0'));
	$price0 = DB::result_first('SELECT `price` FROM '.DB::table('channel_fee'.' WHERE `ch_id`='.$ch_id.' AND `is_check`=-1'));
	$channel = DB::fetch_first('SELECT * FROM '.DB::table('channel').' WHERE `ch_id`='.$ch_id);
	
	//删除费率
	if(!empty($dels['del-item'])){
		$rs = DB::delete('channel_fee', '`fid` IN ('.implode(',', $dels['del-item']).')');
		if ($rs){
			$that->Messager('操作成功',-2);
		}else {
			$that->Messager('操作失败',-2);
		}
	}
	
	//添加/更新单月费率
	if(!empty($fees['price0'])){
		$exist = DB::result_first('SELECT COUNT(*) FROM '.DB::table('channel_fee').' WHERE `ch_id`='.$ch_id.' AND `is_check`=-1');
		if (!$exist) {
			DB::insert('channel_fee', array('ch_id'=>$ch_id,'price'=>$fees['price0'],'is_check'=>-1));
		}else {
			DB::update('channel_fee', array('price'=>$fees['price0']), '`ch_id`='.$ch_id.' AND `is_check`=-1');
		}
	}
	
	//添加/更新费率
	if(!empty($fees)){
		for ($i=0;$i<count($fees['title']);$i++){
			$fee = array();
			if ($fees['price'][$i] == 0) {
				continue;
			}
			$fee['fid'] = $fees['fid'][$i];
			$fee['title'] = $fees['title'][$i];
			$fee['duration'] = $fees['duration'][$i];
			$fee['give'] = $fees['give'][$i];
			$fee['price'] = $fees['price'][$i];
			$fee['ad1'] = $fees['ad1'][$i];
			$fee['ad2'] = $fees['ad2'][$i];
			$fee['is_check'] = !empty($fees['is-check'])&&in_array($fee['fid'], $fees['is-check'])?1:0;
			$fee['ch_id'] = $ch_id;
			if($fee['fid']){
				$res = DB::update('channel_fee', $fee, '`fid` = '.$fee['fid']);
			}else {
				unset($fee['fid']);
				$res = DB::insert('channel_fee', $fee);
			}
		}
		
		if ($res) {
			$that->Messager('操作成功',-1);
		}else {
			$that->Messager('操作失败',-1);
		}
	}
	include template('contact:fee');exit;
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