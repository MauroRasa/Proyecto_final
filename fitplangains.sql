-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2023 a las 16:27:16
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
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `ID_pregunta` int(11) NOT NULL,
  `Titulo` varchar(40) COLLATE utf8_bin NOT NULL,
  `Pregunta` text COLLATE utf8_bin NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `Tag` varchar(10) COLLATE utf8_bin NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `Fecha_pregunta` varchar(10) COLLATE utf8_bin NOT NULL,
  `Hora_pregunta` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`ID_pregunta`, `Titulo`, `Pregunta`, `Cant_respuestas`, `Tag`, `ID_usuario`, `Fecha_pregunta`, `Hora_pregunta`) VALUES
(1, 'Como hacer press banca', 'Tengo un problema con press banca y es que creo que lo estoy haciendo mal ya que siempre que termino de hacerlo me duele el hombro, alguna solucion?', 0, '#PressBanc', 1, '1/11', '4:38'),
(2, 'Que cenar', 'Vengo del gimnasio, que recomiendan cenar si voy a volver a ir dentro de 10 minutos?', 0, '#Cena', 1, '1/11', '4:39'),
(3, 'Tiempo de gym', 'Quería saber que tiempo se toman ustedes para estar en el gimnasio, yo estoy 1 hora o 1 hora y media a veces', 0, '#Gym', 1, '1/11', '4:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Respuesta_ID_publi` int(11) NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `Fecha_publi` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `Hora_publi` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`ID_publi`, `Publicacion`, `ID_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`, `Hora_publi`) VALUES
(38, 'Sacalamatracaparaestaracatanbellaca', 4, 0, 0, '2023-10-04', '20:34'),
(39, 'Retaca la matraca de la raca re cualica ala maraca no hay raca que no atraca en la resaca de esta taca y despues de un takak taka nos hacemo el waka waka para una bienvenida historia de una monja y una noria que prudente este destino eligiendo este placer de juntos conocer un fabuloso deber', 4, 0, 0, '2023-10-04', '20:36'),
(40, 'JAJAJAJAJAJAJA', 0, 0, 0, '2023-10-11', '17:25'),
(41, 'usdhuiadhasiudasbiudasd', 0, 0, 0, '2023-10-11', '17:33'),
(42, 'Kiksdisadasoldi', 1, 0, 0, '2023-10-11', '17:45'),
(43, 'hola', 28, 0, 0, '2023-10-31', '13:28'),
(44, 'kdasklmdasd', 29, 0, 0, '2023-11-01', '19:48'),
(45, 'caca pedo pis', 29, 0, 0, '2023-11-01', '19:48'),
(46, 'a la lucha a la lucha no seremos fuertes pero somos muchas', 29, 0, 0, '2023-11-01', '19:48'),
(47, 'me gusta el arrrrrte', 29, 0, 0, '2023-11-01', '19:48'),
(48, 'sacalacac', 29, 0, 0, '2023-11-01', '20:21'),
(49, 'dasdas', 29, 0, 0, '2023-11-01', '20:21'),
(51, 'fdsdfas', 29, 0, 0, '2023-11-01', '02:10'),
(52, 'fsdfsdf', 29, 0, 0, '2023-11-01', '22:11'),
(53, 'caralho filho da puta', 29, 0, 0, '2023-11-01', '00:19'),
(54, 'caralho filho da puta', 29, 0, 0, '2023-11-01', '00:20'),
(55, 'dasdas', 28, 0, 0, '2023-11-02', '12:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_2`
--

CREATE TABLE `publicaciones_2` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` text COLLATE utf8_bin NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Respuesta_ID_publi` int(11) NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `Fecha_publi` varchar(16) COLLATE utf8_bin NOT NULL,
  `Hora_publi` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `publicaciones_2`
--

INSERT INTO `publicaciones_2` (`ID_publi`, `Publicacion`, `ID_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`, `Hora_publi`) VALUES
(2, 'Acá se habla de gimnasio nomas perror el que habla de otra cosa rafagzo lo agarramos y lo empomamos en la esquina asi nomas atr cuimbia cajeteala toda gato y al que no le gusta que se re mil joda eeeeeeeeaaaaaaa ', 4, 0, 0, '2023-10-04', '22:56'),
(3, 'EEEAAAAAAAAAAA', 4, 0, 0, '2023-10-04', '22:57'),
(4, 'pa las rocha beso pa los giles rafagazo', 4, 0, 0, '2023-10-04', '22:57'),
(5, 'JAJAJJJAJAJAJAJ', 0, 0, 0, '2023-10-11', '17:25'),
(6, 'holadada', 28, 0, 0, '2023-10-31', '13:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_3`
--

CREATE TABLE `publicaciones_3` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` text COLLATE utf8_bin NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Respuesta_ID_publi` int(11) NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `Fecha_publi` varchar(16) COLLATE utf8_bin NOT NULL,
  `Hora_publi` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `publicaciones_3`
--

INSERT INTO `publicaciones_3` (`ID_publi`, `Publicacion`, `ID_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`, `Hora_publi`) VALUES
(1, 'Retaca la matraca de la raca re cualica ala maraca no hay raca que no atraca en la resaca de esta taca y despues de un takak taka nos hacemo el waka waka para una bienvenida historia de una monja y una noria que prudente este destino eligiendo este placer de juntos conocer un fabuloso deber', 29, 0, 0, '2023-11-01', '00:20');

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
  `Rol_ID` int(5) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_user`, `Usuario`, `Pass`, `Email`, `Token_u`, `Img_u`, `Rol_ID`) VALUES
(28, 'pp', '$2y$10$Rc6HFV84guZ.nVWOKlPzzu.CoDBusJbLpK/7elo/hnaDjmHJs9vDK', 'pp@gmail.com', 1, '1698445859-bokita.jpg', 1),
(29, 'maria', '$2y$10$e.EahTnMb81r.6GiBxdAbe9OyrHQEMI0hZZgSGJD7znsdZk/z.r7K', 'maria@gmail.com', 1, '1698446165-body male.jpg', 2),
(32, 'ff', '$2y$10$ljMMx3t0JK8g/aDFVcByHOTWDH6HHvVYMhS85RSs1fyNhzSTFIQfK', 'ff', 1698460095, 'default.jpg', 2),
(33, 'gg', '$2y$10$jL4eQZV1UjA4/uGmiyaVR.uIdqH4vqVUfzzb.bR4x87MpT7BgKdrK', 'gg', 1698460182, 'default.jpg', 2),
(34, 'll', '$2y$10$mzDSiFJtITgxMKOg9jPpnONYGUAHPGcDAo1vaHnLru.M3FTP6Ux9i', 'll', 1698460223, 'default.jpg', 2),
(35, 'nh', '$2y$10$a.soRGVMU4Ctqs7iawdP.uLusbIOHwabW9ohBH0bVcFKHBsOQo9Ju', 'nh', 1698460285, 'default.jpg', 2),
(36, 'lk', '$2y$10$0frAcZhryWTBMyNdAuTUH.9Kmn.oacZ36dyBXjOlHgR4tryDMQQFW', 'lk', 1698460350, 'default.jpg', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`ID_pregunta`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`ID_publi`);

--
-- Indices de la tabla `publicaciones_2`
--
ALTER TABLE `publicaciones_2`
  ADD PRIMARY KEY (`ID_publi`);

--
-- Indices de la tabla `publicaciones_3`
--
ALTER TABLE `publicaciones_3`
  ADD PRIMARY KEY (`ID_publi`);

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
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `ID_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `publicaciones_2`
--
ALTER TABLE `publicaciones_2`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `publicaciones_3`
--
ALTER TABLE `publicaciones_3`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
