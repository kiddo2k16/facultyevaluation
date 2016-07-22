-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2014 at 07:21 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `faculty_evaluation`
--
CREATE DATABASE IF NOT EXISTS `faculty_evaluation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `faculty_evaluation`;

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `status` enum('for-printing','active','inactive') NOT NULL,
  `createdOn` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `code`, `status`, `createdOn`) VALUES
(37, 'pY4eSWa76JAdJ6P', 'inactive', '2014-03-24 16:56:48'),
(38, 'mOdqHPjGFhBd7DG', 'for-printing', '2014-03-24 16:56:48'),
(39, 'pMP4ySrtVBh1muT', 'for-printing', '2014-03-24 16:56:48'),
(40, 'HNR81PBH2LebGbd', 'for-printing', '2014-03-24 19:13:42'),
(41, '5vIVJFtUzgx62E4', 'for-printing', '2014-03-24 19:13:42'),
(42, 'kuhpCAsgjsKrgNW', 'for-printing', '2014-03-24 19:13:42'),
(43, 'UrLDB4tm2Q7Mwzq', 'for-printing', '2014-03-24 19:13:42'),
(44, '4irx07yzqkjvMvU', 'for-printing', '2014-03-24 19:13:42'),
(45, 'pHjdo3zas7gEif7', 'for-printing', '2014-03-24 19:13:43'),
(46, 'jAUt7OX1negw51D', 'for-printing', '2014-03-24 19:13:43'),
(47, 'utHO2cQKQt2jPWs', 'for-printing', '2014-03-24 19:13:43'),
(48, '29tOxeTySiKCpgr', 'for-printing', '2014-03-24 19:13:43'),
(49, '1NYMCkAdcUSLghE', 'for-printing', '2014-03-24 19:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`) VALUES
(1, 'DIT', 'Diploma in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facultyId` int(11) NOT NULL,
  `type` enum('Faculty','Student') NOT NULL,
  `date` date NOT NULL,
  `courseId` int(11) NOT NULL,
  `evaluatedBy` varchar(50) NOT NULL,
  `profScore` int(11) NOT NULL,
  `instrucScore` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `facultyId`, `type`, `date`, `courseId`, `evaluatedBy`, `profScore`, `instrucScore`, `comment`) VALUES
(11, 1, 'Student', '2014-03-25', 1, 'pY4eSWa76JAdJ6P', 9, 3, ''),
(12, 1, 'Student', '2014-03-25', 1, 'pY4eSWa76JAdJ6P', 19, 29, 'this is just a test.');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `stiCampus` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `firstName`, `middleName`, `lastName`, `stiCampus`) VALUES
(1, 'Rex', 'D', 'Dominguez', 'STI Dipolog'),
(2, 'William', 'T', 'Tubio', 'STI Dipolog'),
(3, 'faddaf', 'afdaf', 'afadf', 'asdfadfd'),
(4, 'fafdafad', 'afadfdaf', 'dafdafa', 'afadfdaf'),
(5, 'fdffafaf', 'fafff', 'daffd', 'adfdasfdafdf');

-- --------------------------------------------------------

--
-- Table structure for table `instructional_answer`
--

CREATE TABLE IF NOT EXISTS `instructional_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_id` int(11) NOT NULL,
  `choice_1` int(11) NOT NULL DEFAULT '0',
  `choice_2` int(11) NOT NULL DEFAULT '0',
  `choice_3` int(11) NOT NULL DEFAULT '0',
  `choice_4` int(11) NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `instructional_answer`
--

INSERT INTO `instructional_answer` (`id`, `evaluation_id`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `num`) VALUES
(1, 11, 1, 0, 0, 0, 1),
(2, 11, 1, 0, 0, 0, 2),
(3, 11, 1, 0, 0, 0, 3),
(4, 11, 0, 0, 0, 0, 4),
(5, 11, 0, 0, 0, 0, 5),
(6, 11, 0, 0, 0, 0, 6),
(7, 11, 0, 0, 0, 0, 7),
(8, 11, 0, 0, 0, 0, 8),
(9, 11, 0, 0, 0, 0, 9),
(10, 11, 0, 0, 0, 0, 10),
(11, 11, 0, 0, 0, 0, 11),
(12, 11, 0, 0, 0, 0, 12),
(13, 11, 0, 0, 0, 0, 13),
(14, 11, 0, 0, 0, 0, 14),
(15, 11, 0, 0, 0, 0, 15),
(16, 11, 0, 0, 0, 0, 16),
(17, 11, 0, 0, 0, 0, 17),
(18, 11, 0, 0, 0, 0, 18),
(19, 11, 0, 0, 0, 0, 19),
(20, 11, 0, 0, 0, 0, 20),
(21, 11, 0, 0, 0, 0, 21),
(22, 11, 0, 0, 0, 0, 22),
(23, 11, 0, 0, 0, 0, 23),
(24, 11, 0, 0, 0, 0, 24),
(25, 11, 0, 0, 0, 0, 25),
(26, 11, 0, 0, 0, 0, 26),
(27, 11, 0, 0, 0, 0, 27),
(28, 11, 0, 0, 0, 0, 28),
(29, 12, 1, 0, 0, 0, 1),
(30, 12, 1, 0, 0, 0, 2),
(31, 12, 1, 0, 0, 0, 3),
(32, 12, 0, 0, 3, 0, 4),
(33, 12, 1, 0, 0, 0, 5),
(34, 12, 0, 0, 3, 0, 6),
(35, 12, 0, 0, 0, 0, 7),
(36, 12, 0, 2, 0, 0, 8),
(37, 12, 0, 0, 0, 4, 9),
(38, 12, 0, 0, 0, 4, 10),
(39, 12, 0, 0, 0, 4, 11),
(40, 12, 0, 0, 0, 0, 12),
(41, 12, 0, 0, 0, 0, 13),
(42, 12, 1, 0, 0, 0, 14),
(43, 12, 0, 0, 0, 0, 15),
(44, 12, 0, 0, 0, 0, 16),
(45, 12, 0, 0, 0, 4, 17),
(46, 12, 0, 0, 0, 0, 18),
(47, 12, 0, 0, 0, 0, 19),
(48, 12, 0, 0, 0, 0, 20),
(49, 12, 0, 0, 0, 0, 21),
(50, 12, 0, 0, 0, 0, 22),
(51, 12, 0, 0, 0, 0, 23),
(52, 12, 0, 0, 0, 0, 24),
(53, 12, 0, 0, 0, 0, 25),
(54, 12, 0, 0, 0, 0, 26),
(55, 12, 0, 0, 0, 0, 27),
(56, 12, 0, 0, 0, 0, 28);

-- --------------------------------------------------------

--
-- Table structure for table `proctors`
--

CREATE TABLE IF NOT EXISTS `proctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `proctors`
--

INSERT INTO `proctors` (`id`, `firstName`, `middleName`, `lastName`) VALUES
(1, 'Diamond', 'M', 'Platitas');

-- --------------------------------------------------------

--
-- Table structure for table `professional_answer`
--

CREATE TABLE IF NOT EXISTS `professional_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_id` int(11) NOT NULL,
  `choice_1` int(11) NOT NULL DEFAULT '0',
  `choice_2` int(11) NOT NULL DEFAULT '0',
  `choice_3` int(11) NOT NULL DEFAULT '0',
  `choice_4` int(11) NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `professional_answer`
--

INSERT INTO `professional_answer` (`id`, `evaluation_id`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `num`) VALUES
(19, 11, 1, 0, 0, 0, 1),
(20, 11, 0, 0, 0, 4, 2),
(21, 11, 1, 0, 0, 0, 3),
(22, 11, 1, 0, 0, 0, 4),
(23, 11, 1, 0, 0, 0, 5),
(24, 11, 1, 0, 0, 0, 6),
(25, 11, 0, 0, 0, 0, 7),
(26, 11, 0, 0, 0, 0, 8),
(27, 11, 0, 0, 0, 0, 9),
(28, 12, 1, 0, 0, 0, 1),
(29, 12, 0, 0, 0, 4, 2),
(30, 12, 1, 0, 0, 0, 3),
(31, 12, 1, 0, 0, 0, 4),
(32, 12, 0, 0, 0, 0, 5),
(33, 12, 0, 0, 0, 0, 6),
(34, 12, 0, 0, 0, 4, 7),
(35, 12, 0, 0, 0, 4, 8),
(36, 12, 0, 0, 0, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `prof_reponsibilites`
--

CREATE TABLE IF NOT EXISTS `prof_reponsibilites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluationId` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `from_time` varchar(50) NOT NULL,
  `to_time` varchar(50) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `days`, `section_id`, `subject_id`, `from_time`, `to_time`, `faculty_id`) VALUES
(2, 21, 1, 1, '02:20 PM', '03:00 PM', 1),
(3, 7, 1, 1, '02:20 PM', '02:20 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `description`) VALUES
(1, 'dfdaf', 'fasdfd');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `isCurrent` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `description`, `isCurrent`) VALUES
(1, '1st Semester', '1st Semester', 0),
(2, '2nd Semester', '2nd Semester', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`) VALUES
(1, 'Test Subject', 'Test Subject');

-- --------------------------------------------------------

--
-- Table structure for table `temp_codes`
--

CREATE TABLE IF NOT EXISTS `temp_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1057 ;

--
-- Dumping data for table `temp_codes`
--

INSERT INTO `temp_codes` (`id`, `code`) VALUES
(1011, 'N2dyTfFqQ1WYiwY'),
(1012, 'vgDgasYlL3Ad5eG'),
(1013, 'OpO3HPQaq3DidtY'),
(1014, 'lMTav2fYITe0R5G'),
(1015, 'eifb2fm8ergkJqo'),
(1016, 'U09u6Xd6rqECuus'),
(1017, 'cwkvZuENhL8WkQc'),
(1018, 'EFvcMsCZ62PCVqI'),
(1019, '1swrTDTMjaxYcwq'),
(1020, 'epHrAT0Wx2q2Viv'),
(1021, 'nSIzv6IqzUrUznb'),
(1022, 'UblWBWFRDLU5v79'),
(1023, 'D3Pd35mvtiA6ulj'),
(1024, 'uw3lj3wBKWzidYN'),
(1025, 'sENyoxrGBQFCyS6'),
(1026, 'AjwCtac4iYrF5yx'),
(1027, 'y1aIsyydSgzdJ5b'),
(1028, 'vsSbPNpF5OELG2R'),
(1029, 'xuGeKuxo3tI0NZa'),
(1030, 'yOq50Zlme4a65f1'),
(1031, 'usn3mMLEJV1Krkt'),
(1032, 'MAmrEGAYms78V1C'),
(1033, 'wTQ8yXsB0D2cAIL'),
(1034, 'ykue9saWm8SiYuI'),
(1035, 'ZHO58K5aXxAYVwj'),
(1036, 'GPewAbDsnGxRk4q'),
(1037, 'J0bpiHkdEXPDzgv'),
(1038, 'csTqeYlbxzLjAb5'),
(1039, '3HVmEllsvuJbuA0'),
(1040, 'FZkWObOq8d2CfHq'),
(1041, '12QCyUFhJ8tu4Q3'),
(1042, 'Pjd5bXsz2tMvGxf'),
(1043, 'OMSMfSs4eVKkLhQ'),
(1044, 'OgR9f81n0c9SZVa'),
(1045, 'JlQVfU0oJMRf9iq'),
(1046, 'XPeRBzt4n69n83p'),
(1047, '8MjaJ9tJwXPbH4Z'),
(1048, 'OIgmUloRQvYbMzj'),
(1049, '3qEa9UXtCsdZ9LA'),
(1050, 'cUOXeyexkOWQfvL'),
(1051, 'tgxKpoP2eXtwQeC'),
(1052, 'LJE89oGYYazEVgx'),
(1053, '9Vd4WxUUS4HEQKx'),
(1054, 'NARBAK4cNPdsRQK'),
(1055, 'CEa5PTjK8uz15MW'),
(1056, 'WFQXfqFPWFDLlCy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `accessLevel` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `accessLevel`) VALUES
(1, 'admin', 'cbfdac6008f9cab4083784cbd1874f76618d2a97', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
