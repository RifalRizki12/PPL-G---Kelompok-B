-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 02:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aijobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrip` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `url`, `name`, `descrip`, `status`, `created_at`, `updated_at`) VALUES
(1, 'petani', 'petani', 'deskripsi petani', 0, '2020-12-11 04:57:16', '2020-12-20 03:49:21'),
(2, 'buruh', 'buruh', 'deskripsi buruh', 0, '2020-12-11 04:58:01', '2020-12-13 04:22:09'),
(3, 'pramusaji', 'Pramusaji', 'Deskripsi Pramusaji Deskripsi Pramusaji Deskripsi Pramusaji Deskripsi Pramusaji Deskripsi Pramusaji Deskripsi Pramusaji', 0, '2020-12-13 04:21:21', '2020-12-13 04:21:21'),
(4, 'akuntan', 'akuntan dah di edit', 'deskripsi akuntan', 0, '2020-12-14 22:58:06', '2020-12-14 22:58:23'),
(6, 'petani2', 'petani2', 'deskrpisi petani2', 0, '2020-12-20 03:40:50', '2020-12-20 03:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_descrip` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_capacity` int(11) NOT NULL,
  `job_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_req` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_salary` int(11) NOT NULL,
  `job_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `category_id`, `owner_id`, `url`, `job_name`, `job_descrip`, `job_capacity`, `job_image`, `job_req`, `job_salary`, `job_status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'buruh-pabrik', 'buruh pabrik', 'deskripsi buruh pabrik', 11, '1607846822.jpg', 'umur diatas 17 tahun', 1500000, 0, '2020-12-12 02:54:21', '2020-12-20 03:41:51'),
(2, 1, 3, 'petani-padi', 'petani padi', 'deskripsi petani padi deskripsi petani padi deskripsi petani padi deskripsi petani padi deskripsi petani padi deskripsi petani padi deskripsi petani padi deskripsi petani padi deskripsi petani padi deskripsi petani padi ', 15, '1607800948.jpg', 'umur 18 tahun', 1000000, 0, '2020-12-12 12:22:28', '2020-12-14 21:42:07'),
(3, 1, 15, 'petani-jagung', 'petani jagung 2', 'deskripsi petani jagung', 20, '1607839946.jpg', 'umur diatas 20 tahun', 900000, 0, '2020-12-12 23:12:26', '2020-12-18 21:57:41'),
(4, 2, 15, 'buruh-pabrik-sirup', 'buruh pabrik sirup', 'deskripsi', 11, '1607844319.jpg', 'nvkiasndkisv', 12413413, 3, '2020-12-13 00:25:19', '2020-12-17 02:46:19'),
(5, 1, 3, 'petani-dummy', 'petani dummy', 'deskripsi dummy', 10, '1607848241.jpg', 'requirement dummy', 2000000, 0, '2020-12-13 00:30:29', '2020-12-13 04:31:28'),
(6, 1, 15, 'petani-dummy-2', 'petani dummy', 'bisa menanam dummy', 22, '1608089730.JPG', 'dummy', 12345, 0, '2020-12-13 01:06:20', '2020-12-15 20:35:30'),
(7, 2, 3, 'buruh-dummy', 'buruh dummy', 'deskripsi buruh dummy', 20, '1607848223.jpg', 'umur diatas 99', 2000000, 0, '2020-12-13 01:30:23', '2020-12-13 01:30:23'),
(8, 3, 3, 'pramusaji-pertama', 'pramusaji pertama', 'deskripsi pramusaji', 11, '1607858936.jpg', 'sudah menyelesaikan sma/smk', 500000, 0, '2020-12-13 04:28:56', '2020-12-14 01:59:58'),
(9, 1, 3, 'petani-padi-2', 'petani padi 2', 'deskripsi petani padi 2', 12, '1608012104.PNG', 'bisa menanam padi', 1000000, 0, '2020-12-14 23:01:44', '2020-12-14 23:01:44'),
(10, 1, 15, 'petani-jambu', 'petani jambu', 'deskripsi petani jambu', 14, '1608089709.JPG', 'umur diatas 20tahun', 1000000, 0, '2020-12-15 20:35:09', '2020-12-15 20:35:09'),
(11, 2, 15, 'buruh-pabrik-3', 'buruh pabrik 3', 'deskripsi buruh pabrik 3', 44, '1608198583.jpg', 'sembarang', 1000000, 0, '2020-12-17 02:49:43', '2020-12-17 02:49:43'),
(12, 1, 15, 'petani-lombok', 'petani lombok', 'petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok petani lombok', 14, '1608353730.JPG', 'umur diatas 18 tahun', 1000000, 0, '2020-12-18 21:55:30', '2020-12-18 21:55:30'),
(13, 2, 15, 'buruh-99', 'buruh 99', 'deskripsi burh 99 deskripsi burh 99 deskripsi burh 99 deskripsi burh 99 deskripsi burh 99 deskripsi burh 99 deskripsi burh 99 deskripsi burh 99 deskripsi burh 99', 2, '1608461728.jpg', 'umur 17 tahun', 1000000, 0, '2020-12-20 03:55:28', '2020-12-20 03:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_12_11_112039_create_categorys_table', 2),
(4, '2020_12_12_091125_create_jobs_table', 3),
(5, '2020_12_17_092750_crete_post-workers_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post-workers`
--

CREATE TABLE `post-workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_work` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `img_thumb` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post-workers`
--

INSERT INTO `post-workers` (`id`, `user_id`, `category_id`, `url`, `work_experience`, `field_work`, `status`, `img_thumb`, `created_at`, `updated_at`) VALUES
(1, 31, 1, 'pencari-kerja-5', 'pernhan menanam padi', 'sawah', '0', '1608291450.jpg', '2020-12-18 01:06:42', '2020-12-18 04:37:43'),
(2, 1, 1, 'pencari-kerja-1', 'pernah kerja buruh selama 6 tahun', 'konstruksi', '0', '1608291613.jpg', NULL, '2020-12-18 04:40:13'),
(3, 32, NULL, NULL, NULL, NULL, '0', NULL, '2020-12-20 04:00:02', '2020-12-20 04:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rek` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isverified` tinyint(4) DEFAULT 1,
  `job_id` int(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `email_verified_at`, `password`, `address`, `phone`, `picture`, `resume`, `no_rek`, `role_as`, `isverified`, `job_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user 3', NULL, 'user1@gmail.com', NULL, '$2y$10$S3q/cFI7qO2/A3HZlEvFSOGk0SFa2VtDRIRSnedmcF5cn.3uprRAy', 'Perumahan Panorama Indah Block AA no. 13', '082298243750', '1608089898.png', '1608089898.png', '246346457467', 'pencari', 0, NULL, NULL, '2020-12-02 18:32:36', '2020-12-20 03:43:21'),
(2, 'admin pertama', 'lastnama dummy', 'admin@gmail.com', NULL, '$2y$10$roVR8x2WIca5KjxTbYNTyOl43/YDp19zZVnlrtsKk0WggCjiFjSAa', NULL, NULL, NULL, NULL, NULL, 'admin', 0, 0, NULL, '2020-12-03 18:39:38', '2020-12-18 23:25:50'),
(3, 'pemilik usaha', NULL, 'pemilik1@gmail.com', NULL, '$2y$10$EC7y2aV2Guc2MIMbYX26U.26dkLrpV6VmWYXEWg3i6NyinT6EtMTy', NULL, NULL, NULL, '1608005675.png', NULL, 'pemilik', 0, 0, NULL, '2020-12-03 19:11:09', '2020-12-18 23:26:55'),
(14, 'user kedua', 'lastname', 'user2@gmail.com', NULL, '$2y$10$j5IKGpxXH7/t5wd6E4akk.vh5hU8szxGQhIcclysgVRU.gLAdayVS', 'jember', '083333333333', '1607669568.png', '1607669629.png', '81298789790', 'pencari', 0, NULL, NULL, '2020-12-04 22:15:11', '2020-12-14 20:55:28'),
(15, 'pemilik usaha 2', 'nama belakang', 'pemilik2@gmail.com', NULL, '$2y$10$5FbBw1c5wNMWAjuPhxglW.qqkZZM./xlISWH51W92qHQRuEfNGmZC', 'Perumahan Panorama Indah Block AA no. 13', '082298243750', NULL, '1608007286.png', '124634745', 'pemilik', 0, NULL, NULL, '2020-12-05 17:28:59', '2020-12-17 03:15:57'),
(16, 'user ketiga', 'nama belakang 3', 'user3@gmail.com', NULL, '$2y$10$gAEZb7YVNvSS3U79iZhWp.rx0Od9SqsY7IzqaFX6Ufuo6Rdki0l5u', 'jalan sesama', '0822222222', '1608461258.png', '1608005472.png', '353646453', 'pencari', 0, 2, NULL, '2020-12-05 17:29:31', '2020-12-20 03:51:09'),
(17, 'pemilik usaha 3', NULL, 'pemilik3@gmail.com', NULL, '$2y$10$bb6uYXuE38UcuWAeeRlEAOwOnRvI1zmz.pgKWCyB2qEmrpHUIclyC', NULL, NULL, NULL, '1608005701.png', NULL, 'pemilik', 0, NULL, NULL, '2020-12-05 17:29:57', '2020-12-14 22:56:44'),
(19, 'user keempat', NULL, 'user4@gmail.com', NULL, '$2y$10$EYhf6MoyYevXZfzuEVJNNehnILCce3AxAiX1VChCdDANeXXQMj4eu', NULL, NULL, NULL, '1608005686.png', NULL, NULL, 0, NULL, NULL, '2020-12-14 20:31:29', '2020-12-14 21:14:46'),
(20, 'user kelima', NULL, 'user5@gmail.com', NULL, '$2y$10$nDQNHhnUPMaAkIwKMRYOy.gzb9q7Os3tdUad8CtR73N8NVKIGRxwi', NULL, NULL, NULL, '1608022437.jpg', NULL, NULL, 0, NULL, NULL, '2020-12-15 01:53:57', '2020-12-17 07:28:30'),
(24, 'pemilik usaha 4', NULL, 'pemilik4@gmail.com', NULL, '$2y$10$83Q.405azwqVBGfQ4hTddeUu2Rl67Byz84yXYyuTtGIU/3aD5R.i2', NULL, NULL, NULL, '1608145797.png', NULL, 'pemilik', 1, NULL, '2HT0W34h4RZgoFtfKw0oHlMuonWYGdwmkftn9E810ysMb0pfhQfS8BHCNBfI', '2020-12-16 12:01:01', '2020-12-16 12:09:57'),
(26, 'user 6', NULL, 'user6@gmail.com', NULL, '$2y$10$E9vo9PjFGGYoDyyCCNm8P.pcx.T2U8Uv3/r/xRpP2NALcfLTrpKFu', NULL, NULL, NULL, '1608146094.jpg', NULL, NULL, 1, NULL, '2KsKNyzoGodnOIxbAYvW8E9u9zEKTl6kiae7XI4mSNDD8wjY5wKTtBnJqmnJ', '2020-12-16 12:14:54', '2020-12-16 12:14:54'),
(31, 'pencari5', 'kerja 5', 'pencari5@gmail.com', NULL, '$2y$10$1us7mUTa9bkUZ18/GjjiC.EXTnnIBhWJTt3vHVEhmTuTmqsv2aAGG', 'Perumahan Panorama Indah Block AA no. 13', '082298243750', '1608357376.png', '1608358312.png', '1243254645374', 'pencari', 0, 1, 'o2lRywjUlE0dSRokidFux8HJ3V3fH4RxJa1vL3ttcGUf9VZNi0rHLhc8ACkl', '2020-12-18 01:06:42', '2020-12-18 23:44:28'),
(32, 'pencari kerja 6', NULL, 'pencari6@gmail.com', NULL, '$2y$10$0at0aOw3rU.U3vKyc9Han.4YwzUt6HKXI4VF/xHcrK0jaJoTuSUja', NULL, NULL, NULL, '1608462001.png', NULL, 'pencari', 0, NULL, 'xK86ZwpmjDN9ZnMthPi1CoZ01IN9MvZMwp20mwD8dd4LCzdWAcw1KmI8cByy', '2020-12-20 04:00:02', '2020-12-20 04:01:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post-workers`
--
ALTER TABLE `post-workers`
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
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post-workers`
--
ALTER TABLE `post-workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
