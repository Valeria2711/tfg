-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-05-2023 a las 22:21:52
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler_instalaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_deportes`
--

DROP TABLE IF EXISTS `tbl_deportes`;
CREATE TABLE IF NOT EXISTS `tbl_deportes` (
  `id_deporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_deporte`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_deportes`
--

INSERT INTO `tbl_deportes` (`id_deporte`, `nombre`) VALUES
(1, 'Futbol'),
(2, 'Futbol sala'),
(3, 'Baloncesto'),
(4, 'Tenis'),
(5, 'Voleibol'),
(6, 'Padel'),
(7, 'Atletismo'),
(8, 'Balonmano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_deporte_instalacion`
--

DROP TABLE IF EXISTS `tbl_deporte_instalacion`;
CREATE TABLE IF NOT EXISTS `tbl_deporte_instalacion` (
  `id_deporte` int(11) DEFAULT NULL,
  `id_instalacion` int(11) DEFAULT NULL,
  KEY `id_deporte` (`id_deporte`),
  KEY `id_instalacion` (`id_instalacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_deporte_instalacion`
--

INSERT INTO `tbl_deporte_instalacion` (`id_deporte`, `id_instalacion`) VALUES
(1, 6),
(1, 7),
(1, 8),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 11),
(4, 12),
(5, 2),
(5, 3),
(5, 4),
(6, 9),
(6, 10),
(7, 5),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_instalaciones`
--

DROP TABLE IF EXISTS `tbl_instalaciones`;
CREATE TABLE IF NOT EXISTS `tbl_instalaciones` (
  `id_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(25) DEFAULT NULL,
  `fk_precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_instalacion`),
  KEY `fk_precio` (`fk_precio`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_instalaciones`
--

INSERT INTO `tbl_instalaciones` (`id_instalacion`, `denominacion`, `fk_precio`) VALUES
(1, 'Baloncesto', 1),
(2, 'Multideportiva 1 ', 1),
(3, 'Multideportiva 2', 5),
(4, 'Voleibol', 5),
(5, 'Atletismo', 4),
(6, 'Futbol 7 - 1', 5),
(7, 'Futbol 7 - 2', 5),
(8, 'Futbol 11', 3),
(9, 'Padel 1', 1),
(10, 'Padel 2', 1),
(11, 'Tenis 1', 1),
(12, 'Tenis 2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_precios`
--

DROP TABLE IF EXISTS `tbl_precios`;
CREATE TABLE IF NOT EXISTS `tbl_precios` (
  `id_precio` int(11) NOT NULL AUTO_INCREMENT,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`id_precio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_precios`
--

INSERT INTO `tbl_precios` (`id_precio`, `precio`) VALUES
(1, 11),
(2, 5),
(3, 20),
(4, 7),
(5, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

DROP TABLE IF EXISTS `tbl_reservas`;
CREATE TABLE IF NOT EXISTS `tbl_reservas` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fk_instalacion` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_usuario` (`fk_usuario`),
  KEY `fk_instalacion` (`fk_instalacion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`id_reserva`, `fk_instalacion`, `fk_usuario`, `hora_inicio`, `fecha`) VALUES
(3, 11, 7, '09:00:00', '2023-05-31'),
(4, 11, 7, '08:00:00', '2023-05-31'),
(5, 11, 7, '11:00:00', '2023-05-31'),
(7, 11, 7, '14:00:00', '2023-05-31'),
(9, 11, 7, '10:00:00', '2023-05-31'),
(14, 10, 7, '08:00:00', '2023-05-24'),
(38, 4, 7, '13:00:00', '2023-05-30'),
(39, 1, 7, '08:00:00', '2023-05-27'),
(40, 1, 7, '11:00:00', '2023-05-28'),
(41, 5, 7, '08:00:00', '2023-05-30'),
(42, 5, 7, '09:00:00', '2023-05-30'),
(43, 5, 7, '08:00:00', '2023-05-24'),
(44, 9, 7, '08:00:00', '2023-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellidos` varchar(255) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `contrasenna` text,
  `correo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `nombre_apellidos`, `nombre_usuario`, `contrasenna`, `correo`) VALUES
(1, 'Pepe Gónzalez', 'pepito', '$2y$10$ADC.47wcJwNGdajg.lv/Cu5Q8MXipc8gicNlA4Io5ZMS8ipz0Lz62', 'pepito@gmail.com'),
(2, 'María Martín', 'maris', '$2y$10$ADC.47wcJwNGdajg.lv/Cu5Q8MXipc8gicNlA4Io5ZMS8ipz0Lz62', 'maria@gmail.com'),
(6, 'Antonio Banderas', 'tonib', '$2y$10$ADC.47wcJwNGdajg.lv/Cu5Q8MXipc8gicNlA4Io5ZMS8ipz0Lz62', 'toni@gmail.com'),
(7, 'ANA MARTINEZ', 'anam', '123', 'anam@gmial.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios_datos_extra`
--

DROP TABLE IF EXISTS `tbl_usuarios_datos_extra`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios_datos_extra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(13) NOT NULL,
  `genero` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario` (`fk_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios_datos_extra`
--

INSERT INTO `tbl_usuarios_datos_extra` (`id`, `fk_usuario`, `dni`, `fecha_nacimiento`, `direccion`, `telefono`, `genero`) VALUES
(1, 6, '12312312A', '2002-02-12', 'C/Vitoria 2', '+34 676767677', 'F'),
(2, 7, '12312312A', '2001-02-12', 'C/Vitoria 3', '+34 676767676', 'F');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_instalaciones`
--
ALTER TABLE `tbl_instalaciones`
  ADD CONSTRAINT `tbl_instalaciones_ibfk_2` FOREIGN KEY (`fk_precio`) REFERENCES `tbl_precios` (`id_precio`);

--
-- Filtros para la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD CONSTRAINT `tbl_reservas_ibfk_1` FOREIGN KEY (`fk_instalacion`) REFERENCES `tbl_instalaciones` (`id_instalacion`),
  ADD CONSTRAINT `tbl_reservas_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_usuarios_datos_extra`
--
ALTER TABLE `tbl_usuarios_datos_extra`
  ADD CONSTRAINT `tbl_usuarios_datos_extra_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
