<?php
/**
 * 微博订单联系方式插件
 * @Date 2014-12-23
 * @author 韵力
 */


if(!defined('IN_JISHIGOU')) {
    exit('invalid request');
}
class plugin_contact{

	/**
	 * 发布微博时的钩子函数,为微博(订单)添加联系方式
	 * 
	 */
	function posttopic($value){
		//获得联系信息数据
		global $contacts;
		if($value['step']=='check'){
			$pluginshopid = $value['param']['plugindata']['shopid'];
			$contact = explode('&', $value['param']['contact']);
			$contacts = array();
			foreach ($contact as $item){
				$tmp = explode('=', $item);
				if (strlen(trim($tmp[1])) > 0 && $tmp[0] != 'level') {
					$contacts[$tmp[0]] = urldecode($tmp[1]);
				}elseif ($tmp[0] == 'level'){
					if (isset($contacts['level']) && $contacts['level'] < $tmp[1]) {
						$contacts[$tmp[0]] = $tmp[1];
					}elseif (!isset($contacts['level'])){
						$contacts[$tmp[0]] = $tmp[1];
					}
				}
			}		
		}
		//微博发布成功后写入订单联系信息
		if($contacts['flag']==911 && $value['step']=='post' && count($contacts) > 1){
			unset($contacts['flag']);
			$contacts['create_time'] = time();
			$contacts['tid'] = $value['param'][0];
			$contactId = DB::insert('order_contact', $contacts, true);	
		}
	}
	
	function printtopic(&$topic){
		$contact = DB::fetch_first('SELECT * FROM '.DB::table('order_contact').' WHERE `tid`='.$topic['tid']);
		$topic['contact'] = $contact;
		$sql = 'SELECT COUNT(*) num FROM '.DB::table('channel_buy_record').' WHERE `ch_id`='.$topic['item_id'].' AND `uid`='.MEMBER_ID.' AND `end_time`>='.time();
		$cnt_pwr = DB::result_first($sql);
		$level = DB::result_first('SELECT `level` FROM '.DB::table('order_contact').' WHERE `tid`='.$topic['tid']);
		
		if($level == 4){
			$topic['cnt_power'] = 1;
		}elseif ($level == 2 && MEMBER_ID){
			$topic['cnt_power'] = 1;
		}elseif ($level == 1 && $cnt_pwr>0){
			$topic['cnt_power'] = 1;
		}else {
			$topic['cnt_power'] = 0;
		}
	}
	
	function deletetopic($tids){
		DB::query("DELETE FROM ".DB::table('order_contact')." WHERE tid IN(".jimplode($tids).")");
	}
	
	function global_edittopic(){
		if ($editContact = jpost('editContact')) {
			$tid = jpost('tid');
			$contact = explode('&', $editContact);
			$contacts = array();
			foreach ($contact as $item){
				$tmp = explode('=', $item);
				if ($tmp[0] != 'level') {
					$contacts[$tmp[0]] = urldecode($tmp[1]);
				}elseif ($tmp[0] == 'level'){
					if (isset($contacts['level']) && $contacts['level'] < $tmp[1]) {
						$contacts[$tmp[0]] = $tmp[1];
					}elseif (!isset($contacts['level'])){
						$contacts[$tmp[0]] = $tmp[1];
					}
				}
			}	
			
			if(!isset($contacts['level'])) {
				$contacts['level'] = 0;
			}
			$exist = DB::result_first('SELECT COUNT(*) FROM '.DB::table('order_contact').' WHERE `tid`='.$tid);
			if ($exist) {
				$contacts['update_time'] = time();
				DB::update('order_contact', $contacts, '`tid`='.$tid);
			}else {
				$contacts['create_time'] = time();
				$contacts['tid'] = $tid;
				$contactId = DB::insert('order_contact', $contacts, true);
			}
		}
	}
	
}
?>