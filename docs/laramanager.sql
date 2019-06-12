-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2019 at 08:07 PM
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
(1, '2019_06_12_000000_create_tb_usuarios_table', 1),
(2, '2019_06_12_000001_create_tb_clientes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(10) UNSIGNED NOT NULL COMMENT 'Id único',
  `nome` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nome cliente',
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email contato',
  `telefone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Fone contato',
  `foto` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Foto perfil',
  `status` enum('ON','OFF') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ON' COMMENT 'Status cliente',
  `dt_created` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Data criação',
  `dt_lastchanged` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Última alteração',
  `fk_id_user` int(10) UNSIGNED DEFAULT NULL COMMENT 'Usuário responsável'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nome`, `email`, `telefone`, `foto`, `status`, `dt_created`, `dt_lastchanged`, `fk_id_user`) VALUES
(22, 'teste', 'teste@teste.com', '4899154018', 'clientes/E6NoY0ohBzz95IcSmA9lfgh2Wjd0hBEMsvTJdnvr.jpeg', 'ON', '2019-06-12 16:57:55', '2019-06-12 16:57:55', 1),
(23, 'Carlos Eduardo da Silva', 'carlosedasilva@gmail.com', '4899154018', 'clientes/o1a1HyPyjZXIqsT9jdIQ9VrPvgKUeoinYQNtibax.jpeg', 'ON', '2019-06-12 16:58:19', '2019-06-12 16:58:19', 1),
(24, 'Carlos Eduardo da Silva', 'carlosedasilva@gmail.com', '4899154018', 'clientes/gSmbbGyyxuxwlW05Y3ZXvtJ1CfGEJrXy2iJH5XUF.jpeg', 'ON', '2019-06-12 17:00:34', '2019-06-12 17:00:34', 1),
(25, 'Carlos Eduardo da Silva', 'carlosedasilva@gmail.com', '4899154018', 'clientes/ptzyFyMckDsLn0llAuyNxJsGz4rE40zseRRlsdKy.jpeg', 'ON', '2019-06-12 17:00:55', '2019-06-12 17:00:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_user` int(10) UNSIGNED NOT NULL COMMENT 'Id único',
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Login',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Senha',
  `dt_created` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Data criação',
  `dt_lastchanged` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Data alteração'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_user`, `username`, `password`, `dt_created`, `dt_lastchanged`) VALUES
(1, 'admin@admin.com.br', 'admin', '2019-06-12 11:33:33', '2019-06-12 11:33:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_tb_clientes_tb_usuarios_idx` (`fk_id_user`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id único', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id único', AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD CONSTRAINT `fk_tb_clientes_tb_usuarios_idx` FOREIGN KEY (`fk_id_user`) REFERENCES `tb_usuarios` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
