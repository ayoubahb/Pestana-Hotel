-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 12, 2023 at 12:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Pestana`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `admin_name`, `admin_email`, `admin_psw`) VALUES
(1, 'ayoub', 'ayoub@gmail.com', '$2y$10$2w56kQUwZ7ZlPki/LTfHZ.HmCNEaCP17GmMtB23PHEx4DjA4NIcPG');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `guest_name` varchar(50) NOT NULL,
  `guest_email` varchar(50) NOT NULL,
  `guest_psw` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `guest_name`, `guest_email`, `guest_psw`) VALUES
(1, 'ayoub', 'ayoub@gmail.com', '$2y$10$2w56kQUwZ7ZlPki/LTfHZ.HmCNEaCP17GmMtB23PHEx4DjA4NIcPG');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `reservation_id` int(11) NOT NULL,
  `person_Fname` varchar(50) NOT NULL,
  `person_Lname` varchar(50) NOT NULL,
  `person_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`reservation_id`, `person_Fname`, `person_Lname`, `person_dob`) VALUES
(1, 'ayoub', 'ahababnams', '2023-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reservation_checkin` date NOT NULL,
  `reservation_checkout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `guest_id`, `room_id`, `reservation_checkin`, `reservation_checkout`) VALUES
(1, 1, 8, '2023-03-03', '2023-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_suite_type` varchar(50) NOT NULL,
  `room_price` float NOT NULL,
  `room_img` varchar(500) NOT NULL,
  `room_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `room_suite_type`, `room_price`, `room_img`, `room_max`) VALUES
(8, 'Single', ' ', 12, './views/upload_img/bg.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `guest_id` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`),
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
