-- phpMyAdmin SQL Dump
-- version 2.7.0-pl2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost:3306
-- 生成日期: 2009 年 04 月 20 日 00:53
-- 服务器版本: 6.0.6
-- PHP 版本: 5.2.6
-- 
-- 数据库: `jdtp`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_admin`
-- 

CREATE TABLE `tb_admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `adminPwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `tb_admin`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `tb_jd`
-- 

CREATE TABLE `tb_jd` (
  `id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `note` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `describe` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `num` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- 
-- 导出表中的数据 `tb_jd`
-- 