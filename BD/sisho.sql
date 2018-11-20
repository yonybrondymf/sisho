-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2018 a las 13:43:20
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `referencia` varchar(200) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `monto_pagar` varchar(50) DEFAULT NULL,
  `hora_entrega` varchar(45) DEFAULT NULL,
  `hora_recepcion` varchar(45) DEFAULT NULL,
  `cantidad_asados` int(11) DEFAULT NULL,
  `pagado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `referencia`, `codigo`, `monto_pagar`, `hora_entrega`, `hora_recepcion`, `cantidad_asados`, `pagado`) VALUES
(1, 'Juan Cortes', '9090', '20.00', '08:00 pm', '10:00 am', 2, 0),
(6, 'Miguel', '9091', '10.00', '10:00 pm', '10:00 am', 2, 0),
(7, 'Jose Perez', '9095', '15.00', '10:00 pm', '2018-10-28 06:00:32', 1, 1),
(8, 'karla Suarez', '9096', '20.00', '10:00pm', '2018-10-28 13:49:33', 2, 1),
(9, 'Juan Carlos Morales', '9097', '30.00', '10:00 pm', '2018-10-28 14:01:48', 2, 1),
(10, 'maria fernandez', '9098', '15.00', '10:00 am', '2018-10-28 14:43:10', 2, 1),
(11, 'Luis Carlos Galdoz', '9099', '15', '10:00 pm', '2018-10-28 14:51:00', 2, 1),
(12, 'Bruno Gonzales', '9080', '10.00', '10:00 pm', '2018-10-30 04:37:43', 1, 0),
(13, 'yony mamani', '9081', '15.00', '10:00 pm', '2018-10-30 05:01:52', 1, 0),
(14, 'Yeny mamani', '9192', '10', '10:00 pm', '2018-10-30 06:04:03', 1, 0),
(15, 'Carlos gonzales', '9194', '10.00', '10:00 pm', '17:14', 1, 0),
(16, 'Francisco duclos', '9193', '20', '7:00 PM', '09:59', 1, 0),
(17, 'Santiago Cardenaz', '9196', '15', '10:00 PM', '10:05 AM', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_asados`
--

CREATE TABLE `clientes_asados` (
  `id` int(11) NOT NULL,
  `descripcion` text,
  `imagen` text,
  `estado` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes_asados`
--

INSERT INTO `clientes_asados` (`id`, `descripcion`, `imagen`, `estado`, `cliente_id`) VALUES
(1, 'Papa sola sin pelar', NULL, 3, 6),
(2, 'Pastel de Papa', NULL, 1, 6),
(3, 'Pollo trozado', NULL, 1, 7),
(4, 'Papa sola sin pelar', 'error.PNG', 3, 8),
(5, 'Costillar de Cordero', 'Captura.JPG', 2, 8),
(6, 'Costillar de Cordero', 'Captura.JPG', 2, 9),
(7, 'Papa sola sin pelar', 'Captura.PNG', 2, 9),
(8, 'Pastel de Papa', '5bd5cafecc2ef_Captura.PNG', 3, 10),
(9, 'Costillar de Cordero', '5bd5cafecde47_error.PNG', 3, 10),
(10, 'Papa sola sin pelar', '5bd5ccd49f797_Desert.jpg', 3, 11),
(11, 'Pastel de Papa', '5bd5ccd52b455_Penguins.jpg', 3, 11),
(12, 'Costillar de Cordero', '5bd7e0173d61d_Koala.jpg', 3, 12),
(13, 'Pierna de Chancho', '5bd7e5c1010f6_Penguins.jpg', 1, 13),
(14, 'Pastel de Papa', '5bd7f453f3d57_Hydrangeas.jpg', 1, 14),
(19, 'Descripcion del producto 01', '5bdcaabeec8d2_eventos.jpg', 0, 1),
(20, 'PC intel i7', '5bdcac4a3941a_4-001.jpg', 0, 1),
(21, 'Papa sola sin pelar', '5bddd783839a5_chart (2).png', 0, 15),
(22, 'PC intel i7', '5bde68f1f25a5_eventos.jpg', 0, 15),
(23, 'PC intel i7', '5bde69c67b7e8_Penguins.jpg', 0, 10),
(24, 'Lejia Clorox de 1litro', '5bde6eedc0b2a_Penguins (1).jpg', 0, 15),
(25, 'Costillar de Cordero', '5bdf096a822fb_4-001.jpg', 0, 16),
(26, 'Pollo trozado', '5bdf0a9fa2944_login.png', 1, 17),
(27, 'PC intel i7', '5bdf193e1cf50_informe.png', 1, 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `clientes_asados`
--
ALTER TABLE `clientes_asados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_asado_idx` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `clientes_asados`
--
ALTER TABLE `clientes_asados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes_asados`
--
ALTER TABLE `clientes_asados`
  ADD CONSTRAINT `cliente_asado` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
