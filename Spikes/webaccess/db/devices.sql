CREATE TABLE `devices` (
  `RoomID` int(11) NOT NULL,
  `DeviceID` int(11) NOT NULL AUTO_INCREMENT,
  `UniqueID` varbinary(16) NOT NULL,
  `DeviceDescription` varchar(100) NOT NULL,
  `TempMinCritical` int(11) NOT NULL,
  `TempMinWarning` int(11) NOT NULL,
  `TempMaxWarning` int(11) NOT NULL,
  `TempMaxCritical` int(11) NOT NULL,
  `HumiMinCritical` int(11) NOT NULL,
  `HumiMinWarning` int(11) NOT NULL,
  `HumiMaxWarning` int(11) NOT NULL,
  `HumiMaxCritical` int(11) NOT NULL,
  `Enabled` bit(1) NOT NULL,
  PRIMARY KEY (`DeviceID`),
  KEY `fk_rooms_devices_idx` (`RoomID`),
  CONSTRAINT `fk_rooms_devices` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`RoomID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
