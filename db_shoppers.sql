# Host: localhost  (Version 5.5.5-10.1.16-MariaDB)
# Date: 2016-12-19 17:15:58
# Generator: MySQL-Front 5.4  (Build 1.40)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "product"
#

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `shopId` int(11) DEFAULT NULL,
  `baseCategoryId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `MOP` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "product"
#

INSERT INTO `product` VALUES (10,NULL,5,'Small Cabinet','Small Cabinet','1000','1480492814.jpg',NULL),(11,NULL,5,'big cabinet','big','200','1480917918.jpg',NULL),(12,NULL,5,'Medium Cabinet','medium','500','1480931691.jpg',NULL);
