-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 08:12 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiffen`
--

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `meal_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `meal_name`, `description`, `image`) VALUES
(1, 'Gujrati Food', 'Gujrati food description', 'paneer.jpg'),
(2, 'Punjabi Food', 'Punjabi food description', 'sm3.jpg'),
(3, 'South Indian', 'South Indian food description', 'sm3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meal_plans`
--

CREATE TABLE `meal_plans` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `day` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_plans`
--

INSERT INTO `meal_plans` (`id`, `name`, `description`, `cost`, `day`, `image`, `meal_id`) VALUES
(11, 'gujrati plan 1', 'Gujarati thali consists 2 rotli,1 Gujraati dal or kadhi, rice, and shaak/sabzi with different combinations of vegetables and spices.', '6.25', 1, 'paneer.jpg', 1),
(13, 'gujrati plan 2', 'Gujarati thali consists 4 rotli,2 Gujraati dal or kadhi, rice, and shaak/sabzi with different combinations of vegetables and spices.', '55.00', 5, 'paneer.jpg', 1),
(14, 'punjabi meal plan 1', 'Amritsari aloo kulcha , dahi kadhi , Punjabi chole, jeera rice , 1 dal tadka and sweet lassi', '8.50', 0, 'paneer.jpg', 2),
(15, 'punjabi meal plan 2', 'Punjabi Kadhi, Chawal, Achar, Raita and Chopped Salad ', '25.25', 0, 'paneer.jpg', 2),
(16, 'South Indian meal 2', 'Brinjal Sambhar,Karuvepilai podi,vendakki curry,Curd rice', '8.50', 0, 'paneer.jpg', 3),
(17, 'gujrati plan 3', 'Gujarati thali consists 2 rotli,1 Gujraati dal or kadhi, rice, and shaak/sabzi with different combinations of vegetables and spices.', '23.00', 0, 'paneer.jpg', 1),
(18, 'gujrati plan 4', 'gujrati plan 4', '25.25', 2, 'paneer.jpg', 1),
(19, 'gujrati plan 5', 'gujrati plan 5', '55.00', 0, 'paneer.jpg', 1),
(20, 'punjabi meal plan 3', 'punjabi meal plan 3', '8.50', 0, 'paneer.jpg', 2),
(21, 'punjabi meal plan 4', 'punjabi meal plan 4', '55.00', 0, 'paneer.jpg', 2),
(22, 'South Indian meal 1', 'Idli with Podi', '25.25', 0, 'paneer.jpg', 3),
(23, 'South Indian meal 3', 'Brinjal Sambhar,Karuvepilai podi,vendakki curry,Curd rice', '8.50', 0, 'paneer.jpg', 3),
(24, 'South Indian meal 4', 'Radish Sambhar,Karuvepilai podi,vendakki curry,Curd rice', '55.00', 0, 'paneer.jpg', 3),
(25, 'gujrati plan 7', 'gujrati plan 7', '65.00', 5, 'paneer.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_first_name` varchar(100) NOT NULL,
  `shipping_last_name` varchar(100) NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `shipping_phone_no` varchar(100) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `shipping_postal_code` varchar(50) NOT NULL,
  `shipping_amount` decimal(10,2) NOT NULL,
  `meal_plan_id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone_no`, `shipping_address`, `shipping_postal_code`, `shipping_amount`, `meal_plan_id`, `payment_method`, `created_at`, `updated_at`) VALUES
(28, 6, 'pooja', 'sharma', 'pooja@gmail.com', '12345', 'test address', '1231232', '6.25', 11, 'COD', '2020-12-09 07:04:58', '0000-00-00 00:00:00'),
(29, 6, 'pooja', 'sharma', 'pooja@gmail.com', '12345', 'test address', '1231232', '6.25', 11, 'COD', '2020-12-09 07:05:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `postal_code`, `phone_number`, `password`, `user_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Daljit', 'Singh', 'daljitsingh@yahoo.com', '645 sherrington drive', 'P7E1L3', '8073550632', '698d51a19d8a121ce581499d7b701668', 1, '2020-11-05 16:19:12', '2020-11-05 16:19:12', '2020-11-05 16:19:12'),
(4, 'aman', 'singh', 'aman@gmail.com', 'aefjbakjwd', 'kahdfkjawhdb', '8888888888', '698d51a19d8a121ce581499d7b701668', 2, '2020-11-06 02:19:11', '2020-11-06 02:19:11', '2020-11-06 02:19:11'),
(5, 'mukul', 'sharma', 'mukul@gmail.com', 'Ontario Street\r\n88', 'P7B3G2', '8073550632', '698d51a19d8a121ce581499d7b701668', 2, '2020-11-06 04:20:28', '2020-11-06 04:20:28', '2020-11-06 04:20:28'),
(6, 'Pooja', 'Sharma', 'poojagr191996@gmail.com', 'India', '11177', '999999999', 'e10adc3949ba59abbe56e057f20f883e', 1, '2020-11-24 06:04:12', '2020-11-24 06:04:12', '2020-11-24 06:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '2020-11-05 16:18:16', '2020-11-05 16:18:16', '2020-11-05 16:18:16'),
(2, 'user', '2020-11-05 16:18:16', '2020-11-05 16:18:16', '2020-11-05 16:18:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
