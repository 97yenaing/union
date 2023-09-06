-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2023 at 05:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `union`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_09_05_085736_create_hellos_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(7, '2023_09_05_121636_create_patients_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `township` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `email`, `age`, `address`, `township`, `created_at`, `updated_at`) VALUES
(1, 'toto', '123423225556', 'djhfdj@kdkdyebu', 12, 'dfsdfadfafatttttttttttttttttttttttt', 'MingalarDon', '2023-09-05 07:27:01', '2023-09-05 20:14:47'),
(2, 'pepe', '12342322', 'djhfdj@kdkd', 13, 'dfsdfadfafa', 'Insein', '2023-09-05 07:28:18', '2023-09-05 07:28:18'),
(3, 'mg mg', '12342322', 'djhfdj@kdkd', 13, 'dfsdfadfafa', 'Insein', '2023-09-05 07:28:52', '2023-09-05 07:28:52'),
(4, 'ko ko', '12342322', 'djhfdj@kdkd', 13, 'dfsdfadfafa', 'Insein', '2023-09-05 07:29:00', '2023-09-05 07:29:00'),
(5, 'tu tu', '12342322', 'djhfdj@kdkd', 13, 'dfsdfadfafa', 'Insein', '2023-09-05 07:29:06', '2023-09-05 07:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinytext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `township` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`, `state`, `township`) VALUES
(1, 'Admin', 'union2023@gmail.com', '$2y$10$Qt/dx7ZrllZppUIIOoqQSu48TnoeZd70bHuwyyM6IbUbN9nOSUeSS', NULL, '2023-09-05 03:33:53', '2023-09-05 03:33:53', NULL, NULL),
(6, 'Project Manager', 'pg@union', '$2y$10$MWIbj6Hvy3rOUgAw/5Li0uBqZ5fF/6vnynS7bmnJ7Z9ZukydpXdTy', NULL, '2023-09-05 05:43:03', '2023-09-05 05:43:03', NULL, NULL),
(7, 'M&E Manager', 'me3@union', '$2y$10$WfPikuApSxn6xv7.1rDQH.PYSFa0T5F.ivb7zofPdH9NtzrjjpO0O', NULL, '2023-09-05 05:43:40', '2023-09-05 18:41:51', 'Yangon', 'HlaingTharYa(E)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
