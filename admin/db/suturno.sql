-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para suturno
CREATE DATABASE IF NOT EXISTS `suturno` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `suturno`;

-- Volcando estructura para vista suturno.asignacion
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `asignacion` (
	`idProgramacion` INT(10) NOT NULL,
	`title` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`fechaInicio` DATE NOT NULL,
	`timeStart` TIME NOT NULL,
	`fechaFin` DATE NOT NULL,
	`timeEnd` TIME NOT NULL,
	`duracionHoras` INT(11) NULL,
	`color` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`textColor` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idPersonalAsistencial` INT(10) NOT NULL,
	`nombreServicio` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla suturno.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `idCargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.cargos: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` (`idCargo`, `cargo`, `estado`) VALUES
	(1, 'Auxiliar', 'inactivo'),
	(2, 'Jefe', 'inactivo'),
	(3, 'Secretaria (o)', 'activo'),
	(4, 'Camillero (a)', 'activo'),
	(5, 'ginecólogo', 'inactivo'),
	(6, 'Ingeniero  de Sistemas (a)', 'inactivo'),
	(7, 'Coordinador (a) GIT Hospitalización', 'activo'),
	(8, 'Médico (a)', 'activo'),
	(9, 'Enfermero (a)', 'activo'),
	(10, 'Auxiliar Enfermería', 'activo');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.contrato
CREATE TABLE IF NOT EXISTS `contrato` (
  `idContrato` int(11) NOT NULL AUTO_INCREMENT,
  `tipoContrato` varchar(40) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idContrato`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.contrato: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` (`idContrato`, `tipoContrato`, `estado`) VALUES
	(1, 'Planta Permanente', 'activo'),
	(6, 'Planta Temporal', 'activo'),
	(7, 'OPS - SAS', 'activo'),
	(17, 'Plante media mala', 'inactivo');
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;

-- Volcando estructura para vista suturno.empleados
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `empleados` (
	`idPersonalAsistencial` INT(10) NOT NULL,
	`nombres` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`apellidos` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`telefono` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`correoElectronico` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`idContrato` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idNomina` DOUBLE NOT NULL,
	`idProfesion` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idCargo` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idTipoId` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idGenero` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`estado` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista suturno.empleados_inactivos
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `empleados_inactivos` (
	`idPersonalAsistencial` INT(10) NOT NULL,
	`nombres` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`apellidos` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idProfesion` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idContrato` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`estado` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla suturno.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `duracionHoras` int(11) DEFAULT 0,
  `color` varchar(50) NOT NULL,
  `textColor` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.eventos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`idTipo`, `title`, `timeStart`, `timeEnd`, `duracionHoras`, `color`, `textColor`) VALUES
	(1, 'Mañana', '07:00:00', '13:00:00', 6, '#4CA748', '#FFFFFF'),
	(2, 'Tarde', '13:00:00', '19:00:00', 6, '#4455AA', '#FFFFFF'),
	(3, 'Noche', '19:00:00', '07:00:00', 12, '#D63B36', '#FFFFFF'),
	(4, 'Libre', '07:00:00', '07:00:00', 24, '#D6C72E', '#FFFFFF'),
	(5, 'Vacaciones remuneradas', '00:00:00', '23:59:00', 0, '#FF9933', '#FFFFFF'),
	(6, 'Vacaciones no remuneradas', '00:00:00', '23:59:00', 0, '#42BBAE', '#FFFFFF'),
	(7, 'Incapacidad remunerada', '00:00:00', '23:59:00', 0, '#9C5FC7', '#FFFFFF'),
	(8, 'Incapacidad no remunerada', '00:00:00', '23:59:00', 0, '#D55288', '#FFFFFF');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla suturno.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.genero
CREATE TABLE IF NOT EXISTS `genero` (
  `idGenero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.genero: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`idGenero`, `genero`, `estado`) VALUES
	(1, 'Masculino', 'activo'),
	(2, 'Femenino', 'activo'),
	(3, 'LGTBI', 'inactivo');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla suturno.migrations: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_04_06_200425_create_carros_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.nomina
CREATE TABLE IF NOT EXISTS `nomina` (
  `idNomina` int(11) NOT NULL AUTO_INCREMENT,
  `valorNomina` double NOT NULL,
  PRIMARY KEY (`idNomina`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.nomina: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `nomina` DISABLE KEYS */;
INSERT INTO `nomina` (`idNomina`, `valorNomina`) VALUES
	(2, 4000000);
/*!40000 ALTER TABLE `nomina` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.novedades
CREATE TABLE IF NOT EXISTS `novedades` (
  `idNovedad` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonalAsistencial` int(10) NOT NULL,
  `fechaInicioNovedad` date NOT NULL,
  `fechaFinNovedad` date NOT NULL,
  `obervacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idNovedad`),
  KEY `idPersonalAsistencial` (`idPersonalAsistencial`),
  CONSTRAINT `novedades_ibfk_1` FOREIGN KEY (`idPersonalAsistencial`) REFERENCES `personalasistencial` (`idPersonalAsistencial`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.novedades: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `novedades` DISABLE KEYS */;
INSERT INTO `novedades` (`idNovedad`, `idPersonalAsistencial`, `fechaInicioNovedad`, `fechaFinNovedad`, `obervacion`) VALUES
	(1, 1087416879, '2022-05-26', '2022-05-29', 'Incapacidad por lesión de pie'),
	(2, 1004864567, '2022-05-26', '2022-05-30', 'Vaciones medio año');
/*!40000 ALTER TABLE `novedades` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla suturno.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.personalasistencial
CREATE TABLE IF NOT EXISTS `personalasistencial` (
  `idPersonalAsistencial` int(10) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correoElectronico` varchar(50) DEFAULT NULL,
  `idContrato` int(11) NOT NULL,
  `idNomina` int(11) NOT NULL,
  `idProfesion` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idTipoId` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL,
  `estado` varchar(10) DEFAULT 'activo',
  PRIMARY KEY (`idPersonalAsistencial`),
  KEY `idContrato` (`idContrato`),
  KEY `idNomina` (`idNomina`),
  KEY `idProfesion` (`idProfesion`),
  KEY `idCargo` (`idCargo`),
  KEY `idTipoId` (`idTipoId`),
  KEY `idGenero` (`idGenero`),
  CONSTRAINT `personalasistencial_ibfk_1` FOREIGN KEY (`idContrato`) REFERENCES `contrato` (`idContrato`),
  CONSTRAINT `personalasistencial_ibfk_3` FOREIGN KEY (`idProfesion`) REFERENCES `profesion` (`idProfesion`),
  CONSTRAINT `personalasistencial_ibfk_4` FOREIGN KEY (`idCargo`) REFERENCES `cargos` (`idCargo`),
  CONSTRAINT `personalasistencial_ibfk_5` FOREIGN KEY (`idTipoId`) REFERENCES `tipoid` (`idTipoId`),
  CONSTRAINT `personalasistencial_ibfk_6` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.personalasistencial: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `personalasistencial` DISABLE KEYS */;
INSERT INTO `personalasistencial` (`idPersonalAsistencial`, `nombres`, `apellidos`, `telefono`, `correoElectronico`, `idContrato`, `idNomina`, `idProfesion`, `idCargo`, `idTipoId`, `idGenero`, `estado`) VALUES
	(522455, 'Juan Camilo', 'Bernal  Arciniegas', '32664555', 'cabe0320@gmail.com', 1, 2500000, 2, 2, 2, 1, 'activo'),
	(1004864567, 'Angi', 'Gomez', '3146035056', 'angiygomez@gmail.com', 6, 1800000, 1, 2, 2, 2, 'activo'),
	(1087140097, 'Daniela', 'Ramos G', '3145569032', 'wertu34@gmail.com', 1, 2500000, 2, 1, 2, 3, 'activo'),
	(1087416879, 'Camilo', 'Bernal', '3184179317', 'cabe0320@gmail.com', 1, 2500000, 2, 2, 2, 1, 'activo'),
	(1088345678, 'Alejandro', 'Narváez', '3126034567', 'anarvaez@gmail.com', 7, 1500000, 3, 1, 2, 1, 'activo'),
	(1234567890, 'Juan', 'Perez Melo', '34244344', 'prueba@gmail.com', 1, 4000000, 1, 10, 1, 2, 'activo'),
	(1234567899, 'Tatiana', 'Ramirez Gomez', '3146035043', 'oiuytrj@gmail', 7, 1500000, 3, 1, 2, 2, 'activo'),
	(2147483647, 'Matías', 'Perez', '7467283', 'yuligo99@gmail.com', 1, 2500000, 2, 1, 2, 2, 'activo');
/*!40000 ALTER TABLE `personalasistencial` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla suturno.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.profesion
CREATE TABLE IF NOT EXISTS `profesion` (
  `idProfesion` int(11) NOT NULL AUTO_INCREMENT,
  `profesion` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idProfesion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.profesion: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `profesion` DISABLE KEYS */;
INSERT INTO `profesion` (`idProfesion`, `profesion`, `estado`) VALUES
	(1, 'Enfermero (a)', 'activo'),
	(2, 'Médico (a)', 'activo'),
	(3, 'Camillero (a)', 'activo'),
	(4, 'nueva no', 'inactivo'),
	(5, 'Auxiliar Enfermería', 'activo'),
	(6, 'Secretario (a)', 'activo');
/*!40000 ALTER TABLE `profesion` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.programacion
CREATE TABLE IF NOT EXISTS `programacion` (
  `idProgramacion` int(10) NOT NULL AUTO_INCREMENT,
  `idTurno` int(11) NOT NULL DEFAULT 0,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `esFestivo` tinyint(1) DEFAULT NULL,
  `esDomingo` tinyint(1) DEFAULT NULL,
  `numFestivo` int(11) DEFAULT NULL,
  `numDomingos` int(11) DEFAULT NULL,
  `idPersonalAsistencial` int(10) NOT NULL,
  `idServicio` int(11) NOT NULL,
  PRIMARY KEY (`idProgramacion`),
  KEY `idPersonalAsistencial` (`idPersonalAsistencial`),
  KEY `idServicio` (`idServicio`),
  KEY `turno` (`idTurno`),
  CONSTRAINT `programacion_ibfk_1` FOREIGN KEY (`idPersonalAsistencial`) REFERENCES `personalasistencial` (`idPersonalAsistencial`),
  CONSTRAINT `programacion_ibfk_2` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicio`),
  CONSTRAINT `programacion_ibfk_3` FOREIGN KEY (`idTurno`) REFERENCES `eventos` (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla suturno.programacion: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `programacion` DISABLE KEYS */;
INSERT INTO `programacion` (`idProgramacion`, `idTurno`, `fechaInicio`, `fechaFin`, `esFestivo`, `esDomingo`, `numFestivo`, `numDomingos`, `idPersonalAsistencial`, `idServicio`) VALUES
	(21, 4, '2022-05-14', '2022-05-14', 0, 0, 0, 0, 522455, 1),
	(29, 1, '2022-05-18', '0000-00-00', 0, 1, 0, 0, 522455, 3),
	(30, 1, '2022-05-04', '2022-05-04', 0, 0, 0, 0, 522455, 3),
	(32, 2, '2022-05-01', '2022-05-01', 0, 0, 0, 0, 522455, 2),
	(33, 3, '2022-05-12', '2022-05-12', 0, 0, 0, 0, 522455, 2),
	(34, 3, '2022-05-21', '2022-05-21', 0, 0, 0, 0, 522455, 2),
	(35, 3, '2022-05-15', '2022-05-15', 0, 0, 0, 0, 522455, 4),
	(36, 3, '2022-05-30', '2022-05-30', 1, 0, 1, 0, 522455, 3),
	(37, 1, '2022-05-02', '2022-05-02', 1, 0, 1, 0, 522455, 6),
	(38, 3, '2022-05-08', '2022-05-08', 0, 0, 0, 0, 2147483647, 3),
	(40, 3, '2022-05-08', '2022-05-08', 0, 0, 0, 0, 1004864567, 2),
	(41, 3, '2022-05-04', '2022-05-04', 0, 0, 0, 0, 1004864567, 3),
	(42, 3, '2022-05-14', '0000-00-00', 0, 0, 0, 0, 1004864567, 3),
	(43, 2, '2022-05-22', '2022-05-22', 0, 0, 0, 0, 1004864567, 4),
	(44, 2, '2022-05-02', '2022-05-02', 1, 0, 0, 0, 1004864567, 2),
	(45, 3, '2022-06-05', '2022-06-05', 0, 0, 0, 0, 522455, 2),
	(46, 3, '2022-06-15', '2022-06-15', 0, 0, 0, 0, 522455, 2),
	(47, 3, '2022-06-18', '2022-06-18', 0, 0, 0, 0, 522455, 2),
	(48, 3, '2022-06-05', '2022-06-05', 0, 0, 0, 0, 1004864567, 2),
	(49, 3, '2022-06-11', '2022-06-11', 0, 0, 0, 0, 1004864567, 2),
	(50, 3, '2022-06-15', '2022-06-15', 0, 0, 0, 0, 1004864567, 4),
	(51, 1, '2022-06-03', '2022-06-03', 0, 0, 0, 0, 522455, 2),
	(52, 3, '2022-06-10', '2022-06-10', 0, 0, 0, 0, 522455, 3),
	(53, 4, '2022-06-08', '2022-06-08', 0, 0, 0, 0, 522455, 3),
	(54, 3, '2022-06-09', '2022-06-09', 0, 0, 0, 0, 522455, 2),
	(55, 3, '2022-06-02', '2022-06-02', 0, 0, 0, 0, 522455, 2);
/*!40000 ALTER TABLE `programacion` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.recargos
CREATE TABLE IF NOT EXISTS `recargos` (
  `idRecargo` int(11) NOT NULL AUTO_INCREMENT,
  `idPersonalAsistencial` int(11) NOT NULL,
  `mes` varchar(15) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `ordiNoct` double NOT NULL,
  `sabNoct` double NOT NULL,
  `domDiurno` double NOT NULL,
  `domNoct` double NOT NULL,
  `festDiurno` double NOT NULL,
  `festNoct` double NOT NULL,
  `totalRecargo` double NOT NULL,
  `horasNoctOrd` int(11) NOT NULL,
  `horasDiurnDom` int(11) NOT NULL,
  `horasNoctDom` int(11) NOT NULL,
  `horasDiurnFest` int(11) NOT NULL,
  `horasNoctFest` int(11) NOT NULL,
  PRIMARY KEY (`idRecargo`),
  KEY `idPersonalAsistencial` (`idPersonalAsistencial`),
  CONSTRAINT `recargos_ibfk_1` FOREIGN KEY (`idPersonalAsistencial`) REFERENCES `personalasistencial` (`idPersonalAsistencial`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.recargos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `recargos` DISABLE KEYS */;
INSERT INTO `recargos` (`idRecargo`, `idPersonalAsistencial`, `mes`, `anio`, `ordiNoct`, `sabNoct`, `domDiurno`, `domNoct`, `festDiurno`, `festNoct`, `totalRecargo`, `horasNoctOrd`, `horasDiurnDom`, `horasNoctDom`, `horasDiurnFest`, `horasNoctFest`) VALUES
	(76, 522455, '6', 2022, 360000, 360000, 125000, 270000, 125000, 135000, 1375000, 36, 5, 18, 5, 9),
	(77, 2147483647, '6', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(78, 522455, '6', 2022, 360000, 360000, 125000, 270000, 125000, 135000, 1375000, 36, 5, 18, 5, 9),
	(79, 2147483647, '6', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(80, 522455, '6', 2022, 360000, 360000, 125000, 270000, 125000, 135000, 1375000, 36, 5, 18, 5, 9),
	(81, 2147483647, '6', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(82, 1004864567, '6', 2022, 180000, 360000, 125000, 270000, 125000, 0, 1060000, 18, 5, 18, 5, 0),
	(83, 1004864567, '6', 2022, 180000, 360000, 125000, 270000, 125000, 0, 1060000, 18, 5, 18, 5, 0),
	(84, 522455, '6', 2022, 450000, 360000, 125000, 270000, 125000, 135000, 1465000, 45, 5, 18, 5, 9),
	(85, 1087416879, '6', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(86, 2147483647, '6', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(87, 1087140097, '6', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `recargos` ENABLE KEYS */;

-- Volcando estructura para vista suturno.recargoscontrato
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `recargoscontrato` (
	`idContrato` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idProfesion` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idPersonalAsistencial` INT(10) NOT NULL,
	`nombres` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`apellidos` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`horasNoctOrd` INT(11) NOT NULL,
	`horasDiurnDom` INT(11) NOT NULL,
	`horasNoctDom` INT(11) NOT NULL,
	`horasDiurnFest` INT(11) NOT NULL,
	`horasNoctFest` INT(11) NOT NULL,
	`totalRecargo` DOUBLE NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para tabla suturno.recuperarpass
CREATE TABLE IF NOT EXISTS `recuperarpass` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '0',
  `token` varchar(50) NOT NULL DEFAULT '0',
  `codigo` int(6) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.recuperarpass: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `recuperarpass` DISABLE KEYS */;
/*!40000 ALTER TABLE `recuperarpass` ENABLE KEYS */;

-- Volcando estructura para vista suturno.reportenovedades
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `reportenovedades` (
	`idContrato` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idProfesion` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idTipoId` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idPersonalAsistencial` INT(10) NOT NULL,
	`nombres` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`apellidos` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idNovedad` INT(11) NOT NULL,
	`fechaInicioNovedad` DATE NOT NULL,
	`fechaFinNovedad` DATE NOT NULL,
	`obervacion` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`estado` VARCHAR(10) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista suturno.reporterecargos
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `reporterecargos` (
	`idContrato` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idProfesion` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idPersonalAsistencial` INT(10) NOT NULL,
	`nombres` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`apellidos` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`mes` VARCHAR(15) NULL COLLATE 'utf8mb4_general_ci',
	`anio` INT(11) NULL,
	`horasNoctOrd` INT(11) NOT NULL,
	`ordiNoct` DOUBLE NOT NULL,
	`sabNoct` DOUBLE NOT NULL,
	`horasDiurnDom` INT(11) NOT NULL,
	`domDiurno` DOUBLE NOT NULL,
	`horasNoctDom` INT(11) NOT NULL,
	`domNoct` DOUBLE NOT NULL,
	`horasDiurnFest` INT(11) NOT NULL,
	`festDiurno` DOUBLE NOT NULL,
	`horasNoctFest` INT(11) NOT NULL,
	`festNoct` DOUBLE NOT NULL,
	`totalRecargo` DOUBLE NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para tabla suturno.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `idServicio` int(10) NOT NULL AUTO_INCREMENT,
  `nombreServicio` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idServicio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.servicios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`idServicio`, `nombreServicio`, `estado`) VALUES
	(1, 'No Aplica nada', 'inactivo'),
	(2, '5to piso UCI', 'activo'),
	(3, 'Medicina interna', 'activo'),
	(4, 'Ortopedia', 'activo'),
	(6, 'Urgencias', 'activo');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.tipoid
CREATE TABLE IF NOT EXISTS `tipoid` (
  `idTipoId` int(11) NOT NULL AUTO_INCREMENT,
  `tipoId` varchar(100) NOT NULL,
  PRIMARY KEY (`idTipoId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.tipoid: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoid` DISABLE KEYS */;
INSERT INTO `tipoid` (`idTipoId`, `tipoId`) VALUES
	(1, 'TI'),
	(2, 'CC'),
	(3, 'PP');
/*!40000 ALTER TABLE `tipoid` ENABLE KEYS */;

-- Volcando estructura para vista suturno.turnos_asingados_mes
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `turnos_asingados_mes` (
	`idPersonalAsistencial` INT(10) NOT NULL,
	`nombres` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`apellidos` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idContrato` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idProfesion` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`mes` VARCHAR(15) NULL COLLATE 'utf8mb4_general_ci',
	`anio` INT(11) NULL,
	`turno` VARCHAR(15) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla suturno.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla suturno.users: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Marion Will', 'haley.hunter@example.net', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xJhlSVvWgW', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(2, 'Kenton Bode', 'tad.quigley@example.org', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xP642cBEsj', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(3, 'Miguel Pfannerstill', 'adele11@example.net', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CNptv0kadj', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(4, 'Dr. Keith Kshlerin', 'gwen37@example.org', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6cKksDcr6j', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(5, 'Aiden Brakus', 'sherman.rowe@example.net', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dKOdEKrlQA', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(6, 'Omari Leuschke', 'helga52@example.com', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'w9NaUdz7xH', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(7, 'Dr. Maxine Greenholt MD', 'west.kale@example.net', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7QIKFijmhq', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(8, 'Mr. Chad Blanda III', 'lking@example.org', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sujdCb81Mf', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(9, 'Ewald Windler', 'kody.hayes@example.net', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Pgeyg7tITv', '2022-04-06 21:57:53', '2022-04-06 21:57:53'),
	(10, 'Prof. Princess West', 'gaylord.raegan@example.net', '2022-04-06 21:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UyGTAzDpYK', '2022-04-06 21:57:53', '2022-04-06 21:57:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `name`, `user`, `email`, `password`) VALUES
	(7, 'Camilo Bernal', 'Camilo91', 'cabe0320@gmail.com', '96055f5b06bf9381ac43879351642cf5'),
	(8, 'Angi Gomez', 'yuligo', 'yuligo99@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para vista suturno.asignacion
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `asignacion`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `asignacion` AS SELECT p.idProgramacion, k.title 'title', p.fechaInicio, k.timeStart, p.fechaFin, k.timeEnd,  k.duracionHoras, k.color 'color', k.textColor 'textColor', e.idPersonalAsistencial, s.nombreServicio 'nombreServicio'
FROM programacion p, personalasistencial e, eventos k, servicios s
WHERE p.idTurno = k.idTipo AND p.idPersonalAsistencial = e.idPersonalAsistencial AND p.idServicio = s.idServicio 
ORDER BY p.idProgramacion ASC ;

-- Volcando estructura para vista suturno.empleados
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `empleados`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `empleados` AS SELECT e.idPersonalAsistencial, e.nombres, e. apellidos, e.telefono, e.correoElectronico, k.tipoContrato 'idContrato', n.valorNomina 'idNomina' , p.profesion 'idProfesion', c.cargo 'idCargo', t.tipoId 'idTipoId', g.genero 'idGenero', e.estado
FROM personalasistencial e, contrato k, nomina n, profesion p, cargos c, tipoid t, genero g
WHERE e.idContrato = k.idContrato  AND e.idProfesion = p.idProfesion AND e.idCargo = c.idCargo AND e.idTipoId = t.idTipoId AND e.idGenero = g.idGenero AND e.estado = 'activo' ;

-- Volcando estructura para vista suturno.empleados_inactivos
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `empleados_inactivos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `empleados_inactivos` AS SELECT e.idPersonalAsistencial, e.nombres, e. apellidos,  p.profesion 'idProfesion', k.tipoContrato 'idContrato', e.estado
FROM personalasistencial e, profesion p,  contrato k
WHERE e.idProfesion = p.idProfesion AND e.idContrato = k.idContrato  AND  e.estado = 'inactivo' ;

-- Volcando estructura para vista suturno.recargoscontrato
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `recargoscontrato`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `recargoscontrato` AS SELECT k.tipoContrato 'idContrato', p.profesion 'idProfesion',e.idPersonalAsistencial, e.nombres, e. apellidos, r.horasNoctOrd, r.horasDiurnDom, r.horasNoctDom, r.horasDiurnFest, r.horasNoctFest, r.totalRecargo
FROM personalasistencial e, contrato k,  profesion p,  recargos r 
WHERE e.idContrato = k.idContrato AND e.idProfesion = p.idProfesion AND e.idPersonalAsistencial = r.idPersonalAsistencial ;

-- Volcando estructura para vista suturno.reportenovedades
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `reportenovedades`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `reportenovedades` AS SELECT k.tipoContrato 'idContrato', p.profesion 'idProfesion', t.tipoId 'idTipoId',e.idPersonalAsistencial, e.nombres, e. apellidos, 
n.idNovedad, n.fechaInicioNovedad, n.fechaFinNovedad, n.obervacion, e.estado 
 FROM personalasistencial e, contrato k, novedades n, profesion p, tipoid t
 WHERE e.idContrato = k.idContrato AND e.idProfesion = p.idProfesion AND
  e.idTipoId = t.idTipoId AND e.idPersonalAsistencial = n.idPersonalAsistencial ;

-- Volcando estructura para vista suturno.reporterecargos
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `reporterecargos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `reporterecargos` AS SELECT k.tipoContrato 'idContrato', p.profesion 'idProfesion',e.idPersonalAsistencial, e.nombres, e. apellidos, r.mes, r.anio, r.horasNoctOrd, r.ordiNoct, r.sabNoct, r.horasDiurnDom, r.domDiurno, r.horasNoctDom, r.domNoct,  r.horasDiurnFest, r.festDiurno,
 r.horasNoctFest, r.festNoct, r.totalRecargo
FROM personalasistencial e, contrato k,  profesion p,  recargos r 
WHERE e.idContrato = k.idContrato AND e.idProfesion = p.idProfesion AND e.idPersonalAsistencial = r.idPersonalAsistencial ;

-- Volcando estructura para vista suturno.turnos_asingados_mes
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `turnos_asingados_mes`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `turnos_asingados_mes` AS SELECT p.idPersonalAsistencial, e.nombres, e.apellidos, e.idContrato, e.idProfesion, r.mes, r.anio as anio, CASE
    WHEN (dayname(p.fechaInicio) = 'Saturday' AND p.idTurno=3) THEN 'SabanoNoche' 
    WHEN (dayname(p.fechaInicio) = 'Saturday' AND p.idTurno=2) THEN 'SabadoTarde' 
    WHEN (dayname(p.fechaInicio) = 'Saturday' AND p.idTurno=1) THEN 'SabadoMañana' 
    WHEN (dayname(p.fechaInicio) = 'Sunday' AND p.idTurno=1 ) THEN 'DomingMañana' 
    WHEN (dayname(p.fechaInicio) = 'Sunday' AND p.idTurno=2 ) THEN 'DomingTarde'
    WHEN (dayname(p.fechaInicio) = 'Sunday' AND p.idTurno=3) THEN 'DomingoNoche' 
    WHEN (esFestivo = 1 AND p.idTurno=1 ) THEN 'FestivoMañana' 
    WHEN (esFestivo = 1 AND p.idTurno=2 ) THEN 'FestTarde' 
    WHEN (esFestivo = 1 AND p.idTurno=3 ) THEN 'FestivoNoche' 
     WHEN (dayname(p.fechaInicio) <> 'Saturday' AND dayname(p.fechaInicio) <> 'Sunday' AND esFestivo = 0 AND p.idTurno=1) THEN 'OrdinarioMañana' 
     WHEN (dayname(p.fechaInicio) <> 'Saturday' AND dayname(p.fechaInicio) <> 'Sunday' AND esFestivo = 0 AND p.idTurno=2) THEN 'OrdinarioTarde' 
    WHEN (dayname(p.fechaInicio) <> 'Saturday' AND dayname(p.fechaInicio) <> 'Sunday' AND esFestivo = 0 AND p.idTurno=3) THEN 'OrdinarioNoche' 
    ELSE 'LIBRE' END AS turno FROM programacion p, empleados e, recargos r WHERE p.idPersonalAsistencial=e.idPersonalAsistencial ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
