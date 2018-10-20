-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:32:08
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
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `descripcion`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, 'Magisterio de Educación Infantil Bilingüe Intelcultural', '---', 5, '2018-10-18 05:35:43', '2018-10-19 23:34:29'),
(2, 'Perito en Administración', '---', 5, '2018-10-18 05:35:43', '2018-10-19 23:35:44'),
(3, 'Bachiller en Ciencias y Letras con Orientación en Educación', '--', 5, '2018-10-19 23:36:11', '2018-10-19 23:36:11'),
(4, 'Bachiller en Ciencias y Letras con Orientación en Computación', '--', 5, '2018-10-19 23:36:40', '2018-10-19 23:36:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carrera_nombre_unique` (`nombre`),
  ADD KEY `carrera_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
