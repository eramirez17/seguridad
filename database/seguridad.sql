-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 04:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seguridad`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` enum('_blank','_self','_parent','_top') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `level` set('root','node','child') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `link`, `caption`, `abstract`, `target`, `parent_id`, `level`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Seguridad', 'Sección de seguridad', '_self', NULL, 'root', '2021-03-09 04:27:19', '2021-03-26 18:16:21'),
(2, 'users.index', 'Usuarios', 'Listar, ver, crear, modificar y eliminar usuarios', '_self', 1, 'node', '2021-03-09 04:27:19', '2021-03-26 18:17:15'),
(3, 'profiles.index', 'Perfiles', 'listar, ver, crear, modificar, eliminar perfiles', '_self', 1, 'node', '2021-03-09 04:27:19', '2021-03-26 18:23:31'),
(4, 'options.index', 'Opciones', 'listar, ver, crear, modificar, eliminar opciones del sistema', '_self', 1, 'node', '2021-03-09 04:27:19', '2021-03-26 18:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `option_profile`
--

CREATE TABLE `option_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `profile_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_profile`
--

INSERT INTO `option_profile` (`id`, `option_id`, `profile_id`, `created_at`, `updated_at`) VALUES
(11, 1, 1, NULL, NULL),
(12, 2, 1, NULL, NULL),
(13, 3, 1, NULL, NULL),
(14, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `caption`, `abstract`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Administrador del sistema', '2021-03-09 04:27:19', '2021-03-13 04:51:54'),
(8, 'Doctores', 'Para los doctores del hospital y la posta', '2021-03-13 04:50:10', '2021-03-13 04:50:10'),
(10, 'enfermero', 'enfermero de la posta y el hospital', '2021-03-13 16:46:36', '2021-03-13 16:46:36'),
(11, 'Seguridad', 'Personal de Seguridad modificado', '2021-03-14 16:24:15', '2021-03-14 16:24:34'),
(12, 'Invitado', 'Para usuarios auto registrados a la espera de confirmación de perfil', '2021-03-14 17:40:09', '2021-03-14 17:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Alberta Rippin', 'elouise.runolfsson@example.com', '2021-03-09 04:27:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'Ky2McXV7ay', '2021-03-09 04:27:20', '2021-03-09 04:27:20'),
(13, 'Jasper Fahey III', 'lourdes.cartwright@example.com', '2021-03-09 04:27:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2UP5knG2jX', '2021-03-09 04:27:20', '2021-03-09 04:27:20'),
(20, 'Cleveland Jacobi DVM', 'batz.elyse@example.net', '2021-03-09 04:27:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'pJ3spaWDIv', '2021-03-09 04:27:20', '2021-03-09 04:27:20'),
(31, 'evelio ramirez', 'eramrezg@gmail.com', NULL, '$2y$10$U4BjwH/.eHkwqnYlstMcluV.hoxyl4ui3yPRUf.4QLVGpr7IViVeG', 1, NULL, '2021-03-10 02:47:26', '2021-03-10 02:47:26'),
(35, 'maria torres de ramirez', 'maria.torresl@gmail.com', NULL, '$2y$10$sSL3aDxzQZCDFtOKi3Cc/OjNzZCEIZhh94LGc8hTKjFq7Duynk0ky', 11, NULL, '2021-03-13 18:45:59', '2021-03-14 16:34:45'),
(36, 'Eliecer Cedano', 'eliecer.cedanob@gmail.com', NULL, '$2y$10$U4BjwH/.eHkwqnYlstMcluV.hoxyl4ui3yPRUf.4QLVGpr7IViVeG', 10, NULL, '2021-03-14 16:47:13', '2021-03-15 00:01:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `option_profile`
--
ALTER TABLE `option_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_profile_option_id_foreign` (`option_id`),
  ADD KEY `option_profile_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_profile_id_foreign` (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `option_profile`
--
ALTER TABLE `option_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `option_profile`
--
ALTER TABLE `option_profile`
  ADD CONSTRAINT `option_profile_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `option_profile_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
