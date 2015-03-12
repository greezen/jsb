<?php
if(!defined('IN_JISHIGOU')) {
    exit('invalid request');
}
$sql = <<<EOF
DROP TABLE IF EXISTS {jishigou}order_contact;
DROP TABLE IF EXISTS {jishigou}order_contact_power;
EOF;
?>