/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.14-MariaDB : Database - inventario_secretariaedu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventario_secretariaedu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `inventario_secretariaedu`;

/*Table structure for table `cuenta` */

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta` (
  `c_cood` int(12) NOT NULL,
  `c_usuario` varchar(20) DEFAULT NULL,
  `c_contrasena` varchar(20) DEFAULT NULL,
  `tc_cood` int(2) DEFAULT NULL,
  PRIMARY KEY (`c_cood`),
  KEY `tc_cood` (`tc_cood`),
  CONSTRAINT `cuenta_ibfk_2` FOREIGN KEY (`tc_cood`) REFERENCES `tipo_cuenta` (`tc_cood`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cuenta` */

insert  into `cuenta`(`c_cood`,`c_usuario`,`c_contrasena`,`tc_cood`) values (123,'asdasd','asdasd',1),(1234,'Didel','1234',3),(4345,'oscar','12345',2),(32609284,'','',2),(1042849796,'manolo','1234',2);

/*Table structure for table `detalle` */

DROP TABLE IF EXISTS `detalle`;

CREATE TABLE `detalle` (
  `d_cod` int(12) NOT NULL AUTO_INCREMENT,
  `d_observacion` varchar(255) DEFAULT NULL,
  `m_cod` int(12) DEFAULT NULL,
  `e_cod` int(12) DEFAULT NULL,
  PRIMARY KEY (`d_cod`),
  KEY `m_cod` (`m_cod`),
  KEY `e_cod` (`e_cod`),
  CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`m_cod`) REFERENCES `movimiento` (`m_cod`),
  CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`e_cod`) REFERENCES `elementos` (`e_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalle` */

/*Table structure for table `devolucion` */

DROP TABLE IF EXISTS `devolucion`;

CREATE TABLE `devolucion` (
  `dv_cod` int(12) NOT NULL AUTO_INCREMENT,
  `dv_Descripcion` varchar(255) DEFAULT NULL,
  `dv_fecha_devolucion` datetime DEFAULT NULL,
  `dv_recibe` int(12) DEFAULT NULL,
  `m_cod` int(12) DEFAULT NULL,
  PRIMARY KEY (`dv_cod`),
  KEY `dv_recibe` (`dv_recibe`),
  KEY `m_cod` (`m_cod`),
  CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`dv_recibe`) REFERENCES `funcionario` (`f_cood`),
  CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`m_cod`) REFERENCES `movimiento` (`m_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `devolucion` */

/*Table structure for table `elementos` */

DROP TABLE IF EXISTS `elementos`;

CREATE TABLE `elementos` (
  `e_cod` int(12) NOT NULL AUTO_INCREMENT,
  `e_descripcion` varchar(50) DEFAULT NULL,
  `e_serial` varchar(50) NOT NULL,
  `e_modelo` varchar(50) DEFAULT NULL,
  `ee_cood` int(12) DEFAULT NULL,
  `e_observacion` varchar(100) DEFAULT NULL,
  `te_cood` int(12) DEFAULT NULL,
  PRIMARY KEY (`e_cod`,`e_serial`),
  KEY `Ee_cood` (`ee_cood`),
  KEY `Te_cood` (`te_cood`),
  CONSTRAINT `elementos_ibfk_1` FOREIGN KEY (`ee_cood`) REFERENCES `estado_elemento` (`Ee_cood`),
  CONSTRAINT `elementos_ibfk_2` FOREIGN KEY (`te_cood`) REFERENCES `tipo_elemento` (`Te_cood`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `elementos` */

insert  into `elementos`(`e_cod`,`e_descripcion`,`e_serial`,`e_modelo`,`ee_cood`,`e_observacion`,`te_cood`) values (1,'Equipo Mesa','HB321312','HP',3,'Nuevo ',2),(3,'Teclado','THP234234','Esenses',2,'Nuevo',3),(4,'Teclado ','THEE123312','HP',3,'Equipo ',3);

/*Table structure for table `estado_elemento` */

DROP TABLE IF EXISTS `estado_elemento`;

CREATE TABLE `estado_elemento` (
  `ee_cood` int(12) NOT NULL AUTO_INCREMENT,
  `ee_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ee_cood`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estado_elemento` */

insert  into `estado_elemento`(`ee_cood`,`ee_descripcion`) values (1,'Disponible'),(2,'Ocupado'),(3,'Dañado');

/*Table structure for table `funcionario` */

DROP TABLE IF EXISTS `funcionario`;

CREATE TABLE `funcionario` (
  `f_cood` int(12) NOT NULL AUTO_INCREMENT,
  `f_nombre` varchar(30) DEFAULT NULL,
  `f_apellido` varchar(30) DEFAULT NULL,
  `f_documento` varchar(10) DEFAULT NULL,
  `f_correo` varchar(30) DEFAULT NULL,
  `o_cood` int(12) DEFAULT NULL,
  `c_cood` int(12) DEFAULT NULL,
  PRIMARY KEY (`f_cood`),
  KEY `o_cood` (`o_cood`),
  KEY `c_cood` (`c_cood`),
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`o_cood`) REFERENCES `oficina` (`o_cood`),
  CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`c_cood`) REFERENCES `cuenta` (`c_cood`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1042849799 DEFAULT CHARSET=utf8mb4;

/*Data for the table `funcionario` */

insert  into `funcionario`(`f_cood`,`f_nombre`,`f_apellido`,`f_documento`,`f_correo`,`o_cood`,`c_cood`) values (4345,'Jasser Adolfo','Ramirez Romero','225453','fsdfsdf@sdfgd.com',1,4345),(32609284,'Pilar Sofia ','Ortiz Sanjuan','32609284','imflorez69qmisena.edu.co',2,32609284),(1042849796,'Imanol Moises','Florez Ortiz','1042849796','imanolmoises@gmail.com',1,1042849796);

/*Table structure for table `movimiento` */

DROP TABLE IF EXISTS `movimiento`;

CREATE TABLE `movimiento` (
  `m_cod` int(12) NOT NULL AUTO_INCREMENT,
  `m_fecha_salida` datetime DEFAULT NULL,
  `m_estado` varchar(30) DEFAULT NULL,
  `m_autoriza` int(12) DEFAULT NULL,
  `m_entrega` int(12) DEFAULT NULL,
  `m_recibe` int(12) DEFAULT NULL,
  `tm_cod` int(2) DEFAULT NULL,
  `m_fecha_estipulada` datetime DEFAULT NULL,
  PRIMARY KEY (`m_cod`),
  KEY `m_autoriza` (`m_autoriza`),
  KEY `m_entrega` (`m_entrega`),
  KEY `m_recibe` (`m_recibe`),
  KEY `tm_cod` (`tm_cod`),
  CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`m_autoriza`) REFERENCES `funcionario` (`f_cood`),
  CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`m_entrega`) REFERENCES `funcionario` (`f_cood`),
  CONSTRAINT `movimiento_ibfk_3` FOREIGN KEY (`m_recibe`) REFERENCES `funcionario` (`f_cood`),
  CONSTRAINT `movimiento_ibfk_4` FOREIGN KEY (`tm_cod`) REFERENCES `tipo_movimiento` (`tm_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2020122902 DEFAULT CHARSET=utf8mb4;

/*Data for the table `movimiento` */

/*Table structure for table `oficina` */

DROP TABLE IF EXISTS `oficina`;

CREATE TABLE `oficina` (
  `o_cood` int(12) NOT NULL AUTO_INCREMENT,
  `o_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`o_cood`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `oficina` */

insert  into `oficina`(`o_cood`,`o_descripcion`) values (1,'SISTEMAS'),(2,'Parametrizacion');

/*Table structure for table `tabla_demo` */

DROP TABLE IF EXISTS `tabla_demo`;

CREATE TABLE `tabla_demo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(25) NOT NULL,
  `apellidos` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tabla_demo` */

insert  into `tabla_demo`(`id`,`nombres`,`apellidos`) values (4,'Meliza Estela','Loza Morales'),(5,'Mario','Ruiz Sotomayor'),(6,'Luisa Eugenia','Candia Quintana'),(7,'Nohelia Maria','Valdivia Valdivia'),(8,'Nilda Elena','Castillo Garcia');

/*Table structure for table `tipo_cuenta` */

DROP TABLE IF EXISTS `tipo_cuenta`;

CREATE TABLE `tipo_cuenta` (
  `tc_cood` int(12) NOT NULL AUTO_INCREMENT,
  `tc_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tc_cood`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_cuenta` */

insert  into `tipo_cuenta`(`tc_cood`,`tc_descripcion`) values (1,'SUPERADMIN'),(2,'Administrador'),(3,'Funcionario');

/*Table structure for table `tipo_elemento` */

DROP TABLE IF EXISTS `tipo_elemento`;

CREATE TABLE `tipo_elemento` (
  `te_cood` int(12) NOT NULL AUTO_INCREMENT,
  `te_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`te_cood`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_elemento` */

insert  into `tipo_elemento`(`te_cood`,`te_descripcion`) values (1,'Portatil'),(2,'Equipo de Oficina'),(3,'Pc Escritorio');

/*Table structure for table `tipo_movimiento` */

DROP TABLE IF EXISTS `tipo_movimiento`;

CREATE TABLE `tipo_movimiento` (
  `tm_cod` int(2) NOT NULL AUTO_INCREMENT,
  `tm_movimiento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`tm_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_movimiento` */

insert  into `tipo_movimiento`(`tm_cod`,`tm_movimiento`) values (1,'PRESTAMO'),(4,'PRESTAMO EXTERNO');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
