-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 17:40:03
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
-- Base de datos: `2122_ortizmarc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_camareros`
--

CREATE TABLE `tbl_camareros` (
  `id_camarero` int(11) NOT NULL,
  `nombre_camarero` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_camarero` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email_camarero` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contra_camarero` varchar(32) COLLATE utf8mb4_spanish_ci NOT NULL,
  `img_camarero` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_camareros`
--

INSERT INTO `tbl_camareros` (`id_camarero`, `nombre_camarero`, `apellido_camarero`, `email_camarero`, `contra_camarero`, `img_camarero`) VALUES
(1, 'Cristiano', 'Ronaldo', 'cristiano@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', '../img_camarero/14-12-21-1556725188.jpg'),
(2, 'Raul', 'De Tomas', 'rdt@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', '../img_camarero/14-12-21-rdt.jfif'),
(3, 'Xavi', 'Hernandez', 'xavi@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', '../img_camarero/14-12-21-xavi.jfif'),
(4, 'Leo', 'Messi', 'leo@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', '../img_camarero/14-12-21-mesi.jfif'),
(5, 'Gerard', 'Pique', 'gerard@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', '../img_camarero/14-12-21-pique.webp'),
(6, 'Vinisius', 'Jr', 'vinisius@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', '../img_camarero/14-12-21-vini.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial`
--

CREATE TABLE `tbl_historial` (
  `id_historial` int(11) NOT NULL,
  `id_mesa` int(11) DEFAULT NULL,
  `capacidad_mesa` int(2) DEFAULT NULL,
  `ubicacion_mesa` enum('comedor','terraza') COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `id_horario` int(11) NOT NULL,
  `inicio_horario` time NOT NULL,
  `fin_horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_horario`
--

INSERT INTO `tbl_horario` (`id_horario`, `inicio_horario`, `fin_horario`) VALUES
(1, '13:00:00', '14:00:00'),
(2, '14:00:00', '15:00:00'),
(3, '15:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesas`
--

CREATE TABLE `tbl_mesas` (
  `id_mesa` int(11) NOT NULL,
  `capacidad_mesa` int(2) NOT NULL,
  `ubicacion_mesa` enum('comedor','terraza','sala privada') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_mesas`
--

INSERT INTO `tbl_mesas` (`id_mesa`, `capacidad_mesa`, `ubicacion_mesa`) VALUES
(1, 5, 'terraza'),
(2, 4, 'terraza'),
(3, 3, 'terraza'),
(4, 2, 'terraza'),
(5, 1, 'terraza'),
(6, 5, 'comedor'),
(7, 4, 'comedor'),
(8, 3, 'comedor'),
(9, 2, 'comedor'),
(10, 1, 'comedor'),
(11, 5, 'comedor'),
(12, 4, 'comedor'),
(13, 3, 'comedor'),
(14, 2, 'comedor'),
(15, 1, 'comedor'),
(16, 5, 'comedor'),
(17, 4, 'comedor'),
(18, 3, 'comedor'),
(19, 5, 'comedor'),
(20, 4, 'comedor'),
(22, 8, 'terraza'),
(25, 200, 'sala privada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email_usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contra_usuario` char(32) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telf_usuario` int(9) NOT NULL,
  `img_usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `nombre_usuario`, `email_usuario`, `contra_usuario`, `telf_usuario`, `img_usuario`) VALUES
(1, 'Miguel', 'miguel@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 634549817, '../img_admin/14-12-21-miguel.jpg'),
(2, 'Cristian', 'cristian@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 633122211, '../img_admin/14-12-21-cristian.jpg'),
(3, 'Marc', 'marc@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 635779744, '../img_admin/14-12-21-marc.jpg'),
(4, 'Ivan', 'ivan@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 639294509, '../img_admin/14-12-21-aguinaga.jfif'),
(5, 'Isaac', 'isaac@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 645678904, '../img_admin/14-12-21-isaac.png'),
(6, 'Raul', 'raul@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 634838321, '../img_admin/14-12-21-raul.jpg'),
(7, 'Sergio', 'sergio@gmail.com', 'bd4f881f9422e07ed3ee9da1284e4ef3', 657887654, '../img_admin/14-12-21-sergio.gif');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_camareros`
--
ALTER TABLE `tbl_camareros`
  ADD PRIMARY KEY (`id_camarero`);

--
-- Indices de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `fk_id_mesa_historial` (`id_mesa`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD PRIMARY KEY (`id_horario`);

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
-- AUTO_INCREMENT de la tabla `tbl_camareros`
--
ALTER TABLE `tbl_camareros`
  MODIFY `id_camarero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD CONSTRAINT `fk_id_mesa_historial` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesas` (`id_mesa`),
  ADD CONSTRAINT `tbl_historial_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `tbl_horario` (`id_horario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
