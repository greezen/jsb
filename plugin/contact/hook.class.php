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
				if (strlen(trim($tmp[1])) > 0 && $tmp[0] != 'ulevel') {
					$contacts[$tmp[0]] = urldecode($tmp[1]);
				}elseif ($tmp[0] == 'ulevel'){
					if (isset($contacts['ulevel']) && $contacts['ulevel'] < $tmp[1]) {
						$contacts[$tmp[0]] = $tmp[1];
					}elseif (!isset($contacts['ulevel'])){
						$contacts[$tmp[0]] = $tmp[1];
					}
				}
			}		
		}
		
		//微博发布成功后写入订单联系信息
		if($value['step']=='post'){
			$contacts['create_time'] = time();
			$contacts['tid'] = $value['param'][0];
			$contactId = DB::insert('order_contact', $contacts, true);	
		}
	}
		
}
?>