-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2025 a las 12:52:14
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
(11, 18, 19),
(12, 18, 20),
(13, 18, 21),
(14, 18, 22),
(15, 18, 23),
(16, 24, 18),
(17, 25, 18),
(18, 26, 18),
(19, 27, 18),
(20, 28, 18);

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
(18, 'João', 'Silva', 'joaocliente@hotmail.com', 'msnmsnmsN9', '616365329', '2003-03-26', NULL, NULL, 'Calle Mariano Sainz, calle 4', 'Madrid', 'San Lorenzo de El Escorial', '28200'),
(19, 'Juan', 'Pérez', 'juan.perez@example.com', 'pass1234', '600111222', '1985-06-15', NULL, 8.5, 'Calle Falsa 123', 'Madrid', 'Madrid', '28001'),
(20, 'María', 'Gómez', 'maria.gomez@example.com', 'secret5678', '600333444', '1990-03-20', NULL, 9, 'Av. Siempre Viva 742', 'Barcelona', 'Barcelona', '08001'),
(21, 'Carlos', 'Sánchez', 'carlos.sanchez@example.com', 'carlosPass', '600555666', '1988-11-02', NULL, 7.2, 'C/ Real 45', 'Valencia', 'Valencia', '46001'),
(22, 'Laura', 'Martín', 'laura.martin@example.com', 'laura2020', '600777888', '1992-08-10', NULL, 8, 'C/ Luna 12', 'Sevilla', 'Sevilla', '41001'),
(23, 'Ana', 'López', 'ana.lopez@example.com', 'anaPass', '600999000', '1980-01-05', NULL, 6.5, 'Calle Sol 5', 'Zaragoza', 'Zaragoza', '50001'),
(24, 'Pedro', 'Rodríguez', 'pedro.rodriguez@example.com', 'pedroSecure', '600222333', '1983-04-18', NULL, 7.8, 'Av. Libertad 300', 'Málaga', 'Málaga', '29001'),
(25, 'Sofía', 'Díaz', 'sofia.diaz@example.com', 'sofia2023', '600444555', '1995-12-25', NULL, 9.2, 'Plaza Mayor 15', 'Bilbao', 'Bilbao', '48001'),
(26, 'Andrés', 'Ramírez', 'andres.ramirez@example.com', 'andresR!', '600666777', '1987-07-30', NULL, 8.3, 'Calle Verde 10', 'Murcia', 'Murcia', '30001'),
(27, 'Lucía', 'Castillo', 'lucia.castillo@example.com', 'luciaCast', '600888999', '1991-09-14', NULL, 7, 'Calle Mar 8', 'Alicante', 'Alicante', '03001'),
(28, 'Miguel', 'Torres', 'miguel.torres@example.com', 'miguel123', '600101010', '1982-05-28', NULL, 8.7, 'Av. del Sol 99', 'Granada', 'Granada', '18001');

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
(18, 'João', 'Silva', 'joaofuncionario@hotmail.com', 'msnmsnmsN9', '616365329', '2003-03-26', '', NULL, 0, 'Calle Mariano Sainz, calle 4', 'Madrid', 'San Lorenzo de El Escorial', '28200'),
(19, 'Diego', 'Martinez', 'diego.martinez@example.com', 'func1234', '610111222', '1980-03-10', 'Especialista en limpieza profesional y mantenimiento de entornos.', NULL, 8.5, 'Calle Real 12', 'Madrid', 'Madrid', '18200'),
(20, 'Laura', 'Hernandez', 'laura.hernandez@example.com', 'secret5678', '610333444', '1985-06-15', 'Experta en organización y limpieza profunda.', NULL, 9, 'Av. del Sol 45', 'Barcelona', 'Barcelona', '4500'),
(21, 'Antonio', 'García', 'antonio.garcia@example.com', 'antonioPass', '610555666', '1978-09-22', 'Profesional en mantenimiento y servicios generales.', NULL, 7.8, 'Calle Mayor 24', 'Valencia', 'Valencia', '1080'),
(22, 'Sofía', 'Ruiz', 'sofia.ruiz@example.com', 'sofia2020', '610777888', '1990-11-05', 'Especializada en limpieza de cristales y fachadas.', NULL, 8.2, 'Paseo de la Castellana 100', 'Sevilla', 'Sevilla', '5060'),
(23, 'Francisco', 'López', 'francisco.lopez@example.com', 'franSecure', '610999000', '1982-01-30', 'Con amplia experiencia en mantenimiento de instalaciones.', NULL, 7, 'Av. Libertad 55', 'Zaragoza', 'Zaragoza', '4090'),
(24, 'Marta', 'Morales', 'marta.morales@example.com', 'martaPass', '610222333', '1987-04-12', 'Enfocada en servicios de limpieza y organización de espacios.', NULL, 8.8, 'Calle Independencia 33', 'Málaga', 'Málaga', '5800'),
(25, 'Javier', 'Sánchez', 'javier.sanchez@example.com', 'javi2021', '610444555', '1975-08-18', 'Experto en limpieza industrial y residencial.', NULL, 9.2, 'Plaza España 12', 'Bilbao', 'Bilbao', '7100'),
(26, 'Elena', 'Díaz', 'elena.diaz@example.com', 'elenaD!', '610666777', '1992-07-07', 'Profesional en gestión de residuos y desinfección.', NULL, 7.5, 'Calle Nueva 8', 'Murcia', 'Murcia', '8100'),
(27, 'Manuel', 'Torres', 'manuel.torres@example.com', 'manuel123', '610888999', '1983-05-25', 'Servicios integrales de limpieza y mantenimiento.', NULL, 8, 'Av. de la Paz 77', 'Alicante', 'Alicante', '6200'),
(28, 'Patricia', 'Fernández', 'patricia.fernandez@example.com', 'patriciaSafe', '610101010', '1980-12-02', 'Alta especialización en limpieza profunda y organización.', NULL, 9.5, 'Calle Sol 9', 'Granada', 'Granada', '1100');

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
(1, 11, 'Hola, buenos días.', 'cliente', '2025-06-01 10:00:00', 'si'),
(2, 11, 'Buenos días, ¿en qué puedo ayudarte?', 'funcionario', '2025-06-01 10:01:30', 'si'),
(3, 11, 'Me interesa contratar su servicio.', 'cliente', '2025-06-01 10:03:00', 'si'),
(4, 11, 'Perfecto, ¿tienes alguna duda?', 'funcionario', '2025-06-01 10:04:00', 'si'),
(5, 11, 'Sí, ¿cuándo podrían empezar?', 'cliente', '2025-06-01 10:05:30', 'si'),
(6, 11, 'Podríamos iniciar este lunes.', 'funcionario', '2025-06-01 10:07:00', 'si'),
(7, 11, 'De acuerdo, eso me parece bien.', 'cliente', '2025-06-01 10:08:00', 'si'),
(8, 11, '¿Necesitas más detalles?', 'funcionario', '2025-06-01 10:09:30', 'si'),
(9, 11, 'No, está claro, gracias.', 'cliente', '2025-06-01 10:11:00', 'si'),
(10, 11, 'Perfecto, quedamos entonces.', 'funcionario', '2025-06-01 10:12:00', 'si'),
(11, 11, 'Espero su confirmación.', 'cliente', '2025-06-01 10:13:30', 'si'),
(12, 11, 'Confirmado, nos vemos el lunes.', 'funcionario', '2025-06-01 10:15:00', 'si'),
(13, 11, '¿Cuál es el horario?', 'cliente', '2025-06-01 10:16:00', 'si'),
(14, 11, 'De 9 a 5.', 'funcionario', '2025-06-01 10:17:30', 'si'),
(15, 11, '¡Perfecto!', 'cliente', '2025-06-01 10:19:00', 'si'),
(16, 11, 'Recibirás un recordatorio el viernes.', 'funcionario', '2025-06-01 10:20:00', 'si'),
(17, 11, 'Ok, gracias.', 'cliente', '2025-06-01 10:21:30', 'si'),
(18, 11, 'Estoy a tu disposición.', 'funcionario', '2025-06-01 10:23:00', 'si'),
(19, 11, 'Hasta el lunes.', 'cliente', '2025-06-01 10:24:00', 'si'),
(20, 11, 'Hasta luego.', 'funcionario', '2025-06-01 10:25:30', 'si'),
(21, 11, 'Oye tio', 'cliente', '2025-06-14 23:07:51', 'si'),
(22, 12, 'Hola, soy Joao. Necesito información sobre el servicio.', 'cliente', '2025-06-01 11:00:00', 'si'),
(23, 12, 'Hola Joao, soy Laura. Claro, dime en qué puedo ayudarte.', 'funcionaria', '2025-06-01 11:01:30', 'si'),
(24, 12, 'Estoy buscando un servicio de limpieza profunda para mi hogar.', 'cliente', '2025-06-01 11:03:00', 'si'),
(25, 12, 'Entiendo. Nuestra limpieza profunda incluye ventanas, alfombras y áreas difíciles de alcanzar.', 'funcionaria', '2025-06-01 11:04:30', 'si'),
(26, 12, 'Suena bien. ¿Cuál es el precio aproximado de ese servicio?', 'cliente', '2025-06-01 11:06:00', 'si'),
(27, 12, 'El precio parte desde 100€ y depende del tamaño de la vivienda.', 'funcionaria', '2025-06-01 11:07:30', 'si'),
(28, 12, 'Perfecto, ¿tienen disponibilidad para este viernes?', 'cliente', '2025-06-01 11:09:00', 'si'),
(29, 12, 'Sí, podemos agendar tu servicio para el viernes por la mañana.', 'funcionaria', '2025-06-01 11:10:30', 'si'),
(30, 12, 'Excelente, confirmo para ese día. ¿Qué documentos o pagos debo realizar?', 'cliente', '2025-06-01 11:12:00', 'si'),
(31, 12, 'Te enviaré los detalles del contrato y los datos para el pago por email.', 'funcionaria', '2025-06-01 11:13:30', 'si'),
(32, 12, 'Perfecto, revisaré mi correo. Muchas gracias, Laura.', 'cliente', '2025-06-01 11:15:00', 'si'),
(33, 12, 'De nada, Joao. Estoy a tu disposición para cualquier pregunta adicional.', 'funcionaria', '2025-06-01 11:16:30', 'si'),
(34, 12, 'Genial, quedamos entonces para el viernes. Saludos.', 'cliente', '2025-06-01 11:18:00', 'si'),
(35, 12, 'Saludos, nos vemos el viernes. Que tengas buen día.', 'funcionaria', '2025-06-01 11:19:30', 'si'),
(36, 12, 'Gracias, adiós.', 'cliente', '2025-06-01 11:21:00', 'si'),
(37, 13, 'Hola, soy Joao. Estoy interesado en contratar el servicio.', 'cliente', '2025-06-01 09:00:00', 'si'),
(38, 13, 'Buenos días, Joao. Soy Antonio García. ¿En qué puedo ayudarte?', 'funcionario', '2025-06-01 09:02:30', 'si'),
(39, 13, 'Necesito que revisen la limpieza de mi casa, especialmente en áreas difíciles de alcanzar.', 'cliente', '2025-06-01 09:05:00', 'si'),
(40, 13, 'Perfecto, contamos con un equipo especializado en limpieza profunda de esos espacios.', 'funcionario', '2025-06-01 09:07:30', 'si'),
(41, 13, 'Me gustaría saber cuál es el precio aproximado y la disponibilidad para este servicio.', 'cliente', '2025-06-01 09:10:00', 'si'),
(42, 13, 'El precio depende del tamaño de la casa, pero partimos desde 120€. Tenemos disponibilidad para este viernes.', 'funcionario', '2025-06-01 09:12:30', 'si'),
(43, 13, 'Genial, me interesa agendar para ese día. ¿Debo realizar algún pago adelantado?', 'cliente', '2025-06-01 09:15:00', 'si'),
(44, 13, 'No se requiere pago adelantado, solo confirmamos tu solicitud y te enviamos los detalles por email.', 'funcionario', '2025-06-01 09:17:30', 'si'),
(45, 13, 'Entendido, espero el correo para formalizar la contratación.', 'cliente', '2025-06-01 09:20:00', 'si'),
(46, 13, 'Muy bien, Joao. Revisaré tu solicitud y te contacto en breve.', 'funcionario', '2025-06-01 09:22:30', 'si'),
(47, 13, 'Muchas gracias. Quedo atento a tu respuesta.', 'cliente', '2025-06-01 09:25:00', 'si'),
(48, 13, 'De nada, es un placer ayudarte. Aprovecho para recordarte que cualquier duda, aquí estoy.', 'funcionario', '2025-06-01 09:27:30', 'si'),
(49, 13, 'Perfecto, Antonio. Quedo atento y espero el correo con los detalles.', 'cliente', '2025-06-01 09:30:00', 'si'),
(50, 13, 'Así será, Joao. Te contactaré tan pronto como revise toda la información.', 'funcionario', '2025-06-01 09:32:30', 'si'),
(51, 13, 'Muchas gracias, quedo a la espera. Saludos.', 'cliente', '2025-06-01 09:35:00', 'si'),
(52, 14, 'Hola, soy Joao. Estoy interesado en contratar tu servicio de limpieza.', 'cliente', '2025-06-01 10:00:00', 'si'),
(53, 14, 'Hola Joao, soy Sofía. Claro, cuéntame en qué puedo ayudarte hoy.', 'funcionario', '2025-06-01 10:02:30', 'si'),
(54, 14, 'Necesito que se realice una limpieza profunda en mi apartamento, sobre todo en la cocina y baños.', 'cliente', '2025-06-01 10:05:00', 'si'),
(55, 14, 'Perfecto, tenemos experiencia en ese tipo de servicios. ¿Para cuándo lo necesitas?', 'funcionario', '2025-06-01 10:07:00', 'si'),
(56, 14, 'Me gustaría programarlo para este sábado por la mañana, si es posible.', 'cliente', '2025-06-01 10:09:00', 'si'),
(57, 14, 'Claro, sábado por la mañana tenemos disponibilidad. Prepararé un equipo para tu servicio.', 'funcionario', '2025-06-01 10:11:00', 'si'),
(58, 14, '¡Excelente! ¿Podrías enviarme un presupuesto aproximado del servicio?', 'cliente', '2025-06-01 10:13:00', 'si'),
(59, 14, 'Por supuesto. El presupuesto es de aproximadamente 120€ y se ajusta según los detalles finales.', 'funcionario', '2025-06-01 10:15:00', 'si'),
(60, 14, 'Perfecto, espero tu confirmación por correo. Muchas gracias, Sofía.', 'cliente', '2025-06-01 10:17:00', 'si'),
(61, 14, 'Gracias a ti, Joao. Te enviaré la confirmación y todos los detalles muy pronto. Saludos.', 'funcionario', '2025-06-01 10:19:00', 'si'),
(62, 15, 'Hola, soy Joao. Estoy interesado en su servicio de jardinería.', 'cliente', '2025-06-01 11:30:00', 'si'),
(63, 15, 'Hola Joao, soy Francisco. ¿En qué puedo ayudarte hoy?', 'funcionario', '2025-06-01 11:32:30', 'si'),
(64, 15, 'Quisiera conocer más acerca del servicio de jardinería, especialmente para mi jardín grande.', 'cliente', '2025-06-01 11:35:00', 'si'),
(65, 15, 'Claro, ofrecemos mantenimiento puntual y semanal, incluyendo poda, riego y fertilización.', 'funcionario', '2025-06-01 11:37:30', 'si'),
(66, 15, 'Genial, me interesa la opción semanal. ¿Podrían pasar por mi casa el sábado?', 'cliente', '2025-06-01 11:40:00', 'si'),
(67, 15, 'Sí, podemos programar la visita para las 10:00 del sábado.', 'funcionario', '2025-06-01 11:42:30', 'si'),
(68, 15, 'Perfecto, espero la confirmación con el presupuesto.', 'cliente', '2025-06-01 11:45:00', 'si'),
(69, 15, 'Pronto recibirás un correo con todos los detalles y el presupuesto. ¿Algo más que quieras aclarar?', 'funcionario', '2025-06-01 11:47:00', 'si'),
(70, 15, 'No, eso es todo. Muchas gracias, Francisco.', 'cliente', '2025-06-01 11:49:00', 'si'),
(71, 15, 'Gracias a ti, Joao. Quedo atento a tu correo. Saludos.', 'funcionario', '2025-06-01 11:50:00', 'si'),
(72, 16, 'Hola, soy Pedro. Tengo una consulta sobre el servicio que ofrecen.', 'cliente', '2025-06-01 14:00:00', 'si'),
(73, 16, 'Hola Pedro, soy joaoa. Cuéntame, ¿en qué puedo ayudarte?', 'funcionario', '2025-06-01 14:02:30', 'si'),
(74, 16, 'Quisiera saber si tienen disponibilidad para programar la visita esta semana.', 'cliente', '2025-06-01 14:05:00', 'si'),
(75, 16, 'Claro, podemos agendar la visita para el jueves en la mañana.', 'funcionario', '2025-06-01 14:07:30', 'si'),
(76, 16, 'Perfecto, eso se ajusta a mis horarios. ¿Me podrías enviar también el presupuesto?', 'cliente', '2025-06-01 14:10:00', 'si'),
(77, 16, 'Por supuesto, te enviaré el presupuesto en el transcurso de unos minutos.', 'funcionario', '2025-06-01 14:12:30', 'si'),
(78, 16, 'Genial, quedo a la espera de tu correo. Muchas gracias.', 'cliente', '2025-06-01 14:15:00', 'si'),
(79, 16, 'De nada, Pedro. Confirmaré todo tan pronto como recibas el correo.', 'funcionario', '2025-06-01 14:17:00', 'si'),
(80, 16, 'Perfecto, quedo atento. ¡Saludos!', 'cliente', '2025-06-01 14:18:30', 'si'),
(81, 16, 'Saludos, Pedro. Estamos en contacto.', 'funcionario', '2025-06-01 14:20:00', 'si'),
(82, 17, 'Hola João, desde que te vi, no he dejado de pensar en ti.', 'cliente', '2025-06-01 12:00:00', 'si'),
(83, 17, 'Buenos días Sofía, ¿en qué puedo ayudarte hoy?', 'funcionario', '2025-06-01 12:02:30', 'si'),
(84, 17, 'No es solo trabajo… mi corazón late por ti cada vez que te veo.', 'cliente', '2025-06-01 12:05:00', 'si'),
(85, 17, 'Aprecio tus palabras, Sofía, pero debo mantener mi compromiso profesional.', 'funcionario', '2025-06-01 12:07:30', 'si'),
(86, 17, 'Te aseguro que lo que siento es real; cada mirada tuya me enamora.', 'cliente', '2025-06-01 12:10:00', 'si'),
(87, 17, 'Lo siento, Sofía. Mi situación personal es complicada: estoy casado y tengo compromisos.', 'funcionario', '2025-06-01 12:12:30', 'si'),
(88, 17, 'Pero no puedes negar la conexión que sentimos. Siento que hay algo especial entre nosotros.', 'cliente', '2025-06-01 12:15:00', 'si'),
(89, 17, 'Entiendo tus sentimientos, pero debo mantenerme fiel a mi ética y a mi familia.', 'funcionario', '2025-06-01 12:17:30', 'si'),
(90, 17, 'Sueño con un futuro donde, en secreto, pudiéramos estar juntos sin barreras.', 'cliente', '2025-06-01 12:20:00', 'si'),
(91, 17, 'Es un lindo sueño, pero mi realidad es muy diferente y no puedo corresponder a ese amor.', 'funcionario', '2025-06-01 12:22:30', 'si'),
(92, 17, 'Cada día, mi amor por ti se intensifica; en mis pensamientos, tú eres el único.', 'cliente', '2025-06-01 12:25:00', 'si'),
(93, 17, 'Agradezco tu sinceridad, Sofía, pero mi compromiso me obliga a la prudencia.', 'funcionario', '2025-06-01 12:27:30', 'si'),
(94, 17, 'No puedo evitar imaginar un mundo en el que el amor prevalezca y estemos juntos.', 'cliente', '2025-06-01 12:30:00', 'si'),
(95, 17, 'Te entiendo, pero mi vida personal ya está decidida. Debo ser honesto con mi familia.', 'funcionario', '2025-06-01 12:32:30', 'si'),
(96, 17, 'Mi corazón clama por ti, João. Sé que es imposible, pero te amo sin remedio.', 'cliente', '2025-06-01 12:35:00', 'si'),
(97, 17, 'Agradezco mucho tu cariño, Sofía, pero debo mantener mi camino.', 'funcionario', '2025-06-01 12:37:30', 'si'),
(98, 17, 'Aunque me cause dolor, seguiré amándote, porque mi amor es real e ilimitado.', 'cliente', '2025-06-01 12:40:00', 'si'),
(99, 17, 'Te deseo lo mejor, Sofía, y espero que encuentres un amor que te corresponda plenamente.', 'funcionario', '2025-06-01 12:42:30', 'si'),
(100, 17, 'Mi vida cambiaría si tan solo pudieras estar a mi lado, João. Te amo con todo mi ser.', 'cliente', '2025-06-01 12:45:00', 'si'),
(101, 17, 'Sofía, lamento profundamente si mi respuesta te hiere, pero debo ser fiel a mi realidad. Espero que algún día encuentres un amor recíproco.', 'funcionario', '2025-06-01 12:47:30', 'si'),
(102, 18, 'Hola, he tenido problemas con el servicio recibido ayer.', 'cliente', '2025-06-01 13:00:00', 'si'),
(103, 18, 'Hola Andrés, lamento escuchar eso. ¿Podrías darme más detalles sobre lo ocurrido?', 'funcionario', '2025-06-01 13:02:30', 'si'),
(104, 18, 'Claro, la casa no fue limpiada a fondo; encontré polvo acumulado en varios rincones y manchas en algunos muebles.', 'cliente', '2025-06-01 13:05:00', 'si'),
(105, 18, 'Entiendo, lamento mucho la situación. ¿En qué áreas específicas se presentaron estos problemas?', 'funcionario', '2025-06-01 13:07:00', 'si'),
(106, 18, 'Principalmente en el salón y la cocina. Los pisos quedaron mal fregados y la cocina sin orden.', 'cliente', '2025-06-01 13:09:30', 'si'),
(107, 18, 'Agradezco tu feedback, Andrés. Revisaré esta situación con el equipo responsable para evitar que se repita.', 'funcionario', '2025-06-01 13:12:00', 'si'),
(108, 18, 'Espero ver una mejora, confié en su servicio y no quiero tener problemas en el futuro.', 'cliente', '2025-06-01 13:14:30', 'si'),
(109, 18, 'Te aseguro que tomaremos medidas correctivas y me comprometo a contactarte pronto para resolverlo.', 'funcionario', '2025-06-01 13:17:00', 'si'),
(110, 18, 'Agradezco la atención, pero necesito estar seguro de que este fallo no se repetirá.', 'cliente', '2025-06-01 13:19:00', 'si'),
(111, 18, 'Comprendo tu preocupación, Andrés. Como compensación, te ofrecemos un descuento en tu próximo servicio. Gracias por tu comprensión.', 'funcionario', '2025-06-01 13:21:30', 'si'),
(112, 19, 'Hola, buenos días. Soy Lucia.', 'cliente', '2025-06-01 08:00:00', 'si'),
(113, 19, 'Buenos días, Lucia. Soy Joao. ¿En qué puedo ayudarte hoy?', 'funcionario', '2025-06-01 08:02:00', 'si'),
(114, 19, 'Quisiera consultar sobre el servicio de limpieza que ofrecen.', 'cliente', '2025-06-01 08:04:00', 'si'),
(115, 19, 'Claro, con gusto. ¿Qué tipo de servicio necesitas, limpieza profunda o mantenimiento?', 'funcionario', '2025-06-01 08:06:00', 'si'),
(116, 19, 'Me interesa una limpieza profunda de mi apartamento.', 'cliente', '2025-06-01 08:08:00', 'si'),
(117, 19, 'Perfecto. ¿Podrías indicarme el tamaño del apartamento y las áreas que requieren atención?', 'funcionario', '2025-06-01 08:10:00', 'si'),
(118, 19, 'Se trata de un apartamento de 90 metros cuadrados, con sala, 2 habitaciones y cocina.', 'cliente', '2025-06-01 08:12:00', 'si'),
(119, 19, 'Entendido. ¿Alguna área en particular, como la cocina o los baños, requiere mayor detalle?', 'funcionario', '2025-06-01 08:14:00', 'si'),
(120, 19, 'Sí, la cocina y el baño necesitan una limpieza extra, con desinfección de superficies.', 'cliente', '2025-06-01 08:16:00', 'si'),
(121, 19, 'Muy bien. ¿Tienes alguna fecha preferida para realizar el servicio?', 'funcionario', '2025-06-01 08:18:00', 'si'),
(122, 19, 'Preferiría este sábado por la mañana, si es posible.', 'cliente', '2025-06-01 08:20:00', 'si'),
(123, 19, 'Lo revisaré en nuestra agenda; ¿te parece bien a las 10:00 AM?', 'funcionario', '2025-06-01 08:22:00', 'si'),
(124, 19, 'Sí, me parece perfecto.', 'cliente', '2025-06-01 08:24:00', 'si'),
(125, 19, 'Excelente. El precio para una limpieza profunda de ese tamaño es alrededor de 120€.', 'funcionario', '2025-06-01 08:26:00', 'si'),
(126, 19, '¿El precio incluye productos de limpieza o debo aportar los míos?', 'cliente', '2025-06-01 08:28:00', 'si'),
(127, 19, 'Incluye todos los productos necesarios. Utilizamos técnicas profesionales.', 'funcionario', '2025-06-01 08:30:00', 'si'),
(128, 19, 'Genial, eso me tranquiliza.', 'cliente', '2025-06-01 08:32:00', 'si'),
(129, 19, '¿Tu apartamento está ubicado en la misma zona que nuestro servicio habitual?', 'funcionario', '2025-06-01 08:34:00', 'si'),
(130, 19, 'Sí, en el centro, cerca de la plaza mayor.', 'cliente', '2025-06-01 08:36:00', 'si'),
(131, 19, 'Perfecto, no habrá problema con la logística.', 'funcionario', '2025-06-01 08:38:00', 'si'),
(132, 19, 'Quisiera preguntar también si el servicio incluye limpieza de ventanas.', 'cliente', '2025-06-01 08:40:00', 'si'),
(133, 19, 'Sí, incluye limpieza de ventanas y alfombras, según lo solicitado.', 'funcionario', '2025-06-01 08:42:00', 'si'),
(134, 19, 'Excelente, eso es justo lo que necesito.', 'cliente', '2025-06-01 08:44:00', 'si'),
(135, 19, 'Además, ofrecemos una garantía de satisfacción. Si no quedas conforme, podemos repetir el servicio sin costo extra.', 'funcionario', '2025-06-01 08:46:00', 'si'),
(136, 19, 'Eso suena muy bien, agradezco el compromiso.', 'cliente', '2025-06-01 08:48:00', 'si'),
(137, 19, '¿Podrías confirmarme la dirección para el servicio?', 'funcionario', '2025-06-01 08:50:00', 'si'),
(138, 19, 'Claro, es Calle Real, 34, en el centro de la ciudad.', 'cliente', '2025-06-01 08:52:00', 'si'),
(139, 19, 'Perfecto, ya tengo toda la información necesaria.', 'funcionario', '2025-06-01 08:54:00', 'si'),
(140, 19, '¿Podrías enviarme por correo los detalles y condiciones del servicio?', 'cliente', '2025-06-01 08:56:00', 'si'),
(141, 19, 'Por supuesto, te enviaré toda la información en breve.', 'funcionario', '2025-06-01 08:58:00', 'si'),
(142, 19, 'Muchas gracias, Joao. Espero recibirla pronto.', 'cliente', '2025-06-01 09:00:00', 'si'),
(143, 19, 'De nada, Lucia. Confirmaré la cita una vez que revisemos la disponibilidad.', 'funcionario', '2025-06-01 09:02:00', 'si'),
(144, 19, 'Agradezco mucho tu atención y rapidez.', 'cliente', '2025-06-01 09:04:00', 'si'),
(145, 19, 'Es un placer atender a nuestros clientes con la mayor seriedad posible.', 'funcionario', '2025-06-01 09:06:00', 'si'),
(146, 19, 'Tengo algunas inquietudes sobre la duración del servicio. ¿Cuánto tiempo suele tardar una limpieza profunda en un apartamento como el mío?', 'cliente', '2025-06-01 09:08:00', 'si'),
(147, 19, 'Generalmente dura entre 3 y 4 horas, dependiendo de las condiciones.', 'funcionario', '2025-06-01 09:10:00', 'si'),
(148, 19, 'Entiendo, eso me parece razonable.', 'cliente', '2025-06-01 09:12:00', 'si'),
(149, 19, 'Además, nuestros técnicos están altamente capacitados y utilizan equipos modernos.', 'funcionario', '2025-06-01 09:14:00', 'si'),
(150, 19, 'Me gustaría saber si el servicio es interrumpible en caso de imprevistos.', 'cliente', '2025-06-01 09:16:00', 'si'),
(151, 19, 'Claro, puedes comunicarnos en cualquier momento para ajustar el servicio.', 'funcionario', '2025-06-01 09:18:00', 'si'),
(152, 19, 'Perfecto, eso me da tranquilidad.', 'cliente', '2025-06-01 09:20:00', 'si'),
(153, 19, 'Recuerda que después del servicio podrás calificar y recomendar nuestra atención.', 'funcionario', '2025-06-01 09:22:00', 'si'),
(154, 19, 'Definitivamente, dejaré una buena valoración si todo sale como se espera.', 'cliente', '2025-06-01 09:24:00', 'si'),
(155, 19, 'Agradezco mucho tu confianza, Lucia.', 'funcionario', '2025-06-01 09:26:00', 'si'),
(156, 19, 'Confío en que serán profesionales y resolverán todas mis necesidades.', 'cliente', '2025-06-01 09:28:00', 'si'),
(157, 19, 'Nos esforzamos siempre por superar las expectativas de nuestros clientes.', 'funcionario', '2025-06-01 09:30:00', 'si'),
(158, 19, 'Confirmo mi disponibilidad para el sábado y quedo a la espera del correo con más detalles.', 'cliente', '2025-06-01 09:32:00', 'si'),
(159, 19, 'Perfecto, enviaré la confirmación junto con el presupuesto final en breve.', 'funcionario', '2025-06-01 09:34:00', 'si'),
(160, 19, 'Muchas gracias por tu atención, Joao. Estoy muy satisfecha con la información.', 'cliente', '2025-06-01 09:36:00', 'si'),
(161, 19, 'Gracias a ti, Lucia. Quedo a tu disposición para cualquier consulta adicional. ¡Que tengas un excelente día!', 'funcionario', '2025-06-01 09:38:00', 'si'),
(162, 19, 'Hola, buenos días. Soy Lucia.', 'cliente', '2025-06-01 08:00:00', 'si'),
(163, 19, 'Buenos días, Lucia. Soy Joao. ¿En qué puedo ayudarte hoy?', 'funcionario', '2025-06-01 08:02:00', 'si'),
(164, 19, 'Quisiera consultar sobre el servicio de limpieza que ofrecen.', 'cliente', '2025-06-01 08:04:00', 'si'),
(165, 19, 'Claro, con gusto. ¿Qué tipo de servicio necesitas, limpieza profunda o mantenimiento?', 'funcionario', '2025-06-01 08:06:00', 'si'),
(166, 19, 'Me interesa una limpieza profunda de mi apartamento.', 'cliente', '2025-06-01 08:08:00', 'si'),
(167, 19, 'Perfecto. ¿Podrías indicarme el tamaño del apartamento y las áreas que requieren atención?', 'funcionario', '2025-06-01 08:10:00', 'si'),
(168, 19, 'Se trata de un apartamento de 90 metros cuadrados, con sala, 2 habitaciones y cocina.', 'cliente', '2025-06-01 08:12:00', 'si'),
(169, 19, 'Entendido. ¿Alguna área en particular, como la cocina o los baños, requiere mayor detalle?', 'funcionario', '2025-06-01 08:14:00', 'si'),
(170, 19, 'Sí, la cocina y el baño necesitan una limpieza extra, con desinfección de superficies.', 'cliente', '2025-06-01 08:16:00', 'si'),
(171, 19, 'Muy bien. ¿Tienes alguna fecha preferida para realizar el servicio?', 'funcionario', '2025-06-01 08:18:00', 'si'),
(172, 19, 'Preferiría este sábado por la mañana, si es posible.', 'cliente', '2025-06-01 08:20:00', 'si'),
(173, 19, 'Lo revisaré en nuestra agenda; ¿te parece bien a las 10:00 AM?', 'funcionario', '2025-06-01 08:22:00', 'si'),
(174, 19, 'Sí, me parece perfecto.', 'cliente', '2025-06-01 08:24:00', 'si'),
(175, 19, 'Excelente. El precio para una limpieza profunda de ese tamaño es alrededor de 120€.', 'funcionario', '2025-06-01 08:26:00', 'si'),
(176, 19, '¿El precio incluye productos de limpieza o debo aportar los míos?', 'cliente', '2025-06-01 08:28:00', 'si'),
(177, 19, 'Incluye todos los productos necesarios. Utilizamos técnicas profesionales.', 'funcionario', '2025-06-01 08:30:00', 'si'),
(178, 19, 'Genial, eso me tranquiliza.', 'cliente', '2025-06-01 08:32:00', 'si'),
(179, 19, '¿Tu apartamento está ubicado en la misma zona que nuestro servicio habitual?', 'funcionario', '2025-06-01 08:34:00', 'si'),
(180, 19, 'Sí, en el centro, cerca de la plaza mayor.', 'cliente', '2025-06-01 08:36:00', 'si'),
(181, 19, 'Perfecto, no habrá problema con la logística.', 'funcionario', '2025-06-01 08:38:00', 'si'),
(182, 19, 'Quisiera preguntar también si el servicio incluye limpieza de ventanas.', 'cliente', '2025-06-01 08:40:00', 'si'),
(183, 19, 'Sí, incluye limpieza de ventanas y alfombras, según lo solicitado.', 'funcionario', '2025-06-01 08:42:00', 'si'),
(184, 19, 'Excelente, eso es justo lo que necesito.', 'cliente', '2025-06-01 08:44:00', 'si'),
(185, 19, 'Además, ofrecemos una garantía de satisfacción. Si no quedas conforme, podemos repetir el servicio sin costo extra.', 'funcionario', '2025-06-01 08:46:00', 'si'),
(186, 19, 'Eso suena muy bien, agradezco el compromiso.', 'cliente', '2025-06-01 08:48:00', 'si'),
(187, 19, '¿Podrías confirmarme la dirección para el servicio?', 'funcionario', '2025-06-01 08:50:00', 'si'),
(188, 19, 'Claro, es Calle Real, 34, en el centro de la ciudad.', 'cliente', '2025-06-01 08:52:00', 'si'),
(189, 19, 'Perfecto, ya tengo toda la información necesaria.', 'funcionario', '2025-06-01 08:54:00', 'si'),
(190, 19, '¿Podrías enviarme por correo los detalles y condiciones del servicio?', 'cliente', '2025-06-01 08:56:00', 'si'),
(191, 19, 'Por supuesto, te enviaré toda la información en breve.', 'funcionario', '2025-06-01 08:58:00', 'si'),
(192, 19, 'Muchas gracias, Joao. Espero recibirla pronto.', 'cliente', '2025-06-01 09:00:00', 'si'),
(193, 19, 'De nada, Lucia. Confirmaré la cita una vez que revisemos la disponibilidad.', 'funcionario', '2025-06-01 09:02:00', 'si'),
(194, 19, 'Agradezco mucho tu atención y rapidez.', 'cliente', '2025-06-01 09:04:00', 'si'),
(195, 19, 'Es un placer atender a nuestros clientes con la mayor seriedad posible.', 'funcionario', '2025-06-01 09:06:00', 'si'),
(196, 19, 'Tengo algunas inquietudes sobre la duración del servicio. ¿Cuánto tiempo suele tardar una limpieza profunda en un apartamento como el mío?', 'cliente', '2025-06-01 09:08:00', 'si'),
(197, 19, 'Generalmente dura entre 3 y 4 horas, dependiendo de las condiciones.', 'funcionario', '2025-06-01 09:10:00', 'si'),
(198, 19, 'Entiendo, eso me parece razonable.', 'cliente', '2025-06-01 09:12:00', 'si'),
(199, 19, 'Además, nuestros técnicos están altamente capacitados y utilizan equipos modernos.', 'funcionario', '2025-06-01 09:14:00', 'si'),
(200, 19, 'Me gustaría saber si el servicio es interrumpible en caso de imprevistos.', 'cliente', '2025-06-01 09:16:00', 'si'),
(201, 19, 'Claro, puedes comunicarnos en cualquier momento para ajustar el servicio.', 'funcionario', '2025-06-01 09:18:00', 'si'),
(202, 19, 'Perfecto, eso me da tranquilidad.', 'cliente', '2025-06-01 09:20:00', 'si'),
(203, 19, 'Recuerda que después del servicio podrás calificar y recomendar nuestra atención.', 'funcionario', '2025-06-01 09:22:00', 'si'),
(204, 19, 'Definitivamente, dejaré una buena valoración si todo sale como se espera.', 'cliente', '2025-06-01 09:24:00', 'si'),
(205, 19, 'Agradezco mucho tu confianza, Lucia.', 'funcionario', '2025-06-01 09:26:00', 'si'),
(206, 19, 'Confío en que serán profesionales y resolverán todas mis necesidades.', 'cliente', '2025-06-01 09:28:00', 'si'),
(207, 19, 'Nos esforzamos siempre por superar las expectativas de nuestros clientes.', 'funcionario', '2025-06-01 09:30:00', 'si'),
(208, 19, 'Confirmo mi disponibilidad para el sábado y quedo a la espera del correo con más detalles.', 'cliente', '2025-06-01 09:32:00', 'si'),
(209, 19, 'Perfecto, enviaré la confirmación junto con el presupuesto final en breve.', 'funcionario', '2025-06-01 09:34:00', 'si'),
(210, 19, 'Muchas gracias por tu atención, Joao. Estoy muy satisfecha con la información.', 'cliente', '2025-06-01 09:36:00', 'si'),
(211, 19, 'Gracias a ti, Lucia. Quedo a tu disposición para cualquier consulta adicional. ¡Que tengas un excelente día!', 'funcionario', '2025-06-01 09:38:00', 'si'),
(212, 20, 'Hola, soy Miguel. Necesito saber más sobre su servicio de mantenimiento.', 'cliente', '2025-06-01 15:00:00', 'si'),
(213, 20, 'Hola Miguel, soy Joao. ¿Qué aspectos del servicio te interesan en particular?', 'funcionario', '2025-06-01 15:02:00', 'si'),
(214, 20, 'Me gustaría conocer el precio y si incluyen asesoramiento personalizado.', 'cliente', '2025-06-01 15:04:00', 'si'),
(215, 20, 'Claro, ofrecemos paquetes a partir de 80€ y nuestros expertos brindan asesoría sin costo adicional.', 'funcionario', '2025-06-01 15:06:00', 'si'),
(216, 20, 'Perfecto, entonces procedamos con la contratación. Gracias por la información.', 'cliente', '2025-06-01 15:08:00', 'si');

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
  `valorAlternativo` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pedidos_servicios`
--

INSERT INTO `pedidos_servicios` (`idpedidoServicio`, `idServicio`, `idFuncionario`, `activo`, `descripcion`, `valorAlternativo`) VALUES
(1, 107, 18, 'no', 'Ofrezco un servicio con alto nivel de detalle y profesionalismo.', 450.00),
(2, 107, 19, 'no', 'Mi experiencia y dedicación me diferencian de otros, garantizo plena satisfacción.', 520.00),
(3, 107, 20, 'no', 'Pongo a disposición mi compromiso y puntualidad para un servicio impecable.', 600.00),
(4, 107, 21, 'no', 'Destaco por mi atención personalizada y calidad superior en cada trabajo realizado.', 480.00),
(5, 107, 22, 'no', 'Mi innovación en técnicas y uso de tecnología me hacen único en el campo.', 530.00),
(6, 107, 23, 'no', 'La calidad y la constancia son la base de mi servicio, marcándolo como diferente.', 610.00),
(7, 107, 24, 'no', 'Con experiencia y pasión, mi trabajo resalta en puntualidad y precisión en cada detalle.', 700.00),
(8, 107, 25, 'no', 'Comprometido con la excelencia, ofrezco un servicio que supera las expectativas.', 650.00),
(9, 107, 26, 'no', 'Mi capacidad para personalizar el servicio me distingue de otros profesionales.', 720.00),
(10, 107, 27, 'no', 'Trabajo con pasión y esmero, lo que garantiza resultados excepcionales en cada proyecto.', 680.00),
(11, 107, 28, 'no', 'La integridad y la dedicación definen mi servicio, marcando la diferencia en el mercado.', 750.00),
(12, 107, 18, 'no', 'Resalto en eficiencia y calidad, brindando siempre una experiencia superior.', 500.00),
(13, 107, 19, 'no', 'Mi precisión y atención al detalle me hacen destacar en cada servicio que realizo.', 550.00),
(14, 107, 20, 'no', 'Aporto innovación y compromiso en cada proyecto, asegurando resultados óptimos.', 640.00),
(15, 107, 21, 'no', 'La experiencia acumulada a lo largo de los años me permite perfeccionar mi servicio.', 680.00),
(16, 107, 22, 'no', 'Mi servicio es reconocido por su confiabilidad y eficacia, único en la competencia.', 710.00),
(17, 107, 23, 'no', 'Ofrezco soluciones adaptadas para cada cliente, haciendo mi trabajo verdaderamente único.', 730.00),
(18, 107, 24, 'no', 'Trabajo con honestidad y profesionalismo, garantizando resultados de alta calidad.', 490.00),
(19, 107, 25, 'no', 'Mis métodos innovadores hacen que el servicio sea rápido, eficiente y sobresaliente.', 560.00),
(20, 107, 26, 'no', 'Destaco por mi compromiso y seriedad, factores que me diferencian claramente.', 600.00),
(21, 107, 27, 'no', 'Proporciono un servicio personalizado adaptado a las necesidades específicas de cada cliente.', 670.00),
(22, 107, 28, 'no', 'Mi dedicación y esmero logran resultados excelentes y duraderos, superando expectativas.', 720.00),
(23, 107, 18, 'no', 'Aporto creatividad y un enfoque innovador en cada servicio que realizo, marcando la diferencia.', 650.00),
(24, 107, 19, 'no', 'Focalizo en la calidad y el detalle, diferenciando mi trabajo del de otros profesionales.', 690.00),
(25, 107, 20, 'no', 'Cumplo con rigurosos estándares de calidad y profesionalismo en cada servicio.', 510.00),
(26, 107, 21, 'no', 'Mis clientes destacan mi capacidad para resolver problemas de manera rápida y efectiva.', 580.00),
(27, 107, 22, 'no', 'La excelencia en el servicio es mi principal prioridad, lo que me hace único.', 640.00),
(28, 107, 23, 'no', 'Ofrezco soluciones completas, asegurándome de superar las expectativas de cada cliente.', 710.00),
(29, 107, 24, 'no', 'Me destaco por mi eficiencia y meticulosa atención al detalle en cada tarea.', 560.00),
(30, 107, 25, 'no', 'La formación constante y la experiencia me permiten ofrecer un servicio de primera calidad.', 630.00),
(31, 107, 26, 'no', 'Trabajo con pasión y responsabilidad, reflejando la alta calidad de mi servicio.', 580.00),
(32, 107, 27, 'no', 'Mi honestidad y compromiso hacen que mi servicio sea muy valorado por mis clientes.', 690.00),
(33, 107, 28, 'no', 'Combino creatividad y técnica para ofrecer siempre un servicio excepcional.', 750.00),
(34, 107, 18, 'no', 'Estoy enfocado en brindar un servicio diferenciado basado en calidad e innovación.', 670.00),
(35, 107, 19, 'no', 'La dedicación y el esmero son mis principales herramientas para destacar mi trabajo.', 620.00),
(36, 107, 20, 'no', 'Ofrezco un enfoque profesional y personalizado, marcando la diferencia en cada proyecto.', 730.00),
(37, 107, 21, 'no', 'Mi compromiso total se traduce en un servicio de alta calidad y pleno satisfacción.', 700.00),
(38, 107, 22, 'no', 'Aporto soluciones innovadoras y personalizadas para cada cliente, asegurando resultados óptimos.', 680.00),
(39, 107, 23, 'no', 'Mi perseverancia y dedicación son la clave de un servicio distintivo y sobresaliente.', 690.00),
(40, 107, 24, 'no', 'Con una visión centrada en la excelencia, mi servicio supera todas las expectativas.', 720.00);

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
  `valoradoPorCliente` tinyint(4) DEFAULT 0,
  `valoradoPorFuncionario` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicio`, `idcliente`, `idFuncionario`, `fechaServicio`, `estado`, `titulo`, `descripcion`, `tipoServicio`, `valor`, `diaServicio`, `direccion`, `provincia`, `ciudad`, `valoradoPorCliente`, `valoradoPorFuncionario`) VALUES
(107, 18, 18, '2025-06-01', 'activo', 'Servicio 1', 'Descripción del servicio 1', 'Cuidado de mayores - Puntual', 50.00, 'Lunes', 'Calle Ejemplo 1', 'Madrid', 'Madrid', 0, 0),
(108, 19, 19, '2025-06-02', 'activo', 'Servicio 2', 'Descripción del servicio 2', 'Cuidado de mayores - Semanal', 60.00, 'Martes', 'Calle Ejemplo 2', 'Barcelona', 'Barcelona', 0, 0),
(109, 20, 20, '2025-06-03', 'activo', 'Servicio 3', 'Descripción del servicio 3', 'Cuidado de niños - Puntual', 55.00, 'Miércoles', 'Calle Ejemplo 3', 'Valencia', 'Valencia', 0, 0),
(110, 21, 21, '2025-06-04', 'activo', 'Servicio 4', 'Descripción del servicio 4', 'Cuidado de niños - Semanal', 70.00, 'Jueves', 'Calle Ejemplo 4', 'Sevilla', 'Sevilla', 0, 0),
(111, 22, 22, '2025-06-05', 'activo', 'Servicio 5', 'Descripción del servicio 5', 'Cristales - Puntual', 65.00, 'Viernes', 'Calle Ejemplo 5', 'Zaragoza', 'Zaragoza', 0, 0),
(112, 23, 23, '2025-06-06', 'confirmacion', 'Servicio 6', 'Descripción del servicio 6', 'Cristales - Semanal', 80.00, 'Sábado', 'Calle Ejemplo 6', 'Málaga', 'Málaga', 0, 0),
(113, 24, 24, '2025-06-07', 'confirmacion', 'Servicio 7', 'Descripción del servicio 7', 'Cuidado de mascotas - Puntual', 75.00, 'Domingo', 'Calle Ejemplo 7', 'Bilbao', 'Bilbao', 0, 0),
(114, 25, 25, '2025-06-08', 'confirmacion', 'Servicio 8', 'Descripción del servicio 8', 'Cuidado de mascotas - Semanal', 85.00, 'Lunes', 'Calle Ejemplo 8', 'Murcia', 'Murcia', 0, 0),
(115, 26, 26, '2025-06-09', 'confirmacion', 'Servicio 9', 'Descripción del servicio 9', 'Desinfección - Puntual', 90.00, 'Martes', 'Calle Ejemplo 9', 'Alicante', 'Alicante', 0, 0),
(116, 27, 27, '2025-06-10', 'confirmacion', 'Servicio 10', 'Descripción del servicio 10', 'Desinfección - Semanal', 95.00, 'Miércoles', 'Calle Ejemplo 10', 'Granada', 'Granada', 0, 0),
(117, 18, 18, '2025-06-11', 'terminado', 'Servicio 11', 'Descripción del servicio 11', 'Jardinería - Puntual', 70.00, 'Jueves', 'Calle Ejemplo 11', 'Madrid', 'Madrid', 1, 1),
(118, 19, 19, '2025-06-12', 'terminado', 'Servicio 12', 'Descripción del servicio 12', 'Jardinería - Semanal', 75.00, 'Viernes', 'Calle Ejemplo 12', 'Barcelona', 'Barcelona', 1, 1),
(119, 20, 20, '2025-06-13', 'terminado', 'Servicio 13', 'Descripción del servicio 13', 'Lavandería - Puntual', 65.00, 'Sábado', 'Calle Ejemplo 13', 'Valencia', 'Valencia', 1, 1),
(120, 21, 21, '2025-06-14', 'terminado', 'Servicio 14', 'Descripción del servicio 14', 'Lavandería - Semanal', 80.00, 'Domingo', 'Calle Ejemplo 14', 'Sevilla', 'Sevilla', 1, 1),
(121, 22, 22, '2025-06-15', 'terminado', 'Servicio 15', 'Descripción del servicio 15', 'Limpieza - Puntual', 85.00, 'Lunes', 'Calle Ejemplo 15', 'Zaragoza', 'Zaragoza', 1, 1),
(122, 23, 23, '2025-06-16', 'terminado', 'Servicio 16', 'Descripción del servicio 16', 'Limpieza - Semanal', 90.00, 'Martes', 'Calle Ejemplo 16', 'Málaga', 'Málaga', 1, 1),
(123, 24, 24, '2025-06-17', 'terminado', 'Servicio 17', 'Descripción del servicio 17', 'Limpieza de garaje - Puntual', 95.00, 'Miércoles', 'Calle Ejemplo 17', 'Bilbao', 'Bilbao', 1, 1),
(124, 25, 25, '2025-06-18', 'terminado', 'Servicio 18', 'Descripción del servicio 18', 'Limpieza de garaje - Semanal', 60.00, 'Jueves', 'Calle Ejemplo 18', 'Murcia', 'Murcia', 1, 1),
(125, 26, 26, '2025-06-19', 'terminado', 'Servicio 19', 'Descripción del servicio 19', 'Organización - Puntual', 70.00, 'Viernes', 'Calle Ejemplo 19', 'Alicante', 'Alicante', 1, 1),
(126, 28, 28, '2025-06-20', 'terminado', 'Servicio 20', 'Descripción del servicio 20', 'Organización - Semanal', 75.00, 'Sábado', 'Calle Ejemplo 20', 'Granada', 'Granada', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_clientes`
--

CREATE TABLE `valoraciones_clientes` (
  `idvaloraciones` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `estrellas` varchar(45) NOT NULL,
  `comentario` varchar(2000) DEFAULT NULL,
  `idFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `valoraciones_clientes`
--

INSERT INTO `valoraciones_clientes` (`idvaloraciones`, `idCliente`, `estrellas`, `comentario`, `idFuncionario`) VALUES
(1, 22, '10', 'Excelente servicio, muy profesional y atento.', 18),
(2, 23, '8', 'Buen servicio, aunque se notó algo de demora en la atención.', 18),
(3, 24, '10', 'Fantástico, superó mis expectativas en todos los aspectos.', 18),
(4, 25, '6', 'Servicio aceptable, pero podría mejorar en algunos detalles.', 18),
(5, 26, '8', 'Muy bueno; sin embargo, se puede trabajar en la comunicación.', 18),
(6, 18, '8', 'Desde el primer momento, el servicio ofrecido por este profesional mostró un nivel de calidad sorprendente que superó mis expectativas en todos los aspectos. La puntualidad fue inigualable, llegando a tiempo y trabajando con una eficiencia que reflejaba años de experiencia y un compromiso genuino por la excelencia. Durante todo el proceso, el funcionario demostró gran atención a los detalles; se notó que no dejaba ningún rincón sin atender y cada acción fue ejecutada meticulosamente. La comunicación fue clara y constante, haciendo que todo el proceso resultara transparente e informativo, lo cual generó en mí una confianza inmediata en el servicio. Se explicó cada procedimiento aplicado, permitiéndome comprender el uso de técnicas y productos de alta calidad que garantizaron un resultado impecable. \r\n\r\nAdemás, la disposición para aceptar sugerencias y adaptar el servicio a las necesidades específicas resaltó una actitud flexible y orientada al cliente. Se ejecutó un riguroso control de calidad en cada etapa, aplicando soluciones de limpieza que no solo dejaron el ambiente estético, sino también saludable y seguro. Cada fase fue planificada con detalle, evidenciando un profundo conocimiento del área y un compromiso inquebrantable con la satisfacción del cliente. La experiencia fue de alto nivel y dejó una impresión duradera, posicionando este servicio como una opción destacada en el mercado.\r\n\r\nFinalmente, quiero destacar la integridad y el profesionalismo demostrados en cada interacción. Es evidente que se trata de un experto en su campo, capaz de transformar un servicio ordinario en una experiencia excepcional. Recomiendo ampliamente este servicio para quienes buscan eficiencia, calidad y un compromiso real con la excelencia. Estoy convencido de que este nivel de atención es escaso en el mercado y, por ello, volveré a optar por este profesional en futuras ocasiones, seguro de que mantendrá los estándares tan altos que he experimentado.\r\n\r\nAdicionalmente, la experien', 19),
(7, 19, '10', 'El servicio brindado por este profesional fue absolutamente excepcional y marcó un antes y un después en mi percepción de la calidad. Desde el primer contacto se evidenció una atención minuciosa, acompañada de una puntualidad impecable y un trato cálido que generó de inmediato un ambiente de confianza. Cada etapa del servicio fue comunicada de manera transparente, explicándome con detalle los procedimientos y la razón del uso de determinados productos, lo que resultó en una experiencia educativa además de exitosa. Se notó el uso de técnicas modernas combinadas con un toque personal en la ejecución, lo que transformó una tarea rutinaria en un acto de verdadera excelencia técnica. \r\n\r\nLa capacidad de adaptarse a imprevistos y la flexibilidad para ajustar el trabajo a mis necesidades específicas fueron aspectos sobresalientes; el profesional se tomó el tiempo de personalizar la atención y ofrecer recomendaciones acertadas para preservar el estado del entorno a largo plazo. Este nivel de compromiso, sumado a la innovación en cada acción, elevó la experiencia a estándares mucho más altos de lo que hubiera imaginado. La calidez en la interacción y la disposición para resolver cualquier duda reflejaron una actitud de servicio excepcional.\r\n\r\nQuiero resaltar que el servicio no solo cumplió, sino que superó todas mis expectativas, dejando claro que la excelencia es una parte integral de su trabajo. Recomiendo sin reservas este servicio a quienes busquen resultados impecables y una atención personalizada que marque la diferencia. La experiencia vivida reafirma mi confianza y, sin duda, recurriré a este profesional en futuras oportunidades.\r\n\r\nEn conclusión, la combinación de profesionalismo, innovación y atención detallada transformó mi experiencia en algo memorable. Cada aspecto del trabajo fue ejecutado con pasión y precisión, demostrando que este servicio es una opción indispensable para quienes valoran la calidad y la dedicación absoluta.', 19),
(8, 20, '6', 'Mi experiencia con el servicio recibido fue una mezcla de aciertos y áreas por mejorar. Desde el comienzo, se evidenció un compromiso por parte del profesional en alcanzar los estándares básicos, con una comunicación adecuada y puntualidad en la llegada. No obstante, en ciertos momentos noté que la atención a algunos detalles no fue la esperada, lo que ocasionó diferencias en la uniformidad del acabado final. Si bien la explicación sobre los procedimientos fue clara, considero que ciertos aspectos pudieron haberse abordado de forma más exhaustiva para evitar dudas respecto a la calidad del trabajo. \r\n\r\nDurante el desarrollo del servicio, aunque el profesional mostró buena disposición para resolver imprevistos y corregir algunas fallas, en algunas áreas la ejecución resultó algo apresurada, generando leves inconsistencias en el resultado global. Aun así, se destacó un trato cortés y una actitud abierta a recibir retroalimentación, lo que permitió que se ofrecieran soluciones en el momento para mejorar el proceso. Esta actitud es fundamental para el crecimiento y la optimización de cualquier servicio.\r\n\r\nAdemás, la experiencia dejó en claro que existe un potencial importante para alcanzar la excelencia, siempre y cuando se preste mayor atención a los detalles y se refinen algunos procesos internos. Me impresionó la capacidad del profesional para reconocer las áreas de oportunidad y su compromiso por aplicar mejoras continuas. En resumen, la experiencia fue aceptable, pero con margen para perfeccionar ciertos aspectos que, de ser atendidos, podrían elevar significativamente la calidad del servicio.\r\n\r\nAdicionalmente, el esfuerzo por mantener una comunicación constante fue un punto a favor, aunque en el aspecto técnico se podrían implementar mejoras para lograr un resultado mucho más homogéneo. Espero sinceramente que estas observaciones se reflejen en futuros servicios, permitiendo que la experiencia global se transforme en algo verdaderamente extraordinario.', 19),
(9, 21, '7', 'El servicio recibido fue profesional y bien organizado, aunque dejó pequeñas áreas que considero susceptibles de mejora. Desde el inicio, el funcionario se mostró atento y explicó de forma detallada el plan de trabajo, lo que generó en mí expectativas positivas. Durante la ejecución, se mostró empeño en lograr un resultado de calidad, aplicando técnicas y utilizando productos de buena categoría, aunque en algunos puntos la meticulosidad no alcanzó el nivel ideal. Esta ligera deficiencia, sin embargo, fue compensada por la actitud proactiva y la disposición para ajustar el servicio según mis sugerencias. \r\n\r\nLa comunicación fue fluida durante todo el proceso, lo que facilitó la resolución inmediata de cualquier duda y el manejo de imprevistos. Se percibió claramente el compromiso del profesional con la satisfacción del cliente, aunque considero que un refuerzo en el control de calidad podría elevar aún más el estándar del servicio entregado. El trato personalizado y el interés en adaptar el proceso a mis necesidades específicas fueron muy valorados y marcaron una diferencia significativa en la experiencia general.\r\n\r\nEn conclusión, la experiencia fue satisfactoria, pero con un margen real de optimización en ciertos aspectos. La combinación de profesionalismo y cordialidad creó un ambiente de confianza, y confío en que, con algunos ajustes, este servicio podrá alcanzar niveles de excelencia indiscutibles. Adicionalmente, la transparencia en la explicación de cada paso y la capacidad para escuchar y responder a mis requerimientos evidenciaron una clara orientación al cliente, lo que sin duda será un punto fuerte para futuras mejoras. Recomiendo este servicio, con la expectativa de ver una evolución que lo posicione como una opción de alta calidad en el mercado.', 19),
(10, 22, '9', 'La experiencia con el servicio prestado fue sobresaliente y marcó un antes y un después en mi percepción del profesionalismo. Desde el primer contacto se destacó una atención minuciosa y un trato cálido que hicieron que me sintiera valorado y escuchado. El funcionario demostró una puntualidad y una planificación impecables, ejecutando cada tarea con precisión y utilizando técnicas avanzadas que garantizan resultados de alta calidad. Durante el proceso, se me explicó detalladamente cada procedimiento, lo que me permitió apreciar la tecnología y los productos de primera línea empleados, asegurando no solo una mejora estética sino también un entorno más saludable.\r\n\r\nEl enfoque en la personalización fue notable, ya que se adaptó el servicio a mis necesidades específicas con gran flexibilidad y eficiencia. Además, la resolución de imprevistos se llevó a cabo de manera profesional, transmitiéndome la seguridad de que se tratarían todas las eventualidades de forma oportuna. La combinación de creatividad en la ejecución y rigor técnico permitió que cada detalle se atendiera con el máximo cuidado, generando un resultado final que superó mis expectativas en todos los sentidos.\r\n\r\nCabe resaltar además el compromiso demostrado en el seguimiento posterior al servicio, brindando garantías y ofreciendo soluciones a cualquier duda que pudiera surgir. Esta atención integral y personalizada refleja un alto nivel de responsabilidad y dedicación que distingue a este profesional. En resumen, recomiendo este servicio con total convicción a quienes buscan excelencia, innovación y un trato cercano y profesional. Estoy convencido de que la calidad y la pasión que se evidenciaron harán que este servicio se mantenga como una referencia en el sector, siendo una opción indispensable para quienes desean resultados perfectos.\r\n\r\nAdicionalmente, la capacidad para combinar técnicas modernas con un enfoque humano y cercano transformó la experiencia en algo memorable. La claridad en la comunicación ', 19),
(11, 23, '7', 'El servicio fue puntual y profesional, cumpliendo con lo esperado; aunque se podría mejorar en algunos detalles.', 21),
(12, 24, '9', 'Estoy muy satisfecho con el servicio; el profesional demostró experiencia, cortesía y gran eficiencia en su labor.', 21),
(13, 25, '6', 'El resultado fue correcto, pero noté ciertos aspectos que requieren mejor atención para superar las expectativas.', 21),
(14, 26, '8', 'El servicio fue profesional, con buena comunicación y cumplimiento de plazos. Un buen desempeño en general.', 21),
(15, 27, '7', 'Fue un servicio decente; se cumplieron las funciones esenciales, aunque hay margen para perfeccionar algunos detalles.', 21),
(16, 23, '8', 'El profesional ofreció un servicio eficaz y cumplió con mis expectativas en cuanto a puntualidad y atención.', 22),
(17, 24, '9', 'Muy satisfecho con el servicio; el trato fue cordial y la ejecución detallada, marcando una gran diferencia.', 22),
(18, 25, '7', 'El servicio fue bueno en general, aunque se podrían pulir algunos detalles para alcanzar la máxima calidad.', 22),
(19, 26, '6', 'Noté algunos aspectos mejorables en la coordinación y en la precisión de ciertos procesos, pero en líneas generales fue aceptable.', 22),
(20, 27, '10', 'La experiencia fue excelente; el profesional mostró gran destreza, cuidando cada detalle y adaptándose a mis necesidades.', 22),
(21, 28, '8', 'Quedé conforme con el servicio, el profesional fue claro en sus explicaciones y cumplió con los tiempos acordados.', 22),
(23, 23, '8', 'El profesional ofreció un servicio eficaz y cumplió con mis expectativas en cuanto a puntualidad y atención.', 22),
(24, 24, '9', 'Muy satisfecho con el servicio; el trato fue cordial y la ejecución detallada, marcando una gran diferencia.', 22),
(25, 25, '7', 'El servicio fue bueno en general, aunque se podrían pulir algunos detalles para alcanzar la máxima calidad.', 22),
(26, 26, '6', 'Noté algunos aspectos mejorables en la coordinación y en la precisión de ciertos procesos, pero en líneas generales fue aceptable.', 22),
(27, 27, '10', 'La experiencia fue excelente; el profesional mostró gran destreza, cuidando cada detalle y adaptándose a mis necesidades.', 22),
(28, 28, '8', 'Quedé conforme con el servicio, el profesional fue claro en sus explicaciones y cumplió con los tiempos acordados.', 22),
(30, 24, '9', 'Muy satisfecho con el servicio; el trato fue cordial y la ejecución detallada, marcando una gran diferencia.', 22),
(31, 25, '7', 'El servicio fue bueno en general, aunque se podrían pulir algunos detalles para alcanzar la máxima calidad.', 22),
(32, 26, '6', 'Noté algunos aspectos mejorables en la coordinación y en la precisión de ciertos procesos, pero en líneas generales fue aceptable.', 22),
(33, 27, '10', 'La experiencia fue excelente; el profesional mostró gran destreza, cuidando cada detalle y adaptándose a mis necesidades.', 22),
(34, 28, '8', 'Quedé conforme con el servicio, el profesional fue claro en sus explicaciones y cumplió con los tiempos acordados.', 22),
(36, 27, '10', 'La experiencia fue excelente; el profesional mostró gran destreza, cuidando cada detalle y adaptándose a mis necesidades.', 22),
(37, 28, '8', 'Quedé conforme con el servicio, el profesional fue claro en sus explicaciones y cumplió con los tiempos acordados.', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones_servicios`
--

CREATE TABLE `valoraciones_servicios` (
  `idvaloraciones_servicios` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `estrellas` int(11) DEFAULT NULL,
  `comentario` varchar(2000) DEFAULT NULL,
  `idFuncionario` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `valoraciones_servicios`
--

INSERT INTO `valoraciones_servicios` (`idvaloraciones_servicios`, `idServicio`, `estrellas`, `comentario`, `idFuncionario`, `idCliente`) VALUES
(1, 117, 9, 'El cliente mostró una actitud colaborativa y la comunicación fue fluida, permitiendo la ejecución exitosa del servicio.', 18, 18),
(2, 117, 7, 'El servicio se realizó sin mayores inconvenientes; aunque se requirió ajustar algunos tiempos de respuesta para mejorar la coordinación.', 19, 18),
(3, 117, 8, 'La coordinación fue adecuada, y el cliente cumplió con sus compromisos, facilitando el desarrollo del servicio de forma satisfactoria.', 20, 18),
(4, 117, 6, 'Se detectaron pequeños detalles en la planificación y comunicación, que podrían mejorarse para optimizar futuros servicios.', 21, 18),
(5, 117, 10, 'Excelente actitud y colaboración por parte del cliente, lo que permitió una ejecución impecable del servicio de principio a fin.', 22, 18),
(11, 118, 8, 'El profesional evaluó el servicio y consideró que la coordinación fue adecuada, resaltando la disposición del cliente para colaborar en cada fase del proceso.', 18, 19),
(12, 118, 9, 'La experiencia fue muy positiva; se ejecutó el servicio sin contratiempos y el cliente mantuvo una comunicación clara, facilitando un desarrollo eficiente.', 20, 19),
(13, 118, 6, 'El servicio presentó algunas dificultades en cuanto a tiempos de respuesta y coordinación; se notaron ciertos retrasos, aunque el cliente trató de adaptarse a la situación.', 21, 19),
(14, 118, 7, 'El servicio se completó con una calidad aceptable; sin embargo, se identificaron áreas de oportunidad en la planificación que podrían optimizarse para mejorar el resultado.', 22, 19),
(15, 118, 10, 'Una experiencia sobresaliente: la colaboración del cliente fue extraordinaria, lo que permitió desarrollar un servicio impecable con eficiencia y gran profesionalismo.', 23, 19);

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
  ADD KEY `fk_val_serv_idFuncionario` (`idFuncionario`),
  ADD KEY `fk_valoracion_cliente` (`idCliente`);

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
  MODIFY `idchats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFuncionarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT de la tabla `pedidos_servicios`
--
ALTER TABLE `pedidos_servicios`
  MODIFY `idpedidoServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `valoraciones_clientes`
--
ALTER TABLE `valoraciones_clientes`
  MODIFY `idvaloraciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `valoraciones_servicios`
--
ALTER TABLE `valoraciones_servicios`
  MODIFY `idvaloraciones_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `fk_val_serv_idServicio` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_valoracion_cliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
