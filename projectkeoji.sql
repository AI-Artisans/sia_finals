-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 04:39 AM
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
-- Database: `projectkeoji`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments_table`
--

CREATE TABLE `comments_table` (
  `comment_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `comment_text` text NOT NULL,
  `date_commented` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments_table`
--

INSERT INTO `comments_table` (`comment_id`, `user_id`, `post_id`, `comment_text`, `date_commented`) VALUES
(3, 4, 5, 'me', '2025-05-16 11:46:30'),
(5, 4, 6, 'wow', '2025-05-16 12:09:11'),
(7, 4, 7, 'yum\n', '2025-05-16 19:58:12'),
(8, 6, 7, 'bakit kulang kayo?', '2025-05-16 20:20:09'),
(9, 6, 6, 'AMEN', '2025-05-16 20:20:26'),
(10, 6, 5, 'okay test i like', '2025-05-16 20:20:38'),
(11, 7, 10, 'fr?? what the sigma', '2025-05-16 20:23:57'),
(12, 7, 12, 'Please comment thank you', '2025-05-16 20:27:58'),
(13, 5, 12, 'try to do rugby', '2025-05-16 20:34:15'),
(14, 5, 10, 'not real don\'t spread fake news please', '2025-05-16 20:34:43'),
(15, 5, 7, 'amazing', '2025-05-16 20:34:55'),
(16, 5, 5, 'test ba toh', '2025-05-16 20:35:36'),
(17, 3, 13, '⚠️ This post has been flagged for animal abuse content and violates our community guidelines - further violations may result in account suspension. ', '2025-05-16 20:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `likes_table`
--

CREATE TABLE `likes_table` (
  `like_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `date_liked` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes_table`
--

INSERT INTO `likes_table` (`like_id`, `user_id`, `post_id`, `date_liked`) VALUES
(4, 4, 5, '2025-05-16 11:46:23'),
(6, 4, 6, '2025-05-16 12:09:03'),
(7, 4, 7, '2025-05-16 12:09:04'),
(11, 6, 10, '2025-05-16 20:19:42'),
(12, 6, 9, '2025-05-16 20:19:43'),
(13, 6, 7, '2025-05-16 20:19:46'),
(14, 6, 6, '2025-05-16 20:20:14'),
(15, 6, 5, '2025-05-16 20:20:31'),
(16, 7, 10, '2025-05-16 20:23:18'),
(17, 7, 9, '2025-05-16 20:23:20'),
(18, 7, 7, '2025-05-16 20:23:26'),
(19, 7, 5, '2025-05-16 20:23:32'),
(20, 7, 6, '2025-05-16 20:23:34'),
(21, 7, 12, '2025-05-16 20:27:38'),
(22, 5, 13, '2025-05-16 20:34:02'),
(23, 5, 12, '2025-05-16 20:34:07'),
(24, 5, 10, '2025-05-16 20:34:28'),
(25, 5, 9, '2025-05-16 20:34:46'),
(26, 5, 7, '2025-05-16 20:34:48'),
(27, 5, 6, '2025-05-16 20:34:58'),
(28, 5, 5, '2025-05-16 20:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `posts_table`
--

CREATE TABLE `posts_table` (
  `post_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts_table`
--

INSERT INTO `posts_table` (`post_id`, `user_id`, `title`, `category`, `image`, `description`, `date_created`, `featured`, `updated_at`, `status`) VALUES
(5, 4, 'test', 'Travel', NULL, 'test', '2025-05-16 11:45:28', 1, '2025-05-16 11:45:28', 'published'),
(6, 4, 'and so now i come to you in open arms', 'Travel', '@kitoyaki_-_desktop_wallpaper_(11).png', 'every destination is your final destination bloodlines', '2025-05-16 11:47:50', 1, '2025-05-16 19:59:18', 'published'),
(7, 4, 'it girls', 'Food', '4.png', 'test', '2025-05-16 11:56:27', 1, '2025-05-16 11:56:27', 'published'),
(9, 6, 'Stewie conspiracy', 'News', 'RobloxScreenShot20210123_233946744.png', 'Is it true that Stewie is involved in the recent 911 plane crash? ', '2025-05-16 20:16:02', 1, '2025-05-16 20:16:02', 'published'),
(10, 6, 'Is it Time To TWICE??', 'Sports', 'DSC07881.JPG', 'It\'s time. 2025 comeback coming soon.', '2025-05-16 20:19:19', 1, '2025-05-16 20:19:19', 'published'),
(11, 7, 'test', 'Travel', NULL, 'test?', '2025-05-16 20:25:26', 0, '2025-05-16 20:25:43', 'draft'),
(12, 7, 'What to do?', 'Sports', 'download.jpg', 'I want to learn a new sport, any suggestions? ', '2025-05-16 20:27:30', 1, '2025-05-16 20:27:30', 'published'),
(13, 5, 'And I\'m in so deep', 'Travel', '448992842_489114720363357_6662905156729302243_n.jpg', 'You know I\'m such a fool for you T_T', '2025-05-16 20:33:42', 1, '2025-05-16 20:33:42', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `email`, `password`, `profile_photo`, `bio`, `is_admin`, `security_question`, `security_answer`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$jfbV5dAfvRLLXsv8PbeRAOiXMyR1/F7KqE0dwicuk9zkHoVrYJaF.', 'profile_3_1747449433.jpg', NULL, 1, 'What was your first pet\'s name?', 'pepper', '2025-05-16 16:11:07', '2025-05-16 20:37:13'),
(4, 'glyndel', 'glyndel@gmail.com', '$2y$10$eYNKRLrkDxYimp3m.o1FWuVPmTdDuy81ON671El8AsrPn/6yZ9lpC', 'profile_4_1747417430.jpg', NULL, 0, 'What was your first pet\'s name?', 'pepper', '2025-05-16 17:42:56', '2025-05-16 11:43:50'),
(5, 'nichole', 'nichole@gmail.com', '$2y$10$fwrLG61fleNR9wleZD6UXu4tU894m//Jfp6zXMdoxrmQp5mTrjWjK', 'profile_5_1747449020.jpg', NULL, 0, 'What was your first pet\'s name?', 'pepper', '2025-05-17 02:07:03', '2025-05-16 20:30:21'),
(6, 'jae', 'jae@gmail.com', '$2y$10$wButzY3fOHMfJb5YbDKr6usKkrYlerKL5eaZyCQZKACM7pgPIZwye', 'profile_6_1747448076.jpg', NULL, 0, 'What was your first pet\'s name?', 'pepper', '2025-05-17 02:13:28', '2025-05-16 20:14:36'),
(7, 'rome', 'rome@gmail.com', '$2y$10$L3WosO2nAgseno/.TEDuI.heO1ep3Uh1p.J5AQU0OtK6WvV1EsXgu', 'profile_7_1747448591.jpg', NULL, 0, 'What was your first pet\'s name?', 'bubuy', '2025-05-17 02:21:34', '2025-05-16 20:23:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments_table`
--
ALTER TABLE `comments_table`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `likes_table`
--
ALTER TABLE `likes_table`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `user_post_unique` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts_table`
--
ALTER TABLE `posts_table`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments_table`
--
ALTER TABLE `comments_table`
  MODIFY `comment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `likes_table`
--
ALTER TABLE `likes_table`
  MODIFY `like_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `posts_table`
--
ALTER TABLE `posts_table`
  MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments_table`
--
ALTER TABLE `comments_table`
  ADD CONSTRAINT `comments_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_table_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts_table` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes_table`
--
ALTER TABLE `likes_table`
  ADD CONSTRAINT `likes_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_table_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts_table` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts_table`
--
ALTER TABLE `posts_table`
  ADD CONSTRAINT `posts_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
