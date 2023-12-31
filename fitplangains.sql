-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 21:08:06
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fitplangains`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eyeslash_alimentacion`
--

CREATE TABLE `eyeslash_alimentacion` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` text COLLATE utf8_bin NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Respuesta_ID_publi` int(11) NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `Fecha_publi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eyeslash_alimentacion`
--

INSERT INTO `eyeslash_alimentacion` (`ID_publi`, `Publicacion`, `ID_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`) VALUES
(1, '¿Qué me recomienda que coma antes de ir al gimnasio? En 20 minutos voy al gym y quería comer algo antes de ir, para estar bien activo.', 2, 0, 0, '2023-11-06 02:02:38'),
(2, 'Hoy tengo ganas de comer unas frutillas con crema, creo que me voy a dar un gustito, total ni quería llegar al verano. :p', 1, 0, 0, '2023-11-06 22:27:09'),
(3, 'Hoy de cena, mi receta especial de fideos a la bolognesa, seguime si querés enterarte como hacer los videos mas ricos de zonar sur ;)', 2, 0, 0, '2023-11-06 22:29:47'),
(4, 'Hoy de comer, un buen plato de pastas para matarme mañana en el gimnasio, que esos biceps no salen solos.', 5, 0, 0, '2023-11-06 22:35:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eyeslash_gimnasio`
--

CREATE TABLE `eyeslash_gimnasio` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` text COLLATE utf8_bin NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Respuesta_ID_publi` int(11) NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `Fecha_publi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eyeslash_gimnasio`
--

INSERT INTO `eyeslash_gimnasio` (`ID_publi`, `Publicacion`, `ID_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`) VALUES
(1, '¿Cuál creen que debería ser el primer conjunto de músculos que se debe entrenar en la semana? Yo, personalmente, empiezo la semana entrenando piernas ya que es el musculo que más peso carga, y el que mas cansado me deja. Después lo complemento con hombros.', 3, 0, 0, '2023-11-06 01:33:33'),
(2, 'Hoy día de pecho, veremos que tal nos va, tengo que recuperar fuerza para el verano!', 4, 0, 0, '2023-11-06 19:51:36'),
(3, 'Mañana día de piernas, que alguien me salve!', 1, 0, 0, '2023-11-06 22:26:26'),
(4, 'Mañana no se va al gym, lo tengo decidido, no se puede con tanto trabajo.', 6, 0, 0, '2023-11-06 22:37:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eyeslash_global`
--

CREATE TABLE `eyeslash_global` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Respuesta_ID_publi` int(11) NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `Fecha_publi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `eyeslash_global`
--

INSERT INTO `eyeslash_global` (`ID_publi`, `Publicacion`, `ID_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`) VALUES
(1, '¿Qué cuentan?', 3, 0, 0, '2023-11-06 01:33:55'),
(2, 'Que día tan frío, no entiendo a la gente que le gusta este clima, para mi es lo peor que hay.', 3, 0, 0, '2023-11-06 01:36:49'),
(3, 'Quería comer unas buenas frutillas para después de comer, y la en la verduleria no tenían ni una, empezamos mal el día. ', 1, 0, 0, '2023-11-06 01:41:27'),
(4, 'Bien de madrugada y todavía no pego un ojo, esto del insomnio me está matando, y no tengo idea como cambiar mi ciclo de sueño.', 4, 0, 0, '2023-11-06 02:17:21'),
(5, 'Que día tan aburrido, que hacen cuándo se aburren un día normal? Creo que solo voy a aprovechar a relajarme y mirar algún video de cocina.', 2, 0, 0, '2023-11-06 22:28:43'),
(6, 'Canto en la orilla, vivo en el agua, no soy pescado ni cigarra. ¿Quién soy? LA RANA. Así como la ven, perdí un concurso culpa de no saber esta adivinanza -_-', 5, 0, 0, '2023-11-06 22:34:02'),
(7, 'Hoy está para dormir todo el día y que de mi futuro se encargue otro Zzz', 5, 0, 0, '2023-11-06 22:34:26'),
(8, 'QUE SUEÑO QUE TENGO QUE ALGUIN ME SAQUE DE ACÁ QUE QUIERO IRME A MI CAMA A DORMIR', 6, 0, 0, '2023-11-06 22:36:58'),
(9, 'Hola mundo', 4, 0, 0, '2023-11-28 15:33:10'),
(10, 'hola mundo', 1, 0, 0, '2023-11-28 16:39:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eyeslash_tabla`
--

CREATE TABLE `eyeslash_tabla` (
  `Codigo_eyeslash` varchar(255) COLLATE utf8_bin NOT NULL,
  `Titulo` varchar(20) COLLATE utf8_bin NOT NULL,
  `ID_usuario_creador` int(11) NOT NULL,
  `Lista_blanca` varchar(255) COLLATE utf8_bin NOT NULL,
  `Estado_eyeslash` varchar(7) COLLATE utf8_bin NOT NULL,
  `ID_configuracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eyeslash_tabla`
--

INSERT INTO `eyeslash_tabla` (`Codigo_eyeslash`, `Titulo`, `ID_usuario_creador`, `Lista_blanca`, `Estado_eyeslash`, `ID_configuracion`) VALUES
('#65487726', 'Los pibes del Barrio', 4, '', 'Publico', 0),
('#6566420c', 'Hola mundo', 1, '', 'Publico', 0),
('alimentacion', 'Alimentacion', 0, '', 'publico', 0),
('gimnasio', 'Gimnasio', 0, '', 'publico', 0),
('global', 'Global', 0, '', 'publico', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eyeslash__#6566420c`
--

CREATE TABLE `eyeslash__#6566420c` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `Respuesta_ID_publi` int(11) DEFAULT NULL,
  `Cant_respuestas` int(11) DEFAULT NULL,
  `Fecha_publi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eyeslash__#6566420c`
--

INSERT INTO `eyeslash__#6566420c` (`ID_publi`, `Publicacion`, `ID_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`) VALUES
(1, 'hola mundo', 1, 0, NULL, '2023-11-28 16:40:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eyeslash__#65487726`
--

CREATE TABLE `eyeslash__#65487726` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `Respuesta_ID_publi` int(11) DEFAULT NULL,
  `Cant_respuestas` int(11) DEFAULT NULL,
  `Fecha_publi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eyeslash__#65487726`
--

INSERT INTO `eyeslash__#65487726` (`ID_publi`, `Publicacion`, `ID_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`) VALUES
(1, 'Bienvenidos a mi Eyeslash \"Los pibes del Barrio\", espero podamos compartir mucho juntos!', 4, 0, NULL, '2023-11-06 02:19:11'),
(2, 'Como anda la banda, mañana nos encontramos en la plaza para ir al gym? O se van a seguir haciendo los vagos', 5, 0, NULL, '2023-11-06 22:38:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `ID_pregunta` int(11) NOT NULL,
  `Titulo` varchar(40) COLLATE utf8_bin NOT NULL,
  `Pregunta` text COLLATE utf8_bin NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `ID_respuesta` int(15) NOT NULL,
  `Tag` varchar(10) COLLATE utf8_bin NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `Fecha_pregunta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`ID_pregunta`, `Titulo`, `Pregunta`, `Cant_respuestas`, `ID_respuesta`, `Tag`, `ID_usuario`, `Fecha_pregunta`) VALUES
(1, '¿Qué plan de la pagina me recomiendan?', '¿Qué plan de esta pagina me recomiendan? La verdad soy nuevo y me gustaría saber cuales probaron ustedes y cuales les funcionaron', 2, 0, '#pregunta', 1, '2023-11-28 02:54:26'),
(2, '¿Estoy haciendo mal press banca?', 'Cuándo hago press banca siempre me duele mucho el hombro, a alguno mas le pasa? creen que me haya lesionado?', 0, 0, '#press', 1, '2023-11-28 02:55:07'),
(3, '¿Por que me duele el hombro?', 'Ultimamente me está doliendo mucho los hombros a la hora de hacer algun ejercicio, incluso no puedo hacer ejercicios de hombros por el dolor', 0, 0, '#hombro', 1, '2023-11-28 02:55:44'),
(4, '¿Como hago correctamente remo?', 'Mi entrenador me recomendó hacer este ejercicio, pero no sé bien como hacerlo, alguno podría explicarme?', 0, 0, '#remo', 3, '2023-11-28 02:56:43'),
(5, '¿Es recomendable hacer peso muerto?', 'Leí mucho que el ejercicio es perjudicial para la espalda y que de hecho no es tan esencial ya que es facilmente reemplazable con otros ejercicios que no representan el mismo riesgo, es verdad esto?', 0, 0, '#pesomuert', 3, '2023-11-28 02:57:30'),
(6, 'Hola', 'Hola', 0, 0, '#pregunta', 4, '2023-11-28 11:59:59'),
(7, '', 'Creo que lo mejor sería eso\r\n', 0, 1, '', 4, '2023-11-28 12:10:14'),
(8, '', 'yo tambien', 0, 1, '', 4, '2023-11-28 12:12:24'),
(9, '', 'Yo creo que estaría bueno', 0, 1, '', 0, '0000-00-00 00:00:00'),
(10, '', 'Yo creoq ue si', 1, 1, '', 0, '0000-00-00 00:00:00'),
(11, '', 'hola', 1, 1, '', 0, '0000-00-00 00:00:00'),
(12, '', 'asdasdasda', 0, 1, '', 4, '2023-11-28 12:34:00'),
(13, '', 'Si sería', 0, 1, '', 4, '2023-11-28 16:34:35'),
(14, '', 'ASjam', 0, 1, '', 4, '2023-11-28 16:35:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID` int(5) NOT NULL,
  `Rol` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID`, `Rol`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_user` int(11) NOT NULL,
  `Usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Token_u` int(225) NOT NULL,
  `Img_u` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tablas_usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Rol_ID` int(5) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_user`, `Usuario`, `Pass`, `Email`, `Token_u`, `Img_u`, `tablas_usuario`, `Rol_ID`) VALUES
(1, 'Pp', '$2y$10$GbiLNIVVVzm1MPTbwnHiE.l9deBQoVcgvceNarOZY2XDa84XzBLmu', 'pp@gmail.com', 1, '1701138049-1699217058-GROOT.jpg', 'a:5:{i:0;s:15:\"eyeslash_global\";i:1;s:21:\"eyeslash_alimentacion\";i:2;s:17:\"eyeslash_gimnasio\";i:3;s:19:\"eyeslash__#65487726\";i:4;s:19:\"eyeslash__#6566420c\";}', 1),
(2, 'Maria', '$2y$10$2EmNZyf8VXWJJ7rMnk5bS.rh5t5uPRrCR9/UkoejHRELb1Oa/qJb2', 'maria@gmail.com', 1, '1699247570-FREDDY.jpg', 'a:3:{i:0;s:15:\"eyeslash_global\";i:1;s:21:\"eyeslash_alimentacion\";i:2;s:17:\"eyeslash_gimnasio\";}', 2),
(3, 'Toto', '$2y$10$y4.G6oHT1GcPSIIusSS2ve2Y8TUMwNTxwCJASPez2zfXmWbs7bgqS', 'toto@gmail.com', 1, '1699247586-SPIDERMAN.jpg', 'a:3:{i:0;s:15:\"eyeslash_global\";i:1;s:21:\"eyeslash_alimentacion\";i:2;s:17:\"eyeslash_gimnasio\";}', 2),
(4, 'Pola', '$2y$10$H2nJ0NO4pjqQZC5dahBKoezY.dgSvisxa69.WMNDrIIYGE/aojpdS', 'pola@gmail.com', 1, '1699247629-BOCA.jpg', 'a:4:{i:0;s:15:\"eyeslash_global\";i:1;s:21:\"eyeslash_alimentacion\";i:2;s:17:\"eyeslash_gimnasio\";i:3;s:19:\"eyeslash__#65487726\";}', 2),
(5, 'Kiko', '$2y$10$bjZpKAR3cq.fF.EDwv/DCe5ozZLAo4PLRHqWU1yV.0tWUmRQlRCFy', 'kiko@gmail.com', 1, '1699321081-HARRY Y SCAMANDER.jpg', 'a:4:{i:0;s:15:\"eyeslash_global\";i:1;s:21:\"eyeslash_alimentacion\";i:2;s:17:\"eyeslash_gimnasio\";i:3;s:19:\"eyeslash__#65487726\";}', 2),
(6, 'Marta', '$2y$10$2MNoUYRqmBCfKkFQ9jB4teIdyNFuhPfjO7hdyoGSkiVZZvvWQmYpy', 'marta@gmail.com', 1, '1699320965-BIGHERO.jpeg', 'a:3:{i:0;s:15:\"eyeslash_global\";i:1;s:21:\"eyeslash_alimentacion\";i:2;s:17:\"eyeslash_gimnasio\";}', 2),
(7, 'pp', 'pp', 'Pp@pp', 0, 'default.jpg', '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eyeslash_alimentacion`
--
ALTER TABLE `eyeslash_alimentacion`
  ADD PRIMARY KEY (`ID_publi`);

--
-- Indices de la tabla `eyeslash_gimnasio`
--
ALTER TABLE `eyeslash_gimnasio`
  ADD PRIMARY KEY (`ID_publi`);

--
-- Indices de la tabla `eyeslash_global`
--
ALTER TABLE `eyeslash_global`
  ADD PRIMARY KEY (`ID_publi`);

--
-- Indices de la tabla `eyeslash_tabla`
--
ALTER TABLE `eyeslash_tabla`
  ADD PRIMARY KEY (`Codigo_eyeslash`);

--
-- Indices de la tabla `eyeslash__#6566420c`
--
ALTER TABLE `eyeslash__#6566420c`
  ADD PRIMARY KEY (`ID_publi`);

--
-- Indices de la tabla `eyeslash__#65487726`
--
ALTER TABLE `eyeslash__#65487726`
  ADD PRIMARY KEY (`ID_publi`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`ID_pregunta`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `Rol_ID` (`Rol_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eyeslash_alimentacion`
--
ALTER TABLE `eyeslash_alimentacion`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eyeslash_gimnasio`
--
ALTER TABLE `eyeslash_gimnasio`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eyeslash_global`
--
ALTER TABLE `eyeslash_global`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `eyeslash__#6566420c`
--
ALTER TABLE `eyeslash__#6566420c`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `eyeslash__#65487726`
--
ALTER TABLE `eyeslash__#65487726`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `ID_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
