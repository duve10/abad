-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 09:00:23
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `auditores_abad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id`, `descripcion`) VALUES
(1, 'D.N.I.'),
(2, 'R.U.C.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `id_usuario_creador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `documento`, `id_documento`, `id_usuario_creador`) VALUES
(1, 'EMPRESA 1', '123', 2, 19),
(2, 'EMPRESA2', '125213', 2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'Auditor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `apellido_paterno` varchar(250) NOT NULL,
  `apellido_materno` varchar(250) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `idrol` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_usuario`, `password`, `nombres`, `apellido_paterno`, `apellido_materno`, `id_documento`, `documento`, `direccion`, `telefono`, `correo`, `foto`, `idrol`, `estado`) VALUES
(19, 'user1', '123', 'Anderson222', 'Romero111', 'Loarte', 1, '1234', '', '', '', NULL, 1, 0),
(20, 'user2', '123', 'Anderson222', 'Romero11133', 'Loarte', 2, '545', '', '', '', NULL, 1, 0),
(22, 'user3', '123', 'asdasd', 'adsd', 'asd', 1, '', '', '', '', NULL, 1, 0),
(23, 'user3', 'asdsad', 'asdasd', 'asdfasd', 'dsafasd', 1, '', '', '', '', NULL, 1, 1),
(24, 'user3', 'asdasd', 'asd', 'dasd', 'asdf', 1, '', '', '', '', NULL, 1, 0),
(25, 'USER4', '$2y$10$2SHwgrePZCiMe8jKN/b80uG5ULCA8USS1byld8SDqEoX8cSPCO1h.', 'Wayne', 'Lopez', 'Rivas', 1, '', '', '', '', NULL, 1, 0),
(26, 'user5', '$2y$10$8/ULB4Hq1Pc5dIC/1LzBU.LouRAsQqlyww3qP4jhg562wc8kBhHv2', 'nombres', 'apel', 'pale', 1, '', '', '', '', NULL, 1, 1),
(27, 'user09', '$2y$10$B6vtXCG/ph8kzOnXHD.px.wykzFYODc7VnyGbWGhOzaGGpps/DCgO', 'User', 'normal', 'nromal', 1, '', '', '', '', NULL, 1, 1),
(28, 'user10', '$2y$10$QJwq5sMy6Tpy7PQ/Bm/wvODVSYyZASeiuWiWWCmhT.qEh8FTx4Kh2', 'asda', 'sdas', 'asdas', 2, '', '', '', '', NULL, 2, 1),
(29, 'user20', '$2y$10$I7Pdytp3cfqwm4WGoZe5y.p16NZvithQ.sw5bg.Drqu6koU5oLVIO', 'usuario ', 'apeli', 'apelli', 1, '', '', '', '', NULL, 2, 1),
(30, 'userr1', '$2y$10$df6hZRTNYd5LzO.IYeyTcejpF6ixOBUSUjNRkHEtBc6CDliFPF7tG', 'dasds', 'asd', 'asdas', 1, '', '', '', '', NULL, 1, 1),
(31, 'admin', '$2y$10$8VZ/z8T9Y34SQQmEjAYuQuHd.lJUu3HK42KVyRjaMkPPJENI0MrcW', 'asdas', 'dasd', 'sadas', 1, '', '', '', '', '', 1, 1),
(32, 'otro', '$2y$10$65SydnbgVMR4L.q6FcgvYOgmdiR3z3jW.YfL7K1CbKTm.WDExWykG', 'asdas', 'asd', 'asda', 1, '', '', '', '', '919d6d80c1ba4175320220efe01690b8.jpg', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_documento` (`id_documento`),
  ADD KEY `id_usuario_creador` (`id_usuario_creador`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrol` (`idrol`),
  ADD KEY `id_documento` (`id_documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empresa_ibfk_2` FOREIGN KEY (`id_usuario_creador`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
