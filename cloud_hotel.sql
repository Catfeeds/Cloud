-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-12-08 13:29:13
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
-- 表的结构 `cloud_hotel`
--

CREATE TABLE `cloud_hotel` (
  `id` int(11) NOT NULL,
  `org_id` int(12) NOT NULL,
  `h_name` varchar(64) NOT NULL,
  `h_code` varchar(36) NOT NULL COMMENT '加盟编号',
  `h_province` char(20) NOT NULL,
  `h_city` char(20) NOT NULL,
  `h_district` char(20) NOT NULL,
  `h_add` varchar(64) NOT NULL COMMENT '酒店地址',
  `h_scode` varchar(32) NOT NULL,
  `h_add_time` int(10) NOT NULL COMMENT '添加时间',
  `last_version` int(11) NOT NULL COMMENT '餐厅端最新的菜谱最新版本'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cloud_hotel`
--

INSERT INTO `cloud_hotel` (`id`, `org_id`, `h_name`, `h_code`, `h_province`, `h_city`, `h_district`, `h_add`, `h_scode`, `h_add_time`, `last_version`) VALUES
(11, 2, '必胜客欢乐谷店', 'China.00001', '', '', '', '北京市朝阳区欢乐谷正门对过', '83akzgxrbop1QKHOZSGh6MyWcut72leN', 1494335691, 0),
(12, 2, '必胜客北工大店', 'China.00002', '', '', '', '北京市朝阳区北京工业大学东门', 'wjWHZ5Q7UdzBhrL6img2bPx8G3sFuveM', 1494335702, 0),
(13, 2, '必胜客北京南站店', 'China.00003', '', '', '', '北京市丰台区北京南站地下1层', '3ChvkTZq8Aa7RMUHYpOy0tw24XoidQES', 1494335712, 0),
(14, 2, '必胜客武胜路店', 'China.00004', '', '', '', '必胜客武胜路店232号', '1NSfL4YKxujraIJstQF9ZkDlMnvCH0wE', 1497338626, 0),
(15, 2, '123', '123', '', '', '', '121', 'CuUQ0HlbcOEhokFiY6Bzs2RtMKfvInTZ', 1512733948, 0),
(16, 2, '123', '123', '内蒙古自治区', '呼和浩特市', '和林格尔县', '1111111', 'KedDaTcM8X9Lry71z3RHZYg5kSUAbJPB', 1512734090, 0),
(17, 2, '123', '123', '上海市', '上海市市辖区', '闵行区', '1111111', '4LzVDHwuaJp1yTS5ijWbKOlGFM7vNdqt', 1512735615, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloud_hotel`
--
ALTER TABLE `cloud_hotel`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cloud_hotel`
--
ALTER TABLE `cloud_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
