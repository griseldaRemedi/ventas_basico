-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-06-2024 a las 16:51:24
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadeventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen`
--

CREATE TABLE `tb_almacen` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `stock_maximo` int(11) DEFAULT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `id_categoria`, `id_usuario`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'P-00001	', 'Pretty', '2,50 litros', 3, 4, 7, 10, 100, 9.00, 12.50, '2024-04-20', 'pretty.jpg', '2024-04-28 07:59:28', '2024-05-25 12:03:13'),
(4, 'P-00002', 'Auriculares  Inalámbricos', 'Sony WH-1000XM5 Auriculares Inalámbricos con Noise Cancelling, 30 horas de Autonomía, Optimizados para Alexa y Asistente de Google, con Micrófono Incorporado para Llamadas de Teléfono, Negro', 15, 4, 5, 100, 200, 200.00, 400.00, '2024-04-26', 'auriculares.jpg', '2024-04-28 12:08:25', '2024-05-25 11:54:07'),
(5, 'P-00005', 'Auriculares  Inalámbricos Sony', 'Auriculares inalámbricos WH-CH520 - blanco - Adapta el sonido a tus preferencias personales con la app Sony | Headphones Connect. Digital Sound Enhancement Engine reproduce un sonido de alta calidad más fiel a la grabación original. Duración de la batería de hasta 50 horas y carga rápida.', 15, 4, 95, 50, 200, 200.00, 400.00, '2024-04-28', '2024-04-28-07-13-56__auriculares_blancos.jpg', '2024-04-28 07:13:56', '2024-05-25 12:00:44'),
(6, 'P-00006', 'Auriculares Inalámbricos Apple AirPods', 'Auriculares Inalámbricos Apple AirPods 3era Generación Bluetooth. Compatibilidad para: iPhone, Apple Watch, iPad y Mac. Interfaz de carga: USB tipo C, Qi. Conexiones: Bluetooth 5.0. Modelo: MME73AM/A', 15, 4, 100, 50, 200, 200.00, 400.00, '2024-04-28', '2024-04-28-06-36-50__auriculares_airpods_blancos.jpg', '2024-04-28 06:36:50', '0000-00-00 00:00:00'),
(7, 'P-00007', 'Auriculares Inalámbricos L350 - rojo', 'Auriculares Inalámbricos L350 C Microfono Plegables Gamer - rojo - Diseño ergonómico: Longitud plegable y ajustable de la diadema, cojín del oído de cuero suave, fácil para el almacenamiento y cómodo de llevar durante mucho tiempo. BT 5.Conexión 0: BT avanzado 5. La tecnología 0 ofrece una velocidad de transmisión rápida y una señal de alta calidad. Fácil de conectar con dispositivos habilitados para BT. • Batería de larga duración', 15, 4, 100, 50, 200, 200.00, 400.00, '2024-04-28', '2024-04-28-06-37-03__auriculares_rojos.jpg', '2024-04-28 06:37:03', '0000-00-00 00:00:00'),
(8, 'P-00008', 'Auriculares  Inalámbricos  STF rosa', 'Auriculares Inalámbricos STF Aurum Rosa. Micrófono para llamadas y entrada micro SD.  Botones de reproducción.  Batería de hasta 10 horas continuas.\r\n', 15, 4, 97, 20, 200, 200.00, 400.00, '2024-04-28', '2024-04-28-06-37-19__auriculares_rosa.jpg', '2024-04-28 06:37:19', '2024-05-25 12:04:53'),
(9, 'P-00009', 'LECHE LA SERENISIMA', 'LECHE LA SERENISIMA FRESCA DESCREMADA LIVIANA 1% GRASA SACHET X 1 LT. Leche Multivitaminas 1% La Serenisima Sachet 1L. Leche parcialmente descremada ultrapasteurizada. Homogeneizada, fortificada con vitaminas A y D. Libre de gluten. Fuente de vitaminas C y E. Ingredientes: Leche parcialmente descremada, vitamina a, vitamina c, vitamina d, vitamina e, leche.', 1, 4, 7, 100, 400, 10.00, 20.00, '2024-04-28', '2024-04-28-12-23-29__leche_la_serenisima.jpg', '2024-04-28 12:23:29', '2024-05-25 11:49:45'),
(18, 'P-00010', 'hjhgjgh', 'ghjhgjh', 1, 4, 1, 2, 3, 4.00, 5.00, '2024-04-28', '', '2024-04-28 09:16:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `id_carrito` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`id_carrito`, `nro_venta`, `id_producto`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(32, 2, 1, 3, '2024-05-25 09:02:13', '0000-00-00 00:00:00'),
(33, 2, 9, 3, '2024-05-25 09:02:26', '0000-00-00 00:00:00'),
(34, 2, 4, 1, '2024-05-25 09:24:43', '0000-00-00 00:00:00'),
(35, 3, 1, 1, '2024-05-25 09:24:56', '0000-00-00 00:00:00'),
(36, 3, 8, 2, '2024-05-25 09:25:45', '0000-00-00 00:00:00'),
(37, 4, 1, 3, '2024-05-25 09:42:32', '0000-00-00 00:00:00'),
(38, 4, 4, 1, '2024-05-25 11:11:09', '0000-00-00 00:00:00'),
(39, 4, 8, 1, '2024-05-25 11:11:18', '0000-00-00 00:00:00'),
(42, 6, 1, 1, '2024-05-25 11:34:34', '0000-00-00 00:00:00'),
(43, 7, 9, 3, '2024-05-25 11:49:27', '0000-00-00 00:00:00'),
(44, 7, 1, 3, '2024-05-25 11:49:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'LÁCTEOS', '2024-04-27 01:05:49', '2024-04-27 03:35:27'),
(2, 'PANADERÍA', '2024-04-26 09:02:28', '0000-00-00 00:00:00'),
(3, 'BEBIDAS', '2024-04-26 09:03:51', '0000-00-00 00:00:00'),
(5, 'PERFUMERÍA', '2024-04-26 09:04:58', '0000-00-00 00:00:00'),
(6, 'LIMPIEZA', '2024-04-26 09:11:32', '0000-00-00 00:00:00'),
(11, 'ROPA', '2024-04-26 09:16:12', '0000-00-00 00:00:00'),
(12, 'COMIDA', '2024-04-26 09:17:33', '0000-00-00 00:00:00'),
(13, 'BAZAR', '2024-04-27 05:22:37', '2024-04-27 09:46:01'),
(14, 'VERDULERÍA', '2024-04-27 05:37:15', '0000-00-00 00:00:00'),
(15, 'ELECTRÓNICOS', '2024-04-27 10:07:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `dni_cliente` varchar(255) NOT NULL,
  `celular_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `dni_cliente`, `celular_cliente`, `email_cliente`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'julian mendoza', '4654654', '132121', 'julian@gmail.com', '2024-05-20 22:42:10', '2024-05-20 22:42:10'),
(2, 'julia mamani', '5465465', '987945', 'julia@gmial.com', '2024-05-20 22:42:10', '2024-05-20 22:42:10'),
(49, 'javier bardem', '50632140', '38552698', '', '2024-05-23 09:15:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio_compra` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_compras`
--

INSERT INTO `tb_compras` (`id_compra`, `id_producto`, `nro_compra`, `fecha_compra`, `id_proveedor`, `comprobante`, `id_usuario`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(8, 4, 3, '2024-05-10 00:00:00', 3, 'factura 2-158', 4, '210', 15, '2024-05-09 04:07:43', '0000-00-00 00:00:00'),
(9, 1, 4, '2024-05-10 00:00:00', 3, 'factura 232', 4, '500', 10, '2024-05-10 09:00:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

CREATE TABLE `tb_proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `telefono_empresa` varchar(50) DEFAULT NULL,
  `empresa` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(25) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_proveedores`
--

INSERT INTO `tb_proveedores` (`id_proveedor`, `nombre_proveedor`, `celular`, `telefono_empresa`, `empresa`, `email`, `direccion`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'pedro picapiedras', '123', '456', 'sony', 'pica@gmail.com', 'lejos muy', '2024-04-30 01:00:00', '2024-05-01 11:02:38'),
(3, 'Esteban Quito', '3855069091', '', 'easy', '', 'misky mayu', '2024-05-01 11:54:09', '2024-05-01 12:44:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'ADMINISTRADOR', '2024-04-25 02:20:50', '2024-04-24 10:41:19'),
(2, 'CONTADOR', '2024-04-24 10:10:59', '2024-04-24 10:41:53'),
(3, 'VENDEDOR', '2024-04-25 08:57:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password_user` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombres`, `email`, `password_user`, `token`, `id_rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(4, 'maria hilari', 'hilariweb@gmail.com', '$2y$10$Ekxxx1vwdQPRYGfR8xFx4OZsEwR8wj7JSSzLSv1vpE/I9DBKEjDHu', '', 1, '2024-04-26 03:42:36', '2024-04-26 03:42:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

CREATE TABLE `tb_ventas` (
  `id_ventas` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total_pagado` decimal(10,0) NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  `fyh_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_ventas`
--

INSERT INTO `tb_ventas` (`id_ventas`, `nro_venta`, `id_cliente`, `total_pagado`, `fyh_actualizacion`, `fyh_creacion`) VALUES
(2, 2, 1, 485, '0000-00-00 00:00:00', '2024-05-25 09:23:10'),
(3, 3, 1, 812, '0000-00-00 00:00:00', '2024-05-25 09:26:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `nro_venta` (`nro_venta`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `nro_venta` (`nro_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD CONSTRAINT `tb_almacen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD CONSTRAINT `tb_carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tb_roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD CONSTRAINT `tb_ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_ventas_ibfk_2` FOREIGN KEY (`nro_venta`) REFERENCES `tb_carrito` (`nro_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
