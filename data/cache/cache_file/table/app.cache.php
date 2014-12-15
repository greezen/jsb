<?php if(!defined('IN_JISHIGOU')) { exit('invalid request'); } 
$cache = array (
  'key' => 'table/app',
  'dateline' => 1418289411,
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
        'username' => 
        array (
          'Type' => 'char(15)',
        ),
        'app_name' => 
        array (
          'Type' => 'char(100)',
        ),
        'source_url' => 
        array (
          'Type' => 'char(255)',
        ),
        'show_from' => 
        array (
          'Type' => 'tinyint(1)',
        ),
        'app_desc' => 
        array (
          'Type' => 'text',
        ),
        'app_key' => 
        array (
          'Type' => 'char(32)',
          'Key' => 'MUL',
        ),
        'app_secret' => 
        array (
          'Type' => 'char(32)',
        ),
        'allows_ip' => 
        array (
          'Type' => 'text',
        ),
        'status' => 
        array (
          'Type' => 'tinyint(1)',
        ),
        'request_times' => 
        array (
          'Type' => 'bigint(20) unsigned',
        ),
        'request_times_day' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'request_times_last_day' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'request_times_week' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'request_times_last_week' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'request_times_month' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'request_times_last_month' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'request_times_year' => 
        array (
          'Type' => 'bigint(20) unsigned',
        ),
        'request_times_last_year' => 
        array (
          'Type' => 'bigint(20) unsigned',
        ),
        'last_request_time' => 
        array (
          'Type' => 'int(10) unsigned',
        ),
        'redirect_uri' => 
        array (
          'Type' => 'char(255)',
        ),
        'create_time' => 
        array (
          'Type' => 'int(11) unsigned',
        ),
      ),
    ),
  ),
);
?>