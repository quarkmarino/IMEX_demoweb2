-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-11-2012 a las 19:25:51
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
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`) VALUES
(1, 'FILE_509d32016defeYiiManual.pdf'),
(2, 'FILE_509d659ac80f1YiiManual.pdf'),
(3, 'FILE_50a69ef31e45fproAdminFormatoIns.pdf'),
(4, 'FILE_50ac10f50d1dffile.txt'),
(5, 'FILE_50ac293069d23file.txt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_area_sensible_id` int(11) DEFAULT NULL,
  `seccion_id` int(11) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `vista_especial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias_menus_areas_sensibles1` (`menu_area_sensible_id`),
  KEY `fk_categorias_secciones1` (`seccion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `menu_area_sensible_id`, `seccion_id`, `clave`, `nombre`, `vista_especial`) VALUES
(1, NULL, NULL, 'QUIENESSOMOS', 'Quienes Somos', NULL),
(2, 10, NULL, 'INFORMACIONGENERAL', 'Información General', NULL),
(3, 2, NULL, 'MISION', 'Misión', NULL),
(4, 3, NULL, 'ESCUDO', 'El Escudo', NULL),
(5, 4, NULL, 'VISION', 'Visión', NULL),
(6, 5, NULL, 'VALORES', 'Valores', NULL),
(7, 1, NULL, 'FILOSOFIA', 'Filosofía', NULL),
(8, 6, NULL, 'HISTORIA', 'Historia', NULL),
(9, 7, NULL, 'UBICACION', 'Ubicación', 1),
(10, NULL, NULL, 'PREESCOLAR', 'Preescolar', NULL),
(11, NULL, NULL, 'PRIMARIA', 'Primaria', NULL),
(12, NULL, NULL, 'SECUNDARIA', 'Secundaria', NULL),
(13, NULL, NULL, 'BACHILLERATO', 'Bachillerato', NULL),
(14, 9, NULL, 'FICHADEINSCRIPCION', 'Ficha de Inscripción', NULL),
(15, 11, NULL, 'EXAMENESDEADMISION', 'EXAMENESDEADMISION', NULL),
(16, 12, NULL, 'ALIANZAS', 'Alianzas', NULL),
(17, NULL, 5, 'PUBLICACIONES', 'Publicaciones', NULL),
(18, 13, NULL, 'OBJETIVO', 'Objetivo', NULL),
(19, 14, NULL, 'REGLAMENTO', 'Reglamento', NULL),
(20, 15, NULL, 'FORMULARIO', 'Formulario Intercambios', NULL),
(21, 16, NULL, 'ORGANISMOSDEINTERCAMBIO', 'Organismos de Intercambio', NULL),
(22, NULL, 8, 'CONTACTO', 'Contacto', 3),
(23, 17, NULL, 'ALIANZASSANPEDRO', 'Alianzas San Pedro', NULL),
(24, NULL, 9, 'PUBLICACIONESSANPEDRO', 'Publicaciones San Pedro', NULL),
(25, 20, NULL, 'OBJETIVO SP', 'Objetivo SP', NULL),
(26, 21, NULL, 'REGLAMENTO SP', 'Reglamento SP', NULL),
(27, 22, NULL, 'FORMULARIO', 'Formulario Intercambios SP', NULL),
(28, 23, NULL, 'ORGANISMOSDEINTERCAMBIO', 'Organismos de Intercambio SP', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_contacto` datetime NOT NULL,
  `asunto` varchar(150) DEFAULT NULL,
  `para` varchar(150) DEFAULT NULL,
  `comentario` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `fecha_contacto`, `asunto`, `para`, `comentario`) VALUES
(1, '2012-11-20 00:00:00', 'ads', 'adfasadfasd', 'asdasdfasdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `entrada_antecesor_id` int(11) DEFAULT NULL,
  `gallery_photo_id` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `informacion` text,
  `tipo_plantilla` enum('A','B','C','D') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entradas_categorias` (`categoria_id`),
  KEY `fk_entradas_entradas1` (`entrada_antecesor_id`),
  KEY `fk_entradas_gallery_photo1` (`gallery_photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `categoria_id`, `entrada_antecesor_id`, `gallery_photo_id`, `nombre`, `informacion`, `tipo_plantilla`) VALUES
(1, 3, NULL, 1, 'Misión', '“Ser reconocidos como la Institución educativa más efectiva en la formación integral de sus educandos, así como la de mejor servicio.”', 'A'),
(2, 4, NULL, 1, 'El Escudo', '<p>El <strong>ESCUDO </strong>simboliza la lealtad, generosidad, honor y fortaleza.&nbsp; Era impuesto por el Rey en la edad media y solo se otorgaba a quienes demostraban ser capaces de portar y defender los colores y blasones que se plasmaban en &eacute;l.</p>\r\n<p>En nuestro Instituto, hablar del <strong>ESCUDO,</strong> es representar clara y precisamente nuestra forma de vida, nuestra filosof&iacute;a y nuestro ideario, los cuales defenderemos d&iacute;a a d&iacute;a.</p>\r\n<p>Nuestro <strong>ESCUDO</strong> est&aacute; conformado por cuatro cuadrantes azules, divididos por una cruz y sobrepuesta a ella una espada.&nbsp; En los cuadrantes inferiores se encuentran dibujados los volcanes, en el cuadrante izquierdo, esta colocado un libro y del lado derecho una antorcha.</p>', 'A'),
(3, 4, 2, 6, 'La Cruz', 'Representa la causa por la que fuimos creados y la razón de nuestra existencia, simboliza la fe católica en la que creemos.\nEste sublime símbolo, es el que da sentido a la lucha contra el enemigo, nos otorga la victoria ante el fracaso, convirtiéndonos en hombres que viven la verdad.', 'A'),
(4, 4, 2, 4, 'La Espada', '<p>La <strong>ESPADA</strong></p>\r\n<p>S&iacute;mbolo de la lucha incansable ante la tibieza de la voluntad, nos confirma como guerreros incansables que luchamos por defender y conservar la fortaleza de esp&iacute;ritu.</p>', 'A'),
(5, 5, NULL, 1, 'Visión', 'VISIÓN \n“Ser reconocidos como la Institución educativa más efectiva en la formación integral de sus educandos, así como la de mejor servicio.”\n', 'A'),
(6, 6, NULL, 1, 'Valores', '<p><strong>Congruencia</strong>: Actuar de acuerdo a la verdad.</p>\r\n<p><strong>Respeto</strong>: Tratar a los dem&aacute;s c&oacute;mo quisieras que te trataran y no da&ntilde;ar tu entorno.</p>\r\n<p><strong>Orden</strong>: Un lugar para cada cosa y cada cosa en su lugar.</p>\r\n<p><strong>Compromiso</strong>: Participar en equipos de trabajo y cumplir la promesa que se hace.</p>\r\n<p><strong>Servicio</strong>: Buscar el bien de nuestros semejantes.</p>', 'A'),
(7, 7, NULL, 1, 'Filosofía', 'FILOSOFÍA   \nEl INSTITUTO MÉXICO cuenta con un conjunto de principios que deben orientar nuestro quehacer educativo a la hora de elaborar proyectos, establecer prioridades y fijar metas, al que denominamos nuestro Ideario. \nEl Ideario contiene una determinada visión del hombre, del mundo, de lo religioso y de la educación, que nos servirá de marco de referencia en nuestro actuar. \nEstos principios iluminan los planes de acción que vamos a desarrollar y plasmar en realidades concretas; son principios que deben ser conocidos, asumidos y vividos responsablemente por todos los miembros de la Comunidad Educativa del Instituto México.\nNos definimos como escuela católica, asumiendo la concepción de hombre, familia, cultura y servicio que de ella se desprenden. \nNuestro propósito es la formación de hombres y mujeres íntegros, amantes de la verdad y forjadores del bien.\nEl INSTITUTO MÉXICO pretende ser una comunidad de vida plena, donde el estudiante no sólo aprenda conocimientos sino también viva valores, ya que concebimos a la educación como el proceso de formación y desarrollo armónico de todas las facultades de la persona, dirigidas hacia la vivencia de valores personales y sociales, ya que el alumno no solo aprende para la escuela sino para la vida.', 'A'),
(8, 8, NULL, 1, 'Historia', '<p><span style="font-size: xx-small; font-family: arial;"><strong>NUESTROS INICIOS &nbsp; </strong></span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">En el a&ntilde;o de <strong>1977</strong>, inquietos padres de familia, buscando una mejor opci&oacute;n educativa que tomara en cuenta la <strong>formaci&oacute;n en la fe cat&oacute;lica</strong>, la formaci&oacute;n <strong>en valores universales</strong>, el <strong>civismo</strong>, la ense&ntilde;anza del <strong>ingl&eacute;s</strong>, la <strong>educaci&oacute;n art&iacute;stica</strong> y <strong>cultural</strong> amplias, el desarrollo del <strong>deporte</strong> y un desde luego un <strong>alto nivel acad&eacute;mico</strong>, deciden agruparse y formar una nueva instituci&oacute;n con un proyecto educativo que desarrolle la formaci&oacute;n integral.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">Meses de trabajo llevaron a definir el ideario, modelo educativo, el <strong>modelo pedag&oacute;gico</strong>, la <strong>organizaci&oacute;n escolar</strong> y los <strong>procesos administrativos</strong>, y una vez terminado este trabajo se abre la inscripci&oacute;n a los alumnos de jard&iacute;n de ni&ntilde;os, primero de primaria y primero de secundaria, con la intensi&oacute;n de formar a los alumnos desde los inicios.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">Pero las expectativas fueron completamente rebasadas y el INSTITUTO M&Eacute;XICO DE PUEBLA abre sus puertas el <strong>5 de septiembre de 1977</strong> con 290 alumnos en 3 grupos de jard&iacute;n de ni&ntilde;os, 12 grupos en la primaria <a title="Powered by Text-Enhance" href="http://www.imex.edu.mx/es/qsInicios.php">completa</a>, 2 grupos de primero de secundaria y un plantel docente de 22 miembros.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">El INSTITUTO M&Eacute;XICO inici&oacute; su trabajo en las instalaciones ubicadas en la<strong> 25 poniente y la 25 sur</strong>. A s&oacute;lo cuatro a&ntilde;os de haber iniciado, estas instalaciones fueron insuficientes y con el apoyo de toda la comunidad educativa se proyecta la construcci&oacute;n de un nuevo campus.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">En el a&ntilde;o de <strong>1980</strong> se coloca la primera piedra del <strong>campus Estrella del Sur</strong>, ubicado en la 49 poniente 5102.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">Para <strong>1983</strong> el INSTITUTO M&Eacute;XICO DE PUEBLA se muda a sus <strong>nuevas instalaciones</strong> con apoyo de alumnos, maestros y padres de familia.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">Para ese entonces se contaba con el <strong>jard&iacute;n de ni&ntilde;os</strong>, la <strong>primaria</strong>, la <strong>secundaria</strong> y la <strong>preparatoria</strong>completos, una poblaci&oacute;n de poco m&aacute;s de 500 alumnos.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">En <strong>10 a&ntilde;os</strong> el INSTITUTO M&Eacute;XICO DE PUEBLA duplica su poblaci&oacute;n ya que se ha convertido en una de las <strong>mejores</strong> instituciones educativas de Puebla, cubriendo con las expectativas de formaci&oacute;n acad&eacute;mica y de valores entre sus alumnos.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">Es en este periodo cuando el INSTITUTO M&Eacute;XICO alcanza una poblaci&oacute;n de <strong>2,300</strong> alumnos y una vez m&aacute;s es necesario crecer.</span></p>\r\n<p><span style="font-size: xx-small; font-family: arial;">Al d&iacute;a de hoy se est&aacute; construyendo un <strong>nuevo Campus</strong>, ubicado en <strong>Camino Real a Cholula No. 4232</strong>, el cual ya ofrece los servicios del <strong>preescolar,primaria, secundaria y bachillerato</strong>.</span></p>', 'A'),
(9, 4, 2, 3, 'Los Volcanes', '<p>Los <strong>VOLCANES</strong></p>\r\n<p>Son los guardianes eternos de nuestra ciudad y nos recuerdan diariamente que la conquista de la cima es nuestro ideal, se forma s&oacute;lo con una&nbsp; voluntad f&eacute;rrea capaz de vencer&nbsp; todos los obst&aacute;culos y de escalar tan alto como lo deseamos.</p>', 'A'),
(10, 4, 2, 4, 'El Libro', '<p>El <strong>LIBRO</strong></p>\r\n<p>Nos da siempre la verdad y certeza, permiti&eacute;ndonos ver con claridad hacia donde vamos y de esta forma alcanzar la libertad deseada.</p>', 'A'),
(11, 4, 2, 2, 'La Antorcha', '<p>La <strong>ANTORCHA</strong></p>\r\n<p>Simboliza nuestro coraz&oacute;n dispuesto a caminar cumpliendo con la misi&oacute;n para la que fuimos creados: el amor intenso a Dios en nuestro pr&oacute;jimo.</p>', 'A'),
(16, 2, NULL, 1, 'Información General', 'Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id', 'A'),
(18, 15, NULL, 1, 'Fechas de Exámenes', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;"></strong></p>\r\n<h1 style="line-height: 22px; font-size: 1em; margin: 0px; padding: 0px; color: #333333; font-family: Georgia, ''Times New Roman'', Times, serif; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">Periodo de atenci&oacute;n</h1>\r\n<p>&nbsp;</p>\r\n<table style="line-height: 22px; color: #333333; font-family: Georgia,''Times New Roman'',Times,serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: #ffffff; width: 90%;" border="1" cellspacing="0">\r\n<tbody style="line-height: inherit;">\r\n<tr class="enc" style="line-height: inherit;"><th style="line-height: inherit; font-size: 1em;" bgcolor="#CCCCCC">LETRA DEL PRIMER APELLIDO</th><th style="line-height: inherit; font-size: 1em;" bgcolor="#CCCCCC">PREESCOLAR</th><th style="line-height: inherit; font-size: 1em;" bgcolor="#CCCCCC">PRIMARIA</th><th style="line-height: inherit; font-size: 1em;" bgcolor="#CCCCCC">SECUNDARIA</th></tr>\r\n<tr class="bc1" style="line-height: inherit;">\r\n<td style="line-height: inherit; font-size: 1em;">A-B-C-CH-D</td>\r\n<td style="line-height: inherit; font-size: 1em;">30 y 31 de enero</td>\r\n<td style="line-height: inherit; font-size: 1em;">13 y 14 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">27 y 28 de febrero</td>\r\n</tr>\r\n<tr class="bc2" style="line-height: inherit;">\r\n<td style="line-height: inherit; font-size: 1em;">E-F-G-H-I</td>\r\n<td style="line-height: inherit; font-size: 1em;">1 y 2 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">15 y 16 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">29 de febrero y 1 de marzo</td>\r\n</tr>\r\n<tr class="bc1" style="line-height: inherit;">\r\n<td style="line-height: inherit; font-size: 1em;">J-K-L-LL-M</td>\r\n<td style="line-height: inherit; font-size: 1em;">3 y 6 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">17 y 20 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">2 y 5 de marzo</td>\r\n</tr>\r\n<tr class="bc2" style="line-height: inherit;">\r\n<td style="line-height: inherit; font-size: 1em;">N-&Ntilde;-O-P-Q-R-S</td>\r\n<td style="line-height: inherit; font-size: 1em;">7 y 8 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">21 y 22 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">6 y 7 de marzo</td>\r\n</tr>\r\n<tr class="bc1" style="line-height: inherit;">\r\n<td style="line-height: inherit; font-size: 1em;">T-U-V-W-X-Y-Z</td>\r\n<td style="line-height: inherit; font-size: 1em;">9 y 10 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">23 y 24 de febrero</td>\r\n<td style="line-height: inherit; font-size: 1em;">8 y 9 de marzo</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<h1 style="line-height: 22px; font-size: 1em; margin: 0px; padding: 0px; color: #333333; font-family: Georgia, ''Times New Roman'', Times, serif; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">II.-Requisitos</h1>\r\n<p>&nbsp;</p>', NULL),
(19, 14, NULL, 1, 'Ficha de Inscripción', '<p>Descargue el Formato de inscripci&oacute;n</p>', NULL),
(20, 10, NULL, 1, 'Prescolar', '<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">La<span class="Apple-converted-space">&nbsp;</span><strong>educaci&oacute;n infantil temprana</strong><span class="Apple-converted-space">&nbsp;</span>es el nombre que recibe el ciclo de estudios previos a la<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Educaci&oacute;n primaria" href="http://es.wikipedia.org/wiki/Educaci%C3%B3n_primaria">educaci&oacute;n primaria</a><span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Educaci&oacute;n obligatoria" href="http://es.wikipedia.org/wiki/Educaci%C3%B3n_obligatoria">obligatoria</a><span class="Apple-converted-space">&nbsp;</span>establecida en muchas partes del mundo hispanoamericano. En algunos lugares, es parte del sistema formal de educaci&oacute;n y en otros es un centro de cuidado o<span class="Apple-converted-space">&nbsp;</span><a class="mw-redirect" style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Jard&iacute;n de infancia" href="http://es.wikipedia.org/wiki/Jard%C3%ADn_de_infancia">jard&iacute;n de infancia</a><span class="Apple-converted-space">&nbsp;</span>y cubre la edad de 0 a 6 a&ntilde;os.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">Esta<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Instituci&oacute;n" href="http://es.wikipedia.org/wiki/Instituci%C3%B3n">instituci&oacute;n</a><span class="Apple-converted-space">&nbsp;</span>establecida se le conoce de diversas formas, si forma parte del sistema educativo, se denomina escuela infantil, en caso contrario, tiene varios nombres:<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Guarder&iacute;a" href="http://es.wikipedia.org/wiki/Guarder%C3%ADa">guarder&iacute;a</a>, jard&iacute;n de infancia, jard&iacute;n infantil, parvulario, k&iacute;nder,<span class="Apple-converted-space">&nbsp;</span><em>kindergarten</em>, jard&iacute;n de infantes, etc.</p>', NULL),
(21, 11, NULL, 1, 'Primaria', 'La educación primaria (también conocida como educación básica, enseñanza básica, enseñanza elemental, estudios básicos o estudios primarios) es la que asegura la correcta alfabetización, es decir, que enseña a leer, escribir, cálculo básico y algunos de los conceptos culturales considerados imprescindibles. Su finalidad es proporcionar a todos los alumnos una formación común que haga posible el desarrollo de las capacidades individuales motrices, de equilibrio personal; de relación y de actuación social con la adquisición de los elementos básicos culturales; los aprendizajes relativos mencionados anteriormente.\r\nLa educación primaria, también conocida como la educación elemental, es la primera de seis años establecidos y estructurados de la educación que se produce a partir de la edad de entre cinco y seis años hasta aproximadamente los 12 años de edad. La mayoría de los países exigen que los niños reciban educación primaria y en muchos, es aceptable para los padres disponer de la base del plan de estudios aprobado.', NULL),
(22, 12, NULL, 1, 'Secundaria', '<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">La ''<em>educaci&oacute;n secundaria</em><span class="Apple-converted-space">&nbsp;</span>tiene como objetivo capacitar al alumno para proseguir<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Educaci&oacute;n superior" href="http://es.wikipedia.org/wiki/Educaci%C3%B3n_superior">estudios superiores</a><span class="Apple-converted-space">&nbsp;</span>o bien para incorporarse al<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Formaci&oacute;n profesional" href="http://es.wikipedia.org/wiki/Formaci%C3%B3n_profesional">mundo laboral</a>. Al terminar la educaci&oacute;n secundaria se pretende que el alumno desarrolle las suficientes habilidades, valores y actitudes para lograr un buen desenvolvimiento en la sociedad. En particular, la ense&ntilde;anza secundaria debe brindar formaci&oacute;n b&aacute;sica para responder al fen&oacute;meno de la universalizaci&oacute;n de la matr&iacute;cula; preparar para la universidad pensando en quienes aspiran y pueden continuar sus estudios; preparar para el mundo del trabajo a los que no siguen estudiando y desean o necesitan incorporarse a la vida laboral; y formar la personalidad integral de los j&oacute;venes, con especial atenci&oacute;n en los aspectos relacionados con el desempe&ntilde;o ciudadano.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">Puede ser una educaci&oacute;n secundaria com&uacute;n para todos los alumnos o diversificada en v&iacute;as formativas seg&uacute;n las salidas posteriores. Las modalidades, a la vez, pueden tener diversas especializaciones y orientaciones que permiten formarse en temas espec&iacute;ficos. Por ejemplo, en la<span class="Apple-converted-space">&nbsp;</span><a class="new" style="text-decoration: initial; color: #a55858; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Educaci&oacute;n t&eacute;cnico profesional (a&uacute;n no redactado)" href="http://es.wikipedia.org/w/index.php?title=Educaci%C3%B3n_t%C3%A9cnico_profesional&amp;action=edit&amp;redlink=1">educaci&oacute;n t&eacute;cnico profesional</a><span class="Apple-converted-space">&nbsp;</span>se prepara mayoritariamente para el trabajo despu&eacute;s de abandonar la escuela secundaria, en esta modalidad se entrena al alumno para que aprenda una carrera t&eacute;cnica o industrial.</p>', NULL),
(23, 13, NULL, 1, 'Bachillerato', '<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">El<span class="Apple-converted-space">&nbsp;</span><strong>bachillerato</strong><span class="Apple-converted-space">&nbsp;</span>es un ciclo de estudios con el que se obtiene el grado de<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Bachiller" href="http://es.wikipedia.org/wiki/Bachiller">bachiller</a>.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">El bachillerato tiene un car&aacute;cter obligatorio en algunos pa&iacute;ses, ya que sin &eacute;l no se puede conseguir un empleo econ&oacute;micamente bien definido, aunque en la mayor&iacute;a de los pa&iacute;ses no es as&iacute;. Las asignaturas que se imparten son m&aacute;s especializadas que en la secundaria, es decir, est&aacute;n encaminadas a las ciencias, a las letras o a las artes (cada uno de las tres tiene tres asignaturas de modalidad espec&iacute;ficas, las dem&aacute;s son todas comunes). El objetivo del bachillerato es preparar acad&eacute;micamente al alumno para que pueda realizar estudios superiores.</p>\r\n<p style="margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;">En algunos pa&iacute;ses hispanoamericanos, el t&eacute;rmino<span class="Apple-converted-space">&nbsp;</span><em>bachillerato</em><span class="Apple-converted-space">&nbsp;</span>se utiliza para referirse al<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="T&iacute;tulo de grado" href="http://es.wikipedia.org/wiki/T%C3%ADtulo_de_grado">t&iacute;tulo de grado</a><span class="Apple-converted-space">&nbsp;</span>universitario llamado en<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Idioma ingl&eacute;s" href="http://es.wikipedia.org/wiki/Idioma_ingl%C3%A9s">ingl&eacute;s</a><span class="Apple-converted-space">&nbsp;</span><em>Bachelor&rsquo;s degree</em>. Para Europa ver<span class="Apple-converted-space">&nbsp;</span><a style="text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Proceso de Bolonia" href="http://es.wikipedia.org/wiki/Proceso_de_Bolonia">Proceso de Bolonia</a>.</p>', NULL),
(24, 16, NULL, 1, 'Alianza Principal', '<p>Alianzas</p>', NULL),
(25, 16, 24, 1, 'Universidades', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(26, 16, 24, 1, 'Preescolares', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Preescolares<br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(27, 16, 24, 1, 'Organismos', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;"><span style="font-size: small;">Organismos</span><br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(28, 17, NULL, 1, 'Publicaciones', '', NULL),
(29, 18, NULL, 1, 'Objetivo', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;"><span style="font-size: medium;">Objetivo</span><br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(30, 19, NULL, 1, 'Reglamento', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;"><span style="font-size: medium;">Reglamento</span><br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(31, 20, NULL, 1, 'Formulario Intercambios', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Formulario<br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(32, 21, NULL, 1, 'Organismos de Intercambio', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;"><span style="font-size: medium;">Organismos de Intercambio</span><br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(33, 23, 36, 1, 'Universidades', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Universidades<br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(34, 23, 36, 1, 'Preescolar', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;"><span style="font-size: medium;">Preescolar</span><br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(35, 23, 36, 1, 'Organismos', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;"><span style="font-size: medium;">Organismos</span><br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(36, 23, NULL, 1, 'Alianza Principal San Pedro', '<p>Alianzas</p>', NULL),
(37, 24, NULL, 1, 'Publicaciones San Pedro', '<p><span style="font-size: medium;"><strong>Publicaciones</strong></span></p>', NULL),
(38, 28, NULL, 1, 'Organismos de Intercambio', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(39, 26, NULL, 1, 'Reglamento', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Reglamento<br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(40, 27, NULL, 1, 'Formulario Intercambios', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Formulario de Intercambios<br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL);
INSERT INTO `entradas` (`id`, `categoria_id`, `entrada_antecesor_id`, `gallery_photo_id`, `nombre`, `informacion`, `tipo_plantilla`) VALUES
(41, 28, NULL, 1, 'Organismos de Intercambio', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Organismos de Intercambio<br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL),
(42, 25, NULL, 1, 'Objetivo', '<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;"><span style="font-size: medium;">Objetivo</span><br /></strong></p>\r\n<p><strong style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">Lorem Ipsum</strong><span style="color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><span class="Apple-converted-space">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_archivos`
--

CREATE TABLE IF NOT EXISTS `entradas_archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrada_id` int(11) NOT NULL,
  `archivo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entradas_archivos_archivos1` (`archivo_id`),
  KEY `fk_entradas_archivos_entradas1` (`entrada_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `entradas_archivos`
--

INSERT INTO `entradas_archivos` (`id`, `entrada_id`, `archivo_id`) VALUES
(2, 16, 2),
(3, 19, 3),
(4, 28, 4),
(5, 37, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `entradas_sliders`
--

INSERT INTO `entradas_sliders` (`id`, `entrada_id`, `slider_id`) VALUES
(11, 1, 2),
(12, 2, 2),
(13, 3, 2),
(14, 4, 2),
(15, 9, 2),
(16, 10, 2),
(17, 11, 2),
(18, 5, 2),
(19, 6, 2),
(20, 7, 2),
(21, 8, 2),
(26, 16, 2),
(28, 18, 2),
(29, 19, 2),
(30, 20, 2),
(31, 21, 2),
(32, 22, 2),
(33, 23, 2),
(34, 24, 2),
(35, 25, 2),
(36, 26, 2),
(37, 27, 2),
(38, 29, 2),
(39, 30, 2),
(40, 31, 2),
(41, 32, 2),
(42, 33, 2),
(43, 34, 2),
(44, 35, 2),
(45, 36, 2),
(46, 37, 2),
(47, 38, 2),
(48, 39, 2),
(49, 40, 2),
(50, 41, 2),
(51, 42, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`id`, `versions_data`, `name`, `description`) VALUES
(1, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(2, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(3, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(4, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(5, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(6, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(7, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(8, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(9, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(10, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(12, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(13, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1),
(14, 'a:2:{s:5:"small";a:1:{s:6:"resize";a:2:{i:0;i:200;i:1;N;}}s:6:"medium";a:1:{s:6:"resize";a:2:{i:0;i:800;i:1;N;}}}', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `gallery_photo`
--

INSERT INTO `gallery_photo` (`id`, `gallery_id`, `rank`, `name`, `description`, `file_name`) VALUES
(1, 1, 1, '6.jpg', '6.jpg', '6.jpg'),
(2, 1, 2, 'antorcha on.jpg', 'antorcha on.jpg', 'antorcha on.jpg'),
(3, 1, 3, 'volcanes on.jpg', 'volcanes on.jpg', 'volcanes on.jpg'),
(4, 1, 4, 'el libro on.jpg', 'el libro on.jpg', 'el libro on.jpg'),
(5, 1, 5, 'mision.jpg', 'mision.jpg', 'mision.jpg'),
(6, 1, 6, 'LA CRUZ', 'la cruz on.jpg', 'la cruz on.jpg'),
(7, 1, 7, 'la espada on.jpg', 'la espada on.jpg', 'la espada on.jpg'),
(8, 2, 8, 'funny_sheeps-t2.jpg', 'funny_sheeps-t2.jpg', 'funny_sheeps-t2.jpg'),
(9, 2, 10, 'Rana René', 'Rana René', '1263525224815_102.jpg'),
(10, 2, 9, 'Desierto', 'Desierto', 'Desert.jpg'),
(11, 2, 11, 'guitar-wallpaper-4.jpg', 'guitar-wallpaper-4.jpg', 'guitar-wallpaper-4.jpg'),
(12, 2, 12, 'Green Wallpaper (25).jpg', 'Green Wallpaper (25).jpg', 'Green Wallpaper (25).jpg'),
(13, 1, 13, 'botonexalumnos', 'botonexalumnos', 'botonexalumnos.jpg'),
(14, 1, 14, 'botonadmisiones', 'botonadmisiones', 'botonadmisiones.jpg'),
(15, 1, 15, 'botoncomunidadimexactivo', 'botoncomunidadimexactivo', 'botoncomunidadimexactivo.jpg'),
(16, 1, 16, 'botonexalumnosactivo', 'botonexalumnosactivo', 'botonexalumnosactivo.jpg'),
(17, 1, 17, 'botonadmisionesactivo', 'botonadmisionesactivo', 'botonadmisionesactivo.jpg'),
(18, 1, 18, 'botoncomunidadimex', 'botoncomunidadimex', 'botoncomunidadimex.jpg'),
(19, 1, 19, 'botonquienessomos', 'botonquienessomos', 'botonquienessomos.jpg'),
(20, 1, 20, 'botonquienessomosactivo', 'botonquienessomosactivo', 'botonquienessomosactivo.jpg'),
(21, 3, 24, '2x24', '2x24', '2x24.jpg'),
(22, 3, 23, '2x23', '2x23', '2x23.jpg'),
(23, 3, 22, '2x22', '2x22', '2x22.jpg'),
(24, 3, 21, '2x21', '2x21', '2x21.jpg'),
(29, 5, 31, '4x33', '4x33', '4x33.jpg'),
(30, 5, 29, '4x31', '4x31', '4x31.jpg'),
(31, 5, 32, '4x34', '4x34', '4x34.jpg'),
(32, 5, 30, '4x32', '4x32', '4x32.jpg'),
(33, 6, 34, '2x12', '2x12', '2x12.jpg'),
(34, 6, 35, '2x13', '2x13', '2x13.jpg'),
(35, 6, 36, '2x14', '2x14', '2x14.jpg'),
(36, 6, 33, '2x11', '2x11', '2x11.jpg'),
(37, 4, 39, '3x13', '3x13', '3x13.jpg'),
(38, 4, 38, '3x12', '3x12', '3x12.jpg'),
(39, 4, 40, '3x14', '3x14', '3x14.jpg'),
(40, 4, 37, '3x11', '3x11', '3x11.jpg'),
(41, 1, 41, 'QuienesSomosArea2', 'QuienesSomosArea2', '3x11activo.jpg'),
(42, 1, 42, 'QuienesSomosArea1', 'QuienesSomosArea1', '2x21activo.jpg'),
(43, 1, 43, 'QuienesSomosArea4', 'QuienesSomosArea4', '2x11activo.jpg'),
(44, 1, 44, 'QuienesSomosArea3', 'QuienesSomosArea3', '4x31activo.jpg'),
(45, 1, 45, 'menuAdmisionesArea1', 'menuAdmisionesArea1', '2x22activo.jpg'),
(46, 1, 46, 'menuAdmisionesArea2', 'menuAdmisionesArea2', '3x12activo.jpg'),
(47, 1, 47, 'menuAdmisionesArea3', 'menuAdmisionesArea3', '4x32activo.jpg'),
(48, 1, 48, 'menuAdmisionesArea4', 'menuAdmisionesArea4', '2x12activo.jpg'),
(49, 1, 49, 'botonSeccionIntercambiosActivo', 'botonSeccionIntercambiosActivo', 'botonSeccionIntercambiosActivo.jpg'),
(50, 1, 50, 'botonSeccionContacto', 'botonSeccionContacto', 'botonSeccionContacto.jpg'),
(51, 1, 51, 'botonSeccionPublicacionesActivo', 'botonSeccionPublicacionesActivo', 'botonSeccionPublicacionesActivo.jpg'),
(52, 1, 52, 'botonSeccionIntercambios', 'botonSeccionIntercambios', 'botonSeccionIntercambios.jpg'),
(53, 1, 53, 'botonSeccionPublicaciones', 'botonSeccionPublicaciones', 'botonSeccionPublicaciones.jpg'),
(54, 1, 54, 'botonSeccionContactoActivo', 'botonSeccionContactoActivo', 'botonSeccionContactoActivo.jpg'),
(59, 10, 59, '2x1Alianzas', '2x1Alianzas', '2x1Alianzas.jpg'),
(60, 7, 60, '2x2estrella', '2x2estrella', '2x23.jpg'),
(62, 9, 62, '4x3estrella', '4x3estrella', '4x31.jpg'),
(63, 8, 63, '3x1estrella', '3x1estrella', '3x11.jpg'),
(64, 1, 64, 'menuIntercambios', 'menuIntercambios', 'menuIntercambios.jpg'),
(65, 1, 65, '2x21', '2x21', '2x21.jpg'),
(66, 1, 66, '3x11', '3x11', '3x11.jpg'),
(67, 1, 67, '2x11', '2x11', '2x11.jpg'),
(68, 12, 68, '3x12.jpg', '3x12.jpg', '3x12.jpg'),
(69, 13, 69, '4x32.jpg', '4x32.jpg', '4x32.jpg'),
(71, 14, 71, '2x12Alianzas.jpg', '2x12Alianzas.jpg', '2x12Alianzas.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `index_sliders`
--

CREATE TABLE IF NOT EXISTS `index_sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `portada_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_index_sliders_sliders1` (`slider_id`),
  KEY `fk_index_sliders_portadas1` (`portada_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `index_sliders`
--

INSERT INTO `index_sliders` (`id`, `slider_id`, `area`, `portada_id`) VALUES
(1, 3, 1, 1),
(2, 4, 2, 1),
(3, 5, 3, 1),
(4, 6, 4, 1),
(5, 2, 1, 2),
(6, 8, 2, 2),
(7, 9, 3, 2),
(8, 10, 4, 2),
(9, 2, 1, 3),
(10, 12, 2, 3),
(11, 13, 3, 3),
(12, 14, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seccion_id` int(11) NOT NULL,
  `gallery_photo_id` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menus_secciones1` (`seccion_id`),
  KEY `fk_menus_gallery_photo1` (`gallery_photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `seccion_id`, `gallery_photo_id`, `area`) VALUES
(1, 1, 42, 1),
(2, 1, 41, 2),
(3, 1, 44, 3),
(4, 1, 43, 4),
(5, 2, 45, 1),
(6, 2, 46, 2),
(7, 2, 47, 3),
(8, 2, 48, 4),
(9, 6, 64, 3),
(10, 6, 65, 1),
(11, 6, 66, 2),
(12, 6, 67, 4),
(13, 10, 65, 1),
(14, 10, 66, 2),
(15, 10, 64, 3),
(16, 10, 67, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus_areas_sensibles`
--

CREATE TABLE IF NOT EXISTS `menus_areas_sensibles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `index_slider_id` int(11) DEFAULT NULL,
  `x1` int(11) DEFAULT NULL,
  `x2` int(11) DEFAULT NULL,
  `y1` int(11) DEFAULT NULL,
  `y2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menus_areas_sensibles_menus1` (`menu_id`),
  KEY `fk_menus_areas_sensibles_index_sliders1` (`index_slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `menus_areas_sensibles`
--

INSERT INTO `menus_areas_sensibles` (`id`, `menu_id`, `index_slider_id`, `x1`, `x2`, `y1`, `y2`) VALUES
(1, 1, NULL, 128, 247, 2, 117),
(2, 2, NULL, 127, 248, 2, 118),
(3, 3, NULL, 385, 507, 126, 244),
(4, 3, NULL, 1, 121, 0, 118),
(5, 3, NULL, 257, 377, 0, 117),
(6, 3, NULL, 128, 247, 126, 246),
(7, 3, NULL, 3, 122, 253, 370),
(8, 4, NULL, NULL, NULL, NULL, NULL),
(9, 5, NULL, 129, 252, 127, 244),
(10, 7, NULL, 2, 120, 126, 245),
(11, 8, NULL, 0, 119, 0, 117),
(12, NULL, 8, 130, 245, 4, 116),
(13, 9, NULL, 128, 247, 2, 118),
(14, 9, NULL, 0, 118, 126, 245),
(15, 9, NULL, 386, 503, 126, 244),
(16, 9, NULL, 257, 376, 253, 368),
(17, NULL, 12, 130, 245, 4, 116),
(20, 15, NULL, 128, 247, 2, 118),
(21, 15, NULL, 0, 126, 118, 245),
(22, 15, NULL, 386, 503, 126, 244),
(23, 15, NULL, 257, 376, 253, 368);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portadas`
--

CREATE TABLE IF NOT EXISTS `portadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `portadas`
--

INSERT INTO `portadas` (`id`, `nombre`) VALUES
(1, 'Index'),
(2, 'Campus Estrella del Sur'),
(3, 'Campus San Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portada_id` int(11) DEFAULT NULL,
  `imagen_boton_id` int(11) NOT NULL,
  `imagen_boton_activo_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `vista_especial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_secciones_gallery_photo1` (`imagen_boton_id`),
  KEY `fk_secciones_gallery_photo2` (`imagen_boton_activo_id`),
  KEY `fk_secciones_portadas1` (`portada_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `portada_id`, `imagen_boton_id`, `imagen_boton_activo_id`, `nombre`, `orden`, `vista_especial`) VALUES
(1, 1, 19, 20, '¿Quienes Somos?', 1, NULL),
(2, 1, 14, 17, 'Admisiones', 2, NULL),
(3, 1, 13, 16, 'Ex Alumnos', 3, 2),
(4, 1, 18, 15, 'Comunidad Imex', 4, NULL),
(5, 2, 53, 51, 'Pubicaciones', 1, NULL),
(6, 2, 52, 49, 'Intercambios', 2, NULL),
(7, 2, 18, 15, 'Comunidad Imex', 3, NULL),
(8, 2, 50, 54, 'Contacto', 4, 3),
(9, 3, 53, 51, 'Pubicaciones', 1, NULL),
(10, 3, 52, 49, 'Intercambios', 2, NULL),
(11, 3, 18, 15, 'Comunidad Imex', 3, NULL),
(12, 3, 50, 54, 'Contacto', 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `nombre`) VALUES
(2, 'Slider de Muestra'),
(3, 'IndexArea1'),
(4, 'IndexArea2'),
(5, 'IndexArea3'),
(6, 'IndexArea4'),
(7, 'estrellaDelSurArea1'),
(8, 'estrellaDelSurArea2'),
(9, 'estrellaDelSurArea3'),
(10, 'estrellaDelSurArea4'),
(11, 'sanPedroArea1'),
(12, 'sanPedroArea2'),
(13, 'sanPedroArea3'),
(14, 'sanPedroArea4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_de_usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `calle_y_numero` varchar(150) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `correo_electronico` varchar(150) DEFAULT NULL,
  `generacion` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `empresa` varchar(150) DEFAULT NULL,
  `codigo_de_seguridad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_de_usuario`, `password`, `nombre`, `apellido_paterno`, `apellido_materno`, `calle_y_numero`, `colonia`, `codigo_postal`, `ciudad`, `estado`, `telefono`, `celular`, `correo_electronico`, `generacion`, `puesto`, `empresa`, `codigo_de_seguridad`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias_secciones1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categorias_menus_areas_sensibles1` FOREIGN KEY (`menu_area_sensible_id`) REFERENCES `menus_areas_sensibles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entradas_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entradas_entradas1` FOREIGN KEY (`entrada_antecesor_id`) REFERENCES `entradas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entradas_gallery_photo1` FOREIGN KEY (`gallery_photo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entradas_archivos`
--
ALTER TABLE `entradas_archivos`
  ADD CONSTRAINT `fk_entradas_archivos_archivos1` FOREIGN KEY (`archivo_id`) REFERENCES `archivos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entradas_archivos_entradas1` FOREIGN KEY (`entrada_id`) REFERENCES `entradas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `index_sliders`
--
ALTER TABLE `index_sliders`
  ADD CONSTRAINT `fk_index_sliders_portadas1` FOREIGN KEY (`portada_id`) REFERENCES `portadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_index_sliders_sliders1` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `fk_menus_gallery_photo1` FOREIGN KEY (`gallery_photo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menus_secciones1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menus_areas_sensibles`
--
ALTER TABLE `menus_areas_sensibles`
  ADD CONSTRAINT `fk_menus_areas_sensibles_menus1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menus_areas_sensibles_index_sliders1` FOREIGN KEY (`index_slider_id`) REFERENCES `index_sliders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `fk_secciones_gallery_photo1` FOREIGN KEY (`imagen_boton_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_secciones_gallery_photo2` FOREIGN KEY (`imagen_boton_activo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_secciones_portadas1` FOREIGN KEY (`portada_id`) REFERENCES `portadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
