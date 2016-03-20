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

-- Dumping structure for table visconti db.expert
CREATE TABLE IF NOT EXISTS `expert` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Last login activity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Title` varchar(20) NOT NULL,
  `Given name` varchar(20) NOT NULL,
  `Family name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Birth year` int(11) NOT NULL,
  `Password` varchar(20) NOT NULL COMMENT 'shall be hashed in the db',
  `Reset password expiry date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'once an expert member request reset of password, this field stores the expiry date of the reset password request',
  `Country of residence` int(11) NOT NULL,
  `Mobile number` varchar(50) NOT NULL,
  `Phone number` varchar(50) NOT NULL,
  `Fax` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL,
  `Agreed on terms` enum('Yes','No') DEFAULT 'Yes',
  `Industry account` int(11) NOT NULL,
  `Account confirmed` enum('Yes','No') DEFAULT 'No',
  `Active projects assigned` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_expert_countries` (`Country of residence`),
  KEY `FK_expert_specialization_entity` (`Role`),
  KEY `FK_expert_industry_account` (`Industry account`),
  CONSTRAINT `FK_expert_countries` FOREIGN KEY (`Country of residence`) REFERENCES `countries` (`ID`),
  CONSTRAINT `FK_expert_industry_account` FOREIGN KEY (`Industry account`) REFERENCES `industry_account` (`ID`),
  CONSTRAINT `FK_expert_specialization_entity` FOREIGN KEY (`Role`) REFERENCES `specialization` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.expert: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
