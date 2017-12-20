-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-12-20 09:47:49
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `agile`
--

-- --------------------------------------------------------

--
-- 資料表結構 `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `trip_id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `followTrip` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `follow`
--

INSERT INTO `follow` (`id`, `trip_id`, `userId`, `userName`, `followTrip`) VALUES
(3, 0, 1, 'haha', 'good taipei');

-- --------------------------------------------------------

--
-- 資料表結構 `trip`
--

CREATE TABLE `trip` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `trip`
--

INSERT INTO `trip` (`id`, `username`, `start_date`, `end_date`, `name`) VALUES
(1, 'haha', '2017-12-08', '2017-12-15', 'happy puli'),
(2, 'two', '2017-12-01', '2017-12-04', 'good taipei');

-- --------------------------------------------------------

--
-- 資料表結構 `trip_detail`
--

CREATE TABLE `trip_detail` (
  `trip_id` int(10) NOT NULL,
  `userName` varchar(10) CHARACTER SET latin1 NOT NULL,
  `place` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day` int(5) NOT NULL,
  `no` int(5) NOT NULL,
  `staytime` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `trip_detail`
--

INSERT INTO `trip_detail` (`trip_id`, `userName`, `place`, `day`, `no`, `staytime`) VALUES
(1, 'haha', 'puli', 1, 1, 60),
(1, 'haha', 'taichung', 2, 1, 90),
(2, 'two', '??101', 1, 1, 60),
(2, 'two', '??????', 1, 2, 90),
(2, 'two', '西門町', 1, 3, 180);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `loginMail` varchar(50) NOT NULL,
  `userName` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `loginMail`, `userName`, `password`) VALUES
(1, 'test@mail.com', 'haha', 1234),
(2, '222@mail.com', 'two', 1234),
(3, 'kan@gmail.com', '簡靖騰', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
