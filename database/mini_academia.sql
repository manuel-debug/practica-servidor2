-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2021 a las 17:03:04
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebadao`
--

-- --------------------------------------------------------
DROP TABLE IF EXISTS `messages`;
DROP TABLE IF EXISTS `enrollments`;
DROP TABLE IF EXISTS `courses`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `roles`;
--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `profesor_id` bigint(20) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_sol` date DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `descripcion` varchar(2048) DEFAULT NULL,
  `coste` double DEFAULT NULL,
  `participantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `courses`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `usuario` varchar(100),
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telefono` bigint(9),
  `direccion` varchar(100),
  `estado` tinyint(1) DEFAULT 0,
  `imagen` varchar(100) DEFAULT NULL,
  `rol_id` tinyint(1) DEFAULT 3,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS `roles` (
  `id` tinyint(1) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `roles`
  ADD UNIQUE KEY `UK_tipo` (`tipo`);

--
-- Volcado de datos para la tabla `users`
--
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD UNIQUE KEY `UK_NOMBRE` (`nombre`),
  ADD CONSTRAINT `FK_courses_PROFESOR` FOREIGN KEY (`profesor_id`) REFERENCES `users`(`id`) ON DELETE CASCADE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `UK_nif` (`nif`),
  ADD UNIQUE KEY `UK_email` (`email`),
  ADD UNIQUE KEY `UK_telefono` (`telefono`),
  ADD CONSTRAINT `FK_roles_users` FOREIGN KEY (`rol_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE;



CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `curso_id` bigint(20) NOT NULL,
  `estudiante_id` bigint(20) NOT NULL,
  `fecha` date NOT NULL DEFAULT CURDATE(),
  `estado` smallint(6) NOT NULL DEFAULT 0,

  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `estudiante_id` (`estudiante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripciones`
--


--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`estudiante_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

CREATE TABLE IF NOT EXISTS `messages`(
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `remitente_id` bigint(20) NOT NULL,
  `destinatario_id` bigint(20) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha_envio` date NOT NULL DEFAULT CURDATE(),
  `fecha_recepcion` date NOT NULL DEFAULT CURDATE(),
  PRIMARY KEY (`id`),
  KEY `remitente_id` (`remitente_id`),
  KEY `destinatario_id` (`destinatario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


ALTER TABLE `messages`
  ADD CONSTRAINT `messages_mufk_1` FOREIGN KEY (`remitente_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_mufk_2` FOREIGN KEY (`destinatario_id`) REFERENCES `users`(`id`) ON DELETE CASCADE;
  COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
