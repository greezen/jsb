<?php /* 2015-04-01 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?>
<?php $trid=$val['relateid'];$rlt=$relate_list[$trid]; ?> <div class="relayTxt"> <div class="relate <?php echo $val['channel_type']; ?>"> <p><span> <a href="index.php?mod=<?php echo $rlt['username']; ?>"	onmouseover="get_user_choose(<?php echo $rlt['uid']; ?>,'_relate_user',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();"> <?php echo $rlt['nickname']; ?> </a><?php echo $rlt['validate_html']; ?> :<span id="user_<?php echo $val['tid']; ?>_relate_user"></span></span> <?php $TPTR_ = $TPTR_ ? $TPTR_ : 'TPT_'; ?> <div id="topic_content_<?php echo $TPTR_; ?><?php echo $rlt['tid']; ?>_short" style="padding-right:60px;"> <?php echo $rlt['content']; ?> <?php if($rlt['imageid'] && $rlt['image_list']) { ?> <div onclick="view_longtext('<?php echo $rlt['longtextid']; ?>', '<?php echo $rlt['tid']; ?>', '<?php echo $rlt['tid']; ?>', '<?php echo $TPTR_; ?>', '<?php echo $rlt['tid']; ?>');return false;"> <ul class="imgList"> <?php if(is_array($rlt['image_list'])) { foreach($rlt['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif" data-original="<?php echo $iv['image_small']; ?>"></li> <?php } } ?> </ul> </div> <?php } ?> </div> <?php if($rlt['imageid'] && $rlt['image_list']) { ?> <div style="display:none;"> <ul class="imgList"> <?php if(is_array($rlt['image_list'])) { foreach($rlt['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif" data-original="<?php echo $iv['image_original']; ?>"></li> <?php } } ?> </ul> </div> <?php } ?> <span id="topic_content_<?php echo $TPTR_; ?><?php echo $rlt['tid']; ?>_full" style="padding-right:60px;"></span> <?php if($rlt['longtextid'] > 0) { ?> <a class="longText" id="longText_<?php echo $rlt['tid']; ?>" href="javascript:;" onclick="view_longtext('<?php echo $rlt['longtextid']; ?>', '<?php echo $rlt['tid']; ?>', '<?php echo $rlt['tid']; ?>', '<?php echo $TPTR_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a> <?php } ?> <?php if($rlt['attachid'] && $rlt['attach_list']) { ?> <table class="attachst" style="width:490px;"> <?php if(is_array($rlt['attach_list'])) { foreach($rlt['attach_list'] as $iv) { ?> <?php $attachaid=$iv['id']; ?> <tr> <td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td> <td class="attachst_att"><p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p> <p class="attachList_att_doc"> <?php if($iv['onlineview']) { ?> <a href="<?php echo $iv['onlineview']; ?>" target="_blank">在线预览</a> | 
<?php } ?> <a href="javascript:void(0);"
onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<font id="attach_score_<?php echo $iv['id']; ?>"><?php echo $iv['attach_score']; ?></font>积分，已下载<font id="attach_downnum_<?php echo $iv['id']; ?>" class="attach_downnum_<?php echo $iv['id']; ?>"><?php echo $iv['attach_down']; ?></font>次）</p></td> </tr> <?php } } ?> </table> <?php } ?> <?php if($rlt['videoid'] and $this->Config['video_status']) { ?> <div class="feedUservideo"> <a onClick="javascript:showFlash('<?php echo $rlt['VideoHosts']; ?>', '<?php echo $rlt['VideoLink']; ?>', this, '<?php echo $rlt['VideoID']; ?>','<?php echo $rlt['VideoUrl']; ?>');"> <div id="play_<?php echo $rlt['VideoID']; ?>" class="vP"><img src="static/image/feedvideoplay.gif" /></div> <img src="<?php echo $rlt['VideoImg']; ?>" style="border: none" /> </a></div> <?php } ?> <?php if($rlt['musicid']) { ?> <?php if($rlt['xiami_id']) { ?> <div class="feedUserImg"> <embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $rlt['xiami_id']; ?>/singlePlayer.swf"></embed> </div> <?php } else { ?> <div class="feedUserImg"> <div id="play_<?php echo $rlt['MusicID']; ?>"></div> <img src="static/image/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $rlt['MusicUrl']; ?>', this, '<?php echo $rlt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div> <?php } ?> <?php } ?> </p> <div class="favorTag"> <a 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();"
<?php } else { ?>onclick="topicdig(<?php echo $rlt['tid']; ?>,<?php echo $rlt['uid']; ?>,<?php echo $rlt['digcounts']; ?>,'<?php echo $this->Config['changeword']['dig']; ?>',1);return false;"
<?php } ?>
class="topicdig_<?php echo $rlt['tid']; ?>" href="javascript:void(0)" value="<?php echo $rlt['tid']; ?>" rel="<?php echo $rlt['digcounts']; ?>"><?php echo $this->Config['changeword']['dig']; ?> <?php if($rlt['digcounts']) { ?>
(<?php echo $rlt['digcounts']; ?>)
<?php } ?> </a> &nbsp;<a href="index.php?mod=topic&code=<?php echo $trid; ?>" target="_blank">评论(<?php echo $rlt['replys']; ?>)</a></div> </div> </div>