<?php
if(!defined('IN_JISHIGOU')) {
    exit('invalid request');
}
$sql = <<<EOF

DROP TABLE IF EXISTS {jishigou}channel_buy_contact;
CREATE TABLE `jishigou_channel_buy_contact` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `company` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `tel` char(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `wx` varchar(64) NOT NULL,
  `qq` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `other` varchar(512) NOT NULL DEFAULT '',
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='记录提交过购买频道用户的联系方式'
		
DROP TABLE IF EXISTS {jishigou}channel_buy_record;
CREATE TABLE `jishigou_channel_buy_record` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_id` int(11) NOT NULL DEFAULT '0' COMMENT '频道ID',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `fid` int(11) NOT NULL DEFAULT '0' COMMENT '频道费率ID(channel_fee)',
  `ch_name` varchar(128) NOT NULL DEFAULT '' COMMENT '频道名称',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '频道价格',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '费率说明',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '申请时间',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '服务开始时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '服务结束时间',
  `state` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态(0=>审核中,1=>已通过,2=>未通过)',
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
		
DROP TABLE IF EXISTS {jishigou}channel_fee;
CREATE TABLE `jishigou_channel_fee` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `ch_id` int(11) NOT NULL DEFAULT '0' COMMENT '频道ID',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '服务标题',
  `duration` int(11) NOT NULL DEFAULT '0' COMMENT '服务时长',
  `give` int(11) NOT NULL DEFAULT '0' COMMENT '赠送时长',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `ad1` varchar(128) NOT NULL DEFAULT '' COMMENT '广告语1',
  `ad2` varchar(128) NOT NULL DEFAULT '' COMMENT '广告语2',
  `is_check` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否为推荐服务()0=>否,1=>是)',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
		
DROP TABLE IF EXISTS {jishigou}order_contact;
CREATE TABLE `jishigou_order_contact` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` char(16) NOT NULL DEFAULT '' COMMENT '电话',
  `tel` char(16) NOT NULL DEFAULT '' COMMENT '手机',
  `wx` varchar(64) NOT NULL DEFAULT '' COMMENT '微信',
  `qq` varchar(32) NOT NULL DEFAULT '' COMMENT 'qq',
  `email` varchar(128) NOT NULL DEFAULT '' COMMENT '邮箱',
  `site` varchar(256) NOT NULL DEFAULT '' COMMENT '网址',
  `address` varchar(256) NOT NULL DEFAULT '' COMMENT '地址',
  `other` varchar(1024) NOT NULL DEFAULT '' COMMENT '其他',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '订单/微博ID(topic表中的ID)',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `level` tinyint(255) NOT NULL DEFAULT '0' COMMENT '信息可查看的级别(1=>授权查看,2=>会员查看,3=>游客查看)',
  PRIMARY KEY (`ct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8

DROP TABLE IF EXISTS {jishigou}order_contact_power;
EOF;
?>