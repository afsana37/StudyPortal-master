-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 12:53 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `study_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `admin_id_number` varchar(20) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_phone` varchar(20) NOT NULL,
  `admin_address` text NOT NULL,
  `file` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `admin_designation` varchar(50) NOT NULL,
  `admin_department` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`,`admin_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_name`, `admin_id_number`, `admin_email`, `admin_phone`, `admin_address`, `file`, `type`, `size`, `admin_designation`, `admin_department`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', '', '', '', 0, '', ''),
(16, 'munim', '234234', 'kazi md. munim', '242354234234', 'kazimunim2014@gmail.com', '+8801756883171', 'mirpur, mirpur', '', '', 0, '', ''),
(24, 'anisur', '123', 'Lt Commander S M Anisur Rahman', '123', 'anis972@gmail.com', '02-8031111', 'Department of Computer Science and Engineering (CSE), Military Institute of Science and Technology (MIST), Mirpur Cantonment, Dhaka-1216, Bangladesh.', '33856-anis.jpg', 'image/jpeg', 7, 'Assistant Professor', 'CSE'),
(25, 'humayun', '123', 'Col A B M HUMAYUN KABIR', '123', 'humayun4190@yahoo.com', '3423523', 'Department of Computer Science and Engineering (CSE), Military Institute of Science and Technology (MIST), Mirpur Cantonment, Dhaka-1216, Bangladesh.', '67401-humayun.jpg', 'image/jpeg', 9, 'Professor', 'CSE'),
(26, 'sd', 'fd', 'df', 'sd', 'ds', 'ds', '', '71637-', '', 0, 'kjsd', 'CE'),
(27, 'fdsf', '32', 'ds', '2342345345', '32', '234', '', '96946-', '', 0, 'sedf', 'CE'),
(28, 'fdsf', '32', 'ds', '2342345345', '32', '234', '', '93626-', '', 0, 'sedf', 'CE'),
(29, 'wer', '3', 'dsf', 'wer', 'wefr', '3', '', '58098-', '', 0, 'ewf', 'CE'),
(30, '34', 'grdg', 'fd', '343', '4234', '43', '', '21834-', '', 0, '32', 'CE');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(50) NOT NULL,
  `course_department` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_department`, `course_name`) VALUES
(9, 'cse311', 'CSE', 'Numerical Analysis'),
(10, 'cse320', 'CSE', 'Software Engineering &amp; Information System Design Sessional'),
(11, 'cse319', 'CSE', 'Software Engineering &amp; Information System Design'),
(12, 'cse317', 'CSE', 'Data Communication'),
(13, 'cse315', 'CSE', 'Mathematical Analysis');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(10) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(40) NOT NULL,
  `faculty_username` varchar(25) NOT NULL,
  `faculty_password` varchar(25) NOT NULL,
  `faculty_id_number` varchar(20) NOT NULL,
  `faculty_designation` varchar(30) NOT NULL,
  `faculty_department` varchar(30) NOT NULL,
  `faculty_gender` varchar(10) NOT NULL,
  `faculty_ins` varchar(15) NOT NULL,
  `faculty_institution` varchar(150) NOT NULL,
  `faculty_email` varchar(50) NOT NULL,
  `faculty_phone` varchar(20) NOT NULL,
  `faculty_address` text NOT NULL,
  `file` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`faculty_id`,`faculty_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_username`, `faculty_password`, `faculty_id_number`, `faculty_designation`, `faculty_department`, `faculty_gender`, `faculty_ins`, `faculty_institution`, `faculty_email`, `faculty_phone`, `faculty_address`, `file`, `type`, `size`) VALUES
(1, 'Faculty', 'faculty', '123', '', '', '', '', '', '', '', '', '', '', '', 0),
(2, '23', '23', '23', '23', '32', 'CE', 'Male', 'Internal', '23', '23', '23', '23', '91493-', '', 0),
(3, '23', '23', '23', '23', '32', 'CE', 'Male', 'Internal', '23', '23', '23', '23', '1945-', '', 0),
(4, 'Kazi munim', 'munim', '123', '12', '12', 'CSE', 'Male', 'Internal', '12', 'kazimunim007@gmail.com', '+8801756883171', 'mirpur, mirpur', '35859-m.jpg', 'image/jpeg', 62),
(5, 'Major Dr. Muhammad Nazrul Islam', 'nazrul', '123', '1234556788', 'Associate Professor', 'CSE', 'Male', 'Internal', 'MIST', 'nazrulturku@gmail.com', '10010101010', 'Military Institute of Science and Technology (MIST)\r\n\r\nMirpur Cantonment, Dhaka-1216, Bangladesh.', '82260-nazrul.jpg', 'image/jpeg', 132);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `mat_course` varchar(50) NOT NULL,
  `file` varchar(150) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_uploader` varchar(50) NOT NULL,
  PRIMARY KEY (`mat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`mat_course`, `file`, `type`, `size`, `mat_id`, `mat_uploader`) VALUES
('cse320', '34249-srs.pptx', 'application/vnd.openxmlformats-officedocument.pres', 614, 1, 'nazrul'),
('cse319', '32650-lecture-on-ui-.ppt', 'application/vnd.ms-powerpoint', 2048, 2, 'nazrul'),
('cse311', '90378-cramer_s-rule-1.ppt', 'application/vnd.ms-powerpoint', 348, 3, 'nazrul'),
('cse319', '92351-software_testing_tutorial.pdf', 'application/pdf', 860, 4, 'nazrul'),
('cse319', '93166-lecture-1_course-intro.ppt', 'application/vnd.ms-powerpoint', 898, 8, 'nazrul'),
('cse311', '82244-nm_course-outline.pptx', 'application/vnd.openxmlformats-officedocument.pres', 65, 10, 'nazrul');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(10) NOT NULL AUTO_INCREMENT,
  `notice_text` text NOT NULL,
  `notice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_text`, `notice_date`) VALUES
(1, 'This is a notice...', '2016-10-25 05:11:20'),
(2, 'Study more please', '2016-10-25 05:32:25'),
(3, 'Notice 2: All students must be present at 8am', '2016-10-25 06:38:38'),
(4, 'SAP submission', '2016-10-30 02:49:12'),
(5, 'আজ কমান্ড্যান্ট স্যার আসবেন।', '2016-10-30 02:50:09'),
(6, '২০১৩ সালে এমআইএসটি লুনাবটিক্স টিম (এমআইএসটি লুনাবটিক্স একুশ) যুক্তরাষ্ট্রের ফ্লোরিডায় অবস্থিত কেনেডি স্পেস সেন্টারে অনুষ্ঠিত "৪র্থ বার্ষিক লুনাবটিক্স মাইনিং কম্পিটিশন "-এ অংশগ্রহণ করে ৬ষ্ঠ স্থান অধিকার করে । এছাড়া আউটরিচ প্রোজেক্টে ১ম, লুনা ওয়ার্ল্ড ওয়াইড অ্যাওয়ার্ড এ ১ম, সিস্টেম ইঞ্জিনিয়ারিং পেপারে ২য়, টিম স্পিরিট অ্যাওয়ার্ড এ ৩য় এবং মাইনিং ক্যাটাগরিতে ১১তম স্থান অধিকার করে।', '2016-10-30 12:20:23'),
(7, 'Offered Courses for Oct16 semester: Ph.D./M.Sc./M. Eng. in Nuclear Science &amp; Engineering (NSE)', '2016-11-01 10:04:58'),
(8, 'Applicants Need to Submit Valid Certificate for Quota (Military, Freedom Fighter) Approval, UG Admission 2017', '2016-11-02 03:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `level_term` varchar(50) NOT NULL,
  `section` varchar(5) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_department` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `hour` int(5) NOT NULL,
  `minute` int(5) NOT NULL,
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`level_term`, `section`, `course_code`, `course_department`, `day`, `hour`, `minute`, `schedule_id`) VALUES
('Level-03 Term-II', 'B', '320', 'CSE', 'Wednesday', 8, 0, 1),
('Level-03 Term-II', 'B', '311', 'CSE', 'Sunday', 8, 0, 2),
('Level-03 Term-II', 'B', '313', 'CSE', 'Sunday', 9, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Name` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Roll` varchar(20) CHARACTER SET utf32 NOT NULL,
  `Registration_no` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Rank` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Department` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Level_term` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Section` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Gender` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Father_name` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Mother_name` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Email` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Phone` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Password` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Address` text CHARACTER SET utf32 NOT NULL,
  `file` varchar(150) CHARACTER SET utf32 NOT NULL,
  `type` varchar(30) CHARACTER SET utf32 NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`Roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Name`, `Roll`, `Registration_no`, `Rank`, `Department`, `Level_term`, `Section`, `Gender`, `Father_name`, `Mother_name`, `Email`, `Phone`, `Password`, `Address`, `file`, `type`, `size`) VALUES
('1', '1111111111', '1', '1', '1', 'Level-03 Term-II', '1', '1', '1', '1', '1', '1', '1', '1', '', '', 0),
('1', '11111111111', '1', '1', '1', 'Level-03 Term-II', '1', '1', '1', '1', '1', '1', '1', '1', '', '', 0),
('Maj. Rabi-Ul-Islam', '201414061', '11132014141461', 'Major', 'CSE', 'Level-03 Term-II', 'B', 'Male', 'Father', 'Mother', 'rabi@gmail.com', '01616161616', '123', 'Banani, Dhaka', '47001-201414061.jpg', 'image/jpeg', 1058),
('Maj. Rabi-Ul-Islam', '201414062', '11132014141461', 'Major', 'CSE', 'Level-03 Term-II', 'B', 'Male', 'Father', 'Mother', 'rabi@gmail.com', '01616161616', '123', 'Banani, Dhaka', '47001-201414061.jpg', 'image/jpeg', 1058),
('কাজী মোঃ মুনিম', '201414069', '13141111111', 'Civil', 'CSE', 'Level-03 Term-II', 'B', 'Male', 'কাজি নজরুল ইসলাম', 'খালিদা রেবা', 'kazimunim2014@gmail.com', '01756883171', '123', 'ওসমানি হল, মিরপুর ক্যান্টনমেন্ট।', '88326-m.jpg', 'image/jpeg', 62),
('Amir Hamza', '201414070', '13141111111', 'Civil', 'CSE', 'Level-03 Term-II', 'B', 'Male', 'Father Name', 'Mother Name', 'hamza@gmail.com', '01756883171', '123', 'ওসমানি হল, মিরপুর ক্যান্টনমেন্ট।', '201414070.jpg', 'image/jpeg', 62),
('Nabila Shahnaz Khan', '201414105', '100556656566', 'Civil', 'CSE', 'Level-03 Term-II', 'B', 'Female', 'Showkat Ali Khan', 'Mariam Khan', 'Nabilakhan1024@gmail.com', '01703255533', '123', '13/A Eskaton Garden, Dhaka', '6136-nabila.jpg', 'image/jpeg', 23),
('123', '201414111', '1212121212', 'Civil', 'CE', 'Level-01 Term-II', 'A', 'Male', '121212', '121212', 'dkfjskdjf@gmail.com', '2323232323', '1234', 'osmany hall', '8501-vlcsnap-2016-09-16-19h56m02s074.png', 'image/png', 1173),
('afsana', '201414115', '142115', 'na', '2', 'Level-03 Term-II', 'B', '2', 'abc', 'def', 'xyz', '4545454', '5354q545', '5354', '', '', 0),
('1', '201414119', '1', '1', 'CE', 'Level-01 Term-I', 'none', 'Male', '1', '1', '1', '1', '3', 'dsm,fns,', '32539-', '', 0),
('1', '201414283', '1', '1', 'CE', 'Level-01 Term-I', 'none', 'Male', '1', '1', '1', '1', '4', '22', '37315-', '', 0),
('2', '32234324234', '213', '3', 'CE', 'Level-01 Term-I', 'none', 'Male', '32', '3', '34', '34q', 'r', '', '80973-', '', 0),
('zdsf', '32435345354', '325445', '34', 'CE', 'Level-01 Term-I', 'none', 'Male', '34', '434', 'rsfd', 'fg', '243', '', '18943-', '', 0),
('1', '3324334534543', '32', 'sdf', 'CE', 'Level-01 Term-I', 'none', 'Male', 'wef', 'dfdsg', 'sfs', 'sef', '23', '', '58739-', '', 0),
('fd,.k', '433546465645', '453', '323', 'CE', 'Level-01 Term-I', 'none', 'Male', '3wrkj', 'lskmfs', 'ksmdf', 'ksdmfll', 'kfd', '', '43714-', '', 0),
('kudhfs', '837487344334', '3', 'msfn', 'CE', 'Level-01 Term-I', 'none', 'Male', 'jjsdf', 'sndf', 'dg', '43', '453', '', '37481-', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
