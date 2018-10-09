# Host: localhost  (Version: 5.6.26)
# Date: 2018-10-08 15:21:36
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "gps"
#

CREATE TABLE `gps` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `lat` varchar(123) NOT NULL,
  `lon` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

#
# Data for table "gps"
#

INSERT INTO `gps` VALUES (1,'1899-12-29 00:00:00','118.875111','31.922811'),(2,'1899-12-29 00:00:00','118.875111','31.922811');
