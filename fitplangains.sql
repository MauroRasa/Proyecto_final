-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 22:57:30
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
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `ID_publi` int(11) NOT NULL,
  `Publicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Img_user` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Respuesta_ID_publi` int(11) NOT NULL,
  `Cant_respuestas` int(11) NOT NULL,
  `Fecha_publi` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `Hora_publi` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`ID_publi`, `Publicacion`, `ID_user`, `Img_user`, `Respuesta_ID_publi`, `Cant_respuestas`, `Fecha_publi`, `Hora_publi`) VALUES
(38, 'Sacalamatracaparaestaracatanbellaca', 4, '', 0, 0, '2023-10-04', '20:34'),
(39, 'Retaca la matraca de la raca re cualica ala maraca no hay raca que no atraca en la resaca de esta taca y despues de un takak taka nos hacemo el waka waka para una bienvenida historia de una monja y una noria que prudente este destino eligiendo este placer de juntos conocer un fabuloso deber', 4, '', 0, 0, '2023-10-04', '20:36'),
(40, 'JAJAJAJAJAJAJA', 0, '', 0, 0, '2023-10-11', '17:25'),
(41, 'usdhuiadhasiudasbiudasd', 0, '', 0, 0, '2023-10-11', '17:33'),
(42, 'Kiksdisadasoldi', 1, '', 0, 0, '2023-10-11', '17:45');

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
(5, 'JAJAJJJAJAJAJAJ', 0, 0, 0, '2023-10-11', '17:25');

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
(1, 'Admin'),
(2, 'Usuario');

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
(1, 'pp', 'pp', '', 0, '1696861497-bokita.jpg', 1),
(2, 'maria', 'maria', '', 0, '1696861528-body male.jpg', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`ID_publi`),
  ADD KEY `Img_user` (`Img_user`);

--
-- Indices de la tabla `publicaciones_2`
--
ALTER TABLE `publicaciones_2`
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
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `publicaciones_2`
--
ALTER TABLE `publicaciones_2`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `usuarios` (`Rol_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
