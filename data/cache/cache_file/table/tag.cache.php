<?php if(!defined('IN_JISHIGOU')) { exit('invalid request'); } 
$cache = array (
  'key' => 'table/tag',
  'dateline' => 1418214691,
  'val' => 
  array (
    'life' => 2592000,
    'data' => 
    array (
      'pri' => 'id',
      'field' => 
      array (
        'id' => 
        array (
          'Type' => 'mediumint(8) unsigned',
          'Key' => 'PRI',
          'Extra' => 'auto_increment',
        ),
        'name' => 
        array (
          'Type' => 'char(30)',
          'Key' => 'UNI',
        ),
        'user_id' => 
        array (
          'Type' => 'mediumint(8) unsigned',
          'Key' => 'MUL',
        ),
        'username' => 
        array (
          'Type' => 'char(15)',
        ),
        'dateline' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'last_post' => 
        array (
          'Type' => 'int(10) unsigned',
          'Key' => 'MUL',
        ),
        'total_count' => 
        array (
          'Type' => 'int(10) unsigned',
          'Key' => 'MUL',
        ),
        'user_count' => 
        array (
          'Type' => 'mediumint(8) unsigned',
        ),
        'topic_count' => 
        array (
          'Type' => 'mediumint(8) unsigned',
        ),
        'tag_count' => 
        array (
          'Type' => 'mediumint(8)',
        ),
        'status' => 
        array (
          'Type' => 'tinyint(1)',
        ),
        'extra' => 
        array (
          'Type' => 'tinyint(1)',
        ),
      ),
    ),
  ),
);
?>