-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-07-2024 a las 00:11:59
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--
CREATE DATABASE IF NOT EXISTS `examen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `examen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estancias`
--

DROP TABLE IF EXISTS `estancias`;
CREATE TABLE IF NOT EXISTS `estancias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tipo_vehiculo` int NOT NULL,
  `entrada` datetime NOT NULL,
  `salida` datetime DEFAULT NULL,
  `tiempo_estacionado` int DEFAULT NULL,
  `cuota` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estancias`
--

INSERT INTO `estancias` (`id`, `placa`, `id_tipo_vehiculo`, `entrada`, `salida`, `tiempo_estacionado`, `cuota`, `updated_at`, `created_at`) VALUES
(1, 'nvms123', 2, '2024-07-30 13:34:22', '2024-07-30 16:13:57', NULL, NULL, '2024-07-30 22:13:57', '2024-07-30 18:32:57'),
(2, 'mtres12', 1, '2024-07-30 18:51:29', NULL, NULL, NULL, '2024-07-30 18:51:29', '2024-07-30 18:51:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculos`
--

DROP TABLE IF EXISTS `tipo_vehiculos`;
CREATE TABLE IF NOT EXISTS `tipo_vehiculos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paga` tinyint(1) NOT NULL,
  `cuota_minuto` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_vehiculos`
--

INSERT INTO `tipo_vehiculos` (`id`, `descripcion`, `paga`, `cuota_minuto`, `created_at`, `updated_at`) VALUES
(1, 'Oficial', 0, 0, '2024-07-30 12:34:06', '2024-07-31 00:11:19'),
(2, 'Residente', 1, 1, '2024-07-30 12:34:06', '2024-07-30 12:34:06'),
(3, 'No Residente', 1, 3, '2024-07-30 12:34:06', '2024-07-30 12:34:06'),
(4, 'No Oficial', 1, 10, '2024-07-30 23:42:41', '2024-07-30 23:42:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
