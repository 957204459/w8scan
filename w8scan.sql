/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : w8scan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-02 23:26:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for w8scan_tasklist
-- ----------------------------
DROP TABLE IF EXISTS `w8scan_tasklist`;
CREATE TABLE `w8scan_tasklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `addtime` int(20) NOT NULL,
  `descript` varchar(500) NOT NULL,
  `spider_plugins` varchar(500) NOT NULL,
  `plugins` varchar(500) NOT NULL,
  `token` varchar(32) NOT NULL,
  `result` text NOT NULL,
  `uid` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w8scan_tasklist
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;


/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : w8scan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-02 23:27:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for w8scan_user
-- ----------------------------
DROP TABLE IF EXISTS `w8scan_user`;
CREATE TABLE `w8scan_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `vip` int(2) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w8scan_user
-- ----------------------------
INSERT INTO `w8scan_user` VALUES ('1', 'admin', 'admin', '0', '0');
INSERT INTO `w8scan_user` VALUES ('2', '123456', '123456', '0', '123456');
SET FOREIGN_KEY_CHECKS=1;

