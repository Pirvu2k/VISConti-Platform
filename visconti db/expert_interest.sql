-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.10-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table visconti db.expert_interest
CREATE TABLE IF NOT EXISTS `expert_interest` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Interest` int(11) NOT NULL COMMENT 'Lookup to interests',
  `CoP` int(11) NOT NULL COMMENT 'Lookup to experts',
  PRIMARY KEY (`ID`),
  KEY `FK_expert_interest_expert` (`CoP`),
  KEY `FK_expert_interest_interest` (`Interest`),
  CONSTRAINT `FK_expert_interest_expert` FOREIGN KEY (`CoP`) REFERENCES `expert` (`ID`),
  CONSTRAINT `FK_expert_interest_interest` FOREIGN KEY (`Interest`) REFERENCES `interest` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.expert_interest: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_interest` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_interest` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
