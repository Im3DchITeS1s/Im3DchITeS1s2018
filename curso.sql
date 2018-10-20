-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:32:39
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
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, 'Matematica', 5, '2018-10-18 05:35:43', '2018-10-18 05:35:43'),
(2, 'Estadística General', 5, '2018-10-18 05:35:43', '2018-10-19 23:24:58'),
(3, 'Medio Social y Natural', 5, '2018-10-18 05:35:43', '2018-10-19 23:20:39'),
(4, 'Seminario Sobre problemas de la Educación', 5, '2018-10-19 23:20:28', '2018-10-19 23:20:28'),
(5, 'Estadístia Aplicada a la Educación.', 5, '2018-10-19 23:21:24', '2018-10-19 23:21:24'),
(6, 'Comunicación y Lenguaje Materno LII', 5, '2018-10-19 23:21:37', '2018-10-19 23:21:37'),
(7, 'Comunicación y Lenguaje Segundo Idioma Xinca', 5, '2018-10-19 23:21:54', '2018-10-19 23:21:54'),
(8, 'Expresión Artística y Corporal II Música', 5, '2018-10-19 23:22:23', '2018-10-19 23:22:23'),
(9, 'Psicopedagogía Infantil', 5, '2018-10-19 23:22:34', '2018-10-19 23:22:34'),
(10, 'Planificación y Evaluación', 5, '2018-10-19 23:22:47', '2018-10-19 23:22:47'),
(11, 'Práctica Docente: Observación y Participación', 5, '2018-10-19 23:23:06', '2018-10-19 23:23:06'),
(12, 'Computación', 5, '2018-10-19 23:23:14', '2018-10-19 23:23:14'),
(13, 'Administración Pública II', 5, '2018-10-19 23:24:17', '2018-10-19 23:24:17'),
(14, 'Desarrollo Nacional', 5, '2018-10-19 23:25:08', '2018-10-19 23:25:08'),
(15, 'Legislación Administrativa', 5, '2018-10-19 23:25:18', '2018-10-19 23:25:18'),
(16, 'Hacienda Pública y Presupuesto Nacional', 5, '2018-10-19 23:25:34', '2018-10-19 23:25:34'),
(17, 'Contabilidad Fiscal y Municipal de costos', 5, '2018-10-19 23:25:48', '2018-10-19 23:25:48'),
(18, 'Teoría y Práctica de Planificación', 5, '2018-10-19 23:26:02', '2018-10-19 23:26:02'),
(19, 'Psicología General', 5, '2018-10-19 23:26:12', '2018-10-19 23:26:12'),
(20, 'Programación', 5, '2018-10-19 23:26:23', '2018-10-19 23:26:23'),
(21, 'Gerencia y Administrativa de Personal', 5, '2018-10-19 23:26:46', '2018-10-19 23:26:46'),
(22, 'Presupuesto Nacional II', 5, '2018-10-19 23:26:58', '2018-10-19 23:26:58'),
(23, 'Sistema de Compras II', 5, '2018-10-19 23:27:09', '2018-10-19 23:27:09'),
(24, 'Lengua y Literatura 1', 5, '2018-10-19 23:27:23', '2018-10-19 23:27:23'),
(25, 'Comunicación y Lenguaje L2 Segundo Idioma Nacional', 5, '2018-10-19 23:27:47', '2018-10-19 23:27:47'),
(26, 'Tecnología de la Información y la comunicación aplicada a la Educación', 5, '2018-10-19 23:28:09', '2018-10-19 23:28:09'),
(27, 'Estadística Descriptiva', 5, '2018-10-19 23:28:23', '2018-10-19 23:28:39'),
(28, 'Biología', 5, '2018-10-19 23:28:52', '2018-10-19 23:28:52'),
(29, 'Química', 5, '2018-10-19 23:29:08', '2018-10-19 23:29:08'),
(30, 'Ciencia y Tecnología de los Pueblos', 5, '2018-10-19 23:30:17', '2018-10-19 23:30:17'),
(31, 'Seminario Aplicado a la Educación', 5, '2018-10-19 23:30:33', '2018-10-19 23:30:33'),
(32, 'Ciencias Sociales y Formación Ciudadana', 5, '2018-10-19 23:30:49', '2018-10-19 23:30:49'),
(33, 'Paradígmas Educativos', 5, '2018-10-19 23:31:01', '2018-10-19 23:31:01'),
(34, 'Psicología Evolutiva', 5, '2018-10-19 23:31:11', '2018-10-19 23:31:11'),
(35, 'Identidad y Profesión Docente', 5, '2018-10-19 23:31:27', '2018-10-19 23:31:27'),
(36, 'Expresión Artística', 5, '2018-10-19 23:31:38', '2018-10-19 23:31:38'),
(37, 'Lengua y Literatura 5', 5, '2018-10-19 23:31:57', '2018-10-19 23:31:57'),
(38, 'Comunicación y Lenguaje Inglés Técnico 4', 5, '2018-10-19 23:32:19', '2018-10-19 23:32:19'),
(39, 'Matemática 5', 5, '2018-10-19 23:32:29', '2018-10-19 23:32:29'),
(40, 'Ciencias Sociales y Formación Ciudadana 5', 5, '2018-10-19 23:32:46', '2018-10-19 23:32:46'),
(41, 'Etica Profesional y Relaciones Humanas', 5, '2018-10-19 23:32:57', '2018-10-19 23:32:57'),
(42, 'Reparación y Soporte Técnico', 5, '2018-10-19 23:33:08', '2018-10-19 23:33:08'),
(43, 'Producción de Contenidos Digitales', 5, '2018-10-19 23:33:21', '2018-10-19 23:33:21'),
(44, 'Laboratorio II', 5, '2018-10-19 23:33:32', '2018-10-19 23:33:32'),
(45, 'Seminario', 5, '2018-10-19 23:33:41', '2018-10-19 23:33:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `curso_nombre_unique` (`nombre`),
  ADD KEY `curso_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
