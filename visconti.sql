-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for yii2basic
CREATE DATABASE IF NOT EXISTS `yii2basic` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `yii2basic`;


-- Dumping structure for table yii2basic.administrators
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

-- Dumping data for table yii2basic.administrators: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;


-- Dumping structure for table yii2basic.administrator_roles
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

-- Dumping data for table yii2basic.administrator_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrator_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrator_roles` ENABLE KEYS */;


-- Dumping structure for table yii2basic.apps_countries
CREATE TABLE IF NOT EXISTS `apps_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.apps_countries: 246 rows
/*!40000 ALTER TABLE `apps_countries` DISABLE KEYS */;
INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
	(1, 'AF', 'Afghanistan'),
	(2, 'AL', 'Albania'),
	(3, 'DZ', 'Algeria'),
	(4, 'DS', 'American Samoa'),
	(5, 'AD', 'Andorra'),
	(6, 'AO', 'Angola'),
	(7, 'AI', 'Anguilla'),
	(8, 'AQ', 'Antarctica'),
	(9, 'AG', 'Antigua and Barbuda'),
	(10, 'AR', 'Argentina'),
	(11, 'AM', 'Armenia'),
	(12, 'AW', 'Aruba'),
	(13, 'AU', 'Australia'),
	(14, 'AT', 'Austria'),
	(15, 'AZ', 'Azerbaijan'),
	(16, 'BS', 'Bahamas'),
	(17, 'BH', 'Bahrain'),
	(18, 'BD', 'Bangladesh'),
	(19, 'BB', 'Barbados'),
	(20, 'BY', 'Belarus'),
	(21, 'BE', 'Belgium'),
	(22, 'BZ', 'Belize'),
	(23, 'BJ', 'Benin'),
	(24, 'BM', 'Bermuda'),
	(25, 'BT', 'Bhutan'),
	(26, 'BO', 'Bolivia'),
	(27, 'BA', 'Bosnia and Herzegovina'),
	(28, 'BW', 'Botswana'),
	(29, 'BV', 'Bouvet Island'),
	(30, 'BR', 'Brazil'),
	(31, 'IO', 'British Indian Ocean Territory'),
	(32, 'BN', 'Brunei Darussalam'),
	(33, 'BG', 'Bulgaria'),
	(34, 'BF', 'Burkina Faso'),
	(35, 'BI', 'Burundi'),
	(36, 'KH', 'Cambodia'),
	(37, 'CM', 'Cameroon'),
	(38, 'CA', 'Canada'),
	(39, 'CV', 'Cape Verde'),
	(40, 'KY', 'Cayman Islands'),
	(41, 'CF', 'Central African Republic'),
	(42, 'TD', 'Chad'),
	(43, 'CL', 'Chile'),
	(44, 'CN', 'China'),
	(45, 'CX', 'Christmas Island'),
	(46, 'CC', 'Cocos (Keeling) Islands'),
	(47, 'CO', 'Colombia'),
	(48, 'KM', 'Comoros'),
	(49, 'CG', 'Congo'),
	(50, 'CK', 'Cook Islands'),
	(51, 'CR', 'Costa Rica'),
	(52, 'HR', 'Croatia (Hrvatska)'),
	(53, 'CU', 'Cuba'),
	(54, 'CY', 'Cyprus'),
	(55, 'CZ', 'Czech Republic'),
	(56, 'DK', 'Denmark'),
	(57, 'DJ', 'Djibouti'),
	(58, 'DM', 'Dominica'),
	(59, 'DO', 'Dominican Republic'),
	(60, 'TP', 'East Timor'),
	(61, 'EC', 'Ecuador'),
	(62, 'EG', 'Egypt'),
	(63, 'SV', 'El Salvador'),
	(64, 'GQ', 'Equatorial Guinea'),
	(65, 'ER', 'Eritrea'),
	(66, 'EE', 'Estonia'),
	(67, 'ET', 'Ethiopia'),
	(68, 'FK', 'Falkland Islands (Malvinas)'),
	(69, 'FO', 'Faroe Islands'),
	(70, 'FJ', 'Fiji'),
	(71, 'FI', 'Finland'),
	(72, 'FR', 'France'),
	(73, 'FX', 'France, Metropolitan'),
	(74, 'GF', 'French Guiana'),
	(75, 'PF', 'French Polynesia'),
	(76, 'TF', 'French Southern Territories'),
	(77, 'GA', 'Gabon'),
	(78, 'GM', 'Gambia'),
	(79, 'GE', 'Georgia'),
	(80, 'DE', 'Germany'),
	(81, 'GH', 'Ghana'),
	(82, 'GI', 'Gibraltar'),
	(83, 'GK', 'Guernsey'),
	(84, 'GR', 'Greece'),
	(85, 'GL', 'Greenland'),
	(86, 'GD', 'Grenada'),
	(87, 'GP', 'Guadeloupe'),
	(88, 'GU', 'Guam'),
	(89, 'GT', 'Guatemala'),
	(90, 'GN', 'Guinea'),
	(91, 'GW', 'Guinea-Bissau'),
	(92, 'GY', 'Guyana'),
	(93, 'HT', 'Haiti'),
	(94, 'HM', 'Heard and Mc Donald Islands'),
	(95, 'HN', 'Honduras'),
	(96, 'HK', 'Hong Kong'),
	(97, 'HU', 'Hungary'),
	(98, 'IS', 'Iceland'),
	(99, 'IN', 'India'),
	(100, 'IM', 'Isle of Man'),
	(101, 'ID', 'Indonesia'),
	(102, 'IR', 'Iran (Islamic Republic of)'),
	(103, 'IQ', 'Iraq'),
	(104, 'IE', 'Ireland'),
	(105, 'IL', 'Israel'),
	(106, 'IT', 'Italy'),
	(107, 'CI', 'Ivory Coast'),
	(108, 'JE', 'Jersey'),
	(109, 'JM', 'Jamaica'),
	(110, 'JP', 'Japan'),
	(111, 'JO', 'Jordan'),
	(112, 'KZ', 'Kazakhstan'),
	(113, 'KE', 'Kenya'),
	(114, 'KI', 'Kiribati'),
	(115, 'KP', 'Korea, Democratic People\'s Republic of'),
	(116, 'KR', 'Korea, Republic of'),
	(117, 'XK', 'Kosovo'),
	(118, 'KW', 'Kuwait'),
	(119, 'KG', 'Kyrgyzstan'),
	(120, 'LA', 'Lao People\'s Democratic Republic'),
	(121, 'LV', 'Latvia'),
	(122, 'LB', 'Lebanon'),
	(123, 'LS', 'Lesotho'),
	(124, 'LR', 'Liberia'),
	(125, 'LY', 'Libyan Arab Jamahiriya'),
	(126, 'LI', 'Liechtenstein'),
	(127, 'LT', 'Lithuania'),
	(128, 'LU', 'Luxembourg'),
	(129, 'MO', 'Macau'),
	(130, 'MK', 'Macedonia'),
	(131, 'MG', 'Madagascar'),
	(132, 'MW', 'Malawi'),
	(133, 'MY', 'Malaysia'),
	(134, 'MV', 'Maldives'),
	(135, 'ML', 'Mali'),
	(136, 'MT', 'Malta'),
	(137, 'MH', 'Marshall Islands'),
	(138, 'MQ', 'Martinique'),
	(139, 'MR', 'Mauritania'),
	(140, 'MU', 'Mauritius'),
	(141, 'TY', 'Mayotte'),
	(142, 'MX', 'Mexico'),
	(143, 'FM', 'Micronesia, Federated States of'),
	(144, 'MD', 'Moldova, Republic of'),
	(145, 'MC', 'Monaco'),
	(146, 'MN', 'Mongolia'),
	(147, 'ME', 'Montenegro'),
	(148, 'MS', 'Montserrat'),
	(149, 'MA', 'Morocco'),
	(150, 'MZ', 'Mozambique'),
	(151, 'MM', 'Myanmar'),
	(152, 'NA', 'Namibia'),
	(153, 'NR', 'Nauru'),
	(154, 'NP', 'Nepal'),
	(155, 'NL', 'Netherlands'),
	(156, 'AN', 'Netherlands Antilles'),
	(157, 'NC', 'New Caledonia'),
	(158, 'NZ', 'New Zealand'),
	(159, 'NI', 'Nicaragua'),
	(160, 'NE', 'Niger'),
	(161, 'NG', 'Nigeria'),
	(162, 'NU', 'Niue'),
	(163, 'NF', 'Norfolk Island'),
	(164, 'MP', 'Northern Mariana Islands'),
	(165, 'NO', 'Norway'),
	(166, 'OM', 'Oman'),
	(167, 'PK', 'Pakistan'),
	(168, 'PW', 'Palau'),
	(169, 'PS', 'Palestine'),
	(170, 'PA', 'Panama'),
	(171, 'PG', 'Papua New Guinea'),
	(172, 'PY', 'Paraguay'),
	(173, 'PE', 'Peru'),
	(174, 'PH', 'Philippines'),
	(175, 'PN', 'Pitcairn'),
	(176, 'PL', 'Poland'),
	(177, 'PT', 'Portugal'),
	(178, 'PR', 'Puerto Rico'),
	(179, 'QA', 'Qatar'),
	(180, 'RE', 'Reunion'),
	(181, 'RO', 'Romania'),
	(182, 'RU', 'Russian Federation'),
	(183, 'RW', 'Rwanda'),
	(184, 'KN', 'Saint Kitts and Nevis'),
	(185, 'LC', 'Saint Lucia'),
	(186, 'VC', 'Saint Vincent and the Grenadines'),
	(187, 'WS', 'Samoa'),
	(188, 'SM', 'San Marino'),
	(189, 'ST', 'Sao Tome and Principe'),
	(190, 'SA', 'Saudi Arabia'),
	(191, 'SN', 'Senegal'),
	(192, 'RS', 'Serbia'),
	(193, 'SC', 'Seychelles'),
	(194, 'SL', 'Sierra Leone'),
	(195, 'SG', 'Singapore'),
	(196, 'SK', 'Slovakia'),
	(197, 'SI', 'Slovenia'),
	(198, 'SB', 'Solomon Islands'),
	(199, 'SO', 'Somalia'),
	(200, 'ZA', 'South Africa'),
	(201, 'GS', 'South Georgia South Sandwich Islands'),
	(202, 'ES', 'Spain'),
	(203, 'LK', 'Sri Lanka'),
	(204, 'SH', 'St. Helena'),
	(205, 'PM', 'St. Pierre and Miquelon'),
	(206, 'SD', 'Sudan'),
	(207, 'SR', 'Suriname'),
	(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
	(209, 'SZ', 'Swaziland'),
	(210, 'SE', 'Sweden'),
	(211, 'CH', 'Switzerland'),
	(212, 'SY', 'Syrian Arab Republic'),
	(213, 'TW', 'Taiwan'),
	(214, 'TJ', 'Tajikistan'),
	(215, 'TZ', 'Tanzania, United Republic of'),
	(216, 'TH', 'Thailand'),
	(217, 'TG', 'Togo'),
	(218, 'TK', 'Tokelau'),
	(219, 'TO', 'Tonga'),
	(220, 'TT', 'Trinidad and Tobago'),
	(221, 'TN', 'Tunisia'),
	(222, 'TR', 'Turkey'),
	(223, 'TM', 'Turkmenistan'),
	(224, 'TC', 'Turks and Caicos Islands'),
	(225, 'TV', 'Tuvalu'),
	(226, 'UG', 'Uganda'),
	(227, 'UA', 'Ukraine'),
	(228, 'AE', 'United Arab Emirates'),
	(229, 'GB', 'United Kingdom'),
	(230, 'US', 'United States'),
	(231, 'UM', 'United States minor outlying islands'),
	(232, 'UY', 'Uruguay'),
	(233, 'UZ', 'Uzbekistan'),
	(234, 'VU', 'Vanuatu'),
	(235, 'VA', 'Vatican City State'),
	(236, 'VE', 'Venezuela'),
	(237, 'VN', 'Vietnam'),
	(238, 'VG', 'Virgin Islands (British)'),
	(239, 'VI', 'Virgin Islands (U.S.)'),
	(240, 'WF', 'Wallis and Futuna Islands'),
	(241, 'EH', 'Western Sahara'),
	(242, 'YE', 'Yemen'),
	(243, 'YU', 'Yugoslavia'),
	(244, 'ZR', 'Zaire'),
	(245, 'ZM', 'Zambia'),
	(246, 'ZW', 'Zimbabwe');
/*!40000 ALTER TABLE `apps_countries` ENABLE KEYS */;


-- Dumping structure for table yii2basic.auth_assignment
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii2basic.auth_assignment: ~9 rows (approximately)
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('expert', '19', 1459290325),
	('expert', '22', 1459354429),
	('expert', '24', 1459354494),
	('student', '20', 1459290342),
	('student', '21', 1459295097),
	('student', '23', 1459354473),
	('student', '25', 1459358101),
	('student', '26', 1459786278),
	('student', '27', 1459786568),
	('student', '28', 1459786615);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;


-- Dumping structure for table yii2basic.auth_item
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii2basic.auth_item: ~2 rows (approximately)
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('expert', 1, '', NULL, NULL, 1458466740, 1458466740),
	('student', 1, '', NULL, NULL, 1458466732, 1458466732);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;


-- Dumping structure for table yii2basic.auth_item_child
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii2basic.auth_item_child: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;


-- Dumping structure for table yii2basic.auth_rule
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii2basic.auth_rule: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Dumping structure for table yii2basic.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `comment` text,
  `model_type` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `type_user` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping structure for table yii2basic.canvases
CREATE TABLE IF NOT EXISTS `canvases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `content` text NOT NULL,
  `requested` text NOT NULL,
  `created_by` tinytext NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `assigned_to` tinytext NOT NULL,
  `expert_id` tinyint(4) NOT NULL,
  `language` tinytext NOT NULL,
  `eng_summary` text NOT NULL,
  `archive` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Dumping data for table yii2basic.canvases: ~9 rows (approximately)
/*!40000 ALTER TABLE `canvases` DISABLE KEYS */;
INSERT INTO `canvases` (`id`, `title`, `content`, `requested`, `created_by`, `date_added`, `date_modified`, `assigned_to`, `expert_id`, `language`, `eng_summary`, `archive`) VALUES
	(28, 'Project Example 1 ', '<h2><strong>Hello, my name is Mihai!</strong></h2>\r\n<p><strong>I am having a great time testing out VISConti!</strong></p>', '1', '3', '2016-03-20 15:43:20', '2016-03-20 15:43:20', 'test3', 0, 'en', 'Short summary of the project, currently none :( ', NULL),
	(29, 'Test Canvas Skype (edit)', '<h1 style="text-align: center;">Title</h1>\r\n<p>content</p>\r\n<p>content</p>\r\n<p>content</p>', '1', 'test2', '2016-03-22 19:46:50', '2016-03-22 19:47:13', '', 0, 'en', 'Test Summary. Hello World.', NULL),
	(54, 'Test Project', '<p>dioasjdijdasijdo<strong>idasjaidioasjdijdasijdoidasjaidioasjdijd</strong>asijdoidasjaidioasjdijdasijdoidasjai</p>', '1', 'skypeStudent', '2016-03-30 19:28:53', '2016-03-30 19:28:53', '', 0, 'en', 'blablablabalblabalbal', NULL),
	(55, 'adi9asjdsijd', '<p>dasdasdasdasdasdasdsadasdas</p>', '1', 'student3', '2016-03-30 19:30:55', '2016-03-30 19:30:55', '', 0, 'en', 'dasdadasdadadasdas', NULL),
	(56, 'dadadasdasd', '<p>dasdasdasdasdasdasdasd</p>', '1', 'student3', '2016-04-04 18:29:49', '2016-04-04 18:29:49', '', 0, 'en', 'asdasdasdasdasdas', NULL),
	(57, 'dasdsadasdas', '<p>dasdasdasdasd</p>', '1', 'student3', '2016-04-04 18:30:25', '2016-04-04 18:30:25', '', 0, 'en', 'dasdasdasdasdasdasdas', NULL),
	(58, 'dsadasdasd', '<p>asdasdadasdasddas</p>', '1', 'student3', '2016-04-04 18:43:37', '2016-04-04 18:43:37', '', 0, 'en', 'dasdasddadasdasdasdas', NULL),
	(59, 'dasdasdasdasdas', '<p>dasdasdasdasdasdasd</p>', '1', 'student3', '2016-04-04 19:08:05', '2016-04-04 19:08:05', '', 0, 'en', 'dasdasdasdasdasdas', NULL),
	(60, 'dasdadasdas', '<p>dasdasdasdadasdasd</p>', '1', 'mihai@pirvulet.com', '2016-04-04 19:17:13', '2016-04-04 19:17:13', '', 0, 'en', 'dasdasdasdasdasdas', NULL),
	(61, 'dasddasdada', '<p>dasdasdasdadadas</p>', '1', '3', '2016-04-09 12:52:13', '2016-04-09 12:52:13', '', 0, 'en', 'dasdasdasdadasda', NULL);
/*!40000 ALTER TABLE `canvases` ENABLE KEYS */;


-- Dumping structure for table yii2basic.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Title` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.countries: ~0 rows (approximately)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;


-- Dumping structure for table yii2basic.country
CREATE TABLE IF NOT EXISTS `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.country: ~10 rows (approximately)
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`code`, `name`, `population`) VALUES
	('23', 'Romania', 103020320),
	('AU', 'Australia', 18886000),
	('BR', 'Brazil', 170115000),
	('CA', 'Canada', 1147000),
	('CN', 'China', 1277558000),
	('DE', 'Germany', 82164700),
	('FR', 'France', 59225700),
	('GB', 'United Kingdom', 59623400),
	('IN', 'India', 1013662000),
	('RU', 'Russia', 146934000),
	('US', 'United States', 278357000);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;


-- Dumping structure for table yii2basic.degrees
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

-- Dumping data for table yii2basic.degrees: ~0 rows (approximately)
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;


-- Dumping structure for table yii2basic.education
CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  `degree` varchar(50) NOT NULL DEFAULT '0',
  `institution` varchar(50) NOT NULL DEFAULT '0',
  `from` varchar(50) NOT NULL DEFAULT '0',
  `to` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table yii2basic.education: ~2 rows (approximately)
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` (`id`, `user_id`, `degree`, `institution`, `from`, `to`) VALUES
	(1, '5', 'Master', 'Somewhere', '1977', '1978'),
	(2, '5', 'PhD', 'CNET', '2010', '2014'),
	(3, '23', 'Master', 'Ecaterina', '2012', '2016');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;


-- Dumping structure for table yii2basic.experience
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  `job_title` varchar(50) NOT NULL DEFAULT '0',
  `institution` varchar(50) NOT NULL DEFAULT '0',
  `from` varchar(50) NOT NULL DEFAULT '0',
  `to` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table yii2basic.experience: ~2 rows (approximately)
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` (`id`, `user_id`, `job_title`, `institution`, `from`, `to`) VALUES
	(6, '5', 'da', 'da', '2010', '2015'),
	(7, '5', 'test', 'test', '2011', '2015'),
	(8, '23', 'Developer', 'VISConti', '2012', '2016');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert
CREATE TABLE IF NOT EXISTS `expert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `last_login_activity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(20) NOT NULL,
  `given_name` varchar(20) NOT NULL,
  `family_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'shall be hashed in the db',
  `reset_pass_exp_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'once an expert member request reset of password, this field stores the expiry date of the reset password request',
  `website` varchar(50) NOT NULL,
  `bio` varchar(1024) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `terms` enum('Yes','No') DEFAULT 'Yes',
  `confirmed` enum('Yes','No') DEFAULT 'No',
  `active_projects` int(11) NOT NULL,
  `sectors` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.expert: ~2 rows (approximately)
/*!40000 ALTER TABLE `expert` DISABLE KEYS */;
INSERT INTO `expert` (`id`, `created_on`, `last_modified_on`, `trash`, `last_login_activity`, `title`, `given_name`, `family_name`, `email`, `birth_year`, `password`, `reset_pass_exp_date`, `website`, `bio`, `country`, `zip`, `city`, `address`, `state`, `mobile`, `phone`, `fax`, `terms`, `confirmed`, `active_projects`, `sectors`) VALUES
	(13, '2016-04-16 03:27:44', '2016-04-11 12:32:54', NULL, '2016-04-10 22:31:29', 'Mr.', 'Mihai', 'Pirvulet', 'expert@test.com', 1915, '$2y$13$e6kmM5uEnX/E.1dtV9zSL./rOwvGamfzcUKU97luaWXw8MvXRjyIm', '0000-00-00 00:00:00', 'http://fomrad.com', 'dadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadadada', 'Romania', '223945', 'Balesti', 'Str.2 Ap. 5', 'Gorj', '312312312', '443243242', '', 'Yes', 'No', 0, '1,2'),
	(14, '2016-04-13 20:24:28', '2016-04-13 20:24:28', NULL, '2016-04-13 20:24:28', '', '', '', 'da@test.com', 0, '$2y$13$Ik8umC88ANX7NdNOypQAFu1ENzKlmfSurC3niupUfwptGvhu6N6Y2', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 'Yes', 'No', 0, NULL);
/*!40000 ALTER TABLE `expert` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert_education
CREATE TABLE IF NOT EXISTS `expert_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  `degree` varchar(50) NOT NULL DEFAULT '0',
  `institution` varchar(50) NOT NULL DEFAULT '0',
  `from` varchar(50) NOT NULL DEFAULT '0',
  `degree_details` varchar(1024) NOT NULL DEFAULT '0',
  `to` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table yii2basic.expert_education: ~2 rows (approximately)
/*!40000 ALTER TABLE `expert_education` DISABLE KEYS */;
INSERT INTO `expert_education` (`id`, `user_id`, `degree`, `institution`, `from`, `degree_details`, `to`) VALUES
	(2, '0', 'Yes', 'It\'s me', '1916', 'Here i did some of the best shit ever,', '1939'),
	(3, '0', 'dadasdasd', 'asdasdasdas', '1905', 'dadsasdasda', '1910'),
	(8, '13', 'sdsadasdasdas', 'dasdasdasd', '1917', 'asdasdasdas', '1916');
/*!40000 ALTER TABLE `expert_education` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert_experience
CREATE TABLE IF NOT EXISTS `expert_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  `job_title` varchar(50) NOT NULL DEFAULT '0',
  `institution` varchar(50) NOT NULL DEFAULT '0',
  `from` varchar(50) NOT NULL DEFAULT '0',
  `to` varchar(50) NOT NULL DEFAULT '0',
  `job_description` varchar(1024) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table yii2basic.expert_experience: ~2 rows (approximately)
/*!40000 ALTER TABLE `expert_experience` DISABLE KEYS */;
INSERT INTO `expert_experience` (`id`, `user_id`, `job_title`, `institution`, `from`, `to`, `job_description`) VALUES
	(3, '13', 'dasdasdas', 'dasdsads', '1916', '1918', 'dasdasdas'),
	(4, '13', 'dasdasda', 'asdasdasd', '1917', '1907', 'sdasdasd');
/*!40000 ALTER TABLE `expert_experience` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert_interest
CREATE TABLE IF NOT EXISTS `expert_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `interest` int(11) NOT NULL COMMENT 'Lookup to interests',
  `expert` int(11) NOT NULL COMMENT 'Lookup to experts',
  PRIMARY KEY (`id`),
  KEY `FK_expert_interest_expert` (`expert`),
  KEY `FK_expert_interest_interest` (`interest`),
  CONSTRAINT `FK_expert_interest_expert` FOREIGN KEY (`expert`) REFERENCES `expert` (`id`),
  CONSTRAINT `FK_expert_interest_interest` FOREIGN KEY (`interest`) REFERENCES `interest` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.expert_interest: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_interest` DISABLE KEYS */;
INSERT INTO `expert_interest` (`id`, `created_on`, `last_modified_on`, `trash`, `interest`, `expert`) VALUES
	(3, '2016-04-16 02:42:00', '0000-00-00 00:00:00', NULL, 1, 13);
/*!40000 ALTER TABLE `expert_interest` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert_project_canvas_assignation
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
  CONSTRAINT `FK_expert_project_canvas_assignation_expert` FOREIGN KEY (`Expert`) REFERENCES `expert` (`id`),
  CONSTRAINT `FK_expert_project_canvas_assignation_expert_roles_entity` FOREIGN KEY (`Role`) REFERENCES `expert_roles` (`ID`),
  CONSTRAINT `FK_expert_project_canvas_assignation_project_canvas` FOREIGN KEY (`Project`) REFERENCES `project_canvas` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.expert_project_canvas_assignation: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_project_canvas_assignation` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_project_canvas_assignation` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert_roles
CREATE TABLE IF NOT EXISTS `expert_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Last modified on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Trash` enum('Yes','No') DEFAULT NULL,
  `Code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.expert_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `expert_roles` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert_sector
CREATE TABLE IF NOT EXISTS `expert_sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `sector_id` int(11) NOT NULL COMMENT 'Lookup to Sectors',
  `expert` int(11) NOT NULL COMMENT 'Lookup to Experts',
  PRIMARY KEY (`id`),
  KEY `FK_expert_sector_expert` (`expert`),
  KEY `FK_expert_sector_sector` (`sector_id`),
  CONSTRAINT `FK_expert_sector_expert` FOREIGN KEY (`expert`) REFERENCES `expert` (`id`),
  CONSTRAINT `FK_expert_sector_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.expert_sector: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_sector` DISABLE KEYS */;
INSERT INTO `expert_sector` (`id`, `created_on`, `last_modified_on`, `trash`, `sector_id`, `expert`) VALUES
	(17, '2016-04-16 02:36:09', '0000-00-00 00:00:00', NULL, 1, 13),
	(20, '2016-04-16 02:41:38', '0000-00-00 00:00:00', NULL, 2, 13),
	(21, '2016-04-16 02:41:47', '0000-00-00 00:00:00', NULL, 3, 13);
/*!40000 ALTER TABLE `expert_sector` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert_specialization
CREATE TABLE IF NOT EXISTS `expert_specialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `specialization` int(11) NOT NULL COMMENT 'Lookup to Specializations',
  `expert` int(11) NOT NULL COMMENT 'Lookup to Experts',
  PRIMARY KEY (`id`),
  KEY `FK_expert_specialization_expert` (`expert`),
  KEY `FK_expert_specialization_specialization` (`specialization`),
  CONSTRAINT `FK_expert_specialization_expert` FOREIGN KEY (`expert`) REFERENCES `expert` (`id`),
  CONSTRAINT `FK_expert_specialization_specialization` FOREIGN KEY (`specialization`) REFERENCES `specialization` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.expert_specialization: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_specialization` DISABLE KEYS */;
INSERT INTO `expert_specialization` (`id`, `created_on`, `last_modified_on`, `trash`, `specialization`, `expert`) VALUES
	(8, '2016-04-16 02:41:59', '0000-00-00 00:00:00', NULL, 1, 13),
	(9, '2016-04-16 02:41:59', '0000-00-00 00:00:00', NULL, 2, 13);
/*!40000 ALTER TABLE `expert_specialization` ENABLE KEYS */;


-- Dumping structure for table yii2basic.expert_sub_sector
CREATE TABLE IF NOT EXISTS `expert_sub_sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `subsector` int(11) NOT NULL COMMENT 'Lookup to sub-sectors',
  `expert` int(11) NOT NULL COMMENT 'Look up to Experts',
  PRIMARY KEY (`id`),
  KEY `FK_expert_sub_sector_expert` (`expert`),
  KEY `FK_expert_sub_sector_sub_sector` (`subsector`),
  CONSTRAINT `FK_expert_sub_sector_expert` FOREIGN KEY (`expert`) REFERENCES `expert` (`id`),
  CONSTRAINT `FK_expert_sub_sector_sub_sector` FOREIGN KEY (`subsector`) REFERENCES `sub_sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.expert_sub_sector: ~0 rows (approximately)
/*!40000 ALTER TABLE `expert_sub_sector` DISABLE KEYS */;
INSERT INTO `expert_sub_sector` (`id`, `created_on`, `last_modified_on`, `trash`, `subsector`, `expert`) VALUES
	(6, '2016-04-16 02:36:31', '0000-00-00 00:00:00', NULL, 1, 13);
/*!40000 ALTER TABLE `expert_sub_sector` ENABLE KEYS */;


-- Dumping structure for table yii2basic.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `canvas_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table yii2basic.files: ~0 rows (approximately)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;


-- Dumping structure for table yii2basic.industry_account
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
  CONSTRAINT `FK_industry_account_sector` FOREIGN KEY (`Sector`) REFERENCES `sector` (`id`),
  CONSTRAINT `FK_industry_account_sector_2` FOREIGN KEY (`Sector 2`) REFERENCES `sector` (`id`),
  CONSTRAINT `FK_industry_account_sector_3` FOREIGN KEY (`Sector 3`) REFERENCES `sector` (`id`),
  CONSTRAINT `FK_industry_account_sub_sector` FOREIGN KEY (`Sub-sector`) REFERENCES `sub_sector` (`id`),
  CONSTRAINT `FK_industry_account_sub_sector_2` FOREIGN KEY (`Sub-sector 2`) REFERENCES `sub_sector` (`id`),
  CONSTRAINT `FK_industry_account_sub_sector_3` FOREIGN KEY (`Sub-sector 3`) REFERENCES `sub_sector` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.industry_account: ~0 rows (approximately)
/*!40000 ALTER TABLE `industry_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `industry_account` ENABLE KEYS */;


-- Dumping structure for table yii2basic.industry_account_project_canvas_assignation
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

-- Dumping data for table yii2basic.industry_account_project_canvas_assignation: ~0 rows (approximately)
/*!40000 ALTER TABLE `industry_account_project_canvas_assignation` DISABLE KEYS */;
/*!40000 ALTER TABLE `industry_account_project_canvas_assignation` ENABLE KEYS */;


-- Dumping structure for table yii2basic.industry_account_representative_roles
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

-- Dumping data for table yii2basic.industry_account_representative_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `industry_account_representative_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `industry_account_representative_roles` ENABLE KEYS */;


-- Dumping structure for table yii2basic.interest
CREATE TABLE IF NOT EXISTS `interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `status` enum('Yes','No') DEFAULT NULL,
  `specialization` int(11) NOT NULL,
  `expert_technical_weight` float NOT NULL COMMENT '0-1',
  `expert_economical_weight` float NOT NULL COMMENT '0-1',
  `expert_creative_weight` float NOT NULL COMMENT '0-1',
  PRIMARY KEY (`id`),
  KEY `specialization` (`specialization`),
  CONSTRAINT `FK_specialization_interests` FOREIGN KEY (`specialization`) REFERENCES `specialization` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.interest: ~3 rows (approximately)
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` (`id`, `created_on`, `last_modified_on`, `trash`, `name`, `status`, `specialization`, `expert_technical_weight`, `expert_economical_weight`, `expert_creative_weight`) VALUES
	(1, '2016-04-15 23:17:38', '0000-00-00 00:00:00', NULL, 'test', NULL, 1, 0, 0, 0),
	(2, '2016-04-15 23:17:45', '0000-00-00 00:00:00', NULL, 'test2', NULL, 3, 0, 0, 0),
	(3, '2016-04-15 23:17:54', '0000-00-00 00:00:00', NULL, 'testt', NULL, 1, 0, 0, 0),
	(4, '2016-04-15 23:17:45', '0000-00-00 00:00:00', NULL, 'test23', NULL, 3, 0, 0, 0);
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;


-- Dumping structure for table yii2basic.job_titles
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

-- Dumping data for table yii2basic.job_titles: ~0 rows (approximately)
/*!40000 ALTER TABLE `job_titles` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_titles` ENABLE KEYS */;


-- Dumping structure for table yii2basic.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table yii2basic.migration: ~10 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1455031567),
	('m140209_132017_init', 1455032381),
	('m140403_174025_create_account_table', 1455032384),
	('m140504_113157_update_tables', 1455032398),
	('m140504_130429_create_token_table', 1455032401),
	('m140506_102106_rbac_init', 1456444472),
	('m140830_171933_fix_ip_field', 1455032405),
	('m140830_172703_change_account_table_name', 1455032405),
	('m141222_110026_update_ip_field', 1455032408),
	('m141222_135246_alter_username_length', 1455032409),
	('m150614_103145_update_social_account_table', 1455032413),
	('m150623_212711_fix_username_notnull', 1455032415),
	('m160211_135237_add_new_field_to_user', 1455201107),
	('m160327_111530_add_new_field_to_user', 1459078820),
	('m160327_130443_add_new_field_to_user', 1459083973);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Dumping structure for table yii2basic.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  `gravatar_email` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `ed_desc` text,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `byear` varchar(50) DEFAULT NULL,
  `exp_desc` varchar(50) DEFAULT NULL,
  `gravatar_id` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `fax_number` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table yii2basic.profile: ~18 rows (approximately)
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`user_id`, `name`, `public_email`, `website`, `bio`, `gravatar_email`, `state`, `ed_desc`, `address`, `city`, `zip`, `byear`, `exp_desc`, `gravatar_id`, `phone_number`, `fax_number`, `country`) VALUES
	(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'da', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', '+40784198777', '+40784198777', '17'),
	(5, 'Mihai The boss', 'test@test.com', '', 'AAAAAAAAA', NULL, '', 'This is where I say stuff about my education.\r\n', 'yes', '', '21323', '1916', NULL, NULL, '+407222222222', '+407222222222', 'Albania'),
	(6, '', '', '', '', NULL, '', '', '', '', '', '1918', '', NULL, '', '', 'Afghanistan'),
	(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, '', '', '', '', NULL, '', '', '', '', '', '', '', NULL, '', '', ''),
	(20, 'da', '', '', '', NULL, '', '', '', '', '', '', '', NULL, '', '', 'Afghanistan'),
	(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(23, 'Mihai failed so hard', 'demo@fail.com', 'http://fomrad.com', 'I am good at failing demos.', NULL, 'State', '', 'Address', 'Tg-Jiu', '2313123', '2000', '', NULL, '+40784198777', '+40784198777', 'Austria'),
	(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;


-- Dumping structure for table yii2basic.project_attachments
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

-- Dumping data for table yii2basic.project_attachments: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_attachments` ENABLE KEYS */;


-- Dumping structure for table yii2basic.project_canvas
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
  CONSTRAINT `FK_project_canvas_sector` FOREIGN KEY (`Target sector`) REFERENCES `sector` (`id`),
  CONSTRAINT `FK_project_canvas_sub_sector` FOREIGN KEY (`Target sub-sector`) REFERENCES `sub_sector` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.project_canvas: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_canvas` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_canvas` ENABLE KEYS */;


-- Dumping structure for table yii2basic.project_canvas_activity
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

-- Dumping data for table yii2basic.project_canvas_activity: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_canvas_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_canvas_activity` ENABLE KEYS */;


-- Dumping structure for table yii2basic.project_canvas_student
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
  CONSTRAINT `FK_project_canvas_student_student` FOREIGN KEY (`Student`) REFERENCES `student` (`id`),
  CONSTRAINT `FK_project_canvas_student_student_roles` FOREIGN KEY (`Role`) REFERENCES `student_roles` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.project_canvas_student: ~0 rows (approximately)
/*!40000 ALTER TABLE `project_canvas_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_canvas_student` ENABLE KEYS */;


-- Dumping structure for table yii2basic.sector
CREATE TABLE IF NOT EXISTS `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.sector: ~3 rows (approximately)
/*!40000 ALTER TABLE `sector` DISABLE KEYS */;
INSERT INTO `sector` (`id`, `created_on`, `last_modified_on`, `trash`, `name`, `status`) VALUES
	(1, '2016-04-11 16:03:56', '0000-00-00 00:00:00', NULL, 'sector 1', 'Active'),
	(2, '2016-04-11 16:04:07', '0000-00-00 00:00:00', NULL, 'sector 2', 'Active'),
	(3, '2016-04-15 11:00:03', '0000-00-00 00:00:00', NULL, 'sector3', 'Active');
/*!40000 ALTER TABLE `sector` ENABLE KEYS */;


-- Dumping structure for table yii2basic.social_account
CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  `code` varchar(32) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table yii2basic.social_account: ~0 rows (approximately)
/*!40000 ALTER TABLE `social_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_account` ENABLE KEYS */;


-- Dumping structure for table yii2basic.specialization
CREATE TABLE IF NOT EXISTS `specialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `subsector` int(11) NOT NULL,
  `Expert technical weight` float NOT NULL COMMENT '0-1',
  `Expert economical weight` float NOT NULL COMMENT '0-1',
  `Expert creative weight` float NOT NULL COMMENT '0-1',
  PRIMARY KEY (`id`),
  KEY `FK_specialization_sub_sector` (`subsector`),
  CONSTRAINT `FK_specialization_sub_sector` FOREIGN KEY (`subsector`) REFERENCES `sub_sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.specialization: ~3 rows (approximately)
/*!40000 ALTER TABLE `specialization` DISABLE KEYS */;
INSERT INTO `specialization` (`id`, `created_on`, `last_modified_on`, `trash`, `name`, `status`, `subsector`, `Expert technical weight`, `Expert economical weight`, `Expert creative weight`) VALUES
	(1, '2016-04-15 11:27:41', '0000-00-00 00:00:00', NULL, 'ye', 'Active', 1, 0, 0, 0),
	(2, '2016-04-15 11:27:41', '0000-00-00 00:00:00', NULL, 'yes', 'Active', 1, 0, 0, 0),
	(3, '2016-04-15 11:27:58', '0000-00-00 00:00:00', NULL, 'das', 'Active', 5, 0, 0, 0);
/*!40000 ALTER TABLE `specialization` ENABLE KEYS */;


-- Dumping structure for table yii2basic.states
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

-- Dumping data for table yii2basic.states: ~0 rows (approximately)
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;


-- Dumping structure for table yii2basic.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login_activity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `given_name` varchar(20) NOT NULL,
  `family_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_exp_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `agreed_terms` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `confirmed` enum('Yes','No') DEFAULT 'No',
  `bio` text NOT NULL,
  `website` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `sub_sector` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COMMENT='Student entity holds data about students that are submitting project canvas to experts to be evaluated.';

-- Dumping data for table yii2basic.student: ~4 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`id`, `created_on`, `last_modified_on`, `last_login_activity`, `trash`, `given_name`, `family_name`, `email`, `birth_year`, `password`, `password_exp_date`, `mobile`, `phone`, `fax`, `agreed_terms`, `confirmed`, `bio`, `website`, `country`, `state`, `city`, `address`, `zip`, `sector`, `sub_sector`) VALUES
	(90, '2016-04-11 18:08:00', '2016-04-10 15:51:50', '2016-04-10 15:51:50', NULL, 'Mihai', 'Da', 'student@test.com', 1910, '$2y$13$TTFP5hdvlVcS5CvugI9PROth/TCcyKHASFdKDN9N1hJ.goRW.M.LG', '0000-00-00 00:00:00', '321312', '312312', '', 'Yes', 'No', '', 'http://fomrad.com', '', '', '', '', '', '2', '2'),
	(91, '2016-04-10 22:30:07', '2016-04-10 22:30:07', '2016-04-10 22:30:07', NULL, '', '', 'test@test.com', 0, '$2y$13$0lcGlk9Ajp/z9GYxOKRqje3Nyp5PPNo2unMhyHKs69YHqcjkmfVF6', '0000-00-00 00:00:00', '', '', '', 'Yes', 'No', '', '', '', '', '', '', '', '', ''),
	(92, '2016-04-13 19:11:38', '2016-04-13 19:06:20', '2016-04-13 19:06:20', NULL, 'dasdas', 'adsadsda', 'skype@test.com', 1915, '$2y$13$KapwikJhUvr8py08bvy3AuABOsQPyymQW2bmeds00RJlxmT4Vnqhi', '0000-00-00 00:00:00', '123123', '312312312', '', 'Yes', 'No', '', 'http://dasdasda.com', '', '', '', '', '312321', '1', '1'),
	(93, '2016-04-13 19:07:27', '2016-04-13 19:07:27', '2016-04-13 19:07:27', NULL, '', '', 'sykpe@test.com', 0, '$2y$13$bz681r9Vj3MAk0WsOZKC1.82J7vKX58ZzuNPv4/7jepXSUbhLUUou', '0000-00-00 00:00:00', '', '', '', 'Yes', 'No', '', '', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;


-- Dumping structure for table yii2basic.student_education
CREATE TABLE IF NOT EXISTS `student_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  `degree` varchar(50) NOT NULL DEFAULT '0',
  `institution` varchar(50) NOT NULL DEFAULT '0',
  `degree_details` varchar(1024) NOT NULL DEFAULT '0',
  `from` varchar(50) NOT NULL DEFAULT '0',
  `to` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table yii2basic.student_education: ~2 rows (approximately)
/*!40000 ALTER TABLE `student_education` DISABLE KEYS */;
INSERT INTO `student_education` (`id`, `user_id`, `degree`, `institution`, `degree_details`, `from`, `to`) VALUES
	(6, '90', 'dadada', 'adasjdasid', 'dadasdas', '1902', '1917'),
	(7, '92', 'dsad', 'asdasdas', 'dasdas', '1915', '1917');
/*!40000 ALTER TABLE `student_education` ENABLE KEYS */;


-- Dumping structure for table yii2basic.student_experience
CREATE TABLE IF NOT EXISTS `student_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  `job_title` varchar(50) NOT NULL DEFAULT '0',
  `institution` varchar(50) NOT NULL DEFAULT '0',
  `from` varchar(50) NOT NULL DEFAULT '0',
  `to` varchar(50) NOT NULL DEFAULT '0',
  `job_description` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table yii2basic.student_experience: ~2 rows (approximately)
/*!40000 ALTER TABLE `student_experience` DISABLE KEYS */;
INSERT INTO `student_experience` (`id`, `user_id`, `job_title`, `institution`, `from`, `to`, `job_description`) VALUES
	(9, '0', 'Programmer', 'Visconti', '1908', '1918', 'Programmer Nice.'),
	(10, '90', 'Programmer', 'jdiasjdiasdias', '1916', '1918', 'doaskodasioa'),
	(12, '92', 'd', 'dasdasdas', '1902', '1916', 'asdasdasd');
/*!40000 ALTER TABLE `student_experience` ENABLE KEYS */;


-- Dumping structure for table yii2basic.student_roles
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

-- Dumping data for table yii2basic.student_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_roles` ENABLE KEYS */;


-- Dumping structure for table yii2basic.sub_sector
CREATE TABLE IF NOT EXISTS `sub_sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trash` enum('Yes','No') DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `sector` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sub_sector_sector` (`sector`),
  CONSTRAINT `FK_sub_sector_sector` FOREIGN KEY (`sector`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table yii2basic.sub_sector: ~5 rows (approximately)
/*!40000 ALTER TABLE `sub_sector` DISABLE KEYS */;
INSERT INTO `sub_sector` (`id`, `created_on`, `last_modified_on`, `trash`, `name`, `status`, `sector`) VALUES
	(1, '2016-04-11 16:04:20', '0000-00-00 00:00:00', NULL, 'sub1', 'Active', 1),
	(2, '2016-04-11 16:04:30', '0000-00-00 00:00:00', NULL, 'sub2', 'Active', 1),
	(3, '2016-04-11 17:56:32', '0000-00-00 00:00:00', NULL, 'da', 'Active', 2),
	(4, '2016-04-15 11:00:18', '0000-00-00 00:00:00', NULL, 'das', 'Active', 3),
	(5, '2016-04-15 11:00:20', '0000-00-00 00:00:00', NULL, 'dab', 'Active', 3);
/*!40000 ALTER TABLE `sub_sector` ENABLE KEYS */;


-- Dumping structure for table yii2basic.token
CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table yii2basic.token: ~18 rows (approximately)
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
	(3, 'tWxVq-0FBssj6IR5PtGpJ_k9nfDFm7V-', 1455036588, 0),
	(4, 'uc1EknpSfk6q5XE0uGArIvymVP1HPJZ_', 1455198448, 0),
	(5, 'D4yLvLL0qKaCiuITSiVP45qBELMDHZQd', 1456469275, 0),
	(6, 'V-r0hOXtg9S0mJDa3h8ZRzBBRWhR0N0f', 1456469375, 0),
	(7, 'dH7qLfgdByzmmXSWgxI-TI8btUf9XuRM', 1456469418, 0),
	(8, 'bTvWdYVMghKkF4uVxwZHBuBg3zqqvDej', 1456469487, 0),
	(9, 'PXn3NAF0_HoyZXO8bCex84OMz18A8TQU', 1458467410, 0),
	(10, 'xhDkO_z8pz9WbYy3BQxbGSP_8HqLBmih', 1458467644, 0),
	(19, 'cTAY-Ef3bcWE95-8NGsE7nD9mgczowdF', 1459290325, 0),
	(20, 'Yf7ZJWGXYLQgdQcU9jZHskLMtyL0FFbo', 1459290342, 0),
	(21, 'GEr1ZRQQcrhNSxiZppBJlONyUop2NK_s', 1459295097, 0),
	(22, 'ANZhfVwkBMFMIC3ZTmyH03lmXKLjHcan', 1459354428, 0),
	(23, 'p0GH28xJ1np2GCRh7Vvrp5zzyFuFH9Xj', 1459354473, 0),
	(24, '7o_P4-b6ppurr_B2Xk9O4-qhGXek4qar', 1459354494, 0),
	(25, 'bHK2N3jBlQ9y02wsuQQ9pwAxQB4ripei', 1459358100, 0),
	(26, 'tgY0A9L2eLfV8i3mMw2wUIsF0pDAPLR4', 1459786277, 0),
	(27, 'a0OPyeXb8wzLHR7fi2-y23JE1igbUkOY', 1459786567, 0),
	(28, 'GKA8gwUnRByA3GgQ_pFGE70uZI_AC-zm', 1459786615, 0);
/*!40000 ALTER TABLE `token` ENABLE KEYS */;


-- Dumping structure for table yii2basic.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `phone_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table yii2basic.user: ~19 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `phone_number`) VALUES
	(3, 'test', 'mitapirvuet@yahoo.com', '$2y$12$X1gC0iAOF1/wq.37KK7a6.4ByI8YcAFlPgXVtPzvhM4lLg2OU.C6i', 'YNMdBsrnzqTBypz2F0jahEp24cyHRQx8', 1455200788, NULL, NULL, '::1', 1455036588, 1455036588, 0, ''),
	(4, 'admin', 'lalala@gmail.com', '$2y$12$Y6bhwDiSRuKCxMPQoQ3/Deo2FzxmLj.NW1XK6VsvGX7663Jz7v7xK', 'gI7PRVIdt8LOxLbcIup54pJRfixVyWb9', 1455200792, NULL, NULL, '::1', 1455198448, 1455198448, 0, ''),
	(5, 'test2', 'yes@yes.com', '$2y$12$/V84LAa.Y1c5QyIMd4azKeqOl45YOvQD7A9L7updqxVWNQmjpJlHu', 'USdLFxggBtb7DbL-DPfeLSA5hr_MOA4j', 1456469317, NULL, NULL, '::1', 1456469274, 1456469274, 0, ''),
	(6, 'test3', 'no@no.com', '$2y$12$bMJtQ6M68y3C/5ANzTqFN.Ie8JxWXKPwntAp3XXodVu5Ntk7Dk572', 'Lt9TIyxxJzgs4HSMULMpocShtyhd7uP3', 1456469968, NULL, NULL, '::1', 1456469374, 1456469374, 0, ''),
	(7, 'dada', 'da@da.com', '$2y$12$8TfJwH.94edrM9PqFUnMweqefHZl.FAlXdfJNRd9/8URq.ovI6OEm', '5nMqD6wQ2LSCDFLaSMHX9Nwdg_edQ1Uw', 1456469969, NULL, NULL, '::1', 1456469418, 1456469418, 0, ''),
	(8, 'testut', 'test@test.com', '$2y$12$Gb.jL6xRR1Per4EPrwpXNeSUQ/4wJ4Uxws1KBlmXc6o8EY4f1C/GK', 'bvjkeSKKiSzjARuWt-9FINWQLiCCvG6O', 1456469971, NULL, NULL, '::1', 1456469487, 1456469487, 0, ''),
	(9, 'student', 'test@testtest.com', '$2y$12$rDTteIiZxR0Kp5fSbCo50.emk0IO5G9bvZtIup.J1iMuFd8nCEcPu', 'ymU-B19TONillZaOzHP4k0JAUM7lzzwY', NULL, NULL, NULL, '::1', 1458467409, 1458467409, 0, ''),
	(10, 'student2', 'test@testtests.com', '$2y$12$b6GUl/mfmfofmUnd00E/geKsXGJ/zi9kSuSMIfc3Qj.51fMmOYSDG', 'WQuC69jD2EsU37JIfyM1F1JDTpZGdH-y', NULL, NULL, NULL, '::1', 1458467643, 1458467643, 0, ''),
	(19, 'expert1', 'expert@test.com', '$2y$12$y/Vz4x0eoaCICMufA9cWVOoqCcqCbCSdp249KUvkCL8QN0CXA/Zoe', 'AzMGAd2SyXTUpbmrpKffh2B_HxAPYGxx', NULL, NULL, NULL, '::1', 1459290325, 1459290325, 0, ''),
	(20, 'student3', 'student@test.com', '$2y$12$.XpSrVYOUe2nICIFvu/Ty.eFnspC4Bfz41uzl.FF.1Q3fb2608oFS', 'yLZ8Yvwh9ShdvGJXhjEYC6ZggJX9J9J4', NULL, NULL, NULL, '::1', 1459290341, 1459290341, 0, ''),
	(21, 'mdasodmm', 'teksdadiadma@kdsmakm.com', '$2y$12$DzTzbNkl3Mm8.8Cwm0wAP.UWT.5M8f6PzWL/e4Fhaf.DxM68o2CSa', 'auiCAGN8Un9IA_ai8kSVlEq7ZJ6uZgeH', NULL, NULL, NULL, '::1', 1459295096, 1459295096, 0, ''),
	(22, 'UserNameSkype', 'testskype@test.com', '$2y$12$NioiDx2MZVlDJqYrqDQCleppnqWVGiT5AOw2s3/pKh3eEKLB3sqL.', '89sUKkUzrGCU9tjl_TwymASBErdyarlS', NULL, NULL, NULL, '::1', 1459354428, 1459354428, 0, ''),
	(23, 'skypeStudent', 'testSkypeTest@mail.com', '$2y$12$gzwrL0xxPdfA3STdbkIvhugWY684x4nbVg.U94kjmOl7dHT8RTTcu', 'kZ2FG--Fm7hC2Xtz11_hHyYw-6LfGfeW', NULL, NULL, NULL, '::1', 1459354473, 1459354473, 0, ''),
	(24, 'SkypeExpert', 'testexpert@mail.com', '$2y$12$y73W/2E/D1eOiq9hk6jChOllhLRQytT9dOKxXbVd2PLkGv/vfyu0u', 'rXyFD2WrRv1k0PFk6O4__R-_qTIOiGoQ', NULL, NULL, NULL, '::1', 1459354493, 1459354493, 0, ''),
	(25, 'dasijdaiodjasi', 'dasiasm@dmsakodas.com', '$2y$12$aGA1ARJkq0PxwoeDfQsXz.zxnys5Jcjuy2Indo4YfsEy0KQACmgA6', 'HGtkjyZtKukrwMzFFW7Upg6IHse_aRPn', NULL, NULL, NULL, '::1', 1459358100, 1459358100, 0, ''),
	(26, 'sdadasdasda', 'damsidmas@mdasimda.com', '$2y$12$IjMki2XOZGlKlmLgtv97SepwrjfypCqmSzTdCWh7oy1yG4EiOxV9y', 'IEy6rhLfJCRzgISWD2-IvCMbTckxow-M', NULL, NULL, NULL, '::1', 1459786277, 1459786277, 0, ''),
	(27, 'dasds@dsad.com', 'dasds@dsad.com', '$2y$12$h6apaXaKHtXfSmu89eZWD.9eswR11VM6BRXPo5yxltq3kzbV3jWGq', 'THcDirR_VFSpwwKSO4ZpzRvVyBydRfsn', NULL, NULL, NULL, '::1', 1459786567, 1459786567, 0, ''),
	(28, 'mihai@pirvulet.com', 'mihai@pirvulet.com', '$2y$12$IsG4i55FqMI4d5EzYVTntOf/gbJTWnjEHyipSdXfKMt.yvlXS7l/e', 'NasLxk04dOq2g7Anwi5s3B4L0CcurTJT', NULL, NULL, NULL, '::1', 1459786614, 1459787146, 0, ''),
	(30, 'dadada', 'wtff@wtf.com', 'da', '', NULL, NULL, NULL, NULL, 0, 0, 0, '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
