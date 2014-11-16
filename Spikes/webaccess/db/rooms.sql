CREATE TABLE `rooms` (
  `BuildingID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL AUTO_INCREMENT,
  `RoomNumber` varchar(100) NOT NULL,
  `RoomDescription` varchar(100) NOT NULL,
  PRIMARY KEY (`RoomID`),
  KEY `fk_buildings_rooms_idx` (`BuildingID`),
  CONSTRAINT `fk_buildings_rooms` FOREIGN KEY (`BuildingID`) REFERENCES `buildings` (`BuildingID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
