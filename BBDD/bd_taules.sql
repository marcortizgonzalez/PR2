-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2021 a las 18:36:45
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_taules`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial`
--
CREATE DATABASE bd_taules;
USE bd_taules;


CREATE TABLE `tbl_historial` (
  `id_historial` int(11) NOT NULL,
  `id_mesa` int(11) DEFAULT NULL,
  `capacidad_mesa` int(2) DEFAULT NULL,
  `ubicacion_mesa` enum('comedor','terraza') COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `inicio_reserva` timestamp NULL DEFAULT NULL,
  `fin_reserva` timestamp NULL DEFAULT NULL,
  `email_usuario` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesas`
--

CREATE TABLE `tbl_mesas` (
  `id_mesa` int(11) NOT NULL,
  `capacidad_mesa` int(2) NOT NULL,
  `ubicacion_mesa` enum('comedor','terraza') COLLATE utf8mb4_spanish_ci NOT NULL,
  `inicio_reserva` timestamp NULL DEFAULT NULL,
  `fin_reserva` timestamp NULL DEFAULT NULL,
  `email_usuario` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_mesas`
--

INSERT INTO `tbl_mesas` (`id_mesa`, `capacidad_mesa`, `ubicacion_mesa`, `inicio_reserva`, `fin_reserva`, `email_usuario`) VALUES
(1, 5, 'terraza', NULL, NULL, NULL),
(2, 4, 'terraza', NULL, NULL, NULL),
(3, 3, 'terraza', NULL, NULL, NULL),
(4, 2, 'terraza', NULL, NULL, NULL),
(5, 1, 'terraza', NULL, NULL, NULL),
(6, 5, 'comedor', NULL, NULL, NULL),
(7, 4, 'comedor', NULL, NULL, NULL),
(8, 3, 'comedor', NULL, NULL, NULL),
(9, 2, 'comedor', NULL, NULL, NULL),
(10, 1, 'comedor', NULL, NULL, NULL),
(11, 5, 'comedor', NULL, NULL, NULL),
(12, 4, 'comedor', NULL, NULL, NULL),
(13, 3, 'comedor', NULL, NULL, NULL),
(14, 2, 'comedor', NULL, NULL, NULL),
(15, 1, 'comedor', NULL, NULL, NULL),
(16, 5, 'comedor', NULL, NULL, NULL),
(17, 4, 'comedor', NULL, NULL, NULL),
(18, 3, 'comedor', NULL, NULL, NULL),
(19, 5, 'comedor', NULL, NULL, NULL),
(20, 4, 'comedor', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email_usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contra_usuario` char(32) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telf_usuario` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `nombre_usuario`, `email_usuario`, `contra_usuario`, `telf_usuario`) VALUES
(1, 'Miguel', 'miguel@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 634549817),
(2, 'Cristian', 'cristian@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 633122211),
(3, 'Marc', 'marc@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 635779744);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `fk_id_mesa_historial` (`id_mesa`);

--
-- Indices de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD CONSTRAINT `fk_id_mesa_historial` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesas` (`id_mesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
