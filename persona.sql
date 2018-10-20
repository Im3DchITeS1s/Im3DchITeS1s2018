-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2018 a las 19:36:51
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
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fktipo_persona` int(10) UNSIGNED NOT NULL,
  `fkpais_departamento` int(10) UNSIGNED NOT NULL,
  `fkgenero` int(10) UNSIGNED NOT NULL,
  `fkestado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `codigo`, `dpi`, `nombre1`, `nombre2`, `nombre3`, `apellido1`, `apellido2`, `apellido3`, `lugar`, `fecha_nacimiento`, `fktipo_persona`, `fkpais_departamento`, `fkgenero`, `fkestado`, `created_at`, `updated_at`) VALUES
(1, 'ADM-0000001', '00000000000', 'Hector', 'Renato', NULL, 'de la Cruz', 'Ojeda', NULL, 'Chiquimulilla', '1993-12-18', 1, 19, 1, 7, '2018-10-18 05:35:40', '2018-10-18 05:35:40'),
(2, 'CAT-0000001', '1111111111111', 'Jose', 'Carlos', NULL, 'MOntepeque', 'Hernandez', NULL, 'Chiquimulilla', '1993-12-18', 5, 19, 1, 7, '2018-10-18 05:35:40', '2018-10-18 05:35:40'),
(3, 'ALU-0000001', '222222222222', 'Leonel', 'Alejandro', NULL, 'de la Cruz', 'Ojeda', NULL, 'Chiquimulilla', '1993-12-18', 6, 19, 1, 7, '2018-10-18 05:35:40', '2018-10-18 05:35:40'),
(4, 'ALU-0000002', '2016165161656', 'Luisa', 'Fernanda', NULL, 'Castillo', 'Chivalán', NULL, 'Chiquimulilla', '2000-10-12', 6, 19, 2, 7, '2018-10-19 23:46:25', '2018-10-19 23:46:25'),
(5, 'ALU-0000003', '2316564616510', 'María', 'Guadalupe', NULL, 'Días', 'Revolorio', NULL, 'Chiquimuillla', '1999-12-02', 6, 19, 2, 7, '2018-10-19 23:47:12', '2018-10-19 23:47:12'),
(6, 'ALU-0000004', '2131233132132', 'Ana', 'Francisca', NULL, 'Chivalàn', 'Artenio', NULL, 'Taxisco', '2000-12-05', 6, 19, 2, 7, '2018-10-19 23:47:58', '2018-10-19 23:47:58'),
(7, 'ALU-0000005', '1313216546564', 'Lester', 'Filiberto', NULL, 'Peralta', 'Ramos', NULL, 'Taxisco', '1990-12-10', 6, 19, 1, 7, '2018-10-19 23:48:31', '2018-10-19 23:48:31'),
(8, 'ALU-0000006', '1216465465465', 'Erika', 'Judith', NULL, 'Landaverde', 'Lopez', NULL, 'Chiqui', '1998-12-12', 6, 19, 2, 7, '2018-10-19 23:49:07', '2018-10-19 23:49:07'),
(9, 'ALU-0000007', '2756994616645', 'Douglas', 'Anglomá', NULL, 'Cruz', 'Jimenez', NULL, 'Taxisco', '1990-12-12', 6, 19, 2, 7, '2018-10-19 23:49:58', '2018-10-19 23:49:58'),
(10, 'ALU-0000008', '2616465465465', 'Cristian', 'Enrique', NULL, 'Huite', 'Hernández', NULL, 'Talpetate', '2001-03-05', 6, 19, 1, 7, '2018-10-19 23:50:44', '2018-10-19 23:50:44'),
(11, 'ALU-0000009', '2315356555465', 'Augusto', 'Odilio', NULL, 'González', 'Contreras', NULL, 'Chiquimulilla, Santa Rosa', '2003-12-08', 6, 19, 1, 7, '2018-10-19 23:51:34', '2018-10-19 23:51:34'),
(18, 'CAT-0000002', '2764654654646', 'Manuel', NULL, NULL, 'cardenas', NULL, NULL, 'pr', '1980-12-12', 5, 18, 1, 7, '2018-10-19 23:56:32', '2018-10-19 23:56:32'),
(19, 'CAT-0000003', '2465646546546', 'Carlos', NULL, NULL, 'Castillo', NULL, NULL, 'afa', '1980-12-05', 5, 5, 1, 7, '2018-10-19 23:57:01', '2018-10-19 23:57:01'),
(20, 'CAT-0000004', '2465464654654', 'Ramon', NULL, NULL, 'Valdez', NULL, NULL, 'fa', '1990-12-02', 5, 5, 1, 7, '2018-10-19 23:57:33', '2018-10-19 23:57:33'),
(21, 'CAT-0000005', '1346465465464', 'Rene', NULL, NULL, 'Mancilla', NULL, NULL, 'fafa', '1950-03-09', 5, 6, 1, 7, '2018-10-19 23:58:00', '2018-10-19 23:58:00'),
(22, 'CAT-0000006', '2464565654648', 'Liliana', NULL, NULL, 'Sarceño', NULL, NULL, 'fa', '1985-01-06', 5, 3, 2, 7, '2018-10-19 23:58:32', '2018-10-19 23:58:32'),
(23, 'CAT-0000007', '5645664654646', 'Viviana', NULL, NULL, 'Amanecer', NULL, NULL, 'fadfafd', '1980-12-08', 5, 21, 2, 7, '2018-10-19 23:59:49', '2018-10-19 23:59:49'),
(24, 'CAT-0000008', '2165456466516', 'Lucia', NULL, NULL, 'Lopez', NULL, NULL, 'fafaf', '1980-03-02', 5, 22, 2, 7, '2018-10-20 00:00:36', '2018-10-20 00:00:36'),
(25, 'CAT-0000009', '2314654654646', 'Amanda', NULL, NULL, 'Martinez', NULL, NULL, 'd', '1995-12-03', 5, 22, 2, 7, '2018-10-20 00:01:40', '2018-10-20 00:01:40'),
(31, 'ALU-0000010', '3234653748567', 'Miguel', 'Agusto', NULL, 'Perez', 'Gallego', NULL, 'Taxisco, Barrio San Miguel', '2003-02-24', 6, 19, 1, 7, '2018-10-20 01:15:00', '2018-10-20 01:15:00'),
(32, 'CAT-0000010', '2145646545616', 'Manuel', 'Antonio', NULL, 'Hernández', 'Cifuentes', NULL, 'Barrio Santiago Chiquimulila', '2000-12-02', 5, 19, 1, 7, '2018-10-20 01:16:56', '2018-10-20 01:16:56'),
(33, 'ALU-0000011', '2226465465106', 'Carlos', 'Rodolfo', NULL, 'Alvares', 'Estrada', NULL, 'Chiquimulilla', '2000-12-01', 6, 19, 1, 7, '2018-10-20 13:38:57', '2018-10-20 13:38:57'),
(34, 'ALU-0000012', '2546065898791', 'Jadilson', 'Omar', NULL, 'Arenas', 'Gonzalez', NULL, 'Taxisco, el astillero', '1999-12-05', 6, 19, 1, 7, '2018-10-20 13:40:03', '2018-10-20 13:40:03'),
(35, 'ALU-0000013', '2164651679050', 'Gabriel', 'Manases', NULL, 'Arevalo', 'Hernandez', NULL, 'Barrio San Pedro Guazacapan', '1998-12-04', 6, 19, 1, 7, '2018-10-20 13:40:52', '2018-10-20 13:40:52'),
(36, 'ALU-0000014', '2167987900561', 'Dayana', 'Judith', NULL, 'Avila', 'Ordoñez', NULL, 'Barrio el MIlagro Chiquimulilla', '2003-01-05', 6, 19, 2, 7, '2018-10-20 13:41:49', '2018-10-20 13:41:49'),
(37, 'ALU-0000015', '2654654650651', 'Dulce', 'Eunice', NULL, 'Diaz', 'Hernandez', NULL, 'Barrio San Pedro Guazacapapn', '1998-12-06', 6, 19, 2, 7, '2018-10-20 13:42:47', '2018-10-20 13:42:47'),
(38, 'ALU-0000016', '2467879810515', 'Gustavo', 'Adolfo', NULL, 'Carias', 'Grijalba', NULL, 'Pedro de Alvarado', '1995-05-05', 6, 12, 1, 7, '2018-10-20 13:43:49', '2018-10-20 13:43:49'),
(39, 'ALU-0000017', '2035645656584', 'Emerson', 'Avidan', NULL, 'Avila', 'Ordoñez', NULL, 'Barrio San MIguel Taxisco', '1996-12-05', 6, 19, 1, 7, '2018-10-20 13:44:52', '2018-10-20 13:44:52'),
(40, 'ALU-0000018', '2154645879798', 'Yosseline', 'Rossemery', NULL, 'Escobar', 'Valenzuela', NULL, 'San Juan Tecuado', '1994-12-05', 6, 19, 2, 7, '2018-10-20 13:45:53', '2018-10-20 13:45:53'),
(41, 'ALU-0000019', '2251656466597', 'Luisa', 'Fernanda', NULL, 'Arevalo', 'Pensamiento', NULL, 'El Maneadero Taxisco', '2000-03-03', 6, 19, 2, 7, '2018-10-20 13:46:59', '2018-10-20 13:46:59'),
(42, 'ALU-0000020', '1154897113211', 'Enrique', 'Augusto', NULL, 'Lima', 'Cerrate', NULL, 'Avellana Taxisco', '2000-12-02', 6, 19, 1, 7, '2018-10-20 13:47:51', '2018-10-20 13:47:51'),
(43, 'ALU-0000021', '1234698716068', 'Kelin', 'Lorena', NULL, 'Garrcia', 'Sanchez', NULL, 'Aldea el Barro Guazacapan', '1993-03-04', 6, 19, 2, 7, '2018-10-20 13:50:21', '2018-10-20 13:50:21'),
(44, 'ALU-0000022', '2134978065646', 'Zaylis', 'Yaneth', NULL, 'Godinez', 'Hernandez', NULL, 'Barrio San Miguel Taxisco', '1999-03-01', 6, 19, 2, 7, '2018-10-20 13:51:22', '2018-10-20 13:51:22'),
(45, 'ALU-0000023', '2148746979777', 'Diego', 'Alejandro', NULL, 'Escobar', 'Alvarez', NULL, 'Barrio el Milagro Chiquimulilla', '2000-12-12', 6, 19, 1, 7, '2018-10-20 13:52:19', '2018-10-20 13:52:19'),
(46, 'ALU-0000024', '3216498798156', 'Grisha', 'Gabriela', NULL, 'Martinez', 'Mendoza', NULL, 'Aldea Margaritas Chiquimulilla', '2001-06-06', 6, 19, 2, 7, '2018-10-20 13:53:10', '2018-10-20 13:53:10'),
(47, 'ALU-0000025', '3134654646546', 'Karina', 'Yulissa', NULL, 'Martinez', 'Benito', NULL, 'Barrio San Sebastian, Guazacapan', '2001-03-06', 6, 19, 2, 7, '2018-10-20 13:53:51', '2018-10-20 13:53:51'),
(48, 'ALU-0000026', '2146487974001', 'Gember', 'Leonel', NULL, 'Hernandez', 'Aguilar', NULL, 'Aldea San Miguel Aroche', '2003-01-01', 6, 19, 1, 7, '2018-10-20 13:54:47', '2018-10-20 13:54:47'),
(49, 'ALU-0000027', '2136786161660', 'Carlos', 'Enrique', NULL, 'Sarceño', 'Vásquez', NULL, 'Calle Nueva Guazacapán', '1998-03-04', 6, 19, 1, 7, '2018-10-20 13:55:44', '2018-10-20 13:55:44'),
(50, 'ALU-0000028', '1324654056146', 'Edvin', 'Rolando', NULL, 'Santos', 'Veliz', NULL, 'Aldea el Tamarindo Chiquimulilla', '1999-05-08', 6, 19, 2, 7, '2018-10-20 13:57:00', '2018-10-20 13:57:00'),
(51, 'ALU-0000029', '1254365468744', 'Olga', 'Marina', NULL, 'Santos', 'Landaverde', NULL, 'Los Mangales Guazacapán', '1999-06-04', 6, 19, 2, 7, '2018-10-20 13:58:02', '2018-10-20 13:58:02'),
(52, 'ALU-0000030', '2134564879816', 'Angela', 'Gabriela', NULL, 'Reyes', 'Esquite', NULL, 'El campamento Chiquimulilla', '2000-04-05', 6, 19, 2, 7, '2018-10-20 13:59:00', '2018-10-20 13:59:00'),
(53, 'ALU-0000031', '1323164654798', 'Carlos', 'Enrique', NULL, 'Rodas', 'Mazariegos', NULL, 'Aldea el Barro Guazacapan', '2001-03-05', 6, 19, 1, 7, '2018-10-20 13:59:55', '2018-10-20 13:59:55'),
(54, 'ALU-0000032', '2156467895616', 'Lorena', 'del Carmen', NULL, 'Morataya', 'Arenas', NULL, 'Barrio San MIguel, Guazacapán', '2000-03-04', 6, 19, 2, 7, '2018-10-20 14:02:05', '2018-10-20 14:02:05'),
(55, 'ALU-0000033', '2145065497864', 'Carlos', 'Humberto', NULL, 'Diaz', 'Sandoval', NULL, 'Colonia los Altos de Chiquimulilla', '1995-03-03', 6, 19, 1, 7, '2018-10-20 14:03:23', '2018-10-20 14:03:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persona_codigo_unique` (`codigo`),
  ADD UNIQUE KEY `persona_dpi_unique` (`dpi`),
  ADD KEY `persona_fktipo_persona_foreign` (`fktipo_persona`),
  ADD KEY `persona_fkpais_departamento_foreign` (`fkpais_departamento`),
  ADD KEY `persona_fkgenero_foreign` (`fkgenero`),
  ADD KEY `persona_fkestado_foreign` (`fkestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_fkestado_foreign` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_fkgenero_foreign` FOREIGN KEY (`fkgenero`) REFERENCES `genero` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_fkpais_departamento_foreign` FOREIGN KEY (`fkpais_departamento`) REFERENCES `pais_departamento` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_fktipo_persona_foreign` FOREIGN KEY (`fktipo_persona`) REFERENCES `tipo_persona` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
