-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2023 a las 04:39:55
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
(39, 'Retaca la matraca de la raca re cualica ala maraca no hay raca que no atraca en la resaca de esta taca y despues de un takak taka nos hacemo el waka waka para una bienvenida historia de una monja y una noria que prudente este destino eligiendo este placer de juntos conocer un fabuloso deber', 4, 0, 0, '2023-10-04', '20:36');

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
(4, 'pa las rocha beso pa los giles rafagazo', 4, 0, 0, '2023-10-04', '22:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_user` int(11) NOT NULL,
  `Usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_user`, `Usuario`, `Pass`) VALUES
(4, 'pp', 'pp'),
(5, 'maria', 'maria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosprincipal`
--

CREATE TABLE `usuariosprincipal` (
  `id` int(10) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `Token_u` int(100) NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuariosprincipal`
--

INSERT INTO `usuariosprincipal` (`id`, `usuario`, `email`, `Token_u`, `password`) VALUES
(1, 'hh', '', 0, 'hh'),
(2, 'pp', '', 0, 'pp'),
(3, 'rr', '', 0, 'rr'),
(4, 'tt', '', 0, 'tt'),
(5, 'gg', '', 0, 'gg'),
(6, 'ff', '', 0, 'ff'),
(7, 'dd', '', 0, 'dd'),
(8, 'mm', 'maurosnack2004@gmail.com', 1696471583, '$2y$10$cLbHynpAqRWPJIVE422FMuhQkZHULjEMIZFHU.CSOlqGArXLsNe5e'),
(9, 'cc', 'maurosnack2004@gmail.com', 1696471721, '$2y$10$lAwqgajmY1/A9aWR.X3YYuK04HCCuiP5Kqyex7Jk83B93RlaODj2.'),
(10, 'xx', 'maurosnack2004@gmail.com', 1696471820, '$2y$10$dlLCvfrkZvcaPafTmg02Jugh3NNSiZkd/peAN4FKSLYNvJdzL/ARm'),
(11, 'qq', 'maurosnack2004@gmail.com', 1696471925, '$2y$10$jLPLQtrgeA4WI4Hi52O87ec8/jwXELKXAPLnQg5WVGBXmSOAd12gC');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_user`);

--
-- Indices de la tabla `usuariosprincipal`
--
ALTER TABLE `usuariosprincipal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `publicaciones_2`
--
ALTER TABLE `publicaciones_2`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuariosprincipal`
--
ALTER TABLE `usuariosprincipal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
