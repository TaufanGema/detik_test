-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 20, 2021 at 11:05 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detik_transaction`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction_table`
--

CREATE TABLE `transaction_table` (
  `id` int(100) NOT NULL,
  `invoice_id` int(100) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `payment_type` enum('virtual_account','credit_card') DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `merchant_id` varchar(100) DEFAULT NULL,
  `references_id` varchar(255) DEFAULT NULL,
  `number_va` varchar(100) DEFAULT NULL,
  `status` enum('Pending','Paid','Failed','') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_table`
--

INSERT INTO `transaction_table` (`id`, `invoice_id`, `item_name`, `amount`, `payment_type`, `customer_name`, `merchant_id`, `references_id`, `number_va`, `status`) VALUES
(46, 1, 'mobil', 10000, 'credit_card', 'taufan', '12345', '27514116562223154', NULL, 'Failed'),
(47, 2, 'motor', 20000, 'virtual_account', 'taufan', '54321', '27514116562223155', '27514116562223156', 'Paid'),
(48, 3, 'Gelas', 2000, 'virtual_account', 'taufan', '3123123', '27514116562223157', '27514116562223158', 'Pending'),
(49, 4, 'Piring', 2000, 'credit_card', 'gofur', '3123123', '27514116562223159', NULL, 'Pending'),
(50, 5, 'laptop', 200000, 'virtual_account', 'adit', '31235542', '27514116562223160', '27514116562223161', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction_table`
--
ALTER TABLE `transaction_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_table`
--
ALTER TABLE `transaction_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
