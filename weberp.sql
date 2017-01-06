-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2016 a las 19:10:19
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `weberp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idioma` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `idioma`) VALUES
(1, 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm`
--

CREATE TABLE IF NOT EXISTS `crm` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fnombreTarea` text NOT NULL,
  `festado` int(11) NOT NULL,
  `fpasos` text NOT NULL,
  `fecha` text NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `crm`
--

INSERT INTO `crm` (`fid`, `fnombreTarea`, `festado`, `fpasos`, `fecha`) VALUES
(10, '(00 Muestras) (Envio de 189 Catálogo de Muestras a NeonNieto)', 30, '1- Se envió mail 2015-03-13\r\n2- Pendiente a envío (Comex)', '2015-03-13'),
(13, '(00 Muestras) de PMMA 3mm 2050x3050 {Muestra para hacer cuadro de Yenny y para hacer muestras de 20x30cm}', 30, '1- Se envio mail 2015-03-11', '2015-03-11'),
(15, '(Marketing) Revisar sitio www.polygalsud.com ', 0, 'Pendiente', '2015-02-13'),
(17, '(Marketing) Traducciones de Fichas ', 0, 'Pendiente', '2015-02-13'),
(23, '(Marketing) Fichas Leed', 5, '1-Revisar', '2015-03-23'),
(26, '(Marketing) Láminas Invernadero', 5, '1- Se solicito la lámina polycoolite\r\n2- Se contacto con la UC', '2015-03-26'),
(29, '(00 Muestras)  80 Catalogos Muestras Perú', 10, '1- Se envio mail con solicitud', '2015-05-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclientes`
--

CREATE TABLE IF NOT EXISTS `tclientes` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fnombre` text NOT NULL,
  `fempresa` text NOT NULL,
  `fdireccion` text NOT NULL,
  `fpais` text NOT NULL,
  `ftelefono` text NOT NULL,
  `fmail` text NOT NULL,
  `fnacimiento` date NOT NULL,
  `Tipo` text NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `tclientes`
--

INSERT INTO `tclientes` (`fid`, `fnombre`, `fempresa`, `fdireccion`, `fpais`, `ftelefono`, `fmail`, `fnacimiento`, `Tipo`) VALUES
(16, 'Yenny', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56999918663', 'ymeersohn@polygal.cl', '0001-01-01', 'Polygal'),
(17, 'Boris', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56322802708', 'bsantis@polygal.cl', '0001-01-01', 'Polygal'),
(18, 'Luciano Vallone', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56322802718', 'lvallone@polygal.cl', '0001-01-01', 'Polygal'),
(19, 'Ori Alon', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56322802723', 'oalon@polygal.cl', '0001-01-01', 'Polygal'),
(20, 'Marlon Falcon Hdez', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56966285622', 'mfalcon@polygal.cl', '0000-00-00', 'Polygal1'),
(21, 'Poly Arq', 'Poly Arq', 'Peru', 'Perú', '+989251736', 'marketing@polyarq.com', '0000-00-00', 'Cliente\r\n'),
(22, 'Neon Nieto CR', 'Neon Nieto CR', 'Costa Rica', 'Costa Rica', '+50622973000', 'patricia.carazo@neonnieto.com', '0001-01-01', 'Cliente'),
(23, 'Marlon Falcon Hdez', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56966285622', 'mfalcon@polygal.cl', '0000-00-00', 'Polygal1'),
(24, 'Cristembo', 'Cristembo', 'Bolivia', 'Bolivia', '+59144268042', 'cristembosrl@cotas.com.bo', '0001-01-01', 'Cliente'),
(25, 'Dumax', 'Dumax', 'Brasil', 'Brasil', '+551196126676', 'marcela.fernandes@dumaxbrasil.com.br', '0001-01-01', 'Cliente'),
(26, 'David Cuchacovich', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56942653534', 'dcuchacovich@polygal.cl', '0001-01-01', 'Polygal'),
(27, 'DVP', 'DVP', 'Lampa', 'Chile', '+56223920028', 'pabrigo@dvp.cl', '0001-01-01', 'Cliente'),
(28, 'Polygal Sud', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56322802700', 'mfalcon@polygal.cl', '0001-01-01', 'Polygal'),
(29, 'Arkos Colombia', 'Arkos Colombia', 'Colombia', 'Colombia', '+5718219096', 'bgalvis@arkos.com.co2', '0001-01-11', 'Cliente'),
(30, 'Oscar', 'Polygal Sud', 'ruta 68 km 69', 'Chile', '56322802700', 'ogonzales@polygal.cl', '0001-01-01', 'Polygal Sud'),
(31, 'Fernando Molina', 'Fernando Molina', 'Ruta 68', 'Chile', '+56322802700', 'fmolina@polyarq.com', '2001-01-01', 'Polygal'),
(32, 'Sandra Comex', 'Polygal Sud', 'ruta 68 km 69', 'Chile', '0322802700', 'comex@polygal.cl', '0001-01-01', 'Polygal'),
(33, 'Guardia Polygal', 'Polygal', 'Ruta 68', 'Chile', '+0322802700', 'polygal@polygal.cl', '0001-01-01', 'Polygal'),
(34, 'Ignacio Fernandez', 'Polygal Sud', 'Ruta 68', 'Chile', '+56966295758', 'ifernandez@polygal.cl', '0001-01-01', ''),
(35, 'Jorge Quinteros', 'Polygal Sud', 'Ruta 68', 'Chile', '+56977582126', 'jquinteros@polygal.cl', '0001-01-01', ''),
(36, 'ABASUR', 'ABASUR', 'Camino Edison 5324', 'Uruguay', '+59823238891', 'comercioexterior@abasur.com.uy', '0001-01-01', 'Cliente'),
(37, 'Paraguay', 'Paraguay', 'Paraguay', 'Paraguay', '123', 'correo123@cotas.com.bo', '0000-00-00', '1'),
(38, 'Vick', 'Vick', 'Brasil', 'Brasil', '1121212', 'vick@vick.br', '0000-00-00', '1'),
(39, 'Nicaragua', 'Nicaragua', 'Nicaragua', 'Nicaragua', '123', '1231@polygal.cl', '2012-12-12', '1'),
(40, 'HH Argentina', 'HH Argentina', 'HH Argentina', 'Argentina', '1', 'hh@cotas.com.bo', '0000-00-00', '1'),
(41, 'Republica Dominicana', 'Republica Dominicana', 'Republica Dominicana', 'Republica Dominicana', '1', 'sample@as.do', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmov`
--

CREATE TABLE IF NOT EXISTS `tmov` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fnodocumento` text NOT NULL,
  `fcan` text NOT NULL,
  `quie` text NOT NULL,
  `fecha` text NOT NULL,
  `fcodigoproducto` text NOT NULL,
  `id_quien` int(11) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

--
-- Volcado de datos para la tabla `tmov`
--

INSERT INTO `tmov` (`fid`, `fnodocumento`, `fcan`, `quie`, `fecha`, `fcodigoproducto`, `id_quien`) VALUES
(32, 'F-010101', '23', 'Ruben Sadan', 'February 23, 2015, 1:55 pm', '0000001', 0),
(33, 'S-010102', '-11', 'Yenny', 'February 23, 2015, 1:58 pm', '0000001', 0),
(34, 'S-010103', '-1', 'Luciano Vallone', 'February 23, 2015, 2:10 pm', '0000001', 0),
(35, 'S-010104', '-1', 'Ori Alon', 'February 23, 2015, 2:12 pm', '0000001', 0),
(36, 'S-010105', '-1', 'Marlon Falcon Hdez', 'February 23, 2015, 2:15 pm', '0000001', 0),
(37, 'F-010105', '20', 'Ruben Sadan', 'February 23, 2015, 2:17 pm', '00000002', 0),
(38, 'F-010106', '200', 'Nuevamerica', 'February 23, 2015, 2:24 pm', '00000003', 0),
(39, 'S-010106', '-20', 'Poly Arq', 'February 23, 2015, 2:27 pm', '00000003', 0),
(40, 'F-010105', '50', 'Nuevamerica', 'February 23, 2015, 2:48 pm', '00000004', 0),
(41, 'S-01', '-1', 'Yenny', 'February 23, 2015, 2:48 pm', '00000004', 0),
(42, 'S-01', '-1', 'Marlon Falcon Hdez', 'February 23, 2015, 2:48 pm', '00000004', 0),
(43, 'S-1', '-1', 'Boris', 'February 23, 2015, 2:49 pm', '00000004', 0),
(44, 'S-1', '-1', 'Ori Alon', 'February 23, 2015, 2:49 pm', '00000004', 0),
(45, 'S-1', '-1', 'Luciano Vallone', 'February 23, 2015, 2:52 pm', '00000004', 0),
(46, 'S-2', '-4', 'Neon Nieto CR', 'February 23, 2015, 2:56 pm', '00000004', 0),
(47, 'S-1', '-4', 'ABASUR', 'February 23, 2015, 3:00 pm', '00000004', 0),
(48, 'S-1', '-4', 'Poly Arq', 'February 23, 2015, 3:00 pm', '00000004', 0),
(49, 'S-1', '-4', 'Cristembo', 'February 23, 2015, 3:04 pm', '00000004', 0),
(50, 'S-1', '-3', 'Neon Nieto CR', 'February 23, 2015, 3:05 pm', '00000003', 0),
(51, 'S-1', '-3', 'ABASUR', 'February 23, 2015, 3:05 pm', '00000003', 0),
(52, 'S-1', '-3', 'Cristembo', 'February 23, 2015, 3:06 pm', '00000003', 0),
(53, 'S-1', '-4', 'Dumax', 'February 23, 2015, 3:08 pm', '00000004', 0),
(54, 'S-1', '-3', 'Dumax', 'February 23, 2015, 3:09 pm', '00000003', 0),
(55, 'S-1', '-1', 'David Cuchacovich', 'February 23, 2015, 3:44 pm', '0000001', 0),
(56, 'S-1', '-7', 'DVP', 'February 23, 2015, 3:46 pm', '00000004', 0),
(57, 'S-1', '-14', 'Polygal Sud', 'February 23, 2015, 3:48 pm', '00000004', 0),
(61, 'F-1', '1', 'Polygal Almacen', 'February 23, 2015, 5:40 pm', '00000005', 0),
(62, 'S-1', '-1', 'Arkos Colombia', 'February 23, 2015, 5:41 pm', '00000005', 0),
(63, 'F-N35689-RUT77616550', '500', 'Procolor', 'February 24, 2015, 9:06 pm', '00000006', 0),
(64, 'S-001', '-20', 'David Cuchacovich', 'February 24, 2015, 9:06 pm', '00000006', 0),
(65, 'S-001', '-16', 'Yenny', 'February 24, 2015, 9:06 pm', '00000006', 0),
(66, 'S-002', '-17', 'Polygal Sud', 'February 24, 2015, 9:07 pm', '00000006', 0),
(67, 'S-0-COL-PER', '-3', 'David Cuchacovich', 'February 24, 2015, 9:11 pm', '0000001', 0),
(68, 'S-001', '-1', 'Oscar', 'February 24, 2015, 9:13 pm', '0000001', 0),
(69, 'S-001', '-3', 'Polygal Sud', 'February 24, 2015, 9:16 pm', '00000004', 0),
(71, 'S-001', '-3', 'David Cuchacovich', 'February 25, 2015, 3:02 pm', '00000003', 0),
(72, 'F-0001', '325', 'Polygal Inventario', 'February 25, 2015, 10:58 pm', '00000007', 0),
(73, 'F-0001', '200', 'Nuevamerica', 'February 25, 2015, 11:01 pm', '00000008', 0),
(74, 'F-0001', '1217', 'Nuevamerica', 'February 25, 2015, 11:03 pm', '00000009', 0),
(75, 'S-01010', '-200', 'Arkos Colombia', 'February 25, 2015, 11:05 pm', '00000009', 0),
(76, 'F-0001', '650', 'Polygal Inventario', 'February 25, 2015, 11:22 pm', '00000010', 0),
(77, 'S-0001', '-50', 'Arkos Colombia', 'February 25, 2015, 11:31 pm', '00000010', 0),
(78, 'S-0001', '-5', 'Fernando Molina', 'February 26, 2015, 6:27 pm', '00000008', 0),
(79, 'S-001', '-2', 'Fernando Molina', 'February 26, 2015, 6:27 pm', '0000001', 0),
(80, 'F-001', '300', 'Procolor', 'February 26, 2015, 6:34 pm', '00000011', 0),
(81, 'S-0001', '-100', 'Yenny', 'February 26, 2015, 6:34 pm', '00000011', 0),
(82, 'S-0001', '-100', 'David Cuchacovich', 'February 26, 2015, 6:34 pm', '00000011', 0),
(83, 'S-0001', '-100', 'Marlon Falcon Hdez', 'February 26, 2015, 6:34 pm', '00000011', 0),
(84, 'F-0001', '16', 'Plazit-Iberica', 'February 26, 2015, 6:44 pm', '00000012', 0),
(85, 'F-0001', '26', 'Polygal Inventario', 'February 26, 2015, 6:46 pm', '00000013', 0),
(86, 'F-0001', '19', 'Nuevamerica', 'February 26, 2015, 6:51 pm', '00000014', 0),
(88, 'F-0001', '760', 'Polygal Inventario', 'February 26, 2015, 9:05 pm', '00000015', 0),
(89, 'F-0001', '7', 'Polygal Inventario', 'February 26, 2015, 9:17 pm', '00000016', 0),
(90, 'F-40', 'u', 'Polygal Inventario', 'February 26, 2015, 9:27 pm', '00000017', 0),
(91, 'F-001', '6', 'Nuevamerica', 'February 26, 2015, 11:01 pm', '00000018', 0),
(94, 'S-1212', '-20', 'Sandra Comex', 'March 4, 2015, 3:36 pm', '00000017', 0),
(95, 'S-001', '-3', 'Guardia Polygal', 'March 6, 2015, 10:26 pm', '00000006', 0),
(96, 'S-CHILLAN', '-40', 'DVP', 'March 8, 2015, 6:39 pm', '00000015', 0),
(97, 'S-0001', '-40', 'DVP', 'March 8, 2015, 6:39 pm', '00000006', 0),
(98, 'S-CHILLAN', '-15', 'DVP', 'March 8, 2015, 6:39 pm', '00000006', 0),
(99, 'S-CHILLAN', '-18', 'DVP', 'March 8, 2015, 6:51 pm', '00000009', 0),
(100, 'S-HH', '-13', 'David Cuchacovich', 'March 10, 2015, 3:45 pm', '00000015', 0),
(101, 'S-HH', '-10', 'David Cuchacovich', 'March 10, 2015, 3:45 pm', '00000006', 0),
(102, 'F-F2289', '1032', 'Nuevamerica', 'March 10, 2015, 6:36 pm', '00000019', 0),
(103, 'S-as1222', '-1032', 'Arkos Colombia', 'March 10, 2015, 6:37 pm', '00000019', 29),
(104, 'S-01', '-200', 'Poly Arq', 'March 13, 2015, 1:34 pm', '00000009', 0),
(105, 'S-01', '-60', 'Poly Arq', 'March 13, 2015, 1:35 pm', '00000006', 0),
(106, 'S-01', '-80', 'Poly Arq', 'March 13, 2015, 1:35 pm', '00000015', 0),
(107, 'S-01', '-160', 'DVP', 'March 13, 2015, 4:48 pm', '00000015', 0),
(108, 'S-1', '-1', 'Ignacio Fernandez', 'March 16, 2015, 5:54 pm', '0000001', 0),
(109, 'S-1', '-1', 'Jorge Quinteros', 'March 16, 2015, 5:56 pm', '0000001', 0),
(110, 'F-1', '100', 'Polygal Inventario', 'March 16, 2015, 8:02 pm', '00000017', 0),
(111, 'S-1', '-1', 'Polygal Sud', 'March 17, 2015, 3:23 pm', '00000006', 0),
(112, 'F-1', '6', 'Polygal Inventario', 'March 17, 2015, 6:49 pm', '00000020', 0),
(113, 'S-1', '-6', 'DVP', 'March 17, 2015, 6:49 pm', '00000020', 0),
(114, 'F-011', '58', 'Polygal Inventario', 'March 17, 2015, 7:51 pm', '00000021', 19),
(116, 'S-011', '-30', 'DVP', 'March 17, 2015, 7:52 pm', '00000021', 27),
(117, 'F-1', '3', 'Polygal Inventario', 'March 17, 2015, 9:32 pm', '00000022', 19),
(118, 'F-1', '104', 'Nuevamerica', 'March 17, 2015, 9:33 pm', '00000023', 16),
(119, 'F-1', '55', 'Nuevamerica', 'March 17, 2015, 9:36 pm', '00000024', 16),
(120, 'S-SODIMAC', '-40', 'DVP', 'March 24, 2015, 7:55 pm', '00000009', 0),
(121, 'S-SODIMAC', '-30', 'DVP', 'March 24, 2015, 7:56 pm', '00000006', 0),
(122, 'S-SODIMAC', '-2', 'DVP', 'March 24, 2015, 7:56 pm', '00000015', 0),
(123, 'S-2015-03-30', '-1', 'Luciano Vallone', 'March 30, 2015, 2:32 pm', '00000013', 0),
(124, 'S-001', '-10', 'Yenny', 'April 2, 2015, 11:20 pm', '00000007', 0),
(125, 'S-0012', '-7', 'Fernando Molina', 'April 16, 2015, 5:29 pm', '00000009', 0),
(126, 'F-0111', '70', 'Polygal Inventario', 'April 21, 2015, 2:55 pm', '00000025', 0),
(127, 'S-0111', '-70', 'Arkos Colombia', 'April 21, 2015, 2:56 pm', '00000025', 0),
(128, 'F-0001', '29', 'Deckdesign', 'April 21, 2015, 4:16 pm', '00000026', 0),
(129, 'S-1', '-1', 'Yenny', 'April 21, 2015, 4:16 pm', '00000026', 0),
(130, 'S-1', '-2', 'DVP', 'April 21, 2015, 4:16 pm', '00000026', 0),
(131, 'F-N36204', '250', 'Procolor', 'April 21, 2015, 5:48 pm', '00000027', 0),
(132, 'F-N36204', '250', 'Procolor', 'April 21, 2015, 5:48 pm', '00000028', 0),
(133, 'S-0001', '-50', 'DVP', 'April 21, 2015, 5:48 pm', '00000027', 0),
(134, 'S-0001', '-50', 'DVP', 'April 21, 2015, 5:48 pm', '00000028', 0),
(135, 'S-123', '-10', 'Paraguay', 'April 27, 2015, 3:59 pm', '00000009', 0),
(136, 'S-111', '-2', 'Arkos Colombia', 'April 27, 2015, 6:38 pm', '00000026', 0),
(137, 'S-1', '-2', 'ABASUR', 'April 27, 2015, 6:38 pm', '00000026', 0),
(138, 'S-2', '-2', 'Neon Nieto CR', 'April 27, 2015, 6:39 pm', '00000026', 0),
(139, 'S-123', '-2', 'Vick', 'April 27, 2015, 6:40 pm', '00000026', 0),
(140, 'S-2', '-2', 'Dumax', 'April 27, 2015, 6:41 pm', '00000026', 0),
(141, 'S-DAVID30', '-80', 'Poly Arq', 'April 30, 2015, 11:56 pm', '00000023', 0),
(142, 'S-DAVID', '-5', 'Poly Arq', 'April 30, 2015, 11:56 pm', '00000009', 0),
(143, 'F-DAVID04-05-2015', '330', 'Procolor', 'May 4, 2015, 6:05 pm', '00000029', 0),
(144, 'S-DAVID04-05-2015', '-330', 'Poly Arq', 'May 4, 2015, 6:05 pm', '00000029', 0),
(145, 'S-02', '-12', 'Arkos Colombia', 'May 6, 2015, 4:37 pm', '00000003', 0),
(146, 'S-01', '-6', 'Arkos Colombia', 'May 6, 2015, 4:37 pm', '00000012', 0),
(147, 'S-SODIMAC', '-4', 'DVP', 'May 7, 2015, 6:39 pm', '00000009', 0),
(148, 'S-DAVID01', '-5', 'Poly Arq', 'May 15, 2015, 8:51 pm', '00000009', 0),
(149, 'S-02', '-80', 'Poly Arq', 'May 19, 2015, 4:12 pm', '00000009', 0),
(150, 'S-09', '-80', 'Poly Arq', 'May 19, 2015, 4:12 pm', '00000027', 0),
(151, 'S-09', '-80', 'Poly Arq', 'May 19, 2015, 4:12 pm', '00000028', 0),
(152, 'S-09', '-17', 'Poly Arq', 'May 19, 2015, 4:14 pm', '00000010', 0),
(153, 'S-01', '-10', 'Nicaragua', 'May 19, 2015, 7:53 pm', '00000009', 0),
(154, 'S-01', '-10', 'Nicaragua', 'May 19, 2015, 7:54 pm', '00000023', 0),
(155, 'F-F-20-05-2015', '1500', 'Procolor', 'May 20, 2015, 7:27 pm', '00000030', 0),
(156, 'S-F-20-05-2015', '-99', 'DVP', 'May 20, 2015, 9:02 pm', '00000009', 0),
(163, 'S-0101', '-1', 'Luciano Vallone', 'June 3, 2015, 2:30 pm', '00000013', 0),
(165, 'F-1', '50', 'safeseguridad', 'June 3, 2015, 2:37 pm', '00000032', 0),
(166, 'S-0101', '-5', 'David Cuchacovich', 'June 4, 2015, 4:37 pm', '00000032', 0),
(170, 'F-1', '200', 'Nuevamerica', 'June 5, 2015, 6:56 pm', '00000033', 0),
(171, 'S-1', '-70', 'DVP', 'June 5, 2015, 6:56 pm', '00000033', 0),
(172, 'S-01', '-13', 'Dumax', 'June 9, 2015, 12:13 am', '00000032', 0),
(173, 'S-01', '-6', 'Dumax', 'June 9, 2015, 12:14 am', '00000014', 0),
(174, 'S-01', '-30', 'Dumax', 'June 9, 2015, 12:14 am', '00000007', 0),
(175, 'S-01', '-6', 'Dumax', 'June 9, 2015, 12:15 am', '00000002', 0),
(176, 'F-01', '500', 'Proactiva', 'June 9, 2015, 2:46 pm', '00000031	', 0),
(178, 'S-01', '-50', 'Yenny', 'June 9, 2015, 2:47 pm', '00000031	', 0),
(179, 'S-01', '-25', 'Fernando Molina', 'June 9, 2015, 2:47 pm', '00000031	', 0),
(180, 'S-01', '-30', 'David Cuchacovich', 'June 9, 2015, 2:48 pm', '00000031	', 0),
(186, 'S-01', '-150', 'Dumax', 'June 9, 2015, 3:00 pm', '00000031	', 0),
(187, 'S-01', '-180', 'HH Argentina', 'June 9, 2015, 3:01 pm', '00000031	', 0),
(188, 'S-01', '-58', 'Polygal Sud', 'June 9, 2015, 3:02 pm', '00000031	', 0),
(189, 'S-01', '-300', 'David Cuchacovich', 'June 9, 2015, 3:56 pm', '00000030', 0),
(190, 'S-01', '-300', 'HH Argentina', 'June 9, 2015, 3:57 pm', '00000030', 0),
(191, 'S-1', '-10', 'Dumax', 'June 9, 2015, 3:58 pm', '00000033', 0),
(192, 'S-01', '-10', 'DVP', 'June 10, 2015, 2:41 pm', '00000003', 0),
(193, 'S-01', '-5', 'Dumax', 'June 10, 2015, 2:41 pm', '00000003', 0),
(194, 'S-Visita Ferrocarril', '-2', 'DVP', 'June 11, 2015, 10:03 pm', '00000009', 0),
(195, 'S-Visita Ferrocarril', '-6', 'DVP', 'June 11, 2015, 10:03 pm', '00000006', 0),
(196, 'S-Visita Ferrocarril', '-2', 'DVP', 'June 11, 2015, 10:04 pm', '00000003', 0),
(197, 'S-Visita Ferrocarril', '-6', 'DVP', 'June 11, 2015, 10:04 pm', '00000027', 0),
(198, 'S-Visita Ferrocarril', '-6', 'DVP', 'June 11, 2015, 10:04 pm', '00000028', 0),
(199, 'S-012', '-50', 'Dumax', 'June 11, 2015, 10:06 pm', '00000006', 0),
(200, 'S-Cliente Nuevo', '-14', 'Fernando Molina', 'June 16, 2015, 5:12 pm', '00000023', 0),
(201, 'S-1', '-7', 'Polygal Sud', 'June 16, 2015, 5:13 pm', '00000031	', 0),
(202, 'S-1', '-1', 'Luciano Vallone', 'June 16, 2015, 5:14 pm', '00000013', 0),
(203, 'S-1', '-21', 'Neon Nieto CR', 'June 16, 2015, 5:14 pm', '00000010', 0),
(204, 'S-01', '-198', 'Dumax', 'June 18, 2015, 10:07 pm', '00000007', 0),
(205, 'S-01', '-105', 'Neon Nieto CR', 'June 18, 2015, 10:07 pm', '00000008', 0),
(206, 'S-01', '-21', 'Neon Nieto CR', 'June 18, 2015, 10:08 pm', '00000010', 0),
(207, 'S-1', '-20', 'Republica Dominicana', 'July 3, 2015, 9:29 pm', '00000009', 0),
(208, 'S-1', '-4', 'Republica Dominicana', 'July 3, 2015, 9:30 pm', '00000010', 0),
(209, 'S-10', '-10', 'David Cuchacovich', 'July 7, 2015, 3:24 pm', '00000007', 0),
(210, 'S-1', '-8', 'David Cuchacovich', 'July 7, 2015, 3:26 pm', '00000032', 0),
(212, 'F-', '100', 'Nuevamerica', 'July 7, 2015, 4:06 pm', '00000035', 0),
(213, 'F-', '100', 'Nuevamerica', 'July 7, 2015, 4:07 pm', '00000034', 0),
(214, 'F-', '100', 'Nuevamerica', 'July 7, 2015, 4:07 pm', '00000036', 0),
(215, 'F-', '100', 'Nuevamerica', 'July 7, 2015, 4:07 pm', '00000037', 0),
(216, 'S-01', '-25', 'Republica Dominicana', 'July 7, 2015, 4:08 pm', '00000034', 0),
(217, 'S-01', '-25', 'Republica Dominicana', 'July 7, 2015, 4:08 pm', '00000035', 0),
(218, 'S-01', '-25', 'Republica Dominicana', 'July 7, 2015, 4:08 pm', '00000036', 0),
(219, 'S-01', '-25', 'Republica Dominicana', 'July 7, 2015, 4:08 pm', '00000037', 0),
(220, 'S-01', '-20', 'Republica Dominicana', 'July 7, 2015, 4:09 pm', '00000009', 0),
(221, 'S-01', '-6', 'Republica Dominicana', 'July 7, 2015, 4:09 pm', '00000010', 0),
(222, 'S-01', '-40', 'Neon Nieto CR', 'July 8, 2015, 3:22 pm', '00000015', 0),
(223, 'F-01', '5', 'Fabian Plazit', 'July 8, 2015, 4:45 pm', '00000038', 0),
(224, 'S-01', '-2', 'DVP', 'July 8, 2015, 4:45 pm', '00000038', 0),
(225, 'S-01', '-10', 'Luciano Vallone', 'July 9, 2015, 11:03 pm', '00000013', 0),
(226, 'S-01', '-30', 'Cristembo', 'July 27, 2015, 2:46 pm', '00000009', 0),
(227, 'S-01', '-100', 'Cristembo', 'July 27, 2015, 2:46 pm', '00000027', 0),
(228, 'S-01', '-100', 'Cristembo', 'July 27, 2015, 2:46 pm', '00000028', 0),
(229, 'F-10', '1000', 'Proactiva', 'July 31, 2015, 10:16 pm', '00000031	', 0),
(230, 'S-DAVID', '-8', 'Poly Arq', 'August 8, 2015, 12:11 am', '00000032', 0),
(231, 'S-DAVID', '-100', 'Poly Arq', 'August 8, 2015, 12:12 am', '00000031	', 0),
(232, 'S-DAVID', '-300', 'Poly Arq', 'August 8, 2015, 12:13 am', '00000030', 0),
(233, 'S-VERONICA', '-100', 'DVP', 'August 8, 2015, 12:13 am', '00000030', 0),
(234, 'S-ESPECIFICADORA', '-1', 'DVP', 'August 8, 2015, 12:14 am', '00000038', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproductos`
--

CREATE TABLE IF NOT EXISTS `tproductos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fcodigo` text NOT NULL,
  `fnombre` text NOT NULL,
  `fum` text NOT NULL,
  `fpeso` text NOT NULL,
  `fprecio` text NOT NULL,
  `Preorden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `tproductos`
--

INSERT INTO `tproductos` (`id`, `fcodigo`, `fnombre`, `fum`, `fpeso`, `fprecio`, `Preorden`) VALUES
(2, '0000001', 'Pendriver', 'u', '0.01', '10', 10),
(9, '00000002', 'Muestrarios de TRM', 'u', '0.3', '11', 5),
(10, '00000003', 'Catálogo de Barrera', 'u', '0.01', '10', 10),
(11, '00000004', 'Calendario de Pared 2015', 'u', '0.01', '26.45', 2),
(12, '00000005', 'Muestras k-12 600x600x3.2x10u 1200x600x3.2x2u - Arkos Colombia', 'u', '13.55', '67.75', 2),
(16, '00000008', 'Cat Muestras NN', 'u', '0.7', '11.6', 10),
(17, '00000009', 'Cat Muestras ESP', 'u', '0.7', '11.6', 10),
(18, '00000010', 'Cajas', 'u', '0.1', '6.47', 5),
(19, '00000011', 'Tarjeta de Visita', 'u', '0.001', '0.32', 10),
(20, '00000012', 'Llaveros de PLAZCAST', 'u', '0.01', '3', 5),
(21, '00000013', 'CD 750M', 'u', '0.01', '0.75', 10),
(22, '00000014', 'Llavero de embozados', 'u', '0.20', '3', 10),
(24, '00000015', 'Bloc de Recomendaciones Polygal Antiguo', 'u', '0.2', '2', 4),
(25, '00000016', 'Exhibidor Campaña 2013', 'u', '0.2', '10', 2),
(26, '00000017', 'Sobre Carta antiguo', 'u', '0.001', '0.10', 6),
(27, '00000018', 'Exhibidor de Muestras Polygal Antiguo', 'u', '5', '50', 12),
(28, '00000019', 'Calendario de mesa', 'u', '0.01', '1.78', 2),
(30, '00000020', 'Muestras Topgal', 'u', '0.1', '10', 2),
(31, '00000021', 'Ficha tecnica Topgal', '58', '0.01', '5', 20),
(32, '00000022', 'Ficha tecnica Láminas Polygal', 'u', '0.01', '5', 5),
(33, '00000023', 'Ficha tecnica Corrugal', 'u', '0.01', '5', 5),
(34, '00000024', 'Ficha tecnica Skygal', 'u', '0.1', '10', 5),
(35, '00000006', 'Agenda', 'u', '0.3', '5', 2),
(36, '00000025', 'Llaveros Sodimac', 'u', '0.42', '2.73', 1),
(37, '00000026', 'Muestras K12 600x600', 'u', '0.1', '10', 3),
(38, '00000027', 'Manual de Instalacion Monogal', 'u', '0.01', '4', 20),
(39, '00000028', 'Manual de Instalacion Polygal', 'u', '0.01', '4', 10),
(40, '00000029', 'Triptico Peru', 'U', '0.01', '1.35', 0),
(41, '00000007', 'Catálogo Muestras Portugues', 'u', '0.1', '11', 10),
(42, '00000030', 'DIPTICO 22x28cm', 'u', '0.01', '0.5', 100),
(43, '00000031	', 'Llaveros', 'u', '0.01', '1.20', 10),
(44, '00000032', 'Polera Polygal', 'u', '0.01', '3', 2),
(45, '00000033', 'Ficha k12', 'u', '0.01', '2', 10),
(46, '00000034', 'Ficha Corrugal Ver II', 'u', '0.01', '3', 10),
(47, '00000035', 'Ficha Monogal Ver II', 'u', '0.01', '3', 10),
(48, '00000036', 'Ficha Polygal Ver II', '0', '0.01', '3', 10),
(49, '00000037', 'Carpetas II', 'u', '0.01', '3', 10),
(50, '00000038', 'Caja de Barreras ', 'u', '0.5', '10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedores`
--

CREATE TABLE IF NOT EXISTS `tproveedores` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fnombre` text NOT NULL,
  `fempresa` text NOT NULL,
  `fdireccion` text NOT NULL,
  `fpais` text NOT NULL,
  `ftelefono` text NOT NULL,
  `fmail` text NOT NULL,
  `fnacimiento` date NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `tproveedores`
--

INSERT INTO `tproveedores` (`fid`, `fnombre`, `fempresa`, `fdireccion`, `fpais`, `ftelefono`, `fmail`, `fnacimiento`) VALUES
(16, 'Nuevamerica', 'Nuevamerica', 'Bombero Nuñes , SCH, Chile', 'Chile', '+56227771498', 'fguzman@nuevamerica.cl', '2001-01-01'),
(17, 'Ruben Sadan', 'Plazit Polygal', 'Israel', 'Israel', '+9724956213', 'ruven@plazit-polygal.com', '0000-00-00'),
(18, 'Procolor', 'Procolor', 'Eduardo Hyatt 572', 'Chille', '+567376514', 'ncifuentes@procolor.cl', '0001-01-01'),
(19, 'Polygal Inventario', 'Polygal Inventario', 'Polygal Inventario', 'Chile', '+562802700', 'mfalcon@polygal.cl', '0001-01-01'),
(20, 'Polygal Almacen', 'Polygal Sud', 'Ruta 68, km 69, Casablanca', 'Chile', '+56322802700', 'mfalcon@polygal.cl', '0001-01-01'),
(21, 'Plazit-Iberica', 'Plazit-Iberica', 'España', 'España', '+34649872438', 'ricard.culubret@plazit-polygal.com', '0001-01-01'),
(22, 'Deckdesign', 'Deckdesign', 'Lampa', 'Chile', '77729430', 'cgarcia@deckdesign.cl', '0001-01-01'),
(23, 'Proactiva', 'Proactiva', 'Proactiva', 'Chile', '123', 'Pro@Proactiva.cl', '0000-00-00'),
(24, 'safeseguridad', 'safeseguridad', 'safeseguridad', 'Chile', '+5695342122', 'jtapia@safeseguridad.cl', '0000-00-00'),
(25, 'Fabian Plazit', 'Plazit Israel', 'Israel', 'Israel', '+972508818896', 'fabian@plazit-polygal.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE IF NOT EXISTS `tusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `fpass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`id`, `fname`, `fpass`) VALUES
(1, 'marlon', '1a1dc91c907325c69271ddf0c944bc72'),
(4, 'claudio', '1a1dc91c907325c69271ddf0c944bc72');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
