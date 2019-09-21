-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 03:29 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simrs_lite`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_23_122210_create_polikliniks_table', 1),
(4, '2019_02_23_123309_create_pasiens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `poliklinik_id` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telpon` int(11) DEFAULT NULL,
  `usia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nama`, `poliklinik_id`, `alamat`, `telpon`, `usia`, `created_at`, `updated_at`) VALUES
(1, 'Ferguso', 1, 'bogor', 875543332, 23, '2019-02-24 17:41:00', '2019-02-24 17:41:00'),
(2, 'Pasien A', 2, 'badndung', 875435434, 25, '2019-02-24 17:41:30', '2019-02-24 17:41:30'),
(3, 'pasien dokter baru', 3, 'jakarta', 8665675, 26, '2019-02-24 17:47:32', '2019-02-24 17:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polikliniks`
--

CREATE TABLE `polikliniks` (
  `id` int(10) UNSIGNED NOT NULL,
  `klinik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `polikliniks`
--

INSERT INTO `polikliniks` (`id`, `klinik`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'klinik tong fang', 4, '2019-02-24 17:39:22', '2019-02-24 17:39:22'),
(2, 'klinik Herbal', 3, '2019-02-24 17:39:30', '2019-02-24 17:39:30'),
(3, 'Klinik Baru', 2, '2019-02-24 17:46:58', '2019-02-24 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alfyadinata', 'alfymuhammad7@gmail.com', 1, NULL, '$2y$10$Pne01//sAEK9srlwjSy94OUJFHkAeL86KXLb/ur7CGrIbgnXfDUYS', 'fUqvOF7lgs6XoOJIZTA4TupvruTuv1ZKS1T5Kj4wNiKZKUlOLHm2Tg8TJbAV', '2019-02-24 17:33:17', '2019-02-24 17:33:17'),
(2, 'dokter', 'dokter@gmail.com', 0, NULL, '$2y$10$ESJzlGtKMzYf233Qo3dh7.lbhLMn3c2p3arQWSk/2ebcZJju.iaBa', 'iRjJ36FGgpWb4LDW3DP7WTsgHATLO5pYVT5gnecVqij8NKnL7kJ0N1HnUu08', '2019-02-24 17:34:15', '2019-02-24 17:34:15'),
(3, 'alfy', 'alfy@gmail.com', 0, NULL, '$2y$10$kTcOq/9hBt57HYfKI1mhdOeG1feHHb5bJ9exG0iL5Bk3b62d5c6vq', 'GnJAfRUFumpxfbp1jQcqogxM8MLG6bxqav56Brq63op6BY2WwNgCQmIaFZgW', '2019-02-24 17:36:16', '2019-02-24 17:36:16'),
(4, 'Dokter gigi', 'hilman@gmail.com', 0, NULL, '$2y$10$hPfKZ3NKGuNGSHVneOyck.s3k8/dU8Vm.E/XnyD5Kd.d5VO7GlBRG', '35aXyNUZ5MqQCtqlgZyHqru4pPdkVdGpR81Lw6JG5XGLFYRgWDKyCBBAFKVw', '2019-02-24 17:36:39', '2019-02-24 17:36:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasiens_poliklinik_id_foreign` (`poliklinik_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `polikliniks`
--
ALTER TABLE `polikliniks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polikliniks_user_id_foreign` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `polikliniks`
--
ALTER TABLE `polikliniks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD CONSTRAINT `pasiens_poliklinik_id_foreign` FOREIGN KEY (`poliklinik_id`) REFERENCES `polikliniks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `polikliniks`
--
ALTER TABLE `polikliniks`
  ADD CONSTRAINT `polikliniks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
