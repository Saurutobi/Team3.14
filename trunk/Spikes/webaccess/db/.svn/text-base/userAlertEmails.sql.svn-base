CREATE TABLE `userAlertEmails` (
  `WinID` varchar(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Enabled` bit(1) NOT NULL,
  KEY `fk_users_userAlertEmails_idx` (`WinID`),
  CONSTRAINT `fk_users_userAlertEmails` FOREIGN KEY (`WinID`) REFERENCES `users` (`WinID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
