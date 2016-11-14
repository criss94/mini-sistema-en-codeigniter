-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-11-2016 a las 19:48:19
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
(15, 'cristian', 'veizaga', 'huarachi', 'cristian@gmail.com', '12121212', '04/8/1995', 1, 'garmin2.png'),
(18, 'jose', 'peres', 'mendes', 'jose@gmail.com', '45788956', '12/10/1892', 6, 'foto1.png'),
(25, 'carlos', 'ruis', 'lopes', 'carlos@hotmail.com', '94788889', '25/10/1960', 6, 'diseno+de+paginas+web.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prd_id` int(11) NOT NULL,
  `prd_nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `prd_descripcion` text CHARACTER SET utf8,
  `prd_precio` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
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
(25, NULL, NULL, NULL, NULL, 'sin-foto.png'),
(27, '', '', 0, 0, 'sin-foto.png'),
(28, 'cdscd', 'cdscd', 115, 0, 'galaxy-s23.png');

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
(15, 'cristian', '9d97242961a5796518244f05110458b010878c4d', 15),
(18, 'jose', '4a3487e57d90e2084654b6d23937e75af5c8ee55', 18),
(25, 'carlos', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', 25);

--
-- Índices para tablas volcadas
--

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
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
