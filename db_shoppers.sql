# Host: localhost  (Version 5.5.5-10.1.16-MariaDB)
# Date: 2016-12-19 18:11:45
# Generator: MySQL-Front 5.4  (Build 1.40)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "shop"
#

DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(20) DEFAULT NULL,
  `owner` varchar(20) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "shop"
#

INSERT INTO `shop` VALUES (2,'Penshop','shop for pens',NULL,'1482140632.png'),(4,'blackshop','123','dalelicious','1482142261.jpg');
