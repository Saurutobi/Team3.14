CREATE TABLE `userAlertPhones` (
  `WinID` varchar(9) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Enabled` bit(1) NOT NULL,
  KEY `fk_users_userAlertPhones_idx` (`WinID`),
  CONSTRAINT `fk_users_userAlertPhones` FOREIGN KEY (`WinID`) REFERENCES `users` (`WinID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
