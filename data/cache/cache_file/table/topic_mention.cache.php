<?php if(!defined('IN_JISHIGOU')) { exit('invalid request'); } 
$cache = array (
  'key' => 'table/topic_mention',
  'dateline' => 1418268385,
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
          'Type' => 'int(10) unsigned',
          'Key' => 'PRI',
          'Extra' => 'auto_increment',
        ),
        'uid' => 
        array (
          'Type' => 'mediumint(8) unsigned',
          'Key' => 'MUL',
        ),
        'tid' => 
        array (
          'Type' => 'int(10) unsigned',
          'Key' => 'MUL',
        ),
        'tuid' => 
        array (
          'Type' => 'mediumint(8) unsigned',
          'Key' => 'MUL',
        ),
        'dateline' => 
        array (
          'Type' => 'int(10) unsigned',
          'Key' => 'MUL',
        ),
      ),
    ),
  ),
);
?>