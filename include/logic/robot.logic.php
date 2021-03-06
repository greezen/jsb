<?php
/**
 *[JishiGou] (C)2005 - 2099 Cenwor Inc.
 *
 * 对搜索引擎的操作
 *
 * @author 狐狸<foxis@qq.com>
 * @package www.jishigou.net
 * @version $Id: robot.logic.php 5000 2013-11-13 01:43:24Z wuliyong $
 */
if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}

Class RobotLogic
{
	var $robotName="";
	var $agent="";
	var $regular="Bot|Spider|Twiceler|Crawl|ia_archiver|Slurp|ZyBorg|MSIECrawler|UdmSearch|IRLbo";
	var $tableName="";
	var $fieldList=array();
	function RobotLogic()
	{
		$this->setAgent(addslashes($_SERVER['HTTP_USER_AGENT']));
		$this->tableName=TABLE_PREFIX."robot";
	}
	
	function setAgent($agent)
	{
		$this->agent=$agent;
	}
	
	function isRobot()
	{
		$version="(!:[\/\-]?\d+(\.\d+)+)?";
		$spiders="/[a-z\s!]*?[\w\-]*(?:{$this->regular})[a-z\-]*[a-z\s]*$version/i";
		if($this->agent=="") {
			return false;
		}
		preg_match($spiders,$this->agent,$match);
		if($match==false) {
			return false;
		}
		$rn = trim($match[0]," \-");
		$rnl = strlen($rn);
		if($rnl >= 3 && $rnl <= 30) {			$this->robotName=$rn;
			return $this->robotName;
		} else {
			return false;
		}
	}
	
	function statistic()
	{
		if(empty($this->tableName))return false;
		$ip= $GLOBALS['_J']['client_ip'];
		$timestamp=time();
		$sql="UPDATE ".$this->tableName."
			set
			`times`=`times`+1,
			`last_visit`='$timestamp'
			where `name`='$this->robotName'";
		DB::query($sql, 'SILENT');
		$result = DB::affected_rows();
		if($result<1) {
			$sql="insert into $this->tableName(`name`,`times`,`first_visit`,`last_visit`,`agent`)
			values('{$this->robotName}','1','{$timestamp}','$timestamp','$this->agent')";
			DB::query($sql);
			$result = (bool) DB::affected_rows();
		}


				if($result) {
			$sql="
			UPDATE {$this->tableName}_ip
			set
				`times`=`times`+1,
				`last_visit`='$timestamp'
			where
				`ip`='$ip'
			";
			DB::query($sql, 'SILENT');
			$result = DB::affected_rows();
			if($result<1) {
				$sql="insert into
				{$this->tableName}_ip(`ip`,`name`,`times`,`first_visit`,`last_visit`)
				values('$ip','{$this->robotName}','1','{$timestamp}','$timestamp')";
				DB::query($sql);
				$result = (bool) DB::affected_rows();
			}
		}
		return $result;
	}

	
	function getRobotName()
	{
		return $this->robotName;
	}
}
?>