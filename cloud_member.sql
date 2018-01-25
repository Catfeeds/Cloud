-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-12-08 14:02:23
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloud`
--

-- --------------------------------------------------------

--
-- 表的结构 `cloud_member`
--

CREATE TABLE `cloud_member` (
  `uid` int(11) NOT NULL,
  `org_id` int(10) NOT NULL COMMENT '组织编号',
  `h_id` int(10) NOT NULL COMMENT '宾馆ID',
  `user` varchar(225) NOT NULL,
  `head` varchar(255) NOT NULL COMMENT '头像',
  `sex` tinyint(1) NOT NULL COMMENT '0保密1男，2女',
  `birthday` int(10) NOT NULL COMMENT '生日',
  `phone` varchar(20) NOT NULL COMMENT '电话',
  `qq` varchar(20) NOT NULL COMMENT 'QQ',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `password` varchar(32) NOT NULL,
  `t` int(10) UNSIGNED NOT NULL COMMENT '注册时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cloud_member`
--

INSERT INTO `cloud_member` (`uid`, `org_id`, `h_id`, `user`, `head`, `sex`, `birthday`, `phone`, `qq`, `email`, `password`, `t`) VALUES
(1, 0, 0, 'admin', '/Cloud/Public/attached/2017/04/13/58ef23981b178.jpg', 1, 1420128000, '13800138000', '331349451', 'xqnssa@qq.com', '66d6a1c8748025462128dc75bf5ae8d1', 1442505600),
(2, 0, 0, 'root', '', 1, 1490716800, '15811133331', '21312312', 'xqnssa@163.com', 'd45d6434eef733da506926efe9e04753', 1492530678),
(4, 2, 0, 'ceshi', '/Cloud/Public/attached/2017/04/19/58f63adc3c10c.jpeg', 1, 1491408000, '132141312214', '123213123', 'xqnssa@126.com', '36868f2f58d2ab890d352ace75b8184b', 1494050698),
(6, 7, 0, 'jingkelong', '', 1, 0, '', '', '', '36868f2f58d2ab890d352ace75b8184b', 1494228885),
(7, 8, 0, 'xqnd', '', 0, 0, '', '', '', '66d6a1c8748025462128dc75bf5ae8d1', 1497338561),
(10, 9, 0, '123', '', 0, 0, '', '', '', '36868f2f58d2ab890d352ace75b8184b', 1512537088),
(9, 2, 0, 'lixiang', '', 0, 0, '', '', '', '36868f2f58d2ab890d352ace75b8184b', 1512535724);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloud_member`
--
ALTER TABLE `cloud_member`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cloud_member`
--
ALTER TABLE `cloud_member`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
