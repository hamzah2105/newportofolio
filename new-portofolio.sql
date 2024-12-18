-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 01:27 PM
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
-- Database: `new-portofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
(5, 'Hamzah', '<p>Graduated from Pasundan University (Bandung) majoring in Informatics Engineering, enjoys honing and\r\ndeveloping my IT skills and is detail-oriented and has aspirations to work in the Web Developer field, and is\r\nproficient in HTML5, CSS, PHP, Codeigniter Framework, and Laravel Framework. Has internship experience at\r\nthe Bandung branch of BPJS Kesehatan in the IT Helpdesk field which creates a website for recording inactive\r\ndeceased BPJS Kesehatan card participants.&nbsp;</p>', '2024-12-17 20:39:13', '2024-12-17 20:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, '_language', 'php, bootstrap, html5, css3, laravel, codeigniter, javascript', '2024-12-17 20:34:16', '2024-12-17 20:34:16'),
(2, '_foto', '241218035057.png', '2024-12-17 20:36:02', '2024-12-17 20:50:57'),
(3, '_pdf', '241218033602.pdf', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(4, '_nama', 'Hamzah', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(5, '_title', 'Devpelopment and UI UX', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(6, '_email', 'hamzah210521@gmail.com', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(7, '_alamat', 'Dusun Krajan 1 Rt 002 Rw 001 Desa Warung Bambu Kec. Karawang Timur', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(8, '_nohp', '087875716993', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(9, '_ig', 'istagram', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(10, '_tw', 'twiter', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(11, '_in', 'https://www.linkedin.com/in/hamzah-hamzah-963162298/', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(12, '_github', 'https://github.com/hamzah2105', '2024-12-17 20:36:02', '2024-12-17 20:36:02'),
(13, '_halaman_about', '5', '2024-12-17 20:39:19', '2024-12-17 20:39:19');

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
(2, '2024_12_16_093130_table_users_add_column_google_id', 2),
(3, '2024_12_16_095856_users_set_default_password', 3),
(4, '2024_12_17_044003_user_add_column_avatar', 4),
(5, '2024_12_17_045632_create_halamen_table', 5),
(6, '2024_12_17_082400_create_riwayats_table', 6),
(7, '2024_12_17_165156_create_portofolios_table', 7),
(8, '2024_12_18_030932_create_metadata_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lukisan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info1` varchar(255) NOT NULL,
  `info2` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `info1`, `info2`, `tgl_mulai`, `tgl_akhir`, `created_at`, `updated_at`) VALUES
(1, 'IT Helpdesk', 'BPJS Kesehatan', '2024-12-17', '2024-12-20', '2024-12-17 01:59:52', '2024-12-17 09:54:04'),
(2, 'Web Development', 'Bootcamp Green Academy', '2024-02-19', '2024-06-24', '2024-12-17 20:40:40', '2024-12-17 20:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `avatar`) VALUES
(1, 'Hamzah Doank', 'hamzahdoank32@gmail.com', NULL, NULL, NULL, '2024-12-16 08:45:31', '2024-12-16 21:55:42', '101074230672145363893', '101074230672145363893.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
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
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
