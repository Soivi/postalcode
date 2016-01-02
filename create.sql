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
