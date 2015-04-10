<?php
if(!defined('IN_JISHIGOU')) {
    exit('invalid request');
}
$sql = <<<EOF
DROP TABLE IF EXISTS {jishigou}order_contact_power;
DROP TABLE IF EXISTS {jishigou}channel_buy_contact;
DROP TABLE IF EXISTS {jishigou}channel_buy_record;
DROP TABLE IF EXISTS {jishigou}channel_fee;
DROP TABLE IF EXISTS {jishigou}order_contact;
DROP TABLE IF EXISTS {jishigou}publisher_contact;
EOF;
?>