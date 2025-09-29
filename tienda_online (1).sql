-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2025 a las 01:57:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagen`, `estado`) VALUES
(1, 'Gorras', 'https://i.pinimg.com/736x/58/7f/9c/587f9ca8fab5c92ac38d77708ea2920c.jpg', 1),
(2, 'Camisas', 'https://images.pexels.com/photos/428338/pexels-photo-428338.jpeg?auto=compress&cs=tinysrgb&h=400', 1),
(3, 'fff', 'asds', 1),
(4, 'Zapatos', 'https://i.pinimg.com/736x/99/21/76/992176e775eb7b233eec0de1ded5e633.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `clave`, `perfil`) VALUES
(1, 'Elvis Gutierrez', 'elvisreyluis@gmail.com', '123', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(80) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `email` varchar(80) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `email_user` varchar(80) NOT NULL,
  `proceso` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `id_categoria`, `estado`) VALUES
(37, 'Gorra Trucker Clásica', 'Gorra estilo trucker con malla trasera y visera plana', 15.99, 50, 'https://i.pinimg.com/736x/a5/0c/d0/a50cd0ecd94153e0e34210e92e90ef0d.jpg', 1, 1),
(38, 'Gorra Snapback Deportiva', 'Gorra snapback con diseño deportivo', 12.49, 40, 'https://i.pinimg.com/1200x/19/45/a8/1945a80d9bb63bed21ba0e22426faef4.jpg', 1, 1),
(39, 'Gorra de Beisbol Clásica', 'Gorra de beisbol con logo bordado', 10.99, 30, 'https://i.pinimg.com/1200x/9a/12/a8/9a12a82011badcd35281d9047dd8cb6d.jpg', 1, 1),
(40, 'Gorra Estilo Militar', 'Gorra con diseño militar', 13.50, 25, 'https://i.pinimg.com/1200x/38/dc/82/38dc82eb6baba506c42ce8432d68c93c.jpg', 1, 1),
(41, 'Camisa de Lino Casual', 'Camisa de lino de manga larga', 20.99, 60, 'https://i.pinimg.com/1200x/e3/cf/d5/e3cfd5f25375c627dc6fdcf981ebd3a9.jpg', 2, 1),
(42, 'Camisa de Manga Corta Estampada', 'Camisa de manga corta con estampado tropical', 18.50, 55, 'https://i.pinimg.com/736x/4d/b4/42/4db442eebc3cd19e5da566c8ca75cb57.jpg', 2, 1),
(43, 'Camisa Oxford Slim Fit', 'Camisa Oxford de corte slim fit', 25.00, 40, 'https://i.pinimg.com/736x/8e/38/58/8e38583f64c15bd922987081584f2766.jpg', 2, 1),
(44, 'Camisa Casual Manga Larga', 'Camisa casual de algodón', 22.75, 35, 'https://i.pinimg.com/1200x/6d/e4/e7/6de4e7fbbde58563013dbdde2b72c873.jpg', 2, 1),
(45, 'Pantalón Vaquero Azul', 'Pantalón de mezclilla azul clásico', 30.99, 50, 'https://i.pinimg.com/1200x/e1/05/06/e1050679dc8d8f2723b827d3f9310b5b.jpg', 3, 1),
(46, 'Pantalón Chino Beige', 'Pantalón chino de algodón beige', 28.50, 40, 'https://i.pinimg.com/1200x/ff/8d/2f/ff8d2f1375771d3ee95b5bcabee555ab.jpg', 3, 1),
(47, 'Pantalón Deportivo Negro', 'Pantalón deportivo cómodo', 25.99, 60, 'https://i.pinimg.com/1200x/d5/53/f7/d553f7cdc4cac4b5069d4619ba01200b.jpg', 3, 1),
(48, 'Pantalón Jogger Gris', 'Pantalón tipo jogger de felpa', 27.75, 35, 'https://i.pinimg.com/736x/24/e9/60/24e96045760adac433bc107722085248.jpg', 3, 1),
(49, 'Zapatillas Deportivas Blancas', 'Zapatillas deportivas de running blancas', 45.99, 50, 'https://i.pinimg.com/1200x/28/fa/6b/28fa6b672067e002ccb2c725762d5eea.jpg', 4, 1),
(50, 'Zapatos de Cuero Marrón', 'Zapatos de vestir de cuero marrón', 60.50, 30, 'https://i.pinimg.com/1200x/40/7e/3c/407e3c765f43cfca59f628d1614624fd.jpg', 4, 1),
(51, 'Botas Negras de Moda', 'Botas negras con estilo urbano', 70.00, 25, 'https://i.pinimg.com/1200x/51/c0/5e/51c05e2c74bbb93c79bab4d1121bc722.jpg', 4, 1),
(52, 'Zapatillas Casual Grises', 'Zapatillas casual cómodas para diario', 50.25, 40, 'https://i.pinimg.com/1200x/00/61/fd/0061fdf09d265c8030fe53d447159a42.jpg', 4, 1),
(53, 'sss', 'asds', 3.00, 2, 'assets/images/productos/default.png', 2, 0),
(54, 'sjjaj', 'asd', 15.99, 50, 'assets/images/productos/default.png', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellido`, `correo`, `clave`, `perfil`, `estado`) VALUES
(1, 'Elvis', 'Gutierrez', 'elvisreyluis@gmail.com', '$2y$10$fs.vj6xCatfm0/OvdSxeYO/FEXUu6.SNPfASJPTHuBckj3GQyNH/i', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
