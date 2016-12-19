# Host: localhost  (Version 5.5.5-10.1.16-MariaDB)
# Date: 2016-12-19 15:20:07
# Generator: MySQL-Front 5.4  (Build 1.40)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (1,'admin','i am','admin','1234','admin'),(2,'dalelicious','dale','torre','123','client'),(3,'fredowinz23','fred','garcia','123','client'),(4,'admin2','mark','bautista','1234','admin'),(5,'deliveryboy','fritz','gad','1234','delivery');

#
# Structure for table "cart"
#

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `orderNumber` int(10) DEFAULT NULL,
  `productId` int(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  `price` float DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "cart"
#

INSERT INTO `cart` VALUES (1,1480494235,10,1,1000),(2,1480498770,10,1,1000),(3,1480500130,10,1,1000),(4,1480504849,10,1,1000),(5,1480918721,10,2,8000),(6,1480918721,11,5,1000),(7,1480919752,10,1,1000),(8,1480919752,11,2,400);

#
# Structure for table "category"
#

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "category"
#

INSERT INTO `category` VALUES (5,'Cabinet','Cabinets','1480492788.jpg');

#
# Structure for table "checkout"
#

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE `checkout` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) DEFAULT NULL,
  `orderNumber` varchar(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(11) DEFAULT 'Pending',
  `totalPrice` float DEFAULT NULL,
  `street` text,
  `brgy` text,
  `city` text,
  `province` text,
  `postal` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "checkout"
#

INSERT INTO `checkout` VALUES (1,'dalelicious','1480494235','2016-11-30 16:23:55','Delivery',NULL,'medel encarnacion','granada','bacolod','negros occidental','6100'),(2,'userk','1480498770','2016-11-30 17:39:29','Pending',NULL,'medel','dira','bacolod','neg occ','6100'),(3,'userk','1480498770','2016-11-30 17:39:29','Pending',NULL,'medel','dira','bacolod','neg occ','6100'),(4,'userk','1480500130','2016-11-30 18:02:10','Pending',NULL,'','','','',''),(5,'dalelicious','1480504849','2016-11-30 19:20:49','Approved',NULL,'medel encarnacion','granada','bacolod','negros occidental','6100'),(6,'dalelicious','1480918721','2016-12-05 14:18:41','Rejected',NULL,'medel encarnacion','granada','bacolod','negros occidental','6100'),(7,'dalelicious','1480919752','2016-12-05 14:35:52','Approved',1400,'medel encarnacion','granada','bacolod','negros occidental','6100');

#
# Structure for table "delivery"
#

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `truckId` int(11) DEFAULT NULL,
  `orderNumber` varchar(20) DEFAULT NULL,
  `deliveryDate` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "delivery"
#

INSERT INTO `delivery` VALUES (1,0,'','0000-00-00','Pending'),(2,0,'','0000-00-00','Pending'),(3,0,'','0000-00-00','Pending'),(4,0,'','0000-00-00','Pending'),(5,0,'','0000-00-00','Pending'),(6,0,'','0000-00-00','Pending'),(7,1,'1480494235','2016-12-06','Pending'),(8,1,'1480494235','2016-12-08','Pending'),(9,1,'1480494235','2016-12-29','Pending'),(10,1,'1480494235','2016-12-08','Pending'),(11,1,'1480494235','2016-12-15','Pending'),(12,4,'1480494235','2016-12-05','Pending'),(13,4,'1480494235','2016-12-21','Pending');

#
# Structure for table "product"
#

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "product"
#

INSERT INTO `product` VALUES (10,5,'Small Cabinet','Small Cabinet','1000','1480492814.jpg'),(11,5,'big cabinet','big','200','1480917918.jpg'),(12,5,'Medium Cabinet','medium','500','1480931691.jpg');

#
# Structure for table "temp_cart"
#

DROP TABLE IF EXISTS `temp_cart`;
CREATE TABLE `temp_cart` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  `price` float DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "temp_cart"
#

INSERT INTO `temp_cart` VALUES (4,'userk',10,1,1000);

#
# Structure for table "truck"
#

DROP TABLE IF EXISTS `truck`;
CREATE TABLE `truck` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "truck"
#

INSERT INTO `truck` VALUES (1,'Wild truck Updated'),(4,'truck ni fred u');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `birthdate` varchar(11) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `street` text,
  `brgy` text,
  `city` text,
  `province` text,
  `postal` varchar(20) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'admin','i am','admin','1234','','0000-00-00 ','','','','','','','admin',NULL),(2,'dalelicious','dale','torre','123','daletorre1014@gmail.','0000-00-00 ','male','medel encarnacion','granada','bacolod','negros occidental','6100','client',''),(3,'fredowinz23','fred','garcia','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'client',NULL),(4,'userk','john','doe','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'client',NULL),(9,'ackno','dale','torre','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'client',NULL),(10,'acknolodgia','john','doe','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'client',NULL);

#
# Structure for table "wishlist"
#

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `productId` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "wishlist"
#

INSERT INTO `wishlist` VALUES (3,'userk','10'),(4,'dalelicious','10');
