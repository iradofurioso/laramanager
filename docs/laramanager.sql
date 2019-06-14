-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2019 at 05:17 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laramanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_12_000000_create_tb_users_table', 1),
(2, '2019_06_12_000001_create_tb_customers_table', 1),
(3, '2019_06_12_000002_create_tb_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customers`
--

CREATE TABLE `tb_customers` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Id único',
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nome cliente',
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email contato',
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Fone contato',
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Foto perfil',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 inativo, 1 ativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fk_id_user` int(10) UNSIGNED DEFAULT NULL COMMENT 'Usuário responsável'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_customers`
--

INSERT INTO `tb_customers` (`id`, `name`, `email`, `phone`, `photo`, `status`, `created_at`, `updated_at`, `fk_id_user`) VALUES
(5, 'Teste Cliente', 'teste@cliente.com', '3333-4444', '1560486420-ori.jpeg', '1', '2019-06-14 03:31:29', '2019-06-14 03:31:29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_password_resets`
--

CREATE TABLE `tb_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Id único',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nome do usuário',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email e login',
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Foto perfil',
  `email_verified_at` timestamp NULL DEFAULT NULL COMMENT 'Verificação email',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Senha',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 inativo, 1 ativo',
  `role` enum('admin','custom') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'custom' COMMENT 'Privilégio usuário',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `profile_pic`, `email_verified_at`, `password`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Test User', 'admin@admin.com', 'teste.jpg', NULL, '$2y$10$g62bg0TytuAhqE6C56dNs.TQtGjMf76VKnBfFfrha1h3Dlzjd3Kzy', '1', 'admin', 'iyl8I6cUJKMxFH7jg57u7H4mRTYC5PlZqazyhkaOZFkPedK1V3UKP2AZPlPY', '2019-06-14 03:31:29', '2019-06-14 03:31:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customers`
--
ALTER TABLE `tb_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_customers_tb_users_idx` (`fk_id_user`);

--
-- Indexes for table `tb_password_resets`
--
ALTER TABLE `tb_password_resets`
  ADD KEY `tb_password_resets_email_index` (`email`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_customers`
--
ALTER TABLE `tb_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id único', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id único', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_customers`
--
ALTER TABLE `tb_customers`
  ADD CONSTRAINT `fk_tb_customers_tb_users_idx` FOREIGN KEY (`fk_id_user`) REFERENCES `tb_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
