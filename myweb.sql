-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-06-22 13:59:11
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '1',
  `isuse` tinyint(1) NOT NULL DEFAULT '0',
  `passwd` char(32) NOT NULL,
  `super` tinyint(1) NOT NULL DEFAULT '0',
  `ischeck` char(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `sex`, `isuse`, `passwd`, `super`, `ischeck`) VALUES
(3, '林佳俊1', '1234115@qq.com', 1, 0, 'ed466f48d82cf41787ac59bc80fe0333', 0, 'bf8875092bef3a0772e1a5849ce75dc9'),
(20, 'haha1', '1234567@qq.com', 1, 0, 'aaaakkkkkkaaaakkkkkkaaaakkkkkkaa', 0, 'aaaakkkkkkaaaakkkkkkaaaakkkkkkaa'),
(24, '林xiaotie2', '222a5a60@qq.com', 1, 0, 'aaaakkkkkkaaaakkkkkkaaaakkkkkkaa', 0, 'aaaakkkkkkaaaakkkkkkaaaakkkkkkaa'),
(28, 'asasasa2', 'asaasa@qq.com', 1, 0, '26f3808cdec7fb1ba79cd549cba6e200', 0, 'a1f732efc484f57ce43cc65cbc9dff7a'),
(32, 'asasasa', 'asaa1sa11@qq.com', 1, 0, '26f3808cdec7fb1ba79cd549cba6e200', 0, 'a1f732efc484f57ce43cc65cbc9dff7a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
