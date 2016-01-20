-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-01-20 18:04:51
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference`
--
CREATE DATABASE IF NOT EXISTS `conference` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `conference`;

-- --------------------------------------------------------

--
-- 表的结构 `conference`
--

CREATE TABLE `conference` (
  `id` int(11) NOT NULL,
  `conferenceName` varchar(3000) COLLATE utf8_unicode_ci NOT NULL COMMENT '会议名称',
  `section` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '部门',
  `location` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '地点',
  `time` int(11) NOT NULL COMMENT '时间',
  `compere` varchar(700) COLLATE utf8_unicode_ci NOT NULL COMMENT '主持人',
  `participant` varchar(700) COLLATE utf8_unicode_ci NOT NULL COMMENT '参与者',
  `scorer` varchar(700) COLLATE utf8_unicode_ci NOT NULL COMMENT '记录员',
  `summary` varchar(5000) COLLATE utf8_unicode_ci NOT NULL COMMENT '摘要',
  `conferenceDetails` text COLLATE utf8_unicode_ci COMMENT '会议详情'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='会议信息管理';

--
-- 转存表中的数据 `conference`
--

INSERT INTO `conference` (`id`, `conferenceName`, `section`, `location`, `time`, `compere`, `participant`, `scorer`, `summary`, `conferenceDetails`) VALUES
(1, '1', '1', '1', 11, '1', '1', '1', '1', 'sdfafadfasdfadjflasjdflajsafkjalsjfsdjflasjflajsfl发生了都解放拉萨会计法'),
(2, '2', '2', '2', 22, '2', '2', '2', '2', 'PHP（外文名:PHP: Hypertext Preprocessor，中文名：“超文本预处理器”）是一种通用开源脚本语言。语法吸收了C语言、Java和Perl的特点，利于学习，使用广泛，主要适用于Web开发领域。PHP 独特的语法混合了C、Java、Perl以及PHP自创的语法。它可以比CGI或者Perl更快速地执行动态网页。用PHP做出的动态页面与其他的编程语言相比，PHP是将程序嵌入到HTML（标准通用标记语言下的一个应用）文档中去执行，执行效率比完全生成HTML标记的CGI要高许多；PHP还可以执行编译后代码，编译可以达到加密和优化代码运行，使代码运行更快。'),
(3, '1', '1', '1', 1, '1', '1', '11', '1', 'sdfafadfasdfadjflasjdflajsafkjalsjfsdjflasjflajsfl发生了都解放拉萨会计法');

-- --------------------------------------------------------

--
-- 表的结构 `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '部门名称',
  `sectionDetails` varchar(7000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='部门信息存储';

--
-- 转存表中的数据 `section`
--

INSERT INTO `section` (`id`, `section`, `sectionDetails`) VALUES
(1, 'PHP', 'coder'),
(2, 'JAVA', 'coder'),
(3, 'Manager', 'coder');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `passWord` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `block` tinyint(4) NOT NULL DEFAULT '0' COMMENT '冻结用户属性',
  `sectionId` int(11) NOT NULL COMMENT '部门id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='存储用户信息';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `userName`, `passWord`, `email`, `admin`, `block`, `sectionId`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'mk87878@163.com', 1, 0, 3),
(2, 'Lydia', '202cb962ac59075b964b07152d234b70', 'mk8@163.com', 1, 0, 1),
(3, 'Anna', 'd41d8cd98f00b204e9800998ecf8427e', 'mk8@163.com', 0, 1, 2),
(4, '123', '202cb962ac59075b964b07152d234b70', 'mk@11.com', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectionId` (`sectionId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 限制导出的表
--

--
-- 限制表 `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`sectionId`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
