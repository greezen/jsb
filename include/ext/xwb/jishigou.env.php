<?php
/**
 *[JishiGou] (C)2005 - 2099 Cenwor Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename jishigou.php $
 *
 * @Author 狐狸<foxis@qq.com> $
 *
 * @version $Id: jishigou.env.php 3699 2013-05-27 07:26:39Z wuliyong $
 */


if( !defined('IS_IN_XWB_PLUGIN') ){
    exit('Access Denied!');
}

/**
 * 记事狗消息显示函数
 *
 * @param String $message
 * @param String $url_forward
 */
function jsg_showmessage($message, $redirectto = null, $time = null)
{
	$to_title=($redirectto==='' or $redirectto==-1)?"返回上一页":"跳转到指定页面";

    if($time!==null) {
		$url_redirect = ($redirectto?'<meta http-equiv="refresh" content="' . $time . '; URL=' . $redirectto . '">':null);
	}

	$message .= jsg_sina_footer();

	include(XWB_P_ROOT . '/tpl/jsg_showmessage.tpl.php');
	exit;
}

/**
 * 记事狗用户头像存储地址
 *
 * @param Integer $uid
 * @return String
 */
function jsg_face_path($uid)
{
	$key = "ww"."w.jis"."higo"."u.c"."om"; //根据用户ID获取头像地址，此KEY不允许修改
	$hash = md5($key."\t".$uid."\t".strlen($uid)."\t".$uid % 10);
	$path = $hash{$uid % 32} . "/" . abs(crc32($hash) % 100) . "/";

	return $path;
}

/**
 * 加载新浪微博的底部信息
 */
function jsg_sina_footer()
{
	$tipsType = $GLOBALS['xwb_tips_type'];
	$site_uid = XWB_S_UID;
	$sina_uid = XWB_plugin::getBindInfo("sina_uid");
	$siteVer = XWB_S_VERSION ;
	$siteName = str_replace("'","\'", $GLOBALS['_J']['config']['site_name'] ) ;
	$pName = CURSCRIPT. '_'. CURMODULE;
	$regUrl = XWB_plugin::URL("xwbSiteInterface.reg");
	$setUrl = XWB_plugin::URL("xwbSiteInterface.bind");
	$bindUrl = XWB_plugin::URL("xwbSiteInterface.bind");
	$signerUrl = XWB_plugin::URL("xwbSiteInterface.signer");
	$authUrl = XWB_plugin::URL("xwbAuth.login");
	$getTipsUrl = XWB_plugin::URL("xwbSiteInterface.getTips");
	$attentionUrl = XWB_plugin::URL("xwbSiteInterface.attention");
	$wbxUrl = XWB_plugin::pCfg("wbx_url");
	$xwb_loadScript1 =  $GLOBALS['_J']['site_url'] . ('/images/xwb/dlg.js');
	$xwb_loadScript2 =  $GLOBALS['_J']['site_url'] . ('/images/xwb/xwb.js');
	$xwb_css_base = $GLOBALS['_J']['site_url'] . ('/images/xwb/xwb_base.css');
	$xwb_css_append = $GLOBALS['_J']['site_url'] . ('/images/xwb/xwb_'. XWB_S_VERSION. '.css');


$return = <<<EOF
<script language="javascript">
var _xwb_cfg_data ={
	tipsType:	'$tipsType',site_uid:	'$site_uid',sina_uid:	'$sina_uid',
	siteVer:	'$siteVer',siteName:	'$siteName',pName:'$pName',
	regUrl:		'$regUrl',
	setUrl:		'$setUrl',
	bindUrl:	'$bindUrl',
	signerUrl:	'$signerUrl',
	authUrl:	'$authUrl',
	getTipsUrl:	'$getTipsUrl',
	attentionUrl:	'$attentionUrl',
	wbxUrl:		'$wbxUrl'
};

function xwb_loadScript(file, charset){
	var script = document.createElement('SCRIPT');
	script.type = 'text/javascript'; script.charset = charset; script.src = file;
	document.getElementsByTagName('HEAD')[0].appendChild(script);
}
xwb_loadScript("$xwb_loadScript1", "UTF-8");
xwb_loadScript("$xwb_loadScript2", "UTF-8");
</script>
<link href="$xwb_css_base" rel="stylesheet" type="text/css" />
<link href="$xwb_css_append" rel="stylesheet" type="text/css" />

EOF;

	/*
	$sess = XWB_plugin::getUser();
	$xwb_statInfo = $sess->getStat();
	foreach( $xwb_statInfo as $k => $stat ){
		$xwb_statType = isset($stat['xt']) ? (string)$stat['xt'] : 'unknown';
		$return .= XWB_plugin::statUrl( $xwb_statType, $stat, true );
	}

	if( !empty($xwb_statInfo) ){
		$sess->clearStat();
	}
	*/

	return $return;
}

//插件appkey定义
define('XWB_APP_KEY',			($GLOBALS['_J']['config']['sina']['app_key'] ? $GLOBALS['_J']['config']['sina']['app_key'] : '3015840342'));
define('XWB_APP_SECRET_KEY',	($GLOBALS['_J']['config']['sina']['app_secret'] ? $GLOBALS['_J']['config']['sina']['app_secret'] : '484175eda3cf0da583d7e7231c405988'));


/**
 * 定义记事狗相关的常量
 *
 */
define('XWB_S_CHARSET',		str_replace("-","",strtoupper($GLOBALS['_J']['config']['charset'])));
define('XWB_S_TBPRE',		$GLOBALS['_J']['config']['db_table_prefix']);
define('XWB_S_VERSION',		'2.5.0');
define('XWB_S_NAME',		'JishiGou');
define('XWB_S_TITLE',		XWB_plugin::convertEncoding($GLOBALS['_J']['config']['site_name'], XWB_S_CHARSET, 'UTF-8'));
define('XWB_S_SITEURL',		$GLOBALS['_J']['config']['site_url'] . "/");


/**
 * 初始化记事狗数据库操作类
 */
if(!$GLOBALS[XWB_SITE_GLOBAL_V_NAME]['site_db'])
{
	include_once(XWB_P_ROOT . '/lib/xwbDB.class.php');
	$GLOBALS[XWB_SITE_GLOBAL_V_NAME]['site_db'] = new xwbDB();
	$GLOBALS[XWB_SITE_GLOBAL_V_NAME]['site_db']->connect($GLOBALS['_J']['config']['db_host'],$GLOBALS['_J']['config']['db_user'],$GLOBALS['_J']['config']['db_pass'],$GLOBALS['_J']['config']['db_name'],$GLOBALS['_J']['config']['db_persist'],true,XWB_S_CHARSET);
}


/**
 * 初始化记事狗系统的用户登录信息
 */
if (!defined('MEMBER_ID'))
{
	$jsg_authcode = $_COOKIE["{$GLOBALS['_J']['config']['cookie_prefix']}auth"];
	list($jsg_password,$jsg_uid)=($jsg_authcode ? explode("\t",authcode($jsg_authcode,'DECODE')) : array('','',0));
	if ($jsg_uid && $jsg_password)
	{
		$jsg_members = $GLOBALS[XWB_SITE_GLOBAL_V_NAME]['site_db']->fetch_first("select `uid`,`username`, `nickname`,`password`,`role_type`, `salt` from ".XWB_S_TBPRE."members where `uid`='$jsg_uid'");
		if ($jsg_members && $jsg_password==$jsg_members['password'])
		{
			define('MEMBER_ID',(int) $jsg_members['uid']);
			define('MEMBER_NAME',$jsg_members['username']);
			define('MEMBER_NICKNAME',$jsg_members['nickname']);
			define('MEMBER_ROLE_TYPE',$jsg_members['role_type']);
		}
	}
}


// 记事狗站点 的用户UID
define('XWB_S_UID',			(int)(MEMBER_ID));

define('XWB_S_IS_ADMIN',	( (MEMBER_ROLE_TYPE == 'admin') ? true : false ));


?>