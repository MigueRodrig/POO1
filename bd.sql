/*
SQLyog Ultimate v8.82 
MySQL - 5.5.16 : Database - bd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bd`;

/*Table structure for table `alumno_grupo` */

DROP TABLE IF EXISTS `alumno_grupo`;

CREATE TABLE `alumno_grupo` (
  `id_a_g` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_a_g`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `alumno_grupo` */

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_grupo` varchar(50) DEFAULT NULL,
  `estatus_g` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

insert  into `grupo`(`id_grupo`,`nom_grupo`,`estatus_g`) values (1,'TIC-15',1),(2,'TIC-20',1),(3,'TIC-25',1),(4,'TIC-30',1),(5,'TIC-35',1);

/*Table structure for table `maestro_materia` */

DROP TABLE IF EXISTS `maestro_materia`;

CREATE TABLE `maestro_materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `maestro_materia` */

insert  into `maestro_materia`(`id`,`id_usuario`,`id_materia`) values (4,6,3),(5,5,3),(11,3,5),(12,2,1),(13,2,6),(14,17,5),(15,17,2),(16,17,1);

/*Table structure for table `materias` */

DROP TABLE IF EXISTS `materias`;

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(50) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `estatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `materias` */

insert  into `materias`(`id_materia`,`materia`,`avatar`,`estatus`) values (1,'matematicas',NULL,'1'),(2,'programacion',NULL,'1'),(3,'administracion',NULL,'1'),(4,'ingles',NULL,'1'),(5,'economia',NULL,'1'),(6,'optativa',NULL,'1'),(7,'procesos',NULL,'1');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApellidoPaterno` varchar(50) DEFAULT NULL,
  `ApellidoMaterno` varchar(50) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Calle` varchar(50) DEFAULT NULL,
  `NumeroExterior` varchar(50) DEFAULT NULL,
  `NumeroInterior` varchar(50) DEFAULT NULL,
  `Colonia` varchar(50) DEFAULT NULL,
  `Municipio` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `CP` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `Nivel` int(11) DEFAULT NULL,
  `Estatus` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Telefono`,`Calle`,`NumeroExterior`,`NumeroInterior`,`Colonia`,`Municipio`,`Estado`,`CP`,`Correo`,`Usuario`,`password`,`Nivel`,`Estatus`) values (1,'Miguel','Soto','Flores',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'miguel','123',1,1),(2,'Adrian','Garcia','Rojas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adrian','123',1,1),(3,'Cesar','Vazquez','Arguello',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cesar','1234',2,1),(4,'Ivan','garcia','trejo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ivan','123',3,1),(5,'Eduardo','acosta','saavedra',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'eduardo','123',3,1),(6,'Ana','villalobos','saavedra',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mig','1234',3,1),(17,'Carlos','Robles','Morales',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'carlos','123',3,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
