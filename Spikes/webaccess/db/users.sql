CREATE TABLE `users` (
  `WinID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL DEFAULT 'password',
  `AccessLevel` int(11) NOT NULL,
  PRIMARY KEY (`WinID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
