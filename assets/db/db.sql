-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2016 a las 13:08:29
-- Versión del servidor: 5.7.16-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutorialci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `idarchivo` int(11) NOT NULL,
  `archivo` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`idarchivo`, `archivo`) VALUES
(15, 'font-awesome-4_6_3.zip'),
(16, 'font-awesome-4_6_31.zip'),
(17, 'font-awesome-4_6_32.zip'),
(18, 'font-awesome-4_6_33.zip');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` int(11) NOT NULL,
  `captcha_time` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `word` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(2) NOT NULL,
  `cat_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`) VALUES
(1, 'Teléfonos Celulares'),
(2, 'Televisores'),
(3, 'Sistemas de Audio y Video'),
(4, 'GPS'),
(5, 'Tablet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idciudad` int(11) NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `ciudad`) VALUES
(1, 'buenos aires'),
(2, 'formosa'),
(3, 'cordova'),
(4, 'santa fe'),
(5, 'jujuy'),
(6, 'la pampa'),
(7, 'mendoza'),
(8, 'entre rios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `appaterno` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apmaterno` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dni` char(8) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecnac` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idciudad` int(11) DEFAULT NULL,
  `imagen` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `appaterno`, `apmaterno`, `email`, `dni`, `fecnac`, `idciudad`, `imagen`) VALUES
(15, 'cristian', 'veizaga', 'huarachi', 'cristian@gmail.com', '71707213', '06/08/1994', 4, 'galaxy-s2.png'),
(20, 'mario', 'mendes', 'alfa', 'mario@gmail.com', '94654559', '12/15/1980', 2, 'foto.png'),
(21, 'gonzalo', 'smith', 'bautes', 'gonza@gmail.com', '48592659', '05/09/2015', 7, 'PaginaWeb_ComputacionG.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prd_id` int(11) NOT NULL,
  `prd_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `prd_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `prd_precio` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_foto1` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'sin-foto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prd_id`, `prd_nombre`, `prd_descripcion`, `prd_precio`, `cat_id`, `prd_foto1`) VALUES
(1, 'Iphone 4s 16gb', 'Teléfono celular Apple iPhone 4S de 16GB. Wifi, 3g, Gps, cámara de 8mp, pantalla HD (retina display) de 3.5 pulgadas.\r\nLibre de fábrica.\r\nIOS 5, procesador A5 dual core, doble cámara, sistema de control por voz Siri.', 4400, 1, 'iphone4s.png'),
(2, 'Samsung Galaxy S2', 'Teléfono celular 3g, Wifi, Android 2.3 Dual Core 1.2ghz, 16gb, Pantalla 4.27 pulgadas Super Amoled Plus.', 2650, 1, 'galaxy-s1.png'),
(3, 'Samsung Galaxy S', 'Teléfono celular con procesador ARM Cortex-A8 de 1 GHz, pantalla de 4 pulgadas con tecnología Super Clear LCD, 4Gb, cámara de 5 MP, Wifi, 3g.', 1600, 1, 'galaxy-s2.png'),
(4, 'HTC INSPIRE 4g', 'Teléfono celular con procesador Qualcomm de 1Ghz, 36gb, Gps, Wifi, 3g, pantalla SUPER LCD 4.3 pulgadas, Android 2.2 Froyo con HTC Sense.', 3026, 1, 'htc-inspire.png'),
(5, 'Televisor Led Samsung Un55c9000 ', 'Televidor Led de 55 pulgadas, 3D, resolución: 1920 x 1080, Full HD, Anynet+ (HDMI-CEC), Internet@TV, Skype on Samsung TV, Ethernet (LAN) x 1, WiFi Adaptor Support', 25900, 2, 'samsung-Un55c9000.png'),
(6, 'Televisor Led Samsung Un40c7000', 'Televidor Led de 40 pulgadas, 3D, resolución: 1920 x 1080, Full HD, Anynet+ (HDMI-CEC), Internet@TV, Skype on Samsung TV, Ethernet (LAN) x 1, WiFi Adaptor Support', 11100, 2, 'samsung-Un40c7000.png'),
(7, 'Televisor LED Sony Bravia KDL-46EX715', 'Televisor LED Sony 46 pulgadas, Full HD 1080p, BRAVIA Engine 3, Motionflow 120Hz, Wireless LAN Ready, Reproductor USB.', 10799, 2, 'Sony-Bravia-KDL-46EX715.png'),
(8, 'Apple Tv 2', 'Apple Tv2 Hdmi Wi-fi Wireless C/ Apple Remote, procesador A4 de 1GHz, Airplay Mirroring, Photo Stream, compatible con iCloud.\r\nControlá tu multimedia con al Apple Remote o desde tu iPhone, iPad o iPod.', 850, 3, 'appleTV1.png'),
(9, 'Apple Tv', 'Apple Tv2 Hdmi Wi-fi Wireless C/ Apple Remote, procesador Intel Pentium M de 1GHz, Airplay Mirroring, Photo Stream, compatible con iCloud.\r\nControlá tu multimedia con al Apple Remote o desde tu iPhone, iPad o iPod.', 450, 3, 'appleTV2.png'),
(10, 'Bose Sounddock 10', 'Sistema De Musica Digital Bose Sounddock 10 Para Ipod/iphone. DockStation.\r\nCompatible con las nuevas líneas de iPhone y de iPod. Bluetooth. Salida de video a un televisor o monitor.', 4500, 3, 'Bose-SoundDockr-10.png'),
(11, 'Garmin Nuvi 1490t', 'Gps Garmin Nuvi 1490t. Pantalla Lcd de 5 pulgadas,  Bluetooth, 4Gb internos de memoria, admite tarjetas de memoria microSD.  ', 1100, 4, 'garmin.png'),
(12, 'iPad 2 de 32GB Wifi', 'iPad 2 de 32 GB: pantalla de led retroiluminada de 9.7 pulgadas, \r\nWifi, Bluetooth, doble cámara; frontal y trasera.\r\nIOS 5, procesador A5 dual core.\r\nMultitouch. Airplay Mirroring, compatible con iCloud, Facetime, Airprint ', 3650, 5, 'iPad2.png'),
(13, 'Samsung Galaxy Tab', 'Samsung Galaxy Tab de 16gb, pantalla de 10 pulgadas, Wifi, procesador NVIDIA Tegra 2 Dual Core 1Ghz, doble cámara.', 3450, 5, 'galaxy-tab.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usu_nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usu_clave` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idpersona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usu_nombre`, `usu_clave`, `idpersona`) VALUES
(15, 'cristian', '87b43435284539b2f7f4e4dcab5e78251c243226', 15),
(20, 'leo', '1f0a51c36efaa0f44e4899c26d2028681997c8ea', 20),
(21, 'gonza', 'eaa8094a8c1738b06f5190f87c81cb0ce482a4db', 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`idarchivo`);

--
-- Indices de la tabla `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idciudad`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idpersona_idx` (`idpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `idarchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `idpersona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
