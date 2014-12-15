<?php /* 2014-12-11 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?> 
<div class="sideBar"> <script type="text/javascript">
$(document).ready(function(){
$("#m_avatar2").mouseover(function(){$(".avatar2_tips").show();});
$("#m_avatar2").mouseout(function(){$(".avatar2_tips").hide();});
var click_attup = $(".side-att-more-btn");
var show_attlist = $(".side-att-more");
//var show_attmoreli = $(".side-att-moreLi");
click_attup.click(function(){
if(show_attlist.css('display') == 'none')
{
show_attlist.show();
click_attup.text("收起更多");
}
else
{
show_attlist.hide();
click_attup.text("更多");
}
});
});
</script> <?php if(($my_member || $member)&&('mydig' == $this->Get['type'] || !in_array($params['code'],array('myblog','outbox')))) { ?> <?php $_mymember = $my_member ? $my_member : $member ?> <div class="memberBox"> <div class="person_info"> <div class="avatar2" id="m_avatar2"> <a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>"> <img src="<?php echo $_mymember['face_original']; ?>" alt="<?php echo $_mymember['nickname']; ?>" onerror="javascript:faceError(this);" /> </a> <?php if(MEMBER_ID == $_mymember['uid']) { ?> <p class="avatar2_tips"><a id="avatar_upload" href="index.php?mod=settings&code=face">修改头像</a></p> <?php } ?> </div> <div class="avatar2_info"> <p class="name"> <a href="index.php?mod=<?php echo $member['username']; ?>" title="@<?php echo $member['nickname']; ?>"><b><?php echo $member['nickname']; ?></b></a> </p> <p><?php echo $member['validate_html']; ?></p> <?php if($this->Config['level_radio']) { ?> <?php if($this->Config['topic_level_radio']) { ?> <p class="ico_bed"> <a href="index.php?mod=settings&code=exp" title="点击查看微博等级"  target="_blank" class="ico_level wbL<?php echo $member['level']; ?>"><?php echo $member['level']; ?></a> </p> <?php } ?> <?php } ?> <?php if($member['credits']) { ?> <div class="integral">积分：<a title="点击查看我的积分" href="index.php?mod=settings&code=extcredits"><?php echo $member['credits']; ?></a></div> <?php } ?> </div> </div> <div class="edit_sign"> <?php $member_signature = cut_str($member['signature'],20); ?> <?php if($member['uid'] == MEMBER_ID ) { ?> <span> <a href="javascript:viod(0);" onclick="follower_choose(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>','topic_signature'); return false;" title="编辑个人签名" > <?php if($member['signature']) { ?> <?php echo $member_signature; ?> <?php } else { ?>编辑个人签名
<?php } ?> <img src="static/image/qianming.png"> </a></span> <?php } else { ?> <span> <?php if($member['signature']) { ?> <?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?> <a href="javascript:void(0);" onclick="follower_choose(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>','topic_signature');" title="编辑个人签名"> <em ectype="user_signature_ajax_<?php echo $member['uid']; ?>">（<?php echo $member_signature; ?>）</em> </a> <?php } ?> <?php } else { ?><?php echo $member['gender_ta']; ?>没有填写个人签名
<?php } ?> </span> <?php } ?> </div> <div class="geren_msg" style="display:none;"> <p><a href="javascript:void(0);">公司 ：杭州神话信息技术有限公司</a></p> <p><a href="javascript:void(0);">部门 ：运营中心设计部</a></p> <p><a href="javascript:void(0);">岗位 ：UI视觉设计</a></p> </div> <div class="user_atten"> <div class="person_atten_l"> <p><span class="num"><a href="index.php?mod=follow&uid=<?php echo $member['uid']; ?>" title="<?php echo $member['nickname']; ?>关注的"><?php echo $member['follow_count']; ?></a></span></p> <p><a href="index.php?mod=follow&uid=<?php echo $member['uid']; ?>" title="<?php echo $member['nickname']; ?>关注的">关注</a> </p> </div> <div class="person_atten_l"> <p><span class="num"><a href="index.php?mod=fans&uid=<?php echo $member['uid']; ?>" title="关注<?php echo $member['nickname']; ?>的"><?php echo $member['fans_count']; ?></a></span></p> <p><a href="index.php?mod=fans&uid=<?php echo $member['uid']; ?>" title="关注<?php echo $member['nickname']; ?>的">粉丝</a> </p> </div> <div class="person_atten_l"> <p><span class="num"><a href="index.php?mod=<?php echo $member['username']; ?>" title="<?php echo $member['nickname']; ?>的<?php echo $this->Config['changeword']['n_weibo']; ?>"><?php echo $member['topic_count']; ?></a></span></p> <p><a href="index.php?mod=<?php echo $member['username']; ?>" title="<?php echo $member['nickname']; ?>的<?php echo $this->Config['changeword']['n_weibo']; ?>"><?php echo $this->Config['changeword']['n_weibo']; ?></a> </p> </div> <div class="person_atten_l"> <p><span class="num"><a href="index.php?mod=<?php echo $member['username']; ?>&type=mydig" title="赞过<?php echo $member['nickname']; ?>的"><?php echo $member['digcount']; ?></a></span></p> <p><a href="index.php?mod=<?php echo $member['username']; ?>&type=mydig" title="赞过<?php echo $member['nickname']; ?>的">被<?php echo $this->Config['changeword']["dig"]; ?></a> </p> </div> </div> </div> <?php } ?> <?php SetADV('group_myhome','middle_right_top'); ?> <script language="javascript">
$(document).ready(function(){
/*
* ajax 右侧显示数据
* 这里的函数可以随便更改位置，加载的顺序也会不同。
*/
//热门微群
//get_hotweiqun();
//同城微群
<?php if($member['city']) { ?>
get_city_qun();
<?php } ?>
//微群分类
get_qun_category();
});
//热门微群
function get_hotweiqun(){			
right_show_ajax('<?php echo $member['uid']; ?>','hotweiqun','hotweiqun');
}
//同城微群
function get_city_qun(){			
right_show_ajax('<?php echo $member['uid']; ?>','city_qun','city_qun');
}
//群分类
function get_qun_category(){			
right_show_ajax('<?php echo $member['uid']; ?>','qun_category','qun_category');
}
</script> <div class="column"> <h3> <?php echo $this->Config['changeword']['weiqun']; ?>分类<a href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','qun_category','qun_category'); return false;"></a> </h3> <div class="sideul"> <div id="<?php echo $member['uid']; ?>_qun_category"></div> </div> </div> <?php if($hot_qun) { ?> <div class="column"> <script type="text/javascript" src="static/js/qun.js?build+20140922"></script> <h3>
推荐<?php echo $this->Config['changeword']['weiqun']; ?><a href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','hotweiqun','hotweiqun'); return false;"></a> </h3> <div class="sideul"> <div id="1_hotweiqun"> <div id="interestUid"> <ul class="followList" style="overflow:hidden"> <?php if(is_array($hot_qun)) { foreach($hot_qun as $val) { ?> <li class="pane" id="follow_user_<?php echo $val['uid']; ?>"> <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['icon']; ?>"/> </div> <div class="fBox_R "> <p><span class="name"><a href="index.php?mod=qun&qid=<?php echo $val['qid']; ?>" ><?php echo $val['name']; ?></a></span> </p> <p><?php echo $val['member_num']; ?>人&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $val['thread_num']; ?>条<?php echo $this->Config['changeword']['n_weibo']; ?></p> <span> <a href="javascript:;" onclick="joinQun(<?php echo $val['qid']; ?>)">加入<?php echo $this->Config['changeword']['weiqun']; ?></a> </span> </div> </li> <?php } } ?> </ul> </div> </div> </div> </div> <?php } ?> <?php if($member['city']) { ?> <div class="column" id="city_qun_div"> <h3> <?php $member_city = str_replace('市','',$member['city']); ?> <?php echo $member_city; ?><?php echo $this->Config['changeword']['weiqun']; ?><a  href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','city_qun','city_qun'); return false;"></a> </h3> <div class="sideul"> <div id="<?php echo $member['uid']; ?>_city_qun"></div> </div> </div> <?php } ?> <?php if($member['uid']) { ?> <div id="add_remark_<?php echo $member['uid']; ?>" class="alertBox" style="display:none" > <ul class="manBox"> <li> <div class="tt1"> <span>设置备注名</span> <div class="mclose" onclick="getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=(getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=='none')?'':'none'"></div> </div> <div class="mWarp"> <form action="ajax.php?mod=remark&code=add_buddy_remark" method="POST"  name="remarkform"   onsubmit="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;"> <input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
给朋友加个备注名，方便认出他是谁（0~6个字符）
<table > <tr> <td><input name="remark_<?php echo $member['uid']; ?>" type="text" id="remark_<?php echo $member['uid']; ?>" class="text-area2" value="<?php echo $buddys['remark']; ?>" size="6" maxlength="6"/> </td> <td align="left"> <input type="button" class="u-btn" value="保 存" onclick="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;" /> </td> </tr> </table> </form> </div> </li> </ul> </div> <?php } ?> <?php if(!$this->Config['acceleration_mode']) { ?> <script type="text/javascript">
$(document).ready(function(){get_recommend();});
function get_recommend(){right_show_ajax('<?php echo $member['uid']; ?>','recommend','recommend');}
</script> <div id="side_follow_top10" class="column"> <h3>最新推荐TOP10</h3> <div id="<?php echo $member['uid']; ?>_recommend" class="sideul"></div> </div> <?php SetADV('group_myhome','middle_right'); ?> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_right_bottom'])) echo $GLOBALS['_J']['pluginhooks']['global_right_bottom'];?> </div>