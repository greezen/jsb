<?php /* 2015-04-01 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?>
<?php if(is_array($group_list)) { foreach($group_list as $val) { ?> <dl class="ml_dl" id="del_group_ajax_<?php echo $val['id']; ?>"> <dd> <?php if($touid) { ?> <input id="select_<?php echo $val['uid']; ?>_<?php echo $val['id']; ?>" name="group" type="checkbox" onclick="groupState(<?php echo $val['id']; ?>,'<?php echo $touid; ?>',this);return false;"/> <?php } ?> <?php if('follow' == jget('mod')) { ?> <a href="index.php?mod=follow&gid=<?php echo $val['id']; ?>" title="成员人数：<?php echo $val['count']; ?>"><?php echo $val['name']; ?></a> <?php } else { ?> <a href="index.php?mod=topic&code=myhome&gid=<?php echo $val['id']; ?>" title="成员人数：<?php echo $val['count']; ?>"><?php echo $val['name']; ?></a> <?php } ?> </dd> <dt>(<?php echo $val['count']; ?>)<a onclick="del_group('<?php echo $val['id']; ?>','<?php echo $touid; ?>');return false;" href="javascript:;" title="删除分组" style="float:none;">×</a></dt> </dl> <?php } } ?>