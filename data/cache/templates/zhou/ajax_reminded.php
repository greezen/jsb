<?php /* 2014-12-12 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?><success></success> <?php if($total_record > 0) { ?> <div class="newTig" onclick="ajax_reminded('<?php echo $uid; ?>',1,'<?php echo $fcode; ?>'); return false;"><a href="#">有<b><?php echo $total_record; ?></b>条新的内容更新，点此查看</a></div> <?php } ?> <?php if($__my['comment_new']>0 || $__my['fans_new']>0 || $__my['at_new']>0 || $__my['newpm']>0 || $__my['favoritemy_new']>0 || $__my['vote_new']>0 || $__my['qun_new']>0 || $__my['event_new']>0 || $__my['event_post_new']>0 || $__my['fenlei_post_new']>0 || $__my['topic_new']>0 || $__my['dig_new']>0 || $__my['channel_new']>0 || $__my['company_new']>0) { ?> <script language="javascript">
var tagBoxContentHTML = '';
<?php if($__my['newpm']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=pm&code=list"><?php echo $__my['newpm']; ?>条新私信，查看</a></li>';
<?php } ?> <?php if($__my['comment_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=comment&code=inbox"><?php echo $__my['comment_new']; ?>条新评论，查看</a></li>';
<?php } ?> <?php if($__my['fans_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=fans&uid=<?php echo $__my['uid']; ?>"><?php echo $__my['fans_new']; ?>人关注了我，查看</a></li>';
<?php } ?> <?php if($__my['at_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=at"><?php echo $__my['at_new']; ?>人@提到我，查看</a></li>';
<?php } ?> <?php if($__my['favoritemy_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=topic_favorite&code=me"><?php echo $__my['favoritemy_new']; ?>人收藏我的内容，查看</a></li>';
<?php } ?> <?php if($__my['dig_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=<?php echo $__my['username']; ?>&type=mydig">有<?php echo $__my['dig_new']; ?>人<?php echo $this->Config['changeword']['dig']; ?>了你，查看</a></li>';
<?php } ?> <?php if($__my['channel_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=channel&orderby=post">频道新增<?php echo $__my['channel_new']; ?>条内容，查看</a></li>';
<?php } ?> <?php if($__my['company_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=company">单位新增<?php echo $__my['company_new']; ?>条内容，查看</a></li>';
<?php } ?> <?php if($__my['vote_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=vote&view=me&filter=new_update&uid=<?php echo $__my['uid']; ?>">投票新增<?php echo $__my['vote_new']; ?>人参与，查看</a></li>';
<?php } ?> <?php if($__my['qun_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=qun">'+__WEIQUN__+'新增<?php echo $__my['qun_new']; ?>条内容，查看</a></li>';
<?php } ?> <?php if($__my['event_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=event&code=myevent&type=new">活动新增<?php echo $__my['event_new']; ?>人报名，查看</a></li>';
<?php } ?> <?php if($__my['topic_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=topic_tag">新增<?php echo $__my['topic_new']; ?>条话题内容，查看</a></li>';
<?php } ?> <?php if($__my['event_post_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=other&view=event">新增<?php echo $__my['event_post_new']; ?>个关注的活动，查看</a></li>';
<?php } ?> <?php if($__my['fenlei_post_new']>0) { ?>
tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=other&view=fenlei">新增<?php echo $__my['fenlei_post_new']; ?>条分类信息，查看</a></li>';
<?php } ?>
if(''!=tagBoxContentHTML)
{
tagBoxContentHTML = '<ul>' + tagBoxContentHTML + '</ul>';
$('#tagBoxContent_<?php echo $uid; ?>').html(tagBoxContentHTML);
$('#tagBox_<?php echo $uid; ?>').css({
display: 'block',
visibility: 'visible'
});
}
</script> <?php } ?>