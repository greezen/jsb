<?php /* 2015-04-01 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?><!doctype html> <html> <head> <?php $__my=$GLOBALS['_J']['member']; ?> <base href="<?php echo $this->Config['site_url']; ?>/" /> <title> <?php echo jhtmlspecialchars($this->Title); ?>
- <?php echo $this->Config['site_name']; ?>(<?php echo $this->Config['site_domain']; ?>)<?php echo $GLOBALS['_J']['config']['page_title']; ?></title> <?php $conf_charset=$this->Config['charset']; ?> <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $conf_charset; ?>" /> <meta http-equiv="X-UA-Compatible" content="Chrome=1,IE=edge" /> <?php if($this->Config['default_module']==$this->Module && $this->Code==$this->Config['default_code']) { ?> <meta name="Keywords" content="<?php echo $this->Config['index_meta_keywords']; ?>,
<?php echo jhtmlspecialchars($this->MetaKeywords); ?>
,<?php echo $GLOBALS['_J']['config']['site_name']; ?><?php echo $GLOBALS['_J']['config']['meta_keywords']; ?>" /> <meta name="Description" content="<?php echo $this->Config['index_meta_description']; ?>,
<?php echo jhtmlspecialchars($this->MetaDescription); ?>
,<?php echo $GLOBALS['_J']['config']['site_notice']; ?><?php echo $GLOBALS['_J']['config']['meta_description']; ?>" /> <?php } else { ?><meta name="Keywords" content="
<?php echo jhtmlspecialchars($this->MetaKeywords); ?>
,<?php echo $GLOBALS['_J']['config']['site_name']; ?><?php echo $GLOBALS['_J']['config']['meta_keywords']; ?>" /> <meta name="Description" content="
<?php echo jhtmlspecialchars($this->MetaDescription); ?>
,<?php echo $GLOBALS['_J']['config']['site_notice']; ?><?php echo $GLOBALS['_J']['config']['meta_description']; ?>" /> <?php } ?> <link rel="shortcut icon" href="favicon.ico" > <!-- <link href="<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/min/?g=css&c=<?php echo $GLOBALS['_J']['charset']; ?>&v=<?php echo SYS_BUILD; ?>" rel="stylesheet" type="text/css" /> --> <link href="static/style/main.css?build+20140922" rel="stylesheet" type="text/css" /> <link href="static/style/send.css?build+20140922" rel="stylesheet" type="text/css" /> <link href="static/style/global.css?build+20140922" rel="stylesheet" type="text/css" /> <link href="static/style/sidebar.css?build+20140922" rel="stylesheet" type="text/css" /> <?php if($this->Config['qun_theme_id']) { ?> <link href="static/style/qun_theme/<?php echo $this->Config['qun_theme_id']; ?>.css?v=<?php echo SYS_BUILD; ?>" rel="stylesheet" type="text/css" /><?php } elseif($this->Config['theme_id']) { ?><link href="theme/<?php echo $this->Config['theme_id']; ?>/theme.css?v=<?php echo SYS_BUILD; ?>" rel="stylesheet" type="text/css" /> <?php } ?> <link href="templates/exp/static/exp.css?build+20140922" rel="stylesheet" type="text/css" /> <link href="static/style/hack.css?build+20140922" rel="stylesheet" type="text/css" /><style type="text/css"> <?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>; }
<?php } ?> <?php if($this->Config['theme_bg_color']) { ?>
body{ background-color:<?php echo $this->Config['theme_bg_color']; ?>; }
<?php } ?> <?php if($this->Config['theme_bg_image']) { ?>
body{ background-image:url(<?php echo $this->Config['theme_bg_image']; ?>); }
<?php } ?> <?php if($this->Config['theme_bg_position']) { ?>
body{ background-position:<?php echo $this->Config['theme_bg_position']; ?>; }
<?php } ?> <?php if($this->Config['theme_bg_repeat']) { ?>
body{ background-repeat:<?php echo $this->Config['theme_bg_repeat']; ?>; }
<?php } ?> <?php if($this->Config['theme_bg_fixed']) { ?>
body{ background-attachment:<?php echo $this->Config['theme_bg_fixed']; ?>; }
<?php } ?> <?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>; }
<?php } ?> <?php if($this->Config['theme_link_color']) { ?>
a:link{ color:<?php echo $this->Config['theme_link_color']; ?>; }
<?php } ?>
ul.imgList li .showcursor,a.artZoom{ cursor:url(<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/image/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLink { cursor:url(<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/image/magnifier_s.cur), pointer; }
a.artZoom2{ cursor:url(<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/image/magnifier_b.cur), pointer; }
a.artZoom3{ cursor:url(<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/image/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLink3 { cursor:url(<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/image/magnifier_s.cur), pointer; }
a.artZoomAll{ cursor:url(<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/image/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLinkAll { cursor:url(<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/image/magnifier_s.cur), pointer; }
</style><script type="text/javascript">
var thisSiteURL = '<?php echo $GLOBALS['_J']['config']['site_url']; ?>/';
var thisTopicLength = '<?php echo $GLOBALS['_J']['config']['topic_input_length']; ?>';
var thisMod = '<?php echo $this->Module; ?>';
var thisCode = '<?php echo $this->Code; ?>';
var thisFace = '<?php echo $__my['face_small']; ?>';
var YXM_POP_Title = '<?php echo $this->yxm_title; ?>';
var YXM_CODE_COM = '<?php echo $this->Config['seccode_comment']; ?>';
var YXM_CODE_FOR = '<?php echo $this->Config['seccode_forward']; ?>';
var __N_WEIBO__ = '<?php echo $this->Config['changeword']['n_weibo']; ?>';
var __P_WEIBO__ = '<?php echo $this->Config['changeword']['p_weibo']; ?>';
var __WEIQUN__ = '<?php echo $this->Config['changeword']['weiqun']; ?>';
var publish_in_str=[<?php echo $this->Config['in_publish_notice_js']; ?>];
var __ALERT__='<?php echo $this->Config['verify_alert']; ?>';
<?php if($GLOBALS['_J']['config']['qun_setting']['qun_open']) { ?>
var isQunClosed = false;
<?php } else { ?>var isQunClosed = true;
<?php } ?>
function faceError(imgObj) {
var errorSrc = '<?php echo $GLOBALS['_J']['config']['site_url']; ?>/images/noavatar.gif';
imgObj.src = errorSrc;
}
</script> <!-- <script type="text/javascript" src="<?php echo $GLOBALS['_J']['config']['site_url']; ?>/static/min/?g=js&c=<?php echo $GLOBALS['_J']['charset']; ?>&v=<?php echo SYS_BUILD; ?>"></script> --> <script type="text/javascript" src="static/js/cookies.js?build+20140922"></script> <script type="text/javascript" src="static/js/min.js?build+20140922"></script> <script type="text/javascript" src="static/js/common.js?build+20140922"></script> <script type="text/javascript" src="static/js/publishbox.js?build+20140922"></script> <script type="text/javascript" src="static/js/jsgst.js?build+20140922"></script> <?php if(in_array(jget('mod'), array("follow","fans"))) { ?> <script type="text/javascript" src="static/js/relation.js?build+20140922"></script> <?php } ?> <?php if($this->Get['mod']=="vote") { ?> <script type="text/javascript" src="static/js/vote.js?build+20140922"></script> <?php } ?> <?php if($this->Get['mod']=="qun") { ?> <script type="text/javascript" src="static/js/qun.js?build+20140922"></script> <?php } ?> <link rel="stylesheet" href="static/js/artDialog/css/ui-dialog.css?build+20140922"> <link rel="stylesheet" href="static/style/contact.css?build+20140922"> <script src="static/js/artDialog/dist/dialog-min.js?build+20140922"></script> </head> <?php echo $additional_str; ?> <body> <div class="exp-wrap"> <div class="g-hd2"> <div class="g-doc"> <div class="m-hd2"> <ul class="hleft"> <li class="logo"> <a href="index.php?mod=topic" title="<?php echo $this->Config['site_name']; ?>"><img src="images/logo.png" style="_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true,sizingMethod=crop)"/> </a> </li> <?php if(is_array($GLOBALS['_J']['config']['navigation'])) { foreach($GLOBALS['_J']['config']['navigation'] as $top_nav_key => $top_nav) { ?> <li class="t_hdnav t_hdnav_<?php echo $top_nav_key; ?>"> <a 
<?php if(jget('top_nav')==$top_nav_key) { ?>
class="t_hdnav_cur" 
<?php } ?>
title="<?php echo $top_nav['name']; ?>" target="<?php echo $top_nav['target']; ?>" href="
<?php echo nav_url($top_nav['url'], $top_nav_key); ?>
"><?php echo $top_nav['name']; ?></a> <?php if(is_array($top_nav['list']) && count($top_nav['list'])) { ?> <script type="text/javascript">
$(document).ready(function(){
$(".t_hdnav_<?php echo $top_nav_key; ?>").mouseover(function(){$(".t_hdnav_box_<?php echo $top_nav_key; ?>").show();$(".t_hdnav_<?php echo $top_nav_key; ?>").addClass("on");});
$(".t_hdnav_<?php echo $top_nav_key; ?>").mouseout(function(){$(".t_hdnav_box_<?php echo $top_nav_key; ?>").hide();$(".t_hdnav_<?php echo $top_nav_key; ?>").removeClass("on");});
});
</script> <ul class="t_hdnav_box t_hdnav_box_<?php echo $top_nav_key; ?>" style="display: none;"> <div class="main_menu_box"> <?php if(is_array($top_nav['list'])) { foreach($top_nav['list'] as $side_nav_key => $side_nav) { ?> <?php if($side_nav['display_in_top']) { ?> <dl> <dt> <?php if($side_nav['url']) { ?> <a title="<?php echo $side_nav['name']; ?>" target="<?php echo $side_nav['target']; ?>" href="
<?php echo nav_url($side_nav['url'], $top_nav_key); ?>
"><?php echo $side_nav['name']; ?></a> <?php } else { ?> <a><?php echo $side_nav['name']; ?></a> <?php } ?> </dt> <?php if($side_nav['list']) { ?> <dd> <?php if(is_array($side_nav['list'])) { foreach($side_nav['list'] as $nav_key => $nav) { ?> <?php if($nav['display_in_top']) { ?> <a title="<?php echo $nav['name']; ?>" target="<?php echo $nav['target']; ?>" href="
<?php echo nav_url($nav['url'], $top_nav_key, $nav_key); ?>
"><?php echo $nav['name']; ?></a> <?php } ?> <?php } } ?> </dd> <?php } ?> </dl> <?php } ?> <?php } } ?> </div> </ul> <?php } ?> </li> <?php } } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_header_nav2'])) echo $GLOBALS['_J']['pluginhooks']['global_header_nav2'];?> <li class="sweibo"> <div class="searchTool"> <form method="get" action="#" name="headSearchForm" id="headSearchForm" onsubmit="return headDoSearch();"> <?php if($this->Module == "vote") { ?> <input id="headSearchType" name="searchType" type="hidden" value="voteSearch"> <?php } elseif($this->Module == "qun") { ?> <input id="headSearchType" name="searchType" type="hidden" value="qunSearch"> <?php } else { ?> <input id="headSearchType" name="searchType" type="hidden" value="topicSearch"> <?php } ?> <div class="selSearch"> <?php if($this->Module == "vote") { ?> <div class="nowSearch" id="headSlected" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');">投票</div> <?php } elseif($this->Module == "qun") { ?> <div class="nowSearch" id="headSlected" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');">微群</div> <?php } else { ?> <div class="nowSearch" id="headSlected" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');"><?php echo $this->Config['changeword']['n_weibo']; ?></div> <?php } ?> <div class="btnSel"><a href="#" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');"></a></div> <div class="clear"></div> <ul class="selOption" id="headSel" style="display:none;"> <li><a href="#" onclick="return search_show('head','userSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">用户</a></li> <li><a href="#" onclick="return search_show('head','tagSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">话题</a></li> <li><a href="#" onclick="return search_show('head','topicSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');"><?php echo $this->Config['changeword']['n_weibo']; ?></a></li> <?php if($this->Config['vote_open']) { ?> <li><a href="#" onclick="return search_show('head','voteSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">投票</a></li> <?php } ?> <?php if($this->Config['qun_setting']['qun_open']) { ?> <li><a href="#" onclick="return search_show('head','qunSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');"><?php echo $this->Config['changeword']['weiqun']; ?></a></li> <?php } ?> </ul> </div> <input class="txtSearch" id="headq" name="headSearchValue" type="text" value="请输入关键字" onfocus="if(this.value=='请输入关键字'){this.value='';}" onblur="if(this.value==''){this.value='请输入关键字';}"/> <div class="btnSearch"> <a href="#" onclick="javascript:return headDoSearch();"><span class="lbl"></span></a></div> </form> </div> </li> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_header_nav3'])) echo $GLOBALS['_J']['pluginhooks']['global_header_nav3'];?> </ul> <?php if($this->Get['mod'] == 'channel') { ?> <?php $post_item = 'channel';$post_item_id = (int)$_GET['id']; ?> <?php } ?> <ul class="hright"> <?php if(MEMBER_ID > 0) { ?> <script type="text/javascript">
$(document).ready(function(){
$(".t_setting").mouseover(function(){$(".t_member_box").show();$(".t_setting").addClass("on");});
$(".t_setting").mouseout(function(){$(".t_member_box").hide();$(".t_setting").removeClass("on");});
$(".t_news").mouseover(function(){$(".t_news_box").show();$(".t_news").addClass("onn");});
$(".t_news").mouseout(function(){$(".t_news_box").hide();$(".t_news").removeClass("onn");});
});
</script> <?php if($member['uid'] == MEMBER_ID) $_mymember = $member ?> <?php if($member['uid'] != MEMBER_ID) $_mymember = jsg_member_info(MEMBER_ID) ?> <li class="t_member" onclick="location='index.php?mod=<?php echo MEMBER_NAME; ?>'" title="我是<?php echo MEMBER_NICKNAME; ?>，点此访问个人主页" style="cursor:pointer;"> <!--<b class="member_name"><?php echo MEMBER_NICKNAME; ?></b>--> <img class="member" src="<?php echo $_mymember['face_original']; ?>" onerror="javascript:faceError(this);"/> </li> <li class="t_write t_sub" style="cursor:pointer;" onclick="showMainPublishBox('<?php echo $post_item; ?>','<?php echo $post_item; ?>','<?php echo $post_item_id; ?>');" title="发微博"> <input type="hidden" name="check_PublishBox_uid" id="check_PublishBox_uid"  value="<?php echo MEMBER_ID; ?>"/> <input type="hidden" id="verify" name="verify" value="<?php echo $this->Config['verify']; ?>"> </li> <li class="t_news t_sub"> <i></i> <?php if($__my['comment_new']>0 || $__my['at_new']>0 || $__my['fans_new']>0 || $__my['favoritemy_new']>0 || $__my['dig_new']>0 || $__my['newpm']>0) { ?> <em></em> <?php } ?> <ul class="t_news_box"> <li><a href="index.php?mod=comment&code=inbox">评论我的
<?php if($__my['comment_new']>0) { ?> <span>+<?php echo $__my['comment_new']; ?></span> <?php } ?> </a></li> <li><a href="index.php?mod=at">@我的
<?php if($__my['at_new']>0) { ?> <span>+<?php echo $__my['at_new']; ?></span> <?php } ?> </a></li> <li><a href="index.php?mod=fans&uid=<?php echo $__my['uid']; ?>">关注我的
<?php if($__my['fans_new']>0) { ?> <span>+<?php echo $__my['fans_new']; ?></span> <?php } ?> </a></li> <li><a href="index.php?mod=topic_favorite&code=me">收藏我的
<?php if($__my['favoritemy_new']>0) { ?> <span>+<?php echo $__my['favoritemy_new']; ?></span> <?php } ?> </a></li> <li><a href="index.php?mod=<?php echo $__my['username']; ?>&type=mydig"><?php echo $this->Config['changeword']['dig']; ?>我的
<?php if($__my['dig_new']>0) { ?> <span>+<?php echo $__my['dig_new']; ?></span> <?php } ?> </a></li> <li class="lineNav"></li> <li><a href="index.php?mod=pm&code=list">私信
<?php if($__my['newpm']>0) { ?> <span>+<?php echo $__my['newpm']; ?></span> <?php } ?> </a></li> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_header_message'])) echo $GLOBALS['_J']['pluginhooks']['global_header_message'];?> </ul> </li> <li class="t_setting t_sub"> <i></i> <ul class="t_member_box"> <li> <a href="index.php?mod=settings"><b>[资料设置]</b></a> <a href="index.php?mod=settings&code=face">修改头像</a> <a href="index.php?mod=settings&code=secret">修改密码</a> <a href="index.php?mod=skin">更换皮肤</a> <a href="index.php?mod=profile&code=invite">邀请关注</a> <a href="index.php?mod=other&code=medal&view=my">我的勋章</a> <a href="index.php?mod=other&code=vip_intro">申请V认证</a> <?php if($this->Config['sendmailday'] > 0) { ?> <A HREF="index.php?mod=settings&code=sendmail">邮件提醒</A> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_header_mynav1'])) echo $GLOBALS['_J']['pluginhooks']['global_header_mynav1'];?> <span id="web_list_type_<?php echo MEMBER_ID; ?>"> <input type="hidden" id="web_style" name="web_style" value="<?php echo MEMBER_STYLE_THREE_TOL; ?>"/> <?php if (MEMBER_STYLE_THREE_TOL == 1) $ajax_list = 'right'; else $ajax_list = 'left'; ?> <a href="javascript:void(0);" title="推荐开启左侧导航，更清晰" onclick="web_list_type(<?php echo MEMBER_ID; ?>,'web_style','<?php echo $params['code']; ?>','<?php echo $ajax_list; ?>','<?php echo $member['uid']; ?>'); return false;"> <?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
关左侧导航
<?php } else { ?>开左侧导航
<?php } ?> </a> <input type="hidden" name='hid_type' id='hid_type' value='<?php echo $type; ?>'> </span> </li> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_header_mynav1'])) echo $GLOBALS['_J']['pluginhooks']['global_header_mynav1'];?> <li> <a href="index.php?mod=<?php echo MEMBER_NAME; ?>"><b>[个人主页]</b></a> <a href="index.php?mod=<?php echo MEMBER_NAME; ?>&type=mydigout">我<?php echo $this->Config['changeword']['dig']; ?>的</a> <a href="index.php?mod=vote&view=me">我的投票</a> <a href="index.php?mod=event&code=myevent">我的活动</a> <a href="index.php?mod=attach&code=myattach">我的附件</a> <a href="index.php?mod=topic_tag">关注的话题
<?php if($__my['topic_new']>0) { ?> <span>+<?php echo $__my['topic_new']; ?></span> <?php } ?> </a> <?php if($this->Config['dzbbs_enable'] || ($this->Config['phpwind_enable'] && $this->Config['pwbbs_enable'])) { ?> <a href="index.php?mod=topic&code=bbs">我的论坛</a> <?php } ?> <?php if(($this->Config['dedecms_enable'] == 1)) { ?> <a href="index.php?mod=topic&code=cms">我的资讯</a> <?php } ?> <a href="index.php?mod=<?php echo $member['username']; ?>&type=my_verify">等待审核</a> </li> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_header_mynav2'])) echo $GLOBALS['_J']['pluginhooks']['global_header_mynav2'];?> <li> <a href="index.php?mod=topic&code=recd"><b>[官方推荐]</b></a> <a href="index.php?mod=topic&code=topicnew">最新被<?php echo $this->Config['changeword']['dig']; ?></a> <a href="index.php?mod=topic&code=topicnew&orderby=post">最新发布</a> <?php if(($this->Config['vest_enable'])) { ?> <?php if((!$this->Config['vest_role'] || (jsg_find($this->Config['vest_role'], $member['role_id'])))) { ?> <a href="index.php?mod=settings&code=vest" target=_blank>添加新马甲</a> <?php } ?> <?php $vest = jlogic('member_vest')->get_member_vest(MEMBER_ID); ?> <?php if($vest) { ?> <a href="javascript:void(0);" title="可使用下面帐号登录">已有马甲：</a> <?php if(is_array($vest)) { foreach($vest as $k => $v) { ?> <?php if($k != MEMBER_ID) { ?> <a href="javascript:void(0);" onclick="changeUser(<?php echo $v['uid']; ?>)" title="点击使用此帐号登录"><?php echo $v['nickname']; ?></a> <?php } ?> <?php } } ?> <?php } ?> <?php } ?> </li> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_header_mynav3'])) echo $GLOBALS['_J']['pluginhooks']['global_header_mynav3'];?> <li style="border:none;"> <p class="spr_weibo"><a href="index.php?mod=topic" title="<?php echo $this->Config['site_name']; ?>">我的首页</a></p> <p class="spr_info"><a href="index.php?mod=topic&code=channel">我的频道</a></p> <p class="spr_fav"><a href="index.php?mod=topic_favorite">我的收藏</a></p> <?php if($this->Config['qun_setting']['qun_open']) { ?> <p class="spr_qun"> <a href="index.php?mod=topic&code=qun">
我的<?php echo $this->Config['changeword']['weiqun']; ?></a> </p> <?php } ?> <?php if('admin'==MEMBER_ROLE_TYPE) { ?> <p class="spr_manger"><a href="admin.php" target=_blank>后台管理</a></p> <?php } ?> <p class="spr_logout"><a href="<?php echo $GLOBALS['_J']['config']['site_url']; ?>/index.php?mod=login&code=logout" rel="nofollow">退出登陆</a> </p> </li> </ul> </li> <?php } else { ?><li style="margin:0; width:55px;"><a href="javascript:viod(0)" rel="nofollow" title="登录即可分享新鲜事" onclick="ShowLoginDialog(); return false;"><em style="color:#FFF">快捷登录</em></a></li> <?php } ?> </ul> </div> <?php if(MEMBER_ID>0) { ?> <?php if(($__my['comment_new']>0 || $__my['fans_new']>0 || $__my['at_new']>0 || $__my['newpm']>0 || $__my['favoritemy_new']>0 || $__my['vote_new']>0 || $__my['qun_new']>0 || $__my['event_new']>0 || $__my['topic_new']>0 || $__my['event_post_new']>0 || $__my['fenlei_post_new']>0 || $__my['dig_new']>0 || $__my['channel_new']>0 || $__my['company_new']>0) && TOPNOTICE != 'none') { ?> <?php $__tagBoxStyle='display:block;visibility:visible;'; ?> <?php } else { ?><?php $__tagBoxStyle='display:none;visibility:hidden;'; ?> <?php } ?> <?php if(defined('NEDU_MOYO')) { ?> <?php if(nlogic('notify')->ups_haved()) { ?> <?php $__tagBoxStyle='display:block;visibility:visible;'; ?> <?php } ?> <?php } ?> <script type="text/javascript">
function m_tips_close()
{
$.post("ajax.php?mod=view&code=top_notice",{display:0},function(){});
var obj = document.getElementById("tagBox_<?php echo MEMBER_ID; ?>");
obj.style.visibility = "hidden";
}
</script> <div class="m_tips" id="tagBox_<?php echo MEMBER_ID; ?>" style="<?php echo $__tagBoxStyle; ?>"> <div id="tagBoxContent_<?php echo MEMBER_ID; ?>"> <ul> <?php if($__my['newpm']>0) { ?> <li><?php echo $__my['newpm']; ?>条新私信，<a href="index.php?mod=pm&code=list">查看</a></li> <?php } ?> <?php if($__my['comment_new']>0) { ?> <li><?php echo $__my['comment_new']; ?>条新评论，<a href="index.php?mod=comment&code=inbox">查看</a></li> <?php } ?> <?php if($__my['fans_new']>0) { ?> <li><?php echo $__my['fans_new']; ?>人关注了我，<a href="index.php?mod=fans&uid=<?php echo $__my['uid']; ?>">查看</a></li> <?php } ?> <?php if($__my['at_new']>0) { ?> <li><?php echo $__my['at_new']; ?>人@提到我，<a href="index.php?mod=at">查看</a></li> <?php } ?> <?php if($__my['favoritemy_new']>0) { ?> <li><?php echo $__my['favoritemy_new']; ?>人新收藏，<a href="index.php?mod=topic_favorite&code=me">查看</a></li> <?php } ?> <?php if($__my['dig_new']>0) { ?> <li>有<?php echo $__my['dig_new']; ?>人<?php echo $this->Config['changeword']['dig']; ?>了你，<a href="index.php?mod=<?php echo $__my['username']; ?>&type=mydig">查看</a></li> <?php } ?> <?php if($__my['channel_new']>0) { ?> <li>频道新增<?php echo $__my['channel_new']; ?>条内容，<a href="index.php?mod=topic&code=channel&orderby=post">查看</a></li> <?php } ?> <?php if($__my['company_new']>0) { ?> <li>单位新增<?php echo $__my['company_new']; ?>条内容，<a href="index.php?mod=company">查看</a></li> <?php } ?> <?php if($__my['vote_new']>0) { ?> <li>投票新增<?php echo $__my['vote_new']; ?>人参与，<a href="index.php?mod=vote&view=me&filter=new_update&uid=<?php echo $__my['uid']; ?>">查看</a></li> <?php } ?> <?php if($__my['qun_new']>0) { ?> <li><?php echo $this->Config['changeword']["weiqun"]; ?> 新增<?php echo $__my['qun_new']; ?>条内容，<a href="index.php?mod=topic&code=qun">查看</a></li> <?php } ?> <?php if($__my['event_new']>0) { ?> <li>活动新增<?php echo $__my['event_new']; ?>人报名，<a href="index.php?mod=<?php echo $__my['username']; ?>&type=event&filter=new_update">查看</a></li> <?php } ?> <?php if($__my['topic_new']>0) { ?> <li>话题新增<?php echo $__my['topic_new']; ?>条<?php echo $this->Config['changeword']['n_weibo']; ?>，<a href="index.php?mod=topic_tag">查看</a></li> <?php } ?> <?php if($__my['event_post_new']>0) { ?> <li>新增<?php echo $__my['event_post_new']; ?>个关注的活动，<a href="index.php?mod=topic&code=other&view=event">查看</a></li> <?php } ?> <?php if($__my['fenlei_post_new']>0) { ?> <li>分类新增<?php echo $__my['fenlei_post_new']; ?>个信息，<a href="index.php?mod=topic&code=other&view=fenlei">查看</a></li> <?php } ?> <?php if(defined('NEDU_MOYO')) { ?> <?php echo nlogic('notify')->ups_tips_html();; ?> <?php } ?> </ul> </div> <div class="m_tips_close"><a href="javascript:m_tips_close();" title="关闭" javascript:void(0)><img src="static/image/imgdel.gif" /></a></div> </div> <?php } ?> <div class="changeTheme"><a href="index.php?mod=skin" title="更换皮肤" javascript:void(0)></a></div> </div> </div> <?php if($this->Config['company_enable']) { ?> <?php $d_c_name = $this->Config['default_company'] ? $this->Config['default_company'] : '单位'; $d_d_name = $this->Config['default_department'] ? $this->Config['default_department'] : '部门'; $d_j_name = $this->Config['default_job'] ? $this->Config['default_job'] : '岗位'; ?> <?php } ?> <div class="g-content"> <div class="g-doc"> <?php if(MEMBER_STYLE_THREE_TOL == 1 && MEMBER_ID > 0) { ?> <?php } else { ?><style>#topic_index_left_ajax_list{display:none;}</style> <?php } ?>