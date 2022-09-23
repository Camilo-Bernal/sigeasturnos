-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.20-MariaDB - mariadb.org binary distribution
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
CREATE DATABASE IF NOT EXISTS `suturno` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.cargos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` (`idCargo`, `cargo`, `estado`) VALUES
	(1, 'Auxiliar', 'activo'),
	(2, 'Jefe', 'activo'),
	(3, 'Secretaria', 'activo'),
	(4, 'Camillero', 'activo'),
	(5, 'ginecólogo', 'inactivo');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.contrato
CREATE TABLE IF NOT EXISTS `contrato` (
  `idContrato` int(11) NOT NULL AUTO_INCREMENT,
  `tipoContrato` varchar(40) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idContrato`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.contrato: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` (`idContrato`, `tipoContrato`, `estado`) VALUES
	(1, 'Planta Permanente', 'activo'),
	(6, 'Planta Temporal', 'activo'),
	(7, 'OPS - SAS', 'activo');
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
	`idNomina` INT(11) NOT NULL,
	`idProfesion` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idCargo` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idTipoId` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idGenero` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci'
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

-- Volcando estructura para tabla suturno.genero
CREATE TABLE IF NOT EXISTS `genero` (
  `idGenero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.genero: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`idGenero`, `genero`, `estado`) VALUES
	(1, 'masculino', 'activo'),
	(2, 'femenino', 'activo'),
	(3, 'LGTBI', 'inactivo');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.nomina
CREATE TABLE IF NOT EXISTS `nomina` (
  `idNomina` int(11) NOT NULL AUTO_INCREMENT,
  `valorNomina` double NOT NULL,
  PRIMARY KEY (`idNomina`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.nomina: ~0 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.novedades: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `novedades` DISABLE KEYS */;
INSERT INTO `novedades` (`idNovedad`, `idPersonalAsistencial`, `fechaInicioNovedad`, `fechaFinNovedad`, `obervacion`) VALUES
	(1, 1087416879, '2022-05-26', '2022-05-30', 'No hace nada útil el culito de yuli'),
	(2, 1004864567, '2022-05-26', '2022-05-30', 'vacaciones nuevas'),
	(3, 1087416879, '2022-07-07', '2022-07-14', 'pata chueca');
/*!40000 ALTER TABLE `novedades` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_rol` int(2) NOT NULL COMMENT 'id de rol de permisos',
  `descripcion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla suturno.permisos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` (`id_rol`, `descripcion`) VALUES
	(1, 'Administrador'),
	(2, 'Coordinador');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

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

-- Volcando datos para la tabla suturno.personalasistencial: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `personalasistencial` DISABLE KEYS */;
INSERT INTO `personalasistencial` (`idPersonalAsistencial`, `nombres`, `apellidos`, `telefono`, `correoElectronico`, `idContrato`, `idNomina`, `idProfesion`, `idCargo`, `idTipoId`, `idGenero`, `estado`) VALUES
	(12345, 'Mauricio', 'Cabrera', '765432', 'mauya@hotmail.com', 7, 20000000, 2, 5, 1, 1, 'activo'),
	(123456, 'Marc', 'Marquez ', '765434567', 'prueba@gmail.com', 1, 5000000, 3, 2, 3, 1, 'activo'),
	(522455, 'Juan Camilo', 'Bernal  Arciniegas', '32664555', 'cabe0320@gmail.com', 1, 2, 2, 2, 2, 1, 'activo'),
	(9876543, 'Robert', 'Levandosky', '233405533', 'prueba@gmail.com', 1, 2, 2, 5, 3, 1, 'activo'),
	(98765676, 'Leonel', 'Mesi', '43313', 'prueba@gmail.com', 6, 2, 3, 1, 3, 1, 'activo'),
	(1004864567, 'Angi', 'Gomez', '3146035056', 'angiygomez@gmail.com', 6, 2, 1, 2, 2, 2, 'activo'),
	(1087416879, 'Camilo', 'Bernal', '3184179317', 'cabe0320@gmail.com', 1, 2, 2, 2, 2, 1, 'activo'),
	(1088345678, 'Alejandro', 'Narváez', '3126034567', 'anarvaez@gmail.com', 7, 2, 3, 1, 2, 1, 'activo'),
	(1234567890, 'Pepa', 'Pig', '34244344', 'prueba@gmail.com', 7, 2, 1, 1, 2, 2, 'activo');
/*!40000 ALTER TABLE `personalasistencial` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.profesion
CREATE TABLE IF NOT EXISTS `profesion` (
  `idProfesion` int(11) NOT NULL AUTO_INCREMENT,
  `profesion` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`idProfesion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.profesion: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `profesion` DISABLE KEYS */;
INSERT INTO `profesion` (`idProfesion`, `profesion`, `estado`) VALUES
	(1, 'Camillero', 'activo'),
	(2, 'Médico', 'activo'),
	(3, 'Camillero', 'activo');
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla suturno.programacion: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `programacion` DISABLE KEYS */;
INSERT INTO `programacion` (`idProgramacion`, `idTurno`, `fechaInicio`, `fechaFin`, `esFestivo`, `esDomingo`, `numFestivo`, `numDomingos`, `idPersonalAsistencial`, `idServicio`) VALUES
	(20, 6, '2022-05-14', '2022-05-14', 0, 0, 0, 0, 522455, 1),
	(21, 4, '2022-05-14', '2022-05-14', 0, 0, 0, 0, 522455, 1),
	(22, 1, '2022-08-13', '2022-08-13', 0, 0, 0, 0, 522455, 2),
	(23, 2, '2022-08-13', '2022-08-13', 0, 0, 0, 0, 522455, 4),
	(24, 3, '2022-05-13', '2022-05-13', 0, 0, 0, 0, 522455, 3),
	(25, 4, '2022-05-13', '2022-05-13', 0, 0, 0, 0, 522455, 1),
	(26, 8, '2022-05-14', '2022-05-14', 0, 0, 0, 0, 522455, 1),
	(27, 7, '2022-05-14', '2022-05-14', 0, 0, 0, 0, 522455, 1),
	(28, 3, '2022-05-15', '2022-05-16', 0, 1, 0, 1, 522455, 4),
	(29, 1, '2022-05-18', '0000-00-00', 0, 0, 1, 0, 522455, 3),
	(31, 1, '2022-06-02', '2022-06-02', 0, 0, 0, 0, 9876543, 2),
	(32, 3, '2022-06-03', '2022-06-03', 0, 0, 0, 0, 9876543, 3),
	(33, 4, '2022-06-11', '2022-06-13', 0, 0, 0, 0, 9876543, 1),
	(34, 2, '2022-06-04', '2022-06-04', 0, 0, 0, 0, 9876543, 2),
	(35, 1, '2022-06-09', '2022-06-16', 0, 0, 0, 0, 522455, 3),
	(37, 7, '2022-07-13', '2022-07-27', 0, 0, 0, 0, 522455, 1),
	(38, 1, '2022-08-10', '2022-08-10', 0, 0, 0, 0, 1087416879, 2),
	(39, 2, '2022-08-11', '2022-08-11', 0, 0, 0, 0, 1087416879, 4),
	(40, 3, '2022-08-12', '2022-08-13', 0, 0, 0, 0, 1087416879, 3),
	(41, 4, '2022-08-13', '2022-08-14', 0, 0, 0, 0, 1087416879, 1),
	(42, 1, '2022-08-14', '2022-08-14', 0, 0, 0, 0, 1087416879, 2),
	(43, 4, '2022-08-15', '2022-08-15', 1, 0, 1, 0, 1087416879, 1),
	(44, 5, '2022-08-16', '2022-08-31', 0, 0, 0, 0, 1087416879, 1);
/*!40000 ALTER TABLE `programacion` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.recargos
CREATE TABLE IF NOT EXISTS `recargos` (
  `idRecargo` int(11) NOT NULL,
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
  `horasNoctFest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.recargos: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `recargos` DISABLE KEYS */;
INSERT INTO `recargos` (`idRecargo`, `idPersonalAsistencial`, `mes`, `anio`, `ordiNoct`, `sabNoct`, `domDiurno`, `domNoct`, `festDiurno`, `festNoct`, `totalRecargo`, `horasNoctOrd`, `horasDiurnDom`, `horasNoctDom`, `horasDiurnFest`, `horasNoctFest`) VALUES
	(36, 1004864567, '2022-05-01', 2022, 90000, 180000, 125000, 135000, 125000, 0, 655000, 9, 5, 9, 5, 0),
	(53, 1004864567, '2022-06-01', 2023, 90000, 180000, 125000, 135000, 125000, 0, 655000, 9, 5, 9, 5, 0),
	(54, 522455, '2022-05-01', 2022, 90000, 180000, 125000, 135000, 250000, 135000, 915000, 9, 5, 9, 10, 9),
	(55, 2147483647, '2022-05-01', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(56, 522455, '2022-05-01', 2022, 90000, 180000, 125000, 135000, 250000, 135000, 915000, 9, 5, 9, 10, 9),
	(57, 2147483647, '2022-05-01', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(58, 522455, '2022-05-01', 2022, 90000, 180000, 125000, 135000, 250000, 135000, 915000, 9, 5, 9, 10, 9),
	(59, 2147483647, '2022-05-01', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(60, 522455, '2022-05-01', 2022, 90000, 180000, 125000, 135000, 250000, 135000, 915000, 9, 5, 9, 10, 9),
	(61, 2147483647, '2022-05-01', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(62, 522455, '2022-05-01', 2022, 90000, 180000, 125000, 135000, 250000, 135000, 915000, 9, 5, 9, 10, 9),
	(63, 2147483647, '2022-05-01', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(64, 522455, '0000-00-00', 2022, 90000, 180000, 125000, 135000, 250000, 135000, 915000, 9, 5, 9, 10, 9),
	(65, 2147483647, '0000-00-00', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(66, 522455, '0000-00-00', 2022, 90000, 180000, 125000, 135000, 250000, 135000, 915000, 9, 5, 9, 10, 9),
	(67, 2147483647, '0000-00-00', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0),
	(68, 522455, '5', 2022, 90000, 180000, 125000, 135000, 250000, 135000, 915000, 9, 5, 9, 10, 9),
	(69, 2147483647, '5', 2022, 0, 0, 0, 135000, 0, 0, 135000, 0, 0, 9, 0, 0);
/*!40000 ALTER TABLE `recargos` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.recargoscontrato
CREATE TABLE IF NOT EXISTS `recargoscontrato` (
  `idContrato` varchar(40) DEFAULT NULL,
  `idProfesion` varchar(45) DEFAULT NULL,
  `idPersonalAsistencial` int(10) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `horasNoctOrd` int(11) DEFAULT NULL,
  `horasDiurnDom` int(11) DEFAULT NULL,
  `horasNoctDom` int(11) DEFAULT NULL,
  `horasDiurnFest` int(11) DEFAULT NULL,
  `horasNoctFest` int(11) DEFAULT NULL,
  `totalRecargo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.recargoscontrato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `recargoscontrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `recargoscontrato` ENABLE KEYS */;

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

-- Volcando estructura para tabla suturno.reportenovedades
CREATE TABLE IF NOT EXISTS `reportenovedades` (
  `idContrato` varchar(40) DEFAULT NULL,
  `idProfesion` varchar(45) DEFAULT NULL,
  `idTipoId` varchar(100) DEFAULT NULL,
  `idPersonalAsistencial` int(10) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `idNovedad` int(11) DEFAULT NULL,
  `fechaInicioNovedad` date DEFAULT NULL,
  `fechaFinNovedad` date DEFAULT NULL,
  `obervacion` varchar(200) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.reportenovedades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reportenovedades` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportenovedades` ENABLE KEYS */;

-- Volcando estructura para tabla suturno.reporterecargos
CREATE TABLE IF NOT EXISTS `reporterecargos` (
  `idContrato` varchar(40) DEFAULT NULL,
  `idProfesion` varchar(45) DEFAULT NULL,
  `idPersonalAsistencial` int(10) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `mes` varchar(15) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `horasNoctOrd` int(11) DEFAULT NULL,
  `ordiNoct` double DEFAULT NULL,
  `sabNoct` double DEFAULT NULL,
  `horasDiurnDom` int(11) DEFAULT NULL,
  `domDiurno` double DEFAULT NULL,
  `horasNoctDom` int(11) DEFAULT NULL,
  `domNoct` double DEFAULT NULL,
  `horasDiurnFest` int(11) DEFAULT NULL,
  `festDiurno` double DEFAULT NULL,
  `horasNoctFest` int(11) DEFAULT NULL,
  `festNoct` double DEFAULT NULL,
  `totalRecargo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.reporterecargos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reporterecargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporterecargos` ENABLE KEYS */;

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
	(1, 'No Aplica', 'activo'),
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

-- Volcando estructura para tabla suturno.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT 2,
  `estado` varchar(10) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id`),
  KEY `rol` (`rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla suturno.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `name`, `user`, `email`, `password`, `rol`, `estado`) VALUES
	(7, 'Camilo Bernal', 'Camilo91', 'cabe0320@gmail.com', '96055f5b06bf9381ac43879351642cf5', 2, 'activo'),
	(8, 'Angi Gomez', 'yuligo', 'yuligo99@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1, 'activo'),
	(9, 'Juan Jose', 'juanjo', 'juanitogomez@gmail.com', 'f429e34492f74ff5f40d2fffc6efecdf', 2, 'activo');
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
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `empleados` AS SELECT e.idPersonalAsistencial, e.nombres, e. apellidos, e.telefono, e.correoElectronico, k.tipoContrato 'idContrato', e.idNomina , p.profesion 'idProfesion', c.cargo 'idCargo', t.tipoId 'idTipoId', g.genero 'idGenero'
FROM personalasistencial e, contrato k, profesion p, cargos c, tipoid t, genero g
WHERE e.idContrato = k.idContrato AND e.idProfesion = p.idProfesion AND e.idCargo = c.idCargo AND e.idTipoId = t.idTipoId AND e.idGenero = g.idGenero AND e.estado = 'activo' ;

-- Volcando estructura para vista suturno.empleados_inactivos
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `empleados_inactivos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `empleados_inactivos` AS SELECT e.idPersonalAsistencial, e.nombres, e. apellidos,  p.profesion 'idProfesion', k.tipoContrato 'idContrato', e.estado
FROM personalasistencial e, profesion p,  contrato k
WHERE e.idProfesion = p.idProfesion AND e.idContrato = k.idContrato  AND  e.estado = 'inactivo' ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
