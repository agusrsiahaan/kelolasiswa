-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2020 at 06:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelolasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `judul`, `slug`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Forum Pertama', 'forum-pertama', 'Ini adalah forum pertama', 1, '2019-12-11 08:00:00', '2020-05-08 05:02:31'),
(2, 'Forum Kedua', 'forum-kedua', 'Forum Kedua', 1, '2020-05-07 12:59:52', '2020-05-07 12:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Guru Matematika', '01122', 'Batam', '2020-05-22 05:27:53', '2020-05-23 05:27:53'),
(2, 'Guru Bahasa', '02211', 'Batam', '2020-05-08 05:27:53', '2020-05-21 05:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `parent` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `created_at`, `updated_at`) VALUES
(2, 'B-001', 'Bahasa Indonesia', 'Ganjil', 2, '2020-04-23 02:34:57', '2020-04-18 02:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 90, '2020-04-16 02:38:34', '2020-04-17 02:38:35'),
(2, 5, 2, 87, '2020-04-30 02:38:35', '2020-04-17 02:38:35'),
(13, 10, 1, 83, '2020-05-04 13:11:04', '2020-05-04 13:11:04'),
(14, 10, 2, 98, '2020-05-04 13:11:13', '2020-05-04 13:11:13'),
(15, 11, 1, 68, '2020-05-04 13:14:45', '2020-05-04 13:14:45'),
(16, 11, 2, 87, '2020-05-04 13:14:54', '2020-05-04 13:14:54'),
(17, 12, 1, 96, '2020-05-04 13:23:31', '2020-05-04 13:23:31'),
(18, 12, 2, 85, '2020-05-04 13:23:41', '2020-05-04 13:23:41'),
(19, 13, 1, 88, '2020-05-04 13:25:06', '2020-05-04 13:25:06'),
(20, 13, 2, 98, '2020-05-04 13:25:15', '2020-05-04 13:25:15');

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
(3, '2020_04_29_014120_create_siswa_table', 1),
(4, '2020_04_30_033801_add_avatar_to_siswa_table', 2),
(5, '2020_04_30_125034_add_role_email_to_users_table', 3),
(6, '2020_04_30_130515_add_user_id_to_siswa_table', 4),
(7, '2020_05_01_022313_create_mapel_table', 5),
(8, '2020_05_01_022709_create_mapel_siswa_table', 6),
(9, '2020_05_03_051848_create_guru_table', 7),
(10, '2020_05_03_052250_add_guru_id_to_mapel_table', 8),
(11, '2020_05_05_082043_create_post_table', 9),
(12, '2020_05_07_040418_create_table_forum', 10),
(13, '2020_05_07_040823_create_table_komentar', 11);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ini berita pertama', 'Ini berita pertama yg diinput secara manual ', 'ini-berita-pertama', '', '2020-05-05 08:28:42', '2020-05-07 08:28:42'),
(2, 1, 'Ini berita Kedua', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ini-berita-kedua', '', '2020-05-06 05:16:41', '2020-05-09 05:16:41'),
(3, 1, 'Ini berita ketiga', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ini-berita-ketiga', '', '2020-05-06 05:16:41', '2020-05-07 05:16:41'),
(6, 1, 'TITLE KEENAM', '<p>fbsfsdfsdfgsdfgsdfgsdfgsdfgewrqweqwesasd</p>', 'title-keenam', '1.jpg', '2020-05-06 16:10:23', '2020-05-06 16:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_depan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
(5, 5, 'Aldo', 'Siahaan', 'L', 'KP', 'Batam', '4vO_eg5y_400x400.jpg', '2020-04-30 20:21:17', '2020-05-04 13:14:25'),
(10, 15, 'Agus Ronaldo', 'Siahaan', 'L', 'KP', 'Batam', 'Agus.JPG', '2020-05-04 13:10:34', '2020-05-04 13:10:34'),
(11, 16, 'Wayne', 'Rooney', 'L', 'KK', 'Manchester', '4vO_eg5y_400x400.jpg', '2020-05-04 13:12:00', '2020-05-04 13:12:00'),
(12, 17, 'Robin', 'Van Persie', 'L', 'I', 'London', '4vO_eg5y_400x400.jpg', '2020-05-04 13:15:39', '2020-05-04 13:15:39'),
(13, 18, 'Monalisa', 'Aritonang', 'L', 'KP', 'Batam', '4vO_eg5y_400x400.jpg', '2020-05-04 13:24:51', '2020-05-04 13:24:51'),
(19, 24, 'testasas', 'test', 'L', 'K', 'asdadasd', '4vO_eg5y_400x400.jpg', '2020-05-04 14:06:09', '2020-05-04 14:06:09'),
(20, 27, 'Agus Ronaldo', 'Siahaan', 'L', 'KP', 'Batam', NULL, '2020-05-05 14:53:00', '2020-05-05 14:53:00'),
(24, 0, 'ALDY', 'KURNIAWAN', 'L', 'I', 'NONGSA', NULL, '2020-05-07 10:18:57', '2020-05-07 10:18:57'),
(25, 0, 'PARATAMA', 'AGUSTIAN', 'L', 'I', 'BENGKONG', NULL, '2020-05-07 10:18:57', '2020-05-07 10:18:57'),
(26, 0, 'ANGGA', 'ADRIANTO', 'L', 'H', 'BATU AJI', NULL, '2020-05-07 10:18:57', '2020-05-07 10:18:57'),
(27, 28, 'Bruno', 'Fernandes', 'L', 'KK', 'Manchester', NULL, '2020-05-07 10:50:34', '2020-05-07 10:50:34'),
(28, 29, 'Aron', 'Wan Bisaka', 'L', 'KP', 'London', NULL, '2020-05-07 11:00:52', '2020-05-07 11:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Agus R Siahaan', 'agusronaldo2@gmail.com', '$2y$10$ZwpCzoH290exOWbykaTxZueyrlwBQh4.YVtWMNenCS3oepDctcyZu', 'xXSkK6VLcgLRBUNRFcENu1jC2VMAnBsJ1UUXFVDenz48HbdLgQwvLNJaupvv', '2020-04-30 10:00:54', '2020-04-30 10:00:54'),
(5, 'siswa', 'aldo siahaan', 'aldosiahaan@cprvision.com', '$2y$10$tYZVtgRXSPf3BSBLIGK7Z.s6M1io0k04NI.okuk6NNwi2UVA.ENQO', 'Jz9R4S9bpN0EjZcE0hgOHR01hkpLEpjWmVUV8DqBcB3k2ukSG73jUq78H8cu', '2020-04-30 20:21:17', '2020-05-01 13:05:24'),
(15, 'siswa', 'Agus Ronaldo Siahaan', 'agusronaldo@gmail.com', '$2y$10$jsDQEG0MvjHP8vLI8Pc98uCoDfB5QUcgR5NEU/F3Yo9XRUtFktwPK', 's4FEwQhaEMI35IrRSwfNTESv7gAsRoC4MaVMM8dLgUSPyBZWmkczH2dkgSWX', '2020-05-04 13:10:34', '2020-05-04 13:10:34'),
(16, 'siswa', 'Wayne Rooney', 'wayne@rooney.com', '$2y$10$miob5SRMn7meDn8pDKKpWun1/1sFjo4PFZcIc53u2TYwy77w5LWeW', 'FsJLRHX83v5XR46b5wP1nBCgBQtuECkX7zlkqNIDhMZMav5o13qB3ShW1jFy', '2020-05-04 13:12:00', '2020-05-04 13:12:00'),
(17, 'siswa', 'Robin Van Persie', 'robin@vanpersi.com', '$2y$10$Dm6Qv5l7oxFBMA.CXO5wSedl6NLnDODKBR7ISq.SsumHlpaTeTvli', '6ljSjXyLjiTOI8Cys25ogkpQh4F7deAXZkouqSTvbishMeBzgf0fBLBD2Udz', '2020-05-04 13:15:39', '2020-05-04 13:15:39'),
(18, 'siswa', 'Monalisa Aritonang', 'monaaritonang3@gmail.com', '$2y$10$Ev8YbbTDAasfWe1XLoTroOhyEAHWJXGpE1EG43KPpPTD8DC.PPIla', 'JbYBpY6mjinbK8O7S3kBc3pYCZOHeosTSUd0zZxyviHcesnZgfnh18gRBVJy', '2020-05-04 13:24:51', '2020-05-04 13:24:51'),
(24, 'siswa', 'testasas test', 'test@test.com', '$2y$10$mkvz39mIS9pNeOv4xMaExOsyxCNVbZuXgZOXjF4sG0c2v7JiI0cHu', 'ADjdAwZIQ7QiXANmZSaRVsUhnTFc41S8UWH63WyNiwDIj6cRiTEAWThCZpiq', '2020-05-04 14:06:09', '2020-05-04 14:06:09'),
(27, 'siswa', 'Agus Ronaldo Siahaan', 'agus@gmail', '$2y$10$f/xqGhr1nG27ouF54CPpc.TajE6TA/LF8zeZdk341NsuirAjepoR.', 'aoRGPB8DqzLEirkm7pWAeTfa6IytBk6xjUDiQdBNWo2v9XrawTx2aAFWzJ2I', '2020-05-05 14:53:00', '2020-05-05 14:53:00'),
(28, 'siswa', 'Bruno Fernandes', 'bruno@fernandes.com', '$2y$10$OsUEaiZJM8uYcRrFSpw9b.v6AKUAwmK/L.p9Jqm2fySY2P6U583Zq', 'tesbIGIcrQ5LiP9JNBRRk3Gl6UDh9bP5BTvCAdxeL4zwQjUHRjaj2EZVddrf', '2020-05-07 10:50:34', '2020-05-07 10:50:34'),
(29, 'siswa', 'Aron Wan Bisaka', 'aron@wanbisaka.com', '$2y$10$upRnvgfLQS58.ppGz3BsaOflb16QsWDYIgFl6E4XMY.0BudIkA1Tm', 'NCnTYDhGBXZaMpIa25pbAKvvavM7h94DZyM0m6SzjN0W1ElzTnEyg490dDZj', '2020-05-07 11:00:52', '2020-05-07 11:00:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
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
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
