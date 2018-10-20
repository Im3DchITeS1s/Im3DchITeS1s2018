-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:47:35
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
-- Estructura de tabla para la tabla `catedratico_curso`
--

CREATE TABLE `catedratico_curso` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `fkpersona` int(10) UNSIGNED NOT NULL,
  `fkcantidad_alumno` int(10) UNSIGNED NOT NULL,
  `fkcarrera_curso` int(10) UNSIGNED NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `catedratico_curso`
--

INSERT INTO `catedratico_curso` (`id`, `fecha_inicio`, `fecha_fin`, `fkpersona`, `fkcantidad_alumno`, `fkcarrera_curso`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01 00:00:00', '2018-12-31 00:00:00', 1, 1, 1, 5, '2018-10-18 05:35:48', '2018-10-18 05:35:48'),
(2, '2018-01-01 00:00:00', '2018-12-31 00:00:00', 1, 2, 2, 5, '2018-10-18 05:35:48', '2018-10-18 05:35:48'),
(3, '2018-01-01 00:00:00', '2018-12-31 00:00:00', 1, 1, 3, 5, '2018-10-18 05:35:48', '2018-10-18 05:35:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catedratico_curso`
--
ALTER TABLE `catedratico_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catedratico_curso_fkpersona_foreign` (`fkpersona`),
  ADD KEY `catedratico_curso_fkcantidad_alumno_foreign` (`fkcantidad_alumno`),
  ADD KEY `catedratico_curso_fkcarrera_curso_foreign` (`fkcarrera_curso`),
  ADD KEY `catedratico_curso_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catedratico_curso`
--
ALTER TABLE `catedratico_curso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catedratico_curso`
--
ALTER TABLE `catedratico_curso`
  ADD CONSTRAINT `catedratico_curso_fkcantidad_alumno_foreign` FOREIGN KEY (`fkcantidad_alumno`) REFERENCES `cantidad_alumno` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `catedratico_curso_fkcarrera_curso_foreign` FOREIGN KEY (`fkcarrera_curso`) REFERENCES `carrera_curso` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `catedratico_curso_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `catedratico_curso_fkpersona_foreign` FOREIGN KEY (`fkpersona`) REFERENCES `persona` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
