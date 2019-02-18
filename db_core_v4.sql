/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.30-MariaDB : Database - db_core_v4
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_core_v4` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_core_v4`;

/*Table structure for table `conf_level` */

DROP TABLE IF EXISTS `conf_level`;

CREATE TABLE `conf_level` (
  `id_level` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `conf_level` */

insert  into `conf_level`(`id_level`,`name`) values 
(1,'Superadmin'),
(2,'Admin'),
(3,'User');

/*Table structure for table `conf_menu` */

DROP TABLE IF EXISTS `conf_menu`;

CREATE TABLE `conf_menu` (
  `id_menu` int(10) NOT NULL AUTO_INCREMENT,
  `icon` varchar(30) NOT NULL,
  `icon2` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `akses` tinyint(1) NOT NULL,
  `sub` tinyint(1) NOT NULL,
  `level` text NOT NULL,
  `position` int(2) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `conf_menu` */

insert  into `conf_menu`(`id_menu`,`icon`,`icon2`,`name`,`link`,`status`,`akses`,`sub`,`level`,`position`) values 
(1,'fa-desktop','','Dashboard','home',1,1,1,'\"1\",\"2\"',1),
(2,'fa-cogs','','Configuration','admin/gen_modul',1,1,1,'\"1\",\"2\"',2);

/*Table structure for table `conf_submenu` */

DROP TABLE IF EXISTS `conf_submenu`;

CREATE TABLE `conf_submenu` (
  `id_submenu` int(5) NOT NULL AUTO_INCREMENT,
  `id_menu` int(5) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `icon2` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `level` text NOT NULL,
  `position` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_submenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `conf_submenu` */

/*Table structure for table `conf_users` */

DROP TABLE IF EXISTS `conf_users`;

CREATE TABLE `conf_users` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(60) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `salt` varchar(15) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `last_login` datetime NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `conf_users` */

insert  into `conf_users`(`id_user`,`fullname`,`avatar`,`username`,`password`,`salt`,`level`,`last_login`,`ip_address`,`status`) values 
(1,'Superadmin','img/avatar/6U6lk2At.jpg','admin','89a0c6ee2ad740022ce185004dd64cca98c04b51','Wb8e.?s5',1,'2019-02-16 12:59:34','::1',1),
(2,'Ardi','','ardi','00cc677ebf28c2788351082fe42ccc8982437a9c','+qt_a0Wy',1,'0000-00-00 00:00:00','',1),
(3,'User1','','user1','b441b93b17fc042610272f3f8cba985561306ff2','kbh.U_t/',3,'0000-00-00 00:00:00','',1);

/*Table structure for table `temp_login` */

DROP TABLE IF EXISTS `temp_login`;

CREATE TABLE `temp_login` (
  `id_temp` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(5) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_temp`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `temp_login` */

insert  into `temp_login`(`id_temp`,`id_user`,`tanggal`,`ip_address`,`nama_user`) values 
(1,1,'2019-02-08 15:37:28','::1','Superadmin'),
(2,1,'2019-02-08 15:45:35','::1','Superadmin'),
(3,1,'2019-02-09 07:49:12','::1','Superadmin'),
(4,1,'2019-02-09 13:09:51','::1','Superadmin'),
(5,1,'2019-02-11 08:12:42','::1','Superadmin'),
(6,1,'2019-02-11 13:34:21','::1','Superadmin'),
(7,1,'2019-02-12 07:40:56','::1','Superadmin'),
(8,1,'2019-02-12 13:35:39','::1','Superadmin'),
(9,1,'2019-02-14 07:50:42','::1','Superadmin'),
(10,1,'2019-02-14 07:57:10','::1','Superadmin'),
(11,1,'2019-02-14 09:10:58','::1','Superadmin'),
(12,1,'2019-02-15 07:55:17','::1','Superadmin'),
(13,1,'2019-02-15 09:32:00','::1','Superadmin'),
(14,1,'2019-02-15 13:29:23','::1','Superadmin'),
(15,1,'2019-02-15 14:56:53','::1','Superadmin'),
(16,1,'2019-02-16 12:46:15','::1','Superadmin'),
(17,1,'2019-02-16 12:59:34','::1','Superadmin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
