-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014-05-26 22:28:16
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sts`
--
CREATE DATABASE IF NOT EXISTS `sts` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sts`;

-- --------------------------------------------------------

--
-- 表的结构 `a4_instruction`
--

CREATE TABLE IF NOT EXISTS `a4_instruction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '指令Id',
  `type` tinyint(1) NOT NULL COMMENT '指令类型：0购买 1出售',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `total` int(10) unsigned NOT NULL COMMENT '总数量',
  `remain` int(10) unsigned NOT NULL COMMENT '剩余数量',
  `stock_id` bigint(20) unsigned NOT NULL COMMENT '股票id',
  `user_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '证券id',
  `time` int(10) unsigned NOT NULL COMMENT '时间戳',
  `account_id` int(10) unsigned NOT NULL COMMENT '资金账户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='指令表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `a4_record`
--

CREATE TABLE IF NOT EXISTS `a4_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '交易序号',
  `stock_id` bigint(20) unsigned NOT NULL COMMENT '成交股票id',
  `price` double NOT NULL COMMENT '成交价格',
  `number` int(10) unsigned NOT NULL COMMENT '成交数量',
  `time` int(10) unsigned NOT NULL COMMENT '成交时间戳',
  `user_id` int(10) unsigned NOT NULL COMMENT '账户id',
  `type` tinyint(1) unsigned NOT NULL COMMENT '指令类型',
  `account_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '资金账户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='成交记录表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `a4_stock`
--

CREATE TABLE IF NOT EXISTS `a4_stock` (
  `id` bigint(20) unsigned NOT NULL COMMENT '股票id',
  `open_price` int(10) unsigned NOT NULL COMMENT '开盘价',
  `close_price` int(10) unsigned NOT NULL COMMENT '收盘价',
  `max_price` int(10) unsigned NOT NULL COMMENT '今日最高价',
  `min_price` double NOT NULL COMMENT '今日最低价',
  `time` int(11) NOT NULL COMMENT '时间戳'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a4_stock`
--

INSERT INTO `a4_stock` (`id`, `open_price`, `close_price`, `max_price`, `min_price`, `time`) VALUES
(1, 20, 25, 27, 20.5, 1401033600),
(2, 20, 25, 27, 20.5, 1401033600),
(3, 20, 25, 27, 20.5, 1401033600),
(4, 20, 25, 27, 20.5, 1401033600),
(5, 20, 25, 27, 20.5, 1401033600),
(6, 20, 25, 27, 20.5, 1401033600),
(7, 20, 25, 27, 20.5, 1401033600),
(8, 20, 25, 27, 20.5, 1401033600),
(9, 20, 25, 27, 20.5, 1401033600),
(10, 20, 25, 27, 20.5, 1401033600),
(11, 20, 25, 27, 20.5, 1401033600);

DELIMITER $$
--
-- 事件
--
CREATE DEFINER=`sts`@`localhost` EVENT `instruction_overdue` ON SCHEDULE EVERY 1 DAY STARTS '2014-05-27 08:00:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT '指令过期从中央交易系统去除' DO delete from a4_instruction$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
