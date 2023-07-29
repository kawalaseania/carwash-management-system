-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 08:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spakcarwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(225) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `carType` varchar(225) NOT NULL,
  `plateNo` varchar(7) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fName`, `carType`, `plateNo`, `contact`, `address`, `mName`, `lName`) VALUES
(4, 'Mike', 'Brown Taxi', '38870', '99774458', 'new Georgia Gulf', 'N', 'James');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(225) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `mName` varchar(25) DEFAULT NULL,
  `lName` varchar(25) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(225) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` int(12) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fName`, `mName`, `lName`, `gender`, `dob`, `contact`, `address`, `position`, `salary`, `password`, `email`) VALUES
(1, 'Tarnue', 'P', 'Borbor', 'M', '2022-03-26', '0775577736', 'New Georgia Gulf', 'Security guard', 1000, 'seaniaborbor', 'mathematics1o4@gmail.com'),
(3, 'James ', 'M', 'Paul', 'M', '2022-03-16', '0775577736', 'New Georgia Housing Estate', 'Security guard', 30000, '$2y$10$0O6zz5W0z8DPraY2N//ZUO5l01pp3OwKUMEowVybI0Q.nb8LGxDIe', 'test@gmail.com'),
(4, 'Test Name', 'TestName2', 'Test', 'M', '2022-03-16', '0775577736', 'Monrovia Liberia', 'Security guard', 399, '$2y$10$p8qfC6.lIn7TImZVa/BpPeoCErAUWMNwRp/AyYvNJtB5vmS.J4UC2', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `washcategory`
--

CREATE TABLE `washcategory` (
  `id` int(225) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `price` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `washcategory`
--

INSERT INTO `washcategory` (`id`, `categoryName`, `price`) VALUES
(1, 'Test Wash', 200),
(3, 'Super Clean', 4777),
(4, 'Dry Clean', 345);

-- --------------------------------------------------------

--
-- Table structure for table `wash_log`
--

CREATE TABLE `wash_log` (
  `id` int(225) NOT NULL,
  `plateNo` varchar(15) NOT NULL,
  `washCategory` varchar(50) NOT NULL,
  `washCost` int(12) NOT NULL,
  `status` varchar(25) NOT NULL,
  `lastUpdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updateBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wash_log`
--

INSERT INTO `wash_log` (`id`, `plateNo`, `washCategory`, `washCost`, `status`, `lastUpdate`, `updateBy`) VALUES
(5, '83838', 'Test Wash', 200, 'Out', '2022-03-16 15:39:01.424240', 'James'),
(6, '83838', 'Test Wash', 200, 'Paid', '2022-03-16 15:47:00.157884', 'James'),
(8, '37834', 'Test Wash', 200, 'Paid', '2022-03-16 15:46:29.823159', 'James'),
(9, '98870', 'Test Wash', 200, 'IN', '2022-03-16 18:28:54.769876', 'James'),
(10, '98870', 'Test Wash', 200, 'IN', '2022-03-16 18:29:14.816500', 'James'),
(11, '38870', 'Test Wash', 200, 'Out', '2022-03-16 18:41:00.872892', 'James');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `washcategory`
--
ALTER TABLE `washcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wash_log`
--
ALTER TABLE `wash_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `washcategory`
--
ALTER TABLE `washcategory`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wash_log`
--
ALTER TABLE `wash_log`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
