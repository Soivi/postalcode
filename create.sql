DROP TABLE IF EXISTS `postinumero`;
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

INSERT INTO `postinumero` VALUES 
(1,00150,'Helsinki','Eira',989,'2008-01-01','Suomi. Eira on pieni kaupunginosa eteläisessä Helsingissä. Sitä rajoittavat Merikatu ja Telakkakatu lännessä, Tehtaankatu pohjoisessa, Laivurinkatu idässä sekä Sirpalesalmi etelässä.'),
(2,38220,'Sastamala','Stormi',896,'2009-12-31','Suomi. Stormi on kylä ja taajama Sastamalassa. Alun perin se kuului Tyrvääseen, joka liitettiin Vammalan kaupunkiin vuonna 1973.'),
(3,00660,'Helsinki','Länsi-Pakila',6465,'2005-01-01','Suomi. Länsi-Pakila (ruots. Västra Baggböle) on pientalovaltainen peruspiiri ja Pakilan osa-alue Pohjois-Helsingissä.\r\nLänsi-Pakilassa asui 6 465 henkeä vuonna 2005. '),
(4,01450,'Vantaa','Korso',7342,'2012-01-01','Suomi. Korso sijaitsee pääradan länsipuolella. Lähin kaupunki on Kerava 6 km pohjoiseen.'),
