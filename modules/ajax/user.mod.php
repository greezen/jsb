<?php


/**
 * ModuleObject
 *
 * @package www.jishigou.com
 * @author 狐狸<foxis@qq.com>
 * @copyright 2010
 * @version $Id: user.mod.php 5469 2014-01-18 08:43:43Z yupengfei $
 * @access public
 */
if(!defined('IN_JISHIGOU'))
{
	exit('invalid request');
}

class ModuleObject extends MasterObject
{

	function ModuleObject($config)
	{
		$this->MasterObject($config);




		$this->TopicLogic = jlogic('topic');

		$this->CacheConfig = jconf::get('cache');
		$this->ShowConfig = jconf::get('show');

		$this->Execute();
	}

	
	function Execute()
	{
		switch ($this->Code)
		{
			case 'update_avatar':
				$this->UpdateAvatar();
				break;

			case 'myfavoritetags':
				$this->MyFavoriteTags();
				break;

			case 'user_tag':
				$this->UserTag();
				break;

			case 'to_user_tag':
				$this->ToUserTag();
				break;

			case 'refresh':
				$this->Refresh();
				break;
            case 'refreshOne':
                $this->RefreshOne();
                break;

			case 'hot_tag':
				$this->HotTag();
				break;

			case 'modify_user_three_tol':
				$this->Modify_User_Three_Tol();
				break;

			case 'recommend_user':
				$this->Recommend_user();
				break;

			case 'user_follow':
				$this->User_Follow();
				break;


			case 'to_user_event':
				$this->To_User_Event();
				break;

							case 'hotweiqun':
				$this->HotWeiQun();
				break;

							case 'city_qun':
				$this->City_Qun();
				break;

							case 'my_follow_qun':
				$this->My_Follow_Qun();
				break;

							case 'qun_category':
				$this->Qun_Category();
				break;

							case 'hot_follow_tag':
				$this->Hot_Follow_Tag();
				break;

											case 'common_interest':
				$this->getCommonInterestUser();
				break;
							case 'atmy_user':
				$this->atMyUser();
				break;
			        	case 'hot_comment':
        		$this->getHotComment();
        		break;
        	        	case 'comment_user':
        		$this->getCommentUser();
        		break;

			        	case 'hot_dig':
        		$this->getHotDig();
        		break;
        	        	case 'dig_user':
        		$this->getDigUser();
        		break;

							case 'leader':
			case 'manager':
				$this->Leadmanager();
				break;

							case 'department':
				$this->Department();
				break;
							case 'mycomment_user':
				$this->myCommentUser();
				break;
			case 'music_user':
				$this->getMusicUser();
				break;
							case 'hot_tag_top':
				$this->getHotTagTop();
				break;
			case 'photo':
				$this->getPhoto();
				break;
						case 'video_content':
				$this->getVideo();
				break;

						case 'buddys_create_vote':
						case 'buddys_joined_vote':
						case 'recd_vote':
				$this->getVoteList();
				break;
						case 'buddys_create_event':
						case 'buddys_joined_event':
						case 'recd_event':
				$this->getEventList();
				break;
			default:
				$this->Main();
		}
	}

	function Main()
	{
		response_text("正在建设中");
	}

	function UpdateAvatar() {
		if(MEMBER_ID > 0) {
			$m = jsg_member_info(MEMBER_ID);
			if($m && !$m['__face__'] && $m['ucuid']>0 && true===UCENTER && true===UCENTER_FACE) {
				include_once ROOT_PATH . 'api/uc_client/client.php';
				$r = uc_check_avatar($m['ucuid']);
				if($r) {
					DB::query("update ".TABLE_PREFIX."members set `face`='./images/noavatar.gif' where `uid`='{$m['uid']}'");
				}
			}
		}
		exit;
	}

	
	function UserTag()
	{
		$code = 'user_tag';

		$uid = max(0, (int) $this->Post['uid']);
		if($uid < 1) {
			exit;
		}

		$sql = "select * from `".TABLE_PREFIX."user_tag_fields` where  `uid` = '{$uid}'";
		$query = $this->DatabaseHandler->Query($sql);
		$myuser_tag = array();
		while (false != ($row = $query->GetRow()))
		{
			$myuser_tag[] = $row;
		}

		include(template("topic_right_user_ajax"));
	}

		function ToUserTag()
	{
		$code = 'to_user_tag';

		$uid = max(0, (int) $this->Post['uid']);
		if($uid < 1) {
			exit;
		}

		$sql = "select * from `".TABLE_PREFIX."user_tag_fields` where  `uid` = '{$uid}'";
		$query = $this->DatabaseHandler->Query($sql);
		$to_user_tag = array();
		while (false != ($row = $query->GetRow()))
		{
			$to_user_tag[] = $row;
		}


		include(template("topic_right_user_ajax"));
	}


	
	function MyFavoriteTags($limit=12)
	{
				$code = 'favorite_tag';

		$uid = max(0, (int) $this->Post['uid']);
		if($uid < 1) {
			exit;
		}
		$limit = (int) $limit;
		if($limit < 1) {
			exit;
		}

		$my_favorite_tags = jlogic('tag_favorite')->my_favorite($uid, $limit);

		include(template("topic_right_user_ajax"));

	}


	
	function HotTag() {
		$code = 'hot_tag';
		if($this->Config['hot_tag_recommend_enable']) {
			$hot_tag_recommend = jlogic('data_block')->hot_tag_recommend();
		}
		if($hot_tag_recommend['enable'] && $hot_tag_recommend['list']) {
			include(template("topic_right_user_ajax"));
		} else {
			echo "<script type='text/javascript'>";
			echo "$('#hot_tag_div').remove();";
			echo "</script>";
		}
	}

	
	function Recommend_user()
	{

		$code = 'recommend_user';

		$uid = jget('uid','int','P');

		$recommend_user_list = $this->_Recommenduser(10);


		include(template("topic_right_user_ajax"));
	}

	
	function Leadmanager()
	{
		$code = 'leadmanager';
		$id = jget('uid','int','P');
		$showtype = $this->Post['type'];
		$type = $this->Code;
		$leadmanager_list = array();
		if($id){
			$members = jlogic('cp')->get_manager_users($showtype,$type,$id);
		}
		if($members){
			$leadmanager_list = $this->TopicLogic->GetMember(array_keys($members), "`uid`,`ucuid`,`username`,`nickname`,`face`,`face_url`,`validate`,`validate_category`,`aboutme`");
			foreach($leadmanager_list as $key => $val){
				$leadmanager_list[$key]['here_name'] = $members[$key]['listname'];
				$isbuddy = jlogic('buddy')->info($key, MEMBER_ID);
				$leadmanager_list[$key]['follow_html'] = follow_html2($key,$isbuddy);
			}
			include(template("topic_right_user_ajax"));
		}else{
			response_text("空缺");
		}
	}

	
	function Department()
	{
		$code = 'department';
		$companyid = jget('uid','int','P');
		$departmentid = DB::result_first("SELECT departmentid FROM ".DB::table('members')." WHERE uid = '".MEMBER_ID."'");
		$CpLogic = jlogic('cp');
		$department_list = $CpLogic->Getdepartment($companyid,$departmentid);
		include(template("topic_right_user_ajax"));
	}

	

	function User_Follow()
	{
		$code = 'user_follow';

		$uid = max(0, (int) $this->Post['uid']);
		if($uid < 1) {
			exit;
		}

				$member = jsg_member_info($uid);
		if(!$member) {
			exit;
		}

		$user_follow_list = $this->_followList($uid,8);

		include(template("topic_right_user_ajax"));
	}


	
	function To_User_Event()
	{
		$code = 'to_user_event';

		$uid = max(0, (int) $this->Post['uid']);
		if($uid < 1) {
			exit;
		}

		

				$sql = "select `oid` ,`id`,`title`,`play` from `".TABLE_PREFIX."event_member` where  `fid` = '{$uid}' and `play` = 1 order by `play_time` desc limit 0,6";
		$query = $this->DatabaseHandler->Query($sql);
		$to_user_event = array();
		while (false != ($row = $query->GetRow()))
		{
			$to_user_event[] = $row;
		}

		include(template("topic_right_user_ajax"));
	}


	
	function Refresh($retry=0) {
		$code = 'refresh';
		include(template("topic_right_user_ajax"));
	}

    function RefreshOne(){
        $val = jlogic('data_block')->may_interest_user(FALSE,1);
		$code = 'refreshOne';
        if($val && $val['uid'] > 0){
            include(template("topic_right_user_ajax"));
        }
    }

	
	function Modify_User_Three_Tol()
	{
				$uid = max(0, (int) $this->Post['uid']);

				$list_uid = (int) $this->Post['list_uid'];

		$style_three_tol =  (int)$this->Post['style_three_tol'];
		$forceup = (1===$style_three_tol ? -1 : 1);

		$get_code = $this->Post['get_code'];

				$ajax_list = $this->Post['ajax_list'];

		$type = $this->Post['type'] ? $this->Post['type'] : '';

		if(empty($uid))
		{
			$this->Messager("请先登录或者注册一个帐号",'index.php?mod=login');
		}

		$this->DatabaseHandler->Query("update `" . TABLE_PREFIX . "members` set `style_three_tol`='{$forceup}' where `uid`='{$uid}'");

		$condition = "where `uid` ='{$list_uid}'  limit 0,1";


		$sql = "select `uid`,`medal_id`,`style_three_tol` from `".TABLE_PREFIX."members` where `uid`='{$uid}'  ";
		$query = $this->DatabaseHandler->Query($sql);
		$my_member_info = $query->GetRow();

																		
		$member = jsg_member_info($list_uid);

		
		

		$member_medal = $member ? $member : $my_member;


		$exp_return = user_exp($member_medal['level'],$member_medal['credits']);
		if($exp_return['exp_width'] >= 1){
			$exp_width = $exp_return['exp_width'];
		} else{
			$exp_width = 0;
		}
				$nex_exp_credit  = $exp_return['nex_exp_credit'];
				$nex_level  = $exp_return['nex_exp_level'];


				if ($member_medal['medal_id']) {
			$medal_list = $this->_Medal($member_medal['medal_id'],$member_medal['uid']);
		}

		$this->Code = $get_code;

	    if($ajax_list == 'right')
        {
        	include(template("topic_right_ajax.inc"));
        }
		else
		{
			jsg_setcookie('leftnav','block');
			include(template('topic_member_left.inc'));
		}

	}



	
	function HotWeiQun()
	{

		$code = 'hot_weiqun';
		$showConfig = jconf::get('show');
		$recd_qun_limit = (int) $showConfig['page_r']['recd_qun'];
				if($recd_qun_limit > 0) {
			$hot_qun = jlogic('qun')->get_hot_qun($recd_qun_limit);
		}

		if(!$recd_qun_limit || !$hot_qun){
			echo "<script type='text/javascript'>";
			echo "$('#recd_qun_div').remove();";
			echo "</script>";
		}else {
			include(template("topic_right_user_ajax"));
		}
	}

		function City_Qun()
	{
		$code = 'city_qun';

		$uid = MEMBER_ID;
		if($uid < 1)
		{
			return false;
		}
		global $_J;
		$city  = $_J['city'];

		$limit = 10;
		$cache_id = 'ajax/user/City_Qun-' . $city . '-' . $limit;
		if(false === ($city_qun = cache_file('get', $cache_id))) {
			$sql = "select * from `".TABLE_PREFIX."qun` where `city` = '{$member['city']}'  order by `lastactivity` desc limit $limit  ";
			$query = $this->DatabaseHandler->Query($sql);
			$city_qun = array();
			while (false != ($row = $query->GetRow()))
			{
				$city_qun[] = $row;
			}
			cache_file('set', $cache_id, $city_qun, 300);
		}

		if($city_qun){
			include(template("topic_right_user_ajax"));
		} else {
			echo "<script type='text/javascript'>";
			echo "$('#city_qun_div').remove();";
			echo "</script>";
		}
	}


		function My_Follow_Qun()
	{
		$code = 'my_follow_qun';

		$uid = MEMBER_ID;
		if($uid < 1)
		{
			return false;
		}
		Load::logic('qun');
		$this->QunLogic = new QunLogic();
		$qun_list = $this->QunLogic->get_qun_list(array('type' => 'followed', 'limit' => '3'));
		$follow_qun_list = $qun_list['list'];

		include(template("topic_right_user_ajax"));
	}


		function Qun_Category()
	{

		$code = 'qun_category';

		Load::logic('qun');
		$this->QunLogic = new QunLogic();
		$cat_ary = $this->QunLogic->get_category();
		if (!empty($cat_ary)) {
			$top_cat_ary = $cat_ary['first'];
					}

		include(template("topic_right_user_ajax"));
	}


		function Hot_Follow_Tag()
	{
		$code = 'hot_follow_tag';

				$limit = $this->ShowConfig['tag_index']['guanzhu'];
		$cache_id = "tag/tag_guanzu";
		if ($limit>0 && false === ($tag_guanzu = cache_file('get', $cache_id))) {
			$sql = "select `id`,`name`,`topic_count`,`tag_count` from `".TABLE_PREFIX."tag`  ORDER BY `tag_count` DESC LIMIT {$limit}";
			$query = $this->DatabaseHandler->Query($sql);
			$tag_guanzu = array();
			while (false != ($row = $query->GetRow()))
			{
				$tag_guanzu[$row['id']] = $row;
			}

			cache_file('set', $cache_id, $tag_guanzu, $this->CacheConfig['tag_index']['guanzhu']);
		}

		include(template("topic_right_user_ajax"));
	}


		function _followList($uid, $num=6) {
		$uid = max(0, (int) $uid);
		$num = max(0, (int) $num);

		$member_list = array();
		if($uid > 0 && $num > 0) {
						$p = array(
				'uid' => $uid,
				'result_count' => $num,
				'sql_order' => ' `dateline` DESC ',
			);
			$buddyids = get_buddyids($p);

			if($buddyids) {
				$member_list = $this->TopicLogic->GetMember($buddyids);
				if($member_list && $uid != MEMBER_ID) {
					$member_list = buddy_follow_html($member_list);
				}
			}
		}

		return $member_list;
	}

	
	function _get_buddy($uid)
	{
		return get_buddyids($uid);
	}

	
	function _check_login()
	{
		if (MEMBER_ID < 1) {
			json_error("你需要先登录才能继续本操作");
		}
	}

	function _Medal($medalid=0,$uid=0)
	{
		$uid = (is_numeric($uid) ? $uid : 0);

		$medal_list = array();

		if($uid > 0)
		{
			$sql = "select  U_MEDAL.dateline ,  MEDAL.medal_img , MEDAL.conditions , MEDAL.medal_name ,MEDAL.medal_depict ,MEDAL.id , U_MEDAL.* from `".TABLE_PREFIX."medal` MEDAL left join `".TABLE_PREFIX."user_medal` U_MEDAL on MEDAL.id=U_MEDAL.medalid where U_MEDAL.uid='{$uid}' and U_MEDAL.is_index = 1 and MEDAL.is_open = 1 ";

			$query = $this->DatabaseHandler->Query($sql);
			while (false != ($row = $query->GetRow()))
			{
				$row['dateline'] = date('m-d日 H:s ',$row['dateline']);
				$medal_list[$row['id']] = $row;
			}
		}

		return $medal_list;
	}

	function getCommonInterestUser(){
		$code = 'common_interest';
		$uid = MEMBER_ID;
		if($uid < 1){
			echo '登录可见';
		}
		Load::logic('tag');
		$TagLogic = new TagLogic('topic');

		$user_list = $TagLogic->getCommonInterestUser($uid,10);

		if($user_list){
			include(template("topic_right_user_ajax"));
		} else {
			echo "<script type='text/javascript'>";
			echo "$('#common_interest_div').remove()";
			echo "</script>";
		}
	}

	function atMyUser(){
		$code = 'at_me_user';
		$uid = MEMBER_ID;
		if($uid < 1){
			echo '登录可见';
		}
				$user_list = jtable('topic_mention')->hot_at_me($uid, 10);
		$user_list = buddy_follow_html($user_list);

		if($user_list){
			include(template("topic_right_user_ajax"));
		} else {
			echo "<script type='text/javascript'>";
			echo "$('#atmy_user_div').remove()";
			echo "</script>";
		}
	}

	
	function getHotComment(){
		$code = 'hot_comment';
		$uid = MEMBER_ID;
		if($uid < 1){
			echo '登录可见';
		}
				$time = TIMESTAMP;
		$time = $time - 7*24*3600;
		$topic_list = array();

		$cache_id = 'hotcomment-7days-top5';
		if(!($topic_list = cache_file('get', $cache_id))){
			$sql = "SELECT `tid`,`content`
					FROM `".TABLE_PREFIX."topic`
					WHERE `replys` > 0
					    AND `dateline` >= $time
					    AND `type` = 'first'
					ORDER BY `replys` DESC, `dateline` DESC
					LIMIT 5 ";
			$query = DB::query($sql);
			$i = 1;
			while ($rs = DB::fetch($query)){
				$rs['content'] = cut_str(strip_tags($rs['content']),20);
				$topic_list[$rs['tid']] = $rs;
			}

			cache_file('set', $cache_id, $topic_list, 36000);
		}

		$html = '<ul class="hot_reply_b">';
		if($topic_list){
			$i = 0;
			foreach ($topic_list as $rs) {
				$i++;
				$html .= "<li><b class='hrb_{$i}'>{$i}</b><a href='index.php?mod=topic&code={$rs[tid]}' title='点此查看详情' target='_blank'>{$rs['content']}</a></li>";
			}
		}
		$html .= '</ul>';
		echo $html;
	}

	
	function getHotDig(){
		$code = 'hot_dig';
		$uid = MEMBER_ID;
		if($uid < 1){
			echo '登录可见';
		}
				$time = TIMESTAMP;
		$time = $time - 7*24*3600;
		$topic_list = array();

		$cache_id = 'hotdig-7days-top5';
		if(!($topic_list = cache_file('get', $cache_id))){
			$sql = "SELECT `tid`,`content`
					FROM `".TABLE_PREFIX."topic`
					WHERE `digcounts` > 0
					    AND `dateline` >= $time
					    AND `type` = 'first'
					ORDER BY `digcounts` DESC, `dateline` DESC
					LIMIT 5 ";
			$query = DB::query($sql);
			$i = 1;
			while ($rs = DB::fetch($query)){
				$rs['content'] = cut_str(strip_tags($rs['content']),20);
				$topic_list[$rs['tid']] = $rs;
			}

			cache_file('set', $cache_id, $topic_list, 36000);
		}

		$html = '<ul class="hot_reply_b">';
		if($topic_list){
			$i = 0;
			foreach ($topic_list as $rs) {
				$i++;
				$html .= "<li><b class='hrb_{$i}'>{$i}</b><a href='index.php?mod=topic&code={$rs[tid]}' title='点此查看详情' target='_blank'>{$rs['content']}</a></li>";
			}
		}
		$html .= '</ul>';
		echo $html;
	}

	
	function getCommentUser(){
		$code = 'at_me_user';
		$uid = MEMBER_ID;
		if($uid < 1){
			echo '登录可见';
		}
		$user_list = $this->TopicLogic->getCommentUser($uid,10);
		$user_list = buddy_follow_html($user_list);

		if($user_list){
			include(template("topic_right_user_ajax"));
		} else {
			echo "<script type='text/javascript'>";
			echo "$('#comment_user_div').remove()";
			echo "</script>";
		}
	}

	
	function getDigUser(){
		$code = 'at_me_user';
		$uid = MEMBER_ID;
		if($uid < 1){
			echo '登录可见';
		}
		$user_list = $this->TopicLogic->getDigUser($uid,10);
		$user_list = buddy_follow_html($user_list);

		if($user_list){
			include(template("topic_right_user_ajax"));
		} else {
			echo "<script type='text/javascript'>";
			echo "$('#dig_user_div').remove()";
			echo "</script>";
		}
	}

	
	function myCommentUser(){
		$code = 'at_me_user';
		$uid = (int) get_param('uid');
		if($uid < 1){
			echo '登录可见';
		}
		$user_list = $this->TopicLogic->getMyCommentUser($uid,10);
		$user_list = buddy_follow_html($user_list);

			include(template("topic_right_user_ajax"));
	}

	
	function getMusicUser(){
		$code = 'at_me_user';

		$user_list = $this->TopicLogic->getMusicUser(10);
		$user_list = buddy_follow_html($user_list);
		include(template("topic_right_user_ajax"));
	}

	
	function getHotTagTop(){
		$code = 'hot_follow_tag';
				$limit = 10;
		$tag_guanzu = array();
		$time = strtotime("-7 day");
		$cache_id = 'hottagtop';
		if (!($tag_guanzu = cache_file('get', $cache_id))) {
			$sql = "SELECT COUNT(*) AS topic_count,t.`name`,t.`tag_count`,t.id
					FROM ".TABLE_PREFIX."topic_tag tt
					LEFT JOIN ".TABLE_PREFIX."tag t
					    ON t.id = tt.tag_id
					WHERE tt.dateline > '$time' and t.topic_count > 0
					GROUP BY tt.tag_id
					ORDER BY topic_count DESC
					LIMIT $limit ";
			$query = $this->DatabaseHandler->Query($sql);

			while (false != ($row = $query->GetRow()))
			{
				$tag_guanzu[$row['id']] = $row;
			}

			cache_file('set', $cache_id, $tag_guanzu, 36000);
		}

		if(!$tag_guanzu){
			echo "<script type='text/javascript'>";
			echo "$('#hot_tag_top').remove()";
			echo "</script>";
			exit();
		}

		include(template("topic_right_user_ajax"));
	}

	
	function getPhoto(){
		$code = 'photo';
		$uid = (int) get_param('uid');
		if($uid < 1){echo '登录可见';}
		$p = array(
			'limit' => 10,
			'uid' => $uid,
		);
		$photo_list = jlogic('topic_list')->get_photo_list($p);
		include(template("topic_right_user_ajax"));
	}

	
	function getVideo(){
		$code = 'video_list';
		$uid = (int) get_param('uid');
		if($uid < 1){echo '登录可见';}
		$buddys = get_buddyids($uid);
		if($buddys){
			$video_list = array();
			$sql = "select v.*,m.nickname,m.username from `".TABLE_PREFIX."topic_video` v
					left join `".TABLE_PREFIX."members` m on m.uid = v.uid
					where v.`uid` in (".jimplode($buddys).") order by v.`id` desc limit 5";
			$query = DB::query($sql);
			while ($rs = DB::fetch($query)){
				$video_list[$rs['id']] = $rs;
			}
			include(template("topic_right_user_ajax"));
		} else {
			echo '暂无相关内容';
		}
	}

	
	function getVoteList(){
		$uid = (int) get_param('uid');
		if($uid < 1){echo '登录可见';}
		$buddys = get_buddyids($uid);
		$limit = 10;
		switch($this->Code){
						case 'buddys_create_vote':
				if (!empty($buddys)) {
					$where_sql = " `uid` IN (".jimplode($buddys).") ";
				} else {
					$where_sql = ' 0 ';
				}
				break;
						case 'buddys_joined_vote':
				$vids = jlogic('vote')->get_joined($buddys);
				if (!empty($vids)) {
					$where_sql = " `vid` IN(".jimplode($vids).") ";
				} else {
					$where_sql = ' 0 ';
				}
				break;
						case 'recd_vote':
				$where_sql = ' recd = 1 ';
				break;
		}
		$order_sql = ' lastvote DESC ';
		$where_sql .= ' AND verify = 1 ';
		$param = array(
			'where' => $where_sql,
			'order' => $order_sql,
			'limit' => $limit,
		);
		$vote_list = jlogic('vote')->get_list($param);
		$html = '';
		if($vote_list){
			foreach ($vote_list as $val) {
				$html .="<li>
							<span class='boxRl listyle'><a href='index.php?mod=vote&code=view&vid=$val[vid]' target='_blank'>$val[subject]</a></span>
							<span style='float:right;'>(共$val[voter_num]票)</span>
						</li>";
			}
		}

		echo ($html ? $html : '暂无相关内容');
	}

	function getEventList(){
		$uid = (int) get_param('uid');
		if($uid < 1){echo '登录可见';}
		$buddys = get_buddyids($uid);
		$limit = 10;
		switch($this->Code){
						case 'buddys_create_event':
				if (!empty($buddys)) {
					$param['where'] = " a.postman in (".jimplode($buddys).") and a.verify = 1 ";
					$param['order'] = " order by a.lasttime desc,a.app_num desc,a.posttime desc ";
					$param['limit'] = " LIMIT $limit ";
					$return = jlogic('event')->getEventinfo($param);
				}
				break;
						case 'buddys_joined_event':
				if (!empty($buddys)) {
					$param['where'] = " m.play = 1 and m.fid in (".jimplode($buddys).") ";
					$param['order'] = " order by a.lasttime desc,a.app_num desc,a.posttime desc ";
					$param['limit'] = " LIMIT $limit ";
					$return = jlogic('event')->getEvents($param);
				}
				break;
						case 'recd_event':
				$return['event_list'] = jlogic('event')->getHotEvent();
				break;
		}
		if($return['event_list']){
			foreach ($return['event_list'] as $val) {
				$html .="<li>
							<span class='boxRl listyle'><a href='index.php?mod=event&code=detail&id=$val[id]' target='_blank'>$val[title]</a></span>
							<span style='float:right;'>(共$val[app_num]人报名)</span>
						</li>";
			}
		}

		echo ($html ? $html : '暂无相关内容');
	}
}
?>
