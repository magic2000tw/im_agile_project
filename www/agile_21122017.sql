-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2017 at 08:11 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agile`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `trip_id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `followTrip` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `trip_id`, `userId`, `userName`, `followTrip`) VALUES
(3, 0, 1, 'haha', 'good taipei');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id` int(10) NOT NULL,
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_location` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `username`, `start_date`, `end_date`, `name`, `about`, `cover_location`) VALUES
(1, 'haha', '2017-12-08', '2017-12-15', '埔里哪裡好？', '好山好水好無聊', ''),
(2, 'two', '2017-12-01', '2017-12-04', '台北', '交通都超方便的', ''),
(3, '簡靖騰', '2017-12-20', '2017-12-21', '又去台中', '只為了臭豆腐', 'https://localhost/www/picture/trave_cover/3.jpg'),
(4, '簡靖騰', '2017-12-01', '2017-12-02', '暨大', '待在宿舍', 'https://localhost/www/picture/trave_cover/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trip_detail`
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
-- Dumping data for table `trip_detail`
--

INSERT INTO `trip_detail` (`trip_id`, `userName`, `place`, `day`, `no`, `staytime`) VALUES
(1, 'haha', 'puli', 1, 1, 60),
(1, 'haha', 'taichung', 2, 1, 90),
(2, 'two', '??101', 1, 1, 60),
(2, 'two', '??????', 1, 2, 90),
(2, 'two', '西門町', 1, 3, 180);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `loginMail` varchar(50) NOT NULL,
  `userName` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` int(16) NOT NULL,
  `profile_location` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `loginMail`, `userName`, `password`, `profile_location`) VALUES
(1, 'test@mail.com', 'haha', 1234, ''),
(2, '222@mail.com', 'two', 1234, ''),
(3, 'kan@gmail.com', '簡靖騰', 0, 'https://localhost/www/picture/profile/3.jpg'),
(3, 'a01@gmail.com', 'a01', 0, 'https://localhost/www/picture/profile/2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
