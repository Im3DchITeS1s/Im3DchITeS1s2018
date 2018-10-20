-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:30:23
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
-- Estructura de tabla para la tabla `cantidad_alumno`
--

CREATE TABLE `cantidad_alumno` (
  `id` int(10) UNSIGNED NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `fkcarrera_grado` int(10) UNSIGNED NOT NULL,
  `fkseccion` int(10) UNSIGNED NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cantidad_alumno`
--

INSERT INTO `cantidad_alumno` (`id`, `cantidad`, `fkcarrera_grado`, `fkseccion`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 5, '2018-10-18 05:35:47', '2018-10-18 05:35:47'),
(2, 5, 2, 1, 5, '2018-10-18 05:35:47', '2018-10-18 05:35:47'),
(3, 5, 3, 2, 5, '2018-10-18 05:35:47', '2018-10-18 05:35:47'),
(4, 10, 8, 1, 5, '2018-10-19 23:44:23', '2018-10-19 23:44:23'),
(5, 40, 5, 1, 5, '2018-10-19 23:44:42', '2018-10-19 23:44:42'),
(6, 40, 4, 2, 5, '2018-10-19 23:44:50', '2018-10-19 23:44:50'),
(7, 40, 4, 3, 5, '2018-10-19 23:44:58', '2018-10-19 23:44:58'),
(8, 40, 8, 3, 5, '2018-10-19 23:45:07', '2018-10-19 23:45:07'),
(9, 40, 11, 1, 5, '2018-10-19 23:45:18', '2018-10-19 23:45:18'),
(10, 40, 5, 1, 5, '2018-10-19 23:45:26', '2018-10-19 23:45:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantidad_alumno`
--
ALTER TABLE `cantidad_alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cantidad_alumno_fkcarrera_grado_foreign` (`fkcarrera_grado`),
  ADD KEY `cantidad_alumno_fkseccion_foreign` (`fkseccion`),
  ADD KEY `cantidad_alumno_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantidad_alumno`
--
ALTER TABLE `cantidad_alumno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cantidad_alumno`
--
ALTER TABLE `cantidad_alumno`
  ADD CONSTRAINT `cantidad_alumno_fkcarrera_grado_foreign` FOREIGN KEY (`fkcarrera_grado`) REFERENCES `carrera_grado` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cantidad_alumno_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cantidad_alumno_fkseccion_foreign` FOREIGN KEY (`fkseccion`) REFERENCES `seccion` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
