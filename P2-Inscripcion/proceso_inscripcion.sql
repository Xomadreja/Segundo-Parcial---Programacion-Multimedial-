-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 05:39:45
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
-- Base de datos: `proceso_inscripcion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicional`
--

CREATE TABLE `condicional` (
  `id` int(11) NOT NULL,
  `flujo` varchar(10) NOT NULL,
  `proceso` varchar(10) NOT NULL,
  `procesoPorSi` varchar(10) NOT NULL,
  `procesoPorNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `condicional`
--

INSERT INTO `condicional` (`id`, `flujo`, `proceso`, `procesoPorSi`, `procesoPorNo`) VALUES
(1, 'F2', 'P4', 'P5', 'P6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE `flujo` (
  `id` int(11) NOT NULL,
  `flujo` varchar(10) NOT NULL,
  `proceso` varchar(10) NOT NULL,
  `procesoSig` varchar(11) DEFAULT NULL,
  `tipo` varchar(10) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `pantalla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`id`, `flujo`, `proceso`, `procesoSig`, `tipo`, `rol`, `pantalla`) VALUES
(1, 'F1', 'P1', 'P2', 'I', 'Estudiante', 'datos.php'),
(2, 'F1', 'P2', 'P3', 'P', 'Estudiante', 'carrera.php'),
(3, 'F1', 'P3', NULL, 'P', 'Estudiante', 'procesos.php'),
(4, 'F2', 'P4', 'C', 'I', 'Kardex', 'procesosKardex.php'),
(5, 'F2', 'P5', NULL, 'P', 'Kardex', 'siDatos.php'),
(6, 'F2', 'P6', NULL, 'P', 'Caja', 'noDatos.php'),
(8, 'F3', 'P7', NULL, 'I', 'Caja', 'facturiza.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `password`, `rol`) VALUES
(1, 'Michel', 'kardex', 'Kardex'),
(2, 'Irwin', 'caja', 'Caja'),
(3, 'Fabe', 'estudiante', 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_verificacion`
--

CREATE TABLE `proceso_verificacion` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `nomDoc` varchar(100) NOT NULL,
  `carrera` varchar(30) NOT NULL,
  `fechaIni` datetime NOT NULL,
  `fechaFin` datetime DEFAULT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso_verificacion`
--

INSERT INTO `proceso_verificacion` (`id`, `id_persona`, `ci`, `nomDoc`, `carrera`, `fechaIni`, `fechaFin`, `estado`) VALUES
(10, 3, 'rrrrr', 'DocPrefas.pdf', 'Matematica', '2022-11-27 17:03:29', '2022-11-27 20:24:42', 'aceptado'),
(11, 3, 'ttttt', 'DocPrefas.pdf', 'Fisica', '2022-11-27 17:06:53', '2022-11-27 20:25:35', 'rechazado'),
(12, 3, 'uuuuu', 'DocPrefas.pdf', 'Quimica', '2022-11-27 17:08:33', '0000-00-00 00:00:00', 'verificando'),
(13, 3, 'fsdfsdfs', 'DocPrefas.pdf', 'Informatica', '2022-11-27 17:44:17', '0000-00-00 00:00:00', 'verificando');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `condicional`
--
ALTER TABLE `condicional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `flujo`
--
ALTER TABLE `flujo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_verificacion`
--
ALTER TABLE `proceso_verificacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `condicional`
--
ALTER TABLE `condicional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `flujo`
--
ALTER TABLE `flujo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proceso_verificacion`
--
ALTER TABLE `proceso_verificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
