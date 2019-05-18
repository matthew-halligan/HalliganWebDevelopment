-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2019 at 08:33 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Halligan-Web-Development`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblBlogs`
--

CREATE TABLE `tblBlogs` (
  `fnkId` int(20) NOT NULL,
  `fldUrl` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fldTitle` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `fldDescription` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblBlogs`
--

INSERT INTO `tblBlogs` (`fnkId`, `fldUrl`, `fldTitle`, `fldDescription`) VALUES
(1, 'https://www.youtube.com/watch?v=2bVik34nWws', 'Test123', 'https://www.youtube.com/watch?v=2bVik34nWws is the url used ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblBlogs`
--
ALTER TABLE `tblBlogs`
  ADD PRIMARY KEY (`fnkId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblBlogs`
--
ALTER TABLE `tblBlogs`
  MODIFY `fnkId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
