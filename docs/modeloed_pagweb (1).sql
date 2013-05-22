-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-10-2012 a las 18:51:58
-- Versión del servidor: 5.5.25a
-- Versión de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `modeloed_pagweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus`
--

CREATE TABLE IF NOT EXISTS `campus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `campus`
--

INSERT INTO `campus` (`id`, `nombre`) VALUES
(1, 'Estrella del Sur'),
(2, 'San Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campus_id` int(11) NOT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias_campus1` (`campus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `campus_id`, `clave`, `nombre`) VALUES
(1, 1, 'MISION', 'Misión'),
(2, 1, 'ESCUDO', 'El Escudo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `entrada_antecesor_id` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `informacion` text,
  `gallery_photo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entradas_categorias` (`categoria_id`),
  KEY `fk_entradas_entradas1` (`entrada_antecesor_id`),
  KEY `fk_entradas_gallery_photo1` (`gallery_photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `categoria_id`, `entrada_antecesor_id`, `nombre`, `informacion`, `gallery_photo_id`) VALUES
(1, 1, NULL, 'Misión', '"Ser una comunidadeducativa de laicos católicos, comprometidos con la formación integral de líderes socialmente responsables"', 6),
(2, 2, NULL, 'El Escudo', 'Simboliza la lealtad, generosidad, honor y fortaleza.  Era impuesto por el Rey e la edad media y solo se otorgaba a quienes demostraban ser capaces de portar y defendr los colores y blasones que se plasmaban en él.  En nuestro Instituto, hablar del ESCUDO, es representar clara y precísamente nuestra forma de vida, nuestra filosofía y nuestro ideario, los cuales deffenderemos día a día.  Nuestro ESCUDO está conformado por  cuatro cuadrantes azules, divididos por una cruz y sobrepuesta a ella una espada.  En los cuadrantes inferiores se encuetran dibujados los volcanes, en el cuadrante izquierdo, está colocado un libro y del lado derecho una antorcha.', 11),
(3, 2, 2, 'La Cruz', 'Representa la causa por la que fuimos creados y la razón de nuestra existencia, simboliza la fé católica en la que creemos.  Este sublime símbolo, es el que dá sentido a la lucha contra el enemigo, nos otorga la victoria ante el fracaso, convirtiéndonos en hombres que viven la verdad', 8),
(4, 2, 2, 'La Espada', 'Símbolo de la lucha incansable ante la tibieza de la voluntad, nos confirma como guerreros incansables que luchamos por defender y conservar la fortaleza de espíritu.', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_sliders`
--

CREATE TABLE IF NOT EXISTS `entradas_sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrada_id` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entradas_sliders_entradas1` (`entrada_id`),
  KEY `fk_entradas_sliders_sliders1` (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `entradas_sliders`
--

INSERT INTO `entradas_sliders` (`id`, `entrada_id`, `slider_id`) VALUES
(1, 2, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versions_data` text NOT NULL,
  `name` tinyint(1) NOT NULL DEFAULT '1',
  `description` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`id`, `versions_data`, `name`, `description`) VALUES
(1, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(2, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(3, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_photo`
--

CREATE TABLE IF NOT EXISTS `gallery_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gallery_photo_gallery1` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `gallery_photo`
--

INSERT INTO `gallery_photo` (`id`, `gallery_id`, `rank`, `name`, `description`, `file_name`) VALUES
(5, 1, 5, 'antorcha', 'antorcha on.jpg', 'antorcha on.jpg'),
(6, 1, 6, 'Misión', 'mision.jpg', 'mision.jpg'),
(7, 1, 7, 'El Libro', 'el libro on.jpg', 'el libro on.jpg'),
(8, 1, 8, 'La Cruz', 'la cruz on.jpg', 'la cruz on.jpg'),
(9, 1, 9, 'La Espada', 'la espada on.jpg', 'la espada on.jpg'),
(10, 1, 10, 'Volcanes', 'volcanes on.jpg', 'volcanes on.jpg'),
(11, 1, 11, 'Escudo', 'escudo.jpg', 'escudo.jpg'),
(12, 2, 12, 'Penguins.jpg', 'Penguins.jpg', 'Penguins.jpg'),
(13, 2, 13, 'Lighthouse.jpg', 'Lighthouse.jpg', 'Lighthouse.jpg'),
(14, 2, 14, 'Chrysanthemum.jpg', 'Chrysanthemum.jpg', 'Chrysanthemum.jpg'),
(15, 2, 15, 'Desert.jpg', 'Desert.jpg', 'Desert.jpg'),
(16, 2, 16, 'spring-colours.jpg', 'spring-colours.jpg', 'spring-colours.jpg'),
(17, 2, 17, '1263525224815_102.jpg', '1263525224815_102.jpg', '1263525224815_102.jpg'),
(18, 3, 18, 'guitar-wallpaper-4.jpg', 'guitar-wallpaper-4.jpg', 'guitar-wallpaper-4.jpg'),
(19, 3, 19, 'Green Wallpaper (25).jpg', 'Green Wallpaper (25).jpg', 'Green Wallpaper (25).jpg'),
(20, 3, 20, 'funny_sheeps-wallpaper-1440x900.jpg', 'funny_sheeps-wallpaper-1440x900.jpg', 'funny_sheeps-wallpaper-1440x900.jpg'),
(21, 3, 21, 'spring-colours.jpg', 'spring-colours.jpg', 'spring-colours.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `nombre`) VALUES
(2, 'Escudo'),
(3, 'Misión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders_gallery_photo`
--

CREATE TABLE IF NOT EXISTS `sliders_gallery_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NOT NULL,
  `gallery_photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sliders_gallery_photo_sliders1` (`slider_id`),
  KEY `fk_sliders_gallery_photo_gallery_photo1` (`gallery_photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias_campus1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entradas_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entradas_entradas1` FOREIGN KEY (`entrada_antecesor_id`) REFERENCES `entradas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entradas_gallery_photo1` FOREIGN KEY (`gallery_photo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entradas_sliders`
--
ALTER TABLE `entradas_sliders`
  ADD CONSTRAINT `fk_entradas_sliders_entradas1` FOREIGN KEY (`entrada_id`) REFERENCES `entradas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entradas_sliders_sliders1` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gallery_photo`
--
ALTER TABLE `gallery_photo`
  ADD CONSTRAINT `fk_gallery_photo_gallery1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sliders_gallery_photo`
--
ALTER TABLE `sliders_gallery_photo`
  ADD CONSTRAINT `fk_sliders_gallery_photo_gallery_photo1` FOREIGN KEY (`gallery_photo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sliders_gallery_photo_sliders1` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
