<?php /* 2015-03-27 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?><style type="text/css">
.feedCell{ float:left; clear:both;}
</style> <div class="wb_l_face"> <div class="avatar"> <a href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>" class="nude_face"> <img onerror="javascript:faceError(this);" src="<?php echo $favorite_members[$val['fuid']]['face']; ?>" /> </a> </div> </div> <div class="Contant"> <div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden;"> <div class="topicTxt"> <p> <a title="查看<?php echo $favorite_members[$val['fuid']]['nickname']; ?>的<?php echo $this->Config['changeword']["n_weibo"]; ?>" href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>" onmouseover="get_at_user_choose('<?php echo $favorite_members[$val['fuid']]['nickname']; ?>',this)"> <?php echo $favorite_members[$val['fuid']]['nickname']; ?> </a> <?php echo $favorite_members[$val['fuid']]['validate_html']; ?>：
<span style="color:#666; font-size:12px;">收藏于<?php echo $val['favorite_time']; ?></span> </p> <span> <a href="index.php?mod=<?php echo $val['username']; ?>"> <?php echo $val['nickname']; ?> </a><?php echo $val['validate_html']; ?>:<?php echo $val['content']; ?> </span> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_extra2'][$topictid])) echo $GLOBALS['_J']['pluginhooks']['global_item_extra2'][$topictid];?> <?php if($val['attachid'] && $val['attach_list']) { ?> <?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?> <ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>"> <?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?> <?php $attachaid=$iv['id']; ?> <li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" /> <div class="attachList_att"> <p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
&nbsp;（<?php echo $iv['attach_size']; ?>）</p> <p class="attachList_att_doc"> <?php if($iv['onlineview']) { ?> <a href="<?php echo $iv['onlineview']; ?>" target="_blank">在线预览</a> | 
<?php } ?> <a href="javascript:void(0);"
onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<font id="attach_score_<?php echo $iv['id']; ?>"><?php echo $iv['attach_score']; ?></font>积分，已下载<font id="attach_downnum_<?php echo $iv['id']; ?>" class="attach_downnum_<?php echo $iv['id']; ?>"><?php echo $iv['attach_down']; ?></font>次）<?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_attach'][$attachaid])) echo $GLOBALS['_J']['pluginhooks']['global_item_attach'][$attachaid];?></p> </div> </li> <?php } } ?> </ul> <?php } ?> <?php if($val['is_vote'] > 0) { ?> <?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?> <ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>"> <li><a href="javascript:;"
onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img
src='./images/vote_pic_01.gif' /></a></li> </ul> <div id="vote_area_<?php echo $val['vote_key']; ?>" style="display: none;"> <div class="relayTxt"> <div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"></div> </div> </div> <?php } ?> <?php if($val['is_reward'] > 0) { ?> <ul class="imgList" id="reward_detail_<?php echo $val['tid']; ?>"> <li> <a href="javascript:;" onclick="getRewardDetailWidgets('<?php echo $val['tid']; ?>','<?php echo $val['item_id']; ?>');"><img src="<?php echo $val['reward_image']; ?>"/></a> </li> <li> <a href="javascript:;" onclick="getRewardDetailWidgets('<?php echo $val['tid']; ?>','<?php echo $val['item_id']; ?>');"><img src="./images/reword1.png"  style="padding:68px 0 0 40px;"/></a> </li> </ul> <div id="reward_area_<?php echo $val['tid']; ?>" style="display: none;"> <div class="relayTxt"> <div class="mid" id="reward_content_<?php echo $val['tid']; ?>" style="padding:10px 0"></div> </div> </div> <?php } ?> <?php if($val['videoid'] and $this->Config['video_status']) { ?> <div class="feedUservideo a"><a
onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');"> <div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img
src="images/feedvideoplay.gif" /></div> <img src="<?php echo $val['VideoImg']; ?>" style="border: none" /> </a></div> <?php } ?> <?php if($val['musicid']) { ?> <?php if($val['xiami_id']) { ?> <div class="feedUserImg"><embed width="257" height="33"
wmode="transparent" type="application/x-shockwave-flash"
src="http://www.xiami.com/widget/0_<?php echo $val['xiami_id']; ?>/singlePlayer.swf"></embed></div> <?php } else { ?><div class="feedUserImg"> <div id="play_<?php echo $val['MusicID']; ?>"></div> <img src="static/image/music.gif" title="点击播放音乐"
onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');"
style="cursor: pointer; border: none;" /></div> <?php } ?> <?php } ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script> <?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?> <?php if(!$topic_view) { ?> <?php $pt=$parent_list[$tpid]; ?> <div class="relayTxt"> <div class="mid"> <p> <?php if($pt) { ?> <span> <?php if($pt['anonymous']) { ?> <a href="javascript:void(0)"> <?php echo $pt['nickname']; ?> </a> <?php } else { ?><a
href="index.php?mod=<?php echo $pt['username']; ?>"
onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);"
onmouseout="clear_user_choose();"> <?php echo $pt['nickname']; ?> </a> <?php echo $pt['validate_html']; ?> <?php } ?>
:   <span
id="user_<?php echo $val['tid']; ?>_reply_user"></span> </span> <?php if(($pt["item"]=="vote")&&$pt["item_id"]) { ?> <?php $myOption=jlogic('vote')->get_vote_item($pt["item_id"], $pt["uid"], 1, $pt['addtime']);$string='';!$myOption['option']||$string=implode('，',$myOption['option']); ?> <?php if($string) { ?> <br><span class="topic_select"><span>投票给：<?php echo $string; ?></span></span><br /> <?php } ?> <?php } ?> <?php $TPT_ = $val['tid'].'_'; ?> <div id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"> <?php echo $pt['content']; ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_parent_extra'][$topictid])) echo $GLOBALS['_J']['pluginhooks']['global_item_parent_extra'][$topictid];?> <?php if($pt['imageid'] && $pt['image_list']) { ?> <div onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', '<?php echo $pt['tid']; ?>', '<?php echo $TPT_; ?>', '<?php echo $pt['tid']; ?>');return false;"> <ul class="imgList"> <?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif" data-original="<?php echo $iv['image_small']; ?>"></li> <?php } } ?> </ul> </div> <?php } ?> </div> <?php if($pt['imageid'] && $pt['image_list']) { ?> <div style="display:none;"> <ul class="imgList"> <?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif" data-original="<?php echo $iv['image_original']; ?>"></li> <?php } } ?> </ul> </div> <?php } ?> <span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span> <?php if($pt['longtextid'] > 0) { ?> <a class="longText" id="longText_<?php echo $val['tid']; ?><?php echo $pt['tid']; ?>" href="javascript:;" onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', '<?php echo $val['tid']; ?><?php echo $pt['tid']; ?>', '<?php echo $TPT_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a> <?php } ?> <?php if($pt['attachid'] && $pt['attach_list']) { ?> <table class="attachst" style="width:490px;"> <?php if(is_array($pt['attach_list'])) { foreach($pt['attach_list'] as $iv) { ?> <?php $attachaid=$iv['id']; ?> <tr> <td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td> <td class="attachst_att"> <p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p> <p class="attachList_att_doc"> <?php if($iv['onlineview']) { ?> <a href="<?php echo $iv['onlineview']; ?>" target="_blank">在线预览</a> | 
<?php } ?> <a href="javascript:void(0);"
onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<font id="attach_score_<?php echo $iv['id']; ?>"><?php echo $iv['attach_score']; ?></font>积分，已下载<font id="attach_downnum_<?php echo $iv['id']; ?>" class="attach_downnum_<?php echo $iv['id']; ?>"><?php echo $iv['attach_down']; ?></font>次）<?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_attach'][$attachaid])) echo $GLOBALS['_J']['pluginhooks']['global_item_attach'][$attachaid];?></p> </td> </tr> <?php } } ?> </table> <?php } ?> <?php if($pt['is_vote'] > 0) { ?> <?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?> <ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>"> <li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif' /></a></li> </ul> <div id="vote_area_<?php echo $__vote_key; ?>" style="display: none;"> <div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div> </div> <?php } ?> <?php if($pt['is_reward'] > 0) { ?> <ul class="imgList" id="reward_detail_<?php echo $pt['tid']; ?>_<?php echo $val['tid']; ?>"> <li> <a href="javascript:;" onclick="getRewardDetailWidgets('<?php echo $pt['tid']; ?>','<?php echo $pt['item_id']; ?>',<?php echo $val['tid']; ?>);"><img src="<?php echo $pt['reward_image']; ?>" style="width:120px;height:120px;"/></a> </li> <li> <a href="javascript:;" onclick="getRewardDetailWidgets('<?php echo $pt['tid']; ?>','<?php echo $pt['item_id']; ?>',<?php echo $val['tid']; ?>);"><img src="./images/reword1.png" style="padding:90px 0 0 40px;"/></a> </li> </ul> <div id="reward_area_<?php echo $pt['tid']; ?>_<?php echo $val['tid']; ?>" style="display: none;"> <div class="relayTxt"> <div class="mid" id="reward_content_<?php echo $pt['tid']; ?>_<?php echo $val['tid']; ?>" style="padding:10px 0"></div> </div> </div> <?php } ?> <?php if($pt['videoid'] and $this->Config['video_status']) { ?> <div class="feedUservideo"> <a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');"> <div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="static/image/feedvideoplay.gif" /></div> <img src="<?php echo $pt['VideoImg']; ?>" style="border: none" /> </a></div> <?php } ?> <?php if($pt['musicid']) { ?> <?php if($pt['xiami_id']) { ?> <div class="feedUserImg"> <embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $pt['xiami_id']; ?>/singlePlayer.swf"></embed></div> <?php } else { ?><div class="feedUserImg"> <div id="play_<?php echo $pt['MusicID']; ?>"></div> <img src="static/image/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div> <?php } ?> <?php } ?> </p> <div class="favorTag"> <a 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();"
<?php } else { ?>onclick="topicdig(<?php echo $pt['tid']; ?>,<?php echo $pt['uid']; ?>,<?php echo $pt['digcounts']; ?>,'<?php echo $this->Config['changeword']['dig']; ?>',1);return false;"
<?php } ?>
class="topicdig_<?php echo $pt['tid']; ?>" href="javascript:void(0)" value="<?php echo $pt['tid']; ?>" rel="<?php echo $pt['digcounts']; ?>"><?php echo $this->Config['changeword']['dig']; ?>原文
<?php if($pt['digcounts']) { ?>
(<?php echo $pt['digcounts']; ?>)
<?php } ?> </a>
&nbsp;<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
<a onclick="get_forward_choose(<?php echo $tpid; ?>,0,0,0);return false;"href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;
<?php echo $pt['from_html']; ?>&nbsp;&nbsp;<span class="recd_r_img_<?php echo $pt['tid']; ?>"> <?php if($pt['recommend'] > 0) { ?> <img src="images/recommend.gif"> <?php } ?> </span></div> <?php } else { ?> <?php $val['reply_disable']=0; ?> <p><span>原始<?php echo $this->Config['changeword']['n_weibo']; ?>已删除</span></p> <?php } ?> </div> </div> <?php } ?> <?php } ?> </div> <div class="from"> <span class="handle"></span> <span class="mycome"></span> </div> </div> <div id="reply_area_<?php echo $val['tid']; ?>"></div> <div id="modify_topic_<?php echo $val['tid']; ?>"></div> </div>