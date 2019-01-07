-- phpMyAdmin SQL Dump
-- version 2.11.5.1
-- http://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 16-03-10 14:30 
-- 서버 버전: 5.1.45
-- PHP 버전: 5.2.9p2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 데이터베이스: `ganadadc`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board_info`
--

CREATE TABLE IF NOT EXISTS `board_info` (
  `no` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bbs_id` varchar(20) NOT NULL DEFAULT '',
  `bbs_name` varchar(20) NOT NULL DEFAULT '',
  `skin_name` varchar(20) NOT NULL DEFAULT '',
  `list_grade` int(1) NOT NULL DEFAULT '0',
  `view_grade` int(1) NOT NULL DEFAULT '0',
  `write_grade` int(1) NOT NULL DEFAULT '0',
  `reply_grade` int(1) NOT NULL DEFAULT '0',
  `comment_grade` int(1) NOT NULL DEFAULT '0',
  `file_use` int(1) unsigned NOT NULL DEFAULT '2',
  `file_cnt` int(1) unsigned NOT NULL DEFAULT '1',
  `comment` int(1) unsigned NOT NULL DEFAULT '2',
  `reply` int(1) unsigned NOT NULL DEFAULT '2',
  `list_page_view` int(2) unsigned NOT NULL DEFAULT '10',
  `point` int(11) DEFAULT '0',
  `state` int(1) DEFAULT '0',
  `secret` int(1) NOT NULL DEFAULT '2',
  `ca_name` varchar(100) NOT NULL,
  `ca_title` varchar(20) NOT NULL,
  `regdate` datetime DEFAULT '0000-00-00 00:00:00',
  `extra1` varchar(50) NOT NULL DEFAULT '',
  `extra2` varchar(50) NOT NULL DEFAULT '',
  `extra3` varchar(50) NOT NULL DEFAULT '',
  `extra4` varchar(50) NOT NULL DEFAULT '',
  `extra5` varchar(50) NOT NULL DEFAULT '',
  `header_inc` varchar(100) NOT NULL,
  `footer_inc` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`no`),
  KEY `bbs_id` (`bbs_id`),
  KEY `bbs_name` (`bbs_name`),
  KEY `state` (`state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board_info`
--


-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `no` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(20) NOT NULL DEFAULT '',
  `pwd` varchar(100) NOT NULL,
  `nickname` varchar(20) DEFAULT '',
  `phone` varchar(12) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `model` varchar(50) NOT NULL DEFAULT '',
  `level` int(2) unsigned NOT NULL DEFAULT '1',
  `connect_cnt` int(11) DEFAULT '0',
  `last_connect` datetime DEFAULT '0000-00-00 00:00:00',
  `regdate` datetime DEFAULT '0000-00-00 00:00:00',
  `memo` text,
  `token` varchar(255) NOT NULL DEFAULT '',
  `point` int(11) DEFAULT '0',
  `state` int(1) DEFAULT '0',
  `push_alram` enum('Y','N') DEFAULT 'Y',
  `mail_agree` smallint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`no`),
  KEY `id` (`id`),
  KEY `nickname` (`nickname`),
  KEY `phone` (`phone`),
  KEY `email` (`email`),
  KEY `level` (`level`),
  KEY `state` (`state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`no`, `id`, `pwd`, `nickname`, `phone`, `name`, `email`, `model`, `level`, `connect_cnt`, `last_connect`, `regdate`, `memo`, `token`, `point`, `state`, `push_alram`, `mail_agree`) VALUES
(1, 'admin', '*8DCDD69CE7D121DE8013062AEAEB2A148910D50E', '최고관리자', '', '관리자', 'test@naver.com', '', 10, 0, '2016-03-10 13:41:51', '2016-02-26 12:07:43', NULL, '', 0, 0, 'Y', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `popup`
--

CREATE TABLE IF NOT EXISTS `popup` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `level` int(2) NOT NULL DEFAULT '10',
  `type` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'new_win',
  `popup_left` int(2) DEFAULT NULL,
  `popup_top` int(2) DEFAULT NULL,
  `center` char(1) NOT NULL DEFAULT 'Y',
  `width` int(5) NOT NULL DEFAULT '300',
  `height` int(5) NOT NULL DEFAULT '400',
  `menubar` char(1) NOT NULL DEFAULT 'N',
  `toolbar` char(1) NOT NULL DEFAULT 'N',
  `resizable` char(1) NOT NULL DEFAULT 'N',
  `scrollbars` char(1) NOT NULL DEFAULT 'N',
  `status` char(1) NOT NULL DEFAULT 'N',
  `check_input` varchar(10) DEFAULT NULL,
  `content` text,
  `back_ground` varchar(50) DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `gigan` int(2) NOT NULL DEFAULT '1',
  `check_use` char(1) NOT NULL DEFAULT 'Y',
  `check_html` char(1) DEFAULT NULL,
  `check_line` char(1) DEFAULT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `opt5` varchar(255) NOT NULL,
  `reg_date` date NOT NULL DEFAULT '0000-00-00',
  `view_page` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `popup`
--
