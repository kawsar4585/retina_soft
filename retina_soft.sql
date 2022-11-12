-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2022 at 07:39 AM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.3.33-7+ubuntu20.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retina_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `clock_in_time` datetime DEFAULT NULL,
  `clock_out_time` datetime DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clock_in_note` text COLLATE utf8mb4_unicode_ci,
  `clock_out_note` text COLLATE utf8mb4_unicode_ci,
  `added_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `clock_in_time`, `clock_out_time`, `ip_address`, `clock_in_note`, `clock_out_note`, `added_by`, `created_at`, `updated_at`) VALUES
(5, 6, '2022-11-12 08:00:00', '2022-11-12 11:00:00', '127.0.0.1', NULL, NULL, 6, '2022-11-12 02:03:37', '2022-11-12 05:34:22'),
(6, 2, '2022-11-09 12:20:00', '2022-11-09 21:21:00', '127.0.0.1', NULL, NULL, 1, '2022-11-12 06:21:06', '2022-11-12 06:21:06'),
(7, 2, '2022-11-12 12:22:00', '2022-11-12 13:00:00', '127.0.0.1', NULL, NULL, 2, '2022-11-12 06:22:57', '2022-11-12 07:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contacts`
--

CREATE TABLE `employee_contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_fb_link` text COLLATE utf8mb4_unicode_ci,
  `contact_whatsapp_link` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_contacts`
--

INSERT INTO `employee_contacts` (`id`, `employee_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_address`, `contact_fb_link`, `contact_whatsapp_link`, `created_at`, `updated_at`) VALUES
(1, 11, 'Contact test name update', 'contacttest@gmail.com', '01714234585', 'contact test address upte', NULL, NULL, '2022-11-09 04:17:21', '2022-11-09 14:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `current_address` text COLLATE utf8mb4_unicode_ci,
  `department` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` decimal(22,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `employee_id`, `photo`, `date_of_birth`, `gender`, `marital_status`, `blood_group`, `permanent_address`, `current_address`, `department`, `designation`, `salary`, `created_at`, `updated_at`) VALUES
(2, 11, 'assets/images/profile/employee_221109101721.jpeg', '2006-11-09', 'others', 'married', 'o+', 'test', 'mirpur,dhaka,up', NULL, 'dev', '22222.00', '2022-11-09 04:17:21', '2022-11-09 14:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_08_121611_create_permission_tables', 2),
(9, '2022_11_08_201049_add_column_to_users_table', 3),
(10, '2022_11_09_042525_create_employee_details_table', 4),
(11, '2022_11_09_070809_create_employee_contacts_table', 5),
(13, '2022_11_10_045224_create_attendances_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-11-08 06:55:56', '2022-11-08 06:55:56'),
(2, 'user', 'web', '2022-11-08 06:55:57', '2022-11-08 06:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'reguler',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `source`, `status`) VALUES
(1, 'Admin', 'kawsar4585@gmail.com', '2022-11-08 06:55:57', '$2y$10$qbs.0A/KNCBvNfWYIwtH5uDh4O5HnhTxUQ7gJapBxbpLwgUFeej3W', NULL, '2022-11-08 06:55:57', '2022-11-08 06:55:57', NULL, 'reguler', 'active'),
(2, 'User', 'user@retinasoft.com', '2022-11-08 06:55:57', '$2y$10$.pHVzaeUIZA9rcBx2nzlQuf5I7kNs1Wd.XrGhXK2YM6RP/GM6Dt0m', NULL, '2022-11-08 06:55:57', '2022-11-08 06:55:57', NULL, 'reguler', 'active'),
(6, 'Kawsar Up', 'kawsar1996up@gmail.com', NULL, '$2y$10$uFH8uaGypzB2oVs27iV3uOLMFrl8VIVAUHXvpVmKuXJdJ1rLe9JJy', NULL, '2022-11-08 15:29:34', '2022-11-08 15:29:34', NULL, 'google', 'active'),
(11, 'Md Employee', 'employee@user3.com', NULL, '$2y$10$r2OddyWFqXft64GBNoo5NuWeef5DW0.hETNxcGoKooFC0vssyz4pO', NULL, '2022-11-09 04:17:21', '2022-11-09 14:40:36', 'user3', 'regular', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_contacts`
--
ALTER TABLE `employee_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_contacts`
--
ALTER TABLE `employee_contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
