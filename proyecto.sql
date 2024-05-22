-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-05-2024 a las 09:40:26
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE IF NOT EXISTS `incidencias` (
  `id_incidencias` int NOT NULL AUTO_INCREMENT,
  `id_usuaris` int NOT NULL,
  `Estat` varchar(200) NOT NULL,
  `Data_creacio` date NOT NULL,
  `Descripcio_problema` varchar(200) NOT NULL,
  PRIMARY KEY (`id_incidencias`),
  KEY `fk_id_usuaris` (`id_usuaris`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencias`, `id_usuaris`, `Estat`, `Data_creacio`, `Descripcio_problema`) VALUES
(1, 3, 'Ejecucion', '0000-00-00', 'Des de que vaig obrir una app el ordinador va molt més lent i noto com si li faltés potencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

DROP TABLE IF EXISTS `trabajo`;
CREATE TABLE IF NOT EXISTS `trabajo` (
  `id_usuaris` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Correu` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Numtelf` int NOT NULL,
  `CV` longblob NOT NULL,
  UNIQUE KEY `Correu` (`Correu`,`Numtelf`),
  KEY `fk_id_usuaris_treball` (`id_usuaris`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id_usuaris`, `Nom`, `Correu`, `Numtelf`, `CV`) VALUES
(2, 'Arnau', 'armero@jviladoms.cat', 645363636, 0x486f7261726973204153495832202d2076342e706466);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE IF NOT EXISTS `usuaris` (
  `id_usuaris` int NOT NULL AUTO_INCREMENT,
  `Rol_name` varchar(200) NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Tipus` varchar(200) NOT NULL,
  `Correu` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id_usuaris`),
  UNIQUE KEY `Correu` (`Correu`),
  KEY `fk_nom` (`Nom`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id_usuaris`, `Rol_name`, `Nom`, `password`, `Tipus`, `Correu`) VALUES
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin@jviladoms.cat'),
(3, 'superpro', 'Arnau', '6ffb6c6b9cde1177dd0b2a76d839549f', 'Client', 'armero@jviladoms.cat'),
(4, 'pro', 'Teo', '29d7e211b6673b3026b250672143aaf0', 'Client', 'docach@jviladoms.cat'),
(11, 'estandar', 'Raul', 'f24b4e5bcde019d82d96bdedd7940314', 'Client', 'radega@jviladoms.cat');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `fk_id_usuaris` FOREIGN KEY (`id_usuaris`) REFERENCES `usuaris` (`id_usuaris`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`id_usuaris`) REFERENCES `usuaris` (`id_usuaris`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
