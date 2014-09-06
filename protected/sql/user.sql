/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306-appserv
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : hdc

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2014-09-06 07:44:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) default NULL,
  `fullname` varchar(255) default NULL,
  `officeid` varchar(255) default NULL,
  `role` enum('admin','user') default NULL,
  `lastlogin` varchar(255) default NULL,
  `countlogin` int(11) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('sa', 'sa', 'ADMINISTRATOR', '54000', 'admin', '2014-09-05 04:07:20', '4');
INSERT INTO `user` VALUES ('user', 'user', 'USER', '54001', 'user', '2014-09-04 10:53:49', '2');
INSERT INTO `user` VALUES ('admin', '1234', 'ADMIN', null, 'admin', '2014-09-06 07:10:26', '3');
INSERT INTO `user` VALUES ('root', 'root', 'ROOT', '', 'user', '', null);
