-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-09-2023 a las 07:51:33
-- Versión del servidor: 5.7.43
-- Versión de PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `¿?`
--
CREATE DATABASE IF NOT EXISTS `¿?` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `¿?`;

-- --------------------------------------------------------

CREATE TABLE `jesuita` (
  `idJesuita` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,-- Me permite cambiar la intercalacion para una tabla en concreto,por si necesito otro juego de caracteres
  `firma` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jesuita`
--

INSERT INTO `jesuita` (`idJesuita`, `nombre`, `firma`) VALUES
(0, 'Rudjer Boscovich', 'El universo es una unidad orgánica, en la que los cuerpos físicos no son más que puntos singulares en una continuidad infinita de espacio y tiempo.'),
(1, 'Vincenzo Ricatti', 'La verdadera felicidad consiste en hacer el bien sin esperar nada a cambio.'),
(2, 'Antonio de Montserrat', 'Ama, haz lo que quieras'),
(4, 'Padre Mariana', 'El poder no debe ser un fin en sí mismo, sino un medio para lograr el bien común.'),
(7, 'George Coyne ', 'a quien madruga dios le ayuda'),
(8, 'Eusebio Kino', 'Dime quien eres y te dire de que careces'),
(13, 'Marco Antonio de Dominis', 'He cogido este jesuita por su gran trabajo'),
(14, 'Giovani Riccioli', 'La astronomia es la mas noble de todas las ciencias y la mas util de todas las artes'),
(15, 'Erich Wasmann', 'La naturaleza es el libro que Dios ha escrito para que lo leamos'),
(16, 'Isaac Jogues', 'Quería dar mi vida por la conversión de esta gente'),
(17, 'Francesco de Vico', 'Firma de Francesco de Vico'),
(18, 'Papa Francisco', 'Es mejor ser ateo que un mal cristiano.'),
(21, 'San Ignacio de Loyola', 'Alcanza la excelencia y compártela'),
(22, 'San Luis Gonzaga', 'La perfección no consiste en la multiplicidad de las cosas que se hacen, sino en hacer bien lo que se hace.'),
(23, 'San Francisco Javier', 'No hay fronteras, no hay confines; sólo Dios mi esperanza'),
(24, 'San Pedro Claver', 'La caridad, capaz de penetrar y dividir lo que parece inseparable'),
(123, 'JesusIta', 'Hay que ser buenos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `ip` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`ip`, `lugar`, `descripcion`) VALUES
('10.3.43.10', 'Islas molucas', 'hola'),
('10.3.43.100', 'Jerusalén', NULL),
('10.3.43.130', 'Corriente', 'hola'),
('10.3.43.140', 'Roma', NULL),
('10.3.43.150', 'Misiones', NULL),
('10.3.43.160', 'Cuquiarachi', 'hola'),
('10.3.43.170', 'California', NULL),
('10.3.43.180', 'Goa (India)', 'hola'),
('10.3.43.20', 'Azpeitia', 'hola'),
('10.3.43.200', 'Meta', NULL),
('10.3.43.210', 'Paris', 'hola'),
('10.3.43.230', 'Shanchuan (China)', NULL),
('10.3.43.240', 'Montserrat', 'hola'),
('10.3.43.70', 'Londres', NULL),
('10.3.43.90', 'China', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `idVisita` smallint(5) UNSIGNED NOT NULL,
  `idJesuita` tinyint(3) UNSIGNED NOT NULL,
  `ip` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `fechaHora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idVisita`, `idJesuita`, `ip`, `fechaHora`) VALUES
(52, 18, '10.3.43.180', '2023-03-16 11:43:02'),
(53, 2, '10.3.43.20', '2023-03-16 11:53:58'),
(55, 22, '10.3.43.100', '2023-03-16 11:55:41'),
(57, 24, '10.3.43.240', '2023-03-16 11:59:46'),
(59, 22, '10.3.43.240', '2023-03-16 12:00:18'),
(63, 13, '10.3.43.130', '2023-03-16 12:02:43'),
(71, 17, '10.3.43.170', '2023-03-16 12:08:24'),
(74, 8, '10.3.43.130', '2023-03-16 12:11:50'),
(75, 4, '10.3.43.130', '2023-03-16 12:13:50'),
(76, 15, '10.3.43.130', '2023-03-16 12:14:06'),
(77, 15, '10.3.43.20', '2023-03-16 12:14:46'),
(84, 18, '10.3.43.170', '2023-03-16 12:15:51'),
(88, 16, '10.3.43.160', '2023-03-16 12:16:08'),
(90, 1, '10.3.43.170', '2023-03-16 12:17:04'),
(91, 15, '10.3.43.140', '2023-03-16 12:17:26'),
(93, 18, '10.3.43.160', '2023-03-16 12:17:59'),
(95, 13, '10.3.43.140', '2023-03-16 12:19:16'),
(96, 16, '10.3.43.170', '2023-03-16 12:19:33'),
(98, 7, '10.3.43.20', '2023-03-16 12:20:45'),
(101, 4, '10.3.43.20', '2023-03-16 12:21:39'),
(102, 17, '10.3.43.160', '2023-03-16 12:21:44'),
(105, 2, '10.3.43.130', '2023-03-16 12:23:14'),
(106, 2, '10.3.43.170', '2023-03-16 12:23:36'),
(110, 1, '10.3.43.10', '2023-03-16 12:31:05'),
(111, 7, '10.3.43.70', '2023-03-16 12:31:05'),
(112, 2, '10.3.43.100', '2023-04-18 10:11:24');

--
-- Índices para tablas volcadas
--

ALTER TABLE `jesuita`
  ADD PRIMARY KEY (`idJesuita`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`ip`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`idVisita`),
  ADD UNIQUE KEY `ix_visitas` (`idJesuita`,`ip`),
  ADD KEY `lugar_visita` (`ip`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idVisita` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `jesuita_visita` FOREIGN KEY (`idJesuita`) REFERENCES `jesuita` (`idJesuita`),
  ADD CONSTRAINT `lugar_visita` FOREIGN KEY (`ip`) REFERENCES `lugar` (`ip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
