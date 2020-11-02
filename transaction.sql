/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - studiopop_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`studiopop_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `studiopop_db`;

/*Table structure for table `tbl_transaction` */

DROP TABLE IF EXISTS `tbl_transaction`;

CREATE TABLE `tbl_transaction` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TRDATE` datetime DEFAULT NULL,
  `FULLNAME` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(200) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PROV` varchar(3) DEFAULT NULL,
  `KAB` varchar(5) DEFAULT NULL,
  `KODEPOS` varchar(6) DEFAULT NULL,
  `SHIPMENT` varchar(100) DEFAULT NULL,
  `PAYMENT` varchar(50) DEFAULT NULL,
  `TOTAL` decimal(10,0) DEFAULT NULL,
  `STATUS` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_transaction` */

/*Table structure for table `tbl_transaction_dtl` */

DROP TABLE IF EXISTS `tbl_transaction_dtl`;

CREATE TABLE `tbl_transaction_dtl` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TRID` int(10) DEFAULT NULL,
  `CODE` varchar(20) DEFAULT NULL,
  `QTY` int(10) DEFAULT NULL,
  `SIZE` varchar(2) DEFAULT NULL,
  `PRICE` decimal(10,0) DEFAULT NULL,
  `TOTAL` decimal(10,0) DEFAULT NULL,
  `NOTE` varchar(100) DEFAULT NULL,
  `STATUS` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_transaction_dtl` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
