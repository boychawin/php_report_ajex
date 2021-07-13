-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2021 at 08:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_details`
--

CREATE TABLE `tb_details` (
  `details_id` int(11) NOT NULL,
  `details_sales_id` int(11) NOT NULL,
  `details_products_id` int(11) NOT NULL,
  `details_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_details`
--

INSERT INTO `tb_details` (`details_id`, `details_sales_id`, `details_products_id`, `details_quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 5),
(3, 1, 3, 2),
(4, 1, 4, 3),
(5, 2, 5, 3),
(6, 2, 6, 4),
(7, 2, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(100) NOT NULL,
  `products_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`products_id`, `products_name`, `products_price`) VALUES
(1, 'สินค้า 1', 199),
(2, 'สินค้า 2', 299),
(3, 'สินค้า 3', 399),
(4, 'สินค้า 4', 499),
(5, 'สินค้า 5', 599),
(6, 'สินค้า 6', 699),
(7, 'สินค้า 7', 799);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sales`
--

CREATE TABLE `tb_sales` (
  `sales_id` int(11) NOT NULL,
  `sales_pay_id` varchar(50) NOT NULL,
  `sales_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sales`
--

INSERT INTO `tb_sales` (`sales_id`, `sales_pay_id`, `sales_date`) VALUES
(1, 'bc-0001', '2021-07-14 00:01:40'),
(2, 'bc-0002', '2021-07-15 10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_details`
--
ALTER TABLE `tb_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_details`
--
ALTER TABLE `tb_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_sales`
--
ALTER TABLE `tb_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
