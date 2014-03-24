CREATE TABLE `buildings` (
  `BuildingID` int(11) NOT NULL AUTO_INCREMENT,
  `BuildingDescription` varchar(100) NOT NULL,
  `AddressLine1` varchar(100) DEFAULT NULL,
  `AddressLine2` varchar(100) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `Zip` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`BuildingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

