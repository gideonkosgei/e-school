-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2014 at 10:01 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `elective_core` varchar(30) NOT NULL,
  `units` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `code`, `course_name`, `year`, `semester`, `elective_core`, `units`) VALUES
(14, 'COM310', 'computer_architecture', 3, 1, 'core', 3),
(15, 'COM312', 'software_Engineering_II', 3, 1, 'core', 3),
(16, 'COM313', 'Electronics_II', 3, 1, 'core', 3),
(17, 'COM314', 'Digital_Electroncs_II', 3, 1, 'core', 3),
(18, 'COM315', 'Algorithms', 3, 1, 'core', 3),
(19, 'COM318', 'Database_Systems', 3, 1, 'elective', 3),
(20, 'COM320', 'Digital_System_Design', 3, 2, 'core', 3),
(21, 'COM321', 'Compiler_Design', 3, 2, 'core', 3),
(22, 'COM322', 'operation_Research_I', 3, 2, 'elective', 3),
(23, 'COM323', 'information_systems_security', 3, 2, 'elective', 3),
(24, 'COM326', 'Software_Development', 3, 2, 'core', 3),
(25, 'COM320', 'Intermediate_HTML', 3, 2, 'core', 3),
(26, 'COM220', 'procedural_Programming_II', 2, 1, 'core', 3),
(27, 'COM211', 'systems_software', 2, 1, 'core', 3),
(28, 'COM212', 'Digital_Electroncs_I', 2, 1, 'core', 3),
(29, 'COM215', 'Electrical_Circuits', 2, 1, 'core', 3),
(30, 'COM216', 'internet_fundamentals', 2, 1, 'core', 3),
(31, 'COM217', 'electronics_I', 2, 1, 'core', 3),
(32, 'COM220', 'software_Engineering_I', 2, 2, 'core', 3),
(33, 'COM221', 'computer_Organisation', 2, 2, 'core', 3),
(34, 'COM222', 'internet_applications', 2, 2, 'core', 3),
(35, 'COM223', 'operating_System_and_networks', 2, 2, 'core', 3),
(36, 'COM224', 'data_structures', 2, 2, 'core', 3),
(37, 'IRD200', 'state,society_and_development', 2, 2, 'core', 3),
(38, 'PHY210', 'electricity_and_magnetism', 2, 2, 'core', 2),
(39, 'STA205', 'statistics', 2, 2, 'core', 3),
(40, 'COM110', 'introduction_to_computers', 1, 1, 'core', 3),
(41, 'COM111', 'computer_applications', 1, 1, 'core', 4),
(42, 'COM113', 'mathematics_for_computer_science', 1, 1, 'core', 3),
(43, 'PHY110', 'basic_physics_I', 1, 1, 'core', 3),
(44, 'MATH110', 'basic_calculus', 1, 1, 'core', 3),
(45, 'IRD100', 'comunication_skills', 1, 1, 'core', 3),
(46, 'IRD101', 'quatitative_skills', 1, 1, 'core', 3),
(47, 'MATH111', 'basic_calculus_II', 1, 2, 'core', 3),
(48, 'COM123', 'mathematics_for_comp_science_II', 1, 2, 'core', 3),
(49, 'COM120', 'system_hardware', 1, 2, 'core', 3),
(50, 'COM121', 'procedural_Programming_I', 1, 2, 'core', 3),
(51, 'IRD102', 'communication_skillsII', 1, 2, 'core', 3),
(52, 'IRD104', 'quatitative_skills_II', 1, 2, 'core', 3),
(53, 'PHY111', 'basic_physics_II', 1, 2, 'core', 3),
(54, 'COM410', 'user_interface_design', 4, 1, 'core', 3),
(55, 'COM413', 'object_oriented_programming', 4, 1, 'core', 3),
(56, 'COM415', 'human_factors_in_computer', 4, 1, 'core', 3),
(57, 'COM419', 'computer_system_design', 4, 1, 'core', 3),
(58, 'COM409', 'distributed_systems', 4, 1, 'elective', 3),
(59, 'COM412', 'computational_techniques_II', 4, 1, 'elective', 3),
(60, 'COM418', 'expert_systems', 4, 1, 'elective', 3),
(61, 'COM421', 'engineering_and_software_law', 4, 2, 'core', 3),
(62, 'COM422', 'electronic_circuits_microrocessors', 4, 2, 'core', 3),
(63, 'COM423', 'computer_science_project_II', 4, 2, 'core', 3),
(64, 'COM426', 'simulation_and_modelling', 4, 2, 'core', 3),
(65, 'COM431', 'human-computer_interface_design', 4, 2, 'elective', 3),
(66, 'COM427', 'data_comm,_antenna,propagation', 4, 2, 'elective', 3),
(67, 'COM430', 'advanced__computer_systems', 4, 2, 'elective', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'mathematics'),
(3, 'NkjdAHJF');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `program_prefix` varchar(5) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`program_id`),
  UNIQUE KEY `program_prefix` (`program_prefix`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `duration`, `program_prefix`, `department_id`) VALUES
(1, ' computer science', 4, 'COM', 1),
(11, 'applied statistics', 4, 'AST', 1),
(12, 'acturial science', 4, 'ACS', 1),
(13, 'microbilogy', 4, 'MIC', 1),
(14, 'biochemistry', 4, 'BCM', 1),
(15, 'GIGI', 4, 'NFK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_course`
--

CREATE TABLE IF NOT EXISTS `program_course` (
  `program_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `program_course` text NOT NULL,
  PRIMARY KEY (`program_course_id`),
  KEY `program_id` (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `program_course`
--

INSERT INTO `program_course` (`program_course_id`, `program_id`, `semester`, `year`, `program_course`) VALUES
(17, 1, 1, 1, 'COM110, COM111, COM113, PHY110, MATH110, IRD100, IRD101, '),
(18, 1, 2, 1, 'MATH111, COM123, COM120, COM121, IRD102, IRD104, PHY111, '),
(19, 1, 1, 2, 'COM220, COM211, COM212, COM215, COM216, COM217, '),
(21, 1, 2, 2, 'COM220, COM221, COM222, COM223, COM224, IRD200, PHY210, STA205, '),
(22, 1, 1, 3, 'COM310, COM312, COM313, COM314, COM315, COM318, '),
(23, 1, 2, 3, 'COM320, COM321, COM322, COM323, COM326, COM320, '),
(24, 1, 1, 4, 'COM410, COM413, COM415, COM419, COM409, COM412, COM418, '),
(25, 1, 2, 4, 'COM421, COM422, COM423, COM426, COM431, COM427, COM430, '),
(26, 15, 1, 1, 'COM110, COM111, COM113, '),
(27, 15, 2, 1, 'MATH111, COM121, IRD104, '),
(28, 1, 1, 2, 'COM215, COM216, COM217, '),
(29, 15, 1, 2, 'COM216, COM217, ');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `id_number` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `gssp_pssp` varchar(50) NOT NULL,
  `program_id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admission_year` varchar(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_number` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admission_number` (`admission_number`),
  KEY `program_id` (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first_name`, `last_name`, `sex`, `id_number`, `telephone`, `gssp_pssp`, `program_id`, `password`, `admission_year`, `id`, `admission_number`, `year`) VALUES
('gideon', 'kosgei', 'MALE', 27734491, 727991654, 'GSSP', 1, '531871e3bd543', '14', 23, 'com/1/14', 2014),
('june', 'mwiria', 'FEMALE', 67654323, 723456789, 'GSSP', 1, '', '14', 24, 'com/2/14', 2014),
('amos', 'opio', 'MALE', 90875645, 756432389, 'GSSP', 1, '', '14', 25, 'com/3/14', 2014),
('mark', 'sirma', 'MALE', 27786534, 723456534, 'GSSP', 1, '', '14', 26, 'com/4/14', 2014),
('moses', 'gitau', 'MALE', 78675645, 734567865, 'GSSP', 13, '', '14', 27, 'mic/1/14', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `subscription_id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_number` varchar(10) NOT NULL,
  `courses` text NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`subscription_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `admission_number`, `courses`, `year`, `semester`) VALUES
(4, 'com/1/14', 'COM318, ', 3, 1),
(5, 'com/1/14', 'COM322, COM323, ', 3, 2),
(6, 'com/1/14', 'COM409, COM412, COM418, ', 4, 1),
(7, 'com/1/14', 'COM431, ', 4, 2),
(8, 'com/1/14', 'COM431, COM427, COM430, ', 4, 2),
(9, 'com/1/14', 'COM318, ', 3, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
