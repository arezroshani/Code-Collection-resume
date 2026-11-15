-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2026 at 11:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(50) DEFAULT NULL,
  `car_model_year` varchar(4) DEFAULT NULL,
  `car_color` varchar(10) DEFAULT NULL,
  `car_price` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `car_status` varchar(20) DEFAULT NULL,
  `car_mileage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_model_year`, `car_color`, `car_price`, `created_at`, `updated_at`, `car_status`, `car_mileage`) VALUES
(1, 'BMW 320i', '2022', 'White', '35000', '2026-10-15 14:55:14', '2026-10-15 16:32:07', 'Used', 157000),
(2, 'Mercedes-Benz C200', '2023', 'Silver', '45000', '2026-10-15 15:23:41', '2026-10-15 16:32:36', 'Sold', 65000),
(3, 'Porsche 911', '2025', 'Mint', '120000', '2026-10-15 15:28:19', '2026-10-15 16:33:47', 'Used', 57000),
(4, 'Hyundai Elantra', '2025', 'Yellow', '24000', '2026-10-15 15:30:22', '2026-10-15 16:33:53', 'Reserved', 95000),
(5, 'BMW M8 Competition', '2025', 'Red', '140000', '2026-10-15 15:32:50', '2026-10-15 16:32:52', 'Used', 18000),
(6, 'Audi R8', '2021', 'Blue', '160000', '2026-10-15 15:41:52', '2026-10-15 16:30:03', 'New', 0),
(7, 'Chevrolet Corvette C8', '2025', 'Red', '75000', '2026-10-15 15:44:02', '2026-10-15 16:32:12', 'Sold', 90000),
(8, 'Lamborghini Huracán EVO', '2025', 'Black', '250000', '2026-10-15 15:52:54', '2026-10-15 16:32:20', 'In service', 64000),
(9, 'Ferrari 296 GTB', '2024', 'Gray', '320000', '2026-10-15 15:54:35', '2026-10-15 16:33:58', 'Available', 80000),
(10, 'McLaren 750S', '2024', 'Blue', '330000', '2026-10-15 15:56:07', '2026-10-15 16:32:28', 'Sold', 135000),
(12, 'Alfa Romeo Giulia Quadrifoglio', '2025', 'White', '85000', '2026-10-15 15:57:51', '2026-10-15 16:31:33', 'New', 0),
(13, 'Lexus LC 500', '2025', 'White', '105000', '2026-10-15 16:16:39', '2026-10-15 16:34:16', 'Available', 50000),
(14, 'Aston Martin Vantage', '2025', 'Yellow', '190000', '2026-10-15 16:28:26', '2026-10-15 16:28:26', 'Reserved', 141000),
(15, 'Bugatti Chiron Super Sport', '2023', 'Blue', '3500000', '2026-10-16 08:43:16', '2026-10-16 08:43:16', 'Reserved', 190000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
