-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 06:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(11) NOT NULL,
  `Product_Name` text NOT NULL,
  `Product_img` text NOT NULL,
  `Category` text NOT NULL,
  `Product_Price` double NOT NULL,
  `Product_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_Name`, `Product_img`, `Category`, `Product_Price`, `Product_Quantity`) VALUES
(8, 'ACCU-Chek Active GLU STRP 25S', '1635669744_dbe71b17998fe9e9cf20.png', 'Medical Supplies', 42, 20),
(9, 'ACCU-Chek FastClix Lancing Devic', '1635669815_2211be42d1d021fc2fdc.jpg', 'Medical Supplies', 42.9, 20),
(10, ' BACTIDOL MOUTHWASH 250ML', '1635669864_ab8eef7d30f88cf7ef84.jpg', 'Personal Care Products', 18.5, 15),
(11, ' Colgate Plax 750ml x2 Fresh Mint', '1635669894_987dc04f2af1053df9b7.png', 'Personal Care Products', 29.9, 15),
(12, 'Abbott Surbex Zinc 60\'s x 2', '1635669942_a3a205f593e360780ff4.jpg', 'Vitamins & Supplements', 99, 10),
(13, 'Appeton Essential Vitamin C 500mg Orange 30\'s', '1635669983_dc5616ffd1a5dd2364e8.png', 'Vitamins & Supplements', 30.2, 10),
(14, ' Durex Chocolate 12s', '1635670108_2fa89f3a8ed1c606d405.jpg', 'Sexual Wellness', 39.4, 25),
(15, 'Durex Fetherlite 12s', '1635670161_33e7a256e5b7180fb264.jpg', 'Sexual Wellness', 36.9, 25),
(16, 'Loreal Revitalift Dermalift Eye Cream 15ml', '1635670392_67e1121565a55f3f31e5.jpg', 'Skin Care & Beauty', 50.5, 8),
(17, 'MZDK Tea Tree Oil Serum', '1635670442_0869e4a19deedebcee37.png', 'Skin Care & Beauty', 68, 8),
(18, ' Bragg Apple Cider Vinegar 946ml', '1635670505_9a96f3d6b024a203dd5e.jpg', 'Healthy Foods & Drinks', 26.2, 3),
(19, ' Brands Chicken Essence 70g 10s', '1635670556_b04149b141c2abe1028c.jpg', 'Healthy Foods & Drinks', 58, 3),
(20, ' Rin Enzyme 1000ml', '1635670587_f9a56211fe55c26872bd.jpg', 'Healthy Foods & Drinks', 299, 1),
(21, ' 50 Megumi Anti-Hair Loss Conditioner (Fresh) 250ml', '1635670764_6ca7f80d1dab0ebed53a.jpg', 'Personal Care Products', 45, 6),
(22, ' AVEENO DAILY MOIST BODY WASH 354ML', '1635670980_8fb18be22cc251c1e84b.jpg', 'Personal Care Products', 35.2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `SPro_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Sales_Id` int(11) NOT NULL,
  `SPro_Quantity` int(11) NOT NULL,
  `SPro_Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`SPro_id`, `Product_id`, `Sales_Id`, `SPro_Quantity`, `SPro_Price`) VALUES
(1, 8, 1, 2, 15),
(2, 9, 1, 5, 10),
(3, 10, 2, 3, 55),
(4, 11, 2, 4, 40),
(9, 18, 5, 2, 52.4),
(10, 19, 5, 1, 58),
(13, 18, 6, 2, 36),
(14, 19, 6, 2, 38),
(15, 20, 6, 1, 299);

-- --------------------------------------------------------

--
-- Table structure for table `sales_records`
--

CREATE TABLE `sales_records` (
  `Sales_Id` int(11) NOT NULL,
  `Sales_TotalPrice` double NOT NULL,
  `Sales_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_records`
--

INSERT INTO `sales_records` (`Sales_Id`, `Sales_TotalPrice`, `Sales_Date`) VALUES
(1, 10, '2021-11-11'),
(2, 15, '2021-11-11'),
(5, 110.4, '2021-11-16'),
(6, 373, '2021-11-16');

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
(1, 'Choo', 'test@gmail.com', 'test123'),
(2, 'Henry', 'henry@gmail.com', 'henry123');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sales_product`
--
ALTER TABLE `sales_product`
  MODIFY `SPro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales_records`
--
ALTER TABLE `sales_records`
  MODIFY `Sales_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
