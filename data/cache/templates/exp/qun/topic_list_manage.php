<?php /* 2015-04-01 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?><script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script> <?php if($this->Config['qun_attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?> <?php $allow_pic = $this->Config['image_enable'] ? $this->Config['image_enable'] : 0 ?> <?php $allow_face = $this->Config['face_enable'] ? $this->Config['face_enable'] : 0 ?> <div class="from"> <div class="handle"> <ul> <?php if(MEMBER_ID>0) { ?> <li> <?php if($val['managetype'] != 2) { ?> <span><a href="javascript:void(0);" onclick="
<?php if($allow_list_manage) { ?>
get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>,<?php echo $allow_pic; ?>,<?php echo $allow_face; ?>,{appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>',noReply:1});
<?php } else { ?>get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>);
<?php } ?>
" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?> </a></span> <?php } else { ?><span title="设置了特殊的权限，不允许转发">转发</span> <?php } ?> </li> <li class="o_line_l">|</li> <li> <?php if(!$val['reply_disable'] && $val['managetype'] != 2) { ?> <span> <a href="javascript:void(0)" onclick="
<?php if($allow_list_manage) { ?>
replyTopic(<?php echo $val['tid']; ?>,'<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',1,<?php echo $allow_attach; ?>,<?php echo $allow_face; ?>,<?php echo $allow_pic; ?>,1,{appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>'});
<?php } else { ?>replyTopic(<?php echo $val['tid']; ?>,'<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,<?php echo $allow_attach; ?>,<?php echo $allow_face; ?>,<?php echo $allow_pic; ?>,1);
<?php } ?>
return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?> </a> </span> <?php } else { ?><span>评论</span> <?php } ?> </li> <li class="o_line_l">|</li> <li id="topic_lists_<?php echo $val['tid']; ?>_a" class="mobox"><a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> <div id="topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none"> <?php if(MEMBER_ID>0) { ?> <?php if('myfavorite'==$this->Code) { ?> <span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a></span> <?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a></span> <?php } ?> <?php } ?> <a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank" title="去<?php echo $this->Config['changeword']["n_weibo"]; ?>详细页面浏览">详情</a> <?php if(jallow($val['uid'])) { ?> <?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?> <a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a> <?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?> <?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?> <?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?> <a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a> <?php } ?> <?php } ?> <?php } ?> <?php if(true===jaccess('topic', 'do_recd')) { ?> <a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>'});return false;">推荐</a> <?php } ?> <span 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
><a href="javascript:;" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息"><font color="red">举报</font></a></span> </div> </li> <?php } ?> </ul> </div> <div class="mycome"> <?php if(!$no_from) { ?> <?php echo $val['from_html']; ?> <?php } ?> </div> </div>