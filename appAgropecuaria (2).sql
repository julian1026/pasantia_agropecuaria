-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-02-2021 a las 03:51:38
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appAgropecuaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agricultor`
--

CREATE TABLE `agricultor` (
  `idAgricultor` int(11) NOT NULL,
  `PersonasAcargo` int(11) DEFAULT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agricultor`
--

INSERT INTO `agricultor` (`idAgricultor`, `PersonasAcargo`, `idPersona`) VALUES
(1, 12, 3),
(2, 12, 5),
(3, 10, 6),
(4, 10, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `idAnimales` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `raza` varchar(45) DEFAULT NULL,
  `nombre_vacunas` varchar(45) DEFAULT NULL,
  `cantidad_animales` int(11) DEFAULT NULL,
  `informacion` varchar(400) DEFAULT NULL,
  `idFinca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`idAnimales`, `tipo`, `raza`, `nombre_vacunas`, `cantidad_animales`, `informacion`, `idFinca`) VALUES
(1, 'puercos', 'boll', 'ppre', 1212, 'raza pequena', 5),
(2, 'gallinas', 'cariocas', 'covid', 120000, 'ponedoras', 5),
(3, 'pato', 'piares', 'no', 100000, 'granja', 2),
(4, 'cabras', 'comun', 'no', 400, 'Es de clima frio, se alimenta de verduras', 5),
(5, '', '', '', 0, '', 5),
(6, '', '', '', 0, '', 5),
(7, 'Vacas', 'Lolas', 'Idfsr', 54, 'Clima star', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corregimiento`
--

CREATE TABLE `corregimiento` (
  `idCorregimiento` int(11) NOT NULL,
  `nombre_corregimiento` varchar(45) DEFAULT NULL,
  `idMunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `corregimiento`
--

INSERT INTO `corregimiento` (`idCorregimiento`, `nombre_corregimiento`, `idMunicipio`) VALUES
(1, 'Patía ', 1),
(2, 'La Florida', 1),
(3, 'Méndez ', 1),
(4, 'El Estrecho', 1),
(5, 'galindez', 1),
(6, 'El puro ', 1),
(7, 'Angulo ', 1),
(8, 'Las tallas', 1),
(9, 'Pan de azucar', 1),
(10, 'santacruz', 1),
(11, 'El placer', 1),
(12, 'Santa rosa baja ', 1),
(13, 'La mesa', 1),
(14, 'Quebrada oscura', 1),
(15, 'Bello horizonte', 1),
(16, 'brisas', 1),
(17, 'Don alonso', 1),
(18, 'La fonda', 1),
(19, 'El hoyo', 1),
(20, 'Piedra sentada', 1),
(21, 'sachamates', 1),
(22, 'guayabal', 1),
(23, 'versalles', 1),
(24, 'El bordo ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre_department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `codigo`, `nombre_department`) VALUES
(1, 1, 'CAUCA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extension_agro`
--

CREATE TABLE `extension_agro` (
  `id` int(11) NOT NULL,
  `COMPONENTE1ASPECTO1` int(11) NOT NULL,
  `COMPONENTE2ASPECTO1` int(11) NOT NULL,
  `COMPONENTE3ASPECTO1` int(11) NOT NULL,
  `COMPONENTE4ASPECTO1` int(11) NOT NULL,
  `COMPONENTE5ASPECTO1` int(11) NOT NULL,
  `COMPONENTE6ASPECTO1` int(11) NOT NULL,
  `COMPONENTE7ASPECTO1` int(11) NOT NULL,
  `COMPONENTE8ASPECTO1` int(11) NOT NULL,
  `COMPONENTE9ASPECTO1` int(11) NOT NULL,
  `COMPONENTE10ASPECTO1` int(11) NOT NULL,
  `NIVELASPECTO1` int(11) NOT NULL,
  `COMPONENTE1ASPECTO2` int(11) NOT NULL,
  `COMPONENTE2ASPECTO2` int(11) NOT NULL,
  `COMPONENTE3ASPECTO2` int(11) NOT NULL,
  `COMPONENTE4ASPECTO2` int(11) NOT NULL,
  `COMPONENTE5ASPECTO2` int(11) NOT NULL,
  `COMPONENTE6ASPECTO2` int(11) NOT NULL,
  `COMPONENTE7ASPECTO2` int(11) NOT NULL,
  `NIVELASPECTO2` int(11) NOT NULL,
  `COMPONENTE1ASPECTO3` int(11) NOT NULL,
  `COMPONENTE2ASPECTO3` int(11) NOT NULL,
  `COMPONENTE3ASPECTO3` int(11) NOT NULL,
  `COMPONENTE4ASPECTO3` int(11) NOT NULL,
  `COMPONENTE5ASPECTO3` int(11) NOT NULL,
  `NIVELASPECTO3` int(11) NOT NULL,
  `COMPONENTE1ASPECTO4` int(11) NOT NULL,
  `COMPONENTE2ASPECTO4` int(11) NOT NULL,
  `COMPONENTE3ASPECTO4` int(11) NOT NULL,
  `COMPONENTE4ASPECTO4` int(11) NOT NULL,
  `NIVELASPECTO4` int(11) NOT NULL,
  `COMPONENTE1ASPECTO5` int(11) NOT NULL,
  `COMPONENTE2ASPECTO5` int(11) NOT NULL,
  `COMPONENTE3ASPECTO5` int(11) NOT NULL,
  `COMPONENTE4ASPECTO5` int(11) NOT NULL,
  `NIVELASPECTO5` int(11) NOT NULL,
  `CLASIFICACIONGENERAL` int(11) NOT NULL,
  `idAgricultor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finca`
--

CREATE TABLE `finca` (
  `idFinca` int(11) NOT NULL,
  `nombre_finca` varchar(45) DEFAULT NULL,
  `hectareas` float NOT NULL,
  `actividadAgropecuaria` varchar(100) NOT NULL,
  `lineaProductiva` varchar(100) NOT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idAgricultor` int(11) NOT NULL,
  `id_Vereda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `finca`
--

INSERT INTO `finca` (`idFinca`, `nombre_finca`, `hectareas`, `actividadAgropecuaria`, `lineaProductiva`, `latitud`, `longitud`, `fecha_registro`, `idAgricultor`, `id_Vereda`) VALUES
(1, 'santana', 12, 'ganaderia', 'bobinos', 2.60623, -76.5617, '2021-01-13 22:08:48', 3, 4),
(2, 'naranjos', 23, 'agricola', 'papa, tomate', 2.60623, -76.5617, '2021-01-13 22:10:06', 2, 1),
(3, 'los robles', 12, 'ortalizas', 'zanahoria,cebolla', 2.62206, -76.5714, '2021-01-16 17:54:10', 2, 6),
(4, 'la pinta', 4, 'ganaderia', 'puercos', 2.60623, -76.5617, '2021-01-14 03:39:24', 1, 5),
(5, 'villa del norte', 6, 'Flowers', 'rosas,claveles', 2.60623, -76.5617, '2021-02-02 13:47:53', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImagenes` int(11) NOT NULL,
  `foto` mediumblob DEFAULT NULL,
  `idvisitas_fincas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL,
  `nombre_mncp` varchar(45) DEFAULT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `nombre_mncp`, `id_departamento`) VALUES
(1, 'Patia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `primer_nombre` varchar(45) DEFAULT NULL,
  `segundo_nombre` varchar(45) DEFAULT NULL,
  `primer_apellido` varchar(45) DEFAULT NULL,
  `segundo_apellido` varchar(45) DEFAULT NULL,
  `tipo_identificacion` varchar(45) DEFAULT NULL,
  `num_identificacion` varchar(45) DEFAULT NULL,
  `sexo` char(45) DEFAULT NULL,
  `etnia` varchar(30) NOT NULL,
  `discapacidad` varchar(30) NOT NULL,
  `fecha_ncm` date DEFAULT NULL,
  `nivel_escolaridad` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `foto` mediumblob DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tipo_identificacion`, `num_identificacion`, `sexo`, `etnia`, `discapacidad`, `fecha_ncm`, `nivel_escolaridad`, `telefono`, `foto`, `correo`, `fecha_registro`, `idUsuario`) VALUES
(1, 'cesar', '', 'sanchez', 'fuentes', 'cedula_extranjeria', '3121212312', 'M', 'Negro', 'no', '2020-06-08', 'tecnico', '3135877553', '', 'juancaor1997@gmail.com', '2020-12-19 16:27:31', 2),
(2, 'julian', 'andres', 'calambas', 'ordonez', 'cedula_ciudadania', '1060806072', 'M', '0', 'no', '1997-10-26', 'profesional', '3135877553', '', 'julian971026@gmail.com', '2020-12-19 16:05:54', 3),
(3, 'andres', 'jose ', 'burbano', 'fuentes', 'cedula_ciudadania', '1060750442', 'M', 'Negro', 'no', '1997-10-31', 'profesional', '3154632454', '', 'ferchofer@hotmail.com', '2020-12-22 16:24:07', 4),
(4, 'daniel', 'camilo', 'rivas', 'gutierrez', 'cedula_ciudadania', '1060876054', 'M', 'Ninguna', 'si', '1994-10-01', 'tecnico', '3152311212', '', 'vany@gmail.com', '2021-01-07 00:45:52', 5),
(5, 'fernanda', 'camila', 'rivas', 'sanchez', 'cedula_ciudadania', '1070806043', 'F', 'Indigena', 'no', '2005-11-02', 'bachiller', '3116083063', '', 'fercha@gmail.com', '2021-01-11 14:39:25', 6),
(6, 'rosario', '', 'flor', '', 'cedula_ciudadania', '2323432', 'F', 'Afrocolombiano', 'no', '1993-01-31', 'bachiller', '312123233434', '', 'rosa@gmail.com', '2021-01-13 19:49:56', 8),
(7, 'Cesar', 'Camilo', 'Sanchez', '', 'cedula_ciudadania', '12044734823', 'M', 'Ninguna', 'no', '2005-12-31', 'bachiller', '32333833', '', 'cesae@gmail.com', '2021-01-24 15:51:41', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantaciones`
--

CREATE TABLE `plantaciones` (
  `idPlantaciones` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `vegetales_cantidad` int(11) DEFAULT NULL,
  `informacion` varchar(45) DEFAULT NULL,
  `idFinca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plantaciones`
--

INSERT INTO `plantaciones` (`idPlantaciones`, `nombre`, `tipo`, `vegetales_cantidad`, `informacion`, `idFinca`) VALUES
(1, 'lechuga', 'ortaliza', 4000, '', 5),
(3, 'espinaca', 'ortaliza', 10000, 'clima calido', 5),
(4, 'tomate', 'ortaliza', 30000, 'clima calido', 1),
(5, 'espinaca', 'ortaliza', 40000, 'clima calido', 5),
(6, 'zandia', 'vegetal', 200, 'clima frio, facil comercio', 5),
(7, '', '', 0, '', 1),
(8, 'cebolleta', 'ortaliza', 2300, 'clima frio, no necesita de fertilizantes', 5),
(9, 'remolacha', 'ortaliza', 3000, 'variedad de tipo small', 5),
(10, 'naranjas', 'arbol', 4500, 'clima calido, variedad dulce', 5),
(11, 'platano', 'cavendish', 1000, 'clima calido', 3),
(12, 'zanahoria', 'ortaliza', 2000, 'clima frio , invierno', 5),
(13, 'espinaca', 'ortaliza', 4000, 'es de clima frio, necesita de mucha agua', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre_rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre_rol`) VALUES
(1, 'administrador'),
(2, 'tecnico'),
(3, 'agricultor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `idTecnico` int(11) NOT NULL,
  `descripcion_estudio` varchar(45) DEFAULT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`idTecnico`, `descripcion_estudio`, `idPersona`) VALUES
(1, 'psicologo', 1),
(2, 'contador administrativo', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `contrasena`, `user_name`, `estado`, `idRol`) VALUES
(1, '08c2972134a06141166d5cb9796ec699', 'admin123', 'ACTIVO', 1),
(2, '81dc9bdb52d04dc20036dbd8313ed055', 'santi12', 'ACTIVO', 2),
(3, '5d05faa3b041d3dad0b0cb837eb3c2a3', '1060806072', 'ACTIVO', 1),
(4, '1cc6c11f99b99a520006385d4271aab3', '1060750442', 'ACTIVO', 3),
(5, '81dc9bdb52d04dc20036dbd8313ed055', 'gio12', 'ACTIVO', 1),
(6, '36d5ee968cb66f91161dae6711a24bf1', '1070806043', 'ACTIVO', 3),
(7, '97f4cbb5c77018654bde74a10d4bdc6a', '2534523', 'ACTIVO', 3),
(8, 'b929f326ef7c21dacc34fa2a3046290d', '2323432', 'ACTIVO', 3),
(9, '81b86f2d6fb45913e9d39796acfd9df9', '12044734823', 'ACTIVO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vereda`
--

CREATE TABLE `vereda` (
  `id_vereda` int(11) NOT NULL,
  `nombreVereda` varchar(30) NOT NULL,
  `corregimiento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vereda`
--

INSERT INTO `vereda` (`id_vereda`, `nombreVereda`, `corregimiento_id`) VALUES
(1, 'La Florida', 2),
(2, 'Galindez', 5),
(3, 'Angulo', 7),
(4, 'Las tallas', 8),
(5, 'Pan de azúcar', 9),
(6, 'Bello horizonte', 15),
(7, 'Sachamates', 21),
(8, 'Guayabal', 22),
(9, 'Versalles ', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_fincas`
--

CREATE TABLE `visitas_fincas` (
  `idvisitas` int(11) NOT NULL,
  `descripcion_visita` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `tarea` varchar(1000) NOT NULL,
  `idFinca` int(11) NOT NULL,
  `idTecnico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agricultor`
--
ALTER TABLE `agricultor`
  ADD PRIMARY KEY (`idAgricultor`),
  ADD KEY `idPersona` (`idPersona`),
  ADD KEY `idPersona_2` (`idPersona`);

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`idAnimales`),
  ADD KEY `idFinca` (`idFinca`);

--
-- Indices de la tabla `corregimiento`
--
ALTER TABLE `corregimiento`
  ADD PRIMARY KEY (`idCorregimiento`),
  ADD KEY `Municipio_idMunicipio` (`idMunicipio`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `extension_agro`
--
ALTER TABLE `extension_agro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAgricultor` (`idAgricultor`);

--
-- Indices de la tabla `finca`
--
ALTER TABLE `finca`
  ADD PRIMARY KEY (`idFinca`),
  ADD KEY `idAgricultor` (`idAgricultor`),
  ADD KEY `id_Vereda` (`id_Vereda`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagenes`),
  ADD KEY `fk_Imagenes_visitas_fincas1` (`idvisitas_fincas`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `fk_Persona_Usuario1` (`idUsuario`) USING BTREE,
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idUsuario_2` (`idUsuario`);

--
-- Indices de la tabla `plantaciones`
--
ALTER TABLE `plantaciones`
  ADD PRIMARY KEY (`idPlantaciones`),
  ADD KEY `fk_Plantaciones_Finca1` (`idFinca`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`idTecnico`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idRol_2` (`idRol`),
  ADD KEY `idRol_3` (`idRol`);

--
-- Indices de la tabla `vereda`
--
ALTER TABLE `vereda`
  ADD PRIMARY KEY (`id_vereda`),
  ADD KEY `corregimiento_id` (`corregimiento_id`);

--
-- Indices de la tabla `visitas_fincas`
--
ALTER TABLE `visitas_fincas`
  ADD PRIMARY KEY (`idvisitas`),
  ADD KEY `fk_visitas_fincas_Finca1` (`idFinca`),
  ADD KEY `fk_visitas_fincas_Tecnicos1` (`idTecnico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agricultor`
--
ALTER TABLE `agricultor`
  MODIFY `idAgricultor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `idAnimales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `corregimiento`
--
ALTER TABLE `corregimiento`
  MODIFY `idCorregimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `extension_agro`
--
ALTER TABLE `extension_agro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `idFinca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagenes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `plantaciones`
--
ALTER TABLE `plantaciones`
  MODIFY `idPlantaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `idTecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `vereda`
--
ALTER TABLE `vereda`
  MODIFY `id_vereda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `visitas_fincas`
--
ALTER TABLE `visitas_fincas`
  MODIFY `idvisitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agricultor`
--
ALTER TABLE `agricultor`
  ADD CONSTRAINT `fk_Agricultor_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `animales`
--
ALTER TABLE `animales`
  ADD CONSTRAINT `fk_Animales_Finca1` FOREIGN KEY (`idFinca`) REFERENCES `finca` (`idFinca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `corregimiento`
--
ALTER TABLE `corregimiento`
  ADD CONSTRAINT `corregAndMunicipio` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`);

--
-- Filtros para la tabla `extension_agro`
--
ALTER TABLE `extension_agro`
  ADD CONSTRAINT `extra_agricultor` FOREIGN KEY (`idAgricultor`) REFERENCES `agricultor` (`idAgricultor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `finca`
--
ALTER TABLE `finca`
  ADD CONSTRAINT `finca_ibfk_1` FOREIGN KEY (`id_Vereda`) REFERENCES `vereda` (`id_vereda`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Finca_Agricultor1` FOREIGN KEY (`idAgricultor`) REFERENCES `agricultor` (`idAgricultor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_Imagenes_visitas_fincas1` FOREIGN KEY (`idvisitas_fincas`) REFERENCES `visitas_fincas` (`idvisitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipioANDdepartamento` FOREIGN KEY (`id_departamento`) REFERENCES `municipio` (`idMunicipio`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_Persona_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plantaciones`
--
ALTER TABLE `plantaciones`
  ADD CONSTRAINT `fk_Plantaciones_Finca1` FOREIGN KEY (`idFinca`) REFERENCES `finca` (`idFinca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `fk_Supervisor_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vereda`
--
ALTER TABLE `vereda`
  ADD CONSTRAINT `veredaANDcorregimiento` FOREIGN KEY (`corregimiento_id`) REFERENCES `corregimiento` (`idCorregimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visitas_fincas`
--
ALTER TABLE `visitas_fincas`
  ADD CONSTRAINT `fk_visitas_fincas_Finca1` FOREIGN KEY (`idFinca`) REFERENCES `finca` (`idFinca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_visitas_fincas_Tecnicos1` FOREIGN KEY (`idTecnico`) REFERENCES `tecnicos` (`idTecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
