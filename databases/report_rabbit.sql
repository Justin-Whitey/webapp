-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 03:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report_rabbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `rabbit_expenses`
--

CREATE TABLE `rabbit_expenses` (
  `id` int(11) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `equipment` decimal(10,2) NOT NULL,
  `vaccine` decimal(10,2) NOT NULL,
  `foods` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rabbit_expenses`
--

INSERT INTO `rabbit_expenses` (`id`, `batch`, `type`, `equipment`, `vaccine`, `foods`) VALUES
(5, '1', '2', 3.00, 4.00, 5.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rabbit_expenses`
--
ALTER TABLE `rabbit_expenses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rabbit_expenses`
--
ALTER TABLE `rabbit_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
