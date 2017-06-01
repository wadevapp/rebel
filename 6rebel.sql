/*
SQLyog Community v11.31 (64 bit)
MySQL - 5.6.20 : Database - 6rebel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`6rebel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `6rebel`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Firstname` varchar(200) DEFAULT NULL,
  `Lastname` varchar(200) DEFAULT NULL,
  `StatusId` int(11) DEFAULT NULL,
  `AdminTypeId` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`AdminId`,`Username`,`Password`,`Firstname`,`Lastname`,`StatusId`,`AdminTypeId`,`CreatedDate`) values (1,'admin','admin123','Dani','Stwn',1,1,'2017-05-11 16:11:47');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`CategoryId`,`Name`) values (4,'Jeans'),(6,'Tshits'),(8,'Pants'),(12,'Hip Hop'),(13,'Jacket Bomber');

/*Table structure for table `colors` */

DROP TABLE IF EXISTS `colors`;

CREATE TABLE `colors` (
  `ColorId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ColorId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `colors` */

insert  into `colors`(`ColorId`,`Name`) values (1,'White'),(2,'Black'),(3,'Grey'),(4,'Pink'),(6,'Marsmallows');

/*Table structure for table `history` */

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history` (
  `HistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CreatedDate` datetime DEFAULT NULL,
  `Descriptions` text,
  `StatusId` int(11) DEFAULT NULL,
  PRIMARY KEY (`HistoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

/*Data for the table `history` */

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `Price` double DEFAULT '0',
  `Descriptions` text,
  `Sizes` text,
  `Colors` text,
  `StatusId` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `Stock` bit(1) DEFAULT b'0',
  `CategoryId` int(11) DEFAULT NULL,
  `ImgUrl` text,
  `Like` int(11) DEFAULT '0',
  `IsDiscount` bit(1) DEFAULT b'0',
  `PriceDiscount` double DEFAULT '0',
  PRIMARY KEY (`ProductId`),
  KEY `CategoryId` (`CategoryId`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `SettingId` int(11) NOT NULL AUTO_INCREMENT,
  `Contact` varchar(200) DEFAULT NULL,
  `Address` text,
  `Area1` varchar(200) DEFAULT NULL,
  `Area2` varchar(200) DEFAULT NULL,
  `PostCode` varchar(200) DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Country` varchar(200) DEFAULT NULL,
  `LinkFacebook` text,
  `LinkInstagram` text,
  `LinkTwitter` text,
  `Whatsapp` varchar(200) DEFAULT NULL,
  `PinBBM` varchar(200) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Line` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`SettingId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `setting` */

insert  into `setting`(`SettingId`,`Contact`,`Address`,`Area1`,`Area2`,`PostCode`,`City`,`Country`,`LinkFacebook`,`LinkInstagram`,`LinkTwitter`,`Whatsapp`,`PinBBM`,`Name`,`Line`,`Email`) values (1,'08966763257','Padasuka Bandung','bandung cimenyan kaler','cimenyan','40192','Bandung','Indonesia','http://facebook.com','http://instagram.com','http://twitter.com','08982937492','723UJA','Rebelbams','@6Rebel','setiawandani20@gmail.com');

/*Table structure for table `sizes` */

DROP TABLE IF EXISTS `sizes`;

CREATE TABLE `sizes` (
  `SizeId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`SizeId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `sizes` */

insert  into `sizes`(`SizeId`,`Name`) values (1,'S'),(2,'XL'),(4,'XXL'),(9,'M'),(12,'All Size'),(13,'Ukuran Monster'),(14,'Zumbo');

/*Table structure for table `suggestion` */

DROP TABLE IF EXISTS `suggestion`;

CREATE TABLE `suggestion` (
  `SuggestionId` int(11) NOT NULL AUTO_INCREMENT,
  `CreatedDate` datetime DEFAULT NULL,
  `Notes` text,
  `Title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`SuggestionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `suggestion` */

/*Table structure for table `visitor` */

DROP TABLE IF EXISTS `visitor`;

CREATE TABLE `visitor` (
  `VisitorId` int(11) NOT NULL AUTO_INCREMENT,
  `IpAddress` text,
  PRIMARY KEY (`VisitorId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `visitor` */

/*Table structure for table `visitor_product` */

DROP TABLE IF EXISTS `visitor_product`;

CREATE TABLE `visitor_product` (
  `VisitorProductId` int(11) NOT NULL AUTO_INCREMENT,
  `VisitorIpAddress` text,
  `ProductId` int(11) DEFAULT NULL,
  PRIMARY KEY (`VisitorProductId`),
  KEY `ProductId` (`ProductId`),
  CONSTRAINT `visitor_product_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

/*Data for the table `visitor_product` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
