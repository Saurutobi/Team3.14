CREATE DATABASE  IF NOT EXISTS `j5koehler1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `j5koehler1`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `BuildingID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL AUTO_INCREMENT,
  `RoomNumber` varchar(100) NOT NULL,
  `RoomDescription` varchar(100) NOT NULL,
  PRIMARY KEY (`RoomID`),
  KEY `fk_buildings_rooms_idx` (`BuildingID`),
  CONSTRAINT `fk_buildings_rooms` FOREIGN KEY (`BuildingID`) REFERENCES `buildings` (`BuildingID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `userAlertEmails`
--

DROP TABLE IF EXISTS `userAlertEmails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userAlertEmails` (
  `WinID` varchar(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Enabled` bit(1) NOT NULL,
  KEY `fk_users_userAlertEmails_idx` (`WinID`),
  CONSTRAINT `fk_users_userAlertEmails` FOREIGN KEY (`WinID`) REFERENCES `users` (`WinID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `userAlertPhones`
--

DROP TABLE IF EXISTS `userAlertPhones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userAlertPhones` (
  `WinID` varchar(9) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Enabled` bit(1) NOT NULL,
  KEY `fk_users_userAlertPhones_idx` (`WinID`),
  CONSTRAINT `fk_users_userAlertPhones` FOREIGN KEY (`WinID`) REFERENCES `users` (`WinID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `WinID` varchar(9) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL DEFAULT 'password',
  `AccessLevel` int(11) NOT NULL,
  PRIMARY KEY (`WinID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
