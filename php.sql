-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 11:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_id` int(11) NOT NULL,
  `Cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_id`, `Cat_name`) VALUES
(1, 'Skin Illness Medicine '),
(2, 'Respiratory Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(11) NOT NULL,
  `Product_Name` text NOT NULL,
  `Product_img` text NOT NULL,
  `Cat_id` int(11) NOT NULL,
  `Product_Price` double NOT NULL,
  `Product_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_Name`, `Product_img`, `Cat_id`, `Product_Price`, `Product_Quantity`) VALUES
(3, 'FuckFace Jerry', '1635414465_ec8e6cc05b4c21704d79.jpg', 1, 3, 20),
(4, 'Test', '1635422118_834a3b7ed9ba50048aa8.png', 2, 5, 20),
(5, 'Test2', '1635435082_843f559604991c27f4c0.jpg', 1, 12, 62),
(6, 'Test3', '1635435203_9cc435931db9b6225bd5.jpg', 2, 7, 50),
(7, 'Test4', '1635436561_0b259acdeb74798336b6.png', 2, 12.5, 50);

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `SPro_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Sales_id` int(11) NOT NULL,
  `SPro_Quantity` int(11) NOT NULL,
  `SPro_Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_records`
--

CREATE TABLE `sales_records` (
  `Sales_Id` int(11) NOT NULL,
  `Sales_TotalPrice` double NOT NULL,
  `Sales_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Choo', 'test@gmail.com', 'test1234'),
(2, 'Henry', 'henry@gmail.com', 'henry123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD PRIMARY KEY (`SPro_id`);

--
-- Indexes for table `sales_records`
--
ALTER TABLE `sales_records`
  ADD PRIMARY KEY (`Sales_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_product`
--
ALTER TABLE `sales_product`
  MODIFY `SPro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_records`
--
ALTER TABLE `sales_records`
  MODIFY `Sales_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
