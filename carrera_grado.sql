-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:40:42
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
-- Estructura de tabla para la tabla `carrera_grado`
--

CREATE TABLE `carrera_grado` (
  `id` int(10) UNSIGNED NOT NULL,
  `fkcarrera` int(10) UNSIGNED NOT NULL,
  `fkgrado` int(10) UNSIGNED NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrera_grado`
--

INSERT INTO `carrera_grado` (`id`, `fkcarrera`, `fkgrado`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2018-10-18 05:35:46', '2018-10-18 05:35:46'),
(2, 1, 2, 5, '2018-10-18 05:35:47', '2018-10-18 05:35:47'),
(3, 2, 1, 5, '2018-10-18 05:35:47', '2018-10-18 05:35:47'),
(4, 4, 1, 5, '2018-10-18 05:35:47', '2018-10-19 23:37:41'),
(5, 2, 1, 5, '2018-10-19 23:37:08', '2018-10-19 23:37:08'),
(6, 2, 2, 5, '2018-10-19 23:37:19', '2018-10-19 23:37:29'),
(7, 4, 2, 5, '2018-10-19 23:37:53', '2018-10-19 23:37:53'),
(8, 4, 3, 5, '2018-10-19 23:38:01', '2018-10-19 23:38:01'),
(9, 1, 3, 5, '2018-10-19 23:38:11', '2018-10-19 23:38:11'),
(10, 3, 1, 5, '2018-10-19 23:38:24', '2018-10-19 23:38:24'),
(11, 3, 2, 5, '2018-10-19 23:38:32', '2018-10-19 23:38:32'),
(12, 3, 3, 5, '2018-10-19 23:38:38', '2018-10-19 23:38:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera_grado`
--
ALTER TABLE `carrera_grado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_grado_fkcarrera_foreign` (`fkcarrera`),
  ADD KEY `carrera_grado_fkgrado_foreign` (`fkgrado`),
  ADD KEY `carrera_grado_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera_grado`
--
ALTER TABLE `carrera_grado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera_grado`
--
ALTER TABLE `carrera_grado`
  ADD CONSTRAINT `carrera_grado_fkcarrera_foreign` FOREIGN KEY (`fkcarrera`) REFERENCES `carrera` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrera_grado_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrera_grado_fkgrado_foreign` FOREIGN KEY (`fkgrado`) REFERENCES `grado` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
