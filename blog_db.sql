-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 05:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'VALORANT', 'Valorant is a free-to-play 5v5 tactical hero shooter developed and published by Riot Games in 2020.', '2022-06-27 09:25:42', '2025-05-17 11:52:19'),
(2, 'League of Legends', 'League of Legends is an online multiplayer battle arena game where players battle each other using in-game champions.', '2022-06-27 09:25:42', '2025-05-17 11:51:24'),
(3, 'COD - WARZONE II', 'Call of Duty: Warzone is a free-to-play battle royale game that allows players to team up or play solo in large environments', '2022-06-27 09:25:42', '2025-05-17 11:51:02'),
(4, 'CLASH OF CLANS', 'Clash of Clans is a massively multiplayer online strategy game developed by Supercell.', '2022-06-27 09:25:42', '2025-05-17 11:50:23'),
(5, 'DOTA 2', 'Dota 2 is a multiplayer online battle arena (MOBA) video game by Valve. ', '2022-06-27 09:25:42', '2025-05-17 11:51:57');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-06-18-005419', 'App\\Database\\Migrations\\Authentication', 'default', 'App', 1656293096, 1),
(2, '2022-06-27-005500', 'App\\Database\\Migrations\\Department', 'default', 'App', 1656293096, 1),
(3, '2022-06-27-010105', 'App\\Database\\Migrations\\Posts', 'default', 'App', 1656293096, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(30) UNSIGNED NOT NULL,
  `category_id` int(30) UNSIGNED NOT NULL,
  `user_id` int(30) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `short_description` text NOT NULL,
  `content` text NOT NULL,
  `banner` text NOT NULL,
  `tags` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `short_description`, `content`, `banner`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'TENZ VS ZOZ ', 'BINASICAN NI IANMAXGOD SI TENZ BOBBO EH', 'HAHHAHHHHAHH', 'http://localhost:8080/public/uploads/D.jpg', 'pro, valorant, gaming', 1, '2022-06-27 09:28:36', '2025-05-17 11:57:37'),
(3, 4, 1, '10 million wallbreakers vs 1 barbarian', 'NAG GYM SI IDOL HABANG PUYAT', 'AAHAHAHHAHAHA', 'http://localhost:8080/public/uploads/A.jpg', 'WOW, AWESOM', 1, '2022-06-27 09:28:36', '2025-05-17 11:54:00'),
(4, 3, 1, 'NO SCOPE TINAMAAN NA KO SAKANYA EH', 'YUN LANG PAR', 'HAHHHAHAHAHA', 'http://localhost:8080/public/uploads/B.jpg', 'GOOD, WOW, EPIC, IMMORTAL', 1, '2022-06-27 09:28:36', '2025-05-17 11:55:04'),
(5, 5, 1, 'WALA LODS FULL BUILD NA D PARIN TALGA PINILI', 'awit tlaga par kahit uchiha d na pupusta eh', 'HAHAHAHAHHAHA SUPERR WOWWWWWWW', 'http://localhost:8080/public/uploads/c.jpg', 'max,win,super,bet', 1, '2022-06-27 09:28:36', '2025-05-17 11:56:33'),
(24, 1, 1, '1v5 clutch', 'immortal lobby ace', '&amp;amp;lt;p&amp;amp;gt;Please watch my twitch tv : janttv.twitch.tv/&amp;amp;lt;/p&amp;amp;gt;&amp;amp;lt;p&amp;amp;gt;&amp;amp;lt;br&amp;amp;gt;&amp;amp;lt;/p&amp;amp;gt;', 'http://localhost:8080/public/uploads/e.jpg', 'Valorant, Esports, Games', 1, '2025-05-16 19:46:30', '2025-05-17 11:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT 3,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', '$2y$10$bRdBxzJdxivTIxvbk4YYOOSgNvvSRzDf/IjAJSasXHjuh47n1xafS', 1, '2022-06-27 09:25:11', '2022-06-27 09:25:11'),
(2, 'Mark Cooper', 'mcooper@mail.com', '$2y$10$.vNmCUZoQIMPGqN/kbckoegJ7fTOPr9Zy2UnOJG1fcFJWIPc8gwk.', 2, '2022-06-27 13:35:22', '2022-06-27 13:47:33'),
(3, 'jan', 'jan@gmail.com', '$2y$10$G4mJee9a6Xm5Mg1sBC89Qe817qBZWLzgh5BzdkJtCxby81JAsUNr.', 2, '2025-05-16 17:20:32', '2025-05-16 17:20:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
