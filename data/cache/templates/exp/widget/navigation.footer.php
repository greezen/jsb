<?php /* 2015-04-01 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?>
<?php $naviList = ConfigHandler::get('footer_navigation'); ?> <?php if(is_array($naviList['list'])) { foreach($naviList['list'] as $k_g => $group) { ?> <?php $k_g = $k_g+1;  ?> <div class="foot-line"> <?php if($group['avaliable']) { ?> <p><?php echo $group['name']; ?></p> <?php } ?> <?php if(is_array($group['type_list'])) { foreach($group['type_list'] as $k_o => $one) { ?> <?php if($one['avaliable']) { ?> <?php if($one['code'] == 'beian') { ?> <?php $one['name'] = $GLOBALS['_J']['config']['icp']; ?> <?php } ?> <a href="<?php echo $one['url']; ?>" target="<?php echo $one['target']; ?>"><?php echo $one['name']; ?></a> <?php } ?> <?php } } ?> </div> <?php if($k_g == count($naviList['list'])) { ?> <span><?php echo $GLOBALS['_J']['config']['copyright']; ?></span> <span><?php echo $GLOBALS['_J']['config']['tongji']; ?></span> <span class="foot-line" style="display:none;"> <?php $__server_execute_time = round(microtime(true) - $GLOBALS['_J']['time_start'], 5) . " Second "; ?> <?php $__gzip_tips = ((defined('GZIP') && GZIP) ? "&nbsp;Gzip Enable." : "Gzip Disable."); ?> <span title="<?php echo $__server_execute_time; ?>,<?php echo $__gzip_tips; ?>">网页执行信息</span> <?php echo upsCtrl()->Comlic(); ?> </span> <?php } ?> <?php } } ?>