-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 09:11 AM
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
(6, 3, 1, '2018-05-03', '2018-05-05', '2018-05-11', 'sickness', 0),
(7, 4, 1, '2018-05-08', '2018-05-10', '2018-05-12', 'leave', 0),
(8, 4, 1, '2018-05-14', '2018-05-17', '2018-05-12', 'death of close relative', 1),
(9, 4, 1, '2018-05-01', '2018-05-11', '2018-05-12', 'family problem', 0),
(10, 4, 1, '2018-05-22', '2018-05-25', '2018-05-12', 'abroad conference', 0),
(11, 4, 1, '2018-05-16', '2018-05-19', '2018-05-12', 'sir, i have an interview in GP', 0),
(12, 2, 1, '2018-05-17', '2018-05-20', '2018-05-12', 'conference abroad', 1),
(13, 2, 1, '2018-05-16', '2018-05-17', '2018-05-12', 'family issue', 1),
(14, 6, 1, '2018-05-09', '2018-05-12', '2018-05-13', 'medial operation', 1),
(15, 6, 1, '2018-05-21', '2018-05-24', '2018-05-13', 'conference abroad', 0),
(16, 4, 1, '2018-05-16', '2018-05-25', '2018-05-13', 'book publish', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `type`, `supervisor`, `mail`, `phone`, `gender`) VALUES
(1, 'arif', '1234', 1, 1, 'ayon@gmail.com', 9667854, 'male'),
(2, 'mamun', '1234', 2, 1, 'mamun@gmail.com', 971233, 'male'),
(3, 'arafat', '1234', 2, 1, 'arafat@gmail.com', 9886744, 'male'),
(4, 'mukur', '1234', 2, 1, 'mukur@gmail.com', 6557899, 'female'),
(5, 'marjan', '1234', 1, 1, 'marZan@gmail.com', 677894489, 'female'),
(6, 'faiza', '1234', 2, 1, 'faiza@gmail.com', 97765221, 'female'),
(7, 'farah', '1234', 1, 1, 'farah@gmail.com', 6557844, 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
