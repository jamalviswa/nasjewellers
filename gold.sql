-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 05:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gold`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `office_number` varchar(255) DEFAULT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `username`, `first_name`, `last_name`, `email`, `phone_number`, `office_number`, `gst_number`, `password`, `address`, `image`, `created_at`, `updated_at`) VALUES
(1, 'NAS', NULL, NULL, 'nas637101@gmail.com', NULL, NULL, NULL, '$2y$10$68nfc.eSUzvpdIElyaTs9eRz8/9UUhC.wgpYGV66C7GjokjriX0Bm', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hsn_code` varchar(6) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_type` varchar(10) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `jewels_item` varchar(255) DEFAULT NULL,
  `total_weight` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jewels_type` varchar(255) DEFAULT NULL,
  `dealer_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `jewels_type`, `dealer_name`, `mobile_number`, `address`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gold', 'Jamal Ahamed K', '8428937026', 'Saibaba Colony,\r\nCoimbatore', 'Tamilnadu', 'Active', '2023-04-03 10:53:17', '2023-04-03 11:50:03'),
(2, 'Silver', 'Ahamed', '8428937025', '-', '-', 'Active', '2023-04-03 10:58:37', '2023-04-03 11:40:39'),
(3, 'All', 'Jamal', '8428937024', 'Coimbatore', 'Tamilnadu', 'Active', '2023-04-03 10:59:14', '2023-04-03 10:59:14'),
(4, 'All', 'Mari', '9874569858', 'Coimbatore', '-', 'Active', '2023-04-03 11:10:59', '2023-04-03 11:10:59'),
(5, 'Silver', 'Naveen', '9858985858', '-', 'Tamilnadu', 'Active', '2023-04-03 11:16:01', '2023-04-03 11:16:01');

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
-- Table structure for table `goldinvoices`
--

CREATE TABLE `goldinvoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outstock_id` int(11) DEFAULT NULL,
  `hsn_no` varchar(10) DEFAULT NULL,
  `huid_number` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goldinvoices`
--

INSERT INTO `goldinvoices` (`id`, `outstock_id`, `hsn_no`, `huid_number`, `description`, `quantity`, `weight`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, '7108', '24K916', 'Ring', '1', '2.356', '13330.25', 'Active', '2023-04-18 12:36:54', '2023-04-18 12:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `goldweights`
--

CREATE TABLE `goldweights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instock_id` int(11) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `huid_number` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goldweights`
--

INSERT INTO `goldweights` (`id`, `instock_id`, `weight`, `huid_number`, `status`, `created_at`, `updated_at`) VALUES
(17, 21, '2.352', '21k916', 'Active', '2023-04-05 15:36:24', '2023-04-05 15:36:24'),
(18, 21, '1.522', '22k916', 'Active', '2023-04-05 15:36:24', '2023-04-05 15:36:24'),
(19, 21, '2.500', '24k916', 'Active', '2023-04-05 15:36:24', '2023-04-05 15:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `instocks`
--

CREATE TABLE `instocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hsn_code` varchar(6) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_type` varchar(10) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `jewels_item` varchar(255) DEFAULT NULL,
  `total_weight` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instocks`
--

INSERT INTO `instocks` (`id`, `hsn_code`, `customer_id`, `customer_type`, `customer_name`, `mobile_number`, `address`, `state`, `jewels_item`, `total_weight`, `status`, `created_at`, `updated_at`) VALUES
(21, '7108', 1, 'Dealer', 'Jamal Ahamed K', '8428937026', 'Saibaba Colony,\r\nCoimbatore', 'Tamilnadu', '9', '6.374', 'Active', '2023-04-05 15:36:24', '2023-04-05 15:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Earing', 'Active', '2022-11-15 12:07:03', '2023-03-22 09:19:47'),
(10, 'Ring', 'Active', '2022-11-15 12:15:25', '2022-11-15 12:15:25'),
(11, 'Chain', 'Active', '2022-11-15 12:15:34', '2022-11-15 12:15:34'),
(12, 'Haram', 'Active', '2022-11-15 12:15:48', '2022-11-15 12:15:48'),
(13, 'Bracelet', 'Active', '2022-11-15 12:16:02', '2022-11-15 12:16:02'),
(14, 'Maatal', 'Active', '2022-11-15 12:24:41', '2022-11-15 12:37:48'),
(15, 'Nechlace', 'Active', '2023-04-02 09:10:18', '2023-04-02 09:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `jewelries`
--

CREATE TABLE `jewelries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` int(11) DEFAULT NULL,
  `quality_type` varchar(255) DEFAULT NULL,
  `huid_number` varchar(255) DEFAULT NULL,
  `gross_weight` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jewelries`
--

INSERT INTO `jewelries` (`id`, `item_name`, `quality_type`, `huid_number`, `gross_weight`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'HUID', '676767', '1.25', 'Active', '2022-11-19 04:36:25', '2022-11-19 04:36:25'),
(2, 10, 'Halmark', '-', '52.2', 'Active', '2022-11-19 04:44:50', '2022-11-19 04:44:50'),
(3, 9, 'HUID', '54545454', '2.152', 'Active', '2022-11-19 05:23:23', '2022-11-19 05:23:23'),
(4, 11, 'Halmark', '-', '4542.25', 'Active', '2022-11-19 05:23:42', '2022-11-19 05:23:42');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_12_091254_create_adminusers_table', 1),
(6, '2022_11_15_134554_create_items_table', 2),
(7, '2022_11_16_084733_create_jewelries_table', 3),
(17, '2023_01_02_124724_create_instocks_table', 10),
(18, '2023_04_02_154421_create_goldweights_table', 11),
(19, '2023_04_03_145210_create_dealers_table', 12),
(20, '2023_01_02_123118_create_billings_table', 13),
(27, '2023_02_27_164931_create_nonbillings_table', 16),
(29, '2023_04_07_204830_create_silverinvoices_table', 17),
(30, '2023_01_25_194408_create_outstocks_table', 18),
(32, '2023_04_17_201939_create_goldinvoices_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `nonbillings`
--

CREATE TABLE `nonbillings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `silver_rate` varchar(255) DEFAULT NULL,
  `total_quantity` varchar(255) DEFAULT NULL,
  `total_weight` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `sgst_amount` varchar(255) DEFAULT NULL,
  `cgst_amount` varchar(255) DEFAULT NULL,
  `total_final_amount` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nonbillings`
--

INSERT INTO `nonbillings` (`id`, `bill_number`, `customer_name`, `mobile_number`, `address`, `state`, `date`, `time`, `silver_rate`, `total_quantity`, `total_weight`, `total_amount`, `sgst_amount`, `cgst_amount`, `total_final_amount`, `status`, `created_at`, `updated_at`) VALUES
(12, '1', 'Jamal Ahamed', '8428937025', 'Saibaba Colony,madurai', 'Tamilnadu', '18-04-2023', '06:13:25 PM', '85.00', '4', '25.060', '2330.02', '34.95', '34.95', '2399.92', 'Active', '2023-04-18 12:43:26', '2023-04-18 12:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `outstocks`
--

CREATE TABLE `outstocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_number` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `gold_rate` varchar(255) DEFAULT NULL,
  `total_quantity` varchar(255) DEFAULT NULL,
  `total_weight` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `sgst_amount` varchar(255) DEFAULT NULL,
  `cgst_amount` varchar(255) DEFAULT NULL,
  `total_final_amount` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outstocks`
--

INSERT INTO `outstocks` (`id`, `bill_number`, `customer_name`, `mobile_number`, `address`, `state`, `date`, `time`, `gold_rate`, `total_quantity`, `total_weight`, `total_amount`, `sgst_amount`, `cgst_amount`, `total_final_amount`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', 'Jamal Ahamed', '8428937026', 'Saibaba Colony,coimbatore', 'Tamilnadu', '18-04-2023', '06:06:53 PM', '5658.00', '1', '2.356', '13330.25', '199.95', '199.95', '13730.16', 'Active', '2023-04-18 12:36:54', '2023-04-18 12:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `silverinvoices`
--

CREATE TABLE `silverinvoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nonbilling_id` int(11) DEFAULT NULL,
  `hsn_no` varchar(10) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` enum('Active','Trash','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `silverinvoices`
--

INSERT INTO `silverinvoices` (`id`, `nonbilling_id`, `hsn_no`, `description`, `quantity`, `weight`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(14, 12, '7106', 'Leg Chain', '2', '2.352', '399.84', 'Active', '2023-04-18 12:43:26', '2023-04-18 12:43:26'),
(15, 12, '7106', 'Nechlace', '1', '20.356', '1730.26', 'Active', '2023-04-18 12:43:26', '2023-04-18 12:43:26'),
(16, 12, '7106', 'Ring', '1', '2.352', '199.92', 'Active', '2023-04-18 12:43:26', '2023-04-18 12:43:26');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `goldinvoices`
--
ALTER TABLE `goldinvoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goldweights`
--
ALTER TABLE `goldweights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instocks`
--
ALTER TABLE `instocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jewelries`
--
ALTER TABLE `jewelries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonbillings`
--
ALTER TABLE `nonbillings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outstocks`
--
ALTER TABLE `outstocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `silverinvoices`
--
ALTER TABLE `silverinvoices`
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
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goldinvoices`
--
ALTER TABLE `goldinvoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goldweights`
--
ALTER TABLE `goldweights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `instocks`
--
ALTER TABLE `instocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jewelries`
--
ALTER TABLE `jewelries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nonbillings`
--
ALTER TABLE `nonbillings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `outstocks`
--
ALTER TABLE `outstocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `silverinvoices`
--
ALTER TABLE `silverinvoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
