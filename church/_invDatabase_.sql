-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2024 at 10:18 AM
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
-- Database: `chur_inv`
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
  `contact_info` varchar(100) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact_info`, `phone_no`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Christopher Beza', 'me@myplace.com', '0776767699', '4 Nch drive', 'cb@gmail.com', '2024-09-01 07:36:11', '2024-09-01 14:03:29'),
(2, 'Li', '123', '0776767644', '9 Ree drive', 'li@gmail.com', '2024-09-01 13:58:30', '2024-09-01 14:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `donated_tos`
--

CREATE TABLE `donated_tos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donated_tos`
--

INSERT INTO `donated_tos` (`id`, `name`, `address`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Lisa', '9 Ree drive', 'lisa@gmail.com', '0776767644', '2024-09-01 13:39:49', '2024-09-01 14:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, 'Benson', 'ben@house.com', '+260812037898', '2024-09-01 13:17:22', '2024-09-01 13:26:24'),
(2, 'Christopher Beza', 'beza85@gmail.com', '+260999999008', '2024-09-01 13:22:31', '2024-09-01 13:26:58');

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
(37, '0001_01_01_000000_create_users_table', 1),
(38, '0001_01_01_000001_create_cache_table', 1),
(39, '0001_01_01_000002_create_jobs_table', 1),
(40, '2024_08_01_142209_create_owned_items_table', 1),
(41, '2024_08_01_142218_create_suppliers_table', 1),
(42, '2024_08_01_142225_create_customers_table', 1),
(43, '2024_08_01_142241_create_donations_table', 1),
(44, '2024_08_01_142254_create_inbound_items_table', 1),
(45, '2024_08_01_142303_create_outbound_items_table', 1),
(46, '2024_08_01_142313_create_damaged_items_table', 1),
(47, '2024_08_01_142320_create_lost_items_table', 1),
(48, '2024_09_01_111323_create_donors_table', 2),
(49, '2024_09_01_111349_create_donated_tos_table', 2),
(50, '2024_09_03_000940_add_foreign_keys_to_owned_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `owned_items`
--

CREATE TABLE `owned_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `status` enum('Stored','Lost','Damaged','Outbound','Inbound','Donated','Received') NOT NULL,
  `description` text DEFAULT NULL,
  `barcode` varchar(255) NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `item_value` decimal(10,2) DEFAULT NULL,
  `item_condition` enum('new','used','good','fair','poor') DEFAULT 'new',
  `location` varchar(255) DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donated_to_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owned_items`
--

INSERT INTO `owned_items` (`id`, `item_name`, `status`, `description`, `barcode`, `qr_code`, `item_value`, `item_condition`, `location`, `supplier_id`, `customer_id`, `donor_id`, `donated_to_id`, `created_at`, `updated_at`) VALUES
(3090, 'Benches', 'Stored', 'Benches to be used in the church', '664322787703', NULL, 55000.00, 'new', 'Furniture Storage', 1, NULL, NULL, NULL, '2024-09-05 06:08:03', '2024-09-05 06:08:03'),
(3091, 'Benches', 'Stored', 'Benches to be used in the church', '515070137796', NULL, 55000.00, 'new', 'Furniture Storage', 1, NULL, NULL, NULL, '2024-09-05 06:08:03', '2024-09-05 06:08:03'),
(3092, 'Benches', 'Stored', 'Benches to be used in the church', '769986355159', NULL, 55000.00, 'new', 'Furniture Storage', 1, NULL, NULL, NULL, '2024-09-05 06:08:03', '2024-09-05 06:08:03'),
(3093, 'Benches', 'Stored', 'Benches to be used in the church', '574555585500', NULL, 55000.00, 'new', 'Furniture Storage', 1, NULL, NULL, NULL, '2024-09-05 06:08:03', '2024-09-05 06:08:03'),
(3094, 'Benches', 'Stored', 'Benches to be used in the church', '114641052880', NULL, 55000.00, 'new', 'Furniture Storage', 1, NULL, NULL, NULL, '2024-09-05 06:08:04', '2024-09-05 06:08:04'),
(3095, 'Microphone', 'Stored', 'For use during church service', '807857177531', NULL, 450.00, 'used', 'Equipment storage', 2, NULL, NULL, NULL, '2024-09-05 08:49:01', '2024-09-05 08:49:01'),
(3096, 'Microphone', 'Stored', 'For use during church service', '980103660888', NULL, 450.00, 'used', 'Equipment storage', 2, NULL, NULL, NULL, '2024-09-05 08:49:01', '2024-09-05 08:49:01'),
(3097, 'Microphone', 'Stored', 'For use during church service', '751282494410', NULL, 450.00, 'used', 'Equipment storage', 2, NULL, NULL, NULL, '2024-09-05 08:49:01', '2024-09-05 08:49:01'),
(3098, 'Microphone', 'Stored', 'For use during church service', '836514489207', NULL, 450.00, 'used', 'Equipment storage', 2, NULL, NULL, NULL, '2024-09-05 08:49:01', '2024-09-05 08:49:01'),
(3099, 'Speaker', 'Stored', 'For use during church service and other events', '959559430417', NULL, 9000.00, 'new', 'Equipment storage', 2, NULL, NULL, NULL, '2024-09-05 08:50:18', '2024-09-05 08:50:18'),
(3100, 'Speaker', 'Stored', 'For use during church service and other events', '279054975252', NULL, 9000.00, 'new', 'Equipment storage', 2, NULL, NULL, NULL, '2024-09-05 08:50:19', '2024-09-05 08:50:19');

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
('b3TywpX5UBsRwpke0Dd3vqjGEG2qFuUeT84V6bsV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoib2FlbFJqeUpzUVkzakxWc0tyaXU0VWRtRGVjU0x0V2lGeWs1ZlMxNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vd25lZF9pdGVtcy8zMDk5L2JhcmNvZGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MjU1MzczMDc7fX0=', 1725540390),
('QMOh2W8Q2cQH1gyghU8BSMDh5a98NycAeUzGyaDq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVFJWHFGcncyZk96MkNWUlhCRkZaV0VBVGphcDZuR0NIY3g1YmhTTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vd25lZF9pdGVtcy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1725711380);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_info` varchar(100) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact_info`, `phone_no`, `address`, `email`, `company_name`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Mike', '+123004', '099999900', '9 Cairo rd.', 'mk@gmail.com', 'Mike Enterprises ltd.', 'ww1.mkent.com', '2024-09-01 11:47:35', '2024-09-02 14:17:28'),
(2, 'Joseph', '+123005', '+26099446761', '11 Cairo rd.', 'jtech@gmail.com', 'JTech Enterprises ltd.', 'ww1.jtech.com', '2024-09-05 08:47:42', '2024-09-05 08:48:06');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Christopher Beza', 'beza85@gmail.com', NULL, '$2y$12$9HFKuD27ZzQB570gKnimcemybParRFjUK3gKraEVE8BgqW6gIZpK2', NULL, '2024-08-12 19:52:08', '2024-08-12 19:52:08');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donated_tos`
--
ALTER TABLE `donated_tos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `owned_items`
--
ALTER TABLE `owned_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owned_items_barcode_unique` (`barcode`),
  ADD KEY `owned_items_supplier_id_foreign` (`supplier_id`),
  ADD KEY `owned_items_customer_id_foreign` (`customer_id`),
  ADD KEY `owned_items_donor_id_foreign` (`donor_id`),
  ADD KEY `owned_items_donated_to_id_foreign` (`donated_to_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donated_tos`
--
ALTER TABLE `donated_tos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `owned_items`
--
ALTER TABLE `owned_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3101;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `owned_items`
--
ALTER TABLE `owned_items`
  ADD CONSTRAINT `owned_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `owned_items_donated_to_id_foreign` FOREIGN KEY (`donated_to_id`) REFERENCES `donated_tos` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `owned_items_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `owned_items_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
