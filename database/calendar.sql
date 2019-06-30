-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2019 at 08:38 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `logincalendar`
--

CREATE TABLE `logincalendar` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `mail` text NOT NULL,
  `password` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logincalendar`
--

INSERT INTO `logincalendar` (`id`, `username`, `mail`, `password`) VALUES
(1, 'SRphoto', 'sroy895@gmail.com', '$2y$10$j5M59e54D8RvznMSjlAATuCMBzIdh/hgLAGDyU.UFUtHaOd4Uwma2'),
(2, 'SRnophoto', 'sroy8951@gmail.com', '$2y$10$s/osZYcPoJkdt9fsrjlyUO8OyuzNTO17T/U/B/SQDkKm6lVQaIiY6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logincalendar`
--
ALTER TABLE `logincalendar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logincalendar`
--
ALTER TABLE `logincalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
