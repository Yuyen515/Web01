-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-01-10 12:45:47
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `webfp`
--

-- --------------------------------------------------------

--
-- 資料表結構 `membership`
--

CREATE TABLE `membership` (
  `name` varchar(5) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `administrator` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `membership`
--

INSERT INTO `membership` (`name`, `phonenumber`, `account`, `password`, `administrator`) VALUES
('中山資管', '0938565772', 'misuser', 'mis666', 0),
('管理員', '0987654321', 'misvip', 'mis888', 1),
('羊背石', '0988521447', 'ybs', 'ybc28', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `reserve`
--

CREATE TABLE `reserve` (
  `phonenumber` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(6) NOT NULL,
  `people` int(1) NOT NULL,
  `nowtime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `reserve`
--

INSERT INTO `reserve` (`phonenumber`, `date`, `time`, `people`, `nowtime`) VALUES
('0938565772', '2021-01-12', '21:00', 4, '2021-01-07'),
('0938565772', '2021-01-19', '20:00', 3, '2021-01-07'),
('0933569887', '2021-01-13', '21:30', 1, '2021-01-07'),
('0977854214', '2021-01-26', '14:00', 3, '2021-01-06'),
('0925485221', '2021-01-12', '15:30', 2, '2021-01-06'),
('0988515224', '2021-01-29', '17:30', 2, '2021-01-08'),
('0938565772', '2021-01-07', '19:00', 4, '2021-01-10'),
('0938565772', '2021-01-27', '14:00', 2, '2021-01-10');

-- --------------------------------------------------------

--
-- 資料表結構 `userinformation`
--

CREATE TABLE `userinformation` (
  `phonenumber` varchar(10) NOT NULL,
  `name` char(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `pic` varchar(300) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `userinformation`
--

INSERT INTO `userinformation` (`phonenumber`, `name`, `email`, `birthday`, `pic`, `address`) VALUES
('0938565772', '中山資管', 'MIS762111941@gmail.com', '2017-05-15', './uploads/spaghetti.png', '高雄市鼓山區蓮海路70號'),
('0988521447', '羊背石', 'a123456@yahoo.com', '2020-02-28', './uploads/20200430_054522820_iOS.jpg', '高雄市帝寶');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`phonenumber`,`account`);

--
-- 資料表索引 `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`phonenumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
