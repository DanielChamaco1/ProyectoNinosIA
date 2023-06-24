-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2023 a las 06:00:39
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuelaa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` tinyint(4) NOT NULL,
  `nombre_curso` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`) VALUES
(1, 'Prekinder - Rojo'),
(2, 'Prekinder - Amarillo'),
(3, 'Prekínder - Verde'),
(4, 'Prekínder - Azul'),
(5, 'Kínder - Celeste'),
(6, 'Kínder - Púrpura'),
(7, 'Kínder - Naranja'),
(8, 'Kínder - Café');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `ap_paterno` varchar(30) DEFAULT NULL,
  `ap_materno` varchar(30) DEFAULT NULL,
  `carnet` varchar(10) DEFAULT NULL,
  `edad` varchar(2) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `alergias` varchar(80) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `id_sexo` tinyint(4) DEFAULT NULL,
  `id_extension` tinyint(4) DEFAULT NULL,
  `id_sangre` tinyint(4) DEFAULT NULL,
  `id_curso` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nombres`, `ap_paterno`, `ap_materno`, `carnet`, `edad`, `direccion`, `nacimiento`, `alergias`, `estado`, `id_sexo`, `id_extension`, `id_sangre`, `id_curso`) VALUES
(12, 'leslie', 'diana', 'sepulveda', '8366796', '24', 'periferica', '2001-09-14', 'ninguna', 1, 2, 3, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_familiar`
--

CREATE TABLE `estudiante_familiar` (
  `id_estudiante` int(11) DEFAULT NULL,
  `id_familiar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extension`
--

CREATE TABLE `extension` (
  `id_extension` tinyint(4) NOT NULL,
  `nombre_extension` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `extension`
--

INSERT INTO `extension` (`id_extension`, `nombre_extension`) VALUES
(1, 'Chuquisaca'),
(2, 'Cochabamba'),
(3, 'Beni'),
(4, 'La Paz'),
(5, 'Oruro'),
(6, 'Pando'),
(7, 'Potosí'),
(8, 'Santa Cruz'),
(9, 'Tarija');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `id_familiar` int(11) NOT NULL,
  `nombres_padres` varchar(50) DEFAULT NULL,
  `ape_paterno` varchar(50) DEFAULT NULL,
  `ape_materno` varchar(50) DEFAULT NULL,
  `carnet_identidad` varchar(50) DEFAULT NULL,
  `edad_padres` varchar(10) DEFAULT NULL,
  `direccion_padres` varchar(10) DEFAULT NULL,
  `ocupacion` varchar(20) DEFAULT NULL,
  `sexo_id` tinyint(4) DEFAULT NULL,
  `extension_id` tinyint(4) DEFAULT NULL,
  `nacimiento_padres` datetime DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `numero_referencia` varchar(10) DEFAULT NULL,
  `parentesco_id` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `familiar`
--

INSERT INTO `familiar` (`id_familiar`, `nombres_padres`, `ape_paterno`, `ape_materno`, `carnet_identidad`, `edad_padres`, `direccion_padres`, `ocupacion`, `sexo_id`, `extension_id`, `nacimiento_padres`, `celular`, `numero_referencia`, `parentesco_id`, `estado`, `correo`) VALUES
(1, '', '', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '', '', 0, 1, ''),
(2, 'p', 'p', 'p', 'p', '', '', 'hjg', 2, 2, '1999-06-17 00:00:00', 'hjh', 'hjh', 1, 1, 'jhj'),
(3, 'manuel', 'sepylveda', 'miranda', '789456', '', 'periferca ', '', 1, 3, '2008-05-18 00:00:00', '', '', 0, 1, ''),
(4, 'manuel', 'sepylveda', 'miranda', '789456', '', 'periferca ', '', 1, 3, '2008-05-18 00:00:00', '', '', 0, 1, ''),
(5, 'cristina', 'quispe', 'cano', '123456', '', 'periferica', 'profesora', 2, 2, '1999-06-17 00:00:00', '71271033', '2260580', 2, 1, 'cristian@gmail.com'),
(6, 'Manuel', 'Sepulveda', 'Miranda', '97391047', '', 'Av.Perifer', 'Profesor', 1, 4, '1978-09-26 00:00:00', '79625709', '2260580', 1, 1, 'manuel@gmail.com'),
(7, 'Cristina', 'Quispe', 'Cano', '1003487', '', 'Av.Perifer', 'Profesora', 2, 4, '1967-06-17 00:00:00', '71271033', '2260580', 2, 1, 'cristina@gmail.com'),
(8, '', '', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '', '', 0, 1, ''),
(9, 'wefw', 'wefwewef', 'fwe', '654', '', '', '6543', 2, 2, '2231-04-05 00:00:00', 'nhtbrgvc', 'ytrew12', 2, 1, 'trefw'),
(10, '', '', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '', '', 0, 1, ''),
(11, 'wefw', 'wefwewef', 'fwe', '654', '', '', '6543', 2, 2, '2231-04-05 00:00:00', 'nhtbrgvc', 'ytrew12', 2, 1, 'trefw'),
(12, '', '', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '', '', 0, 1, ''),
(13, 'jhgfd', 'ujmyhtgrf', 'hjmngbf', 'hgf', '', '', 'juhg', 2, 1, '0000-00-00 00:00:00', '87654', '76', 0, 1, '45367543'),
(14, 'jhgfd', 'ujmyhtgrf', 'hjmngbf', 'hgf', '', '', 'juhg', 2, 1, '0000-00-00 00:00:00', '87654', '76', 0, 1, '45367543'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(18, '', '', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '', '', 0, 1, ''),
(19, 'jhgfd', 'ujmyhtgrf', 'hjmngbf', 'hgf', '', '', 'juhg', 2, 1, '0000-00-00 00:00:00', '87654', '76', 0, 1, '45367543'),
(20, 'jhgfd', 'ujmyhtgrf', 'hjmngbf', 'hgf', '', '', 'juhg', 2, 1, '0000-00-00 00:00:00', '87654', '76', 0, 1, '45367543'),
(21, '', '', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '', '', 0, 1, ''),
(22, 'Daniel Alejandro', 'thgrf', 'Chamaca Huasco', 'htgrf', '', '', 'rtew', 1, 1, '3212-04-05 00:00:00', 'yhtgrfed', '7654', 2, 1, 'vivalafifa2013@gmail.com'),
(23, 'Daniel Alejandro', 'thgrf', 'Chamaca Huasco', 'htgrf', '', '', 'rtew', 1, 1, '3212-04-05 00:00:00', 'yhtgrfed', '7654', 2, 1, 'vivalafifa2013@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `id_parentesco` tinyint(4) NOT NULL,
  `nombre_parentesco` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parentesco`
--

INSERT INTO `parentesco` (`id_parentesco`, `nombre_parentesco`) VALUES
(1, 'Padre'),
(2, 'Madre'),
(3, 'Apoderado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regente`
--

CREATE TABLE `regente` (
  `id_regente` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `ap_paterno` varchar(50) DEFAULT NULL,
  `ap_materno` varchar(50) DEFAULT NULL,
  `carnet` varchar(50) DEFAULT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `direccion` varchar(10) DEFAULT NULL,
  `matricula` varchar(30) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `id_extension` tinyint(4) DEFAULT NULL,
  `id_sexo` tinyint(4) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regente`
--

INSERT INTO `regente` (`id_regente`, `nombres`, `ap_paterno`, `ap_materno`, `carnet`, `edad`, `direccion`, `matricula`, `contrasena`, `correo`, `nacimiento`, `celular`, `estado`, `id_extension`, `id_sexo`, `id_rol`) VALUES
(1, 'Daniel', 'Chamaca HU', 'Huasco', '9897967', '24', 'Cementerio', '123', '250cf8b51c773f3f8dc8b4be867a9a02', 'daniel@gmail.com', '1999-03-17', '65561303', 1, 4, 1, 1),
(8, 'Andaluz', 'Quiroga', 'Butron', '7382737832', '20', 'La portada', '12345', '202cb962ac59075b964b07152d234b', 'andaluz@gmail.com', '2003-06-17', '746929382', 1, 4, 2, 2),
(10, 'sergio', 'pocamacahua', 'choquemisa', '6543', '10', 'C/ MIJILLO', '1234', '827ccb0eea8a706c4c34a16891f84e7b', 'vivalafifa2013@gmail.com', '2012-12-12', '654376543', 1, 4, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sangre`
--

CREATE TABLE `sangre` (
  `id_sangre` tinyint(4) NOT NULL,
  `nombre_sangre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sangre`
--

INSERT INTO `sangre` (`id_sangre`, `nombre_sangre`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` tinyint(4) NOT NULL,
  `nombre_sexo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `nombre_sexo`) VALUES
(1, 'Varon'),
(2, 'Mujer');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `id_sexo` (`id_sexo`),
  ADD KEY `id_extension` (`id_extension`),
  ADD KEY `id_sangre` (`id_sangre`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `estudiante_familiar`
--
ALTER TABLE `estudiante_familiar`
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_familiar` (`id_familiar`);

--
-- Indices de la tabla `extension`
--
ALTER TABLE `extension`
  ADD PRIMARY KEY (`id_extension`);

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id_familiar`),
  ADD KEY `sexo_id` (`sexo_id`),
  ADD KEY `extension_id` (`extension_id`),
  ADD KEY `parentesco_id` (`parentesco_id`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD PRIMARY KEY (`id_parentesco`);

--
-- Indices de la tabla `regente`
--
ALTER TABLE `regente`
  ADD PRIMARY KEY (`id_regente`),
  ADD KEY `id_extension` (`id_extension`),
  ADD KEY `id_sexo` (`id_sexo`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sangre`
--
ALTER TABLE `sangre`
  ADD PRIMARY KEY (`id_sangre`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `extension`
--
ALTER TABLE `extension`
  MODIFY `id_extension` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id_familiar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `regente`
--
ALTER TABLE `regente`
  MODIFY `id_regente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sangre`
--
ALTER TABLE `sangre`
  MODIFY `id_sangre` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`id_extension`) REFERENCES `extension` (`id_extension`),
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`id_sangre`) REFERENCES `sangre` (`id_sangre`),
  ADD CONSTRAINT `estudiante_ibfk_4` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Filtros para la tabla `estudiante_familiar`
--
ALTER TABLE `estudiante_familiar`
  ADD CONSTRAINT `estudiante_familiar_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `estudiante_familiar_ibfk_2` FOREIGN KEY (`id_familiar`) REFERENCES `familiar` (`id_familiar`);

--
-- Filtros para la tabla `regente`
--
ALTER TABLE `regente`
  ADD CONSTRAINT `regente_ibfk_1` FOREIGN KEY (`id_extension`) REFERENCES `extension` (`id_extension`),
  ADD CONSTRAINT `regente_ibfk_2` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`),
  ADD CONSTRAINT `regente_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
