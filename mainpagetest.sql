-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 09, 2024 at 01:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainpagetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `mainpage`
--

CREATE TABLE `mainpage` (
  `id` int(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `course_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mainpage`
--

INSERT INTO `mainpage` (`id`, `course_name`, `category`, `difficulty`, `file_path`, `price`, `course_description`) VALUES
(34, 'asdasdas', 'dasdasd', 'asdasdasd', 'Call of Duty  Modern Warfare 2019 2021.11.07 - 12.36.45.20.DVR.1636259921611.mp4', 233, 'asdsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mainpage`
--
ALTER TABLE `mainpage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mainpage`
--
ALTER TABLE `mainpage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
