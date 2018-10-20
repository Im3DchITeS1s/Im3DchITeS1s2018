-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:41:33
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsistemaimedchi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inactivo` datetime DEFAULT NULL,
  `fkpersona` int(10) UNSIGNED NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`, `fecha_inactivo`, `fkpersona`, `fkestado`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@imedchi.edu.gt', '$2y$10$COJIx.TM2/4Ibw.mmDGQMuFBsfO174ibq45eWgHpZIc.8txlVOCFG', '1', NULL, 1, 11, 'L2A7IF8k0Rg2aqZFo3gsAbbsHR4S63UymTgZ4GW2auwlVnWvBC4Op7FRJVvh', '2018-10-18 05:35:42', '2018-10-18 05:35:42'),
(2, 'Jose', 'jose@imedchi.edu.gt', '$2y$10$5JDWrFqtBiWt3R7/4mg66uef9n43CEqSSqD9smusCjBMAj6tDnjn2', '1', NULL, 2, 11, NULL, '2018-10-18 05:35:42', '2018-10-18 05:35:42'),
(3, 'Alejandro', 'alejandro@imedchi.edu.gt', '$2y$10$NUaognvr49lDPntbtaG.ded1Crf5M2A.Qilz0IbuXnMDiwzFCmW/i', '1', NULL, 3, 11, NULL, '2018-10-18 05:35:42', '2018-10-18 05:35:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_fkpersona_foreign` (`fkpersona`),
  ADD KEY `users_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fkpersona_foreign` FOREIGN KEY (`fkpersona`) REFERENCES `persona` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
