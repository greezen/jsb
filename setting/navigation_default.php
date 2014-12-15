<?php
 /* save by 1 127.0.0.1 2013-11-19 11:25:01 */

 $config['navigation_default'] = array (
  'index' =>
  array (
    'name' => '交流分享',
    'value' => 'index',
    'order' => '9',
    'enable' => 1,
    'display_in_top' => NULL,
    'display_in_side' => NULL,
    'target' => '_parent',
    'icon' => './images/icon/index.jpg',
    'url' => 'index.php?mod=topic&code=topicnew&orderby=post',
    'system' => 1,
    'list' =>
    array (
      'my' =>
      array (
        'name' => '我的',
        'value' => 'my',
        'order' => '90',
        'enable' => 1,
        'display_in_top' => '1',
        'display_in_side' => NULL,
        'target' => '_parent',
        'icon' => '',
        'url' => 'index.php?mod=topic&code=myhome',
        'system' => 1,
        'list' =>
        array (
          'my_home' =>
          array (
            'name' => '我的首页',
            'value' => 'my_home',
            'order' => '900',
            'enable' => 1,
            'display_in_top' => '1',
            'display_in_side' => '1',
            'target' => '_parent',
            'icon' => './images/icon/index_my_my_home.jpg',
            'url' => 'index.php?mod=topic&code=myhome',
            'system' => 1,
          ),
          'comment_my' =>
          array (
            'name' => '评论我的',
            'value' => 'comment_my',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '700',
            'url' => 'index.php?mod=comment&code=inbox',
            'target' => '_parent',
            'system' => '1',
            'icon' => './images/icon/index_my_comment_my.jpg',
          ),
          'my_pm' =>
          array (
            'name' => '我的私信',
            'value' => 'my_pm',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '500',
            'url' => 'index.php?mod=pm&code=list',
            'target' => '_parent',
            'system' => '1',
            'icon' => './images/icon/index_my_my_pm.jpg',
          ),
          'at_my' =>
          array (
            'name' => '@提到我',
            'value' => 'at_my',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '300',
            'url' => 'index.php?mod=at',
            'target' => '_parent',
            'system' => '1',
            'icon' => './images/icon/index_my_at_my.jpg',
          ),
          'my_qun' =>
          array (
            'name' => '我的微群',
            'value' => 'my_qun',
            'order' => '200',
            'enable' => 1,
            'display_in_top' => '1',
            'display_in_side' => '1',
            'target' => '_parent',
            'icon' => './images/icon/index_my_my_qun.jpg',
            'url' => 'index.php?mod=topic&code=qun',
            'system' => 1,
          ),
          'my_favorite' =>
          array (
            'name' => '我的收藏',
            'value' => 'my_favorite',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '0',
            'order' => '100',
            'url' => 'index.php?mod=topic_favorite',
            'target' => '_parent',
            'system' => '1',
            'icon' => './images/icon/index_my_my_favorite.jpg',
          ),
          'my_tag_topic' =>
          array (
            'name' => '我的话题',
            'value' => 'my_tag_topic',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '0',
            'order' => '100',
            'url' => 'index.php?mod=topic_tag',
            'target' => '_parent',
            'system' => '1',
            'icon' => './images/icon/index_my_my_tag_topic.jpg',
          ),
          'my_index' =>
          array (
            'name' => '个人主页',
            'value' => 'my_index',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '0',
            'order' => '100',
            'url' => 'index.php?mod=topic&code=myblog',
            'target' => '_parent',
            'system' => '1',
            'icon' => './images/icon/index_my_my_index.jpg',
          ),
          'favorite_my' =>
          array (
            'name' => '收藏我的',
            'value' => 'favorite_my',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '0',
            'order' => '0',
            'url' => 'index.php?mod=topic_favorite&code=me',
            'target' => '_parent',
            'system' => '1',
            'icon' => './images/icon/index_my_favorite_my.jpg',
          ),
          'dig_my' =>
          array (
            'name' => '赞我的',
            'value' => 'dig_my',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '0',
            'order' => '0',
            'url' => 'index.php?mod=topic&code=myblog&type=mydig',
            'target' => '_parent',
            'system' => '1',
            'icon' => './images/icon/index_my_dig_my.jpg',
          ),
          'my_album' =>
          array (
            'name' => '我的相册',
            'value' => 'my_album',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '0',
            'order' => '0',
            'url' => 'index.php?mod=album',
            'target' => '_parent',
            'system' => '1',
          ),
        ),
      ),
      'channel' =>
      array (
        'name' => '频道',
        'value' => 'channel',
        'enable' => '1',
        'display_in_top' => '1',
        'display_in_side' => NULL,
        'order' => '70',
        'url' => 'index.php?mod=channel',
        'target' => '_parent',
        'system' => '1',
      ),
      'kankan' =>
      array (
        'name' => '随便看看',
        'value' => 'kankan',
        'enable' => '1',
        'display_in_top' => '1',
        'display_in_side' => NULL,
        'order' => '50',
        'url' => 'index.php?mod=plaza',
        'target' => '_parent',
        'system' => '1',
        'list' =>
        array (
          'plaza' =>
          array (
            'name' => '广场',
            'value' => 'plaza',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '200',
            'url' => 'index.php?mod=plaza',
            'target' => '_parent',
            'system' => '1',
          ),
          'plaza_new_pic' =>
          array (
            'name' => '图片墙',
            'value' => 'plaza_new_pic',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '100',
            'url' => 'index.php?mod=plaza&code=new_pic',
            'target' => '_parent',
            'system' => '1',
          ),
		  'cms' =>
          array (
            'name' => '资讯',
            'value' => 'cms',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '50',
            'url' => 'index.php?mod=cms',
            'target' => '_parent',
            'system' => '1',
          ),
        ),
      ),
    ),
  ),
  'mall' =>
  array (
    'name' => '积分商城',
    'value' => 'mall',
    'order' => '7',
    'enable' => 1,
    'display_in_top' => NULL,
    'display_in_side' => NULL,
    'target' => '_parent',
    'icon' => './images/icon/mall.jpg',
    'url' => 'index.php?mod=mall',
    'system' => 1,
  ),
  'app' =>
  array (
    'name' => '应用',
    'value' => 'app',
    'enable' => 1,
    'order' => '5',
    'url' => 'index.php?mod=qun',
    'target' => '_parent',
    'system' => '1',
    'list' =>
    array (
      'app_interact' =>
      array (
        'name' => '互动',
        'value' => 'app_interact',
        'enable' => 1,
        'display_in_top' => '1',
        'order' => '5',
        'url' => '',
        'target' => '_parent',
        'system' => '1',
        'list' =>
        array (
          'qun' =>
          array (
            'name' => '微群',
            'value' => 'qun',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '70',
            'url' => 'index.php?mod=qun',
            'target' => '_parent',
            'system' => '1',
          ),
          'vote' =>
          array (
            'name' => '投票',
            'value' => 'vote',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '40',
            'url' => 'index.php?mod=vote',
            'target' => '_parent',
            'system' => '1',
          ),
          'event' =>
          array (
            'name' => '活动',
            'value' => 'event',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '30',
            'url' => 'index.php?mod=event',
            'target' => '_parent',
            'system' => '1',
          ),
          'live' =>
          array (
            'name' => '微直播',
            'value' => 'live',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '20',
            'url' => 'index.php?mod=live',
            'target' => '_parent',
            'system' => '1',
          ),
          'talk' =>
          array (
            'name' => '微访谈',
            'value' => 'talk',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '10',
            'url' => 'index.php?mod=talk',
            'target' => '_parent',
            'system' => '1',
          ),
          'reward' =>
          array (
            'name' => '有奖转发',
            'value' => 'reward',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '0',
            'url' => 'index.php?mod=reward',
            'target' => '_parent',
            'system' => '1',
          ),
        ),
      ),
      'app_tools' =>
      array (
        'name' => '工具',
        'value' => 'app_tools',
        'enable' => 1,
        'display_in_top' => '1',
        'order' => '3',
        'url' => '',
        'target' => '_parent',
        'system' => '1',
        'list' =>
        array (
          'attach' =>
          array (
            'name' => '附件文档',
            'value' => 'attach',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '90',
            'url' => 'index.php?mod=attach&code=new',
            'target' => '_parent',
            'system' => '1',
          ),
          'medal' =>
          array (
            'name' => '勋章',
            'value' => 'medal',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '70',
            'url' => 'index.php?mod=other&code=medal',
            'target' => '_parent',
            'system' => '1',
          ),
          'wall' =>
          array (
            'name' => '上墙',
            'value' => 'wall',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '50',
            'url' => 'index.php?mod=wall&code=control',
            'target' => '_parent',
            'system' => '1',
          ),
          'qmd' =>
          array (
            'name' => '图片签名档',
            'value' => 'qmd',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '30',
            'url' => 'index.php?mod=tools&code=qmd',
            'target' => '_parent',
            'system' => '1',
          ),
          'weibo_show' =>
          array (
            'name' => '微博秀',
            'value' => 'weibo_show',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '10',
            'url' => 'index.php?mod=show&code=show',
            'target' => '_parent',
            'system' => '1',
          ),
        ),
      ),
    ),
  ),
  'profile' =>
  array (
    'name' => '找人',
    'value' => 'profile',
    'enable' => 1,
    'order' => '3',
    'url' => 'index.php?mod=profile&code=search',
    'target' => '_parent',
    'system' => '1',
    'list' =>
    array (
      'relation' =>
      array (
        'name' => '关系',
        'value' => 'relation',
        'enable' => '1',
        'display_in_top' => '1',
        'display_in_side' => NULL,
        'order' => '90',
        'url' => '',
        'target' => '_parent',
        'system' => '1',
        'list' =>
        array (
          'my_follow' =>
          array (
            'name' => '关注的人',
            'value' => 'my_follow',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '900',
            'url' => 'index.php?mod=follow',
            'target' => '_parent',
            'system' => '1',
          ),
          'my_fans' =>
          array (
            'name' => '我的粉丝',
            'value' => 'my_fans',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '700',
            'url' => 'index.php?mod=fans',
            'target' => '_parent',
            'system' => '1',
          ),
          'my_blacklist' =>
          array (
            'name' => '黑名单',
            'value' => 'my_blacklist',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '500',
            'url' => 'index.php?mod=blacklist',
            'target' => '_parent',
            'system' => '1',
          ),
        ),
      ),
      'find' =>
      array (
        'name' => '发现',
        'value' => 'find',
        'enable' => '1',
        'display_in_top' => '1',
        'display_in_side' => NULL,
        'order' => '70',
        'url' => '',
        'target' => '_parent',
        'system' => '1',
        'list' =>
        array (
          'samecity' =>
          array (
            'name' => '同城用户',
            'value' => 'samecity',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '90',
            'url' => 'index.php?mod=profile&code=search',
            'target' => '_parent',
            'system' => '1',
          ),
          'maybe_friend' =>
          array (
            'name' => '同兴趣',
            'value' => 'maybe_friend',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '70',
            'url' => 'index.php?mod=profile&code=maybe_friend',
            'target' => '_parent',
            'system' => '1',
          ),
          'usertag' =>
          array (
            'name' => '同类人',
            'value' => 'usertag',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '50',
            'url' => 'index.php?mod=profile&code=usertag',
            'target' => '_parent',
            'system' => '1',
          ),
          'profile_role' =>
          array (
            'name' => '同分组',
            'value' => 'profile_role',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '40',
            'url' => 'index.php?mod=profile&code=role',
            'target' => '_parent',
            'system' => '1',
          ),
          'invite' =>
          array (
            'name' => '邀请好友',
            'value' => 'invite',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '30',
            'url' => 'index.php?mod=profile&code=invite',
            'target' => '_parent',
            'system' => '1',
          ),
        ),
      ),
      'recommend' =>
      array (
        'name' => '推荐',
        'value' => 'recommend',
        'enable' => '1',
        'display_in_top' => '1',
        'display_in_side' => NULL,
        'order' => '50',
        'url' => '',
        'target' => '_parent',
        'system' => '1',
        'list' =>
        array (
          'top_member' =>
          array (
            'name' => '达人榜',
            'value' => 'top_member',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '900',
            'url' => 'index.php?mod=top&code=member',
            'target' => '_parent',
            'system' => '1',
          ),
          'recommend_member' =>
          array (
            'name' => '推荐用户',
            'value' => 'recommend_member',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '700',
            'url' => 'index.php?mod=other&code=media',
            'target' => '_parent',
            'system' => '1',
          ),
          'recommend_people' =>
          array (
            'name' => '名人堂',
            'value' => 'recommend_people',
            'enable' => '1',
            'display_in_top' => '1',
            'display_in_side' => '1',
            'order' => '500',
            'url' => 'index.php?mod=people',
            'target' => '_parent',
            'system' => '1',
          ),
        ),
      ),
    ),
  ),
);
?>