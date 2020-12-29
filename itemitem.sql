-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2020 at 02:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koka`
--

-- --------------------------------------------------------

--
-- Table structure for table `itemitem`
--

CREATE TABLE `itemitem` (
  `id` int(11) NOT NULL,
  `shortTitle` varchar(250) DEFAULT NULL,
  `longTitle` varchar(250) DEFAULT NULL,
  `paysite` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `categories` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemitem`
--

INSERT INTO `itemitem` (`id`, `shortTitle`, `longTitle`, `paysite`, `description`, `tags`, `categories`) VALUES
(1, 'test short  title xxx sex ', 'test LONG title xxx sex test LONG title xxx sex ', NULL, 'test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex test LONG title xxx sex ', 'big boobs, big tits, tits, ass', 'milf, big tits, anal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itemitem`
--
ALTER TABLE `itemitem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemitem`
--
ALTER TABLE `itemitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
