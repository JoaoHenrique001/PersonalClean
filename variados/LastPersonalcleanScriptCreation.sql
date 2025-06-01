-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2025 a las 19:09:45
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
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idadministradores`, `email`, `contraseña`, `nombre`) VALUES
(1, 'admin@hotmail.com', 'admin', 'joao Henrique Silva de Araujo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `idchats` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`idchats`, `idCliente`, `idFuncionario`) VALUES
(1, 10, 10),
(2, 8, 8),
(3, 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `notaMedia` float DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `codigoPostal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellidos`, `email`, `contraseña`, `telefono`, `f_nacimiento`, `foto_perfil`, `notaMedia`, `direccion`, `provincia`, `ciudad`, `codigoPostal`) VALUES
(2, 'Herrera', 'Pérez Lopez', 'Herrera.perez@email.com', 'contraseña456', '666666666', '1988-10-05', 'foto_perfil_juan.jpg', 8.5, 'Calle Falsa 123, Piso 3123', 'Madrid', 'Belmonte de Tajo', '28200'),
(3, 'María', 'Gómez', 'maria.gomez@email.com', 'contraseña456', '555555555', '1990-11-23', 'foto_perfil_maria.jpg', 5.5, 'Avenida Libertad 45, 3ºC', 'Barcelona', 'Barcelona', '08002'),
(4, 'Pedro', 'Rodríguez', 'pedro.rodriguez@email.com', 'contraseña789', '666666666', '1992-02-11', 'foto_perfil_pedro.jpg', 7.85, 'Calle Mayor 78', 'Valencia', 'Valencia', '46001'),
(5, 'Laura', 'Hernández', 'laura.hernandez@email.com', 'contraseña321', '777777777', '1988-08-30', 'foto_perfil_laura.jpg', 8.75, 'Paseo del Sol 234', 'Sevilla', 'Sevilla', '41010'),
(7, 'Laura', 'Pérez García', 'laura@example.com', 'pass123', '612345678', '1990-05-15', NULL, 9, 'Calle Mayor 10', 'Madrid', 'Madrid', '28001'),
(8, 'Carlos', 'López Díaz', 'carlos@example.com', 'secure456', '622345679', '1988-02-10', NULL, 8.5, 'Av. de América 24', 'Barcelona', 'Barcelona', '08002'),
(9, 'Marta', 'Sánchez Ruiz', 'marta@example.com', 'clave789', '632345670', '1995-07-23', NULL, 7.8, 'Calle Falsa 123', 'Valencia', 'Valencia', '46001'),
(10, 'David', 'Martínez Gómez', 'david@example.com', 'pass000', '642345671', '1985-12-01', NULL, 6.9, 'Paseo del Prado 55', 'Madrid', 'Madrid', '28014'),
(11, 'Lucía', 'Fernández López', 'lucia@example.com', 'lucia321', '652345672', '1992-09-09', NULL, 9.4, 'Gran Vía 8', 'Sevilla', 'Sevilla', '41001'),
(12, 'Pablo', 'Torres Jiménez', 'pablo@example.com', 'torres654', '662345673', '1997-04-20', NULL, 8.2, 'Calle Sol 3', 'Málaga', 'Málaga', '29001'),
(13, 'Sara', 'Romero Castro', 'sara@example.com', 'sara999', '672345674', '1993-11-30', NULL, 7.5, 'Av. Constitución 14', 'Zaragoza', 'Zaragoza', '50001'),
(14, 'Javier', 'Ortega León', 'javier@example.com', 'jav1234', '682345675', '1991-03-17', NULL, 6.8, 'Calle Luna 5', 'Granada', 'Granada', '18001'),
(15, 'Elena', 'Molina Navarro', 'elena@example.com', 'ele4567', '692345676', '1998-08-08', NULL, 9.1, 'Plaza Nueva 2', 'Bilbao', 'Bilbao', '48001'),
(16, 'Alejandro', 'Morales Peña', 'alejandro@example.com', 'alempass', '602345677', '1989-06-06', NULL, 8, 'Calle Real 11', 'A Coruña', 'A Coruña', '15001'),
(17, 'Cliente', 'test', 'cliente@hotmail.com', 'msnmsnmsN9', '66666666666', '2003-03-26', NULL, NULL, 'Rua C14, 20', 'Madrid', 'Becerril de la Sierra', '28288');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idFuncionarios` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `notaMedia` float DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `codigoPostal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`idFuncionarios`, `nombre`, `apellidos`, `email`, `contraseña`, `telefono`, `f_nacimiento`, `descripcion`, `foto_perfil`, `notaMedia`, `direccion`, `provincia`, `ciudad`, `codigoPostal`) VALUES
(1, 'Laura', 'Gomez', 'laura.gomez@example.com', 'contraseña123', '85818066', '1988-02-09', 'Psicóloga con 10 años de experiencia en salud mentalmente bien.', NULL, 9, 'Calle Real 120', 'Madrid', 'Morata de Tajuña', '28200'),
(2, 'Carlos', 'Pérez', 'carlos.perez@example.com', 'qwerty456', '687123456', '1985-08-20', NULL, NULL, 8, '', '', 'Barcelona', ''),
(3, 'Marta', 'López', 'marta.lopez@example.com', 'abc123456', '698745123', '1992-11-30', 'Orientadora educativa especializada en adolescentes.', 'marta.jpg', 9.99, 'Av. Constitución 89', 'Sevilla', 'Sevilla', ''),
(6, 'Isabel', 'Reyes Torres', 'isabel@clean.com', 'fun123', '711234567', '1980-03-12', NULL, NULL, 8.9, 'Calle Verde 22', 'Madrid', 'Madrid', '28002'),
(7, 'Antonio', 'Gutiérrez Silva', 'antonio@clean.com', 'func789', '721234568', '1979-01-01', NULL, NULL, 9.3, 'Calle Norte 7', 'Barcelona', 'Barcelona', '08003'),
(8, 'Cristina', 'Méndez Vidal', 'cristina@clean.com', 'cristina01', '731234569', '1990-06-25', NULL, NULL, 7.7, 'Calle Sur 15', 'Sevilla', 'Sevilla', '41002'),
(9, 'Miguel', 'Núñez Ramos', 'miguel@clean.com', 'migpass', '741234560', '1985-10-19', NULL, NULL, 6.8, 'Calle Este 10', 'Zaragoza', 'Zaragoza', '50002'),
(10, 'Sonia', 'Luna Romero', 'sonia@clean.com', 'sonia88', '751234561', '1992-08-14', NULL, NULL, 9.6, 'Calle Oeste 8', 'Madrid', 'Madrid', '28003'),
(11, 'Luis', 'Cano Domínguez', 'luis@clean.com', 'luis321', '761234562', '1984-11-11', NULL, NULL, 7.9, 'Av. Sol 6', 'Valencia', 'Valencia', '46002'),
(12, 'Teresa', 'Iglesias Bravo', 'teresa@clean.com', 'teresapass', '771234563', '1993-04-05', NULL, NULL, 8.1, 'Calle Flor 9', 'Granada', 'Granada', '18002'),
(13, 'Andrés', 'Pérez Méndez', 'andres@clean.com', 'andrespw', '781234564', '1991-02-22', NULL, NULL, 7.2, 'Calle Olmo 4', 'Bilbao', 'Bilbao', '48002'),
(14, 'Natalia', 'Moreno Peña', 'natalia@clean.com', 'nataliaxyz', '791234565', '1986-07-30', NULL, NULL, 8.4, 'Calle Sauce 1', 'Málaga', 'Málaga', '29002'),
(15, 'Diego', 'Ramírez Salas', 'diego@clean.com', 'diegopass', '701234566', '1983-09-18', NULL, NULL, 6.5, 'Av. del Mar 12', 'A Coruña', 'A Coruña', '15002'),
(16, 'João', 'de Araújo', 'joaogamesbrbrazilhotmail@gmail.com', '$2y$10$Tvx4ERlgtRCQUy7dWUmdk.2MVimGq4wytr9hs0QQpBE9Xm4criuFO', '62992118582', '2003-03-26', '', NULL, 0, 'Rua C14, 19', 'Madrid', 'Becerril de la Sierra', '28200'),
(17, 'João', 'de Araújo', 'joaogamesbrbrazilhotmail@gmail.com', 'msnmsnmsN9', '62992118582', '2003-03-26', '', NULL, 0, 'Rua C14, 19', 'Madrid', 'Becerril de la Sierra', '28200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensajes` int(11) NOT NULL,
  `idChat` int(11) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `envia` varchar(20) DEFAULT NULL,
  `fechaHora` varchar(25) DEFAULT NULL,
  `visto` enum('si','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idmensajes`, `idChat`, `contenido`, `envia`, `fechaHora`, `visto`) VALUES
(1, 1, 'Hola, necesito ayuda con el servicio de limpieza.', '0', '2025-06-01 19:05:16', 'no'),
(2, 1, 'Hola, claro, ¿en qué podemos ayudarte?', '0', '2025-06-01 19:05:16', 'si'),
(3, 1, 'Quiero cambiar la fecha de la limpieza.', '0', '2025-06-01 19:05:16', 'no'),
(4, 2, 'Buenos días, ¿ya confirmaron mi solicitud?', '0', '2025-06-01 19:05:16', 'no'),
(5, 2, 'Sí, está confirmada para mañana a las 9am.', '0', '2025-06-01 19:05:16', 'si'),
(6, 3, 'Hola, tuve un problema con el servicio anterior.', '0', '2025-06-01 19:05:16', 'no'),
(7, 3, '¿Podrías especificar qué ocurrió?', '0', '2025-06-01 19:05:16', 'si');

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
  `ciudad` varchar(100) DEFAULT NULL,
  `valorado` enum('si','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicio`, `idcliente`, `idFuncionario`, `fechaServicio`, `estado`, `titulo`, `descripcion`, `tipoServicio`, `valor`, `diaServicio`, `direccion`, `provincia`, `ciudad`, `valorado`) VALUES
(1, 5, 2, '2025-05-06', 'activo', 'Limpieza profunda de cocina', 'Limpieza detallada de electrodomésticos, encimeras y pisos', 'Limpieza', 80.00, 'Lunes', 'Calle Falsa 123', 'Madrid', 'Madrid', 'no'),
(2, 2, 1, '2025-05-05', 'terminado', 'Plancha y lavandería', 'Servicio completo de lavado, secado y planchado de ropa', 'Lavandería', 50.00, 'Martes', 'Avenida Siempre Viva 742', 'Barcelona', 'Barcelona', 'no'),
(3, 3, 3, '2025-05-07', 'confirmacion', 'Limpieza de ventanas', 'Limpieza de ventanas exteriores e interiores en un apartamento', 'Limpieza', 60.00, 'Miércoles', 'Calle Mayor 45', 'Valencia', 'Valencia', 'no'),
(4, 2, 1, '2025-06-01', 'activo', 'Limpieza general', 'Limpieza completa del hogar', 'Limpieza semanal', 80.00, 'Lunes', 'Calle A', 'Madrid', 'Madrid', 'no'),
(89, 3, 3, '2025-06-03', 'activo', 'Baños', 'Limpieza profunda de baños', 'Limpieza puntual', 45.00, 'Miércoles', 'Calle C', 'Sevilla', 'Sevilla', 'no'),
(92, 4, 3, '2025-06-04', 'terminado', 'Limpieza express', 'Limpieza ligera por visita', 'Express', 30.00, 'Jueves', 'Calle D', 'Sevilla', 'Sevilla', 'si'),
(95, 3, 6, '2025-06-05', 'activo', 'Cristales', 'Limpieza de ventanas', 'Cristales', 60.00, 'Viernes', 'Calle E', 'Valencia', 'Valencia', 'no'),
(97, 7, 6, '2025-06-06', 'confirmacion', 'Sofás', 'Limpieza de tapicerías', 'Tapicería', 70.00, 'Sábado', 'Calle F', 'Valencia', 'Valencia', 'no'),
(98, 7, 7, '2025-06-07', 'activo', 'Armarios', 'Organización y limpieza de armarios', 'Organización', 40.00, 'Domingo', 'Calle G', 'Barcelona', 'Barcelona', 'no'),
(99, 8, 8, '2025-06-08', 'activo', 'Despacho', 'Limpieza de oficina en casa', 'Limpieza puntual', 55.00, 'Lunes', 'Calle H', 'Barcelona', 'Barcelona', 'no'),
(100, 9, 9, '2025-06-09', 'terminado', 'Garaje', 'Limpieza y orden en garaje', 'Espacios grandes', 90.00, 'Martes', 'Calle I', 'Bilbao', 'Bilbao', 'si'),
(101, 10, 10, '2025-06-10', 'confirmacion', 'Terraza', 'Limpieza y mantenimiento de terrazas', 'Exterior', 65.00, 'Miércoles', 'Calle J', 'Bilbao', 'Bilbao', 'no');

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

--
-- Volcado de datos para la tabla `valoraciones_clientes`
--

INSERT INTO `valoraciones_clientes` (`idvaloraciones`, `idCliente`, `estrellas`, `comentario`, `idFuncionario`) VALUES
(1, 2, '9', 'Muy profesional y puntual.', 1),
(2, 3, '7', 'Buen trabajo, pero llegó con un poco de retra', 2),
(3, 4, '10', 'Excelente servicio. Muy recomendado.', 1),
(4, 5, '6', 'Podría mejorar en los detalles de limpieza.', 3),
(5, 2, '8', 'Amable y eficiente.', 2),
(6, 3, '5', 'El trabajo fue aceptable, pero no cumplió tod', 3),
(7, 4, '10', 'Fantástico. Dejó todo impecable.', 2),
(8, 5, '7', 'Servicio correcto, aunque esperaba un poco má', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_servicios`
--

CREATE TABLE `valoraciones_servicios` (
  `idvaloraciones_servicios` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `estrellas` int(11) DEFAULT NULL,
  `comentario` varchar(45) NOT NULL,
  `idFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `valoraciones_servicios`
--

INSERT INTO `valoraciones_servicios` (`idvaloraciones_servicios`, `idServicio`, `estrellas`, `comentario`, `idFuncionario`) VALUES
(1, 1, 9, 'Cliente educado y colaborador, todo salió bie', 1),
(2, 2, 6, 'El cliente fue algo exigente, pero respetuoso', 2),
(3, 3, 10, 'Cliente excelente, tenía todo preparado antes', 3),
(4, 1, 5, 'Hubo dificultad en la comunicación, el servic', 2),
(5, 2, 7, 'Todo bien en general, aunque había bastante d', 1),
(6, 3, 4, 'Cliente tóxico, hizo comentarios irrespetuoso', 3),
(7, 1, 8, 'Buen cliente, pagó a tiempo y permitió trabaj', 1),
(8, 2, 10, 'Servicio perfecto, cliente muy respetuoso.', 2);

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
  ADD PRIMARY KEY (`idFuncionarios`);

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
  MODIFY `idadministradores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `idchats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFuncionarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos_servicios`
--
ALTER TABLE `pedidos_servicios`
  MODIFY `idpedidoServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `valoraciones_clientes`
--
ALTER TABLE `valoraciones_clientes`
  MODIFY `idvaloraciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `valoraciones_servicios`
--
ALTER TABLE `valoraciones_servicios`
  MODIFY `idvaloraciones_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
