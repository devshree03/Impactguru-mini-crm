-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2025 at 09:27 AM
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
-- Database: `impactguru_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `profile_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test user', 'test@example.com', '999999999', 'in the hell', NULL, '2025-12-05 04:44:20', '2025-12-05 12:11:27', '2025-12-05 12:11:27'),
(2, 'Test1 user', 'test1@example.com', '999999990', 'Anywhere1', NULL, '2025-12-05 04:44:46', '2025-12-05 04:44:46', NULL),
(3, 'Devyani Anil Patil', 'devshree485@gmail.com', '0929185482', 'Xrbia riverfront, pune', 'profiles/V3KQSukuwB1wncEPLspZsPvMQJFUMYDDpSILM72e.jpg', '2025-12-05 09:40:33', '2025-12-05 09:40:33', NULL),
(4, 'Devyani Anil Patil', 'abc@gam.com', '0929185482', 'Anywhere1', 'profiles/nDqK1p2b9VKk3mqEu5x0WUeRD1g4hNynG0waq28e.jpg', '2025-12-05 12:42:18', '2025-12-05 12:42:18', NULL),
(5, 'Devyani Anil Patil', 'abc1@gam.com', '0929185482', 'fefes', 'profiles/1pyqG2sxilnaOHgrjejHmi3ZGhRAKgiAgog040Hq.png', '2025-12-05 12:42:39', '2025-12-05 12:42:39', NULL),
(6, 'Devyani Patil', 'dev485@gmail.com', '999999990', 'Anywhere1', 'profiles/jdVmMETYhqP9BfmV97c6I2u9d2zHqTfZM0ImHFAt.jpg', '2025-12-05 12:43:10', '2025-12-05 12:43:10', NULL),
(7, 'Devyani Patil', 'devshre@gmail.com', '999999990', 'Anywhere1', 'profiles/aiUAEQVOHSGihc8CPeylcc8hmeMppKqJ4E7yPaTv.jpg', '2025-12-05 12:43:26', '2025-12-05 12:43:26', NULL),
(8, 'kush', 'kushhh@bn.com', '999999990', 'Anywhere1', 'profiles/YJJRFF1UAiWfdfoyvMyVrhnFAUnb5epCkmC3NF6Z.jpg', '2025-12-05 12:44:12', '2025-12-05 12:44:12', NULL),
(9, 'kush', 'dxfb@gm.com', '999999990', 'hgvhj', 'profiles/5gfBuoTJZSmaZX9rntuQnOCbAZKkI6oN0gZMvM0R.jpg', '2025-12-05 12:44:47', '2025-12-05 12:44:47', NULL),
(10, 'Devyani Patil', 'abc@gmail.com', '999999990', 'Anywhere1', 'profiles/abtQyrHuSnItwTs6eeTbE0WlKsqLMdVw16wjcaR5.png', '2025-12-05 12:45:17', '2025-12-05 12:45:17', NULL),
(11, 'Devyani Patil', 'deee485@gmail.com', 'ergsbn', 'grtg', 'profiles/svpYhyh9sqcgVd9Wdu01L9FPIWVv4X6DF6YqUdfq.jpg', '2025-12-05 12:46:02', '2025-12-05 12:46:02', NULL),
(12, 'Devyani Patil', 'dev@jahd.com', 'ergsbn', 'fsdfsz', 'profiles/y20YhrdxpjTp3mJRVbCoghbKjm1LG0nRvXZzyRfl.jpg', '2025-12-05 12:58:46', '2025-12-05 12:58:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_05_084314_add_role_to_users_table', 2),
(5, '2025_12_05_094304_create_customers_table', 3),
(6, '2025_12_05_102543_create_orders_table', 4),
(7, '2025_12_05_144119_add_profile_image_to_customers_table', 5),
(8, '2025_12_05_152142_add_order_number_and_order_date_to_orders_table', 6),
(9, '2025_12_05_162024_add_soft_deletes_to_customers_table', 7),
(10, '2025_12_06_074528_create_personal_access_tokens_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `order_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_id`, `amount`, `order_date`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 0.07, NULL, 'pending', 'abc', '2025-12-05 05:54:29', '2025-12-05 05:54:29', NULL),
(2, NULL, 2, 0.01, NULL, 'pending', 'xyz', '2025-12-05 05:59:14', '2025-12-05 05:59:14', NULL),
(3, NULL, 3, 0.04, NULL, 'pending', 'ohkkk', '2025-12-05 10:24:38', '2025-12-05 10:24:38', NULL),
(4, NULL, 1, 0.06, NULL, 'pending', 'fhdf', '2025-12-05 10:35:17', '2025-12-05 10:35:17', NULL),
(5, NULL, 3, 1.00, NULL, 'pending', 'hello', '2025-12-05 10:45:25', '2025-12-05 10:45:25', NULL),
(6, 'ORD-111', 2, 1.00, '2025-12-05', 'pending', 'afdhtfg', '2025-12-05 10:47:28', '2025-12-05 10:47:28', NULL),
(7, 'ORD-006', 3, 0.03, '2025-12-06', 'pending', 'ghfm', '2025-12-05 12:24:10', '2025-12-05 12:24:10', NULL),
(8, 'ORD-006', 2, 0.03, '2025-12-06', 'pending', 'gh', '2025-12-05 12:24:24', '2025-12-05 12:24:24', NULL),
(9, 'ORD-006', 3, 0.03, '2025-12-07', 'pending', 'hjvgvm', '2025-12-05 12:24:50', '2025-12-05 12:24:50', NULL),
(10, 'ORD-006', 3, 0.03, '2025-12-10', 'pending', 'mn', '2025-12-05 12:25:07', '2025-12-05 12:25:07', NULL),
(11, 'ORD-005', 3, 0.03, '2025-12-09', 'pending', 'sres', '2025-12-05 12:25:23', '2025-12-05 12:25:23', NULL),
(12, 'ORD-005', 2, 0.03, '2025-12-09', 'pending', 'vhgg', '2025-12-05 12:25:55', '2025-12-05 12:25:55', NULL),
(13, 'ORD-005', 8, 0.03, '2025-12-09', 'completed', 'wfdc', '2025-12-05 13:43:07', '2025-12-05 13:43:07', NULL),
(14, 'ORD-005', 8, 0.03, '2025-12-09', 'completed', 'wfdc', '2025-12-05 13:43:09', '2025-12-05 13:43:09', NULL),
(15, '2', 2, 0.12, '2025-12-25', 'cancled', 'gvfmfgv', '2025-12-05 13:45:17', '2025-12-05 13:45:17', NULL),
(16, '22', 9, 0.13, '2025-12-07', 'cancelled', 'done', '2025-12-05 15:01:58', '2025-12-05 15:01:58', NULL),
(17, '23', 9, 12000.00, '2025-12-08', 'cancelled', 'nope', '2025-12-05 15:09:34', '2025-12-05 15:09:34', NULL),
(18, '24', 3, 20000.00, '2025-12-09', 'cancelled', 'byyy', '2025-12-05 15:16:09', '2025-12-05 15:16:09', NULL),
(19, '24', 3, 20000.00, '2025-12-09', 'cancelled', 'byyy', '2025-12-05 15:17:02', '2025-12-05 15:17:02', NULL),
(20, '24', 3, 20000.00, '2025-12-09', 'cancelled', 'byyy', '2025-12-05 15:17:15', '2025-12-05 15:17:15', NULL),
(21, '24', 3, 20000.00, '2025-12-09', 'cancelled', 'byyy', '2025-12-05 15:30:45', '2025-12-05 15:30:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KCdLbw6NO0Y6hSdLY6cWOj4pRZnrklTEmjXl3Rtv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidmxLUGd0U3VJNFB4Tm9Ic2c2VHBXNndFME1sNWZUZkp4cXZTUTNUTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1765007859),
('tHLyB6BIGOIcJ1e3uEIoW2jk73Rof2QdbmB624JP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUNWSFZUbzBQUkRTVXhKdFVTUVk1R3Z5VHhSalk2M3BHVkxIalg0aCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvb3JkZXJzL2NyZWF0ZSI7czo1OiJyb3V0ZSI7czoxMzoib3JkZXJzLmNyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1764967647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Devyani Patil', 'devshree485@gmail.com', NULL, '$2y$12$oFts.4FCK8XqpBAmFCttMuM9us2galE7Pjm9QF0DDBMzPLU3f1/fa', NULL, '2025-12-05 02:41:35', '2025-12-05 04:10:32', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
