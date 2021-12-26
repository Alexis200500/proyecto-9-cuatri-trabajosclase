/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.17-MariaDB : Database - mydentiss
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mydentiss` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mydentiss`;

/*Table structure for table `consultas` */

DROP TABLE IF EXISTS `consultas`;

CREATE TABLE `consultas` (
  `idconsulta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpaciente` int(10) unsigned NOT NULL,
  `idodo` int(10) unsigned NOT NULL,
  `fecha_consulta` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_consulta` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatura` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idstatus` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idconsulta`),
  KEY `consultas_idpaciente_foreign` (`idpaciente`),
  CONSTRAINT `consultas_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `pacientes` (`idpaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `consultas` */

/*Table structure for table `especialidades` */

DROP TABLE IF EXISTS `especialidades`;

CREATE TABLE `especialidades` (
  `idesp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idesp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `especialidades` */

insert  into `especialidades`(`idesp`,`especialidad`,`remember_token`,`created_at`,`updated_at`) values (1,'Quirofano',NULL,NULL,NULL);

/*Table structure for table `estudios` */

DROP TABLE IF EXISTS `estudios`;

CREATE TABLE `estudios` (
  `idestudio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idestudio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `estudios` */

/*Table structure for table `material_odontologicos` */

DROP TABLE IF EXISTS `material_odontologicos`;

CREATE TABLE `material_odontologicos` (
  `idmaterial` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechareg` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horareg` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pzas_exis` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmaterial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `material_odontologicos` */

/*Table structure for table `medicamentos` */

DROP TABLE IF EXISTS `medicamentos`;

CREATE TABLE `medicamentos` (
  `idmed` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtipomed` int(10) unsigned NOT NULL,
  `presentacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `susta_activa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmed`),
  KEY `medicamentos_idtipomed_foreign` (`idtipomed`),
  CONSTRAINT `medicamentos_idtipomed_foreign` FOREIGN KEY (`idtipomed`) REFERENCES `tipo_medicamentos` (`idtipomed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `medicamentos` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2021_02_17_183233_tipo_sangres',1),(2,'2021_02_17_183514_pacientes',1),(3,'2021_03_01_232938_tipo_usuarios',1),(4,'2021_03_01_233052_usuarios',1),(5,'2021_03_01_233228_estudios',1),(6,'2021_03_01_233305_municipios',1),(7,'2021_03_01_233426_especialidades',1),(8,'2021_03_01_233606_odontologos',1),(9,'2021_03_01_233700_status',1),(10,'2021_03_03_012758_tipo_medicamentos',2),(11,'2021_03_03_014313_medicamentos',2),(12,'2021_03_05_232501_statuses',2),(13,'2021_03_06_025204_material_odontologico',2),(14,'2021_03_06_033712_tratamientos',2),(15,'2021_03_13_052834_terminos',2),(16,'2021_07_20_022408_productos',2),(17,'2021_07_20_225301_odontologossin',3);

/*Table structure for table `municipios` */

DROP TABLE IF EXISTS `municipios`;

CREATE TABLE `municipios` (
  `idmun` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmun`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `municipios` */

insert  into `municipios`(`idmun`,`nombre`,`remember_token`,`created_at`,`updated_at`) values (1,'Toluca',NULL,NULL,NULL);

/*Table structure for table `odontologos` */

DROP TABLE IF EXISTS `odontologos`;

CREATE TABLE `odontologos` (
  `idodo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appaterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apmaterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numint` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numext` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idmun` int(10) unsigned NOT NULL,
  `colonia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idesp` int(10) unsigned NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idodo`),
  KEY `odontologos_idmun_foreign` (`idmun`),
  KEY `odontologos_idesp_foreign` (`idesp`),
  CONSTRAINT `odontologos_idesp_foreign` FOREIGN KEY (`idesp`) REFERENCES `especialidades` (`idesp`),
  CONSTRAINT `odontologos_idmun_foreign` FOREIGN KEY (`idmun`) REFERENCES `municipios` (`idmun`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `odontologos` */

insert  into `odontologos`(`idodo`,`nombre`,`appaterno`,`apmaterno`,`sexo`,`edad`,`telefono`,`correo`,`password`,`calle`,`numint`,`numext`,`idmun`,`colonia`,`idesp`,`hora_entrada`,`hora_salida`,`img`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (1,'Alexis','Morales','Gomez','M','21','1234567890','al@gmail.com','aksldfgdklsflk','Fe','7','0',1,'San Pedro Totoltepec',1,'12:59:00','12:59:00','sinfoto.jpg',NULL,'2021-07-21 04:03:03','2021-07-21 04:03:08','2021-07-21 04:03:08'),(2,'Alexis','Morales','Gomez','M','21','1234567890','al@gmail.com','aksldfgdklsflk','Fe','7','0',1,'San Pedro Totoltepec',1,'12:59:00','12:59:00','sinfoto.jpg',NULL,'2021-07-21 04:03:03','2021-07-21 04:28:50','2021-07-21 04:28:50'),(3,'Alexis','Gomez','Morales','M','21','7228032683','al221811729@gmail.com','asdfdgfhjhk','Felipe','9','0',1,'San Pedro',1,'12:59:00','12:59:00','20210721_045746_20141224_210023.jpg',NULL,'2021-07-21 04:06:37','2021-07-21 04:57:46',NULL),(4,'Alexis','Gomez','Morales','M','21','7228032683','al221811729@gmail.com','asdfdgfhjhk','Felipe','7','0',1,'San Pedro',1,'12:59:00','12:59:00','20210721_045215_1.jpg',NULL,'2021-07-21 04:06:37','2021-07-21 04:52:15',NULL);

/*Table structure for table `pacientes` */

DROP TABLE IF EXISTS `pacientes`;

CREATE TABLE `pacientes` (
  `idpaciente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidop` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidom` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtipossan` int(10) unsigned NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preguntaale` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergias` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpaciente`),
  KEY `pacientes_idtipossan_foreign` (`idtipossan`),
  CONSTRAINT `pacientes_idtipossan_foreign` FOREIGN KEY (`idtipossan`) REFERENCES `tipo_sangres` (`idtipossan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pacientes` */

insert  into `pacientes`(`idpaciente`,`nombre`,`apellidop`,`apellidom`,`sexo`,`edad`,`idtipossan`,`telefono`,`correo`,`preguntaale`,`alergias`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (2,'Alexis','','','','21',1,'','','','',NULL,NULL,NULL,NULL);

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` decimal(6,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `productos` */

insert  into `productos`(`id`,`nombre`,`descripcion`,`costo`,`cantidad`,`img`,`created_at`,`updated_at`) values (1,'Paracetamol','Paracetamol',241.00,30,'paracetamol.jpg',NULL,NULL),(2,'Jarabe','jarabe\r\n',345.00,10,'jarabe.jpg',NULL,NULL),(3,'Pastillas','pastillas\r\n',132.00,106,'pastillas.jpg',NULL,NULL),(4,'Vitaminas','vitaminas',13.00,32,'vitaminas.jpg',NULL,NULL),(5,'Agua','agua',15.00,234,'agua.jpg',NULL,NULL),(6,'Barmicil','barmicil',60.00,701,'barmicil.jpg',NULL,NULL);

/*Table structure for table `sinfotos` */

DROP TABLE IF EXISTS `sinfotos`;

CREATE TABLE `sinfotos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidopa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eda` int(2) NOT NULL,
  `telefon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sinfoto_email_unique` (`emai`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sinfotos` */

insert  into `sinfotos`(`id`,`nombres`,`apellidopa`,`sex`,`eda`,`telefon`,`emai`,`pas`,`created_at`,`updated_at`,`deleted_at`) values (3,'Emmanuel','Morales','M',21,'1234567890','sage.hermann@hoeger.com','utvt38lm','2021-07-21 03:59:13','2021-07-21 03:59:23',NULL),(4,'Alexis','Morales','M',21,'1234567890','al@gmail.com','asdfgh','2021-07-21 04:32:02','2021-07-21 04:32:02',NULL),(5,'Erik','Morales','M',19,'1234567890','erik@gmail.com','qwertyjhk','2021-07-21 04:32:47','2021-07-21 04:32:47',NULL),(6,'Vanessa','Gomez','M',29,'1234567810','vane@gmail.com','waksdflhlk','2021-07-21 04:36:44','2021-07-21 04:41:16',NULL),(7,'Karina','Gomez Mendoza','M',12,'1234567890','kar@gmail.com','wadsfghjmwrewe','2021-07-21 04:51:42','2021-07-21 04:57:58',NULL);

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `idstatus` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `status` */

/*Table structure for table `statuses` */

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `idstatus` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `statuses` */

/*Table structure for table `terminos` */

DROP TABLE IF EXISTS `terminos`;

CREATE TABLE `terminos` (
  `idtermino` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contraseña` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtermino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `terminos` */

/*Table structure for table `tipo_medicamentos` */

DROP TABLE IF EXISTS `tipo_medicamentos`;

CREATE TABLE `tipo_medicamentos` (
  `idtipomed` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipomed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipo_medicamentos` */

/*Table structure for table `tipo_sangres` */

DROP TABLE IF EXISTS `tipo_sangres`;

CREATE TABLE `tipo_sangres` (
  `idtipossan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipossan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipo_sangres` */

insert  into `tipo_sangres`(`idtipossan`,`tipo`,`remember_token`,`created_at`,`updated_at`) values (1,'o+',NULL,NULL,NULL);

/*Table structure for table `tipo_usuarios` */

DROP TABLE IF EXISTS `tipo_usuarios`;

CREATE TABLE `tipo_usuarios` (
  `idtipo_u` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_u`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipo_usuarios` */

/*Table structure for table `tratamientos` */

DROP TABLE IF EXISTS `tratamientos`;

CREATE TABLE `tratamientos` (
  `idtratamiento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicamento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtratamiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tratamientos` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidop` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtipo_u` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `usuarios_idtipo_u_foreign` (`idtipo_u`),
  CONSTRAINT `usuarios_idtipo_u_foreign` FOREIGN KEY (`idtipo_u`) REFERENCES `tipo_usuarios` (`idtipo_u`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
