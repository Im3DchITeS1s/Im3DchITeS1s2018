-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:32:49
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
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id`, `nombre`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, 'Cuarto', 5, '2018-10-18 05:35:43', '2018-10-18 05:35:43'),
(2, 'Quinto', 5, '2018-10-18 05:35:44', '2018-10-18 05:35:44'),
(3, 'Sexto', 5, '2018-10-19 23:36:52', '2018-10-19 23:36:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grado_nombre_unique` (`nombre`),
  ADD KEY `grado_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
