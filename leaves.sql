-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 04:48 PM
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
-- Database: `leave_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `req_user_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `req_date` varchar(20) NOT NULL,
  `details` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `req_user_id`, `app_user_id`, `start_date`, `end_date`, `req_date`, `details`, `status`) VALUES
(4, 1, 1, '2018-05-17', '2018-05-29', '2018-05-11', '', 0),
(5, 2, 1, '2018-05-03', '2018-05-05', '2018-05-11', 'sickness', 1),
(6, 3, 1, '2018-05-03', '2018-05-05', '2018-05-11', 'sickness', 1),
(7, 4, 1, '2018-05-08', '2018-05-10', '2018-05-12', 'leave', 0),
(8, 4, 1, '2018-05-14', '2018-05-17', '2018-05-12', 'death of close relative', 0),
(9, 4, 1, '2018-05-01', '2018-05-11', '2018-05-12', 'family problem', 0),
(10, 4, 1, '2018-05-22', '2018-05-25', '2018-05-12', 'abroad conference', 1),
(11, 4, 1, '2018-05-16', '2018-05-19', '2018-05-12', 'sir, i have an interview in GP', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
