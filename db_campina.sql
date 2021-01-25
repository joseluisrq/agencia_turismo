-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2021 a las 04:15:52
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_campina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(10) UNSIGNED NOT NULL,
  `idempleado` int(10) UNSIGNED NOT NULL,
  `fecha_hora_inicial` datetime NOT NULL,
  `inicial` decimal(10,2) NOT NULL,
  `final` decimal(10,2) NOT NULL,
  `fecha_hora_final` datetime NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `idempleado`, `fecha_hora_inicial`, `inicial`, `final`, `fecha_hora_final`, `estado`) VALUES
(1, 24, '2021-01-22 16:37:34', '10.00', '1585.00', '2021-01-22 16:37:34', 0),
(2, 24, '2021-01-22 16:37:34', '10.00', '460.00', '2021-01-22 16:37:34', 0),
(3, 24, '2021-01-22 00:00:00', '80.00', '80.00', '2021-01-22 00:00:00', 0),
(4, 24, '2021-01-22 00:00:00', '1000.00', '1000.00', '2021-01-22 00:00:00', 0),
(5, 24, '2021-01-22 00:00:00', '100.00', '100.00', '2021-01-22 00:00:00', 0),
(6, 24, '2021-01-22 00:00:00', '1000.00', '1000.00', '2021-01-22 00:00:00', 0),
(7, 24, '2021-01-22 00:00:00', '100.00', '100.00', '2021-01-22 00:00:00', 0),
(8, 24, '2021-01-22 00:00:00', '15.00', '15.00', '2021-01-22 00:00:00', 0),
(9, 24, '2021-01-22 00:00:00', '580.00', '580.00', '2021-01-22 00:00:00', 0),
(10, 24, '2021-01-22 00:00:00', '180.00', '180.00', '2021-01-22 00:00:00', 0),
(11, 24, '2021-01-22 00:00:00', '200.00', '200.00', '2021-01-22 00:00:00', 0),
(12, 24, '2021-01-22 00:00:00', '8.00', '8.00', '2021-01-22 00:00:00', 0),
(13, 24, '2021-01-22 00:00:00', '8.00', '8.00', '2021-01-22 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'cargo 1', 'sasdsa', 1, NULL, '2020-05-08 07:36:30'),
(2, 'cargo 2sd', 'ds', 1, NULL, '2020-05-08 07:29:17'),
(3, 'prueba', 'sd', 1, '2020-05-08 07:27:58', '2020-05-08 07:34:05'),
(4, 'sad', 'dsa', 1, '2020-05-08 07:34:02', '2020-05-10 05:29:16'),
(5, 'fds', 'dsfgdhfg', 1, '2020-05-08 07:36:19', '2020-05-08 07:36:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'Transporte', 'Trasnporte', 1, '2020-04-27 00:51:37', '2020-04-27 00:51:37'),
(2, 'Guía Personal', 'Guia', 1, '2020-05-16 08:17:47', '2020-05-16 08:17:47'),
(3, 'Ticket Entrada', 'entrada', 1, '2021-01-21 01:33:40', '2021-01-21 01:33:40'),
(4, 'Comida', 'Comida', 1, '2021-01-21 01:33:40', '2021-01-21 01:33:40'),
(5, 'Paseo en', 'Paseo en', 1, '2021-01-23 01:37:32', '2021-01-23 01:37:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `condicion`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, NULL),
(3, 1, NULL, '2020-11-24 04:10:44'),
(8, 1, '2020-04-27 08:20:34', '2020-04-28 06:54:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_caja`
--

CREATE TABLE `detalle_caja` (
  `id` int(10) NOT NULL,
  `idcaja` int(10) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `monto` decimal(10,2) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1,
  `idventa_salida` int(10) NOT NULL,
  `detalle` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_caja`
--

INSERT INTO `detalle_caja` (`id`, `idcaja`, `fecha_hora`, `monto`, `tipo`, `idventa_salida`, `detalle`) VALUES
(1, 1, '2021-01-22 00:00:00', '75.00', 1, 13, 'venta'),
(2, 1, '2021-01-22 00:00:00', '525.00', 1, 14, 'venta'),
(3, 2, '2021-01-22 00:00:00', '75.00', 1, 15, 'venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_clientes`
--

CREATE TABLE `detalle_clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `idcliente` int(10) UNSIGNED NOT NULL,
  `idpaquete` int(10) UNSIGNED NOT NULL,
  `responsable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_paquete`
--

CREATE TABLE `detalle_paquete` (
  `id` int(10) UNSIGNED NOT NULL,
  `idservicio` int(10) UNSIGNED NOT NULL,
  `idpaquete` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_paquete`
--

INSERT INTO `detalle_paquete` (`id`, `idservicio`, `idpaquete`, `cantidad`, `precio`, `descuento`) VALUES
(1, 10, 13, 1, '5.00', '0.00'),
(2, 9, 13, 1, '20.00', '0.00'),
(3, 8, 13, 1, '30.00', '0.00'),
(4, 7, 13, 1, '10.00', '0.00'),
(5, 6, 13, 1, '10.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id` int(10) UNSIGNED NOT NULL,
  `idventa` int(10) UNSIGNED NOT NULL,
  `idpaquete` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `idventa`, `idpaquete`, `cantidad`, `precio`, `descuento`) VALUES
(1, 6, 13, 1, '75.00', '0.00'),
(2, 7, 13, 5, '75.00', '0.00'),
(3, 8, 13, 8, '75.00', '0.00'),
(4, 13, 13, 1, '75.00', '0.00'),
(5, 14, 13, 7, '75.00', '0.00'),
(6, 15, 13, 1, '75.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(10) UNSIGNED NOT NULL,
  `idcargo` int(10) UNSIGNED NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `idcargo`, `condicion`, `created_at`, `updated_at`) VALUES
(23, 2, 1, '2020-05-07 09:34:38', '2020-05-07 09:34:38'),
(24, 1, 1, '2020-05-10 03:02:39', '2021-01-19 01:39:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_07_031546_crear_categoria_tabla', 1),
(4, '2020_04_23_175920_create_crear_servicios_tabla', 2),
(5, '2020_04_26_032208_crear_personas_tabla', 3),
(6, '2020_04_26_190617_crear_prestador_tabla', 4),
(8, '2020_04_26_201732_crear_clientes_tabla', 5),
(10, '2020_04_26_203045_crear_empleado_tabla', 6),
(11, '2020_04_28_033034_crear_roles_tabla', 7),
(13, '2020_04_29_000000_create_users_table', 8),
(14, '2020_05_06_033034_crear_cargos_tabla', 9),
(15, '2020_05_13_050633_crear_paquetes_tabla', 10),
(16, '2020_05_13_050739_crear_detalle_paquete_tabla', 10),
(17, '2020_05_13_052032_crear_detalle_clientes_tabla', 10),
(18, '2021_01_18_210337_create_ventas_table', 11),
(19, '2021_01_18_210452_create_detalle_ventas_table', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo_paquete` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_paquete` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idempleado` int(10) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id`, `codigo_paquete`, `nombre_paquete`, `detalle`, `idempleado`, `fecha_hora`, `impuesto`, `total`, `estado`, `created_at`, `updated_at`) VALUES
(12, 'P-001', 'a', 'a', 23, '2021-01-21 16:23:09', '18.00', '150.00', '1', '2021-01-21 19:53:37', NULL),
(13, 'P-012', 'POLLOC Y NAMORA TE ENAMORA', 'QHAPAC ÑAN, (Alameda de los 14 incas) LACTEOS DISANA, (Encontraremos productos lácteos, únicos en sabores y cantidades) PAMPA DE LA CULEBRA, (Donde nos oculta una hermosa leyenda) POLLOC, (Iglesia hecha en Mosaico Y pan de oro) LAGUNA SANTA URSULA, (hermosa por sus algas rojas) ZONA LOS SAPITOS, (Formaciones rocosas que han ido formándose con el trascurso del tiempo) TALLER DE LAS GUITARRAS, (Demostración de las variedades de guitarras y demostración de música). LAGUNA SAN NÍCOLAS, (Tiene una extensión de 2 km de largo y de ancho 1.7 km)', 24, '2021-01-22 00:00:00', '0.18', '75.00', '1', '2021-01-23 01:44:56', '2021-01-23 01:44:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `dni` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `dni`, `nombres`, `apellidos`, `tipo_documento`, `direccion`, `ciudad`, `pais`, `telefono`, `email`, `sexo`, `created_at`, `updated_at`) VALUES
(1, '70212063', 'Jose Luis', 'Ramirez Quiroz', 'DNI', 'Tartar Chico', 'Cajamarca', 'Peru', '964923450', 'joseramirezq.info@gmail.com', 1, NULL, NULL),
(2, '70212068', 'Ronal I', 'Sanchez Irigoin', 'DNI', 'San Martin', 'Cajamarca', 'Peru', '96585421', 'ronal@gmail.com', 1, NULL, '2020-04-29 09:13:52'),
(3, '4521368777', 'Hernesto Daizii', 'Villar Escrito', 'DNI', 'Atahualpa 500', 'Cajamarca', 'Peru', '968542154', 'her_nesto@gmail.com', 1, NULL, '2020-04-28 08:28:56'),
(5, '85213685', 'Gresel Doriz', 'Villar Rigoberto', 'DNI', 'Atahualpa 800', 'Quito', 'Ecuador', '968542154', 'grese@gmail.com', 0, NULL, NULL),
(8, '78523654', 'Rosalia', 'Estacio Ocas', 'DNI', 'Cerca de Ahi', 'La paz', 'Bolivia', '965852145', 'rosalia@gmail.com', 0, '2020-04-27 08:20:34', '2020-04-27 08:20:34'),
(9, '896521433', 'Arturito', 'Esperico', 'DNI', 'Beato Masias 485', 'Cajamarca', 'Perú', '965825412', 'arturito@gmail.com', 1, NULL, '2020-05-06 09:23:48'),
(23, '63785423', 'Ricardo Alberto', 'Estacio Quispe', 'DNI', 'tatar chico', 'cajamarca', 'Peru', '879456123', 'ricardo@gmail.com', 1, '2020-05-07 09:34:38', '2020-05-08 08:27:58'),
(24, '21206370', 'LUIS', 'RAMíREZ', 'DNI', 'CAJAMARCA', 'CAJAMARCA', 'PERU', '964923458', 'JOSE@GMAIL.COM', 1, '2020-05-10 03:02:39', '2020-07-17 21:37:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadores`
--

CREATE TABLE `prestadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `empresa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prestadores`
--

INSERT INTO `prestadores` (`id`, `empresa`, `ruc`, `puesto`, `condicion`) VALUES
(2, 'Empresa Diaz', '20785236585', 'Conductor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'ADMINISTRADOR', 'Administrador del sistema, Cuenta con todos los privilegios.', 1),
(2, 'COUNTER', 'Personal de Campiña Tours responsable de gestionar las reservas y\r\nventas, registrar los clientes y administra los cambios de reservas y\r\nventas que puedan ser solicitados.\r\n', 1),
(3, 'ENCARGADO DE OPERACIONES', 'Personal de Campiña Tours responsable de la gestión logística', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `idcategoria` int(10) UNSIGNED NOT NULL,
  `idprestador` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` decimal(11,2) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `idcategoria`, `idprestador`, `codigo`, `nombre`, `descripcion`, `precio`, `condicion`, `created_at`, `updated_at`) VALUES
(6, 1, 2, '0', 'Movilidad ida y vuelta.', 'Movilidad ida y vuelta.', '10.00', 1, '2021-01-23 01:38:14', '2021-01-23 01:38:14'),
(7, 5, 2, 'S-006', 'Paseo en caballito de totora.', 'Paseo en caballito de totora.', '10.00', 1, '2021-01-23 01:39:26', '2021-01-23 01:39:26'),
(8, 2, 2, 'S-007', 'Guia Profesional', 'Guia Profesional', '30.00', 1, '2021-01-23 01:39:47', '2021-01-23 01:39:47'),
(9, 4, 2, 'S-008', 'Almuerzo típico al gusto del cliente', 'Almuerzo típico al gusto del cliente', '20.00', 1, '2021-01-23 01:40:11', '2021-01-23 01:40:11'),
(10, 4, 2, 'S-009', 'Snack abordo', NULL, '5.00', 1, '2021-01-23 01:41:16', '2021-01-23 01:41:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `idrol` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `condicion`, `idrol`, `remember_token`) VALUES
(24, 'admin', '$2y$10$0AZYRVi3u3joT/SXHG2drOEsl9fwY.x3ApCU2HE0QwT99V6.aHL8S', 1, 1, 'QQd8NBHucbkrUi02IMzdrtGduRiYRyONvt0kdisTW7WLY7mu56Zi2Wpnwlo0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(10) UNSIGNED NOT NULL,
  `idempleado` int(10) UNSIGNED NOT NULL,
  `id_cliente_encargado` int(10) UNSIGNED NOT NULL,
  `tipo_comprobante` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie_comprobante` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_comprobante` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `idempleado`, `id_cliente_encargado`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total`, `estado`, `created_at`, `updated_at`) VALUES
(6, 24, 8, 'BOLETA', '10503', '458213', '2021-01-22 00:00:00', '0.00', '75.00', 'Registrado', '2021-01-23 02:07:10', '2021-01-23 02:07:10'),
(7, 24, 3, 'BOLETA', '123', '123', '2021-01-22 00:00:00', '0.00', '375.00', 'Registrado', '2021-01-23 02:45:33', '2021-01-23 02:45:33'),
(8, 24, 5, 'TICKET', '546', '456', '2021-01-22 00:00:00', '0.00', '600.00', 'Anulado', '2021-01-23 02:46:31', '2021-01-23 03:48:20'),
(13, 24, 3, 'BOLETA', '12', '12', '2021-01-22 00:00:00', '0.18', '75.00', 'Registrado', '2021-01-23 03:35:24', '2021-01-23 03:35:24'),
(14, 24, 3, 'BOLETA', '4', '4', '2021-01-22 00:00:00', '0.18', '525.00', 'Anulado', '2021-01-23 03:42:18', '2021-01-23 03:50:22'),
(15, 24, 5, 'BOLETA', '1', '1', '2021-01-22 00:00:00', '0.00', '75.00', 'Anulado', '2021-01-23 03:43:23', '2021-01-23 03:50:31');

--
-- Disparadores `ventas`
--
DELIMITER $$
CREATE TRIGGER `tr_InsertDetalle` AFTER INSERT ON `ventas` FOR EACH ROW BEGIN
 INSERT INTO detalle_caja(idcaja,monto,fecha_hora,tipo,idventa_salida,detalle)
 VALUES ((SELECT id FROM `caja` WHERE estado=1 ),new.total,new.fecha_hora,1, new.id,'venta');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_updMontoIngreso` AFTER INSERT ON `ventas` FOR EACH ROW BEGIN
 UPDATE caja SET final = final + NEW.total 
 WHERE caja.estado = 1 and ventas.estado='Anulado';
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idempleado` (`idempleado`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cargos_nombre_unique` (`nombre`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD KEY `clientes_id_foreign` (`id`);

--
-- Indices de la tabla `detalle_caja`
--
ALTER TABLE `detalle_caja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcaja` (`idcaja`);

--
-- Indices de la tabla `detalle_clientes`
--
ALTER TABLE `detalle_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_clientes_idcliente_foreign` (`idcliente`),
  ADD KEY `detalle_clientes_idpaquete_foreign` (`idpaquete`);

--
-- Indices de la tabla `detalle_paquete`
--
ALTER TABLE `detalle_paquete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_paquete_idservicio_foreign` (`idservicio`),
  ADD KEY `detalle_paquete_idpaquete_foreign` (`idpaquete`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_ventas_idventa_foreign` (`idventa`),
  ADD KEY `idpaquete` (`idpaquete`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idcargo` (`idcargo`),
  ADD KEY `idcargo_2` (`idcargo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paquetes_idempleado_foreign` (`idempleado`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personas_dni_unique` (`dni`);

--
-- Indices de la tabla `prestadores`
--
ALTER TABLE `prestadores`
  ADD KEY `prestadores_id_foreign` (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_nombre_unique` (`nombre`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `servicios_nombre_unique` (`nombre`),
  ADD KEY `servicios_idcategoria_foreign` (`idcategoria`),
  ADD KEY `idprestador` (`idprestador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `usuarios_usuario_unique` (`usuario`),
  ADD KEY `usuarios_id_foreign` (`id`),
  ADD KEY `usuarios_idrol_foreign` (`idrol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventas_idempleado_foreign` (`idempleado`),
  ADD KEY `id_cliente_encargado` (`id_cliente_encargado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_caja`
--
ALTER TABLE `detalle_caja`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_clientes`
--
ALTER TABLE `detalle_clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_paquete`
--
ALTER TABLE `detalle_paquete`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `caja_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_id_foreign` FOREIGN KEY (`id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_caja`
--
ALTER TABLE `detalle_caja`
  ADD CONSTRAINT `detalle_caja_ibfk_1` FOREIGN KEY (`idcaja`) REFERENCES `caja` (`id`);

--
-- Filtros para la tabla `detalle_clientes`
--
ALTER TABLE `detalle_clientes`
  ADD CONSTRAINT `detalle_clientes_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_clientes_idpaquete_foreign` FOREIGN KEY (`idpaquete`) REFERENCES `paquetes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_paquete`
--
ALTER TABLE `detalle_paquete`
  ADD CONSTRAINT `detalle_paquete_idpaquete_foreign` FOREIGN KEY (`idpaquete`) REFERENCES `paquetes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_paquete_idservicio_foreign` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`idpaquete`) REFERENCES `paquetes` (`id`),
  ADD CONSTRAINT `detalle_ventas_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`idcargo`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `empleados_id_foreign` FOREIGN KEY (`id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `paquetes_idempleado_foreign` FOREIGN KEY (`idempleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `prestadores`
--
ALTER TABLE `prestadores`
  ADD CONSTRAINT `prestadores_id_foreign` FOREIGN KEY (`id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`idprestador`) REFERENCES `prestadores` (`id`),
  ADD CONSTRAINT `servicios_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente_encargado`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `ventas_idempleado_foreign` FOREIGN KEY (`idempleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
