CREATE TABLE `bmp_rt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pa` int(11) NOT NULL,
  `inhg` decimal(5,2) NOT NULL,
  `ts` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=589 DEFAULT CHARSET=latin1;
