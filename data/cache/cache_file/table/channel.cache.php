<?php if(!defined('IN_JISHIGOU')) { exit('invalid request'); } 
$cache = array (
  'key' => 'table/channel',
  'dateline' => 1427180973,
  'val' => 
  array (
    'life' => 2592000,
    'data' => 
    array (
      'pri' => 'ch_id',
      'field' => 
      array (
        'ch_id' => 
        array (
          'Type' => 'smallint(6) unsigned',
          'Key' => 'PRI',
          'Extra' => 'auto_increment',
        ),
        'ch_name' => 
        array (
          'Type' => 'char(15)',
        ),
        'feed' => 
        array (
          'Type' => 'tinyint(1)',
        ),
        'recommend' => 
        array (
          'Type' => 'tinyint(1)',
        ),
        'topic_num' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'total_topic_num' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'parent_id' => 
        array (
          'Type' => 'smallint(6) unsigned',
        ),
        'description' => 
        array (
          'Type' => 'text',
        ),
        'purview' => 
        array (
          'Type' => 'text',
        ),
        'purpostview' => 
        array (
          'Type' => 'text',
        ),
        'verify' => 
        array (
          'Type' => 'tinyint(1)',
        ),
        'filter' => 
        array (
          'Type' => 'text',
        ),
        'display_order' => 
        array (
          'Type' => 'smallint(6) unsigned',
        ),
        'display_list' => 
        array (
          'Type' => 'varchar(4)',
        ),
        'display_view' => 
        array (
          'Type' => 'varchar(4)',
        ),
        'in_home' => 
        array (
          'Type' => 'tinyint(1) unsigned',
        ),
        'picture' => 
        array (
          'Type' => 'char(200)',
        ),
        'buddy_numbers' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'manageid' => 
        array (
          'Type' => 'char(200)',
        ),
        'managename' => 
        array (
          'Type' => 'char(250)',
        ),
        'template' => 
        array (
          'Type' => 'char(50)',
        ),
        'channel_typeid' => 
        array (
          'Type' => 'smallint(4)',
        ),
        'topictype' => 
        array (
          'Type' => 'tinyint(1)',
        ),
      ),
    ),
  ),
);
?>