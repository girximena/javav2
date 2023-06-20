-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2023 a las 21:20:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Cargo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID`, `Nombre`, `Apellido`, `Cargo`) VALUES
(1, 'Natalia', 'Marin', 'Gerente'),
(2, 'Emily', 'Herrera', 'Ingeniera'),
(3, 'Carolina', 'Giraldo', 'Diseñadora'),
(4, 'Mia', 'Osorio', 'Lider'),
(5, 'Thiago', 'Arias', 'Analista'),
(6, 'Damian', 'Torres', 'Diseñador'),
(7, 'Sebastian', 'Villada', 'Ingeniero'),
(8, 'Salvador', 'Murillo', 'Analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_habilidades`
--

CREATE TABLE `empleados_habilidades` (
  `EmpleadoID` int(11) DEFAULT NULL,
  `HabilidadID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados_habilidades`
--

INSERT INTO `empleados_habilidades` (`EmpleadoID`, `HabilidadID`) VALUES
(1, 4),
(2, 3),
(3, 2),
(4, 10),
(5, 3),
(6, 9),
(7, 7),
(8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_proyectos`
--

CREATE TABLE `empleados_proyectos` (
  `EmpleadoID` int(11) DEFAULT NULL,
  `ProyectoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados_proyectos`
--

INSERT INTO `empleados_proyectos` (`EmpleadoID`, `ProyectoID`) VALUES
(1, 2),
(2, 4),
(3, 1),
(4, 3),
(5, 2),
(6, 5),
(7, 4),
(8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`ID`, `Nombre`) VALUES
(1, 'Programacion'),
(2, 'Diseño grafico'),
(3, 'Analisis de datos'),
(4, 'Gestion de proyectos'),
(5, 'Perseverancia'),
(6, 'Comunicación'),
(7, 'Resolución de problemas'),
(8, 'Trabajo en equipo'),
(9, 'Creatividad'),
(10, 'Liderazgo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`ID`, `Nombre`, `Descripcion`) VALUES
(1, 'Proyecto A', 'Crear robots completamente automatizados que fabrican hamburguesas de principio a fin'),
(2, 'Proyecto B', 'Crear espejos con camara y luces led para subir a las redes sociales'),
(3, 'Proyecto C', 'Crear una clínica ambulante y autónoma'),
(4, 'Proyecto D', 'Crear vehiculos autonomos diseñado para hacer domicilios'),
(5, 'Proyecto E', 'Crear cabinas para transpotar mascotas en avion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `empleados_habilidades`
--
ALTER TABLE `empleados_habilidades`
  ADD KEY `EmpleadoID` (`EmpleadoID`),
  ADD KEY `HabilidadID` (`HabilidadID`);

--
-- Indices de la tabla `empleados_proyectos`
--
ALTER TABLE `empleados_proyectos`
  ADD KEY `EmpleadoID` (`EmpleadoID`),
  ADD KEY `ProyectoID` (`ProyectoID`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`ID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados_habilidades`
--
ALTER TABLE `empleados_habilidades`
  ADD CONSTRAINT `empleados_habilidades_ibfk_1` FOREIGN KEY (`EmpleadoID`) REFERENCES `empleados` (`ID`),
  ADD CONSTRAINT `empleados_habilidades_ibfk_2` FOREIGN KEY (`HabilidadID`) REFERENCES `habilidades` (`ID`);

--
-- Filtros para la tabla `empleados_proyectos`
--
ALTER TABLE `empleados_proyectos`
  ADD CONSTRAINT `empleados_proyectos_ibfk_1` FOREIGN KEY (`EmpleadoID`) REFERENCES `empleados` (`ID`),
  ADD CONSTRAINT `empleados_proyectos_ibfk_2` FOREIGN KEY (`ProyectoID`) REFERENCES `proyectos` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
