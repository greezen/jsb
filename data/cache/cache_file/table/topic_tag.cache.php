<?php if(!defined('IN_JISHIGOU')) { exit('invalid request'); } 
$cache = array (
  'key' => 'table/topic_tag',
  'dateline' => 1418266476,
  'val' => 
  array (
    'life' => 2592000,
    'data' => 
    array (
      'pri' => 'item_id',
      'field' => 
      array (
        'item_id' => 
        array (
          'Type' => 'mediumint(8) unsigned',
          'Key' => 'PRI',
        ),
        'tag_id' => 
        array (
          'Type' => 'mediumint(8) unsigned',
          'Key' => 'PRI',
        ),
        'dateline' => 
        array (
          'Type' => 'int(10) unsigned',
          'Key' => 'MUL',
        ),
        'count' => 
        array (
          'Type' => 'mediumint(6)',
        ),
      ),
    ),
  ),
);
?>