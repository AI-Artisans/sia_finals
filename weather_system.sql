-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 09:11 AM
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
-- Database: `weather_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user_id`, `title`, `description`, `date`, `time`, `status`) VALUES
(1, 1, 'Jayrelle', 'dfdsdosfods', '2025-05-17', '09:51:00', 'pending'),
(2, 1, 'Jayrelle JUne', 'rkgokdgkdg', '2025-06-17', '09:53:00', 'pending'),
(3, 3, 'Jay\'s Birthday', 'Happy Birthday Jayrelle\r\nHappy birthday to you,\r\nHappy birthday to you,\r\nHappy birthday dear Jayrelle,\r\nHappy birthday to you!\r\nWishing you joy and laughter,\r\nAll your dreams coming true,\r\nAnother year of adventure,\r\nHappy birthday to you!', '2025-09-10', '00:00:00', 'pending'),
(5, 3, 'saasd', 'Happy Birthday Jayrelle\r\nHappy birthday to you,\r\nHappy birthday to you,\r\nHappy birthday dear Jayrelle,\r\nHappy birthday to you!\r\nWishing you joy and laughter,\r\nAll your dreams coming true,\r\nAnother year of adventure,\r\nHappy birthday to you!', '2025-06-17', '11:46:00', 'pending'),
(6, 3, 'sfdsf', 'Happy Birthday Jayrelle  Happy birthday to you,  Happy birthday to you,  Happy birthday dear Jayrelle,  Happy birthday to you!  Wishing you joy and laughter,  All your dreams coming true,  Another year of adventure,  Happy birthday to you!', '2025-05-17', '12:33:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `weather_accounts`
--

CREATE TABLE `weather_accounts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather_accounts`
--

INSERT INTO `weather_accounts` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'Miguel', 'Del Mundo', 'Okih', '$2y$10$r2WcyOQqc5vj5cXmVpNWV.WGQrgXysIVTmt9hTZTrF.6mPDmxqVA2'),
(2, 'Jayrelle', 'Baldemor', 'Jayjay', '$2y$10$G4nahI9H9CV9kzJKN10DM.nIqC8kiptLbyutuGfLK0o8O5GDt.wjC'),
(3, 'Jayrelle', 'Baldemor', 'jjerelll', '$2y$10$HnC6m2BUtxLwF8GeMZBLvOSqvBwTisSbZMrIe0l7fww4oiAijr3ci');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `weather_accounts`
--
ALTER TABLE `weather_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `weather_accounts`
--
ALTER TABLE `weather_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `weather_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
