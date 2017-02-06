-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2015 a las 21:23:34
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pysoil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llaves`
--

CREATE TABLE IF NOT EXISTS `llaves` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `llaves`
--

INSERT INTO `llaves` (`id`, `nombre`) VALUES
(1, 'llave #1'),
(2, 'llave #2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidores`
--

CREATE TABLE IF NOT EXISTS `medidores` (
  `id` int(11) NOT NULL,
  `NIC` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `os` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecibido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `diametro` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medidores`
--

INSERT INTO `medidores` (`id`, `NIC`, `marca`, `serial`, `os`, `fechaRecibido`, `observacion`, `numero`, `diametro`) VALUES
(1, '22222', 'marca', '1234', 'ni idea', '2015-07-24', 'zczxc', '1234', 'diametro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidoresretirado`
--

CREATE TABLE IF NOT EXISTS `medidoresretirado` (
  `id` int(11) NOT NULL,
  `nic` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `diametro` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `lectura` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `oficina` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRetiro` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medidoresretirado`
--

INSERT INTO `medidoresretirado` (`id`, `nic`, `serial`, `marca`, `diametro`, `lectura`, `oficina`, `fechaRetiro`, `observacion`) VALUES
(1, '22222', 'serial', 'marca', 'diametro', 'lectura', 'oficina', '2015-07-07', NULL),
(2, '22222', 'modificado', 'marca', 'diametro', 'lectura', 'oficina', '2015-07-08', NULL),
(3, '22222', 'modificado', 'marca', 'diametro', 'lectura', 'oficina', '2015-06-29', NULL),
(4, '22222', '1234', 'marca', 'diametro', 'lectura', 'oficina', '2015-07-07', NULL),
(5, '22222', 'modificado', 'marca', 'diametro', 'lectura', 'oficina', '2015-07-08', NULL),
(6, '22222', 'serial', 'marca', 'diametro', 'lectura', 'oficina', '2015-07-07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plomero`
--

CREATE TABLE IF NOT EXISTS `plomero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plomero`
--

INSERT INTO `plomero` (`id`, `nombre`, `codigo`, `estatus`) VALUES
(1, 'plomero1', '123456  ', 'activo'),
(2, 'plomero2', '12222', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `id` int(11) NOT NULL,
  `id_creador` int(11) NOT NULL,
  `id_plomero` int(11) NOT NULL,
  `id_medidor` int(11) DEFAULT NULL,
  `id_medidorRetirado` int(11) DEFAULT NULL,
  `id_llave` int(11) DEFAULT NULL,
  `nic` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `osCorte` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lecturaInicial` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaCorte` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `osReconexion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lecturaFinal` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaReconexion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `piezaRetirada` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipoOs` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaResolucion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `materiales` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaCreacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipoServicio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `campoExtra` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `id_creador`, `id_plomero`, `id_medidor`, `id_medidorRetirado`, `id_llave`, `nic`, `osCorte`, `lecturaInicial`, `estatus`, `fechaCorte`, `estado`, `osReconexion`, `lecturaFinal`, `fechaReconexion`, `observacion`, `piezaRetirada`, `tipoOs`, `fechaResolucion`, `materiales`, `fechaCreacion`, `tipoServicio`, `campoExtra`) VALUES
(1, 1, 1, NULL, NULL, NULL, 'nic', '2015-07-23', 'lectura', NULL, '2015-07-23', NULL, 'osRecno', 'lecturaFinal', 'fechaReconexion', 'observacion', NULL, NULL, NULL, NULL, '2015-07-23', 'tipoServicio', NULL),
(2, 1, 1, NULL, NULL, NULL, 'nic', '2015-07-24', 'lectura', NULL, '2015-07-24', NULL, 'osRecno', 'lecturaFinal', 'fechaReconexion', 'observacion', NULL, NULL, NULL, NULL, '2015-07-24', 'tipoServicio', NULL),
(3, 1, 1, NULL, NULL, NULL, '1234', '1312', '12123', NULL, '2015-07-01', NULL, '12321', '12312', '2015-07-02', 'hola mundo', NULL, NULL, NULL, NULL, '2015-07-23', 'SUSPENSION', NULL),
(5, 1, 1, NULL, NULL, NULL, '1234', '1312', '12123', 'q231', '2015-07-08', 'asd', '12321', '12312', '2015-07-07', 'qweqwe', 'pala', NULL, NULL, NULL, '2015-07-23', 'SELLADO', NULL),
(6, 1, 1, NULL, NULL, NULL, '12312', '1312', '12123', NULL, NULL, NULL, NULL, NULL, NULL, 'qweqw', NULL, NULL, NULL, NULL, '2015-07-23', 'VARIOS', NULL),
(7, 1, 1, 1, 6, 1, '22222', '1312', '123', 'sellado', '2015-07-30', 'activo', 'asdasd', 'a123213', '2015-07-21', 'asd', 'asdas', NULL, NULL, NULL, '2015-07-24', 'INHABILITACION', NULL),
(8, 1, 1, NULL, NULL, NULL, '1123107', '456378', '12123', NULL, '202013-02-11', NULL, '23467', '987', '2015-07-21', ' retiradomedidor', NULL, NULL, NULL, NULL, '2015-07-26', 'SUSPENSION', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_apellido`, `login`, `clave`, `tipo`, `cedula`, `estado`) VALUES
(1, 'Leonor Guzman', 'ronoel54', '1234', 'ANALISTA', '19720106', 'ACTIVO'),
(2, 'Administrador', 'admin', '1234', 'ADMINISTRADOR', '12345', 'activo'),
(3, 'usuario', 'usuario', '1234', 'USUARIO', '123456', NULL),
(4, 'usuario usuario', 'users', '1234', 'USUARIO', '1234', NULL),
(5, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(6, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(7, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(8, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(9, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(10, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(11, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(12, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(13, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL),
(14, 'admin', 'admin', '1234', 'USUARIO', '56789', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `llaves`
--
ALTER TABLE `llaves`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indices de la tabla `medidores`
--
ALTER TABLE `medidores`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indices de la tabla `medidoresretirado`
--
ALTER TABLE `medidoresretirado`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indices de la tabla `plomero`
--
ALTER TABLE `plomero`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `llaves`
--
ALTER TABLE `llaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `medidores`
--
ALTER TABLE `medidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `medidoresretirado`
--
ALTER TABLE `medidoresretirado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `plomero`
--
ALTER TABLE `plomero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
