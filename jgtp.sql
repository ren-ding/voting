-- phpMyAdmin SQL Dump
-- version 2.7.0-pl2
-- http://www.phpmyadmin.net
-- 
-- ����: localhost:3306
-- ��������: 2009 �� 04 �� 20 �� 00:53
-- �������汾: 6.0.6
-- PHP �汾: 5.2.6
-- 
-- ���ݿ�: `jdtp`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `tb_admin`
-- 

CREATE TABLE `tb_admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `adminPwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

-- 
-- �������е����� `tb_admin`
-- 


-- --------------------------------------------------------

-- 
-- ��Ľṹ `tb_jd`
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
-- �������е����� `tb_jd`
-- 