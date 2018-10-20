-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:41:14
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
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(10) UNSIGNED NOT NULL,
  `fkcantidad_alumno` int(10) UNSIGNED NOT NULL,
  `fktipo_periodo` int(10) UNSIGNED NOT NULL,
  `fkpersona` int(10) UNSIGNED NOT NULL,
  `ciclo` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pago` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `fkcantidad_alumno`, `fktipo_periodo`, `fkpersona`, `ciclo`, `pago`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2018', '125.', 25, '2018-10-18 05:58:11', '2018-10-18 05:58:24'),
(2, 3, 2, 42, '2018', '120', 25, '2018-10-18 23:07:33', '2018-10-20 14:07:17'),
(3, 1, 1, 53, '2018', '135', 25, '2018-10-20 14:03:53', '2018-10-20 14:03:53'),
(4, 7, 1, 34, '2018', '135', 25, '2018-10-20 14:04:15', '2018-10-20 14:04:15'),
(5, 4, 1, 6, '2018', '135', 25, '2018-10-20 14:05:41', '2018-10-20 14:05:41'),
(6, 6, 1, 55, '2018', '135', 25, '2018-10-20 14:06:06', '2018-10-20 14:06:06'),
(7, 6, 1, 38, '2018', '135', 25, '2018-10-20 14:06:34', '2018-10-20 14:06:34'),
(8, 6, 1, 7, '2018', '135', 25, '2018-10-20 14:06:58', '2018-10-20 14:06:58'),
(9, 6, 1, 47, '2018', '135', 25, '2018-10-20 14:07:38', '2018-10-20 14:07:38'),
(10, 9, 1, 37, '2018', '135', 25, '2018-10-20 14:07:52', '2018-10-20 14:07:52'),
(11, 7, 1, 5, '2018', '135', 25, '2018-10-20 14:08:11', '2018-10-20 14:08:11'),
(12, 7, 1, 41, '2018', '135', 25, '2018-10-20 14:08:26', '2018-10-20 14:08:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscripcion_fkcantidad_alumno_foreign` (`fkcantidad_alumno`),
  ADD KEY `inscripcion_fktipo_periodo_foreign` (`fktipo_periodo`),
  ADD KEY `inscripcion_fkpersona_foreign` (`fkpersona`),
  ADD KEY `inscripcion_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_fkcantidad_alumno_foreign` FOREIGN KEY (`fkcantidad_alumno`) REFERENCES `cantidad_alumno` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_fkpersona_foreign` FOREIGN KEY (`fkpersona`) REFERENCES `persona` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_fktipo_periodo_foreign` FOREIGN KEY (`fktipo_periodo`) REFERENCES `periodo_academico` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
