<?php if(!defined('IN_JISHIGOU')) { exit('invalid request'); } 
$cache = array (
  'key' => 'table/tag_favorite',
  'dateline' => 1418266476,
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
        'tag' => 
        array (
          'Type' => 'char(64)',
          'Key' => 'MUL',
        ),
        'uid' => 
        array (
          'Type' => 'mediumint(8) unsigned',
          'Key' => 'MUL',
        ),
        'dateline' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
      ),
    ),
  ),
);
?>