CREATE TABLE `temp_history` (
  `mxtemp` int(11),
  `mntemp` int(11),
  `mxhum` int(11),
  `mnhum` int(11),
  `mxdew` int(11),
  `mndew` int(11),
  `dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
