CREATE TABLE `dht` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tmp` int(11) NOT NULL,
  `hum` int(11) NOT NULL,
  `dew` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
