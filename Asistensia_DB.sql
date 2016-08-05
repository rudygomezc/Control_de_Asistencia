CREATE DATABASE `asistencia_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `asistencia_db`;
CREATE TABLE `empleado` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `profesion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `habilitado` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `asistencia` (
`id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
`id_personal` int(11) NOT NULL,
`tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
`sub_tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
`fecha` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
`hora` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
PRIMARY KEY (`id_asistencia`),
KEY `fk_asistencia_personal1` (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=274;

CREATE TABLE IF NOT EXISTS `horarios` (
`id_horario` int(11) NOT NULL AUTO_INCREMENT,
`descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
`hora_entrada` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
`hora_salida` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
`hora_salida_almuerzo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
`hora_entrada_almuerzo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4;

CREATE TABLE IF NOT EXISTS `permisos` (
`id_permiso` int(11) NOT NULL AUTO_INCREMENT,
`id_personal` int(11) NOT NULL,
`motivo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
`fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
`hora_salida` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
`hora_entrada` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
PRIMARY KEY (`id_permiso`),
KEY `fk_permisos_personal1` (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `personal` (
`id_personal` int(11) NOT NULL AUTO_INCREMENT,
`id_personal_grupos` int(11) NOT NULL,
`nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
`apellido` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
`dni` int(10) NOT NULL,
`telefono` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
`direccion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
`mail` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
`idmi` text COLLATE utf8_spanish2_ci NOT NULL,
`imagen` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
PRIMARY KEY (`id_personal`),
KEY `fk_personal_personal_grupos1` (`id_personal_grupos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=30 ;

CREATE TABLE IF NOT EXISTS `personal_grupos` (
`id_personal_grupos` int(11) NOT NULL AUTO_INCREMENT,
`id_horario` int(11) NOT NULL,
`nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
PRIMARY KEY (`id_personal_grupos`),
KEY `fk_personal_grupos_horarios` (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=9 ;

CREATE TABLE IF NOT EXISTS `sistema_avisos` (
`id_aviso` int(11) NOT NULL AUTO_INCREMENT,
`tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
`identificador` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
`aviso` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
PRIMARY KEY (`id_aviso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7;

CREATE TABLE IF NOT EXISTS `sistema_imagenes` (
`id_imagen` int(11) NOT NULL AUTO_INCREMENT,
`id_seccion` int(11) NOT NULL COMMENT 'Ej. id del modulo',
`id_subseccion` int(11) NOT NULL COMMENT 'Ej. id de submodulo',
`identificador` int(11) NOT NULL COMMENT 'id_submodulo independiente',
`posicion` int(11) NOT NULL,
`ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'imgs/1.jpg',
`comentario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`estado` int(1) NOT NULL COMMENT '1 visible, 2 oculta',
PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=26 ;

CREATE TABLE IF NOT EXISTS `sistema_modulos` (
`id_modulo` int(11) NOT NULL AUTO_INCREMENT,
`submodulo` int(11) NOT NULL,
`modulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`identificador` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`visualizacion` int(1) NOT NULL DEFAULT '1' COMMENT '1:completa, 2:directa',
`ordenador` int(11) NOT NULL,
`estado` int(1) NOT NULL,
PRIMARY KEY (`id_modulo`),
UNIQUE KEY `modulo` (`modulo`,`identificador`,`ruta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=26;

CREATE TABLE IF NOT EXISTS `sistema_modulos_perfiles` (
`id_modulo_perfil` int(11) NOT NULL AUTO_INCREMENT,
`id_perfil` int(11) NOT NULL,
`id_modulo` int(11) NOT NULL,
PRIMARY KEY (`id_modulo_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=46;

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL AUTO_INCREMENT,
`id_perfil` int(11) NOT NULL,
`dni` int(11) NOT NULL,
`nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`comentarios` text COLLATE utf8_spanish_ci NOT NULL,
`estado` int(1) NOT NULL,
PRIMARY KEY (`id_usuario`),
UNIQUE KEY `usuario` (`usuario`),
UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4;

CREATE TABLE IF NOT EXISTS `usuarios_perfiles` (
`id_perfil` int(11) NOT NULL AUTO_INCREMENT,
`tipo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
`descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
`estado` int(1) NOT NULL,
PRIMARY KEY (`id_perfil`),
UNIQUE KEY `tipo` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3;
ALTER TABLE `asistencia`
ADD CONSTRAINT `fk_asistencia_personal1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `permisos`
ADD CONSTRAINT `fk_permisos_personal1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `personal`
ADD CONSTRAINT `fk_personal_personal_grupos1` FOREIGN KEY (`id_personal_grupos`) REFERENCES `personal_grupos` (`id_personal_grupos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `personal_grupos`
ADD CONSTRAINT `fk_personal_grupos_horarios` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION;