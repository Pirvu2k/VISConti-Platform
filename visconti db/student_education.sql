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
