<?php /* 2014-12-11 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?><div class="sideBar"> <?php if(defined('NEDU_MOYO')) { ?> <?php echo nui('jsg')->hook('topic.right.inc.load');; ?> <?php } ?> <?php if($params['code'] == 'cms') { ?> <div class="column"> <h3>使用小帮助</h3> <ul class="sideul"> <li>A：此栏目将直接显示<a href="<?php echo $cms_url; ?>" target="_blank">资讯</a>的内容</li> <li>B：默认显示你关注的资讯分类的内容，请在“我的资讯”栏目下，选择关注你感兴趣的分类。</li> </ul> </div> <?php } ?> <?php if($params['code'] == 'bbs') { ?> <div class="column"> <h3>使用小帮助</h3> <ul class="sideul"> <li>A:此栏目将直接显示<a href="<?php echo $bbs_url; ?>" target="_blank">来自论坛</a>的内容</li> <li>B:默认显示你收藏的论坛版块的帖子，请访问感兴趣的论坛版块，并点击收藏，然后就可以在“我的论坛”这个栏目看到相关的帖子了</li> </ul> </div> <?php } ?> <?php if($params['code'] == 'channel') { ?> <script type="text/javascript">
$(document).ready(function () {
var tags_a = $("#h_tags li");
tags_a.each(function () {
var x = 5;
var y = 0;
var rand = parseInt(Math.random() * (x - y + 1) + y);
$(this).addClass("h_tags" + rand);
});
})
</script> <div class="column"> <h3>我关注的频道</h3> <ul id="h_tags" class="sideul favchannel"> <?php if($my_buddy_channel) { ?> <?php if(is_array($my_buddy_channel)) { foreach($my_buddy_channel as $channel) { ?> <li><a href="index.php?mod=channel&id=<?php echo $channel['ch_id']; ?>"><?php echo $channel['ch_name']; ?></a></li> <?php } } ?> <?php } ?> </ul> </div> <div class="column"> <h3>使用小帮助</h3> <ul class="sideul"> <li>这里显示你所关注的频道的<?php echo $this->Config['changeword']['n_weibo']; ?></li> <li>要关注相应频道，请来<a href="index.php?mod=channel">这里</a></li> </ul> </div> <?php } ?> <?php if($params['code'] == 'recd') { ?> <script language="javascript">
$(document).ready(function(){
get_recommend20();
});
function get_recommend20(){
right_show_ajax('<?php echo $member['uid']; ?>','recommend20','recommend20');
}
</script> <div class="column"> <h3>最新推荐TOP20</h3> <div id="<?php echo $member['uid']; ?>_recommend20" class="sideul"></div> </div> <div class="column"> <h3>使用小帮助</h3> <ul class="sideul"> <li>A：此栏目显示官方推荐的内容</li> <li>B：如果您发布的信息值得推荐，请@官方相关的人员寻求推荐</li> </ul> </div> <?php } ?> <?php if($params['code'] == 'topicnew') { ?> <link href="static/style/channel.css?build+20140922" rel="stylesheet" type="text/css" /> <script language="javascript">
$(document).ready(function(){get_month_dig();get_week_dig();});
function get_week_dig(){channel_right_show_ajax('week_dig','0','0','10');}
function get_month_dig(){channel_right_show_ajax('month_dig','0','0','10');}
</script> <div class="column"> <h3>一周热<?php echo $this->Config['changeword']['dig']; ?></h3> <ul class="channelul" id="week_dig"> </ul> </div> <div class="column"> <h3>一月热<?php echo $this->Config['changeword']['dig']; ?></h3> <ul class="channelul" id="month_dig"> </ul> </div> <?php } ?> <?php if($member['uid']) { ?> <div id="add_remark_<?php echo $member['uid']; ?>" class="alertBox" style="display:none" > <ul class="manBox"> <li> <div class="tt1"> <span>设置备注名</span> <div class="mclose" onclick="getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=(getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=='none')?'':'none'"></div> </div> <div class="mWarp"> <form action="ajax.php?mod=remark&code=add_buddy_remark" method="POST"  name="remarkform"   onsubmit="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;"> <input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
给朋友加个备注名，方便认出他是谁（0~6个字符）
<table > <tr> <td><input name="remark_<?php echo $member['uid']; ?>" type="text" id="remark_<?php echo $member['uid']; ?>" class="text-area2" value="<?php echo $buddys['remark']; ?>" size="6" maxlength="6"/> </td> <td align="left"> <input type="button" class="u-btn" value="保 存" onclick="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;" /> </td> </tr> </table> </form> </div> </li> </ul> </div> <?php } ?> <?php if(!$this->Config['acceleration_mode']) { ?> <script type="text/javascript">
$(document).ready(function(){get_recommend();});
function get_recommend(){right_show_ajax('<?php echo $member['uid']; ?>','recommend','recommend');}
</script> <div id="side_follow_top10" class="column"> <h3>最新推荐TOP10</h3> <div id="<?php echo $member['uid']; ?>_recommend" class="sideul"></div> </div> <?php SetADV('group_myhome','middle_right'); ?> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_right_bottom'])) echo $GLOBALS['_J']['pluginhooks']['global_right_bottom'];?> </div>