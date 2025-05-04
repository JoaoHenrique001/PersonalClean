-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2025 a las 23:48:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personalclean`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idadministradores` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `nombre_completo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `idchats` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `f_nacimiento` varchar(45) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `notaMedia` float DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `codigoPostal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idfuncionarios` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `notaMedia` float DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `codigoPostal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`idfuncionarios`, `nombre`, `apellidos`, `email`, `contraseña`, `telefono`, `f_nacimiento`, `descripcion`, `foto_perfil`, `notaMedia`, `direccion`, `provincia`, `ciudad`, `codigoPostal`) VALUES
(1, 'Laura', 'Gómez', 'laura.gomez@example.com', 'contraseña123', '612345678', '1990-05-12', 'Psicóloga con 10 años de experiencia en salud mental.', NULL, 9, 'Calle Real 12', 'Madrid', 'Madrid', NULL),
(2, 'Carlos', 'Pérez', 'carlos.perez@example.com', 'qwerty456', '687123456', '1985-08-20', NULL, NULL, 8, NULL, NULL, 'Barcelona', NULL),
(3, 'Marta', 'López', 'marta.lopez@example.com', 'abc123456', '698745123', '1992-11-30', 'Orientadora educativa especializada en adolescentes.', 'marta.jpg', 10, 'Av. Constitución 89', 'Sevilla', 'Sevilla', NULL),
(4, 'Javier', 'Santos', 'javier.santos@example.com', 'miClaveSegura', '677223344', '1988-03-15', NULL, NULL, 7, NULL, 'Valencia', NULL, NULL),
(5, 'Ana', 'Ramírez', 'ana.ramirez@example.com', 'ana456789', '655112233', '1995-09-08', 'Experta en inserción laboral y coaching profesional.', 'ana_foto.png', 9, 'Calle Luna 7', NULL, 'Bilbao', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensajes` int(11) NOT NULL,
  `idChat` int(11) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `envia` int(11) NOT NULL,
  `fechaHora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visto` enum('si','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_servicios`
--

CREATE TABLE `pedidos_servicios` (
  `idpedidoServicio` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `activo` enum('si','no') NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `valorAlternativo` decimal(5,2) DEFAULT NULL,
  `diaServicioAlternativo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServicio` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `fechaServicio` date NOT NULL,
  `estado` enum('activo','terminado','confirmacion') NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `tipoServicio` varchar(45) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `diaServicio` varchar(45) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_clientes`
--

CREATE TABLE `valoraciones_clientes` (
  `idvaloraciones` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `estrellas` varchar(45) NOT NULL,
  `comentario` varchar(45) NOT NULL,
  `idFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_servicios`
--

CREATE TABLE `valoraciones_servicios` (
  `idvaloraciones_servicios` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `estrella` varchar(45) NOT NULL,
  `comentario` varchar(45) NOT NULL,
  `idFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idadministradores`);

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`idchats`),
  ADD KEY `idFuncionariChat` (`idFuncionario`),
  ADD KEY `idClienteChat` (`idCliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idfuncionarios`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idmensajes`),
  ADD KEY `fk_idChat_mensajes` (`idChat`);

--
-- Indices de la tabla `pedidos_servicios`
--
ALTER TABLE `pedidos_servicios`
  ADD PRIMARY KEY (`idpedidoServicio`),
  ADD KEY `fk_pedidoservicio_idServicio` (`idServicio`),
  ADD KEY `fk_pedidoservicio_idFuncionario` (`idFuncionario`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `idFuncionariServicio` (`idFuncionario`),
  ADD KEY `idClienteServicio` (`idcliente`);

--
-- Indices de la tabla `valoraciones_clientes`
--
ALTER TABLE `valoraciones_clientes`
  ADD PRIMARY KEY (`idvaloraciones`),
  ADD KEY `idFuncionario` (`idFuncionario`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `valoraciones_servicios`
--
ALTER TABLE `valoraciones_servicios`
  ADD PRIMARY KEY (`idvaloraciones_servicios`),
  ADD KEY `fk_val_serv_idServicio` (`idServicio`),
  ADD KEY `fk_val_serv_idFuncionario` (`idFuncionario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idadministradores` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `idchats` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idfuncionarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensajes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos_servicios`
--
ALTER TABLE `pedidos_servicios`
  MODIFY `idpedidoServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones_clientes`
--
ALTER TABLE `valoraciones_clientes`
  MODIFY `idvaloraciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoraciones_servicios`
--
ALTER TABLE `valoraciones_servicios`
  MODIFY `idvaloraciones_servicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `idClienteChat` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idFuncionariChat` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionarios` (`idfuncionarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_idChat_mensajes` FOREIGN KEY (`idChat`) REFERENCES `chats` (`idchats`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos_servicios`
--
ALTER TABLE `pedidos_servicios`
  ADD CONSTRAINT `fk_pedidoservicio_idFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionarios` (`idfuncionarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidoservicio_idServicio` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `idClienteServicio` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idFuncionariServicio` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionarios` (`idfuncionarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `valoraciones_clientes`
--
ALTER TABLE `valoraciones_clientes`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionarios` (`idfuncionarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `valoraciones_servicios`
--
ALTER TABLE `valoraciones_servicios`
  ADD CONSTRAINT `fk_val_serv_idFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionarios` (`idfuncionarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_val_serv_idServicio` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
