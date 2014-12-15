<?php if(!defined('IN_JISHIGOU')) { exit('invalid request'); } 
$cache = array (
  'key' => 'table/qun_user',
  'dateline' => 1418266474,
  'val' => 
  array (
    'life' => 2592000,
    'data' => 
    array (
      'pri' => 'qid',
      'field' => 
      array (
        'qid' => 
        array (
          'Type' => 'int(10) unsigned',
          'Key' => 'PRI',
        ),
        'uid' => 
        array (
          'Type' => 'mediumint(8) unsigned',
          'Key' => 'PRI',
        ),
        'username' => 
        array (
          'Type' => 'char(15)',
        ),
        'level' => 
        array (
          'Type' => 'tinyint(3) unsigned',
        ),
        'join_time' => 
        array (
          'Type' => 'int(10) unsigned',
          'Key' => 'MUL',
        ),
        'lastupdate' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
      ),
    ),
  ),
);
?>