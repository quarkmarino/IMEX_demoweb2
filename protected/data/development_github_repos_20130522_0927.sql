-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.68-cll


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema modeloed_pagweb_dev
--

CREATE DATABASE IF NOT EXISTS modeloed_pagweb_dev;
USE modeloed_pagweb_dev;

--
-- Definition of table `modeloed_pagweb_dev`.`archivos`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`archivos`;
CREATE TABLE  `modeloed_pagweb_dev`.`archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`archivos`
--

/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
LOCK TABLES `archivos` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`archivos` VALUES  (1,'FILE_509d32016defeYiiManual.pdf'),
 (4,'FILE_50ac10f50d1dffile.txt'),
 (5,'FILE_50ac293069d23file.txt'),
 (10,'FILE_5143564e64406FORMATO EVALUACION DE INGRESO 2012-2013 curvas (3).pdf'),
 (11,'FILE_5177dc7d4b642FORMATO EVALUACION DE INGRESO 2012-2013 curvas (4).pdf');
UNLOCK TABLES;
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`botones_constantes`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`botones_constantes`;
CREATE TABLE  `modeloed_pagweb_dev`.`botones_constantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_photo_id` int(11) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `gallery_photo_activo_id` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_botones_constantes_gallery_photo1` (`gallery_photo_id`),
  KEY `fk_botones_constantes_gallery_photo2` (`gallery_photo_activo_id`),
  CONSTRAINT `fk_botones_constantes_gallery_photo1` FOREIGN KEY (`gallery_photo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`botones_constantes`
--

/*!40000 ALTER TABLE `botones_constantes` DISABLE KEYS */;
LOCK TABLES `botones_constantes` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`botones_constantes` VALUES  (1,126,'HOME',NULL,NULL),
 (2,128,'QUIENESSOMOS',NULL,NULL),
 (3,86,'ADMISIONES',NULL,NULL),
 (4,365,'COMUNIDADIMEX',NULL,NULL),
 (5,131,'TWITTER',NULL,'https://twitter.com/institutomexofi'),
 (6,125,'FACEBOOK',NULL,'http://www.facebook.com'),
 (7,132,'RECOMIENDAELSITIO',NULL,NULL),
 (8,129,'MAPADELSITIO',NULL,NULL),
 (9,130,'POLITICASDEPRIVACIDAD',NULL,NULL),
 (10,121,'PREESCOLAR',164,NULL),
 (11,122,'PRIMARIA',166,NULL),
 (12,124,'SECUNDARIA',167,NULL),
 (13,120,'BACHILLERATO',165,NULL),
 (14,123,'BOTONREGRESAR',NULL,NULL),
 (15,171,'UBICACION',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `botones_constantes` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`categorias`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`categorias`;
CREATE TABLE  `modeloed_pagweb_dev`.`categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_area_sensible_id` int(11) DEFAULT NULL,
  `seccion_id` int(11) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `vista_especial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorias_menus_areas_sensibles1` (`menu_area_sensible_id`),
  KEY `fk_categorias_secciones1` (`seccion_id`),
  CONSTRAINT `fk_categorias_menus_areas_sensibles1` FOREIGN KEY (`menu_area_sensible_id`) REFERENCES `menus_areas_sensibles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categorias_secciones1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`categorias`
--

/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
LOCK TABLES `categorias` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`categorias` VALUES  (1,NULL,NULL,'QUIENESSOMOS','Quienes Somos',NULL),
 (2,10,NULL,'INFORMACIONGENERAL','Información General',NULL),
 (3,2,NULL,'MISION','Misión',NULL),
 (4,3,NULL,'ESCUDO','El Escudo',NULL),
 (5,4,NULL,'VISION','Visión',NULL),
 (6,5,NULL,'VALORES','Valores',NULL),
 (7,1,NULL,'FILOSOFIA','Filosofía',NULL),
 (8,6,NULL,'HISTORIA','Historia',NULL),
 (9,7,NULL,'UBICACION','Ubicación',1),
 (10,NULL,NULL,'PREESCOLAR','Preescolar',NULL),
 (11,NULL,NULL,'PRIMARIA','Primaria',NULL),
 (12,NULL,NULL,'SECUNDARIA','Secundaria',NULL),
 (13,NULL,NULL,'BACHILLERATO','Bachillerato',NULL),
 (14,9,NULL,'FICHADEINSCRIPCION','Ficha de Inscripción',NULL),
 (15,11,NULL,'EXAMENESDEADMISION','EXAMENESDEADMISION',NULL),
 (16,12,NULL,'ALIANZAS','Alianzas',NULL),
 (17,NULL,5,'PUBLICACIONES','Publicaciones',NULL),
 (18,13,NULL,'OBJETIVO','Objetivo',NULL),
 (19,14,NULL,'REGLAMENTO','Reglamento',7),
 (20,15,NULL,'FORMULARIO','Formulario Intercambios',4),
 (21,16,NULL,'ORGANISMOSDEINTERCAMBIO','Organismos de Intercambio',NULL),
 (22,NULL,8,'CONTACTO','Contacto',3),
 (23,17,NULL,'ALIANZASSANPEDRO','Alianzas San Pedro',NULL),
 (24,NULL,9,'PUBLICACIONESSANPEDRO','Publicaciones San Pedro',NULL),
 (25,20,NULL,'OBJETIVO SP','Objetivo SP',NULL),
 (26,21,NULL,'REGLAMENTO SP','Reglamento SP',NULL),
 (27,22,NULL,'FORMULARIO','Formulario Intercambios SP',5),
 (28,23,NULL,'ORGANISMOSDEINTERCAMBIO','Organismos de Intercambio SP',NULL),
 (29,NULL,7,'COMUNIDADIMEX','Comunidad Imex',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`contacto`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`contacto`;
CREATE TABLE  `modeloed_pagweb_dev`.`contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_contacto` datetime NOT NULL,
  `asunto` varchar(150) DEFAULT NULL,
  `para` varchar(150) DEFAULT NULL,
  `comentario` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`contacto`
--

/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
LOCK TABLES `contacto` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`contacto` VALUES  (1,'2012-11-20 00:00:00','ads','adfasadfasd','asdasdfasdf'),
 (2,'2013-01-10 00:00:00','','',''),
 (3,'2013-01-10 00:00:00','','',''),
 (4,'2013-01-10 00:00:00','','',''),
 (5,'2013-04-25 00:00:00','','',''),
 (6,'2013-04-29 00:00:00','','',''),
 (7,'2013-04-29 00:00:00','','',''),
 (8,'2013-04-29 00:00:00','','',''),
 (9,'2013-04-29 00:00:00','','',''),
 (10,'2013-04-29 00:00:00','','',''),
 (11,'2013-04-29 00:00:00','','',''),
 (12,'2013-05-08 00:00:00','','',''),
 (13,'2013-05-14 00:00:00','','',''),
 (14,'2013-05-14 00:00:00','','',''),
 (15,'2013-05-14 00:00:00','','',''),
 (16,'2013-05-14 00:00:00','','',''),
 (17,'2013-05-14 00:00:00','','',''),
 (18,'2013-05-14 00:00:00','','',''),
 (19,'2013-05-14 00:00:00','','',''),
 (20,'2013-05-14 00:00:00','','',''),
 (21,'2013-05-15 00:00:00','','',''),
 (22,'2013-05-15 00:00:00','','',''),
 (23,'2013-05-15 00:00:00','','',''),
 (24,'2013-05-15 00:00:00','testing','',''),
 (25,'2013-05-15 00:00:00','testing','tester',''),
 (26,'2013-05-15 00:00:00','testing','tester','comentario de prueba'),
 (27,'2013-05-15 00:00:00','testing','tester','comentario de prueba'),
 (28,'2013-05-15 00:00:00','testing','tester','comentario de prueba'),
 (29,'2013-05-15 00:00:00','testing','tester','comentario de prueba'),
 (30,'2013-05-15 00:00:00','testing','tester','comentario de prueba'),
 (31,'2013-05-15 00:00:00','testing','tester','comentario de prueba'),
 (32,'2013-05-15 00:00:00','','',''),
 (33,'2013-05-15 00:00:00','another test','',''),
 (34,'2013-05-15 00:00:00','another test','tester',''),
 (35,'2013-05-15 00:00:00','another test','tester','some test message'),
 (36,'2013-05-15 00:00:00','another test','tester','some test message'),
 (37,'2013-05-15 00:00:00','another test','tester','some test message'),
 (38,'2013-05-15 00:00:00','another test','tester','some test message'),
 (39,'2013-05-15 00:00:00','','',''),
 (40,'2013-05-15 00:00:00','','',''),
 (41,'2013-05-15 00:00:00','testing','',''),
 (42,'2013-05-15 00:00:00','testing','',''),
 (43,'2013-05-15 00:00:00','another test','tester','some testing coment'),
 (44,'2013-05-20 00:00:00','prueba envío','','saludos'),
 (45,'2013-05-20 00:00:00','prueba envío','','saludos'),
 (46,'2013-05-20 00:00:00','prueba envío','','saludos'),
 (47,'2013-05-20 00:00:00','prueba envío','','prueba de envío, favor de contestar'),
 (48,'2013-05-20 00:00:00','prueba envío','','prueba de envío, favor de contestar'),
 (49,'2013-05-20 00:00:00','prueba envío','','prueba de envío, favor de contestar'),
 (50,'2013-05-20 00:00:00','correo de prueba','','saludos'),
 (51,'2013-05-20 00:00:00','correo de prueba','','saludos');
UNLOCK TABLES;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`entradas`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`entradas`;
CREATE TABLE  `modeloed_pagweb_dev`.`entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fondo_entrada_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `entrada_antecesor_id` int(11) DEFAULT NULL,
  `gallery_photo_id` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `informacion` text,
  `tipo_plantilla` enum('A','B','C','D') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entradas_categorias` (`categoria_id`),
  KEY `fk_entradas_entradas1` (`entrada_antecesor_id`),
  KEY `fk_entradas_gallery_photo1` (`gallery_photo_id`),
  KEY `fk_entradas_gallery_photo2` (`fondo_entrada_id`),
  CONSTRAINT `fk_entradas_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entradas_entradas1` FOREIGN KEY (`entrada_antecesor_id`) REFERENCES `entradas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entradas_gallery_photo1` FOREIGN KEY (`gallery_photo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entradas_gallery_photo2` FOREIGN KEY (`fondo_entrada_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`entradas`
--

/*!40000 ALTER TABLE `entradas` DISABLE KEYS */;
LOCK TABLES `entradas` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`entradas` VALUES  (1,255,3,NULL,172,'Misión','<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: medium;\">&ldquo;Ser reconocidos como la Instituci&oacute;n educativa</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: medium;\">m&aacute;s efectiva en la formaci&oacute;n integral </span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: medium;\">de sus educandos,</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: medium;\">as&iacute; como la de mejor servicio.&rdquo;</span></p>','A'),
 (2,NULL,4,NULL,174,'El Escudo','<p style=\"text-align: justify;\"><span style=\"font-size: small;\"><span style=\"font-family: verdana;\">El <strong>ESCUDO </strong>simboliza la lealtad, generosidad, honor y fortaleza.&nbsp;</span><span style=\"font-family: verdana;\">Era impuesto por el Rey en la edad media y solo se otorgaba a quienes demostraban ser capaces de portar y defender los colores y blasones que se plasmaban en &eacute;l.</span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">En nuestro Instituto, hablar del <strong>ESCUDO,</strong> es representar clara y precisamente nuestra forma de vida, nuestra filosof&iacute;a y nuestro ideario, los cuales defenderemos d&iacute;a a d&iacute;a.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">Nuestro <strong>ESCUDO</strong> est&aacute; conformado por cuatro cuadrantes azules, divididos por una cruz y sobrepuesta a ella una espada.&nbsp; En los cuadrantes inferiores se encuentran dibujados los volcanes, en el cuadrante izquierdo, esta colocado un libro y del lado derecho una antorcha.</span></p>','A'),
 (3,NULL,4,2,6,'La Cruz','<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">La <strong>CRUZ</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">Representa la causa por la que fuimos creados y la raz&oacute;n de nuestra existencia, simboliza la fe cat&oacute;lica en la que creemos. </span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: medium;\"><span style=\"font-size: small;\">Este sublime s&iacute;mbolo, es el que da sentido a la lucha contra el enemigo, nos otorga la victoria ante el fracaso, convirti&eacute;ndonos en hombres que viven la verdad</span>.</span></p>','A'),
 (4,NULL,4,2,7,'La Espada','<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">La <strong>ESPADA</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">S&iacute;mbolo de la lucha incansable ante la tibieza de la voluntad, nos confirma como guerreros incansables que luchamos por defender y conservar la fortaleza de esp&iacute;ritu.</span></p>','A'),
 (5,NULL,5,NULL,175,'Visión','<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: large;\"><br /></span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: large;\"><br /></span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: medium;\">&ldquo;Ser reconocidos como </span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: medium;\">la Instituci&oacute;n educativa m&aacute;s efectiva </span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: medium;\">en la formaci&oacute;n integral de sus educandos, </span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: medium;\">as&iacute; como la de mejor servicio.&rdquo;</span></p>','A'),
 (6,NULL,6,NULL,176,'Valores','<p style=\"text-align: center;\"><span style=\"font-family: verdana; font-size: small;\"><strong><br /></strong></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-family: verdana; font-size: small;\"><strong><br /></strong></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: medium;\"><span style=\"font-family: verdana;\"><strong>CONGRUENCIA</strong>:&nbsp;</span><span style=\"font-family: verdana;\">Actuar de acuerdo a la verdad.</span></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: medium;\"><span style=\"font-family: verdana;\"><strong>RESPETO</strong>:&nbsp;</span><span style=\"font-family: verdana;\">Tratar a los dem&aacute;s c&oacute;mo quisieras</span></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: medium;\"><span style=\"font-family: verdana;\">que te trataran&nbsp;</span><span style=\"font-family: verdana;\">y no da&ntilde;ar tu entorno.</span></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: medium;\"><span style=\"font-family: verdana;\"><strong>ORDEN</strong>:&nbsp;</span><span style=\"font-family: verdana;\">Un lugar para cada cosa y cada cosa en su lugar.</span></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: medium;\"><span style=\"font-family: verdana;\"><strong>COMPROMISO</strong>:&nbsp;</span><span style=\"font-family: verdana;\">Participar en equipos de trabajo</span></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-family: verdana; font-size: medium;\">y cumplir la promesa que se hace.</span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: medium;\"><span style=\"font-family: verdana;\"><strong>SERVICIO</strong>:&nbsp;</span><span style=\"font-family: verdana;\">Buscar el bien de nuestros semejantes.</span></span></p>','A'),
 (7,NULL,7,NULL,168,'Filosofía','<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">El <strong>INSTITUTO M&Eacute;XICO</strong> cuenta con un conjunto de principios que deben orientar nuestro quehacer educativo a la hora de elaborar proyectos, establecer prioridades y fijar metas, al que denominamos nuestro Ideario. </span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">El Ideario contiene una determinada visi&oacute;n del hombre, del mundo, de lo religioso y de la educaci&oacute;n, que nos servir&aacute; de marco de referencia en nuestro actuar. </span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">Estos principios iluminan los planes de acci&oacute;n que vamos a desarrollar y plasmar en realidades concretas; son principios que deben ser conocidos, asumidos y vividos responsablemente por todos los miembros de la Comunidad Educativa del Instituto M&eacute;xico. </span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">Nos definimos como escuela cat&oacute;lica, asumiendo la concepci&oacute;n de hombre, familia, cultura y servicio que de ella se desprenden.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"> Nuestro prop&oacute;sito es la formaci&oacute;n de hombres y mujeres &iacute;ntegros, amantes de la verdad y forjadores del bien. </span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">El <strong>INSTITUTO M&Eacute;XICO</strong> pretende ser una comunidad de vida plena, donde el estudiante no s&oacute;lo aprenda conocimientos sino tambi&eacute;n viva valores, ya que concebimos a la educaci&oacute;n como el proceso de formaci&oacute;n y desarrollo arm&oacute;nico de todas las facultades de la persona, dirigidas hacia la vivencia de valores personales y sociales, ya que el alumno no solo aprende para la escuela sino para la vida.</span></p>','A'),
 (8,NULL,8,NULL,173,'Historia','<p style=\"text-align: justify;\"><span style=\"font-size: small;\"><strong><span style=\"font-family: verdana;\">NUESTROS INICIOS &nbsp; </span></strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">En el a&ntilde;o de <strong>1977</strong>, inquietos padres de familia, buscando una mejor opci&oacute;n educativa que tomara en cuenta la <strong>formaci&oacute;n en la fe cat&oacute;lica</strong>, la formaci&oacute;n <strong>en valores universales</strong>, el <strong>civismo</strong>, la ense&ntilde;anza del <strong>ingl&eacute;s</strong>, la <strong>educaci&oacute;n art&iacute;stica</strong> y <strong>cultural</strong> amplias, el desarrollo del <strong>deporte</strong> y un desde luego un <strong>alto nivel acad&eacute;mico</strong>, deciden agruparse y formar una nueva instituci&oacute;n con un proyecto educativo que desarrolle la formaci&oacute;n integral.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">Meses de trabajo llevaron a definir el ideario, modelo educativo, el <strong>modelo pedag&oacute;gico</strong>, la <strong>organizaci&oacute;n escolar</strong> y los <strong>procesos administrativos</strong>, y una vez terminado este trabajo se abre la inscripci&oacute;n a los alumnos de jard&iacute;n de ni&ntilde;os, primero de primaria y primero de secundaria, con la intensi&oacute;n de formar a los alumnos desde los inicios.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">Pero las expectativas fueron completamente rebasadas y el <strong>INSTITUTO M&Eacute;XICO DE PUEBLA</strong> abre sus puertas el <strong>5 de septiembre de 1977</strong> con 290 alumnos en 3 grupos de jard&iacute;n de ni&ntilde;os, 12 grupos en la primaria completa, 2 grupos de primero de secundaria y un plantel docente de 22 miembros.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">El <strong>INSTITUTO M&Eacute;XICO</strong>&nbsp;inici&oacute; su trabajo en las instalaciones ubicadas en la<strong> 25 poniente y la 25 sur</strong>. A s&oacute;lo cuatro a&ntilde;os de haber iniciado, estas instalaciones fueron insuficientes y con el apoyo de toda la comunidad educativa se proyecta la construcci&oacute;n de un nuevo campus.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">En el a&ntilde;o de <strong>1980</strong> se coloca la primera piedra del <strong>campus Estrella del Sur</strong>, ubicado en la 49 poniente 5102.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">Para <strong>1983</strong> el <strong>INSTITUTO M&Eacute;XICO DE PUEBLA</strong> se muda a sus <strong>nuevas instalaciones</strong> con apoyo de alumnos, maestros y padres de familia.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">Para ese entonces se contaba con el <strong>jard&iacute;n de ni&ntilde;os</strong>, la <strong>primaria</strong>, la <strong>secundaria</strong> y la <strong>preparatoria&nbsp;</strong>completos, una poblaci&oacute;n de poco m&aacute;s de 500 alumnos.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">En <strong>10 a&ntilde;os</strong> el <strong>INSTITUTO M&Eacute;XICO DE PUEBLA</strong> duplica su poblaci&oacute;n ya que se ha convertido en una de las <strong>mejores</strong> instituciones educativas de Puebla, cubriendo con las expectativas de formaci&oacute;n acad&eacute;mica y de valores entre sus alumnos.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">Es en este periodo cuando el <strong>INSTITUTO M&Eacute;XICO</strong> alcanza una poblaci&oacute;n de <strong>2,300</strong> alumnos y una vez m&aacute;s es necesario crecer.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small; font-family: verdana;\">Al d&iacute;a de hoy se est&aacute; construyendo un <strong>nuevo Campus</strong>, ubicado en <strong>Camino Real a Cholula No. 4232</strong>, el cual ya ofrece los servicios del <strong>preescolar,primaria, secundaria y bachillerato</strong>.</span></p>','A'),
 (9,NULL,4,2,3,'Los Volcanes','<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">Los <strong>VOLCANES</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">Son los guardianes eternos de nuestra ciudad y nos recuerdan diariamente que la conquista de la cima es nuestro ideal, se forma s&oacute;lo con una voluntad f&eacute;rrea capaz de vencer todos los obst&aacute;culos y de escalar tan alto como lo deseamos.</span></p>','A'),
 (10,NULL,4,2,4,'El Libro','<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">El </span><strong style=\"font-family: verdana; font-size: small;\">LIBRO</strong></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">Nos da siempre la verdad y certeza, permiti&eacute;ndonos ver con claridad hacia donde vamos y de esta forma alcanzar la libertad deseada.</span></p>','A'),
 (11,NULL,4,2,2,'La Antorcha','<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\"><br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">La <strong>ANTORCHA</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: verdana; font-size: small;\">Simboliza nuestro coraz&oacute;n dispuesto a caminar cumpliendo con la misi&oacute;n para la que fuimos creados: el amor intenso a Dios en nuestro pr&oacute;jimo.</span></p>','A'),
 (16,NULL,2,NULL,222,'Información General','Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id','A'),
 (18,NULL,15,NULL,220,'Fechas de Exámenes','<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h1 style=\"line-height: 22px; font-size: 1em; margin: 0px; padding: 0px; color: #333333; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-align: center;\"><span style=\"font-size: medium; font-family: verdana;\">CAMPUS ESTRELLA DEL SUR</span></h1>\r\n<p style=\"text-align: center;\"><span style=\"font-size: medium; font-family: verdana;\">25 de Febrero, 16:00 hrs.</span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong><span style=\"font-size: medium; font-family: verdana;\">CAMPUS SAN PEDRO</span></strong></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: medium; font-family: verdana;\">28 de Febrero, 16:30 hrs.</span></p>',NULL),
 (19,NULL,14,NULL,221,'Ficha de Inscripción','<p>Para llenar el<strong><span style=\"font-size: small;\"> formulario</span></strong> de admisi&oacute;n en l&iacute;nea, haga click <strong><span style=\"font-size: small;\"><a href=\"http://modeloeducativosimex.com/demoweb/index.php?r=site/GetContenidoSeccion&amp;seccionId=2&amp;getModal=1\">aqui</a></span></strong></p>\r\n<p>&nbsp;</p>\r\n<p>Para descargar el archivo en formato PDF, haga click en el bot&oacute;n Descargar</p>',NULL),
 (20,NULL,10,NULL,362,'Prescolar','<p style=\"margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">La<span class=\"Apple-converted-space\">&nbsp;</span><strong>educaci&oacute;n infantil temprana</strong><span class=\"Apple-converted-space\">&nbsp;</span>es el nombre que recibe el ciclo de estudios previos a la<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Educaci&oacute;n primaria\" href=\"http://es.wikipedia.org/wiki/Educaci%C3%B3n_primaria\">educaci&oacute;n primaria</a><span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Educaci&oacute;n obligatoria\" href=\"http://es.wikipedia.org/wiki/Educaci%C3%B3n_obligatoria\">obligatoria</a><span class=\"Apple-converted-space\">&nbsp;</span>establecida en muchas partes del mundo hispanoamericano. En algunos lugares, es parte del sistema formal de educaci&oacute;n y en otros es un centro de cuidado o<span class=\"Apple-converted-space\">&nbsp;</span><a class=\"mw-redirect\" style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Jard&iacute;n de infancia\" href=\"http://es.wikipedia.org/wiki/Jard%C3%ADn_de_infancia\">jard&iacute;n de infancia</a><span class=\"Apple-converted-space\">&nbsp;</span>y cubre la edad de 0 a 6 a&ntilde;os.</p>\r\n<p style=\"margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">Esta<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Instituci&oacute;n\" href=\"http://es.wikipedia.org/wiki/Instituci%C3%B3n\">instituci&oacute;n</a><span class=\"Apple-converted-space\">&nbsp;</span>establecida se le conoce de diversas formas, si forma parte del sistema educativo, se denomina escuela infantil, en caso contrario, tiene varios nombres:<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Guarder&iacute;a\" href=\"http://es.wikipedia.org/wiki/Guarder%C3%ADa\">guarder&iacute;a</a>, jard&iacute;n de infancia, jard&iacute;n infantil, parvulario, k&iacute;nder,<span class=\"Apple-converted-space\">&nbsp;</span><em>kindergarten</em>, jard&iacute;n de infantes, etc.</p>',NULL),
 (21,NULL,11,NULL,361,'Primaria','La educación primaria (también conocida como educación básica, enseñanza básica, enseñanza elemental, estudios básicos o estudios primarios) es la que asegura la correcta alfabetización, es decir, que enseña a leer, escribir, cálculo básico y algunos de los conceptos culturales considerados imprescindibles. Su finalidad es proporcionar a todos los alumnos una formación común que haga posible el desarrollo de las capacidades individuales motrices, de equilibrio personal; de relación y de actuación social con la adquisición de los elementos básicos culturales; los aprendizajes relativos mencionados anteriormente.\r\nLa educación primaria, también conocida como la educación elemental, es la primera de seis años establecidos y estructurados de la educación que se produce a partir de la edad de entre cinco y seis años hasta aproximadamente los 12 años de edad. La mayoría de los países exigen que los niños reciban educación primaria y en muchos, es aceptable para los padres disponer de la base del plan de estudios aprobado.',NULL),
 (22,NULL,12,NULL,360,'Secundaria','<p style=\"margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">La \'<em>educaci&oacute;n secundaria</em><span class=\"Apple-converted-space\">&nbsp;</span>tiene como objetivo capacitar al alumno para proseguir<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Educaci&oacute;n superior\" href=\"http://es.wikipedia.org/wiki/Educaci%C3%B3n_superior\">estudios superiores</a><span class=\"Apple-converted-space\">&nbsp;</span>o bien para incorporarse al<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Formaci&oacute;n profesional\" href=\"http://es.wikipedia.org/wiki/Formaci%C3%B3n_profesional\">mundo laboral</a>. Al terminar la educaci&oacute;n secundaria se pretende que el alumno desarrolle las suficientes habilidades, valores y actitudes para lograr un buen desenvolvimiento en la sociedad. En particular, la ense&ntilde;anza secundaria debe brindar formaci&oacute;n b&aacute;sica para responder al fen&oacute;meno de la universalizaci&oacute;n de la matr&iacute;cula; preparar para la universidad pensando en quienes aspiran y pueden continuar sus estudios; preparar para el mundo del trabajo a los que no siguen estudiando y desean o necesitan incorporarse a la vida laboral; y formar la personalidad integral de los j&oacute;venes, con especial atenci&oacute;n en los aspectos relacionados con el desempe&ntilde;o ciudadano.</p>\r\n<p style=\"margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">Puede ser una educaci&oacute;n secundaria com&uacute;n para todos los alumnos o diversificada en v&iacute;as formativas seg&uacute;n las salidas posteriores. Las modalidades, a la vez, pueden tener diversas especializaciones y orientaciones que permiten formarse en temas espec&iacute;ficos. Por ejemplo, en la<span class=\"Apple-converted-space\">&nbsp;</span><a class=\"new\" style=\"text-decoration: initial; color: #a55858; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Educaci&oacute;n t&eacute;cnico profesional (a&uacute;n no redactado)\" href=\"http://es.wikipedia.org/w/index.php?title=Educaci%C3%B3n_t%C3%A9cnico_profesional&amp;action=edit&amp;redlink=1\">educaci&oacute;n t&eacute;cnico profesional</a><span class=\"Apple-converted-space\">&nbsp;</span>se prepara mayoritariamente para el trabajo despu&eacute;s de abandonar la escuela secundaria, en esta modalidad se entrena al alumno para que aprenda una carrera t&eacute;cnica o industrial.</p>',NULL),
 (23,NULL,13,NULL,359,'Bachillerato','<p style=\"margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">El<span class=\"Apple-converted-space\">&nbsp;</span><strong>bachillerato</strong><span class=\"Apple-converted-space\">&nbsp;</span>es un ciclo de estudios con el que se obtiene el grado de<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Bachiller\" href=\"http://es.wikipedia.org/wiki/Bachiller\">bachiller</a>.</p>\r\n<p style=\"margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">El bachillerato tiene un car&aacute;cter obligatorio en algunos pa&iacute;ses, ya que sin &eacute;l no se puede conseguir un empleo econ&oacute;micamente bien definido, aunque en la mayor&iacute;a de los pa&iacute;ses no es as&iacute;. Las asignaturas que se imparten son m&aacute;s especializadas que en la secundaria, es decir, est&aacute;n encaminadas a las ciencias, a las letras o a las artes (cada uno de las tres tiene tres asignaturas de modalidad espec&iacute;ficas, las dem&aacute;s son todas comunes). El objetivo del bachillerato es preparar acad&eacute;micamente al alumno para que pueda realizar estudios superiores.</p>\r\n<p style=\"margin: 0.4em 0px 0.5em; line-height: 19.200000762939453px; color: #000000; font-family: sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">En algunos pa&iacute;ses hispanoamericanos, el t&eacute;rmino<span class=\"Apple-converted-space\">&nbsp;</span><em>bachillerato</em><span class=\"Apple-converted-space\">&nbsp;</span>se utiliza para referirse al<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"T&iacute;tulo de grado\" href=\"http://es.wikipedia.org/wiki/T%C3%ADtulo_de_grado\">t&iacute;tulo de grado</a><span class=\"Apple-converted-space\">&nbsp;</span>universitario llamado en<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Idioma ingl&eacute;s\" href=\"http://es.wikipedia.org/wiki/Idioma_ingl%C3%A9s\">ingl&eacute;s</a><span class=\"Apple-converted-space\">&nbsp;</span><em>Bachelor&rsquo;s degree</em>. Para Europa ver<span class=\"Apple-converted-space\">&nbsp;</span><a style=\"text-decoration: initial; color: #0b0080; background-image: none; background-position: initial initial; background-repeat: initial initial;\" title=\"Proceso de Bolonia\" href=\"http://es.wikipedia.org/wiki/Proceso_de_Bolonia\">Proceso de Bolonia</a>.</p>',NULL),
 (24,NULL,16,NULL,343,'Alianza Principal','<table style=\"width: 200px;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>',NULL),
 (25,NULL,16,24,344,'Universidades','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (26,NULL,16,24,345,'Preescolares','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Preescolares<br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (27,NULL,16,24,346,'Organismos','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\"><span style=\"font-size: small;\">Organismos</span><br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (28,NULL,17,NULL,326,'Publicaciones','<table style=\"width: 200px;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td style=\"text-align: center;\">\r\n<p>&nbsp;<img title=\"marzo\" src=\"http://www.modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"marzo\" width=\"60\" /></p>\r\n<p><a title=\"marzo\" href=\"http://www.imex.edu.mx\" target=\"_blank\">Visitar</a></p>\r\n</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>',NULL),
 (29,NULL,18,NULL,332,'Objetivo','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\"><span style=\"font-size: medium;\">Objetivo</span><br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (30,NULL,19,NULL,1,'Reglamento','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\"><span style=\"font-size: medium;\">Reglamento</span><br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (31,NULL,20,NULL,1,'Formulario Intercambios','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Formulario<br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (32,NULL,21,NULL,334,'Organismos de Intercambio','<table style=\"width: 200px;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>',NULL),
 (33,NULL,23,36,1,'Universidades','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Universidades<br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (34,NULL,23,36,1,'Preescolar','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\"><span style=\"font-size: medium;\">Preescolar</span><br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (35,NULL,23,36,1,'Organismos','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\"><span style=\"font-size: medium;\">Organismos</span><br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (36,NULL,23,NULL,1,'Alianza Principal San Pedro','<table width=\"200\" border=\"1\"><tr><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td></tr><tr><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td></tr><tr><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td></tr><tr><td><img src=\"images/icono.jpg\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td><td>&nbsp;</td><td>&nbsp;</td></tr></table>',NULL),
 (37,NULL,24,NULL,326,'Publicaciones San Pedro','<table style=\"width: 200px;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: center;\"><img title=\"Revista Marzo\" src=\"http://modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"Revista Marzo\" width=\"60\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td style=\"text-align: center;\"><img title=\"Revista Marzo\" src=\"http://modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"Revista Marzo\" width=\"60\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td style=\"text-align: center;\"><img title=\"Revista Noviembre 2012\" src=\"http://modeloeducativosimex.com/demoweb/gallery/342.jpg\" alt=\"Revista Noviembre 2012\" width=\"60\" /><br /><a title=\"Revista Noviembre\" href=\"http://www.youblisher.com/p/469614-Please-Add-a-Title/\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: center;\"><img title=\"Revista Marzo\" src=\"http://modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"Revista Marzo\" width=\"60\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td style=\"text-align: center;\"><img title=\"Revista Enero 2013\" src=\"http://modeloeducativosimex.com/demoweb/gallery/341.jpg\" alt=\"Revista Enero 2013\" width=\"60\" /><br /><a title=\"Revista Enero 2013\" href=\"http://www.youblisher.com/p/523043-Please-Add-a-Title/\" target=\"_blank\">Visitar</a></td>\r\n<td style=\"text-align: center;\"><img title=\"Revista Febrero\" src=\"http://modeloeducativosimex.com/demoweb/gallery/340.jpg\" alt=\"Revista Febrero\" width=\"60\" /><br /><a title=\"Revista Febrero\" href=\"http://www.youblisher.com/p/545613-Please-Add-a-Title/\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: center;\"><img title=\"Revista Marzo\" src=\"http://modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"Revista Marzo\" width=\"60\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td style=\"text-align: center;\"><img title=\"Revista Marzo\" src=\"http://modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"Revista Marzo\" width=\"60\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td style=\"text-align: center;\"><img title=\"Revista Marzo\" src=\"http://modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"Revista Marzo\" width=\"60\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: center;\"><img title=\"Revista Marzo\" src=\"http://modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"Revista Marzo\" width=\"60\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td style=\"text-align: center;\">\r\n<p>&nbsp;<img title=\"Revista Marzo\" src=\"http://modeloeducativosimex.com/demoweb/gallery/339.jpg\" alt=\"Revista Marzo\" width=\"60\" /><a title=\"Revista Marzo\" href=\"http://www.youblisher.com/p/573103-Please-Add-a-Title/\" target=\"_blank\">Visitar</a></p>\r\n</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>',NULL),
 (38,NULL,28,NULL,346,'Organismos de Intercambio','<table style=\"width: 200px;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"http://www.modeloeducativosimex.com/demoweb/images/icono.jpg\" alt=\"\" width=\"30\" /><br /><a href=\"http://www.google.com\" target=\"_blank\">Visitar</a></td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>',NULL),
 (39,NULL,26,NULL,1,'Reglamento','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Reglamento<br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (40,NULL,27,NULL,1,'Formulario Intercambios','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Formulario de Intercambios<br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (41,NULL,28,NULL,1,'Organismos de Intercambio','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Organismos de Intercambio<br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL),
 (42,NULL,25,NULL,332,'Objetivo','<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\"><span style=\"font-size: medium;\">Objetivo</span><br /></strong></p>\r\n<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',NULL);
INSERT INTO `modeloed_pagweb_dev`.`entradas` VALUES  (43,289,29,NULL,289,'En Construcción','','A'),
 (44,NULL,1,NULL,325,'EXALUMNOS',NULL,NULL),
 (45,NULL,1,NULL,327,'CONTACTO',NULL,NULL),
 (46,NULL,1,NULL,327,'contacto san pedro',NULL,'A');
UNLOCK TABLES;
/*!40000 ALTER TABLE `entradas` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`entradas_archivos`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`entradas_archivos`;
CREATE TABLE  `modeloed_pagweb_dev`.`entradas_archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrada_id` int(11) NOT NULL,
  `archivo_id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entradas_archivos_archivos1` (`archivo_id`),
  KEY `fk_entradas_archivos_entradas1` (`entrada_id`),
  CONSTRAINT `fk_entradas_archivos_archivos1` FOREIGN KEY (`archivo_id`) REFERENCES `archivos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entradas_archivos_entradas1` FOREIGN KEY (`entrada_id`) REFERENCES `entradas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`entradas_archivos`
--

/*!40000 ALTER TABLE `entradas_archivos` DISABLE KEYS */;
LOCK TABLES `entradas_archivos` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`entradas_archivos` VALUES  (8,19,10,'FICHA DE INSCRIPCION'),
 (9,16,11,'FORMATO EVALUACION NUEVO INGRESO');
UNLOCK TABLES;
/*!40000 ALTER TABLE `entradas_archivos` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`entradas_sliders`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`entradas_sliders`;
CREATE TABLE  `modeloed_pagweb_dev`.`entradas_sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrada_id` int(11) DEFAULT NULL,
  `slider_id` int(11) NOT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `seccion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entradas_sliders_entradas1` (`entrada_id`),
  KEY `fk_entradas_sliders_sliders1` (`slider_id`),
  KEY `fk_entradas_sliders_secciones1` (`seccion_id`),
  CONSTRAINT `fk_entradas_sliders_entradas1` FOREIGN KEY (`entrada_id`) REFERENCES `entradas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entradas_sliders_secciones1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entradas_sliders_sliders1` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`entradas_sliders`
--

/*!40000 ALTER TABLE `entradas_sliders` DISABLE KEYS */;
LOCK TABLES `entradas_sliders` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`entradas_sliders` VALUES  (11,1,17,NULL,NULL),
 (12,2,23,NULL,NULL),
 (13,3,23,NULL,NULL),
 (14,4,23,NULL,NULL),
 (15,9,23,NULL,NULL),
 (16,10,23,NULL,NULL),
 (17,11,23,NULL,NULL),
 (18,5,18,NULL,NULL),
 (19,6,20,NULL,NULL),
 (20,7,19,NULL,NULL),
 (21,8,21,NULL,NULL),
 (26,16,24,NULL,NULL),
 (28,18,24,NULL,NULL),
 (29,19,24,NULL,NULL),
 (30,20,2,NULL,NULL),
 (31,21,2,NULL,NULL),
 (32,22,2,NULL,NULL),
 (33,23,2,NULL,NULL),
 (34,24,2,NULL,NULL),
 (35,25,2,NULL,NULL),
 (36,26,2,NULL,NULL),
 (37,27,2,NULL,NULL),
 (38,29,2,NULL,NULL),
 (39,30,2,NULL,NULL),
 (40,31,2,NULL,NULL),
 (41,32,2,NULL,NULL),
 (42,33,2,NULL,NULL),
 (43,34,2,NULL,NULL),
 (44,35,2,NULL,NULL),
 (45,36,2,NULL,NULL),
 (46,37,2,NULL,NULL),
 (47,38,2,NULL,NULL),
 (48,39,2,NULL,NULL),
 (49,40,2,NULL,NULL),
 (50,41,2,NULL,NULL),
 (51,42,2,NULL,NULL),
 (52,44,15,'EXALUMNOS',NULL),
 (53,45,2,NULL,8),
 (54,46,2,NULL,12);
UNLOCK TABLES;
/*!40000 ALTER TABLE `entradas_sliders` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`formato_inscripciones`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`formato_inscripciones`;
CREATE TABLE  `modeloed_pagweb_dev`.`formato_inscripciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciclo` varchar(25) DEFAULT NULL,
  `seccion` varchar(45) DEFAULT NULL,
  `grado` varchar(45) DEFAULT NULL,
  `ya_fue_alumno` tinyint(1) NOT NULL,
  `motivo_de_salida` varchar(500) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(75) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `ciudad_de_procedencia` varchar(45) DEFAULT NULL,
  `escuela_de_procedencia` varchar(150) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `promedio_actual` varchar(45) DEFAULT NULL,
  `motivo_de_cambio` varchar(500) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `numero_exterior` varchar(10) DEFAULT NULL,
  `numero_interior` varchar(10) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `telefono_particular` varchar(25) DEFAULT NULL,
  `nombre_tutor` varchar(45) DEFAULT NULL,
  `apellido_paterno_tutor` varchar(45) DEFAULT NULL,
  `apellido_materno_tutor` varchar(45) DEFAULT NULL,
  `fecha_nacimiento_tutor` date DEFAULT NULL,
  `nacionalidad_tutor` varchar(45) DEFAULT NULL,
  `sexo_tutor` enum('M','F') DEFAULT NULL,
  `escolaridad_tutor` varchar(85) DEFAULT NULL,
  `estado_civil_tutor` varchar(45) DEFAULT NULL,
  `ocupacion_tutor` varchar(45) DEFAULT NULL,
  `nombre_empresa_tutor` varchar(85) DEFAULT NULL COMMENT '	',
  `puesto_tutor` varchar(45) DEFAULT NULL,
  `tiempo_laborando_tutor` varchar(20) DEFAULT NULL,
  `es_propietario` tinyint(1) DEFAULT NULL,
  `telefono_empresa_tutor` varchar(25) DEFAULT NULL,
  `numero_de_hijos_tutor` int(11) DEFAULT NULL,
  `religion_tutor` varchar(45) DEFAULT NULL,
  `email_tutor` varchar(45) DEFAULT NULL,
  `movil_tutor` varchar(45) DEFAULT NULL,
  `nombre_conyuge` varchar(45) DEFAULT NULL,
  `apellido_paterno_conyuge` varchar(45) DEFAULT NULL,
  `apellido_materno_conyuge` varchar(45) DEFAULT NULL,
  `fecha_nacimiento_conyuge` date DEFAULT NULL,
  `nacionalidad_conyuge` varchar(45) DEFAULT NULL,
  `sexo_conyuge` enum('M','F') DEFAULT NULL,
  `escolaridad_conyuge` varchar(45) DEFAULT NULL,
  `estado_civil_conyuge` varchar(45) DEFAULT NULL,
  `ocupacion_conyuge` varchar(45) DEFAULT NULL,
  `nombre_empresa_conyuge` varchar(85) DEFAULT NULL,
  `giro_empresa_conyuge` varchar(45) DEFAULT NULL,
  `puesto_conyuge` varchar(45) DEFAULT NULL,
  `tiempo_laborando_conyuge` varchar(20) DEFAULT NULL,
  `es_propietario_conyuge` tinyint(1) DEFAULT NULL,
  `telefono_empresa_conyuge` varchar(25) DEFAULT NULL,
  `numero_de_hijos_conyuge` int(11) DEFAULT NULL,
  `religion_conyuge` varchar(45) DEFAULT NULL,
  `email_conyuge` varchar(45) DEFAULT NULL,
  `movil_conyuge` varchar(45) DEFAULT NULL,
  `nombre_hijo1_estudiando` varchar(150) DEFAULT NULL,
  `grado_seccion_hijo1_estudiando` varchar(45) DEFAULT NULL,
  `nombre_hijo2_estudiando` varchar(150) DEFAULT NULL,
  `grado_seccion__hijo2_estudiando` varchar(45) DEFAULT NULL,
  `nombre_hijo3_estudiando` varchar(150) DEFAULT NULL,
  `grado_seccion_hijo3_estudiando` varchar(45) DEFAULT NULL,
  `nombre_hijo4_estudiando` varchar(150) DEFAULT NULL,
  `grado_seccion_hijo4_estudiando` varchar(45) DEFAULT NULL,
  `nombre_otro_hijo1_inscribir` varchar(150) DEFAULT NULL,
  `nombre_otro_hijo2_inscribir` varchar(150) DEFAULT NULL,
  `nombre_otro_hijo3_inscribir` varchar(150) DEFAULT NULL,
  `nombre_otro_hijo4_inscribir` varchar(150) DEFAULT NULL,
  `grado_seccion_otro_hijo1_inscribir` varchar(45) DEFAULT NULL,
  `grado_seccion_otro_hijo2_inscribir` varchar(45) DEFAULT NULL,
  `grado_seccion_otro_hijo3_inscribir` varchar(45) DEFAULT NULL,
  `grado_seccion_otro_hijo4_inscribir` varchar(45) DEFAULT NULL,
  `motivo_eligio_instituto` varchar(500) DEFAULT NULL,
  `medio_difusion` varchar(500) DEFAULT NULL,
  `quien_recomendo` varchar(150) DEFAULT NULL,
  `papa_ex_alumno` tinyint(1) DEFAULT NULL,
  `mama_ex_alumno` tinyint(1) DEFAULT NULL,
  `papa_generacion` varchar(45) DEFAULT NULL,
  `mama_generacion` varchar(45) DEFAULT NULL,
  `nombre_contacto` varchar(45) DEFAULT NULL,
  `apellido_paterno_contacto` varchar(45) DEFAULT NULL,
  `apellido_materno_contacto` varchar(45) DEFAULT NULL,
  `telefono_casa_contacto` varchar(45) DEFAULT NULL,
  `telefono_oficina_contacto` varchar(45) DEFAULT NULL,
  `movil_contacto` varchar(45) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `campus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`formato_inscripciones`
--

/*!40000 ALTER TABLE `formato_inscripciones` DISABLE KEYS */;
LOCK TABLES `formato_inscripciones` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `formato_inscripciones` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`gallery`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`gallery`;
CREATE TABLE  `modeloed_pagweb_dev`.`gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versions_data` text NOT NULL,
  `name` tinyint(1) NOT NULL DEFAULT '1',
  `description` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`gallery`
--

/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
LOCK TABLES `gallery` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`gallery` VALUES  (1,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (2,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (3,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (4,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (5,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (6,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (7,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (8,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (9,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (10,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (11,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (12,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (13,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (14,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (15,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (16,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (17,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (18,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (19,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (20,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (21,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (22,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (23,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (24,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (25,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (26,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (64,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1),
 (223,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`gallery_photo`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`gallery_photo`;
CREATE TABLE  `modeloed_pagweb_dev`.`gallery_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gallery_photo_gallery1` (`gallery_id`),
  CONSTRAINT `fk_gallery_photo_gallery1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=368 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`gallery_photo`
--

/*!40000 ALTER TABLE `gallery_photo` DISABLE KEYS */;
LOCK TABLES `gallery_photo` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`gallery_photo` VALUES  (1,1,1,'6.jpg','6.jpg','6.jpg',NULL,NULL),
 (2,1,2,'antorcha on.jpg','antorcha on.jpg','antorcha on.jpg','2012-11-01 00:00:00','2012-11-30 00:00:00'),
 (3,1,3,'volcanes on.jpg','volcanes on.jpg','volcanes on.jpg',NULL,NULL),
 (4,1,4,'el libro on.jpg','el libro on.jpg','el libro on.jpg',NULL,NULL),
 (6,1,6,'LA CRUZ','la cruz on.jpg','la cruz on.jpg',NULL,NULL),
 (7,1,7,'la espada on.jpg','la espada on.jpg','la espada on.jpg',NULL,NULL),
 (13,1,13,'BexalumON','','botonexalumnos.jpg',NULL,NULL),
 (19,1,19,'botonquienessomos','botonquienessomos','botonquienessomos.jpg',NULL,NULL),
 (20,1,20,'botonquienessomosactivo','botonquienessomosactivo','botonquienessomosactivo.jpg',NULL,NULL),
 (59,10,59,'2x1Alianzas','2x1Alianzas','2x1Alianzas.jpg',NULL,NULL),
 (60,7,60,'2x2estrella','2x2estrella','2x23.jpg',NULL,NULL),
 (62,9,62,'4x3estrella','4x3estrella','4x31.jpg',NULL,NULL),
 (63,8,63,'3x1estrella','3x1estrella','3x11.jpg',NULL,NULL),
 (64,1,64,'menuIntercambios','menuIntercambios','menuIntercambios.jpg',NULL,NULL),
 (65,1,65,'2x21','2x21','2x21.jpg',NULL,NULL),
 (66,1,66,'3x11','3x11','3x11.jpg',NULL,NULL),
 (67,1,67,'2x11','2x11','2x11.jpg',NULL,NULL),
 (72,1,72,'bienvenidos','bienvenidos','bienvenidos.jpg',NULL,NULL),
 (73,1,73,'tituloCampusEstrellaDelSur','tituloCampusEstrellaDelSur','campusEstrellaDelSur.jpg',NULL,NULL),
 (74,1,74,'tituloCampusSanPedro','tituloCampusSanPedro','campusSanPedro.jpg',NULL,NULL),
 (75,1,75,'botonregresar','botonregresar','botonregresar.jpg',NULL,NULL),
 (76,1,76,'botoncampussanpedro','botoncampussanpedro','botoncampussanpedro.jpg',NULL,NULL),
 (77,1,77,'botoncampusestrelladelsur','botoncampusestrelladelsur','botoncampusestrelladelsur.jpg',NULL,NULL),
 (78,1,78,'BexalumOFF','','BODY EXALUMNOS OFF.jpg',NULL,NULL),
 (80,1,80,'CAMPUS ES OFF','BOTON CAMPUS ES OFF.jpg','BOTON CAMPUS ES OFF.jpg',NULL,NULL),
 (81,1,81,'CAMPUS SP OFF','BOTON CAMPUS SP OFF.jpg','BOTON CAMPUS SP OFF.jpg',NULL,NULL),
 (82,1,82,'BprocadmonON','','BODY PROCESO ADMON ON.jpg',NULL,NULL),
 (83,1,83,'BprocadmonOFF','','BODY PROC ADMON OFF.jpg',NULL,NULL),
 (86,1,86,'HprocadmonON','','HEADER PROC ADMON ON.jpg',NULL,NULL),
 (113,2,113,'1.jpg','cubilete','1.jpg',NULL,NULL),
 (116,2,116,'banner 252x245.JPG','microsoft','banner 252x245.JPG',NULL,NULL),
 (117,2,117,'5.jpg','cristo rey','5.jpg',NULL,NULL),
 (118,2,118,'febrero.jpg','febrero.jpg','febrero.jpg',NULL,NULL),
 (119,1,119,'admisiones','admisiones','admisiones.jpg',NULL,NULL),
 (120,1,120,'botonbachillerato','botonbachillerato','botonbachillerato.jpg',NULL,NULL),
 (121,1,121,'botonpreescolar','botonpreescolar','botonpreescolar.jpg',NULL,NULL),
 (122,1,122,'botonprimaria','botonprimaria','botonprimaria.jpg',NULL,NULL),
 (123,1,123,'botonregresar','botonregresar','botonregresar.jpg',NULL,NULL),
 (124,1,124,'botonsecundaria','botonsecundaria','botonsecundaria.jpg',NULL,NULL),
 (125,1,125,'facebook','facebook','facebook.jpg',NULL,NULL),
 (126,1,126,'home','home','home.jpg',NULL,NULL),
 (128,1,128,'quienessomos','quienessomos','quienessomos.jpg',NULL,NULL),
 (129,1,129,'mapadelsitio','mapadelsitio','mapadelsitio.jpg',NULL,NULL),
 (130,1,130,'politicasdeprivacidad','politicasdeprivacidad','politicasdeprivacidad.jpg',NULL,NULL),
 (131,1,131,'twitter','twitter','twitter.jpg',NULL,NULL),
 (132,1,132,'recomiendaelsitio','recomiendaelsitio','recomiendaelsitio.jpg',NULL,NULL),
 (151,12,151,'bloque 1 sp1.jpg','bloque 1 sp1.jpg','bloque 1 sp1.jpg',NULL,NULL),
 (152,12,152,'bloque 1 sp 2.jpg','bloque 1 sp 2.jpg','bloque 1 sp 2.jpg','0000-00-00 00:00:00','2013-04-28 00:00:00'),
 (153,12,153,'bloque 1 sp 3.jpg','bloque 1 sp 3.jpg','bloque 1 sp 3.jpg','0000-00-00 00:00:00','2013-04-28 00:00:00'),
 (154,13,154,'bloque 2 sp1.jpg','bloque 2 sp1.jpg','bloque 2 sp1.jpg',NULL,NULL),
 (155,13,155,'bloque 2 sp 2.jpg','bloque 2 sp 2.jpg','bloque 2 sp 2.jpg','0000-00-00 00:00:00','2013-04-28 00:00:00'),
 (156,13,156,'bloque 2 sp 3.jpg','bloque 2 sp 3.jpg','bloque 2 sp 3.jpg','0000-00-00 00:00:00','2013-04-28 00:00:00'),
 (157,14,367,'bloque 3 sp 1.jpg','bloque 3 sp 1.jpg','bloque 3 sp 1.jpg','0000-00-00 00:00:00','2013-05-13 00:00:00'),
 (158,14,158,'bloque 3 sp 2.jpg','bloque 3 sp 2.jpg','bloque 3 sp 2.jpg','0000-00-00 00:00:00','2013-04-28 00:00:00'),
 (159,14,159,'bloque 3 sp 3.jpg','bloque 3 sp 3.jpg','bloque 3 sp 3.jpg','0000-00-00 00:00:00','2013-04-28 00:00:00'),
 (164,1,164,'PREESCOLAR OFF.jpg','PREESCOLAR OFF.jpg','PREESCOLAR OFF.jpg',NULL,NULL),
 (165,1,165,'BACHILLERATO OFF.jpg','BACHILLERATO OFF.jpg','BACHILLERATO OFF.jpg',NULL,NULL),
 (166,1,166,'PRIMARIA OFF.jpg','PRIMARIA OFF.jpg','PRIMARIA OFF.jpg',NULL,NULL),
 (167,1,167,'SECUNDARIA OFF.jpg','SECUNDARIA OFF.jpg','SECUNDARIA OFF.jpg',NULL,NULL),
 (168,1,168,'Filosofía copia.png','Filosofía copia.png','Filosofía copia.png',NULL,NULL),
 (169,1,169,'botón azul transparencia jpg.jpg','botón azul transparencia jpg.jpg','botón azul transparencia jpg.jpg',NULL,NULL),
 (170,1,170,'botón azul transparencia PNG.png','botón azul transparencia PNG.png','botón azul transparencia PNG.png',NULL,NULL),
 (171,1,171,'Ubicación copia.png','Ubicación copia.png','Ubicación copia.png',NULL,NULL),
 (172,1,172,'misión copia.png','misión copia.png','misión copia.png',NULL,NULL),
 (173,1,173,'Historia copia.png','Historia copia.png','Historia copia.png',NULL,NULL),
 (174,1,174,'Escudo copia.png','Escudo copia.png','Escudo copia.png',NULL,NULL),
 (175,1,175,'visión copia.png','visión copia.png','visión copia.png',NULL,NULL),
 (176,1,176,'Valores copia.png','Valores copia.png','Valores copia.png',NULL,NULL),
 (209,21,209,'historia 3.jpg','historia 3.jpg','historia 3.jpg',NULL,NULL),
 (210,21,210,'historia 2.jpg','historia 2.jpg','historia 2.jpg',NULL,NULL),
 (211,21,211,'historia 1.jpg','historia 1.jpg','historia 1.jpg',NULL,NULL),
 (216,23,216,'escudo 1.jpg','escudo 1.jpg','escudo 1.jpg',NULL,NULL),
 (217,23,217,'escudo 2.jpg','escudo 2.jpg','escudo 2.jpg',NULL,NULL),
 (218,23,218,'escudo 4.jpg','escudo 4.jpg','escudo 4.jpg',NULL,NULL),
 (219,23,219,'escudo 3.jpg','escudo 3.jpg','escudo 3.jpg',NULL,NULL),
 (220,1,220,'Fechas de examenes.png','Fechas de examenes.png','Fechas de examenes.png',NULL,NULL),
 (221,1,221,'Ficha de Inscripcion.png','Ficha de Inscripcion.png','Ficha de Inscripcion.png',NULL,NULL),
 (222,1,222,'Informacion general copia.png','Informacion general copia.png','Informacion general copia.png',NULL,NULL),
 (239,4,239,'bloque 1 es 1 copia.jpg','bloque 1 es 1 copia.jpg','bloque 1 es 1 copia.jpg',NULL,NULL),
 (240,4,240,'bloque 1 sp 2.jpg','bloque 1 sp 2.jpg','bloque 1 sp 2.jpg',NULL,NULL),
 (241,4,241,'bloque 1 es 3.jpg','bloque 1 es 3.jpg','bloque 1 es 3.jpg',NULL,NULL),
 (242,4,242,'bloque 1 sp 4.jpg','bloque 1 sp 4.jpg','bloque 1 sp 4.jpg',NULL,NULL),
 (243,3,243,'bloque 2 es 1 copia.jpg','bloque 2 es 1 copia.jpg','bloque 2 es 1 copia.jpg',NULL,NULL),
 (244,3,244,'bloque 2 sp 2.jpg','bloque 2 sp 2.jpg','bloque 2 sp 2.jpg',NULL,NULL),
 (245,3,245,'bloque 2 es 3.jpg','bloque 2 es 3.jpg','bloque 2 es 3.jpg',NULL,NULL),
 (246,3,246,'bloque 2 sp 4.jpg','bloque 2 sp 4.jpg','bloque 2 sp 4.jpg',NULL,NULL),
 (247,5,247,'bloque 3 es1.jpg','bloque 3 es1.jpg','bloque 3 es1.jpg',NULL,NULL),
 (248,5,248,'bloque 3 sp 2.jpg','bloque 3 sp 2.jpg','bloque 3 sp 2.jpg',NULL,NULL),
 (249,5,249,'bloque 3 es 3.jpg','bloque 3 es 3.jpg','bloque 3 es 3.jpg',NULL,NULL),
 (250,5,250,'bloque 3 sp 4.jpg','bloque 3 sp 4.jpg','bloque 3 sp 4.jpg',NULL,NULL),
 (251,6,251,'bloque 4 es1.jpg','bloque 4 es1.jpg','bloque 4 es1.jpg',NULL,NULL),
 (252,6,252,'bloque 4 sp 2.jpg','bloque 4 sp 2.jpg','bloque 4 sp 2.jpg',NULL,NULL),
 (253,6,253,'bloque 4 es 3.jpg','bloque 4 es 3.jpg','bloque 4 es 3.jpg',NULL,NULL),
 (254,6,254,'bloque 4 sp 4.jpg','bloque 4 sp 4.jpg','bloque 4 sp 4.jpg',NULL,NULL),
 (255,1,255,'fondo textos.jpg','fondo textos.jpg','fondo textos.jpg',NULL,NULL),
 (256,17,256,'MISION ES 1.jpg','MISION ES 1.jpg','MISION ES 1.jpg',NULL,NULL),
 (257,17,257,'MISION CSP 1.jpg','MISION CSP 1.jpg','MISION CSP 1.jpg',NULL,NULL),
 (258,17,258,'MISION ES 2.jpg','MISION ES 2.jpg','MISION ES 2.jpg',NULL,NULL),
 (259,17,259,'MISION CSP 2.jpg','MISION CSP 2.jpg','MISION CSP 2.jpg',NULL,NULL),
 (260,18,260,'VISION ES 1.jpg','VISION ES 1.jpg','VISION ES 1.jpg',NULL,NULL),
 (261,18,261,'VISION CSP 1.jpg','VISION CSP 1.jpg','VISION CSP 1.jpg',NULL,NULL),
 (262,18,262,'VISION ES 2.jpg','VISION ES 2.jpg','VISION ES 2.jpg',NULL,NULL),
 (263,18,263,'VISION CSP 2.jpg','VISION CSP 2.jpg','VISION CSP 2.jpg',NULL,NULL),
 (264,20,264,'VALORES ES 1.jpg','VALORES ES 1.jpg','VALORES ES 1.jpg',NULL,NULL),
 (265,20,265,'VALORES CSP 1.jpg','VALORES CSP 1.jpg','VALORES CSP 1.jpg',NULL,NULL),
 (266,20,266,'VALORES ES 2.jpg','VALORES ES 2.jpg','VALORES ES 2.jpg',NULL,NULL),
 (267,20,267,'VALORES CSP 2.jpg','VALORES CSP 2.jpg','VALORES CSP 2.jpg',NULL,NULL),
 (268,19,268,'FILOSOFIA ES 1.jpg','FILOSOFIA ES 1.jpg','FILOSOFIA ES 1.jpg',NULL,NULL),
 (269,19,269,'FILOFIA CSP 1.jpg','FILOFIA CSP 1.jpg','FILOFIA CSP 1.jpg',NULL,NULL),
 (270,19,270,'FILOSOFIA ES 2.jpg','FILOSOFIA ES 2.jpg','FILOSOFIA ES 2.jpg',NULL,NULL),
 (271,19,271,'FILOSOFIA CSP 2.jpg','FILOSOFIA CSP 2.jpg','FILOSOFIA CSP 2.jpg',NULL,NULL),
 (272,24,272,'INFORMACION GENERAL.jpg','INFORMACION GENERAL.jpg','INFORMACION GENERAL.jpg',NULL,NULL),
 (274,24,274,'INFORMACION GENERAL 2.jpg','INFORMACION GENERAL 2.jpg','INFORMACION GENERAL 2.jpg',NULL,NULL),
 (275,24,275,'INFORMACION GENERAL 3.jpg','INFORMACION GENERAL 3.jpg','INFORMACION GENERAL 3.jpg',NULL,NULL),
 (276,24,276,'INFORMACION GENERAL 4.jpg','INFORMACION GENERAL 4.jpg','INFORMACION GENERAL 4.jpg',NULL,NULL),
 (277,24,277,'INFORMACION GENERAL 5.jpg','INFORMACION GENERAL 5.jpg','INFORMACION GENERAL 5.jpg',NULL,NULL),
 (278,24,278,'INFORMACION GENERAL 6.jpg','INFORMACION GENERAL 6.jpg','INFORMACION GENERAL 6.jpg',NULL,NULL),
 (280,24,280,'INFORMACION GENERAL7.jpg','INFORMACION GENERAL7.jpg','INFORMACION GENERAL7.jpg',NULL,NULL),
 (281,24,281,'INFORMACION GENERAL 8.jpg','INFORMACION GENERAL 8.jpg','INFORMACION GENERAL 8.jpg',NULL,NULL),
 (282,1,282,'BOTON INTERCAMBIOS ON copia.jpg','BOTON INTERCAMBIOS ON copia.jpg','BOTON INTERCAMBIOS ON copia.jpg',NULL,NULL),
 (283,1,283,'boton publicaciones ON copia.jpg','boton publicaciones ON copia.jpg','boton publicaciones ON copia.jpg',NULL,NULL),
 (284,1,284,'contacto ON copia.jpg','contacto ON copia.jpg','contacto ON copia.jpg',NULL,NULL),
 (285,1,285,'boton publicaciones OFF copia.jpg','boton publicaciones OFF copia.jpg','boton publicaciones OFF copia.jpg',NULL,NULL),
 (286,1,286,'contacto OFF copia.jpg','contacto OFF copia.jpg','contacto OFF copia.jpg',NULL,NULL),
 (288,1,287,'en_construccion','en_construccion','en_construccion.jpg',NULL,NULL),
 (289,1,289,'en_construccion_small','en_construccion_small','en_construccion.jpg',NULL,NULL),
 (302,15,302,'01.jpg','01.jpg','01.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (314,15,314,'02.jpg','02.jpg','02.jpg','2013-03-13 00:00:00','2013-03-14 00:00:00'),
 (315,15,315,'03.jpg','03.jpg','03.jpg',NULL,NULL),
 (316,15,316,'04.jpg','04.jpg','04.jpg',NULL,NULL),
 (317,15,317,'05.jpg','05.jpg','05.jpg',NULL,NULL),
 (318,15,318,'06.jpg','06.jpg','06.jpg',NULL,NULL),
 (319,15,319,'07.jpg','07.jpg','07.jpg',NULL,NULL),
 (320,15,320,'08.jpg','08.jpg','08.jpg',NULL,NULL),
 (321,15,321,'09.jpg','09.jpg','09.jpg',NULL,NULL),
 (322,15,322,'10.jpg','10.jpg','10.jpg',NULL,NULL),
 (323,15,323,'11.jpg','11.jpg','11.jpg',NULL,NULL),
 (324,15,324,'12.jpg','12.jpg','12.jpg',NULL,NULL),
 (325,1,325,'exalumnos copia.png','exalumnos copia.png','exalumnos copia.png',NULL,NULL),
 (326,1,326,'revistas copia.png','revistas copia.png','revistas copia.png',NULL,NULL),
 (327,1,327,'contacto copia.png','contacto copia.png','contacto copia.png',NULL,NULL),
 (328,1,328,'gacetas copia.png','gacetas copia.png','gacetas copia.png',NULL,NULL),
 (329,1,329,'intercambios copia.png','intercambios copia.png','intercambios copia.png',NULL,NULL),
 (330,1,330,'intercambios OFF copia.jpg','intercambios OFF copia.jpg','intercambios OFF copia.jpg',NULL,NULL),
 (331,1,331,'formulario copia.png','formulario copia.png','formulario copia.png',NULL,NULL),
 (332,1,332,'objetivo copia.png','objetivo copia.png','objetivo copia.png',NULL,NULL),
 (333,1,333,'reglamento copia.png','reglamento copia.png','reglamento copia.png',NULL,NULL),
 (334,1,334,'organismos copia.png','organismos copia.png','organismos copia.png',NULL,NULL),
 (335,1,335,'bachillerato copia.png','bachillerato copia.png','bachillerato copia.png',NULL,NULL),
 (336,1,336,'primaria copia.png','primaria copia.png','primaria copia.png',NULL,NULL),
 (337,1,337,'preescolar copia.png','preescolar copia.png','preescolar copia.png',NULL,NULL),
 (338,1,338,'secundaria copia.png','secundaria copia.png','secundaria copia.png',NULL,NULL),
 (339,25,339,'revistaprueba.jpg','revistaprueba.jpg','revistaprueba.jpg',NULL,NULL),
 (340,25,340,'revista febrero 2013 PDF.JPG','revista febrero 2013','revista febrero 2013 PDF.JPG',NULL,NULL),
 (341,25,341,'revista ENERO FINAL CURVAS.JPG','revista ENERO 2013','revista ENERO FINAL CURVAS.JPG',NULL,NULL),
 (342,25,342,'revista noviembre 2012.jpg','revista noviembre 2012','revista noviembre 2012.jpg',NULL,NULL),
 (343,1,343,'Alianzas copia.png','Alianzas copia.png','Alianzas copia.png',NULL,NULL),
 (344,1,344,'preescolares copia.png','preescolares copia.png','preescolares copia.png',NULL,NULL),
 (345,1,345,'universidades copia.png','universidades copia.png','universidades copia.png',NULL,NULL),
 (346,1,346,'organismos a copia.png','organismos a copia.png','organismos a copia.png',NULL,NULL),
 (351,1,351,'bloque 2 quiénes somos copia.png','bloque 2 quiénes somos copia.png','bloque 2 quiénes somos copia.png',NULL,NULL),
 (352,1,352,'bloque 1 quiénes somos copia.png','bloque 1 quiénes somos copia.png','bloque 1 quiénes somos copia.png',NULL,NULL),
 (353,1,353,'bloque 4 quiénes somos copia.png','bloque 4 quiénes somos copia.png','bloque 4 quiénes somos copia.png',NULL,NULL),
 (354,1,354,'bloque 3 quiénes somos copia.png','bloque 3 quiénes somos copia.png','bloque 3 quiénes somos copia.png',NULL,NULL),
 (355,1,355,'bloque 2 admisiones copia.png','bloque 2 admisiones copia.png','bloque 2 admisiones copia.png',NULL,NULL),
 (356,1,356,'bloque 1 admisiones copia.png','bloque 1 admisiones copia.png','bloque 1 admisiones copia.png',NULL,NULL),
 (357,1,357,'bloque 4 admisiones copia.png','bloque 4 admisiones copia.png','bloque 4 admisiones copia.png',NULL,NULL),
 (358,1,358,'bloque 3 admisiones copia.png','bloque 3 admisiones copia.png','bloque 3 admisiones copia.png',NULL,NULL),
 (359,1,359,'bachillerato rojo copia.png','bachillerato rojo copia.png','bachillerato rojo copia.png',NULL,NULL),
 (360,1,360,'secundaria rojo copia.png','secundaria rojo copia.png','secundaria rojo copia.png',NULL,NULL),
 (361,1,361,'primaria rojo copia.png','primaria rojo copia.png','primaria rojo copia.png',NULL,NULL),
 (362,1,362,'preescolar rojo copia.png','preescolar rojo copia.png','preescolar rojo copia.png',NULL,NULL),
 (363,1,363,'BCOMUNIDADIMON.jpg','','BODY COMUNIDAD IM ON.jpg',NULL,NULL),
 (364,1,364,'BCOMUNIDADIM OFF.jpg','','BODY COMUNIDAD IM.jpg',NULL,NULL),
 (365,1,365,'HEADER COMUNIDAD IM ON.jpg','HEADER COMUNIDAD IM ON.jpg','HEADER COMUNIDAD IM ON.jpg',NULL,NULL),
 (367,14,157,'bloque 3 sp 1_3.jpg','','_157_2.jpg',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `gallery_photo` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`index_sliders`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`index_sliders`;
CREATE TABLE  `modeloed_pagweb_dev`.`index_sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `portada_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_index_sliders_sliders1` (`slider_id`),
  KEY `fk_index_sliders_portadas1` (`portada_id`),
  CONSTRAINT `fk_index_sliders_portadas1` FOREIGN KEY (`portada_id`) REFERENCES `portadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_index_sliders_sliders1` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`index_sliders`
--

/*!40000 ALTER TABLE `index_sliders` DISABLE KEYS */;
LOCK TABLES `index_sliders` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`index_sliders` VALUES  (1,3,1,1),
 (2,4,2,1),
 (3,5,3,1),
 (4,6,4,1),
 (5,15,1,2),
 (6,8,2,2),
 (7,9,3,2),
 (8,10,4,2),
 (9,2,1,3),
 (10,12,2,3),
 (11,13,3,3),
 (12,14,4,3);
UNLOCK TABLES;
/*!40000 ALTER TABLE `index_sliders` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`informacion_constante`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`informacion_constante`;
CREATE TABLE  `modeloed_pagweb_dev`.`informacion_constante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `politicas_de_privacidad` text,
  `datos_de_ubicacion` text,
  `link_facebook` varchar(500) DEFAULT NULL,
  `link_twitter` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`informacion_constante`
--

/*!40000 ALTER TABLE `informacion_constante` DISABLE KEYS */;
LOCK TABLES `informacion_constante` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`informacion_constante` VALUES  (1,'<p><strong>Política De Privacidad.</strong></p>\r\n<p>Por medio de nuestra política de privacidad le ponemos al tanto de las debidas condiciones de uso en este sitio.</p>\r\n<p>La utilización de estos implica su aceptación plena y sin reservas a todas y cada una de las disposiciones incluidas en este Aviso Legal, por lo que si usted no está de acuerdo con cualquiera de las condiciones aquí establecidas, no deberá usar u/o acceder a este sitio.</p>\r\n<p>Reservamos el derecho a modificar esta Declaración de Privacidad en cualquier momento. Su uso continuo de cualquier porción de este sitio tras la notificación o anuncio de tales modificaciones constituirá su aceptación de tales cambios.</p>\r\n<p><strong>Galletas o Cookies.</strong></p>\r\n<p>Este sitio hace uso de cookies, el cual son pequeños ficheros de datos que se generan en su ordenador, el cual envía información sin proporcionar referencias que permitan deducir datos personales de este.</p>\r\n<p>Usted podrá configurar su navegador para que notifique y rechace la instalación de las cookies enviadas por este sitio, sin que ello perjudique la posibilidad de acceder a los contenidos. Sin embargo, no nos responsabilizamos de que la desactivación de los mismos impida el buen funcionamiento de la del sitio.</p>\r\n<p><strong>Marcas Web o Web Beacons.</strong></p>\r\n<p>Al igual que las cookies este sitio también puede contener web beacons, un archivo electrónico gráfico que permite contabilizar a los usuarios que acceden al sitio o acceden a determinadas cookies del mismo, de esta manera, podremos ofrecerle una experiencia aún más personalizada.</p>\r\n<p><strong>Acciones De Terceros.</strong></p>\r\n<p>Asimismo, usted encontrará dentro de este sitio, páginas, promociones, micrositios, tiendas virtuales, encuestas, patrocinadores, publicistas, contratistas y/o socios y servicios comerciales, en conjunto con otros servicios compartidos, propios o cobrandeados con terceros (&rdquo;Sitios Cobrandeados&rdquo;) que le podrán solicitar Información, los cuales este sitio le podrá revelar información proporcionada por usted.<br />\r\n  La Información que se proporcione en estos Sitios Cobrandeados esta sujeta a las políticas de privacidad o leyendas de responsabilidad de Información que se desplieguen en dichos Sitios y no estará sujeta a esta política de privacidad. Por lo que recomendamos ampliamente a los Usuarios a revisar detalladamente las políticas de privacidad que se desplieguen en los Sitios Cobrandeados.</p>\r\n<p>Política De Privacidad De La Publicidad Proporcionada En Este Sitio:</p>\r\n<p>Google Adsense: http://www.google.com/intl/es_ALL/privacypolicy.html<br />\r\n  InfoLinks: http://www.infolinks.com/es/infolinks-privacy-policy</p>\r\n<p>Nosotros estudiamos las preferencias de nuestros usuarios, sus características demográficas, sus patrones de tráfico, y otra información en conjunto para comprender mejor quiénes constituyen nuestra audiencia y qué es lo que usted necesita. El rastreo de las preferencias de nuestros usuarios también nos ayuda a servirle a usted los avisos publicitarios más relevantes.</p>\r\n<p>Política De Privacidad De Fuentes De Rastreo Utilizadas En Este Sitio:</p>\r\n<p>Google (Analytics): http://www.google.com/intl/es_ALL/privacypolicy.html</p>\r\n<p><strong>Política De Protección De Datos Personales</strong></p>\r\n<p>Para utilizar algunos de los servicios o acceder a determinados contenidos, deberá proporcionar previamente ciertos datos de carácter personal, que solo serán utilizados para el propósito que fueron recopilados.</p>\r\n<p>El tipo de la posible Información que se le sea solicitada incluye, de manera enunciativa más no limitativa, su nombre, dirección de correo electrónico (e-mail), fecha de nacimiento, sexo, ocupación, país y ciudad de origen e intereses personales, entre otros, no toda la Información solicitada al momento de participar en el sitio es obligatoria de proporcionarse, salvo aquella que consideremos conveniente y que así se le haga saber.</p>\r\n<p>Cómo principio general, este sitio no comparte ni revela información obtenida, excepto cuando haya sido autorizada por usted, o en los siguientes casos:<br />\r\n  a) Cuando le sea requerido por una autoridad competente y previo el cumplimiento del trámite legal correspondiente y b) Cuando a juicio de este sitio sea necesario para hacer cumplir las condiciones de uso y demás términos de esta página, o para salvaguardar la integridad de los demás usuarios o del sitio.<br />\r\n  Deberá estar consciente de que si usted voluntariamente revela información personal en línea en un área pública, esa información puede ser recogida y usada por otros. Nosotros no controlamos las acciones de nuestros visitantes y usuarios.</p>\r\n<p><strong>Conducta Responsable.</strong></p>\r\n<p>Toda la información que facilite deberá ser veraz. A estos efectos, usted garantiza la autenticidad de todos aquellos datos que comunique como consecuencia de la cumplimentación de los formularios necesarios para la suscripción de los Servicios, acceso a contenidos o áreas restringidas del sitio. En todo caso usted será el único responsable de las manifestaciones falsas o inexactas que realice y de los perjuicios que cause a este sitio o a terceros por la información que facilite.</p>\r\n<p>Usted se compromete a actuar en forma responsable en este sitio y a tratar a otros visitantes con respeto.</p>','CAMPUS ESTRELLA DEL SUR<br />\n49 Poniente No. 5102 Fracc. Estrella del Sur  C.P. 72190  Puebla, Pue., México \nTeléfono y Fax: 2490727 / 40\n<br /><br />\nCAMPUS SAN PEDRO<br />\nCamino Real a Cholula No. 4232\nC.P. 72760  San Pedro Cholula, Pue., México<br />  Teléfonos: 4046541 / 42, 4036211 / 12,  2966041 / 42',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `informacion_constante` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`menus`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`menus`;
CREATE TABLE  `modeloed_pagweb_dev`.`menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seccion_id` int(11) NOT NULL,
  `gallery_photo_id` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menus_secciones1` (`seccion_id`),
  KEY `fk_menus_gallery_photo1` (`gallery_photo_id`),
  CONSTRAINT `fk_menus_gallery_photo1` FOREIGN KEY (`gallery_photo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_menus_secciones1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`menus`
--

/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
LOCK TABLES `menus` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`menus` VALUES  (1,1,352,1),
 (2,1,351,2),
 (3,1,354,3),
 (4,1,353,4),
 (5,2,356,1),
 (6,2,355,2),
 (7,2,358,3),
 (8,2,357,4),
 (9,6,64,3),
 (10,6,65,1),
 (11,6,66,2),
 (12,6,67,4),
 (13,10,65,1),
 (14,10,66,2),
 (15,10,64,3),
 (16,10,67,4);
UNLOCK TABLES;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`menus_areas_sensibles`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`menus_areas_sensibles`;
CREATE TABLE  `modeloed_pagweb_dev`.`menus_areas_sensibles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `index_slider_id` int(11) DEFAULT NULL,
  `x1` int(11) DEFAULT NULL,
  `x2` int(11) DEFAULT NULL,
  `y1` int(11) DEFAULT NULL,
  `y2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menus_areas_sensibles_menus1` (`menu_id`),
  KEY `fk_menus_areas_sensibles_index_sliders1` (`index_slider_id`),
  CONSTRAINT `fk_menus_areas_sensibles_index_sliders1` FOREIGN KEY (`index_slider_id`) REFERENCES `index_sliders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_menus_areas_sensibles_menus1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`menus_areas_sensibles`
--

/*!40000 ALTER TABLE `menus_areas_sensibles` DISABLE KEYS */;
LOCK TABLES `menus_areas_sensibles` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`menus_areas_sensibles` VALUES  (1,1,NULL,128,247,2,117),
 (2,2,NULL,127,248,2,118),
 (3,3,NULL,385,507,126,244),
 (4,3,NULL,1,121,0,118),
 (5,3,NULL,257,377,0,117),
 (6,3,NULL,128,247,126,246),
 (7,3,NULL,3,122,253,370),
 (8,4,NULL,NULL,NULL,NULL,NULL),
 (9,5,NULL,129,252,127,244),
 (10,7,NULL,2,120,126,245),
 (11,8,NULL,0,119,0,117),
 (12,NULL,8,130,245,4,116),
 (13,9,NULL,128,247,2,118),
 (14,9,NULL,0,118,126,245),
 (15,9,NULL,386,503,126,244),
 (16,9,NULL,257,376,253,368),
 (17,NULL,12,130,245,4,116),
 (20,15,NULL,128,247,2,118),
 (21,15,NULL,0,126,118,245),
 (22,15,NULL,386,503,126,244),
 (23,15,NULL,257,376,253,368);
UNLOCK TABLES;
/*!40000 ALTER TABLE `menus_areas_sensibles` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`portadas`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`portadas`;
CREATE TABLE  `modeloed_pagweb_dev`.`portadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_photo_id` int(11) DEFAULT NULL,
  `boton_id` int(11) DEFAULT NULL,
  `boton_activo_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_portadas_gallery_photo1` (`gallery_photo_id`),
  KEY `fk_portadas_gallery_photo2` (`boton_id`),
  KEY `fk_portadas_gallery_photo3` (`boton_activo_id`),
  CONSTRAINT `fk_portadas_gallery_photo1` FOREIGN KEY (`gallery_photo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_portadas_gallery_photo2` FOREIGN KEY (`boton_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_portadas_gallery_photo3` FOREIGN KEY (`boton_activo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`portadas`
--

/*!40000 ALTER TABLE `portadas` DISABLE KEYS */;
LOCK TABLES `portadas` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`portadas` VALUES  (1,72,NULL,NULL,'Index'),
 (2,73,77,80,'Campus Estrella del Sur'),
 (3,74,76,81,'Campus San Pedro');
UNLOCK TABLES;
/*!40000 ALTER TABLE `portadas` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`secciones`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`secciones`;
CREATE TABLE  `modeloed_pagweb_dev`.`secciones` (
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
  KEY `fk_secciones_portadas1` (`portada_id`),
  CONSTRAINT `fk_secciones_gallery_photo1` FOREIGN KEY (`imagen_boton_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_secciones_gallery_photo2` FOREIGN KEY (`imagen_boton_activo_id`) REFERENCES `gallery_photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_secciones_portadas1` FOREIGN KEY (`portada_id`) REFERENCES `portadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`secciones`
--

/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
LOCK TABLES `secciones` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`secciones` VALUES  (1,1,19,20,'¿Quienes Somos?',1,NULL),
 (2,1,82,83,'Admisiones',2,NULL),
 (3,1,13,78,'Ex Alumnos',3,2),
 (4,1,363,364,'Comunidad Imex',4,10),
 (5,2,283,285,'Pubicaciones',1,NULL),
 (6,2,282,330,'Intercambios',2,NULL),
 (7,2,363,364,'Comunidad Imex',3,NULL),
 (8,2,284,286,'Contacto',4,3),
 (9,3,283,285,'Pubicaciones',1,NULL),
 (10,3,282,330,'Intercambios',2,NULL),
 (11,3,363,364,'Comunidad Imex',3,NULL),
 (12,3,284,286,'Contacto',4,3);
UNLOCK TABLES;
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`sliders`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`sliders`;
CREATE TABLE  `modeloed_pagweb_dev`.`sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`sliders`
--

/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
LOCK TABLES `sliders` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`sliders` VALUES  (2,'Slider de Muestra'),
 (3,'IndexArea1'),
 (4,'IndexArea2'),
 (5,'IndexArea3'),
 (6,'IndexArea4'),
 (7,'estrellaDelSurArea1'),
 (8,'estrellaDelSurArea2'),
 (9,'estrellaDelSurArea3'),
 (10,'estrellaDelSurArea4'),
 (11,'sanPedroArea1'),
 (12,'sanPedroArea2'),
 (13,'sanPedroArea3'),
 (14,'sanPedroArea4'),
 (15,'banners estrella'),
 (17,'valores mision'),
 (18,'valores vision'),
 (19,'valores filosofia'),
 (20,'valores valores'),
 (21,'fotos historia'),
 (22,'banners csp'),
 (23,'quienes somos escudo'),
 (24,'ADMISIONES INFOGRAL'),
 (25,'revista'),
 (26,'revista ES');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;


--
-- Definition of table `modeloed_pagweb_dev`.`usuarios`
--

DROP TABLE IF EXISTS `modeloed_pagweb_dev`.`usuarios`;
CREATE TABLE  `modeloed_pagweb_dev`.`usuarios` (
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
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeloed_pagweb_dev`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
LOCK TABLES `usuarios` WRITE;
INSERT INTO `modeloed_pagweb_dev`.`usuarios` VALUES  (1,'admin','11b7e5f89455a62730d7e271a363b0d4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (2,'estrella','445b867eec7a777b08a6fdb6e96bda90',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (3,'pedro','4471ad27d951d237529ff5252b6d4ff1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (4,'root','d57c3bae662cc514a59f3d8c209c8166',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (5,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo','demo','demo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (6,'demoestrella','720bf7ae7e230ca19eb24f86875bf19e','demoestrella','demoestrella','demoestrella',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (7,'demosanpedro','b2b6370bd6b24187483bf34f64ec7493','demosanpedro','demosanpedro','demosanpedro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (8,'exaimex','8ee4609c058a95966a4f574160b4d617','Prueba Plataforma89',NULL,NULL,'Prueba','Prueba','123','Pureba','prueba','12345567','','prueba@prueba','2012','prueba','empresa','',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
