<?php /* 2015-04-01 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?>
<?php if($val['uid']) { ?> <style type="text/css">
.relayFloor .feedCell .wb_l_face .avatar{ width:25px; height:25px;box-shadow:none;}
</style> <div class="wb_l_face"> <?php if($val['anonymous']) { ?> <div class="avatar"><a href="javascript:void(0)" class="nude_face"><img src="<?php echo $val['face']; ?>" /></a></div> <?php } else { ?><div class="avatar"> <?php if($this->Code != '' || $_GET['mod'] == 'channel') { ?> <?php if(MEMBER_ID != $val['uid']) { ?> <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();" class="nude_face"> <img src="./images/noavatar.gif" data-original="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" class="lazyload" /> </a> <?php if(!$GLOBALS['IMG_LAZYLOAD_CODE_INIT'] && ($GLOBALS['IMG_LAZYLOAD_CODE_INIT']=1)) { ?> <script type="text/javascript">//图片延迟加载代码，加上IF判断，为求只出现一次。
$(document).ready(function(){$("ul.imgList img, div.avatar img.lazyload").lazyload({skip_invisible : false, threshold : 200, effect : "fadeIn"});});
</script> <?php } ?> <?php } else { ?> <a href="javascript:void(0)" class="nude_face"> <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a> <?php } ?> <?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>" class="nude_face"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a> <?php } ?> </div> <?php if($this->Config['is_topic_user_follow'] && !$val['user_css']) { ?> <?php echo $val['follow_html']; ?> <?php } ?> <?php if($val['user_css']) { ?> <p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p> <?php } ?> <?php } ?> </div> <div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div> <div id="Pmsend_to_user_area" style="width:430px;display:none"></div> <div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div> <div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div> <?php } else { ?><div class="wb_l_face"> <div class="avatar"> <a href="javascript:void(0)" class="nude_face"><img src="<?php echo $val['face']; ?>" title="未在<?php echo $this->Config['changeword']['p_weibo']; ?>登录的论坛用户" onerror="javascript:faceError(this);" /></a> </div></div> <?php } ?> <div class="Contant"> <div style="_overflow:hidden"> <div class="topicTxt"> <p class="utitle"> <?php if($val['uid']) { ?> <span class="un"> <?php if($val['anonymous']) { ?> <a title="<?php echo $val['nickname']; ?>" href="javascript:void(0)" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a> <?php } else { ?><a title="查看<?php echo $val['nickname']; ?>的<?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"  onmouseover="get_at_user_choose('<?php echo $val['nickname']; ?>',this)"><?php echo $val['nickname']; ?></a> <?php if($val['validate_html']) { ?> <?php echo $val['validate_html']; ?> <?php } else { ?> <?php if($this->Config['topic_level_radio']) { ?> <span class="wb_l_level"> <a class="ico_level wbL<?php echo $val['level']; ?>" title="等级：<?php echo $val['level']; ?>级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a> </span> <?php } ?> <?php } ?> <?php if($this->Config['is_signature']) { ?> <?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?> <?php if($val['signature']) { ?> <span class="signature"> <?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?> <a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名"> <em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">（<?php echo $val['signature']; ?>）</em> </a> <?php } else { ?><em> (<?php echo $val['signature']; ?>)</em> <?php } ?> </span> <?php } ?> <?php } ?> <?php } ?> <?php } ?> </span> <?php } else { ?><span class="un"><a title="未在<?php echo $this->Config['changeword']['p_weibo']; ?>登录的论坛用户" href="javascript:;" ><?php echo $val['nickname']; ?></a></span> <?php } ?> <span class="ut"><a href="<?php echo $val['bbsurl']; ?>" target="_blank"><?php echo $val['dateline']; ?></a></span> </p> <?php if($val['title']) { ?> <p><b><?php echo $val['title']; ?></b></p> <?php } ?> <span id="c_<?php echo $val['pid']; ?>_short"><?php echo $val['content']; ?></span> <span id="c_<?php echo $val['pid']; ?>_full" style="display:none;"><?php echo $val['content_full']; ?></span> <?php if($val['longtext']) { ?> <span> <a id="linktext_<?php echo $val['pid']; ?>" href="javascript:;" onclick="item_longtext('<?php echo $val['pid']; ?>');return false;">查看全文</a> </span> <?php } ?> <?php if($val['first'] == 0) { ?> <div class="relayTxt"> <div class="mid"> <?php if($val['tuid']) { ?> <span> <a href="index.php?mod=<?php echo $val['t_username']; ?>" onmouseover="get_user_choose(<?php echo $val['tuid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();"><?php echo $val['t_nickname']; ?></a><?php echo $val['t_validate_html']; ?> : 
<span id="user_<?php echo $val['tid']; ?>_reply_user"></span> </span> <?php } else { ?><span><a title="未在<?php echo $this->Config['changeword']['p_weibo']; ?>登录的论坛用户" href="javascript:;"><?php echo $val['t_nickname']; ?></a>: </span> <?php } ?> <span><?php echo $val['t_title']; ?></span> <div>发布于：<?php echo $val['t_dateline']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $val['bbsurl']; ?>" target="_blank">回帖(<?php echo $val['replys']; ?>)</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $val['lasturl']; ?>" target="_blank"><?php echo $val['lastpost']; ?></a></div> </div> </div> <div class="from"><div class="handle"><ul><li></li></ul></div><div class="mycome">来自<a href="<?php echo $val['forumurl']; ?>" target="_blank">论坛 - <?php echo $val['forumtitle']; ?></a></div></div> <?php } else { ?><div class="from"><div class="handle"><ul><li><span> <?php if($val['replys']) { ?> <a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" onclick="replyTopic(<?php echo $val['rid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,0,0,0,{item:'bbs'});return false;">回帖 (<?php echo $val['replys']; ?>)</a></span></li><li><span><a href="<?php echo $val['lasturl']; ?>" target="_blank"><?php echo $val['lastpost']; ?></a> <?php } else { ?>回帖 (<?php echo $val['replys']; ?>)&nbsp;&nbsp;</span></li><li><span><?php echo $val['lastpost']; ?> <?php } ?> </span></li></ul></div><div class="mycome">来自<a href="<?php echo $val['forumurl']; ?>" target="_blank">论坛 - <?php echo $val['forumtitle']; ?></a></div></div> <?php } ?> </div> </div> <div id="reply_area_<?php echo $val['tid']; ?>"></div> </div>