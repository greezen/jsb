<?php /* 2015-03-27 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?><div class="mainWrap"><div id="send"> <div class="sendBox"> <div class="sendTitle"> <div id="send_follow<?php echo $h_key; ?>" class="mleft"> <?php $defaust_value = $this->Get['mod']=='qun' ? '群内发的内容，只有群内成员才能看到哟！' : ($defaust_value ? $defaust_value : ''); ?> <?php if($this->Get['mod'] == 'member') { ?> <?php $content = '#新人报到# 我是'.$this->Config['site_name'].'新加入的成员@'.MEMBER_NICKNAME.' ，欢迎大家来关注我！'; ?>
所有关注我的人将看到我分享的信息
<?php } elseif($defaust_value) { ?> <?php echo $defaust_value; ?> <?php } else { ?> <?php echo $content_ostr; ?> <?php } ?> </div> <?php if($this->Channel_enable && $this->Config['channel_enable'] && !in_array($type,array('design','btn_wyfx','answer','ask','album')) && !in_array($this->Get['mod'],array('live','qun','talk','company','department','album','vote','event','mall'))) { ?> <div id="tochannel" style="display:none;"> <script type="text/javascript">
$(document).ready(function(){
$("#p_channel,#t_pb").bind('mouseover', function(){$('#p_channel').show();$('#t_pb').addClass('hover');});
$("#p_channel,#t_pb").bind('mouseout', function(){$('#p_channel').hide();$('#t_pb').removeClass('hover');});
});
function c_hide(){$('#p_channel').hide();$('#t_pb').removeClass('hover');}
function c_cut(){$('#t_channel').html('');$('#mapp_item<?php echo $h_key; ?>').val('<?php echo $this->item; ?>');$('#mapp_item_id<?php echo $h_key; ?>').val('<?php echo $this->item_id; ?>');$('#cverify').val('<?php echo $this->Config['verify']; ?>');}
<?php $channel_must = $this->Channel_enable && $this->Config['channel_enable'] && $this->Config['channel_must'] ? 1 : 0; ?>
function c_int(n,s,c){	$('#p_channel').hide();	$('#t_pb').removeClass('hover');	$('#t_channel').html(s+'<em onclick="c_cut();">×</em>');	$('#mapp_item<?php echo $h_key; ?>').val('channel');	$('#mapp_item_id<?php echo $h_key; ?>').val(n);	$('#cverify').val(c);}
function c_no(){show_message('您没有权限发'+__N_WEIBO__+'到该频道',2,'提示','msgBox','msg_alert');return false;}
</script> <div class="box_4_channel" 
<?php if($_GET['type']=='nedu') { ?>
style="display:none;"
<?php } ?>
> <span class="select" id="t_pb">选择频道</span> <span class="channel" id="t_channel" style=" display:inline;font-weight:500; float:none;"><?php echo $post_channel_name; ?></span> <div class="channels" id="p_channel" style="*margin:0 0 0 -91px;"> <?php if($this->Channels) { ?> <?php if(is_array($this->Channels)) { foreach($this->Channels as $val) { ?> <dl> <dt> <?php if($val['ok']) { ?> <a class="chl" rel="<?php echo $val['ch_id']; ?>" onclick="c_int(<?php echo $val['ch_id']; ?>,'<?php echo $val['ch_name']; ?>',<?php echo $val['ck']; ?>);"><?php echo $val['ch_name']; ?></a> <?php } else { ?><a class="chl" rel="<?php echo $val['ch_id']; ?>" onclick="c_no();" class="hui" title="您所在的用户组没有权限发<?php echo $this->Config['changeword']['n_weibo']; ?>到该频道"><?php echo $val['ch_name']; ?></a> <?php } ?> </dt> <dd> <?php if($val['child']) { ?> <?php if(is_array($val['child'])) { foreach($val['child'] as $v) { ?> <?php if($v['ok']) { ?> <a class="chl" rel="<?php echo $v['ch_id']; ?>" onclick="c_int(<?php echo $v['ch_id']; ?>,'<?php echo $v['ch_name']; ?>',<?php echo $v['ck']; ?>);"><?php echo $v['ch_name']; ?></a> <?php } else { ?><a class="chl" rel="<?php echo $v['ch_id']; ?>" onclick="c_no();" class="hui" title="您所在的用户组没有权限发<?php echo $this->Config['changeword']['n_weibo']; ?>到该频道"><?php echo $v['ch_name']; ?></a> <?php } ?> <?php } } ?> <?php } else { ?>&nbsp;
<?php } ?> </dd> </dl> <?php } } ?> <?php } else { ?><p>没有频道可供发布</p> <?php } ?> </div> </div> </div> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_publish_title'])) echo $GLOBALS['_J']['pluginhooks']['global_publish_title'];?> <ul class="txtNum"> <?php if($this->Config['topic_input_length']>0) { ?> <li>还可以输入</li><li style="width:auto"><span id="wordCheck<?php echo $h_key; ?>" style='font-size:20px;'><?php echo $GLOBALS['_J']['config']['topic_input_length']; ?></span></li><li style="width:14px;">字</li> <?php } ?> </ul> </div> <div class="sendInput" style="display:block"> <?php $content = $content ? $content : $this->Config['today_topic'];$i_already_value = $content_dstr ? $content_dstr : $content;$this->totid = $this->totid ? $this->totid : 0; ?> <?php $channel_check = isset($post_channel_check) ? $post_channel_check : ($this->Config['verify'] ? 1 : 0); ?> <?php $p_item = isset($post_item_name) ? $post_item_name : $this->item; ?> <?php $p_item_id = isset($post_item_id) ? $post_item_id : $this->item_id; ?> <script type="text/javascript">
var __I_ALREADY_VALUE__ = '<?php echo $i_already_value; ?>';
var __ALERT__='<?php echo $this->Config['verify_alert']; ?>';
var __CONTENTID__ = 'i_already<?php echo $h_key; ?>';
</script> <div class="u-send"> <input type="text" id="t_i_already<?php echo $h_key; ?>" name="title" maxlength="25"  value="这里输入的文字将成为标题（可以留空）" onfocus="if(this.value=='这里输入的文字将成为标题（可以留空）'){this.value='';}" onblur="if(this.value==''){this.value='这里输入的文字将成为标题（可以留空）';}"> <textarea  name="content" id="i_already<?php echo $h_key; ?>"  onkeyup="javascript:checkWord('<?php echo $GLOBALS['_J']['config']['topic_input_length']; ?>','i_already<?php echo $h_key; ?>','wordCheck<?php echo $h_key; ?>')" onkeydown="ctrlEnter(event, 'publishSubmit<?php echo $h_key; ?>')"><?php echo $i_already_value; ?></textarea> </div> <?php $_get_type=str_safe($this->Get['type']); ?> <input name="topic_type" type="hidden" id="topic_type<?php echo $h_key; ?>" value="<?php echo $_get_type; ?>" /> <input name="totid" type="hidden" id="totid<?php echo $h_key; ?>" value="<?php echo $this->totid; ?>" /> <input name="touid" type="hidden" id="touid<?php echo $h_key; ?>" value="<?php echo $this->touid; ?>" /> <input name="item" type="hidden" id="mapp_item<?php echo $h_key; ?>" value="<?php echo $p_item; ?>" /> <input name="item_id" type="hidden" id="mapp_item_id<?php echo $h_key; ?>" value="<?php echo $p_item_id; ?>" /> <input name="xiami_id" type="hidden" id="xiami_id" value="" /> <input type="hidden" id="cverify" name="cverify" value="<?php echo $channel_check; ?>"> <?php if($this->MemberHandler->HasPermission('uploadattach','attach')!=false) $can_allow_attach = 1; else $can_allow_attach = 0  ?> </div> <link href="static/style/contact.css?build+20140922" rel="stylesheet" type="text/css" /> <script type="text/javascript" src="static/js/addclear.js?build+20140922"></script> <div id="addContact" style="display:none"> <div> <span class="level"><input type="checkbox" name="level" class="cnt-level1" value="1"checked disabled/><input type="hidden" name="level" value="1"/>认证用户</span> <span class="level"><input type="checkbox" name="level" class="cnt-level2" value="2" />普通用户</span> <span class="level"><input type="checkbox" name="level" class="cnt-level3" value="4" />游客用户</span> </div> <div class="add-contact"><span>姓名：</span><input type="text" name="name" value="<?php echo $userContact['name']; ?>"/></div> <div class="add-contact"><span>电话：</span><input type="text" name="phone" value="<?php echo $userContact['phone']; ?>"/></div> <div class="add-contact"><span>手机：</span><input type="text" name="tel" value="<?php echo $userContact['tel']; ?>"/></div> <div class="add-contact"><span>微信：</span><input type="text" name="wx" value="<?php echo $userContact['wx']; ?>"/></div> <div class="add-contact"><span>Q Q：</span><input type="text" name="qq" value="<?php echo $userContact['qq']; ?>"/></div> <div class="add-contact"><span>邮箱：</span><input type="text" name="email" value="<?php echo $userContact['email']; ?>"/></div> <div class="add-contact" style="width:50%"><span>地址：</span><input type="text" name="address" value="<?php echo $userContact['addr']; ?>" style="width:85%"/></div> <div class="add-contact" style="width:100%"><span>其他：</span><textarea rows="1" name="other"><?php echo $userContact['other']; ?></textarea></div> </div> <style type="text/css">
.add-contact {
float: left;
width: 25%;
margin-top: 6px;
}
.add-contact input {
width: 70%;
padding: 2px 0px;
padding-left:5px;
}
.add-contact textarea {
width: 93.3333%;
padding: 2px 0px;
}
.edit-contact-title{
border-bottom: 2px solid #7789FF;
font-weight: bold;
margin: 10px 0 10px 0;
}
</style> <script type="text/javascript">
$(function(){
$('.add-contact input').addClear();
$('#p_channel .chl').click(function(){
var chid = $(this).attr('rel');
var url = "index.php?mod=plugin&id=contact:contact&code=isOrder";
var data = {chid:chid};
$.post(url,data,function(json){
if(json.state == true){
$('#addContact').show();
}else{
$('#addContact').hide();
}
},'json');
});
$('.cnt-level2').click(function(){
if($(this).prop('checked')){
$('.cnt-level3').prop('checked', false);
}else {
$('.cnt-level2,.cnt-level3').prop('checked', false);
}
});
$('.cnt-level3').click(function(){
if($(this).prop('checked')){
$('.cnt-level2').prop('checked', true);
}else {
$('.cnt-level2,.cnt-level3').prop('checked', false);
}
});
});
</script> <div class="sendInsert"> <?php if(!($type == 'design' || $type == 'btn_wyfx')) { ?> <script type="text/javascript">
$(function(){
$(".menu_title").click(function(){
$(".menu_content,.menu_c_content").hide();
var id = $(this).attr("currid");
if(id){$("#"+id).show();
}});//一级菜单
$(".menu_c_title").click(function(){
$(".menu_c_content").hide();
var id = $(this).attr("currid");
if(id){//二级菜单
if(id=="showattachmenu<?php echo $h_key; ?>" && !<?php echo $can_allow_attach; ?>){MessageBox('warning', '您没有上传附件的操作权限！');
}else{
$("#"+id).show();
}                //附件权限判断
}});
$(".menu_close").click(function(){
var id = $(this).attr("currid");
if(id){$("#"+id).hide();
}});//关闭按钮
});
function setTab(name,cursel,n,t){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"vhover":"";con.style.display=i==cursel?"block":"none";
if(i!=cursel && t){$("#con_"+name+"_"+i+" div").remove();}
}
}
</script> <div class="mleft"> <?php if(!empty($GLOBALS['_J']['pluginhooks']['contact'])) echo $GLOBALS['_J']['pluginhooks']['contact'];?> <?php if($this->Config['face_enable']) { ?> <div class="menu"> <div class="menu_bq" id="editface" ><b class="menu_bqb_c menu_title" currid="showface<?php echo $h_key; ?>"><a href="javascript:void(0);" title="点击插入表情，让内容更生动" onclick="topic_face('showface<?php echo $h_key; ?>','i_already<?php echo $h_key; ?>','topic_face');return false;" style="color:#666;">表情</a></b> <div id="showface<?php echo $h_key; ?>" class="showface menu_content"></div> </div> </div> <?php } ?> <?php if($this->Config['image_enable']) { ?> <?php $handle_key = 'showuploadimage'.$h_key; ?> <div class="menu"> <div class="menu_tq" ><b class="menu_tqb_c menu_title" currid="showuploadimage<?php echo $h_key; ?>" title="可实现图文混排">图片</b> <div class="menu_tqb menu_content" id="showuploadimage<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_tqbox"> <i class="menu_tqb_c1 menu_close" currid="showuploadimage<?php echo $h_key; ?>"></i> <link href="static/style/imgupload.css?build+20140922" rel="stylesheet" type="text/css" /> <script type="text/javascript" src="static/js/imgupload.js?build+20140922"></script> <script type="text/javascript">
var __IMAGE_IDS__ = {};$(function(){$(".nav_title<?php echo $h_key; ?>").click(function(){$(".currtitle<?php echo $h_key; ?> .curr").removeClass("curr");$(this).addClass("curr");$(".upload_frame<?php echo $h_key; ?>").hide();var id = $(this).attr("currid");if(id){$("#"+id).show();if('upload_frame_2<?php echo $h_key; ?>'==id && ''==$("#album_list<?php echo $h_key; ?>").html()){get_album('<?php echo $h_key; ?>',0,1);}}});$('#publisher_file<?php echo $h_key; ?>').uploadify({'uploader':'<?php echo $GLOBALS['_J']['config']['site_url']; ?>/images/uploadify/uploadify.swf?id=&random='+Math.random(),'script':'<?php echo urlencode($GLOBALS['_J']['config']['site_url']."/ajax.php?mod=uploadify&code=image&uninitmember=1&type=flash&iitem=$img_item&iitemid=$img_itemid"); ?>','cancelImg':'<?php echo $GLOBALS['_J']['config']['site_url']; ?>/images/uploadify/cancel.png','buttonImg':'<?php echo $GLOBALS['_J']['config']['site_url']; ?>/images/uploadify/upload.gif','width':52,'height':52,'multi':true,'auto':true,'sizeLimit':'<?php echo $GLOBALS['_J']['config']['image_size_limit']; ?>','fileExt':'*.jpg;*.png;*.gif;*.jpeg','fileDesc':'请选择图片文件(*.jpg;*.png;*.gif;*.jpeg)','queueID':'uploadifyQueueDiv','wmode':'transparent','fileDataName':'topic','queueSizeLimit':<?php echo $GLOBALS['_J']['config']['image_uploadify_queue_size_limit']; ?>,'simUploadLimit':1,'scriptData':{'cookie_auth':'<?php echo urlencode(jsg_getcookie("auth")); ?>'},'onSelect':function(event,ID,fileObj){},'onSelectOnce':function(event,data){imageUploadifySelectOnce('<?php echo $h_key; ?>');},'onProgress':function(event,ID,fileObj,data){return false;},'onComplete':function(event,ID,fileObj,response,data){eval('var r ='+response+';');if(r.done){var rv=r.retval;if(rv.id>0&&rv.src.length>0) {imageUploadifyComplete('<?php echo $h_key; ?>',rv.id, rv.src, fileObj.name);}}},'onError':function (event,ID,fileObj,errorObj){alert(errorObj.type+'Error:'+errorObj.info);},'onAllComplete':function(event,data){imageUploadifyAllComplete('<?php echo $h_key; ?>');},'onSWFReadyFall':function(){$('#publisher_file<?php echo $h_key; ?>').after("<img src='images/uploadify/upload.gif'><div style='position: absolute; left: 10px; top: 87px; display: block; overflow: hidden; background-color: rgb(0, 0, 0); opacity: 0; width: 52px; height: 52px;'><iframe id='imageUploadifyIframe<?php echo $h_key; ?>' name='imageUploadifyIframe<?php echo $h_key; ?>' width='0' height='0' marginwidth='0' frameborder='0' src='about:blank' style='display:none;'></iframe><fo"+"rm id='normalUploadForm<?php echo $h_key; ?>' method='post' action='ajax.php?mod=uploadify&code=image&type=normalnew&iitem=<?php echo $img_item; ?>&iitemid=<?php echo $img_itemid; ?>&divid=<?php echo $h_key; ?>' enctype='multipart/form-data' target='imageUploadifyIframe<?php echo $h_key; ?>' style='margin:0;padding:0;'><input type='file' accept='image/*' style='width:52px; height: 52px;cursor:pointer;' id='normalUploadFile<?php echo $h_key; ?>' name='topic' onchange=\"document.getElementById('normalUploadForm<?php echo $h_key; ?>').submit();imageUploadifySelectOnce('<?php echo $h_key; ?>')\"/></form></div>");}});});
</script> <div class="imgupload"> <p class="navtab currtitle<?php echo $h_key; ?>"> <b class="curr nav_title<?php echo $h_key; ?>" currid="upload_frame_1<?php echo $h_key; ?>">上传图片</b> <b class="nav_title<?php echo $h_key; ?>" currid="upload_frame_2<?php echo $h_key; ?>">相册图片</b> <b class="nav_title<?php echo $h_key; ?>" currid="upload_frame_3<?php echo $h_key; ?>">网络图片</b> <b class="nav_title<?php echo $h_key; ?>" currid="upload_frame_4<?php echo $h_key; ?>">图片搜索</b> </p> <div class="upload_frame_area"> <iframe id="frameupimg<?php echo $h_key; ?>" name="frameupimg<?php echo $h_key; ?>" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe> <form id="formalbum<?php echo $h_key; ?>"> <div class="upload_frame<?php echo $h_key; ?>" id="upload_frame_1<?php echo $h_key; ?>"> <div id="swfUploadDiv<?php echo $h_key; ?>" class="upload_area"> <span id="albumlist<?php echo $h_key; ?>" style="display:block; margin-bottom:10px;text-align: right;"> <label style="float:left;"><input type="checkbox" name="selectallimg" value="1" onchange="selectAllUpImg(this.checked);" onpropertychange="selectAllUpImg(this.checked);">全选</label>将选中的图片同时保存到相册：<select name="uploadalbum" id="uploadalbum<?php echo $h_key; ?>" onchange="if(this.value == '-1'){selectCreateTab('<?php echo $h_key; ?>',0);}"><option value="0">默认相册</option> <?php if($albums) { ?> <?php if(is_array($albums)) { foreach($albums as $val) { ?> <option value="<?php echo $val['albumid']; ?>"><?php echo $val['albumname']; ?></option> <?php } } ?> <?php } ?> <option value="-1" style="color:red;">+创建新相册</option></select> <input type="button" value="保 存" class="u-btn u-btn-cancel" onclick="saveimgcallback('<?php echo $h_key; ?>','<?php echo $handle_key; ?>');"> </span> <span id="creatalbum<?php echo $h_key; ?>"></span> <input type="file" id="publisher_file<?php echo $h_key; ?>" name="publisher_file" style="display:none;"> </div> <p class="upload_notice">1.最多可上传<?php echo $GLOBALS['_J']['config']['image_uploadify_queue_size_limit']; ?>张图片，单张图片大小不超过
<?php echo(round($this->Config['image_size']/1024, 2)); ?>
M。<br>2.点击图片可插入内容区，您可为图片位置进行排版。</p> <span id="uploading<?php echo $h_key; ?>"></span> <table id="viewImgDiv<?php echo $h_key; ?>" class="tempimglist"> <?php if($uploadimages) { ?> <?php if(is_array($uploadimages)) { foreach($uploadimages as $ik => $iv) { ?> <script type="text/javascript"> __IMAGE_IDS__[<?php echo $ik; ?>] = <?php echo $ik; ?>; </script> <tr id="upimg_<?php echo $ik; ?>"><td valign='top'><input type='checkbox' name='ids[]' value="<?php echo $ik; ?>" title='保存到相册'></td><td valign='middle'><a href="javascript:;" id="insert_image_<?php echo $ik; ?>" onclick="insertIntoContent('image',<?php echo $ik; ?>,'i_already<?php echo $h_key; ?>');" title="点击插入"><img src="<?php echo $iv['img']; ?>" width='50' height='50'></a></td><td valign='middle'><textarea name='title[<?php echo $ik; ?>]' maxlength='140' onfocus="if(this.value == '图片简介') {this.value = '';}" onblur="if(this.value == '') {this.value = '图片简介';}"><?php echo $iv['description']; ?></textarea></td><td valign='middle'><a title="删除图片" onclick="imageUploadifyDelete(<?php echo $ik; ?>,'<?php echo $tid; ?>');return false;" href="javascript:void(0);" class="u-del">X</a></td></tr> <?php } } ?> <?php } ?> </table> <p class="submitbottom"></p> </div> <div class="upload_frame<?php echo $h_key; ?>" id="upload_frame_2<?php echo $h_key; ?>" style="display:none;"> <p class="add">从我的相册中选择图片: <select onchange="get_album('<?php echo $h_key; ?>',this.value,1);"><option value="0">默认相册</option> <?php if(is_array($albums)) { foreach($albums as $val) { ?> <option value="<?php echo $val['albumid']; ?>"><?php echo $val['albumname']; ?></option> <?php } } ?> </select></p> <table id="album_list<?php echo $h_key; ?>"></table> <p class="submitbottom"><input type="button" value="保 存" class="u-btn u-btn-cancel" onclick="saveimgcallback('<?php echo $h_key; ?>','<?php echo $handle_key; ?>');"></p> </div> <div class="upload_frame<?php echo $h_key; ?>" id="upload_frame_3<?php echo $h_key; ?>" style="display:none;"> <p class="add"><input type="text" id="img_url<?php echo $h_key; ?>"  value="请输入图片url地址" onclick="if(this.value=='请输入图片url地址'){this.value = '';}"/><a href="javascript:void(0);" onclick="getUrlImage('<?php echo $h_key; ?>',img_url<?php echo $h_key; ?>);" class="u-btn" style="color:#fff;">上传图片</a></p> <span id="uploading_img<?php echo $h_key; ?>" style="display:none"><img src='images/loading.gif'/>&nbsp;上传中，请稍候……</span> <table id="viewUrlImgDiv<?php echo $h_key; ?>"></table> <p class="submitbottom"><input type="button" value="保 存" class="u-btn u-btn-cancel" onclick="saveimgcallback('<?php echo $h_key; ?>','<?php echo $handle_key; ?>');"></p> </div> <div class="upload_frame<?php echo $h_key; ?>" id="upload_frame_4<?php echo $h_key; ?>" style="display:none;"> <p class="add"><input type="text" id="word<?php echo $h_key; ?>" name="word" value="请输入关键字，如：世界末日" onclick="if(this.value=='请输入关键字，如：世界末日'){this.value = '';}"/><a href="javascript:void(0);" onclick="searchBaiDuImg('<?php echo $h_key; ?>');" class="u-btn"  style="color:#fff;">搜索图片</a></p> <div id="baidu_image<?php echo $h_key; ?>" class="baiduimgdiv"></div> </div> </div> </form> </div> </div> </div> </div> </div> <?php } ?> <?php $ath_key = $h_key ? '_'.$h_key : ''; ?> <div class="menu"> <div class="menu_hp"><b onclick="showatuserw('i_already<?php echo $h_key; ?>','<?php echo $h_key; ?>','');return false;" class="menu_hpb_c menu_title" currid="showatusermenu<?php echo $h_key; ?>" title="@朋友昵称提醒TA">朋友</b> <div class="menu_hpb menu_content" id="showatusermenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_tb showusr"> <div id="showatuser<?php echo $ath_key; ?>" class="showatuser"></div> <sub class="menu_hpb_c1 menu_close" currid="showatusermenu<?php echo $h_key; ?>"></sub> </div> </div> </div> </div> <?php if($this->Config['word_type_enable']) { ?> <div class="menu"> <div class="menu_a"> <b class="menu_a_c menu_title" currid="showstylemenu<?php echo $h_key; ?>"><a href="javascript:void(0);" title="给文字加上特效" style="color:#666;">格式</a></b> <div class="pull menu_content" style="display:none;" id="showstylemenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <sub class="menu_a_c1 menu_close" currid="showstylemenu<?php echo $h_key; ?>"></sub> <div class="menu_hb"> <span onclick="setFont('b');return false;" class="menu_hbb_c" title="先在输入框中选择要加粗的文字">粗体</span> </div> <div class="menu_underline"> <span onclick="setFont('u');return false;" class="menu_underline_c" title="先在输入框中选择要加下划线的文字">下划线</span> </div> <div class="menu_hc"> <span onclick="getColorMenu();return false;" class="menu_hcb_c menu_c_title" currid="color_menu" title="先在输入框中选择要加颜色的文字">颜色</span> <sub class="menu_color_c1 menu_close" currid="color_menu"></sub> <div class="menu_c_b menu_c_content" id="color_menu"></div> </div> <div class="menu_hy"> <span class="menu_hyb_c menu_c_title" currid="showquotemenu<?php echo $h_key; ?>" title="点击打开引用内容输入框">引用</span> <div class="menu_q_b menu_c_content" id="showquotemenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_q_d"> <div class="menu_qd"> <span style="float:left; padding-left:5px; color:#666;">请输入要引用的内容：</span> <sub class="menu_quote_c1 menu_close" currid="showquotemenu<?php echo $h_key; ?>"></sub> </div> <span> <textarea id="quote"></textarea> </span> <span> <input class="u-btn" type="button" value="提交" onclick="insertQuote(quote,'quote');" /> </span> </div> </div> </div> <div class="menu_hm"> <span class="menu_hmb_c menu_c_title" currid="showcodemenu<?php echo $h_key; ?>" title="点击打开代码内容输入框">代码</span> <div class="menu_mc_b menu_c_content" id="showcodemenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_mc_d"> <div class="menu_mc"> <span style="float:left; padding-left:5px;color:#666;">请输入要引用的代码：</span> <sub class="menu_code_c1 menu_close" currid="showcodemenu<?php echo $h_key; ?>"></sub> </div> <span> <textarea id="code"></textarea> </span> <span> <input class="u-btn" type="button" value="提交" onclick="insertQuote(code,'code');"/> </span> </div> </div> </div> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_publish_menu_style'])) echo $GLOBALS['_J']['pluginhooks']['global_publish_menu_style'];?> </div> </div> </div> <?php } ?> <div class="menu"> <div class="menu_m"> <b class="menu_m_c menu_title" currid="showmoremenu<?php echo $h_key; ?>"><a href="javascript:void(0);" style="color:#666;">更多</a></b> <div class="pull_down menu_content" id="showmoremenu<?php echo $h_key; ?>" style="display:none;"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <sub class="menu_m_c1 menu_close" currid="showmoremenu<?php echo $h_key; ?>"></sub> <?php if($this->Config['sign']['sign_enable']) { ?> <div class="menu_hq" id="sign_<?php echo MEMBER_ID; ?>"> <span onclick="getSignTag(<?php echo MEMBER_ID; ?>);return false;" class="menu_hqs_c menu_c_title" currid="showsigntag<?php echo $h_key; ?>" title="选择签到类别">签到</span> <div class="menu_hqs menu_c_content" id="showsigntag<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_checkin"> <div id="sign_tag_<?php echo MEMBER_ID; ?>"></div> <sub class="menu_hqs_c1 menu_close" currid="showsigntag<?php echo $h_key; ?>"></sub> </div> </div> </div> <?php } ?> <?php if($this->Config['video_enable']) { ?> <div class="menu_sp"><b class="menu_spb_c menu_c_title" currid="upload_ajax_video" title="支持新浪、优酷、搜狐、酷6、土豆视频的站内播放">视频</b> <div class="menu_spb menu_c_content" id="upload_ajax_video"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_tb" style="width:300px;"> <span style="float:left; padding-left:10px; color:#666; width:270px;">支持如下视频的站内播放</span><div class="menu_spb_c1 menu_close" currid="upload_ajax_video"></div></div> <p class="menu_p"><a href="http://www.youku.com/" rel="nofollow" target="_blank">优酷</a>、<a href="http://v.blog.sohu.com/" rel="nofollow" target="_blank">搜狐</a>、<a href="http://www.ku6.com/" rel="nofollow" target="_blank">酷6</a>、<a href="http://www.tudou.com/" rel="nofollow" target="_blank">土豆</a> <?php if(is_array($GLOBALS['_J']['config']['video_parse_extract_list'])) { foreach($GLOBALS['_J']['config']['video_parse_extract_list'] as $vpe) { ?>
、<a href="<?php echo $vpe['url']; ?>" rel="nofollow" target="_blank"><?php echo $vpe['name']; ?></a> <?php } } ?> <br>请在浏览器中复制视频播放页的网址</p> <div id="upload_video_list" class="menu_p" style="display:none;"> <span id="return_ajax_video_title"></span> <span><img id="video_img" width="130" /></span> <p> <input id="videoid" type="hidden" name="video_id" /> <span><a href="" onclick="DelVideo('videoid','video_ajax'); return false;" title="删除视频">删除视频</a></span> </p> </div> <div id="add_video" class="menu_p" style=" margin-bottom:6px; padding-top:0"> <iframe id="upload_video_frame" name="upload_video_frame" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe> <form action="ajax.php?mod=topic&code=dovideo" method="post"  enctype="multipart/form-data" name="upload_video" id="upload_video" target="upload_video_frame"> <input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/> <input name="url" type="text" id="url" class="sc_r_t_a" style=" width:210px; display:inline; padding:2px;"/> <input type="submit" name="Submit" value="提 交" class="u-btn" /> </form> </div> </div> </div> <?php } ?> <?php if($this->Config['music_enable']) { ?> <div class="menu_x"> <b class="menu_xb_c menu_c_title" currid="showmusicmenu<?php echo $h_key; ?>" title="分享音乐，支持站内播放">音乐</b> <div class="menu_xb menu_c_content" id="showmusicmenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_tb" style="width:290px;"> <span style="float:left; padding-left:10px; color:#666;">请在下面输入歌曲名或歌手名字搜索</span> <sub class="menu_music_c1 menu_close" currid="showmusicmenu<?php echo $h_key; ?>"></sub> </div> <div id="add_music" class="menu_m_s" style=" margin-bottom:6px; padding:15px 10px 0; float:left;"> <form action="javascript:void(0);" method="post"  enctype="multipart/form-data" name="upload_music" id="upload_music"> <input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/> <input name="url" type="text" id="music_name" class="sc_r_t_a" style=" width:210px; padding:2px;"> <input type="submit" name="Submit" value="搜 索" class="u-btn" onclick="music_serach();"> </form> </div> <p class="menu_p" style="padding:0 10px;color:#999">mp3等后缀的网址请直接粘贴到上面的发布框中</p> <div id="music_list" class="menu_m_l"></div> </div> </div> <?php } ?> <?php if(($this->Config['attach_enable'] && $this->Module!='qun') || ($this->Config['qun_attach_enable'] && $this->Module=='qun')) $allow_attach = 1; else $allow_attach = 0  ?> <?php if($allow_attach) { ?> <?php $attach_uploadify_topic = array(); ?> <?php $attach_uploadify_from = 'topic_publish'; ?> <?php $attach_uploadify_only_js = 1; ?> <?php $attach_num = min(max(1,(int)$this->Config['attach_files_limit']),50); ?> <?php $attach_size = min(max(1,(int)$this->Config['attach_size_limit']),51200); ?> <?php $attach_size = $attach_size >= 1024 ? round(($attach_size/1024),1).'M' : $attach_size.'KB'; ?> <?php $attach_uploadify_id=$topic_textarea_id.$attach_uploadify_type.($attach_uploadify_topic['tid']>0?"_".$attach_uploadify_topic['tid']:""); ?> <?php $attach_img_siz=$attach_img_siz?$attach_img_siz:32; ?> <?php $attach_fz_siz=min(max(1,(int)$this->Config['attach_size_limit']),51200)*1024; ?> <?php $topic_textarea_id=$topic_textarea_id?$topic_textarea_id:'i_already'.$h_key; ?> <?php $topic_textarea_empty_val=isset($topic_textarea_empty_val)?$topic_textarea_empty_val:'分享文件'; ?> <?php $attach_uploadify_queue_size_limit=min(max(1,(int)$this->Config['attach_files_limit']),50); ?> <?php $attach_item=isset($this->item)?$this->item:''; ?> <?php $attach_itemid=isset($this->item_id)?$this->item_id:0; ?> <success></success> <script type="text/javascript">
var __ATTACH_IDS__ = {};
$(document).ready(function(){			
var upfilename = '';
$('#publisher_file_attach<?php echo $attach_uploadify_id; ?>').uploadify({
'uploader'  : '<?php echo $GLOBALS['_J']['config']['site_url']; ?>/images/uploadify/uploadify.swf?id=<?php echo $attach_uploadify_id; ?>&random=' + Math.random(),
'script'    : '<?php echo urlencode($GLOBALS['_J']['config']['site_url'] . "/ajax.php?mod=uploadattach&code=attach&uninitmember=1&type=flash&aitem=$attach_item&aitemid=$attach_itemid"); ?>',
'cancelImg' : '<?php echo $GLOBALS['_J']['config']['site_url']; ?>/images/uploadify/cancel.png',
'buttonImg'	: '<?php echo $GLOBALS['_J']['config']['site_url']; ?>/images/uploadify/addatta.gif',
'width'		: 111,
'height'	: 17,
'multi'		: true,
'auto'      : true,
'sizeLimit' : <?php echo $attach_fz_siz; ?>,
'fileExt'	: '*.rar;*.zip;*.txt;*.doc;*.xls;*.pdf;*.ppt;*.docx;*.xlsx;*.pptx;*.mp4;*.3gp;*.flv;*.avi;*.rmvb;*.mpg;*.mov;*.vob;*.wmv;*.bmp;*.jpg;*.tiff;*.gif;*.pcx;*.tga;*.exif;*.fpx;*.svg;*.psd;*.cdr;*.pcd;*.dxf;*.ufo;*.eps;*.ai;*.raw',
'fileDesc'	: '*.rar;*.zip;*.txt;*.doc;*.xls;*.pdf;*.ppt;*.docx;*.xlsx;*.pptx;*.mp4;*.3gp;*.flv;*.avi;*.rmvb;*.mpg;*.mov;*.vob;*.wmv;*.bmp;*.jpg;*.tiff;*.gif;*.pcx;*.tga;*.exif;*.fpx;*.svg;*.psd;*.cdr;*.pcd;*.dxf;*.ufo;*.eps;*.ai;*.raw',
'queueID'	: 'uploadifyQueueDivAttach<?php echo $attach_uploadify_id; ?>',
'wmode'		: 'transparent',
'fileDataName'	 : 'topic',
'queueSizeLimit' : <?php echo $attach_uploadify_queue_size_limit; ?>,
'simUploadLimit' : 1,
'scriptData'	 : {
<?php if($attach_uploadify_topic_uid) { ?>
'topic_uid'  : '<?php echo $attach_uploadify_topic_uid; ?>',
<?php } ?>
'cookie_auth': '<?php echo urlencode(jsg_getcookie("auth")); ?>'
},
'onSelect'		 : function(event, ID, fileObj) {
//修改选择的分类参数
$('#publisher_file_attach<?php echo $attach_uploadify_id; ?>').uploadifySettings('scriptData', {attch_category:$("[name=attch_category]").val()});
},
'onSelectOnce'	 : function (event, data) {
attachUploadifySelectOnce<?php echo $attach_uploadify_id; ?>();			    	
},
'onProgress'     : function(event, ID, fileObj, data) {
return false;
},
'onComplete'	 : function(event, ID, fileObj, response, data) {
eval('var r = ' + response + ';');
if (r.done) {					
var rv = r.retval;
if ( rv.id > 0 && rv.src.length > 0 ) {
attachUploadifyComplete<?php echo $attach_uploadify_id; ?>(rv.id, rv.src, fileObj.name);
upfilename = fileObj.name;
}
}
else
{
if(r.msg)
{
if(r.msg=='forbidden'){
MessageBox('warning','您没有上传文件的权限，无法继续操作！');
}else{
MessageBox('warning', '上传失败，文件过大或过多或格式错误！');
}
}
}
},
'onError'        : function (event, ID, fileObj, errorObj) {
alert(errorObj.type + ' Error: ' + errorObj.info);
},
'onAllComplete'	 : function(event, data) {
attachUploadifyAllComplete<?php echo $attach_uploadify_id; ?>(upfilename);
}
});
$("#viewAttachDiv<?php echo $attach_uploadify_id; ?> img").each(function() {
if($(this).width() > $(this).parent().width()) {
$(this).width("100%");
}
});
});
//删除一个文件
function attachUploadifyDelete<?php echo $attach_uploadify_id; ?>(idval)
{
var idval = ('undefined'==typeof(idval) ? 0 : idval);
if(idval > 0) 
{
$.post
(
'ajax.php?mod=uploadattach&code=delete_attach',
{
'id' : idval
},
function (r) 
{				
if(r.done)
{
$('#uploadAttachSpan_' + idval).remove();
var contentTextBox = $('#'+__CONTENTID__);
var content = contentTextBox.val();
var r = "[attach]"+idval+"[/attach]";
var n = content.split(r).length - 1;
for (var i = 0; i < n ; i++) {
content = content.replace(r,"");
}
contentTextBox.val(content);
if( ($.trim(($('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').html()))).length < 1 )
{
$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').css('display', 'none');
$('#insertAttachDiv<?php echo $attach_uploadify_id; ?>').css('display', 'block');
}
if( 'undefined' != typeof(__ATTACH_IDS__[idval]) )
{
__ATTACH_IDS__[idval] = 0;
}
}
else
{
if(r.msg)
{
MessageBox('warning', r.msg);
}
}
},
'json'
);
}
}
function attachUploadifySelectOnce<?php echo $attach_uploadify_id; ?>()
{   
$('#uploadingAttach<?php echo $attach_uploadify_id; ?>').html("<p><img src='images/loading.gif'/>&nbsp;上传中，请稍候……</p>");
}
function attachUploadifyComplete<?php echo $attach_uploadify_id; ?>(idval, srcval, nameval)
{
var attachIdsCount = 0;
$.each( __ATTACH_IDS__, function( k, v ) { if( v > 0 ) { attachIdsCount += 1; } } );
if( attachIdsCount >= <?php echo $attach_uploadify_queue_size_limit; ?> )
{
MessageBox('warning', '本次文件数量超过限制了');
return false;
}
var idval = ('undefined' == typeof(idval) ? 0 : idval);
var srcval = ('undefined' == typeof(srcval) ? 0 : srcval);
var nameval = ('undefined' == typeof(nameval) ? '' : nameval);
<?php if('topic_publish'==$attach_uploadify_from) { ?>
$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').prepend('<li id="uploadAttachSpan_' + idval + '" class="menu_ps vv_2"><img src="' + srcval + '" class="uploadAttachSpan_img_type"/> <p class="uploadAttachSpan_doc_type"><i>' + nameval + '</i></p><p>（<a title="删除文件" onclick="attachUploadifyDelete<?php echo $attach_uploadify_id; ?>(' + idval + ');return false;" href="javascript:;">删</a>）需<input title="填写用户下载该附件所需贡献给你的积分" size="1" type="text" onblur="set_attach_score(this.value,' + idval + ',this);return false;">积分 </p></li>');<?php } elseif('topic_longtext_info_ajax'==$attach_uploadify_from) { ?>$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').append('<span id="uploadAttachSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $attach_img_siz; ?>" alt="点击文件插入到文中" onclick="longtext_info_img_insert(\'' + srcval + '\');" />（<a href="javascript:void(0);" onclick="attachUploadifyDelete<?php echo $attach_uploadify_id; ?>(' + idval + '); return false;" title="删除文件">删</a>）需<input title="填写用户下载该附件所需贡献给你的积分" size="1" type="text" onblur="set_attach_score(this.value,' + idval + ',this);return false;">积分</span>');
<?php } else { ?>$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').append('<span id="uploadAttachSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $attach_img_siz; ?>" />（<a href="javascript:void(0);" onclick="attachUploadifyDelete<?php echo $attach_uploadify_id; ?>(' + idval + '); return false;" title="删除文件">删</a>）需<input title="填写用户下载该附件所需贡献给你的积分" size="1" type="text" onblur="set_attach_score(this.value,' + idval + ',this);return false;">积分</span>');
<?php } ?>
$('#normalAttachUploadFile<?php echo $attach_uploadify_id; ?>').val('');
__ATTACH_IDS__[idval] = idval;
}
function attachUploadifyAllComplete<?php echo $attach_uploadify_id; ?>(nameval)
{
var nameval = ('undefined' == typeof(nameval) ? '' : nameval);
$('#uploadingAttach<?php echo $attach_uploadify_id; ?>').html('');			    	
$('#viewAttachDiv<?php echo $attach_uploadify_id; ?>').css('display', 'block');
//$('#insertAttachDiv<?php echo $attach_uploadify_id; ?>').css('display', 'none');
if( $.trim(($('#<?php echo $topic_textarea_id; ?>').val())).length < 1 ) {
$('#<?php echo $topic_textarea_id; ?>').val('<?php echo $topic_textarea_empty_val; ?>' + ':' + nameval);	
}
$('#<?php echo $topic_textarea_id; ?>').focus();
}
function normalAttachUploadFormSubmit<?php echo $attach_uploadify_id; ?>()
{
var fileVal = $('#normalAttachUploadFile<?php echo $attach_uploadify_id; ?>').val();
if(($.trim(fileVal)).length < 1)
{
MessageBox('warning', '请上传正确格式的附件文件');
return false;
}
else
{
if(!(/\.(<?php echo $this->Config['attach_file_type']; ?>)$/i.test(fileVal)))
{
MessageBox('warning', '请选择一个正确格式的附件文件');
return false;
}
else
{
attachUploadifySelectOnce<?php echo $attach_uploadify_id; ?>();
return true;
}
}
}
function attachUploadifyModuleSwitch<?php echo $attach_uploadify_id; ?>()
{
if('none' == $('#normalAttachUploadDiv<?php echo $attach_uploadify_id; ?>').css('display'))
{
$('#uploadDescModuleSpanAttach<?php echo $attach_uploadify_id; ?>').html('快速');
$('#swfUploadDivAttach<?php echo $attach_uploadify_id; ?>').css('display', 'none');
$('#normalAttachUploadDiv<?php echo $attach_uploadify_id; ?>').css('display', 'block');
}
else
{
$('#uploadDescModuleSpanAttach<?php echo $attach_uploadify_id; ?>').html('普通');
$('#normalAttachUploadDiv<?php echo $attach_uploadify_id; ?>').css('display', 'none');
$('#swfUploadDivAttach<?php echo $attach_uploadify_id; ?>').css('display', 'block');
}
}
function modify_attach(id){var id = ('undefined'==typeof(id) ? 0 : id);var handle_key = 'mod_attach_win';var ajax_url = "ajax.php?mod=uploadattach&code=modify";showDialog(handle_key, 'ajax', "编辑", {"url":ajax_url, "post":{id:id}}, 400);}
</script> <?php if(!$attach_uploadify_only_js) { ?> <div id="insertAttachDiv<?php echo $attach_uploadify_id; ?>" class="insertAttachDiv"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <i class="insertAttachDiv_up" onclick="$(this).parent().hide()"><img src="static/image/imgdel.gif" title="关闭" /></i> <div id="swfUploadDivAttach<?php echo $attach_uploadify_id; ?>"><input type="file" id="publisher_file_attach<?php echo $attach_uploadify_id; ?>" name="publisher_file<?php echo $attach_uploadify_id; ?>" style="display:none;" /></div> <iframe id="attachUploadifyIframe<?php echo $attach_uploadify_id; ?>" name="attachUploadifyIframe<?php echo $attach_uploadify_id; ?>" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe> <div id="normalAttachUploadDiv<?php echo $attach_uploadify_id; ?>" style="display:none;"> <form id="normalAttachUploadForm<?php echo $attach_uploadify_id; ?>" method="post"  action="ajax.php?mod=uploadattach&code=attach&type=normal&aitem=<?php echo $attach_item; ?>&aitemid=<?php echo $attach_itemid; ?>&topic_uid=<?php echo $attach_uploadify_topic_uid; ?>" enctype="multipart/form-data" target="attachUploadifyIframe<?php echo $attach_uploadify_id; ?>" onsubmit="return normalAttachUploadFormSubmit<?php echo $attach_uploadify_id; ?>()"> <input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/> <input type="hidden" name="attach_uploadify_id" value="<?php echo $attach_uploadify_id; ?>" /> <input type="file" id="normalAttachUploadFile<?php echo $attach_uploadify_id; ?>" name="topic" /> <input type="submit" value="上传" class="u-btn" /> </form> </div> <span id="uploadingAttach<?php echo $attach_uploadify_id; ?>"></span> <div id="uploadDescDivAttach<?php echo $attach_uploadify_id; ?>"> <span style="color:ff0000;">*</span> 如果您不能上传文件，可以<a href="javascript:;" onclick="attachUploadifyModuleSwitch<?php echo $attach_uploadify_id; ?>();">点击这里</a>尝试<span id="uploadDescModuleSpanAttach<?php echo $attach_uploadify_id; ?>">普通</span>模式上传
<?php if('topic_longtext_info_ajax'==$attach_uploadify_from) { ?> <br /><span class="fontRed">*</span> 文件上传成功后，可以点击文件将文件插入到您想要的位置
<?php } ?> </div> <div id="uploadifyQueueDivAttach<?php echo $attach_uploadify_id; ?>" style="display:none;"></div> <div id="viewAttachDiv<?php echo $attach_uploadify_id; ?>" class="viewAttachDiv"> <?php if((!$attach_uploadify_new || $attach_uploadify_modify) && $attach_uploadify_topic['attachid']) { ?> <?php if(is_array($attach_uploadify_topic['attach_list'])) { foreach($attach_uploadify_topic['attach_list'] as $ik => $iv) { ?> <script type="text/javascript"> __ATTACH_IDS__[<?php echo $ik; ?>] = <?php echo $ik; ?>; </script> <p id="uploadAttachSpan_<?php echo $ik; ?>" style="padding: 5px 0;"> <img src="<?php echo $iv['attach_img']; ?>" width="<?php echo $attach_img_siz; ?>" id="atta_<?php echo $ik; ?>" style="vertical-align: middle;"/>&nbsp;下载附件需消耗<input title="填写用户下载该附件所需贡献给你的积分" size="1" type="text" value="<?php echo $iv['attach_score']; ?>" onblur="set_attach_score(this.value,<?php echo $iv['id']; ?>,this);return false;">积分&nbsp;&nbsp;<a href="javascript:void(0);" onclick="modify_attach(<?php echo $iv['id']; ?>);return false;">编辑</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="attachUploadifyDelete<?php echo $attach_uploadify_id; ?>('<?php echo $ik; ?>'); return false;" title="删除文件">删除</a> </p> <?php } } ?> <?php } ?> </div> </div> <?php } ?> <style type="text/css">
.vv_2{ width:190px; position:relative;}
.vv_2{ width:190px; position:relative;}
</style> <div class="menu_fj" ><b class="menu_fjb_c menu_c_title" currid="showattachmenu<?php echo $h_key; ?>" title="上传本地附件">附件</b> <div class="menu_fjb menu_c_content insertImgDiv" id="showattachmenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_fb"> <span style="float:left; padding-left:10px;">请选择上传的附件</span> </div> <div class="menu_pi" id="insertAttachDiv"> <div id="swfUploadDivAttach"> <input type="file" id="publisher_file_attach" name="publisher_file" style="display:none;" /> </div> <iframe id="attachUploadifyIframe" name="attachUploadifyIframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe> <div id="normalAttachUploadDiv" style="display:none;"> <form id="normalAttachUploadForm" method="post"  action="ajax.php?mod=uploadattach&code=attach&type=normal&aitem=<?php echo $attach_item; ?>&aitemid=<?php echo $attach_itemid; ?>" enctype="multipart/form-data" target="attachUploadifyIframe" onsubmit="return normalAttachUploadFormSubmit()"> <input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/> <input type="file" id="normalAttachUploadFile" name="topic" /> <input type="submit" value="上传" class="u-btn" /> </form> </div> <i class="menu_fjb_c1 menu_close" currid="showattachmenu<?php echo $h_key; ?>"><img src="static/image/imgdel.gif" title="关闭" /></i> <em>
1、如不能上传文件，请<a href="javascript:;" onclick="attachUploadifyModuleSwitch();">点击这里</a>用<span id="uploadDescModuleSpanAttach">普通</span>模式上传.<br />
2、最多可上传<?php echo $attach_num; ?>个文件，单个文件大小不超过<?php echo $attach_size; ?>。
</em> <span id="uploadingAttach"></span> <div class="viewImgDiv" id="viewAttachDiv"></div> </div> <div id="uploadifyQueueDivAttach" style="display:none;"></div> </div> </div> <?php } ?> <?php if($this->Config['tag_enable']) { ?> <div class="menu_ht" id="button_<?php echo MEMBER_ID; ?>"> <span onclick="get_tag_choose(<?php echo MEMBER_ID; ?>,'my_tag','<?php echo $h_key; ?>');return false;"class="menu_htb_c menu_c_title" currid="showtagmenu<?php echo $h_key; ?>" title="点击添加话题，方便归类查看">话题</span> <div class="menu_htb menu_c_content" id="showtagmenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div id="<?php echo $h_key; ?>tag_<?php echo MEMBER_ID; ?>"></div> </div> </div> <?php } ?> <?php if($this->Config['vote_open']) { ?> <div class="menu_vs"><b class="menu_vsb_c menu_c_title" currid="showvotemenu<?php echo $h_key; ?>" title="发起或选择已有投票" onclick="getVoteAvtivityFromIndex('vote_publish', 'con_vote_content_1');">投票</b> <div class="menu_vsb menu_c_content" id="showvotemenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_vsbox"> <p class="stitle"> <b id="vote_content1" class="vhover" onclick="setTab('vote_content',1,4,1);getVoteAvtivityFromIndex('vote_publish', 'con_vote_content_1');">创建文字投票</b> <b id="vote_content4" onclick="setTab('vote_content',4,4,1);getVoteAvtivityFromIndex('pic_vote_publish', 'con_vote_content_4','pic');">创建图片投票</b> <b id="vote_content2" onclick="setTab('vote_content',2,4,1);getMyVoteList(1);">我发起的</b> <b id="vote_content3" onclick="setTab('vote_content',3,4,1);getMyJoinList(1);">我参与的</b> <sub class="menu_vsb_c1 menu_close" currid="showvotemenu<?php echo $h_key; ?>"></sub> </p> <div class="vcontent" id="con_vote_content_1"> <p>正在加载...</p> </div> <div class="vcontent vote_conLi" id="con_vote_content_2" style="display:none;"> <p>正在加载...</p> </div> <div class="vcontent vote_conLi" id="con_vote_content_3" style="display:none;"> <p>正在加载...</p> </div> <div class="vcontent vote_conLi" id="con_vote_content_4" style="display:none;"> <p>正在加载...</p> </div> </div> </div> </div> <?php } ?> <?php if($this->Config['event_open']) { ?> <div class="menu_hd"> <b class="menu_hdb_c menu_c_title" currid="showeventmenu<?php echo $h_key; ?>" onclick="getEventPost();" title="发起或选择已有活动">活动</b> <div class="menu_hdb menu_c_content" id="showeventmenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_hdbox"> <p class="stitle"> <b id="event_content1" class="vhover" onclick="setTab('event_content',1,3,0)">发起新活动</b> <b id="event_content2" onclick="setTab('event_content',2,3,0);getMyEventList(1);">我发起的</b> <b id="event_content3" onclick="setTab('event_content',3,3,0);getJoinEventList(1);">我参与的</b> <sub class="menu_hdb_c1 menu_close" currid="showeventmenu<?php echo $h_key; ?>"></sub> </p> <div class="vcontent" id="con_event_content_1"> <p>正在加载...</p> </div> <div class="vcontent vote_conLi" id="con_event_content_2" style="display:none;"> <p>正在加载...</p> </div> <div class="vcontent vote_conLi" id="con_event_content_3" style="display:none;"> <p>正在加载...</p> </div> </div> </div> </div> <?php } ?> <?php if($this->Config['qun_setting']['qun_open']) { ?> <div class="menu_wq"> <b class="menu_wqb_c menu_c_title" currid="showqunmenu<?php echo $h_key; ?>" title="将内容发布到我的微群" onclick="getMyQun();"><?php echo $this->Config['changeword']["weiqun"]; ?> </b> <div class="menu_wqb menu_c_content" id="showqunmenu<?php echo $h_key; ?>"> <span class="arrow-up"></span> <span class="arrow-up-in"></span> <div class="menu_wqbox" style="width:210px;"> <div class="menu_tb" style="width:210px;"> <span style="float:left; padding-left:10px;">选择你要发布到的<?php echo $this->Config['changeword']['weiqun']; ?></span> <sub class="menu_wqb_c1 menu_close" currid="showqunmenu<?php echo $h_key; ?>"></sub> </div> <div class="wcontent" id="wcontent_wp"></div> </div> </div> </div> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_publish_menu_more'])) echo $GLOBALS['_J']['pluginhooks']['global_publish_menu_more'];?> </div> </div> </div> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_publish_menu'])) echo $GLOBALS['_J']['pluginhooks']['global_publish_menu'];?> <?php $topic_allow_syncd = true; ?> <?php if(defined('NEDU_MOYO')) { ?> <?php nlogic('feeds.app.jsg')->topic_publish_action_allowed('syncd', $topic_allow_syncd) ?> <?php } ?> <?php if(in_array($this->Get['mod'], array('qun','live','talk','event','vote','fenlei','reward','album','mall')) || $this->Get['type'] == 'ask' || !$topic_allow_syncd) { ?> <?php $topic_type_value = $this->Get['type'] == 'ask' ? $this->Get['item'] : $this->Get['mod']; ?> <?php $topic_allow_forward = true; ?> <?php if(defined('NEDU_MOYO')) { ?> <?php nlogic('feeds.app.jsg')->topic_publish_action_allowed('forward', $topic_allow_forward) ?> <?php } ?> <?php if($topic_allow_forward) { ?> <div class="send_share_box"> <b class="box_4_open_span menu_title" style="padding:0;"> <label><input id="chk_toweibo<?php echo $h_key; ?>" type="checkbox" checked="checked" onclick="selectAppTopicType(this.id, {toid:'topic_type<?php echo $h_key; ?>', defTopicType:'<?php echo $topic_type_value; ?>'})">转发给粉丝</label></b> </div> <?php } ?> <?php } else { ?> <?php if($this->Config['account_on_off'] && !in_array($type,array('design','btn_wyfx','answer','ask','album'))) { ?> <script type="text/javascript">
function modifySync(obj){
var urls='<?php echo $this->Config['site_url']; ?>/ajax.php?mod=misc&code=setsync';
$.getJSON(urls,{setting:$(obj).attr('data-setting'),type:$(obj).attr('data-type')},function(r){
var src = $(obj).attr('src');$(obj).attr('data-setting',r.retval);
if(r.retval){$(obj).attr('src',src.replace('icon_on.gif','icon_off.gif'));}else{$(obj).attr('src',src.replace('icon_off.gif','icon_on.gif'));}
});}
</script> <div class="send_share_box" id="weibo_syn_wp"> <?php if($this->Config['sina_enable'] || $this->Config['sina_enable'] || $this->Config['qqwb_enable'] || $this->Config['kaixin_enable'] || $this->Config['renren_enable']) { ?> <b class="box_4_open_span menu_title" title="将内容同步发到高亮按钮对应平台">同步到：</b> <?php } ?> <sub class="box_4_open_span_c1"></sub> <?php if($this->Config['sina_enable'] && sina_weibo_init()) { ?> <span> <?php echo sina_weibo_syn(); ?> </span> <?php } ?> <?php if($this->Config['qqwb_enable'] && qqwb_init()) { ?> <span> <?php echo qqwb_syn(); ?> </span> <?php } ?> <?php if($this->Config['kaixin_enable'] && kaixin_init()) { ?> <span> <?php echo kaixin_syn_html(); ?> </span> <?php } ?> <?php if($this->Config['renren_enable'] && renren_init()) { ?> <span> <?php echo renren_syn_html(); ?> </span> <?php } ?> </div> <?php } ?> <?php } ?> <?php } else { ?><div class="box_3ajax"> <?php } ?> </div> <?php $channel_must = $this->Channel_enable && $this->Config['channel_enable'] && $this->Config['channel_must'] ? 1 : 0; ?> <div class="sendBtn"> <?php if ($this->Get['mod'] == 'tag') $type = 'tagview' ;elseif ($this->Get['mod'] == 'member') $type = 'tohome';elseif ($this->Get['mod'] == 'vote') $type='vote';elseif ($this->Get['mod'] == 'live') $type='live';elseif ($this->Get['mod'] == 'talk') $type='talk';elseif ($this->Get['mod'] == 'fenlei') $type='fenlei';elseif ($this->Get['mod'] == 'event') $type='event';elseif ($this->Get['mod'] == 'reward') $type='reward'; else $type = $params['code']; ?> <?php $type = $type ? $type : $this->Code; ?> <?php if($this->Config['seccode_publish'] && $this->yxm_title) { ?> <input type="hidden" id="yxm_topicpub<?php echo $h_key; ?>" onclick="publishSubmit('publishSubmit<?php echo $h_key; ?>','u-btn','i_already<?php echo $h_key; ?>','totid<?php echo $h_key; ?>','<?php echo $type; ?>','topic_type<?php echo $h_key; ?>','','',$('#mapp_item<?php echo $h_key; ?>').val(),$('#mapp_item_id<?php echo $h_key; ?>').val(),$('#xiami_id').val(),$('#touid<?php echo $h_key; ?>').val(),<?php echo $channel_must; ?>,$('#cverify').val());return false;"> <?php } ?> <?php if(!($this->Code=='do_first_topic')) { ?> <?php if($this->Config['anonymous_enable']) { ?> <label><input type="checkbox" id="anonymoustopic_type<?php echo $h_key; ?>" value="" class="publish_menu_input_empty" onclick="set_relate(1,'anonymoustopic_type<?php echo $h_key; ?>');">匿名</label> <?php } ?> <input type="button" class="u-btn" id="publishSubmit<?php echo $h_key; ?>" title="按Ctrl+Enter快捷发布" value="发 布"/> <?php } ?> </div> </div> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_publish_bottom'])) echo $GLOBALS['_J']['pluginhooks']['global_publish_bottom'];?> <?php if($this->Config['seccode_publish'] && $this->yxm_title) { ?> <span id="yxm_pub_button<?php echo $h_key; ?>" onclick="YXM_popBox(this,'topic,<?php echo $h_key; ?>','<?php echo $this->yxm_title; ?>');" style="margin-left:150px;height:1px;">&nbsp;</span> <?php } ?> </div> </div> <script type="text/javascript">
var dfpstr = '<?php echo $content_dstr; ?>';
//如果是群、并且没有设置转发给粉丝的话、将topic_type<?php echo $h_key; ?> 设置成qun；chk_toweibo<?php echo $h_key; ?> 的checked设置成''；
<?php if($this->Get['mod'] == 'qun' && !$this->Config['qun_setting']['qun_topic_to_weibo']) { ?>
setQun();
<?php } ?>
function setQun(){
$("#chk_toweibo<?php echo $h_key; ?>").removeAttr('checked');
$("#topic_type<?php echo $h_key; ?>").val('qun');
}
$("#i_already<?php echo $h_key; ?>").bind('focus', function(){
if($('#tochannel').length>0){$('#send_follow<?php echo $h_key; ?>').hide();$('#tochannel').show();}
$('.sendInsert').addClass('sendInsertfocus');			
//$('.sendInsert a').css('color','#333');
var i=0;
// setTimeout(function(){i+=1; $('#sendTig').css('visibility', 'hidden'); },5000);
});
$(".sendInsert *").bind('click', function(){
$('.sendInsert').addClass('sendInsertfocus');del_instr(0);
//$('.sendInsert a').css('color','#333');
});
<?php if($this->Config['seccode_publish'] && $this->yxm_title) { ?>
$("#publishSubmit<?php echo $h_key; ?>").bind('click',function() {
YXM_pubtopic('i_already<?php echo $h_key; ?>','<?php echo $h_key; ?>','topic_type<?php echo $h_key; ?>','',$('#mapp_item_id<?php echo $h_key; ?>').val(),<?php echo $channel_must; ?>);return false;
});
<?php } else { ?>$("#publishSubmit<?php echo $h_key; ?>").bind('click',function() {
publishSubmit('publishSubmit<?php echo $h_key; ?>','u-btn','i_already<?php echo $h_key; ?>','totid<?php echo $h_key; ?>','<?php echo $type; ?>','topic_type<?php echo $h_key; ?>','','',$('#mapp_item<?php echo $h_key; ?>').val(),
$('#mapp_item_id<?php echo $h_key; ?>').val(),$('#xiami_id').val(),$('#touid<?php echo $h_key; ?>').val(),<?php echo $channel_must; ?>,$('#cverify').val());
return false;
});
<?php } ?>
$(document).ready(function(){
initAiInput('i_already<?php echo $h_key; ?>');$('#i_already<?php echo $h_key; ?>').setCaret();
checkWord('<?php echo $GLOBALS['_J']['config']['topic_input_length']; ?>','i_already<?php echo $h_key; ?>','wordCheck<?php echo $h_key; ?>');
$("#i_already<?php echo $h_key; ?>").autoTextarea({maxHeight:220});
get_publish_str("#i_already<?php echo $h_key; ?>",publish_in_str,'<?php echo $content_dstr; ?>','<?php echo $not_indestr; ?>');
});		
//发布到频道文字闪动效果
function shake(ele,cls,times){
var i = 0, t = false, o = ele.attr("class")+" ", c = "", times = times||2;
if(t) return;
t= setInterval(function(){
i++;
c = i%2 ? o+cls : o;
ele.attr("class",c);
if(i==2*times){
clearInterval(t);
ele.addClass(cls);
}
},200);
};
var pint = null;
function get_publish_str(obj,arr_str,str,aj){
var count_in = arr_str.length;
pint= setInterval(function(){if(count_in > 1 && str && !aj){var randnum_in = (1+Math.random()*(count_in-1)).toFixed(0)-1;dfpstr=arr_str[randnum_in];$(obj).val(dfpstr);}},10000);
}
function del_instr(c){
clearInterval(pint);if($("#i_already<?php echo $h_key; ?>").val()==dfpstr){if(c){$("#i_already<?php echo $h_key; ?>").val('<?php echo $content; ?>')}else{$("#i_already<?php echo $h_key; ?>").val('');}};
}
$("#i_already<?php echo $h_key; ?>").bind({
click:function(){
if($('#t_pb').length>0){shake($("#t_pb"),"select_shake",2);}del_instr(1);
return false;
}
});
</script> <?php if(in_array($this->Code,array('myhome','tag','qun','recd','other','bbs','cms','department','channel','topicnew', 'index', '')) || $this->Get['gid'] !=''||(defined('NEDU_MOYO') &&($this->Get['nedu']=='course'||$this->Code=='nedu'))) { ?> <div class="slide"> <script language="Javascript">
function listTopic( s , lh ) {	
var s = 'undefined' == typeof(s) ? 0 : s;
var lh = 'undefined' == typeof(lh) ? 1 : lh;
if(lh) {
window.location.hash="#listTopicArea";
}
$("#listTopicMsgArea").html("<div><center><span class='loading'>内容正在加载中，请稍候……</span></center></div>");
var myAjax = $.post(
"ajax.php?mod=topic&code=list",
{
<?php if(is_array($params)) { foreach($params as $k => $v) { ?> <?php echo $k; ?>:"<?php echo $v; ?>",
<?php } } ?>
start:s
},
function (d) {
$("#listTopicMsgArea").html('');
$("#listTopicArea").html(d);			
}
); 
}
</script> <?php if($this->Config['slide_enable'] && ($slide_config=jconf::get('slide')) && $slide_config['enable'] && $slide_config['list']) { ?> <script src="static/js/kinslideshow.js?build+20140922" type="text/javascript"></script> <script type="text/javascript">
$(function(){
$("#KinSlideshow").KinSlideshow({
moveStyle:"down",			//切换方向 可选值：【 left | right | up | down 】
intervalTime:3,   			//设置间隔时间为5秒 【单位：秒】 [默认为5秒]
moveSpeedTime:400 , 		//切换一张图片所需时间，【单位：毫秒】[默认为400毫秒]
isHasTitleFont:false,		//是否显示标题文字 可选值：【 true | false 】
isHasTitleBar:false,		//是否显示标题背景 可选值：【 true | false 】[默认为true]	
//isHasBtn:true,
//标题文字样式，(isHasTitleFont = true 前提下启用)  
titleBar:{titleBar_height:30,titleBar_bgColor:"#08355c",titleBar_alpha:0.3},
titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
//按钮样式设置，(isHasBtn = true 前提下启用) 
btn:{btn_bgColor:"#fff",btn_bgHoverColor:"#1072aa",btn_fontColor:"#000",btn_fontHoverColor:"#fff",btn_borderColor:"#ccc",btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
});
})
</script> <div id="KinSlideshow" style="overflow:hidden; height:80px;"> <?php if(is_array($slide_config['list'])) { foreach($slide_config['list'] as $_v) { ?> <?php if($_v['enable'] == 1) { ?> <li><a href="<?php echo $_v['href']; ?>" target="_blank"><img src="<?php echo $_v['src']; ?>" width="580px" height="80px" /></a></li> <?php } ?> <?php } } ?> </div> <?php } ?> </div> <?php } ?> <style type="text/css">
#Scroll{width:100%; margin:0 auto;border:none; font-size:14px;}
#scrollDiv{width:100%;height:20px;min-height:20px;line-height:20px;overflow:hidden;}
#scrollDiv ul{margin:0;padding:0;}
#scrollDiv li{height:20px; float:left; width:100%; list-style:none;overflow:hidden;}
</style> <?php $_new_topic_list = jlogic('topic')->get_new_topic(); ?> <?php if($_new_topic_list) { ?> <div class="talking" style="display:none;"> <strong>正在发言：</strong> <div style="width:485px;height:20px;float: left;"> <div id="scrollDiv"> <ul> <?php if(is_array($_new_topic_list)) { foreach($_new_topic_list as $_new_topic_one) { ?> <li><a href="index.php?mod=<?php echo $_new_topic_one['uid']; ?>"><?php echo $_new_topic_one['nickname']; ?>：</a><a href="index.php?mod=topic&code=topicnew&orderby=post"><?php echo $_new_topic_one['content']; ?></a></li> <?php } } ?> </ul> </div> </div> </div> <?php } ?> <script type="text/javascript">
(function($){
$.fn.extend({
Scroll:function(opt,callback){
//参数初始化
if(!opt) var opt={};
var _this=this.eq(0).find("ul:first");
var        lineH=_this.find("li:first").height(), //获取行高
line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10), //每次滚动的行数，默认为一屏，即父容器高度
speed=opt.speed?parseInt(opt.speed,10):500, //卷动速度，数值越大，速度越慢（毫秒）
timer=opt.timer?parseInt(opt.timer,10):3000; //滚动的时间间隔（毫秒）
if(line==0) line=1;
var upHeight=0-line*lineH;
//滚动函数
scrollUp=function(){
_this.animate({
marginTop:upHeight
},speed,function(){
for(i=1;i<=line;i++){
_this.find("li:first").appendTo(_this);
}
_this.css({marginTop:0});
});
}
//鼠标事件绑定
_this.hover(function(){
clearInterval(timerID);
},function(){
timerID=setInterval("scrollUp()",timer);
}).mouseout();
}        
})
})(jQuery);
$(document).ready(function(){
$("#scrollDiv").Scroll({line:1,speed:500,timer:5000});
});
</script> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_index_common_top'])) echo $GLOBALS['_J']['pluginhooks']['global_index_common_top'];?> <div class="contentWrap"> <?php if(in_array($this->Code,array('myhome','qun','recd','other','bbs','cms','department','channel','nedu','topicnew')) || $this->Get['gid'] !='' || in_array($this->Module, array('topic_tag'))) { ?> <div class="topicNav"> <div class="nfTagB"> <ul> <?php if(defined('NEDU_MOYO')) { ?> <?php echo nui('jsg')->hook('topic.common.middle.tabs.first');; ?> <?php } ?> <?php if($this->Code == 'topicnew') $topicnew= "current"; ?> <li class="<?php echo $topicnew; ?>"> <span><a href="index.php?mod=topic&code=newrec" title="最新的<?php echo $this->Config['changeword']['n_weibo']; ?>">最新内容</a></span><em class="navNew"></em> </li> <?php if($this->Channel_enable && $this->Config['channel_enable']) { ?> <?php if($this->Code == 'channel') $mychan= "current"; ?> <li class="<?php echo $mychan; ?>"> <span> <a href="index.php?mod=topic&code=channel" title="我订阅的频道<?php echo $this->Config['changeword']['n_weibo']; ?>">我的订阅</a> </span> </li> <?php } ?> <?php if($this->Code == 'recd') $recd= "current"; ?> <li class="<?php echo $recd; ?>"> <span><a href="index.php?mod=topic&code=recd" title="官方推荐的内容">官方推荐</a> </span> </li> <?php if($this->Code == 'myhome') $myhome= "current"; ?> <li class="<?php echo $myhome; ?>"> <span id="follow_menu_wp"> <a href="index.php?mod=topic&code=myhome" title="我和我关注人的<?php echo $this->Config['changeword']['n_weibo']; ?>">关注的人</a> </span> </li> <?php if($this->Module == 'topic_favorite' && empty($this->Code)) $favorite= "current"; ?> <li class="<?php echo $favorite; ?>"> <span id="follow_menu_wp"> <a href="index.php?mod=topic_favorite" title="我的收藏">我的收藏</a> </span> </li> <?php if($this->Module == 'topic_favorite' && $this->Code == 'me') $me= "current"; ?> <li class="<?php echo $me; ?>"> <span id="follow_menu_wp"> <a href="index.php?mod=topic_favorite&code=me" title="收藏我的">收藏我的</a> </span> </li> <?php if($this->Config['qun_setting']['qun_open']) { ?> <?php if($this->Code == 'qun') $qun= "current"; ?> <li class="<?php echo $qun; ?>"> <span id="qun_menu_wp"> <a href="index.php?mod=topic&code=qun" title="我加入<?php echo $this->Config['changeword']['weiqun']; ?>的<?php echo $this->Config['changeword']['n_weibo']; ?>" class="wp_id">我的<?php echo $this->Config['changeword']['weiqun']; ?></a> </span> </li> <?php } ?> <?php if(($this->Config['dedecms_enable'] == 1)) { ?> <?php if($this->Code == 'cms') $cms= "current"; ?> <li class="<?php echo $cms; ?>"> <span><a href="index.php?mod=topic&code=cms" title="我收藏的资讯分类的内容">我的资讯</a> <?php if(!($this->Config['dzbbs_enable'] || ($this->Config['phpwind_enable'] && $this->Config['pwbbs_enable']))) { ?> <em class="navNew"></em> <?php } ?> </span> </li> <?php } ?> <?php if($this->Config['dzbbs_enable'] || ($this->Config['phpwind_enable'] && $this->Config['pwbbs_enable'])) { ?> <?php if($this->Code == 'bbs') $bbs= "current"; ?> <li class="<?php echo $bbs; ?>"> <span><a href="index.php?mod=topic&code=bbs" title="我收藏的论坛版块的帖子">我的论坛</a><em class="navNew"></em></span> </li> <?php } ?> <?php if(defined('NEDU_MOYO')) { ?> <?php echo nui('jsg')->hook('topic.common.middle.tabs.last');; ?> <?php } ?> <script src="static/js/date/WdatePicker.js?build+20140922"></script> <li class="li-datePicker"> <script type="text/javascript">
function date_view(date) {
window.location.href = thisSiteURL + 'index.php?mod=topic&code=topicnew&date=' + date;
return false;
}
</script> <img class="li-datePicker-img" onClick="WdatePicker({el:'demospan',onpicked:function(dp){date_view(dp.cal.getDateStr());}})" 
src="static/js/date/skin/datePicker.gif" /> <script type="text/javascript">
$(document).ready(function(){
$("#follow_m_1").mouseover(function(){$("#follow_morelist").show();});
$("#follow_m_1").mouseout(function(){$("#follow_morelist").hide();});
$("#follow_m_2").mouseover(function(){$("#sel_morelist").show();});
$("#follow_m_2").mouseout(function(){$("#sel_morelist").hide();});
});
</script> <a id="demospan" href="index.php?mod=topic&code=topicnew" title="查看最新微博"> <?php echo jget('date') ? jget('date') : date('Y-m-d'); ?> </a> </li> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_index_common_tab_extra1'])) echo $GLOBALS['_J']['pluginhooks']['global_index_common_tab_extra1'];?> </ul> <div class="clear"></div> </div> <div class="groupBg index_m"> <div class="left"> <?php if($this->Code=='qun') { ?> <a title="查看最近更新的<?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=new" class="<?php echo $active['new']; ?>">最新<?php echo $this->Config['changeword']['n_weibo']; ?></a> <a title="查看最新的评论" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=new_reply" class="<?php echo $active['new_reply']; ?>">最新评论</a> <a title="官方推荐" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=recd" class="<?php echo $active['recd']; ?>">官方推荐</a> <?php } elseif($this->Module=='topic_tag') { ?> <a title="查看最近更新的<?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=topic_tag" class="
<?php if(!in_array($this->Code, array('new_reply', 'recd'))) { ?>
current
<?php } ?>
">最新<?php echo $this->Config['changeword']['n_weibo']; ?></a> <a title="查看最新的评论" href="index.php?mod=topic_tag&code=new_reply" class="
<?php if('new_reply'==$this->Code) { ?>
current
<?php } ?>
">最新评论</a> <a title="官方推荐" href="index.php?mod=topic_tag&code=recd" class="
<?php if('recd'==$this->Code) { ?>
current
<?php } ?>
">官方推荐</a> <?php } elseif($this->Code=='cms') { ?> <a href="index.php?mod=topic&code=cms" class="<?php echo $active['all']; ?>">全部</a> <?php } elseif($this->Code=='myhome') { ?> <a href="index.php?mod=topic&code=myhome" title="" class="<?php echo $active['all']; ?>">全部</a> <?php if(!empty($grouplist2)) { ?> <?php if($grouplist2) { ?> <?php if(is_array($grouplist2)) { foreach($grouplist2 as $group) { ?> <a title="<?php echo $group['name']; ?>" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&gid=<?php echo $group['id']; ?>" class="<?php echo $active[$group['id']]; ?>"><?php echo $group['name']; ?></a> <?php } } ?> <?php } ?> <?php if($group_count <= $cut_num) { ?> <a href="javascript:;" onclick="showFollowGroupAddDialog();" title="">添加分组</a> <?php } else { ?> <span id="follow_m_1"><a href="index.php?mod=topic&code=myhome" >更多</a> <ul class="index_ml" id="follow_morelist"> <?php $__no_del_group=true; ?> <li> <?php if(is_array($group_list)) { foreach($group_list as $val) { ?> <dl class="ml_dl" id="del_group_ajax_<?php echo $val['id']; ?>"> <dd> <?php if($touid) { ?> <input id="select_<?php echo $val['uid']; ?>_<?php echo $val['id']; ?>" name="group" type="checkbox" onclick="groupState(<?php echo $val['id']; ?>,'<?php echo $touid; ?>',this);return false;"/> <?php } ?> <?php if('follow' == jget('mod')) { ?> <a href="index.php?mod=follow&gid=<?php echo $val['id']; ?>" title="成员人数：<?php echo $val['count']; ?>"><?php echo $val['name']; ?></a> <?php } else { ?> <a href="index.php?mod=topic&code=myhome&gid=<?php echo $val['id']; ?>" title="成员人数：<?php echo $val['count']; ?>"><?php echo $val['name']; ?></a> <?php } ?> </dd> <dt>(<?php echo $val['count']; ?>)<a onclick="del_group('<?php echo $val['id']; ?>','<?php echo $touid; ?>');return false;" href="javascript:;" title="删除分组" style="float:none;">×</a></dt> </dl> <?php } } ?></li> <li class="B_linedot"></li> <li class="slA"><a href="javascript:void(0)" onclick="showFollowGroupAddDialog();">添加分组</a></li> <li class="slM"><a href="index.php?mod=follow&uid=<?php echo $member['uid']; ?>">管理分组</a></li> </ul> </span> <?php } ?> <?php } else { ?> <a href="javascript:;" onclick="showFollowGroupAddDialog();" title="">添加分组</a> <?php } ?> <?php } elseif($this->Code=='recd') { ?><a title="查看官方推荐" href="index.php?mod=topic&code=recd&view=all" class="<?php echo $active['all']; ?>">全部</a> <a title="查看最新的评论" href="index.php?mod=topic&code=recd&view=new_reply" class="<?php echo $active['new_reply']; ?>">最新评论</a> <?php } elseif($this->Code=='department') { ?><a title="查看所有我的<?php echo $d_d_name; ?>及我关注的<?php echo $d_d_name; ?><?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=topic&code=department&view=all" class="<?php echo $active['all']; ?>">全部</a> <a title="查看我的<?php echo $d_d_name; ?><?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=topic&code=department&view=my" class="<?php echo $active['my']; ?>">我的<?php echo $d_d_name; ?></a> <a title="查看我关注的<?php echo $d_d_name; ?><?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=topic&code=department&view=other" class="<?php echo $active['other']; ?>">我关注的<?php echo $d_d_name; ?></a> <?php } elseif($this->Code=='bbs') { ?> <?php if($this->Config['dzbbs_enable']) { ?> <a title="查看我收藏的版块帖子" href="index.php?mod=topic&code=bbs&view=favorites" class="<?php echo $active['favorites']; ?>">收藏的版块</a> <?php } ?> <a title="查看我收藏的帖子" href="index.php?mod=topic&code=bbs&view=favorite" class="<?php echo $active['favorite']; ?>">收藏的帖子</a> <a title="查看我发布的主题帖子" href="index.php?mod=topic&code=bbs&view=thread" class="<?php echo $active['thread']; ?>">我发布的</a> <a title="查看我回复的帖子" href="index.php?mod=topic&code=bbs&view=reply" class="<?php echo $active['reply']; ?>">我回复的</a> <a title="查看论坛所有版块帖子" href="index.php?mod=topic&code=bbs&view=all" class="<?php echo $active['all']; ?>">全部版块</a> <?php } elseif($this->Code=='channel') { ?> <?php if('top' == $orderby) $top = 'current';elseif('mark' == $orderby) $mark = 'current';elseif('dig' == $orderby) $dig = 'current';		elseif('ldig' == $orderby) $ldig = 'current';else $post = 'current'; ?> <a class="<?php echo $post; ?>" href="index.php?mod=topic&code=channel&orderby=post">最新发布</a> <a class="<?php echo $dig; ?>" href="index.php?mod=topic&code=channel&orderby=dig">最新<?php echo $this->Config['changeword']['dig']; ?></a> <a class="<?php echo $mark; ?>" href="index.php?mod=topic&code=channel&orderby=mark">最新回应</a> <a class="<?php echo $ldig; ?>" href="index.php?mod=topic&code=channel&orderby=ldig">热门<?php echo $this->Config['changeword']['dig']; ?></a> <a class="<?php echo $top; ?>" href="index.php?mod=topic&code=channel&orderby=top">推荐置顶</a> <?php } elseif($this->Code=='topicnew') { ?> <?php if('post' == $orderby) $post = 'current';	elseif('mark' == $orderby) $mark = 'current';else $dig = 'current'; ?> <a class="<?php echo $dig; ?>" href="index.php?mod=topic&code=topicnew&orderby=dig">最新<?php echo $this->Config['changeword']['dig']; ?></a> <a class="<?php echo $post; ?>" href="index.php?mod=topic&code=topicnew&orderby=post">最新发布</a> <a class="<?php echo $mark; ?>" href="index.php?mod=topic&code=topicnew&orderby=mark">最新回应</a> <?php } ?> <?php if(defined('NEDU_MOYO')) { ?> <?php echo nui('jsg')->hook('topic.common.middle.subtabs.load');; ?> <?php } ?> </div> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_index_common_tab_extra2'])) echo $GLOBALS['_J']['pluginhooks']['global_index_common_tab_extra2'];?> <?php $filter_ary = array(
'all' => array('name'=>'全部','tips' => '查看全部'.$this->Config['changeword']['n_weibo']),
'pic' => array('name'=>'图片','tips' => '含图片'),
'video' => array('name'=>'视频','tips' => '含视频'),
'music' => array('name'=>'音乐','tips' => '含音乐'),
'vote' => array('name'=>'投票','tips' => '含投票'),
'event' => array('name'=>'活动','tips' => '含活动'),
);
?> <?php if($this->Config['vote_open'] != 1)unset($filter_ary['vote']); ?> <?php if($this->Config['event_open'] != 1)unset($filter_ary['event']); ?> <?php if($this->Config['fenlei_open'] != 1)unset($filter_ary['fenlei']); ?> <?php $_fkey = empty($this->Get['type']) ? 'all' : $this->Get['type']; ?> <?php !isset($filter_ary[$_fkey]) && $_fkey = 'all'; ?> <?php if('topic'==$this->Module && !in_array($this->Code,array('cms','bbs','department','channel','topicnew'))) { ?> <div class="right"> <div style="float:left; display:none;" >筛选：</div> <span id="follow_m_2"><i class="btn_feedsType"></i><a href="<?php echo $type_url; ?>&type=<?php echo $_fkey; ?>" ><?php echo $filter_ary[$_fkey]['name']; ?></a> <ul class="index_ml index_ml_2" id="sel_morelist"> <?php if(is_array($filter_ary)) { foreach($filter_ary as $key => $f) { ?> <?php if($key != $_fkey) { ?> <li><a title="<?php echo $f['tips']; ?>" href="<?php echo $type_url; ?>&type=<?php echo $key; ?>" ><?php echo $f['name']; ?></a></li> <?php } ?> <?php } } ?> </ul> </span> <div class="clear"></div> </div> <?php } ?> <div class="clear"></div> </div> </div> <?php } ?> <?php if(MEMBER_ID == $member['uid']) $_my = '我'; else $_my = $member['nickname']; ?> <?php if('topic_favorite'==jget('mod')) { ?> <div class="listBoxNav"> <ul class="boxNav"> <?php if('me'!=$this->Code) { ?> <li class="boxNavselect"><a href="index.php?mod=topic_favorite">我的收藏</a></li> <?php } else { ?><li><a href="index.php?mod=topic_favorite">我的收藏</a></li> <?php } ?> <?php if('me'==$this->Code) { ?> <li class="boxNavselect"><a href="index.php?mod=topic_favorite&code=me">收藏我的</a></li> <?php } else { ?><li><a href="index.php?mod=topic_favorite&code=me">收藏我的</a></li> <?php } ?> </ul> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_index_common_tab_favorite'])) echo $GLOBALS['_J']['pluginhooks']['global_index_common_tab_favorite'];?> </div> <?php } ?> <?php if('comment'==jget('mod') || 'mydig'==jget('type')) { ?> <div class="listBoxNav"> <ul class="boxNav"> <?php if('inbox'==$this->Code) { ?> <li class="boxNavselect"><a href="index.php?mod=comment&code=inbox">评论我的</a></li> <li style="float: right;margin:10px 0 0 0;"><a href="index.php?mod=comment&code=outbox">去个人主页看我评论的微博</a></li> <?php } else { ?><li class="boxNavselect"><a href="index.php?mod=topic&code=myblog&type=mydig"><?php echo $this->Config['changeword']['dig']; ?>我的</a></li> <li style="float: right;margin:10px 0 0 0;"><a href="index.php?mod=<?php echo $member['username']; ?>&type=mydigout">去个人主页看我<?php echo $this->Config['changeword']['dig']; ?>的微博</a></li> <?php } ?> </ul> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_index_common_tab_comment'])) echo $GLOBALS['_J']['pluginhooks']['global_index_common_tab_comment'];?> </div> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_index_common_topic_top'])) echo $GLOBALS['_J']['pluginhooks']['global_index_common_topic_top'];?> <div id="ajax_recommend"></div> <div id="ajax_reminded"></div> <div id="listTopicMsgArea"></div> <?php if(defined('NEDU_MOYO')) { ?> <?php echo nui('jsg')->hook('topic.common.middle.dsp.load');; ?> <?php } ?> <div id="listTopicArea" 
<?php if(defined('NEDU_MOYO')) { ?> <?php echo nui('jsg')->cssstyle('topic.common.middle.list.topic.area');; ?> <?php } ?>
> <?php $pagehtml_not = true; ?> <?php $pagehtml_not = $pagehtml_not ? $pagehtml_not : false; ?> <div class="Listmain"> <?php if($topic_list) { ?> <?php if('topic_favorite' == jget('mod') && 'me'==$this->Code) { ?> <?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?> <?php $counts++;$topictid=$val['tid']; ?> <div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>"><style type="text/css">
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
<?php echo $pt['from_html']; ?>&nbsp;&nbsp;<span class="recd_r_img_<?php echo $pt['tid']; ?>"> <?php if($pt['recommend'] > 0) { ?> <img src="images/recommend.gif"> <?php } ?> </span></div> <?php } else { ?> <?php $val['reply_disable']=0; ?> <p><span>原始<?php echo $this->Config['changeword']['n_weibo']; ?>已删除</span></p> <?php } ?> </div> </div> <?php } ?> <?php } ?> </div> <div class="from"> <span class="handle"></span> <span class="mycome"></span> </div> </div> <div id="reply_area_<?php echo $val['tid']; ?>"></div> <div id="modify_topic_<?php echo $val['tid']; ?>"></div> </div> </div> <?php } } ?> <?php } else { ?> <?php if($this->Code=='bbs' || $this->Code=='cms') { ?> <script type="text/javascript">
function item_longtext(pidval){
var full_id = 'c_' + pidval + '_full';
var short_id = 'c_' + pidval + '_short';
var link_id = 'linktext_' + pidval;
if (document.getElementById(full_id).style.display == 'none'){
document.getElementById(full_id).style.display = 'block';
document.getElementById(short_id).style.display = 'none';
document.getElementById(link_id).innerHTML = '收起全文';
}else{
document.getElementById(full_id).style.display = 'none';
document.getElementById(short_id).style.display = 'block';
document.getElementById(link_id).innerHTML = '查看全文';
}
}
</script> <?php } ?> <script type="text/javascript"> <?php if(!$this->Config['acceleration_mode'] && !$this->myblog_no_recommend) { ?>
ajax_recommend(<?php echo MEMBER_ID; ?>);
<?php } ?> </script> <?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?> <?php $counts++;$topictid=$val['tid']; ?> <?php if($val['item']=='channel' && in_array($val['channel_type'],array('ask','idea'))) { ?> <div class="feedCell relate-bg-mark" id="topic_list_<?php echo $val['tid']; ?>"> <?php } else { ?> <div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>"> <?php } ?> <?php if(defined('NEDU_MOYO')) { ?> <?php if($this->Config['ad_enable'] && (isset($_GET['item']) && substr($_GET['item'],0,2) != 'n.')) { ?> <?php if($counts == 5 && $this->Config['ad']['ad_list']['group_myhome']['middle_center1']) { ?> <?php SetADV('group_myhome','middle_center1'); ?> <?php } ?> <?php } ?> <?php } else { ?> <?php if($this->Config['ad_enable']) { ?> <?php if($counts == 5 && $this->Config['ad']['ad_list']['group_myhome']['middle_center1']) { ?> <?php SetADV('group_myhome','middle_center1'); ?> <?php } ?> <?php } ?> <?php } ?> <?php if($this->Code=='bbs') { ?> <?php if($val['uid']) { ?> <style type="text/css">
.relayFloor .feedCell .wb_l_face .avatar{ width:25px; height:25px;box-shadow:none;}
</style> <div class="wb_l_face"> <?php if($val['anonymous']) { ?> <div class="avatar"><a href="javascript:void(0)" class="nude_face"><img src="<?php echo $val['face']; ?>" /></a></div> <?php } else { ?><div class="avatar"> <?php if($this->Code != '' || $_GET['mod'] == 'channel') { ?> <?php if(MEMBER_ID != $val['uid']) { ?> <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();" class="nude_face"> <img src="./images/noavatar.gif" data-original="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" class="lazyload" /> </a> <?php if(!$GLOBALS['IMG_LAZYLOAD_CODE_INIT'] && ($GLOBALS['IMG_LAZYLOAD_CODE_INIT']=1)) { ?> <script type="text/javascript">//图片延迟加载代码，加上IF判断，为求只出现一次。
$(document).ready(function(){$("ul.imgList img, div.avatar img.lazyload").lazyload({skip_invisible : false, threshold : 200, effect : "fadeIn"});});
</script> <?php } ?> <?php } else { ?> <a href="javascript:void(0)" class="nude_face"> <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a> <?php } ?> <?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>" class="nude_face"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a> <?php } ?> </div> <?php if($this->Config['is_topic_user_follow'] && !$val['user_css']) { ?> <?php echo $val['follow_html']; ?> <?php } ?> <?php if($val['user_css']) { ?> <p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p> <?php } ?> <?php } ?> </div> <div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div> <div id="Pmsend_to_user_area" style="width:430px;display:none"></div> <div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div> <div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div> <?php } else { ?><div class="wb_l_face"> <div class="avatar"> <a href="javascript:void(0)" class="nude_face"><img src="<?php echo $val['face']; ?>" title="未在<?php echo $this->Config['changeword']['p_weibo']; ?>登录的论坛用户" onerror="javascript:faceError(this);" /></a> </div></div> <?php } ?> <div class="Contant"> <div style="_overflow:hidden"> <div class="topicTxt"> <p class="utitle"> <?php if($val['uid']) { ?> <span class="un"> <?php if($val['anonymous']) { ?> <a title="<?php echo $val['nickname']; ?>" href="javascript:void(0)" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a> <?php } else { ?><a title="查看<?php echo $val['nickname']; ?>的<?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"  onmouseover="get_at_user_choose('<?php echo $val['nickname']; ?>',this)"><?php echo $val['nickname']; ?></a> <?php if($val['validate_html']) { ?> <?php echo $val['validate_html']; ?> <?php } else { ?> <?php if($this->Config['topic_level_radio']) { ?> <span class="wb_l_level"> <a class="ico_level wbL<?php echo $val['level']; ?>" title="等级：<?php echo $val['level']; ?>级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a> </span> <?php } ?> <?php } ?> <?php if($this->Config['is_signature']) { ?> <?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?> <?php if($val['signature']) { ?> <span class="signature"> <?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?> <a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名"> <em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">（<?php echo $val['signature']; ?>）</em> </a> <?php } else { ?><em> (<?php echo $val['signature']; ?>)</em> <?php } ?> </span> <?php } ?> <?php } ?> <?php } ?> <?php } ?> </span> <?php } else { ?><span class="un"><a title="未在<?php echo $this->Config['changeword']['p_weibo']; ?>登录的论坛用户" href="javascript:;" ><?php echo $val['nickname']; ?></a></span> <?php } ?> <span class="ut"><a href="<?php echo $val['bbsurl']; ?>" target="_blank"><?php echo $val['dateline']; ?></a></span> </p> <?php if($val['title']) { ?> <p><b><?php echo $val['title']; ?></b></p> <?php } ?> <span id="c_<?php echo $val['pid']; ?>_short"><?php echo $val['content']; ?></span> <span id="c_<?php echo $val['pid']; ?>_full" style="display:none;"><?php echo $val['content_full']; ?></span> <?php if($val['longtext']) { ?> <span> <a id="linktext_<?php echo $val['pid']; ?>" href="javascript:;" onclick="item_longtext('<?php echo $val['pid']; ?>');return false;">查看全文</a> </span> <?php } ?> <?php if($val['first'] == 0) { ?> <div class="relayTxt"> <div class="mid"> <?php if($val['tuid']) { ?> <span> <a href="index.php?mod=<?php echo $val['t_username']; ?>" onmouseover="get_user_choose(<?php echo $val['tuid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();"><?php echo $val['t_nickname']; ?></a><?php echo $val['t_validate_html']; ?> : 
<span id="user_<?php echo $val['tid']; ?>_reply_user"></span> </span> <?php } else { ?><span><a title="未在<?php echo $this->Config['changeword']['p_weibo']; ?>登录的论坛用户" href="javascript:;"><?php echo $val['t_nickname']; ?></a>: </span> <?php } ?> <span><?php echo $val['t_title']; ?></span> <div>发布于：<?php echo $val['t_dateline']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $val['bbsurl']; ?>" target="_blank">回帖(<?php echo $val['replys']; ?>)</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $val['lasturl']; ?>" target="_blank"><?php echo $val['lastpost']; ?></a></div> </div> </div> <div class="from"><div class="handle"><ul><li></li></ul></div><div class="mycome">来自<a href="<?php echo $val['forumurl']; ?>" target="_blank">论坛 - <?php echo $val['forumtitle']; ?></a></div></div> <?php } else { ?><div class="from"><div class="handle"><ul><li><span> <?php if($val['replys']) { ?> <a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" onclick="replyTopic(<?php echo $val['rid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,0,0,0,{item:'bbs'});return false;">回帖 (<?php echo $val['replys']; ?>)</a></span></li><li><span><a href="<?php echo $val['lasturl']; ?>" target="_blank"><?php echo $val['lastpost']; ?></a> <?php } else { ?>回帖 (<?php echo $val['replys']; ?>)&nbsp;&nbsp;</span></li><li><span><?php echo $val['lastpost']; ?> <?php } ?> </span></li></ul></div><div class="mycome">来自<a href="<?php echo $val['forumurl']; ?>" target="_blank">论坛 - <?php echo $val['forumtitle']; ?></a></div></div> <?php } ?> </div> </div> <div id="reply_area_<?php echo $val['tid']; ?>"></div> </div><?php } elseif($this->Code=='cms') { ?><style type="text/css">
.feedCell{ width:100%; float:left;}
</style> <?php if($val['uid']) { ?> <style type="text/css">
.relayFloor .feedCell .wb_l_face .avatar{ width:25px; height:25px;box-shadow:none;}
</style> <div class="wb_l_face"> <?php if($val['anonymous']) { ?> <div class="avatar"><a href="javascript:void(0)" class="nude_face"><img src="<?php echo $val['face']; ?>" /></a></div> <?php } else { ?><div class="avatar"> <?php if($this->Code != '' || $_GET['mod'] == 'channel') { ?> <?php if(MEMBER_ID != $val['uid']) { ?> <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();" class="nude_face"> <img src="./images/noavatar.gif" data-original="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" class="lazyload" /> </a> <?php if(!$GLOBALS['IMG_LAZYLOAD_CODE_INIT'] && ($GLOBALS['IMG_LAZYLOAD_CODE_INIT']=1)) { ?> <script type="text/javascript">//图片延迟加载代码，加上IF判断，为求只出现一次。
$(document).ready(function(){$("ul.imgList img, div.avatar img.lazyload").lazyload({skip_invisible : false, threshold : 200, effect : "fadeIn"});});
</script> <?php } ?> <?php } else { ?> <a href="javascript:void(0)" class="nude_face"> <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a> <?php } ?> <?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>" class="nude_face"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a> <?php } ?> </div> <?php if($this->Config['is_topic_user_follow'] && !$val['user_css']) { ?> <?php echo $val['follow_html']; ?> <?php } ?> <?php if($val['user_css']) { ?> <p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p> <?php } ?> <?php } ?> </div> <div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div> <div id="Pmsend_to_user_area" style="width:430px;display:none"></div> <div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div> <div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div> <?php } else { ?><div class="wb_l_face"><div class="avatar"> <a href="javascript:void(0)" class="nude_face"><img src="<?php echo $val['face']; ?>" title="未在<?php echo $this->Config['changeword']['p_weibo']; ?>登录的网站用户" onerror="javascript:faceError(this);" /></a> </div></div> <?php } ?> <div class="Contant"> <div style="_overflow:hidden"> <div class="topicTxt"> <p class="utitle"> <?php if($val['uid']) { ?> <span class="un"> <?php if($val['anonymous']) { ?> <a title="<?php echo $val['nickname']; ?>" href="javascript:void(0)" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a> <?php } else { ?><a title="查看<?php echo $val['nickname']; ?>的<?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"  onmouseover="get_at_user_choose('<?php echo $val['nickname']; ?>',this)"><?php echo $val['nickname']; ?></a> <?php if($val['validate_html']) { ?> <?php echo $val['validate_html']; ?> <?php } else { ?> <?php if($this->Config['topic_level_radio']) { ?> <span class="wb_l_level"> <a class="ico_level wbL<?php echo $val['level']; ?>" title="等级：<?php echo $val['level']; ?>级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a> </span> <?php } ?> <?php } ?> <?php if($this->Config['is_signature']) { ?> <?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?> <?php if($val['signature']) { ?> <span class="signature"> <?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?> <a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名"> <em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">（<?php echo $val['signature']; ?>）</em> </a> <?php } else { ?><em> (<?php echo $val['signature']; ?>)</em> <?php } ?> </span> <?php } ?> <?php } ?> <?php } ?> <?php } ?> </span> <?php } else { ?><span class="un"><a title="未在<?php echo $this->Config['changeword']['p_weibo']; ?>登录的网站用户" href="javascript:;" ><?php echo $val['nickname']; ?></a></span> <?php } ?> <span class="ut"><a href="<?php echo $val['cmsurl']; ?>" target="_blank"><?php echo $val['dateline']; ?></a></span> </p> <?php if($val['title']) { ?> <p>〖<?php echo $val['title']; ?>〗</p> <?php } ?> <span id="c_<?php echo $val['pid']; ?>_short"><?php echo $val['content']; ?></span> <span id="c_<?php echo $val['pid']; ?>_full" style="display:none;"><?php echo $val['content_full']; ?></span> <?php if($val['longtext']) { ?> <span> <a id="linktext_<?php echo $val['pid']; ?>" href="javascript:;" onclick="item_longtext('<?php echo $val['pid']; ?>');return false;">查看全文</a> </span> <?php } ?> <div class="from"><div class="handle"><ul><li><span> <?php if($val['replys']) { ?> <a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" onclick="replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,0,0,0,{item:'cms'});return false;">评论 (<?php echo $val['replys']; ?>)</a></span></li><li><span><a href="<?php echo $val['replyurl']; ?>" target="_blank"><?php echo $val['replytime']; ?></a> <?php } else { ?>评论 (<?php echo $val['replys']; ?>)&nbsp;&nbsp;</span></li><li><span><?php echo $val['replytime']; ?> <?php } ?> </span></li></ul></div><div class="mycome">来自<a href="<?php echo $val['typeurl']; ?>" target="_blank">网站 - <?php echo $val['typetitle']; ?></a></div></div> </div> </div> <div id="reply_area_<?php echo $val['tid']; ?>"></div> </div> <?php } else { ?> <?php $topictid=$val['tid'];$talkanswerid = $val['tid']; ?><style type="text/css">
.relayFloor .feedCell .wb_l_face .avatar{ width:25px; height:25px;box-shadow:none;}
</style> <div class="wb_l_face"> <?php if($val['anonymous']) { ?> <div class="avatar"><a href="javascript:void(0)" class="nude_face"><img src="<?php echo $val['face']; ?>" /></a></div> <?php } else { ?><div class="avatar"> <?php if($this->Code != '' || $_GET['mod'] == 'channel') { ?> <?php if(MEMBER_ID != $val['uid']) { ?> <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();" class="nude_face"> <img src="./images/noavatar.gif" data-original="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" class="lazyload" /> </a> <?php if(!$GLOBALS['IMG_LAZYLOAD_CODE_INIT'] && ($GLOBALS['IMG_LAZYLOAD_CODE_INIT']=1)) { ?> <script type="text/javascript">//图片延迟加载代码，加上IF判断，为求只出现一次。
$(document).ready(function(){$("ul.imgList img, div.avatar img.lazyload").lazyload({skip_invisible : false, threshold : 200, effect : "fadeIn"});});
</script> <?php } ?> <?php } else { ?> <a href="javascript:void(0)" class="nude_face"> <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a> <?php } ?> <?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>" class="nude_face"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a> <?php } ?> </div> <?php if($this->Config['is_topic_user_follow'] && !$val['user_css']) { ?> <?php echo $val['follow_html']; ?> <?php } ?> <?php if($val['user_css']) { ?> <p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p> <?php } ?> <?php } ?> </div> <div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div> <div id="Pmsend_to_user_area" style="width:430px;display:none"></div> <div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div> <div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div> <script type="text/javascript">
$(document).ready(function(){
$("#topic_list_<?php echo $val['tid']; ?>").mouseover(function(){$("#topic_lists_<?php echo $val['tid']; ?>_time").hide();$("#topic_lists_<?php echo $val['tid']; ?>_view").show();});
$("#topic_list_<?php echo $val['tid']; ?>").mouseout(function(){$("#topic_lists_<?php echo $val['tid']; ?>_time").show();$("#topic_lists_<?php echo $val['tid']; ?>_view").hide();});
<?php if(!$GLOBALS['IMG_LAZYLOAD_CODE_INIT'] && ($GLOBALS['IMG_LAZYLOAD_CODE_INIT']=1)) { ?>
//图片延迟加载代码，加上IF判断，为求只出现一次。
$("ul.imgList img, div.avatar img.lazyload").lazyload({skip_invisible : false, threshold : 200, effect : "fadeIn"});
<?php } ?>
});
</script> <div class="Contant"> <div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden;"> <div class="topicTxt"> <?php if('topic_favorite'==jget('mod') && $val['favorite_time']) { ?> <p style="color:#666;font-size:12px;">收藏于：<?php echo $val['favorite_time']; ?></p> <?php } ?> <p class="utitle"> <span class="un"> <?php if($val['anonymous']) { ?> <a title="<?php echo $val['nickname']; ?>" href="javascript:void(0)" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a> <?php } else { ?><a title="查看<?php echo $val['nickname']; ?>的<?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"  onmouseover="get_at_user_choose('<?php echo $val['nickname']; ?>',this)"><?php echo $val['nickname']; ?></a> <?php if($val['validate_html']) { ?> <?php echo $val['validate_html']; ?> <?php } else { ?> <?php if($this->Config['topic_level_radio']) { ?> <span class="wb_l_level"> <a class="ico_level wbL<?php echo $val['level']; ?>" title="等级：<?php echo $val['level']; ?>级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a> </span> <?php } ?> <?php } ?> <?php if($this->Config['is_signature']) { ?> <?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?> <?php if($val['signature']) { ?> <span class="signature"> <?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?> <a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名"> <em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">（<?php echo $val['signature']; ?>）</em> </a> <?php } else { ?><em> (<?php echo $val['signature']; ?>)</em> <?php } ?> </span> <?php } ?> <?php } ?> <?php } ?> <?php } ?> </span> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_top'][$topictid])) echo $GLOBALS['_J']['pluginhooks']['global_item_top'][$topictid];?> <?php if('my_verify'==jget(type)) { ?> <span class="ut"><?php echo $val['dateline']; ?></span> <?php } else { ?><span id="topic_lists_<?php echo $val['tid']; ?>_time" class="ut"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank" title="查看"><?php echo $val['dateline']; ?> </a></span> <span id="topic_lists_<?php echo $val['tid']; ?>_view" class="ut" style="display:none;"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank" title="发布时间：<?php echo $val['dateline']; ?>">查看详情</a></span> <?php if(!empty($val['contact'])) { ?> <style type="text/css">
.pl-contact a{
display: inline-block;
z-index: 12;
margin: 0;
padding: 0 6px 0 24px;
height: 20px;
background: url('templates/exp/../../static/image/c-icon-b.jpg') no-repeat;
}
.pl-contact-b a{
display: inline-block;
z-index: 12;
margin: 0;
padding: 0 6px 0 24px;
height: 20px;
background: url('templates/exp/../../static/image/c-icon.jpg') no-repeat;
}
.ut-b a{
color:#49976b !important;
}
</style> <span id="topic_lists_<?php echo $val['tid']; ?>_contact" class="ut pl-contact"> <a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank" title="联系方式"></a> </span> <script type="text/javascript">
$(function(){
$('#listTopicArea .feedCell').hover(function(){
$(this).find('.pl-contact').addClass('pl-contact-b');
$(this).find('.utitle span').eq(2).addClass('ut-b');
},function(){
$(this).find('.pl-contact').removeClass('pl-contact-b');
$(this).find('.utitle span').eq(2).removeClass('ut-b');
});
});
</script> <?php } ?> <?php } ?> <span class="recdimg recd_img_<?php echo $val['tid']; ?>" > <?php if($val['recommend'] > 0) { ?> <a href="index.php?mod=topic&code=recd"><img class="showrcduser" value="<?php echo $val['tid']; ?>" src="images/recommend.gif"></a> <?php } ?> </span> </p> <?php if($val['topic_feature_status']) { ?> <p><span class="topic_feature_status"><?php echo $val['topic_feature_status']; ?></span></p> <?php } ?> <?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?> <?php if((('comment'==jget('mod') && 'inbox'==$this->Code) || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?> <p class="feedPsm"><a href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>" onmouseover="get_at_user_choose('<?php echo $parent_list[$pid]['nickname']; ?>',this)"><?php echo $parent_list[$pid]['nickname']; ?></a>：<span id="topic_content_<?php echo $val['tid']; ?>_<?php echo $pid; ?>_short"><?php echo $parent_list[$pid]['content']; ?></span><span id="topic_content_<?php echo $val['tid']; ?>_<?php echo $pid; ?>_full"></span> <?php if($parent_list[$pid]['longtextid'] > 0) { ?> <a class="longText" href="javascript:;" onclick="view_longtext('<?php echo $parent_list[$pid]['longtextid']; ?>', '<?php echo $val['tid']; ?>_<?php echo $pid; ?>', this);return false;">显示全部</a> <?php } ?> </p> <?php } ?> <?php } ?> <?php if($val['parents_list'] && ($tval=$val)) { ?> <div style="float:left; width:100%;"> <?php if(is_array($tval['parents_ids'])) { foreach($tval['parents_ids'] as $vtid) { ?> <div id="topic_list_<?php echo $vtid; ?>" class="relayFloor"> <?php } } ?> <?php if(is_array($tval['parents_list'])) { foreach($tval['parents_list'] as $val) { ?> <div class="relaycontent"> <?php if($val['parents_list_lazyload']) { ?> <div id="topic_comment_item_floor_msg_<?php echo $tval['tid']; ?>">展开查看更多内容
【<a href="javascript:;" onclick="replyList('<?php echo $_GET['page']; ?>', '<?php echo $tval['tid']; ?>', 'topic_list_<?php echo $tval['tid']; ?>', 'topic_comment_item_floor_msg_<?php echo $tval['tid']; ?>');">点此展开</a>】</div> <?php } else { ?><span class="mright"><?php echo $val['floor']; ?></span> <style type="text/css">
.relaycontent .Contant,.relaycontent .topicTxt {
width: auto;
float: none;
position: relative;
padding: 0;
}
.relaycontent .feedCell .avatar {
width: 25px;
box-shadow: none;
}
.relayFloorface .feedCell .avatar img {
width: 25px;
height: 25px;
}
.relayFloorface .feedCell .wb_l_face,.relayFloorface .feedCell .avatar {
width: 25px;
height: 25px;
box-shadow: none;
margin: 0;
}
.relaycontent .topicTxt {
box-shadow: none;
background: none;
}
.relaycontent .feedCell .avatar {
width: 25px;
height: 25px;
box-shadow: none;
}
.relaycontent .from {
width: 100%;
}
.feedCell .avatar {
width: 25px;
height: 25px;
box-shadow: none;
}
.user_floor a {
float: left;
margin-right: 5px;
}
.con_floor {
display: block;
margin: 0;
float: none;
}
.con_floor ul.attachList{ 
width:auto;
}
.user_floor {
float: none;
width: 100%;
float:left;
clear:both;
}
.relayFloor .relaycontent .relayFloorface {
position: static;
float: left;
left: initial;
}
#listTopicArea .feedCell .relayFloor .relaycontent .relayFloorface .wb_l_face {
margin: 0;
width:25px;
height:25px;
}
.relayFloor .relaycontent .Contant {
float: none;
background: none;
margin: 0;
}
</style> <div class="Contant"> <div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow: hidden;"> <div class="topicTxt"> <div class="user_floor"><span class="un"> <?php if($val['anonymous']) { ?> <a title="<?php echo $val['nickname']; ?>" href="javascript:void(0)" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a> <?php } else { ?><a title="查看<?php echo $val['nickname']; ?>的<?php echo $this->Config['changeword']['n_weibo']; ?>" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"  onmouseover="get_at_user_choose('<?php echo $val['nickname']; ?>',this)"><?php echo $val['nickname']; ?></a> <?php if($val['validate_html']) { ?> <?php echo $val['validate_html']; ?> <?php } else { ?> <?php if($this->Config['topic_level_radio']) { ?> <span class="wb_l_level"> <a class="ico_level wbL<?php echo $val['level']; ?>" title="等级：<?php echo $val['level']; ?>级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a> </span> <?php } ?> <?php } ?> <?php if($this->Config['is_signature']) { ?> <?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?> <?php if($val['signature']) { ?> <span class="signature"> <?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?> <a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名"> <em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">（<?php echo $val['signature']; ?>）</em> </a> <?php } else { ?><em> (<?php echo $val['signature']; ?>)</em> <?php } ?> </span> <?php } ?> <?php } ?> <?php } ?> <?php } ?> </span></div> <div class="con_floor"> <?php if(($val["item"]=="vote")&&$val["item_id"]) { ?> <?php $myOption=jlogic('vote')->get_vote_item($val["item_id"],
$val["uid"],
1, $val['addtime']);!$myOption['option']||$string=implode('，',$myOption['option']); ?> <?php if($string) { ?> <span class="topic_select" title="投票给：<?php echo $string; ?>"><span>投票给：<?php echo $string; ?></span> </span><br /> <?php } ?> <?php } ?> <span id="topic_content_<?php echo $val['tid']; ?>_short"> <?php echo $val['content']; ?> <?php if($val['imageid'] && $val['image_list']) { ?> <div
onclick="view_longtext('<?php echo $val['longtextid']; ?>', '<?php echo $val['tid']; ?>', '<?php echo $val['tid']; ?>');
if(($.trim(($('#<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>').html()))).length < 1) {
$('#topic_list_reply_<?php echo $val['tid']; ?>_aid').click();
}; return false;"> <ul class="imgList"> <?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif"
data-original="<?php echo $iv['image_small']; ?>" class="showcursor d"> </li> <?php } } ?> </ul> </div> <?php } ?> </span> <?php if($val['imageid'] && $val['image_list']) { ?> <div style="display: none;"> <ul class="imgList"> <?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif"
data-original="<?php echo $iv['image_original']; ?>"> </li> <?php } } ?> </ul> </div> <?php } ?> <span id="topic_content_<?php echo $val['tid']; ?>_full"></span> <?php if($val['longtextid'] > 0) { ?> <a class="longText" href="javascript:;" id="longText_<?php echo $val['tid']; ?>"
onclick="view_longtext('<?php echo $val['longtextid']; ?>', '<?php echo $val['tid']; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a> <?php } ?> <?php if($val['attachid'] && $val['attach_list']) { ?> <?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?> <ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>"> <?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?> <?php $attachaid=$iv['id']; ?> <li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" /> <div class="attachList_att"> <p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
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
style="cursor: pointer; border: none;" /></div> <?php } ?> <?php } ?> <script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script> <?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?> <?php if(!$topic_view) { ?> <?php $pt=$parent_list[$tpid]; ?> <div class="relayTxt"> <div class="mid"> <p> <?php if($pt) { ?> <span> <?php if($pt['anonymous']) { ?> <a href="javascript:void(0)"> <?php echo $pt['nickname']; ?> </a> <?php } else { ?><a
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
<?php echo $pt['from_html']; ?>&nbsp;&nbsp;<span class="recd_r_img_<?php echo $pt['tid']; ?>"> <?php if($pt['recommend'] > 0) { ?> <img src="images/recommend.gif"> <?php } ?> </span></div> <?php } else { ?> <?php $val['reply_disable']=0; ?> <p><span>原始<?php echo $this->Config['changeword']['n_weibo']; ?>已删除</span></p> <?php } ?> </div> </div> <?php } ?> <?php } ?> <?php if($this->Module=='qun') { ?> <script type="text/javascript">
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
><a href="javascript:;" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息"><font color="red">举报</font></a></span> </div> </li> <?php } ?> </ul> </div> <div class="mycome"> <?php if(!$no_from) { ?> <?php echo $val['from_html']; ?> <?php } ?> </div> </div> <?php } else { ?><script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script> <?php if($this->Config['attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?> <?php $allow_pic = $this->Config['image_enable'] ? $this->Config['image_enable'] : 0 ?> <?php $allow_face = $this->Config['face_enable'] ? $this->Config['face_enable'] : 0 ?> <div class="from"> <div class="handle"> <ul> <?php if($this->Get['type'] != 'my_verify') { ?> <?php $tpid=$val['top_parent_id']; if ($tpid&&$parent_list[$tpid]) $root_type=$parent_list[$tpid]['type']; ?> <?php if($this->Get['mod'] == 'talk' &&  $val['reply_ok']) { ?> <li><span id="answer_<?php echo $val['tid']; ?>" class="talkreply" onclick="showMainPublishBox('answer','talk','<?php echo $talk['lid']; ?>','<?php echo $val['tid']; ?>','<?php echo $val['uid']; ?>');return false;">回答</span></li><li class="o_line_l">|</li> <?php } ?> <?php if($val['uid']>0) { ?> <li style="_margin-top:-1px;"> <span 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();"
<?php } else { ?> onclick="topicdig(<?php echo $val['tid']; ?>,<?php echo $val['uid']; ?>,<?php echo $val['digcounts']; ?>,'<?php echo $this->Config['changeword']['dig']; ?>');return false;"
<?php } ?>
> <a class="topicdig_<?php echo $val['tid']; ?> digusers" id="topicdig_<?php echo $val['tid']; ?>" href="javascript:;" value="<?php echo $val['tid']; ?>" rel="<?php echo $val['digcounts']; ?>" title="<?php echo $this->Config['changeword']['dig']; ?>"> <?php if($val['digcounts']) { ?>
(<?php echo $val['digcounts']; ?>)
<?php } else { ?>&nbsp;
<?php } ?> </a></span></li> <li class="o_line_l">|</li> <?php } ?> <?php if((!isset($root_type)) || (isset($root_type) && in_array($root_type, get_topic_type('forward')))) { ?> <?php } else { ?><?php $not_allow_forward=1; ?> <?php } ?> <li> <?php if('topic_favorite'==jget('mod') && 'me'!=$this->Code) { ?> <span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
> <a href="javascript:;" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a> </span> <?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID < 1) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
> <a href="javascript:;" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a> </span> <?php } ?> </li> <li class="o_line_l">|</li> <li> <?php if(!$val['reply_disable'] && !($val['managetype'] == 2 || $val['managetype'] == 9)) { ?> <span> <?php $opstring = (!$topic_view && ($val['ismanager'] || 'admin'==MEMBER_ROLE_TYPE) && in_array($val['channel_type'],array('ask','idea'))) ? chr(123).'relate:1,itemid:'.$val['item_id'].',featureid:'.$val['featureid'].chr(125) : chr(123).chr(125) ?> <?php if(defined('NEDU_MOYO')) { ?> <?php $opstring = nlogic('feeds.app.jsg')->topic_comment_ajax_options($options, $val) ?> <?php } ?> <?php $__rts=($reply_list_ajax_disable ? 0 : $val['replys']); ?> <a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:;" 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
onclick="replyTopic(<?php echo $val['tid']; ?>,'<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>','<?php echo $__rts; ?>',<?php echo $not_allow_forward; ?>,<?php echo $allow_attach; ?>,<?php echo $allow_face; ?>,<?php echo $allow_pic; ?>,1,<?php echo $opstring; ?>);return false;">回应
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?> </a> </span> <?php } else { ?> <span title="设置了特殊的权限，不允许回应">回应</span> <?php } ?> </li> <li class="o_line_l">|</li> <?php if($topic_view && ($topic_info['ismanager'] || 'admin'==MEMBER_ROLE_TYPE) && in_array($topic_info['channel_type'],array('ask','idea'))) { ?> <li><a href="javascript:void(0);" onclick="settopicfeature(<?php echo $topic_info['tid']; ?>,<?php echo $val['tid']; ?>,1);">管理</a></li><li class="o_line_l">|</li> <?php } ?> <li id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a" class="mobox"> <a href="javascript:;" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> <div id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none"> <span><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank"  title="去微博详细页面浏览">详情</a></span> <?php if(jallow($val['uid']) || $val['ismanager']) { ?> <?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?> <a href="javascript:;" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a> <?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?> <?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE || $val['ismanager'] ) { ?> <?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE || $val['ismanager']) { ?> <a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a> <?php } ?> <?php } ?> <?php } ?> <?php if((in_array($val['type'], get_topic_type('forward')) || $this->Module=='qun') && !($val['managetype'] == 2 || $val['managetype'] == 8)) { ?> <?php $not_allow_forward=0; ?> <span 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
> <a href="javascript:void(0);" onclick="get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>,<?php echo $allow_pic; ?>,<?php echo $allow_face; ?>);" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?> </a> </span> <?php } else { ?> <?php $not_allow_forward=1; ?> <?php if(isset($val['fansgroup'])) { ?> <span><?php echo $val['fansgroup']; ?></span> <?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span> <?php } ?> <?php } ?> <?php if(true===jaccess('topic', 'do_recd') || $val['ismanager']) { ?> <a href="javascript:;" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>','tag_id':'<?php echo $tag_id; ?>'});return false;">推荐</a> <?php } ?> <?php if('admin'==MEMBER_ROLE_TYPE) { ?> <a onclick="force_out(<?php echo $val['uid']; ?>);" href="javascript:void(0);">封杀</a> <a onclick="force_ip('<?php echo $val['postip']; ?>');" href="javascript:void(0);">封IP</a> <?php } ?> <span 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
><a href="javascript:;" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息"><font color="red">举报</font></a></span> </div> </li> <?php } else { ?><li id="topic_lists_<?php echo $val['id']; ?>_a" class="mobox"> <?php if(jallow($val['uid'])) { ?> <?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?> <a href="javascript:;" onclick="deleteVerify(<?php echo $val['id']; ?>,'<?php echo $eid; ?>_<?php echo $val['id']; ?>');return false;">删除</a> <?php } ?> </li> <?php } ?> </ul> </div> <div class="mycome"> <?php if(!$no_from) { ?> <?php echo $val['from_html']; ?> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_bottom'][$topictid])) echo $GLOBALS['_J']['pluginhooks']['global_item_bottom'][$topictid];?> </div> </div> <?php } ?> </div> </div> </div> <div id="<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>"></div> <div id="modify_topic_<?php echo $val['tid']; ?>"></div> <div id="forward_menu_<?php echo $val['tid']; ?>"></div> </div> <div style="clear: both;"></div> <?php } ?> </div> </div> <?php } } ?> </div> <?php $val=$tval; ?> <?php } ?> <?php if(($val["item"]=="vote")&&$val["item_id"]) { ?> <?php $myOption=jlogic('vote')->get_vote_item($val["item_id"], $val["uid"], 1, $val['addtime']);$string='';!$myOption['option']||$string=implode('，',$myOption['option']); ?> <?php if($string) { ?> <span class="topic_select" title="投票给：<?php echo $string; ?>"><span>投票给：<?php echo $string; ?></span></span> <?php } ?> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_extra1'][$topictid])) echo $GLOBALS['_J']['pluginhooks']['global_item_extra1'][$topictid];?> <span id="topic_content_<?php echo $val['tid']; ?>_short"> <div class="date_0401_<?php echo $val['tid']; ?>"> <?php echo $val['content']; ?></div> <?php if($val['imageid'] && $val['image_list']) { ?> <div onclick="view_longtext('<?php echo $val['longtextid']; ?>', '<?php echo $val['tid']; ?>', '<?php echo $val['tid']; ?>');
if(($.trim(($('#<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>').html()))).length < 1) {
$('#topic_list_reply_<?php echo $val['tid']; ?>_aid').click();
}; return false;"> <ul class="imgList"> <?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif" data-original="<?php echo $iv['image_small']; ?>" class="showcursor a"></li> <?php } } ?> </ul> </div> <?php } ?> </span> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_extra2'][$topictid])) echo $GLOBALS['_J']['pluginhooks']['global_item_extra2'][$topictid];?> <?php if($val['imageid'] && $val['image_list']) { ?> <div style="display:none;"> <ul class="imgList"> <?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif" data-original="<?php echo $iv['image_original']; ?>"></li> <?php } } ?> </ul> </div> <?php } ?> <span id="topic_content_<?php echo $val['tid']; ?>_full"></span> <?php if($val['longtextid'] > 0) { ?> <a class="longText" href="javascript:;" id="longText_<?php echo $val['tid']; ?>" onclick="view_longtext('<?php echo $val['longtextid']; ?>', '<?php echo $val['tid']; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a> <?php } ?> <?php if($val['attachid'] && $val['attach_list']) { ?> <?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?> <ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>"> <?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?> <?php $attachaid=$iv['id']; ?> <li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" /> <div class="attachList_att"> <p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
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
style="cursor: pointer; border: none;" /></div> <?php } ?> <?php } ?> <?php $relate_list = $relate_list ? $relate_list : $rets['relate_list']; ?> <?php if($val['item']=='channel' && in_array($val['channel_type'],array('ask','idea')) && $val['relateid'] > 0 && $relate_list[$val['relateid']]) { ?> <?php $trid=$val['relateid'];$rlt=$relate_list[$trid]; ?> <div class="relayTxt"> <div class="relate <?php echo $val['channel_type']; ?>"> <p><span> <a href="index.php?mod=<?php echo $rlt['username']; ?>"	onmouseover="get_user_choose(<?php echo $rlt['uid']; ?>,'_relate_user',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();"> <?php echo $rlt['nickname']; ?> </a><?php echo $rlt['validate_html']; ?> :<span id="user_<?php echo $val['tid']; ?>_relate_user"></span></span> <?php $TPTR_ = $TPTR_ ? $TPTR_ : 'TPT_'; ?> <div id="topic_content_<?php echo $TPTR_; ?><?php echo $rlt['tid']; ?>_short" style="padding-right:60px;"> <?php echo $rlt['content']; ?> <?php if($rlt['imageid'] && $rlt['image_list']) { ?> <div onclick="view_longtext('<?php echo $rlt['longtextid']; ?>', '<?php echo $rlt['tid']; ?>', '<?php echo $rlt['tid']; ?>', '<?php echo $TPTR_; ?>', '<?php echo $rlt['tid']; ?>');return false;"> <ul class="imgList"> <?php if(is_array($rlt['image_list'])) { foreach($rlt['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif" data-original="<?php echo $iv['image_small']; ?>"></li> <?php } } ?> </ul> </div> <?php } ?> </div> <?php if($rlt['imageid'] && $rlt['image_list']) { ?> <div style="display:none;"> <ul class="imgList"> <?php if(is_array($rlt['image_list'])) { foreach($rlt['image_list'] as $iv) { ?> <li><img src="static/image/grey.gif" data-original="<?php echo $iv['image_original']; ?>"></li> <?php } } ?> </ul> </div> <?php } ?> <span id="topic_content_<?php echo $TPTR_; ?><?php echo $rlt['tid']; ?>_full" style="padding-right:60px;"></span> <?php if($rlt['longtextid'] > 0) { ?> <a class="longText" id="longText_<?php echo $rlt['tid']; ?>" href="javascript:;" onclick="view_longtext('<?php echo $rlt['longtextid']; ?>', '<?php echo $rlt['tid']; ?>', '<?php echo $rlt['tid']; ?>', '<?php echo $TPTR_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a> <?php } ?> <?php if($rlt['attachid'] && $rlt['attach_list']) { ?> <table class="attachst" style="width:490px;"> <?php if(is_array($rlt['attach_list'])) { foreach($rlt['attach_list'] as $iv) { ?> <?php $attachaid=$iv['id']; ?> <tr> <td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td> <td class="attachst_att"><p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p> <p class="attachList_att_doc"> <?php if($iv['onlineview']) { ?> <a href="<?php echo $iv['onlineview']; ?>" target="_blank">在线预览</a> | 
<?php } ?> <a href="javascript:void(0);"
onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<font id="attach_score_<?php echo $iv['id']; ?>"><?php echo $iv['attach_score']; ?></font>积分，已下载<font id="attach_downnum_<?php echo $iv['id']; ?>" class="attach_downnum_<?php echo $iv['id']; ?>"><?php echo $iv['attach_down']; ?></font>次）</p></td> </tr> <?php } } ?> </table> <?php } ?> <?php if($rlt['videoid'] and $this->Config['video_status']) { ?> <div class="feedUservideo"> <a onClick="javascript:showFlash('<?php echo $rlt['VideoHosts']; ?>', '<?php echo $rlt['VideoLink']; ?>', this, '<?php echo $rlt['VideoID']; ?>','<?php echo $rlt['VideoUrl']; ?>');"> <div id="play_<?php echo $rlt['VideoID']; ?>" class="vP"><img src="static/image/feedvideoplay.gif" /></div> <img src="<?php echo $rlt['VideoImg']; ?>" style="border: none" /> </a></div> <?php } ?> <?php if($rlt['musicid']) { ?> <?php if($rlt['xiami_id']) { ?> <div class="feedUserImg"> <embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $rlt['xiami_id']; ?>/singlePlayer.swf"></embed> </div> <?php } else { ?> <div class="feedUserImg"> <div id="play_<?php echo $rlt['MusicID']; ?>"></div> <img src="static/image/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $rlt['MusicUrl']; ?>', this, '<?php echo $rlt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div> <?php } ?> <?php } ?> </p> <div class="favorTag"> <a 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();"
<?php } else { ?>onclick="topicdig(<?php echo $rlt['tid']; ?>,<?php echo $rlt['uid']; ?>,<?php echo $rlt['digcounts']; ?>,'<?php echo $this->Config['changeword']['dig']; ?>',1);return false;"
<?php } ?>
class="topicdig_<?php echo $rlt['tid']; ?>" href="javascript:void(0)" value="<?php echo $rlt['tid']; ?>" rel="<?php echo $rlt['digcounts']; ?>"><?php echo $this->Config['changeword']['dig']; ?> <?php if($rlt['digcounts']) { ?>
(<?php echo $rlt['digcounts']; ?>)
<?php } ?> </a> &nbsp;<a href="index.php?mod=topic&code=<?php echo $trid; ?>" target="_blank">评论(<?php echo $rlt['replys']; ?>)</a></div> </div> </div> <?php } ?> <?php if($this->item !="reward") { ?> <script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script> <?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?> <?php if(!$topic_view) { ?> <?php $pt=$parent_list[$tpid]; ?> <div class="relayTxt"> <div class="mid"> <p> <?php if($pt) { ?> <span> <?php if($pt['anonymous']) { ?> <a href="javascript:void(0)"> <?php echo $pt['nickname']; ?> </a> <?php } else { ?><a
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
<?php echo $pt['from_html']; ?>&nbsp;&nbsp;<span class="recd_r_img_<?php echo $pt['tid']; ?>"> <?php if($pt['recommend'] > 0) { ?> <img src="images/recommend.gif"> <?php } ?> </span></div> <?php } else { ?> <?php $val['reply_disable']=0; ?> <p><span>原始<?php echo $this->Config['changeword']['n_weibo']; ?>已删除</span></p> <?php } ?> </div> </div> <?php } ?> <?php } ?> <?php } ?> <?php if($this->Module=='qun') { ?> <script type="text/javascript">
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
><a href="javascript:;" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息"><font color="red">举报</font></a></span> </div> </li> <?php } ?> </ul> </div> <div class="mycome"> <?php if(!$no_from) { ?> <?php echo $val['from_html']; ?> <?php } ?> </div> </div> <?php } else { ?><script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script> <?php if($this->Config['attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?> <?php $allow_pic = $this->Config['image_enable'] ? $this->Config['image_enable'] : 0 ?> <?php $allow_face = $this->Config['face_enable'] ? $this->Config['face_enable'] : 0 ?> <div class="from"> <div class="handle"> <ul> <?php if($this->Get['type'] != 'my_verify') { ?> <?php $tpid=$val['top_parent_id']; if ($tpid&&$parent_list[$tpid]) $root_type=$parent_list[$tpid]['type']; ?> <?php if($this->Get['mod'] == 'talk' &&  $val['reply_ok']) { ?> <li><span id="answer_<?php echo $val['tid']; ?>" class="talkreply" onclick="showMainPublishBox('answer','talk','<?php echo $talk['lid']; ?>','<?php echo $val['tid']; ?>','<?php echo $val['uid']; ?>');return false;">回答</span></li><li class="o_line_l">|</li> <?php } ?> <?php if($val['uid']>0) { ?> <li style="_margin-top:-1px;"> <span 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();"
<?php } else { ?> onclick="topicdig(<?php echo $val['tid']; ?>,<?php echo $val['uid']; ?>,<?php echo $val['digcounts']; ?>,'<?php echo $this->Config['changeword']['dig']; ?>');return false;"
<?php } ?>
> <a class="topicdig_<?php echo $val['tid']; ?> digusers" id="topicdig_<?php echo $val['tid']; ?>" href="javascript:;" value="<?php echo $val['tid']; ?>" rel="<?php echo $val['digcounts']; ?>" title="<?php echo $this->Config['changeword']['dig']; ?>"> <?php if($val['digcounts']) { ?>
(<?php echo $val['digcounts']; ?>)
<?php } else { ?>&nbsp;
<?php } ?> </a></span></li> <li class="o_line_l">|</li> <?php } ?> <?php if((!isset($root_type)) || (isset($root_type) && in_array($root_type, get_topic_type('forward')))) { ?> <?php } else { ?><?php $not_allow_forward=1; ?> <?php } ?> <li> <?php if('topic_favorite'==jget('mod') && 'me'!=$this->Code) { ?> <span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
> <a href="javascript:;" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a> </span> <?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID < 1) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
> <a href="javascript:;" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a> </span> <?php } ?> </li> <li class="o_line_l">|</li> <li> <?php if(!$val['reply_disable'] && !($val['managetype'] == 2 || $val['managetype'] == 9)) { ?> <span> <?php $opstring = (!$topic_view && ($val['ismanager'] || 'admin'==MEMBER_ROLE_TYPE) && in_array($val['channel_type'],array('ask','idea'))) ? chr(123).'relate:1,itemid:'.$val['item_id'].',featureid:'.$val['featureid'].chr(125) : chr(123).chr(125) ?> <?php if(defined('NEDU_MOYO')) { ?> <?php $opstring = nlogic('feeds.app.jsg')->topic_comment_ajax_options($options, $val) ?> <?php } ?> <?php $__rts=($reply_list_ajax_disable ? 0 : $val['replys']); ?> <a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:;" 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
onclick="replyTopic(<?php echo $val['tid']; ?>,'<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>','<?php echo $__rts; ?>',<?php echo $not_allow_forward; ?>,<?php echo $allow_attach; ?>,<?php echo $allow_face; ?>,<?php echo $allow_pic; ?>,1,<?php echo $opstring; ?>);return false;">回应
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?> </a> </span> <?php } else { ?> <span title="设置了特殊的权限，不允许回应">回应</span> <?php } ?> </li> <li class="o_line_l">|</li> <?php if($topic_view && ($topic_info['ismanager'] || 'admin'==MEMBER_ROLE_TYPE) && in_array($topic_info['channel_type'],array('ask','idea'))) { ?> <li><a href="javascript:void(0);" onclick="settopicfeature(<?php echo $topic_info['tid']; ?>,<?php echo $val['tid']; ?>,1);">管理</a></li><li class="o_line_l">|</li> <?php } ?> <li id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a" class="mobox"> <a href="javascript:;" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> <div id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none"> <span><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank"  title="去微博详细页面浏览">详情</a></span> <?php if(jallow($val['uid']) || $val['ismanager']) { ?> <?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?> <a href="javascript:;" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a> <?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?> <?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE || $val['ismanager'] ) { ?> <?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE || $val['ismanager']) { ?> <a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a> <?php } ?> <?php } ?> <?php } ?> <?php if((in_array($val['type'], get_topic_type('forward')) || $this->Module=='qun') && !($val['managetype'] == 2 || $val['managetype'] == 8)) { ?> <?php $not_allow_forward=0; ?> <span 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
> <a href="javascript:void(0);" onclick="get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>,<?php echo $allow_pic; ?>,<?php echo $allow_face; ?>);" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?> </a> </span> <?php } else { ?> <?php $not_allow_forward=1; ?> <?php if(isset($val['fansgroup'])) { ?> <span><?php echo $val['fansgroup']; ?></span> <?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span> <?php } ?> <?php } ?> <?php if(true===jaccess('topic', 'do_recd') || $val['ismanager']) { ?> <a href="javascript:;" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>','tag_id':'<?php echo $tag_id; ?>'});return false;">推荐</a> <?php } ?> <?php if('admin'==MEMBER_ROLE_TYPE) { ?> <a onclick="force_out(<?php echo $val['uid']; ?>);" href="javascript:void(0);">封杀</a> <a onclick="force_ip('<?php echo $val['postip']; ?>');" href="javascript:void(0);">封IP</a> <?php } ?> <span 
<?php if(MEMBER_ID <1 ) { ?>
onclick="ShowLoginDialog();" 
<?php } ?>
><a href="javascript:;" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息"><font color="red">举报</font></a></span> </div> </li> <?php } else { ?><li id="topic_lists_<?php echo $val['id']; ?>_a" class="mobox"> <?php if(jallow($val['uid'])) { ?> <?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?> <a href="javascript:;" onclick="deleteVerify(<?php echo $val['id']; ?>,'<?php echo $eid; ?>_<?php echo $val['id']; ?>');return false;">删除</a> <?php } ?> </li> <?php } ?> </ul> </div> <div class="mycome"> <?php if(!$no_from) { ?> <?php echo $val['from_html']; ?> <?php } ?> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_item_bottom'][$topictid])) echo $GLOBALS['_J']['pluginhooks']['global_item_bottom'][$topictid];?> </div> </div> <?php } ?> </div> </div> <div id="<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>"></div> <div id="modify_topic_<?php echo $val['tid']; ?>"></div> <div id="forward_menu_<?php echo $val['tid']; ?>"></div> </div> <div style="clear:both;"></div> <?php } ?> </div> <?php } } ?> <?php } ?> <?php if($page_arr['html'] && !$pagehtml_not) { ?> <div class="pageStyle"> <li><?php echo $page_arr['html']; ?></li> </div> <?php } ?> <?php } else { ?><script type="text/javascript"> <?php if(!$this->Config['acceleration_mode'] && !$this->myblog_no_recommend) { ?>
ajax_recommend(<?php echo MEMBER_ID; ?>);
<?php } ?> </script> <div style="text-align:center;color:#999;clear:both;padding: 0 20px 20px;background:#fff;"> <?php if('bbs' == $this->Code || 'cms' == $this->Code || 'department' == $this->Code || 'company' == $this->Get['mod']) { ?> <br>暂时没有可显示的<?php echo $this->Config['changeword']['n_weibo']; ?>或数据<?php } elseif('channel' == $this->Code && !$my_buddy_channel) { ?><br>您还没有关注任何频道，请先进入<a href="index.php?mod=channel">频道页</a>，对你所感兴趣的频道进行关注。<br><br>关注后，该频道的<?php echo $this->Config['changeword']['n_weibo']; ?>将显示在这里！<?php } elseif($forbidden_view) { ?><br>您没有权限查看该分类下<?php echo $this->Config['changeword']['n_weibo']; ?>。
<?php } else { ?><br>分类下暂时没有可显示的<?php echo $this->Config['changeword']['n_weibo']; ?>。
<?php } ?> </div> <?php } ?> <div style="text-align:center;color:#999; clear:both;margin: 0 20px;"> <?php if('groupview'== $this->Code && $counts <=0) { ?>
"<strong><?php echo $groupname; ?></strong>" 分组下的用户暂时没有发布<?php echo $this->Config['changeword']['n_weibo']; ?>。
<?php } ?> <?php if($counts <=5) { ?> <div id="topic_list_<?php echo $counts; ?>" > <?php if('at'==jget('mod')) { ?> <BR />
这里会显示含有"@<?php echo MEMBER_NICKNAME; ?>"的<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR /> <BR /> <span>@昵称 </span>技巧：注意昵称后面有“空格”，可以理解为向某人说，被@昵称 提到的人如果在系统中存在，那么TA就可在其个人首页“@提到我的”的栏目中看到你发布的内容。
<?php } elseif('comment' == jget('mod') && 'inbox' == $this->Code) { ?> <BR /> <BR /> <BR />
这里会显示他人对你<?php echo $this->Config['changeword']['n_weibo']; ?>所做的评论。<BR /> <BR /> <A HREF="index.php?mod=fans&uid=<?php echo $member['uid']; ?>" title="关注<?php echo $member['nickname']; ?>的">关注你的</A>人越多，就会有越多人参与你分享内容的讨论，尝试通过<A HREF="index.php?mod=profile&code=invite">邀请好友</A>来让更多人关注你；<BR /><?php } elseif('comment' == jget('mod') && 'outbox' == $this->Code) { ?> <BR /> <BR /> <BR />
这里会显示你对他人<?php echo $this->Config['changeword']['n_weibo']; ?>所做的评论。<BR /> <BR /> <?php } elseif('topic_favorite'==jget('mod') && 'me' != $this->Code) { ?> <BR />
这里会显示你所收藏的<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR /> <BR />
在登录状态下，每个<?php echo $this->Config['changeword']['n_weibo']; ?>的下方都有一个收藏连接，点击即可自动完成收藏，然后你就可以在这里看到了。你可以访问<A HREF="index.php?mod=topic&code=hot">热门<?php echo $this->Config['changeword']['n_weibo']; ?></A>来发现有收藏价值的内容；<BR /> <?php } elseif('topic_favorite'==jget('mod') && 'me' == $this->Code) { ?> <BR />
这里会显示谁收藏了你的<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR /> <BR />
赶快分享些有价值的新鲜事吧，当有人收藏后，你就会在这里看到。<BR /><?php } elseif('myhome' == $this->Code ) { ?><BR /><BR />
这里显示我和我关注人的<?php echo $this->Config['changeword']['n_weibo']; ?><BR /><BR />
关注你喜欢的人，你就可以在这看到他们分享的内容，尝试通过<A HREF="index.php?mod=top&code=member">达人榜</A>、<A HREF="index.php?mod=profile&code=search">找人</A>选择用户加关注<BR /><?php } elseif('tag' == $this->Code ) { ?><BR /><BR />
这里显示我关注话题的相关<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR /><BR />
对你感兴趣的话题进行关注，就可以在这里直接查看相关<?php echo $this->Config['changeword']['n_weibo']; ?>，还可以结识有共同话题的人，尝试通过<A HREF="index.php?mod=tag">话题榜</A> 选择话题关注；<BR /><?php } elseif('event' == $view ) { ?><BR />
这里显示我关注活动的相关<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR />
对你感兴趣的活动进行关注，就可以在这里直接查看相关<?php echo $this->Config['changeword']['n_weibo']; ?>，还可以结识有共同话题的人。<BR /><?php } elseif('qun' == $this->Code ) { ?><BR /><BR />
这里显示我加入<?php echo $this->Config['changeword']['weiqun']; ?>相关的<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR /><BR />
加入你感兴趣的<?php echo $this->Config['changeword']['weiqun']; ?>，就可以在这里直接查看相关<?php echo $this->Config['changeword']['n_weibo']; ?>，还可以结识有共同话题的人。<a href="index.php?mod=qun" target="_blank">去群里逛逛吧~~</a><BR /><?php } elseif('recd' == $this->Code ) { ?><BR /><BR />
这里显示推荐的<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR /><BR /><?php } elseif('cms' == $this->Code ) { ?><BR /><BR />
这里显示来自<a href="<?php echo $cms_url; ?>" target="_blank">网站资讯</a>的内容。<BR /><BR /> <?php if('admin'==MEMBER_ROLE_TYPE) { ?>
前提条件是：<?php echo $this->Config['changeword']['p_weibo']; ?>必须整合了DedeCMS系统。<BR /><BR /> <?php } ?> <?php } elseif('bbs' == $this->Code ) { ?><BR /><BR /> <?php if($this->Config['dzbbs_enable']) { ?>
这里显示来自<a href="<?php echo $bbs_url; ?>" target="_blank">论坛</a>的帖子。<BR /><BR /> <?php if('admin'==MEMBER_ROLE_TYPE) { ?>
前提条件是：<?php echo $this->Config['changeword']['p_weibo']; ?>必须整合了Ucenter系统和Discuz论坛。<BR /><BR /> <?php } ?> <?php } elseif($this->Config['phpwind_enable']) { ?>这里显示来自<a href="<?php echo $bbs_url; ?>" target="_blank">论坛</a>的帖子。<BR /><BR /> <?php if('admin'==MEMBER_ROLE_TYPE) { ?>
前提条件是：<?php echo $this->Config['changeword']['p_weibo']; ?>必须整合了PhpWind论坛，且同时开启了调用phpwind论坛帖子。<BR /><BR /> <?php } ?> <?php } ?> <?php } elseif('fenlei' == $view ) { ?><BR />
这里显示我关注分类的相关<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR />
对你感兴趣的分类进行关注，就可以在这里直接查看相关<?php echo $this->Config['changeword']['n_weibo']; ?>。<BR /> <?php } ?> </div> <?php } ?> </div></div> <?php echo $this->js_show_msg(); ?> <div id="ajaxtopic"></div> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_index_common_topic_bottom'])) echo $GLOBALS['_J']['pluginhooks']['global_index_common_topic_bottom'];?> <div id="pageinfo"></div> <div id="pagehtml"> <?php if($page_arr['html']) { ?> <div class="pageStyle"> <li><?php echo $page_arr['html']; ?></li> </div> <?php } ?> </div> </div> <?php if(!empty($GLOBALS['_J']['pluginhooks']['global_index_common_bottom'])) echo $GLOBALS['_J']['pluginhooks']['global_index_common_bottom'];?> </div> </div> <script type="text/javascript"> <?php if($isloading) { ?>
var isLoading = true;
<?php } else { ?>var isLoading = false;
<?php } ?>
if(isLoading){$('#pageinfo').html('');$("#pagehtml").hide();}var ajaxkeys = new Array();var onloading = false;var ajaxnum = 0;
<?php if(is_array($ajaxkey)) { foreach($ajaxkey as $key => $val) { ?>
ajaxkeys[<?php echo $key; ?>] = '<?php echo $val; ?>';
<?php } } ?>
$(window).bind('scroll resize',function(event){if(isLoading && !onloading){var bodyTop = document.documentElement.scrollTop + document.body.scrollTop;if(bodyTop+$(window).height() >= ($('#listTopicArea').height()+300)){loadtopic(ajaxkeys[ajaxnum],'',1);}}});
</script>