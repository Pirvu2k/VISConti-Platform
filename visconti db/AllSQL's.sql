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

-- Dumping structure for table visconti db.administrators
CREATE TABLE IF NOT EXISTS `administrators` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Last login activity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Given name` varchar(20) NOT NULL,
  `Family name` varchar(20) NOT NULL,
  `Email` varchar(9) NOT NULL,
  `Password` varchar(15) NOT NULL COMMENT 'Hashed in the db',
  `Reset password expiry date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Once an admin requests reset of password, this field stores the expiry date of the reset password request',
  `Country of residence` int(11) NOT NULL COMMENT 'Lookup to Countries',
  `City` varchar(30) NOT NULL,
  `State` int(11) NOT NULL COMMENT 'Lookup to States',
  `Address` varchar(30) NOT NULL,
  `Address details` varchar(30) NOT NULL,
  `Zip/Postal code` int(11) NOT NULL,
  `Mobile number` varchar(30) NOT NULL,
  `Phone number` varchar(30) NOT NULL,
  `Fax` varchar(30) NOT NULL,
  `Role` int(11) NOT NULL COMMENT 'Lookup to Administrator Roles',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`),
  KEY `FK_administrators_countries` (`Country of residence`),
  KEY `FK_administrators_states` (`State`),
  KEY `FK_administrators_administrator_roles` (`Role`),
  CONSTRAINT `FK_administrators_administrator_roles` FOREIGN KEY (`Role`) REFERENCES `administrator_roles` (`ID`),
  CONSTRAINT `FK_administrators_countries` FOREIGN KEY (`Country of residence`) REFERENCES `countries` (`ID`),
  CONSTRAINT `FK_administrators_states` FOREIGN KEY (`State`) REFERENCES `states` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.administrators: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.administrator_roles
CREATE TABLE IF NOT EXISTS `administrator_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Title` varchar(20) NOT NULL,
  `Code` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.administrator_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrator_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrator_roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Title` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.countries: ~0 rows (approximately)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.degrees
CREATE TABLE IF NOT EXISTS `degrees` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Code` varchar(20) NOT NULL,
  `Expert technical weight` float NOT NULL COMMENT '0-1',
  `Expert economical weight` float NOT NULL COMMENT '0-1',
  `Expert creative weight` float NOT NULL COMMENT '0-1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.degrees: ~0 rows (approximately)
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.expert_education
CREATE TABLE IF NOT EXISTS `expert_education` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Institution name` varchar(20) NOT NULL,
  `Degree` int(11) NOT NULL,
  `Degree details` varchar(20) NOT NULL,
  `From` date NOT NULL,
  `To` date NOT NULL,
  `Details` text NOT NULL,
  `CoP` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_expert_education_degrees` (`Degree`),
  KEY `FK_expert_education_expert` (`CoP`),
  CONSTRAINT `FK_expert_education_degrees` FOREIGN KEY (`Degree`) REFERENCES `degrees` (`ID`),
  CONSTRAINT `FK_expert_education_expert` FOREIGN KEY (`CoP`) REFERENCES `expert` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.expert_education: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_education` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_education` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.expert_experience
CREATE TABLE IF NOT EXISTS `expert_experience` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Institution name` varchar(20) NOT NULL,
  `Job title` varchar(20) NOT NULL,
  `Job description` varchar(20) NOT NULL,
  `From` date NOT NULL,
  `To` date NOT NULL,
  `Details` text NOT NULL,
  `Expert` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_expert_experience_expert` (`Expert`),
  CONSTRAINT `FK_expert_experience_expert` FOREIGN KEY (`Expert`) REFERENCES `expert` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Expert experience entity holds data about the experience history of the experts';

-- Dumping data for table visconti db.expert_experience: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_experience` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.expert_project_canvas_assignation
CREATE TABLE IF NOT EXISTS `expert_project_canvas_assignation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Expert` int(11) NOT NULL COMMENT 'Lookup to Experts',
  `Project` int(11) NOT NULL COMMENT 'Lookup to Projects',
  `Role` int(11) NOT NULL COMMENT 'Lookup to CoP Roles | copy meta data from Expert on creation',
  `Status` enum('Active','Pending') NOT NULL DEFAULT 'Active',
  `Expiry date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Notes` tinytext NOT NULL,
  `Score` float NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_expert_project_canvas_assignation_expert` (`Expert`),
  KEY `FK_expert_project_canvas_assignation_expert_roles_entity` (`Role`),
  KEY `FK_expert_project_canvas_assignation_project_canvas` (`Project`),
  CONSTRAINT `FK_expert_project_canvas_assignation_expert` FOREIGN KEY (`Expert`) REFERENCES `expert` (`ID`),
  CONSTRAINT `FK_expert_project_canvas_assignation_expert_roles_entity` FOREIGN KEY (`Role`) REFERENCES `expert_roles` (`ID`),
  CONSTRAINT `FK_expert_project_canvas_assignation_project_canvas` FOREIGN KEY (`Project`) REFERENCES `project_canvas` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.expert_project_canvas_assignation: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_project_canvas_assignation` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_project_canvas_assignation` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.expert_roles
CREATE TABLE IF NOT EXISTS `expert_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.expert_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.expert_sector
CREATE TABLE IF NOT EXISTS `expert_sector` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Specialization` int(11) NOT NULL COMMENT 'Lookup to Sectors',
  `CoP` int(11) NOT NULL COMMENT 'Lookup to Experts',
  PRIMARY KEY (`ID`),
  KEY `FK_expert_sector_expert` (`CoP`),
  KEY `FK_expert_sector_sector` (`Specialization`),
  CONSTRAINT `FK_expert_sector_expert` FOREIGN KEY (`CoP`) REFERENCES `expert` (`ID`),
  CONSTRAINT `FK_expert_sector_sector` FOREIGN KEY (`Specialization`) REFERENCES `sector` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.expert_sector: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_sector` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_sector` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.expert_specialization
CREATE TABLE IF NOT EXISTS `expert_specialization` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Specialization` int(11) NOT NULL COMMENT 'Lookup to Specializations',
  `CoP` int(11) NOT NULL COMMENT 'Lookup to Experts',
  PRIMARY KEY (`ID`),
  KEY `FK_expert_specialization_expert` (`CoP`),
  KEY `FK_expert_specialization_specialization` (`Specialization`),
  CONSTRAINT `FK_expert_specialization_expert` FOREIGN KEY (`CoP`) REFERENCES `expert` (`ID`),
  CONSTRAINT `FK_expert_specialization_specialization` FOREIGN KEY (`Specialization`) REFERENCES `specialization` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.expert_specialization: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_specialization` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_specialization` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.expert_sub_sector
CREATE TABLE IF NOT EXISTS `expert_sub_sector` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Sub-sector` int(11) NOT NULL COMMENT 'Lookup to sub-sectors',
  `CoP` int(11) NOT NULL COMMENT 'Look up to Experts',
  PRIMARY KEY (`ID`),
  KEY `FK_expert_sub_sector_expert` (`CoP`),
  KEY `FK_expert_sub_sector_sub_sector` (`Sub-sector`),
  CONSTRAINT `FK_expert_sub_sector_expert` FOREIGN KEY (`CoP`) REFERENCES `expert` (`ID`),
  CONSTRAINT `FK_expert_sub_sector_sub_sector` FOREIGN KEY (`Sub-sector`) REFERENCES `sub_sector` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.expert_sub_sector: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_sub_sector` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_sub_sector` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.industry_account
CREATE TABLE IF NOT EXISTS `industry_account` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Account name` varchar(20) NOT NULL,
  `Sector` int(11) NOT NULL COMMENT 'Lookup to Sectors',
  `Sub-sector` int(11) NOT NULL COMMENT 'Lookup to Sub-sectors',
  `Sector 2` int(11) NOT NULL COMMENT 'Lookup to Sectors',
  `Sub-sector 2` int(11) NOT NULL COMMENT 'Lookup to Sub-sectors',
  `Sector 3` int(11) NOT NULL COMMENT 'Lookup to Sectors',
  `Sub-sector 3` int(11) NOT NULL COMMENT 'Lookup to Sub-sectors',
  `Agreed on terms` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`ID`),
  KEY `FK_industry_account_sector` (`Sector`),
  KEY `FK_industry_account_sub_sector` (`Sub-sector`),
  KEY `FK_industry_account_sector_2` (`Sector 2`),
  KEY `FK_industry_account_sub_sector_2` (`Sub-sector 2`),
  KEY `FK_industry_account_sector_3` (`Sector 3`),
  KEY `FK_industry_account_sub_sector_3` (`Sub-sector 3`),
  CONSTRAINT `FK_industry_account_sector` FOREIGN KEY (`Sector`) REFERENCES `sector` (`ID`),
  CONSTRAINT `FK_industry_account_sector_2` FOREIGN KEY (`Sector 2`) REFERENCES `sector` (`ID`),
  CONSTRAINT `FK_industry_account_sector_3` FOREIGN KEY (`Sector 3`) REFERENCES `sector` (`ID`),
  CONSTRAINT `FK_industry_account_sub_sector` FOREIGN KEY (`Sub-sector`) REFERENCES `sub_sector` (`ID`),
  CONSTRAINT `FK_industry_account_sub_sector_2` FOREIGN KEY (`Sub-sector 2`) REFERENCES `sub_sector` (`ID`),
  CONSTRAINT `FK_industry_account_sub_sector_3` FOREIGN KEY (`Sub-sector 3`) REFERENCES `sub_sector` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.industry_account: ~0 rows (approximately)
/*!40000 ALTER TABLE `industry_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `industry_account` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.industry_account_project_canvas_assignation
CREATE TABLE IF NOT EXISTS `industry_account_project_canvas_assignation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Account Representative` int(11) NOT NULL COMMENT 'Lookup to Account Representative',
  `Account` int(11) NOT NULL COMMENT 'Lookup to Account | Meta data',
  `Project` int(11) NOT NULL COMMENT 'Lookup to Projects',
  `Role` int(11) NOT NULL COMMENT 'Lookup to CoP Roles | Meta data to be copied from Expert on creation',
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  PRIMARY KEY (`ID`),
  KEY `FK_industry_account_canvas_assignation_representative_roles` (`Account Representative`),
  KEY `FK_industry_account_canvas_assignation_industry_account` (`Account`),
  KEY `FK_industry_account_industry_canvas_assignation` (`Project`),
  KEY `FK_industry_account_canvas_assignation_expert_roles_entity` (`Role`),
  CONSTRAINT `FK_industry_account_canvas_assignation_expert_roles_entity` FOREIGN KEY (`Role`) REFERENCES `expert_roles` (`ID`),
  CONSTRAINT `FK_industry_account_canvas_assignation_industry_account` FOREIGN KEY (`Account`) REFERENCES `industry_account` (`ID`),
  CONSTRAINT `FK_industry_account_canvas_assignation_representative_roles` FOREIGN KEY (`Account Representative`) REFERENCES `industry_account_representative_roles` (`ID`),
  CONSTRAINT `FK_industry_account_industry_canvas_assignation` FOREIGN KEY (`Project`) REFERENCES `industry_account_project_canvas_assignation` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.industry_account_project_canvas_assignation: ~0 rows (approximately)
/*!40000 ALTER TABLE `industry_account_project_canvas_assignation` DISABLE KEYS */;
/*!40000 ALTER TABLE `industry_account_project_canvas_assignation` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.industry_account_representative_roles
CREATE TABLE IF NOT EXISTS `industry_account_representative_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Title` varchar(20) NOT NULL,
  `Code` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.industry_account_representative_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `industry_account_representative_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `industry_account_representative_roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.interest
CREATE TABLE IF NOT EXISTS `interest` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Name` varchar(20) NOT NULL,
  `Status` enum('Yes','No') DEFAULT NULL,
  `Sub-sector` int(11) NOT NULL,
  `Expert technical weight` float NOT NULL COMMENT '0-1',
  `Expert economical weight` float NOT NULL COMMENT '0-1',
  `Expert creative weight` float NOT NULL COMMENT '0-1',
  PRIMARY KEY (`ID`),
  KEY `FK_interest_sub_sector` (`Sub-sector`),
  CONSTRAINT `FK_interest_sub_sector` FOREIGN KEY (`Sub-sector`) REFERENCES `sub_sector` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.interest: ~0 rows (approximately)
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.job_titles
CREATE TABLE IF NOT EXISTS `job_titles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Code` varchar(50) NOT NULL,
  `Expert technical weight` float NOT NULL COMMENT '0-1',
  `Expert economical weight` float NOT NULL COMMENT '0-1',
  `Expert creative weight` float NOT NULL COMMENT '0-1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.job_titles: ~0 rows (approximately)
/*!40000 ALTER TABLE `job_titles` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_titles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.project_attachments
CREATE TABLE IF NOT EXISTS `project_attachments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Project` int(11) NOT NULL COMMENT 'Lookup to Projects',
  `Attachament` binary(50) NOT NULL COMMENT 'Attachament contents',
  `Attachment name` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_project_attachments_project_canvas` (`Project`),
  CONSTRAINT `FK_project_attachments_project_canvas` FOREIGN KEY (`Project`) REFERENCES `project_canvas` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.project_attachments: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_attachments` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.project_canvas
CREATE TABLE IF NOT EXISTS `project_canvas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Serial number` varchar(13) NOT NULL COMMENT 'ALPHANUMERIC',
  `Project title` varchar(20) NOT NULL,
  `Project description` tinytext NOT NULL,
  `Has PoC` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Proof of concept',
  `Has feastibility study` enum('Yes','No') NOT NULL DEFAULT 'No',
  `Has MVP` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Minimal viable product',
  `Has marketing plan` enum('Yes','No') NOT NULL DEFAULT 'No',
  `Has production customers` enum('Yes','No') NOT NULL DEFAULT 'No',
  `Target sector` int(11) NOT NULL COMMENT 'Lookup to sectors',
  `Target sub-sector` int(11) NOT NULL COMMENT 'Lokup to sub-sectors',
  `Experts overall score - technical` float NOT NULL COMMENT '0-100',
  `Experts overall score - economical` float NOT NULL COMMENT '0-100',
  `Experts overall score - creative` float NOT NULL COMMENT '0-100',
  `Industry overall score - technical` float NOT NULL COMMENT '0-100',
  `Industry overall score - economical` float NOT NULL COMMENT '0-100',
  `Industry overall score - creative` float NOT NULL COMMENT '0-100',
  `Canvas status` enum('Draft','Submitted','Expert evaluation requested','Expert evaluation in progress','Industry evaluation requested','Industry evaluation in progress','Evalution complete') NOT NULL DEFAULT 'Draft',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Serial number` (`Serial number`),
  KEY `FK_project_canvas_sector` (`Target sector`),
  KEY `FK_project_canvas_sub_sector` (`Target sub-sector`),
  CONSTRAINT `FK_project_canvas_sector` FOREIGN KEY (`Target sector`) REFERENCES `sector` (`ID`),
  CONSTRAINT `FK_project_canvas_sub_sector` FOREIGN KEY (`Target sub-sector`) REFERENCES `sub_sector` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.project_canvas: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_canvas` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_canvas` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.project_canvas_activity
CREATE TABLE IF NOT EXISTS `project_canvas_activity` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Activity text` varchar(30) NOT NULL,
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Added by` int(11) NOT NULL,
  `Added by type` enum('Expert','Student','Industry') NOT NULL,
  `Reply to` int(11) NOT NULL COMMENT 'Lookup to Activities',
  `Canvas` int(11) NOT NULL COMMENT 'Lookup to Canvas',
  `Action type` enum('Comment','Note','Rejection','Acceptance','Appeal','Evaluation Completion') NOT NULL,
  `Scope` enum('User','All') NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_project_canvas_activity_project_canvas_activity` (`Reply to`),
  KEY `FK_project_canvas_activity_project_canvas` (`Canvas`),
  CONSTRAINT `FK_project_canvas_activity_project_canvas` FOREIGN KEY (`Canvas`) REFERENCES `project_canvas` (`ID`),
  CONSTRAINT `FK_project_canvas_activity_project_canvas_activity` FOREIGN KEY (`Reply to`) REFERENCES `project_canvas_activity` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.project_canvas_activity: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_canvas_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_canvas_activity` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.project_canvas_student
CREATE TABLE IF NOT EXISTS `project_canvas_student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Student` int(11) NOT NULL COMMENT 'Lookup to Students',
  `Project Canvas` int(11) NOT NULL COMMENT 'Lookup to Project Canvas',
  `Role` int(11) NOT NULL COMMENT 'Lookup to Student Roles',
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`ID`),
  KEY `FK_project_canvas_student_student` (`Student`),
  KEY `FK_project_canvas_student_project_canvas` (`Project Canvas`),
  KEY `FK_project_canvas_student_student_roles` (`Role`),
  CONSTRAINT `FK_project_canvas_student_project_canvas` FOREIGN KEY (`Project Canvas`) REFERENCES `project_canvas` (`ID`),
  CONSTRAINT `FK_project_canvas_student_student` FOREIGN KEY (`Student`) REFERENCES `student` (`ID`),
  CONSTRAINT `FK_project_canvas_student_student_roles` FOREIGN KEY (`Role`) REFERENCES `student_roles` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.project_canvas_student: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_canvas_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_canvas_student` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.sector
CREATE TABLE IF NOT EXISTS `sector` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Name` varchar(20) NOT NULL,
  `Status` enum('Active','Inactive') DEFAULT 'Active',
  `Expert technical weight` float NOT NULL COMMENT '0-1',
  `Expert economical weight` float NOT NULL COMMENT '0-1',
  `Expert creative weight` float NOT NULL COMMENT '0-1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.sector: ~0 rows (approximately)
/*!40000 ALTER TABLE `sector` DISABLE KEYS */;
/*!40000 ALTER TABLE `sector` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.specialization
CREATE TABLE IF NOT EXISTS `specialization` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Name` varchar(20) NOT NULL,
  `Status` enum('Active','Inactive') DEFAULT 'Active',
  `Sub-sector` int(11) NOT NULL,
  `Expert technical weight` float NOT NULL COMMENT '0-1',
  `Expert economical weight` float NOT NULL COMMENT '0-1',
  `Expert creative weight` float NOT NULL COMMENT '0-1',
  PRIMARY KEY (`ID`),
  KEY `FK_specialization_sub_sector` (`Sub-sector`),
  CONSTRAINT `FK_specialization_sub_sector` FOREIGN KEY (`Sub-sector`) REFERENCES `sub_sector` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.specialization: ~0 rows (approximately)
/*!40000 ALTER TABLE `specialization` DISABLE KEYS */;
/*!40000 ALTER TABLE `specialization` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.states
CREATE TABLE IF NOT EXISTS `states` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Title` varchar(20) NOT NULL,
  `Country` int(11) NOT NULL COMMENT 'Lookup to Countries',
  PRIMARY KEY (`ID`),
  KEY `FK_states_countries` (`Country`),
  CONSTRAINT `FK_states_countries` FOREIGN KEY (`Country`) REFERENCES `countries` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.states: ~0 rows (approximately)
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.student
CREATE TABLE IF NOT EXISTS `student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Last login activity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Given name` varchar(20) NOT NULL,
  `Family name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Birth year` int(11) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Reset password expiry date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Mobile Number` varchar(20) NOT NULL,
  `Phone Number` varchar(20) NOT NULL,
  `Fax` varchar(20) NOT NULL,
  `Agreed on terms` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `Sector` int(11) NOT NULL,
  `Sub-sector` int(11) NOT NULL,
  `Account Confirmed` enum('Yes','No') DEFAULT 'No',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`),
  KEY `FK_student_sector` (`Sector`),
  KEY `FK_student_sub_sector` (`Sub-sector`),
  CONSTRAINT `FK_student_sector` FOREIGN KEY (`Sector`) REFERENCES `sector` (`ID`),
  CONSTRAINT `FK_student_sub_sector` FOREIGN KEY (`Sub-sector`) REFERENCES `sub_sector` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Student entity holds data about students that are submitting project canvas to experts to be evaluated.';

-- Dumping data for table visconti db.student: ~0 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.student_education
CREATE TABLE IF NOT EXISTS `student_education` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Institution name` varchar(20) NOT NULL,
  `Degree` int(11) NOT NULL,
  `Degree details` varchar(20) NOT NULL,
  `From` date NOT NULL,
  `To` date NOT NULL,
  `Details` text NOT NULL,
  `Student` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_student_education_degrees` (`Degree`),
  KEY `FK_student_education_student` (`Student`),
  CONSTRAINT `FK_student_education_degrees` FOREIGN KEY (`Degree`) REFERENCES `degrees` (`ID`),
  CONSTRAINT `FK_student_education_student` FOREIGN KEY (`Student`) REFERENCES `student` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Student education entity holds data about educational history for students';

-- Dumping data for table visconti db.student_education: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_education` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_education` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.student_experience
CREATE TABLE IF NOT EXISTS `student_experience` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Lasto modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Institution name` varchar(20) NOT NULL,
  `Job title` int(11) NOT NULL,
  `Job description` varchar(20) NOT NULL,
  `From` date NOT NULL,
  `To` date NOT NULL,
  `Details` text NOT NULL,
  `Student` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_student_experience_job_titles` (`Job title`),
  KEY `FK_student_experience_student` (`Student`),
  CONSTRAINT `FK_student_experience_job_titles` FOREIGN KEY (`Job title`) REFERENCES `job_titles` (`ID`),
  CONSTRAINT `FK_student_experience_student` FOREIGN KEY (`Student`) REFERENCES `student` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Student experience entity holds data about experience/training history for students';

-- Dumping data for table visconti db.student_experience: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_experience` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.student_roles
CREATE TABLE IF NOT EXISTS `student_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Title` varchar(20) NOT NULL,
  `Code` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.student_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
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

-- Dumping structure for table visconti db.sub_sector
CREATE TABLE IF NOT EXISTS `sub_sector` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Name` varchar(20) NOT NULL,
  `Status` enum('Active','Inactive') DEFAULT 'Active',
  `Sector` int(11) NOT NULL,
  `Expert technical weight` float NOT NULL COMMENT '0-1',
  `Expert economical weight` float NOT NULL COMMENT '0-1',
  `Expert creative weight` float NOT NULL COMMENT '0-1',
  PRIMARY KEY (`ID`),
  KEY `FK_sub_sector_sector` (`Sector`),
  CONSTRAINT `FK_sub_sector_sector` FOREIGN KEY (`Sector`) REFERENCES `sector` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table visconti db.sub_sector: ~0 rows (approximately)
/*!40000 ALTER TABLE `sub_sector` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_sector` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
