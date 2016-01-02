-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: postalcodesoivi
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.12.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `postinumero`
--

DROP TABLE IF EXISTS `postinumero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postinumero` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postinumero` int(5) unsigned zerofill NOT NULL,
  `kaupunki` varchar(100) NOT NULL,
  `kaupunginosa` varchar(100) NOT NULL,
  `vakiluku` int(10) NOT NULL,
  `pvm` date NOT NULL,
  `lisatietoa` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postinumero`
--

LOCK TABLES `postinumero` WRITE;
/*!40000 ALTER TABLE `postinumero` DISABLE KEYS */;
INSERT INTO `postinumero` VALUES (1,00150,'Helsinki','Eira',989,'2008-01-01','Suomi. Eira on pieni kaupunginosa eteläisessä Helsingissä. Sitä rajoittavat Merikatu ja Telakkakatu lännessä, Tehtaankatu pohjoisessa, Laivurinkatu idässä sekä Sirpalesalmi etelässä.'),(2,38220,'Sastamala','Stormi',896,'2009-12-31','Suomi. Stormi on kylä ja taajama Sastamalassa. Alun perin se kuului Tyrvääseen, joka liitettiin Vammalan kaupunkiin vuonna 1973.'),(3,00660,'Helsinki','Länsi-Pakila',6465,'2005-01-01','Suomi. Länsi-Pakila (ruots. Västra Baggböle) on pientalovaltainen peruspiiri ja Pakilan osa-alue Pohjois-Helsingissä.\r\nLänsi-Pakilassa asui 6 465 henkeä vuonna 2005. '),(4,01450,'Vantaa','Korso',7342,'2012-01-01','Suomi. Korso sijaitsee pääradan länsipuolella. Lähin kaupunki on Kerava 6 km pohjoiseen.'),(5,04250,'Kerava','Kerava',123,'2012-01-01','Suomi Tämä on vain testi');
/*!40000 ALTER TABLE `postinumero` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-02 20:17:25
