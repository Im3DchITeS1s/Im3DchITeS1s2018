-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:32:20
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
-- Estructura de tabla para la tabla `carrera_curso`
--

CREATE TABLE `carrera_curso` (
  `id` int(10) UNSIGNED NOT NULL,
  `fkcarrera` int(10) UNSIGNED NOT NULL,
  `fkcurso` int(10) UNSIGNED NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrera_curso`
--

INSERT INTO `carrera_curso` (`id`, `fkcarrera`, `fkcurso`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2018-10-18 05:35:45', '2018-10-18 05:35:45'),
(2, 1, 2, 5, '2018-10-18 05:35:45', '2018-10-18 05:35:45'),
(3, 1, 3, 5, '2018-10-18 05:35:45', '2018-10-18 05:35:45'),
(4, 2, 1, 5, '2018-10-18 05:35:45', '2018-10-18 05:35:45'),
(5, 2, 2, 5, '2018-10-18 05:35:46', '2018-10-18 05:35:46'),
(6, 2, 3, 5, '2018-10-18 05:35:46', '2018-10-18 05:35:46'),
(7, 4, 37, 5, '2018-10-19 23:39:22', '2018-10-19 23:39:22'),
(8, 4, 38, 5, '2018-10-19 23:39:36', '2018-10-19 23:39:36'),
(9, 4, 39, 5, '2018-10-19 23:39:46', '2018-10-19 23:39:46'),
(10, 4, 27, 5, '2018-10-19 23:39:57', '2018-10-19 23:39:57'),
(11, 4, 28, 5, '2018-10-19 23:40:06', '2018-10-19 23:40:06'),
(12, 4, 29, 5, '2018-10-19 23:40:15', '2018-10-19 23:40:15'),
(13, 4, 40, 5, '2018-10-19 23:40:31', '2018-10-19 23:40:31'),
(14, 4, 41, 5, '2018-10-19 23:40:41', '2018-10-19 23:40:41'),
(15, 4, 42, 5, '2018-10-19 23:41:20', '2018-10-19 23:41:20'),
(16, 4, 43, 5, '2018-10-19 23:41:40', '2018-10-19 23:41:40'),
(17, 3, 24, 5, '2018-10-19 23:42:01', '2018-10-19 23:42:01'),
(18, 3, 28, 5, '2018-10-19 23:42:34', '2018-10-19 23:42:34'),
(19, 3, 1, 5, '2018-10-19 23:42:44', '2018-10-19 23:42:44'),
(20, 3, 31, 5, '2018-10-19 23:42:54', '2018-10-19 23:42:54'),
(21, 3, 33, 5, '2018-10-19 23:43:03', '2018-10-19 23:43:03'),
(22, 2, 13, 5, '2018-10-20 14:08:51', '2018-10-20 14:08:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera_curso`
--
ALTER TABLE `carrera_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_curso_fkcarrera_foreign` (`fkcarrera`),
  ADD KEY `carrera_curso_fkcurso_foreign` (`fkcurso`),
  ADD KEY `carrera_curso_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera_curso`
--
ALTER TABLE `carrera_curso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera_curso`
--
ALTER TABLE `carrera_curso`
  ADD CONSTRAINT `carrera_curso_fkcarrera_foreign` FOREIGN KEY (`fkcarrera`) REFERENCES `carrera` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrera_curso_fkcurso_foreign` FOREIGN KEY (`fkcurso`) REFERENCES `curso` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrera_curso_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
