-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 10:17 AM
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
-- Database: `autonardo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `car_id` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` varchar(255) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `rental_price_per_day` decimal(10,2) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `sent_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaction_reference` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `checkout_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `drivers_license_number` varchar(255) NOT NULL,
  `drivers_license_expiry` date NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DELETE FROM `users`;
INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `drivers_license_number`, `drivers_license_expiry`, `is_admin`, `created_at`, `updated_at`, `is_active`) VALUES
	('ADMIN-0001', 'Admin', 'admin@autonardo.com', '$2y$10$QY3zdx0wiTakyHy8HQ6bI.kyb7xaegCq9G/0XTAjkjxYC/OuwumqG', '09673402517', 'Manila City', '0001', '2030-01-01', 1, '2025-05-10 06:12:58', '0000-00-00 00:00:00', 1),
	('ADMIN-0002', 'zxc', 'zxc', '$2y$10$wiab2NJCLs2xcQVKU8yM/.vEtCKMlllPcnIbYoGoyKw/G6VBydb6W', 'zxc', 'zxc', 'zxc', '2025-01-01', 1, '2025-05-10 09:11:22', '0000-00-00 00:00:00', 0),
	('ADMIN-0003', 'kiven', 'kiven@mail.com', '$2y$10$bSkL8vtIBh7LM5AQypj.fOae1ILxBwOcL/3RCM.2CsbR2B1mJpenu', '09673402517', 'caloocan city', '123123', '2025-01-01', 1, '2025-05-16 08:13:44', '0000-00-00 00:00:00', 1),
	('ADMIN-0004', 'qwe', 'jprofeta123@gmail.com', '$2y$10$m/9by9gl/mqzqzt6W2kNh.yguQ4YvA0uXW4SySHCOpx5YeiFkYd3m', '09password123', 'caloocan', 'zxc21', '2025-05-29', 1, '2025-05-16 22:14:01', '0000-00-00 00:00:00', 1),
	('USER-0001', 'dsa', 'dsa', '$2y$10$GkOPbnq0g9oQwIfPs5RgC.1TPuqTdfYKV59Aoodvli3CLdVDlb/52', 'dsa', 'dsa', 'dsa', '2025-01-01', 0, '2025-05-10 09:06:03', '0000-00-00 00:00:00', 1),
	('USER-0002', 'qwe', 'qwe', '$2y$10$JGkHfYyfsYrobj3SpMDteeO7lJAs6dJzh7DRQG4arRW/hbETOFLSS', 'qwe', 'qwe', 'qwe', '2025-01-01', 0, '2025-05-10 09:10:55', '0000-00-00 00:00:00', 1),
	('USER-0003', 'user', 'user', '$2y$10$6lat4gpA9jegCklFu47zVOFTQ2OJ.VXvyWYsOVQYbatTpLMoR5Sv6', '1234', 'user', '1234', '2030-01-01', 0, '2025-05-10 09:23:22', '0000-00-00 00:00:00', 1),
	('USER-0004', 'user ako', 'kevinyu2201@gmail.com', '$2y$10$.awAWShtB3B1i12ld5g3J.TADu5uMgSubttJSJmEVhD3NOE3ld4Y2', '09673402517', 'Caloocan', '0123456', '2030-01-01', 0, '2025-05-10 09:24:09', '0000-00-00 00:00:00', 1),
	('USER-0005', 'user', 'user@autonardo.com', '$2y$10$pJqwUVG4a9LXDWZf9DSE6uiCsJS88bvKkTWD8c4/hkS9HQS9wLSa6', '12345', 'caloocan', '12345', '2028-01-01', 0, '2025-05-10 09:24:39', '0000-00-00 00:00:00', 1),
	('USER-0006', 'kivin', 'kivin@mail.com', '$2y$10$pGjuP0A5xcZ.DdwOj2jbu.u593R3/iJg4Fak5IyKYgSod0i7Q3lBy', '09673402517', 'caloocan', '321321', '2025-01-01', 0, '2025-05-16 08:16:02', '0000-00-00 00:00:00', 1),
	('USER-0007', 'kiben', 'kiben@mail.com', '$2y$10$YSbeyXqBeHZELNxLImwe7eY/MIH9H.Bb3O9s7fyCV3Kves5qJHAPq', '09673402517', 'caloocan', '2132123', '2025-01-01', 0, '2025-05-16 08:17:33', '0000-00-00 00:00:00', 1),
	('USER-0008', 'kebin', 'kebin@mail.com', '$2y$10$nVB5Neq4LfyxQG3DYapqz.7.sOMthYrkmpUeT4Z/LAYcsh1X6H6hO', '09673402517', 'caloocan', '312312', '2025-01-01', 0, '2025-05-16 08:19:53', '0000-00-00 00:00:00', 1),
	('USER-0009', 'jomari', 'jprofeta@gmail.com', '$2y$10$vPJVhjpQ1p825AM74jciCeY7PmOA33XbvlhzIrZ0YwosyPrF6uGyq', '091656516', 'Caloocan City', 'sdfwr234', '2025-05-13', 0, '2025-05-16 21:33:16', '0000-00-00 00:00:00', 1),
	('USER-0010', 'Kopiko Brown', 'kopikobrown@gmail.com', '$2y$10$zw1fMCzAmnAEUd1/Gmct2ON.uwfAzOL/mNCbSMtVS58If.pLC20BO', '0909288282812', 'Fairview QC', 'PRN-02321-2323-22', '2025-05-30', 0, '2025-05-16 21:55:08', '0000-00-00 00:00:00', 1),
	('USER-0011', 'Light Yagami', 'light@gmail.com', '$2y$10$I/r9t8Tmcug5UA8BzI5i3uYzwfV51ro74A6K382/Xha1OLi7HjWoK', '09123456789', 'Caloocan City, Metro Manila', '1231322131', '2025-05-17', 0, '2025-05-16 23:09:01', '0000-00-00 00:00:00', 1);

DELETE FROM `cars`;
INSERT INTO `cars` (`id`, `car_type`, `make`, `model`, `transmission`, `plate_number`, `rental_price_per_day`, `image`, `is_available`, `created_at`, `updated_at`) VALUES
	('A-Q6_E-TRON-A-NIH-7696', 'SUV', 'Audi', 'Q6 e-tron', 'Automatic', 'NIH-7696', 10000.00, 'A-Q6_E-TRON-A-12312345.jpg', 1, '2025-05-17 00:37:58', '2025-05-17 01:10:05'),
	('B-SEAL_5_DM-I_2025-A-NIK-8262', 'Sedan', 'BYD', 'Seal 5 DM-i 2025', 'Automatic', 'NIK-8262', 2800.00, 'B-SEAL_5_DM-I_2025-A-NIK-8262.jpg', 1, '2025-05-17 01:34:23', '0000-00-00 00:00:00'),
	('F-RANGER_RAPTOR_2024-A-NHF-9822', 'Pickup', 'Ford', 'Ranger Raptor 2024', 'Automatic', 'NHF-9822', 6300.00, 'F-RANGER_RAPTOR_2024-A-NHF-9822.jpg', 1, '2025-05-17 01:30:25', '0000-00-00 00:00:00'),
	('H-ACCENT_2025-A-CDE-678', 'Hatchback', 'Hyundai', 'Accent 2025', 'Automatic', 'CDE-678', 1150.00, 'H-ACCENT_2025-A3.jpg', 1, '2025-05-10 01:35:38', '2025-05-17 01:07:05'),
	('H-ACCENT_2025-A-FHI-2925', 'Hatchback', 'Hyundai', 'Accent 2025', 'Automatic', 'FHI-2925', 1300.00, 'H-ACCENT_2025-A-FHI-2925.jpg', 1, '2025-05-16 06:40:46', '2025-05-17 01:06:43'),
	('H-CIVIC_2016-A-ABC-123', 'Sedan', 'Honda', 'Civic 2016', 'Automatic', 'ABC-123', 6000.00, 'H-CIVIC_2016-A-ABC-123.jpg', 1, '2025-05-10 01:17:35', '2025-05-17 01:38:27'),
	('I-MU-X_2024-A-DBH-1665', 'SUV', 'Isuzu', 'MU-X 2024', 'Automatic', 'DBH-1665', 4600.00, 'I-MU-X_2024-A-DBH-1665.jpg', 1, '2025-05-17 01:18:50', '0000-00-00 00:00:00'),
	('N-NAVARA_2025-M-ADG-987', 'Pickup', 'Nissan', 'Navara 2025', 'Manual', 'ADG-987', 6500.00, 'N-NAVARA_2025-M.jpg', 1, '2025-05-10 01:54:50', '2025-05-17 01:09:22'),
	('T-AE86_TRUENO-M-13-954', 'Sedan', 'Toyota', 'AE86 Trueno', 'Manual', '13-954', 500000.00, 'T-AE86_TRUENO-M-13-954.jpg', 1, '2025-05-17 01:41:25', '0000-00-00 00:00:00'),
	('T-ALTIS_2016-M-DEF-456', 'Sedan', 'Toyota', 'Altis 2016', 'Manual', 'DEF-456', 3000.00, 'T-ALTIS_2016-M-DEF-456.jpg', 1, '2025-05-10 01:18:37', '2025-05-17 01:09:45');
