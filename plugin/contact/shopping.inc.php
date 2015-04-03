<?php
/**
 * 认证审核,购买频道的用户相关信息
 * @Author 韵力
 * @Date 2014-12-25
 */

if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}

$type = jget('type');
$that = $this;
switch ($type){
	case 'check':
		check($that);
		break;
	case 'power':
		power($that);
		break;
	case 'addPower':
		addPower($that);
		break;
	case 'addUserPower':
		addUserPower($that);
		break;
	case 'search':
		$checkList = search($that);
		break;
	default:
		$checkList = main();
		break;
}

function main(){
	$sql = 'SELECT r.*,m.nickname FROM '.DB::table('channel_buy_record').' r LEFT JOIN '.DB::table('members').' m ON r.uid=m.uid WHERE `state` IN(0,3) GROUP BY r.uid';
	return DB::fetch_all($sql);
}

function search(){
	$nickname = jpost('nickname');
	$sql = 'SELECT r.*,m.nickname FROM '.DB::table('channel_buy_record').' r LEFT JOIN '.DB::table('members').' m ON r.uid=m.uid WHERE m.nickname=\''.$nickname.'\' GROUP BY r.uid';
	
	return DB::fetch_all($sql);
}

//审核/编辑用户申请
function check($that){
	$uid  = jget('uid','int');
	$U = jget('U');
	$unpass = jget('unpass');
	$pass = jget('pass');
	$del = jget('del');
	$del_h = jget('del_h');
	$userInfo = DB::fetch_first('SELECT m.`nickname`,m.`face`,c.* FROM '.DB::table('channel_buy_contact').' c LEFT JOIN '.DB::table('members').' m ON c.uid=m.uid WHERE c.`uid`='.$uid);
	$channels = DB::fetch_all('SELECT * FROM '.DB::table('channel').' WHERE `parent_id`>0 AND `channel_typeid`=3');
	
	$history = DB::fetch_all('SELECT r.*,f.`title` FROM '.DB::table('channel_buy_record').' r LEFT JOIN '.DB::table('channel_fee').' f ON r.`fid`=f.`fid` WHERE r.`uid`='.$uid);
	$userChannel = DB::fetch_all('SELECT * FROM '.DB::table('channel_buy_history').' WHERE `uid`='.$uid.' AND `state` IN(0,1) ORDER BY `ch_id`,`end_time` DESC');
	
	if($pass || $unpass || $del || $U || $del_h){
		if ($U) {
			DB::update('channel_buy_contact', $U, '`uid` ='.$uid);
		}
		
		if ($pass) {
			$cr_ids = (implode(',', $pass));
			DB::update('channel_buy_record', array('state'=>3), '`cr_id` IN('.$cr_ids.')');
			foreach ($pass as $v_cr_id){
				$tmp = DB::fetch_first('SELECT * FROM '.DB::table('channel_buy_record').' WHERE `cr_id`='.$v_cr_id);
				$tmp['state'] = 0;
				DB::insert('channel_buy_history', $tmp);
			}
		}
		
		if ($unpass) {
			DB::update('channel_buy_record', array('state'=>2), '`cr_id` IN('.implode(',', $unpass).')');
		}
		
		if ($del) {
			$chids = DB::fetch_all('SELECT ch_id FROM '.DB::table('channel_buy_record').' WHERE cr_id IN('.implode(',', $del).')');
			$chidar = array();
			foreach ($chids as $ch){
				$chidar[$ch['ch_id']] = $ch['ch_id'];
			}
			DB::delete('channel_buy_record', '`cr_id` IN('.implode(',', $del).')');
			
			//follow_the_channel(implode(',', $chidar),$uid,0);
		}
		if ($del_h) {
			$chids = DB::fetch_all('SELECT ch_id FROM '.DB::table('channel_buy_history').' WHERE cr_id IN('.implode(',', $del_h).')');
			$chidar = array();
			foreach ($chids as $ch){
				$chidar[$ch['ch_id']] = $ch['ch_id'];
			}
			DB::delete('channel_buy_history', '`cr_id` IN('.implode(',', $del_h).')');
			
			follow_the_channel(implode(',', $chidar),$uid,0);
		}
		
		$that->Messager('操作成功','');
	}
	
	include template('contact:check');exit;
}

//修改授权时间
function power($that){
	$end_time = strtotime(jpost('power-time'));
	$cr_id = $ocr_id = jpost('cr_id','int');
	$flag = false;
	$uid = jpost('uid','int');
	$cr = DB::fetch_first('SELECT `ch_id`,`start_time`,`end_time` FROM '.DB::table('channel_buy_history').' WHERE `cr_id`='.$cr_id);

	if($end_time && $cr_id){
		$data = array();
		$exsitChannel = DB::fetch_first('SELECT * FROM '.DB::table('channel_buy_history').' WHERE `ch_id`='.$cr['ch_id'].' AND `state`=1 AND `uid`='.$uid);
		if ($exsitChannel) {
			$cr_id = $exsitChannel['cr_id'];
			if ($exsitChannel['end_time']<time()) {
				$data['start_time'] = time();
				$data['end_time'] = $end_time;
			}elseif ($cr_id == $ocr_id){
				$data['end_time'] = $end_time;
			}else {
				$data['end_time'] = $exsitChannel['end_time']+($end_time-time());
			}
			$flag = true;
		}else {
			$data['start_time'] = time();
			$data['end_time'] = $end_time;
			$data['state'] = 1;
		}

		DB::update('channel_buy_history', $data, '`cr_id`='.$cr_id);
		DB::update('channel_buy_record', array('start_time'=>time()), '`cr_id`='.$ocr_id);
		if ($flag && $cr_id != $ocr_id) {
			DB::update('channel_buy_history', array('state'=>2), '`cr_id`='.$ocr_id);
		}
		
		$isbuddy = has_follow_channel($cr['ch_id'], $uid);
		if (!$isbuddy) {
			follow_the_channel($cr['ch_id'],$uid);
		}
		
		$that->Messager('操作成功','');
	}
	
	include template('contact:power');exit;
}

//为用户添加授权频道
function addPower($that){
	$info = jpost('A');
	$ch_name = DB::result_first('SELECT `ch_name` FROM '.DB::table('channel').' WHERE `ch_id`='.$info['ch_id']);
	$info['fid'] = 0;
	$info['ch_name'] = $ch_name;
	$info['price'] = 0;
	$info['title'] = '后台添加';
	$info['state'] = 1;
	$info['end_time'] = strtotime($info['end_time']);
	$info['start_time'] = time();
	$info['create_time'] = time();
	
	if (empty($info['ch_id'])) {
		$that->Messager('未选择频道','');
	}else if (empty($info['end_time'])) {
		$that->Messager('未选择授权时间','');
	}
	
	$exsitChannel = DB::fetch_first('SELECT * FROM '.DB::table('channel_buy_history').' WHERE `ch_id`='.$info['ch_id'].' AND `state`=1 AND `uid`='.$info['uid']);
	if ($exsitChannel) {
		$that->Messager('频道 <font color="red">'.$ch_name.'</font> 已存在,直接修改时间即可','', 5);
		$tmp = array();
		if ($exsitChannel['end_time']>time()) {
			$tmp['end_time'] = $exsitChannel['end_time']+($info['end_time']-time());
		}else {
			$tmp['start_time'] = time();
			$tmp['end_time'] = $info['end_time'];
		}
		$cr_id = DB::update('channel_buy_history', $tmp, '`cr_id`='.$exsitChannel['cr_id']);
	}else {
		$rinfo = $info;
		$rinfo['state'] = 3;
		unset($rinfo['end_time']);
		
		$info['cr_id'] = DB::insert('channel_buy_record', $rinfo, true);
		$cr_id = DB::insert('channel_buy_history', $info, true);
	}
	
	$isbuddy = has_follow_channel($info['ch_id'], $info['uid']);
	if (!$isbuddy) {
		follow_the_channel($info['ch_id'],$info['uid']);
	}
	
	if ($cr_id) {
		$that->Messager('操作成功','');
	}
	$that->Messager('操作失败','');
}

//添加用户到授权列表中
function addUserPower($that){
	$nickname = jget('nickname');
	$uid = DB::result_first("SELECT `uid` FROM ".DB::table('members')." WHERE `nickname`='".$nickname."'");
	$exsit = DB::result_first('SELECT COUNT(*) FROM '.DB::table('channel_buy_contact').' WHERE `uid`='.$uid);
	if ($exsit) {
		$res = DB::update('channel_buy_contact', array('uid'=>$uid), '`uid`='.$uid);
	}else {
		$res = DB::insert('channel_buy_contact', array('uid'=>$uid), true);
	}
	if($res){
		$that->Messager('操作成功','admin.php?mod=plugin&code=manage&identifier=contact&pmod=shopping&type=check&uid='.$uid);
	}else {
		$that->Messager('操作失败','');
	}
	
}

function follow_the_channel($cid, $uid, $action=1){
	$isexists = jlogic('channel')->is_exists($cid);
	if($isexists){
		if($action){
			DB::query("INSERT INTO ".DB::table('buddy_channel')." (`uid`,`ch_id`) values ('".$uid."','{$cid}')");
			DB::query("UPDATE ".DB::table('channel')." SET `buddy_numbers` = buddy_numbers+1 where `ch_id`='{$cid}'");
		}else{
			DB::query("DELETE FROM ".DB::table('buddy_channel')." WHERE uid = '".$uid."' AND ch_id IN ('$cid')");
			DB::query("UPDATE ".DB::table('channel')." SET `buddy_numbers` = buddy_numbers-1 where `ch_id` IN ('{$cid}')");
		}
	}
}

function has_follow_channel($cid, $uid){
	return DB::result_first("SELECT count(*) FROM ".DB::table('buddy_channel')." WHERE uid = '".$uid."' AND ch_id = '$cid'");
}


?>