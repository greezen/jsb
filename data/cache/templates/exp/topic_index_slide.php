<?php /* 2015-03-27 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); hookscriptoutput(); ?>    
<?php if(in_array($this->Code,array('myhome','tag','qun','recd','other','bbs','cms','department','channel','topicnew', 'index', '')) || $this->Get['gid'] !=''||(defined('NEDU_MOYO') &&($this->Get['nedu']=='course'||$this->Code=='nedu'))) { ?> <div class="slide"> <script language="Javascript">
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
</script>