-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2014 at 08:00 AM
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
  `proctorId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `evaluatedBy` varchar(50) NOT NULL,
  `profScore` int(11) NOT NULL,
  `instrucScore` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `facultyId`, `type`, `date`, `proctorId`, `courseId`, `evaluatedBy`, `profScore`, `instrucScore`) VALUES
(3, 1, 'Student', '1111-11-11', 1, 1, '000000', 36, 112),
(4, 1, 'Student', '1111-11-11', 1, 1, '000000', 28, 95);

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
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `description`) VALUES
(1, '1st Semester', '1st Semester'),
(2, '2nd Semester', '2nd Semester');

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
