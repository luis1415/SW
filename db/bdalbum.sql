-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2016 a las 16:58:31
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdalbum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_albumes`
--

CREATE TABLE `tbl_albumes` (
  `id` int(11) NOT NULL,
  `name` varchar(48) NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_albumes`
--

INSERT INTO `tbl_albumes` (`id`, `name`, `description`, `id_user`) VALUES
(1, 'imagenes', 'imagenes ', 2),
(2, 'album2', 'segundo', 2),
(3, 'albumh', 'humberto', 3),
(4, 'Game of thrones', 'vacio', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_albumes_images`
--

CREATE TABLE `tbl_albumes_images` (
  `fk_album` int(11) NOT NULL,
  `fk_image` int(11) NOT NULL,
  `orden_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_albumes_images`
--

INSERT INTO `tbl_albumes_images` (`fk_album`, `fk_image`, `orden_image`) VALUES
(1, 17, 11),
(1, 19, 13),
(2, 1, 1),
(2, 2, 9),
(3, 18, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  `title` varchar(48) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `photo`, `description`, `title`, `comments`) VALUES
(1, '../uploads/captacion.png', 'layout 1', 'Captacion', ''),
(2, '../uploads/stark.jpg', 'lobo stark', 'stark', ''),
(3, '../uploads/stark.jpg', 'lobo stark', 'stark', ''),
(4, '../uploads/stark.jpg', 'lobo stark', 'stark', ''),
(5, '../uploads/captacion.png', 'Layout', 'Captacion', ''),
(6, '../uploads/captacion.png', 'Layout', 'Captacion', ''),
(7, '../uploads/captacion.png', 'Casita', 'Captacion', ''),
(8, '../uploads/captacion.png', 'Casita', 'Captacion', ''),
(9, '../uploads/captacion.png', 'Casitas', 'Captacion', ''),
(10, '../uploads/captacion.png', 'Casita', 'Captacion', ''),
(11, '../uploads/captacion.png', 'casa2', 'captacion2', ''),
(12, '../uploads/captacion.png', 'casa2', 'casa', ''),
(13, '../uploads/captacion.png', 'Casita', 'Captacion', ''),
(14, '../uploads/captacion.png', 'Casita', 'Captacion', ''),
(15, '../uploads/captacion.png', 'paseo uno', 'Casa', ''),
(16, '../uploads/captacion.png', 'Casita', 'Captacion2', ''),
(17, '../uploads/stark.jpg', 'descripcion', 'stark1', ''),
(18, '../uploads/stark.jpg', 'luis', 'luis', ''),
(19, '../uploads/captacion.png', 'layout 1', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persons`
--

CREATE TABLE `tbl_persons` (
  `id` int(11) NOT NULL,
  `name` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_persons`
--

INSERT INTO `tbl_persons` (`id`, `name`) VALUES
(1, 'luis'),
(2, 'luis'),
(3, 'humberto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `nickname` varchar(48) NOT NULL,
  `avatar` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `id_person`, `nickname`, `avatar`, `password`, `role`) VALUES
(1, 2, 'user', '', 'pass', 0),
(2, 0, 'luis', 'nulo', 'luis', 0),
(3, 0, 'humberto', 'nulo', 'humberto', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_albumes`
--
ALTER TABLE `tbl_albumes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_albumes_images`
--
ALTER TABLE `tbl_albumes_images`
  ADD PRIMARY KEY (`fk_album`,`fk_image`,`orden_image`),
  ADD UNIQUE KEY `orden_image` (`orden_image`);

--
-- Indices de la tabla `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_persons`
--
ALTER TABLE `tbl_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_albumes`
--
ALTER TABLE `tbl_albumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_albumes_images`
--
ALTER TABLE `tbl_albumes_images`
  MODIFY `orden_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tbl_persons`
--
ALTER TABLE `tbl_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
