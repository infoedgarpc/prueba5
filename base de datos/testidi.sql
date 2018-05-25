-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2018 a las 05:20:30
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `testidi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores`
--

CREATE TABLE IF NOT EXISTS `monitores` (
  `Id_monitor` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `programa` varchar(100) NOT NULL,
  `semestre` varchar(100) NOT NULL,
  `cedula` int(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_monitor`),
  UNIQUE KEY `cedula` (`cedula`),
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `monitores`
--

INSERT INTO `monitores` (`Id_monitor`, `nombres`, `apellidos`, `programa`, `semestre`, `cedula`, `email`) VALUES
(16, 'Edgar Julian', 'Paez Carrillo', 'Ingenieria de sistemas', '10', 1140830642, 'edgarpaezcarrillo@hotmail.com'),
(17, 'Maria Jose', 'Carreño Julio', 'contaduria publica', '10', 1126543678, 'majocarre@gmail.com'),
(18, 'Fabio Henrique', 'Perez Sanchez', 'ingenieria industrial', '8', 1140987654, 'fabioing12@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitorias`
--

CREATE TABLE IF NOT EXISTS `monitorias` (
  `Id_monitorias` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) NOT NULL,
  `monitor` varchar(100) NOT NULL,
  `Id_monitor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `salon` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_monitorias`),
  UNIQUE KEY `salon` (`salon`),
  KEY `Id_monitor` (`Id_monitor`),
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `monitorias`
--

INSERT INTO `monitorias` (`Id_monitorias`, `materia`, `monitor`, `Id_monitor`, `fecha`, `salon`) VALUES
(2, 'matematicas financieras', 'Maria Jose Carreño', 16, '2018-05-14', '302'),
(3, 'Auditoria', 'Maria Jose Carreño', 16, '2018-05-15', '301');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `monitorias`
--
ALTER TABLE `monitorias`
  ADD CONSTRAINT `monitorias_ibfk_2` FOREIGN KEY (`Id_monitor`) REFERENCES `monitores` (`Id_monitor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
