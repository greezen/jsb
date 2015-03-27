<?php $config['rewrite'] = array (
  'abs_path' => '/',
  'arg_separator' => '/',
  'gateway' => 'index.php/',
  'mode' => 'apache_path',
  'prepend_var_list' => 
  array (
    0 => 'mod',
    1 => 'code',
  ),
  'value_replace_list' => 
  array (
    'mod' => 
    array (
      'topic' => 'miniblog',
      'tag' => 'keywords',
      'profile' => 'profiles',
      'member' => 'users',
      'plugin' => 'extends',
    ),
  ),
  'var_replace_list' => 
  array (
    'mod' => 
    array (
    ),
  ),
  'var_separator' => '-',
); ?>