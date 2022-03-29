-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2022 a las 17:51:23
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  `fecha_bloqueo` varchar(16) NOT NULL,
  `fecha_tope` varchar(16) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bloqueo`
--

INSERT INTO `bloqueo` (`id`, `id_jugador`, `fecha_bloqueo`, `fecha_tope`, `motivo`, `estado`) VALUES
(1, 3, '06/03/2022', '06/05/2022', 'Flameo y afk', 1),
(2, 1, '06/03/2022', '09/03/2022', 'Trollea con Bardo', 1),
(3, 1, '06/03/2022', '06/03/2032', 'Habló mal del gobierno', -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discusion`
--

CREATE TABLE `discusion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `contenido_original` text NOT NULL,
  `editado` int(11) NOT NULL,
  `tema` varchar(45) NOT NULL,
  `plataforma` varchar(30) NOT NULL,
  `imagen` text DEFAULT NULL,
  `fecha` varchar(16) NOT NULL,
  `hora` varchar(5) NOT NULL,
  `estado` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `discusion`
--

INSERT INTO `discusion` (`id`, `titulo`, `id_autor`, `contenido`, `contenido_original`, `editado`, `tema`, `plataforma`, `imagen`, `fecha`, `hora`, `estado`) VALUES
(8, 'Zilean necesita un buff', 1, 'Zilean es una autentica basura, deberian hacer que cada ronda te de una bomba de tiempo', 'Zilean es una autentica basura, deberian hacer que cada ronda te de una bomba de tiempo', 1, 'Queja', 'Legends of Runaterra', '', '05/03/2022', '11:33', 'cerrada'),
(11, 'Deseó la muerte a mi gato', 1, 'ayer estaba jugando una ranked y el jugador unknownenemy empezó\r\n    a insultarme porque moría mucho (normal, me gankeaba una evelyn invisible y me rompían el pink todo el rato)\r\n    y le deseó la muerte a mi, mi familia, mi gato y mis futuros hijos, además, al terminar la partida dejó este\r\n    comentario', 'ayer estaba jugando una ranked y el jugador unknownenemy empezó\r\n    a insultarme porque moría mucho (normal, me gankeaba una evelyn invisible y me rompían el pink todo el rato)\r\n    y le deseó la muerte a mi, mi familia, mi gato y mis futuros hijos, además, al terminar la partida dejó este\r\n    comentario', 0, 'Reporte a jugador', 'League of Legends', 'https://scontent.fbrm1-1.fna.fbcdn.net/v/t1.15752-9/275390662_536709401207810_1989488988735180439_n.jpg?_nc_cat=100&ccb=1-5&_nc_sid=ae9488&_nc_ohc=5T1pQO781WcAX-qw_FD&_nc_ht=scontent.fbrm1-1.fna&oh=03_AVI5kcqz-KP8h1v3JpkkQN4TM3XMkrxjr12qoy8LUUoAew&oe=62672C78', '28/03/2022', '11:41', 'abierta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `honor`
--

CREATE TABLE `honor` (
  `id` int(11) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  `id_objetivo` int(11) NOT NULL,
  `tipo_objetivo` varchar(10) NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `honor`
--

INSERT INTO `honor` (`id`, `id_jugador`, `id_objetivo`, `tipo_objetivo`, `puntaje`) VALUES
(1, 3, 8, 'discusion', 1),
(2, 2, 8, 'discusion', -1),
(4, 1, 5, 'respuesta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fecha_nacimiento` varchar(16) NOT NULL,
  `estado` int(1) NOT NULL,
  `rol` varchar(7) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `foto`, `correo`, `fecha_nacimiento`, `estado`, `rol`, `usuario`, `contraseña`) VALUES
(1, 'Atlantox7', 'https://avatars.githubusercontent.com/u/49962482?v=4', 'atlantox7@gmail.com', '02/03/2001', 1, 'jugador', 'atlantox7', '123789'),
(2, 'Sr. Tryndamere', 'https://imagenes.elpais.com/resizer/D76rOlR0IId49HsLeb4NR1QGM10=/1960x1470/filters:focal(415x227:425x237)/cloudfront-eu-central-1.images.arcpublishing.com/prisa/NYS5FBZOBVE75GJEHF3UE3BNSY.png', 'marcmerrill@gmail.com', '17/08/1980', 1, 'admin', 'srtryndamere', 'soyeljefe'),
(3, 'Unknownenemy', 'https://elcomercio.pe/resizer/OXspFH71KzEbb9Q10UpJtRW9hZ0=/1200x1200/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/DZMN2NBZKJFTRCCBAZLLK5Z3YY.jpg', 'chuito@gmail.com', '24/04/1998', 1, 'jugador', 'chuito', 'soychuito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`id`, `nombre`, `imagen`) VALUES
(1, 'Legends of Runaterra', 'https://i.imgur.com/kmiUQOS.png'),
(3, 'Valorant', 'https://i.imgur.com/3PPovtW.png'),
(6, 'League of Legends', 'https://i.imgur.com/m0MRPAx.png'),
(7, 'Riot Games', 'https://forums.comunidades.riotgames.com/html/assets/Riot%20Games.jpg'),
(8, 'Teamfight Tactics', 'https://i.imgur.com/VD6Hdkc.png'),
(9, 'League of Legends Wild Rift', 'https://i.imgur.com/yvzh5H7.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `contenido_original` text NOT NULL,
  `estado` int(1) NOT NULL,
  `editado` int(11) NOT NULL,
  `imagen` text DEFAULT NULL,
  `id_autor` int(11) NOT NULL,
  `id_discusion` int(11) NOT NULL,
  `id_objetivo` int(11) NOT NULL,
  `tipo_objetivo` varchar(9) NOT NULL,
  `fecha` varchar(16) NOT NULL,
  `hora` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `contenido`, `contenido_original`, `estado`, `editado`, `imagen`, `id_autor`, `id_discusion`, `id_objetivo`, `tipo_objetivo`, `fecha`, `hora`) VALUES
(5, 'El siguiente parche me aseguraré de que lo corrigan.', 'El siguiente parche me aseguraré de que lo corrigan.', 0, 0, '', 2, 8, 8, 'discusion', '05/03/2022', '16:25'),
(6, 'A mi me parece que así está bien.', 'Yo creo que así está bien', 0, 1, '', 3, 8, 8, 'discusion', '05/03/2022', '16:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id`, `nombre`) VALUES
(2, 'Bug'),
(7, 'Creaciones de la comunidad'),
(6, 'Eventos'),
(5, 'General'),
(9, 'Jugabilidad'),
(8, 'Memes'),
(3, 'Problemas técnicos'),
(1, 'Queja'),
(4, 'Reclutamiento'),
(14, 'Reporte a jugador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Bloqueo_Jugador1_idx` (`id_jugador`);

--
-- Indices de la tabla `discusion`
--
ALTER TABLE `discusion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Discusion_Jugador1_idx` (`id_autor`),
  ADD KEY `fk_Discusion_Tema1_idx` (`tema`),
  ADD KEY `fk_Discusion_Plataforma1_idx` (`plataforma`);

--
-- Indices de la tabla `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Honor_Jugador1_idx` (`id_jugador`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Respuesta_Discusion1_idx` (`id_objetivo`),
  ADD KEY `fk_Respuesta_Jugador1_idx` (`id_autor`),
  ADD KEY `fk_Respuesta_Discusion2` (`id_discusion`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `discusion`
--
ALTER TABLE `discusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `honor`
--
ALTER TABLE `honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  ADD CONSTRAINT `fk_Bloqueo_Jugador1` FOREIGN KEY (`id_jugador`) REFERENCES `jugador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `discusion`
--
ALTER TABLE `discusion`
  ADD CONSTRAINT `fk_Discusion_Jugador1` FOREIGN KEY (`id_autor`) REFERENCES `jugador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Discusion_Plataforma1` FOREIGN KEY (`plataforma`) REFERENCES `plataforma` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Discusion_Tema1` FOREIGN KEY (`tema`) REFERENCES `tema` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `honor`
--
ALTER TABLE `honor`
  ADD CONSTRAINT `fk_Honor_Jugador1` FOREIGN KEY (`id_jugador`) REFERENCES `jugador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_Respuesta_Discusion2` FOREIGN KEY (`id_discusion`) REFERENCES `discusion` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Respuesta_Jugador1` FOREIGN KEY (`id_autor`) REFERENCES `jugador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
