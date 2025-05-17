-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 05:07 AM
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
-- Database: `bitbybit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitbybit_comments`
--

CREATE TABLE `bitbybit_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '2025-05-10 03:56:07',
  `last_updated` datetime NOT NULL DEFAULT '2025-05-10 03:56:07'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bitbybit_posts`
--

CREATE TABLE `bitbybit_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `likes` bigint(20) NOT NULL DEFAULT 0,
  `tags` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '2025-05-10 03:56:07',
  `last_updated` datetime NOT NULL DEFAULT '2025-05-10 03:56:07',
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bitbybit_role`
--

CREATE TABLE `bitbybit_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '2025-05-10 03:56:07',
  `last_updated` datetime NOT NULL DEFAULT '2025-05-10 03:56:07'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bitbybit_users`
--

CREATE TABLE `bitbybit_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL,
  `role` int(11) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '2025-05-10 03:56:07',
  `last_updated` datetime NOT NULL DEFAULT '2025-05-10 03:56:07'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Indexes for table `bitbybit_comments`
--
ALTER TABLE `bitbybit_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `bitbybit_posts`
--
ALTER TABLE `bitbybit_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `published` (`published`);

-- Indexes for table `bitbybit_users`
--
ALTER TABLE `bitbybit_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitbybit_comments`
--
ALTER TABLE `bitbybit_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitbybit_posts`
--
ALTER TABLE `bitbybit_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitbybit_role`
--
ALTER TABLE `bitbybit_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitbybit_users`
--
ALTER TABLE `bitbybit_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bitbybit_comments`
--
ALTER TABLE `bitbybit_comments`
  ADD CONSTRAINT `fk_comment_creator` FOREIGN KEY (`created_by`) REFERENCES `bitbybit_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_post` FOREIGN KEY (`post_id`) REFERENCES `bitbybit_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bitbybit_posts`
--
ALTER TABLE `bitbybit_posts`
  ADD CONSTRAINT `fk_post_creator` FOREIGN KEY (`created_by`) REFERENCES `bitbybit_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bitbybit_users`
--
ALTER TABLE `bitbybit_users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role`) REFERENCES `bitbybit_role` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
