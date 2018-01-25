-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-12-08 13:28:47
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
-- 表的结构 `cloud_ads`
--

CREATE TABLE `cloud_ads` (
  `adnum` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `starttime` date NOT NULL,
  `endtime` date NOT NULL,
  `adname` varchar(40) NOT NULL,
  `adtext` text NOT NULL,
  `adremark` text NOT NULL,
  `adpic` text NOT NULL,
  `edit_time` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adhref` text NOT NULL,
  `adtitle` text NOT NULL,
  `adtype` int(11) NOT NULL,
  `adshowcount` int(11) NOT NULL,
  `introduction` text NOT NULL,
  `activity` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `vehicle` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `is_delete` int(11) NOT NULL,
  `adverify` int(11) NOT NULL COMMENT '0_未审核;1_通过;2_未通过'
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COMMENT='广告管理表';

--
-- 转存表中的数据 `cloud_ads`
--

INSERT INTO `cloud_ads` (`adnum`, `uid`, `starttime`, `endtime`, `adname`, `adtext`, `adremark`, `adpic`, `edit_time`, `adhref`, `adtitle`, `adtype`, `adshowcount`, `introduction`, `activity`, `address`, `phone`, `vehicle`, `detail`, `is_delete`, `adverify`) VALUES
(43, 0, '2017-10-13', '2017-10-31', '必胜客', '必胜客披萨', '广告招租', '/SmartOrder/Data/Uploads/Images/59eaf6e4afcd4.jpg', '1508570852', 'http://www.pizzahut.com.cn/', '必胜客', 1, 2, '必胜客披萨', '满100减10', '大望路家乐福', '123555', '0', '0', 1, 0),
(45, 0, '2017-10-04', '2018-01-20', '1', '这里写内容', '1', '/cloud/Data/Uploads/Images/佛罗伦萨.png', '1512192752', '1', '1', 1, 1, '这里写内容', '1', '1', '1', '', '', 0, 0),
(56, 0, '2017-12-02', '2017-12-30', '金拱门', '金拱门欢迎你！', '这是备注', '/cloud/Data/Uploads/Images/卢浮宫.png', '1512198577', 'http://balabala', '金拱门', 1, 2, '金拱门欢迎你！', '无', '', '18310189377', '0', '0', 0, 0),
(55, 0, '2017-12-02', '2017-12-13', '星巴克', '', '', '/cloud/Data/Uploads/Images/丽江.png', '1512198151', '', '', 1, 0, '', '', '', '', '', '', 0, 0),
(53, 0, '2017-12-02', '2017-12-14', '12', '', '', '/cloud/Data/Uploads/Images/佛罗伦萨.png', '1512193626', '', '', 1, 0, '', '', '', '', '', '', 0, 0),
(54, 0, '2017-12-02', '2017-10-12', 'kfc', '123', '', '/cloud/Data/Uploads/Images/佛罗伦萨.png', '1512198324', '', '123', 3, 0, '', '', '', '18310189377', '', '', 1, 0),
(57, 10, '0000-00-00', '0000-00-00', 'ceshi1', '', '', '/cloud/Data/Uploads/Images/佛罗伦萨.png', '1512710176', '', '', 1, 0, '', '', '', '', '', '', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloud_ads`
--
ALTER TABLE `cloud_ads`
  ADD PRIMARY KEY (`adnum`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cloud_ads`
--
ALTER TABLE `cloud_ads`
  MODIFY `adnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
