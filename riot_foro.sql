-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2022 a las 02:38:53
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `riot_foro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloqueo`
--

CREATE TABLE `bloqueo` (
  `id_bloqueo` int(11) NOT NULL,
  `motivo_bloqueo` varchar(100) NOT NULL,
  `fecha_bloqueo` date NOT NULL,
  `fecha_tope` date NOT NULL,
  `estado_bloqueo` int(1) NOT NULL,
  `fk_jugador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discusion`
--

CREATE TABLE `discusion` (
  `id_discusion` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `contenido_discusion` text NOT NULL,
  `contenido_original_discusion` text NOT NULL,
  `editado_discusion` int(11) NOT NULL,
  `fecha_discusion` datetime NOT NULL,
  `estado_discusion` varchar(9) NOT NULL,
  `fk_tema` int(11) NOT NULL,
  `fk_plataforma` int(11) NOT NULL,
  `fk_jugador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `discusion`
--

INSERT INTO `discusion` (`id_discusion`, `titulo`, `contenido_discusion`, `contenido_original_discusion`, `editado_discusion`, `fecha_discusion`, `estado_discusion`, `fk_tema`, `fk_plataforma`, `fk_jugador`) VALUES
(1, 'Bienvenidos a League of legend', 'Sean bienvenidos :D', 'Sean bienvenidos :D', 0, '2022-06-21 20:35:21', 'abierta', 3, 1, 1),
(2, 'Bienvenidos a Valorant', 'SE VIENE EVENTO DEL 2022', 'SE VIENE EVENTO DEL 2022', 0, '2022-06-21 20:36:33', 'abierta', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `honor`
--

CREATE TABLE `honor` (
  `id_honor` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `id_objetivo` int(11) NOT NULL,
  `tipo_objetivo` varchar(30) NOT NULL,
  `fk_jugador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL,
  `nombre_jugador` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado_jugador` int(1) NOT NULL,
  `rol` varchar(7) NOT NULL,
  `contrasenia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id_jugador`, `nombre_jugador`, `correo`, `estado_jugador`, `rol`, `contrasenia`) VALUES
(1, 'DEVL12', '1@gmail.com', 1, 'player', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `id_plataforma` int(11) NOT NULL,
  `nombre_plataforma` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`id_plataforma`, `nombre_plataforma`) VALUES
(1, 'League of legends'),
(2, 'Valorant'),
(3, 'Legends of Runeterra'),
(4, 'League of Legends: Wild Rift');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `contenido_respuesta` text NOT NULL,
  `contenido_original_respuesta` text NOT NULL,
  `editado_respuesta` int(11) NOT NULL,
  `fecha_respuesta` date NOT NULL,
  `estado_respuesta` int(1) NOT NULL,
  `fk_jugador` int(11) NOT NULL,
  `fk_discusion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `nombre_tema` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id_tema`, `nombre_tema`) VALUES
(1, 'Bug'),
(2, 'Evento'),
(3, 'Noticias'),
(4, 'Nerf'),
(5, 'buff');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  ADD PRIMARY KEY (`id_bloqueo`),
  ADD KEY `fk_Bloqueo_Jugador1_idx` (`fk_jugador`);

--
-- Indices de la tabla `discusion`
--
ALTER TABLE `discusion`
  ADD PRIMARY KEY (`id_discusion`),
  ADD KEY `fk_Discusion_Jugador1_idx` (`fk_jugador`),
  ADD KEY `fk_Discusion_Tema1_idx` (`fk_tema`),
  ADD KEY `fk_Discusion_Plataforma1_idx` (`fk_plataforma`);

--
-- Indices de la tabla `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id_honor`),
  ADD KEY `fk_Honor_Jugador1_idx` (`fk_jugador`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id_jugador`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`id_plataforma`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `fk_Respuesta_Jugador1_idx` (`fk_jugador`),
  ADD KEY `fk_Respuesta_Discusion2` (`fk_discusion`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  MODIFY `id_bloqueo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discusion`
--
ALTER TABLE `discusion`
  MODIFY `id_discusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `honor`
--
ALTER TABLE `honor`
  MODIFY `id_honor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `id_plataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  ADD CONSTRAINT `fk_Bloqueo_Jugador1` FOREIGN KEY (`fk_jugador`) REFERENCES `jugador` (`id_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `discusion`
--
ALTER TABLE `discusion`
  ADD CONSTRAINT `discusion_ibfk_1` FOREIGN KEY (`fk_plataforma`) REFERENCES `plataforma` (`id_plataforma`) ON UPDATE CASCADE,
  ADD CONSTRAINT `discusion_ibfk_2` FOREIGN KEY (`fk_tema`) REFERENCES `tema` (`id_tema`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Discusion_Jugador1` FOREIGN KEY (`fk_jugador`) REFERENCES `jugador` (`id_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `honor`
--
ALTER TABLE `honor`
  ADD CONSTRAINT `fk_Honor_Jugador1` FOREIGN KEY (`fk_jugador`) REFERENCES `jugador` (`id_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_Respuesta_Discusion2` FOREIGN KEY (`fk_discusion`) REFERENCES `discusion` (`id_discusion`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Respuesta_Jugador1` FOREIGN KEY (`fk_jugador`) REFERENCES `jugador` (`id_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
