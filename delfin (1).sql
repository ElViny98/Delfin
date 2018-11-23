-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2018 a las 17:55:46
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `delfin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutores` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `ApPaterno` varchar(45) DEFAULT NULL,
  `ApMaterno` varchar(45) DEFAULT NULL,
  `idInvestigacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infoacademica`
--

CREATE TABLE `infoacademica` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Grado` varchar(15) NOT NULL,
  `cuerpoAcademico` varchar(150) DEFAULT NULL,
  `consolidacionCA` varchar(45) DEFAULT NULL,
  `perfilPROMEP` varchar(45) DEFAULT NULL,
  `nivelSNI` varchar(45) DEFAULT NULL,
  `areaConocimiento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infoacademica`
--

INSERT INTO `infoacademica` (`id`, `idUsuario`, `Grado`, `cuerpoAcademico`, `consolidacionCA`, `perfilPROMEP`, `nivelSNI`, `areaConocimiento`) VALUES
(1, 2, 'Dr.', 'Tecnología de información y comunicaciones aplicadas a la ingeniería de software y sistemas de información', 'Consolidado', 'Con Perfil Deseable', 'Candidato', 'Área IV: Humanidades y Ciencias de la Conducta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `idInstitucion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `UAcademica` varchar(40) NOT NULL,
  `Pais` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idInstitucion`, `idUsuario`, `Nombre`, `Ciudad`, `UAcademica`, `Pais`, `Estado`) VALUES
(1, 2, 'Universidad Politécnica de Sinaloa', 'Mazatlán', 'Computación', 'México', 'Sinaloa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigaciones`
--

CREATE TABLE `investigaciones` (
  `idInvestigaciones` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `Hash` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Contenido` longtext,
  `Tema` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `NombreRed` varchar(255) DEFAULT NULL,
  `NombreMesa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticias` int(11) NOT NULL,
  `idUsuarios` int(11) DEFAULT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Descripcion` longtext,
  `Fecha` date DEFAULT NULL,
  `img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticias`, `idUsuarios`, `Titulo`, `Descripcion`, `Fecha`, `img`) VALUES
(14, 2, 'Prueba 1', '<p>Descripción de la noticia</p>', '2018-11-09', 'contraseña.jpg'),
(17, 2, 'ahora si', '<p>&nbsp;se camio imagen</p>', '2018-11-12', 'descarga_(3).jpg'),
(18, 2, 'otra', '<p>cambio la imagen x8</p>', '2018-11-12', 'fondo-margaritas-Favim_com-2190560.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `ApPaterno` varchar(45) DEFAULT NULL,
  `ApMaterno` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Privilegio` int(11) DEFAULT NULL,
  `Pais` varchar(60) DEFAULT NULL,
  `Img` varchar(45) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Nombre`, `ApPaterno`, `ApMaterno`, `Correo`, `Password`, `Privilegio`, `Pais`, `Img`, `Nacimiento`, `Telefono`, `Sexo`) VALUES
(1, 'angeles', 'leva', 'leva', 'angeles@gmail.com', '4152d2666890cee1f5e3beb68cd5f35e', 1, NULL, '420fb3b8c0586edfb017cb032adb2b3e--background-', NULL, '', ''),
(2, 'Vanessa Guadalupe', 'Felix', 'Aviña', 'vfelix@upsin.edu.mx', '4152d2666890cee1f5e3beb68cd5f35e', 2, 'México', '1.png', '1979-07-12', '669-1800-695', 'Femenino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutores`),
  ADD KEY `Investigaciones_idx` (`idInvestigacion`);

--
-- Indices de la tabla `infoacademica`
--
ALTER TABLE `infoacademica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`idInstitucion`),
  ADD KEY `usuario` (`idUsuario`);

--
-- Indices de la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  ADD PRIMARY KEY (`idInvestigaciones`),
  ADD KEY `InvestigacionesUsuario_idx` (`idUsuario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticias`),
  ADD KEY `NoticiasUsuario_idx` (`idUsuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutores` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `infoacademica`
--
ALTER TABLE `infoacademica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `idInstitucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  MODIFY `idInvestigaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `Investigaciones` FOREIGN KEY (`idInvestigacion`) REFERENCES `investigaciones` (`idInvestigaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `infoacademica`
--
ALTER TABLE `infoacademica`
  ADD CONSTRAINT `infoacademica_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  ADD CONSTRAINT `InvestigacionesUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `NoticiasUsuario` FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
