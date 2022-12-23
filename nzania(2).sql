-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 01:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nzania`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `spare_name` varchar(200) NOT NULL,
  `spare_desc` varchar(200) NOT NULL,
  `spare_price` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `duedate` date NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fullname`, `email`, `phone`, `spare_name`, `spare_desc`, `spare_price`, `status`, `duedate`, `city`) VALUES
(1, 'RAMADHANI SHAIBU', 'nzania@gmail.com', 776623198, 'brake', 'brake ya nyuma', 40000, 'Not Paid', '2022-06-22', 'mwanza');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `spare_name` varchar(200) NOT NULL,
  `spare_desc` varchar(200) NOT NULL,
  `spare_price` int(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `siku` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `fullname`, `email`, `phone`, `spare_name`, `spare_desc`, `spare_price`, `status`, `siku`) VALUES
(1, '', '', '', '', '', 0, 'volvo', '2022-06-28 18:16:37'),
(2, 'RAMADHANI SHAIBU', 'nzania@gmail.com', '0776623198', 'brake', 'ya nyuma', 34000, 'Complete', '2022-06-28 18:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `spare_name` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL,
  `amount` int(100) NOT NULL,
  `spare_desc` varchar(100) NOT NULL,
  `spare_price` int(100) NOT NULL,
  `items` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `siku` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `spare`
--

CREATE TABLE `spare` (
  `spare_id` int(11) NOT NULL,
  `filename` blob NOT NULL,
  `spare_desc` varchar(200) NOT NULL,
  `spare_name` varchar(200) NOT NULL,
  `spare_price` int(200) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `items` int(11) NOT NULL,
  `siku` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spare`
--

INSERT INTO `spare` (`spare_id`, `filename`, `spare_desc`, `spare_name`, `spare_price`, `brand`, `status`, `payment`, `items`, `siku`) VALUES
(4, '', 'mpya', 'spana', 1500, 'toyo', 'Paid', 'M-pesa', 2, '2022-07-02 19:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `phone`, `email`, `password`, `user_type`) VALUES
(1, 'rama', 712121212, 'r@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `spare`
--
ALTER TABLE `spare`
  ADD PRIMARY KEY (`spare_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spare`
--
ALTER TABLE `spare`
  MODIFY `spare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
